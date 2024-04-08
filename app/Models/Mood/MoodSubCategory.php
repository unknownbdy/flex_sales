<?php

namespace App\Models\Mood;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoodSubCategory extends Model
{
    use HasFactory;

    protected $table = 'mood_sub_categories';

    protected $fillable = [
        'mood_id',
        'mood_category_id',
        'name',
        'name_arabic'
    ];

    /**
     * Method moodCaegory
     *
     * @return void
     */
    public function moodCategory()
    {
        return $this->belongsTo(MoodCategory::class, 'mood_category_id', 'id');
    }

    /**
     * Method userMoods
     *
     * @return void
     */
    public function userMoods()
    {
        return $this->hasMany(UserMood::class, 'mood_sub_category_id');
    }

}
