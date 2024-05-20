<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OTPmodel extends Model
{
    use HasFactory;

    protected $table = 'otp'; 
    protected $fillable = ['reg_id', 'otp', 'expires_at'];

}
