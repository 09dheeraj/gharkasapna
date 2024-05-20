<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property_type;
use App\Models\Vendor_properties;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\BlogComment;
use App\Models\Reviews;
use App\Models\Review_reply;
use App\Models\properties;
use App\Models\Likeproperty;
use App\Models\SendRequest;
use App\Models\Membership;




class Homecontroller extends Controller
{


    public function mirdulSaklani()
    {
        $title = "Add Property Ghar Ka Sapana";
        return view('mirdul_saklani', compact('title'));
    }
    // public function index($city = null)
    // {

    //     $title = 'GHAR KA SAPNA';

    //     if ($city == null) {
    //         $randomProperty = Vendor_properties::where('status', 'Published')
    //             ->where('looking_to', 'sell')
    //             ->inRandomOrder()
    //             ->paginate(4);
    //     } else {
    //         $randomProperty = Vendor_properties::where('status', 'Published')
    //             ->where('looking_to', 'sell')
    //             ->where('city', $city)
    //             ->inRandomOrder()
    //             ->paginate(4);
    //     }

    //     $randomPropertycity = Vendor_properties::where('status', 'Published')->where('looking_to', 'sell')->get();

    //     $popularCities = Vendor_properties::select('city')->where('looking_to', 'sell')->groupBy('city')->orderByRaw('COUNT(*) DESC')->limit(8)->pluck('city');

    //     $cityPropertyCounts = Vendor_properties::select('city', \DB::raw('COUNT(*) as property_count'))->where('looking_to', 'sell')->groupBy('city')->get();

    //     $citiesData = [];

    //     foreach ($popularCities as $cities) {
    //         $cityData = [
    //             'city' => $cities,
    //             'propertyCount' => $cityPropertyCounts->where('city', $cities)->first()->property_count ?? 0,
    //         ];

    //         $citiesData[] = $cityData;
    //     }


    //     return view('home.index', compact('title', 'randomProperty', 'randomPropertycity', 'citiesData'));
    // }

    // public function view_add_property()
    // {
    //     $data['title'] = 'ADD-PROPERTY | VENDOR';
    //     $property_type['property_type'] = Property_type::all();
    //     $mergedData = array_merge($data, $property_type);
    //     return view('home.add_property', $mergedData);
    // }





    // public function view_blog_list()
    // {

    //     $title = "BLOG - LIST | GHAR KA SAPNA ";
    //     $status = "Published";
    //     $blogDATA = Blog::where('status', $status)->inRandomOrder()->paginate(12);
    //     $categoryDATA = Category::inRandomOrder()->limit(10)->get();
    //     return view('home.blog_list', compact('title', 'blogDATA', 'categoryDATA'));
    // }


    // public function view_blog_detail($segmentName, $segmentID)
    // {

    //     $titleWithoutSlug = ucwords($segmentName) . " | GHAR KA SAPNA";
    //     $title = str_replace("-", ' ', $titleWithoutSlug);
    //     $BlogData = Blog::where('id', $segmentID)->first();
    //     $randomblog_DATA = Blog::inRandomOrder()->limit(3)->get();
    //     return view('home.blog_detail', compact('title', 'BlogData', 'randomblog_DATA'));
    // }

    // public function view_blog_category($segmentName, $segmentID)
    // {

    //     $title = $segmentName . " | GHAR KA SAPNA";
    //     $blogDATA = Blog::where('categories', $segmentID)->inRandomOrder()->paginate(12);
    //     $categoryDATA = Category::inRandomOrder()->limit(10)->get();
    //     return view('home.categories_detail', compact('title', 'blogDATA', 'categoryDATA'));
    // }



    // public function view_rent_section($city = null)
    // {
    //     $title = "RENT |  GHAR KA SAPNA";
    //     $Property_type = Property_type::all();
    //     $status = "Published";
    //     $looking_to = "rent";
    //     if ($city == null) {
    //         $randomProperty = Vendor_properties::where('status', $status)
    //             ->where('looking_to', $looking_to)
    //             ->inRandomOrder()
    //             ->paginate(4);
    //     } else {
    //         $randomProperty = Vendor_properties::where('status', $status)
    //             ->where('looking_to', $looking_to)
    //             ->where('city', $city)
    //             ->inRandomOrder()
    //             ->paginate(4);
    //     }
    //     $randomPropertycity = Vendor_properties::where('status', $status)->where('looking_to', $looking_to)->get();
    //     $popularCities = Vendor_properties::select('city')->where('looking_to', $looking_to)->groupBy('city')->orderByRaw('COUNT(*) DESC')->limit(8)->pluck('city');

    //     $cityPropertyCounts = Vendor_properties::select('city', \DB::raw('COUNT(*) as property_count'))->where('looking_to', $looking_to)->groupBy('city')->get();

    //     $citiesData = [];

    //     foreach ($popularCities as $cities) {
    //         $cityData = [
    //             'city' => $cities,
    //             'propertyCount' => $cityPropertyCounts->where('city', $cities)->first()->property_count ?? 0,
    //         ];

    //         $citiesData[] = $cityData;
    //     }

    //     return view('home.rent_property', compact('title', 'Property_type', 'randomProperty', 'randomPropertycity', 'citiesData'));
    // }



    // public function view_single_property($segmentID, $segmentName)
    // {

    //     $titleWithoutSlug = ucwords($segmentName) . " | GHAR KA SAPNA";
    //     $title = str_replace("-", ' ', $titleWithoutSlug);

    //     $propertiesData = Vendor_properties::where('id', $segmentID)->first();
    //     $PropertyType = $propertiesData->property_type;
    //     $propertydata = Property_type::where('id', $PropertyType)->first();
    //     $AllpropertiesData = Vendor_properties::inRandomOrder()->limit(10)->get();
    //     $reviewData = Reviews::where('propertyID', $segmentID)->paginate(2);
    //     return view('home.single_property', compact('title', 'propertiesData', 'propertydata', 'AllpropertiesData', 'reviewData'));
    // }


    // public function view_popular_search(Request $request)
    // {
    //     $looking_to = "rent";
    //     $selectedCity  = $request->input('selectedCity');

    //     $propertiesData = Vendor_properties::where('city', $selectedCity)->where('looking_to', $looking_to)->inRandomOrder()->get();

    //     if ($propertiesData->isNotEmpty()) {

    //         $responseData = [];

    //         foreach ($propertiesData as $property) {
    //             $responseData[] = [
    //                 'id' => $property->id,
    //                 'address' => $property->address,
    //             ];
    //         }

    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'City find successfully.',
    //             'popular_search' => $responseData,
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'No properties found for the selected city.',
    //             'popular_search' => [],
    //         ], 200);
    //     }
    // }


    // public function popular_search_index(Request $request)
    // {

    //     $looking_to = "sell";
    //     $selectedCity  = $request->input('selectedCity');

    //     $propertiesData = Vendor_properties::where('city', $selectedCity)->where('looking_to', $looking_to)->inRandomOrder()->get();

    //     if ($propertiesData->isNotEmpty()) {

    //         $responseData = [];

    //         foreach ($propertiesData as $property) {
    //             $responseData[] = [
    //                 'id' => $property->id,
    //                 'address' => $property->address,
    //             ];
    //         }

    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'City find successfully.',
    //             'popular_search' => $responseData,
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'No properties found for the selected city.',
    //             'popular_search' => [],
    //         ], 200);
    //     }
    // }


    // public function get_addresh_detail($segmentName)
    // {

    //     $decodesegmentName = str_replace("%20", ' ', $segmentName);
    //     $title = $decodesegmentName . " | GHAR KA SAPNA";
    //     $looking_to = "sell";

    //     $propertiesData = Vendor_properties::where('address', $decodesegmentName)->first();

    //     $cityName = $propertiesData->city;

    //     $getrandomData = Vendor_properties::where('city', $cityName)->where('looking_to', $looking_to)->inRandomOrder()->paginate(10);

    //     return  view('home.addresh_detail', compact('title', 'getrandomData'));
    // }


    // public function get_search_rent_data(Request $request)
    // {

    //     $looking_to = "rent";
    //     $selectedCity  = $request->input('selectedCity');

    //     $propertiesData = Vendor_properties::where('city', $selectedCity)->where('looking_to', $looking_to)->inRandomOrder()->get();

    //     if ($propertiesData->isNotEmpty()) {

    //         $responseData = [];

    //         foreach ($propertiesData as $property) {
    //             $responseData[] = [
    //                 'id' => $property->id,
    //                 'address' => $property->address,
    //             ];
    //         }

    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'City find successfully.',
    //             'popular_search' => $responseData,
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'No properties found for the selected city.',
    //             'popular_search' => [],
    //         ], 200);
    //     }
    // }


    // public function get_rent_properties($segmentName)
    // {
    //     $decodesegmentName = str_replace("%20", ' ', $segmentName);
    //     $title = $decodesegmentName . " | GHAR KA SAPNA";
    //     $looking_to = "rent";
    //     $propertiesData = Vendor_properties::where('address', $decodesegmentName)->first();
    //     $cityName = $propertiesData->city;

    //     $getrandomData = Vendor_properties::where('city', $cityName)->where('looking_to', $looking_to)->inRandomOrder()->paginate(10);

    //     return  view('home.rent_properties_detail', compact('title', 'getrandomData'));
    // }

    // public function view_pg_your_city($city = null)
    // {

    //     $title = "Paying Guest |  GHAR KA SAPNA";
    //     $Property_type = Property_type::all();
    //     $status = "Published";
    //     $looking_to = "pg";

    //     if ($city == null) {
    //         $randomProperty = Vendor_properties::where('status', $status)
    //             ->where('looking_to', $looking_to)
    //             ->inRandomOrder()
    //             ->paginate(4);
    //     } else {
    //         $randomProperty = Vendor_properties::where('status', $status)
    //             ->where('looking_to', $looking_to)
    //             ->where('city', $city)
    //             ->inRandomOrder()
    //             ->paginate(4);
    //     }
    //     $randomPropertycity = Vendor_properties::where('status', $status)->where('looking_to', $looking_to)->get();

    //     $popularCities = Vendor_properties::select('city')->where('looking_to', $looking_to)->groupBy('city')->orderByRaw('COUNT(*) DESC')->limit(8)->pluck('city');

    //     $cityPropertyCounts = Vendor_properties::select('city', \DB::raw('COUNT(*) as property_count'))->where('looking_to', $looking_to)->groupBy('city')->get();

    //     $citiesData = [];

    //     foreach ($popularCities as $cities) {
    //         $cityData = [
    //             'city' => $cities,
    //             'propertyCount' => $cityPropertyCounts->where('city', $cities)->first()->property_count ?? 0,
    //         ];

    //         $citiesData[] = $cityData;
    //     }


    //     return view('home.paying_guest', compact('title', 'Property_type', 'randomProperty', 'randomPropertycity', 'citiesData'));
    // }

    // public function get_paying_guest_Data(Request $request)
    // {

    //     $looking_to = "pg";
    //     $selectedCity  = $request->input('selectedCity');

    //     $propertiesData = Vendor_properties::where('city', $selectedCity)->where('looking_to', $looking_to)->inRandomOrder()->get();

