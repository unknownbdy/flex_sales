<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Preference;


class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_english',
        'title_arabic',
        'description_english',
        'description_arabic',
        'short_description_english',
        'short_description_arabic',
        'type',
        'image',
        'tag_id'
    ];

    /**
     * Method instaVideoLinks
     *
     * @return void
     */
    public function preferences()
    {
        return $this->hasMany(Preference::class);
    }

    public function preference()
    {
        return $this->hasMany(Preference::class);
    }
}
