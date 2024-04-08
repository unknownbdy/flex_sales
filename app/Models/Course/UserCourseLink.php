<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourseLink extends Model
{
    use HasFactory;

    protected $table = 'user_course_links';

    protected $fillable = [
        'user_course_id',
        'course_link_id',
        'user_id',
        'course_id',
        'completed'
    ];
    
    /**
     * Method userCourse
     *
     * @return void
     */
    public function userCourse()
    {
        return $this->belongsTo(UserCourse::class);
    }
}
