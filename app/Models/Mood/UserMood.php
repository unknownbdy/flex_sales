<?php

namespace App\Models\Mood;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mood\Mood;
use App\Models\Mood\MoodCategory;
use App\Models\Mood\MoodSubCategory;

class UserMood extends Model
{
    use HasFactory;

    protected $table ='user_moods';

    protected $fillable = [
        'user_id',
        'mood_id',
        'mood_category_id',
        'mood_sub_category_id',
        'date'
    ];
    
    /**
     * Method moodSubCategory
     *
     * @return void
     */
    // public function moodSubCategory()
    // {
    //     return $this->belongsTo(MoodSubCategory::class, 'mood_sub_category_id', 'id');
    // }

    public function moodCategory(){
        return $this->hasOne(moodCategory::class,'id','mood_category_id');
    }

    public function moodSubCategory(){
        return $this->hasOne(moodSubCategory::class,'id','mood_sub_category_id');
    }
    
    public function mood(){
        return $this->hasOne(Mood::class,'id','mood_id');
    }
}
