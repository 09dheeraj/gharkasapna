<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor_properties extends Model
{
    use HasFactory;

    protected $fillable = [
        'reg_id',
        'looking_to',
        'looking_type',
        'property_type',
        'phone_number',
        'vendor_type',
        'property_name',
        'vendor_name',
        'vendor_email',
        'password',
        'address',
        'city',
        'state',
        'country',
        'zipcode',
        'beds',
        'bath',
        'balconies',
        'garage',
        'carpet_area',
        'carpet_area_type',
        'super_built_up_area',
        'super_built_up_area_type',
        'built_up_area',
        'built_up_area_type',
        'other_room',
        'furnishing',
        'covered_parking',
        'open_parking',
        'total_floor',
        'property_on_floor',
        'availability_status',
        'age_of_property',
        'ownership',
        'expected_price',
        'price_per_sq_ft',
        'monthly_rent',
        'extera_price',
        'amenities',
        'property_features',
        'society_building_feature',
        'additional_features',
        'water_source',
        'overlooking',
        'other_features',
        'power_backup',
        'property_facing',
        'type_of_flooring',
        'nearby_landmarks',
        'usps_no',
        'property_images',
        'property_videos',
        'likeproperty',
        'status',
        'description',
        'created_at',
        'updated_at'
    ];

    public function propertyType()
    {
        return $this->belongsTo(Property_type::class, 'property_type');
    }

    public function vendor_Data()
    {
        return $this->belongsTo(User::class, 'reg_id');
    }






}
