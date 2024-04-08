<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventPeople extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'event_people';
    public $timestamps=false;

    protected $fillable = ['event_id', 'name', 'type','name_arabic', 'type_arabic', 'image','updated_at','created_at'];
    protected $attributes = [
        'image' => 'default_image.jpg',
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }


}
