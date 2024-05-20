<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\UserOTP;
use App\Models\Property_type;
use App\Models\VendorOTP;
use App\Models\properties;
use App\Models\Authmodel;
use App\Models\OTPmodel;
use Illuminate\Support\Str;

class Authcontroller extends Controller
{



    
    public function veiw_new_add_property(Request $request)
    {
        $title = "POST PROPERTY | GHAR KA SAPNA";

        $userData = $request->session()->get('user');
        if (isset($userData)) {
            $vendorID = $userData['id'];
            return view('addproperty', compact('title', 'userData'));
        }

        return view('addproperty', compact('title'));
    }


    public function index(Request $request)
    {
        $email = $request->input('email');
        $username = explode('@', $email)[0];
        //echo $username;

        $user = User::create([
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'roles' => "user",
            'name' => $username
        ]);

        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {

            $authenticatedUser = Auth::user();
            $request->session()->put('user', $authenticatedUser);
            if ($authenticatedUser->roles === "user") {
                return redirect('userdashboard')->with('success', 'Logged in successfully as user!');
            } elseif ($authenticatedUser->roles === 'vendor') {
                return redirect('vendordashboard')->with('success', 'Logged in successfully as vendor!');
            } elseif ($authenticatedUser->roles === 'admin') {
                return redirect('admindashboard')->with('success', 'Logged in successfully as admin!');
            }
        }


        return redirect('/')->with('success', 'Registration successful');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $authenticatedUser = Auth::user();
            $request->session()->put('user', $authenticatedUser);
            if ($authenticatedUser->roles === "user") {
                return redirect('userdashboard')->with('success', 'Logged in successfully as user!');
            } elseif ($authenticatedUser->roles === 'vendor') {
                return redirect('vendordashboard')->with('success', 'Logged in successfully as vendor!');
            } elseif ($authenticatedUser->roles === 'admin') {
                return redirect('admindashboard')->with('success', 'Logged in successfully as admin!');
            }
        }

