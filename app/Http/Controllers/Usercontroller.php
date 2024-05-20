<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property_type;
use App\Models\FavouriteProperty;
use App\Models\Vendor_properties;
use App\Models\User;
use App\Models\Reviews;
use Illuminate\Support\Str;
use App\Models\properties;
use App\Models\Likeproperty;
use App\Models\SendRequest;
use App\Models\Chat;
use App\Models\Notifications;
use App\Models\Authmodel;


class UserController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('user');

    // }



    public function view_dashboard(Request $request)
    {
        $title = 'DASHBOARD | USER';
        $userData = $request->session()->get('user');
        $userID = $userData['id'];
        $totalFavouriteProperty = FavouriteProperty::where('user_id', $userID)->count();

        return view('User.dashboard', compact('title', 'userData', 'totalFavouriteProperty'));
    }






    public function user_property(Request $request)
    {
        $title = 'USER PROPERTY| USER';
        $userData = $request->session()->get('user');

        //    $properties = properties::paginate(5);
        $query = $request->filled('search');
        $properties = properties::where('categories_type', 'LIKE', "%{$query}%")->orWhere('looking_to', 'LIKE', "%{$query}%")
            ->paginate(10);

        //    if ($request->filled('search')) {
        //     $properties->where('property_name', 'like', '%' . $request->input('search') . '%')->orwhere('project_society', 'like', '%' . $request->input('search') . '%');
        //   }




        return view('User.user_property', compact('title', 'userData', 'properties'));
    }




    public function user_category_selectpicker(Request $request)
    {
        $propertyType = $request->input('propertyType');

        if ($propertyType == 'commercial') {
            $properties = properties::where('property_type', 'commercial')
                ->where('status', 'Published')
                ->get();
            // print_r($propertyType);

            return response()->json(['properties' => $properties]);
        } else {
            $properties = properties::where('categories_type', $propertyType)
                ->where('status', 'Published')
                ->get();
            // print_r($properties);

            return response()->json(['properties' => $properties]);
        }
    }




    public function  view_single_user_property(Request $request)
    {
        $title = 'VIEW SINGLE USER PROPERTY| USER';
        $propertiesData = properties::where('id', $request->id)->first();

        return view('User.user_single_property', compact('title', 'propertiesData'));
    }





    public function view_all_property(Request $request)
    {
        $title['title'] = 'PROPERTY | USER';
        $status = "Published";

        $userData['userData'] = $request->session()->get('user');
        $userID = $userData['userData']['id'];
        $property_type['property_type'] = Property_type::all();


        $properties['properties'] = Vendor_properties::where('status', $status)->paginate(10);
        $favourite_properties['favourite_properties'] = FavouriteProperty::where('user_id', $userID)->get();



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

        $searchDATA['searchDATA'] = $query->paginate(10);

        $mergedData = array_merge($title, $properties, $property_type, $searchDATA, $favourite_properties, $userData);

        return view('User.all_property', $mergedData);
    }

    public function view_single_property_detail($segmentID, $propertyName, Request $request)
    {
        $replacesegmentName = str_replace("-", ' ', $propertyName);

        $title = ucfirst($replacesegmentName) . " SINGLE PROPERTY | USERS";
        $userData = $request->session()->get('user');
        $propertiesData = Vendor_properties::where('id', $segmentID)->first();
        $PropertyType = $propertiesData->property_type;
        $propertydata = Property_type::where('id', $PropertyType)->first();
        $AllpropertiesData = Vendor_properties::inRandomOrder()->limit(10)->get();
        $reviewData = Reviews::where('propertyID', $segmentID)->paginate(2);
        $getreviewData = Reviews::all();
        return view('User.single_property', compact('title', 'propertiesData', 'propertydata', 'AllpropertiesData', 'reviewData', 'userData', 'getreviewData'));
    }




    public function view_favourite_property(Request $request)
    {
        $data['title'] = 'MY FAVOURITE | USERS';
        $userData['userData'] = $request->session()->get('user');
        $userID = $userData['userData']['id'];
        $favourite_properties['favourite_properties'] = FavouriteProperty::where('user_id', $userID)->inRandomOrder()->paginate(10);



        $mergedData = array_merge($data, $favourite_properties, $userData);
        return view('User.favourite_property', $mergedData);
    }

    public function like_Property(Request $request)
    {
        $propertyID = $request->propertyID;
        $reg_id = $request->reg_id;

        $userData['userData'] = $request->session()->get('user');
        $userID = $userData['userData']['id'];



        $favouriteProperties = FavouriteProperty::where('property_id', $propertyID)->where('user_id', $userID)->get();

        if ($favouriteProperties->count() > 0) {
            // Delete the existing entry
            $favouriteProperties->first()->delete();
            return response('Property unliked successfully');
        } else {
            FavouriteProperty::create([
                'reg_id' => $reg_id,
                'user_id' => $userID,
                'property_id' => $propertyID,
                'comment' => 'Your comment here',
            ]);
            return response('Property liked successfully');
        }
    }


    public function delete_property($propertyId)
    {

        $property = FavouriteProperty::where('id', $propertyId);

        if ($property) {
            // Perform deletion
            $property->delete();

            return response()->json('Property deleted successfully');
        } else {
            return response()->json('Property not found', 404);
        }
    }

    public function view_user_profile(Request $request)
    {
        $title = "MY PROFILE | USER";

        $userData = $request->session()->get('user');
        $sessionID = $userData->id;
        $profileData = User::where('id', $sessionID)->first();

        return view('User.user_profile', compact('title', 'profileData', 'userData'));
    }

    public function update_user_profile(Request $request)
    {

        $Firstname = $request->input('first_name');
        $Lastname = $request->input('last_name');
        $Phone = $request->input('phone');
        $City = $request->input('city');
        $State = $request->input('state');
        $Country = $request->input('country');
        $Address = $request->input('address');
        $description = $request->input('description');


        $userData = $request->session()->get('user');
        $sessionID = $userData->id;

        $profileData = User::find($sessionID);

        $profileImage = null;

        if ($request->hasFile('profile_img')) {
            $image = $request->file('profile_img');
            if ($image->isValid()) {
                $originalExtension = $image->getClientOriginalExtension();
                $newExtension = 'webp';
                $uniqueName = Str::random(20) . '.' . $newExtension;
                $imagePath = public_path('assets/profile-img/' . $uniqueName);
                $image->move(public_path('assets/profile-img/'), $uniqueName);

                $profileImage = $uniqueName;
            }
        }


        if ($profileData) {
            $profileData->first_name = $Firstname;
            $profileData->last_name = $Lastname;
            $profileData->phone = $Phone;
            $profileData->city = $City;
            $profileData->state = $State;
            $profileData->country = $Country;
            $profileData->address  = $Address;
            $profileData->description = $description;

            if ($profileImage) {
                $profileData->image = $profileImage;
            }

            $profileData->save();

            $request->session()->put('user', $profileData);

            return redirect()->route('user.profile')->with('success', 'Profile  updated successfully');
        } else {
            return redirect()->route('user.profile')->with('error', 'Profile  not found');
        }
    }

    public function remove_ProfileImage(Request $request)
    {
        $regID = $request->input('profileId');
        $profileImage = null;
        $removeImage = User::find($regID);
        if ($removeImage) {
            $removeImage->image = $profileImage;
            $removeImage->save();
            return response()->json('success', 200);
        }
        return response()->json('Image not found', 404);
    }


    public function submit_userReview(Request $request)
    {
        $userData = $request->session()->get('user');
        $sessionID = $userData->id;
        $rating = $request->input('rating');
        $body = $request->input('body');
        $vendorID = $request->input('venderId');
        $propertyID = $request->input('propertyID');


        // $hasSubmitted = Reviews::where('user_id', $sessionID)->exists();
        // $hasSubmitted = $request->session()->has('form_submitted');

        // if ($hasSubmitted) {

        //     // Prevent the review from being submitted again
        //     return response()->json('You have already submitted a review.', 403);
        // }

        // $request->session()->put('form_submitted', true); 

        $submitReview = Reviews::create([

            'user_id' => $sessionID,
            'vender_id' => $vendorID,
            'body' => $body,
            'review' => $rating,
            'propertyID' => $propertyID,
        ]);


        if ($submitReview) {

            return response()->json('success', 200);
        } else {

            return response()->json('not found', 404);
        }
        // $request->session()->flash('reviewSubmitted', true);

    }




    // new function  --------------------------------




    public function user_mange_like_property(Request $request)
    {

        // print_r($request->all());

        $sessionID = session()->get('id');
        $vendorID = $request->input('vendorID');
        $propertyId = $request->input('propertyId');

        $existingLike = Likeproperty::where('vendor_id', $vendorID)
            ->where('user_id', $sessionID)
            ->where('property_id', $propertyId)
            ->first();

        $existingNotify = Notifications::where('property_id', $propertyId)
            ->where('user_id', $sessionID)
            ->where('vendor_id', $vendorID)
            ->where('data', 'like')
            ->first();

        if ($existingNotify) {
            $existingNotify->delete();
        }

        if ($existingLike) {
            $existingLike->delete();
            return response()->json(['message' => 'removed'], 200);
        }

        Likeproperty::create([
            'vendor_id' => $vendorID,
            'user_id' => $sessionID,
            'property_id' => $propertyId
        ]);

        Notifications::create([
            'property_id' => $propertyId,
            'vendor_id' => $vendorID,
            'user_id' => $sessionID,
            'data' => 'like'
        ]);

        return response()->json(['message' => 'success'], 200);
    }

    public function paying_like_property(Request $request)
    {
        //  print_r($request->all());
        $sessionID = session()->get('id');
        $vendorID = $request->input('vendorID');
        $propertyId = $request->input('propertyId');

        $existingLike = Likeproperty::where('vendor_id', $vendorID)
            ->where('user_id', $sessionID)
            ->where('property_id', $propertyId)
            ->first();

        if ($existingLike) {
            $existingLike->delete();
            return response()->json(['message' => 'removed'], 200);
        }

        Likeproperty::create([
            'vendor_id' => $vendorID,
            'user_id' => $sessionID,
            'property_id' => $propertyId
        ]);

        return response()->json(['message' => 'success'], 200);
    }


    public function user_favorites_properties()
    {
        $sessionID = session()->get('id');
        $title = 'Liked Properties | Ghar Ka Sapna';
        $pageTitle = "Liked Properties";
        $likeproperty = Likeproperty::where('user_id', $sessionID)->orderBy('created_at', 'desc')->paginate(9);
        $countRequestaccept = SendRequest::where('user_id', $sessionID)->where('status', 'accepted')->count();


        return view('gharkasapna.innerpage.user_favorites_properties', compact('title', 'pageTitle', 'likeproperty', 'countRequestaccept'));
    }


    public function dislike_user_fav_properties(Request $request)
    {
        $propertyId = $request->input('propertyId');
        $dislikeProperty = Likeproperty::where('id', $propertyId);

        if ($dislikeProperty) {
            $dislikeProperty->delete();

            return response()->json('Property deleted successfully');
        } else {
            return response()->json('Property not found', 404);
        }
    }


    public function submit_user_review(Request $request)
    {
        //dd($request->all());
        $rating = $request->input('rating');
        $body = $request->input('review');
        $vendorID = $request->input('vendor_id');
        $propertyID = $request->input('property_id');
        $sessionID = session()->get('id');

        $submitReview = Reviews::create([
            'user_id' => $sessionID,
            'vender_id' => $vendorID,
            'body' => $body,
            'review' => $rating,
            'propertyID' => $propertyID,
        ]);

        if ($submitReview) {

            return redirect()->back()->with('success', 'Review added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add Review. Please try again.');
        }
    }

    public function user_manage_chatBox($name = null)
    {

        $title = "Message | Ghar Ka Sapna";
        $sessionID = session()->get('id');
        $vendorList = SendRequest::where('user_id', $sessionID)->where('status', 'accepted')->distinct('user_id')->get();


        // $messages = Chat::where(function ($query) use ($sessionID) {
        //     $query->where('sender_id', $sessionID)
        //           ->orWhere('receiver_id', $sessionID);
        // })->get();

        return view('gharkasapna.innerpage.user_chatBox', compact('title', 'vendorList'));
    }

    public function user_chat_data(Request $request)
    {

        $vendorID = $request->input('vendorID');
        $sessionID = session()->get('id');

        $getChat = Chat::where(function ($query) use ($sessionID, $vendorID) {
            $query->where('sender_id', $sessionID)
                ->where('receiver_id', $vendorID);
        })->orWhere(function ($query) use ($sessionID, $vendorID) {
            $query->where('sender_id', $vendorID)
                ->where('receiver_id', $sessionID);
        })->get();

        return response()->json(['chatData' => $getChat, 'sessionUserID' => $sessionID]);
    }

    public function user_manage_send_msg(Request $request)
    {

        $receiverID = $request->input('vendorID');
        $senderID = session()->get('id');
        $message = $request->input('msg');

        $newChat = Chat::create([
            'sender_id' => $senderID,
            'receiver_id' => $receiverID,
            'message' => $message,

        ]);

        $getChat = Chat::where(function ($query) use ($senderID, $receiverID) {
            $query->where('sender_id', $senderID)
                ->where('receiver_id', $receiverID);
        })->orWhere(function ($query) use ($senderID, $receiverID) {
            $query->where('sender_id', $receiverID)
                ->where('receiver_id', $senderID);
        })->get();


        return response()->json(['success' => 'success', 'chatData' => $getChat, 'chat' => $newChat, 'sessionUserID' => $senderID]);
    }

    public function user_delete_msg(Request $request)
    {
        //print_r($request->all());

        $sessionID = session()->get('id');
        $deletedMessages = Chat::where('sender_id', $sessionID)->delete();

        if ($deletedMessages) {
            return response()->json(['success' => true, 'message' => 'Messages deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to delete messages']);
        }
    }
}
