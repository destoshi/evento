@extends('layouts.layout')



@section('event_show')

    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>



    <!--about area are start-->
    <div class="about-area ptb100 fix" id="about-event">
        <div class="container pt50">
            <div class="row">
                <div class="col-xs-12 mb50">
                    <div class="col-xs-8">
                        <h1 class="mb25"><strong>{{$event->event_title}}</strong></h1>
                    </div>
                    <div class="col-xs-2">
                        @can('update', $event)
                            <a href="/events/{{$event->id}}/edit" class="btn-def bnt-2">Edit Event</a>
                        @endcan
                    </div>
                    <div class="col-xs-2">
                        @can('update', $event)
                            <form action="/events/{{$event->id}}" method="post">
                                <!--<input onclick="confirm()" class="btn-def bnt-2" type="submit" value="Delete" name="delete">-->
                                <button style="background: #ff004d none repeat scroll 0 0; border: 1px solid #ff004d; color: #fff; float: none; height: 45px; margin-bottom: 0; border-radius: 5px; width: 130px;" class="inp-submit" type="submit" onclick="return confirm('Are you sure you want to Delete this Event?');">delete</button>
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>
                        @endcan
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="about-left">
                        <div class="about-top">
                            <h1 class="section-title">About Event</h1>
                            <div class="total-step">
                                <div class="descp">
                                    <p>{{$event->brief}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="about-right">
                        <ul>
                            <li><i class="zmdi zmdi-calendar-note"></i><b>Date: </b> {{$event->date}}</li>
                            <li><i class="zmdi zmdi-pin"></i><b>Location: </b>{{$event->city.', '.$event->country}}</li>
                            <li><i class="zmdi zmdi-account"></i><b>Created By: </b><a href="/profile/{{$event->user->id}}">{{$event->user->name}}</a></li>
                            <li><i class="zmdi zmdi-mic-setting"></i><b>Speaker: </b>{{$event->speaker}}</li>
                        </ul>
                        <div class="about-btn"> <a href="/getTicket/{{$event->id}}" class="btn-def bnt-2">Get Ticket</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--about area are end-->



    <!--event about area start-->
    <div class="event-about-are off-white ptb90">
        <div class="event-about-img" style="background-image: url('{{$event->image!=null ? '/storage'.substr($event->image, 6) : asset('img/slider/slider2.jpg')}}')!important; background-position: center!important;"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="section-title pb20">Content</h1>
                    <p>{{$event->event_content}}</p>
                </div>
            </div>
        </div>
    </div>



    <!--what-happen-area start-->
    <div id="happen" class="what-happen-area ptb100 off-white fix">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-xs-10">
                        <h1 class="section-title">Sessions</h1>
                    </div>
                    <div class="col-xs-2">
                        @can('update', $event)
                            <a type="button" data-toggle="modal" data-target="#createSession" href="#" class="btn-def bnt-2">Add Session</a>
                        @endcan
                        <!-- Modal -->
                            <div id="createSession" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Add a Session</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{url('addSession')}}" method="post">
                                                @csrf
                                                <input hidden type="text" name="event_id" value="{{$event->id}}">
                                                <input required placeholder="Session Title" style="width: 100%; margin-bottom: 20px;" type="text" name="session_title">
                                                <textarea required rows="10" placeholder="Session Content" name="session_content" style="resize: none; width: 100%; border: 1px solid #555555; border-radius: 5px;"></textarea>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-success mt20">Add</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                    </div>
                    <div class="clearfix"></div>
                    <div class="tab-menu-list pt20 mb70 text-center">
                        <ul class="nav happen-tab" role="tablist">
                            @foreach($event->sessions as $key=>$session)
                                <li role="presentation" @if($key == 0) class="active" @endif><a href="#{{$key}}" aria-controls="{{$key}}" role="tab" data-toggle="tab">Session {{$key+1}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        @if(count($event->sessions)<1)
                            <div class="col-xs-12 text-center">
                                <h2 class="text-info"><i class="zmdi zmdi-info"></i>No sessions added</h2>
                            </div>
                        @endif
                        <style>
                            .owl-wrapper{
                                width:100%!important;
                            }

                            .owl-wrapper .owl-item{
                                width:100%!important;
                            }
                        </style>
                        @foreach($event->sessions as $key=>$session)
                                <!-- Modal -->
                                <div id="editSession" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Add a Session</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{url('editSession')}}" method="post">
                                                    @csrf
                                                    <input hidden type="text" name="session_id" value="{{$session->id}}">
                                                    <input value="{{$session->session_title}}" required placeholder="Session Title" style="width: 100%; margin-bottom: 20px;" type="text" name="session_title">
                                                    <textarea required rows="10" placeholder="Session Content" name="session_content" style="resize: none; width: 100%; border: 1px solid #555555; border-radius: 5px;">{{$session->session_content}}</textarea>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-success mt20">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            <div role="tabpanel" @if($key==0)class="tab-pane fade in active" @elseif($key!=0) class="tab-pane fade in" @endif id="{{$key}}">
                                <div class="row">
                                    <div class="total-happen">
                                        <!--single happen start-->
                                        <div class="col-md-12">
                                            <div class="single-happen">
                                                <div class="happen-top mb30">
                                                    <div class="happen-time-date">
                                                        <div class="col-xs-10">
                                                            <h2>{{$session->session_title}}</h2>
                                                        </div>
                                                        <div class="col-xs-1">
                                                            @can('update', $event)
                                                            <button class="btn btn-success" data-toggle="modal" data-target="#editSession">Edit</button>
                                                            @endcan

                                                        </div>
                                                        <div class="col-xs-1">
                                                            @can('update', $event)
                                                                <form action="{{url('deleteSession')}}" method="post">
                                                                    <!--<input onclick="confirm()" class="btn-def bnt-2" type="submit" value="Delete" name="delete">-->
                                                                    <input hidden type="text" name="event_id" value="{{$session->event_id}}">
                                                                    <input hidden type="text" name="session_id" value="{{$session->id}}">
                                                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to Delete this Session?');">delete</button>
                                                                    {{ csrf_field() }}
                                                                </form>
                                                            @endcan
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <p>{{$session->session_content}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--single happen end-->
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--what-happen-area end-->




@section('events')
    <!--up comming events area-->
    <div class="upcomming-events-area off-white ptb100">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="section-title">Recent Events</h1>
                </div>

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
                                <a href="/events/{{$event->id}}" class="btn-def bnt-2 small">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--up comming events area-->
@endsection
