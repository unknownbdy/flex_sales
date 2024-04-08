<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMedia extends Model
{
    use HasFactory;

    protected $table = 'about_media';

    protected $fillable = [
        'about_id',
        'type',
        'url'
    ];
}