    //     if ($propertiesData->isNotEmpty()) {

    //         $responseData = [];

    //         foreach ($propertiesData as $property) {
    //             $responseData[] = [
    //                 'id' => $property->id,
    //                 'address' => $property->address,
    //             ];
    //         }

    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'City find successfully.',
    //             'popular_search' => $responseData,
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'No properties found for the selected city.',
    //             'popular_search' => [],
    //         ], 200);
    //     }
    // }

    // public function get_pg_DATA($segmentName)
    // {

    //     $decodesegmentName = str_replace("%20", ' ', $segmentName);
    //     $title = "PG for sale and rent in " . $decodesegmentName . " | GHAR KA SAPNA";
    //     $looking_to = "pg";
    //     $propertiesData = Vendor_properties::where('address', $decodesegmentName)->first();
    //     $cityName = $propertiesData->city;

    //     $getrandomData = Vendor_properties::where('city', $cityName)->where('looking_to', $looking_to)->inRandomOrder()->paginate(10);

    //     return  view('home.paying_guest_detail', compact('title', 'getrandomData'));
    // }


    // public function view_commerical_properties($city = null)
    // {
    //     $title = "Commercial Property for sale and rent in " . $city . " |  GHAR KA SAPNA";
    //     $Property_type = Property_type::all();
    //     $status = "Published";
    //     $looking_type = "commercial";
    //     if ($city == null) {
    //         $randomProperty = Vendor_properties::where('status', $status)
    //             ->where('looking_type', $looking_type)
    //             ->inRandomOrder()
    //             ->paginate(4);
    //     } else {
    //         $randomProperty = Vendor_properties::where('status', $status)
    //             ->where('looking_type', $looking_type)
    //             ->where('city', $city)
    //             ->inRandomOrder()
    //             ->paginate(4);
    //     }
    //     $randomPropertycity = Vendor_properties::where('status', $status)->where('looking_type', $looking_type)->get();

    //     $popularCities = Vendor_properties::select('city')->where('looking_type', $looking_type)->groupBy('city')->orderByRaw('COUNT(*) DESC')->limit(8)->pluck('city');

    //     $cityPropertyCounts = Vendor_properties::select('city', \DB::raw('COUNT(*) as property_count'))->where('looking_type', $looking_type)->groupBy('city')->get();

    //     $citiesData = [];

    //     foreach ($popularCities as $cities) {
    //         $cityData = [
    //             'city' => $cities,
    //             'propertyCount' => $cityPropertyCounts->where('city', $cities)->first()->property_count ?? 0,
    //         ];

    //         $citiesData[] = $cityData;
    //     }

    //     return view('home.commerical_properties', compact('title', 'Property_type', 'randomProperty', 'randomPropertycity', 'citiesData'));
    // }

    // public function view_commerical_properties_detail(Request $request)
    // {

    //     $looking_type = "commercial";
    //     $selectedCity  = $request->input('selectedCity');

    //     $propertiesData = Vendor_properties::where('city', $selectedCity)->where('looking_type', $looking_type)->inRandomOrder()->get();

    //     if ($propertiesData->isNotEmpty()) {

    //         $responseData = [];

    //         foreach ($propertiesData as $property) {
    //             $responseData[] = [
    //                 'id' => $property->id,
    //                 'address' => $property->address,
    //             ];
    //         }

    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'City find successfully.',
    //             'popular_search' => $responseData,
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'No properties found for the selected city.',
    //             'popular_search' => [],
    //         ], 200);
    //     }
    // }

    // public function get_commerical_detailDATA($segmentName)
    // {
    //     $decodesegmentName = str_replace("%20", ' ', $segmentName);
    //     $title = $decodesegmentName . " | GHAR KA SAPNA";
    //     $looking_type = "commercial";
    //     $propertiesData = Vendor_properties::where('address', $decodesegmentName)->first();
    //     $cityName = $propertiesData->city;

    //     $getrandomData = Vendor_properties::where('city', $cityName)->where('looking_type', $looking_type)->inRandomOrder()->paginate(10);

    //     return  view('home.commerical_properties_detail', compact('title', 'getrandomData'));
    // }

    // public function view_residential_home($city = null)
    // {

    //     $title = "Residential Property for sale and rent in " . $city . " |  GHAR KA SAPNA";
    //     $Property_type = Property_type::all();
    //     $status = "Published";
    //     $looking_type = "residential";
    //     if ($city == null) {
    //         $randomProperty = Vendor_properties::where('status', $status)
    //             ->where('looking_type', $looking_type)
    //             ->inRandomOrder()
    //             ->paginate(4);
    //     } else {
    //         $randomProperty = Vendor_properties::where('status', $status)
    //             ->where('looking_type', $looking_type)
    //             ->where('city', $city)
    //             ->inRandomOrder()
    //             ->paginate(4);
    //     }

    //     $randomPropertycity = Vendor_properties::where('status', $status)->where('looking_type', $looking_type)->get();


    //     $popularCities = Vendor_properties::select('city')->where('looking_type', $looking_type)->groupBy('city')->orderByRaw('COUNT(*) DESC')->limit(8)->pluck('city');

    //     $cityPropertyCounts = Vendor_properties::select('city', \DB::raw('COUNT(*) as property_count'))->where('looking_type', $looking_type)->groupBy('city')->get();

    //     $citiesData = [];

    //     foreach ($popularCities as $cities) {
    //         $cityData = [
    //             'city' => $cities,
    //             'propertyCount' => $cityPropertyCounts->where('city', $cities)->first()->property_count ?? 0,
    //         ];

    //         $citiesData[] = $cityData;
    //     }

    //     return view('home.residential_home', compact('title', 'Property_type', 'randomProperty', 'randomPropertycity', 'citiesData'));
    // }


    // public function search_residential_DATA(Request $request)
    // {

    //     $looking_type = "residential";
    //     $selectedCity  = $request->input('selectedCity');

    //     $propertiesData = Vendor_properties::where('city', $selectedCity)->where('looking_type', $looking_type)->inRandomOrder()->get();

    //     if ($propertiesData->isNotEmpty()) {

    //         $responseData = [];

    //         foreach ($propertiesData as $property) {
    //             $responseData[] = [
    //                 'id' => $property->id,
    //                 'address' => $property->address,
    //             ];
    //         }

    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'City find successfully.',
    //             'popular_search' => $responseData,
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'No properties found for the selected city.',
    //             'popular_search' => [],
    //         ], 200);
    //     }
    // }

    // public function view_residential_detail($segmentName)
    // {
    //     $decodesegmentName = str_replace("%20", ' ', $segmentName);
    //     $title = $decodesegmentName . " | GHAR KA SAPNA";
    //     $looking_type = "residential";
    //     $status = "Published";
    //     $propertiesData = Vendor_properties::where('address', $decodesegmentName)->first();
    //     $cityName = $propertiesData->city;

    //     $getrandomData = Vendor_properties::where('city', $cityName)->where('looking_type', $looking_type)->where('status', $status)->inRandomOrder()->paginate(10);

    //     return  view('home.residential_detail', compact('title', 'getrandomData'));
    // }


    // public function find_search_city(Request $request)
    // {
    //     $addresh = $request->input('search_addresh');
    //     $city = $request->segment(2);
    //     $status = "Published";
    //     $looking_to = "sell";

    //     $getrandomcityData = Vendor_properties::where('address', $addresh)
    //         ->where('status', $status)
    //         ->where('looking_to', $looking_to)
    //         ->inRandomOrder()
    //         ->paginate(10);



    //     if ($getrandomcityData->isEmpty()) {
    //         $getrandomcityData = Vendor_properties::where('city', $city)
    //             ->where('status', $status)
    //             ->where('looking_to', $looking_to)
    //             ->inRandomOrder()
    //             ->paginate(10);
    //     }

    //     $title = $city . " | GHAR KA SAPNA";
    //     $message = $getrandomcityData->isEmpty() ? 'No properties found for the given city.' : '';

    //     return view('home.search_data', compact('title', 'getrandomcityData', 'message'));
    // }


    // public function find_rent_properties($cityName, $searchText)
    // {
    //     $status = "Published";
    //     $lookingTo = "rent";

    //     $searchTextData = Vendor_properties::where('address', $searchText)
    //         ->where('status', $status)
    //         ->where('looking_to', $lookingTo)
    //         ->inRandomOrder()
    //         ->paginate(10);

    //     if ($searchTextData->isEmpty()) {
    //         $getsearchData = Vendor_properties::where('city', $cityName)
    //             ->where('status', $status)
    //             ->where('looking_to', $lookingTo)
    //             ->inRandomOrder()
    //             ->paginate(10);

    //         $searchTextData = null;
    //     } else {
    //         $getsearchData = null;
    //     }

    //     $title = $cityName . " | GHAR KA SAPNA";
    //     $message = ($searchTextData === null && $getsearchData === null) ? 'No properties found.' : $searchText;

    //     return view('home.search_data_rent', compact('title', 'getsearchData', 'message', 'searchTextData'));
    // }


    // public function find_pg($cityName, $searchText)
    // {

    //     $status = "Published";
    //     $lookingTo = "pg";

    //     $searchTextData = Vendor_properties::where('address', $searchText)
    //         ->where('status', $status)
    //         ->where('looking_to', $lookingTo)
    //         ->inRandomOrder()
    //         ->paginate(10);


    //     if ($searchTextData->isEmpty()) {
    //         $getsearchData = Vendor_properties::where('city', $cityName)
    //             ->where('status', $status)
    //             ->where('looking_to', $lookingTo)
    //             ->inRandomOrder()
    //             ->paginate(10);
    //         $searchTextData = null;
    //     } else {
    //         $getsearchData = null;
    //     }

    //     $title = "PG in " . $cityName . " | GHAR KA SAPNA";
    //     $message = ($searchTextData === null && $getsearchData === null) ? 'No properties found.' : $searchText;
    //     return view('home.search_data_paying_guest', compact('title', 'getsearchData', 'message', 'searchTextData'));
    // }

    // public function find_buy_commercial($cityName, $searchText)
    // {

    //     $status = "Published";
    //     $looking_type = "commercial";

    //     $searchTextData = Vendor_properties::where('address', $searchText)
    //         ->where('status', $status)
    //         ->where('looking_type', $looking_type)
    //         ->inRandomOrder()
    //         ->paginate(10);


    //     if ($searchTextData->isEmpty()) {
    //         $getsearchData = Vendor_properties::where('city', $cityName)
    //             ->where('status', $status)
    //             ->where('looking_type', $looking_type)
    //             ->inRandomOrder()
    //             ->paginate(10);
    //         $searchTextData = null;
    //     } else {
    //         $getsearchData = null;
    //     }

    //     $title = "Commercial Property for Sale in " . $cityName . " | GHAR KA SAPNA";
    //     $message = ($searchTextData === null && $getsearchData === null) ? 'No properties found.' : $searchText;
    //     return view('home.search_data_paying_guest', compact('title', 'getsearchData', 'message', 'searchTextData'));
    // }


    // public function find_buy_residential($cityName, $searchText)
    // {

    //     $status = "Published";
    //     $looking_type = "residential";

