@extends('gharkasapna.layouts.app')
@section('content')


<style>
    .form-check-input {
        display: none;
    }

    /* Style for the custom radio button */
    .form-check-label {
        display: inline-block;
        cursor: pointer;
        padding: 6px 16px;
        border: 1px solid #f68121;
        border-radius: 6px;
        margin-right: -26px !important;
        background-color: #f6812133;
        color: #f68121;
    }

    .margin-left-techo {

        margin-left: -22px
    }

    .form-control {

        height: 42px !important;
        width: 100%;
    }

    .save-add {
        display: flex;
        justify-content: space-between;
        padding-top: 15px;
    }


    /* Style for the selected radio button */
    .form-check-input:checked+.form-check-label {
        background-color: #f68121;
        color: #fff;
    }

    .mandatoryMarker {
        color: red;
        font-size: 24px;
        font-weight: 400;
        padding: 0 3px;
    }

    .error-card .modal-content {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    }

    .error-card .modal-body {
        padding: 30px;
    }

    .error-card .modal-body p {
        margin: 0;
        font-size: 16px;
        color: #333;
    }

    .error-card .modal-body i {
        margin-right: 15px;
        font-size: 20px;
        color: #f00;
    }

    .post-property {
        color: red;
        text-align: center;
        font-size: 12px;
        font-style: inherit;
        font-weight: 600;
    }

    .custom-basic-title {
        font-size: 18px;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.7);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 80px auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }


    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>


