<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property_type;
use App\Models\Reviews;
use App\Models\User;
use App\Models\SendRequest;
use App\Models\FavouriteProperty;
use App\Models\properties;
use App\Models\Likeproperty;
use App\Models\Review_reply;
use App\Models\Chat;
use App\Models\Notifications;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;



class Vendorcontroller extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('vendor');
    // }



    public function view_dashboard(Request $request)
    {
        $title = 'DASHBOARD | GHAR KA SAPNA';

        $userData = $request->session()->get('user');
        $vendorID = $userData['id'];
        $totalProperties = properties::where('vendor_id', $vendorID)->count();
        $totalFavouriteProperty = FavouriteProperty::where('reg_id', $vendorID)->where('user_id', $vendorID)->count();
        return view('Vendor.dashboard', compact('title', 'userData', 'totalProperties', 'totalFavouriteProperty'));
    }



    public function view_my_property(Request $request)
    {
        $title = 'MY-PROPERTY | GHAR KA SAPNA';
        $userData = $request->session()->get('user');
        $sessionID = $userData->id;
        $property = properties::where('vendor_id', $sessionID)->orderBy('created_at', 'desc')->paginate(5);

        // $property = $property->paginate(5);
        return view('Vendor.my_property', compact('title', 'property', 'userData'));
    }





    public function view_reviews(Request $request)
    {

        $title = "MY REVIEWS | GHAR KA SAPNA";


        $vendorData = $request->session()->get('user');
        $reviews = Reviews::where('vender_id', $vendorData->id)->paginate(10);
        return view('Vendor.reviews', compact('title', 'reviews', 'vendorData'));
    }


    public function view_single_property_detail($segmentID, $propertyName, Request $request)
    {

        $replacesegmentName = str_replace("-", ' ', $propertyName);

        $title = $replacesegmentName . "SINGLE PROPERTY | GHAR KA SAPNA";
        $userData = $request->session()->get('user');
        $sessionID = $userData->id;
        $propertiesData = properties::where('id', $segmentID)->first();
        $likeProperty = FavouriteProperty::where('reg_id', $sessionID)->where('user_id', $sessionID)->where('property_id', $segmentID)->exists();
        $reviewData = Reviews::where('propertyID', $segmentID)->paginate(2);
        $countRequest = SendRequest::where('vendor_id', $sessionID)->where('status', 'pending')->count();

        return view('Vendor.single_property_detail', compact('title', 'propertiesData', 'reviewData', 'userData', 'likeProperty', 'countRequest'));
    }





    public function view_vendor_profile(Request $request)
    {
        $title = 'PROFILE | GHAR KA SAPNA';

        $userData = $request->session()->get('user');
        $sessionID = $userData->id;
        $profileData = User::where('id', $sessionID)->first();
        $countRequest = SendRequest::where('vendor_id', $sessionID)->where('status', 'pending')->count();

        return view('Vendor.profile', compact('title', 'profileData', 'userData', 'countRequest'));
    }


    public function update_vendorProfile(Request $request)
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

            return redirect()->route('vendor.profile')->with('success', 'Profile  updated successfully');
        } else {
            return redirect()->route('vendor.profile')->with('error', 'Profile  not found');
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

    public function like_vendorProperty(Request $request)
    {

        $userData = $request->session()->get('user');
        $sessionID = $userData->id;
        $ID = $request->input('id');

        $checkProperty = FavouriteProperty::where('reg_id', $sessionID)->where('user_id', $sessionID)->where('property_id', $ID)->exists();

        if ($checkProperty) {

            FavouriteProperty::where('reg_id', $sessionID)->where('user_id', $sessionID)->where('property_id', $ID)->delete();

            return response()->json(['message' => 'removed'], 200);
        }

        FavouriteProperty::create([
            'reg_id' => $sessionID,
            'user_id' => $sessionID,
            'property_id' => $ID
        ]);

        return response()->json(['message' => 'success'], 200);
    }


    public function view_notification()
    {

        $title = "NOTIFICATION | GHAR KA SAPNA ";
        return view('Vendor.notification', compact('title'));
    }




    // -------------------new function --------------------------------------------------------




    public function manage_vendor_posted_properties()
    {

        $title = "Manage Your Posted Properties | Ghar ka sapna";
        $sessionID = session()->get('id');
        $property = properties::where('vendor_id', $sessionID)->orderBy('created_at', 'desc')->paginate(25);
        $countRequest = SendRequest::where('vendor_id', $sessionID)->where('status', 'pending')->count();
        return view('gharkasapna.innerpage.vendor_properties', compact('title', 'property', 'countRequest'));
    }


    public function search_my_properties(Request $request)
    {

        $search = $request->input('search');
        $sessionID = session()->get('id');
        $propertiesData = properties::where('property_name', 'like', "%{$search}%")->where('vendor_id', $sessionID)->paginate(10);

        if ($propertiesData->isEmpty()) {
            $propertiesData = properties::where('pg_name', 'like', "%{$search}%")
                ->where('vendor_id', $sessionID)
                ->paginate(10);
        }


        if ($propertiesData) {

            return response()->json(['propertiesData' => $propertiesData]);
        } else {
            return response()->json(['failed' => 'failed']);
        }
    }

    public function vendor_properties_single_listing(Request $request, $segmentName)
    {

        $replacesegmentName = str_replace("-", ' ', $segmentName);
        $sessionID = session()->get('id');
        $checksegment = $request->segment(1);
        $title = ucfirst($replacesegmentName) . ' | Ghar Ka Sapna';

        if ($checksegment == 'properties') {
            $propertiesData  = properties::where('property_name', $replacesegmentName)->first();
        } elseif ($checksegment == 'paying-living') {
            $propertiesData  = properties::where('pg_name', $replacesegmentName)->first();
        }
        $likeproperty = Likeproperty::where('property_id', $propertiesData->id)->where('user_id', $sessionID)->where('vendor_id', $propertiesData->vendor_id)->first();
        $countRequest = SendRequest::where('vendor_id', $sessionID)->where('status', 'pending')->count();
        $countRequestaccept = SendRequest::where('user_id', $sessionID)->where('status', 'accepted')->count();

        $reviewData = Reviews::where('propertyID', $propertiesData->id)->get();
        $userHasReviewed = Reviews::where('propertyID', $propertiesData->id)->where('user_id', $sessionID)->exists();
        $propertyIds = $reviewData->pluck('propertyID')->toArray();
        $reviewReply = Review_reply::whereIn('property_id', $propertyIds)->get();

        return view('gharkasapna.innerpage.vendor_single_properties', compact('title', 'propertiesData', 'likeproperty', 'reviewData', 'userHasReviewed', 'reviewReply', 'countRequest', 'countRequestaccept'));
    }


    public function manage_vendor_reviews()
    {

        $sessionID = session()->get('id');
        $title = "Explore Your Reviews | Ghar Ka Sapna";
        $pageTitle = "Explore Your Reviews";
        $ReviewsData = Reviews::where('vender_id', $sessionID)->orderBy('created_at', 'desc')->paginate(5);
        $propertyIds = $ReviewsData->pluck('propertyID')->toArray();
        $reviewReply = Review_reply::whereIn('property_id', $propertyIds)->get();
        $countRequest = SendRequest::where('vendor_id', $sessionID)->where('status', 'pending')->count();
        // dd($reviewReply);

        return view('gharkasapna.innerpage.vendor_all_reviews', compact('title', 'pageTitle', 'ReviewsData', 'reviewReply', 'countRequest'));
    }


    public function notification_view()
    {
        $title = "Notification | Ghar Ka Sapna";
        $sessionID = session()->get('id');
        $sendRequest = SendRequest::where('vendor_id', $sessionID)->get();
        $countRequest = SendRequest::where('vendor_id', $sessionID)->where('status', 'pending')->count();
        $countRequestaccept = SendRequest::where('user_id', $sessionID)->where('status', 'accepted')->count();

        $userRequestData = SendRequest::where('user_id', $sessionID)->where('status', 'accepted')->get();
        return view('gharkasapna.innerpage.notification', compact('title', 'sendRequest', 'countRequest', 'userRequestData', 'countRequestaccept'));
    }

    public function user_send_request(Request $request)
    {
        // print_r($request->all());
        $userID = $request->input('userID');
        $vendorID = $request->input('vendorID');
        $propertyID = $request->input('propertyID');

        $checkRequest = SendRequest::where('user_id', $userID)->where('vendor_id', $vendorID)->where('property_id', $propertyID)->exists();

        if ($checkRequest) {
            return response()->json(['success' => false, 'message' => 'Request already exists.']);
        }


        $sendRequest = SendRequest::create([
            'user_id' => $userID,
            'vendor_id' => $vendorID,
            'property_id' => $propertyID,
            'status' => 'pending'
        ]);

        Notifications::create([
            'property_id' => $propertyID,
            'vendor_id' => $vendorID,
            'user_id' => $userID,
            'data' => 'msg_request'
        ]);



        return response()->json(['success' => true, 'message' => 'Request send successfully .']);
    }

    public function user_reject_request(Request $request)
    {

        $userID = $request->input('userID');
        $vendorID = $request->input('vendorID');
        $propertyID = $request->input('propertyID');
        $checkRequest = SendRequest::where('user_id', $userID)->where('vendor_id', $vendorID)->where('property_id', $propertyID)->first();
        $chekNotifition = Notifications::where('property_id', $propertyID)->where('vendor_id', $vendorID)->where('user_id', $userID)->where('data', 'msg_request')->first();


        if ($chekNotifition) {
            $chekNotifition->delete();
        }

        if ($checkRequest) {
            $checkRequest->delete();
            return response()->json(['success' => true, 'message' => 'Request rejected successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Request not found.']);
    }

    // public function user_reject_pgRequest()


    public function user_send_paying_request(Request $request)
    {

        $userID = $request->input('userID');
        $vendorID = $request->input('vendorID');
        $propertyID = $request->input('propertyID');
        $checkRequest = SendRequest::where('user_id', $userID)->where('vendor_id', $vendorID)->where('property_id', $propertyID)->exists();
        if ($checkRequest) {
            return response()->json(['success' => false, 'message' => 'Request already exists.']);
        }

        $sendRequest = SendRequest::create([
            'user_id' => $userID,
            'vendor_id' => $vendorID,
            'property_id' => $propertyID,
            'status' => 'pending'
        ]);

        Notifications::create([
            'property_id' => $propertyID,
            'vendor_id' => $vendorID,
            'user_id' => $userID,
            'data' => 'msg_request'
        ]);

        return response()->json(['success' => true, 'message' => 'Request send successfully .']);
    }

    public function vendor_accept_request(Request $request)
    {
        //print_r($request->all());
        $requestID = $request->input('requestID');
        $checkRequest = SendRequest::find($requestID);
        $updateStatus = SendRequest::where('id', $checkRequest->id)->update(['status' => 'accepted']);
        return response()->json(['success' =>  true], 200);
    }

    public function vendor_reject_request(Request $request)
    {

        $requestID = $request->input('requestID');
        $checkRequest = SendRequest::find($requestID);

        if (!$checkRequest) {
            return response()->json(['error' => 'Request not found'], 404);
        }
        $checkRequest->delete();
        return response()->json(['success' => true], 200);
    }


    public function vendor_manage_chatbox($name = null)
    {

        $sessionID = session()->get('id');
        $title = "Message | Ghar Ka Sapna";
        $pageTitle = "Messages";
        $getuserData = SendRequest::where('vendor_id', $sessionID)->where('status', 'accepted')->get();
        $initialMessages = Chat::where('sender_id', $sessionID)->orWhere('receiver_id', $sessionID)->orderBy('created_at', 'desc')->get();
        return view('gharkasapna.innerpage.vendor_chatBox', compact('title', 'pageTitle', 'getuserData', 'initialMessages'));
    }


    public function vendor_manage_send_msg(Request $request)
    {

        $senderID  = session()->get('id');
        $receiverID = $request->input('userID');
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
        return response()->json(['success' => 'success', 'chat' => $newChat, 'chatData' => $getChat, 'sessionUserID' => $senderID]);
    }

    public function vendor_chat_Data(Request $request)
    {

        // print_r($request->all());
        $userID = $request->input('userID');
        $sessionID = session()->get('id');

        $getChat = Chat::where(function ($query) use ($sessionID, $userID) {
            $query->where('sender_id', $sessionID)
                ->where('receiver_id', $userID);
        })->orWhere(function ($query) use ($sessionID, $userID) {
            $query->where('sender_id', $userID)
                ->where('receiver_id', $sessionID);
        })->get();
        return response()->json(['chatData' => $getChat, 'sessionUserID' => $sessionID]);
    }


    public function vendor_delete_msg(Request $request)
    {

        $sessionID = session()->get('id');

        $deleteID = $request->input('deleteID');
        // $deletedMessages  = Chat::where(function($query) use ($sessionID, $deleteID) {
        //     $query->where('sender_id', $sessionID)
        //     ->where('receiver_id', $deleteID);
        // })->orWhere(function ($query) use ($sessionID, $deleteID) {
        //     $query->where('sender_id', $deleteID)
        //           ->where('receiver_id', $sessionID);
        // })->delete();
        $deletedMessages = Chat::where('sender_id', $sessionID)->delete();


        if ($deletedMessages) {
            return response()->json(['success' => true, 'message' => 'Messages deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to delete messages']);
        }
    }

    public function vendor_like_properties()
    {

        $title = "My Favorites Properties | Ghar Ka Sapna";
        $sessionID = session()->get('id');
        $likeProperty = Likeproperty::where('user_id', $sessionID)->orderBy('created_at', 'desc')->paginate(8);

        return view('gharkasapna.innerpage.vendor_like_properties', compact('title', 'likeProperty'));
    }

    public function vendor_dislike_property(Request $request)
    {

        $propertyId = $request->input('propertyId');

        $property = Likeproperty::find($propertyId);

        if ($property) {
            $property->delete();
            return response()->json(['success' => true, 'message' => 'Property deleted successfully']);
        } else {
            return response()->json(['error' => true, 'message' => 'Failed to delete Property: Property not found'], 404);
        }
    }

    public function accept_chat_request(Request $request)
    {

        $sessionID = session()->get('id');
        $propertyId = $request->input('propertyId');
        $userId = $request->input('userId');
        $notifyId = $request->input('notifyId');
        $updateStatus = SendRequest::where('user_id', $userId)->where('vendor_id', $sessionID)->where('property_id', $propertyId)->update(['status' => 'accepted']);

        $chekNotifitionId = Notifications::find($notifyId);
        if ($chekNotifitionId) {
            $chekNotifitionId->delete();
            $message = 'You have accepted the chat request. Click the button below to start chatting with ';
            return response()->json(['success' => true, 'message' => $message]);
        }
    }



    public function CurrentUserList(Request $request)
    {

        $sessionID = session()->get('id');
        $userList = SendRequest::where('vendor_id', $sessionID)->where('status', 'accepted')->orderBy('created_at', 'desc')->with('user')->get();

        if ($userList) {
            return response()->json(['success' => true, 'userList' => $userList]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function vendor_userMessage(Request $request)
    {
        //print_r($request->all());
        $sessionID = session()->get('id');
        $userId = $request->input('userId');

        // info('Session ID: ' . $sessionID);
        // info('User ID: ' . $userId);
        $messages = Chat::where(function ($query) use ($userId, $sessionID) {
            $query->where('sender_id', $userId)
                ->where('receiver_id', $sessionID);
        })->orWhere(function ($query) use ($userId, $sessionID) {
            $query->where('sender_id', $sessionID)
                ->where('receiver_id', $userId);
        })->get();

        return response()->json(['messages' => $messages, 'sessionId' => $sessionID]);
    }




    
}
