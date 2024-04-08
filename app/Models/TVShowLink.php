<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TVShowLink extends Model
{
    use HasFactory;

    protected $table = 'tv_show_links';

    protected $fillable = [
        'tv_show_id',
        'tv_show_name_id',
        'tv_show_channel_id',
        'topic',
        'topic_arabic',
        'link'
    ];

    /**
     * Method tvShow
     *
     * @return void
     */
    public function tvShow()
    {
        return $this->belongsTo(TVShow::class);
    }
}
