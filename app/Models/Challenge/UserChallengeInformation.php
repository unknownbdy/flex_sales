<?php

namespace App\Models\Challenge;
use App\Models\User;

use App\Models\Challenge\ChallengeLink;
// use App\Models\Challenge\Challenge;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChallengeInformation extends Model
{
    use HasFactory;

    protected $table = 'user_challenge_informations';

    protected $fillable = [
        'user_id',
        'user_challenge_id',
        'challenge_video_id',
        'day',
        'challenge_video_date',
        'completed',
        'points'
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function challangeVideo()
    {
        return $this->belongsTo(ChallengeLink::class,'user_challenge_id','id');
    }


    public function userChallengeVideos(){
        return $this->belongsTo(Challenge::class,'user_challenge_id','id') ;

    }

    public function challengeDetail(){
        return $this->hasOne(Challenge::class,'id','user_challenge_id') ;
    }

    public function userChallangeLink()
    {
        return $this->belongsTo(ChallengeLink::class,'challenge_video_id','id');
    }

    public function challengeDetailLink()
    {
        return $this->hasMany(UserChallengeInformation::class,'user_challenge_id','user_challenge_id')
        ->join('challenges_link', 'challenges_link.id', '=', 'user_challenge_informations.challenge_video_id')
        ->select('challenges_link.title_english','challenges_link.title_arabic','user_challenge_informations.*');
    }

    // function userChallengeVideos(){
    //     return $this->hasMany(UserChallengeInformation::class,'user_challenge_id','id')
    //     ->join('users', 'users.id', '=', 'user_challenge_informations.user_id')
    //     ->join('challenges_link', 'challenges_link.id', '=', 'user_challenge_informations.challenge_video_id')
    //     ->select('users.name as user_name','challenges_link.title_english as challenge_video_name','challenges_link.title_arabic as challenge_video_name_arabic','user_challenge_informations.*');
    //  }
    

}
