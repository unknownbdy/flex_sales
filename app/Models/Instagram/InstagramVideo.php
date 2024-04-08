<?php

namespace App\Models\Instagram;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstagramVideo extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'name_arabic',
        'tag',
        'tag_arabic',
        'description',
        'description_arabic',
        'thumbnail',
        'tag_id',
        'link'
    ];

    /**
     * Method instaVideoLinks
     *
     * @return void
     */
    public function instaVideoLinks()
    {
        return $this->hasMany(InstagramVideoLink::class);
    }
}
