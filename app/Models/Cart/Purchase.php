<?php

namespace App\Models\Cart;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_courses',
        'price'
    ];
    
    /**
     * Method user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Method purchaseDetails
     *
     * @return void
     */
    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'purchase_details', 'purchase_id', 'course_id');
    }
}
