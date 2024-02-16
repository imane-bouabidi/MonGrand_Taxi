<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->


<!-- Mirrored from html.dynamiclayers.net/dl/ridek/book-taxi.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Feb 2024 20:38:52 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Ridek Online Taxi Booking HTML5 Template">
    <meta name="author" content="DynamicLayers">

    <title>Ridek - Online Taxi Booking Service HTML5 Template</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/keyframe-animation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/elements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

</head>

<body>
    <!--[if lt IE 8]>
 <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="http://browsehappy.com/">upgrade your browser</a> to improve
        your experience.
 </p><![endif]-->

    <div class="site-preloader">
        <div class="car">
            <div class="strike"></div>
            <div class="strike strike2"></div>
            <div class="strike strike3"></div>
            <div class="strike strike4"></div>
            <div class="strike strike5"></div>
            <div class="car-detail spoiler"></div>
            <div class="car-detail back"></div>
            <div class="car-detail center"></div>
            <div class="car-detail center1"></div>
            <div class="car-detail front"></div>
            <div class="car-detail wheel"></div>
            <div class="car-detail wheel wheel2"></div>
        </div>
    </div>
    <!--/.site-preloader-->

    <header class="main-header">
        <!--/.mid-header-->
        <div class="nav-menu-wrapper">
            <div class="container" style="display:flex">
                <div class="logo" style="width: 120px">
                    <a href="{{ url('/') }}"><img src="{{ asset('img/logo-dark.png') }}" alt="Logo" /></a>
                </div>
                <div class="nav-menu-inner">
                    <!--/.site-logo-->
                    <div class="header-menu-wrap">
                        <ul class="nav-menu">
                            <li class="dropdown_menu">
                                <a href="{{route('home')}}">Home</a>
                                <ul>
                                    <li><a href="index.html">Home Default</a></li>
                                    <li><a href="index-2.html">Home Modern</a></li>
                                </ul>
                            </li>
                            <li class="dropdown_menu">
                                <a href="our-taxi.html">Our Taxi</a>
                                <ul>
                                    <li><a href="our-taxi.html">Taxi Lists</a></li>
                                    <li><a href="taxi-details.html">Taxi Details</a></li>
                                </ul>
                            </li>
                            <li class="dropdown_menu">
                                <a href="blog-grid.html">Blog</a>
                                <ul>
                                    <li><a href="blog-grid.html">Grid Posts</a></li>
                                    <li><a href="blog-classic.html">Classic Posts</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                            @if (Auth::check())
                                <li>
                                    @can('adminPermission')
                                    <a href="{{ route('adminDashboard') }}">Dashboard</a>
                                @endcan
                            </li>
                                <li>
                                    @can('chauffeurPermission')
                                    <a href="{{ route('chauffeurDashboard') }}">Dashboard</a>
                                @endcan
                            </li>
                                <li>
                                    @can('userPermission')
                                    <a href="{{ route('passengerDashboard') }}">Dashboard</a>
                                @endcan
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button style="color:white" type="submit">Logout</button>
                                </form>
                            </li>
                        @else
                            {{-- L'utilisateur n'est pas connecté --}}
                            <li><a href="{{ route('login') }}">Log In</a></li>
                            <li><a href="{{ route('register') }}">Sign Up</a></li>
                        @endif

                    </ul>
                </div>
                <div class="menu-right-item">
                    <div class="search-icon dl-search-icon">
                        <i class="las la-search"></i>
                    </div>
                    <div class="sidebox-icon dl-sidebox-icon">
                        <i class="las la-bars"></i>
                    </div>
                    {{-- 
                    // auth()->user()->name
                    --}}
                    <a href="book-taxi.html" class="menu-btn">Book a Taxi</a>
                </div>
                <div class="mobile-menu-icon">
                    <div class="burger-menu">
                        <div class="line-menu line-half first-line"></div>
                        <div class="line-menu"></div>
                        <div class="line-menu line-half last-line"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.nav-menu-->
</header>
<!--/.main-header-->

<div id="popup-search-box">
    <div class="box-inner-wrap d-flex align-items-center">
        <form id="form" action="#" method="get" role="search">
            <input id="popup-search" type="text" name="s" placeholder="Type keywords here..." />
            <button id="popup-search-button" type="submit" name="submit">
                <i class="las la-search"></i>
            </button>
        </form>
        <div class="search-close"><i class="las la-times"></i></div>
    </div>
</div>
<!--/.popupsearch-box-->
<div id="searchbox-overlay"></div>

<div id="popup-sidebox" class="popup-sidebox">
    <div class="sidebox-content">
        <div class="site-logo">
            <a href="index.html"><img src="{{ asset('img/logo-dark.png') }}" alt="logo" /></a>
        </div>
        <p>Everything your taxi business needs is already here! Ridek, a theme
            made for taxi service companies.</p>
        <ul class="sidebox-list">
            <li class="call"><span>Call for ride:</span>5267-214-392</li>
            <li>
                <span>You can find us at:</span>Halk Street New York, USA - 2386
            </li>
            <li><span>Email now:</span>Info.ridek@mail.com</li>
        </ul>
    </div>
