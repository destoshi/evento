@extends('layouts.layout')


@section('slider_area')
    <!--slider area are start-->
    <div class="slider-container bg-overlay">
        <!-- Slider Image -->
        <div id="mainSlider" class="nivoSlider slider-image">
            <img src="{{asset('img/slider/slider1.jpg')}}" alt="main slider" title="#htmlcaption1" />
        </div>
        <!-- Slider Caption 1 -->
        <div id="htmlcaption1" class="nivo-html-caption slider-caption-1">
            <div class="container">
                <div class="slide1-text">
                    <div class="middle-text slide-def">
                        <div class="cap-dec wow fadeInDown" data-wow-duration=".9s" data-wow-delay="0.8s">
                            <p>Looking For New Events?</p>
                        </div>
                        <div class="cap-title wow fadeInDown" data-wow-duration=".9s" data-wow-delay="0.8s">
                            <h1>Biggest Events Hosting Platform</h1> </div>
                        <div class="date-address wow fadeInDown" data-wow-duration=".9s" data-wow-delay="0.8s">
                            <div class="event-location"> <i class="zmdi zmdi-info"></i>Evento is your go to platform for any type of events, click the button bellow or scroll down to brows available events.</div>
                        </div>
                        <div class="slider-btn wow fadeInUp" data-wow-duration=".9s" data-wow-delay="0.8s"> <a class="btn-def" href="#about-event">Brows Events</a> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- home slider end -->
    </div>
    <!--slider area are End-->
    <div class="down-arrow"> <a class="see-demo-btn" href="#about-event"><i class="zmdi zmdi-long-arrow-down"></i></a> </div>
@endsection


@section('events')


    <!--Counter area start-->
    <div class="counter-area pt50 pb50">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-count text-center uppercase">
                        <div class="count-icon">
                            <img src="{{asset('img/icon/count-01.png')}}" alt="">
                        </div>
                        <h3><span class="counter2">{{\Illuminate\Support\Facades\DB::table('events')->count()}}</span></h3>
                        <p>+ Events</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-count text-center uppercase">
                        <div class="count-icon">
                            <img src="{{asset('img/icon/count-02.png')}}" alt="">
                        </div>
                        <h3><span class="counter2">{{\Illuminate\Support\Facades\DB::table('events')->distinct()->count('city')}}</span></h3>
                        <p>+ Location</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-count text-center uppercase">
                        <div class="count-icon">
                            <img src="{{asset('img/icon/count-04.png')}}" alt="">
                        </div>
                        <h3><span class="counter2">{{\Illuminate\Support\Facades\DB::table('events')->distinct()->count('country')}}</span></h3>
                        <p>+ Countries</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--Counter area end-->



    <!--up comming events area-->
    <div id="about-event" class="upcomming-events-area off-white ptb100">
        <div class="container">
            <div class="row">
                <div class="total-upcomming-event col-md-12 col-sm-12 col-xs-12">

                    @foreach($events as $event)
                        <div class="single-upcomming shadow-box" style="padding-top: 0;">

                            <div class="col-xs-12 text-center bg-info" style="padding: 10px 15% 0 15%; margin-bottom: 25px;">
                                <h1 class="section-title">{{$event->event_title}}</h1>
                                <p>{{$event->brief}}</p>
                            </div>
                            <div class="col-md-4 hidden-sm col-xs-12">
                                <div class="sue-pic">
                                    <img style="height: 150px!important; width: 150px!important;" src="{{$event->image!=null ? '/storage'.substr($event->image, 6) : asset('img/event/sue-01.jpg')}}" alt="">
                                </div>
                                <div class="sue-date-time text-center">
                                    <span>{{substr($event->date,8,2).'-'.substr($event->date,5,2)}} <br> {{substr($event->date,0,4)}}</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-5 col-xs-12">
                                <div class="uc-event-title">
                                    <div class="uc-icon"><i class="zmdi zmdi-globe-alt"></i></div>
                                    <a><b style="color: #ff004d;">Location: </b>{{$event->city}}, {{$event->country}}</a>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-12">
                                <div class="uc-event-title">
                                    <div class="uc-icon"><i class="zmdi zmdi-mic"></i></div>
                                    <a><b style="color: #ff004d;">Speaker: </b>{{$event->speaker}}</a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div class="upcomming-ticket text-center">
                                    <a href="{{url('events/'.$event->id)}}" class="btn-def bnt-2 small">Learn More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <style>
                                .active span.page-link{
                                    background-color: #ff004d!important;
                                    border-color: #ff004d!important;
                                }

                                a.page-link{
                                    color: #ff004d!important;
                                }
                            </style>
                            {{ $events->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--up comming events area-->
@endsection
