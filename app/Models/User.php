<?php

namespace App\Models;

use App\Facades\UtilityFacades;
use App\Models\Auth\UserOtp;
use App\Models\Cart\Purchase;
use App\Models\Course\UserCourse;
use App\Models\Rating\CourseRating;
use App\Models\Rating\PodcastRating;
use App\Models\Preference;
use App\Models\Mood\UserMood;
use App\Models\Mood\MoodCategory;
use App\Models\Mood\MoodSubCategory;
use App\Models\Wishlist\Wishlist;

use App\Models\Challenge\UserChallengeInformation;

use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements JWTSubject,MustVerifyEmail
{
    use Notifiable;
    use HasRoles, SoftDeletes;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'contact_no', 'password', 'type', 'dob',
        'email_verified_at', 'gender', 'age','preferences_ids','password', 'type',
        'created_by', 'is_admin', 'avatar', 'remember_token', 'deleted_at','is_completed','auth_type','profile_image','signup_otp'
    ];

/**
     * The attributes that should have default values.
     *
     * @var array
     */
    protected $attributes = [
        'is_completed' => 0,
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'name' => 'string'
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Method creatorId
     *
     * @return void
     */
    public function creatorId()
    {

        if ($this->type == 'company' || $this->type == 'admin') {
            return $this->id;
        } else {
            return $this->created_by;
        }
    }

    /**
     * Method currentLanguage
     *
     * @return void
     */
    public function currentLanguage()
    {
        return $this->lang;
    }

    /**
     * Method loginSecurity
     *
     * @return void
     */
    public function loginSecurity()
    {
        return $this->hasOne('App\Models\LoginSecurity');
    }

    /**
     * Method purchases
     *
     * @return void
     */
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    /**
     * Method wishlists
     *
     * @return void
     */
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    /**
     * Method quotes
     *
     * @return void
     */
    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

    /**
     * Method events
     *
     * @return void
     */
    public function eventRegistrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    /**
     * Method courseRatings
     *
     * @return void
     */
    public function courseRatings()
    {
        return $this->hasMany(CourseRating::class);
    }

    /**
     * Method podcastRatings
     *
     * @return void
     */
    public function podcastRatings()
    {
        return $this->hasMany(PodcastRating::class);
    }

    /**
     * Method userCourses
     *
     * @return void
     */
    public function userCourses()
    {
        return $this->hasMany(UserCourse::class);
    }

 /**
     * Method userCourses
     *
     * @return void
     */
    public function preferences()
    {
        return $this->hasMany(Preference::class);
    }

    public function userchallange(){
        return $this->hasMany(UserChallengeInformation::class);
    }

    public function userchallangeGroup(){
        return $this->hasMany(UserChallengeInformation::class)->groupBy('user_challenge_id');
    }

    public function userMood(){
        return $this->hasMany(UserMood::class);
    }
    public function userOtp()
    {
        return $this->hasMany(UserOtp::class); // Assuming UserOtp is the related model
    }
}
