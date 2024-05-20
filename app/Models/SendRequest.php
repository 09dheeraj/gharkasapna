<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendRequest extends Model
{
    use HasFactory;
    
    protected $table = 'requests';
    protected $fillable = ['user_id', 'vendor_id', 'property_id', 'status'];

    public function property()
    {
        return $this->belongsTo(properties::class, 'property_id', 'id');
    }

    public function user() {
        return $this->belongsTo(Authmodel::class, 'user_id', 'id');
    }

    public function vendor() {
        return $this->belongsTo(Authmodel::class, 'vendor_id', 'id');
    }

    // public function chat
  
}
