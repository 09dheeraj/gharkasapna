<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="advanced search, agency, agent, classified, directory, house, listing, property, real estate, real estate agency, real estate agent, realestate, realtor, rental">
    <meta name="description" content="Homez - Real Estate HTML Template">
    <meta name="CreativeLayers" content="ATFN">
    <link href="{{asset('public/assets/images/favicon.ico')}}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
    <link href="{{asset('public/assets/images/favicon.ico')}}" sizes="128x128" rel="shortcut icon" />
    <!-- css file -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/ace-responsive-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/ud-custom-spacing.css')}}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{asset('public/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/newstyle.css') }}">
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />

    <!-- Title -->
    <title>{{$title}}</title>
    <!-- Favicon -->



    <!-- Apple Touch Icon -->
    <link href="{{ asset('public/assets/images/apple-touch-icon-60x60.png')}}" sizes="60x60" rel="apple-touch-icon">
    <link href="{{ asset('public/assets/images/apple-touch-icon-72x72.png')}}" sizes="72x72" rel="apple-touch-icon">
    <link href="{{ asset('public/assets/images/apple-touch-icon-114x114.png')}}" sizes="114x114" rel="apple-touch-icon">
    <link href="{{ asset('public/assets/images/apple-touch-icon-180x180.png')}}" sizes="180x180" rel="apple-touch-icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>
    <div class="wrapper ovh">
        <div class="preloader"></div>
        <!-- Main Header Nav -->
        <?php $url = request()->segment(1);

        $searchString = 'real-estate-';
        $position = strpos($url, $searchString) + strlen($searchString);
        $city = substr($url, $position);

        $segmentName = request()->segment(1);

        $rentstring = 'property-for-rent-';
        $rentposition = strpos($segmentName, $rentstring) + strlen($rentstring);
        $rentcity = substr($segmentName, $rentposition);

        $pgsegment = request()->segment(1);
        $pgstring = 'pgs-in-';
        $pgpostion = strpos($pgsegment, $pgstring) + strlen($pgstring);
        $pgcity = substr($pgsegment, $pgpostion);

        $commsegment = request()->segment(1);
        $commstring = 'commercial-real-estate-in-';
        $commpostion = strpos($commsegment, $commstring) + strlen($commstring);
        $comcity = substr($commsegment, $commpostion);

        $plotsegment = request()->segment(1);
        $plotstring = 'plots-in';
        $plotpostion = strpos($plotsegment, $plotstring) + strlen($plotstring);
        $plotcity = substr($plotsegment, $plotpostion);

        ?>
        <?php if (request()->segment(1) == '' || request()->segment(1) == 'real-estate-' . $city || request()->segment(1) == 'rent' || request()->segment(1) == 'property-for-rent-' . $rentcity || request()->segment(1) == 'paying-guests' || request()->segment(1) == 'pgs-in-' . $pgcity || request()->segment(1) == 'commercial' || request()->segment(1) == 'commercial-real-estate-in-' . $comcity || request()->segment(1) == 'plot' || request()->segment(1) == 'plots-in' . $plotcity) { ?>
            <header class="header-nav nav-homepage-style at-home3 stricky main-menu">
            <?php } elseif (request()->segment(1) == 'all-properties-buy' || request()->segment(1) == 'all-properties-rent') { ?>
                <header class="header-nav nav-innerpage-style main-menu">
                <?php } else { ?>
                    <header class="header-nav nav-innerpage-style bdrb1 main-menu">
                    <?php } ?>
                    <!-- Ace Responsive Menu -->
                    <nav class="posr">
                        <div class="container posr menu_bdrt1">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="logos mr40 mr10-lg">
                                            <a class="header-logo" href="{{route('new.index')}}"><img src="{{asset('public/assets/images/header-logo.png')}}" alt="Header Logo"></a>
                                        </div>
                                        <!-- Responsive Menu Structure-->
                                        <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
                                            <li class="visible_list"> <a class="list-item" href="#"><span class="title">For Buyers</span></a>
                                                <!-- Level Two-->
                                                <ul>
                                                    <li>
                                                        <a>BUY A HOME</a>
                                                        <!-- {{route('all.listing')}} -->
                                                        <ul>
                                                            <li><a href="{{route('list', ['cat' => Str::slug('apartment')])}}" target="_blank">Apartment</a></li>
                                                            <li><a href="{{route('list', ['cat' => Str::slug('independent floor')])}}" target="_blank">Independent Floor</a></li>
                                                            <li><a href="{{route('list', ['cat' => Str::slug('independent house')])}}" target="_blank">Independent House</a></li>
                                                            <!-- <li><a href="{{route('all.listing')}}" target="_blank">Villa</a></li> -->
                                                        </ul>

                                                    <li>
                                                        <a>Land/Plot</a>

                                                        <ul>
                                                            <li><a href="{{route('list', ['cat' => Str::slug('residential plot')])}}" target="_blank">Residential</a></li>
                                                            <li><a href="{{route('list', ['cat' => Str::slug('commercial plot')])}}" target="_blank">Commercial</a></li>
                                                        </ul>

                                                    </li>




                                                    <li>
                                                        <a href="">COMMERCIAL</a>
                                                        <ul>
                                                            <li><a href="{{route('list', ['cat' => Str::slug('office')])}}" target="_blank">Office Spaces</a></li>
                                                            <li><a href="{{route('list', ['cat' => Str::slug('commercial plot')])}}" target="_blank">Commercial Plot</a></li>
                                                            <li><a href="{{route('list', ['cat' => Str::slug('retail shop')])}}">Shops</a></li>
                                                            <li><a href="{{route('list', ['cat' => Str::slug('warehouse')])}}">Warehouse</a></li>
                                                            <li><a href="{{route('list', ['cat' => Str::slug('showroom')])}}">Showrooms</a></li>

                                                        </ul>
                                                    </li>

                                                    <li>
                                                        <a href="">PG/CO-LIVING</a>
                                                        <ul>
                                                            <li><a href="{{route('manage.pg.listing', ['name' => Str::slug('girls')])}}">PG For Girls In</a></li>
                                                            <li><a href="{{route('manage.pg.listing', ['name' => Str::slug('boys')])}}">PG For Boys In</a></li>
                                                            <li><a href="{{route('manage.pg.listing', ['name' => Str::slug('single-room')])}}">Single Room PG In</a></li>
                                                            <li><a href="{{route('manage.pg.listing', ['name' => Str::slug('dubal-sharing')])}}">Dubal Sharing PG In</a></li>
                                                            <li><a href="{{route('manage.pg.listing', ['name' => Str::slug('triple-sharing')])}}">Triple Sharing PG In</a></li>
                                                        </ul>
                                                    </li>
                                            </li>
                                        </ul>
                                        </li>
                                        <li class="visible_list"> <a class="list-item" href="#"><span class="title">For Tenants</span></a>

                                        </li>
                                        <li class="visible_list"> <a class="list-item" href="#"><span class="title">For Owners</span></a>
                                            <!-- <ul>
                                                <li> <a href="#"><span class="title">Agents</span></a>
                                                    <ul>
                                                        <li><a href="page-agents.html">Agents</a></li>
                                                        <li><a href="page-agent-single.html">Agent Single</a></li>
                                                        <li><a href="page-agency.html">Agency</a></li>
                                                        <li><a href="page-agency-single.html">Agency Single</a></li>
                                                    </ul>
                                                </li>
                                                <li> <a href="#"><span class="title">Dashboard</span></a>
                                                    <ul>
                                                        <li><a href="page-dashboard.html">Dashboard</a></li>
                                                        <li><a href="page-dashboard-message.html">Message</a></li>
                                                        <li><a href="page-dashboard-add-property.html">New Property</a></li>
                                                        <li><a href="page-dashboard-properties.html">My Properties</a></li>
                                                        <li><a href="page-dashboard-favorites.html">My Favorites</a></li>
                                                        <li><a href="page-dashboard-savesearch.html">Saved Search</a></li>
                                                        <li><a href="page-dashboard-review.html">Reviews</a></li>
                                                        <li><a href="page-dashboard-package.html">My Package</a></li>
                                                        <li><a href="page-dashboard-profile.html">My Profile</a></li>
                                                    </ul>
                                                </li>
                                                <li> <a href="#"><span class="title">Map Style</span></a>
                                                    <ul>
                                                        <li><a href="page-property-header-map-style.html">Header Map Style</a></li>
                                                        <li><a href="page-property-half-map-v1.html">Half Map Style v1</a></li>
                                                        <li><a href="page-property-half-map-v2.html">Half Map Style v2</a></li>
                                                        <li><a href="page-property-half-map-v3.html">Half Map Style v3</a></li>
                                                        <li><a href="page-property-half-map-v4.html">Half Map Style v4</a></li>
                                                    </ul>
                                                </li>
                                                <li> <a href="#"><span class="title">Single Style</span></a>
                                                    <ul>
                                                        <li><a href="page-property-single-v1.html">Single V1</a></li>
                                                        <li><a href="page-property-single-v2.html">Single V2</a></li>
                                                        <li><a href="page-property-single-v3.html">Single V3</a></li>
                                                        <li><a href="page-property-single-v4.html">Single V4</a></li>
                                                        <li><a href="page-property-single-v5.html">Single V5</a></li>
                                                        <li><a href="page-property-single-v6.html">Single V6</a></li>
                                                        <li><a href="page-property-single-v7.html">Single V7</a></li>
                                                        <li><a href="page-property-single-v8.html">Single V8</a></li>
                                                        <li><a href="page-property-single-v9.html">Single V9</a></li>
                                                        <li><a href="page-property-single-v10.html">Single V10</a></li>
                                                    </ul>
                                                </li>
                                            </ul> -->
                                        </li>
                                        <!-- <li class="visible_list"> <a class="list-item" href="#"><span class="title">For Dealers / Builders</span></a>
                                            <ul>
                                                <li><a href="page-blog-v1.html">List V1</a></li>
                                                <li><a href="page-blog-v2.html">List V2</a></li>
                                                <li><a href="page-blog-v3.html">List V3</a></li>
                                                <li><a href="page-blog-single.html">Single</a></li>
                                            </ul>
                                        </li> -->
                                        <li class="visible_list"> <a class="list-item" href="#"><span class="title">Insights</span></a>
                                            <ul>
                                                <li><a href="{{route('about.us')}}">About</a></li>
                                                <li><a href="{{route('contact.us')}}">Contact</a></li>
                                                <li><a href="{{route('project.manage.all_blogs')}}">Blogs</a></li>
                                            </ul>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="d-flex align-items-center">
                                        <?php if (session()->get('id')) { ?>
                                            <a class="login-info d-flex align-items-center" href="{{ route('gharkasapna.dashboard') }}"><i class="flaticon-logout mr15"></i><span class="d-none d-xl-block" style="margin-right: 20px;">Dashboard</span></a>
                                        <?php } else { ?>
                                            <a class="login-info d-flex align-items-center" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><i class="far fa-user-circle fz16 me-2"></i> <span class="d-none d-xl-block">Login / Register</span></a>
                                        <?php } ?>
                                        <a class="ud-btn btn-dark mx-2 mx-xl-4" href="{{route('post.property')}}">Add Property<i class="fal fa-arrow-right-long"></i></a>
                                        <a class="sidemenu-btn filter-btn-right" href="#"><img src="{{ asset('public/assets/images/icon/nav-icon-dark.svg')}}" alt=""></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </nav>
                    </header>
                    <!-- Signup Modal -->
                    <div class="signup-modal">
                        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
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
                                                    <div class="tab-pane fade show active fz15" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                        <form>
                                                            <div class="form-style1">
                                                                <div class="mb25">
                                                                    <label class="form-label fw600 dark-color">Phone Number</label><br>
                                                                    <span id="phone-mesg" class="text-danger"></span>
                                                                    <input type="text" name="number" id="phone-number" class="form-control" placeholder="Enter Number">
                                                                    <input type="hidden" name="update_number" id="phone-number-hidden">
                                                                </div>

                                                                <div class="d-grid mb20">
                                                                    <button class="ud-btn btn-thm" id="continue" type="button">Continue<i class="fal fa-arrow-right-long"></i></button>
                                                                </div>
                                                            </div>
                                                        </form>
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
                        <div class="modal fade" id="otpverifytoggle" aria-hidden="true" aria-labelledby="otpverifytoggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="otpmessage"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="log-reg-form">
                                            <div class="navtab-style2">
                                                <div class="tab-content" id="nav-tabContent2">
                                                    <div class="tab-pane fade show active fz15" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                        <div class="form-style1">
                                                            <div class="mb25">
                                                                <label class="form-label fw600 dark-color">OTP</label><br>
                                                                <span id="otp-mesg" class="text-danger"></span>
                                                                <input type="text" id="otp-number" class="form-control" placeholder="Enter OTP">
                                                            </div>
                                                            <div class="d-grid mb20">
                                                                <button class="ud-btn btn-thm" id="sign-in" type="button">Sign in <i class="fal fa-arrow-right-long"></i></button>
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

                    <!-- Menu In Hiddn SideBar -->
                    <div class="rightside-hidden-bar">
                        <div class="hsidebar-header">
                            <div class="sidebar-close-icon"><span class="far fa-times"></span></div>
                            <h4 class="title">Welcome to {{ session()->has('name') ? session()->get('name') : 'Ghar ka sapna' }}</h4>
                        </div>

                        <style>
                            li.nav-item.active {
                                border-left: 2px solid #EB6753;
                                color: #EB6753;
                                background-color: rgba(235, 103, 83, 0.07);
                            }
                        </style>
                        <div class="hsidebar-content">
                            <div class="hiddenbar_navbar_content">
                                <div class="hiddenbar_navbar_menu">
                                    <ul class="navbar-nav">
                                        <li class="nav-item {{request()->segment(2) == 'apartment' ? 'active' : ''}}"> <a class="nav-link" href="{{route('category.home', ['type' => Str::slug('apartment')])}}" target="_blank" role="button">Apartments</a></li>
                                        <li class="nav-item {{request()->segment(2) == 'independent-floor' ? 'active' : ''}}"> <a class="nav-link" href="{{route('category.home', ['type' => Str::slug('independent floor')])}}" target="_blank" role="button">Independent Floor</a></li>
                                        <li class="nav-item {{request()->segment(2) == 'independent-house' ? 'active' : ''}}"> <a class="nav-link" href="{{route('category.home', ['type' => Str::slug('independent house')])}}" target="_blank" role="button">Houses</a></li>
                                        <li class="nav-item {{request()->segment(2) == 'office' ? 'active' : ''}}"> <a class="nav-link" href="{{route('category.home', ['type' => Str::slug('office')])}}" target="_blank" role="button">Office</a></li>
                                        <li class="nav-item {{request()->segment(2) == 'retail-shop' ? 'active' : ''}}"> <a class="nav-link" href="{{route('category.home', ['type' => Str::slug('retail shop')])}}" target="_blank" role="button">Shops</a></li>
                                    </ul>
                                </div>
                                <div class="hiddenbar_footer position-relative bdrt1">
                                    <div class="row pt45 pb30 pl30">
                                        <div class="col-auto">
                                            <div class="contact-info">
                                                <p class="info-title dark-color">Total Free Customer Care</p>
                                                <h6 class="info-phone dark-color"><a href="+(0)-123-050-945-02">+(0) 123 050 945 02</a></h6>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="contact-info">
                                                <p class="info-title dark-color">Nee Live Support?</p>
                                                <h6 class="info-mail dark-color"><a href="mailto:hi@homez.com">hi@gharkasapna.com</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pt30 pb30 bdrt1">
                                        <div class="col-auto">
                                            <div class="social-style-sidebar d-flex align-items-center pl30">
                                                <h6 class="me-4 mb-0">Follow us</h6>
                                                <a class="me-3" href=""><i class="fab fa-facebook-f"></i></a>
                                                <a class="me-3" href=""><i class="fab fa-twitter"></i></a>
                                                <a class="me-3" href=""><i class="fab fa-instagram"></i></a>
                                                <a class="me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Menu In Hiddn SideBar -->
                    <!-- Advance Feature Modal Start -->
                    <div class="advance-feature-modal">
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">

                                    <div class="modal-body pb-0">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="widget-wrapper">
                                                    <h6 class="list-title">Price Range</h6>
                                                    <!-- Range Slider Mobile Version -->
                                                    <div class="range-slider-style modal-version">
                                                        <div class="range-wrapper">
                                                            <div class="mb30 mt35" id="slider"></div>
                                                            <div class="d-flex align-items-center">
                                                                <span id="slider-range-value1"></span><i class="fa-sharp fa-solid fa-minus mx-2 dark-color icon"></i>
                                                                <span id="slider-range-value2"></span>
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
                    <!-- Advance Feature Modal End -->

                    <div class="hiddenbar-body-ovelay"></div>

                    <!-- Mobile Nav  -->
                    <div id="page" class="mobilie_header_nav stylehome1">
                        <div class="mobile-menu">
                            <div class="header innerpage-style">
                                <div class="menu_and_widgets">
                                    <div class="mobile_menu_bar d-flex justify-content-between align-items-center">
                                        <a class="menubar" href="#menu"><img src="{{asset('public/assets/images/mobile-dark-nav-icon.svg')}}" alt=""></a>
                                        <a class="mobile_logo" href="{{route('new.index')}}"><img src="{{asset('public/assets/images/header-logo.png')}}"></a>

                                        <a href="page-login.html"><span class="icon fz18 far fa-user-circle"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.mobile-menu -->
                        <nav id="menu" class="">
                            <ul>
                                <li><span>Home</span>
                                    <ul>
                                        <li><a href="index.html">Home V1</a></li>
                                        <li><a href="index2.html">Home V2</a></li>
                                        <li><a href="index3.html">Home V3</a></li>
                                        <li><a href="index4.html">Home V4</a></li>
                                        <li><a href="index5.html">Home V5</a></li>
                                        <li><a href="index6.html">Home V6</a></li>
                                        <li><a href="index7.html">Home V7</a></li>
                                        <li><a href="index8.html">Home V8</a></li>
                                        <li><a href="index9.html">Home V9</a></li>
                                        <li><a href="index10.html">Home V10</a></li>
                                    </ul>
                                </li>
                                <li><span>Property Listign</span>
                                    <ul>
                                        <li><span>Listing Grid</span>
                                            <ul>
                                                <li><a href="page-grid-default-v1.html">Grid Default v1</a></li>
                                                <li><a href="page-grid-default-v2.html">Grid Default v2</a></li>
                                                <li><a href="page-property-3-col.html">Grid Full Width 3 Cols</a></li>
                                                <li><a href="page-property-4-col.html">Grid Full Width 4 Cols</a></li>
                                                <li><a href="page-property-2-col.html">Grid Full Width 2 Cols</a></li>
                                                <li><a href="page-property-1-col-v1.html">Grid Full Width 1 Cols v1</a></li>
                                                <li><a href="page-property-1-col-v2.html">Grid Full Width 1 Cols v2</a></li>
                                                <li><a href="page-property-banner-v1.html">Banner Search v1</a></li>
                                                <li><a href="page-property-banner-v2.html">Banner Search v2</a></li>
                                            </ul>
                                        </li>
                                        <li><span>List Style</span>
                                            <ul>
                                                <li><a href="page-property-list.html">Style V1</a></li>
                                                <li><a href="page-property-list-all.html">All List</a></li>
                                            </ul>
                                        </li>
                                        <li><span>Listing Single</span>
                                            <ul>
                                                <li><a href="page-property-single-v1.html">Single V1</a></li>
                                                <li><a href="page-property-single-v2.html">Single V2</a></li>
                                                <li><a href="page-property-single-v3.html">Single V3</a></li>
                                                <li><a href="page-property-single-v4.html">Single V4</a></li>
                                                <li><a href="page-property-single-v5.html">Single V5</a></li>
                                                <li><a href="page-property-single-v6.html">Single V6</a></li>
                                                <li><a href="page-property-single-v7.html">Single V7</a></li>
                                                <li><a href="page-property-single-v8.html">Single V8</a></li>
                                                <li><a href="page-property-single-v9.html">Single V9</a></li>
                                                <li><a href="page-property-single-v10.html">Single V10</a></li>
                                            </ul>
                                        </li>
                                        <li><span>Map Style</span>
                                            <ul>
                                                <li><a href="page-property-header-map-style.html">Map Header</a></li>
                                                <li><a href="page-property-half-map-v1.html">Map V1</a></li>
                                                <li><a href="page-property-half-map-v2.html">Map V2</a></li>
                                                <li><a href="page-property-half-map-v3.html">Map V3</a></li>
                                                <li><a href="page-property-half-map-v4.html">Map V4</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><span>User Dashboard</span>
                                    <ul>
                                        <li><a href="page-dashboard.html">Dashboard</a></li>
                                        <li><a href="page-dashboard-message.html">Message</a></li>
                                        <li><a href="page-dashboard-add-property.html">New Property</a></li>
                                        <li><a href="page-dashboard-properties.html">My Properties</a></li>
                                        <li><a href="page-dashboard-favorites.html">My Favorites</a></li>
                                        <li><a href="page-dashboard-savesearch.html">Saved Search</a></li>
                                        <li><a href="page-dashboard-review.html">Reviews</a></li>
                                        <li><a href="page-dashboard-package.html">My Package</a></li>
                                        <li><a href="page-dashboard-profile.html">My Profile</a></li>
                                    </ul>
                                </li>
                                <li><span>Blog</span>
                                    <ul>
                                        <li><a href="page-blog-v1.html">List V1</a></li>
                                        <li><a href="page-blog-v2.html">List V2</a></li>
                                        <li><a href="page-blog-v3.html">List V3</a></li>
                                        <li><a href="page-blog-single.html">Single</a></li>
                                    </ul>
                                </li>
                                <li><span>Pages</span>
                                    <ul>
                                        <li><a href="page-about.html">About</a></li>
                                        <li><a href="page-contact.html">Contact</a></li>
                                        <li><a href="page-compare.html">Compare</a></li>
                                        <li><a href="page-pricing.html">Pricing</a></li>
                                        <li><a href="page-faq.html">Faq</a></li>
                                        <li><a href="page-login.html">Login</a></li>
                                        <li><a href="page-register.html">Register</a></li>
                                        <li><a href="page-error.html">404</a></li>
                                        <li><a href="page-invoice.html">Invoices</a></li>
                                        <li><a href="page-ui-element.html">UI Elements</a></li>
                                    </ul>
                                </li>
                                <li class="px-3 mobile-menu-btn">
                                    <a href="page-dashboard-add-property.html" class="ud-btn btn-thm text-white">Submit Property<i class="fal fa-arrow-right-long"></i></a>
                                </li>
                                <!-- Only for Mobile View -->
                            </ul>
                        </nav>
                    </div>

                    <div class="body_content">


                        @yield('content')

                        <!-- Our Footer -->
                        <section class="footer-style1 pt60 pb-0">
                            <div class="container">
                                <div class="row bb-white-light pb30 mb60">
                                    <div class="col-sm-5">
                                        <div class="footer-widget text-center text-sm-start">
                                            <a class="footer-logo" href="{{route('new.index')}}"><img src="{{asset('public/assets/images/header-logo.png')}}"></a>

                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="social-widget text-center text-sm-end">
                                            <div class="social-style1">
                                                <a class="text-white me-2 fw600 fz15" href="">Follow us</a>
                                                <a href=""><i class="fab fa-facebook-f list-inline-item"></i></a>
                                                <a href=""><i class="fab fa-twitter list-inline-item"></i></a>
                                                <a href=""><i class="fab fa-instagram list-inline-item"></i></a>
                                                <a href=""><i class="fab fa-linkedin-in list-inline-item"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row justify-content-between">
                                            <div class="col-auto">
                                                <div class="link-style1 mb-3">
                                                    <h6 class="text-white mb25">Popular Search</h6>
                                                    <div class="link-list">
                                                        <a href="">Apartment for Rent</a>
                                                        <a href="">Apartment Low to hide</a>
                                                        <a href="">Offices for Buy</a>
                                                        <a href="">Offices for Rent</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="link-style1 mb-3">
                                                    <h6 class="text-white mb25">Quick Links</h6>
                                                    <ul class="ps-0">
                                                        <li><a href="">Terms of Use</a></li>
                                                        <li><a href="">Privacy Policy</a></li>
                                                        <li><a href="">Pricing Plans</a></li>
                                                        <li><a href="">Our Services</a></li>
                                                        <li><a href="">Contact Support</a></li>
                                                        <li><a href="">Careers</a></li>
                                                        <li><a href="">FAQs</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="link-style1 mb-3">
                                                    <h6 class="text-white mb25">Discover</h6>
                                                    <ul class="ps-0">
                                                        <li><a href="">Miami</a></li>
                                                        <li><a href="">Los Angeles</a></li>
                                                        <li><a href="">Chicago</a></li>
                                                        <li><a href="">New York</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 offset-lg-2">
                                        <div class="footer-widget mb-4 mb-lg-5">
                                            <div class="row mb-4 mb-lg-5">
                                                <div class="col-auto">
                                                    <div class="contact-info">
                                                        <p class="info-title">Total Free Customer Care</p>
                                                        <h6 class="info-phone"><a href="+(0)-123-050-945-02">+(0) 123 050 945 02</a></h6>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="contact-info">
                                                        <p class="info-title">Nee Live Support?</p>
                                                        <h6 class="info-mail"><a href="mailto:hi@homez.com">hi@gharkasapna.com</a></h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="footer-widget mb-4 mb-lg-5">
                                                <div class="mailchimp-widget mb-4 mb-lg-5">
                                                    <h6 class="title text-white mb20">Keep Yourself Up to Date</h6>
                                                    <div class="mailchimp-style1 white-version">
                                                        <input type="email" class="form-control" placeholder="Your Email">
                                                        <button type="submit">Subscribe</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container white-bdrt1 py-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="text-center text-lg-start">
                                            <p class="copyright-text text-gray ff-heading">© Homez - All rights reserved</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-center text-lg-end">
                                            <p class="footer-menu ff-heading text-gray"><a class="text-gray" href="#">Privacy</a> · <a class="text-gray" href="#">Terms</a> · <a class="text-gray" href="#">Sitemap</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <a class="scrollToHome" href="#"><i class="fas fa-angle-up"></i></a>
                    </div>





    </div>
    <!-- Wrapper End -->
    <script src="{{ asset('public/assets/js/jquery-3.6.4.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/jquery-migrate-3.0.0.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/jquery.mmenu.all.js')}}"></script>
    <script src="{{ asset('public/assets/js/ace-responsive-menu.js')}}"></script>
    <script src="{{ asset('public/assets/js/jquery-scrolltofixed-min.js')}}"></script>
    <script src="{{ asset('public/assets/js/wow.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/owl.js')}}"></script>
    <script src="{{ asset('public/assets/js/parallax.js')}}"></script>
    <script src="{{ asset('public/assets/js/pricing-slider.js')}}"></script>
    <script src="{{asset('public/assets/js/isotop.js')}}"></script>
    <script src="{{asset('public/assets/js/script.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.min.js"></script>


    <script>
        const phoneInputField = document.querySelector("#phone-number");
        const phoneNumberHiddenInput = document.querySelector("#phone-number-hidden");
        const phoneInput = window.intlTelInput(phoneInputField, {
            initialCountry: "in",
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });


        phoneInputField.addEventListener("countrychange", function() {
            const selectedCountry = phoneInput.getSelectedCountryData();
        });

        phoneInputField.addEventListener("blur", function() {
            phoneNumberHiddenInput.value = phoneInput.getNumber();
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#continue').click(function() {
                var phonenumber = $('#phone-number').val();
                var updatePhoneNumber = $('#phone-number-hidden').val();

                if (!/^\d{10}$/.test(phonenumber.trim())) {
                    $('#phone-mesg').text('Please enter a valid phone number.');
                    return;
                } else {
                    $('#phone-mesg').text('');
                    $.ajax({
                        url: "{{ route('genrate.userOTP') }}",
                        type: "POST",
                        data: {
                            updatePhoneNumber: updatePhoneNumber,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {

                            if (response.success) {
                                $('#exampleModalToggle').modal('hide');
                                $('#otpverifytoggle').modal('show');
                                $('#otpmessage').text(response.success);

                            } else {
                                console.error('Failed to generate OTP');
                            }
                        },

                        error: function(xhr, errors, status) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });

            $('#sign-in').click(function() {
                var otp_number = $('#otp-number').val();

                if (!otp_number.trim()) {
                    $('#otp-mesg').text('OTP field is required. Please enter the OTP number.');
                    return;
                } else {
                    $('#otp-mesg').text('');

                    $.ajax({
                        url: "{{ route('checkUser.authentication') }}",
                        type: "POST",
                        data: {
                            otp_number: otp_number,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {

                            //console.log(response);

                            if (response.success) {

                                window.location.href = "{{ route('gharkasapna.dashboard') }}?success=1";

                            } else {

                                $('#otp-mesg').text('Invalid OTP. Please try again.');
                            }

                        },
                        error: function(xhr, errors, status) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>



</body>

</html>