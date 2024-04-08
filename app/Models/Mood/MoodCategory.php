<?php

namespace App\Models\Mood;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoodCategory extends Model
{
    use HasFactory;

    protected $table ='mood_categories';

    protected $fillable = [
        'mood_id','name','name_arabic'
    ];

    /**
     * Method mood
     *
     * @return void
     */
    public function mood()
    {
        return $this->belongsTo(Mood::class);
    }

    /**
     * Method moodSubCategories
     *
     * @return void
     */
    public function moodSubCategories()
    {
        return $this->hasMany(MoodSubCategory::class, 'mood_category_id', 'id');
    }
}
