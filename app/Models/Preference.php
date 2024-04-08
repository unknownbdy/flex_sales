<?php

namespace App\Models;

use App\Models\handpicked\HandPicked;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    // public $timestamps=false;
    protected $table = 'preferences';
    protected $fillable = ['preferences_name','arbic_preferences_name'];

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
     * Method user
     *
     * @return void
     */
    public function handPickeds()
    {
        return $this->belongsTo(HandPicked::class);
    }
}


