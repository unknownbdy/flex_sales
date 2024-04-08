<?php

namespace App\Models\Challenge;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ChallengeLink extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'challenges_link';

    protected $fillable = [
        'title_arabic',
        'title_english',
        'video_link',
        'thumbnail',
        'tv_show_name',
        'channel_name',
        'day',
        'challenge_id',
        'point'
    ];

    /**
     * Method enlightingChallenge
     *
     * @return void
     */
}
