@extends('gharkasapna.layouts.innerpages_app')
@section('content')


<style>
    .modal-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }




    .form-control {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .input-with-icon {
        position: relative;
    }

    .input-with-icon input {
        padding-right: 30px;
        /* Space for the icon */
    }

    .input-with-icon span {
        position: absolute;
        top: 50%;
        right: 10px;
        /* Adjust this value to place the icon properly */
        transform: translateY(-50%);
        color: black;
        height: 46px;
        font-size: 30px;
    }

    .input-with-icon {
        position: relative;
    }

    .input-with-icon input {
        padding-right: 30px;
        /* Space for the icon */
    }


    .preview-features {
        margin-top: 20px;
    }

    .feature-preview {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .feature-preview .feature-details {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .feature-preview .cancel-btn {
        cursor: pointer;
        color: red;
    }


    /* ----- */
    .feature-preview {
        display: flex;
        align-items: center;
    }

    i.cancel-btn.fas.fa-times {
        order: 1;
        padding-right: 10px;
        font-size: 20px;
        padding: 2px 9px;
        border-radius: 50%;
        border: 2px solid red;
        margin-right: 10px;
    }

    .feature-details {
        order: 2;
    }

    .feature-preview .feature-details {
        margin-bottom: 0px !important;
    }

    /* ----standard----- */


    .standard-preview-features {
        margin-top: 20px;
    }

    /* .pending-tag-class {
        position: relative;
    } */

    .pending-tag {
        position: absolute;
        top: 0;
        right: 0;
        background-color: red;
        border-radius: 0px 6px 0px 10px;
    }

    .published-tag {
        position: absolute;
        top: 0;
        right: 0;
        background-color: green;
        border-radius: 0px 6px 0px 10px;
    }

    .pending-tag h3 {
        font-size: 16px;
        color: #fff;
        padding: 5px 12px 0px 12px;
    }

    .published-tag h3 {
        font-size: 16px;
        color: #fff;
        padding: 5px 12px 0px 12px;
    }

    a.ud-btn {
        padding: 8px 22px !important;
    }

    .details .d-grid {
        width: 100% !important;
    }

    .d-grid {
        display: flex !important;
        gap: 15px;
    }

    a.ud-btn.btn-thm-border.mb25.me-4 {
        color: #eb6753;
    }

    .btn-thm-border.mb25 {
        margin-bottom: 0px !important;
    }

    .form-check.form-switch {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 7px;
        /* padding-right: 85px; */
    }

    .form-check.form-switch .form-check-label {
        font-family: 'sans-sarif';
        font-weight: 600;
        font-size: 18px;
        color: #ec6753;
    }

    a.ud-btn.btn-thm-border.btn-white2.mb25.me-4 {
        margin-right: 0px !important;
    }
</style>

<div class="body_content">
    <!-- UI Elements Sections -->
    <section class="breadcumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb-style1">
                        <h2 class="title">Membership Plans</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section Area -->
    <section class="our-pricing pb90 pt-0">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay="100ms">
                <div class="col-lg-6 offset-lg-3">
                    <div class="main-title text-center mb30">
                        <h2>Membership Plans</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur.</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 success-mesg" style="display: none;">
                <div class="ui-content">
                    <div class="message-alart-style1">
                        <div class="alert alart_style_four alert-dismissible fade show mb20" role="alert">
                            <span id="successMessage"></span>
                            <i class="far fa-xmark btn-close" data-bs-dismiss="alert" aria-label="Close"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row wow fadeInUp" data-wow-delay="300ms">

                <div class="col-md-6 col-xl-4">

                    <div class="pricing_packages basic-membership">
                        <div class="{{ ($basicPlans->status == 'pending') ? 'pending-tag' : 'published-tag' }}">
                            <h3 class="basic-status">{{ucfirst($basicPlans->status)}}</h3>
                        </div>
                        <div class="heading mb60">
                            <h4 class="package_title basic-title">Basic</h4>
                            @if(!empty($basicPlans))
                            <h1 class="text2 basicText2">{{$basicPlans ? $basicPlans->price : ''}}</h1>
                            <p class="text basicText"> Allows posting of only {{$basicPlans ? $basicPlans->max_properties : ''}} property</p>
                            @else
                            <p class="text"><b>No basic plan available</b></p>
                            @endif
                            <img class="price-icon" src="{{asset('public/assets/images/icon/pricing-icon-2.svg')}}" alt="">
                        </div>


                        <div class="details">
                            @if(!empty($basicPlans))
                            <p class="text mb35 basic-plan-text">Basic plan allows posting of only {{$basicPlans ? $basicPlans->max_properties : ''}} property, free of charge.</p>
                            @endif
                            <div class="list-style1 basic-style1 mb40">
                                <ul>
                                    @if($basicPlans)
                                    @php $featuresArray = explode(',', $basicPlans->features); @endphp
                                    @foreach($featuresArray as $features)
                                    <li><i class="far fa-check text-white bgc-dark fz15"></i>{{$features}}</li>
                                    @endforeach
                                    @endif

                                </ul>
                            </div>
                            <div class="d-grid">
                                <a data-bs-toggle="modal" data-bs-target="#basicPlanModal" class="ud-btn btn-thm-border text-thm basic-plan">Update<i class="fal fa-arrow-right-long"></i></a>

                                <a class="ud-btn btn-thm-border btn-white2 mb25 me-4">
                                    <div class="form-check form-switch">

                                        <input class="form-check-input" type="checkbox" id="check-status" {{ ($basicPlans->status == 'pending') ? '' : 'checked' }}>
                                        <label class="form-check-label" for="check-status">Set status</label>
                                    </div><i class="fal fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-xl-4">
                    <div class="pricing_packages standard-membership">
                        <div class="{{ ($standardPlans->status == 'pending') ? 'pending-tag' : 'published-tag' }}">
                            <h3 class="standard-status">{{ucfirst($standardPlans->status)}}</h3>
                        </div>
                        <div class="heading mb60">
                            <h4 class="package_title standard-title">Standard</h4>
                            @if(!empty($standardPlans))
                            <h1 class="text2 standardText2">₹{{$standardPlans ? $standardPlans->price : ''}}</h1>
                            <p class="text standardText"> Allows posting of up to {{ $standardPlans ? $standardPlans->max_properties : ''}} properties</p>
                            @else
                            <p class="text"><b>No standard plan available</b></p>
                            @endif
                            <img class="price-icon" src="{{asset('public/assets/images/icon/pricing-icon-1.svg')}}" alt="">
                        </div>
                        <div class="details">
                            @if(!empty($standardPlans))
                            <p class="text mb35 standard-plan-text">Standard plan allows posting of up to {{$standardPlans ? $standardPlans->max_properties : ''}} properties</p>
                            @endif
                            <div class="list-style1 standard-style1 mb40">
                                <ul>
                                    @if($standardPlans)
                                    @php $featuresArray = explode(',', $standardPlans->features); @endphp
                                    @foreach($featuresArray as $features)
                                    <li><i class="far fa-check text-white bgc-dark fz15"></i>{{$features}}</li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="d-grid">
                                <a data-bs-toggle="modal" data-bs-target="#standardPlanModal" class="ud-btn btn-thm-border text-thm standard-plan">Update<i class="fal fa-arrow-right-long"></i></a>
                                <a class="ud-btn btn-thm-border btn-white2 mb25 me-4">
                                    <div class="form-check form-switch">

                                        <input class="form-check-input" type="checkbox" id="standard-status" {{ ($standardPlans->status == 'pending') ? '' : 'checked' }}>
                                        <label class="form-check-label" for="standard-status">Set status</label>
                                    </div><i class="fal fa-arrow-right-long"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-6 col-xl-4">
                    <div class="pricing_packages premium-membership">
                        <div class="{{ ($premiumPlans->status == 'pending') ? 'pending-tag' : 'published-tag' }}">
                            <h3 class="premium-status">{{ucfirst($premiumPlans->status)}}</h3>
                        </div>
                        <div class="heading mb60">
                            <h4 class="package_title premium-title">Premium</h4>
                            @if(!empty($premiumPlans))
                            <h1 class="text2 premiumText2">₹{{$premiumPlans ? $premiumPlans->price : ''}}</h1>
                            @else
                            <p class="text"><b>No premium plan available</b></p>
                            @endif
                            <!-- <p class="text premiumText">per month</p> -->
                            <img class="price-icon" src="{{asset('public/assets/images/icon/pricing-icon-3.svg')}}" alt="">
                        </div>
                        <div class="details">
                            @if(!empty($premiumPlans))
                            <p class="text mb35">Post as many properties as you like, without any limitations.</p>
                            @endif
                            <div class="list-style1 premium-style1 mb40">
                                <ul>
                                    @if($premiumPlans)
                                    @php $featuresArray = explode(',', $premiumPlans->features); @endphp
                                    @foreach($featuresArray as $features)
                                    <li><i class="far fa-check text-white bgc-dark fz15"></i>{{$features}}</li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="d-grid">
                                <a data-bs-toggle="modal" data-bs-target="#PremiumPlanModal" class="ud-btn btn-thm-border text-thm premium-plan">Update<i class="fal fa-arrow-right-long"></i></a>
                                <a class="ud-btn btn-thm-border btn-white2 mb25 me-4">
                                    <div class="form-check form-switch">

                                        <input class="form-check-input" type="checkbox" id="premium-status" {{ ($premiumPlans->status == 'pending') ? '' : 'checked' }}>
                                        <label class="form-check-label" for="premium-status">Set status</label>
                                    </div><i class="fal fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Modal for Updating Basic Plan  -->


    <div class="modal fade" id="basicPlanModal" tabindex="-1" aria-labelledby="basicPlanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="col-lg-12 success-msg-basic" style="display: none;">
                        <div class="ui-content">
                            <div class="message-alart-style1">
                                <div class="alert alart_style_four alert-dismissible fade show mb20" role="alert">
                                    <span id="successMessageBasic"></span>
                                    <i class="far fa-xmark btn-close" data-bs-dismiss="alert" aria-label="Close"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="modal-title" id="basicPlanModalLabel">Edit Basic Membership Plan</h4>

                    <input type="text" id="basicPrice" class="form-control" placeholder="Enter new price" value="{{$basicPlans ? $basicPlans->price : '' }}">

                    <input type="number" class="form-control" id="maxFreeListings" placeholder="Maximum free listings" value="{{ $basicPlans ? $basicPlans->max_properties : '' }}">



                    <div class="input-with-icon">
                        <div class="text-danger" id="featureError"></div>
                        <input type="text" class="form-control" id="featureName" placeholder="Enter feature name">
                        <span id="addFeatureBtn"><b>Add</b></span>
                    </div>

                </div>
                @if($basicPlans)
                @php $featuresArray = explode(',', $basicPlans->features); @endphp
                @foreach($featuresArray as $features)
                <div class="feature-preview">
                    <div class="feature-details">{{$features}}</div><i class="cancel-btn fas fa-times delete-feature"></i>
                </div>
                @endforeach
                @endif

                <div class="preview-features">

                </div>

                <div class="modal-footer justify-content-center">
                    <button type="button" class="ud-btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="ud-btn btn btn-danger " id="saveChangesBtn" style="color:#fff">Save Changes</button>
                </div>
            </div>
        </div>
    </div>






    <!-- Modal for Standard Plan  -->



    <div class="modal fade" id="standardPlanModal" tabindex="-1" aria-labelledby="standardPlanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">

                    <div class="col-lg-12 success-msg-standard" style="display: none;">
                        <div class="ui-content">
                            <div class="message-alart-style1">
                                <div class="alert alart_style_four alert-dismissible fade show mb20" role="alert">
                                    <span id="successMessageStandard"></span>
                                    <i class="far fa-xmark btn-close" data-bs-dismiss="alert" aria-label="Close"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="modal-title" id="standardPlanModalLabel">Edit Standard Membership Plan</h4>

                    <input type="text" id="standardPrice" class="form-control" placeholder="Enter new price" value="{{$standardPlans ? $standardPlans->price : '' }}">

                    <input type="number" class="form-control" id="maxFreeListings-standard" placeholder="Maximum property listings" value="{{ $standardPlans ? $standardPlans->max_properties : '' }}">

                    <div class="input-with-icon">
                        <div class="text-danger" id="standard-featureError"></div>
                        <input type="text" class="form-control" id="standard-featureName" placeholder="Enter feature name">
                        <!-- <i class="fas fa-check" id=""></i> -->
                        <span id="standard-addFeatureBtn"><b>Add</b></span>
                    </div>

                </div>
                @if($standardPlans)
                @php $featuresArray = explode(',', $standardPlans->features); @endphp
                @foreach($featuresArray as $features)
                <div class="feature-preview">
                    <div class="feature-details">{{$features}}</div><i class="cancel-btn fas fa-times delete-standard"></i>
                </div>
                @endforeach
                @endif

                <div class="standard-preview-features">

                </div>

                <div class="modal-footer justify-content-center">
                    <button type="button" class="ud-btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="ud-btn btn btn-danger " id="standard-saveChangesBtn" style="color:#fff">Save Changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for Premium Plan  -->

    <div class="modal fade" id="PremiumPlanModal" tabindex="-1" aria-labelledby="PremiumPlanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="col-lg-12 success-msg-premium" style="display: none;">
                        <div class="ui-content">
                            <div class="message-alart-style1">
                                <div class="alert alart_style_four alert-dismissible fade show mb20" role="alert">
                                    <span id="successMessagePremium"></span>
                                    <i class="far fa-xmark btn-close" data-bs-dismiss="alert" aria-label="Close"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="modal-title" id="PremiumPlanModalLabel">Edit Premium Membership Plan</h4>

                    <input type="text" id="premiumPrice" class="form-control" placeholder="Enter new price" value="{{ $premiumPlans ? $premiumPlans->price : ''}}">

                    <input type="text" class="form-control" id="premiumListings" placeholder="Maximum property listings" value="{{ $premiumPlans ? $premiumPlans->max_properties : ''}}">

                    <div class="input-with-icon">
                        <div class="text-danger" id="premium-featureError"></div>
                        <input type="text" class="form-control" id="premium-featureName" placeholder="Enter feature name">
                        <!-- <i class="fas fa-check" id="premium-addFeatureBtn"></i> -->
                        <span id="premium-addFeatureBtn"><b>Add</b></span>
                    </div>

                </div>
                @if($premiumPlans)
                @php $featuresArray = explode(',', $premiumPlans->features); @endphp
                @foreach($featuresArray as $features)
                <div class="feature-preview">
                    <div class="feature-details">{{$features}}</div><i class="cancel-btn fas fa-times delete-premium"></i>
                </div>
                @endforeach
                @endif


                <div class="premium-preview-features">

                </div>

                <div class="modal-footer justify-content-center">
                    <button type="button" class="ud-btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="ud-btn btn btn-danger " id="premium-saveChangesBtn" style="color:#fff">Save Changes</button>
                </div>
            </div>
        </div>
    </div>


    @endsection

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- basic Plan -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#check-status').change(function() {
                var planSelector = '.basic-membership';
                if ($(this).prop('checked')) {

                    Swal.fire({
                        title: "Are you sure?",
                        text: "Do you want to publish the status?",
                        icon: "info",
                        showCancelButton: true,
                        confirmButtonText: "Yes, publish it!",
                        cancelButtonText: "No, cancel"

                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{route('basic.status')}}",
                                method: "POST",
                                data: {
                                    "_token": "{{csrf_token()}}",
                                    "status": "published"
                                },
                                success: function(response) {
                                    var status = response.status;
                                   

                                    $('.success-mesg').show();
                                    $('#successMessage').text('Status updated successfully!');
                                    if (status === "published") {
                                        $('.basic-status').text("Published");
                                        $(planSelector).find('.pending-tag').removeClass('pending-tag').addClass('published-tag');

                                    } else if (status === "pending") {
                                        $('.basic-status').text("Pending");
                                        $(planSelector).find('.published-tag').removeClass('published-tag').addClass('pending-tag');

                                    }

                                    setTimeout(function() {
                                        $('.success-mesg').hide();
                                    }, 8000);
                                },
                                error: function(xhr, status, error) {
                                    console.log("Error:", error);
                                }
                            });
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                } else {
                    Swal.fire({
                        title: "Status not published",
                        text: "You have chosen not to publish the status.",
                        icon: "info",
                        showCancelButton: true,
                        confirmButtonText: "Yes",
                        cancelButtonText: "No, cancel"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{route('basic.status')}}",
                                method: "POST",
                                data: {
                                    "_token": "{{csrf_token()}}",
                                    "status": "pending"
                                },
                                success: function(response) {

                                    var status = response.status;
                                    $('.success-mesg').show();
                                    $('#successMessage').text('Status updated successfully!');
                                    if (status === "published") {


                                        $('.basic-status').text("Published");
                                        $(planSelector).find('.pending-tag').removeClass('pending-tag').addClass('published-tag');


                                    } else if (status === "pending") {

                                        $('.basic-status').text("Pending");
                                        $(planSelector).find('.published-tag').removeClass('published-tag').addClass('pending-tag');


                                    }

                                    setTimeout(function() {
                                        $('.success-mesg').hide();
                                    }, 8000);

                                },
                                error: function(xhr, status, error) {
                                    console.log("Error:", error);
                                }
                            });

                        } else {

                            $(this).prop('checked', true);
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#standard-status').change(function() {
                var planSelector = '.standard-membership';
                if ($(this).prop('checked')) {

                    Swal.fire({
                        title: "Are you sure?",
                        text: "Do you want to publish the status?",
                        icon: "info",
                        showCancelButton: true,
                        confirmButtonText: "Yes, publish it!",
                        cancelButtonText: "No, cancel"

                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{route('standard.status')}}",
                                method: "POST",
                                data: {
                                    "_token": "{{csrf_token()}}",
                                    "status": "published"
                                },
                                success: function(response) {
                                    console.log(response)
                                    var status = response.status;
                                    $('.success-mesg').show();
                                    $('#successMessage').text('Status updated successfully!');
                                    if (status === "published") {

                                        $('.standard-status').text("Published");
                                       // $('.pending-tag').removeClass('pending-tag').addClass('published-tag');
                                        $(planSelector).find('.pending-tag').removeClass('pending-tag').addClass('published-tag');

                                    } else if (status === "pending") {

                                        $('.standard-status').text("Pending");
                                       // $('.published-tag').removeClass('published-tag').addClass('pending-tag');
                                       $(planSelector).find('.published-tag').removeClass('published-tag').addClass('pending-tag');
                                    }

                                    setTimeout(function() {
                                        $('.success-mesg').hide();
                                    }, 8000);
                                },
                                error: function(xhr, status, error) {
                                    console.log("Error:", error);
                                }
                            });
                        } else {
                            $(this).prop('checked', false);
                        }
                    });


                } else {
                    Swal.fire({
                        title: "Status not published",
                        text: "You have chosen not to publish the status.",
                        icon: "info",
                        showCancelButton: true,
                        confirmButtonText: "Yes",
                        cancelButtonText: "No, cancel"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{route('standard.status')}}",
                                method: "POST",
                                data: {
                                    "_token": "{{csrf_token()}}",
                                    "status": "pending"
                                },
                                success: function(response) {

                                    console.log(response)
                                    var status = response.status;
                                    $('.success-mesg').show();
                                    $('#successMessage').text('Status updated successfully!');
                                    if (status === "published") {

                                        $('.standard-status').text("Published");
                                        //$('.pending-tag').removeClass('pending-tag').addClass('published-tag');
                                        $(planSelector).find('.pending-tag').removeClass('pending-tag').addClass('published-tag')
                                    } else if (status === "pending") {

                                        $('.standard-status').text("Pending");
                                        //$('.published-tag').removeClass('published-tag').addClass('pending-tag');
                                        $(planSelector).find('.published-tag').removeClass('published-tag').addClass('pending-tag');
                                    }

                                    setTimeout(function() {
                                        $('.success-mesg').hide();
                                    }, 8000);

                                },
                                error: function(xhr, status, error) {
                                    console.log("Error:", error);
                                }
                            });

                        } else {

                            $(this).prop('checked', true);
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#premium-status').change(function() {
                var planSelector = '.premium-membership';
                if ($(this).prop('checked')) {

                    Swal.fire({
                        title: "Are you sure?",
                        text: "Do you want to publish the status?",
                        icon: "info",
                        showCancelButton: true,
                        confirmButtonText: "Yes, publish it!",
                        cancelButtonText: "No, cancel"

                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{route('premium.status')}}",
                                method: "POST",
                                data: {
                                    "_token": "{{csrf_token()}}",
                                    "status": "published"
                                },
                                success: function(response) {
                                    console.log(response)
                                    var status = response.status;
                                    $('.success-mesg').show();
                                    $('#successMessage').text('Status updated successfully!');
                                    if (status === "published") {

                                        $('.premium-status').text("Published");
                                       // $('.pending-tag').removeClass('pending-tag').addClass('published-tag');
                                       $(planSelector).find('.pending-tag').removeClass('pending-tag').addClass('published-tag');

                                    } else if (status === "pending") {

                                        $('.premium-status').text("Pending");
                                      //  $('.published-tag').removeClass('published-tag').addClass('pending-tag');
                                        $(planSelector).find('.published-tag').removeClass('published-tag').addClass('pending-tag');
                                    }

                                    setTimeout(function() {
                                        $('.success-mesg').hide();
                                    }, 8000);
                                },
                                error: function(xhr, status, error) {
                                    console.log("Error:", error);
                                }
                            });
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                } else {

                    Swal.fire({
                        title: "Status not published",
                        text: "You have chosen not to publish the status.",
                        icon: "info",
                        showCancelButton: true,
                        confirmButtonText: "Yes",
                        cancelButtonText: "No, cancel"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{route('premium.status')}}",
                                method: "POST",
                                data: {
                                    "_token": "{{csrf_token()}}",
                                    "status": "pending"
                                },
                                success: function(response) {

                                    console.log(response)
                                    var status = response.status;
                                    $('.success-mesg').show();
                                    $('#successMessage').text('Status updated successfully!');
                                    if (status === "published") {

                                        $('.premium-status').text("Published");
                                        //$('.pending-tag').removeClass('pending-tag').addClass('published-tag');
                                        $(planSelector).find('.pending-tag').removeClass('pending-tag').addClass('published-tag');

                                    } else if (status === "pending") {

                                        $('.premium-status').text("Pending");
                                       // $('.published-tag').removeClass('published-tag').addClass('pending-tag');
                                       $(planSelector).find('.published-tag').removeClass('published-tag').addClass('pending-tag');
                                    }

                                    setTimeout(function() {
                                        $('.success-mesg').hide();
                                    }, 8000);

                                },
                                error: function(xhr, status, error) {
                                    console.log("Error:", error);
                                }
                            });

                        } else {

                            $(this).prop('checked', true);
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.basic-plan').on('click', function() {
                $('.basic-membership').addClass("active");
                $('.standard-membership').removeClass("active");
                $('.premium-membership').removeClass("active");


            });

            $('.standard-plan').on("click", function() {
                $('.standard-membership').addClass("active");
                $('.basic-membership').removeClass("active");
                $('.premium-membership').removeClass("active");

            });


            $('.premium-plan').on("click", function() {
                $('.premium-membership').addClass("active");
                $('.basic-membership').removeClass("active");
                $('.standard-membership').removeClass("active");

            });

        });
    </script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var addFeatureBtn = document.getElementById('addFeatureBtn');
            var featureNameInput = document.getElementById('featureName');
            var previewFeatures = document.querySelector('.preview-features');


            addFeatureBtn.addEventListener('click', function() {
                var featureName = featureNameInput.value.trim();
                if (featureName !== '') {
                    var featurePreview = document.createElement('div');
                    featurePreview.className = 'feature-preview';

                    featurePreview.innerHTML = '<div class="feature-details">' + featureName + '</div><i class="cancel-btn fas fa-times"></i> ';

                    previewFeatures.appendChild(featurePreview);

                    featureNameInput.value = '';

                    featurePreview.querySelector('.cancel-btn').addEventListener('click', function() {
                        //featurePreview.remove();
                        // alert(featureName);
                        Swal.fire({
                            title: "Are you sure?",
                            text: "You are about to delete this feature: " + featureName,
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, delete it!",
                            customClass: {
                                popup: 'custom-swal-popup',
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: "{{route('delete.basic.feature')}}",
                                    type: 'POST',
                                    data: {
                                        feature: featureName,
                                        "_token": "{{ csrf_token() }}"
                                    },
                                    success: function(response) {

                                        $("#successMessageBasic").text("Feature removed successfully !");
                                        $(".success-msg-basic").show();
                                        var featureElement = $(this).siblings('.feature-details');
                                        featureElement.parent('.feature-preview').remove();
                                        featurePreview.remove();
                                        $(".basic-style1 ul li:contains(" + featureName + ")").remove();
                                        setTimeout(function() {
                                            $('.success-msg-basic').hide();
                                        }, 8000);

                                    },
                                    error: function(xhr, status, error) {
                                        console.log("Ajax Error", error);
                                    }
                                });
                            }
                        });
                    });


                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var addFeatureBtn = document.getElementById('standard-addFeatureBtn');
            var featureNameInput = document.getElementById('standard-featureName');
            var previewFeatures = document.querySelector('.standard-preview-features');

            addFeatureBtn.addEventListener('click', function() {
                var featureName = featureNameInput.value.trim();


                if (featureName !== '') {
                    var featurePreview = document.createElement('div');
                    featurePreview.className = 'feature-preview';

                    featurePreview.innerHTML = '<div class="feature-details">' + featureName + '</div><i class="cancel-btn fas fa-times"></i> ';

                    previewFeatures.appendChild(featurePreview);

                    featureNameInput.value = '';

                    featurePreview.querySelector('.cancel-btn').addEventListener('click', function() {

                        Swal.fire({
                            title: "Are you sure?",
                            text: "You are about to delete this feature: " + featureName,
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, delete it!",
                            customClass: {
                                popup: 'custom-swal-popup',
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {

                                $.ajax({
                                    url: "{{route('delete.standard')}}",
                                    method: "POST",
                                    data: {
                                        feature: featureName,
                                        "_token": "{{ csrf_token() }}"
                                    },
                                    success: function(response) {
                                        //console.log(response);
                                        if (response.success) {
                                            $("#successMessageStandard").text("Feature deleted successfully !");
                                            $(".success-msg-standard").show();
                                            var featureElement = $(this).siblings('.feature-details');
                                            featureElement.parent('.feature-preview').remove();
                                            featurePreview.remove();
                                            $(".standard-style1 ul li:contains(" + featureName + ")").remove();
                                            setTimeout(function() {
                                                $('.success-msg-standard').hide();
                                            }, 8000);

                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        console.log("Ajax Error", error);
                                    }
                                });
                            }
                        })
                    });
                }
            });
        });
    </script>

    <!-- Premium Plan -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var addFeatureBtn = document.getElementById('premium-addFeatureBtn');
            var featureNameInput = document.getElementById('premium-featureName');
            var previewFeatures = document.querySelector('.premium-preview-features');

            addFeatureBtn.addEventListener('click', function() {
                var featureName = featureNameInput.value.trim();


                if (featureName !== '') {
                    var featurePreview = document.createElement('div');
                    featurePreview.className = 'feature-preview';

                    featurePreview.innerHTML = '<div class="feature-details">' + featureName + '</div><i class="cancel-btn fas fa-times"></i> ';

                    previewFeatures.appendChild(featurePreview);

                    featureNameInput.value = '';

                    featurePreview.querySelector('.cancel-btn').addEventListener('click', function() {


                        Swal.fire({
                            title: "Are you sure?",
                            text: "You are about to delete this feature: " + featureName,
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, delete it!",
                            customClass: {
                                popup: 'custom-swal-popup',
                            }
                        }).then((result) => {

                            if (result.isConfirmed) {
                                $.ajax({
                                    url: "{{route('delete.premium')}}",
                                    method: "POST",
                                    data: {
                                        featureValue: featureName,
                                        "_token": "{{ csrf_token() }}"
                                    },
                                    success: function(response) {
                                        console.log(response);

                                        if (response.success) {

                                            $("#successMessagePremium").text("Feature deleted successfully !");
                                            $(".success-msg-premium").show();
                                            featurePreview.remove();
                                            var featureElement = $(this).siblings('.feature-details');
                                            featureElement.parent('.feature-preview').remove();
                                            $(".premium-style1 ul li:contains(" + featureName + ")").remove();

                                            setTimeout(function() {
                                                $('.success-msg-premium').hide();
                                            }, 8000);

                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        console.log("Ajax Error:", error);
                                    }
                                });
                            }
                        });
                    });
                }
            });
        });
    </script>




    <!-- Basic Plan   -->
    <script>
        $(document).ready(function() {

            $('#featureName').on('keyup', function() {
                var newFeature = $(this).val().trim().toLowerCase();
                var existingFeatures = [];

                $('.feature-details').each(function() {
                    existingFeatures.push($(this).text().trim().toLowerCase());
                });

                if (existingFeatures.includes(newFeature)) {
                    $('#featureError').text("Feature already exists.");
                    $('#addFeatureBtn').hide();
                } else {
                    $('#featureError').text("");
                    $('#addFeatureBtn').show();
                }


            });

            $("#standard-featureName").on("keyup", function() {
                var newFeature = $(this).val().trim().toLowerCase();
                var existingFeatures = [];
                $('.feature-details').each(function() {
                    existingFeatures.push($(this).text().trim().toLowerCase());
                });

                if (existingFeatures.includes(newFeature)) {
                    $('#standard-featureError').text("Feature already exists.");
                    $('#standard-addFeatureBtn').hide();

                } else {
                    $('#standard-featureError').text("");
                    $('#standard-addFeatureBtn').show();
                }


            });

            $('#premium-featureName').on("keyup", function() {
                var newFeature = $(this).val().trim().toLowerCase();
                var existingFeatures = [];
                $('.feature-details').each(function() {
                    existingFeatures.push($(this).text().trim().toLowerCase());
                });


                if (existingFeatures.includes(newFeature)) {
                    $('#premium-featureError').text("Feature already exists.");
                    $('#premium-addFeatureBtn').hide();
                } else {
                    $('#premium-featureError').text("");
                    $('#premium-addFeatureBtn').show();
                }

            })






            $('#saveChangesBtn').click(function() {
                var price = $("#basicPrice").val();
                var maxPropertyListings = $("#maxFreeListings").val();
                var features = [];
                $('.preview-features .feature-preview .feature-details').each(function() {
                    features.push($(this).text());
                });
                if (features.length === 0) {
                    features = '';
                }


                $.ajax({
                    url: "{{route('basic.plan')}}",
                    method: 'POST',
                    data: {

                        maxPropertyListings: maxPropertyListings,
                        features: features,
                        price: price,
                        "_token": "{{ csrf_token()}}"
                    },
                    success: function(response) {
                        if (response.success) {
                            var membershipPlan = response.membershipPlan;

                            $(".basic-title").text("Basic");
                            $(".basicText2").text(membershipPlan.price);
                            // $(".basicText1").text(membershipPlan.price);
                            $(".basicText").text("Allows posting of only " + membershipPlan.max_properties + " property");
                            $(".basic-plan-text").text("Basic plan allows posting of only " + membershipPlan.max_properties + " property, free of charge.");

                            $(".basic-style1 ul").empty();
                            $.each(membershipPlan.features.split(','), function(index, feature) {
                                $(".basic-style1 ul").append('<li><i class="far fa-check text-white bgc-dark fz15"></i>' + feature + '</li>');
                            });
                            $("#successMessageBasic").text("Plan updated successfully!");
                            $(".success-msg-basic").show();

                            setTimeout(function() {
                                $('.success-msg-basic').hide();
                            }, 8000);


                        } else {
                            showAlert("Failed to update plan. Please try again later.", "error");
                        }

                    },
                    error: function(xhr, status, error) {

                        showAlert("Failed to update plan due to an unexpected error. Please try again later.", "error");

                    }
                });


            });

            $('.delete-feature').on('click', function() {

                var featureElement = $(this).siblings('.feature-details');
                var featureValue = featureElement.text();

                // var confirmDelete = confirm("Are you sure you want to delete this feature: " + featureValue + "?");

                Swal.fire({
                    title: "Are you sure?",
                    text: "You are about to delete this feature: " + featureValue,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                    customClass: {
                        popup: 'custom-swal-popup',
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{route('delete.basic.feature')}}",
                            type: 'POST',
                            data: {
                                feature: featureValue,
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {

                                $("#successMessageBasic").text("Feature removed successfully !");
                                $(".success-msg-basic").show();
                                featureElement.parent('.feature-preview').remove();
                                $(".basic-style1 ul li:contains(" + featureValue + ")").remove();

                                setTimeout(function() {
                                    $('.success-msg-basic').hide();
                                }, 8000);

                            },
                            error: function(xhr, status, error) {
                                console.log("Ajax Error", error);
                            }
                        });
                    }
                });


            });




        });
    </script>

    <!-- standard Plans   -->

    <script>
        $(document).ready(function() {
            $('#standard-saveChangesBtn').click(function() {
                var price = $('#standardPrice').val();
                var propertyListing = $('#maxFreeListings-standard').val();
                var Standardfeatures = [];
                $('.standard-preview-features .feature-preview .feature-details').each(function() {
                    Standardfeatures.push($(this).text());
                });
                // console.log(Standardfeatures);

                $.ajax({
                    url: "{{route('standard.plan')}}",
                    method: "POST",
                    data: {
                        Standardfeatures: Standardfeatures,
                        propertyListing: propertyListing,
                        price: price,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            var membershipPlan = response.membershipPlan;
                            $(".standard-title").text("Standard");
                            $(".standardText2").text(membershipPlan.price);
                            // $(".standardText1").text(membershipPlan.price);
                            $(".standardText").text("Allows posting of up to " + membershipPlan.max_properties + " properties.");
                            $(".standard-plan-text").text("Standard plan allows posting of up to " + membershipPlan.max_properties + " properties .");

                            $(".standard-style1 ul").empty();
                            $.each(membershipPlan.features.split(','), function(index, feature) {
                                $(".standard-style1 ul").append('<li><i class="far fa-check text-white bgc-dark fz15"></i>' + feature + '</li>');
                            });

                            $("#successMessageStandard").text("Plan updated successfully!");
                            $(".success-msg-standard").show();

                            setTimeout(function() {
                                $('.success-msg-standard').hide();
                            }, 8000);

                        } else {
                            showAlert("Failed to update plan. Please try again later.", "error");

                        }
                    },
                    error: function(xhr, status, error) {

                        showAlert("Failed to update plan due to an unexpected error. Please try again later.", "error");

                    }

                });
            });

            $('.delete-standard').on("click", function() {

                var featureElement = $(this).siblings('.feature-details');
                var featureValue = featureElement.text();


                Swal.fire({
                    title: "Are you sure?",
                    text: "You are about to delete this feature: " + featureValue,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                    customClass: {
                        popup: 'custom-swal-popup',
                    }

                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{route('delete.standard')}}",
                            method: "POST",
                            data: {
                                feature: featureValue,
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                //console.log(response);
                                if (response.success) {
                                    $("#successMessageStandard").text("Feature deleted successfully !");
                                    $(".success-msg-standard").show();

                                    featureElement.parent('.feature-preview').remove();
                                    $(".standard-style1 ul li:contains(" + featureValue + ")").remove();

                                    setTimeout(function() {
                                        $('.success-msg-standard').hide();
                                    }, 8000);

                                }
                            },
                            error: function(xhr, status, error) {
                                console.log("Ajax Error", error);
                            }
                        });
                    }
                });

            });
        });
    </script>



    <!-- Premium Plan -->

    <script>
        $(document).ready(function() {
            $('#premium-saveChangesBtn').click(function() {
                var price = $("#premiumPrice").val();
                var propertyListing = $("#premiumListings").val();
                var premiumFeatures = [];
                $('.premium-preview-features .feature-preview .feature-details').each(function() {
                    premiumFeatures.push($(this).text());
                });


                $.ajax({
                    url: "{{ route('premium.plan') }}",
                    method: "POST",
                    data: {
                        propertyListing: propertyListing,
                        premiumFeatures: premiumFeatures,
                        price: price,
                        "_token": "{{ csrf_token()}}"
                    },
                    success: function(response) {
                        console.log(response);

                        if (response.success) {
                            var membershipPlan = response.membershipPlan;
                            $(".premium-title").text("Premium");
                            $(".premiumText2").text(membershipPlan.price);
                            // $(".premiumText1").text(membershipPlan.price);

                            $(".premium-style1 ul").empty();
                            $.each(membershipPlan.features.split(','), function(index, feature) {
                                $(".premium-style1 ul").append('<li><i class="far fa-check text-white bgc-dark fz15"></i>' + feature + '</li>');
                            });




                            $("#successMessagePremium").text("Plan updated successfully!");
                            $(".success-msg-premium").show();

                            setTimeout(function() {
                                $('.success-msg-premium').hide();
                            }, 8000);

                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Ajax Error: ", error);
                    }
                })
            });

            $('.delete-premium').on("click", function() {

                var featureElement = $(this).siblings('.feature-details');
                var featureValue = featureElement.text();
                //  var confirmDelete = confirm("Are you sure you want to delete this feature: " + featureValue + " ? ");
                Swal.fire({
                    title: "Are you sure?",
                    text: "You are about to delete this feature: " + featureValue,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                    customClass: {
                        popup: 'custom-swal-popup',
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{route('delete.premium')}}",
                            method: "POST",
                            data: {
                                featureValue: featureValue,
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                console.log(response);

                                if (response.success) {

                                    $("#successMessagePremium").text("Feature deleted successfully !");
                                    $(".success-msg-premium").show();

                                    featureElement.parent('.feature-preview').remove();
                                    $(".premium-style1 ul li:contains(" + featureValue + ")").remove();
                                    setTimeout(function() {
                                        $('.success-msg-premium').hide();
                                    }, 8000);

                                }
                            },
                            error: function(xhr, status, error) {
                                console.log("Ajax Error:", error);
                            }
                        });
                    }
                });

            });
        });
    </script>