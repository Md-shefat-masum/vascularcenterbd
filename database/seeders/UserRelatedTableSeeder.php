<?php

namespace Database\Seeders;

use App\Models\UserPermission;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserRelatedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        UserRole::truncate();

        $user_role = new UserRole();
        $user_role->title = 'super_admin';
        $user_role->serial = '1';
        $user_role->slug = 'super_admin';
        $user_role->created_at = Carbon::now()->toDateTimeString();
        $user_role->save();

        $user_role = new UserRole();
        $user_role->title = 'admin';
        $user_role->serial = '2';
        $user_role->slug = 'admin';
        $user_role->created_at = Carbon::now()->toDateTimeString();
        $user_role->save();


        $user_role = new UserRole();
        $user_role->title = 'modarator';
        $user_role->serial = '3';
        $user_role->slug = 'modarator';
        $user_role->created_at = Carbon::now()->toDateTimeString();
        $user_role->save();

        $user_role = new UserRole();
        $user_role->title = 'instructor';
        $user_role->serial = '4';
        $user_role->slug = 'instructor';
        $user_role->created_at = Carbon::now()->toDateTimeString();
        $user_role->save();

        $user_role = new UserRole();
        $user_role->title = 'student';
        $user_role->serial = '5';
        $user_role->slug = 'student';
        $user_role->created_at = Carbon::now()->toDateTimeString();
        $user_role->save();

        $user_role = new UserRole();
        $user_role->title = 'editor';
        $user_role->serial = '6';
        $user_role->slug = 'editor';
        $user_role->created_at = Carbon::now()->toDateTimeString();
        $user_role->save();

        // user permissions
        UserPermission::create([
            'user_id' => 1,
            'can_create' => 1,
            'can_edit' => 1,
            'can_delete' => 1,
        ]);
        UserPermission::create([
            'user_id' => 2,
            'can_create' => 1,
            'can_edit' => 1,
            'can_delete' => 1,
        ]);
        UserPermission::create([
            'user_id' => 3,
            'can_create' => 0,
            'can_edit' => 0,
            'can_delete' => 0,
        ]);
    }
}
