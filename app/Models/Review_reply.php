<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review_reply extends Model
{
    use HasFactory;
    protected $table = 'reviews_replies';

    protected $fillable = [
        'review_id',
        'user_id',
        'property_id',
        'body',
        'created_at', 
        'updated_at',
    ];


}
