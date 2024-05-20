<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Vendorcontroller;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//---------------------- user authentication----------------------

  Route::group(['middleware' => 'guest'], function () {

    Route::post('gernate-userOTP',[Authcontroller::class,'gernate_user_otp'])->name('genrate.userOTP');
    Route::post('check-auth', [Authcontroller::class, 'check_user_authentication'])->name('checkUser.authentication');
    Route::get('admin', [Authcontroller::class, 'admin_login_page'])->name('admin.page');
    Route::post('check-admin', [Authcontroller::class, 'check_admin_login'])->name('check.admin');

});




// ---------------------------- after login ---------------------------------------------------


Route::group(['middleware' => 'dashboard'], function () {
    
    // edit post property
    Route::get('edit-post-property/{id}', [Admincontroller::class, 'edit_post_property'])->name('edit');
    Route::post('remove-property-image', [Admincontroller::class, 'remove_property_image'])->name('remove.propertyImage');
    Route::post('remove-property-video', [Admincontroller::class, 'remove_property_video'])->name('remove.propertyVideo');
    Route::post('update-post-property', [Admincontroller::class, 'update_post_property'])->name('update.property');

    Route::get('session-destroy', [Authcontroller::class, 'session_destroy'])->name('session.destroy');
    Route::get('welcome-dashboard', [DashboardController::class, 'view_dashboard'])->name('gharkasapna.dashboard');
    Route::get('my-profile', [DashboardController::class,'view_my_profile'])->name('my.profile');
    Route::post('user-update',[DashboardController::class,'update_user_Data'])->name('update.user');
    Route::post('user-fav', [DashboardController::class, 'user_fav_properties'])->name('user.fav_property');
    Route::post('remove-profile-user', [DashboardController::class, 'remove_user_image'])->name('user.profiledelete');

    // vendor properties--------
    Route::get('manage-posted-properties', [Vendorcontroller::class, 'manage_vendor_posted_properties'])->name('mange.post_properties');
    Route::post('search-properties', [Vendorcontroller::class, 'search_my_properties'])->name('searchproperties.vendor');
    Route::get('properties/{name}', [Vendorcontroller::class, 'vendor_properties_single_listing'])->name('properties.details');
    Route::get('paying-living/{name}', [Vendorcontroller::class, 'vendor_properties_single_listing'])->name('paying_living.details');

    // admin routes --------------------------------

    Route::get('manage-all-properties', [Admincontroller::class, 'manage_all_properties'])->name('manage.all_properties');
    Route::post('manage-status', [Admincontroller::class, 'manage_property_status'])->name('manage.status');
    Route::post('admin-delete-property', [Admincontroller::class, "manage_delete_property"])->name('admin.delete_property');
    Route::post('search-properties-admin', [Admincontroller::class, 'search_admin_properties'])->name('search.admin.properties');
    Route::get('manage-blogs', [Admincontroller::class, 'manage_all_blogs'])->name('manage.blogs');
    Route::post('manage-blog-status', [Admincontroller::class, 'manage_blogs_status'])->name('manage.blog.status');
    Route::get('new-blog', [Admincontroller::class, 'manage_add_blog'])->name('manage.add.blog');
    Route::post('add-blog-category', [Admincontroller::class, 'add_blog_category'])->name('add.blog.category');
    Route::post('manage-add-blog', [Admincontroller::class, 'manage_create_blog'])->name('add.blog');
    Route::get('update-blog/{name}', [Admincontroller::class, 'manage_update_blog'])->name('manage.update.blog');
    Route::post('blog-update', [Admincontroller::class, 'submit_data_update_blog'])->name('submit.update.blog');
    Route::post('blog-delete', [Admincontroller::class, 'manage_delete_blog'])->name('delete.blog');
    Route::get('blog/{name}', [Admincontroller::class, 'manage_blog_detail'])->name('blog.detail');
    Route::post('comment', [Admincontroller::class, 'manage_blog_comments'])->name('manage.blog.comment');
    Route::post('blog-search', [Admincontroller::class, 'manage_blog_search'])->name('search.admin.blog');
    Route::get('my-properties', [Admincontroller::class, 'admin_post_properties'])->name('admin.properties');
    Route::get('single-list/{name}', [Admincontroller::class, 'properties_single_list'])->name('admin.single.list');
    Route::get('membership-plans', [Admincontroller::class, 'admin_manage_package'])->name('admin.package');
    
    //  like properties routes ----------------------------------
    
    Route::post('single-fav-property', [Usercontroller::class, 'user_mange_like_property'])->name('fav.property');
    Route::get('my-favorites', [Usercontroller::class, 'user_favorites_properties'])->name('my.favorites');
    Route::post('dislike-property', [Usercontroller::class, 'dislike_user_fav_properties'])->name('dislike.property');
    Route::post('fav-paying', [Usercontroller::class, 'paying_like_property'])->name('fav.property.pg');
    Route::get('my-fav-properties', [Vendorcontroller::class, 'vendor_like_properties'])->name('my.fav.properties');
    Route::post('vendor-dislike-property', [Vendorcontroller::class, 'vendor_dislike_property'])->name('vendor.dislike.property');
    Route::get('my-fav', [Admincontroller::class, 'admin_fav_properties'])->name('admin.fav.properties');
    Route::post('dislike-admin-property', [Admincontroller::class, 'admin_dislike_properties'])->name('admin.dislike.property');


    // reviews routes -------------------

    Route::post('submit-review', [Usercontroller::class, 'submit_user_review'])->name('submit.review');
    Route::get('reviews', [Vendorcontroller::class, 'manage_vendor_reviews'])->name('reviews');
    Route::get('reviews-management', [Admincontroller::class, 'manage_all_reviews'])->name('admin.reviews');
    Route::post('manage-review-status', [Admincontroller::class, 'manage_review_status'])->name('manage.review.status');
    Route::post('admin-review-reply', [Admincontroller::class, 'admin_review_reply'])->name('admin.review.reply');
    Route::post('delete-review', [Admincontroller::class, 'delete_admin_review'])->name('delete.review');

    // chat routes
    Route::get('notification', [Vendorcontroller::class, 'notification_view'])->name('notification');
    Route::post('user-send-request', [Vendorcontroller::class, 'user_send_request'])->name('user.send.request');
    Route::post('user-reject-request', [Vendorcontroller::class, 'user_reject_request'])->name('user.reject.request');
    Route::post('user-reject-pgRequest', [Vendorcontroller::class, 'user_reject_pgRequest'])->name('user.reject.PGrequest');
    Route::post('accept-request', [Vendorcontroller::class, 'accept_chat_request'])->name('vendor.acceptRequest');

    Route::post('user-send-pg-request', [Vendorcontroller::class, 'user_send_paying_request'])->name('user.send.pg.request');
    Route::post('vendor-accept-request', [Vendorcontroller::class, 'vendor_accept_request'])->name('accept.request.vendor');
    Route::post('reject-request-vendor', [Vendorcontroller::class, 'vendor_reject_request'])->name('reject.request.vendor');
    Route::get('project-msg', [Vendorcontroller::class, 'vendor_manage_chatbox'])->name('vendor.msg');
    Route::post('vendor-send-msg', [Vendorcontroller::class, 'vendor_manage_send_msg'])->name('vendor.send.msg');
    Route::get('project-{name}', [Vendorcontroller::class, 'vendor_manage_chatbox']);
    Route::post('vendor-chat-data', [Vendorcontroller::class, 'vendor_chat_Data'])->name('vendor.chatdata');
    Route::post('vendor-delete-msg', [Vendorcontroller::class, 'vendor_delete_msg'])->name('delete.vendor.msg');
    Route::get('u-msg', [Usercontroller::class, 'user_manage_chatBox'])->name('user.msg');
    Route::get('u-msg-{name}', [Usercontroller::class, 'user_manage_chatBox']);
    Route::post('user-chat', [Usercontroller::class, 'user_chat_data'])->name('user.chat');
    Route::post('user-send-msg', [Usercontroller::class, 'user_manage_send_msg'])->name('send.user.msg');
    Route::post('user-delete-msg', [Usercontroller::class, 'user_delete_msg'])->name('delete.user.msg');

    

    // Membership Route

    Route::post('basic-plan', [Admincontroller::class, 'submit_data_basic_plan'])->name('basic.plan');
    Route::post('delete-basic-feature', [Admincontroller::class, 'delete_basic_feature'])->name('delete.basic.feature');
    Route::post('standard-plan', [Admincontroller::class, "submit_data_standard_plan"])->name('standard.plan');  
    Route::post('delete-standard', [Admincontroller::class, 'delete_standard_feature'])->name('delete.standard'); 
    Route::post('premium-plan', [Admincontroller::class, 'submit_data_premium_plan'])->name("premium.plan");
    Route::post('delete-premium', [Admincontroller::class, 'delete_premium_feature'])->name("delete.premium");
    Route::post('basic-status', [Admincontroller::class, 'manage_basic_status'])->name('basic.status');
    Route::post('standard-status', [Admincontroller::class, 'manage_standard_status'])->name('standard.status');
    Route::post('premium-status', [Admincontroller::class, 'manage_premium_status'])->name('premium.status');
    
});


