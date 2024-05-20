@extends('gharkasapna.layouts.app')
@section('content')

<style>
    .listing-style1 img {
        height: 280px;
    }

    input[type="radio"][disabled]+label {
        cursor: not-allowed;
        color: #ccc;

    }

    .form-check-input {
        display: none;
    }

    .form-check-input:checked+.form-check-label {
        background-color: #f68121;
        color: #fff;
    }

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

    .col-sm-6 .widget-wrapper .space-area .meals.d-flex.align-items-center:last-child {
        align-items: center !important;
        gap: 40px;
    }

    .no-properties-found {
        text-align: center;
        margin-top: 50px;
    }

    .no-properties-found h1 {
        font-size: 24px;
        color: #000;
        font-weight: bold;
    }
</style>

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

@endphp


<div class="advance-feature-modal">
    <div class="modal fade" id="filterModel" tabindex="-1" aria-labelledby="filterModelLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header pl30 pr30">
                    <h5 class="modal-title" id="filterModelLabel">Customize Search</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-0">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="widget-wrapper">
                                <h6 class="list-title">Looking to</h6>
                                <div class="form-style2 input-group">
                                    <select class="selectpicker" data-live-search="true" id="looking-to" data-width="100%">
                                        <option> Looking to</option>
                                        <option data-tokens="sell">Sell</option>
                                        <option data-tokens="rent">Rent</option>
                                        <option data-tokens="pg">PG</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 property-type">
                            <div class="widget-wrapper">
                                <h6 class="list-title">Type</h6>
                                <div class="form-style2 input-group">
                                    <select class="selectpicker" data-live-search="true" id="category-type" data-width="100%">
                                        <option>Property</option>
                                        @foreach($propertyType as $type)
                                        <option data-tokens="{{$type}}">{{ucfirst($type)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 paying-guest-gender d-none">
                            <div class="widget-wrapper">
                                <h6 class="list-title">Gender</h6>
                                <div class="form-style2 input-group">
                                    <select class="selectpicker" data-live-search="true" id="suited-for" data-width="100%">
                                        <option>Gender</option>
                                        <option data-tokens="boys">Boys</option>
                                        <option data-tokens="girls">Girls</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="widget-wrapper">
                                <h6 class="list-title">Location</h6>
                                <div class="form-style2 input-group">
                                    <select class="selectpicker" data-live-search="true" id="location" data-width="100%">
                                        <option>All Cities</option>
                                        @foreach($popularCities as $city)
                                        <option data-tokens="{{$city}}">{{ucfirst($city)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 plot-area d-none">
                            <div class="widget-wrapper">
                                <h6 class="list-title">Plot Area</h6>
                                <div class="form-style2">
                                    <input type="text" class="form-control" placeholder="Plot Area" id="plot-area">
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 pg-room-type d-none">
                            <div class="widget-wrapper">
                                <h6 class="list-title">Room Type</h6>
                                <div class="form-style2 input-group">
                                    <select class="selectpicker" data-live-search="true" id="room-type" data-width="100%">
                                        <option>Room Type</option>
                                        <option data-tokens="private room">Private Room</option>
                                        <option data-tokens="double sharing">Double Sharing</option>
                                        <option data-tokens="triple sharing">Triple Sharing</option>
                                        <option data-tokens="three plus sharing">3+ Sharing</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row bedroom-bath">
                        <div class="col-sm-6">
                            <div class="widget-wrapper">
                                <h6 class="list-title" id="bedroom-label">Bedrooms</h6>
                                <div class="form-style2">
                                    <input type="text" class="form-control" placeholder="Bedrooms" id="bedroom">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="widget-wrapper">
                                <h6 class="list-title" id="bathroom-label">Bathrooms</h6>
                                <div class="form-style2">
                                    <input type="text" class="form-control" placeholder="Bathrooms" id="bathroom">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="widget-wrapper">
                                <h6 class="list-title">Price Range</h6>
                                <div class="space-area">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="form-style1">
                                            <input type="text" class="form-control" placeholder="min price" id="min-price">
                                        </div>
                                        <span class="dark-color">-</span>
                                        <div class="form-style1">
                                            <input type="text" class="form-control" placeholder="max price" id="max-price">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 square-feet">
                            <div class="widget-wrapper">
                                <h6 class="list-title">Square Feet</h6>
                                <div class="space-area">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="form-style1">
                                            <input type="text" class="form-control" placeholder="Min." id="min-sqft">
                                        </div>
                                        <span class="dark-color">-</span>
                                        <div class="form-style1">
                                            <input type="text" class="form-control" placeholder="Max" id="max-sqft">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 meal-available-pg d-none">
                            <div class="widget-wrapper">
                                <h6 class="list-title">Meals Available</h6>
                                <div class="space-area">
                                    <div class="meals d-flex align-items-center justify-content-betwwen">
                                        <div class="form-style1">
                                            <input class="form-check-input" type="radio" name="meals" value="yes" id="meals-yes">
                                            <label for="meals-yes" class="form-check-label fw600">Yes</label>
                                        </div>
                                        <div class="form-style1">
                                            <input class="form-check-input" type="radio" name="meals" value="no" id="meals-no">
                                            <label for="meals-no" class="form-check-label fw600">No</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-lg-12">
                            <div class="widget-wrapper mb0">
                                <h6 class="list-title mb10">Amenities</h6>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="widget-wrapper mb20">
                                <div class="checkbox-style1">
                                    <label class="custom_checkbox">Attic
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_checkbox">Basketball court
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_checkbox">Air Conditioning
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_checkbox">Lawn
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="widget-wrapper mb20">
                                <div class="checkbox-style1">
                                    <label class="custom_checkbox">TV Cable
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_checkbox">Dryer
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_checkbox">Outdoor Shower
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_checkbox">Washer
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="widget-wrapper mb20">
                                <div class="checkbox-style1">
                                    <label class="custom_checkbox">Lake view
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_checkbox">Wine cellar
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_checkbox">Front yard
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_checkbox">Refrigerator
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="modal-footer justify-content-between">
                    <a class="reset-button" id="reset-all-filter"><span class="flaticon-turn-back"></span><u>Reset all filters</u></a>
                    <div class="btn-area">
                        <button class="ud-btn btn-thm" id="search"><span class="flaticon-search align-text-top pr10"></span>Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="body_content">
    <section class="breadcumb-section bgc-f7">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb-style1">
                        <h2 class="title" id="pageTitle">{{ucwords($pageTitle)}}</h2>
                        <!-- <a class="filter-btn-left mobile-filter-btn d-block d-lg-none"><span class="flaticon-settings"></span> Filter</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Property All Lists -->
    @if(!empty($properties) && count($properties) > 0 )
    <section class="pt0 pb90 bgc-f7">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 d-none d-lg-block">
                    <div class="dropdown-lists">
                        <ul class="p-0 text-center text-xl-start">
                            <li class="list-inline-item">
                                <button type="button" class="open-btn mb15" data-bs-toggle="modal" data-bs-target="#filterModel"> <i class="flaticon-settings me-2"></i> Customize Search</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row" id="all-property-container">
                @foreach($properties as $property)
                @php $images = explode(',', $property->images); @endphp
                <div class="col-sm-6 col-lg-4">
                    <div class="listing-style1">
                        <div class="list-thumb">
                            @foreach($images as $img)
                            <img class="w-100" src="{{ asset('public/assets/property-images/' . $img) }}" alt="">
                            @break
                            @endforeach
                            <div class="list-tag fz12"><span class="flaticon-electricity me-2"></span>FEATURED</div>
                            <div class="list-price">{{$property->looking_to == 'sell' ? formatCost($property->cost) : ( formatRent($property->rent))}}</div>
                        </div>
                        <div class="list-content">
                            <?php

                            if ($property->looking_to == 'pg') {
                                $setRoute = route('property', ['name' => Str::slug($property->pg_name), 'id' => base64_encode($property->id)]);
                            } else {
                                $setRoute = route('property', ['name' => Str::slug($property->property_name), 'id' => base64_encode($property->id)]);
                            }

                            ?>
                            <h6 class="list-title"><a target="_blank" href="{{$setRoute}}">{{ implode(' ', array_slice(str_word_count($property->looking_to == 'pg' ? $property->pg_name : $property->property_name, 1), 0, 5)) }}</a></h6>
                            <p class="list-text">{{ ucwords(implode(', ', array_slice(explode(', ', $property['project_society']), 0, 2))) }}, {{ ucwords(implode(', ', array_slice(explode(', ', $property['locality']), 0, 2))) }}, {{ ucwords(implode(', ', array_slice(explode(', ', $property['city']), 0, 2))) }}</p>
                            <div class="list-meta d-flex align-items-center">
                                @if(in_array($property->categories_type, ['apartment', 'independent floor', 'independent house']))
                                <span class="flaticon-bed"></span>{{$property->total_property}}
                                <span class="flaticon-shower"></span>{{$property->bath}} bath
                                <span class="flaticon-expand"></span>{{$property->built_up_area}} sqft
                                @elseif($property->categories_type == 'office')
                                <span class="flaticon-bed"></span>{{$property->max_seats}}
                                <span class="flaticon-shower"></span>{{$property->meeting_room}}
                                <span class="flaticon-expand"></span>{{$property->built_up_area}} sqft
                                @elseif(in_array($property->categories_type, ['retail shop', 'showroom', 'warehouse']))
                                <span class="flaticon-bed"></span>{{$property->staircase}}
                                <span class="flaticon-shower"></span>{{$property->your_floor}}
                                <span class="flaticon-expand"></span>{{$property->built_up_area}} sqft
                                @elseif($property->looking_to == 'pg')
                                <span class="flaticon-bed"></span>{{$property->total_property}}
                                <span class="flaticon-shower"></span>{{$property->suited_for}}
                                <span class="flaticon-expand"></span>{{$property->room_type}}
                                @endif
                            </div>
                            <hr class="mt-2 mb-2">
                            <div class="list-meta2 d-flex justify-content-between align-items-center">
                                <span class="for-what">For {{ucfirst($property->looking_to)}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row" id="pagination-container">
                <div class="mbp_pagination text-center mt30">
                    {{ $properties->links() }}

                    <p class="mt10 pagination_page_count text-center">
                        {{ $properties->firstItem() }} – {{ $properties->lastItem() }} of {{ $properties->total() }}+ property available
                    </p>
                </div>
            </div>
        </div>
    </section>

    @else
    <div class="no-properties-found">
        <h1>Properties Not Found</h1>
    </div>
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#looking-to').on('change', function() {
                var lookingTo = $('#looking-to').val();
                //alert(lookingTo);

                if (lookingTo == 'PG') {
                    $('.property-type').addClass('d-none');
                    $('.paying-guest-gender').removeClass('d-none');
                    $('.pg-room-type').removeClass('d-none');
                    $('.meal-available-pg').removeClass('d-none');
                    $('.square-feet').addClass('d-none');
                    $('.bedroom-bath').addClass('d-none');
                } else {
                    $('.property-type').removeClass('d-none');
                    $('.paying-guest-gender').addClass('d-none');
                    $('.pg-room-type').addClass('d-none');
                    $('.meal-available-pg').addClass('d-none');
                    $('.square-feet').removeClass('d-none');
                    $('.bedroom-bath').removeClass('d-none');
                }
            });

            $('#category-type').on('change', function() {
                var propertyType = $('#category-type').val();
                var specialTypes = ['Showroom', 'Retail shop', 'Warehouse'];

                if (propertyType == 'Office') {
                    $('#bedroom-label').text('Min Seats');
                    $('#bedroom').attr('placeholder', 'Min Seats');
                    $('#bathroom-label').text('Max Seats');
                    $('#bathroom').attr('placeholder', 'Max Seats');
                    $('.plot-area').addClass('d-none');
                    $('.bedroom-bath').removeClass('d-none');
                    $('.square-feet').removeClass('d-none');

                } else if (specialTypes.includes(propertyType)) {

                    $('#bedroom-label').text('Total Floors');
                    $('#bedroom').attr('placeholder', 'Total Floors');
                    $('#bathroom-label').text('Carpet Area');
                    $('#bathroom').attr('placeholder', 'Carpet Area');
                    $('.plot-area').addClass('d-none');
                    $('.bedroom-bath').removeClass('d-none');
                    $('.square-feet').removeClass('d-none');

                } else if (propertyType == 'Plot') {
                    //alert(propertyType);
                    $('.bedroom-bath').addClass('d-none');
                    $('.plot-area').removeClass('d-none');
                    $('.square-feet').addClass('d-none');
                } else {

                    $('#bedroom-label').text('Bedrooms');
                    $('#bedroom').attr('placeholder', 'Bedrooms');
                    $('#bathroom-label').text('Bathrooms');
                    $('#bathroom').attr('placeholder', 'Bathrooms');
                    $('.plot-area').addClass('d-none');
                    $('.bedroom-bath').removeClass('d-none');
                    $('.square-feet').removeClass('d-none');
                }


            });

            $('#reset-all-filter').click(function() {
                location.reload();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#search').click(function() {
                // var projectLocality = null;
                var lookingTo = $('#looking-to').val();
                var type = $('#category-type').val();
                var suitedFor = $('#suited-for').val();
                var location = $('#location').val();
                var plotArea = $('#plot-area').val();
                var roomType = $('#room-type').val();
                var bedRoom = $('#bedroom').val();
                var bathRoom = $('#bathroom').val();
                var minPrice = $('#min-price').val();
                var maxPrice = $('#max-price').val();
                var minSqft = $('#min-sqft').val();
                var maxSqft = $('#max-sqft').val();
                var meals = $('input[name="meals"]:checked').val();
                //var segment = "{{request()->segment(1)}}";
                // var segmentFirst = "{{request()->segment(1)}}";
                // var segmentSecond = "{{request()->segment(2)}}";
                // var segmentThired = "{{request()->segment(3)}}";
                // var segmentFourth = "{{request()->segment(4)}}";
                // var currentUrl = window.location.href;


                //  if(segmentFirst == 'project-locality'){
                //     var projectLocality = segmentSecond;
                //  }else if (segmentFourth) {

                //  }


                //alert(currentUrl);
                //alert(segment);
                // console.log(minPrice);
                // console.log(maxPrice);

                $.ajax({

                    url: "{{route('filter.allProperty')}}",
                    type: "POST",
                    data: {

                        lookingTo: lookingTo,
                        type: type,
                        suitedFor: suitedFor,
                        location: location,
                        plotArea: plotArea,
                        roomType: roomType,
                        bath: bathRoom,
                        bed: bedRoom,
                        minPrice: minPrice,
                        maxPrice: maxPrice,
                        minSqft: minSqft,
                        maxSqft: maxSqft,
                        meals: meals,
                        "_token": "{{csrf_token() }}"

                    },
                    success: function(response) {
                        // console.log(response);
                        if (response.success) {
                            if (response.results.length > 0) {
                                var results = response.results;
                                appendProperties(results);
                            }
                        } else {
                            console.log('property not found');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Errror", error);
                    }
                });
            });


            function appendProperties(results) {
                propertiesContainer = $('#all-property-container');
                propertiesContainer.empty();

                results.forEach(function(result) {

                    function formatRent(rent) {
                        if (!isNaN(rent) && rent !== '') {
                            if (rent >= 10000000) {
                                return (rent / 10000000).toFixed(2) + ' Cr';
                            } else if (rent >= 100000) {
                                return (rent / 100000).toFixed(2) + ' Lac';
                            } else if (rent >= 1000) {
                                return (rent / 1000).toFixed(2) + 'k';
                            } else {
                                return rent.toLocaleString('en-IN', {
                                    style: 'currency',
                                    currency: 'INR'
                                });
                            }
                        } else {
                            return '';
                        }
                    }

                    function formatPropertyName(propertyName) {
                        if (propertyName && typeof propertyName === 'string') {
                            propertyName = propertyName.charAt(0).toUpperCase() + propertyName.slice(1);
                            var words = propertyName.split(' ');
                            if (words.length > 5) {
                                words = words.slice(0, 5);
                            }
                            return words.join(' ');
                        } else {
                            return '';
                        }
                    }

                    function capitalizeFirstLetter(text) {
                        if (text && typeof text === 'string') {
                            return text.split(' ').map(function(word) {
                                return word.charAt(0).toUpperCase() + word.slice(1);
                            }).join(' ');
                        } else {
                            return '';
                        }
                    }


                    function truncateText(text, wordsCount) {
                        var words = text.split(' ');

                        if (words.length > wordsCount) {
                            words = words.slice(0, wordsCount);
                        }

                        return words.join(' ');
                    }
                    if (result.looking_to === 'rent' || result.looking_to === 'pg') {
                        var formattedRent = formatRent(result.rent);
                    } else {
                        var formattedCost = formatRent(result.cost);
                    }

                    var formattedName = formatPropertyName(result.property_name);
                    var pgName = formatPropertyName(result.pg_name);
                    project_society = truncateText(capitalizeFirstLetter(result.project_society), 4);
                    locality = truncateText(capitalizeFirstLetter(result.locality), 4);
                    city = capitalizeFirstLetter(result.city);
                    var imagePath = "{{ asset('public/assets/property-images/') }}";
                    if (result.categories_type === 'apartment' || result.categories_type === 'independent floor' || result.categories_type === 'independent house') {
                        var residentiolFeatures = '<span class="flaticon-bed"></span> ' + result.total_property + '';
                        residentiolFeatures += '<span class="flaticon-shower"></span> ' + result.bath + ' bath';
                        residentiolFeatures += '<span class="flaticon-expand"></span> ' + result.built_up_area + ' sqft';
                    } else if (result.categories_type === 'office') {
                        var officeFeatures = '<span class="flaticon-bed"></span> ' + result.max_seats + '';
                        officeFeatures += '<span class="flaticon-shower"></span> ' + result.meeting_room + '';
                        officeFeatures += '<span class="flaticon-expand"></span> ' + result.built_up_area + ' sqft';
                    } else if (result.categories_type === 'retail shop' || result.categories_type === 'showroom' || result.categories_type === 'warehouse') {
                        var commericalFeatures = '<span class="flaticon-bed"></span> ' + result.staircase + '';
                        commericalFeatures += '<span class="flaticon-shower"></span> ' + result.your_floor + '';
                        commericalFeatures += '<span class="flaticon-expand"></span> ' + result.built_up_area + ' sqft';
                    } else if (result.looking_to === 'pg') {
                        var payingFeature = '<span class="flaticon-bed"></span> ' + result.total_property + '';
                        payingFeature += '<span class="flaticon-shower"></span> ' + result.suited_for + '';
                        payingFeature += '<span class="flaticon-expand"></span> ' + result.room_type + '';
                    }
                    var propertyHtml = '<div class="col-sm-6 col-lg-4">';
                    propertyHtml += '<div class="listing-style1">';
                    propertyHtml += '<div class="list-thumb">';
                    var images = result.images.split(',');
                    propertyHtml += '<img class="w-100" src="' + imagePath + '/' + images[0] + '" alt="">';
                    propertyHtml += '<div class="list-tag fz12"><span class="flaticon-electricity me-2"></span>FEATURED</div>';
                    propertyHtml += '<div class="list-price"> ₹ ' + (formattedRent ? formattedRent : formattedCost) + ' </div>';
                    propertyHtml += '</div>';
                    propertyHtml += '<div class="list-content">';
                    propertyHtml += '<h6 class="list-title"><a href="#"> ' + (formattedName ? formattedName : pgName) + '</a></h6>';
                    propertyHtml += '<p class="list-text">' + project_society + ', ' + locality + ', ' + city + '</p>';
                    propertyHtml += '<div class="list-meta d-flex align-items-center">';

                    if (result.categories_type === 'apartment' || result.categories_type === 'independent floor' || result.categories_type === 'independent house') {
                        propertyHtml += residentiolFeatures;
                    } else if (result.categories_type === 'office') {
                        propertyHtml += officeFeatures;
                    } else if (result.categories_type === 'retail shop' || result.categories_type === 'showroom' || result.categories_type === 'warehouse') {
                        propertyHtml += commericalFeatures;
                    } else if (result.looking_to === 'pg') {
                        propertyHtml += payingFeature;
                    }
                    propertyHtml += '</div>';
                    propertyHtml += '<hr class="mt-2 mb-2">';
                    propertyHtml += '<div class="list-meta2 d-flex justify-content-between align-items-center">';
                    propertyHtml += '<span class="for-what">For ' + result.looking_to + ' </span>';
                    propertyHtml += '</div>';
                    propertyHtml += '</div>';
                    propertyHtml += '</div>';
                    propertyHtml += '</div>';
                    propertiesContainer.append(propertyHtml);
                    $('#pagination-container').addClass('d-none');
                    if (result.categories_type === 'apartment') {
                        $('#pageTitle').text('Available Properties In Apartment Your Ideal Apartment Awaits');
                    } else if (result.categories_type === 'independent floor') {
                        $('#pageTitle').text('Available Properties In Independent Floor Your Ideal Independent Floor Awaits');
                    } else if (result.categories_type === 'independent house') {
                        $('#pageTitle').text('Available Properties In Independent House Your Ideal Independent House Awaits');
                    } else if (result.categories_type === 'office') {
                        $('#pageTitle').text('Available Properties In Office Your Ideal Office Awaits');
                    } else if (result.categories_type === 'retail shop') {
                        $('#pageTitle').text('Available Properties In Shop Your Ideal Shop Awaits');
                    } else if (result.categories_type === 'showroom') {
                        $('#pageTitle').text('Available Properties In Showroom Your Ideal Showroom Awaits');
                    } else if (result.categories_type === 'warehouse') {
                        $('#pageTitle').text('Available Properties In Warehouse Your Ideal Warehouse Awaits');
                    } else if (result.looking_to === 'pg') {
                        $('#pageTitle').text('Available Paying Guest Accommodations | Find Your Ideal PG');
                    } else if (result.categories_type === 'plot') {
                        $('#pageTitle').text('Plot Listings | Find the Perfect Plot for Your Next Project');
                    }
                });
            }
        });
    </script>



    @endsection