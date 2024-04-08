<?php

namespace App\Models\Mood;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * Method moodCategories
     *
     * @return void
     */
    public function categories()
    {
        return $this->hasMany(MoodCategory::class);
    }

    public function moodSubCategories()
    {
        return $this->hasMany(MoodSubCategory::class, 'mood_id', 'id');
    }
}