Route::get('about-us',[Homecontroller::class, 'view_about_us'])->name('about.us');
Route::get('contact-us',[Homecontroller::class, 'view_contact_us'])->name('contact.us');
// blog-routes----------
Route::get('all-blogs-data', [Homecontroller::class, 'project_all_blogs'])->name('project.manage.all_blogs');
Route::get('single-blog/{name}', [Homecontroller::class, 'project_single_blog_detail'])->name('project.single.blog');
Route::post('home-comment', [Homecontroller::class, 'manage_home_blog_comment'])->name('manage.home.blog.comment');


//-------------------------  home section property route ------------------------------------------------------------

// --- buy -----------------------------------------------------
Route::post('index-search', [Homecontroller::class, 'search_filter_index'])->name('search.index');
Route::get('search/{city}',[Homecontroller::class, 'all_property_listing'])->name('search.properties.index');

Route::get('home', [Homecontroller::class, 'new_index_view']);
Route::get('real-estate-{city}', [Homecontroller::class, 'new_index_view']);
Route::get('all-properties-buy', [Homecontroller::class, 'all_property_listing'])->name('all.listing');
Route::get('all-properties-buy/{city}', [HomeController::class, 'all_property_listing'])->where('city', '[a-z0-9-]+');
Route::match(['get', 'post'], 'search-properties-by-category', [HomeController::class,'search_properties_by_category'])->name('search.properties.by.category');
Route::get('properties-buy/{name}', [HomeController::class, 'single_properties_listing'])->where('name', '[a-z0-9-]+')->name('single.listing');
Route::get('post-property', [Homecontroller::class, 'view_post_properties'])->name('post.property');
Route::post('post-property', [Authcontroller::class, 'submit_post_property'])->name('submit.post_property');
Route::post('create-vendor', [Authcontroller::class, 'create_vendor'])->name('create.vendor');
Route::post('check-vendor_otp', [Authcontroller::class, 'check_vendor_authentication'])->name('check.vendor_otp');


