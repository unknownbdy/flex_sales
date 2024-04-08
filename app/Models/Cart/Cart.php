<?php

namespace App\Models\Cart;

use App\Models\Course\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'user_id',
        'price',
        'discount_type',
        'discount_amount',
        'original_price'
    ];
    
    /**
     * Method course
     *
     * @return void
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
