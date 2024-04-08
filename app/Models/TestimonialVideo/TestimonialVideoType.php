<?php

namespace App\Models\TestimonialVideo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestimonialVideoType extends Model
{
    use HasFactory;

    protected $table = 'testimonial_video_type';

    /**
     * Method testimonialVideo
     *
     * @return void
     */
    public function testimonialVideo()
    {
        return $this->belongsTo(TestimonialVideo::class);
    }
}
