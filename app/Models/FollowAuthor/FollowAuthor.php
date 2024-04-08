<?php

namespace App\Models\FollowAuthor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowAuthor extends Model
{
    use HasFactory;

    protected $table = 'follow_author';

    protected $fillable = [
        'user_id'
    ];
}
