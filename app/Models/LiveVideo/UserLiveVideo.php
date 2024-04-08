<?php

namespace App\Models\LiveVideo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLiveVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'live_video_id',
        'completed'
    ];
    
    /**
     * Method liveVideos
     *
     * @return void
     */
    public function liveVideo()
    {
        return $this->belongsTo(LiveVideos::class);
    }
}
