<?php

namespace App\Models\Event;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'arabic_title',
        'description',
        'description_arabic',
        'city',
        'arabic_city',
        'address',
        'arabic_address',
        'tag_id',
        'location',
        'date',
        'from_date',
        'to_date',
        'time',
        'from_time',
        'to_time',
        'thumbnail'
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
    public function eventpeople()
    {
        return $this->hasMany(EventPeople::class);
    }
}
