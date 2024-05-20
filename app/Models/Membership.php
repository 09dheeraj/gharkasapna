<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $table = 'membership_plans';
    protected $fillable = ['plan_name', 'price', 'max_properties', 'features', 'status'];
}
