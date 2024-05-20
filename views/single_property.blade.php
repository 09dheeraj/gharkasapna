@extends('gharkasapna.layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


@php

function formatYearBuilt($age) {

$parts = explode('_', $age);

if (count($parts) === 2) {
// Display as a range
return $parts[0] . ' - ' . $parts[1] . '';
} else {
// Display as a single year
return $age . ' years';
}
}

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

function format_price($price)
{
if ($price >= 10000000) {
return round($price / 10000000, 2) . ' Cr';
} elseif ($price >= 100000) {
return round($price / 100000, 2) . ' Lac';
} elseif ($price >= 1000) {
return round($price / 1000, 2) . ' K';
} else {
return $price;
}
}



$propertiesImages = explode(',', $properties->images);
$firstTwoImages = array_slice($propertiesImages, 0, 2);
$remainingImages = array_slice($propertiesImages, 2);

if ($properties->categories_type == 'plot' && is_numeric($properties->plot_area)) {
$price_per_sqft = $properties->cost / $properties->plot_area;
} elseif ($properties->looking_to == 'rent' && is_numeric($properties->rent) && is_numeric($properties->built_up_area)) {
$price_per_sqft = $properties->rent / $properties->built_up_area;
} elseif (is_numeric($properties->cost) && is_numeric($properties->built_up_area)) {
$price_per_sqft = $properties->cost / $properties->built_up_area;
} else {
$price_per_sqft = 0;
}


$meal_offerings_array = explode(",", $properties->meal_speciality);
$meal_offerings_formatted = implode(", ", array_map('ucwords', $meal_offerings_array));
$meal_without_underscores = str_replace("_", " ", $meal_offerings_formatted);

@endphp
<div class="body_content">
    <!-- Property All Lists -->
    <section class="pt60 pb0 bgc-white">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay="100ms">
                <div class="col-lg-8">
                    <div class="single-property-content mb30-md">
                        <h2 class="sp-lg-title">{{ Str::words($properties->looking_to == 'pg' ? $properties->pg_name : $properties->property_name, 6, '...') }}</h2>
                        <div class="pd-meta mb15 d-md-flex align-items-center">
                            <p class="text fz15 mb-0 pr10 bdrrn-sm">{{ $properties->project_society }}, {{ $properties->locality }}, {{ $properties->city }}</p>
                        </div>
                        <div class="property-meta d-flex align-items-center">
                            <a class="ff-heading text-thm fz15 bdrr1 pr10 bdrrn-sm" href=""><i class="fas fa-circle fz10 pe-2"></i>For {{$properties->looking_to}}</a>
                            @if($properties->looking_to == 'pg')
                            <a class="ff-heading bdrr1 fz15 pr10 ml10 ml0-sm bdrrn-sm" href=""><i class="far fa-clock pe-2"></i>{{ucfirst($properties->room_type)}}</a>
                            @elseif(in_array($properties->categories_type, ['apartment', 'independent floor', 'independent house']))
                            <a class="ff-heading bdrr1 fz15 pr10 ml10 ml0-sm bdrrn-sm"><i class="far fa-clock pe-2"></i>{{ formatYearBuilt($properties->age_of_property) }} ago</a>
                            @elseif(in_array($properties->categories_type, ['retail shop', 'showroom', 'warehouse', 'office']))
                            <a class="ff-heading bdrr1 fz15 pr10 ml10 ml0-sm bdrrn-sm"><i class="far fa-clock pe-2"></i>{{ $properties->built_up_area }} sqft</a>
                            @elseif($properties->categories_type == 'plot')
                            <a class="ff-heading bdrr1 fz15 pr10 ml10 ml0-sm bdrrn-sm" href=""><i class="far fa-clock pe-2"></i>{{$properties->plot_area}} {{$properties->carpet_area}} years ago</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-property-content">
                        <div class="property-action text-lg-end">
                            <div class="d-flex mb20 mb10-md align-items-center justify-content-lg-end">
                                @if(session()->get('id'))
                                @if(!empty($likeproperty))
                                <a class="icon mr10" id="favourite-property" data-regid="{{$properties->vendor_id}}" data-propertyid="{{$properties->id}}"><i class="fa fa-heart"></i></a>
                                @else
                                <a class="icon mr10" id="favourite-property" data-regid="{{$properties->vendor_id}}" data-propertyid="{{$properties->id}}"><span class="flaticon-like"></span></a>
                                @endif
                                <a class="icon mr10" href=""><span class="flaticon-share-1"></span></a>
                                @else
                                <a class="icon mr10" onclick="showLoginPopup()"><span class="flaticon-like"></span></a>
                                <a class="icon mr10" onclick="showLoginPopup()"><span class="flaticon-share-1"></span></a>
                                @endif
                            </div>

                            <h3 class="price mb-0">{{$properties->looking_to == 'sell' ? formatRent($properties->cost) : formatRent($properties->rent)}}</h3>
                            <!-- <p class="text space fz15">$2,300/sq ft</p> -->
                        </div>
                    </div>
                </div>
            </div>

            @if(isset($properties->images) && !empty($properties->images))
            <div class="row mt30 wow fadeInUp" data-wow-delay="300ms">
                <div class="col-sm-9">
                    <div class="sp-img-content at-sp-v2 mb15-md">
                        @php $image = explode(',', $properties->images); @endphp
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
                                    <a class="popup-img preview-img-3 sp-img mb10" style="height: 278px;" href="{{ asset('public/assets/property-images/' . $img) }}">
                                        <img class="w-100" src="{{ asset('public/assets/property-images/' . $img) }}" alt="3.jpg">
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <a href="#" id="showAllPhotos" class="all-tag popup-img">See All {{ count($propertiesImages) }} Photos</a>
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

            @if($properties->categories_type == 'plot')
            <div class="row mt30">
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-bed"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Project Area</h6>
                            <p class="text mb-0 fz15">{{$properties->plot_area}} {{$properties->carpet_area}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-shower"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Sizes</h6>
                            <p class="text mb-0 fz15">{{$properties->area_width}} {{$properties->carpet_area}} - {{$properties->area_height}} {{$properties->carpet_area}}</p>
                        </div>
                    </div>
                </div>
                @if(!empty($price_per_sqft))
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-event"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Avg. Price</h6>
                            <p class="text mb-0 fz15">{{format_price($price_per_sqft)}}</p>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-expand"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Possession Starts</h6>
                            @php $date = new DateTime($properties->created_at); @endphp
                            <p class="text mb-0 fz15">{{$date->format('M, Y')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-home-1"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Configuration</h6>
                            <p class="text mb-0 fz15">{{ucfirst($properties->property_type)}} {{ucfirst($properties->categories_type)}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($properties->categories_type == 'office')
            <div class="row mt30">
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-bed"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Built Up Area</h6>
                            <p class="text mb-0 fz15">{{$properties->built_up_area}} sq.ft</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-shower"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Seats</h6>
                            <p class="text mb-0 fz15">{{$properties->min_seats}} - {{$properties->max_seats}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-event"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Zone Type</h6>
                            <p class="text mb-0 fz15">{{ ucfirst($properties->zone_type) }} </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-garage"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Posession Status</h6>
                            @php $posession_status_without_underscores = str_replace("_", " ", $properties->posession_status); ?>

                            <p class="text mb-0 fz15">{{ucfirst($posession_status_without_underscores)}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @elseif(in_array($properties->categories_type, ['retail shop', 'showroom', 'warehouse']))
            <div class="row mt30">
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-bed"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Built Up Area</h6>
                            <p class="text mb-0 fz15">{{$properties->built_up_area}} sq.ft</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-shower"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Ownership</h6>
                            <p class="text mb-0 fz15">{{ ucfirst($properties->ownership)}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-event"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Location Hub</h6>
                            <?php $location_hub_without_underscores = str_replace("_", " ", $properties->location_hub); ?>
                            <p class="text mb-0 fz15">{{ ucfirst($location_hub_without_underscores) }} </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-garage"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Suitable For</h6>
                            <p class="text mb-0 fz15">{{ucfirst($properties->zone_type)}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @elseif(in_array($properties->categories_type, ['apartment', 'independent floor', 'independent house']))

            <div class="row mt30">
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-bed"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Bedroom</h6>
                            <p class="text mb-0 fz15">{{ str_replace('BHK', '', $properties->total_property) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-shower"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Bath</h6>
                            <p class="text mb-0 fz15">{{$properties->bath}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-event"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Year Built</h6>
                            <p class="text mb-0 fz15">{{ formatYearBuilt(ucfirst($properties->age_of_property)) }} Old</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-garage"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Furnishing</h6>
                            <p class="text mb-0 fz15">{{ucfirst($properties->furnishing)}} </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-expand"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Built Up Area</h6>
                            <p class="text mb-0 fz15">{{$properties->built_up_area}} sqft</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-home-1"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Configuration</h6>
                            <p class="text mb-0 fz15">{{ucfirst($properties->property_type)}} {{ucfirst($properties->categories_type)}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="row mt30">
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-bed"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Meal Types</h6>
                            <p class="text mb-0 fz15">@if(!empty($properties->meal_offerings)){{ ucwords($properties->meal_offerings) }}@else Without Food @endif</p>
                        </div>
                    </div>
                </div>
                @if(!empty($meal_without_underscores))
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-shower"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Meal Offerings</h6>
                            <p class="text mb-0 fz15">{{$meal_without_underscores}}</p>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-event"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Total Beds</h6>
                            <p class="text mb-0 fz15">{{ $properties->total_property }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-garage"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Notice Period</h6>
                            <p class="text mb-0 fz15">{{ $properties->notice_period}} Days</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-expand"></span>
                        <div class="ml15">
                            <h6 class="mb-0">Lock In Period</h6>
                            <p class="text mb-0 fz15">{{$properties->lock_in_period}} Days</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-2">
                    <div class="overview-element mb25 d-flex align-items-center">
                        <span class="icon flaticon-home-1"></span>
                        <div class="ml15">
                            <h6 class="mb-0">PG For</h6>
                            <p class="text mb-0 fz15">{{ ucfirst($properties->pg_for) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </section>
    <!-- Property All Lists -->
    <section class="pt60 pb90 bgc-f7">
        <div class="container">
            <div class="row wrap wow fadeInUp" data-wow-delay="500ms">
                <div class="col-lg-8">
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
                        @if($properties->categories_type == 'plot')
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="d-flex justify-content-between">
                                    <div class="pd-list">
                                        <p class="fw600 mb10 ff-heading dark-color">Price</p>
                                        <p class="fw600 mb10 ff-heading dark-color">Property Size</p>
                                        <p class="fw600 mb10 ff-heading dark-color">Project Area</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">Possession Starts</p>
                                    </div>
                                    <div class="pd-list">
                                        <p class="text mb10">{{$properties->looking_to == 'rent' ? formatRent($properties->rent) : formatRent($properties->cost)}}</p>
                                        <p class="text mb10">{{$properties->area_width}} {{$properties->carpet_area}} - {{$properties->area_height}} {{$properties->carpet_area}}</p>
                                        <p class="text mb10">{{$properties->plot_area}} {{$properties->carpet_area}}</p>
                                        <p class="text mb10">{{$date->format('M, Y')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 offset-xl-2">
                                <div class="d-flex justify-content-between">
                                    <div class="pd-list">
                                        <p class="fw600 mb10 ff-heading dark-color">Configuration</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">Property Status</p>
                                    </div>
                                    <div class="pd-list">
                                        <p class="text mb10">{{ucfirst($properties->property_type)}} {{ucfirst($properties->categories_type)}}</p>
                                        <p class="text mb-0">For {{ucfirst($properties->looking_to)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif($properties->categories_type == 'office')
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="d-flex justify-content-between">
                                    <div class="pd-list">
                                        <p class="fw600 mb10 ff-heading dark-color">Price</p>
                                        <p class="fw600 mb10 ff-heading dark-color">Built Up Area</p>
                                        <p class="fw600 mb10 ff-heading dark-color">Possession Status</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">Zone Type</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">DG & UPS Charges Included</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">Negotiable</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">Ownership</p>


                                    </div>
                                    <div class="pd-list">
                                        <p class="text mb10">{{$properties->looking_to == 'rent' ? $properties->rent : $properties->cost}}</p>
                                        <p class="text mb10">{{$properties->built_up_area}} Sqft</p>
                                        <?php $posession_status_without_underscores = str_replace("_", " ", $properties->posession_status); ?>

                                        <p class="text mb10">{{$posession_status_without_underscores}}</p>
                                        <p class="text mb-0">{{$properties->zone_type}}</p>
                                        <p class="text mb-0">{{ucfirst($properties->dg_ups_charge)}}</p>
                                        <p class="text mb-0">{{ucfirst($properties->negotiable)}}</p>
                                        <p class="text mb-0">{{ucfirst($properties->ownership)}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 offset-xl-2">
                                <div class="d-flex justify-content-between">
                                    <div class="pd-list">

                                        <p class="fw600 mb10 ff-heading dark-color">Location Hub</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">Cabins</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">Meeting Rooms</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">Washrooms</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">Conference Rooms</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">Staircases</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">Lifts</p>
                                    </div>
                                    <div class="pd-list">
                                        <?php $location_hub_without_underscores = str_replace("_", " ", $properties->location_hub); ?>
                                        <p class="text mb10">{{ucfirst($location_hub_without_underscores)}}</p>
                                        <p class="text mb-0">{{ucfirst($properties->cabins)}}</p>
                                        <p class="text mb-0">{{$properties->meeting_room}}</p>
                                        <p class="text mb-0">{{$properties->private_washrooms}} Private, {{$properties->public_washrooms}} Public</p>
                                        <p class="text mb-0">{{$properties->conference_room}}</p>
                                        <p class="text mb-0">{{$properties->staircase}}</p>
                                        <p class="text mb-0">{{$properties->service_lifts}} Service, {{$properties->passengers_lifts}} Passenger</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif(in_array($properties->categories_type, ['retail shop', 'showroom', 'warehouse']))
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="d-flex justify-content-between">
                                    <div class="pd-list">
                                        <p class="fw600 mb10 ff-heading dark-color">Price</p>
                                        <p class="fw600 mb10 ff-heading dark-color">Built Up Area</p>
                                        <p class="fw600 mb10 ff-heading dark-color">Possession Status</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">Zone Type</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">DG & UPS Charges Included</p>
                                    </div>
                                    <div class="pd-list">
                                        <p class="text mb10">{{$properties->looking_to == 'rent' ? $properties->rent : $properties->cost}}</p>
                                        <p class="text mb10">{{$properties->built_up_area}} Sqft</p>
                                        <?php $posession_status_without_underscores = str_replace("_", " ", $properties->posession_status); ?>
                                        <p class="text mb10">{{$posession_status_without_underscores}}</p>
                                        <p class="text mb-0">{{$properties->zone_type}}</p>
                                        <p class="text mb-0">{{ucfirst($properties->dg_ups_charge)}}</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 offset-xl-2">
                                <div class="d-flex justify-content-between">
                                    <div class="pd-list">

                                        <p class="fw600 mb10 ff-heading dark-color">Location Hub</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">Washrooms</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">Staircases</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">Lifts</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">Negotiable</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">Ownership</p>
                                    </div>
                                    <div class="pd-list">
                                        <?php $location_hub_without_underscores = str_replace("_", " ", $properties->location_hub); ?>

                                        <p class="text mb10">{{ucfirst($location_hub_without_underscores)}}</p>
                                        <p class="text mb-0">{{$properties->private_washrooms}} Private, {{$properties->public_washrooms}} Public</p>
                                        <p class="text mb-0">{{$properties->staircase}}</p>
                                        <p class="text mb-0">{{$properties->service_lifts}} Service, {{$properties->passengers_lifts}} Passenger</p>
                                        <p class="text mb-0">{{ucfirst($properties->negotiable)}}</p>
                                        <p class="text mb-0">{{ucfirst($properties->ownership)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif(in_array($properties->categories_type, ['apartment', 'independent floor', 'independent house']))
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="d-flex justify-content-between">
                                    <div class="pd-list">
                                        <p class="fw600 mb10 ff-heading dark-color">Price</p>
                                        <p class="fw600 mb10 ff-heading dark-color">Built Up Area</p>
                                        <p class="fw600 mb10 ff-heading dark-color">Bathrooms</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">Bedrooms</p>
                                    </div>
                                    <div class="pd-list">
                                        <p class="text mb10">{{$properties->looking_to == 'rent' ? formatRent($properties->rent) : formatRent($properties->cost)}}</p>
                                        <p class="text mb10">{{$properties->built_up_area}} sq.ft</p>
                                        <p class="text mb10">{{$properties->bath}}</p>
                                        <p class="text mb10">{{ str_replace('BHK', '', $properties->total_property) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 offset-xl-2">
                                <div class="d-flex justify-content-between">
                                    <div class="pd-list">
                                        <p class="fw600 mb10 ff-heading dark-color">Balcony</p>
                                        <p class="fw600 mb10 ff-heading dark-color">Configuration</p>
                                        <p class="fw600 mb10 ff-heading dark-color">Property Status</p>
                                    </div>
                                    <div class="pd-list">
                                        <p class="text mb10">{{ $properties->balconies ? $properties->balconies : 'No balcony' }}</p>
                                        <p class="text mb10">{{ucfirst($properties->property_type)}} {{ucfirst($properties->categories_type)}}</p>
                                        <p class="text mb-0">For {{ucfirst($properties->looking_to)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
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
                                        <p class="text mb10">{{$properties->total_property}}</p>
                                        <p class="text mb10">{{formatRent($properties->rent)}}/ bed</p>
                                        <p class="text mb10">{{$properties->notice_period}} Days</p>
                                        <?php $string_without_underscores = str_replace("_", " ", $properties->room_type); ?>
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
                                        <p class="text mb10">{{ucfirst($properties->pg_for)}}</p>
                                        <p class="text mb10">@if(!empty($properties->meal_offerings)){{ ucwords($properties->meal_offerings) }}@else Without Food @endif</p>
                                        <p class="text mb10">{{ucfirst($properties->ownership)}}</p>
                                        <?php
                                        $bathStyle = explode(",", $properties->bathroom_style);
                                        $bathStyleCapitalized = array_map('ucfirst', $bathStyle);
                                        ?>
                                        <p class="text mb10">{{ implode(", ", $bathStyleCapitalized) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                        <h4 class="title fz17 mb30 mt30">Address</h4>
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="d-flex justify-content-between">
                                    <div class="pd-list">
                                        <p class="fw600 mb10 ff-heading dark-color">{{ $properties->project_society }}, {{ $properties->locality }}, {{ $properties->city }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <iframe class="position-relative bdrs12 mt30 h250" loading="lazy" src="https://maps.google.com/maps?q=London%20Eye%2C%20London%2C%20United%20Kingdom&amp;t=m&amp;z=14&amp;output=embed&amp;iwloc=near" title="London Eye, London, United Kingdom" aria-label="London Eye, London, United Kingdom"></iframe>
                            </div>
                        </div>
                    </div>
                    @if(!empty($properties->amenites))
                    <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                        <h4 class="title fz17 mb30">Features & Amenities</h4>
                        <?php $Features_Amenities = explode(',', $properties->amenites); ?>
                        <div class="row">
                            @foreach($Features_Amenities as $Features)
                            <?php $formattedFeature = str_replace('_', ' ', $Features); ?>
                            <div class="col-sm-6 col-md-4">
                                <div class="pd-list mb10-sm">
                                    <p class="text mb10"><i class="fas fa-circle fz6 align-middle pe-2"></i>{{$formattedFeature}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @if(!empty($properties->videos))
                    <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                        <h4 class="title fz17 mb30">Video</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="property_video bdrs12 w-100">
                                    <a class="video_popup_btn mx-auto popup-img popup-youtube" href="{{asset('public/assets/property-videos/'. $properties->videos)}}"><span class="flaticon-play"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(!empty($propertiesReview) && count($propertiesReview) > 0)
                    <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product_single_content">
                                    <div class="mbp_pagination_comments">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="total_review d-flex align-items-center justify-content-between mb20">
                                                    <h6 class="fz17 mb15"><i class="fas fa-star fz12 pe-2"></i>{{ count($propertiesReview) }} reviews</h6>
                                                </div>
                                            </div>
                                            <?php $reviewCount = 0; ?>
                                            @foreach($propertiesReview as $review)
                                            <?php $reviewCount++; ?>
                                            <div class="col-md-12" @if($reviewCount> 2) style="display: none;" @endif>
                                                <div class="mbp_first position-relative d-flex align-items-center justify-content-start mb30-sm">
                                                    <img src="{{ asset('public/assets/profile-img/' . $review->userData->image) }}" class="mr-3" alt="comments-2.png" style="height: 60px;">
                                                    <div class="ml20">
                                                        <h6 class="mt-0 mb-0">{{$review->userData->name}}</h6>
                                                        <div><span class="fz14">{{$review->created_at->format('F j, Y')}}</span>
                                                            <div class="blog-single-review">
                                                                <ul class="mb0 ps-0">
                                                                    <?php $rating = $review->review; ?>
                                                                    @for ($j = 1; $j <=5; $j++) @if($j <=$rating) <li class="list-inline-item me-0"><a href="#"><i class="fas fa-star review-color2 fz10"></i></a></li>
                                                                        @else
                                                                        <li class="list-inline-item me-0"><a href="#"><i class="fas fa-star review-color2 fz10"></i></a></li>
                                                                        @endif
                                                                        @endfor

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text mt20 mb20">{{ ucwords($review->body) }}</p>
                                                <?php $hasReplies = $reviewReply->where('review_id', $review->id)->isNotEmpty(); ?>

                                                <div class="review_cansel_btns d-flex bdrb1 pb30">
                                                    @if($hasReplies)
                                                    <div class="reply-section mt-3">
                                                        <h6 class="fw-blod"><i class="fas fa-reply"></i>Reply</h6>
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
                                                    @if (count($propertiesReview) > 2)
                                                    <a href="javascript:void(0);" class="ud-btn btn-white2 show-all-reviews">Show all {{ count($reviewData) - 2 }} reviews<i class="fal fa-arrow-right-long"></i></a>
                                                </div>
                                                @endif
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
                                                            <option>Select</option>
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
                                                    <input type="hidden" name="vendor_id" value="{{$properties->vendor_id}}">
                                                    <input type="hidden" name="property_id" value="{{$properties->id}}">

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
                                                        <select class="selectpicker" data-live-search="true" data-width="100%">
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
                @unless(session()->get('id') == $properties->vendor_id)
                @if(session()->get('id'))
                <div class="col-lg-4">
                    <div class="column">
                        <div class="default-box-shadow1 bdrs12 bdr1 p30 mb30-md bgc-white position-relative">
                            <h6 class="title fz17 mb30">Contact Seller</h6>
                            <span class="text-success" id="request-msg"></span>
                            <span class="text-success" id="chat-status-text"></span>

                            <div class="agent-single d-sm-flex align-items-center pb25">
                                <div class="single-img mb30-sm">
                                    <img class="w90" src="{{ asset('public/assets/profile-img/'. $properties->vendor_data->image)}}" alt="">
                                </div>
                                <div class="single-contant ml20 ml0-xs">
                                    <h6 class="title mb-1">{{ $properties->vendor_data->name }}</h6>
                                    <div class="agent-meta mb10 d-md-flex align-items-center">
                                        <?php $displayPhoneNumber = substr($properties->vendor_data->phone, -5); ?>
                                        <a class="text fz15"><i class="flaticon-call pe-1"></i>.......{{$displayPhoneNumber}}</a>
                                    </div>
                                </div>
                            </div>
                            <form class="form-style1">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb20">
                                            <label class="heading-color ff-heading fw600 mb10">Hello, {{ session()->get('name')}}!</label>
                                            <p class="mb20">We're glad to see you here. Click below to send your request.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-grid">
                                            @if(!$userHasexistsRequest)
                                            @if($userHasRequest)
                                            @if($userHasRequest->status == 'pending')
                                            <a class="ud-btn btn-thm" id="reject-request" user-id="{{session()->get('id')}}" vendor-id="{{$properties->vendor_id}}" data-propertyid="{{$properties->id}}">Reject Request<i class="fal fa-arrow-right-long"></i></a>
                                            @elseif($userHasRequest->status == 'accepted')
                                            <a class="ud-btn btn-thm" href="{{route('user.msg')}}" id="chat-now">Chat Now <i class="fal fa-arrow-right-long"></i></a>
                                            @endif
                                            @else
                                            <a class="ud-btn btn-thm" id="send-request" user-id="{{session()->get('id')}}" vendor-id="{{$properties->vendor_id}}" data-propertyid="{{$properties->id}}">Send Request<i class="fal fa-arrow-right-long"></i></a>
                                            @endif
                                            @else
                                            <h6 class="title mb-1">You've already sent a request for this Seller</h6>
                                            <a class="ud-btn btn-thm" id="reject-request" user-id="{{session()->get('id')}}" vendor-id="{{$properties->vendor_id}}" data-propertyid="{{$properties->id}}">Reject Request <i class="fal fa-arrow-right-long"></i></a>
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
                                    <img class="w90" src="{{ asset('public/assets/profile-img/'. $properties->vendor_data->image)}}" alt="">
                                </div>
                                <div class="single-contant ml20 ml0-xs">
                                    <h6 class="title mb-1">{{ $properties->vendor_data->name }}</h6>
                                    <div class="agent-meta mb10 d-md-flex align-items-center">
                                        <?php $displayPhoneNumber = substr($properties->vendor_data->phone, -5); ?>

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
            @if(!empty($nearbySimilarHomes) && count($nearbySimilarHomes) > 0)
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
                        @foreach($nearbySimilarHomes as $home)
                        <div class="item">
                            <div class="listing-style1">
                                <div class="list-thumb">
                                    <?php $image = explode(',', $home->images); ?>
                                    @foreach($image as $img)
                                    <img class="w-100" src="{{ asset('public/assets/property-images/' . $img) }}" alt="" style="height:250px;">
                                    @break
                                    @endforeach
                                    <div class="list-tag fz12"><span class="flaticon-electricity me-2"></span>FEATURED</div>
                                    <div class="list-price">{{$home->looking_to == 'sell' ? formatRent($home->cost) : formatRent($home->rent)}}</div>
                                </div>
                                <div class="list-content">

                                    <?php

                                    if ($home->looking_to == 'pg') {
                                        $setRoute = route('property', ['name' => Str::slug($home->pg_name), 'id' => base64_encode($home->id)]);
                                    } else {
                                        $setRoute = route('property', ['name' => Str::slug($home->property_name), 'id' => base64_encode($home->id)]);
                                    }

                                    ?>

                                    <h6 class="list-title"><a href="{{$setRoute}}">{{$home->looking_to == 'pg' ? ucwords($home->pg_name) : ucwords($home->property_name)}}</a></h6>
                                    <p class="list-text">{{ ucwords($home->project_society) }}, {{ ucwords($home->locality) }}, {{ ucwords($home->city) }}</p>

                                    <hr class="mt-2 mb-2">
                                    <div class="list-meta2 d-flex justify-content-between align-items-center">
                                        <span class="for-what">For {{ucwords($home->looking_to)}}</span>

                                    </div>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        document.getElementById('showAllPhotos').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('remainingImages').style.display = 'block';
            this.style.display = 'none';
        });


        function showLoginPopup() {
            Swal.fire({
                title: 'Login Required',
                text: 'Please log in first to leave a review.',
                icon: 'warning',
                confirmButtonText: 'Login'
            });
        }

        $(document).ready(function() {
            $('.show-all-reviews').click(function() {
                $('.col-md-12').show();
                $('.show-all-reviews').hide();
            });

            function removeAlerts() {
                $('.success-mesg').delay(3000).fadeOut('slow', function() {
                    $(this).remove();
                });
            }
            removeAlerts();

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('send-request').addEventListener('click', function() {

                var userID = this.getAttribute('user-id');
                var vendorID = this.getAttribute('vendor-id');
                var propertyID = this.getAttribute('data-propertyid');

                $.ajax({
                    url: "{{route('user.send.request')}}",
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
                            url: "{{route('user.reject.request')}}",
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
                });
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#favourite-property').click(function() {
                var vendorID = $(this).data('regid');
                var propertyId = $(this).data('propertyid');


                $.ajax({
                    type: "POST",
                    url: "{{route('fav.property')}}",
                    data: {
                        vendorID: vendorID,
                        propertyId: propertyId,
                        "_token": "{{ csrf_token() }}",
                    },

                    success: function(response) {
                        // console.log(response);
                        if (response.message == 'success') {
                            Swal.fire({
                                title: "Property Liked",
                                text: "You have successfully added this property to your favorites.",
                                icon: "success",
                                confirmButtonText: "OK"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });

                        } else if (response.message == 'removed') {

                            Swal.fire({
                                title: "Property Unliked",
                                text: "You have successfully removed this property from your favorites.",
                                icon: "info",
                                confirmButtonText: "OK"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });

                        }

                        setTimeout(function() {
                            location.reload();
                        }, 4000);


                    },
                    error: function(xhr, error, status) {
                        console.log("Ajax Error", error);
                    }
                });
            });
        });
    </script>
    @endsection