<div class="wrapper ovh">
    <div class="preloader"></div>


    <div class="dashboard__main_custom pl0-md">
        <div class="dashboard__content property-page post-property-page bgc-f7">
            <div class="row pb40 d-block d-lg-none"> </div>
            <div class="row align-items-center pb40">
                <div class="col-lg-12">
                    <div class="dashboard_title_area">
                        <h2>Post your property</h2>
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="modal fade" id="error-card-toggle" aria-hidden="true" aria-labelledby="error-card-toggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="log-reg-form">
                                <div class="navtab-style2">
                                    <div class="tab-content" id="nav-tabContent2">
                                        <div class="tab-pane fade show active fz15" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="first-section mt20">
                <form action="{{route('submit.post_property')}}" method="post" id="property-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="ps-widget bgc-white bdrs12 default-box-shadow2 pt30 mb30 overflow-hidden position-relative">
                                <div class="navtab-style1">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="ps-widget bgc-white bdrs12 p30 overflow-hidden position-relative">
                                            <div class="ff-heading fw600 mb10 custom-basic-title">Add Basic Details</div>
                                            <hr>
                                            <!-- form tag -->
                                            <div class="row">
                                                <div class="ff-heading fw600 mb10">Property Type <span class="mandatoryMarker">*</span></div>
                                                <div class="row">
                                                    <div class="col-xl-4 col-sm-4 mb25 margin-left-techo">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" id="residential-radio" name="property_type" value="residential">
                                                            <label class="form-check-label fw600" for="residential-radio">Residential</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" id="commercial-radio" name="property_type" value="commercial">
                                                            <label class="form-check-label fw600" for="commercial-radio">Commercial</label>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text-color-black fw600 mb20">Looking to<span class="mandatoryMarker">*</span></div>

                                                <div class="col-xl-4 col-sm-4 mb25 margin-left-techo">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="looking_to" value="rent" id="rent-radio">
                                                        <label class="form-check-label fw600" for="rent-radio">Rent</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="looking_to" value="sell" id="sell-radio">
                                                        <label class="form-check-label fw600" for="sell-radio">Sell</label>
                                                    </div>
                                                    <div class="form-check form-check-inline pg-section">
                                                        <input class="form-check-input" type="radio" name="looking_to" value="pg" id="pg-living">
                                                        <label class="form-check-label fw600" for="pg-living">PG/Co-living</label>
                                                    </div>
                                                </div>



                                            </div>

                                            <div class="row">
                                                <?php if (session()->get('id')) {
                                                } else { ?>
                                                    <div class="col-sm-4 col-xl-3 mb25 custom-display-inline">
                                                        <div class="location-area">
                                                            <label for="phone" class="ff-heading fw600 mb20">Phone Number<span class="mandatoryMarker">*</span></label>
                                                            <span id="alerterrorphone_number" class="post-property"></span>
                                                        </div>
                                                        <input type="number" class="form-control" name="phone_number" id="mobile-number" placeholder="Phone Number">
                                                        <input type="hidden" name="update_number" id="mobile-number-hidden">
                                                    </div>

                                                    <div class="col-sm-4 col-xl-3 mb25 custom-display-inline">
                                                        <div class="location-area">
                                                            <label for="vendor-name" class="ff-heading fw600 mb20">Name<span class="mandatoryMarker">*</span></label>
                                                            <span id="alerterrorvendor_name" class="post-property"></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="vendor_name" id="vendor-name" placeholder="Enter Your Name">
                                                    </div>

                                                <?php } ?>


                                                <div class="col-sm-4 col-xl-3 mb25 custom-display-inline">
                                                    <div class="location-area">
                                                        <label for="phone" class="ff-heading fw600 mb20">Search City<span class="mandatoryMarker">*</span></label>
                                                        <span id="alerterrorsearch_city" class="post-property"></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="search_city" id="search-city" placeholder="Search City">
                                                </div>

                                            </div>

                                            <div class="col-12  col-sm-12 mb25 commercial-property-section d-none">
                                                <div class="ff-heading fw600 mb20 ">Property Type <span class="mandatoryMarker">*</span></div>
                                                <div class="form-check form-check-inline margin-left-techo">
                                                    <input class="form-check-input" type="radio" id="office" name="property_type_comm" value="office">
                                                    <label class="form-check-label fw600" for="office">

                                                        <span>Office</span>
                                                    </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="retail-shop" name="property_type_comm" value="retail shop">
                                                    <label class="form-check-label fw600" for="retail-shop">

                                                        <span>Retail Shop</span>
                                                    </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="property_type_comm" value="showroom" id="showroom">
                                                    <label class="form-check-label fw600" for="showroom">

                                                        <span>Showroom</span>
                                                    </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="property_type_comm" value="warehouse" id="warehouse">
                                                    <label class="form-check-label fw600" for="warehouse">

                                                        <span>Warehouse</span>
                                                    </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="property_type_comm" value="plot" id="comm-plot">
                                                    <label class="form-check-label fw600" for="comm-plot">

                                                        <span>Plot</span>
                                                    </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="property_type_comm" value="others" id="other-comm">
                                                    <label class="form-check-label fw600" for="other-comm">

                                                        <span>Others</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-6 mb25 residential-property-section d-none">
                                                <div class="ff-heading fw600 mb20 ">Property Type <span class="mandatoryMarker">*</span></div>
                                                <div class="form-check form-check-inline margin-left-techo">
                                                    <input class="form-check-input" type="radio" name="category_type" value="apartment" id="apartment">
                                                    <label class="form-check-label fw600" for="apartment">

                                                        <span>Apartment</span>
                                                    </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="category_type" value="independent floor" id="independent-floor">
                                                    <label class="form-check-label fw600" for="independent-floor">

                                                        <span>Independent Floor</span>
                                                    </label>
                                                </div>


                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="category_type" value="independent house" id="independent-house">
                                                    <label class="form-check-label fw600" for="independent-house">

                                                        <span>Independent House</span>
                                                    </label>
                                                </div>


                                                <!-- <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="category_type" value="villa" id="villa">
                                                    <label class="form-check-label fw600" for="villa">

                                                        <span>Villa</span>
                                                    </label>
                                                </div> -->
                                                <div class="form-check-inlined-none selected-residential-sell-categories d-none">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="category_type" value="plot" id="plot-radio">
                                                        <label class="form-check-label fw600" for="plot-radio">
                                                            <span>Plot</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- first tab pg -section -->
                                            <div class="pg-living-section d-none">

                                                <div class="row">
                                                    <div class="col-sm-6 col-xl-6 mb25">
                                                        <div class="location-area">
                                                            <label for="phone" class="ff-heading fw600 mb10">Building/Project/Society <span class="mandatoryMarker">*</span></label><br>
                                                            <span id="alerterrorproject_society" class="post-property"></span>

                                                        </div>
                                                        <input type="text" class="form-control" name="project_society" id="building-project" placeholder="Building/Project/Society">
                                                    </div>

                                                    <div class="col-sm-6 col-xl-6 mb25">
                                                        <div class="location-area">
                                                            <label for="phone" class="ff-heading fw600 mb10">Locality <span class="mandatoryMarker">*</span></label><br>
                                                            <span id="alerterrorlocality" class="post-property"></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="locality" id="Locality" placeholder="Locality">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="fw600 mb10 custom-basic-title">PG DETAILS</div>
                                                    <div class="col-sm-6 col-xl-6 mb25">
                                                        <div class="location-area">
                                                            <label for="phone" class="ff-heading fw600 mb10">PG Name<span class="mandatoryMarker">*</span></label><br>
                                                            <span id="alerterrorpg_name" class="post-property"></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="pg_name" id="pg-name" placeholder="PG Name">
                                                    </div>

                                                    <div class="col-sm-6 col-xl-6 mb25">
                                                        <div class="location-area">
                                                            <label for="phone" class="ff-heading fw600 mb10">Total Beds<span class="mandatoryMarker">*</span></label><br>
                                                            <span id="alerterrortotal_beds" class="post-property"></span>
                                                        </div>
                                                        <input type="number" class="form-control" name="total_beds" id="total-beds" placeholder="Total Beds">
                                                    </div>

                                                </div>


                                                <div class="row">
                                                    <div class="col-sm-4 col-xl-4 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">PG is for<span class="mandatoryMarker">*</span></label><br>
                                                        </div>
                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="pg_for" value="girls" id="pg-girls">
                                                            <label class="form-check-label fw600" for="pg-girls">Girls</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pg_for" value="boys" id="pg-boys">
                                                            <label class="form-check-label fw600" for="pg-boys">Boys</label>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-4 col-xl-4 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Best suited for<span class="mandatoryMarker">*</span></label><br>
                                                        </div>

                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="pg_suited_for" value="students" id="suited-students">
                                                            <label class="form-check-label fw600" for="suited-students">Students</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pg_suited_for" value="professionals" id="suited-professionals">
                                                            <label class="form-check-label fw600" for="suited-professionals">Professionals</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 col-xl-4 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Meals Available <span class="mandatoryMarker">*</span></label><br>
                                                        </div>
                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="pg_meals" value="yes" id="pg-meals-yes">
                                                            <label for="pg-meals-yes" class="form-check-label fw600">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pg_meals" value="no" id="pg-meals-no">
                                                            <label for="pg-meals-no" class="form-check-label fw600">No</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xl-6 mb25 secled-meals-yes d-none">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Meal Offerings<span class="mandatoryMarker">*</span></label><br>
                                                        </div>
                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="checkbox" name="meal_offerings[]" value="breakfast" id="breakfast">
                                                            <label class="form-check-label fw600" for="breakfast">Breakfast</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="meal_offerings[]" value="lunch" id="lunch">
                                                            <label class="form-check-label fw600" for="lunch">Lunch</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="meal_offerings[]" value="dinner" id="dinner">
                                                            <label class="form-check-label fw600" for="dinner">Dinner</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xl-6 mb25 secled-meals-yes d-none">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Meal Speciality (Optional)<span class="mandatoryMarker">*</span></label><br>
                                                        </div>
                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="checkbox" name="meal_speciality[]" value="punjabi" id="punjabi">
                                                            <label class="form-check-label fw600" for="punjabi">Punjabi</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="meal_speciality[]" value="south indian" id="south-indian">
                                                            <label class="form-check-label fw600" for="south-indian">South Indian</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="meal_speciality[]" value="andhra" id="andhra">
                                                            <label class="form-check-label fw600" for="andhra">Andhra</label>
                                                        </div>


                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="meal_speciality[]" value="north indian" id="north-indian">
                                                            <label class="form-check-label fw600" for="north-indian">North Indian</label>
                                                        </div>


                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="meal_speciality[]" value="others" id="meal-others">
                                                            <label class="form-check-label fw600" for="meal-others">Others</label>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xl-6 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10"> Notice Period (Days) <span class="mandatoryMarker">*</span></label><br>
                                                            <span id="alerterrornotice_period" class="post-property"></span>

                                                        </div>
                                                        <input type="number" class="form-control" name="notice_period" id="notice-period" placeholder="Notice Period (Days)" oninput="displayDuration('notice-period', 'notice-period-display')">
                                                        <span id="notice-period-display"></span>
                                                    </div>

                                                    <div class="col-sm-6 col-xl-6 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Lock in Period (Days) <span class="mandatoryMarker">*</span></label><br>
                                                            <span id="alerterrorlock_period" class="post-property"></span>
                                                        </div>
                                                        <input type="number" class="form-control" name="lock_period" id="lock-period" placeholder="Lock in Period (Days)" oninput="displayDuration('lock-period', 'lock-period-display')">
                                                        <span id="lock-period-display"></span>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="ff-heading fw600 mb10">Common Areas <span class="mandatoryMarker">*</span></div>

                                                    <div class="col-sm-6 col-xl-12 mb25">

                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="checkbox" name="common_areas[]" id="living-room" value="living room">
                                                            <label class="form-check-label fw600" for="living-room">Living Room</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="common_areas[]" id="kitchen" value="kitchen">
                                                            <label class="form-check-label fw600" for="kitchen">Kitchen</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="common_areas[]" id="dining-hall" value="dining hall">
                                                            <label class="form-check-label fw600" for="dining-hall">Dining Hall</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="common_areas[]" id="study-library" value="study room library">
                                                            <label class="form-check-label fw600" for="study-library">Study Room / Library</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="common_areas[]" id="breakout-room" value="breakout room">
                                                            <label class="form-check-label fw600" for="breakout-room">Breakout Room</label>
                                                        </div>

                                                    </div>

                                                </div>


                                                <div class="row">
                                                    <div class="ff-heading fw600 mb10 custom-basic-title">OWNER / CARETAKER DETAILS <span class="mandatoryMarker">*</span></div>

                                                    <div class="col-sm-6 col-xl-6 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Property Managed By</label><br>
                                                        </div>

                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="owner_details" value="landlord" id="landlord">
                                                            <label class="form-check-label fw600" for="landlord">Landlord</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="owner_details" value="caretaker" id="caretaker">
                                                            <label class="form-check-label fw600" for="caretaker">Caretaker</label>
                                                        </div>

                                                        <div class="form-check form-check-inline ">
                                                            <input class="form-check-input" type="radio" name="owner_details" value="dedicated professional" id="dedicated-professional">
                                                            <label class="form-check-label fw600" for="dedicated-professional">Dedicated Professional</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xl-6 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Property Manager stays at Property <span class="mandatoryMarker">*</span></label><br>
                                                        </div>


                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="stays_property" value="yes" id="property-manger-yes">
                                                            <label class="form-check-label fw600" for="property-manger-yes">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline ">
                                                            <input class="form-check-input" type="radio" name="stays_property" value="no" id="property-manger-no">
                                                            <label class="form-check-label fw600" for="property-manger-no">No</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="ff-heading fw600 mb10 custom-basic-title">PG RULES</div>
                                                    <div class="col-sm-4 col-xl-2 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Non Veg Allowed <span class="mandatoryMarker">*</span></label><br>
                                                        </div>


                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="pg_non_veg" value="yes" id="pg-non-vegYes">
                                                            <label class="form-check-label fw600" for="pg-non-vegYes">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pg_non_veg" value="no" id="pg-non-vegno">
                                                            <label class="form-check-label fw600" for="pg-non-vegno">No</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 col-xl-2 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Opposite Sex Allowed <span class="mandatoryMarker">*</span></label><br>
                                                        </div>


                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="pg_sex" value="yes" id="pg-sexYes">
                                                            <label class="form-check-label fw600" for="pg-sexYes">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pg_sex" value="no" id="pg-sexNo">
                                                            <label class="form-check-label fw600" for="pg-sexNo">No</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 col-xl-2 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Any Time Allowed <span class="mandatoryMarker">*</span></label><br>
                                                        </div>


                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="pg_time_allowed" value="yes" id="any-timeYes">
                                                            <label class="form-check-label fw600" for="any-timeYes">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pg_time_allowed" value="no" id="any-timeNo">
                                                            <label class="form-check-label fw600" for="any-timeNo">No</label>
                                                        </div>
                                                    </div>



                                                    <div class="col-sm-4 col-xl-2 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Visitors Allowed <span class="mandatoryMarker">*</span></label><br>
                                                        </div>


                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="visitors_allowed" value="yes" id="visitors-Yes">
                                                            <label class="form-check-label fw600" for="visitors-Yes">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="visitors_allowed" value="no" id="visitors-No">
                                                            <label class="form-check-label fw600" for="visitors-No">No</label>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-4 col-xl-2 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Guardian Allowed<span class="mandatoryMarker">*</span></label><br>
                                                        </div>


                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="guardian_allowed" value="yes" id="guardian-yes">
                                                            <label class="form-check-label fw600" for="guardian-yes">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="guardian_allowed" value="no" id="guardian-no">
                                                            <label class="form-check-label fw600" for="guardian-no">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4 col-xl-4 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Drinking - Smoking Allowed <span class="mandatoryMarker">*</span></label><br>
                                                        </div>


                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="drin_smok_allowed" value="yes" id="pg-smokingYes">
                                                            <label class="form-check-label fw600" for="pg-smokingYes">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="drin_smok_allowed" value="no" id="pg-smokingNo">
                                                            <label class="form-check-label fw600" for="pg-smokingNo">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <!------------- second section ----------------------------- -->
            <div class="second-section mt20 d-none">

                <div class="ff-heading fw600 mb10 custom-basic-title">Add Property Details</div>
                <!--------------------------------- residential-property-type ------------------------>
                <div class="row residential-property-section d-none">
                    <!-- <div class="ff-heading fw600 mb10">Property Type <span class="mandatoryMarker">*</span></div>

                    <div class="col-6 col-sm-6 mb25">
                        <div class="form-check form-check-inline margin-left-techo">
                            <input class="form-check-input" type="radio" name="category_type" value="apartment" id="apartment">
                            <label class="form-check-label fw600" for="apartment">

                                <span>Apartment</span>
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="category_type" value="independent floor" id="independent-floor">
                            <label class="form-check-label fw600" for="independent-floor">

                                <span>Independent Floor</span>
                            </label>
                        </div>


                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="category_type" value="independent house" id="independent-house">
                            <label class="form-check-label fw600" for="independent-house">

                                <span>Independent House</span>
                            </label>
                        </div> -->


                    <!-- <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="category_type" value="villa" id="villa">
                            <label class="form-check-label fw600" for="villa">

                                <span>Villa</span>
                            </label>
                        </div> -->
                    <!-- <div class="form-check-inlined-none selected-residential-sell-categories d-none">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="category_type" value="plot" id="plot-radio">
                                <label class="form-check-label fw600" for="plot-radio">
                                    <span>Plot</span>
                                </label>
                            </div>
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col-sm-6 col-xl-6 mb25">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Building/Project/Society <span class="mandatoryMarker">*</span></label><br>
                                <span id="alerterrorproject_society_res" class="post-property"></span>

                            </div>
                            <input type="text" class="form-control" name="project_society_res" id="buolding-pro-res" placeholder="Building/Project/Society">
                        </div>

                        <div class="col-sm-6 col-xl-6 mb25">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Locality <span class="mandatoryMarker">*</span></label><br>
                                <span id="alerterrorlocality_res" class="post-property"></span>
                            </div>
                            <input type="text" class="form-control" name="locality_res" id="Locality-res" placeholder="Locality">
                        </div>
                    </div>

                    <div class="row selected-residential-sell d-none">
                        <div class="col-sm-6 col-xl-6 mb25">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Plot Area<span class="mandatoryMarker">*</span></label><br>
                                <span id="alerterrorplot_area" class="post-property"></span>

                            </div>
                            <input type="number" class="form-control" placeholder="Plot Area" name="plot_area" id="plot-area">
                        </div>

                        <div class="col-sm-6 col-xl-6 mb15">
                            <div class="mb20">
                                <label for="phone" class="ff-heading fw600 mb10">Area Unit</label><br>
                                <div class="location-area">
                                    <select class="selectpicker" id="area-unit" name="area_unit">
                                        <option value="sqft">sq. ft.</option>
                                        <option value="sqyd">sq. yd.</option>
                                        <option value="sqmt">sq. mt.</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-6 mb25">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Length</label><br>
                                <span id="alerterrorplot_length" class="post-property"></span>

                            </div>
                            <input type="number" class="form-control" placeholder="Length" name="plot_length" id="plot-length">
                        </div>

                        <div class="col-sm-6 col-xl-6 mb25">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Width</label><br>
                                <span id="alerterrorplot_width" class="post-property"></span>

                            </div>
                            <input type="number" class="form-control" placeholder="Width" name="plot_width" id="plot-width">
                        </div>
                    </div>


                    <div class="residential-property-type">
                        <div class="row">
                            <div class="col-sm-6 col-xl-6 mb25">
                                <div class="location-area">
                                    <label for="phone" class="ff-heading fw600 mb10">BHK <span class="mandatoryMarker">*</span></label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="total_property" value="1 RK" id="one-rk">
                                    <label class="form-check-label fw600" for="one-rk">1 RK</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="total_property" value="1 BHK" id="one-bhk">
                                    <label class="form-check-label fw600" for="one-bhk">1 BHK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="total_property" value="2 BHK " id="two-bhk">
                                    <label class="form-check-label fw600" for="two-bhk">2 BHK</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="total_property" id="three-bhk" value="3 BHK">
                                    <label class="form-check-label fw600" for="three-bhk">3 BHK</label>
                                </div>

                                <div class="form-check form-check-inline three-plush-bhk">
                                    <input class="form-check-input" type="radio" id="plus-three-bhk">
                                    <label class="form-check-label fw600" for="plus-three-bhk">3 +BHK</label>
                                </div>


                                <div class="after-3bhk d-none">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="total_property" value="4 BHK " id="four-bhk">
                                        <label class="form-check-label fw600" for="four-bhk">4 BHK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="total_property" value="5 BHK" id="five-bhk">
                                        <label class="form-check-label fw600" for="five-bhk">5 BHK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="total_property" value="6 BHK" id="six-bhk">
                                        <label class="form-check-label fw600" for="six-bhk">6 BHK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="total_property" value="7 BHK" id="seven-bhk">
                                        <label class="form-check-label fw600" for="seven-bhk">7 BHK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="total_property" value="8 BHK" id="eight-bhk">
                                        <label class="form-check-label fw600" for="eight-bhk">8 BHK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="total_property" value="9 BHK" id="nine-bhk">
                                        <label class="form-check-label fw600" for="nine-bhk">9 BHK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="total_property" value="10 BHK" id="ten-bhk">
                                        <label class="form-check-label fw600" for="ten-bhk">10 BHK</label>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-6 col-xl-6 mb25">
                                <div class="location-area">
                                    <label for="built-up-area" class="ff-heading fw600 mb10">Built Up Area <span class="mandatoryMarker">*</span></label><br>
                                    <span id="alerterrorbuilt_up_area" class="post-property"></span>
                                </div>
                                <input type="number" class="form-control" name="built_up_area" id="built-up-area" placeholder="Built Up Area" oninput="showSqft(this)">
                            </div>

                            <div class="col-sm-6 col-xl-4">
                                <div class="mb20">
                                    <label class="text-color-black fw600 mb10" for="flexRadioDefault1">Number of Bathooms</label><br> <span id="alertMessagethirdbath" class="text-danger"></span>
                                    <div class="d-flex mb20">
                                        <div class="d-flex ">
                                            <div class="selection">
                                                <input id="bathooms1plus" name="bathroom" value="1" type="radio">
                                                <label for="bathooms1plus">1+</label>
                                            </div>

                                            <div class="selection">
                                                <input id="bathooms2plus" name="bathroom" value="2" type="radio">
                                                <label for="bathooms2plus">2+</label>
                                            </div>
                                            <div class="selection">
                                                <input id="bathooms3plus" name="bathroom" value="3" type="radio">
                                                <label for="bathooms3plus">3+</label>
                                            </div>
                                            <div class="selection bathbuttone">
                                                <button type="button" onclick="showInputFieldbath()" style="height: 45px;">+ Add Other</button>
                                                <input type="hidden" name="bath" value="" id="hiddenbathInput">
                                            </div>
                                            <div class="d-none" id="inputFieldContainerbath">
                                                <input type="text" name="bath" id="bathinput" style="width: 51px; height: 44px;  border-radius: 12px; border: 1px solid #ddd">
                                                <button type="button" onclick="updateButtonTextbath()" style="width: 51px; height: 44px; border-radius: 12px; border: 1px solid #ddd"><i class="fas fa-check blue-icon" style="color: blue;"></i></button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xl-4">
                                <div class="mb20">
                                    <label class="text-color-black fw600 mb10" for="flexRadioDefault1">Number of Balconies </label><br> <span id="alertMessagethirdbalconies" class="text-danger"></span>
                                    <div class="d-flex mb20">
                                        <div class="d-flex mb20">
                                            <div class="selection">
                                                <input id="oneplus" name="balconiesRadio" value="1" type="radio">
                                                <label for="oneplus">1+</label>
                                            </div>

                                            <div class="selection">
                                                <input id="twoplus" name="balconiesRadio" value="2" type="radio">
                                                <label for="twoplus">2+</label>
                                            </div>
                                            <div class="selection">
                                                <input id="threeplus" name="balconiesRadio" value="3" type="radio">
                                                <label for="threeplus">3+</label>
                                            </div>
                                            <div class="selection balconiesbuttone">
                                                <button type="button" onclick="showInputFieldbalconies()" style="height: 45px;">+ Add Other</button>
                                                <input type="hidden" name="balconies" value="" id="hiddenbalconiesInput">
                                            </div>
                                            <div class="d-none" id="inputFieldContainerbalconies">
                                                <input type="text" name="balconies" id="balconiesinput" style="width: 51px; height: 44px;  border-radius: 12px; border: 1px solid #ddd">
                                                <button onclick="updateButtonTextbalconies()" type="button" style="width: 51px; height: 44px; border-radius: 12px; border: 1px solid #ddd"><i class="fas fa-check blue-icon" style="color: blue;"></i></button>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-4 col-xl-4 mb25">
                                <div class="location-area">
                                    <label class="ff-heading fw600 mb10">Age of property<span class="mandatoryMarker">*</span></label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="age_of_property" value="0-1" id="age-of-property0-1">
                                    <label class="form-check-label fw600" for="age-of-property0-1">0-1 years</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="age_of_property" value="1-5" id="age-of-property1-5">
                                    <label class="form-check-label fw600" for="age-of-property1-5">1-5 years</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="age_of_property" value="5-10" id="age-of-property5-10">
                                    <label class="form-check-label fw600" for="age-of-property5-10">5-10 years</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="age_of_property" value="10" id="age-of-property10plus">
                                    <label class="form-check-label fw600" for="age-of-property10plus">10+ years</label>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="residential-property-type">
                        <div class="row">
                            <div class="col-sm-6 col-xl-6 mb25">
                                <div class="location-area">
                                    <label class="ff-heading fw600 mb10">Furnish Type <span class="mandatoryMarker">*</span></label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="furnish_type" value="fully furnished" id="fully-furnished">
                                    <label class="form-check-label fw600" for="fully-furnished">Fully Furnished</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="furnish_type" value="semi furnished" id="semi-furnished">
                                    <label class="form-check-label fw600" for="semi-furnished">Semi Furnished</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="furnish_type" value="unfurnished" id="unfurnished">
                                    <label class="form-check-label fw600" for="unfurnished">Unfurnished</label>
                                </div>

                                <a class="login-info d-flex align-items-center" data-bs-toggle="modal" href="#add-amenities" role="button"><span class="d-none d-xl-block">+ Add Furnishings / Amenities</span></a>

                                <div class="css-1m8aqr3">
                                    <div>
                                        <div class="flat-furnishings">
                                            <!-- Flat Furnishings checkboxes -->
                                        </div>

                                        <input type="hidden" name="residential_amenities" id="residential-amenities">

                                        <div class="society-amenities">
                                            <!-- Society Amenities checkboxes -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="commercial-property-type">
                    <div class="row">

                        <!-- <div class="row commercial-property-type d-none"> -->

                        <div class="col-sm-4 col-xl-4 mb25">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Building/Project/Society <span class="mandatoryMarker">*</span></label><br>
                                <span id="alerterrorproject_society_comm" class="post-property"></span>

                            </div>
                            <input type="text" class="form-control" name="project_society_comm" id="building-pro-comm" placeholder="Building/Project/Society">
                        </div>

                        <div class="col-sm-4 col-xl-4 mb25">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Locality <span class="mandatoryMarker">*</span></label><br>
                                <span id="alerterrorlocality_comm" class="post-property"></span>
                            </div>
                            <input type="text" class="form-control" name="locality_comm" id="Locality-comm" placeholder="Locality">
                        </div>
                        <!-- </div> -->




                        <div class="ff-heading fw600 mb10"> POSSESSTION INFO</div>

                        <div class="col-sm-6 col-xl-6 mb25 plot-seclet">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Posession status<span class="mandatoryMarker">*</span></label><br>
                                <span id="alertMessageposession_status" class="post-property"></span>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="posession_status" value="ready to move" id="posession-ready">
                                <label class="form-check-label fw600" for="posession-ready">Ready to move</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="posession_status" value="under construction" id="posession-under">
                                <label class="form-check-label fw600" for="posession-under">Under construction</label>
                            </div>

                        </div>

                        <div class="col-sm-6 col-xl-6 mb25 seclet-shop-sell">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Available From<span class="mandatoryMarker">*</span></label><br>
                                <span id="alerterroravailable_from" class="post-property"></span>

                            </div>
                            <input type="date" class="form-control" name="available_from" id="available-from" placeholder="Available From">
                        </div>

                    </div>


                    <div class="secleted-office">
                        <div class="row">
                            <div class="ff-heading fw600 mb10"> ABOUT THE PROPERTY</div>


                            <div class="col-sm-6 col-xl-6 mb25">
                                <div class="location-area">
                                    <label class="ff-heading fw600 mb10">Zone Type<span class="mandatoryMarker">*</span></label><br>
                                    <span id="alertMessagezone_type" class="post-property"></span>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="industrial" id="zone-industrial">
                                    <label class="form-check-label fw600" for="zone-industrial">Industrial</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="commercial" id="zone-commercial">
                                    <label class="form-check-label fw600" for="zone-commercial">Commercial</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="residential" id="zone-residential">
                                    <label class="form-check-label fw600" for="zone-residential">Residential</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="open spaces" id="zone-spaces">
                                    <label class="form-check-label fw600" for="zone-spaces">Open Spaces</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="agricultural zone" id="zone-agricultural">
                                    <label class="form-check-label fw600" for="zone-agricultural">Agricultural zone</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="others" id="zone-others">
                                    <label class="form-check-label fw600" for="zone-others">Others</label>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xl-6 mb25">
                                <div class="location-area">
                                    <label for="phone" class="ff-heading fw600 mb10">Location Hub<span class="mandatoryMarker">*</span></label><br>
                                    <span id="alertMessagelocation_hub" class="post-property"></span>

                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="location_hub" value="it park" id="location-it">
                                    <label class="form-check-label fw600" for="location-it">IT Park</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="location_hub" value="business park" id="location-business">
                                    <label class="form-check-label fw600" for="location-business">Business Park</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="location_hub" value="others" id="location-others">
                                    <label class="form-check-label fw600" for="location-others">Others</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- <div class="col-sm-6 col-xl-6 mb25">
                                <div class="location-area">
                                    <label for="phone" class="ff-heading fw600 mb10">Property Condition<span class="mandatoryMarker">*</span></label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="property_condition" id="condition-use">
                                    <label class="form-check-label fw600" for="condition-use">Ready to use</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="property_condition" id="condition-shell">
                                    <label class="form-check-label fw600" for="condition-shell">Bare shell</label>
                                </div>
                            </div> -->

                            <div class="col-sm-6 col-xl-6 mb25">
                                <div class="location-area">
                                    <label for="phone" class="ff-heading fw600 mb10">Built Up Area<span class="mandatoryMarker">*</span></label><br>
                                    <span id="alerterrorcomm_built_up_area" class="post-property"></span>

                                </div>
                                <input type="text" class="form-control" name="built_area_office" id="comm-built-up-area" placeholder="Built Up Area" oninput="showSqft(this)">
                            </div>


                        </div>
                    </div>

                    <div class="seclected-Retail-Shop">
                        <div class="row">
                            <div class="ff-heading fw600 mb10"> ABOUT THE PROPERTY</div>

                            <div class="col-sm-6 col-xl-6 mb25">
                                <div class="location-area">
                                    <label for="phone" class="ff-heading fw600 mb10">Suitable For<span class="mandatoryMarker">*</span></label><br>
                                    <span id="alertMessagezone_type" class="post-property"></span>

                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="jewwllery" id="zone-jewwllery">
                                    <label class="form-check-label fw600" for="zone-jewwllery">Jewellery</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="gym" id="zone-gym">
                                    <label class="form-check-label fw600" for="zone-gym">Gym</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="grocery" id="zone-grocery">
                                    <label class="form-check-label fw600" for="zone-grocery">Grocery</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="footwear" id="zone-footwear">
                                    <label class="form-check-label fw600" for="zone-footwear">Footwear</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="clinic" id="zone-clinic">
                                    <label class="form-check-label fw600" for="zone-clinic">Clinic</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="electronics" id="zone-electronics">
                                    <label class="form-check-label fw600" for="zone-electronics">Electronics</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="clothing" id="zone-clothing">
                                    <label class="form-check-label fw600" for="zone-clothing">Clothing</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="others" id="zone-shopOthers">
                                    <label class="form-check-label fw600" for="zone-shopOthers">Others</label>
                                </div>

                            </div>

                            <div class="col-sm-6 col-xl-6 mb25">
                                <div class="location-area">
                                    <label for="phone" class="ff-heading fw600 mb10">Location Hub<span class="mandatoryMarker">*</span></label><br>
                                    <span id="alertMessagelocation_hub" class="post-property"></span>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="location_hub" value="mall" id="lHub-mall">
                                    <label class="form-check-label fw600" for="lHub-mall">Mall</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="location_hub" value="commercial project" id="lHub-commercial">
                                    <label class="form-check-label fw600" for="lHub-commercial">Commercial Project</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="location_hub" value="residential project" id="lHub-residential">
                                    <label class="form-check-label fw600" for="lHub-residential">Residential Project</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="location_hub" value="market high street" id="lHub-market">
                                    <label class="form-check-label fw600" for="lHub-market">Market/High Street</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="location_hub" value="other" id="lHubshop-others">
                                    <label class="form-check-label fw600" for="lHubshop-others">Others</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3 col-xl-3 mb25">
                                <div class="location-area">
                                    <label for="phone" class="ff-heading fw600 mb10">Built Up Area<span class="mandatoryMarker">*</span></label><br>
                                </div>
                                <input type="number" class="form-control" placeholder="Built Up Area" id="comm-built-up-area" name="comm_built_up_area">
                            </div>


                            <div class="col-sm-3 col-xl-3 mb25">
                                <div class="location-area">
                                    <label for="phone" class="ff-heading fw600 mb10">Carpet Area<span class="mandatoryMarker">*</span></label><br>
                                </div>
                                <input type="number" class="form-control" placeholder="Carpet Area" name="comm_carpet_area">
                            </div>

                            <div class="col-sm-3 col-xl-3 mb25">
                                <div class="location-area">
                                    <label for="phone" class="ff-heading fw600 mb10">Entrance width in feet<span class="mandatoryMarker">*</span></label><br>
                                </div>
                                <input type="number" class="form-control" placeholder="Entrance width in feet" name="comm_area_width">
                            </div>

                            <div class="col-sm-3 col-xl-3 mb25">
                                <div class="location-area">
                                    <label for="phone" class="ff-heading fw600 mb10">Ceiling height in feet<span class="mandatoryMarker">*</span></label><br>
                                </div>
                                <input type="number" class="form-control" placeholder="Ceiling height in feet" name="comm_area_height">
                            </div>


                            <div class="col-sm-6 col-xl-6 mb25">
                                <div class="location-area">
                                    <label for="phone" class="ff-heading fw600 mb10">Located Near<span class="mandatoryMarker">*</span></label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="comm_located_near" value="entrance" id="located-entrance">
                                    <label class="form-check-label fw600" for="located-entrance">Entrance</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="comm_located_near" value="elevator" id="located-elevator">
                                    <label class="form-check-label fw600" for="located-elevator">Elevator</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="comm_located_near" value="stairs" id="located-stairs">
                                    <label class="form-check-label fw600" for="located-stairs">Stairs</label>
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="secleted-plot-comm">
                        <div class="row">
                            <div class="ff-heading fw600 mb10"> ABOUT THE PROPERTY</div>


                            <div class="col-sm-6 col-xl-6 mb25">
                                <div class="location-area">
                                    <label class="ff-heading fw600 mb10">Zone Type<span class="mandatoryMarker">*</span></label><br>
                                    <span id="alertMessagezone_type" class="post-property"></span>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="industrial" id="zonePlot-industrial">
                                    <label class="form-check-label fw600" for="zonePlot-industrial">Industrial</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="commercial" id="zonePlot-commercial">
                                    <label class="form-check-label fw600" for="zonePlot-commercial">Commercial</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="residential" id="zonePlot-residential">
                                    <label class="form-check-label fw600" for="zonePlot-residential">Residential</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="open spaces" id="zonePlot-spaces">
                                    <label class="form-check-label fw600" for="zonePlot-spaces">Open Spaces</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="special economic zone" id="zonePlot-economic">
                                    <label class="form-check-label fw600" for="zonePlot-economic">Special economic zone</label>
                                </div>


                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="agricultural zone" id="zonePlot-agricultural">
                                    <label class="form-check-label fw600" for="zonePlot-agricultural">Agricultural zone</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="zone_type" value="others" id="zonePlot-others">
                                    <label class="form-check-label fw600" for="zonePlot-others">Others</label>
                                </div>
                            </div>


                            <div class="col-sm-6 col-xl-6 mb25">
                                <div class="location-area">
                                    <label for="phone" class="ff-heading fw600 mb10">Plot Area<span class="mandatoryMarker">*</span></label><br>


                                </div>
                                <input type="number" class="form-control" name="comm_plot_area" id="available-from" placeholder="Plot Area">
                            </div>
                        </div>
                    </div>



                    <div class="row">

                        <div class="col-sm-4 col-xl-4 mb25">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Ownership<span class="mandatoryMarker">*</span></label><br>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ownership" value="freehold" id="own-freehold">
                                <label class="form-check-label fw600" for="own-freehold">Freehold</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ownership" value="leasehold" id="own-leasehold">
                                <label class="form-check-label fw600" for="own-leasehold">Leasehold</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ownership" value="cooperative society" id="own-cooperative">
                                <label class="form-check-label fw600" for="own-cooperative">Cooperative society</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ownership" value="power of attorney" id="own-attorney">
                                <label class="form-check-label fw600" for="own-attorney">Power of attorney</label>
                            </div>
                        </div>

                        <div class="ff-heading fw600 mb10"> FINANCIALS</div>

                        <!-- <div class=""> -->
                        <div class="col-sm-6 col-xl-6 mb25 commerical-rent-property">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Expected Rent<span class="mandatoryMarker">*</span></label><br>
                                <span id="alerterrorexpected_rent" class="post-property"></span>

                            </div>
                            <input type="text" class="form-control" placeholder="Expected Rent" name="expected_rent" id="expected-rent" oninput="formatRent(this)">
                            <span class="formatted-rent"></span>
                        </div>

                        <div class="col-sm-6 col-xl-6 mb25 commerical-rent-property">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Security Deposit</label><br>
                                <span id="alerterrorsecuirty_deposite" class="post-property"></span>

                            </div>
                            <input type="text" class="form-control" placeholder="Security Deposit" name="secuirty_deposite" id="secuirty-deposite" oninput="secuirtyForment(this)">
                            <span class="secuirtyForment"></span>
                        </div>


                        <div class="col-sm-6 col-xl-6 mb25 commerical-sell-property">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Price<span class="mandatoryMarker">*</span></label><br>
                            </div>
                            <input type="text" class="form-control" placeholder="Price" oninput="formatRent(this)" name="price">
                            <span class="formatted-rent"></span>

                        </div>

                        <!-- </div> -->

                        <div class="col-sm-3 col-xl-3 mb25">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Negotiable</label><br>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="negotiable-Yes" name="negotiable" value="yes">
                                <label class="form-check-label fw600" for="negotiable-Yes">Yes</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="negotiable-No" name="Negotiable" value="no">
                                <label class="form-check-label fw600" for="negotiable-No">No</label>
                            </div>
                        </div>

                        <div class="col-sm-3 col-xl-3 mb25">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">DG & UPS Charge included?</label><br>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="ups-charge-yes" name="dg_ups_charge" value="yes">
                                <label class="form-check-label fw600" for="ups-charge-yes">Yes</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="ups-charge-No" name="dg_ups_charge" value="no">
                                <label class="form-check-label fw600" for="ups-charge-No">No</label>
                            </div>
                        </div>

                        <div class="col-sm-3 col-xl-3 mb25 seclet-shop-sell">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Electricity charges included?</label><br>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="electricity-yes" name="electricity_charges" value="yes">
                                <label class="form-check-label fw600" for="electricity-yes">Yes</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="electricity-No" name="electricity_charges" value="no">
                                <label class="form-check-label fw600" for="electricity-No">No</label>
                            </div>
                        </div>

                        <div class="col-sm-3 col-xl-3 mb25 seclet-shop-sell">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Water charges included?</label><br>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="waterChar-Yes" name="water_charges" value="yes">
                                <label class="form-check-label fw600" for="waterChar-Yes">Yes</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="waterChar-No" name="water_charges" value="no">
                                <label class="form-check-label fw600" for="waterChar-No">No</label>
                            </div>
                        </div>


                        <div class="col-sm-6 col-xl-6 mb25 seclet-shop-sell">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Lock-in Period</label><br>
                            </div>
                            <input type="number" class="form-control" placeholder="Lock in Period" name="lock_in_period">

                        </div>

                        <div class="col-sm-6 col-xl-6 mb25 commerical-rent-property">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Expected Rent Increase</label><br>
                            </div>
                            <input type="number" class="form-control" placeholder="Expected Rent Increase" name="expected_rent_increase">
                        </div>
                    </div>

                    <div class="row plot-seclet">
                        <div class="ff-heading fw600 mb10">FLOORS AVAILABLE</div>

                        <div class="col-sm-6 col-xl-6 mb25">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Total Floors<span class="mandatoryMarker">*</span></label><br>
                            </div>
                            <input type="number" class="form-control" placeholder="Total Floors" name="total_floors" id="total-floors">

                        </div>

                        <div class="col-sm-6 col-xl-6 mb25">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Your Floor</label><br>
                            </div>
                            <input type="number" class="form-control" placeholder="Your Floor" name="your_floor">

                        </div>
                    </div>

                    <div class="secleted-office plot-seclet">
                        <div class="row">
                            <div class="ff-heading fw600 mb10">LIFTS & STAIRCASES</div>

                            <div class="col-sm-3 col-xl-3 mb25">
                                <div class="location-area">
                                    <label for="phone" class="ff-heading fw600 mb10">Number of staircase</label><br>
                                </div>
                                <input type="number" class="form-control" placeholder="staircase" name="staircase">

                            </div>

                            <div class="col-sm-3 col-xl-3 mb25">
                                <div class="location-area">
                                    <label for="phone" class="ff-heading fw600 mb10">Passengers Lifts<span class="mandatoryMarker">*</span></label><br>
                                </div>
                                <input type="number" class="form-control" placeholder="Passengers Lifts" name="lifts_staircases_passengers">

                            </div>

                            <div class="col-sm-3 col-xl-3 mb25">
                                <div class="location-area">
                                    <label for="phone" class="ff-heading fw600 mb10">Service Lifts<span class="mandatoryMarker">*</span></label><br>
                                </div>
                                <input type="number" class="form-control" placeholder="Service Lifts" name="lifts_staircases_service">

                            </div>

                            <div class="col-sm-3 col-xl-3 mb25">
                                <div class="location-area">
                                    <label for="phone" class="ff-heading fw600 mb10">Conference Room</label><br>
                                </div>
                                <input type="number" class="form-control" placeholder="Conference Room" name="conference_room">

                            </div>

                        </div>
                    </div>

                    <div class="plot-seclet">


                        <div class="ff-heading fw600 mb10">FACILITIES</div>

                        <div class="secleted-office">
                            <div class="row">
                                <div class="col-sm-3 col-xl-3 mb25">
                                    <div class="location-area">
                                        <label for="phone" class="ff-heading fw600 mb10">Min. Number of seats<span class="mandatoryMarker">*</span></label><br>
                                    </div>
                                    <input type="number" class="form-control" placeholder="Min. Number of seats" name="office_seats">

                                </div>
                                <div class="col-sm-3 col-xl-3 mb25">
                                    <div class="location-area">
                                        <label for="phone" class="ff-heading fw600 mb10">please enter maximum seats<span class="mandatoryMarker">*</span></label><br>
                                    </div>
                                    <input type="number" class="form-control" placeholder="please enter maximum seats" name="office_max_seats">

                                </div>
                                <div class="col-sm-3 col-xl-3 mb25">
                                    <div class="location-area">
                                        <label for="phone" class="ff-heading fw600 mb10">Number of Cabins<span class="mandatoryMarker">*</span></label><br>
                                    </div>
                                    <input type="number" class="form-control" placeholder="Number of Cabins" name="number_of_cabins">

                                </div>
                                <div class="col-sm-3 col-xl-3 mb25">
                                    <div class="location-area">
                                        <label for="phone" class="ff-heading fw600 mb10">Number of Meeting Rooms<span class="mandatoryMarker">*</span></label><br>
                                    </div>
                                    <input type="number" class="form-control" placeholder="Number of Meeting Rooms" name="meeting_rooms">

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <!-- <div class="row"></div> -->
                            <div class="ff-heading fw600 mb10"></div>
                            <!-- PARKING FACILITIES -->
                            <div class="col-sm-3 col-xl-3 mb25">
                                <div class="location-area">
                                    <label for="phone" class="ff-heading fw600 mb10">Private Parking</label><br>
                                </div>
                                <input type="number" class="form-control" placeholder="Private Parking" name="private_parking">

                            </div>

                            <div class="col-sm-3 col-xl-3 mb25">
                                <div class="location-area">
                                    <label for="phone" class="ff-heading fw600 mb10">Public Parking</label><br>
                                </div>
                                <input type="number" class="form-control" placeholder="Public Parking" name="public_parking">

                            </div>
                            <div class="col-sm-3 col-xl-3 mb25">
                                <div class="location-area">
                                    <label class="ff-heading fw600 mb10">Private Washrooms<span class="mandatoryMarker">*</span></label>
                                </div>
                                <input type="number" class="form-control" placeholder="Private Washrooms" name="private_washrooms">
                            </div>

                            <div class="col-sm-3 col-xl-3 mb25">
                                <div class="location-area">
                                    <label class="ff-heading fw600 mb10">Public Washrooms<span class="mandatoryMarker">*</span></label>
                                </div>
                                <input type="number" class="form-control" placeholder="Public Washrooms" name="public_washrooms">
                            </div>




                        </div>

                        <a class="login-info d-flex align-items-center" data-bs-toggle="modal" href="#add-amenities-commerical" role="button"><span class=" d-xl-block">+ Add Furnishings / Amenities</span></a>

                        <div class="css-1m8aqr3">
                            <div>
                                <div class="flat-furnishings-comm">
                                    <!-- Flat Furnishings checkboxes -->
                                </div>

                                <input type="hidden" name="commerical_amenities" id="commercial-amenities">

                                <div class="society-amenities-comm">
                                    <!-- Society Amenities checkboxes -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="pg-living-section d-none">
                    <div class="ff-heading fw600 mb10">Add Room Details</div>
                    <div class="row">
                        <div class="col-sm-3 col-xl-3 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Room Type <span class="mandatoryMarker">*</span></label><br>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pg_room_type" value="private room" id="private-room">
                                <label class="form-check-label fw600" for="private-room">Private Room</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pg_room_type" value="double sharing" id="double_sharing">
                                <label class="form-check-label fw600" for="double_sharing">Double Sharing</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pg_room_type" value="triple sharing" id="triple_sharing">
                                <label class="form-check-label fw600" for="triple_sharing">Triple Sharing</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pg_room_type" value="three plus sharing" id="three-plus-sharing">
                                <label class="form-check-label fw600" for="three-plus-sharing">3+ Sharing</label>
                            </div>
                        </div>

                        <div class="col-sm-3 col-xl-3 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Total Beds in this Room (Optional)</label><br>
                                <span id="alerterrortotal_beds_this_room" class="post-property"></span>
                            </div>
                            <input type="number" class="form-control" placeholder="Total Beds in this Room" id="pg-total-bad" name="total_beds_this_room">
                        </div>

                        <div class="col-sm-3 col-xl-3 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Rent<span class="mandatoryMarker">*</span></label><br>
                                <span id="alerterrorpg_rent" class="post-property"></span>
                            </div>
                            <input type="number" class="form-control" placeholder="Rent" id="pg-rent" name="pg_rent" oninput="formatRent(this)">
                            <span class="formatted-rent"></span>

                        </div>

                        <div class="col-sm-3 col-xl-3 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Security Deposit<span class="mandatoryMarker">*</span></label><br>
                                <span id="alerterrorpg_security_deposit" class="post-property"></span>
                            </div>
                            <input type="number" class="form-control" placeholder="Security Deposit" name="pg_security_deposit" id="pg-security-deposite" oninput="secuirtyForment(this)">
                            <span class="secuirtyForment"></span>
                        </div>

                        <div class="col-sm-6 col-xl-6 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Facilities Offered</label><br>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="facilities-ac" name="pg_facilities[]" value="ac">
                                <label class="form-check-label fw600" for="facilities-ac">AC</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="facilities-TV" name="pg_facilities[]" value="tv">
                                <label class="form-check-label fw600" for="facilities-TV">TV in Room</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="facilities-personal" name="pg_facilities[]" value="personal_cupboard">
                                <label class="form-check-label fw600" for="facilities-personal">Personal Cupboard</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="facilities-table" name="pg_facilities[]" value="table_chair">
                                <label class="form-check-label fw600" for="facilities-table">Table Chair</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="facilities-Balcony" name="pg_facilities[]" value="attached_balcony">
                                <label class="form-check-label fw600" for="facilities-Balcony">Attached Balcony</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="facilities-bathroom" name="pg_facilities[]" value="attached_bathroom">
                                <label class="form-check-label fw600" for="facilities-bathroom">Attached Bathroom</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="facilities-Meals" name="pg_facilities[]" value="meals_included">
                                <label class="form-check-label fw600" for="facilities-Meals">Meals Included</label>
                            </div>


                        </div>


                        <div class="col-sm-6 col-xl-6 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Bathroom Style</label><br>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="bathStyle-Western" name="bath_style[]" value="western">
                                <label class="form-check-label fw600" for="bathStyle-Western">Western</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="bathStyle-Indian" name="bath_style[]" value="indian">
                                <label class="form-check-label fw600" for="bathStyle-Indian">Indian</label>
                            </div>
                        </div>



                    </div>
                </div>


            </div>



            <div class="thirds-section d-none">

                <div class="rent-selected d-none">
                    <div class="row">
                        <div class="ff-heading fw600 mb10">Add Price Details</div>

                        <div class="col-sm-3 col-xl-3 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Monthly Rent<span class="mandatoryMarker">*</span></label><br>

                            </div>
                            <input type="number" class="form-control" name="monthly_rent" id="monthly-rent" placeholder="Monthly Rent" oninput="formatRent(this)">
                            <span class="formatted-rent"></span>
                        </div>

                        <div class="col-sm-3 col-xl-3 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Available From</label><br>
                            </div>
                            <input type="date" class="form-control" name="available_from_res_rent" id="Res-rent-avilable" placeholder="Available From">
                        </div>

                        <div class="col-sm-3 col-xl-3 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Security Deposit<span class="mandatoryMarker">*</span></label><br>
                            </div>


                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="resi_security_deposite" id="security-none" value="none">
                                <label class="form-check-label fw600" for="security-none">None</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="resi_security_deposite" id="security-oneMonth" value="one month">
                                <label class="form-check-label fw600" for="security-oneMonth">1 month</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="resi_security_deposite" id="security-twoMonth" value="two month">
                                <label class="form-check-label fw600" for="security-twoMonth">2 month</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="resi_security_deposite" id="security-custom" value="three month">
                                <label class="form-check-label fw600" for="security-custom">3 month</label>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="select-residential-sell d-none">
                    <div class="row">
                        <div class="ff-heading fw600 mb10">Add Price Details</div>

                        <div class="col-sm-4 col-xl-4 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Cost<span class="mandatoryMarker">*</span></label><br>

                            </div>
                            <input type="text" class="form-control" placeholder="Cost" name="res_sell_cost">
                        </div>


                        <div class="col-sm-4 col-xl-4 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Construction Status</label><br>
                            </div>


                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="constuction-status-ready" name="res_sell_constuction_status" value="ready to move">
                                <label class="form-check-label fw600" for="constuction-status-ready">Ready to Move</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="constuction-status-under" name="res_sell_constuction_status" value="under construction">
                                <label class="form-check-label fw600" for="constuction-status-under">Under Construction</label>
                            </div>

                        </div>

                        <div class="col-sm-4 col-xl-4 mb25 select-under-construction d-none">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Possession Date</label><br>
                                <!-- <span id="alerterrorphone_number" class="post-property"></span> -->
                            </div>
                            <input type="text" class="form-control" placeholder="Possession Date" name="possion_date">
                        </div>


                    </div>
                </div>
                <div class="pg-living-section d-none">
                    <div class="row">
                        <div class="ff-heading fw600 mb10">OTHER PG DETAILS</div>
                        <div class="col-sm-3 col-xl-3 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Onetime Move in Charges (Optional)</label><br>
                                <!-- <span id="alerterrorphone_number" class="post-property"></span> -->
                            </div>
                            <input type="text" class="form-control" placeholder="Onetime Move in Charges" name="pg_onetime_move_charges">
                        </div>


                        <div class="col-sm-3 col-xl-3 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Meal Charges per Month (Optional)</label><br>
                                <!-- <span id="alerterrorphone_number" class="post-property"></span> -->
                            </div>
                            <input type="text" class="form-control" placeholder="Meal Charges per Month" name="pg_meal_charges_month">
                        </div>

                        <div class="col-sm-3 col-xl-3 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Electricity Charges per Month (Optional)</label><br>
                                <!-- <span id="alerterrorphone_number" class="post-property"></span> -->
                            </div>
                            <input type="text" class="form-control" placeholder="Electricity Charges per Month" name="pg_electricity_charges_month">
                        </div>

                        <div class="col-sm-3 col-xl-3 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Add Additional Information (Optional)</label><br>
                                <!-- <span id="alerterrorphone_number" class="post-property"></span> -->
                            </div>
                            <input type="text" class="form-control" placeholder="Add Additional Information" name="pg_additional_info">
                        </div>


                    </div>
                </div>

                <div class="checked-commerical-sell-rent">


                    <div class="ps-widget bgc-white bdrs12 p30 overflow-hidden position-relative">
                        <h4 class="text-color-black fz17 mb30">Upload photos of your property</h4>
                        <span id="images-uploaderror" class="text-danger"></span>
                        <div class="col-lg-12">
                            <div class="upload-img position-relative overflow-hidden bdrs12 text-center mb30 px-2">

                                <div class="icon mb30"><span class="flaticon-upload"></span></div>
                                <h4 class="text-color-black fz17 mb10">Upload photos of your property</h4>
                                <label for="photo-upload" class="ud-btn btn-white">
                                    Browse Files<input id="photo-upload" type="file" name="property_img[]" multiple style="display: none;">
                                    <i class="fal fa-arrow-right-long"></i>
                                </label>
                                <div class="custom-tooltip mb10" data-tooltip="Add 4+ properties photos & increase 24% response">
                                    Hover over me
                                </div>

                            </div>
                            <div id="image-preview-container" class="image-preview-container"></div>

                        </div>
                        <div class="col-lg-5">
                            <div class="profile-box position-relative d-md-flex align-items-end mb50" id="image-preview-container">
                                <div class="profile-img position-relative overflow-hidden bdrs12 mb20-sm">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h4 class="text-color-black fz17 mb30">Upload Videos of your property</h4>
                            <span id="videos-uploaderror" class="text-danger"></span>


                            <div class="col-lg-12">
                                <div class="upload-img position-relative overflow-hidden bdrs12 text-center mb30 px-2">

                                    <div class="icon mb30"><span class="flaticon-upload"></span></div>
                                    <h4 class="text-color-black fz17 mb10">Upload Videos of your property</h4>
                                    <p class="text-color-black mb25">Add videos of your property</p>
                                    <label for="video-upload" class="ud-btn btn-white">
                                        Upload Videos<input id="video-upload" type="file" name="property_video[]" style="display: none;">
                                        <i class="fal fa-arrow-right-long"></i>
                                        <div id="file-names-container"></div>
                                    </label>
                                </div>
                            </div>
                            <div id="video-player"></div>
                        </div>
                    </div>


                </div>

            </div>

            <div class="col-md-12 first-btn">
                <div class="d-sm-flex justify-content-between">
                    <a class="ud-btn btn-dark" id="continue-btn" role="button">Continue<i class="fal fa-arrow-right-long"></i></a>
                </div>
            </div>

            <div class="col-md-12 second-btn d-none">
                <div class="d-sm-flex justify-content-between">
                    <a class="ud-btn btn-dark" id="continue-second" role="button">Continue<i class="fal fa-arrow-right-long"></i></a>
                </div>
            </div>

            <div class="col-md-12 thired-btn d-none">
                <div class="d-sm-flex justify-content-between">
                    <a class="ud-btn btn-dark" id="continue-thired" role="button">Post Property<i class="fal fa-arrow-right-long"></i></a>
                </div>
            </div>


            </form>


            <div class="modal fade" id="add-amenities" aria-hidden="true" aria-labelledby="add-amenitiesLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Add Furnishings and Amenities</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="log-reg-form">
                                <div class="navtab-style2">
                                    <div class="tab-content" id="nav-tabContent2">
                                        <div class="form-style1">
                                            <div class="ff-heading fw600 mb10">Flat Furnishings</div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishings[]" value="Dining Table" id="amenities-dining">
                                                <label class="form-check-label fw600" for="amenities-dining">Dining Table</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishings[]" value="Washing Machine" id="amenities-washMachine">
                                                <label class="form-check-label fw600" for="amenities-washMachine">Washing Machine</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishings[]" value="Sofa" id="amenities-sofa">
                                                <label class="form-check-label fw600" for="amenities-sofa">Sofa</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishings[]" value="Microwave" id="amenities-Microwave">
                                                <label class="form-check-label fw600" for="amenities-Microwave">Microwave</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishings[]" value="Stove" id="amenities-stove">
                                                <label class="form-check-label fw600" for="amenities-stove">Stove</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishings[]" value="Fridge" id="amenities-fridge">
                                                <label class="form-check-label fw600" for="amenities-fridge">Fridge</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishings[]" value="Water Purifier" id="amenities-waterPurifier">
                                                <label class="form-check-label fw600" for="amenities-waterPurifier">Water Purifier</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishings[]" value="Gas Pipeline" id="amenities-GasPipeline">
                                                <label class="form-check-label fw600" for="amenities-GasPipeline">Gas Pipeline</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishings[]" value="AC" id="amenities-ac">
                                                <label class="form-check-label fw600" for="amenities-ac">AC</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishings[]" value="Bed" id="amenities-bed">
                                                <label class="form-check-label fw600" for="amenities-bed">Bed</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishings[]" value="TV" id="amenities-tv">
                                                <label class="form-check-label fw600" for="amenities-tv">TV</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishings[]" value="Cupboard" id="amenities-Cupboard">
                                                <label class="form-check-label fw600" for="amenities-Cupboard">Cupboard</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishings[]" value="Geyser" id="amenities-Geyser">
                                                <label class="form-check-label fw600" for="amenities-Geyser">Geyser</label>
                                            </div>


                                            <div class="ff-heading fw600 mb10">Society Amenities</div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenities[]" value="Lift" id="amenities-lift">
                                                <label class="form-check-label fw600" for="amenities-lift">Lift</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenities[]" value="CCTV" id="amenities-CCTV">
                                                <label class="form-check-label fw600" for="amenities-CCTV">CCTV</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenities[]" value="Gym" id="amenities-gym">
                                                <label class="form-check-label fw600" for="amenities-gym">Gym</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenities[]" value="Garden" id="amenities-Garden">
                                                <label class="form-check-label fw600" for="amenities-Garden">Garden</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenities[]" value="kids Area" id="amenities-kids">
                                                <label class="form-check-label fw600" for="amenities-kids">Kids Area</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenities[]" value="Sports" id="amenities-Sports">
                                                <label class="form-check-label fw600" for="amenities-Sports">Sports</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenities[]" value="Swimming Pool" id="amenities-Swimming">
                                                <label class="form-check-label fw600" for="amenities-Swimming">Swimming Pool</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenities[]" value="Intercom" id="amenities-Intercom">
                                                <label class="form-check-label fw600" for="amenities-Intercom">Intercom</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenities[]" value="Gated Community" id="amenities-Gated">
                                                <label class="form-check-label fw600" for="amenities-Gated">Gated Community</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenities[]" value="Club House" id="amenities-Club">
                                                <label class="form-check-label fw600" for="amenities-Club">Club House</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenities[]" value="Community Hall" id="amenities-Hall">
                                                <label class="form-check-label fw600" for="amenities-Hall">Community Hall</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenities[]" value="Regular Water Supply" id="amenities-Water_Supply">
                                                <label class="form-check-label fw600" for="amenities-Water_Supply">Regular Water Supply</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenities[]" value="Power Backup" id="amenities-Power">
                                                <label class="form-check-label fw600" for="amenities-Power">Power Backup</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenities[]" value="Pet Allowed" id="amenities-pet">
                                                <label class="form-check-label fw600" for="amenities-pet">Pet Allowed</label>
                                            </div>
                                            <div class="css-0"><button class="css-1rk44f" onclick="saveSelection()">Save</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="add-amenities-commerical" aria-hidden="true" aria-labelledby="add-amenities-commericalLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Add Furnishings and Amenities</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="log-reg-form">
                                <div class="navtab-style2">
                                    <div class="tab-content" id="nav-tabContent2">
                                        <div class="form-style1">
                                            <div class="ff-heading fw600 mb10">Flat Furnishings</div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishingscomm[]" value="Dining Table" id="Furnishings-dining">
                                                <label class="form-check-label fw600" for="Furnishings-dining">Dining Table</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishingscomm[]" value="Washing Machine" id="Furnishings-washMachine">
                                                <label class="form-check-label fw600" for="Furnishings-washMachine">Washing Machine</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishingscomm[]" value="Sofa" id="Furnishings-sofa">
                                                <label class="form-check-label fw600" for="Furnishings-sofa">Sofa</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishingscomm[]" value="Microwave" id="Furnishings-Microwave">
                                                <label class="form-check-label fw600" for="Furnishings-Microwave">Microwave</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishingscomm[]" value="Stove" id="Furnishings-stove">
                                                <label class="form-check-label fw600" for="Furnishings-stove">Stove</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishingscomm[]" value="Fridge" id="Furnishings-fridge">
                                                <label class="form-check-label fw600" for="Furnishings-fridge">Fridge</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishingscomm[]" value="Water Purifier" id="Furnishings-waterPurifier">
                                                <label class="form-check-label fw600" for="Furnishings-waterPurifier">Water Purifier</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishingscomm[]" value="Gas Pipeline" id="Furnishings-GasPipeline">
                                                <label class="form-check-label fw600" for="Furnishings-GasPipeline">Gas Pipeline</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishingscomm[]" value="AC" id="Furnishings-ac">
                                                <label class="form-check-label fw600" for="Furnishings-ac">AC</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishingscomm[]" value="Bed" id="Furnishings-bed">
                                                <label class="form-check-label fw600" for="Furnishings-bed">Bed</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishingscomm[]" value="TV" id="Furnishings-tv">
                                                <label class="form-check-label fw600" for="Furnishings-tv">TV</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishingscomm[]" value="Cupboard" id="Furnishings-Cupboard">
                                                <label class="form-check-label fw600" for="Furnishings-Cupboard">Cupboard</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="furnishingscomm[]" value="Geyser" id="Furnishings-Geyser">
                                                <label class="form-check-label fw600" for="Furnishings-Geyser">Geyser</label>
                                            </div>


                                            <div class="ff-heading fw600 mb10">Society Amenities</div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenitiescomm[]" value="Lift" id="Furnishings-lift">
                                                <label class="form-check-label fw600" for="Furnishings-lift">Lift</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenitiescomm[]" value="CCTV" id="Furnishings-CCTV">
                                                <label class="form-check-label fw600" for="Furnishings-CCTV">CCTV</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenitiescomm[]" value="Gym" id="Furnishings-gym">
                                                <label class="form-check-label fw600" for="Furnishings-gym">Gym</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenitiescomm[]" value="Garden" id="Furnishings-Garden">
                                                <label class="form-check-label fw600" for="Furnishings-Garden">Garden</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenitiescomm[]" value="kids Area" id="Furnishings-kids">
                                                <label class="form-check-label fw600" for="Furnishings-kids">Kids Area</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenitiescomm[]" value="Sports" id="Furnishings-Sports">
                                                <label class="form-check-label fw600" for="Furnishings-Sports">Sports</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenitiescomm[]" value="Swimming Pool" id="Furnishings-Swimming">
                                                <label class="form-check-label fw600" for="Furnishings-Swimming">Swimming Pool</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenitiescomm[]" value="Intercom" id="Furnishings-Intercom">
                                                <label class="form-check-label fw600" for="Furnishings-Intercom">Intercom</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenitiescomm[]" value="Gated Community" id="Furnishings-Gated">
                                                <label class="form-check-label fw600" for="Furnishings-Gated">Gated Community</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenitiescomm[]" value="Club House" id="Furnishings-Club">
                                                <label class="form-check-label fw600" for="Furnishings-Club">Club House</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenitiescomm[]" value="Community Hall" id="Furnishings-Hall">
                                                <label class="form-check-label fw600" for="Furnishings-Hall">Community Hall</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenitiescomm[]" value="Regular Water Supply" id="Furnishings-Water_Supply">
                                                <label class="form-check-label fw600" for="Furnishings-Water_Supply">Regular Water Supply</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenitiescomm[]" value="Power Backup" id="Furnishings-Power">
                                                <label class="form-check-label fw600" for="Furnishings-Power">Power Backup</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="society_amenitiescomm[]" value="Pet Allowed" id="Furnishings-pet">
                                                <label class="form-check-label fw600" for="Furnishings-pet">Pet Allowed</label>
                                            </div>
                                            <div class="css-0"><button class="css-1rk44f" onclick="saveSelectioncomm()">Save</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="signup-modal">
    <div class="modal fade" id="otpVerifyModal" aria-hidden="true" aria-labelledby="otpVerifyModalLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Welcome to Ghar Ka Sapna</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="log-reg-form">
                        <div class="navtab-style2">
                            <div class="tab-content" id="nav-tabContent2">
                                <div class="form-style1">
                                    <h5 class="modal-title" id="success-mesg"></h5>
                                    <h6 class="modal-title" id="error-mesg"></h6>
                                    <p>Hi: <span id="vendor-firstname"></span></p>

                                    <!-- <form action="" method="post"> -->

                                    <div class="mb25">
                                        <label class="form-label fw600">OTP</label>
                                        <input type="text" name="otp" id="otp-code" class="form-control" placeholder="Enter OTP" required>
                                    </div>


                                    <div class="d-grid mb20">
                                        <button class="ud-btn btn-dark" id="otp-check">Continue<i class="fal fa-arrow-right-long"></i></button>
                                    </div>
                                    <!-- </form> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        //Open the modal when the page loads
        $('#pricingModal').fadeIn();

        // Close the modal when the close button is clicked
        $('.close').click(function() {
            $('#pricingModal').fadeOut();
        });

        // Close the modal when the user clicks outside of it
        $(document).mouseup(function(e) {
            var container = $("#pricingModal .modal-content");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $('#pricingModal').fadeOut();
            }
        });
    });
