<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvInterviewShow extends Model
{
    use HasFactory;

    protected $fillable = [
        'show_name',
        'show_name_arabic'
    ];
}
