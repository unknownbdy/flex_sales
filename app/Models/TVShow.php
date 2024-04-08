<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TVShow extends Model
{
    use HasFactory;

    protected $table = 'tv_shows';

    protected $fillable = [
        'title',
        'title_arabic',
        'tag',
        'tag_arabic',
        'description',
        'description_arabic',
        'thumbnail'
    ];

    /**
     * Method tvShow
     *
     * @return void
     */
    public function tvShowLinks()
    {
        return $this->hasMany(TVShowLink::class, 'tv_show_id');
    }
}