</script>

<script>
    function initializeTelInput() {
        const mobilInputField = document.querySelector("#mobile-number");
        const mobileNumberHiddenInput = document.querySelector("#mobile-number-hidden");
        const mobileInput = intlTelInput(mobilInputField, {
            initialCountry: "in",
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });

        mobilInputField.addEventListener("countrychange", function() {
            const selectedCountry = mobileInput.getSelectedCountryData();
        });

        mobilInputField.addEventListener("blur", function() {
            mobileNumberHiddenInput.value = mobileInput.getNumber();
        });
    }
    window.addEventListener('load', initializeTelInput);

    function displayDuration(inputId, displayId) {
        var input = document.getElementById(inputId);
        var display = document.getElementById(displayId);
        var duration = input.value;

        if (!isNaN(duration) && duration !== '') {
            display.textContent = duration + ' days';
        } else {
            display.textContent = '';
        }
    }

    function plotSqft(input) {
        var value = input.value;
        var displayArea = document.getElementById('area-display');

        if (!displayArea) {
            displayArea = document.createElement('span');
            displayArea.id = 'area-display';
            input.parentNode.appendChild(displayArea);
        }
        displayArea.textContent = value;
    }
</script>


<!-- validation first section  -->

<script>
    $(document).ready(function() {

        $('#residential-radio').click(function() {
            $('#commercial-radio').prop('checked', false);
            $('.pg-section').removeClass('d-none');
            $('.commercial-property-section').addClass('d-none');
            $('.pg-living-section').addClass('d-none');
            $('#rent-radio').prop('checked', false);
            $('#sell-radio').prop('checked', false);
            $('#pg-living').prop('checked', false);



        });

        $('#commercial-radio').click(function() {
            $('#residential-radio').prop('checked', false);
            $('#rent-radio').prop('checked', false);
            $('#sell-radio').prop('checked', false);
            $('#pg-living').prop('checked', false);
            $('.pg-section').addClass('d-none');
            $('.commercial-property-section').removeClass('d-none');
            $('.pg-living-section').addClass('d-none');

        });

        $('#pg-living').click(function() {
            $('#commercial-radio').prop('checked', false);
            $('#rent-radio').prop('checked', false);
            $('#sell-radio').prop('checked', false);
            $('.commercial-property-section').addClass('d-none');
            $('.pg-living-section').removeClass('d-none');


        });

        $('#rent-radio').click(function() {
            $('.pg-living-section').addClass('d-none');
            $('#pg-living').prop('checked', false);
            $('#sell-radio').prop('checked', false);
        });

        $('#sell-radio').click(function() {
            $('#pg-living').prop('checked', false);
            $('#rent-radio').prop('checked', false);
            $('.pg-living-section').addClass('d-none');

        });

        $('#pg-meals-yes').click(function() {

            $('.secled-meals-yes').removeClass('d-none');
        });

        $('#pg-meals-no').click(function() {
            $('.secled-meals-yes').addClass('d-none');

        });

        $('#plus-three-bhk').click(function() {

            $('.after-3bhk').removeClass('d-none');
            $('.three-plush-bhk').addClass('d-none');

        });




        function validatefirstsectionRadio(name, errorMessage) {
            if ($(`input[name="${name}"]:checked`).length === 0) {
                $(`#alertMessage${name}`).text(errorMessage);
                return errorMessage;
            } else {
                $(`#alertMessage${name}`).text('');
                return '';
            }
        }

        function validatefirstsectionTextField(name, errorMessage) {
            const value = $(`input[name="${name}"]`).val().trim();
            if (value === '') {
                $(`#alerterror${name}`).text(errorMessage);
                return errorMessage;
            } else if (name === 'phone_number' && value.length < 10) {
                $(`#alerterror${name}`).text('Phone number must be at least 10 digits.');
                return 'Phone number must be at least 10 digits.';
            } else {
                $(`#alertMessage${name}`).text('');
                return '';
            }
        }


        function checkfirstsectionValidations() {
            const errors = [];

            if (!<?php echo session()->get('id') ? 'true' : 'false'; ?>) {
                errors.push(validatefirstsectionTextField('phone_number', 'Phone number is required.'));
                errors.push(validatefirstsectionTextField('vendor_name', 'Please Enter the Name'));
            }
            if ($('#commercial-radio').is(':checked')) {
                errors.push(validatefirstsectionRadio('property_type_comm', 'Please select property type'));
            }

            if ($('#residential-radio').is(':checked')) {
                if ($('#rent-radio').is(':checked') || $('#sell-radio').is(':checked')) {
                    errors.push(validatefirstsectionRadio('category_type', 'Please fill this to continue'));
                }
            }


            if ($('#pg-living').is(':checked')) {

                errors.push(validatefirstsectionTextField('project_society', 'Please fill this to continue'));
                errors.push(validatefirstsectionTextField('locality', 'Please select a valid locality'));
                errors.push(validatefirstsectionTextField('pg_name', 'Please fill this to continue'));
                errors.push(validatefirstsectionTextField('total_beds', 'Please fill this to continue'));
                errors.push(validatefirstsectionRadio('pg_for', 'Please fill this to continue'));
                errors.push(validatefirstsectionRadio('pg_suited_for', 'Please fill this to continue'));
                errors.push(validatefirstsectionRadio('pg_meals', 'Please fill this to continue'));
                errors.push(validatefirstsectionTextField('notice_period', 'Please fill this to continue'));
                errors.push(validatefirstsectionTextField('lock_period', 'Please fill this to continue'));
                errors.push(validatefirstsectionRadio('owner_details', 'Please fill this to continue'));
                errors.push(validatefirstsectionRadio('stays_property', 'Please fill this to continue'));
                errors.push(validatefirstsectionRadio('pg_non_veg', 'Please fill this to continue'));
                errors.push(validatefirstsectionRadio('pg_sex', 'Please fill this to continue'));
                errors.push(validatefirstsectionRadio('pg_time_allowed', 'Please fill this to continue'));
                errors.push(validatefirstsectionRadio('visitors_allowed', 'Please fill this to continue'));
                errors.push(validatefirstsectionRadio('guardian_allowed', 'Please fill this to continue'));
                errors.push(validatefirstsectionRadio('drin_smok_allowed', 'Please fill this to continue'));
            }

            errors.push(validatefirstsectionRadio('property_type', 'Please select property type'));
            errors.push(validatefirstsectionRadio('looking_to', 'Please select Looking type'));
            errors.push(validatefirstsectionTextField('search_city', 'Please select the city'));
            const filteredErrors = errors.filter(error => error !== '');

            if (filteredErrors.length > 0) {
                return filteredErrors.join('\n');
            }
            return '';
        }

        function handleInputValidation(fieldId, errorId) {
            $(fieldId).on('input', function() {
                var value = $(this).val().trim();
                if (value !== '') {
                    $(errorId).text('');
                }
            });
        }
        handleInputValidation('#mobile-number', '#alerterrorphone_number');
        handleInputValidation('#vendor-name', '#alerterrorvendor_name')
        handleInputValidation('#search-city', '#alerterrorsearch_city');
        handleInputValidation('#building-project', '#alerterrorproject_society');
        handleInputValidation('#Locality', '#alerterrorlocality');
        handleInputValidation('#pg-name', '#alerterrorpg_name');
        handleInputValidation('#total-beds', '#alerterrortotal_beds');
        handleInputValidation('#notice-period', '#alerterrornotice_period');
        handleInputValidation('#lock-period', '#alerterrorlock_period');
        handleInputValidation('#buolding-pro-res', '#alerterrorproject_society_res');
        handleInputValidation('#Locality-res', '#alerterrorlocality_res');
        handleInputValidation('#built-up-area', '#alerterrorbuilt_up_area');
        handleInputValidation('#plot-area', '#alerterrorplot_area');
        handleInputValidation('#plot-length', '#alerterrorplot_length');
        handleInputValidation('#plot-width', '#alerterrorplot_width');
        handleInputValidation('#pg-total-bad', '#alerterrortotal_beds_this_room');
        handleInputValidation('#pg-rent', '#alerterrorpg_rent');
        handleInputValidation('#pg-security-deposite', '#alerterrorpg_security_deposit');
        handleInputValidation('#building-pro-comm', '#alerterrorproject_society_comm');
        handleInputValidation('#Locality-comm', '#alerterrorlocality_comm');
        handleInputValidation('#expected-rent', '#alerterrorexpected_rent');
        handleInputValidation('#secuirty-deposite', '#alerterrorsecuirty_deposite');




        $('#continue-btn').click(function() {

            const errorMessage = checkfirstsectionValidations();
            var phone = $('#mobile-number').val();
            var updateNumber = $('#mobile-number-hidden').val();
            var name = $('#vendor-name').val();


            if (errorMessage !== '') {
                $('#error-card-toggle .modal-body').html(`<p style="text-align: center;color:orangered;"><i class="flaticon-discovery mr15"></i>Please resolve all the errors to continue .</p>`);
                $('#error-card-toggle').modal('show');
                setTimeout(function() {
                    $('#error-card-toggle').modal('hide');
                }, 3000);
            }

            if (phone && updateNumber && name) {

                $.ajax({
                    url: "{{ route('create.vendor') }}",
                    type: 'POST',
                    data: {
                        updateNumber: updateNumber,
                        name: name,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $('#otpVerifyModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });

                $('#otp-check').click(function() {


                    var otpNumber = $('#otp-code').val();
                    // alert(otpNumber);

                    $.ajax({

                        url: "{{route('check.vendor_otp')}}",
                        type: "POST",
                        data: {

                            otpNumber: otpNumber,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {

                            if (response.success) {
                                // If OTP verification is successful
                                $('#otpVerifyModal').modal('hide');
                                $('.first-btn').addClass('d-none');
                                $('.second-btn').removeClass('d-none');
                                $('.first-section').addClass('d-none');
                                $('.second-section').removeClass('d-none');
                            } else {
                                $('#error-mesg').text(response.error);
                            }

                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }

                    });
                });
            } else {


                if (errorMessage === '' && <?php echo session()->get('id')  ? 'true' : 'false'; ?>) {

                    $('.first-btn').addClass('d-none');
                    $('.second-btn').removeClass('d-none');
                    $('.first-section').addClass('d-none');
                    $('.second-section').removeClass('d-none');

                }
            }



        });
    });
</script>

<!----------------------------- validation - second- section ------------------------------------------------->

<script>
    document.getElementById('plot-area').addEventListener('input', calculateLengthAndWidth);

    function calculateLengthAndWidth() {
        const plotArea = parseFloat(document.getElementById('plot-area').value);
        const areaUnit = document.getElementById('area-unit').value;
        let conversionFactor;
        switch (areaUnit) {
            case 'sqft':
                conversionFactor = 1;
                break;
            case 'sqyd':
                conversionFactor = 9; // 1 square yard = 9 square feet
                break;
            case 'sqmt':
                conversionFactor = 10.7639; // 1 square meter = 10.7639 square feet
                break;
            default:
                conversionFactor = 1;
        }

        const length = Math.sqrt(plotArea * conversionFactor);
        const width = plotArea / length;

        document.getElementById('plot-length').value = length.toFixed(2);
        document.getElementById('plot-width').value = width.toFixed(2);
    }

    function showSqft(input) {
        var value = input.value;
        var displayArea = document.getElementById('area-display');
        if (!displayArea) {
            displayArea = document.createElement('span');
            displayArea.id = 'area-display';
            input.parentNode.appendChild(displayArea);
        }
        displayArea.textContent = value + ' sq.ft';
    }


    function showInputFieldbath() {
        var inputField = document.getElementById("inputFieldContainerbath");
        inputField.classList.toggle("d-none");

        // Reset radio button selection
        var radioButtons = document.querySelectorAll('input[name="bath"]');
        radioButtons.forEach(function(radioButton) {
            radioButton.checked = false;
        });
    }

    function updateButtonTextbath() {
        var inputValue = document.getElementById("bathinput").value;
        if (inputValue !== "") {
            var addButton = document.querySelector('.bathbuttone button');
            addButton.innerHTML = inputValue + "<i class='fas fa-marker'></i>";
            var hiddenInput = document.getElementById("hiddenbathInput");
            hiddenInput.value = inputValue;
            var inputField = document.getElementById("inputFieldContainerbath");
            inputField.classList.add("d-none");
        }
    }

    var radioButtons = document.querySelectorAll('input[name="bathroom"]');
    radioButtons.forEach(function(radioButton) {
        radioButton.addEventListener('click', function() {
            var hiddenInput = document.getElementById("hiddenbathInput");
            hiddenInput.value = this.value;
            var addButton = document.querySelector('.bathbuttone button');
            addButton.innerHTML = this.value + "<i class='fas fa-marker'></i>";
            var inputField = document.getElementById("inputFieldContainerbath");
            //inputField.classList.add("d-none");
        });
    });




    function showInputFieldbalconies() {
        var inputField = document.getElementById("inputFieldContainerbalconies");
        inputField.classList.toggle("d-none");
    }

    function updateButtonTextbalconies() {
        var inputValue = document.getElementById("balconiesinput").value;
        if (inputValue !== "") {
            var addButton = document.querySelector('.balconiesbuttone button');
            addButton.innerHTML = inputValue + "<i class='fas fa-marker'></i>";
            var hiddenInput = document.getElementById("hiddenbalconiesInput");
            hiddenInput.value = inputValue;
            var inputField = document.getElementById("inputFieldContainerbalconies");
            inputField.classList.add("d-none");
        }
    }

    var radioButtonsbalconies = document.querySelectorAll('input[name="balconiesRadio"]');
    radioButtonsbalconies.forEach(function(radioButton) {
        radioButton.addEventListener('click', function() {
            var hiddenInput = document.getElementById("hiddenbalconiesInput");
            hiddenInput.value = this.value;
            var addButton = document.querySelector('.balconiesbuttone button');
            addButton.innerHTML = this.value + "<i class='fas fa-marker'></i>";
            var inputField = document.getElementById("inputFieldContainerbalconies");
            // inputField.classList.add("d-none");
        });
    });







    function saveSelection() {
        $('#add-amenities').modal('hide');
        var flatFurnishings = document.querySelectorAll('input[name="furnishings[]"]:checked');
        var societyAmenities = document.querySelectorAll('input[name="society_amenities[]"]:checked');
        var flatFurnishingsList = "";
        var societyAmenitiesList = "";

        flatFurnishings.forEach(function(checkbox) {
            flatFurnishingsList += checkbox.value + ", ";
        });

        societyAmenities.forEach(function(checkbox) {
            societyAmenitiesList += checkbox.value + ", ";
        });

        flatFurnishingsList = flatFurnishingsList.slice(0, -2);
        societyAmenitiesList = societyAmenitiesList.slice(0, -2);

        document.getElementById('residential-amenities').value = flatFurnishingsList + "; " + societyAmenitiesList;

        document.querySelector('.flat-furnishings').innerHTML = "<b>Flat Furnishings Selected:</b> " + flatFurnishingsList;
        document.querySelector('.society-amenities').innerHTML = "<b>Society Amenities Selected:</b> " + societyAmenitiesList;
    }


    function saveSelectioncomm() {
        $('#add-amenities-commerical').modal('hide');
        var flatFurnishings = document.querySelectorAll('input[name="furnishingscomm[]"]:checked');
        var societyAmenities = document.querySelectorAll('input[name="society_amenitiescomm[]"]:checked');
        var flatFurnishingsList = "";
        var societyAmenitiesList = "";
        flatFurnishings.forEach(function(checkbox) {
            flatFurnishingsList += checkbox.value + ", ";
        });
        societyAmenities.forEach(function(checkbox) {
            societyAmenitiesList += checkbox.value + ", ";
        });
        flatFurnishingsList = flatFurnishingsList.slice(0, -2);
        societyAmenitiesList = societyAmenitiesList.slice(0, -2);
        document.getElementById('commercial-amenities').value = flatFurnishingsList + "; " + societyAmenitiesList;
        document.querySelector('.flat-furnishings-comm').innerHTML = "<b>Flat Furnishings Selected:</b> " + flatFurnishingsList;
        document.querySelector('.society-amenities-comm').innerHTML = "<b>Society Amenities Selected:</b> " + societyAmenitiesList;
    }


    document.getElementById('photo-upload').addEventListener('change', function(e) {
        const files = e.target.files;
        const previewContainer = document.getElementById('image-preview-container');

        let rowContainer = previewContainer.lastElementChild;

        if (!rowContainer || rowContainer.children.length >= 4) {
            rowContainer = document.createElement('div');
            rowContainer.classList.add('row');
            previewContainer.appendChild(rowContainer);
        }

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            const imageContainer = document.createElement('div');
            imageContainer.classList.add('col-lg-3', 'mb-3');

            const imgElement = document.createElement('img');
            imgElement.classList.add('img-thumbnail');
            imgElement.style.width = '100%';
            imgElement.style.height = '150px';
            imgElement.style.objectFit = 'cover';

            const fileNameElement = document.createElement('p');
            fileNameElement.textContent = file.name;

            const deleteButton = document.createElement('button');
            deleteButton.innerHTML = '<span class="fas fa-trash-can"></span>';
            deleteButton.setAttribute('aria-label', 'Delete Item');
            deleteButton.classList.add('btn', 'btn-danger', 'mt-1', 'delete-button');
            deleteButton.addEventListener('click', function() {
                imageContainer.parentNode.removeChild(imageContainer);
            });

            reader.onload = function(e) {
                imgElement.src = e.target.result;
            };
            reader.readAsDataURL(file);

            imageContainer.appendChild(imgElement);
            imageContainer.appendChild(fileNameElement);
            imageContainer.appendChild(deleteButton);

            rowContainer.appendChild(imageContainer);

            if (rowContainer.children.length >= 4) {
                rowContainer = document.createElement('div');
                rowContainer.classList.add('row');
                previewContainer.appendChild(rowContainer);
            }
        }
    });
</script>


<script>
    $(document).ready(function() {


        $('input[type="radio"]').change(function() {

            var residentialChecked = $('#residential-radio').is(':checked');
            var commercial = $('#commercial-radio').is(':checked');
            var rentChecked = $('#rent-radio').is(':checked');
            var sellChecked = $('#sell-radio').is(':checked');
            var apartment = $('#apartment').is(':checked');
            var independentfloor = $('#independent-floor').is(':checked');
            var independenthouse = $('#independent-house').is(':checked');
            var plot = $('#plot-radio').is(':checked');

            // commerical-categeories--------------
            var office = $('#office').is(':checked');
            var retailshop = $('#retail-shop').is(':checked');
            var showroom = $('#showroom').is(':checked');
            var warehouse = $('#warehouse').is(':checked');
            var comPlot = $('#comm-plot').is(':checked');
            var pgChecked = $('#pg-living').is(':checked');

            // <-----------------------------residential- Property-type --------------------------------------->

            if (residentialChecked) {
                $('.residential-property-section').removeClass('d-none');
                $('.commercial-property-type').addClass('d-none');
            } else if (commercial) {
                $('.commercial-property-type').removeClass('d-none');
                $('.residential-property-section').addClass('d-none');
            }
            if (residentialChecked && rentChecked) {
                $('.selected-residential-sell-categories').addClass('d-none');
                $('.pg-living-section').addClass('d-none');
                $('.rent-selected').removeClass('d-none');
                $('.select-residential-sell').addClass('d-none');

            } else if (residentialChecked && sellChecked) {
                $('.selected-residential-sell-categories').removeClass('d-none');
                $('.pg-living-section').addClass('d-none');
                $('.rent-selected').addClass('d-none');
                $('.select-residential-sell').removeClass('d-none');


            } else if (residentialChecked && pgChecked) {
                $('.pg-living-section').removeClass('d-none');
                $('.selected-residential-sell-categories').addClass('d-none');
                $('.selected-residential-sell-categories').addClass('d-none');
                $('.residential-property-section').addClass('d-none');
            }

            if (apartment || independentfloor || independenthouse) {

                $('.selected-residential-sell').addClass('d-none');
                $('.residential-property-type').removeClass('d-none');

            } else if (plot) {
                $('.selected-residential-sell').removeClass('d-none');
                $('.residential-property-type').addClass('d-none');
            }
            // ---------------------commercial-radio-type----------------------------------

            if (commercial && comPlot) {
                $('.plot-seclet').addClass('d-none');
                $('.secleted-plot-comm').removeClass('d-none');
                $('.secleted-office').addClass('d-none');
                $('.seclected-Retail-Shop').addClass('d-none');
            } else if (commercial && office) {
                $('.secleted-office').removeClass('d-none');
                $('.seclected-Retail-Shop').addClass('d-none');
                $('.secleted-plot-comm').addClass('d-none');
                $('.plot-seclet').removeClass('d-none');
            } else if (commercial && retailshop) {

                $('.secleted-office').addClass('d-none');
                $('.seclected-Retail-Shop').removeClass('d-none');
                $('.secleted-plot-comm').addClass('d-none');
                $('.plot-seclet').removeClass('d-none');

            } else if (commercial && showroom) {
                $('.secleted-office').addClass('d-none');
                $('.seclected-Retail-Shop').removeClass('d-none');
                $('.secleted-plot-comm').addClass('d-none');
                $('.plot-seclet').removeClass('d-none');
            } else if (commercial && warehouse) {
                $('.secleted-office').addClass('d-none');
                $('.seclected-Retail-Shop').removeClass('d-none');
                $('.secleted-plot-comm').addClass('d-none');
                $('.plot-seclet').removeClass('d-none');
            }

            if (commercial && rentChecked) {
                $('.commerical-sell-property').addClass('d-none');
                $('.commerical-rent-property').removeClass('d-none');
            } else if (commercial && sellChecked) {
                $('.commerical-sell-property').removeClass('d-none');
                $('.commerical-rent-property').addClass('d-none');
            }
        });


        function validatesecondRadio(name, errorMessage) {
            if ($(`input[name="${name}"]:checked`).length === 0) {
                $(`#alertMessage${name}`).text(errorMessage);
                return errorMessage;
            } else {
                $(`#alertMessage${name}`).text('');
                return '';
            }
        }



        function validatesecondTextField(name, errorMessage) {
            if ($(`input[name="${name}"]`).val().trim() === '') {
                $(`#alerterror${name}`).text(errorMessage);
                return errorMessage;

            } else {
                $(`#alertMessage${name}`).text('');
                return '';
            }
        }


        function checksecondValidation() {

            const errors = [];
            if ($('#residential-radio').is(':checked')) {
                if ($('#rent-radio').is(':checked') || $('#sell-radio').is(':checked')) {
                    errors.push(validatesecondTextField('project_society_res', 'Please first fill Property Type to continue'));
                    errors.push(validatesecondTextField('locality_res', 'Please select a valid locality'));
                    // errors.push(validatesecondRadio('category_type', 'Please fill this to continue'));

                    if ($('#apartment, #independent-floor, #independent-house').is(':checked')) {
                        errors.push(validatesecondRadio('total_property', 'Please select the BHK'));
                        errors.push(validatesecondTextField('built_up_area', 'Please fill this to continue'));
                        errors.push(validatesecondRadio('age_of_property', 'Please fill this to continue'));
                        errors.push(validatesecondRadio('furnish_type', 'Please fill this to continue'));
                    }
                    if ($('#sell-radio').is(':checked') && ($('#plot-radio').is(':checked'))) {
                        errors.push(validatesecondTextField('plot_area', 'Saleable area should be between 150 and 230000'));
                        errors.push(validatesecondTextField('plot_length', 'Length should be between 1 and 10000'));
                        errors.push(validatesecondTextField('plot_width', 'Width should be between 1 and 10000'));
                    }


                    if ($('#pg-living').is(':checked')) {
                        errors.push(validatesecondRadio('pg_room_type', 'Please fill this to continue'));
                        errors.push(validatesecondTextField('total_beds_this_room', 'c'));
                        errors.push(validatesecondTextField('pg_rent', 'Please fill this to continue'));
                        errors.push(validatesecondTextField('pg_security_deposit', 'Please fill this to continue'));
                    }
                }
            }


            if ($('#commercial-radio').is(':checked')) {

                if ($('#rent-radio').is(':checked')) {

                    errors.push(validatesecondTextField('project_society_comm', 'Please first fill Property Type to continue'));
                    errors.push(validatesecondTextField('locality_comm', 'Please select a valid locality'));
                    errors.push(validatesecondTextField('available_from', 'Please fill this to continue'));
                    errors.push(validatesecondRadio('zone_type', 'Please fill this to continue'));
                    errors.push(validatesecondRadio('ownership', 'Please fill this to continue'));
                    errors.push(validatesecondTextField('secuirty_deposite', 'Please fill this to continue'));
                    errors.push(validatesecondTextField('lock_in_period', 'Please fill this to continue'));
                    errors.push(validatesecondTextField('expected_rent_increase', 'Please fill this to continue'));
                }

                if ($('#office, #retail-shop, #showroom, #warehouse').is(':checked')) {

                    errors.push(validatesecondRadio('posession_status', 'Please fill this to continue'));
                    errors.push(validatesecondRadio('location_hub', 'Please fill this to continue'));

                }
            }


            const filteredErrors = errors.filter(error => error !== '');

            if (filteredErrors.length > 0) {
                return filteredErrors.join('\n');
            }
            return '';
        }


        $('#continue-second').click(function() {

            const errorMessagesecond = checksecondValidation();

            if (errorMessagesecond !== '') {
                $('#error-card-toggle .modal-body').html(`<p style="text-align: center;color:orangered;"><i class="flaticon-discovery mr15"></i>Please resolve all the errors to continue.</p>`);
                $('#error-card-toggle').modal('show');
                setTimeout(function() {
                    $('#error-card-toggle').modal('hide');
                }, 3000);;
            }

            if (errorMessagesecond === '') {

                $('.first-btn').addClass('d-none');
                $('.second-btn').addClass('d-none');
                $('.first-section').addClass('d-none');
                $('.second-section').addClass('d-none');
                $('.thirds-section').removeClass('d-none');
                $('.thired-btn').removeClass('d-none');


                // alert('success');
            }

        });


        $('#continue-thired').click(function() {
            const form = document.getElementById('property-form');
            form.submit();
        });

    });
</script>

<script>
    document.getElementById('video-upload').addEventListener('change', function() {
        var files = this.files;
        var fileNames = '';

        for (var i = 0; i < files.length; i++) {
            fileNames += files[i].name + '<br>';
        }
        document.getElementById('file-names-container').innerHTML = fileNames;

        var videoPlayer = document.getElementById('video-player');
        videoPlayer.innerHTML = '';
        for (var i = 0; i < files.length; i++) {
            var video = document.createElement('video');
            video.controls = true;
            video.style.width = '100%';
            video.style.marginBottom = '10px';
            var source = document.createElement('source');
            source.src = URL.createObjectURL(files[i]);
            video.appendChild(source);
            videoPlayer.appendChild(video);
        }
    });
</script>

<script>
    function formatRent(input) {
        var rent = input.value.replace(/\D/g, '');
        rent = parseFloat(rent);

        if (!isNaN(rent)) {
            if (rent >= 10000000) {
                rent = (rent / 10000000).toFixed(2) + " Cr";
            } else if (rent >= 100000) {
                rent = (rent / 100000).toFixed(2) + " Lac";
            } else if (rent >= 1000) {
                rent = (rent / 1000).toFixed(2) + " K";
            } else {
                rent = rent.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
        } else {
            rent = "";
        }

        var formattedRentSpans = document.getElementsByClassName("formatted-rent");
        for (var i = 0; i < formattedRentSpans.length; i++) {
            formattedRentSpans[i].textContent = rent;
        }
    }

    function secuirtyForment(input) {
        var security = input.value.replace(/\D/g, '');
        security = parseFloat(security);

        if (!isNaN(security)) {
            if (security >= 10000000) {
                security = (security / 10000000).toFixed(2) + " Cr";
            } else if (security >= 100000) {
                security = (security / 100000).toFixed(2) + " Lac";
            } else if (security >= 1000) {
                security = (security / 1000).toFixed(2) + " K";
            } else {
                security = security.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
        } else {
            security = "";
        }

        var formattedRentSpans = document.getElementsByClassName("secuirtyForment");
        for (var i = 0; i < formattedRentSpans.length; i++) {
            formattedRentSpans[i].textContent = security;
        }
    }
</script>



@endsection