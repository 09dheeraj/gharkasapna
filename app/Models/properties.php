<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class properties extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'property_name',
        'property_type', 
        'looking_to', 
        'categories_type',
        'phone_number',
        'vendor_name',
        'city',
        'project_society',
        'locality',
        'rent',
        'cost',
        'security_deposity',
        'available_from',
        'lock_in_period',
        'built_up_area',
        'carpet_area',
        'plot_area',
        'area_width',
        'area_height',
        'ownership', 
        'construection_status',
        'total_property',
        'pg_name',
        'pg_for',
        'suited_for',
        'meals_available',
        'meal_speciality',
        'meal_offerings',
        'notice_period',
        'common_areas', 
        'stays',
        'rules_non_veg',
        'rules_opposite_sex',
        'rules_any_time',
        'rules_visitors',
        'rules_guardian',
        'rules_drink_smok',
        'room_type',
        'bed_in_room',
        'bathroom_style',
        'move_in_charge',
        'meal_charges',
        'electricity_charges',
        'additional_information',
        'bath',
        'balconies',
        'age_of_property',
        'furnishing',
        'posession_status',
        'zone_type',
        'location_hub',
        'located_near',
        'negotiable',
        'dg_ups_charge',
        'electricity_charges_include',
        'water_charges',
        'rent_increase',
        'your_floor',
        'staircase',
        'passengers_lifts',
        'service_lifts',
        'conference_room',
        'min_seats',
        'max_seats',
        'cabins',
        'meeting_room',
        'private_parking',
        'public_parking',
        'private_washrooms',
        'public_washrooms',
        'amenites',
        'images',
        'videos',
        'status',
    ];

    public function vendor_information() {

        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function vendor_data() {

        return $this->belongsTo(Authmodel::class, 'vendor_id');
    }


}
