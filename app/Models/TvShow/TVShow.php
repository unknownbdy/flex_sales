<?php

namespace App\Models\TvShow;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Preference;

class TVShow extends Model
{
    use HasFactory;

    protected $table = 'tv_shows';

    protected $fillable = [
        'description',
        'description_arabic',
        'topic_english',	
        'topic_arabic',	
        'channel_english',
        'channel_arabic',
        'show_english',	
        'show_arabic',	
        'tag_english',
        'tag_arabic',
        'tag_id',
        'thumbnail',
        'link'
    ];


    public function preferences()
    {
        return $this->hasMany(Preference::class,'id','tag_id');
    }
    
    
}
