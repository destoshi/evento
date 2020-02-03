<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Evento</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/icon/favicon.ico')}}">

    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{asset('css/meanmenu.min.css')}}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <!-- icofont css -->
    <link rel="stylesheet" href="{{asset('css/icofont.css')}}">
    <!-- Nivo css -->
    <link rel="stylesheet" href="{{asset('css/nivo-slider.css')}}">
    <!-- animaton text css -->
    <link rel="stylesheet" href="{{asset('css/animate-text.css')}}">
    <!-- Metrial iconic fonts css -->
    <link rel="stylesheet" href="{{asset('css/material-design-iconic-font.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- color css -->
    <link href="{{asset('css/color/skin-default.css')}}" rel="stylesheet">

    <!-- modernizr css -->
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!--body-wraper-are-start-->
<div class="wrapper">

    <!--slider header area are start-->
    <div class="header-slider-area">
        <!--header start-->
        <div class="header-area">
            <!--header-top-start-->
            <!--header-top-end-->
            <!--logo menu area start-->
            <div id="sticker" class="logo-menu-area header-area-2">
                <div class="container hidden-xs">
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <div class="logo">
                                <a href="{{route('home')}}"><img src="{{asset('img/logo.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <div class="main-menu text-right">
                                <nav>
                                    <ul id="nav">
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/profile/{{\Illuminate\Support\Facades\Auth::user()->id}}">Profile</a></li>
                                        @if(\Illuminate\Support\Facades\Auth::check())
                                            <li><a href="{{route('logout')}}">Log Out<i class="zmdi zmdi-arrow-back" style="margin-left: 5px;"></i></a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- mobile-menu-area start -->
                <div class="mobile-menu-area">
                    <div class="container">
                        <div class="logo-02">
                            <a href="{{route('home')}}"><img src="{{asset('img/logo-02.png')}}" alt=""></a>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <nav id="dropdown">
                                    <ul>
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/profile/{{\Illuminate\Support\Facades\Auth::user()->id}}">Profile</a></li>
                                        @if(\Illuminate\Support\Facades\Auth::check())
                                            <li><a href="{{route('logout')}}">Log Out<i class="zmdi zmdi-arrow-back" style="margin-left: 5px;"></i></a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!--mobile menu area end-->
            </div>
            <!--logo menu area start-->
        </div>
        <!-- header End-->

        @yield('slider_area')
    </div>
    <!--slider header area are end-->

    @yield('event_show')

    @yield('events')






    <!--information area are start-->
    <div class="information-area off-white pt50 pb50">
        <div class="container">
            <div class="row">
                <div class="col-md-3 com-sm-3"></div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="single-information text-center">
                        <div class="info-icon">
                            <i class="zmdi zmdi-phone"></i>
                        </div>
                        <h4>Phone</h4>
                        <p>+ (0192) 5184203</p>
                        <p>+ (0185) 0950555</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="single-information text-center">
                        <div class="info-icon">
                            <i class="zmdi zmdi-email-open"></i>
                        </div>
                        <h4>E-Mail</h4>
                        <p><a href="mailto:evento@email.com">evento@email.com</a></p>
                        <p><a href="mailto:we@evento.info">we@evento.info</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--information area are start-->

    <!--footer area are start-->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="social-area">
                        <ul>
                            <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="zmdi zmdi-google"></i></a></li>
                            <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="zmdi zmdi-vimeo"></i></a></li>
                            <li><a href="#"><i class="zmdi zmdi-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="payment-area">
                        <ul>
                            <li>Copyright 2020 © <a href="#">Anas Bouabid</a> | Evento</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer area are start-->
</div>
<!--body-wraper-are-end-->

<!--==== all js here====-->
<!-- jquery latest version -->
<script src="{{asset('js/vendor/jquery-3.1.1.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- owl.carousel js -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<!-- meanmenu js -->
<script src="{{asset('js/jquery.meanmenu.js')}}"></script>
<!-- Nivo js -->
<script src="{{asset('js/nivo-slider/jquery.nivo.slider.pack.js')}}"></script>
<script src="{{asset('js/nivo-slider/nivo-active.js')}}"></script>
<!-- wow js -->
<script src="{{asset('js/wow.min.js')}}"></script>
<!-- Vedio js -->
<script src="{{asset('js/video.js')}}"></script>
<!-- Youtube Background JS -->
<script src="{{asset('js/jquery.mb.YTPlayer.min.js')}}"></script>
<!-- datepicker js -->
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<!-- waypoint js -->
<script src="{{asset('js/waypoints.min.js')}}"></script>
<!-- onepage nav js -->
<script src="{{asset('js/jquery.nav.js')}}"></script>
<!-- Google Map js -->
<script src="{{asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyBuU_0_uLMnFM-2oWod_fzC0atPZj7dHlU')}}"></script>
<script src="{{asset('js/google-map.js')}}"></script>
<!-- animate text JS -->
<script src="{{asset('js/animate-text.js')}}"></script>
<!-- plugins js -->
<script src="{{asset('js/plugins.js')}}"></script>
<!-- ajax-mail js -->
<script src="{{asset('js/ajax-mail.js')}}"></script>
<!-- main js -->
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
