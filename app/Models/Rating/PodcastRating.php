<?php

namespace App\Models\Rating;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PodcastRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'podcast_id',
        'user_id',
        'rating',
        'comment',
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
}
