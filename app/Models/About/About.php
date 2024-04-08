<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'about';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'video_link',
        'description_arabic',
        'thumbnail'
    ];

    public function media()
    {
        return $this->hasMany(AboutMedia::class);
    }
}
