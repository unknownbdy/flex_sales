<?php

namespace App\Models\Challenge;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnlightingChallenge extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_arabic',
        'description',
        'description_arabic',
        'total_days',
        'skills'
    ];

    /**
     * Method challengeVideos
     *
     * @return void
     */
    public function challengeVideos()
    {
        return $this->hasMany(ChallengeVideo::class);
    }
}