// ------------------------rent --------------------------------------------------

Route::get('rent', [Homecontroller::class, 'new_view_rent_properties'])->name('newrent.properties');
Route::get('property-for-rent-{city}', [Homecontroller::class, 'new_view_rent_properties']);
Route::post('search-rent-index', [Homecontroller::class, 'search_filter_rent_index'])->name('search.rent.index');
Route::get('rent-search/{city}', [Homecontroller::class, 'all_property_listing']);
Route::get('all-properties-rent', [Homecontroller::class, 'all_property_listing'])->name('all.listing.rent');
Route::get('all-properties-rent/{city}', [HomeController::class, 'all_property_listing'])->where('city', '[a-z0-9-]+');
Route::get('rental-properties/{name}', [Homecontroller::class, 'single_properties_listing'])->where('name', '[a-z0-9-]+')->name('single.listing.rent');
//Route::get('properties-buy/{name}', [Homecontroller::class, 'single_properties_listing'])->where('name', '[a-z0-9-]+')->name('properties.listing');
Route::get('properties-commerical/{name}', [Homecontroller::class, 'single_properties_listing'])->where('name', '[a-z0-9-]+')->name('single.listing.commerical');
Route::get('property/buy/{name}', [Homecontroller::class, 'view_properties_by_categories'])->where('name', '[a-z0-9-]+')->name('properties.categories');

// --------------------------- paying -guests ------------------------------

Route::get('paying-guests', [Homecontroller::class, 'new_view_paying_guests'])->name('new.paying.guests');
Route::get('pgs-in-{city}', [Homecontroller::class, 'new_view_paying_guests']);
Route::post('search-paying-index', [Homecontroller::class, 'search_filter_paying_guests'])->name('search.pg.in.city');
Route::get('paying-search/{city}', [Homecontroller::class, 'manage_pg_liating']);
Route::get('paying-guests-search/{city}', [Homecontroller::class, 'second_manage_pg_liating']);
Route::get('pg-listing/{name}', [Homecontroller::class, 'manage_pg_liating'])->where('name', '[a-z0-9-]+')->name('manage.pg.listing');
Route::get('single-paying/{name}', [Homecontroller::class, 'manage_single_pg_listing'])->where('name', '[a-z0-9-]+')->name('single.pg.listing');


