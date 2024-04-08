<?php

namespace App\Models\TestimonialVideo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestimonialVideo extends Model
{
    use HasFactory;

    protected $table = 'testimonial_videos';

    protected $fillable = [
      'name_arabic',
      'name',
      'description',
      'description_arabic',
    	'designation',
      'link',
      'thumbnail',
      'testimonial_video_type_id',
    ];

    /**
     * Method testimonialType
     *
     * @return void
     */
    public function testimonialType()
    {
        return $this->hasMany(TestimonialVideoType::class, 'id', 'testimonial_video_type_id');
    }
}
