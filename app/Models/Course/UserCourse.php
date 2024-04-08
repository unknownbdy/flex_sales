<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'completed'
    ];
    
    /**
     * Method userCourseLinks
     *
     * @return void
     */
    public function userCourseLinks()
    {
        return $this->hasMany(UserCourseLink::class, 'user_course_id');
    }
    
    /**
     * Method course
     *
     * @return void
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