    //     $searchTextData = Vendor_properties::where('address', $searchText)
    //         ->where('status', $status)
    //         ->where('looking_type', $looking_type)
    //         ->inRandomOrder()
    //         ->paginate(10);


    //     if ($searchTextData->isEmpty()) {
    //         $getsearchData = Vendor_properties::where('city', $cityName)
    //             ->where('status', $status)
    //             ->where('looking_type', $looking_type)
    //             ->inRandomOrder()
    //             ->paginate(10);
    //         $searchTextData = null;
    //     } else {
    //         $getsearchData = null;
    //     }

    //     $title = "Residential Property for Sale in " . $cityName . " | GHAR KA SAPNA";
    //     $message = ($searchTextData === null && $getsearchData === null) ? 'No properties found.' : $searchText;
    //     return view('home.search_data_paying_guest', compact('title', 'getsearchData', 'message', 'searchTextData'));
    // }

    // public function find_property_type_properties($segmentpageName = null, $segmentName = null, Request $request)
    // {

    //     $replacesegmentName = str_replace("-", ' ', $segmentName);

    //     $title = $segmentpageName . ' ' . $segmentName . "Properties | GHAR KA SAPNA";

    //     $PropertytypeData  = Property_type::where('name', $replacesegmentName)->first();

    //     $propertyID = $PropertytypeData->id;

    //     if ($segmentpageName == 'commercial' || $segmentpageName == 'residential') {
    //         $propertiesData = Vendor_properties::where('property_type', $propertyID)->where('looking_type', $segmentpageName)->where('status', 'Published')->inRandomOrder()->paginate(10);
    //     } else {

    //         $propertiesData = Vendor_properties::where('property_type', $propertyID)->where('looking_to', $segmentpageName)->where('status', 'Published')->inRandomOrder()->paginate(10);
    //     }

    //     $message = $propertiesData->isEmpty() ? $replacesegmentName . " Properties not found." : null;


    //     // if ($request->filled('search')) {
    //     //     $typeDATA->where('name', 'LIKE', "%$searchTerm%");
    //     //   }
    //     // $typeDATA =  Property_type::all();

    //     // if ($request->filled('search')) {
    //     //     $typeDATA->where('name', 'LIKE', "%$searchTerm%");
    //     //   }
    //     // $typeDATA = $request->input('search');
    //     // $typeDATA = Property_type::where('name', 'LIKE', "%$typeDATA%")->get();


    //     // $typeDATA = Vendor_properties::all();

    //     return view('home.property_type_allproperties_detail', compact('title', 'propertiesData', 'message'));
    // }

    // public function view_html_addProperty()
    // {

    //     $title = "Add PROPERTY | GHAR KA SAPNA";
    //     return view('html_add_property', compact('title'));
    // }


    // public function view_listing($segmentName)
    // {
    //     $title = $segmentName . " | GHAR KA SAPNA";
    //     // $categories = properties::where('categories_type')->get();
    //     // $categories = $request->input('categories_type');
    //     // $propertiesDataQuery = properties::whereIn('categories_type', $categories)
    //     $Properties = properties::Where('categories_type', $segmentName)->paginate(8);
    //     // $Properties = properties::where('id', $request->id)->orWhere('property_type', 'residential')->orWhere('property_type', 'flat') ->paginate(8);
    //     dd($Properties);
    //     return view('home.listing', compact('title', 'Properties'));
    // }













    // ---------------- new function ----------------------------------------------


    public function view_about_us()
    {
        $title = 'Discover Our Story | Ghar Ka Sapna';
        return view('gharkasapna.home.about_us', compact('title'));
    }


    public function view_contact_us()
    {

        $title = 'Get in Touch with Ghar Ka Sapna';

        return view('gharkasapna.home.contact_us', compact('title'));
    }

    public function new_index_view($city = null)
    {


        if ($city == null) {

            $title = "PROPERTIES BY CITIES | GHAR KA SAPNA";
            $propertyTitle = "Properties by Cities";
            $randomcityDATA = properties::where('status', 'Published')->where('looking_to', 'sell')->where('property_type', 'residential')->where('categories_type', '!=', 'plot')->inRandomOrder()->paginate(4);
            $cities = properties::where('status', 'Published')->where('looking_to', 'sell')->where('property_type', 'residential')->inRandomOrder()->get();
        } else {

            $title = "PROPERTIES IN " . ucwords($city) . " | GHAR KA SAPNA";
            $propertyTitle = "Properties in " . ucwords($city);

            $randomcityDATA = properties::where('status', 'Published')->where('looking_to', 'sell')->where('city', $city)->where('property_type', 'residential')->where('categories_type', '!=', 'plot')->inRandomOrder()->paginate(4);
            $cities = properties::where('status', 'Published')->where('looking_to', 'sell')->where('property_type', 'residential')->inRandomOrder()->get();
        }

        return  view('gharkasapna.home.index', compact('title', 'randomcityDATA', 'propertyTitle', 'city', 'cities'));
    }




    public function new_view_rent_properties($city = null)
    {

        if ($city == null) {

            $title = "Explore Rental Properties Across Cities | GHAR KA SAPNA";
            $propertyTitle = "Explore Rental Properties Across Cities";
            $randomcityDATA = properties::where('status', 'Published')->where('looking_to', 'rent')->where('property_type', 'residential')->where('categories_type', '!=', 'plot')->inRandomOrder()->paginate(4);
            $cities = properties::where('status', 'Published')->where('looking_to', 'rent')->where('property_type', 'residential')->inRandomOrder()->get();
        } else {

            $title = ucwords(str_replace('_', ' ', $city)) . " Rental Properties | GHAR KA SAPNA";
            $propertyTitle = ucwords(str_replace('_', ' ', $city)) . " Rental Properties";

            $randomcityDATA = properties::where('status', 'Published')->where('looking_to', 'rent')->where('city', str_replace('_', ' ', $city))->where('property_type', 'residential')->where('categories_type', '!=', 'plot')->inRandomOrder()->paginate(4);
            $cities = properties::where('status', 'Published')->where('looking_to', 'rent')->where('property_type', 'residential')->inRandomOrder()->get();
        }

        return view('gharkasapna.home.rent_index', compact('title', 'randomcityDATA', 'propertyTitle', 'city', 'cities'));
    }


    public function new_view_paying_guests($city = null)
    {
        if ($city == null) {


            $title = "Find Your Perfect Paying Guest Accommodation | Ghar Ka Sapna";
            $propertyTitle = "Explore Our PG Accommodations";
            $randomcityDATA = properties::where('status', 'Published')->where('looking_to', 'pg')->inRandomOrder()->paginate(4);
            $cities = properties::where('status', 'Published')->where('looking_to', 'pg')->where('property_type', 'residential')->inRandomOrder()->get();
            return view('gharkasapna.home.paying_guests_index', compact('title', 'propertyTitle', 'randomcityDATA', 'cities'));
        } else {

            $cityName = ucfirst(str_replace('_', ' ', $city));
            $title = "Find Your Perfect Paying Guest Accommodation in $cityName | Ghar Ka Sapna";
            $propertyTitle = "Explore PG Accommodations in $cityName";
            $randomcityDATA = properties::where('status', 'Published')->where('looking_to', 'pg')->where('city', str_replace('_', ' ', $city))->inRandomOrder()->paginate(4);
            $cities = properties::where('status', 'Published')->where('looking_to', 'pg')->where('property_type', 'residential')->inRandomOrder()->get();
            return view('gharkasapna.home.paying_guests_index', compact('title', 'propertyTitle', 'randomcityDATA', 'cities', 'city'));
        }
    }

    public function commercial_index_view($city = null)
    {

        if ($city == null) {
            $title = 'Explore Commercial Properties for Sale or Rent | Ghar Ka Sapna';
            $propertyTitle = 'Discover Our Range of Commercial Properties';
            $randomcityDATA = properties::where('status', 'Published')->where('property_type', 'commercial')->inRandomOrder()->take(4)->get();
            $cities = properties::where('status', 'Published')->where('property_type', 'commercial')->inRandomOrder()->get();

            return view('gharkasapna.home.commercial_index', compact('title', 'propertyTitle', 'randomcityDATA', 'cities'));
        } else {
            $title = "Explore Commercial Properties in $city | Ghar Ka Sapna";
            $propertyTitle = "Discover Commercial Properties in $city";
            $randomcityDATA = properties::where('status', 'Published')->where('city', $city)->where('property_type', 'commercial')->inRandomOrder()->take(4)->get();
            $cities = properties::where('status', 'Published')->where('property_type', 'commercial')->inRandomOrder()->get();
            return view('gharkasapna.home.commercial_index', compact('title', 'propertyTitle', 'randomcityDATA', 'cities'));
        }
    }

    public function view_plot_index($city = null)
    {

        if ($city == null) {

            $title = 'Explore Available Plots - Find Your Ideal Land | Ghar Ka Sapna';
            $propertyTitle = 'Discover Our Range of Available Plots';
            $randomcityDATA = properties::where('categories_type', 'plot')->where('status', 'Published')->inRandomOrder()->take(4)->get();
            $cities = properties::where('status', 'Published')->where('categories_type', 'plot')->inRandomOrder()->get();
            return view('gharkasapna.home.plot_index', compact('title', 'propertyTitle', 'randomcityDATA', 'cities'));
        } else {
            $title = "Explore Plots in $city - Find Your Ideal Land | Ghar Ka Sapna";
            $propertyTitle = "Discover Our Range of Plots in $city";
            $randomcityDATA = properties::where('categories_type', 'plot')->where('status', 'Published')->where('city', $city)->inRandomOrder()->take(4)->get();
            $cities = properties::where('status', 'Published')->where('categories_type', 'plot')->inRandomOrder()->get();
            return view('gharkasapna.home.plot_index', compact('title', 'propertyTitle', 'randomcityDATA', 'cities'));
        }
    }