</div>
<!--/.popup-sidebox-->
<div id="sidebox-overlay"></div>

<section class="page-header">
    <div class="page-header-shape"></div>
    <div class="container">
        <div class="page-header-info">
            <h4>Get Your Cab!</h4>
            <h2>Book Your <span>Ride</span></h2>
            <p>Everything your taxi business <br>needs is already here! </p>
        </div>
    </div>
</section>
<!--/.page-header-->

<div class="taxi-booking bg-grey padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <form method="get" class="search-form" action="{{ url('search') }}">
                    <div class="taxi-booking-form">
                        <div class="form-field">
                            <i class="las la-map-marker"></i>
                            <input type="text" id="start-dest" name="start-dest" class="form-control"
                                placeholder="Start Destination" required>
                        </div>
                        <div class="form-field">
                            <i class="las la-map-marker"></i>
                            <input type="text" id="end-dest" name="end-dest" class="form-control"
                                placeholder="End Destination" required>
                        </div>
                        <div class="form-field">
                            <i class="las la-clock"></i>
                            <input type="text" id="ride-time" name="ride-time"
                                class="form-control time-picker" placeholder="Select Time" required>
                        </div>
                        <div class="form-field">
                            <button id="submit" class="default-btn" type="submit">Book Your Taxi</button>
                        </div>
                    </div>
                    <div id="form-messages" class="alert" role="alert"></div>
                </form><!-- Booking Form -->
            </div>
        </div>
    </div>
</div>
<!--/.booking-form-->
<section class="our-taxi padding">
    <div class="container">
        <div class="row">
            @foreach ($horaires_driver as $horaire_driver)                
            <div class="col-lg-4 col-md-6 sm-padding">
                <div class="pricing-item">
                    <div class="pricing-head-wrap">
                        <div class="pricing-car">
                            <img src=" storage/{{$horaire_driver->driver->user->image }}" alt="car">
                        </div>
                    </div>
                    <div class="pricing-head">
                        <h3><a href="taxi-details.html">{{ $horaire_driver->driver->taxi->type_vehicule }}</a></h3>
                        <span class="location">{{ $horaire_driver->driver->trajet->depart->ville_name }} → {{ $horaire_driver->driver->trajet->arrivee->ville_name  }}</span>
                        <br>
                        <span class="location">{{ $horaire_driver->horaire->date }}</span>
                    </div>
                    <ul class="pricing-list">
                        <li>Prix : <span>{{ $horaire_driver->driver->taxi->prix }} DH</span></li>
                        <li>Passengers: <span>4 Person</span></li>
                        @can('userPermission')
                        <li><a href="{{route('book_taxi',['id' => $horaire_driver->id])}}" class="default-btn">Book Taxi Now</a></li>
                        @endcan
                    </ul>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<footer class="footer-section">
    <div class="footer-top-wrap">
        <div class="container">
            <div class="footer-top">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="brand">
                            <a class="footer-logo" href="index.html"><img src="{{ asset('img/logo-dark.png') }}"
                                    alt="logo"></a>
                            <p>We successfully cope with tasks of varying complexity, provide long-term guarantees
                                and regularly master new technologies.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer-call">
                            <i class="las la-phone-volume"></i>
                            <p><span>Call For Taxi</span><a href="tel:5267214392">5267-214-392</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.footer-mid-wrap-->
    <div class="copyright-wrap">
        <div class="container">
            <p>© <span id="currentYear"></span> DynamicLayers All Rights Reserved.</p>
        </div>
    </div>
    <!--/.copyright-wrap-->
</footer>
<!--/.footer-section-->

<div id="scrollup">
    <button id="scroll-top" class="scroll-to-top">
        <i class="las la-arrow-up"></i>
    </button>
</div>
<!--scrollup-->

<div class="dl-cursor">
    <div class="cursor-icon-holder"><i class="las la-times"></i></div>
</div>
<!--/.dl-cursor-->

<!--jQuery Lib-->
<script src="{{ asset('js/vendor/jquary-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
<script src="{{ asset('js/vendor/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('js/vendor/swiper.min.js') }}"></script>
<script src="{{ asset('js/vendor/jquery.datetimepicker.full.js') }}"></script>
<script src="{{ asset('js/vendor/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/vendor/venobox.min.js') }}"></script>
<script src="{{ asset('js/vendor/smooth-scroll.js') }}"></script>
<script src="{{ asset('js/vendor/wow.min.js') }}"></script>
<script src="{{ asset('js/book-ride.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>


<!-- Mirrored from html.dynamiclayers.net/dl/ridek/book-taxi.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Feb 2024 20:38:52 GMT -->

</html>
