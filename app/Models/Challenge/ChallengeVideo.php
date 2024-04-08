<?php

namespace App\Models\Challenge;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_arabic',
        'show_name',
        'show_name_arabic',
        'channel_name',
        'channel_name_arabic',
        'description',
        'description_arabic',
        'video_url',
        'days',
        'skills',
        'achievement_name',
        'achievement_name_arabic',
        'achievement_message',
        'achievement_message_arabic',
        'achievement_badge_url',

    ];
    
    /**
     * Method enlightingChallenge
     *
     * @return void
     */
    public function enlightingChallenge()
    {
        return $this->belongsTo(EnlightingChallenge::class);
    }
}