    public function all_property_listing(Request $request, $city = null)
    {
        $segment = $request->segment(1);


        if ($segment == 'all-properties-buy') {

            if ($city == null) {

                $title = "ALL PROPERTIES BY CITIES | GHAR KA SAPNA";
                $pageTitle = "Homes for Sale";
                $randomcityDATA = properties::where('status', 'Published')->where('looking_to', 'sell')->where('property_type', 'residential')->where('categories_type', '!=', 'plot')->inRandomOrder()->paginate(9);
            } else {

                $title = "ALL PROPERTIES IN " . ucwords($city) . " | GHAR KA SAPNA";
                $pageTitle = ucwords($city) . " Homes for Sale";
                $randomcityDATA = properties::where('status', 'Published')->where('looking_to', 'sell')->where('city', $city)->where('property_type', 'residential')->where('categories_type', '!=', 'plot')->inRandomOrder()->paginate(9);
            }
            return  view('gharkasapna.home.all_property_listing', compact('title', 'city', 'randomcityDATA', 'pageTitle'));
        }


        if ($segment == 'all-properties-rent') {

            if ($city == null) {
                $title = "Explore Rental Properties Across Cities | GHAR KA SAPNA";
                $pageTitle = "Find Your Ideal Rental Home";
                $randomcityDATA = properties::where('status', 'Published')->where('looking_to', 'rent')->where('property_type', 'residential')->where('categories_type', '!=', 'plot')->inRandomOrder()->paginate(9);
            } else {
                $title = ucwords($city) . " Rental Properties | GHAR KA SAPNA";
                $pageTitle = ucwords($city) . " Rental Properties - Find Your Dream Home";
                $randomcityDATA = properties::where('status', 'Published')->where('looking_to', 'rent')->where('city', $city)->where('property_type', 'residential')->where('categories_type', '!=', 'plot')->inRandomOrder()->paginate(9);
            }

            return  view('gharkasapna.home.all_property_listing', compact('title', 'city', 'randomcityDATA', 'pageTitle'));
        }



        if ($segment == 'commerical-properties') {

            if ($city == null) {

                $title = "Explore Commercial Properties | Ghar ka sapna";
                $pageTitle = "Explore Commercial Properties";
                $randomcityDATA = properties::where('status', 'Published')->where('property_type', 'commercial')->inRandomOrder()->paginate(9);
                return  view('gharkasapna.home.all_property_listing', compact('title', 'city', 'randomcityDATA', 'pageTitle'));
            } else {

                $title = "Explore Commercial Properties in $city | Ghar Ka Sapna";
                $pageTitle = "Commercial Properties in $city";
                //return $title;
                $randomcityDATA = properties::where('status', 'Published')->where('property_type', 'commercial')->where('city', $city)->inRandomOrder()->paginate(9);
                return  view('gharkasapna.home.all_property_listing', compact('title', 'city', 'randomcityDATA', 'pageTitle'));
            }
        }

        if ($segment == 'plot-listing') {

            if ($city == null) {
                $title = "Find Your Dream Plot  | Ghar Ka Sapna";
                $pageTitle = "Discover Your Ideal Plot";
                $randomcityDATA = properties::where('status', 'Published')->where('categories_type', 'plot')->inRandomOrder()->paginate(9);
                return  view('gharkasapna.home.all_property_listing', compact('title', 'city', 'randomcityDATA', 'pageTitle'));
            } else {
                $title = "Find Your Dream Plot in $city  | Ghar Ka Sapna";
                $pageTitle = "Discover Your Ideal Plot in $city";
                $randomcityDATA = properties::where('status', 'Published')->where('categories_type', 'plot')->where('city', $city)->inRandomOrder()->paginate(9);
                return  view('gharkasapna.home.all_property_listing', compact('title', 'city', 'randomcityDATA', 'pageTitle'));
            }
        }

        if ($segment == 'search') {

            $segmentName = $request->segment(2);
            $url = str_replace("-", ' ', $segmentName);
            $title = "Properties for Sale " . ucwords($url);
            $pageTitle = "Properties for Sale " . ucwords($url);
            $getdata = properties::where('project_society', $url)->where('status', 'Published')->where('looking_to', 'sell')->where('property_type', 'residential')->first();
            $randomcityDATA = properties::where('project_society', $getdata->project_society)->where('looking_to', $getdata->looking_to)->where('property_type', $getdata->property_type)->where('status', 'Published')->inRandomOrder()->paginate(9);
            return  view('gharkasapna.home.all_property_listing', compact('title', 'pageTitle', 'randomcityDATA'));
        } elseif ($segment == 'rent-search') {

            $segmentName = $request->segment(2);
            $url = str_replace("-", ' ', $segmentName);
            $title = "Properties for Rent " . ucwords($url);
            $pageTitle = "Properties for Rent " . ucwords($url);
            $getdata = properties::where('project_society', $url)->where('status', 'Published')->where('looking_to', 'rent')->where('property_type', 'residential')->first();
            $randomcityDATA = properties::where('project_society', $getdata->project_society)->where('looking_to', $getdata->looking_to)->where('property_type', $getdata->property_type)->where('status', 'Published')->inRandomOrder()->paginate(9);
            return  view('gharkasapna.home.all_property_listing', compact('title', 'pageTitle', 'randomcityDATA'));
        } elseif ($segment == 'commerical-search') {

            $segmentName = $request->segment(2);
            $formattedUrl = ucwords(str_replace("-", ' ', $segmentName));
            $title = "Explore Commercial Properties in $formattedUrl | Ghar Ka Sapna";
            $pageTitle = "Commercial Properties in $formattedUrl";
            $getdata = properties::where('project_society', "like", "%{$formattedUrl}%")->where('status', 'Published')->where('property_type', 'commercial')->first();
            $randomcityDATA = properties::where('project_society', $getdata->project_society)->where('property_type', $getdata->property_type)->where('status', 'Published')->inRandomOrder()->paginate(9);
            return view('gharkasapna.home.all_property_listing', compact('title', 'pageTitle', 'randomcityDATA'));
        } elseif ($segment == 'plot-search') {

            $segmentName = $request->segment(2);
            $formattedUrl = ucwords(str_replace("-", ' ', $segmentName));
            $title = "Find Your Dream Plot in $formattedUrl | Ghar Ka Sapna";
            $pageTitle = "Plot  in $formattedUrl";
            $getdata = properties::where('project_society', "like", "%{$formattedUrl}%")->where('status', 'Published')->where('categories_type', 'plot')->first();
            $randomcityDATA = properties::where('project_society', $getdata->project_society)->where('categories_type', $getdata->categories_type)->where('status', 'Published')->inRandomOrder()->paginate(9);
            return view('gharkasapna.home.all_property_listing', compact('title', 'pageTitle', 'randomcityDATA'));
        }
    }


