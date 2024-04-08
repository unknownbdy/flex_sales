<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvInterviewTopic extends Model
{
    use HasFactory;

    protected $fillable = [
        'channel_id',
        'show_id',
        'topic',
        'topic_arabic',
        'link'
      ];
    
    /**
     * Method tvInterview
     *
     * @return void
     */
    public function tvInterview()
    {
        return $this->belongsTo(TvInterview::class);
    }
}
