@extends('gharkasapna.layouts.app')
@section('content')

@php

function formatRent($rent)
{
if (!is_numeric($rent)) {
return 'N/A';
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
return 'N/A';
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
<style>
    .no-properties-found {
        text-align: center;
        margin-top: 50px;
    }

    .no-properties-found h1 {
        font-size: 24px;
        color: #000;
        font-weight: bold;
    }

    .radio-element .form-check-input:checked {

        background-color: #181a20;
    }

    .enter-price-min {
        color: #eb6753;
        font-size: 17px;
        font-family: fangsong;
    }

    .enter-price-max {
        color: #eb6753;
        font-size: 17px;
        font-family: fangsong;
    }
</style>
<div class="body_content">
    <!-- Breadcumb Sections -->
    <section class="breadcumb-section bgc-f7">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb-style1">
                        <h2 class="title" id="property-title">{{$pageTitle}}</h2>
                        <div class="breadcumb-list">
                            <!-- <a href="">Home</a>
                            <a href="">For Rent</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Property All Lists -->
    @if(!empty($propertiesData) && count($propertiesData) > 0)
    <section class="pt0 pb90 bgc-f7">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 d-none d-lg-block">
                    <div class="dropdown-lists">
                        <ul class="p-0 text-center text-xl-start">
                            <li class="list-inline-item position-relative">
                                <button type="button" class="open-btn mb15 dropdown-toggle" id="listing-tag" data-bs-toggle="dropdown">For Sale <i class="fa fa-angle-down ms-2"></i></button>
                                <div class="dropdown-menu">
                                    <div class="widget-wrapper bdrb1 pb25 mb0 pl20">
                                        <h6 class="list-title">Listing Status</h6>
                                        <div class="radio-element">
                                            <div class="form-check d-flex align-items-center mb10">
                                                <input class="form-check-input" type="radio" id="radio-buy" value="buy" checked="checked">
                                                <label class="form-check-label" for="radio-buy">Buy</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center mb10">
                                                <input class="form-check-input" type="radio" value="rent" id="radio-rent">
                                                <label class="form-check-label" for="radio-rent">Rent</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="list-inline-item position-relative">
                                <button type="button" class="open-btn mb15 dropdown-toggle" data-bs-toggle="dropdown">Property Type <i class="fa fa-angle-down ms-2"></i></button>
                                <div class="dropdown-menu">
                                    <div class="widget-wrapper bdrb1 pb25 mb0 pl20">
                                        <h6 class="list-title">Property Type</h6>
                                        @php $segment = request()->segment(2) @endphp
                                        <div class="checkbox-style1">
                                            <label class="custom_checkbox">Independent House
                                                <input type="checkbox" name="categories_type[]" value="independent house" {{ $segment === 'independent-house' ? 'checked' : '' }}>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom_checkbox">Apartments
                                                <input type="checkbox" name="categories_type[]" value="apartment" {{ $segment === 'apartment' ? 'checked' : '' }}>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom_checkbox">Office
                                                <input type="checkbox" name="categories_type[]" value="office" {{ $segment === 'office' ? 'checked' : '' }}>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom_checkbox">Plot
                                                <input type="checkbox" name="categories_type[]" value="plot" {{ $segment === 'residential-plot' || $segment === 'commercial-plot' ? 'checked' : ''  }}>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="custom_checkbox">Retail Shop
                                                <input type="checkbox" name="categories_type[]" value="retail shop" {{ $segment === 'retail-shop' ? 'checked' : '' }}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="list-inline-item position-relative">
                                <button type="button" class="open-btn mb15 dropdown-toggle" data-bs-toggle="dropdown">Price <i class="fa fa-angle-down ms-2"></i></button>
                                <div class="dropdown-menu dd3">
                                    <div class="widget-wrapper bdrb1 pb25 mb0 pl20 pr20">
                                        <h6 class="list-title">Price Range</h6>
                                        <div class="range-slider-style1">
                                            <div class="range-wrapper" style="text-align: center;">
                                                <!-- <div class="slider-range mt30 mb20"></div> -->

                                                <span id="max-price-error" class="enter-price-min"></span>
                                                <span id="min-price-error" class="enter-price-max"></span>
                                                <div class="text-center">
                                                    <input type="text" id="min-price" class="amount" placeholder="min price">
                                                    <input type="text" id="max-price" class="amount2" placeholder="max price">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="page_control_shorting mb30 d-flex align-items-center justify-content-center justify-content-xl-end">
                        <!-- <div class="pcs_dropdown pr10"><span>Sort by</span>
                            <select class="selectpicker show-tick">
                                <option>Newest</option>
                                <option>Best Seller</option>
                                <option>Best Match</option>
                                <option>Price Low</option>
                                <option>Price High</option>
                            </select>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="row properties-container">

                @foreach($propertiesData as $property)

                @php $image = explode(',', $property->images); @endphp

                <div class="col-sm-6 col-lg-4">
                    <div class="listing-style1">
                        <div class="list-thumb" style="height: 300px;">

                            @foreach($image as $img)
                            <img class="w-100" src="{{ asset('public/assets/property-images/' . $img) }}" alt="">
                            @break
                            @endforeach
                            <div class="list-tag fz12"><span class="flaticon-electricity me-2"></span>FEATURED</div>

                            @if($property->looking_to == 'rent')
                            <div class="list-price">{{formatRent($property->rent)}} / <span>mo</span></div>
                            @else
                            <div class="list-price">{{formatCost($property->cost)}}</div>
                            @endif
                        </div>
                        <?php


                        $checkLooking_to = $property->looking_to;
                        $segment = request()->segment(2);

                        if($segment == 'residential-plot') {

                        $setroute = route('single.listing.plot', ['name' => Str::slug($property->property_name)]);

                        } elseif($segment == 'commercial-plot' || $segment == 'office' || $segment == 'retail-shop' || $segment == 'warehouse' || $segment == 'showroom') {
                        $setroute = route('single.listing.commerical', ['name' => Str::slug($property->property_name)]);
                        } else{

                        if($checkLooking_to == 'sell'){
                        $setroute = route('single.listing', ['name' => Str::slug($property->property_name)]);
                        } elseif($checkLooking_to == 'rent') {
                        $setroute = route('single.listing.rent', ['name' => Str::slug($property->property_name)]);
                        }
                        }


                        ?>

                        <div class="list-content">
                            <h6 class="list-title"><a href="{{ $setroute }}" target="_blank">{{$property->property_name}}</a></h6>
                            <p class="list-text">{{ ucwords($property['project_society']) }}, {{ ucwords($property['locality']) }}, {{ ucwords($property['city']) }}</p>
                            <div class="list-meta d-flex align-items-center">
                            </div>
                            <hr class="mt-2 mb-2">
                            <div class="list-meta2 d-flex justify-content-between align-items-center">
                                <span class="for-what">For {{ucwords($property->looking_to)}}</span>

                            </div>
                        </div>

                    </div>
                </div>
                @endforeach

            </div>
            <div class="row">
                <div class="mbp_pagination text-center">
                    <ul class="page_navigation">
                        {{ $propertiesData->links() }}
                    </ul>
                    <p class="mt10 pagination_page_count text-center">{{ $propertiesData->firstItem() }} - {{ $propertiesData->lastItem() }} of {{ $propertiesData->total() }} Property Available</p>
                </div>
            </div>
        </div>
    </section>
    @else
    <div class="no-properties-found">
        <h1>Properties Not Found</h1>
    </div>

    @endif

    @endsection

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#radio-buy').click(function() {
                $('#radio-rent').prop('checked', false);

            });

            $('#radio-rent').click(function() {
                $('#radio-buy').prop('checked', false);
            })
        });
    </script>

    <script>
        $(document).ready(function() {
            var segment = "{{ request()->segment(1) }}";
            var selectedValue = null;
            var secondSegment = "{{ request()->segment(2) }}";
            var decodeSegment = decodeURIComponent(secondSegment);
            var updatesegment = decodeSegment.replace(/-/g, ' ').replace(/,/g, '');

            $('input[type="radio"]').change(function() {
                selectedValue = $(this).val();
                logValues();
            });



            var minPrice, maxPrice;

            $('input[type="text"]').change(function() {
                validateAndLogValues();
                // console.log("Inside change event:", minPrice, maxPrice);

            });


            function validateAndLogValues() {
                minPrice = $('#min-price').val();
                maxPrice = $('#max-price').val();

                if (!(/^\d+$/.test(minPrice))) {
                    $('#min-price-error').text('Should be a valid number').show();
                    return;
                } else if (parseInt(minPrice) < 5000) {
                    $('#min-price-error').text('Should be at least 5000').show();
                    return;
                } else {
                    $('#min-price-error').hide('');
                }
                if (!(/^\d+$/.test(maxPrice))) {
                    $('#max-price-error').text('Should be a valid number').show();
                    return;
                } else if (parseInt(maxPrice) > 20000000) {
                    $('#max-price-error').text('Should not exceed 20,000,000').show();
                    return;
                } else {
                    $('#max-price-error').text('');
                }

                logValues();
            }


            var checkboxes = document.querySelectorAll('input[type="checkbox"][name="categories_type[]"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    logValues();
                });
            });

            function logValues() {
                var checkedValue = [];

                checkboxes.forEach(function(cb) {
                    if (cb.checked) {
                        checkedValue.push(cb.value);
                    }
                });

                //console.log("Outside function:", minPrice, maxPrice);
                // console.log('checkedValue', checkedValue);
                // console.log('selectedValue', selectedValue)

                var title;
                var listingTag;


                if (selectedValue === 'buy') {
                    title = 'Explore ' + (checkedValue.length > 0 ? checkedValue.join(', ') : '') + ' Properties';
                    listingTag = "For Sale";

                } else if (selectedValue === 'rent') {
                    title = 'Explore ' + (checkedValue.length > 0 ? checkedValue.join(', ') + ' in ' : '') + 'Rental Properties';
                    listingTag = "For Rent";
                }

                $('#property-title').text(title);
                $('#listing-tag').text(listingTag);



                $.ajax({

                    url: "{{route('cat.search.filter')}}",
                    method: "POST",
                    data: {

                        categories_type: checkedValue,
                        selectedValue: selectedValue,
                        minPrice: minPrice,
                        maxPrice: maxPrice,
                        "_token": "{{csrf_token()}}",
                    },

                    success: function(response) {
                        //console.log(response);

                        if (response.status === 'success') {

                            if (response.results.length > 0) {

                                appendProperties(response.results);

                            } else {
                                var propertiesContainer = $('.properties-container');
                                propertiesContainer.empty();
                                var propertyHtml = '<div class="no-properties-found">';
                                propertyHtml += '<h1>Properties Not Found</h1>';
                                propertyHtml += '</div>';
                                propertiesContainer.append(propertyHtml);



                            }

                        }

                    },
                    error: function(xhr, status, error) {
                        console.log("Ajax Error", error);
                    }
                });

            }


            function appendProperties(propertiesData) {

                console.log(propertiesData);
                var propertiesContainer = $('.properties-container');
                propertiesContainer.empty();

                propertiesData.forEach(function(property) {

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

                    function formatCost(cost) {

                        if (!isNaN(cost) && cost !== '') {
                            if (cost >= 10000000) {
                                return (cost / 10000000).toFixed(2) + ' Cr';
                            } else if (cost >= 100000) {
                                return (cost / 100000).toFixed(2) + ' Lac';
                            } else if (cost >= 1000) {
                                return (cost / 1000).toFixed(2) + 'k';
                            } else {
                                return cost.toLocaleString('en-IN', {
                                    style: 'currency',
                                    currency: 'INR'
                                });
                            }
                        } else {
                            return '';
                        }


                    }

                    function capitalizeFirstLetter(string) {
                        return string.replace(/\b\w/g, function(match) {
                            return match.toUpperCase();
                        });
                    }

                    project_society = capitalizeFirstLetter(property.project_society);
                    locality = capitalizeFirstLetter(property.locality);
                    city = capitalizeFirstLetter(property.city);

                    if (property.looking_to === 'rent') {
                    var formattedRent = formatRent(property.rent);
                    } else {
                        var formattedCost = formatCost(property.cost);
                    }


                    if (property.categories_type == 'plot' || property.categories_type == 'office' || property.categories_type == 'retail shop') {

                        var propertyName = property.property_name.toLowerCase();
                        var encodedPropertyName = encodeURIComponent(propertyName).replace(/%20/g, '-');
                        var propertyRoute = "{{ route('single.listing.commerical', ['name' => ':name']) }}".replace(':name', encodedPropertyName);

                    } else {
                        if (property.looking_to === 'rent') {
                            var propertyName = property.property_name.toLowerCase();
                            var encodedPropertyName = encodeURIComponent(propertyName).replace(/%20/g, '-');
                            var propertyRoute = "{{ route('single.listing.rent', ['name' => ':name']) }}".replace(':name', encodedPropertyName);
                        } else {
                            
                            var propertyName = property.property_name.toLowerCase();
                            var encodedPropertyName = encodeURIComponent(propertyName).replace(/%20/g, '-');
                            var propertyRoute = "{{ route('single.listing', ['name' => ':name']) }}".replace(':name', encodedPropertyName);

                        }
                    }

                    var propertyHtml = '<div class="col-sm-6 col-lg-4">';
                    propertyHtml += '<div class="listing-style1">';
                    propertyHtml += '<div class="list-thumb" style="height: 300px;">';
                    var images = property.images.split(',');
                    propertyHtml += '<img class="w-100" src="{{ asset('public/assets/property-images/')}}/' + images[0] + '" alt="">';
                    propertyHtml += '<div class="list-tag fz12"><span class="flaticon-electricity me-2"></span>FEATURED</div>';
                    propertyHtml += '<div class="list-price">₹' + (formattedRent ? formattedRent : formattedCost) + '</div>';
                    propertyHtml += '</div>';
                    propertyHtml += '<div class="list-content">';
                    propertyHtml += '<h6 class="list-title"><a href="' + propertyRoute + '" target="_blanck">' + property.property_name + '</a></h6>';
                    propertyHtml += '<p class="list-text">' + project_society + ', ' + locality + ', ' + city + '</p>';
                    propertyHtml += '<div class="list-meta d-flex align-items-center"></div>';
                    propertyHtml += '<hr class="mt-2 mb-2">';
                    propertyHtml += '<div class="list-meta2 d-flex justify-content-between align-items-center">';
                    propertyHtml += '<span class="for-what">For ' + property.looking_to + '</span>';
                    propertyHtml += '<div class="icons d-flex align-items-center"></div>';
                    propertyHtml += '</div>';
                    propertyHtml += '</div>';
                    propertyHtml += '</div>';
                    propertyHtml += '</div>';
                    propertiesContainer.append(propertyHtml);
                    $('.paginate-container').addClass('d-none');


                });
            }



        });
    </script>