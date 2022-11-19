<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'first_name',
    //     'last_name',
    //     'username',
    //     'email',
    //     'password',
    // ];

    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function role_information()
    {
        return $this->belongsTo('App\Models\UserRole', 'role_id', 'id');
    }

    public static function user_course_info($user_id = null)
    {
        if (!$user_id) {
            $user_id = Auth::user()->id;
        }

        $data = User::where('id', $user_id)
            ->with([
                'course_batch_students' => function ($query) {
                    $query->where('status', 1)
                        ->with([
                            'course_batches' => function ($query) {
                                $query->where('status', 1)
                                    ->select('course_id', 'id', 'title', 'thumbnail')
                                    ->with([
                                        'course' => function ($query) {
                                            $query->where('status', 1)
                                                ->select('id', 'title', 'thumbnail');
                                        }
                                    ]);
                            }
                        ]);
                }
            ])
            ->select('id')
            ->first();

        $batch = [];
        $course = [];
        foreach ($data->course_batch_students as $item) {
            if (isset($item->course_batches->title)) {
                $temp['id'] = $item->course_batches->id;
                $temp['title'] = $item->course_batches->title;
                $temp['thumbnail'] = $item->course_batches->thumbnail;
                $batch[] = (object) $temp;
            }
            if (isset($item->course_batches->course->title)) {
                $temp['id'] = $item->course_batches->course->id;
                $temp['title'] = $item->course_batches->course->title;
                $temp['thumbnail'] = $item->course_batches->course->thumbnail;
                $course[] = (object) $temp;
            }
        }

        return [
            'user_course_data' => $data,
            'batches' => $batch,
            'courses' => array_intersect_key($course, array_unique(array_column($course, 'id'))),
        ];
    }

    public function course_batch_students()
    {
        return $this->hasMany(CourseBatchStudent::class, 'user_id');
    }
}
