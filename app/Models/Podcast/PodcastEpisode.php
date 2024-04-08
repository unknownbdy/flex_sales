<?php

namespace App\Models\Podcast;

use App\Models\Rating\PodcastRating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Preference;
use Illuminate\Database\Eloquent\SoftDeletes;

class PodcastEpisode extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'podcast_id',
        'title',
        'title_arabic',
        'description',
        'description_arabic',
        'tags',
        'tags_arabic',
        'link',
        'thumbnail'
    ];

    // public function ratings()
    // {
    //     return $this->hasMany(PodcastRating::class, 'podcast_id', 'id');
    // }

    // public function preferences()
    // {
    //     return $this->hasMany(Preference::class,  'id','tags');
    // }

    public function ratings()
    {
        return $this->hasMany(PodcastRating::class, 'podcast_id', 'id');
    }

    public function preferences()
    {
        return $this->hasMany(Preference::class, 'id', 'tags');
    }

    public function children()
    {
        return $this->hasMany(Preference::class, 'id', 'tags');
    }
    // public function podcast()
    // {
    //     return $this->hasMany(PodcastVideo::class, 'id');
    // }

}
