<?php

namespace App\Models\Challenge;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Challenge\ChallengeLink;
use App\Models\Preference;
use App\Models\Challenge\UserChallengeInformation;
use Illuminate\Database\Eloquent\SoftDeletes;


class Challenge extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'challenge';

    protected $fillable = [
        'title_arabic',
        'title_english',
        'description_english',
        'description_arabic',
        'tag_ids'
    ];
    
    /**
     * Method enlightingChallenge
     *
     * @return void
     */

     function challengeLinks(){
        return $this->hasMany(ChallengeLink::class)->withTrashed();
     }

     function challengeLink(){
        return $this->hasMany(ChallengeLink::class);
     }

     function userChallengeVideos(){
      return $this->hasMany(UserChallengeInformation::class,'user_challenge_id','id')
      ->join('users', 'users.id', '=', 'user_challenge_informations.user_id')
      ->join('challenges_link', 'challenges_link.id', '=', 'user_challenge_informations.challenge_video_id')
      ->select('users.name as user_name','challenges_link.title_english as challenge_video_name','challenges_link.title_arabic as challenge_video_name_arabic','user_challenge_informations.*');
   }

   public function preferences()
    {
        return $this->hasMany(Preference::class,'id','tag_id');
    }

     
}
