<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="advanced search, agency, agent, classified, directory, house, listing, property, real estate, real estate agency, real estate agent, realestate, realtor, rental">
    <meta name="description" content="Homez - Real Estate HTML Template">
    <meta name="CreativeLayers" content="ATFN">
    <!-- css file -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/ace-responsive-menu.css')}}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/menu.css')}}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/ud-custom-spacing.css')}}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/dashbord_navitaion.css')}}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/slider.css')}}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css')}}">
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <!-- Title -->
    <title>{{$title}}</title>
    <!-- Favicon -->
    <link href="{{asset('public/assets/images/favicon.ico')}}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
    <link href="{{asset('public/assets/images/favicon.ico')}}" sizes="128x128" rel="shortcut icon" />
    <!-- Apple Touch Icon -->
    <link href="{{ asset('public/assets/images/apple-touch-icon-60x60.png')}}" sizes="60x60" rel="apple-touch-icon">
    <link href="{{ asset('public/assets/images/apple-touch-icon-72x72.png')}}" sizes="72x72" rel="apple-touch-icon">
    <link href="{{ asset('public/assets/images/apple-touch-icon-114x114.png')}}" sizes="114x114" rel="apple-touch-icon">
    <link href="{{ asset('public/assets/images/apple-touch-icon-180x180.png')}}" sizes="180x180" rel="apple-touch-icon">
    <style>
        a.items-center.-is-active {
    background: #F68121 !important;
}
.dashboard_sidebar_list .sidebar_list_item a:hover{
    background: #F68121 !important;
}
.sidebar_list_item {
    margin: 12px 0;
}

