<?php

namespace App\Models\handpicked;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Preference;

class HandPicked extends Model
{
    use HasFactory;
    protected $table = 'handpicked_for_you';
    protected $fillable = [
        'title_english',
        'title_arabic',
        'description_english',
        'description_arabic',
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
