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

<div id="content" class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="day-02-one">
        <div class="total-timeline">

            <!--single timeline start-->
                <div class="single-timeline shadow-box">
                    <div class="timeline-left">
                        <p>Name:</p>
                        <h4>{{$ticket->user->name}}</h4>
                    </div>
                    <div class="timeline-right">
                        <div class="timeline-img">
                            <img src="{{$ticket->user->image != null ? '/storage'.substr($ticket->user->image, 6) : asset('img/blog/blog-01.jpg')}}" alt="">
                        </div>
                        <div class="timeline-content">
                            <div class="timeline-top">
                                <ul>
                                    <li><i class="icofont icofont-clock-time"></i></li>
                                    <li>{{$ticket->event->date}}</li>
                                </ul>
                            </div>
                            <h4>{{$ticket->event->event_title}}</h4>
                            <p>{{$ticket->event->brief}}</p>
                            <h5>Speaker: {{$ticket->event->speaker}}</h5>
                        </div>
                    </div>
                </div>
                <!--single timeline end-->


        </div>
    </div>

</div>

<div class="text-center no-print mt25">
    <button onclick="window.print()">Download</button>
    <p>(make sure to select landscape in the Layout options)</p>
</div>

<style>
    @media print
    {
        .no-print, .no-print *
        {
            display: none !important;
        }
    }
</style>

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
