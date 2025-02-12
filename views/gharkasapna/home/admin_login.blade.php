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
    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/ace-responsive-menu.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/menu.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/ud-custom-spacing.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/jquery-ui.min.css')}}">
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Title -->
    <title>{{$title}}</title>
    <!-- Favicon -->
    <link href="{{asset('public/assets/images/favicon.ico')}}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
    <link href="{{asset('public/assets/images/favicon.ico')}}" sizes="128x128" rel="shortcut icon" />
    <!-- Apple Touch Icon -->
    <link href="{{asset('public/assets/images/apple-touch-icon-60x60.png')}}" sizes="60x60" rel="apple-touch-icon">
    <link href="{{asset('public/assets/images/apple-touch-icon-72x72.png')}}" sizes="72x72" rel="apple-touch-icon">
    <link href="{{asset('public/assets/images/apple-touch-icon-114x114.png')}}" sizes="114x114" rel="apple-touch-icon">
    <link href="{{asset('public/assets/images/apple-touch-icon-180x180.png')}}" sizes="180x180" rel="apple-touch-icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="bgc-f7">
    <div class="wrapper ovh">
        <div class="preloader"></div>
        <div class="body_content">
            <!-- Our Compare Area -->
            <section class="our-compare pt60 pb60">
                <img src="{{asset('public/assets/images/icon/login-page-icon.svg')}}" alt="" class="login-bg-icon wow fadeInLeft" data-wow-delay="300ms">
                <div class="container">
                    <div class="row wow fadeInRight" data-wow-delay="300ms">
                        <div class="col-lg-6">
                            <div class="log-reg-form signup-modal form-style1 bgc-white p50 p30-sm default-box-shadow2 bdrs12">
                                <div class="text-center mb40">
                                    <img class="mb25" src="{{asset('public/assets/images/header-logo2.svg')}}" alt="">
                                    <h2>Sign in</h2>
                                    <p class="text">Sign in with this account across the following sites.</p>
                                </div>
                                <form action="{{route('check.admin')}}" method="post">
                                    @csrf
                                    <div class="mb15">
                                        <label class="form-label fw600 dark-color">Phone</label>
                                        <input type="text" class="form-control" placeholder="Enter your number" name="phone">
                                        @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="d-grid mb20">
                                        <button class="ud-btn btn-thm" type="submit">Sign in <i class="fal fa-arrow-right-long"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <a class="scrollToHome" href="#"><i class="fas fa-angle-up"></i></a>
        </div>
    </div>
    <!-- Wrapper End -->
    <script src="{{asset('public/assets/js/jquery-3.6.4.min.js')}}"></script>
    <script src="{{asset('public/assets/js/jquery-migrate-3.0.0.min.js')}}"></script>
    <script src="{{asset('public/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/assets/js/jquery-scrolltofixed-min.js')}}"></script>
    <script src="{{asset('public/assets/js/wow.min.js')}}"></script>
    <!-- Custom script for all pages -->
    <script src="{{asset('public/assets/js/script.js')}}"></script>
</body>

</html>