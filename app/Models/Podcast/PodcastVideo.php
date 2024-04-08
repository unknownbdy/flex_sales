<?php

namespace App\Models\Podcast;

use App\Models\Rating\PodcastRating;
use App\Models\Podcast\PodcastEpisode;
use App\Models\Preference;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PodcastVideo extends Model
{
    use HasFactory;
    protected $table = 'podcasts';
    protected $fillable = [
        'teaser_english',
        'teaser_arabic',
        'description_english',
        'description_arabic',
        'tag_english',
        'tag_arabic',
        'english',
        'link',
        'tag_id',
        'thumbnail',
        'podcast_type',
    ];

    public function episodes()
    {
        return $this->hasMany(PodcastEpisode::class, 'podcast_id', 'id');
    }

    public function ratings()
    {
        return $this->hasMany(PodcastRating::class, 'podcast_id', 'id');
    }

    public function preferences()
    {
        return $this->hasMany(Preference::class,'id','tag_id');
    }
}
