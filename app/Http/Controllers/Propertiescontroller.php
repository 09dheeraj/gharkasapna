<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property_type;
use App\Models\Vendor_properties;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\properties;



class Propertiescontroller extends Controller
{
    public function index(Request $request)
    {

        $title = 'COMMERICAL | PROPERTIES';
        $type = "Commercial";
        $status = "Published";
        $property_type = Property_type::where('property_type', $type)->get();
        $properties = Vendor_properties::where('looking_type', $type)->where('status', $status)->paginate(10);


        $query = Vendor_properties::query();

        if ($request->filled('search')) {
            $query->where('city', 'like', '%' . $request->input('search') . '%');
        }


        if ($request->filled('location') && $request->input('location') !== 'All Cities') {
            $query->where('city', 'like', '%' . $request->input('location') . '%');
        }

        if ($request->filled('min_price') || $request->filled('max_price')) {
            $minPrice = $request->input('min_price');
            $maxPrice = $request->input('max_price');

            if ($minPrice !== '' && $maxPrice !== '') {
                $query->whereBetween('expected_price', [$minPrice, $maxPrice]);
            } elseif ($minPrice !== '') {
                $query->where('expected_price', '>=', $minPrice);
            } elseif ($maxPrice !== '') {
                $query->where('expected_price', '<=', $maxPrice);
            }
        }

        if ($request->filled('min_sqft') || $request->filled('max_sqft')) {
            $minSqft = $request->input('min_sqft');
            $maxSqft = $request->input('max_sqft');

            if ($minSqft !== '' && $maxSqft !== '') {
                $query->whereBetween('carpet_area', [$minSqft, $maxSqft]);
            } elseif ($minSqft !== '') {
                $query->where('carpet_area', '>=', $minSqft);
            } elseif ($maxSqft !== '') {
                $query->where('carpet_area', '<=', $maxSqft);
            }
        }


        if ($request->filled('start_built') || $request->filled('end_built')) {
            $start_built = $request->input('start_built');
            $end_built = $request->input('end_built');

            if ($start_built !== '' && $end_built !== '') {
                $startDate = "$start_built-01-01 00:00:00";
                $endDate = "$end_built-12-31 23:59:59";

                $query->whereBetween('created_at', [$startDate, $endDate])
                    ->orWhereBetween('updated_at', [$startDate, $endDate]);
            } elseif ($start_built !== '') {
                $startDate = "$start_built-01-01 00:00:00";
                $endDate = "$start_built-12-31 23:59:59";

                $query->whereBetween('created_at', [$startDate, $endDate])
                    ->orWhereBetween('updated_at', [$startDate, $endDate]);
            } elseif ($end_built !== '') {
                $startDate = "$end_built-01-01 00:00:00";
                $endDate = "$end_built-12-31 23:59:59";

                $query->whereBetween('created_at', [$startDate, $endDate])
                    ->orWhereBetween('updated_at', [$startDate, $endDate]);
            }
        }


        if ($request->filled('beds') && $request->input('beds') !== 'on') {
            $query->where('beds', $request->input('beds'));
        }

        if ($request->filled('bath') && $request->input('bath') !== 'on') {
            $query->where('bath', $request->input('bath'));
        }

        if ($request->filled('type')) {
            $query->whereIn('property_type', $request->input('type'));
        }

        $searchDATA = $query->get();

        return view('home.commerical_property', compact('title', 'properties', 'property_type', 'searchDATA'));
    }




    public function view_single_commerical_property_detail($segmentID)
    {
        $data['title'] = 'SINGLE COMMERICAL | PROPERTIES';
        $type = "Commercial";
        $propertiesData['property'] = Properties::where('id', $segmentID)->get();
        $propertiesData['all_property'] = Properties::inRandomOrder()->limit(7)->get();
        $images['images'] = Properties::where('id', $segmentID)->paginate(4, ['images']);

        $mergedData = array_merge($data, $propertiesData, $images);
        return view('home.single_property_detail', $mergedData);
    }



