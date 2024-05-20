@extends('gharkasapna.layouts.innerpages_app')
@section('content')

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

function formatCost($cost)
{
if (!is_numeric($cost)) {
return 'N/A'; // or any other appropriate value
}

if ($cost >= 10000000) {
return '₹' . number_format($cost / 10000000, 2) . ' Cr';
} elseif ($cost >= 100000) {
return '₹' . number_format($cost / 100000, 2) . ' Lac';
} else {
return '₹' . number_format($cost / 1000, 2) . ' K';
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


if ($propertiesData->categories_type == 'plot' && is_numeric($propertiesData->plot_area)) {
$price_per_sqft = $propertiesData->cost / $propertiesData->plot_area;
} elseif ($propertiesData->looking_to == 'rent' && is_numeric($propertiesData->rent) && is_numeric($propertiesData->built_up_area)) {
$price_per_sqft = $propertiesData->rent / $propertiesData->built_up_area;
} elseif (is_numeric($propertiesData->cost) && is_numeric($propertiesData->built_up_area)) {
$price_per_sqft = $propertiesData->cost / $propertiesData->built_up_area;
} else {
$price_per_sqft = 0;
}


@endphp


<div class="body_content">
    <!-- Property All Lists -->
    <section class="pt60 pb90 bgc-f7">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay="100ms">
                <div class="col-lg-8">
                    <div class="single-property-content mb30-md">
                        @php $propertyName = substr($propertiesData->property_name, 0, strrpos($propertiesData->property_name, ' ')); @endphp
                        <h2 class="sp-lg-title">{{ucwords($propertyName)}}</h2>
                        <div class="pd-meta mb15 d-md-flex align-items-center">
                            <p class="text fz15 mb-0 bdrr1 pr10 bdrrn-sm">{{ $propertiesData->project_society }}, {{ $propertiesData->locality }}, {{ $propertiesData->city }}</p>
                            <a class="ff-heading text-thm fz15 bdrr1 pr10 ml0-sm ml10 bdrrn-sm" href=""><i class="fas fa-circle fz10 pe-2"></i>For {{ucfirst($propertiesData->looking_to)}}</a>
                            <a class="ff-heading bdrr1 fz15 pr10 ml10 ml0-sm bdrrn-sm" href=""><i class="far fa-clock pe-2"></i>{{ formatYearBuilt($propertiesData->age_of_property) }} ago</a>
                            <!-- <a class="ff-heading ml10 ml0-sm fz15" href=""><i class="flaticon-fullscreen pe-2 align-text-top"></i>8721</a> -->
                        </div>
                        <!-- <div class="property-meta d-flex align-items-center">
                            <a class="text fz15" href=""><i class="flaticon-bed pe-2 align-text-top"></i>3 bed</a>
                            <a class="text ml20 fz15" href=""><i class="flaticon-shower pe-2 align-text-top"></i>4 bath</a>
                            <a class="text ml20 fz15" href=""><i class="flaticon-expand pe-2 align-text-top"></i>1200 sqft</a>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-property-content">
                        <div class="property-action text-lg-end">
                            <div class="d-flex mb20 mb10-md align-items-center justify-content-lg-end">
                                @if(!empty($likeproperty))
                                <a class="icon mr10" id="favourite-property" data-regid="{{$propertiesData->vendor_id}}" data-propertyid="{{$propertiesData->id}}"><i class="fa fa-heart"></i></a>
                                @else
                                <a class="icon mr10" id="favourite-property" data-regid="{{$propertiesData->vendor_id}}" data-propertyid="{{$propertiesData->id}}"><span class="flaticon-like"></span></a>
                                @endif
                                <a class="icon mr10" href=""><span class="flaticon-share-1"></span></a>
                            </div>
                            <h3 class="price mb-0">{{$propertiesData->looking_to == 'rent' ? formatRent($propertiesData->rent) : formatCost($propertiesData->cost)}}</h3>


                            <p class="text space fz15">{{format_price($price_per_sqft)}}/sq ft</p>
                        </div>
                    </div>
                </div>
            </div>
            @if(!empty($propertiesData->images))
            <div class="row mb30 mt30 wow fadeInUp" data-wow-delay="300ms">
                <div class="col-sm-6">
                    <div class="sp-img-content mb15-md">
                        @php $image = explode(',', $propertiesData->images); @endphp
                        @foreach($image as $img)
                        <a class="popup-img preview-img-1 sp-img" href="{{ asset('public/assets/property-images/' . $img) }}">
                            <img class="w-100" src="{{ asset('public/assets/property-images/' . $img) }}" alt="1.jpg">
                        </a>
                        @break
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        @php $propertiesImages = explode(',', $propertiesData->images); $firstTwoImages = array_slice($propertiesImages, 0, 4); $remainingImages = array_slice($propertiesImages, 4); @endphp

                        @foreach($firstTwoImages as $img)
                        <div class="col-6 ps-sm-0">
                            <div class="sp-img-content">
                                <a class="popup-img preview-img-2 sp-img mb10" style="height: 278px;" href="{{ asset('public/assets/property-images/' . $img) }}">
                                    <img class="w-100" src="{{ asset('public/assets/property-images/' . $img) }}" alt="2.jpg">
                                </a>
                            </div>
                        </div>
                        @endforeach
                        <div class="row" id="remainingImages" style="display: none;">
                            @foreach($remainingImages as $img)
                            <div class="col-6 ps-sm-0">
                                <div class="sp-img-content">
                                    <a class="popup-img preview-img-4 sp-img" href="{{ asset('public/assets/property-images/' . $img) }}">
                                        <img class="w-100" src="{{ asset('public/assets/property-images/' . $img) }}" alt="4.jpg">
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
                        <h4>No images available for this property yet.</h4>
                    </div>
                </div>
            </div>
            @endif



            <div class="row wrap wow fadeInUp" data-wow-delay="500ms">
                <div class="col-lg-8">
                    <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                        <h4 class="title fz17 mb30">Overview</h4>

                        @if($propertiesData->categories_type == 'plot')
                        <div class="row">
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-element mb25 d-flex align-items-center">
                                    <span class="icon flaticon-bed"></span>
                                    <div class="ml15">
                                        <h6 class="mb-0">Project Area</h6>
                                        <p class="text mb-0 fz15">{{$propertiesData->plot_area}} {{$propertiesData->carpet_area}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-element mb25 d-flex align-items-center">
                                    <span class="icon flaticon-shower"></span>
                                    <div class="ml15">
                                        <h6 class="mb-0">Sizes</h6>
                                        <p class="text mb-0 fz15">{{$propertiesData->area_width}} {{$propertiesData->carpet_area}} - {{$propertiesData->area_height}} {{$propertiesData->carpet_area}}</p>
                                    </div>
                                </div>
                            </div>
                            @if(!empty($price_per_sqft))

                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-element mb25 d-flex align-items-center">
                                    <span class="icon flaticon-event"></span>
                                    <div class="ml15">
                                        <h6 class="mb-0">Avg. Price</h6>
                                        <p class="text mb-0 fz15">{{format_price($price_per_sqft)}}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-element mb25-xs d-flex align-items-center">
                                    <span class="icon flaticon-garage"></span>
                                    <div class="ml15">
                                        <h6 class="mb-0">Possession Starts</h6>
                                        @php $date = new DateTime($propertiesData->created_at); @endphp
                                        <p class="text mb-0 fz15">{{$date->format('M, Y')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-element d-flex align-items-center">
                                    <span class="icon flaticon-home-1"></span>
                                    <div class="ml15">
                                        <h6 class="mb-0">Configuration</h6>
                                        <p class="text mb-0 fz15">{{ucfirst($propertiesData->property_type)}} {{ucfirst($propertiesData->categories_type)}}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @elseif($propertiesData->categories_type == 'office')
                        <div class="row">
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-element mb25 d-flex align-items-center">
                                    <span class="icon flaticon-bed"></span>
                                    <div class="ml15">
                                        <h6 class="mb-0">Built Up Area</h6>
                                        <p class="text mb-0 fz15">{{$propertiesData->built_up_area}} sq.ft</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-element mb25 d-flex align-items-center">
                                    <span class="icon flaticon-shower"></span>
                                    <div class="ml15">
                                        <h6 class="mb-0">Seats</h6>
                                        <p class="text mb-0 fz15">{{$propertiesData->min_seats}} - {{$propertiesData->max_seats}}</p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-element mb25 d-flex align-items-center">
                                    <span class="icon flaticon-event"></span>
                                    <div class="ml15">
                                        <h6 class="mb-0">Zone Type</h6>
                                        <p class="text mb-0 fz15">{{ ucfirst($propertiesData->zone_type) }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-element mb25-xs d-flex align-items-center">
                                    <span class="icon flaticon-garage"></span>
                                    <div class="ml15">
                                        <h6 class="mb-0">Possession Starts</h6>
                                        @php $posession_status_without_underscores = str_replace("_", " ", $propertiesData->posession_status); @endphp
                                        <p class="text mb-0 fz15">{{ucfirst($posession_status_without_underscores)}}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @elseif($propertiesData->categories_type == 'retail shop' || $propertiesData->categories_type == 'showroom' || $propertiesData->categories_type == 'warehouse')

                        <div class="row">
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-element mb25 d-flex align-items-center">
                                    <span class="icon flaticon-bed"></span>
                                    <div class="ml15">
                                        <h6 class="mb-0">Built Up Area</h6>
                                        <p class="text mb-0 fz15">{{$propertiesData->built_up_area}} sq.ft</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-element mb25 d-flex align-items-center">
                                    <span class="icon flaticon-shower"></span>
                                    <div class="ml15">
                                        <h6 class="mb-0">Ownership</h6>
                                        <p class="text mb-0 fz15">{{ ucfirst($propertiesData->ownership)}}</p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-element mb25 d-flex align-items-center">
                                    <span class="icon flaticon-event"></span>
                                    <div class="ml15">
                                        <h6 class="mb-0">Location Hub</h6>
                                        @php $location_hub_without_underscores = str_replace("_", " ", $propertiesData->location_hub); @endphp
                                        <p class="text mb-0 fz15">{{ ucfirst($location_hub_without_underscores) }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-element mb25-xs d-flex align-items-center">
                                    <span class="icon flaticon-garage"></span>
                                    <div class="ml15">
                                        <h6 class="mb-0">Suitable For</h6>
                                        @php $posession_status_without_underscores = str_replace("_", " ", $propertiesData->posession_status); @endphp
                                        <p class="text mb-0 fz15">{{ucfirst($propertiesData->zone_type)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else

                        <div class="row">
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-element mb25 d-flex align-items-center">
                                    <span class="icon flaticon-bed"></span>
                                    <div class="ml15">
                                        <h6 class="mb-0">Bedroom</h6>
                                        <p class="text mb-0 fz15">{{ str_replace('BHK', '', $propertiesData->total_property) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-element mb25 d-flex align-items-center">
                                    <span class="icon flaticon-shower"></span>
                                    <div class="ml15">
                                        <h6 class="mb-0">Bath</h6>
                                        <p class="text mb-0 fz15">{{$propertiesData->bath}}</p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-element mb25 d-flex align-items-center">
                                    <span class="icon flaticon-event"></span>
                                    <div class="ml15">
                                        <h6 class="mb-0">Year Built</h6>
                                        <p class="text mb-0 fz15">{{ formatYearBuilt(ucfirst($propertiesData->age_of_property)) }} Old</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-element mb25-xs d-flex align-items-center">
                                    <span class="icon flaticon-garage"></span>
                                    <div class="ml15">
                                        <h6 class="mb-0">Furnishing</h6>
                                        <p class="text mb-0 fz15">{{ucfirst($propertiesData->furnishing)}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-element mb25-xs d-flex align-items-center">
                                    <span class="icon flaticon-garage"></span>
                                    <div class="ml15">
                                        <h6 class="mb-0">Built Up Area</h6>
                                        <p class="text mb-0 fz15">{{$propertiesData->built_up_area}} sqft</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-element mb25-xs d-flex align-items-center">
                                    <span class="icon flaticon-garage"></span>
                                    <div class="ml15">
                                        <h6 class="mb-0">Configuration</h6>
                                        <p class="text mb-0 fz15">{{ucfirst($propertiesData->property_type)}} {{ucfirst($propertiesData->categories_type)}}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endif
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
                        @if($propertiesData->categories_type == 'plot')
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
                                        <p class="text mb10">{{$propertiesData->looking_to == 'rent' ? formatRent($propertiesData->rent) : formatCost($propertiesData->cost)}}</p>
                                        <p class="text mb10">{{$propertiesData->area_width}} {{$propertiesData->carpet_area}} - {{$propertiesData->area_height}} {{$propertiesData->carpet_area}}</p>
                                        <p class="text mb10">{{$propertiesData->plot_area}} {{$propertiesData->carpet_area}}</p>
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
                                        <p class="text mb10">{{ucfirst($propertiesData->property_type)}} {{ucfirst($propertiesData->categories_type)}}</p>
                                        <p class="text mb-0">For {{ucfirst($propertiesData->looking_to)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif($propertiesData->categories_type == 'office')

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
                                        <p class="text mb10">{{$propertiesData->looking_to == 'rent' ? formatRent($propertiesData->rent) : formatCost($propertiesData->cost)}}</p>
                                        <p class="text mb10">{{$propertiesData->built_up_area}} Sqft</p>
                                        @php $posession_status_without_underscores = str_replace("_", " ", $propertiesData->posession_status); @endphp
                                        <p class="text mb10">{{$posession_status_without_underscores}}</p>
                                        <p class="text mb-0">{{$propertiesData->zone_type}}</p>
                                        <p class="text mb-0">{{ucfirst($propertiesData->dg_ups_charge)}}</p>
                                        <p class="text mb-0">{{ucfirst($propertiesData->negotiable)}}</p>
                                        <p class="text mb-0">{{ucfirst($propertiesData->ownership)}}</p>

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
                                        @php $location_hub_without_underscores = str_replace("_", " ", $propertiesData->location_hub); @endphp
                                        <p class="text mb10">{{ucfirst($location_hub_without_underscores)}}</p>
                                        <p class="text mb-0">{{ucfirst($propertiesData->cabins)}}</p>
                                        <p class="text mb-0">{{$propertiesData->meeting_room}}</p>
                                        <p class="text mb-0">{{$propertiesData->private_washrooms}} Private, {{$propertiesData->public_washrooms}} Public</p>
                                        <p class="text mb-0">{{$propertiesData->conference_room}}</p>
                                        <p class="text mb-0">{{$propertiesData->staircase}}</p>
                                        <p class="text mb-0">{{$propertiesData->service_lifts}} Service, {{$propertiesData->passengers_lifts}} Passenger</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif($propertiesData->categories_type == 'retail shop' || $propertiesData->categories_type == 'showroom' || $propertiesData->categories_type == 'warehouse')
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
                                        <p class="text mb10">{{$propertiesData->looking_to == 'rent' ? formatRent($propertiesData->rent) : formatCost($propertiesData->cost)}}</p>
                                        <p class="text mb10">{{$propertiesData->built_up_area}} Sqft</p>
                                        @php $posession_status_without_underscores = str_replace("_", " ", $propertiesData->posession_status); @endphp
                                        <p class="text mb10">{{$posession_status_without_underscores}}</p>
                                        <p class="text mb-0">{{$propertiesData->zone_type}}</p>
                                        <p class="text mb-0">{{ucfirst($propertiesData->dg_ups_charge)}}</p>

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
                                        @php $location_hub_without_underscores = str_replace("_", " ", $propertiesData->location_hub); @endphp
                                        <p class="text mb10">{{ucfirst($location_hub_without_underscores)}}</p>
                                        <p class="text mb-0">{{$propertiesData->private_washrooms}} Private, {{$propertiesData->public_washrooms}} Public</p>
                                        <p class="text mb-0">{{$propertiesData->staircase}}</p>
                                        <p class="text mb-0">{{$propertiesData->service_lifts}} Service, {{$propertiesData->passengers_lifts}} Passenger</p>
                                        <p class="text mb-0">{{ucfirst($propertiesData->negotiable)}}</p>
                                        <p class="text mb-0">{{ucfirst($propertiesData->ownership)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @else

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
                                        <p class="text mb10">{{$propertiesData->looking_to == 'rent' ? formatRent($propertiesData->rent) : formatCost($propertiesData->cost)}}</p>
                                        <p class="text mb10">{{$propertiesData->built_up_area}} Sqft</p>
                                        <p class="text mb10">{{$propertiesData->bath}}</p>
                                        <p class="text mb-0">{{ str_replace('BHK', '', $propertiesData->total_property) }}</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 offset-xl-2">
                                <div class="d-flex justify-content-between">
                                    <div class="pd-list">
                                        <p class="fw600 mb10 ff-heading dark-color">Balcony</p>
                                        <p class="fw600 mb10 ff-heading dark-color">Configuration</p>
                                        <p class="fw600 mb-0 ff-heading dark-color">Property Status</p>
                                    </div>
                                    <div class="pd-list">
                                        <p class="text mb10">{{ $propertiesData->balconies ? $propertiesData->balconies : 'No balcony' }}</p>
                                        <p class="text mb10">{{ucfirst($propertiesData->property_type)}} {{ucfirst($propertiesData->categories_type)}}</p>
                                        <p class="text mb-0">For {{ucfirst($propertiesData->looking_to)}}</p>
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
                    <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                        <h4 class="title fz17 mb30">Features & Amenities</h4>
                        @php $Features_Amenities = explode(',', $propertiesData->amenites); @endphp
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
                    @endif

                    @if(!empty($propertiesData->videos))
                    <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                        <h4 class="title fz17 mb30">Video</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="property_video bdrs12 w-100" style="background-image: url('<?php echo (!empty($propertiesData->videos)) ? asset('public/assets/property-videos/' . $propertiesData->videos) : asset('path_to_default_image.jpg'); ?>')">


                                    <div class="property_video bdrs12 w-100" style="background-image: url('{{ (!empty($propertiesData->videos))? asset('public/assets/property-videos/' . $propertiesData->videos) : asset('path_to_default_image.jpg') }}')">
                                        <a class="video_popup_btn mx-auto popup-img popup-youtube" href="https://www.youtube.com/watch?v=oqNZOOWF8qM"><span class="flaticon-play"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                                        @for ($j = 1; $j <= 5; $j++) @if ($j <=$rating) <li class="list-inline-item me-0"><a><i class="fas fa-star review-color2 fz10"></i></a></li>
                                                                            @else
                                                                            <li class="list-inline-item me-0"><a><i class="far fa-star review-color2 fz10"></i></a></li>
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
                                                    @endforeach
                                                    <div class="col-md-12">
                                                        <div class="position-relative pt30">
                                                            @if (count($reviewData) > 2)
                                                            <a href="javascript:void(0);" class="ud-btn btn-white2">Show all {{ count($reviewData) - 2 }} reviews<i class="fal fa-arrow-right-long"></i></a>
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
                        </div>

                    </div>
                </div>
    </section>

    @endsection


    <script>
        document.getElementById('showAllPhotos').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('remainingImages').style.display = 'block';
            this.style.display = 'none';
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.show-all-reviews').click(function() {
                $('.col-md-12').show();
                $('.show-all-reviews').hide();
            });
        });
    </script>