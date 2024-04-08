<?php

namespace App\Models\Instagram;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstagramVideoLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'name_arabic',
        'link',
        'instagram_video_id'
    ];

    /**
     * Method instaVideoLinks
     *
     * @return void
     */
    public function instaVideo()
    {
        return $this->belongsTo(InstagramVideo::class);
    }
}
