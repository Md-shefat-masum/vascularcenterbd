<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteCourseInfo extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function course_feature($course_id)
    {
        return WebsiteCourseFeature::where('course_id', $course_id)->get();
    }
    public function course_requirement($course_id)
    {
        return WebsiteCourseRequirement::where('course_id', $course_id)->get();
    }
    public function course_content($course_id)
    {
        return WebsiteCourseContent::where('course_id', $course_id)->get();
    }
    public function course_instructor($instructor_id)
    {
        return WebsiteInstructor::where('id', $instructor_id)->first();
    }
    public function course_comment()
    {
        return $this->hasMany(WebsiteCourseComment::class,'course_id','id');
    }

}
