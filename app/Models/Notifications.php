<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;

    protected $table = 'notifications_table';
    protected $fillable = ['property_id', 'vendor_id', 'user_id', 'data'];

    public function property()
    {
        return $this->belongsTo(properties::class, 'property_id');
    }

    public function user(){
        return $this->belongsTo(Authmodel::class, 'user_id');
    }

}
