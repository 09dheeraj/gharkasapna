<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'vender_id',
        'body',
        'review',
        'propertyID',
        'status',
        'created_at',
        'updated_at',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function userData() {
        return $this->belongsTo(Authmodel::class, 'user_id', 'id');
    }

    public function propertyData() {
        return $this->belongsTo(properties::class, 'propertyID', 'id');
    }
}
