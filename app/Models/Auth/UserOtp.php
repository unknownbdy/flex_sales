<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOtp extends Model
{
    use HasFactory;

    protected $table = 'user_otp';

    protected $fillable = [
        'user_id', 'otp', 'email', 'type', 'is_verified'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
