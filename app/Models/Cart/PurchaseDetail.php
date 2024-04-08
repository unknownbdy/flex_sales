<?php

namespace App\Models\Cart;

use App\Models\Course\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;

    protected $table = 'purchase_details';

    protected $fillable = [
        'purchase_id',
        'course_id',
        'price',
        'discount_type',
        'discount_amount',
        'original_price'
    ];
    
    /**
     * Method purchase
     *
     * @return void
     */
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
    
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
