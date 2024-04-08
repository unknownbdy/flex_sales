<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvInterviewChannel extends Model
{
    use HasFactory;

    protected $fillable = [
        'channel_name',
        'channel_name_arabic'
    ];
}
