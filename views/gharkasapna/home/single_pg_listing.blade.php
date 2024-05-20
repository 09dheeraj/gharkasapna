@extends('gharkasapna.layouts.app')
@section('content')

@php

function formatRent($rent)
{
if (!is_numeric($rent)) {
return 'N/A'; // or any other appropriate value
}

if ($rent >= 10000000) {
return '₹' . number_format($rent / 10000000, 2) . ' Cr';
} elseif ($rent >= 100000) {
return '₹' . number_format($rent / 100000, 2) . ' Lac';
} else {
return '₹' . number_format($rent / 1000, 2) . ' K';
}
}

@endphp

<style>
    .popup {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .popup-content {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        width: 300px;
        padding: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    /* Close Button */
    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }


    /* Adjustments as needed */
</style>


<div id="loginPopup" class="popup">
    <div class="popup-content">
        <span class="close-btn" onclick="closePopup()">&times;</span>
        <p>Please login first.</p>
    </div>
</div>

<!-- Property All Lists -->
<section class="pt60 pb90 bgc-f7">
    <div class="container">
        <div class="row wow fadeInUp" data-wow-delay="100ms">
            <span class="text-success" id="like-mesg"></span>
            <div class="col-lg-8">
                <div class="single-property-content mb30-md">
                    <h2 class="sp-lg-title">{{ucwords($propertiesData->pg_name)}}</h2>
                    <div class="pd-meta mb15 d-md-flex align-items-center">
                        <p class="text fz15 mb-0 bdrr1 pr10 bdrrn-sm">{{ $propertiesData->project_society }}, {{ $propertiesData->locality }}, {{ $propertiesData->city }}</p>
                        <?php $string_without_underscores = str_replace("_", " ", $propertiesData->room_type); ?>
                        <a class="ff-heading text-thm fz15 bdrr1 pr10 ml0-sm ml10 bdrrn-sm" href=""><i class="fas fa-circle fz10 pe-2"></i>{{ucfirst($string_without_underscores)}} For</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-property-content">
                    <div class="property-action text-lg-end">
                        <div class="d-flex mb20 mb10-md align-items-center justify-content-lg-end">
                            @if (session()->get('id'))
                            @if(!empty($likeproperty))
                            <a class="icon mr10" id="favourite-property" data-regid="{{$propertiesData->vendor_id}}" data-propertyid="{{$propertiesData->id}}"><i class="fa fa-heart"></i></a>
                            @else
                            <a class="icon mr10" id="favourite-property" data-regid="{{$propertiesData->vendor_id}}" data-propertyid="{{$propertiesData->id}}"><span class="flaticon-like"></span></a>
                            @endif
                            <a class="icon mr10" href=""><span class="flaticon-share-1"></span></a>
                            @else
                            <a class="icon mr10" onclick="showLoginPopup()"><span class="flaticon-like"></span></a>
                            <a class="icon mr10" onclick="showLoginPopup()"><span class="flaticon-share-1"></span></a>
                            @endif
                        </div>

                        <h3 class="price mb-0"><?php echo formatRent($propertiesData->rent); ?></h3>

                    </div>
                </div>
            </div>
        </div>


        <?php
        $propertiesImages = explode(',', $propertiesData->images);
        ?>

        @if(isset($propertiesData->images) && !empty($propertiesData->images))

        <div class="row mt30 wow fadeInUp" data-wow-delay="300ms">
            <div class="col-sm-9">
                <div class="sp-img-content at-sp-v2 mb15-md">
                    <?php $image = explode(',', $propertiesData->images); ?>
                    @foreach($image as $img)
                    <a class="popup-img preview-img-1 sp-img" href="{{ asset('public/assets/property-images/' . $img) }}">
                        <img class="w-100" src="{{ asset('public/assets/property-images/' . $img) }}" alt="8.jpg">
                    </a>
                    @break
                    @endforeach
                </div>
            </div>
            <div class="col-sm-3">
                <div class="row">
                    <?php
                    $propertiesImages = explode(',', $propertiesData->images);
                    $firstTwoImages = array_slice($propertiesImages, 0, 2);
                    $remainingImages = array_slice($propertiesImages, 2);
                    ?>

                    @foreach($firstTwoImages as $img)
                    <div class="col-sm-12 ps-lg-0">
                        <div class="sp-img-content">
                            <a class="popup-img preview-img-3 sp-img mb10" style="height: 278px;" href="{{ asset('public/assets/property-images/' . $img) }}">
                                <img class="w-100 mb-10" src="{{ asset('public/assets/property-images/' . $img) }}" alt="3.jpg">
                            </a>
                        </div>
                    </div>
                    @endforeach


                    <div class="row" id="remainingImages" style="display: none;">
                        @foreach($remainingImages as $img)
                        <div class="col-sm-12 ps-lg-0">
                            <div class="sp-img-content">
                                <a class="popup-img preview-img-3 sp-img mb10" href="{{ asset('public/assets/property-images/' . $img) }}">
                                    <img class="w-100" src="{{ asset('public/assets/property-images/' . $img) }}" alt="3.jpg">
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="#" id="showAllPhotos" class="all-tag popup-img">See All {{ count($propertiesImages) }} Photos</a>

                </div>
            </div>
        </div>

        @else
        <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
            <div class="row">
                <div class="col-md-12">
                    <h4>No Images available for this property yet.</h4>
                </div>
            </div>
        </div>
        @endif



        <div class="row wrap wow fadeInUp" data-wow-delay="500ms">
            <div class="col-lg-8">
                <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                    <h4 class="title fz17 mb30">Overview</h4>
                    <div class="row">
                        <div class="col-sm-6 col-lg-4">
                            <div class="overview-element mb25 d-flex align-items-center">
                                <span class="icon flaticon-bed"></span>
                                <div class="ml15">
                                    <h6 class="mb-0">Meal Types</h6>
                                    <p class="text mb-0 fz15">@if(!empty($propertiesData->meal_offerings)){{ ucwords($propertiesData->meal_offerings) }}@else Without Food @endif</p>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-sm-6 col-lg-4">
                            <div class="overview-element mb25 d-flex align-items-center">
                                <span class="icon flaticon-shower"></span>
                                <div class="ml15">
                                    <h6 class="mb-0">Bath</h6>
                                    <p class="text mb-0 fz15">2</p>
                                </div>
                            </div>
                        </div> -->
                        @if(!empty($meal_without_underscores))
                        <div class="col-sm-6 col-md-4 col-xl-2">
                            <div class="overview-element mb25 d-flex align-items-center">
                                <span class="icon flaticon-shower"></span>

                                <div class="ml15">
                                    <h6 class="mb-0">Meal Offerings</h6>
                                    <?php
                                    $meal_offerings_array = explode(",", $propertiesData->meal_speciality);
                                    $meal_offerings_formatted = implode(", ", array_map('ucwords', $meal_offerings_array));
                                    $meal_without_underscores = str_replace("_", " ", $meal_offerings_formatted);

                                    ?>

                                    <p class="text mb-0 fz15">{{ $meal_without_underscores }}</p>
                                </div>


                            </div>
                        </div>
                        @else

                        @endif
                        <div class="col-sm-6 col-md-4 col-xl-2">
                            <div class="overview-element mb25 d-flex align-items-center">
                                <span class="icon flaticon-event"></span>
                                <div class="ml15">
                                    <h6 class="mb-0">Total Beds</h6>
                                    <p class="text mb-0 fz15">{{$propertiesData->total_property}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-xl-2">
                            <div class="overview-element mb25 d-flex align-items-center">
                                <span class="icon flaticon-garage"></span>
                                <div class="ml15">
                                    <h6 class="mb-0">Notice Period</h6>
                                    <p class="text mb-0 fz15">{{$propertiesData->notice_period}} Days</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-xl-2">
                            <div class="overview-element mb25 d-flex align-items-center">
                                <span class="icon flaticon-expand"></span>
                                <div class="ml15">
                                    <h6 class="mb-0">Lock In Period</h6>
                                    <p class="text mb-0 fz15">{{$propertiesData->lock_in_period}} Days</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-xl-2">
                            <div class="overview-element mb25 d-flex align-items-center">
                                <span class="icon flaticon-home-1"></span>
                                <div class="ml15">
                                    <h6 class="mb-0">PG For</h6>
                                    <p class="text mb-0 fz15">{{ucfirst($propertiesData->pg_for)}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                    <h4 class="title fz17 mb30">Property Description</h4>
                    <p class="text mb10">This 3-bed with a loft, 2-bath home in the gated community of The Hideout has it all. From the open floor plan to the abundance of light from the windows, this home is perfect for entertaining. The living room and dining room have vaulted ceilings and a beautiful fireplace. You will love spending time on the deck taking in the beautiful views. In the kitchen, you'll find stainless steel appliances and a tile backsplash, as well as a breakfast bar.</p>
                    <div class="agent-single-accordion">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body p-0">
                                        <p class="text">Placeholder content for this accordion, which is intended to demonstrate the class. This is the first item's accordion body you get groundbreaking performance and amazing battery life. Add to that a stunning Liquid Retina XDR display, the best camera and audio ever in a Mac notebook, and all the ports you need.</p>
                                    </div>
                                </div>
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button p-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">Show more</button>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <h4 class="title fz17 mb30 mt50">Property Details</h4>
                    <div class="row">
                        <div class="col-md-6 col-xl-4">
                            <div class="d-flex justify-content-between">
                                <div class="pd-list">
                                    <p class="fw600 mb10 ff-heading dark-color">Total Beds</p>
                                    <p class="fw600 mb10 ff-heading dark-color">Price</p>
                                    <p class="fw600 mb10 ff-heading dark-color">Notice Period</p>
                                    <p class="fw600 mb10 ff-heading dark-color">Rooms Offered</p>
                                </div>
                                <div class="pd-list">
                                    <p class="text mb10">{{$propertiesData->total_property}}</p>
                                    <p class="text mb10">{{formatRent($propertiesData->rent)}}/ bed</p>
                                    <p class="text mb10">{{$propertiesData->notice_period}} Days</p>
                                    <?php $string_without_underscores = str_replace("_", " ", $propertiesData->room_type); ?>
                                    <p class="text mb10">{{$string_without_underscores}}</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4 offset-xl-2">
                            <div class="d-flex justify-content-between">
                                <div class="pd-list">
                                    <p class="fw600 mb10 ff-heading dark-color">PG For</p>
                                    <p class="fw600 mb10 ff-heading dark-color">Meal Offerings</p>
                                    <p class="fw600 mb10 ff-heading dark-color">Ownership</p>
                                    <p class="fw600 mb10 ff-heading dark-color">Bath Style</p>
                                </div>
                                <div class="pd-list">
                                    <p class="text mb10">{{ucfirst($propertiesData->pg_for)}}</p>

                                    <p class="text mb10">@if(!empty($propertiesData->meal_offerings)){{ ucwords($propertiesData->meal_offerings) }}@else Without Food @endif</p>

                                    <p class="text mb10">{{ucfirst($propertiesData->ownership)}}</p>
                                    <?php
                                    $bathStyle = explode(",", $propertiesData->bathroom_style);
                                    $bathStyleCapitalized = array_map('ucfirst', $bathStyle);

                                    ?>
                                    <p class="text mb10">{{ implode(", ", $bathStyleCapitalized) }}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                    <h4 class="title fz17 mb30 mt30">Address</h4>
                    <div class="row">
                        <div class="col-md-6 col-xl-4">
                            <div class="d-flex justify-content-between">
                                <div class="pd-list">
                                    <p class="fw600 mb10 ff-heading dark-color">{{ $propertiesData->project_society }}, {{ $propertiesData->locality }}, {{ $propertiesData->city }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <iframe class="position-relative bdrs12 mt30 h250" loading="lazy" src="https://maps.google.com/maps?q=London%20Eye%2C%20London%2C%20United%20Kingdom&amp;t=m&amp;z=14&amp;output=embed&amp;iwloc=near" title="London Eye, London, United Kingdom" aria-label="London Eye, London, United Kingdom"></iframe>
                        </div>
                    </div>
                </div>
                @if(!empty($propertiesData->amenites))
                <?php $Features_Amenities = explode(',', $propertiesData->amenites); ?>
                <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                    <h4 class="title fz17 mb30">Features & Amenities</h4>
                    <div class="row">
                        @foreach($Features_Amenities as $Features)
                        @php $formattedFeature = str_replace('_', ' ', $Features); @endphp
                        <div class="col-sm-6 col-md-4">
                            <div class="pd-list mb10-sm">
                                <p class="text mb10"><i class="fas fa-circle fz6 align-middle pe-2"></i>{{$formattedFeature}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                @endif

                @if(!empty($propertiesData->videos))
                <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                    <h4 class="title fz17 mb30">Video</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="property_video bdrs12 w-100">
                                <a class="video_popup_btn mx-auto popup-img popup-youtube" href="https://www.youtube.com/watch?v=oqNZOOWF8qM"><span class="flaticon-play"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                @endif

                @if(!empty($reviewData) && count($reviewData) > 0)
                <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product_single_content">
                                <div class="mbp_pagination_comments">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="total_review d-flex align-items-center justify-content-between mb20">
                                                <h6 class="fz17 mb15"><i class="fas fa-star fz12 pe-2"></i>{{ count($reviewData) }} reviews</h6>
                                            </div>
                                        </div>
                                        @php $reviewCount = 0; @endphp

                                        @foreach($reviewData as $review)
                                        @php $reviewCount++; @endphp

                                        <div class="col-md-12" @if($reviewCount> 2) style="display: none;" @endif>
                                            <div class="mbp_first position-relative d-flex align-items-center justify-content-start mb30-sm">
                                                <img src="{{ asset('public/assets/profile-img/' . $review->userData->image) }}" class="mr-3" alt="comments-2.png" style="height: 60px;">
                                                <div class="ml20">
                                                    <h6 class="mt-0 mb-0">{{$review->userData->name}}</h6>
                                                    <div><span class="fz14">{{$review->created_at->format('F j, Y')}}</span>
                                                        <div class="blog-single-review">
                                                            <ul class="mb0 ps-0">
                                                                @php $rating = $review->review; @endphp
                                                                @for ($j = 1; $j <= 5; $j++) @if ($j <=$rating) <li class="list-inline-item me-0"><a href="#"><i class="fas fa-star review-color2 fz10"></i></a></li>
                                                                    @else
                                                                    <li class="list-inline-item me-0"><a href="#"><i class="far fa-star review-color2 fz10"></i></a></li>
                                                                    @endif
                                                                    @endfor
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text mt20 mb20">{{ ucwords($review->body) }}</p>

                                            @php
                                            $hasReplies = $reviewReply->where('review_id', $review->id)->isNotEmpty();
                                            @endphp

                                            <div class="review_cansel_btns d-flex bdrb1 pb30">
                                                @if($hasReplies)
                                                <div class="reply-section mt-3">
                                                    <h6 class="fw-bold"><i class="fas fa-reply"></i>Reply</h6>

                                                    @foreach($reviewReply as $reply)
                                                    @if($reply->review_id == $review->id)
                                                    <div class="reply">
                                                        <p class="mb-0">{{ $reply->body }}</p>
                                                        <p class="text-muted small">{{ $reply->created_at->format('F j, Y') }}</p>
                                                    </div>
                                                    @endif
                                                    @endforeach

                                                </div>
                                                @endif
                                            </div>

                                        </div>

                                        @endforeach
                                        <div class="col-md-12">
                                            <div class="position-relative pt30">
                                                @if (count($reviewData) > 2)
                                                <!-- <button id="showAllReviewsBtn" class="ud-btn btn-white2">Show all {{ count($reviewData) - 2 }} reviews<i class="fal fa-arrow-right-long"></i></button> -->
                                                <a href="javascript:void(0);" class="ud-btn btn-white2 show-all-reviews">Show all {{ count($reviewData) - 2 }} reviews<i class="fal fa-arrow-right-long"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @else
                <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>No reviews available for this property yet.</h4>
                        </div>
                    </div>
                </div>
                @endif

                @if(session()->get('id') && !$userHasReviewed)

                <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                    <h4 class="title fz17 mb30">Leave A Review</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bsp_reveiw_wrt">
                                <form class="comments_form" action="{{route('submit.review')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="widget-wrapper sideborder-dropdown psp-review mb-4">
                                                <label class="fw600 ff-heading mb-2">Rating</label>
                                                <div class="form-style2 input-group">
                                                    <select class="selectpicker" data-live-search="true" data-width="100%" name="rating" required>
                                                        <option value="" disabled selected>Select</option>
                                                        <option value="5">Five Star</option>
                                                        <option value="4">Four Star</option>
                                                        <option value="3">Three Star</option>
                                                        <option value="2">Two Star</option>
                                                        <option value="1">One Star</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="fw600 ff-heading mb-2">Review</label>
                                                <input type="hidden" name="vendor_id" value="{{$propertiesData->vendor_id}}">
                                                <input type="hidden" name="property_id" value="{{$propertiesData->id}}">
                                                <textarea class="pt15" rows="6" placeholder="Write a Review" name="review" required></textarea>
                                            </div>
                                            <button type="submit" class="ud-btn btn-white2">Submit Review<i class="fal fa-arrow-right-long"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                @elseif(session()->has('id') && $userHasReviewed)
                <h4>You have already reviewed this property.</h4>
                @else

                <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                    <h4 class="title fz17 mb30">Leave A Review</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bsp_reveiw_wrt">
                                <form class="comments_form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="widget-wrapper sideborder-dropdown psp-review mb-4">
                                                <label class="fw600 ff-heading mb-2">Rating</label>
                                                <div class="form-style2 input-group">
                                                    <select class="selectpicker" data-live-search="true" data-width="100%" onclick="showLoginPopup()">
                                                        <option>Select</option>
                                                        <option data-tokens="Five Star">Five Star</option>
                                                        <option data-tokens="Four Star">Four Star</option>
                                                        <option data-tokens="Three Star">Three Star</option>
                                                        <option data-tokens="Two Star">Two Star</option>
                                                        <option data-tokens="One Star">One Star</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="fw600 ff-heading mb-2">Review</label>
                                                <textarea class="pt15" rows="6" placeholder="Write a Review" onclick="showLoginPopup()"></textarea>
                                            </div>
                                            <a onclick="showLoginPopup()" class="ud-btn btn-white2">Submit Review<i class="fal fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>

            @unless(session()->get('id') == $propertiesData->vendor_id)
            @if(session()->get('id'))
            <div class="col-lg-4">
                <div class="column">
                    <div class="default-box-shadow1 bdrs12 bdr1 p30 mb30-md bgc-white position-relative">
                        <h6 class="title fz17 mb30">Contact Seller</h6>
                        <span class="text-success" id="request-msg"></span>
                        <span class="text-success" id="chat-status-text"></span>
                        <div class="agent-single d-sm-flex align-items-center pb25">
                            <div class="single-img mb30-sm">
                                <img class="w90" src="{{ asset('public/assets/profile-img/'. $propertiesData->vendor_data->image)}}" alt="">
                            </div>
                            <div class="single-contant ml20 ml0-xs">
                                <h6 class="title mb-1">{{ $propertiesData->vendor_data->name }}</h6>
                                <div class="agent-meta mb10 d-md-flex align-items-center">
                                    <?php $displayPhoneNumber = substr($propertiesData->vendor_data->phone, -5); ?>

                                    <a class="text fz15" href=""><i class="flaticon-call pe-1"></i>.......{{$displayPhoneNumber}}</a>
                                </div>
                            </div>
                        </div>
                        <form class="form-style1">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb20">
                                        <label class="heading-color ff-heading fw600 mb10">Hello, {{ session()->get('name') }}!</label>
                                        <p class="mb20">We're glad to see you here. Click below to send your request.</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-grid">
                                        @if(!$userHasexistsRequest)
                                        @if($userHasRequest)
                                        @if($userHasRequest->status == 'pending')

                                        <a class="ud-btn btn-thm" id="reject-request" user-id="{{session()->get('id')}}" vendor-id="{{$propertiesData->vendor_id}}" data-propertyid="{{$propertiesData->id}}">Reject Request <i class="fal fa-arrow-right-long"></i></a>
                                        <!-- <p id="chat-status-text" style="display: none;"></p> -->
                                        @elseif($userHasRequest->status == 'accepted')
                                        <!-- @php  @endphp -->
                                        <a class="ud-btn btn-thm" href="{{route('user.msg')}}" id="chat-now">Chat Now <i class="fal fa-arrow-right-long"></i></a>
                                        @endif
                                        @else
                                        <a class="ud-btn btn-thm" id="send-request" user-id="{{session()->get('id')}}" vendor-id="{{$propertiesData->vendor_id}}" data-propertyid="{{$propertiesData->id}}">Send Request<i class="fal fa-arrow-right-long"></i></a>
                                        @endif

                                        @else
                                        <h6 class="title mb-1">You've already sent a request for this Seller</h6>
                                        <a class="ud-btn btn-thm" id="reject-request" user-id="{{session()->get('id')}}" vendor-id="{{$propertiesData->vendor_id}}" data-propertyid="{{$propertiesData->id}}">Reject Request <i class="fal fa-arrow-right-long"></i></a>
                                        @endif

                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-4">
                <div class="column">
                    <div class="default-box-shadow1 bdrs12 bdr1 p30 mb30-md bgc-white position-relative">
                        <h6 class="title fz17 mb30">Contact Seller</h6>
                        <div class="agent-single d-sm-flex align-items-center pb25">
                            <div class="single-img mb30-sm">
                                <img class="w90" src="{{ asset('public/assets/profile-img/'. $propertiesData->vendor_data->image)}}" alt="">
                            </div>
                            <div class="single-contant ml20 ml0-xs">
                                <h6 class="title mb-1">{{ $propertiesData->vendor_data->name }}</h6>
                                <div class="agent-meta mb10 d-md-flex align-items-center">
                                    <?php $displayPhoneNumber = substr($propertiesData->vendor_data->phone, -5); ?>

                                    <a class="text fz15" href=""><i class="flaticon-call pe-1"></i>.......{{$displayPhoneNumber}}</a>
                                </div>
                            </div>
                        </div>
                        <form class="form-style1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-grid">
                                        <a class="ud-btn btn-thm" onclick="showLoginPopup()">Send Request<i class="fal fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            @endunless
        </div>
        @if(!empty($nearbyhomes) && count($nearbyhomes) > 0)
        <div class="row mt30 wow fadeInUp" data-wow-delay="700ms">
            <div class="col-lg-9">
                <div class="main-title2">
                    <h2 class="title">Nearby Similar Homes</h2>
                    <p class="paragraph">Aliquam lacinia diam quis lacus euismod</p>
                </div>
            </div>
        </div>
        <div class="row wow fadeInUp" data-wow-delay="900ms">
            <div class="col-lg-12">
                <div class="property-city-slider navi_pagi_top_right slider-dib-sm slider-3-grid owl-theme owl-carousel">
                    @foreach($nearbyhomes as $home)
                    <div class="item">
                        <div class="listing-style1">
                            <div class="list-thumb">
                                <?php $image = explode(',', $home->images); ?>
                                @foreach($image as $img)
                                <img class="w-100" src="{{ asset('public/assets/property-images/' . $img) }}" alt="" style="height:250px;">
                                @break
                                @endforeach
                                <div class="list-tag fz12"><span class="flaticon-electricity me-2"></span>FEATURED</div>
                                <div class="list-price"><?php echo formatRent($home->rent); ?> / <span>mo</span></div>
                            </div>


                            <div class="list-content">
                                <h6 class="list-title"><a href="{{route('single.pg.listing', ['name' => Str::slug($home->pg_name)])}}">{{ ucwords($home->pg_name) }}</a></h6>

                                <p class="list-text">{{ $home->project_society }}, {{ $home->locality }}, {{ $home->city }}</p>
                                <hr class="mt-2 mb-2">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('send-request').addEventListener('click', function() {
            var userID = this.getAttribute('user-id');
            var vendorID = this.getAttribute('vendor-id');
            var propertyID = this.getAttribute('data-propertyid');



            $.ajax({
                url: "{{route('user.send.pg.request')}}",
                method: "POST",
                data: {
                    userID: userID,
                    vendorID: vendorID,
                    propertyID: propertyID,
                    "_token": "{{csrf_token()}}"
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: "Send Request",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "OK"
                        });

                        setTimeout(function() {
                            location.reload();
                        }, 4000);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Ajax Error', error);

                }
            });

        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#reject-request').on('click', function() {
            var userID = this.getAttribute('user-id');
            var vendorID = this.getAttribute('vendor-id');
            var propertyID = this.getAttribute('data-propertyid');

            // console.log('USER ID: ', userID);
            // console.log('VENDOR ID: ', vendorID);
            // console.log('PROPERTY ID: ', propertyID);
            Swal.fire({
                title: "Reject Request",
                text: "Are you sure you want to reject this request?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Reject",
                cancelButtonText: "No, cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{route('user.reject.PGrequest')}}",
                        method: "POST",
                        data: {
                            vendorID: vendorID,
                            propertyID: propertyID,
                            userID: userID,
                            "_token": "{{csrf_token()}}"
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: "Reject Request",
                                    text: response.message,
                                    icon: "success",
                                    confirmButtonText: "OK"
                                });

                                setTimeout(function() {
                                    location.reload();
                                }, 4000);

                            } else {
                                Swal.fire({
                                    title: "Reject Request",
                                    text: response.message,
                                    icon: "error",
                                    confirmButtonText: "OK"
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log("Error :", error);
                        }
                    });
                }
            })
        });
    });
