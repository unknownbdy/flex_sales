<?php

namespace App\Models\LiveVideo;

use App\Models\LiveVideo\LiveVideoChapter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveVideos extends Model
{
    use HasFactory;

    protected $table = 'live_videos';
    protected $fillable = [
        'title',
        'title_arabic',
        'tag_english',
        'tag_arabic',
        'description_arabic',
        'description_english',
        'name_english',
        'name_arabic',
        'link',
        'chapter_id',
        'thumbnail',
        'tag_id',
        'channel_english',
        'channel_arabic',
        'show_english',
        'show_arabic'
    ];

    public function chapter()
    {
        return $this->belongsTo(LiveVideoChapter::class);
    }

    /**
     * Method liveVideos
     *
     * @return void
     */
    public function userLiveVideos()
    {
        return $this->belongsTo(UserLiveVideo::class);
    }

}
