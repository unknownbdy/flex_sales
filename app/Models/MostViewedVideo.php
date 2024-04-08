<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MostViewedVideo extends Model
{
    use HasFactory;
    protected $table = 'most_viewed_videos';

    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'type_id',
        'type',
        'user_id'
    ];

    public function recentPodcastVideos(){

        

    }
}
