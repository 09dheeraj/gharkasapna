<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property_type extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'property_type',
        'created_at',
        'updated_at',
        'propertytype_image'
    ];
}
