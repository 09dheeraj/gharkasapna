<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likeproperty extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'vendor_id', 'property_id'];



    public function user_likeProperties() {
        // return $this->belongsTo(properties::class, 'id');
        return $this->belongsTo(properties::class, 'property_id', 'id');

    }


}