        return 'errorInvalid login details';
    }


    // -------------------------------------------------------------------------- user authentication  ------------------------------------------------------------------------- 


    public function otp_with_login(Request $request)
    {

        $phoneNumber = $request->input('phoneNumber');

        $user = User::where('phone', $phoneNumber)->first();



        if ($user !== null) {
            $role = $user->roles;
        } else {
            $user = User::create([
                'phone' => $phoneNumber,
                'roles' => 'user',
            ]);
            $role = 'user';
        }

        if ($role == 'user' || $role == 'vendor') {
            $user->update(['roles' => $role]);
        }




        $getPhoneNumber = $user->phone;
        $name = $user->first_name;
        // $userID = $user->id;


        if ($role == 'vendor') {
            $userOtp = $this->generateOtp($getPhoneNumber, $user->id, $user->roles);
        } else {
            $userOtp = $this->generateOtp($getPhoneNumber, $user->id, $user->roles);
        }

        if ($role == 'vendor') {

            $userOtp->VendorsendSMS($getPhoneNumber, $userOtp->otp, $name);
        } else {
            $userOtp->sendSMS($getPhoneNumber, $userOtp->user_otp);
        }

        $displayPhoneNumber = substr($getPhoneNumber, -5);

        $request->session()->put('phone', $getPhoneNumber);
        $request->session()->put('roles', $role);


        return response()->json([
            'success' => "Pleace enter the code send to  ... $displayPhoneNumber.",
            'phoneNumber' => $getPhoneNumber,
        ]);
    }

    public function generateOtp($getPhoneNumber, $userID, $role)
    {


        $now = now();

        if ($role == 'user') {

            $userOtp = UserOTP::where('user_id', $userID)->latest()->first();

            if ($userOtp && $now->isBefore($userOtp->expires_at)) {

                $userOtp->update([
                    'user_otp' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT),
                    'expires_at' => $now->addMinutes(10),
                ]);
                return $userOtp;
            } else {

                return UserOTP::create([
                    'user_id' => $userID,
                    'user_otp' =>  str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT),
                    'expires_at' => $now->addMinutes(10),
                    'phone' => $getPhoneNumber
                ]);
            }
        } elseif ($role == 'vendor') {

            $userOtp = VendorOTP::where('vendor_id', $userID)->latest()->first();

            if ($userOtp && $now->isBefore($userOtp->expires_at)) {

                $userOtp->update([
                    'otp' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT),
                    'expires_at' => $now->addMinutes(10),
                ]);
                return $userOtp;
            } else {

                return VendorOTP::create([
                    'vendor_id' => $userID,
                    'otp' =>  str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT),
                    'expires_at' => $now->addMinutes(10),
                    'phone' => $getPhoneNumber
                ]);
            }
        }
    }



    public function check_otp_with_user(Request $request)
    {
        $otp = $request->input('otp');
        $phoneNumber = $request->session()->get('phone');

        $user = User::where('phone', $phoneNumber)->first();

        if ($user->roles == 'user') {

            $checkOTP = UserOTP::where('user_otp', $otp)->where('phone', $phoneNumber)->exists();

            if ($checkOTP) {
                $authenticatedUser = User::where('phone', $phoneNumber)->first();
                if ($authenticatedUser) {
                    Auth::login($authenticatedUser);
                    $request->session()->put('user', $authenticatedUser);
                    if ($authenticatedUser->roles === "user") {
                        return redirect('userdashboard')->with('success', 'Logged in successfully as user!');
                    }
                }

                return redirect()->route('home.index')->with('error', 'Failed to authenticate user');
            }
        } elseif ($user->roles == 'vendor') {

            $checkOTP = VendorOTP::where('otp', $otp)->where('phone', $phoneNumber)->exists();

            if ($checkOTP) {
                $authenticatedUser = User::where('phone', $phoneNumber)->first();

                if ($authenticatedUser) {

                    Auth::login($authenticatedUser);

                    $request->session()->put('user', $authenticatedUser);

                    if ($authenticatedUser->roles === "vendor") {

                        return redirect('vendordashboard')->with('success', 'Logged in successfully as vendor!');
                    }
                }

                return redirect()->route('home.index')->with('error', 'Failed to authenticate user');
            }
        }




        return redirect()->back()->with('error', 'Failed to verify OTP');
    }




    public function logout()
    {
        \Session::flush();
        Auth::logout();
        return redirect('/')->with('success', 'Logged out successfully');
        // return "succcess";
    }


    // ---------------------------------------- admin authentication-------------------------------------------------

    public function view_admin_login()
    {

        return view('Admin.adminlogin');
    }


    public function admin_login(Request $request)
    {
        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {

            $authenticatedUser = Auth::user();
            $request->session()->put('user', $authenticatedUser);

            if ($authenticatedUser->roles === "admin") {
                return redirect('admindashboard')->with('success', 'Logged in successfully as admin!');
            }
        }
        return redirect()->back()->with('error', 'Invalid email or password');
    }



    // --------------------------------- vendor  authentication -------------------------




    public function vendor_otp_login(Request $request)
    {

        $phoneNumber = $request->input('phone_number');
        $name = $request->input('vendor_name');

        $vendor =  User::where('phone', $phoneNumber)->first();

        if ($vendor) {
            $vendor->update(['roles' => 'vendor']);
        } else {
            $vendor = User::create([
                'phone' => $phoneNumber,
                'first_name' => $name,
                'roles' => 'vendor',
            ]);
        }



        $getPhoneNumber = $vendor->phone;
        $vendorID = $vendor->id;
        $vendorName = $vendor->first_name;

        $userOtp = $this->vendor_genrate_otp($getPhoneNumber, $vendorID);
        $userOtp->VendorsendSMS($getPhoneNumber, $userOtp->otp, $vendorName);
        $displayPhoneNumber = substr($getPhoneNumber, -5);



        $request->session()->put('phone', $getPhoneNumber);
        $request->session()->put('roles', 'vendor');
        $request->session()->put('name', $vendorName);
        $request->session()->put('id', $vendorID);


        return response()->json([
            'success' => "Pleace enter the code send to  ... $displayPhoneNumber.",
            'name' => $vendorName
        ]);
    }


    public function vendor_genrate_otp($getPhoneNumber, $vendorID)
    {

        $now = now();

        $userOtp = VendorOTP::where('vendor_id', $vendorID)->latest()->first();

        if ($userOtp && $now->isBefore($userOtp->expires_at)) {

            $userOtp->update([
                'otp' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT),
                'expires_at' => $now->addMinutes(10),
            ]);
            return $userOtp;
        } else {

            return VendorOTP::create([
                'vendor_id' => $vendorID,
                'otp' =>  str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT),
                'expires_at' => $now->addMinutes(10),
                'phone' => $getPhoneNumber
            ]);
        }
    }

    public function vendor_verify_otp(Request $request)
    {

        $otpnumber = $request->input('otpNumber');
        $phoneNumber = $request->session()->get('phone');
        $checkOTP = VendorOTP::where('otp', $otpnumber)->where('phone', $phoneNumber)->exists();

        if ($checkOTP) {
            $authenticatedVendor = User::where('phone', $phoneNumber)->first();

            if ($authenticatedVendor) {
                Auth::login($authenticatedVendor);
                $request->session()->put('user', $authenticatedVendor);

                if ($authenticatedVendor->roles === "vendor") {

                    return response()->json([

                        'success' => "otp login success",
                    ]);
                }
            }
        }

        return response()->json([
            'error' => "failed"
        ]);
    }



    public function submit_test_property(Request $request)
    {

        $property_type = $request->input('property_type');
        $looking_to = $request->input('looking_to');
        $phone_number = $request->input('update_number');
        $vendor_name = $request->input('vendor_name');
        $city = $request->input('search_city');
        //  PG details 
        $PGproject_society = $request->input('project_society');
        $PG_locality = $request->input('locality');
        $PG_name = $request->input('pg_name');
        $totalBad = $request->input('total_beds');
        $PG_for = $request->input('pg_for');
        $PG_suited = $request->input('pg_suited_for');
        $PG_meals = $request->input('pg_meals');
        $meal_offerings = $request->input('meal_offerings');
        $meal_speciality = $request->input('meal_speciality');
        $PG_noticePeriod = $request->input('notice_period');
        $PG_lockPeriod = $request->input('lock_period');
        $PG_commonArea = $request->input('common_areas');
        $owner_detail = $request->input('owner_details');
        $stays_property = $request->input('stays_property');
        $non_veg = $request->input('pg_non_veg');
        $opposite_sex = $request->input('pg_sex');
        $any_time = $request->input('pg_time_allowed');
        $visitors_allowed = $request->input('visitors_allowed');
        $guardian = $request->input('guardian_allowed');
        $drink_smok = $request->input('drin_smok_allowed');
        $pg_room_type = $request->input('pg_room_type');
        $total_beds_this_room = $request->input('total_beds_this_room');
        $pg_rent = $request->input('pg_rent');
        $pg_security_deposit = $request->input('pg_security_deposit');
        $pg_facilities = $request->input('pg_facilities');
        $bath_style = $request->input('bath_style');
        $pg_onetime_move_charges = $request->input('pg_onetime_move_charges');
        $pg_meal_charges_month = $request->input('pg_meal_charges_month');
        $pg_electricity_charges_month = $request->input('pg_electricity_charges_month');
        $additional_info = $request->input('pg_additional_info');

        //  commerical property details

        $com_property_name = $request->input('com_property_name');
        $category_type_comm = $request->input('property_type_comm');
        $com_project_society = $request->input('project_society_comm');
        $com_locality = $request->input('locality_comm');
        $posession_status = $request->input('posession_status');
        $available_from = $request->input('available_from');
        $zone_type = $request->input('zone_type');
        $location_hub = $request->input('location_hub');
        $property_condition = $request->input('property_condition');
        $built_area_office = $request->input('built_area_office');
        $comm_built_up_area = $request->input('comm_built_up_area');
        $comm_carpet_area = $request->input('comm_carpet_area');
        $comm_area_width = $request->input('comm_area_width');
        $comm_area_height = $request->input('comm_area_height');
        $comm_located_near = $request->input('comm_located_near');
        $comm_plot_area = $request->input('comm_plot_area');
        $ownership = $request->input('ownership');
        $expected_rent = $request->input('expected_rent');
        $secuirty_deposite = $request->input('secuirty_deposite');
        $price = $request->input('price');
        $negotiable = $request->input('negotiable');
        $dg_ups_charge = $request->input('dg_ups_charge');
        $electricity_charges = $request->input('electricity_charges');
        $water_charges = $request->input('water_charges');
        $lock_in_period = $request->input('lock_in_period');
        $expected_rent_increase = $request->input('expected_rent_increase');
        $total_floors = $request->input('total_floors');
        $your_floor = $request->input('your_floor');
        $staircase = $request->input('staircase');
        $lifts_passengers = $request->input('lifts_staircases_passengers');
        $lifts_service = $request->input('lifts_staircases_service');
        $conference_room = $request->input('conference_room');
        $office_seats = $request->input('office_seats');
        $office_max_seats = $request->input('office_max_seats');
        $number_of_cabins = $request->input('number_of_cabins');
        $meeting_rooms = $request->input('meeting_rooms');
        $private_parking = $request->input('private_parking');
        $public_parking = $request->input('public_parking');
        $private_washrooms = $request->input('private_washrooms');
        $public_washrooms = $request->input('public_washrooms');
        $commerical_amenities = $request->input('commerical_amenities');
        //  residential property details 
        $res_property_name = $request->input('res_property_name');
        $category_type_Res = $request->input('category_type');
        $Res_project_society = $request->input('project_society_res');
        $Res_locality = $request->input('locality_res');
        $plot_area = $request->input('plot_area');
        $plot_area_unit = $request->input('area_unit');
        $plot_length = $request->input('plot_length');
        $plot_width = $request->input('plot_width');
        $total_property = $request->input('total_property');
        $Res_built_up_area = $request->input('built_up_area');
        $bathroom = $request->input('bath');
        $balconies = $request->input('balconies');
        $age_of_property = $request->input('age_of_property');
        $furnishing = $request->input('furnish_type');
        $Res_amenities = $request->input('residential_amenities');
        $monthly_rent = $request->input('monthly_rent');
        $available_from_res  = $request->input('available_from_res_rent');
        $resi_security_deposite = $request->input('resi_security_deposite');
        $res_sell_cost = $request->input('res_sell_cost');
        $res_constuction_status = $request->input('res_sell_constuction_status');
        $possion_date = $request->input('possion_date');



        $propertyImages = [];

        if ($request->hasFile('property_img')) {
            foreach ($request->file('property_img') as $image) {
                if ($image->isValid()) {
                    $originalExtension = $image->getClientOriginalExtension();
                    $newExtension = 'webp';
                    $uniqueName = Str::random(10) . '.' . $newExtension;
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
                    $uniqueNamevideo = Str::random(10) . '.' . $video->getClientOriginalExtension();
                    $video->move(public_path('assets/property-videos'), $uniqueNamevideo);
                    $propertyVideos[] = $uniqueNamevideo;
                }
            }
        }
        $propertyVideosString = implode(',', $propertyVideos);


        //non-null value for project_society
        if ($PGproject_society !== null) {
            $project_society = $PGproject_society;
        } elseif ($com_project_society !== null) {
            $project_society = $com_project_society;
        } else {
            $project_society = $Res_project_society;
        }

        // non-null value for locality
        if ($PG_locality !== null) {
            $locality = $PG_locality;
        } elseif ($com_locality !== null) {
            $locality = $com_locality;
        } else {
            $locality = $Res_locality;
        }

        // non-null value for rent 

        if ($pg_rent !== null) {
            $rent = $pg_rent;
        } elseif ($expected_rent !== null) {
            $rent = $expected_rent;
        } else {
            $rent = $monthly_rent;
        }

        // non-null value for security deposity 

        if ($pg_security_deposit !== null) {
            $secuirtyDeposite = $pg_security_deposit;
        } elseif ($secuirty_deposite !== null) {
            $secuirtyDeposite = $secuirty_deposite;
        } else {
            $secuirtyDeposite = $resi_security_deposite;
        }

        // non-null value for built up area 

        if ($built_area_office !== null) {
            $builtUpArea = $built_area_office;
        } elseif ($comm_built_up_area !== null) {
            $builtUpArea = $comm_built_up_area;
        } else {
            $builtUpArea = $Res_built_up_area;
        }

        // non-null value for total property

        if ($totalBad !== null) {
            $TotalProperty = $totalBad;
        } elseif ($total_floors !== null) {
            $TotalProperty = $total_floors;
        } else {
            $TotalProperty = $total_property;
        }

        // non-null value for amenites 

        if ($pg_facilities !== null) {
            $amenities = $pg_facilities;
        } elseif ($commerical_amenities !== null) {
            $amenities = $commerical_amenities;
        } else {
            $amenities = $Res_amenities;
        }



        $phoneNumber = $request->session()->get('phone');
        $vendorID = $request->session()->get('id');
        $roles = $request->session()->put('roles');

        // $property_Name = 
 
        $submitproperty = [

            'vendor_id' => $vendorID,
            'property_name' => $res_property_name ?: $com_property_name,
            'property_name' => $com_property_name ?: $res_property_name,
            'property_type' => $property_type,
            'looking_to' => $looking_to,
            'categories_type' => $category_type_comm ?: $category_type_Res,
            'categories_type' => $category_type_Res ?: $category_type_comm,
            'phone_number' => $phone_number,
            'vendor_name' => $vendor_name,
            'city' => $city,
            'project_society' => $project_society,
            'locality' => $locality,
            'rent' => $rent,
            'cost' => $price ?: $res_sell_cost,
            'cost' => $res_sell_cost ?: $price,
            'security_deposity' => $secuirtyDeposite,
            'available_from' => $available_from ?: $available_from_res,
            'available_from' => $available_from_res ?: $available_from,
            'lock_in_period' => $PG_lockPeriod ?: $lock_in_period,
            'lock_in_period' => $lock_in_period ?: $PG_lockPeriod,
            'built_up_area' => $builtUpArea,
            'carpet_area' => $comm_carpet_area ?: $plot_area_unit,
            'carpet_area' => $plot_area_unit ?: $comm_carpet_area,
            'plot_area' => $comm_plot_area ?: $plot_area,
            'plot_area' => $plot_area ?: $comm_plot_area,
            'area_width' => $comm_area_width ?: $plot_width,
            'area_width' => $plot_width ?: $comm_area_width,
            'area_height' => $comm_area_height ?: $plot_length,
            'area_height' => $plot_length ?: $comm_area_height,
            'ownership' => $owner_detail ?: $ownership,
            'ownership' => $ownership ?: $owner_detail,
            'construection_status' => $res_constuction_status ?: $property_condition,
            'construection_status' => $property_condition ?: $res_constuction_status,
            'total_property' => $TotalProperty,
            'pg_name' => $PG_name,
            'pg_for' => $PG_for,
            'suited_for' => $PG_suited,
            'meals_available' => $PG_meals,
            'meal_speciality' => $meal_speciality,
            'meal_offerings' => $meal_offerings,
            'notice_period' => $PG_noticePeriod,
            'common_areas' => $PG_commonArea,
            'stays' => $stays_property,
            'rules_non_veg' => $non_veg,
            'rules_opposite_sex' => $opposite_sex,
            'rules_any_time' => $any_time,
            'rules_visitors' => $visitors_allowed,
            'rules_guardian' => $guardian,
            'rules_drink_smok' => $drink_smok,
            'room_type' => $pg_room_type,
            'bed_in_room' => $total_beds_this_room,
            'bathroom_style' => $bath_style,
            'move_in_charge' => $pg_onetime_move_charges,
            'meal_charges' => $pg_meal_charges_month,
            'electricity_charges' => $pg_electricity_charges_month,
            'additional_information' => $additional_info,
            'bath' => $bathroom,
            'balconies' => $balconies,
            'age_of_property' => $age_of_property,
            'furnishing' => $furnishing,
            'posession_status' => $posession_status,
            'zone_type' => $zone_type,
            'location_hub' =>  $location_hub,
            'located_near' => $comm_located_near,
            'negotiable' => $negotiable,
            'dg_ups_charge' => $dg_ups_charge,
            'electricity_charges_include' => $electricity_charges,
            'water_charges' => $water_charges,
            'rent_increase' => $expected_rent_increase,
            'your_floor' => $your_floor,
            'staircase' => $staircase,
            'passengers_lifts' => $lifts_passengers,
            'service_lifts' => $lifts_service,
            'conference_room' => $conference_room,
            'min_seats' => $office_seats,
            'max_seats' => $office_max_seats,
            'cabins' => $number_of_cabins,
            'meeting_room' => $meeting_rooms,
            'private_parking' => $private_parking,
            'public_parking' => $public_parking,
            'private_washrooms' => $private_washrooms,
            'public_washrooms' => $public_washrooms,
            'amenites' => $amenities,
            'images' => $propertyImagesString,
            'videos' => $propertyVideosString,
            'status' => 'Pending',
        ];

        $property = properties::create($submitproperty);
        if ($property) {
            $authenticatedVendor = User::where('phone', $phoneNumber)->first();

            if ($authenticatedVendor) {
                Auth::login($authenticatedVendor);
                $request->session()->put('user', $authenticatedVendor);

                if ($authenticatedVendor->roles === "vendor") {

                    return redirect('vendordashboard')->with('success', 'Property submitted successfully!');
                }
            }
        }

        return redirect()->back()->withErrors(['message' => 'Your failure message here']);
    }



    // --------------------------------------- new function ----------------------------------

    public function admin_login_page()
    {

        $title = "Admin | Ghar ka sapna";
        return view('gharkasapna.home.admin_login', compact('title'));
    }

    public function check_admin_login(Request $request)
    {


        $phone = $request->input('phone');

        $admin = Authmodel::where('phone', $phone)->first();

        if ($admin) {
            $admin->update(['status' => '1']);

            $request->session()->put([
                'id' => $admin->id,
                'name' => $admin->name,
                'phone' => $admin->phone,
                'roles' => $admin->roles,
                'image' => $admin->image,
                'status' => $admin->status
            ]);

            return redirect()->route('gharkasapna.dashboard')->with('success', 'Logged in successfully as an administrator!');
        } else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Invalid Phone Number']);
        }
    }

    public function gernate_user_otp(Request $request)
    {


        $phone_number = $request->input('updatePhoneNumber');
        $userExists = Authmodel::where('phone', $phone_number)->first();

        if ($userExists) {

            $userOtp = $this->create_user_otp($userExists->id, $userExists->phone);
            $lastFourDigits = substr($phone_number, -4);
            return response()->json([
                'success' => "Pleace enter the code send to  ... $lastFourDigits.",
            ]);
        } else {

            $user = Authmodel::create([

                'phone' => $phone_number,
                'image' => 'portrait-dummy.png',
                'roles' => 'user',

            ]);
            $userOtp = $this->create_user_otp($user->id, $user->phone);

            $lastFourDigits = substr($phone_number, -4);
            return response()->json([
                'success' => "Pleace enter the code send to  ... $lastFourDigits.",
            ]);
        }
    }

    public function create_user_otp($ID, $phoneNumber)
    {

        $checkUser = OTPmodel::where('reg_id', $ID)->first();

        $now = now();

        if ($checkUser) {

            $checkUser->update([
                'otp' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT),
                'expires_at' => $now->addMinutes(10),
            ]);

            return $checkUser;
        } else {

            $createOTP =  OTPmodel::create([

                'reg_id' => $ID,
                'otp' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT),
                'expires_at' => $now->addMinutes(10)
            ]);

            return $createOTP;
        }
    }


    public function check_user_authentication(Request $request)
    {


        $otp_number = $request->input('otp_number');

        $checkOTP = OTPmodel::where('otp', $otp_number)->first();

        if ($checkOTP) {


            $update_status = Authmodel::where('id', $checkOTP->reg_id)->update(['status' => '1']);

            $user = Authmodel::find($checkOTP->reg_id);

            if ($user) {
                $request->session()->put([
                    'id' => $user->id,
                    'name' => $user->name,
                    'phone' => $user->phone,
                    'roles' => $user->roles,
                    'image' => $user->image,
                    'status' => $user->status
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Logged in successfully as user!',
                ]);
            }
        } else {

            return response()->json(['error' => 'Invalid OTP']);
        }
    }


    public function session_destroy()
    {

        $ID = session()->get('id');
        $update_status = Authmodel::where('id', $ID)->update(['status' => '0']);
        if ($update_status) {

            session()->flush();
            Auth::logout();
            return redirect()->route('new.index')->with('success', 'Logged out successfully');
        }
    }


    public function create_vendor(Request $request)
    {
        // print_r($request->all());
        $phone_number = $request->input('updateNumber');
        $vendor_name = $request->input('name');
        $vendorExists = Authmodel::where('phone', $phone_number)->first();

        if ($vendorExists) {


            $vendorOtp = $this->create_vendor_otp($vendorExists->id, $vendorExists->phone);
            $lastFourDigits = substr($phone_number, -4);
            return response()->json([
                'success' => "Pleace enter the code send to  ... $lastFourDigits.",
            ]);
        } else {

            $vendor = Authmodel::create([

                'phone' => $phone_number,
                'image' => 'portrait-dummy.png',
                'name' => $vendor_name,
                'roles' => 'user',
            ]);
            if ($vendor) {

                $request->session()->put([
                    'id' => $vendor->id,
                    'name' => $vendor->name,
                    'phone' => $vendor->phone,
                    'roles' => $vendor->roles,
                    'image' => $vendor->image,
                    'status' => $vendor->status
                ]);
            }

            $vendorOtp = $this->create_vendor_otp($vendor->id, $vendor->phone);



            $lastFourDigits = substr($phone_number, -4);
            return response()->json([
                'success' => "Pleace enter the code send to  ... $lastFourDigits.",
            ]);
        }
    }

    public function create_vendor_otp($ID, $phoneNumber)
    {

        $checkvendor = OTPmodel::where('reg_id', $ID)->first();
        $now = now();

        if ($checkvendor) {

            $checkvendor->update([
                'otp' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT),
                'expires_at' => $now->addMinutes(10),
            ]);

            return $checkvendor;
        } else {

            $createOTP =  OTPmodel::create([

                'reg_id' => $ID,
                'otp' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT),
                'expires_at' => $now->addMinutes(10)
            ]);

            return $createOTP;
        }
    }

    public function check_vendor_authentication(Request $request)
    {


        $otp_number = $request->input('otpNumber');
        $checkOTP = OTPmodel::where('otp', $otp_number)->first();

        if ($checkOTP) {


            $update_status = Authmodel::where('id', $checkOTP->reg_id)->update(['status' => '1']);

            $vendor = Authmodel::find($checkOTP->reg_id);

            if ($vendor) {
                $request->session()->put([
                    'id' => $vendor->id,
                    'name' => $vendor->name,
                    'phone' => $vendor->phone,
                    'roles' => $vendor->roles,
                    'image' => $vendor->image,
                    'status' => $vendor->status
                ]);
                return response()->json([
                    'success' => "success",
                    'message' => 'Logged in successfully as user!',

                ]);
            }
        } else {

            return response()->json([
                'success' => false,
                'error' => 'Invalid OTP',
            ], 400);
        }
    }

    public function submit_post_property(Request $request)
    {


        // dd($request->all());

        $property_type = $request->input('property_type');
        $looking_to = $request->input('looking_to');
        $phone_number = $request->input('update_number');
        $vendor_name = $request->input('vendor_name');
        $city = strtolower($request->input('search_city'));
        //  PG details 
        $PGproject_society = strtolower($request->input('project_society'));
        $PG_locality = strtolower($request->input('locality'));
        $PG_name = strtolower($request->input('pg_name'));
        $totalBad = $request->input('total_beds');
        $PG_for = $request->input('pg_for');
        $PG_suited = $request->input('pg_suited_for');
        $PG_meals = $request->input('pg_meals');
        $meal_offerings = $request->input('meal_offerings');
        $meal_speciality = $request->input('meal_speciality');
        $PG_noticePeriod = $request->input('notice_period');
        $PG_lockPeriod = $request->input('lock_period');
        $PG_commonArea = $request->input('common_areas');
        $owner_detail = $request->input('owner_details');
        $stays_property = $request->input('stays_property');
        $non_veg = $request->input('pg_non_veg');
        $opposite_sex = $request->input('pg_sex');
        $any_time = $request->input('pg_time_allowed');
        $visitors_allowed = $request->input('visitors_allowed');
        $guardian = $request->input('guardian_allowed');
        $drink_smok = $request->input('drin_smok_allowed');
        $pg_room_type = $request->input('pg_room_type');
        $total_beds_this_room = $request->input('total_beds_this_room');
        $pg_rent = $request->input('pg_rent');
        $pg_security_deposit = $request->input('pg_security_deposit');
        $pg_facilities = $request->input('pg_facilities');
        $bath_style = $request->input('bath_style');
        $pg_onetime_move_charges = $request->input('pg_onetime_move_charges');
        $pg_meal_charges_month = $request->input('pg_meal_charges_month');
        $pg_electricity_charges_month = $request->input('pg_electricity_charges_month');
        $additional_info = $request->input('pg_additional_info');

        //  commerical property details

        $com_property_name = $request->input('com_property_name');
        $category_type_comm = $request->input('property_type_comm');
        $com_project_society = $request->input('project_society_comm');
        $com_locality = $request->input('locality_comm');
        $posession_status = $request->input('posession_status');
        $available_from = $request->input('available_from');
        $zone_type = $request->input('zone_type');
        $location_hub = $request->input('location_hub');
        $property_condition = $request->input('property_condition');
        $built_area_office = $request->input('built_area_office');
        $comm_built_up_area = $request->input('comm_built_up_area');
        $comm_carpet_area = $request->input('comm_carpet_area');
        $comm_area_width = $request->input('comm_area_width');
        $comm_area_height = $request->input('comm_area_height');
        $comm_located_near = $request->input('comm_located_near');
        $comm_plot_area = $request->input('comm_plot_area');
        $ownership = $request->input('ownership');
        $expected_rent = $request->input('expected_rent');
        $secuirty_deposite = $request->input('secuirty_deposite');
        $price = $request->input('price');
        $negotiable = $request->input('negotiable');
        $dg_ups_charge = $request->input('dg_ups_charge');
        $electricity_charges = $request->input('electricity_charges');
        $water_charges = $request->input('water_charges');
        $lock_in_period = $request->input('lock_in_period');
        $expected_rent_increase = $request->input('expected_rent_increase');
        $total_floors = $request->input('total_floors');
        $your_floor = $request->input('your_floor');
        $staircase = $request->input('staircase');
        $lifts_passengers = $request->input('lifts_staircases_passengers');
        $lifts_service = $request->input('lifts_staircases_service');
        $conference_room = $request->input('conference_room');
        $office_seats = $request->input('office_seats');
        $office_max_seats = $request->input('office_max_seats');
        $number_of_cabins = $request->input('number_of_cabins');
        $meeting_rooms = $request->input('meeting_rooms');
        $private_parking = $request->input('private_parking');
        $public_parking = $request->input('public_parking');
        $private_washrooms = $request->input('private_washrooms');
        $public_washrooms = $request->input('public_washrooms');
        $commerical_amenities = $request->input('commerical_amenities');
        //  residential property details 
        $res_property_name = $request->input('res_property_name');
        $category_type_Res = $request->input('category_type');
        $Res_project_society = $request->input('project_society_res');
        $Res_locality = $request->input('locality_res');
        $plot_area = $request->input('plot_area');
        $plot_area_unit = $request->input('area_unit');
        $plot_length = $request->input('plot_length');
        $plot_width = $request->input('plot_width');
        $total_property = $request->input('total_property');
        $Res_built_up_area = $request->input('built_up_area');
        $bathroom = $request->input('bath');
        $bathRadio = $request->input('bathroom');
        $balconies = $request->input('balconies');
        $balconiesRadio = $request->input('balconiesRadio');
        $age_of_property = $request->input('age_of_property');
        $furnishing = $request->input('furnish_type');
        $Res_amenities = $request->input('residential_amenities');
        $monthly_rent = $request->input('monthly_rent');
        $available_from_res  = $request->input('available_from_res_rent');
        $resi_security_deposite = $request->input('resi_security_deposite');
        $res_sell_cost = $request->input('res_sell_cost');
        $res_constuction_status = $request->input('res_sell_constuction_status');
        $possion_date = $request->input('possion_date');



        $propertyImages = [];

        if ($request->hasFile('property_img')) {
            foreach ($request->file('property_img') as $image) {
                if ($image->isValid()) {
                    $originalExtension = $image->getClientOriginalExtension();
                    $newExtension = 'webp';
                    $uniqueName = Str::random(10) . '.' . $newExtension;
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
                    $uniqueNamevideo = Str::random(10) . '.' . $video->getClientOriginalExtension();
                    $video->move(public_path('assets/property-videos'), $uniqueNamevideo);
                    $propertyVideos[] = $uniqueNamevideo;
                }
            }
        }
        $propertyVideosString = implode(',', $propertyVideos);
        $updatecommonarea = !empty($PG_commonArea) && is_array($PG_commonArea) ? implode(',', $PG_commonArea) : '';
        $updatePG_Facilities = !empty($pg_facilities) && is_array($pg_facilities) ? implode(',', $pg_facilities) : '';
        $updatebath_style = !empty($bath_style) && is_array($bath_style) ? implode(',', $bath_style) : '';
        $updatemeal_offerings = !empty($meal_offerings) && is_array($meal_offerings) ? implode(',', $meal_offerings) : '';
        $updatemeal_speciality = !empty($meal_speciality) && is_array($meal_speciality) ? implode(',', $meal_speciality) : '';
        




       

        if (!empty($PGproject_society)) {
            $project_society = $PGproject_society;
        } elseif (!empty($com_project_society)) {
            $project_society = $com_project_society;
        } else {
            $project_society = $Res_project_society;
        }

       

        // non-empty value for locality
        if (!empty($PG_locality)) {
            $locality = $PG_locality;
        } elseif (!empty($com_locality)) {
            $locality = $com_locality;
        } else {
            $locality = $Res_locality;
        }





        // non-null value for rent 

        if ($pg_rent !== null) {
            $rent = $pg_rent;
        } elseif ($expected_rent !== null) {
            $rent = $expected_rent;
        } else {
            $rent = $monthly_rent;
        }

        // non-null value for security deposity 

        if ($pg_security_deposit !== null) {
            $secuirtyDeposite = $pg_security_deposit;
        } elseif ($secuirty_deposite !== null) {
            $secuirtyDeposite = $secuirty_deposite;
        } else {
            $secuirtyDeposite = $resi_security_deposite;
        }

        // non-null value for built up area 

        if ($built_area_office !== null) {
            $builtUpArea = $built_area_office;
        } elseif ($comm_built_up_area !== null) {
            $builtUpArea = $comm_built_up_area;
        } else {
            $builtUpArea = $Res_built_up_area;
        }

        // non-null value for total property

        if ($totalBad !== null) {
            $TotalProperty = $totalBad;
        } elseif ($total_floors !== null) {
            $TotalProperty = $total_floors;
        } else {
            $TotalProperty = $total_property;
        }

        // non-null value for amenites 

        if ($updatePG_Facilities !== null) {
            $amenities = $updatePG_Facilities;
        } elseif ($commerical_amenities !== null) {
            $amenities = $commerical_amenities;
        } else {
            $amenities = $Res_amenities;
        }
 
        // $phoneNumber = $request->session()->get('phone');
        $vendorID = session()->get('id');
        //   $vendorRole = $request->session()->get('roles');

        $submitproperty = [

            'vendor_id' => $vendorID,
            'property_type' => $property_type,
            'looking_to' => $looking_to,
            'categories_type' => $category_type_comm ?: $category_type_Res,
            'categories_type' => $category_type_Res ?: $category_type_comm,
            'phone_number' => $phone_number,
            'vendor_name' => $vendor_name,
            'city' => $city,
            'project_society' => str_replace(array(',', '-', '/', '.', '(', ')', ';'), '', $project_society),
            'locality' => str_replace(array(',', '-', '/', '.', '(', ')', ';'), '', $locality),
            'rent' => $rent,
            'cost' => $price ?: $res_sell_cost,
            'cost' => $res_sell_cost ?: $price,
            'security_deposity' => $secuirtyDeposite,
            'available_from' => $available_from ?: $available_from_res,
            'available_from' => $available_from_res ?: $available_from,
            'lock_in_period' => $PG_lockPeriod ?: $lock_in_period,
            'lock_in_period' => $lock_in_period ?: $PG_lockPeriod,
            'built_up_area' => $builtUpArea,
            'carpet_area' => $comm_carpet_area ?: $plot_area_unit,
            'carpet_area' => $plot_area_unit ?: $comm_carpet_area,
            'plot_area' => $comm_plot_area ?: $plot_area,
            'plot_area' => $plot_area ?: $comm_plot_area,
            'area_width' => $comm_area_width ?: $plot_width,
            'area_width' => $plot_width ?: $comm_area_width,
            'area_height' => $comm_area_height ?: $plot_length,
            'area_height' => $plot_length ?: $comm_area_height,
            'ownership' => $owner_detail ?: $ownership,
            'ownership' => $ownership ?: $owner_detail,
            'construection_status' => $res_constuction_status ?: $property_condition,
            'construection_status' => $property_condition ?: $res_constuction_status,
            'total_property' => $TotalProperty,
            'pg_name' => $PG_name,
            'pg_for' => $PG_for,
            'suited_for' => $PG_suited,
            'meals_available' => $PG_meals,
            'meal_speciality' => $updatemeal_speciality,
            'meal_offerings' => $updatemeal_offerings,
            'notice_period' => $PG_noticePeriod,
            'common_areas' => $updatecommonarea,
            'stays' => $stays_property,
            'rules_non_veg' => $non_veg,
            'rules_opposite_sex' => $opposite_sex,
            'rules_any_time' => $any_time,
            'rules_visitors' => $visitors_allowed,
            'rules_guardian' => $guardian,
            'rules_drink_smok' => $drink_smok,
            'room_type' => $pg_room_type,
            'bed_in_room' => $total_beds_this_room,
            'bathroom_style' => $updatebath_style,
            'move_in_charge' => $pg_onetime_move_charges,
            'meal_charges' => $pg_meal_charges_month,
            'electricity_charges' => $pg_electricity_charges_month,
            'additional_information' => $additional_info,
            'bath' => $bathroom ?: $bathRadio,
            'bath' => $bathRadio ?: $bathroom,
            'balconies' => $balconies ?: $balconiesRadio,
            'balconies' => $balconiesRadio ?: $balconies,
            'age_of_property' => $age_of_property,
            'furnishing' => $furnishing,
            'posession_status' => $posession_status,
            'zone_type' => $zone_type,
            'location_hub' =>  $location_hub,
            'located_near' => $comm_located_near,
            'negotiable' => $negotiable,
            'dg_ups_charge' => $dg_ups_charge,
            'electricity_charges_include' => $electricity_charges,
            'water_charges' => $water_charges,
            'rent_increase' => $expected_rent_increase,
            'your_floor' => $your_floor,
            'staircase' => $staircase,
            'passengers_lifts' => $lifts_passengers,
            'service_lifts' => $lifts_service,
            'conference_room' => $conference_room,
            'min_seats' => $office_seats,
            'max_seats' => $office_max_seats,
            'cabins' => $number_of_cabins,
            'meeting_room' => $meeting_rooms,
            'private_parking' => $private_parking,
            'public_parking' => $public_parking,
            'private_washrooms' => $private_washrooms,
            'public_washrooms' => $public_washrooms,
            'amenites' => $amenities,
            'images' => $propertyImagesString,
            'videos' => $propertyVideosString,
            'status' => 'Pending',
        ];
        $propertyName = '';

        if ($property_type == 'residential') {
            $propertyName .= 'Residential ';
        } else {
            $propertyName .= 'Commercial ';
        }
        

        if ($category_type_comm && $category_type_Res) {

            $propertyName .= $category_type_comm . ' '; 
        } elseif ($category_type_comm) {
            $propertyName .= $category_type_comm . ' ';
        } elseif ($category_type_Res) {
            $propertyName .= $category_type_Res . ' ';
        }
        $propertyName .= $city . ' ';
        $propertyName .= str_replace(array(',', '-', '/', '(', ')', ';', '.'), '', $project_society) . ' ';
        $propertyName .= str_replace(array(',',  '-', '/', '(', ')', ';', '.'), '', $locality) . ' ';

        if (!empty($builtUpArea)) {
            $propertyName .= $builtUpArea . ' ';
        } else {
            $propertyName .= 'sqft '; 
        }

        $propertyName .= $zone_type . ' ';
        $propertyName .= $location_hub . ' ';
        $propertyName .= $TotalProperty . ' ';
        $uniqueIdentifier = uniqid(); 
        $propertyName .= $uniqueIdentifier;
        $propertyName = trim(preg_replace('/\s+/', ' ', $propertyName));
        $propertyName = implode(' ', array_slice(explode(' ', $propertyName), 0, 12));
        
        $submitproperty['property_name'] = $propertyName;

        // dd($submitproperty);
        // die;

        
        $property = properties::create($submitproperty);

        if ($property) {
            $authenticatedVendor = Authmodel::find($vendorID);

            if ($authenticatedVendor) {
                if(session()->get('roles') !== 'admin'){
                $authenticatedVendor->status = 1;
                $authenticatedVendor->roles = 'vendor';
                $authenticatedVendor->save();
                }

                $request->session()->put([
                    'id' => $authenticatedVendor->id,
                    'name' => $authenticatedVendor->name,
                    'phone' => $authenticatedVendor->phone,
                    'roles' => $authenticatedVendor->roles,
                    'image' => $authenticatedVendor->image,
                    'status' => $authenticatedVendor->status,
                    'session_msg' => 'Success: A new property has been successfully added to the system. Please review and take any necessary actions.'
                ]);
                
                if(session()->get('roles') == 'admin') {

                    return redirect()->route('admin.properties')->with('success', 'Property submitted successfully!');
                } 

                return redirect()->route('mange.post_properties')->with('success', 'Property submitted successfully!');
            }
        }

        return redirect()->back()->withErrors(['message' => 'Your failure message here']);
    }


    public function temp_add_property(){
        $title = "Temp add property";
        return view('temp_add_property', compact('title'));
    }

  
}

