<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavouriteProperty extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'reg_id',
        'user_id',
        'property_id',
        'comment',
        'created_at',
        'updated_at',
    ];

    public function property_data()
    {
        return $this->belongsTo(Vendor_properties::class, 'property_id');
    }


}
