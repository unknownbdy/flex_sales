<?php

namespace App\Models\Rating;

use App\Models\Course\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'rating',
        'comment'
    ];

    /**
     * Method user 
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
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