//  --------------------------commercial-----------------------------

Route::get('commercial', [Homecontroller::class, 'commercial_index_view'])->name('commercial');
Route::get('commercial-real-estate-in-{city}', [Homecontroller::class, 'commercial_index_view']);
Route::post('commerical-search-index', [Homecontroller::class, 'search_filter_commerical_index'])->name('search.commercial.in.city');
Route::get('commerical-search/{city}', [Homecontroller::class, 'all_property_listing']);
Route::get('commerical-properties', [Homecontroller::class, 'all_property_listing'])->name('commerical.properties');
Route::get('commerical-properties/{city}', [Homecontroller::class, 'all_property_listing']);

//  ------- ------------------------plot ------------------------------------------

Route::get('plot', [Homecontroller::class, 'view_plot_index'])->name('plot.index');
Route::get('plots-in-{city}', [Homecontroller::class, 'view_plot_index']);
Route::post('plot-search-index', [Homecontroller::class, 'search_filter_plot_index'])->name('search.plot.in.city');
Route::get('single-plot/{name}', [Homecontroller::class, 'single_properties_listing'])->name('single.listing.plot');
Route::get('plot-search/{city}', [Homecontroller::class, 'all_property_listing']);
Route::get('plot-listing', [Homecontroller::class, 'all_property_listing'])->name('plot.listing');
Route::get('plot-listing/{city}', [Homecontroller::class, 'all_property_listing'])->name('plot.listing.in.city');



// -------------all_property_listing search filters routes    --------------------------------

Route::post('search-buy-section', [Homecontroller::class, 'search_filter_home_listing'])->name('search.buy.section');
Route::post('search-rent-section', [Homecontroller::class, 'search_filter_rentindex_listing'])->name('search.rent.section');
Route::post('search-commerical-section', [Homecontroller::class, 'search_filter_commerical_listing'])->name('search.commerical.section');
Route::post('search-plot-section', [Homecontroller::class, 'search_filter_plot_listing'])->name('search.plot.section');
Route::post('search-index-filter', [Homecontroller::class, 'search_index_filter'])->name('search.index.filter');
Route::post('search-rent-filter', [Homecontroller::class, 'search_rent_filter'])->name('search.rent.filter');
Route::post('search-commerical-filter', [Homecontroller::class, 'search_commerical_filter'])->name('search.commerical.filter');
Route::post('search-plot-filter', [Homecontroller::class, 'search_plot_filter'])->name('search.plot.filter');
Route::post('search-paying-guests-filter', [Homecontroller::class, 'search_paying_guests_filter'])->name('search.paying.guests.filter');
Route::post('paying-guests-search-filter', [Homecontroller::class, 'paying_guests_search_filter'])->name('paying.guests.search.filter');
Route::get('list/{cat}', [Homecontroller::class, 'list_property_by_cat'])->name('list');
Route::post('cat-list-filter', [Homecontroller::class, 'cat_list_filter'])->name('cat.search.filter');






// test route -------------
Route::get('temp-add', [Authcontroller::class, 'temp_add_property']);
Route::get('mirdul', [Homecontroller::class, 'mirdulSaklani']);

// teat chat app 
Route::post('current-user-list', [Vendorcontroller::class, 'CurrentUserList'])->name('current.userList');
Route::post('vendor-user-msg', [Vendorcontroller::class, 'vendor_userMessage'])->name('vendor.userMsg');

// new home page route 

Route::get('/', [Homecontroller::class, 'newHome'])->name('new.index');
Route::post('location-property', [Homecontroller::class, 'locationProperties'])->name('location.properties');
Route::post('index-filter', [Homecontroller::class, 'searchFilterIndex'])->name('home.filter');

// --2
Route::get('project-locality/{name}/{lookingTo}', [Homecontroller::class, 'allPropertiesListing']);
// --1
Route::get('home/{name}/{lookingTo}/{type}', [Homecontroller::class, 'allPropertiesListing']);

// unless city 
Route::get('home/{type}', [Homecontroller::class, 'allPropertiesListing'])->name('category.home');
Route::get("all-property/{name}", [Homecontroller::class, 'allPropertiesListing'])->name('new.allProperty');


Route::post('filter-allProperty', [Homecontroller::class, 'filterAllProperty'])->name('filter.allProperty');
Route::get('property/{name}/{id}', [Homecontroller::class, 'singleProperty'])->name('property');