    public function submit_property(Request $request)
    {

        $looking_to = $request->input('looking_to');
        $looking_type = $request->input('looking_type');
        $property_type = $request->input('property_type');
        $phone_number = $request->input('phone_number');
        $property_name = $request->input('property_name');
        $vendor = $request->input('vendor');
        $vendor_name = $request->input('vendor_name');
        $vendor_email = $request->input('vendor_email');
        $password = $request->input('password');
        $address = $request->input('address');
        $zipcode = $request->input('zipcode');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $beds = $request->input('beds');
        $bath = $request->input('bath');
        $balconies = $request->input('balconies');
        $carpet_area = $request->input('carpet_area');
        $carpet_area_type = $request->input('carpet_area_type');
        $super_built_up_area = $request->input('super_built_up_area');
        $super_built_up_area_type = $request->input('super_built_up_area_type');
        $built_up_area = $request->input('built_up_area');
        $built_up_area_type = $request->input('built_up_area_type');
        $other_room = $request->input('other_room');
        $furnishing = $request->input('furnishing');
        $covered_parking = $request->input('covered_parking');
        $open_parking = $request->input('open_parking');
        $total_floor = $request->input('total_floor');
        $property_on_floor = $request->input('property_on_floor');
        $availability_status = $request->input('availability_status');
        $age_of_property = $request->input('age_of_property');
        $ownership = $request->input('ownership');
        $expected_price = $request->input('expected_price');
        $price_per_sq_ft = $request->input('price_per_sq_ft');
        $monthly_rent = $request->input('monthly_rent');
        $extera_price = $request->input('extera_price');
        $amenities = $request->input('amenities');
        $property_features = $request->input('property_features');
        $society_building_feature = $request->input('society_building_feature');
        $additional_features = $request->input('additional_features');
        $water_source = $request->input('water_source');
        $overlooking = $request->input('overlooking');
        $other_features = $request->input('other_features');
        $power_backup = $request->input('power_backup');
        $property_facing = $request->input('property_facing');
        $type_of_flooring = $request->input('type_of_flooring');
        $nearby_landmarks = $request->input('nearby_landmarks');
        $usps_no = $request->input('usps_no');

        $roomsfeatures = !empty($other_room) ? implode(',', $other_room) : null;
        $Implodeextera_price = !empty($extera_price) ? implode(',', $extera_price) : null;
        $IMPLODEamenities = !empty($amenities) ? implode(',', $amenities) : null;
        $IMPLODEproperty_features = !empty($property_features) ? implode(',', $property_features) : null;
        $IMPLODEsociety_building_feature = !empty($society_building_feature) ? implode(',', $society_building_feature) : null;
        $IMPLODEadditional_features = !empty($additional_features) ? implode(',', $additional_features) : null;
        $IMPLODEwater_source = !empty($water_source) ? implode(',', $water_source) : null;
        $IMPLODEoverlooking = !empty($overlooking) ? implode(',', $overlooking) : null;
        $IMPLODEother_features = !empty($other_features) ? implode(',', $other_features) : null;
        $IMPLODEnearby_landmarks = !empty($nearby_landmarks) ? implode(',', $nearby_landmarks) : null;



        $propertyImages = [];

        if ($request->hasFile('property_img')) {
            foreach ($request->file('property_img') as $image) {
                if ($image->isValid()) {
                    $originalExtension = $image->getClientOriginalExtension();
                    $newExtension = 'webp';
                    $uniqueName = Str::random(20) . '.' . $newExtension;
                    $propertyImages[] = $uniqueName;

                    $imagePath = public_path('assets/property-images/' . $uniqueName);
                    $image->move(public_path('assets/property-images/'), $uniqueName);
                }
            }
        }

        $propertyImagesString = implode(',', $propertyImages);




        $propertyVideos = [];

        if ($request->hasFile('property_video')) {
            foreach ($request->file('property_video') as $video) {
                if ($video->isValid()) {
                    $uniqueNamevideo = Str::random(20) . '.' . $video->getClientOriginalExtension();
                    $video->move(public_path('assets/property-videos'), $uniqueNamevideo);
                    $propertyVideos[] = $uniqueNamevideo;
                }
            }
        }
        $propertyVideosString = implode(',', $propertyVideos);



        $user = User::create([
            'email' => $vendor_email,
            'password' => \Hash::make($password),
            'roles' => "vendor",
        ]);

        if (!$user) {
            return redirect('property')->with('error', 'Failed to create user. Please try again.');
        }

        $credentials = [
            'email' => $vendor_email,
            'password' => $password,
        ];



        if (Auth::attempt($credentials)) {

            $loggedInUser = Auth::user();
            $request->session()->put('user', $loggedInUser);

            $status = "Pending";
            $submitproperty =  Vendor_properties::create([
                'reg_id' => $loggedInUser->id,
                'looking_to' => $looking_to,
                'looking_type' => $looking_type,
                'property_type' => $property_type,
                'phone_number' => $phone_number,
                'vendor_type' => $vendor,
                'property_name' => $property_name,
                'vendor_name' => $vendor_name,
                'vendor_email' => $user->email,
                'password'  => $user->password,
                'address' =>  $address,
                'city' => $city,
                'state' => $state,
                'country' => $country,
                'zipcode' => $zipcode,
                'beds' => $beds,
                'bath' => $bath,
                'balconies' => $balconies,
                // 'garage' => 
                'carpet_area' => $carpet_area,
                'carpet_area_type' => $carpet_area_type,
                'super_built_up_area' => $super_built_up_area,
                'super_built_up_area_type' => $super_built_up_area_type,
                'built_up_area' => $built_up_area,
                'built_up_area_type' => $built_up_area_type,
                'other_room' => $roomsfeatures,
                'furnishing' => $furnishing,
                'covered_parking' => $covered_parking,
                'open_parking' => $open_parking,
                'total_floor' => $total_floor,
                'property_on_floor' => $property_on_floor,
                'availability_status' => $availability_status,
                'age_of_property' => $age_of_property,
                'ownership' => $ownership,
                'expected_price' => $expected_price,
                'price_per_sq_ft' => $price_per_sq_ft,
                'monthly_rent' => $monthly_rent,
                'extera_price' => $Implodeextera_price,
                'amenities' => $IMPLODEamenities,
                'property_features' => $IMPLODEproperty_features,
                'society_building_feature' => $IMPLODEsociety_building_feature,
                'additional_features' => $IMPLODEadditional_features,
                'water_source' => $IMPLODEwater_source,
                'overlooking' => $IMPLODEoverlooking,
                'other_features' => $IMPLODEother_features,
                'power_backup' => $power_backup,
                'property_facing' => $property_facing,
                'type_of_flooring' => $type_of_flooring,
                'nearby_landmarks' => $IMPLODEnearby_landmarks,
                'usps_no' => $usps_no,
                'property_images' => $propertyImagesString,
                'property_videos' => $propertyVideosString,
                'status' => $status,
            ]);


            if ($submitproperty) {
                return redirect('vendordashboard')->with('success', 'Property submitted successfully!');
            } else {
                return redirect('property')->with('error', 'Failed to submit property. Please try again.');
            }
        } else {
            return redirect('property')->with('error', 'Authentication failed. Please log in as a vendor.');
        }
    }


