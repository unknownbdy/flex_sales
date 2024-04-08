<?php

namespace App\Models\Contactus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $table ='contact_us';

    protected $fillable = [
        'name','email_address','message','user_id'
    ];

}

