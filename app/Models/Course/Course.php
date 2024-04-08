<?php

namespace App\Models\Course;
use App\Models\Preference;
use App\Models\Wishlist\Wishlist;
use App\Models\Cart\Cart;
use App\Models\Rating\CourseRating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'course_name_arabic',
        'sub_title',
        'sub_title_arabic',
        'tag_id',
        'description',
        'description_arabic',
        'thumbnail',
        'price',
        'actual_price',
        'references_course_ids'
    ];

    /**
     * Method wishlist
     *
     * @return void
     */
    public function wishlist()
    {
        $userId = \Illuminate\Support\Facades\Auth::id();

        return $this->hasMany(Wishlist::class)->where('user_id','=',$userId);
    }

    /**
     * Method ratings
     *
     * @return void
     */
    public function courseRatings()
    {
        return $this->hasMany(CourseRating::class);
    }

    /**
     * Method carts
     *
     * @return void
     */
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Method userCourses
     *
     * @return void
     */
    public function userCourses()
    {
        return $this->hasMany(UserCourse::class, 'course_id');
    }

    /**
     * Method courseLinks
     *
     * @return void
     */
    public function courseLinks()
    {
        return $this->hasMany(CourseLink::class);
    }

    public function preferences()
    {
        return $this->hasMany(Preference::class,'id','tag_id');
    }
}
