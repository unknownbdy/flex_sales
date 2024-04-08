<?php

namespace App\Models\Faqs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    use HasFactory;

    protected $table ='faqs';

    protected $fillable = [
        'title','title_arabic','description','description_arabic'
    ];

}