    public function checkvendormail(Request $request)
    {
        $email = $request->input('Email');
        $user = User::where('email', $email)->first();
        if ($user) {
            return response('exists');
        } else {
            return response('Email does not exist in the database');
        }
    }


    public function view_residential(Request $request)
    {
        $title = "RESIDENTIAL | PROPERTIES";
        $type = "residential";
        $status = "Published";
        $resideential_property = Vendor_properties::where('looking_type', $type)->where('status', $status)->paginate(10);
        $propertyType = Property_type::where('property_type', $type)->get();

        $query = Vendor_properties::query();

        if ($request->filled('search')) {
            $query->where('city', 'like', '%' . $request->input('search') . '%')->where('looking_type', $type);
        }


        if ($request->filled('location') && $request->input('location') !== 'All Cities') {
            $query->where('city', 'like', '%' . $request->input('location') . '%')->where('looking_type', $type);
        }


        if ($request->filled('min_price') || $request->filled('max_price')) {
            $minPrice = $request->input('min_price');
            $maxPrice = $request->input('max_price');

            if ($minPrice !== '' && $maxPrice !== '') {
                $query->whereBetween('expected_price', [$minPrice, $maxPrice]);
            } elseif ($minPrice !== '') {
                $query->where('expected_price', '>=', $minPrice)->where('looking_type', $type);
            } elseif ($maxPrice !== '') {
                $query->where('expected_price', '<=', $maxPrice)->where('looking_type', $type);
            }
        }


        if ($request->filled('min_sqft') || $request->filled('max_sqft')) {
            $minSqft = $request->input('min_sqft');
            $maxSqft = $request->input('max_sqft');

            if ($minSqft !== '' && $maxSqft !== '') {
                $query->whereBetween('carpet_area', [$minSqft, $maxSqft]);
            } elseif ($minSqft !== '') {
                $query->where('carpet_area', '>=', $minSqft)->where('looking_type', $type);
            } elseif ($maxSqft !== '') {
                $query->where('carpet_area', '<=', $maxSqft)->where('looking_type', $type);
            }
        }


        if ($request->filled('start_built') || $request->filled('end_built')) {
            $start_built = $request->input('start_built');
            $end_built = $request->input('end_built');

            if ($start_built !== '' && $end_built !== '') {
                $startDate = "$start_built-01-01 00:00:00";
                $endDate = "$end_built-12-31 23:59:59";

                $query->whereBetween('created_at', [$startDate, $endDate])
                    ->orWhereBetween('updated_at', [$startDate, $endDate])->where('looking_type', $type);
            } elseif ($start_built !== '') {
                $startDate = "$start_built-01-01 00:00:00";
                $endDate = "$start_built-12-31 23:59:59";

                $query->whereBetween('created_at', [$startDate, $endDate])
                    ->orWhereBetween('updated_at', [$startDate, $endDate])->where('looking_type', $type);
            } elseif ($end_built !== '') {
                $startDate = "$end_built-01-01 00:00:00";
                $endDate = "$end_built-12-31 23:59:59";

                $query->whereBetween('created_at', [$startDate, $endDate])
                    ->orWhereBetween('updated_at', [$startDate, $endDate])->where('looking_type', $type);
            }
        }


        if ($request->filled('beds') && $request->input('beds') !== 'on') {
            $query->where('beds', $request->input('beds'))->where('looking_type', $type);
        }

        if ($request->filled('bath') && $request->input('bath') !== 'on') {
            $query->where('bath', $request->input('bath'))->where('looking_type', $type);
        }

        if ($request->filled('type')) {
            $query->whereIn('property_type', $request->input('type'))->where('looking_type', $type);
        }

        $searchDATA = $query->get();

        return view("home.residential_property", compact('title', 'resideential_property', 'propertyType', 'searchDATA'));
    }



}