</script>

<script>
    document.getElementById('showAllPhotos').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('remainingImages').style.display = 'block';
        this.style.display = 'none';
    });
</script>

<script>
    function showLoginPopup() {
        var popup = document.getElementById("loginPopup");
        popup.style.display = "block";
    }

    function closePopup() {
        var popup = document.getElementById("loginPopup");
        popup.style.display = "none";
    }
</script>


<script>
    $(document).ready(function() {
        $('#favourite-property').click(function() {
            var vendorID = $(this).data('regid');
            var propertyId = $(this).data('propertyid');



            $.ajax({
                type: "POST",
                url: "{{route('fav.property.pg')}}",
                data: {
                    vendorID: vendorID,
                    propertyId: propertyId,
                    "_token": "{{ csrf_token() }}",
                },

                success: function(response) {
                    console.log(response);
                    if (response.message == 'success') {
                        $('#like-mesg').text('Property added to favorites').fadeIn();
                    } else if (response.message == 'removed') {
                        $('#like-mesg').text('Property removed from favorites').fadeIn();
                    }

                    setTimeout(function() {
                        $('#like-mesg').fadeOut();
                        location.reload();
                    }, 1000);

                },
                error: function(xhr, error, status) {
                    console.log("Ajax Error", error);
                }
            });
        });
    });
</script>


@endsection