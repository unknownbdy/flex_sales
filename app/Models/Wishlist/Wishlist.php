<?php

namespace App\Models\Wishlist;

use App\Models\Course\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'course_id',
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
     * Method courses
     *
     * @return void
     */
    public function courses()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }
    
    /**
     * Method wishlistUser
     *
     * @return void
     */
    public function wishlistUser()
    {
        return $this->belongsTo(User::class);
    }

    // public function courseRatings()
    // {
    //     return $this->hasMany(CourseRating::class);
    // }


    public function Course()
    {
        return $this->hasOne(Course::class,'id','course_id');
    }
    
}