    public function search_properties_by_category(Request $request)
    {

        $segment = $request->input('segment');
        $categories = $request->input('categories');
        $city = $request->input('city');
        $lookingTo = ($segment == 'all-properties-buy') ? 'sell' : 'rent';

        $propertiesDataQuery = properties::whereIn('categories_type', $categories)
            ->where('looking_to', $lookingTo)
            ->where('status', 'Published')
            ->where('property_type', 'residential');

        if ($city) {
            $propertiesDataQuery->where('city', $city);
        }

        $propertiesData = $propertiesDataQuery->inRandomOrder()->paginate(9);

        if ($propertiesData->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No properties found for the selected city and category.',
                'propertiesData' => [],
            ], 404);
        }

        $paginationLinks = $propertiesData->links()->toHtml();

        return response()->json([
            'status' => 'success',
            'message' => 'Properties found successfully.',
            'propertiesData' => $propertiesData,
            'paginationLinks' => $paginationLinks,
        ], 200);
    }


    public function single_properties_listing(Request $request, $name)
    {
        $checksegment = $request->segment(1);
        $sessionID = session()->get('id');
        // print_r($checksegment);
        $segmentName = str_replace("-", ' ', $name);
        if ($checksegment == 'properties-buy') {

            $title = ucfirst($segmentName) . " | GHAR KA SAPNA";
            $propertiesData  = properties::where('property_name', $segmentName)->where('looking_to', 'sell')->where('status', 'Published')->where('property_type', 'residential')->first();
            $likeproperty = Likeproperty::where('property_id', $propertiesData->id)->where('user_id', $sessionID)->where('vendor_id', $propertiesData->vendor_id)->first();
            $reviewData = Reviews::where('propertyID', $propertiesData->id)->get();
            $userHasReviewed = Reviews::where('propertyID', $propertiesData->id)->where('user_id', $sessionID)->exists();
            $userHasRequest = SendRequest::where('user_id', $sessionID)->where('property_id', $propertiesData->id)->first();
            $userHasexistsRequest = SendRequest::where('user_id', $sessionID)->where('vendor_id', $propertiesData->vendor_id)->where('status', 'pending')->exists();
            $propertyIds = $reviewData->pluck('propertyID')->toArray();
            $reviewReply = Review_reply::whereIn('property_id', $propertyIds)->get();

            $nearbySimilarHomes = properties::where('city', $propertiesData->city)->where('property_type', $propertiesData->property_type)->where('looking_to', 'sell')->where('categories_type', $propertiesData->categories_type)->where('status', 'Published')->where('id', '!=', $propertiesData->id)->take(5)->get();
            return  view('gharkasapna.home.single_property_listing', compact('title', 'propertiesData', 'userHasexistsRequest', 'nearbySimilarHomes', 'likeproperty', 'reviewData', 'userHasReviewed', 'reviewReply', 'userHasRequest'));
        } elseif ($checksegment == 'rental-properties') {

            $title = ucfirst($segmentName) . " | GHAR KA SAPNA";
            $propertiesData  = properties::where('property_name', $segmentName)->where('looking_to', 'rent')->where('status', 'Published')->where('property_type', 'residential')->first();
            $likeproperty = Likeproperty::where('property_id', $propertiesData->id)->where('user_id', $sessionID)->where('vendor_id', $propertiesData->vendor_id)->first();
            $reviewData = Reviews::where('propertyID', $propertiesData->id)->get();
            $userHasReviewed = Reviews::where('propertyID', $propertiesData->id)->where('user_id', $sessionID)->exists();
            $userHasRequest = SendRequest::where('user_id', $sessionID)->where('property_id', $propertiesData->id)->first();
            $propertyIds = $reviewData->pluck('propertyID')->toArray();
            $reviewReply = Review_reply::whereIn('property_id', $propertyIds)->get();
            $userHasexistsRequest = SendRequest::where('user_id', $sessionID)->where('vendor_id', $propertiesData->vendor_id)->where('status', 'pending')->exists();

            $nearbySimilarHomes = properties::where('city', $propertiesData->city)->where('property_type', $propertiesData->property_type)->where('looking_to', 'rent')->where('categories_type', $propertiesData->categories_type)->where('status', 'Published')->where('id', '!=', $propertiesData->id)->take(5)->get();
            return  view('gharkasapna.home.single_property_listing', compact('title', 'propertiesData', 'nearbySimilarHomes', 'likeproperty', 'reviewData', 'userHasReviewed', 'reviewReply', 'userHasRequest', 'userHasexistsRequest'));
        } elseif ($checksegment == 'properties-commerical') {

            $title = ucfirst($segmentName) . " | GHAR KA SAPNA";
            $propertiesData  = properties::where('property_name', $segmentName)->where('status', 'Published')->where('property_type', 'commercial')->first();
            if ($propertiesData !== null) {

                $likeproperty = Likeproperty::where('property_id', $propertiesData->id)->where('user_id', $sessionID)->where('vendor_id', $propertiesData->vendor_id)->first();
            }
            $reviewData = Reviews::where('propertyID', $propertiesData->id)->get();
            $userHasReviewed = Reviews::where('propertyID', $propertiesData->id)->where('user_id', $sessionID)->exists();
            $userHasRequest = SendRequest::where('user_id', $sessionID)->where('property_id', $propertiesData->id)->first();
            $propertyIds = $reviewData->pluck('propertyID')->toArray();
            $reviewReply = Review_reply::whereIn('property_id', $propertyIds)->get();
            $userHasexistsRequest = SendRequest::where('user_id', $sessionID)->where('vendor_id', $propertiesData->vendor_id)->where('status', 'pending')->exists();

            $nearbySimilarHomes = properties::where('city', $propertiesData->city)->where('property_type', $propertiesData->property_type)->where('categories_type', $propertiesData->categories_type)->where('status', 'Published')->where('id', '!=', $propertiesData->id)->take(5)->get();
            return  view('gharkasapna.home.single_property_listing', compact('title', 'propertiesData', 'nearbySimilarHomes', 'likeproperty', 'reviewData', 'userHasReviewed', 'reviewReply', 'userHasRequest', 'userHasexistsRequest'));
        } elseif ($checksegment == 'single-plot') {

            $title = ucfirst($segmentName) . " | GHAR KA SAPNA";
            $propertiesData  = properties::where('property_name', $segmentName)->where('status', 'Published')->where('categories_type', 'plot')->first();
            $likeproperty = Likeproperty::where('property_id', $propertiesData->id)->where('user_id', $sessionID)->where('vendor_id', $propertiesData->vendor_id)->first();
            $reviewData = Reviews::where('propertyID', $propertiesData->id)->get();
            $userHasReviewed = Reviews::where('propertyID', $propertiesData->id)->where('user_id', $sessionID)->exists();
            $userHasRequest = SendRequest::where('user_id', $sessionID)->where('property_id', $propertiesData->id)->first();
            $propertyIds = $reviewData->pluck('propertyID')->toArray();
            $reviewReply = Review_reply::whereIn('property_id', $propertyIds)->get();
            // $userHasexistsRequest = SendRequest::where('user_id', $sessionID)->where('property_id', $propertiesData->id)->exists();
            $userHasexistsRequest = SendRequest::where('user_id', $sessionID)->where('vendor_id', $propertiesData->vendor_id)->where('status', 'pending')->exists();

            $nearbySimilarHomes = properties::where('city', $propertiesData->city)->where('property_type', $propertiesData->property_type)->where('categories_type', $propertiesData->categories_type)->where('status', 'Published')->where('id', '!=', $propertiesData->id)->take(5)->get();
            return  view('gharkasapna.home.single_property_listing', compact('title', 'propertiesData', 'nearbySimilarHomes', 'likeproperty', 'reviewData', 'userHasReviewed', 'reviewReply', 'userHasRequest', 'userHasexistsRequest'));
        }
    }




    public function view_post_properties()
    {
        $title = 'Post your property | Ghar ka Sapna';
        $basicPlan = Membership::where('plan_name', 'basic')->where('status', 'published')->first();
        $standardPlan = Membership::where('plan_name', 'standard')->where('status', 'published')->first();
        $premiumdPlan = Membership::where('plan_name', 'premium')->where('status', 'published')->first();
        return view('gharkasapna.home.add_property', compact('title', 'basicPlan', 'standardPlan', 'premiumdPlan'));
    }

    public function view_properties_by_categories(Request $request, $segmentName)
    {

        $checksegment = $request->segment(3);

        $NewsegmentName = str_replace("-", ' ', $segmentName);
        //return $NewsegmentName;
        $title = "Properties for Rent and Sale in " . ucwords($NewsegmentName) . " | Ghar ka sapna";

        $pageTitle = "Discover " . ucwords($NewsegmentName) . " for Rent and Sale in ";
        if ($checksegment == 'residential-plot') {
            $propertiesData = properties::where('categories_type', 'plot')->where('property_type', 'residential')->where('status', 'Published')->inRandomOrder()->paginate(9);
            return view('gharkasapna.home.properties_by_category', compact('title', 'propertiesData', 'pageTitle'));
        } elseif ($checksegment == 'commercial-plot') {

            $propertiesData = properties::where('categories_type', 'plot')->where('property_type', 'commercial')->where('status', 'Published')->inRandomOrder()->paginate(9);
            return view('gharkasapna.home.properties_by_category', compact('title', 'propertiesData', 'pageTitle'));
        }

        $propertiesData = properties::where('categories_type', $NewsegmentName)->where('status', 'Published')->inRandomOrder()->paginate(9);

        return view('gharkasapna.home.properties_by_category', compact('title', 'propertiesData', 'pageTitle'));
    }


    public function search_filter_index(Request $request)
    {

        $search = $request->input('search');
        $city = $request->input('city');

        $query = properties::where(function ($query) use ($search) {
            $query->where('property_name', 'like', "%{$search}%")
                ->orWhere('locality', 'like', "%{$search}%")
                ->orWhere('project_society', 'like', "%{$search}%")
                ->orWhere('categories_type', 'like', "%{$search}%");
        });

        if ($city) {
            $query->where('city', $city);
        }
        $query->where('looking_to', '!=', 'pg')
            ->where('status', 'Published')
            ->where('property_type', 'residential')
            ->whereIn('categories_type', ['independent house', 'villa', 'apartment', 'independent floor'])
            ->where('looking_to', 'sell');

        $results = $query->get();

        return response()->json($results);
    }

    public function search_filter_rent_index(Request $request)
    {
        $search = $request->input('search');
        $city = $request->input('city');
        $query = properties::where(function ($query) use ($search) {
            $query->where('property_name', 'like', "%{$search}%")
                ->orWhere('locality', 'like', "%{$search}%")
                ->orWhere('project_society', 'like', "%{$search}%")
                ->orWhere('categories_type', 'like', "%{$search}%");
        });

        if ($city) {
            $query->where('city', $city);
        }
        $query->where('looking_to', '!=', 'pg')
            ->where('status', 'Published')
            ->where('property_type', 'residential')
            ->whereIn('categories_type', ['independent house', 'villa', 'apartment', 'independent floor'])
            ->where('looking_to', 'rent');
        $results = $query->get();

        return response()->json($results);
    }


    public function search_filter_paying_guests(Request $request)
    {
        $search = $request->input('search');
        $city = $request->input('city');

        $query = properties::where(function ($query) use ($search) {
            $query->where('pg_name', 'like', "%{$search}%")
                ->orWhere('locality', 'like', "%{$search}%")
                ->orWhere('project_society', 'like', "%{$search}%")
                ->orWhere('pg_for', 'like', "%{$search}%")
                ->orWhere('room_type', 'like', "%{$search}%");
        });

        if ($city) {
            $query->where('city', $city);
        }

        $query->where('looking_to', 'pg')
            ->where('status', 'Published')
            ->where('property_type', 'residential');

        $results = $query->get();
        return response()->json($results);
    }

    public function search_filter_commerical_index(Request $request)
    {
        $search = $request->input('search');
        $city = $request->input('city');

        $query = properties::where(function ($query) use ($search) {
            $query->where('property_name', 'like', "%{$search}%")
                ->orWhere('locality', 'like', "%{$search}%")
                ->orWhere('project_society', 'like', "%{$search}%")
                ->orWhere('categories_type', 'like', "%{$search}%")
                ->orWhere('property_type', 'commercial');
        });
        if ($city) {
            $query->where('city', $city);
        }

        $query->where('looking_to', '!=', 'pg')
            ->where('status', 'Published')
            ->where('property_type', 'commercial');
        $results = $query->get();

        return response()->json($results);
    }

    public function search_filter_plot_index(Request $request)
    {
        $search = $request->input('search');
        $city = $request->input('city');

        $query = properties::where(function ($query) use ($search) {
            $query->where('property_name', 'like', "%{$search}%")
                ->orWhere('locality', 'like', "%{$search}%")
                ->orWhere('project_society', 'like', "%{$search}%")
                ->orWhere('categories_type', "like", "%{$search}%");
        });

        if ($city) {
            $query->where('city', $city);
        }

        $query->where('status', 'Published')
            ->where('looking_to', '!=', 'pg')
            ->where('categories_type', 'plot');
        $results = $query->get();
        return response()->json($results);
    }

    public function project_all_blogs()
    {

        $title = "All Blogs - Explore Our Latest Articles | Ghar Ka Sapna";
        $pageTitle = "All Blogs - Explore Our Latest Articles";
        $blogDATA = Blog::where('status', 'Published')->orderBy('created_at', 'asc')->paginate(10);
        $latestPosts = Blog::where('status', 'Published')->orderBy('created_at', 'desc')->take(3)->get();
        return view('gharkasapna.home.all_blogs', compact('title', 'pageTitle', 'blogDATA', 'latestPosts'));
    }

    public function project_single_blog_detail($name)
    {

        $formattedName = str_replace('-', ' ', $name);

        $title = "{$formattedName} - Read More About {$formattedName} | Ghar Ka Sapna";
        $pageTitle = "{$formattedName} - Blog Details";
        $blogData = Blog::where('blog_name', 'like', "%$formattedName%")->first();
        $nextBlog = Blog::where('created_at', '>', $blogData->created_at)->orderBy('created_at')->first();
        $previousBlog = Blog::where('created_at', '<', $blogData->created_at)->orderBy('created_at', 'desc')->first();
        $blogcomment = BlogComment::where('blog_id', $blogData->id)->get();
        $relatedposts = Blog::where('categories', $blogData->categories)->where('id', '!=', $blogData->id)->inRandomOrder()->limit(3)->get();

        return view('gharkasapna.home.single_blog_listing', compact('title', 'pageTitle', 'blogData', 'nextBlog', 'previousBlog', 'blogcomment', 'relatedposts'));
    }

    public function manage_home_blog_comment(Request $request)
    {

        $blogID = $request->input('blog_id');
        $comment = $request->input('comment');
        $ID = session()->get('id');

        $commentData = BlogComment::create([
            'reg_id' => $ID,
            'blog_id' => $blogID,
            'comments' => $comment
        ]);

        if ($commentData) {
            return redirect()->back()->with('success', 'Comment added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add comment. Please try again.');
        }
    }

    public function manage_pg_liating(Request $request, $name)
    {

        $checksegment = $request->segment(2);
        $segmentfirst = $request->segment(1);
        $formattedName = ucwords(str_replace('-', ' ', $name));
        $title = "PG Listings for $formattedName - Ghar Ka Sapna";
        $pageTitle = "PG for $formattedName";

        if ($checksegment == 'girls') {

            $propertiesData = properties::where('pg_for', 'girls')->where('status', 'Published')->orderBy('created_at', 'desc')->paginate(9);
        } elseif ($checksegment == 'boys') {
            $propertiesData = properties::where('pg_for', 'boys')->where('status', 'Published')->orderBy('created_at', 'desc')->paginate(9);
        } elseif ($checksegment == 'single-room') {
            $propertiesData = properties::where('room_type', 'private room')->where('status', 'Published')->orderBy('created_at', 'desc')->paginate(9);
        } elseif ($checksegment == 'dubal-sharing') {

            $propertiesData = properties::where('room_type', 'double sharing')->where('status', 'Published')->orderBy('created_at', 'desc')->paginate(9);
        } elseif ($checksegment == 'triple-sharing') {
            $propertiesData = properties::where('room_type', 'triple sharing')->where('status', 'Published')->orderBy('created_at', 'desc')->paginate(9);
        } elseif ($checksegment == 'paying-guests') {
            $propertiesData = properties::where('looking_to', 'pg')->where('status', 'Published')->orderBy('created_at', 'desc')->paginate(9);
        } elseif ($segmentfirst == 'paying-search') {
            $propertiesData = properties::where('looking_to', 'pg')->where('status', 'Published')->where('project_society', 'like',  "%{$formattedName}%")->orderBy('created_at', 'desc')->paginate(9);
        }
        return view('gharkasapna.home.pg_listing', compact('title', 'pageTitle', 'propertiesData'));
    }

    public function second_manage_pg_liating($city)
    {

        $title = "PG Listings for $city - Ghar Ka Sapna";
        $pageTitle = "PG for $city";
        $propertiesData = properties::where('looking_to', 'pg')->where('status', 'Published')->where('city', 'like',  "%{$city}%")->orderBy('created_at', 'desc')->paginate(9);
        return view('gharkasapna.home.pg_listing', compact('title', 'pageTitle', 'propertiesData'));
    }

    public function manage_single_pg_listing($name)
    {

        $formattedName = ucwords(str_replace('-', ' ', $name));
        $sessionID = session()->get('id');
        $title = "$formattedName - Single PG Listing | Ghar Ka Sapna";
        $propertiesData = properties::where('pg_name', 'like', "%$formattedName%")->first();
        $likeproperty = Likeproperty::where('property_id', $propertiesData->id)->where('user_id', $sessionID)->where('vendor_id', $propertiesData->vendor_id)->first();
        $reviewData = Reviews::where('propertyID', $propertiesData->id)->get();
        $userHasReviewed = Reviews::where('propertyID', $propertiesData->id)->where('user_id', $sessionID)->exists();
        $userHasRequest = SendRequest::where('user_id', $sessionID)->where('property_id', $propertiesData->id)->first();
        $userHasexistsRequest = SendRequest::where('user_id', $sessionID)->where('vendor_id', $propertiesData->vendor_id)->where('status', 'pending')->exists();

        $propertyIds = $reviewData->pluck('propertyID')->toArray();
        $reviewReply = Review_reply::whereIn('property_id', $propertyIds)->get();

        $nearbyhomes = properties::where('city', $propertiesData->city)->where('looking_to', $propertiesData->looking_to)->where('status', 'Published')->where('id', '!=', $propertiesData->id)->take(5)->get();
        // ->where('room_type', $propertiesData->room_type)
        return view('gharkasapna.home.single_pg_listing', compact('title', 'propertiesData', 'nearbyhomes', 'likeproperty', 'reviewData', 'userHasReviewed', 'reviewReply', 'userHasRequest', 'userHasexistsRequest'));
    }


    // all_listing search filter function ------------------------------



    public function search_filter_home_listing(Request $request)
    {

        // print_r($request->all());
        // die;
        $segment = $request->input('segment');
        $secondSegment = $request->input('secondSegment');
        $categories = $request->input('checkedValue');
        $lookingTo = $request->input('selectedValue');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        $query = properties::where('status', 'Published')->where('property_type', 'residential');

        if ($segment == 'all-properties-buy') {
            if (!empty($secondSegment)) {
                $query->where('city', $secondSegment);
            }

            if (empty($lookingTo) || $lookingTo == 'buy') {

                $query->where('looking_to', 'sell');

                if ($minPrice !== null) {
                    $query->where('cost', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('cost', '<=', $maxPrice);
                }
            } elseif ($lookingTo == 'rent') {

                $query->where('looking_to', 'rent');

                if ($minPrice !== null) {
                    $query->where('rent', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('rent', '<=', $maxPrice);
                }
            }

            if (empty($categories)) {
                $query->whereIn('categories_type', ['independent house', 'villa', 'apartment', 'independent floor']);
            } else {
                $query->whereIn('categories_type', $categories);
            }
        }

        $results = $query->get();
        $totalProperties = $query->count();

        return response()->json([
            'status' => 'success',
            'results' => $results,
            'totalProperties' => $totalProperties,
        ], 200);
    }

    public function search_filter_rentindex_listing(Request $request)
    {

        $segment = $request->input('segment');
        $secondSegment = $request->input('secondSegment');
        $categories = $request->input('checkedValue');
        $lookingTo = $request->input('selectedValue');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        $query = properties::where('status', 'Published')->where('property_type', 'residential');

        if ($segment == 'all-properties-rent') {

            if (!empty($secondSegment)) {
                $query->where('city', $secondSegment);
            }

            if (empty($lookingTo) || $lookingTo == 'rent') {
                $query->where('looking_to', 'rent');

                if ($minPrice !== null) {
                    $query->where('rent', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('rent', '<=', $maxPrice);
                }
            } elseif ($lookingTo == 'buy') {
                $query->where('looking_to', 'sell');

                if ($minPrice !== null) {
                    $query->where('cost', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('cost', '<=', $maxPrice);
                }
            }

            if (empty($categories)) {
                $query->whereIn('categories_type', ['independent house', 'villa', 'apartment', 'independent floor']);
            } else {
                $query->whereIn('categories_type', $categories);
            }
        }

        $results = $query->get();
        $totalProperties = $query->count();

        return response()->json([
            'status' => 'success',
            'results' => $results,
            'totalProperties' => $totalProperties,
        ], 200);
    }

    public function search_filter_commerical_listing(Request $request)
    {

        $segment = $request->input('segment');
        $secondSegment = $request->input('secondSegment');
        $categories = $request->input('checkedValue');
        $lookingTo = $request->input('selectedValue');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        $query = properties::where('status', 'Published')->where('property_type', 'commercial');

        if ($segment == 'commerical-properties') {

            if (!empty($secondSegment)) {
                $query->where('city', $secondSegment);
            }

            if (empty($lookingTo) || $lookingTo == 'buy') {
                $query->where('looking_to', 'sell');

                if ($minPrice !== null) {
                    $query->where('cost', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('cost', '<=', $maxPrice);
                }
            } elseif ($lookingTo == 'rent') {
                $query->where('looking_to', 'rent');

                if ($minPrice !== null) {
                    $query->where('rent', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('rent', '<=', $maxPrice);
                }
            }

            if (empty($categories)) {
                $query->whereIn('categories_type', ['plot', 'retail shop', 'office', 'showroom', 'warehouse']);
            } else {
                $query->whereIn('categories_type', $categories);
            }

            $results = $query->get();
            $totalProperties = $query->count();

            return response()->json([
                'status' => 'success',
                'results' => $results,
                'totalProperties' => $totalProperties,
            ], 200);
        }
    }

    public function search_filter_plot_listing(Request $request)
    {
        $segment = $request->input('segment');
        $secondSegment = $request->input('secondSegment');
        $categories = $request->input('checkedValue');
        $lookingTo = $request->input('selectedValue');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        $query = properties::where('status', 'Published')->where('looking_to', '!=', 'pg')->where('categories_type', 'plot');

        if ($segment == 'plot-listing') {

            if (!empty($secondSegment)) {
                $query->where('city', $secondSegment);
            }

            if (empty($lookingTo) || $lookingTo == 'buy') {
                $query->where('looking_to', 'sell');

                if ($minPrice !== null) {
                    $query->where('cost', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('cost', '<=', $maxPrice);
                }
            } elseif ($lookingTo == 'rent') {
                $query->where('looking_to', 'rent');

                if ($minPrice !== null) {
                    $query->where('rent', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('rent', '<=', $maxPrice);
                }
            }

            if (empty($categories)) {
                $query->where('property_type', 'residential');
            }

            if (!empty($categories)) {
                $query->whereIn('property_type', $categories);
            }
        }

        $results = $query->get();
        $totalProperties = $query->count();

        return response()->json([
            'status' => 'success',
            'results' => $results,
            'totalProperties' => $totalProperties,
        ], 200);
    }

    public function search_index_filter(Request $request)
    {

        $segment = $request->input('segment');
        $projectsociety = $request->input('updatesegment');
        $categories = $request->input('checkedValue');
        $lookingTo = $request->input('selectedValue');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        $query = properties::where('status', 'Published')
            ->where('project_society', $projectsociety)
            ->where('property_type', 'residential')
            ->where('project_society', $projectsociety);

        if ($segment == 'search') {

            if (empty($lookingTo) || $lookingTo == 'buy') {
                $query->where('looking_to', 'sell');

                if ($minPrice !== null) {
                    $query->where('cost', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('cost', '<=', $maxPrice);
                }
            } elseif ($lookingTo == 'rent') {
                $query->where('looking_to', 'rent');

                if ($minPrice !== null) {
                    $query->where('rent', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('rent', '<=', $maxPrice);
                }
            }

            if (empty($categories)) {
                $query->whereIn('categories_type', ['independent house', 'villa', 'apartment', 'independent floor']);
            } else {
                $query->whereIn('categories_type', $categories);
            }
        }

        $results = $query->get();
        $totalProperties = $query->count();

        return response()->json([
            'status' => 'success',
            'results' => $results,
            'totalProperties' => $totalProperties,
        ], 200);
    }

    public function search_rent_filter(Request $request)
    {
        $segment = $request->input('segment');
        $projectsociety = $request->input('updatesegment');
        $categories = $request->input('checkedValue');
        $lookingTo = $request->input('selectedValue');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        $query = properties::where('status', 'Published')
            ->where('project_society', $projectsociety)
            ->where('property_type', 'residential')
            ->where('project_society', $projectsociety);

        if ($segment == 'rent-search') {

            if (empty($lookingTo) || $lookingTo == 'rent') {
                $query->where('looking_to', 'rent');

                if ($minPrice !== null) {
                    $query->where('rent', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('rent', '<=', $maxPrice);
                }
            } elseif ($lookingTo == 'buy') {
                $query->where('looking_to', 'sell');

                if ($minPrice !== null) {
                    $query->where('cost', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('cost', '<=', $maxPrice);
                }
            }

            if (empty($categories)) {
                $query->whereIn('categories_type', ['independent house', 'villa', 'apartment', 'independent floor']);
            } else {
                $query->whereIn('categories_type', $categories);
            }
        }
        $results = $query->get();
        $totalProperties = $query->count();

        return response()->json([
            'status' => 'success',
            'results' => $results,
            'totalProperties' => $totalProperties,
        ], 200);
    }

    public function search_commerical_filter(Request $request)
    {
        $segment = $request->input('segment');
        $projectsociety = $request->input('updatesegment');
        $categories = $request->input('checkedValue');
        $lookingTo = $request->input('selectedValue');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');


        $query = properties::where('status', 'Published')
            ->where('project_society', $projectsociety)
            ->where('property_type', 'commercial')
            ->where('project_society', $projectsociety);

        if ($segment == 'commerical-search') {


            if (empty($lookingTo) || $lookingTo == 'buy') {
                $query->where('looking_to', 'sell');

                if ($minPrice !== null) {
                    $query->where('cost', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('cost', '<=', $maxPrice);
                }
            } elseif ($lookingTo == 'rent') {
                $query->where('looking_to', 'rent');

                if ($minPrice !== null) {
                    $query->where('rent', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('rent', '<=', $maxPrice);
                }
            }


            if (empty($categories)) {
                $query->whereIn('categories_type', ['plot', 'retail shop', 'office', 'showroom', 'warehouse']);
            } else {
                $query->whereIn('categories_type', $categories);
            }
        }

        $results = $query->get();
        $totalProperties = $query->count();

        return response()->json([
            'status' => 'success',
            'results' => $results,
            'totalProperties' => $totalProperties,
        ], 200);
    }

    public function search_plot_filter(Request $request)
    {

        $segment = $request->input('segment');
        $projectsociety = $request->input('updatesegment');
        $categories = $request->input('checkedValue');
        $lookingTo = $request->input('selectedValue');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        $query = properties::where('status', 'Published')
            ->where('project_society', 'like', "%{$projectsociety}%")
            ->where('categories_type', 'plot');

        if ($segment == 'plot-search') {

            if (empty($lookingTo) || $lookingTo == 'buy') {
                $query->where('looking_to', 'sell');

                if ($minPrice !== null) {
                    $query->where('cost', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('cost', '<=', $maxPrice);
                }
            } elseif ($lookingTo == 'rent') {
                $query->where('looking_to', 'rent');

                if ($minPrice !== null) {
                    $query->where('rent', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('rent', '<=', $maxPrice);
                }
            }

            if (empty($categories)) {
                $query->where('property_type', 'residential');
            }

            if (!empty($categories)) {
                $query->whereIn('property_type', $categories);
            }
        }

        $results = $query->get();
        $totalProperties = $query->count();

        return response()->json([
            'status' => 'success',
            'results' => $results,
            'totalProperties' => $totalProperties,
        ], 200);
    }

    public function search_paying_guests_filter(Request $request)
    {
        // print_r($request->all());
        $segment = $request->input('segment');
        $city = $request->input('secondsegment');
        $selectedFood = $request->input('selectedFood');
        $selectedGender = $request->input('selectedGender');
        $checkedValue = $request->input('checkedValue');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        $query = properties::where('status', 'Published')
            ->where('looking_to', 'pg');

        if ($segment == 'pg-listing' || $segment == 'paying-guests-search') {

            if (!$city == 'paying-guests') {

                if (!empty($city)) {
                    $query->where('city', $city);
                }
            }


            if ($minPrice !== null) {
                $query->where('rent', '>=', $minPrice);
            }
            if ($maxPrice !== null) {
                $query->where('rent', '<=', $maxPrice);
            }

            if (empty($checkedValue)) {
                $query->whereIn('room_type', ['private room', 'double sharing', 'triple sharing', 'three plus sharing']);
            } else {
                $query->whereIn('room_type', $checkedValue);
            }

            if (empty($selectedGender)) {
                $query->whereIn('pg_for', ['boys', 'girls']);
            } else {
                $query->where('pg_for', $selectedGender);
            }

            if (empty($selectedFood)) {
                $query->whereIn('meals_available', ['yes', 'no']);
            } else {
                $query->where('meals_available', $selectedFood);
            }
        }

        $results = $query->get();
        $totalProperties = $query->count();

        return response()->json([
            'status' => 'success',
            'results' => $results,
            'totalProperties' => $totalProperties,
        ], 200);
    }

    public function paying_guests_search_filter(Request $request)
    {
        // print_r($request->all());
        $segment = $request->input('segment');
        $projectsociety = $request->input('updatesegment');
        $selectedFood = $request->input('selectedFood');
        $selectedGender = $request->input('selectedGender');
        $checkedValue = $request->input('checkedValue');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        $query = properties::where('status', 'Published')
            ->where('looking_to', 'pg')
            ->where('project_society', $projectsociety);

        if ($segment == 'paying-search') {

            if ($minPrice !== null) {
                $query->where('rent', '>=', $minPrice);
            }
            if ($maxPrice !== null) {
                $query->where('rent', '<=', $maxPrice);
            }

            if (empty($checkedValue)) {
                $query->whereIn('room_type', ['private room', 'double sharing', 'triple sharing', 'three plus sharing']);
            } else {
                $query->whereIn('room_type', $checkedValue);
            }

            if (empty($selectedGender)) {
                $query->whereIn('pg_for', ['boys', 'girls']);
            } else {
                $query->where('pg_for', $selectedGender);
            }

            if (empty($selectedFood)) {
                $query->whereIn('meals_available', ['yes', 'no']);
            } else {
                $query->where('meals_available', $selectedFood);
            }
        }

        $results = $query->get();
        $totalProperties = $query->count();

        return response()->json([
            'status' => 'success',
            'results' => $results,
            'totalProperties' => $totalProperties,
        ], 200);
    }

    public function list_property_by_cat($cat)
    {

        $segment = request()->segment(2);
        $formattedName = str_replace('-', ' ', $segment);



        // if($segment == 'apartment') {

        //     $title = "Discover " . $cat . " Properties for Sale | Ghar Ka Sapna";
        //     $pageTitle =  "Explore " . ucwords($cat) . " Properties";
        //     $propertiesData = properties::where('categories_type', $cat)->where('status', 'Published')->where('looking_to', 'sell')->orderBy('created_at', 'desc')->paginate(9);
        // } elseif($formattedName == 'independent floor') {
        //     $title = "Discover " . $formattedName . " Properties for Sale | Ghar Ka Sapna";
        //     $pageTitle =  "Explore " . $formattedName . " Properties";
        //     $propertiesData = properties::where('categories_type', $formattedName)->where('status', 'Published')->where('looking_to', 'sell')->orderBy('created_at', 'desc')->paginate(9);

        // }


        if ($formattedName == 'residential plot') {

            $title = "Discover " . $formattedName . " Properties for Sale | Ghar Ka Sapna";
            $pageTitle =  "Explore " . ucwords($formattedName) . " Properties";
            $propertiesData = properties::where('categories_type', 'plot')->where('status', 'Published')->where('property_type', 'residential')->where('looking_to', 'sell')->orderBy('created_at', 'desc')->paginate(9);
        } elseif ($formattedName == 'commercial plot') {

            $title = "Discover " . $formattedName . " Properties for Sale | Ghar Ka Sapna";
            $pageTitle =  "Explore " . ucwords($formattedName) . " Properties";
            $propertiesData = properties::where('categories_type', 'plot')->where('status', 'Published')->where('property_type', 'commercial')->where('looking_to', 'sell')->orderBy('created_at', 'desc')->paginate(9);
        } elseif ($formattedName == 'office' || $formattedName == 'retail shop' || $segment == 'warehouse' || $segment == 'showroom') {

            $title = "Discover " . $formattedName . " Properties for Sale | Ghar Ka Sapna";
            $pageTitle =  "Explore " . ucwords($formattedName) . " Properties";
            $propertiesData = properties::where('categories_type', $formattedName)->where('status', 'Published')->where('property_type', 'commercial')->where('looking_to', 'sell')->orderBy('created_at', 'desc')->paginate(9);
        } else {

            $title = "Discover " . $formattedName . " Properties for Sale | Ghar Ka Sapna";
            $pageTitle =  "Explore " . ucwords($formattedName) . " Properties";
            $propertiesData = properties::where('categories_type', $formattedName)->where('status', 'Published')->where('looking_to', 'sell')->orderBy('created_at', 'desc')->paginate(9);
        }

        return view('gharkasapna.home.list_property_by_category', compact('title', 'pageTitle', 'propertiesData'));
    }


    public function cat_list_filter(Request $request)
    {

        $categories = $request->input('categories_type');
        $lookingTo = $request->input('selectedValue');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        $query = properties::where('status', 'Published');



        if (in_array('office', $categories) || in_array('plot', $categories) || in_array('retail shop', $categories)) {

            if (in_array('office', $categories) && !in_array('plot', $categories) && !in_array('retail shop', $categories)) {

                $query->where('property_type', 'commercial')->whereIn('categories_type', ['office']);
            } elseif (!in_array('office', $categories) && in_array('plot', $categories) && !in_array('retail shop', $categories)) {
                $query->where('property_type', 'commercial')->whereIn('categories_type', ['plot']);
            } elseif (!in_array('office', $categories) && !in_array('plot', $categories) && in_array('retail shop', $categories)) {
                $query->where('property_type', 'commercial')->whereIn('categories_type', ['retail shop']);
            } elseif (in_array('office', $categories) && in_array('plot', $categories) && !in_array('retail shop', $categories)) {
                $query->where('property_type', 'commercial')->whereIn('categories_type', ['office', 'plot']);
            } elseif (in_array('office', $categories) && !in_array('plot', $categories) && in_array('retail shop', $categories)) {
                $query->where('property_type', 'commercial')->whereIn('categories_type', ['office', 'retail shop']);
            } elseif (!in_array('office', $categories) && in_array('plot', $categories) && in_array('retail shop', $categories)) {
                $query->where('property_type', 'commercial')->whereIn('categories_type', ['plot', 'retail shop']);
            } else {
                $query->where('property_type', 'commercial')->whereIn('categories_type', ['office', 'plot', 'retail shop']);
            }
        } else {

            if (in_array('independent house', $categories) && !in_array('apartment', $categories)) {

                $query->where('property_type', 'residential')->whereIn('categories_type', ['independent house']);
            } elseif (in_array('apartment', $categories) && !in_array('independent house', $categories)) {

                $query->where('property_type', 'residential')->whereIn('categories_type', ['apartment']);
            } else {
                $query->where('property_type', 'residential')->whereIn('categories_type', ['independent house', 'apartment']);
            }
        }


        if (empty($lookingTo) || $lookingTo == 'buy') {
            $query->where('looking_to', 'sell');

            if ($minPrice !== null) {
                $query->where('cost', '>=', $minPrice);
            }
            if ($maxPrice !== null) {
                $query->where('cost', '<=', $maxPrice);
            }
        } elseif ($lookingTo == 'rent') {
            $query->where('looking_to', 'rent');

            if ($minPrice !== null) {
                $query->where('rent', '>=', $minPrice);
            }
            if ($maxPrice !== null) {
                $query->where('rent', '<=', $maxPrice);
            }
        }

        $results = $query->get();
        $totalProperties = $query->count();

        return response()->json([
            'status' => 'success',
            'results' => $results,
            'totalProperties' => $totalProperties,
        ], 200);
    }


    public function newHome()
    {

        $title = "Real Estate Ghar Ka Sapna";
        $propertyType = properties::pluck('categories_type')->unique();
        $location = properties::pluck('city')->unique();
        $properties = properties::where('status', 'Published')->where('categories_type', '!=', 'plot')->latest()->take(6)->get();
        $rentProperties = properties::where('looking_to', 'rent')->where('status', 'Published')->where('categories_type', '!=', 'plot')->inRandomOrder()->take(5)->get();

        // $popularCities = properties::select('city')->groupBy('city')->orderByRaw('COUNT(*) DESC')->limit(8)->pluck('city');

        $popularCitiesWithCounts = properties::select('city', \DB::raw('COUNT(*) as property_count'))
            ->where('status', 'Published')
            ->groupBy('city')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(8)
            ->get();

        $popularCities = $popularCitiesWithCounts->pluck('city');
        $propertyCounts = $popularCitiesWithCounts->pluck('property_count', 'city');
        $latestNews = Blog::where('status', 'Published')->orderBy('created_at', 'desc')->take(5)->get();

        return view('home', compact('title', 'propertyType', 'location', 'properties', 'rentProperties', 'popularCities', 'propertyCounts', 'latestNews'));
    }


    public function locationProperties(Request $request)
    {

        // print_r($request->all());
        $city = $request->input('location');
        $lookingTo = $request->input('lookingTo');
        $type = $request->input('type');

        $query = properties::where('status', 'Published');

        if (!empty($city)) {
            $query->where('city', $city);
        }

        if (!empty($lookingTo)) {
            $query->where('looking_to', $lookingTo);
        }

        if ($lookingTo == 'pg') {
            $query->latest();
        } else {
            if (!empty($type)) {
                $query->where('categories_type', $type);
            }
        }

        $properties = $query->latest()->take(6)->get();


        if ($properties->isEmpty()) {
            return response()->json(['success' => false]);
        } else {
            return response()->json(['success' => true, 'properties' => $properties]);
        }

    }

    public function searchFilterIndex(Request $request)
    {
        //print_r($request->all());
        $search = $request->input('search');
        $lookingTo = $request->input('lookingTo');
        $type = $request->input('type');
        $location = $request->input('location');


        $query = properties::where('status', 'Published')->where(function ($query) use ($search) {
            $query->where('property_name', 'like', "%{$search}%")
                ->orWhere('locality', 'like', "%{$search}%")
                ->orWhere('project_society', 'like', "%{$search}%")
                ->orWhere('categories_type', 'like', "%{$search}%")
                ->orWhere('pg_for', 'like', "%{$search}%")
                ->orWhere('pg_name', 'like', "%{$search}%");
        });

        if ($location) {
            $query->where('city', $location);
        }

        if ($lookingTo) {
            $query->where('looking_to', $lookingTo);
        }

        if ($lookingTo != 'pg') {

            if ($type) {
                $query->where('categories_type', $type);
            }
        }

        $results = $query->get();

        if ($results) {
            return response()->json(['success' => true, 'results' => $results]);
        } else {
            return response()->json(['success' => false]);
        }
    }




    public function allPropertiesListing($name, $lookingTo = null, $type = null)
    {

        $formattedString = str_replace('-', ' ', $name);
        $title = "All Properties Ghar Ka Sapna in $formattedString";
        $segment = request()->segment('2');
        $formateType = str_replace('-', ' ', $segment);
        $segmentFirst = request()->segment('1');

        $pageTitle = null;

        if ($lookingTo !== null && $type !== null && $name !== null) {

            $pageTitle = "All Properties in $name for $lookingTo - $type";
            $properties = properties::where('city', $name)->where('looking_to', $lookingTo)->where('categories_type', $type)->where('status', 'Published')->orderBy('created_at', 'desc')->paginate(9);
        } elseif ($lookingTo !== null) {

            $pageTitle = "All Properties in $formattedString for $lookingTo";
            $properties = properties::where('status', 'Published')->where('project_society', $formattedString)->where('looking_to', $lookingTo)->orderBy('created_at', 'desc')->paginate(9);
        } elseif ($formateType !== null && $segmentFirst != 'all-property') {

            if ($formateType == 'paying guests') {

                $pageTitle = "Available Paying Guest Accommodations | Find Your Ideal PG";
                $properties = properties::where('status', 'Published')->where('looking_to', 'pg')->orderBy('created_at', 'desc')->paginate(9);
            } else {

                $pageTitle = "Available Properties in $formateType Your Ideal $formateType Awaits";
                $properties = properties::where('status', 'Published')->where('categories_type', $formateType)->orderBy('created_at', 'desc')->paginate(9);
            }
        } else {
            $pageTitle = "All Properties in $formattedString";
            $properties = properties::where('status', 'Published')->where('city', $formattedString)->orderBy('created_at', 'desc')->paginate(9);
        }

        $popularCities = properties::select('city')->groupBy('city')->orderByRaw('COUNT(*) DESC')->limit(12)->pluck('city');
        $propertyType = properties::pluck('categories_type')->unique();
        
        return view('all_property', compact('title', 'properties', 'pageTitle', 'popularCities', 'propertyType'));
    }


    public function filterAllProperty(Request $request)
    {

        // print_r($request->all());
        // die;

        $lookingTo = strtolower($request->input('lookingTo'));
        $type = strtolower($request->input('type'));
        $suitedFor = strtolower($request->input('suitedFor'));
        $city = strtolower($request->input('location'));
        $plotArea = $request->input('plotArea');
        $roomType = strtolower($request->input('roomType'));
        $bath = $request->input('bath');
        $bedRoom = $request->input('bed');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');
        $minSqft = $request->input('minSqft');
        $maxSqft = $request->input('maxSqft');
        $meals = $request->input('meals');


        $typesToCheck = ['apartment', 'independent floor', 'independent house'];
        $commericalToCheck = ['retail shop', 'showroom', 'warehouse'];


        $query = properties::where('status', 'Published');

        if ($lookingTo == 'pg') {

            if ($lookingTo) {
                $query->where('looking_to', 'like', "%{$lookingTo}%");
            }

            if ($city != 'all cities') {
                $query->where('city', 'like', "%{$city}%");
            }
            if ($suitedFor != 'gender') {
                $query->where('pg_for', 'like', "%{$suitedFor}%");
            }

            if ($roomType != 'room type') {
                $query->where('room_type', 'like', "%{$roomType}%");
            }

            if ($meals) {
                $query->where('meals_available', 'like', "%{$meals}%");
            }

            if ($minPrice !== null) {
                $query->where('rent', '>=', $minPrice);
            }
            if ($maxPrice !== null) {
                $query->where('rent', '<=', $maxPrice);
            }
        }

        if (in_array($type, $typesToCheck)) {

            if ($lookingTo != 'looking to') {
                $query->where('looking_to', 'like', "%{$lookingTo}%");
            }

            if ($type != 'property') {
                $query->where('categories_type', 'like', "%{$type}%");
            }

            if ($city != 'all cities') {
                $query->where('city', 'like', "%{$city}%");
            }

            if ($bath) {
                $query->where('bath', 'like', "%{$bath}%");
            }

            if ($bedRoom) {
                $query->where('total_property', 'like', "%{$bedRoom} BHK%");
            }

            if ($lookingTo == 'rent') {
                if ($minPrice !== null) {
                    $query->where('rent', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('rent', '<=', $maxPrice);
                }
            } elseif ($lookingTo == 'sell') {
                if ($minPrice !== null) {
                    $query->where('cost', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('cost', '<=', $maxPrice);
                }
            }

            if ($maxSqft) {
                $query->where('built_up_area', '<=', $maxSqft);
            }

            if ($minSqft) {
                $query->where('built_up_area', '>=', $minSqft);
            }
        }

        if ($type == 'office') {

            if ($lookingTo != 'looking to') {
                $query->where('looking_to', 'like', "%{$lookingTo}%");
            }

            if ($type != 'property') {
                $query->where('categories_type', 'like', "%{$type}%");
            }

            if ($city != 'all cities') {
                $query->where('city', 'like', "%{$city}%");
            }

            if ($bath) {
                $query->where('max_seats', '<=', $bath);
            }
            if ($bedRoom) {
                $query->where('min_seats', '>=', $bedRoom);
            }

            if ($lookingTo == 'rent') {
                if ($minPrice !== null) {
                    $query->where('rent', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('rent', '<=', $maxPrice);
                }
            } elseif ($lookingTo == 'sell') {
                if ($minPrice !== null) {
                    $query->where('cost', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('cost', '<=', $maxPrice);
                }
            }

            if ($maxSqft) {
                $query->where('built_up_area', '<=', $maxSqft);
            }

            if ($minSqft) {
                $query->where('built_up_area', '>=', $minSqft);
            }
        }

        if (in_array($type, $commericalToCheck)) {

            if ($lookingTo != 'looking to') {
                $query->where('looking_to', 'like', "%{$lookingTo}%");
            }

            if ($type != 'property') {
                $query->where('categories_type', 'like', "%{$type}%");
            }

            if ($city != 'all cities') {
                $query->where('city', 'like', "%{$city}%");
            }

            if ($bath) {
                $query->where('built_up_area', $bath);
            }

            // if($bedRoom){
            //     $query->where('built_up_area', $bath);
            // }

            if ($lookingTo == 'rent') {
                if ($minPrice !== null) {
                    $query->where('rent', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('rent', '<=', $maxPrice);
                }
            } elseif ($lookingTo == 'sell') {
                if ($minPrice !== null) {
                    $query->where('cost', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('cost', '<=', $maxPrice);
                }
            }


            if ($maxSqft) {
                $query->where('built_up_area', '<=', $maxSqft);
            }

            if ($minSqft) {
                $query->where('built_up_area', '>=', $minSqft);
            }
        }


        if ($type == 'plot') {

            if ($lookingTo != 'looking to') {
                $query->where('looking_to', 'like', "%{$lookingTo}%");
            }

            if ($type != 'property') {
                $query->where('categories_type', 'like', "%{$type}%");
            }

            if ($city != 'all cities') {
                $query->where('city', 'like', "%{$city}%");
            }

            if ($plotArea) {
                $query->where('plot_area', $plotArea);
            }


            if ($lookingTo == 'rent') {
                if ($minPrice !== null) {
                    $query->where('rent', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('rent', '<=', $maxPrice);
                }
            } elseif ($lookingTo == 'sell') {
                if ($minPrice !== null) {
                    $query->where('cost', '>=', $minPrice);
                }
                if ($maxPrice !== null) {
                    $query->where('cost', '<=', $maxPrice);
                }
            }
        }

        $results = $query->get();
        if ($results->isNotEmpty()) {
            return response()->json(['success' => true, 'results' => $results]);
        } else {
            return response()->json(['success' => false, 'message' => 'No properties found']);
        }
    }


    public function singleProperty($name, $id){

        $formatName = str_replace('-', ' ', $name);
        $title = "Property $formatName";
        $encodedId = base64_decode($id);
        $sessionID = session()->get('id');
        $properties = properties::where('id', $encodedId)->first();
        $likeproperty = Likeproperty::where('property_id', $properties->id)->where('user_id', $sessionID)->where('vendor_id', $properties->vendor_id)->first();
        $propertiesReview = Reviews::where('propertyID', $properties->id)->get();
        $userHasReviewed = Reviews::where('propertyID', $properties->id)->where('user_id', $sessionID)->exists();
        $propertyIds = $propertiesReview->pluck('propertyID')->toArray();
        $reviewReply = Review_reply::whereIn('property_id', $propertyIds)->get();
        $userHasRequest = SendRequest::where('user_id', $sessionID)->where('property_id', $properties->id)->first();
        $userHasexistsRequest = SendRequest::where('user_id', $sessionID)->where('vendor_id', $properties->vendor_id)->where('status', 'pending')->exists();
        if($properties->looking_to == 'pg'){
            $nearbySimilarHomes = properties::where('city', $properties->city)->where('looking_to', $properties->looking_to)->where('status', 'Published')->where('id', '!=', $properties->id)->take(5)->get();
        }else{
            $nearbySimilarHomes = properties::where('city', $properties->city)->where('property_type', $properties->property_type)->where('categories_type', $properties->categories_type)->where('status', 'Published')->where('id', '!=', $properties->id)->take(5)->get();
        }

        return view('single_property', compact('title', 'properties', 'likeproperty', 'propertiesReview', 'userHasReviewed', 'reviewReply', 'userHasRequest', 'userHasexistsRequest', 'nearbySimilarHomes'));
    }
}
