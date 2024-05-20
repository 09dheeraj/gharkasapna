@extends('gharkasapna.layouts.app')

@section('content')

<?php
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

?>

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

    select#search-address-results {
        padding: 8px;
        width: 100%;
        border-radius: 6px;
    }


    #search-address-results option {
        padding: 8px;
    }
</style>

<section class="home-banner-style4 p0 bgc-white">
    <div class="home-style4 maxw1600 bdrs24 position-relative mx-auto">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="inner-banner-style4">
                        <h1 class="hero-title animate-up-1">Find the <span class="text-color-orange">perfect place </span> to <br class="d-none d-md-block"> Live with your family</h1>
                        <p class="hero-text fz16 animate-up-2 pb10">lets find the perfect place for you </p>
                        <div class=" custom tab">
                            <div class="advance-style3 mb30 mx-auto animate-up-2">
                                <ul class="nav nav-tabs p-0 m-0" id="myTab" role="tablist">
                                    <li class="nav-item text-color-light-grey-font" role="presentation">
                                        <a class="nav-link active" href="{{route('new.index')}}">Buy</a>
                                    </li>
                                    <li class="nav-item text-color-light-grey-font" role="presentation">
                                        <a class="nav-link" href="{{route('newrent.properties')}}">Rent</a>
                                    </li>
                                    <!--  -->
                                    <li class="nav-item text-color-light-grey-font" role="presentation">
                                        <a class="nav-link" href="{{ route('new.paying.guests') }}">PG/Co living</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link  text-color-light-grey-font" href="{{route('commercial')}}">Commercial</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link  text-color-light-grey-font" href="{{route('plot.index')}}">Plot</a>
                                    </li>

                                </ul>

                                @php
                                $url = request()->segment(1);

                                $searchString = 'real-estate-';
                                $position = strpos($url, $searchString) + strlen($searchString);
                                $city = substr($url, $position);
                                @endphp
                                <span id="error-city" class="text-danger"></span>
                                <div class="tab-content custom-inline-box" id="myTabContent">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-2" id="citySelectContainer">
                                                <div class="input-group custom-city-dropdown">
                                                    <select name="city_name" class="custom-select" id="citySelect" form="property-form">
                                                        @if(empty($city))
                                                        <option selected disabled>Select city</option>
                                                        @else
                                                        <option selected disabled>{{ ucwords($city) }}</option>
                                                        @endif
                                                        @foreach ($cities->pluck('city')->unique() as $data)
                                                        <option value="{{ $data }}">{{ ucfirst($data) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-8" id="searchAddressContainer">
                                                <div class="search-input">
                                                    <input type="text" id="search-address" name="search_address" class="main_search_property" placeholder="Search for locality, landmark, project, or builder">
                                                    <!-- <select id="search-address-results"></select> -->
                                                    <select id="search-address-results" style='appearance: none' class="d-none">
                                                        <option disabled selected hidden>Select an option</option>
                                                       
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- <div class="col-md-2">
                                                <div class="d-flex align-items-center justify-content-start justify-content-md-center mt-2 mt-md-0">
                                                    <button class="advance-search-icon ud-btn btn-dark ms-2" id="search-button" type="button"><span class="flaticon-search"></span></button>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="advance-search-tab mt30 mt30-lg animate-up-3">
                            <p class="hero-text fz14 animate-up-2 ">Or browse featured categories: </p>
                            <div class="home4-icon-style mt30 d-none d-sm-flex animate-up-4">

                                <a href="{{route('list', ['cat' => Str::slug('independent house')])}}" class="d-flex align-items-center text-color-white ff-heading me-4" target="_blank"><i class="icon mr10 flaticon-home-1 text-color-orange"></i> Houses</a>
                                <a href="{{route('list', ['cat' => Str::slug('apartment')])}}" class="d-flex align-items-center text-color-white ff-heading me-4" target="_blank"><i class="icon mr10 flaticon-corporation text-color-orange"></i> Apartments</a>
                                <a href="{{route('list', ['cat' => Str::slug('office')])}}" class="d-flex align-items-center text-color-white ff-heading" target="_blank"><i class="icon mr10 flaticon-garden text-color-orange"></i> Office</a>
                                <a href="{{route('list', ['cat' => Str::slug('retail shop')])}}" class="d-flex align-items-center text-color-white ff-heading" target="_blank"><i class="icon mr10 flaticon-garden text-color-orange"></i> Shops</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- Property Categories -->
<section class="pt80 pb80 bgc-white property-categories">
    <div class="container">
        <div class="row wow fadeInUp" data-wow-delay="100ms">
            <div class="col-lg-9">
                <div class="main-title2">
                    <h2 class="title">Get started with exploring real estate options</h2>
                    <p class="paragraph">Get some Inspirations from 1800+ skills</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="text-start text-lg-end mb-3">
                    <!-- <a class="ud-btn2" href="page-property-single-v1.html">See All Categories</a> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="300ms">
                <div class="property-city-slider style2 dots_none slider-dib-sm slider-6-grid vam_nav_style owl-theme owl-carousel">
                    <div class="item">
                        <a href="{{ route('all.listing') }}">
                            <div class="feature-style3  text-center">
                                <div class="feature-img rounded-circle"><img class="w-100" src="{{asset('public/assets/images/listings/sec-2.jpg')}}" alt=""></div>
                                <div class="feature-content">
                                    <h6 class="title pt20">Buying a home</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="{{ route('all.listing.rent') }}">
                            <div class="feature-style3  text-center">
                                <div class="feature-img rounded-circle"><img class="w-100" src="{{asset('public/assets/images/listings/rent-a-home.jpg')}}" alt=""></div>
                                <div class="feature-content">
                                    <h6 class="title pt20">Renting a home</h6>

                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- <div class="item">
                        <a href="page-property-single-v1.html">
                            <div class="feature-style3  text-center">
                                <div class="feature-img rounded-circle"><img class="w-100" src="{{asset('public/assets/images/listings/lease.jpg')}}" alt=""></div>
                                <div class="feature-content">
                                    <h6 class="title pt20">Lease Properties</h6>

                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="page-property-single-v1.html">
                            <div class="feature-style3  text-center">
                                <div class="feature-img rounded-circle"><img class="w-100" src="{{asset('public/assets/images/listings/sell.jpg')}}" alt=""></div>
                                <div class="feature-content">
                                    <h6 class="title pt20">Sell property</h6>

                                </div>
                            </div>
                        </a>
                    </div> -->
                    <div class="item">
                        <a href="{{route('plot.listing')}}">
                            <div class="feature-style3  text-center">
                                <div class="feature-img rounded-circle"><img class="w-100" src="{{asset('public/assets/images/listings/plot.jpg')}}" alt=""></div>
                                <div class="feature-content">
                                    <h6 class="title pt20">Plot land</h6>

                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="{{route('manage.pg.listing', ['name' => Str::slug('paying-guests')])}}">
                            <div class="feature-style3  text-center">
                                <div class="feature-img rounded-circle"><img class="w-100" src="{{asset('public/assets/images/listings/pg.jpg')}}" alt=""></div>
                                <div class="feature-content">
                                    <h6 class="title pt20">PG and Co/living</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Us -->
<section class="pt0 pb40-md about-us-section">
    <div class="cta-banner  bgc-f7 mx-auto maxw1600 pt70  position-relative ">
        <div class="container">
            <div class="row align-items-start align-items-xl-center">
                <?php foreach ($randomcityDATA as $data) : ?>
                    <?php $image = explode(',', $data->images); ?>


                    <div class="col-md-10 col-lg-7 col-xl-6">
                        <div class="position-relative wow fadeInRight" data-wow-delay="300ms">
                            <div class="img-box-7">
                                @foreach($image as $img)
                                <img class="w-100" src="{{ asset('public/assets/property-images/' . $img) }}" alt="" style="height: 515px !important;">
                                @break
                                @endforeach
                            </div>
                            <div class="img-box-8 position-relative">
                                <img class="img-1 spin-right" src="{{asset('public/assets/images/about/element-1.png')}}" alt="">
                            </div>
                            <div class="img-box-10 position-relative">
                                <div class="listing-style1 mini-style bounce-y">
                                    <div class="list-content">
                                        <h6 class="list-title"><a href="{{ route('single.listing', ['name' => Str::slug($data->property_name)])}}">{{ ucfirst(implode(' ', array_slice(explode(' ', $data->property_name), 0, 7))) }}</a></h6>
                                        <p class="list-text">{{ ucwords(implode(', ', array_slice(explode(', ', $data['project_society']), 0, 2))) }}, {{ ucwords(implode(', ', array_slice(explode(', ', $data['locality']), 0, 2))) }}, {{ ucwords(implode(', ', array_slice(explode(', ', $data['city']), 0, 2))) }}</p>

                                        <a href="{{ route('single.listing', ['name' => Str::slug($data->property_name)])}}" class="btn mt15 fz15">View House<i class="fal fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @break
                <?php endforeach; ?>
                <div class="col-md-12 col-lg-5 col-xl-5 offset-xl-1">
                    <div class="about-box-1 wow fadeInLeft" data-wow-delay="300ms">
                        <h2 class="title mb20">Find Better Places to Live, Work and Wonder...</h2>
                        <p class="text mb55 mb30-md fz14">Discover your dream home with our comprehensive real estate listings. Browse through a diverse range of properties available for purchase, tailored to suit your preferences and budget. From cozy apartments to spacious family homes, find the perfect place to call your own on our user-friendly platform. Start your search today!</p>
                        <p class="text mb55 mb30-md fz14">Explore a vast selection of homes for sale on our intuitive real estate website. Find your ideal property, whether it's a modern apartment or a charming family house, and make it yours effortlessly.</p>

                        <a href="#" class="ud-btn btn-dark">See More<i class="fal fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>



            <!-- Listing property -->
            <div class="row pt70 pb70">
                <div class="row wow fadeInUp" data-wow-delay="100ms">
                    <div class="col-lg-9">
                        <div class="main-title2">
                            <h2 class="title">{{ $propertyTitle }}</h2>
                            <p class="paragraph">Aliquam lacinia diam quis lacus euismod</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="text-start text-lg-end mb-3">
                            @if($city == null)
                            <a class="ud-btn2" target="_blank" href="{{ route('all.listing') }}">See All Properties</a>
                            @else
                            <a class="ud-btn2" target="_blank" href="{{ url('all-properties-buy',['city' => Str::slug($city)]) }}">See All Properties</a>
                            @endif
                        </div>
                    </div>
                </div>

                @if(!empty($randomcityDATA) && count($randomcityDATA) > 0)
                @foreach($randomcityDATA as $property)

                <?php $image = explode(',', $property->images); ?>

                <div class="col-sm-6 col-lg-3">
                    <div class="listing-style5">
                        <div class="list-thumb">

                            @foreach($image as $img)
                            <img class="w-100" src="{{ asset('public/assets/property-images/' . $img) }}" alt="" style="height: 250px">
                            @break
                            @endforeach


                            <div class="list-tag fz12"><span class="flaticon-electricity me-2"></span>FEATURED</div>
                            <!-- <div class="list-meta2">
                                <a href=""><span class="flaticon-like"></span></a>
                                <a href=""><span class="flaticon-new-tab"></span></a>
                                <a href=""><span class="flaticon-fullscreen"></span></a>
                            </div> -->
                        </div>
                        <div class="list-content">

                            <?php if ($property->looking_to == 'rent') {  ?>
                                <div class="list-price mb-2"><?php echo formatRent($property->rent); ?>/<span>mo</span></div>
                            <?php } else { ?>
                                <div class="list-price mb-2"><?php echo formatCost($property->cost); ?></div>
                            <?php } ?>

                            <h6 class="list-title"><a class="text-color-black" target="_blank" href="{{ route('single.listing', ['name' => Str::slug($property->property_name)])}}">{{ ucwords($property->property_name) }}</a></h6>
                            <p class="list-text">{{ ucwords($property['project_society']) }}, {{ ucwords($property['locality']) }}, {{ ucwords($property['city']) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach

                @else
                <div class="no-properties-found">
                    <h1>Properties Not Found</h1>
                </div>
                @endif
            </div>
        </div>

    </div>
</section>



<!-- Property By Area -->

<section class="bgc-f pt0 pb90 pt60-md pb60-md">

    <div class="container">
        <div class="row wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
            <div class="col-lg-3"> </div>
            <div class="col-lg-6">
                <div class="main-title2 text-center">
                    <h2 class="title">Properties by Area</h2>
                    <p class="paragraph text-color-dark-black pt20">Highlight the best of your properties by using the List Category shortcode. You can list categories, types, cities, areas and states of your choice.</p>
                </div>
            </div>
        </div>
        <div class="row property-by-area">
            <div class="col-lg-1 col-xl-1"></div>
            <div class="col-lg-5 col-xl-5 me-3 wow fadeInLeft property-bg-one" style="visibility: visible; animation-name: fadeInLeft; --background-url: url('{{ asset('public/assets/images/home-prop.png') }}')">
                <div class="cta-style3 p40">
                    <h2 class="cta-title text-color-white">Become a Real Estate Agent</h2>
                    <p class="mb25 text-color-white">Explore from Office Spaces, Co-working spaces,
                        Retail Shops, Land, Factories and more</p>
                    <a href="#" class="ud-btn btn-dark">Explore Leasing Commercial</a>
                </div>
            </div>
            <div class="col-lg-5 col-xl-5 me-3 wow fadeInLeft property-bg-two" style="visibility: visible; animation-name: fadeInLeft; --background-url: url('{{ asset('public/assets/images/home-prop2.png') }}')">
                <div class="cta-style3 p40">
                    <h2 class="cta-title text-color-white">Become a Real Estate Agent</h2>
                    <p class="mb25 text-color-white">Explore from Office Spaces, Co-working spaces,
                        Retail Shops, Land, Factories and more</p>
                    <a href="#" class="ud-btn btn-dark">Explore Leasing Commercial </a>
                </div>
            </div>
            <div class="col-lg-1 col-xl-1"></div>
        </div>
    </div>
</section>

<!-- CTA Banner -->
<section class="pt30 pb-0">
    <div class="my-bg-custom bgc-f7 mx-auto maxw1600 pt100 pt60-lg pb90 pb60-lg bdrs24 position-relative overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6 pl15-xs wow fadeInRight" data-wow-delay="500ms">
                    <div class="mb30">
                        <h2 class="title text-capitalize">Let’s find the right <br class="d-none"> selling option for you</h2>
                    </div>
                    <div class="why-chose-list style2">
                        <div class="list-one d-flex align-items-start mb30">
                            <div class="list-content flex-grow-1 m0">
                                <p class="text mb-0 fz15">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                <br class="d-none d-md-block">
                                <p class="text mb-0 fz15">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                        </div>

                    </div>
                    <a href="#" class="ud-btn btn-dark">See More</a>
                </div>
                <div class="col-md-12 col-lg-6 pl30-md pl15-xs">
                    <img class="w-100" src="{{asset('public/assets/images/listings/selling option.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="p0 pb40-md">
    <div class="cta-banner bgc-f7 mx-auto maxw1600 pb30-md  position-relative">
        <div class="container">
            <div class="row align-items-start align-items-xl-center">


            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="pt60 pb60 pb30-md backgound-testimonial">
    <div class="container" id="custom-color">
        <div class="row" id="custom-color">
            <div class="col-lg-6 wow fadeInUp pt10" data-wow-delay="100ms">
                <div class="main-title">
                    <h2 class="title text-color-white">Our housing Experts</h2>
                </div>
            </div>
        </div>


        <div class="row" id="custom-card">
            <div class="col-lg-12">
                <div class="testimonial-slider navi_pagi_top_right slider-3-grid owl-carousel owl-theme wow fadeInUp" data-wow-delay="300ms">
                    <div class="item">
                        <div class="testimonial-style1 position-relative bdr1">
                            <div class="testimonial-content">
                                <div class="custom-card card mb-3" style="max-width: 434px;">
                                    <div class="row g-0 ">
                                        <div class="col-md-3">
                                            <div class="housing-expert"> <img src="{{asset('public/assets/images/testimonials/testimonial-3.png')}}" class="img-fluid rounded-start" alt="..."></div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-body ps-3 p-0">
                                                <h5 class="text-color-housing">Folium By Sumadhura Pha</h5>
                                                <h6 class="text-color-housing1">Whitefield, Bangalore East</h6>
                                                <div class="d-flex">
                                                    <h5 class="text-color-housing2 bdrr1 pe-2">₹ 2.15 - 3.74 Cr</h5>
                                                    <h6 class="ps-2 title text-color-grey ft700 ">3, 4 BHK Apart…</h6>
                                                </div>
                                                <p class="text-color-housing3"><span class="housing-slider">13.6% </span>price increase in last 3 months</p>
                                            </div>
                                        </div>
                                        <div>
                                            <hr class="housing-line">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class=" text-color-light-blue">Get preferred options<br> @zero brokerage</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="#" class="housing-button ud-btn btn-dark">View Number</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-style1 position-relative bdr1">
                            <div class="testimonial-content">
                                <div class="custom-card card mb-3" style="max-width: 434px;">
                                    <div class="row g-0 ">
                                        <div class="col-md-3">
                                            <div class="housing-expert"> <img src="{{asset('public/assets/images/testimonials/testimonial-3.png')}}" class="img-fluid rounded-start" alt="..."></div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-body ps-3 p-0">
                                                <h5 class="text-color-housing">Folium By Sumadhura Pha</h5>
                                                <h6 class="text-color-housing1">Whitefield, Bangalore East</h6>
                                                <div class="d-flex">
                                                    <h5 class="text-color-housing2 bdrr1 pe-2">₹ 2.15 - 3.74 Cr</h5>
                                                    <h6 class="ps-2 title text-color-grey ft700 ">3, 4 BHK Apart…</h6>
                                                </div>
                                                <p class="text-color-housing3"><span class="housing-slider">13.6% </span>price increase in last 3 months</p>
                                            </div>
                                        </div>
                                        <div>
                                            <hr class="housing-line">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class=" text-color-light-blue">Get preferred options<br> @zero brokerage</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="#" class="housing-button ud-btn btn-dark">View Number</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-style1 position-relative bdr1">
                            <div class="testimonial-content">
                                <div class="custom-card card mb-3" style="max-width: 434px;">
                                    <div class="row g-0 ">
                                        <div class="col-md-3">
                                            <div class="housing-expert"> <img src="{{asset('public/assets/images/testimonials/testimonial-3.png')}}" class="img-fluid rounded-start" alt="..."></div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-body ps-3 p-0">
                                                <h5 class="text-color-housing">Folium By Sumadhura Pha</h5>
                                                <h6 class="text-color-housing1">Whitefield, Bangalore East</h6>
                                                <div class="d-flex">
                                                    <h5 class="text-color-housing2 bdrr1 pe-2">₹ 2.15 - 3.74 Cr</h5>
                                                    <h6 class="ps-2 title text-color-grey ft700 ">3, 4 BHK Apart…</h6>
                                                </div>
                                                <p class="text-color-housing3"><span class="housing-slider">13.6% </span>price increase in last 3 months</p>
                                            </div>
                                        </div>
                                        <div>
                                            <hr class="housing-line">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class=" text-color-light-blue">Get preferred options<br> @zero brokerage</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="#" class="housing-button ud-btn btn-dark">View Number</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-style1 position-relative bdr1">
                            <div class="testimonial-content">
                                <div class="custom-card card mb-3" style="max-width: 434px;">
                                    <div class="row g-0 ">
                                        <div class="col-md-3">
                                            <div class="housing-expert"> <img src="{{asset('public/assets/images/testimonials/testimonial-3.png')}}" class="img-fluid rounded-start" alt="..."></div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-body ps-3 p-0">
                                                <h5 class="text-color-housing">Folium By Sumadhura Pha</h5>
                                                <h6 class="text-color-housing1">Whitefield, Bangalore East</h6>
                                                <div class="d-flex">
                                                    <h5 class="text-color-housing2 bdrr1 pe-2">₹ 2.15 - 3.74 Cr</h5>
                                                    <h6 class="ps-2 title text-color-grey ft700 ">3, 4 BHK Apart…</h6>
                                                </div>
                                                <p class="text-color-housing3"><span class="housing-slider">13.6% </span>price increase in last 3 months</p>
                                            </div>
                                        </div>
                                        <div>
                                            <hr class="housing-line">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class=" text-color-light-blue">Get preferred options<br> @zero brokerage</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="#" class="housing-button ud-btn btn-dark">View Number</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimonial-style1 position-relative bdr1">
                            <div class="testimonial-content">
                                <div class="custom-card card mb-3" style="max-width: 434px;">
                                    <div class="row g-0 ">
                                        <div class="col-md-3">
                                            <div class="housing-expert"> <img src="{{asset('public/assets/images/testimonials/testimonial-3.png')}}" class="img-fluid rounded-start" alt="..."></div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-body ps-3 p-0">
                                                <h5 class="text-color-housing">Folium By Sumadhura Pha</h5>
                                                <h6 class="text-color-housing1">Whitefield, Bangalore East</h6>
                                                <div class="d-flex">
                                                    <h5 class="text-color-housing2 bdrr1 pe-2">₹ 2.15 - 3.74 Cr</h5>
                                                    <h6 class="ps-2 title text-color-grey ft700 ">3, 4 BHK Apart…</h6>
                                                </div>
                                                <p class="text-color-housing3"><span class="housing-slider">13.6% </span>price increase in last 3 months</p>
                                            </div>
                                        </div>
                                        <div>
                                            <hr class="housing-line">
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class=" text-color-light-blue">Get preferred options<br> @zero brokerage</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="#" class="housing-button ud-btn btn-dark">View Number</a>
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
</section>


@if(empty($city))
<section class="pb70 pb30-md">
    <div class="container">
        <div class="row align-items-md-center wow fadeInUp" data-wow-delay="00ms" style="visibility: visible; animation-delay: 0ms; animation-name: fadeInUp;">
            <div class="col-lg-9">
                <div class="main-title2">
                    <h2 class="title">Properties by Cities</h2>
                    <p class="paragraph">Aliquam lacinia diam quis lacus euismod</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="text-start text-lg-end mb-3">
                    <a class="ud-btn2" href="">See All Properties<i class="fal fa-arrow-right-long dark-color"></i></a>
                </div>
            </div>
        </div>
        <div class="row wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
            <div class="col-sm-6 col-lg-3">
                <div class="home9-city-style position-relative mb30 mb20-md mb0-sm d-flex align-items-center">
                    <div class="city-img flex-shrink-0"><img src="{{asset('public/assets/images/listings/delhi.png')}}" alt=""></div>
                    <div class="flex-shrink-1 ms-3">
                        <h6 class="mb-1">Delhi / NCR</h6>
                        <p class="mb-0">12 Properties</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="home9-city-style position-relative mb30 mb20-md mb0-sm d-flex align-items-center">
                    <div class="city-img flex-shrink-0"><img src="{{asset('public/assets/images/listings/bangore.png')}}" alt=""></div>
                    <div class="flex-shrink-1 ms-3">
                        <h6 class="mb-1">Bangalore</h6>
                        <p class="mb-0">12 Properties</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="home9-city-style position-relative mb30 mb20-md mb0-sm d-flex align-items-center">
                    <div class="city-img flex-shrink-0"><img src="{{asset('public/assets/images/listings/pune.png')}}" alt=""></div>
                    <div class="flex-shrink-1 ms-3">
                        <h6 class="mb-1">Pune</h6>
                        <p class="mb-0">12 Properties</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="home9-city-style position-relative mb30 mb20-md mb0-sm d-flex align-items-center">
                    <div class="city-img flex-shrink-0"><img src="{{asset('public/assets/images/listings/pune.png')}}" alt=""></div>
                    <div class="flex-shrink-1 ms-3">
                        <h6 class="mb-1">Kolkata</h6>
                        <p class="mb-0">12 Properties</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="home9-city-style position-relative mb30 mb20-md mb0-sm d-flex align-items-center">
                    <div class="city-img flex-shrink-0"><img src="{{asset('public/assets/images/listings/mumbai.png')}}" alt=""></div>
                    <div class="flex-shrink-1 ms-3">
                        <h6 class="mb-1">Mumbai</h6>
                        <p class="mb-0">12 Properties</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="home9-city-style position-relative mb30 mb20-md mb0-sm d-flex align-items-center">
                    <div class="city-img flex-shrink-0"><img src="{{asset('public/assets/images/listings/chandigarh.png')}}" alt=""></div>
                    <div class="flex-shrink-1 ms-3">
                        <h6 class="mb-1">Chennai</h6>
                        <p class="mb-0">12 Properties</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="home9-city-style position-relative mb30 mb20-md mb0-sm d-flex align-items-center">
                    <div class="city-img flex-shrink-0"><img src="{{asset('public/assets/images/listings/chandigarh.png')}}" alt=""></div>
                    <div class="flex-shrink-1 ms-3">
                        <h6 class="mb-1">Chandigarh</h6>
                        <p class="mb-0">12 Properties</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="home9-city-style position-relative mb30 mb20-md mb0-sm d-flex align-items-center">
                    <div class="city-img flex-shrink-0"><img src="{{asset('public/assets/images/listings/chandigarh.png')}}" alt=""></div>
                    <div class="flex-shrink-1 ms-3">
                        <h6 class="mb-1">Hyderabad</h6>
                        <p class="mb-0">12 Properties</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<section class="pt60 pb30 pb30-md">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 wow fadeInUp pt10" data-wow-delay="100ms">
                <div class="main-title">
                    <h2 class="title">People Love Living with Realton</h2>
                    <p class="paragraph text-color-dark-black pt20">Highlight the best of your properties by using the List Category shortcode. You can list categories, types, cities, areas and states of your choice.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonial-slider navi_pagi_top_right slider-3-grid owl-carousel owl-theme wow fadeInUp" data-wow-delay="300ms">
                    <div class="item">
                        <div class="testimonial-style1 position-relative bdr1">
                            <div class="testimonial-content">

                                <div class="thumb d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img class="wa" src="{{asset('public/assets/images/testimonials/testimonials-1.png')}}" alt="">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0 text-color-black">Leslie Alexander</h6>
                                        <p class="mb-0 text-color-light-grey">Nintendo</p>
                                    </div>
                                </div>
                                <span class="icon fas fa-quote-left"></span>

                                <p class="text text-color-white mt-4">The template is really nice and offers quite a large set of options. It’s beautiful and the coding is done quickly and seamlessly.<br>Thank you!</p>

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-style1 position-relative bdr1">
                            <div class="testimonial-content">

                                <div class="thumb d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img class="wa" src="{{asset('public/assets/images/testimonials/testimonials-1.png')}}" alt="">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0 text-color-black">Floyd Miles</h6>
                                        <p class="mb-0 text-color-light-grey">Bank of America</p>
                                    </div>
                                </div>
                                <span class="icon fas fa-quote-left"></span>
                                <p class="text text-color-white mt-4">The template is really nice and offers quite a large set of options. It’s beautiful and the coding is done quickly and seamlessly.<br>Thank you!</p>

                            </div>

                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-style1 position-relative bdr1">
                            <div class="testimonial-content">

                                <div class="thumb d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img class="wa" src="{{asset('public/assets/images/testimonials/testimonials-1.png')}}" alt="">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0 text-color-black">Dianne Russell</h6>
                                        <p class="mb-0 text-color-light-grey">Facebook</p>
                                    </div>
                                </div>
                                <span class="icon fas fa-quote-left"></span>
                                <p class="text text-color-white mt-4">The template is really nice and offers quite a large set of options. It’s beautiful and the coding is done quickly and seamlessly.<br>Thank you!</p>

                            </div>

                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-style1 position-relative bdr1">
                            <div class="testimonial-content">

                                <div class="thumb d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img class="wa" src="{{asset('public/assets/images/testimonials/testimonials-1.png')}}" alt="">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0 text-color-black">Floyd Miles</h6>
                                        <p class="mb-0 text-color-light-grey">Bank of America</p>
                                    </div>
                                </div>
                                <span class="icon fas fa-quote-left"></span>
                                <p class="text text-color-white mt-4">The template is really nice and offers quite a large set of options. It’s beautiful and the coding is done quickly and seamlessly.<br>Thank you!</p>

                            </div>

                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-style1 position-relative bdr1">
                            <div class="testimonial-content">

                                <div class="thumb d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img class="wa" src="{{asset('public/assets/images/testimonials/testimonials-1.png')}}" alt="">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0 text-color-black">Dianne Russell</h6>
                                        <p class="mb-0 text-color-light-grey">Facebook</p>
                                    </div>
                                </div>
                                <span class="icon fas fa-quote-left"></span>
                                <p class="text text-color-white mt-4">The template is really nice and offers quite a large set of options. It’s beautiful and the coding is done quickly and seamlessly.<br>Thank you!</p>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our CTA -->

<style>
    .our-cta {
        background-image: url('{{ asset("public/assets/css/images/9.png") }}');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
</style>


<section class="our-cta p-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12 wow fadeInLeft text-center">
                <div class="cta-style3">
                    <h2 class="cta-title pb30 text-color-white">Looking to Buy a new property or sell an existing one? <br>
                        Realton provides an awesome solution!</h2>

                    <a href="#" class="ud-btn btn-dark">Submit Property</a>
                    <a href="#" class="mf10 ud-btn btn-light custom-footer-button">Browse Properties</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var citySelectContainer = document.getElementById("citySelectContainer");
        var searchAddressContainer = document.getElementById("searchAddressContainer");

        document.getElementById("citySelect").addEventListener("change", function() {
            if (this.value !== "") {
                citySelectContainer.style.display = "block";
                searchAddressContainer.style.display = "block";
            }
        });
    });


    $(document).ready(function() {
        $("#citySelect").change(function() {
            var selectedCity = $(this).val();
            if (selectedCity !== 'Select city') {
                localStorage.setItem('selectedCity', selectedCity);
                var newUrl = "real-estate-" + selectedCity.toLowerCase().replace(/\s/g, '_');
                if (window.location.href.includes('/real-estate-/')) {
                    newUrl = newUrl.replace('real-estate-/', '');
                }
                history.pushState(null, null, newUrl);
                $(this).find('option:selected').text(selectedCity);
                location.reload();
            } else {
                $(this).find('option:selected').text('Select city');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {

        $('#search-address-results').on('change', function() {
            var selectedOption = $(this).find(':selected');
            var url = selectedOption.find('a').attr('href');
            if (url) {
                window.location.href = url;
            }
        });


        $('#search-address').keyup(function() {
            var search = $('#search-address').val();
            // var segment = "{{ request()->segment(1) }}";
            var segment = "{{ request()->segment(1) }}";
            var searchString = 'real-estate-';
            var position = segment.indexOf(searchString) + searchString.length;
            var city = segment.substring(position);
            if (!segment.trim()) {

                $('#error-city').text('Please select a city.');
                return;
            }
            // alert(city);
            $.ajax({

                type: 'POST',
                url: "{{route('search.index')}}",
                data: {
                    search: search,
                    city: city,
                    "_token": "{{ csrf_token()}}",
                },


                success: function(response) {
                    // console.log(response);
                    $('#search-address-results').empty();
                    if (response.length === 0) {
                        $('#search-address-results').append('<option value="">No properties found</option>');
                    } else {

                        var uniqueOptions = {};
                        $('#search-address-results').empty().append('<option disabled selected hidden>Select an option</option>');

                        $.each(response, function(index, property) {

                            var optionText = property.locality + ' , ' + property.project_society;
                            if (!uniqueOptions.hasOwnProperty(optionText)) {

                                uniqueOptions[optionText] = true;
                                var encodedProjectSociety = encodeURIComponent(property.project_society.toLowerCase()).replace(/%20/g, '-');
                                var propertyRoute = "{{ url('search') }}/" + encodedProjectSociety;
                                var optionValue = propertyRoute;
                                var option = $('<option></option>').val(optionValue).text(optionText);
                                $('#search-address-results').append(option);

                            }

                        });
                    }

                    $('#search-address-results').removeClass('d-none');
                },

                error: function(xhr, status, error) {
                    console.log('AJAX Error:', error);

                }
            });
        });
    });
</script>


<script>
    document.getElementById('search-address-results').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        if (selectedOption && selectedOption.value) {
            window.location.href = selectedOption.value;
        }
    });
</script>

@endsection