.dashboard__sidebar.d-none.d-lg-block {
    border-right: 1px solid #00000052;
}
    </style>



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="wrapper">
        <div class="preloader"></div>

        <!-- Main Header Nav -->
        <header class="header-nav nav-innerpage-style menu-home4 dashboard_header main-menu">
            <!-- Ace Responsive Menu -->
            <nav class="posr">
                <div class="container-fluid pr30 pr15-xs pl30 posr menu_bdrt1">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-6 col-lg-auto">
                            <div class="text-center text-lg-start d-flex align-items-center">
                                <div class="dashboard_header_logo position-relative me-2 me-xl-5">
                                    <a class="logo" href="{{route('new.index')}}"><img src="{{asset('public/assets/images/header-logo.png')}}"></a>

                                </div>
                                <div class="fz20 ms-2 ms-xl-5">
                                    <a href="#" class="dashboard_sidebar_toggle_icon text-thm1 vam"><img src="{{asset('public/assets/images/dark-nav-icon.svg')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="d-none d-lg-block col-lg-auto">
                            <!-- Responsive Menu Structure-->
                            <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
                                <li class="visible_list"> <a class="list-item" href="#"><span class="title">For Buyers</span></a>
                                    <!-- Level Two-->
                                    <ul>
                                        <li><a href="">BUY A HOME</a>

                                            <ul>
                                                <li><a href="{{route('list', ['cat' => Str::slug('apartment')])}}" target="_blank">Apartment</a></li>
                                                <li><a href="{{route('list', ['cat' => Str::slug('independent floor')])}}" target="_blank">Independent Floor</a></li>
                                                <li><a href="{{route('list', ['cat' => Str::slug('independent house')])}}" target="_blank">Independent House</a></li>


                                            </ul>

                                            <!-- <li><a href="">All Pages Lin</a>

                                            <ul>
                                                <li><a href="#">Dashboard</a></li>
                                                <li><a href="#">Page Dashboard Add Property</a></li>
                                                <li><a href="#">page dashboard profile</a></li>
                                                <li><a href="#">page dashboard properties</a></li>
                                                <li><a href="#">page dashboard review</a></li>
                                                <li><a href="#">edit blog</a></li>
                                                <li><a href="#">add blog</a></li>
                                                <li><a href="#">new add property</a></li>
                                                <li><a href="#">page-property-single-v1</a></li>
                                            </ul>
                                        </li> -->


                                        <li>
                                            <a href="">Land/Plot</a>

                                            <ul>
                                                <li><a href="{{route('list', ['cat' => Str::slug('residential plot')])}}">Residential</a></li>
                                                <li><a href="{{route('list', ['cat' => Str::slug('commercial plot')])}}">Commercial</a></li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="">COMMERCIAL</a>

                                            <ul>
                                                <li><a href="{{route('list', ['cat' => Str::slug('office')])}}">Office Spaces</a></li>
                                                <li><a href="{{route('list', ['cat' => Str::slug('commercial plot')])}}">Commercial Plot</a></li>
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



                                        <!-- 
                                <li>
                                    <a href="">INSIGHTS NEW</a>

                                    <ul>
                                        <li><a href="#">Dashboard</a></li>
                                        <li><a href="#">Page Dashboard Add Property</a></li>
                                    </ul>
                                </li> -->
                                </li>
                            </ul>
                            </li>
                            <li class="megamenu_style"> <a class="list-item" href="#"><span class="title">For Tenants</span></a>
                                <!-- <ul>
                                    <li>
                                        <a href="">RENT A HOME</a>

                                        <ul>
                                            <li><a href="#">PROPERTIES IN UNITED STATES OF AMERICA</a></li>
                                            <li><a href="#">POPULAR SEARCHES</a></li>
                                            <li><a href="#">New Projects in United States Of America</a></li>
                                        </ul>

                                    <li>
                                        <a href="">All Pages Lin</a>

                                        <ul>
                                            <li><a href="#">Dashboard</a></li>
                                            <li><a href="#">Page Dashboard Add Property</a></li>
                                            <li><a href="#">page dashboard profile</a></li>
                                            <li><a href="#">page dashboard properties</a></li>
                                            <li><a href="#">page dashboard review</a></li>
                                            <li><a href="#">edit blog</a></li>
                                            <li><a href="#">add blog</a></li>
                                            <li><a href="#">new add property</a></li>
                                            <li><a href="#">page-property-single-v1</a></li>
                                        </ul>
                                    </li>


                                    <li>
                                        <a href="">Land/Plot</a>

                                        <ul>
                                            <li><a href="#">Dashboard</a></li>
                                            <li><a href="#">Page Dashboard Add Property</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="">COMMERCIAL</a>

                                        <ul>
                                            <li><a href="#">Dashboard</a></li>
                                            <li><a href="#">Page Dashboard Add Property</a></li>
                                        </ul>
                                    </li>


                                    <li>
                                        <a href="">INSIGHTS NEW</a>

                                        <ul>
                                            <li><a href="#">Dashboard</a></li>
                                            <li><a href="#">Page Dashboard Add Property</a></li>
                                        </ul>
                                    </li>
                            </li>
                            </ul> -->
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

                        <?php if (session()->get('roles') == 'user') { ?>

                            <div class="col-6 col-lg-auto">
                                <div class="text-center text-lg-end header_right_widgets">
                                    <ul class="mb0 d-flex justify-content-center justify-content-sm-end p-0">
                                        <!-- <li class="d-none d-sm-block"><a class="text-center mr15"><span class="flaticon-email"></span></a></li> -->
                                        <!-- <li class="d-none d-sm-block"><a class="text-center mr20 notif"><span class="flaticon-bell"></span></a></li> -->
                                        <li class=" user_setting">
                                            <div class="dropdown">
                                                <!-- {{route('notification')}} -->
                                                <a class="btn" href="#" data-bs-toggle="dropdown">
                                                    <img src="{{ asset('public/assets/profile-img/' . session()->get('image')) }}" style="height: 30px;">
                                                </a>
                                                <div class="dropdown-menu">
                                                    <div class="user_setting_content">
                                                        <p class="fz15 fw400 ff-heading mb20">{{ session()->get('name') ? session()->get('name') : session()->get('phone') }} <a href="{{ route('my.profile') }}" class="edit-button">Edit</a></p>

                                                        <a class="dropdown-item {{ ($title == 'WELCOME TO GHAR KA SAPNA | DASHBOARD' || $title == 'Notification | Ghar Ka Sapna') ? 'active' : '' }}" href="{{route('gharkasapna.dashboard')}}"><i class="flaticon-discovery mr10"></i>Dashboard</a>

                                                        <a class="dropdown-item {{ $title == 'Message | Ghar Ka Sapna' ? 'active' : ''}}" href="{{route('user.msg')}}"><i class="flaticon-chat-1 mr10"></i>Message</a>
                                                        <p class="fz15 fw400 ff-heading mt30">MANAGE LISTINGS</p>
                                                        <!--  <a class="dropdown-item" href="page-dashboard-add-property.html"><i class="flaticon-new-tab mr10"></i>Add New Property</a>
                                                        <a class="dropdown-item" href=""><i class="flaticon-home mr10"></i>My Properties</a>
                                                        <a class="dropdown-item" href="page-dashboard-savesearch.html"><i class="flaticon-search-2 mr10"></i>Saved Search</a>
                                                        <a class="dropdown-item" href="page-dashboard-review.html"><i class="flaticon-review mr10"></i>Reviews</a> -->
                                                        <p class="fz15 fw400 ff-heading mt30">MANAGE ACCOUNT</p>
                                                        <!-- <a class="dropdown-item" href="page-dashboard-package.html"><i class="flaticon-protection mr10"></i>My Package</a> -->
                                                        <a class="dropdown-item {{ $title == 'Liked Properties | Ghar Ka Sapna' ? 'active' : '' }}" href="{{route('my.favorites')}}"><i class="flaticon-like mr10"></i>My Favorites</a>
                                                        <a class="dropdown-item {{ $title == 'MY PROFILE | GHAR KA SAPNA' ? 'active' : '' }}" href="{{ route('my.profile') }}"><i class="flaticon-user mr10"></i>My Profile</a>
                                                        <a class="dropdown-item" href="{{ route('session.destroy') }}"><i class="flaticon-exit mr10"></i>Logout</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        <?php } elseif (session()->get('roles') == 'vendor') { ?>

                            <div class="col-6 col-lg-auto">
                                <div class="text-center text-lg-end header_right_widgets">
                                    <ul class="mb0 d-flex justify-content-center justify-content-sm-end p-0">
                                        <!-- <li class="d-none d-sm-block"><a class="text-center mr15" href="page-login.html"><span class="flaticon-email"></span></a></li>
                                        <li class="d-none d-sm-block"><a class="text-center mr20 notif"><span class="flaticon-bell"></span></a></li> -->
                                        <li class=" user_setting">
                                            <div class="dropdown">
                                                <a class="btn" href="#" data-bs-toggle="dropdown">
                                                    <img src="{{ asset('public/assets/profile-img/' . session()->get('image')) }}" style="height: 30px;">
                                                </a>
                                                <div class="dropdown-menu">
                                                    <div class="user_setting_content">
                                                        <p class="fz15 fw400 ff-heading mb20">{{ session()->get('name') ? session()->get('name') : session()->get('phone') }} <a href="{{ route('my.profile') }}" class="edit-button">Edit</a></p>

                                                        <a class="dropdown-item {{ ($title == 'WELCOME TO GHAR KA SAPNA | DASHBOARD' || $title == 'Notification | Ghar Ka Sapna') ? 'active' : '' }}" href="{{route('gharkasapna.dashboard')}}"><i class="flaticon-discovery mr10"></i>Dashboard</a>

                                                        <a class="dropdown-item {{ $title == 'Message | Ghar Ka Sapna' ? 'active' : ''}}" href="{{route('vendor.msg')}}"><i class="flaticon-chat-1 mr10"></i>Message</a>
                                                        <p class="fz15 fw400 ff-heading mt30">MANAGE LISTINGS</p>
                                                        <a class="dropdown-item" href="{{route('post.property')}}"><i class="flaticon-new-tab mr10"></i>Add New Property</a>

                                                        <?php $segment = request()->segment(1); ?>

                                                        <a class="dropdown-item {{ ($title == 'Manage Your Posted Properties | Ghar ka sapna' || $segment == 'properties' || $segment == 'paying-living' || request()->segment(1) == 'edit-post-property' ) ? 'active' : '' }}" href="{{route('mange.post_properties')}}"><i class="flaticon-home mr10"></i>My Properties </a>
                                                        <a class="dropdown-item {{ $title == 'My Favorites Properties | Ghar Ka Sapna' ? 'active' : ''}}" href="{{route('my.fav.properties')}}"><i class="flaticon-like mr10"></i>My Favorites</a>
                                                        <!-- <a class="dropdown-item" href="page-dashboard-savesearch.html"><i class="flaticon-search-2 mr10"></i>Saved Search</a>-->
                                                        <a class="dropdown-item {{$title == 'Explore Your Reviews | Ghar Ka Sapna' ? 'active' : ''}}" href="{{route('reviews')}}"><i class="flaticon-review mr10"></i>Reviews</a>
                                                        <p class="fz15 fw400 ff-heading mt30">MANAGE ACCOUNT</p>
                                                        <!-- <a class="dropdown-item" href="page-dashboard-package.html"><i class="flaticon-protection mr10"></i>My Package</a> -->
                                                        <a class="dropdown-item {{ $title == 'MY PROFILE | GHAR KA SAPNA' ? 'active' : '' }}" href="{{ route('my.profile') }}"><i class="flaticon-user mr10"></i>My Profile</a>
                                                        <a class="dropdown-item" href="{{ route('session.destroy') }}"><i class="flaticon-exit mr10"></i>Logout</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        <?php } elseif (session()->get('roles') == 'admin') { ?>

                            <div class="col-6 col-lg-auto">
                                <div class="text-center text-lg-end header_right_widgets">
                                    <ul class="mb0 d-flex justify-content-center justify-content-sm-end p-0">
                                        <!-- <li class="d-none d-sm-block"><a class="text-center mr15" href="page-login.html"><span class="flaticon-email"></span></a></li>
                                        <li class="d-none d-sm-block"><a class="text-center mr20 notif" href="#"><span class="flaticon-bell"></span></a></li> -->
                                        <li class=" user_setting">
                                            <div class="dropdown">
                                                <a class="btn" href="#" data-bs-toggle="dropdown">
                                                    <img src="{{ asset('public/assets/profile-img/' . session()->get('image')) }}" style="height: 30px;">
                                                </a>
                                                <div class="dropdown-menu">
                                                    <div class="user_setting_content">
                                                        <p class="fz15 fw400 ff-heading mb20">{{ session()->get('name') ? session()->get('name') : session()->get('phone') }} <a href="{{ route('my.profile') }}" class="edit-button">Edit</a></p>

                                                        <a class="dropdown-item {{ ($title == 'WELCOME TO GHAR KA SAPNA | DASHBOARD' || $title == 'Notification | Ghar Ka Sapna') ? 'active' : '' }}" href="{{route('gharkasapna.dashboard')}}"><i class="flaticon-discovery mr10"></i>Dashboard</a>

                                                        <!-- <a class="dropdown-item" href="page-dashboard-message.html"><i class="flaticon-chat-1 mr10"></i>Message</a> -->
                                                        <p class="fz15 fw400 ff-heading mt30">MANAGE LISTINGS</p>
                                                        <a class="dropdown-item" href="{{route('post.property')}}"><i class="flaticon-new-tab mr10"></i>Add New Property</a>



                                                        <a class="dropdown-item {{ ($title == 'Property Management Admin Dashboard | Ghar Ka Sapna' || request()->segment(1) == 'edit-post-property') ? 'active' : '' }}" href="{{route('manage.all_properties')}}"><i class="flaticon-home mr10"></i>All Properties </a>

                                                        <a class="dropdown-item {{ ($title == 'Manage Properties - Admin Dashboard | Ghar Ka Sapna' || request()->segment(1) == 'single-list')  ? 'active' : ''}}" href="{{route('admin.properties')}}"><i class="flaticon-home mr10"></i>My Properties</a>
                                                        <a class="dropdown-item {{ $title == 'My Favorites Properties | Ghar Ka Sapna' ? 'active' : ''}}" href="{{route('admin.fav.properties')}}"><i class="flaticon-like mr10"></i>My Favorites</a>

                                                        <!-- <a class="dropdown-item" href="page-dashboard-savesearch.html"><i class="flaticon-search-2 mr10"></i>Saved Search</a>     <i class="flaticon-like mr10"></i> -->
                                                        <a class="dropdown-item {{$title == 'Manage All Reviews | Ghar Ka Sapna' ? 'active' : ''}}" href="{{route('admin.reviews')}}"><i class="flaticon-review mr10"></i>Reviews</a>
                                                        <p class="fz15 fw400 ff-heading mt30">MANAGE ACCOUNT</p>
                                                        <a class="dropdown-item {{$title == 'Your Membership Plans | Ghar Ka Sapna' ? 'active' : ''}}" href="{{route('admin.package')}}"><i class="flaticon-protection mr15"></i>My Package</a>
                                                        <a class="dropdown-item {{ $title == 'Manage All Blogs | Ghar Ka Sapna - Admin Dashboard' || $title == 'Add New Blog | Ghar Ka Sapna - Admin Dashboard' ? 'active' : ''}}" href="{{route('manage.blogs')}}"><i class="flaticon-protection mr10"></i>All Blogs</a>
                                                        <a class="dropdown-item {{ $title == 'MY PROFILE | GHAR KA SAPNA' ? 'active' : '' }}" href="{{ route('my.profile') }}"><i class="flaticon-user mr10"></i>My Profile</a>
                                                        <a class="dropdown-item" href="{{ route('session.destroy') }}"><i class="flaticon-exit mr10"></i>Logout</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Menu In Hiddn SideBar -->
        <div class="rightside-hidden-bar">
            <div class="hsidebar-header">
                <div class="sidebar-close-icon"><span class="far fa-times"></span></div>
                <h4 class="title">Welcome to Realton</h4>
            </div>
            <div class="hsidebar-content">
                <div class="hiddenbar_navbar_content">
                    <div class="hiddenbar_navbar_menu">
                        <ul class="navbar-nav">
                            <li class="nav-item"> <a class="nav-link" href="" role="button">Apartments</a></li>
                            <li class="nav-item"> <a class="nav-link" href="" role="button">Bungalow</a></li>
                            <li class="nav-item"> <a class="nav-link" href="" role="button">Houses</a></li>
                            <li class="nav-item"> <a class="nav-link" href="" role="button">Loft</a></li>
                            <li class="nav-item"> <a class="nav-link" href="" role="button">Office</a></li>
                            <li class="nav-item"> <a class="nav-link" href="" role="button">Townhome</a></li>
                            <li class="nav-item"> <a class="nav-link" href="" role="button">Villa</a></li>
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
                                    <h6 class="info-mail dark-color"><a href="mailto:hi@homez.com">hi@homez.com</a></h6>
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
        <!-- Mobile Nav  -->
        <div id="page" class="mobilie_header_nav stylehome1">
            <div class="mobile-menu">
                <div class="header innerpage-style">
                    <div class="menu_and_widgets">
                        <div class="mobile_menu_bar d-flex justify-content-between align-items-center">
                            <a class="menubar" href="#menu"><img src="{{asset('public/assets/images/mobile-dark-nav-icon.svg')}}" alt=""></a>
                            <a class="mobile_logo" href="#"><img src="{{asset('public/assets/images/header-logo2.svg')}}" alt=""></a>
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
                            <li><a href="{{route('gharkasapna.dashboard')}}">Dashboard</a></li>
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

        <div class="dashboard_content_wrapper">
            <div class="dashboard dashboard_wrapper pr30 pr0-xl">

                <?php if (session()->get('roles') == 'user') { ?>
                    <div class="dashboard__sidebar d-none d-lg-block">
                        <div class="dashboard_sidebar_list">
                            <div class="sidebar_list_item">
                                <a href="{{route('gharkasapna.dashboard')}}" class="items-center -is-{{ ($title == 'WELCOME TO GHAR KA SAPNA | DASHBOARD' || $title == 'Notification | Ghar Ka Sapna') ? 'active' : '' }}"><i class="flaticon-discovery mr15"></i>Dashboard</a>
                            </div>
                            <div class="sidebar_list_item ">
                                <a href="{{route('user.msg')}}" class="items-center -is-{{ $title == 'Message | Ghar Ka Sapna' ? 'active' : ''}}"><i class="flaticon-chat-1 mr15"></i>Message</a>
                            </div>
                            <!-- <p class="fz15 fw400 ff-heading mt30">MANAGE LISTINGS</p>
                        <div class="sidebar_list_item ">
                            <a href="page-dashboard-add-property.html" class="items-center"><i class="flaticon-new-tab mr15"></i>Add New Property</a>
                        </div>
                        <div class="sidebar_list_item ">
                            <a href="page-dashboard-properties.html" class="items-center"><i class="flaticon-home mr15"></i>My Properties</a>
                        </div>
                  
                        <div class="sidebar_list_item ">
                            <a href="page-dashboard-savesearch.html" class="items-center"><i class="flaticon-search-2 mr15"></i>Saved Search</a>
                        </div>
                        <div class="sidebar_list_item ">
                            <a href="page-dashboard-review.html" class="items-center"><i class="flaticon-review mr15"></i>Reviews</a>
                        </div> -->
                            <p class="fz15 fw400 ff-heading mt30">MANAGE ACCOUNT</p>
                            <!-- <div class="sidebar_list_item ">
                            <a href="page-dashboard-package.html" class="items-center"><i class="flaticon-protection mr15"></i>My Package</a>
                        </div> -->
                            <div class="sidebar_list_item ">
                                <a href="{{route('my.favorites')}}" class="items-center -is-{{ $title == 'Liked Properties | Ghar Ka Sapna' ? 'active' : '' }}"><i class="flaticon-like mr15"></i>My Favorites</a>
                            </div>

                            <div class="sidebar_list_item ">
                                <a href="{{ route('my.profile') }}" class="items-center -is-{{ $title == 'MY PROFILE | GHAR KA SAPNA' ? 'active' : '' }}"><i class="flaticon-user mr15"></i>My Profile</a>
                            </div>
                            <div class="sidebar_list_item ">
                                <a href="{{ route('session.destroy') }}" class="items-center"><i class="flaticon-logout mr15"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                <?php } elseif (session()->get('roles') == 'vendor') { ?>
                    <div class="dashboard__sidebar d-none d-lg-block">
                        <div class="dashboard_sidebar_list">
                            <div class="sidebar_list_item">
                                <a href="{{route('gharkasapna.dashboard')}}" class="items-center -is-{{ ($title == 'WELCOME TO GHAR KA SAPNA | DASHBOARD' || $title == 'Notification | Ghar Ka Sapna') ? 'active' : '' }}"><i class="flaticon-discovery mr15"></i>Dashboard</a>
                            </div>
                            <div class="sidebar_list_item ">
                                <a href="{{route('vendor.msg')}}" class="items-center -is-{{ $title == 'Message | Ghar Ka Sapna' ? 'active' : ''}}"><i class="flaticon-chat-1 mr15"></i>Message</a>
                            </div>
                            <p class="fz15 fw400 ff-heading mt30">MANAGE LISTINGS</p>
                            <div class="sidebar_list_item ">
                                <a href="{{route('post.property')}}" class="items-center"><i class="flaticon-new-tab mr15"></i>Add New Property</a>
                            </div>
                            <div class="sidebar_list_item ">
                                <a href="{{route('mange.post_properties')}}" class="items-center -is-{{ ($title == 'Manage Your Posted Properties | Ghar ka sapna' || $segment == 'properties' || $segment == 'paying-living' || request()->segment(1) == 'edit-post-property') ? 'active' : '' }}"><i class="flaticon-home mr15"></i>My Properties</a>
                            </div>
                            <div class="sidebar_list_item ">
                                <a href="{{route('my.fav.properties')}}" class="items-center -is-{{ $title == 'My Favorites Properties | Ghar Ka Sapna' ? 'active' : ''}}"><i class="flaticon-like mr15"></i>My Favorites</a>
                            </div>
                            <!-- <div class="sidebar_list_item ">
                            <a href="page-dashboard-savesearch.html" class="items-center"><i class="flaticon-search-2 mr15"></i>Saved Search</a>
                        </div>-->
                            <div class="sidebar_list_item ">
                                <a href="{{route('reviews')}}" class="items-center -is-{{$title == 'Explore Your Reviews | Ghar Ka Sapna' ? 'active' : ''}}"><i class="flaticon-review mr15"></i>Reviews</a>
                            </div>
                            <p class="fz15 fw400 ff-heading mt30">MANAGE ACCOUNT</p>
                            <!-- <div class="sidebar_list_item ">
                            <a href="page-dashboard-package.html" class="items-center"><i class="flaticon-protection mr15"></i>My Package</a>
                        </div> -->
                            <div class="sidebar_list_item ">
                                <a href="{{ route('my.profile') }}" class="items-center -is-{{ $title == 'MY PROFILE | GHAR KA SAPNA' ? 'active' : '' }}"><i class="flaticon-user mr15"></i>My Profile</a>
                            </div>
                            <div class="sidebar_list_item ">
                                <a href="{{ route('session.destroy') }}" class="items-center"><i class="flaticon-logout mr15"></i>Logout</a>
                            </div>
                        </div>
                    </div>

                <?php } elseif (session()->get('roles') == 'admin') { ?>

                    <div class="dashboard__sidebar d-none d-lg-block">
                        <div class="dashboard_sidebar_list">
                            <div class="sidebar_list_item">
                                <a href="{{route('gharkasapna.dashboard')}}" class="items-center -is-{{ $title == 'WELCOME TO GHAR KA SAPNA | DASHBOARD' ? 'active' : '' }}"><i class="flaticon-discovery mr15"></i>Dashboard</a>
                            </div>
                            <div class="sidebar_list_item ">
                                <!-- <a href="page-dashboard-message.html" class="items-center"><i class="flaticon-chat-1 mr15"></i>Message</a> -->
                            </div>
                            <p class="fz15 fw400 ff-heading mt30">MANAGE LISTINGS</p>
                            <div class="sidebar_list_item ">
                                <a href="{{route('post.property')}}" class="items-center"><i class="flaticon-new-tab mr15"></i>Add New Property</a>
                            </div>
                            <div class="sidebar_list_item ">
                                <a href="{{route('manage.all_properties')}}" class="items-center -is-{{($title == 'Property Management Admin Dashboard | Ghar Ka Sapna' || request()->segment(1) == 'edit-post-property' ) ? 'active' : ''}} "><i class="flaticon-home mr15"></i>All Properties</a>
                            </div>
                            <div class="sidebar_list_item ">
                                <a href="{{route('admin.properties')}}" class="items-center -is-{{ ($title == 'Manage Properties - Admin Dashboard | Ghar Ka Sapna' || request()->segment(1) == 'single-list') ? 'active' : ''}}"><i class="flaticon-home mr15"></i>My Properties</a>
                            </div>
                            <div class="sidebar_list_item ">
                                <a href="{{route('admin.fav.properties')}}" class="items-center -is-{{ $title == 'My Favorites Properties | Ghar Ka Sapna' ? 'active' : ''}}"><i class="flaticon-like mr15"></i>My Favorites</a>
                            </div>

                            <!-- <div class="sidebar_list_item ">
                            <a href="page-dashboard-savesearch.html" class="items-center"><i class="flaticon-search-2 mr15"></i>Saved Search</a>   <i class="flaticon-like mr15"></i>
                        </div>-->
                            <div class="sidebar_list_item ">
                                <a href="{{route('admin.reviews')}}" class="items-center -is-{{$title == 'Manage All Reviews | Ghar Ka Sapna' ? 'active' : ''}}"><i class="flaticon-review mr15"></i>Reviews</a>
                            </div>
                            <p class="fz15 fw400 ff-heading mt30">MANAGE ACCOUNT</p>

                            <div class="sidebar_list_item ">
                                <a href="{{route('admin.package')}}" class="items-center -is-{{$title == 'Your Membership Plans | Ghar Ka Sapna' ? 'active' : ''}}"><i class="flaticon-protection mr15"></i>My Package</a>
                            </div>

                            <div class="sidebar_list_item ">
                                <a href="{{route('manage.blogs')}}" class="items-center -is-{{ $title == 'Manage All Blogs | Ghar Ka Sapna - Admin Dashboard' || $title == 'Add New Blog | Ghar Ka Sapna - Admin Dashboard' ? 'active' : ''}}"><i class="flaticon-protection mr15"></i>All Blogs</a>
                            </div>
                            <div class="sidebar_list_item ">
                                <a href="{{ route('my.profile') }}" class="items-center -is-{{ $title == 'MY PROFILE | GHAR KA SAPNA' ? 'active' : '' }}"><i class="flaticon-user mr15"></i>My Profile</a>
                            </div>
                            <div class="sidebar_list_item ">
                                <a href="{{ route('session.destroy') }}" class="items-center"><i class="flaticon-logout mr15"></i>Logout</a>
                            </div>
                        </div>
                    </div>


                <?php } ?>

                <div class="dashboard__main pl0-md">
                    <div class="dashboard__content bgc-f7">
                        <div class="row pb40">
                            <?php if (session()->get('roles') == 'user') { ?>
                                <div class="col-lg-12">
                                    <div class="dashboard_navigationbar d-block d-lg-none">
                                        <div class="dropdown">
                                            <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10"></i> Dashboard Navigation</button>
                                            <ul id="myDropdown" class="dropdown-content">
                                                <li class="{{ ($title == 'WELCOME TO GHAR KA SAPNA | DASHBOARD' || $title == 'Notification | Ghar Ka Sapna') ? 'active' : '' }}"><a href="{{route('gharkasapna.dashboard')}}"><i class="flaticon-discovery mr10"></i>Dashboard</a></li>
                                                <li class="{{ $title == 'Message | Ghar Ka Sapna' ? 'active' : ''}}"><a href="{{route('user.msg')}}"><i class="flaticon-chat-1 mr10"></i>Message</a></li>
                                                <!--  <li>
                                                <p class="fz15 fw400 ff-heading mt30 pl30">MANAGE LISTINGS</p>
                                            </li>
                                            <li><a href="page-dashboard-add-property.html"><i class="flaticon-new-tab mr10"></i>Add New Property</a></li>
                                            <li><a href="page-dashboard-properties.html"><i class="flaticon-home mr10"></i>My Properties</a></li>
                                            <li><a href="page-dashboard-savesearch.html"><i class="flaticon-search-2 mr10"></i>Saved Search</a></li>
                                            <li><a href="page-dashboard-review.html"><i class="flaticon-review mr10"></i>Reviews</a></li> -->
                                                <li>
                                                    <p class="fz15 fw400 ff-heading mt30 pl30">MANAGE ACCOUNT</p>
                                                </li>
                                                <li class="{{ $title == 'Liked Properties | Ghar Ka Sapna' ? 'active' : '' }}"><a href="{{route('my.favorites')}}"><i class="flaticon-like mr10"></i>My Favorites</a></li>

                                                <!-- <li><a href="page-dashboard-package.html"><i class="flaticon-protection mr10"></i>My Package</a></li> -->
                                                <li class="{{ $title == 'MY PROFILE | GHAR KA SAPNA' ? 'active' : '' }}"><a href="{{ route('my.profile') }}"><i class="flaticon-user mr10"></i>My Profile</a></li>
                                                <li><a class="" href="{{ route('session.destroy') }}"><i class="flaticon-exit mr10"></i>Logout</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php } elseif (session()->get('roles') == 'vendor') { ?>

                                <div class="col-lg-12">
                                    <div class="dashboard_navigationbar d-block d-lg-none">
                                        <div class="dropdown">
                                            <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10"></i> Dashboard Navigation</button>
                                            <ul id="myDropdown" class="dropdown-content">
                                                <li class="{{ $title == ('WELCOME TO GHAR KA SAPNA | DASHBOARD'  || $title == 'Notification | Ghar Ka Sapna') ? 'active' : '' }}"><a href="{{route('gharkasapna.dashboard')}}"><i class="flaticon-discovery mr10"></i>Dashboard</a></li>
                                                <li class="{{ $title == 'Message | Ghar Ka Sapna' ? 'active' : ''}}"><a href="{{route('vendor.msg')}}"><i class="flaticon-chat-1 mr10"></i>Message</a></li>
                                                <li>
                                                    <p class="fz15 fw400 ff-heading mt30 pl30">MANAGE LISTINGS</p>
                                                </li>
                                                <li><a href="{{route('post.property')}}"><i class="flaticon-new-tab mr10"></i>Add New Property</a></li>
                                                <li class="{{ ($title == 'Manage Your Posted Properties | Ghar ka sapna' || $segment == 'properties' || $segment == 'paying-living' || request()->segment(1) == 'edit-post-property') ? 'active' : '' }}"><a href="{{route('mange.post_properties')}}"><i class="flaticon-home mr10"></i>My Properties</a></li>
                                                <li class="{{ $title == 'My Favorites Properties | Ghar Ka Sapna' ? 'active' : ''}}"><a href="{{route('my.fav.properties')}}"><i class="flaticon-like mr10"></i>My Favorites</a></li>
                                                <!--<li><a href="page-dashboard-savesearch.html"><i class="flaticon-search-2 mr10"></i>Saved Search</a></li>-->
                                                <li class="{{$title == 'Explore Your Reviews | Ghar Ka Sapna' ? 'active' : ''}}"><a href="{{route('reviews')}}"><i class="flaticon-review mr10"></i>Reviews</a></li>
                                                <li>
                                                    <p class="fz15 fw400 ff-heading mt30 pl30">MANAGE ACCOUNT</p>
                                                </li>
                                                <!-- <li><a href="page-dashboard-package.html"><i class="flaticon-protection mr10"></i>My Package</a></li> -->
                                                <li class="{{ $title == 'MY PROFILE | GHAR KA SAPNA' ? 'active' : '' }}"><a href="{{ route('my.profile') }}"><i class="flaticon-user mr10"></i>My Profile</a></li>
                                                <li><a class="" href="{{ route('session.destroy') }}"><i class="flaticon-exit mr10"></i>Logout</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            <?php } elseif (session()->get('roles') == 'admin') { ?>

                                <div class="col-lg-12">
                                    <div class="dashboard_navigationbar d-block d-lg-none">
                                        <div class="dropdown">
                                            <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10"></i> Dashboard Navigation</button>
                                            <ul id="myDropdown" class="dropdown-content">
                                                <li class="{{ $title == 'WELCOME TO GHAR KA SAPNA | DASHBOARD' ? 'active' : '' }}"><a href="{{route('gharkasapna.dashboard')}}"><i class="flaticon-discovery mr10"></i>Dashboard</a></li>
                                                <!-- <li><a href="page-dashboard-message.html"><i class="flaticon-chat-1 mr10"></i>Message</a></li> -->
                                                <li>
                                                    <p class="fz15 fw400 ff-heading mt30 pl30">MANAGE LISTINGS</p>
                                                </li>
                                                <li><a href="{{route('post.property')}}"><i class="flaticon-new-tab mr10"></i>Add New Property</a></li>
                                                <li class="{{($title == 'Property Management Admin Dashboard | Ghar Ka Sapna' || request()->segment(1) == 'edit-post-property') ? 'active' : '' }}"><a href="{{route('manage.all_properties')}}"><i class="flaticon-home mr10"></i>All Properties</a></li>
                                                <li class="{{ ($title == 'Manage Properties - Admin Dashboard | Ghar Ka Sapna' || request()->segment(1) == 'single-list') ? 'active' : ''}}"><a href="{{route('admin.properties')}}"><i class="flaticon-home mr10"></i>My Properties</a></li>
                                                <li class="{{ $title == 'My Favorites Properties | Ghar Ka Sapna' ? 'active' : ''}}"><a href="{{route('admin.fav.properties')}}"><i class="flaticon-like mr10"></i>My Favorites</a></li>
                                                <!--  <li><a href="page-dashboard-savesearch.html"><i class="flaticon-search-2 mr10"></i>Saved Search</a></li>    <i class="flaticon-like mr10"></i>-->
                                                <li class="{{$title == 'Manage All Reviews | Ghar Ka Sapna' ? 'active' : ''}}"><a href="{{route('admin.reviews')}}"><i class="flaticon-review mr10"></i>Reviews</a></li>
                                                <li>
                                                    <p class="fz15 fw400 ff-heading mt30 pl30">MANAGE ACCOUNT</p>
                                                </li>
                                                <li class="{{$title == 'Your Membership Plans | Ghar Ka Sapna' ? 'active' : ''}}"><a href="{{route('admin.package')}}"><i class="flaticon-protection mr15"></i>My Package</a></li>
                                                <li class="{{ $title == 'Manage All Blogs | Ghar Ka Sapna - Admin Dashboard' || $title == 'Add New Blog | Ghar Ka Sapna - Admin Dashboard' ? 'active' : ''}}"><a href="{{route('manage.blogs')}}"><i class="flaticon-protection mr10"></i>All Blogs</a></li>
                                                <li class="{{ $title == 'MY PROFILE | GHAR KA SAPNA' ? 'active' : '' }}"><a href="{{ route('my.profile') }}"><i class="flaticon-user mr10"></i>My Profile</a></li>
                                                <li><a class="" href="{{ route('session.destroy') }}"><i class="flaticon-exit mr10"></i>Logout</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                            <?php } ?>

                            @yield('content')
                            <footer class="dashboard_footer pt30 pb10">
                                <div class="container">
                                    <div class="row items-center justify-content-center justify-content-md-between">
                                        <div class="col-auto">
                                            <div class="copyright-widget">
                                                <p class="text">© Homez - All rights reserved</p>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="footer_bottom_right_widgets text-center text-lg-end">
                                                <p><a href="#">Privacy</a> · <a href="#">Terms</a> · <a href="#">Sitemap</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
                <a class="scrollToHome" href="#"><i class="fas fa-angle-up"></i></a>
            </div>
            <!-- Wrapper End -->
            <script src="{{ asset('public/assets/js/jquery-3.6.4.min.js')}}"></script>
            <script src="{{ asset('public/assets/js/jquery-migrate-3.0.0.min.js')}}"></script>
            <script src="{{ asset('public/assets/js/popper.min.js')}}"></script>
            <script src="{{ asset('public/assets/js/bootstrap.min.js')}}"></script>
            <script src="{{ asset('public/assets/js/bootstrap-select.min.js')}}"></script>
            <script src="{{ asset('public/assets/js/jquery.mmenu.all.js')}}"></script>
            <script src="{{ asset('public/assets/js/ace-responsive-menu.js')}}"></script>
            <script src="{{ asset('public/assets/js/chart.min.js')}}"></script>
            <script src="{{ asset('public/assets/js/chart-custome.js')}}"></script>
            <script src="{{ asset('public/assets/js/jquery-scrolltofixed-min.js')}}"></script>
            <script src="{{ asset('public/assets/js/dashboard-script.js')}}"></script>
            <script src="{{asset('public/assets/js/isotop.js')}}"></script>
            <!-- Custom script for all pages -->
            <script src="{{ asset('public/assets/js/script.js')}}"></script>
            <script src="{{ asset('public/assets/js/pricing-table.js')}}"></script>
</body>

</html>

