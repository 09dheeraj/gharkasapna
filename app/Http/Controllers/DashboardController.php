<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Authmodel;
use Illuminate\Support\Str;
use App\Models\properties;
use App\Models\FavouriteProperty;
use App\Models\Likeproperty;
use App\Models\Reviews;
use App\Models\SendRequest;
use App\Models\Notifications;



class DashboardController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('dashboard');
    // }



    public function view_dashboard(Request $request)
    {
        $sessionID = session()->get('id'); // session ID 



        $title = "WELCOME TO GHAR KA SAPNA | DASHBOARD";
        $totalProperties = properties::count();
        $totalusers = Authmodel::where('roles', 'user')->count();
        $totalvendor = Authmodel::where('roles', 'vendor')->count();
        $myPropertyCount = properties::where('vendor_id', $sessionID)->count();
        $usercountLikeproperty = Likeproperty::where('user_id', $sessionID)->count();
        $totallikeProperty = FavouriteProperty::count();
        $totalvendorProperty = properties::where('vendor_id', $sessionID)->count();
        $totalVisitorReviews = Reviews::where('vender_id', $sessionID)->count();
        $totalvisitorLike = Likeproperty::where('vendor_id', $sessionID)->count();
        $totalVisitorReviewsAdmin = Reviews::count();
        $admincountLikeproperty = Likeproperty::count();
        $countRequest = SendRequest::where('vendor_id', $sessionID)->where('status', 'pending')->count();
        $countRequestaccept = SendRequest::where('user_id', $sessionID)->where('status', 'accepted')->count();
        $vendorLikeProperties = Likeproperty::where('user_id', $sessionID)->count();
        $adminlikeProperty = Likeproperty::where('user_id', $sessionID)->count();

        $notifications = Notifications::where('vendor_id', $sessionID)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $notificationsAccept = SendRequest::where('user_id', $sessionID)->where('status', 'accepted')->orderBy('created_at', 'desc')->paginate(5);


        return view('gharkasapna.innerpage.dashboard', compact(
            'title',
            'totalProperties',
            'totalusers',
            'totalvendor',
            'myPropertyCount',
            'totallikeProperty',
            'adminlikeProperty',
            'notifications',
            'usercountLikeproperty',
            'totalvendorProperty',
            'totalVisitorReviews',
            'totalvisitorLike',
            'totalVisitorReviewsAdmin',
            'admincountLikeproperty',
            'countRequest',
            'countRequestaccept',
            'vendorLikeProperties',
            'notificationsAccept'
        ));
    }


    public function view_my_profile()
    {
        $sessionID = session()->get('id');
        $title = 'MY PROFILE | GHAR KA SAPNA';
        $countRequest = SendRequest::where('vendor_id', $sessionID)->where('status', 'pending')->count();
        $countRequestaccept = SendRequest::where('user_id', $sessionID)->where('status', 'accepted')->count();

        return view('gharkasapna.innerpage.profile', compact('title', 'countRequest', 'countRequestaccept'));
    }

    public function update_user_Data(Request $request)
    {
        $ID = $request->session()->get('id');

        $name = $request->input('user_name');
        $Phone = $request->input('user_phone');
        $city = $request->input('city');
        $address = $request->input('address');
        $description = $request->input('description');

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


        $profilData = Authmodel::where('id', $ID)->first();

        if ($profilData) {
            $profilData->name = $name;
            $profilData->phone = $Phone;
            $profilData->city = $city;
            $profilData->address = $address;
            $profilData->description = $description;
            if ($profileImage) {
                $profilData->image = $profileImage;
            }
            $profilData->save();

            // Update session values
            $request->session()->put([
                'name' => $profilData->name,
                'phone' => $profilData->phone,
                'image' => $profilData->image,
                'city' => $profilData->city,
                'address' => $profilData->address,
                'description' => $profilData->description,
                'status' => $profilData->status
            ]);

            return redirect()->back()->with('success', 'Profile updated successfully');
        }

        return redirect()->back()->with('error', 'Profile not found');
    }


    public function remove_user_image(Request $request)
    {
        $regID = $request->input('profileId');
        $profileImage = null;
        $removeImage = Authmodel::find($regID);
        if ($removeImage) {
            $removeImage->image = $profileImage;
            $removeImage->save();
            $request->session()->forget('image');
            return response()->json('success', 200);
        }
        return response()->json('Image not found', 404);
    }

}
