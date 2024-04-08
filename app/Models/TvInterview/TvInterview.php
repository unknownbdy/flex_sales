<?php

namespace App\Models\TvInterview;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvInterview extends Model
{
    use HasFactory;
    protected $table = 'tv_interview';
    protected $fillable = [
        'tag_arabic',
        'description',
        'description_arabic',
        'topic_english',
        'topic_arabic',
        'channel_english',
        'channel_arabic',
        'show_english',
        'show_arabic',
        'tag_english',
        'tag_id',
        'link',
        'thumbnail'
      ];

    /**
     * Method tvInterviewLinks
     *
     * @return void
     */

}
