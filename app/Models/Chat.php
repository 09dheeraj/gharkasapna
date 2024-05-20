<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = ['sender_id', 'receiver_id', 'property_id', 'message'];

    // public function user($type = 'sender') {
    //     if ($type === 'sender') {
    //         return $this->belongsTo(Authmodel::class, 'sender_id', 'id');
    //     } elseif ($type === 'receiver') {
    //         return $this->belongsTo(Authmodel::class, 'receiver_id', 'id');
    //     } else {
    //         // Handle invalid type here
    //     }
    // }

    // public function vendor() {
    //     return $this->belongsTo(Authmodel::class, 'vendor_id', 'id');
    // }

    // public function user() {
    //     return $this->belongsTo(Authmodel::class, 'user_id', 'id');
    // }

    
}
