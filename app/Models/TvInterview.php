<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvInterview extends Model
{
    use HasFactory;
    
    protected $table = 'tv_interview';
    protected $fillable = [
        'tag',
        'tag_arabic',
        'description',
        'description_arabic'
      ];
    
    /**
     * Method tvInterviewLinks
     *
     * @return void
     */
    public function tvInterviewTopics()
    {
        return $this->hasMany(TvInterviewTopic::class);
    }
}
