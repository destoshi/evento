@extends('layouts.layout')





@section('slider_area')
    <div style="background-image: url('{{asset('img/bg/profile-bg.jpg')}}'); height: 100vh; background-position: center; background-size: cover;">
        <div style="background-color: rgba(8,15,29,0.5); height: 100%; display: table; width: 100%;">
            <div class="text-center" style="display: table-cell; vertical-align: middle;">
                <img style="width: 16%; border-radius: 250px;" src="{{$user->image != null ? '/storage'.substr($user->image, 6) : asset('img/blog/blog-01.jpg')}}" alt="user_img">
                <h1 class="mt20" style="color: white;"><strong>{{$user->name}}</strong></h1>
                @if($logged=\Illuminate\Support\Facades\Auth::user()->id === $user->id)
                    <div class="text-center mt20">
                        <button class="btn btn-success" onclick="window.location.href='/events/create'">Create Event</button><br><br>
                        <a style="color: white;" type="button" data-toggle="modal" data-target="#profileImg" href="#" class="btn-def bnt-2">Change Profile Image</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="profileImg" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Change Image</h4>
                </div>
                <div class="modal-body">
                    <form action="{{url('profileImg')}}" method="post" enctype="multipart/form-data">
                        <div class="file-upload">
                            <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                            <div class="image-upload-wrap">
                                <input type="text" name="user_id" value="{{$user->id}}" hidden>
                                <input required name="profile_img" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                <div class="drag-text">
                                    <h3>Drag and drop a file or select add Image</h3>
                                </div>
                            </div>
                            <div class="file-upload-content">
                                <img class="file-upload-image" src="#" alt="your image" />
                                <div class="image-title-wrap">
                                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                </div>
                            </div>


                        </div>
                        @csrf
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

    <style>



        .file-upload {
            width: 100%;
        }

        .file-upload-btn {
            width: 100%;
            margin: 0;
            color: #fff;
            background: #ff004d;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #be003a;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }

        .file-upload-btn:hover {
            background: #de0043;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .file-upload-btn:active {
            border: 0;
            transition: all .2s ease;
        }

        .file-upload-content {
            display: none;
            text-align: center;
        }

        .file-upload-input {
            position: absolute;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            outline: none;
            opacity: 0;
            cursor: pointer;
        }

        .image-upload-wrap {
            margin-top: 20px;
            border: 4px dashed #ff004d;
            position: relative;
        }

        .image-dropping,
        .image-upload-wrap:hover {
            background-color: #ff004d;
            border: 4px dashed #ffffff;
        }

        .image-title-wrap {
            padding: 0 15px 15px 15px;
            color: #222;
        }

        .drag-text {
            text-align: center;
        }

        .image-upload-wrap:hover >.drag-text h3{
            color: white;
        }

        .drag-text h3 {
            font-weight: 100;
            text-transform: uppercase;
            color: #ff004d;
            padding: 60px 0;
        }

        .file-upload-image {
            max-height: 200px;
            max-width: 200px;
            margin: auto;
            padding: 20px;
        }

        .remove-image {
            width: 200px;
            margin: 0;
            color: #fff;
            background: #cd4535;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #b02818;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }

        .remove-image:hover {
            background: #c13b2a;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .remove-image:active {
            border: 0;
            transition: all .2s ease;
        }


        .input100{
            width:49%;
            margin-bottom: 15px;
        }

        .input100:active{
            border: 1px solid #ff004d;
        }

        textarea{
            padding: 0 15px;
            border: 1px solid #555555;
            border-radius: 4px;
            resize: none;
        }

        .inp-fr{
            float: right;
        }

        .inp-submit{
            background: #ff004d none repeat scroll 0 0;
            border: 1px solid #ff004d;
            color: #fff;
            float: none;
            height: 45px;
            margin-bottom: 0;
            margin-top: 50px;
            width: 130px;
        }
    </style>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.image-upload-wrap').hide();

                    $('.file-upload-image').attr('src', e.target.result);
                    $('.file-upload-content').show();

                    $('.image-title').html(input.files[0].name);
                };

                reader.readAsDataURL(input.files[0]);

            } else {
                removeUpload();
            }
        }

        function removeUpload() {
            $('.file-upload-input').replaceWith($('.file-upload-input').clone());
            $('.file-upload-content').hide();
            $('.image-upload-wrap').show();
        }
        $('.image-upload-wrap').bind('dragover', function () {
            $('.image-upload-wrap').addClass('image-dropping');
        });
        $('.image-upload-wrap').bind('dragleave', function () {
            $('.image-upload-wrap').removeClass('image-dropping');
        });
    </script>
@endsection


@section('events')
    <!--my events area-->
    <div id="about-event" class="upcomming-events-area off-white ptb100">
        <div class="container">
            <div class="row">
                <div class="total-upcomming-event col-md-12 col-sm-12 col-xs-12">

                    <h1 class="card-title mb40" style="color: #ff004d;">{{$logged=\Illuminate\Support\Facades\Auth::user()->id === $user->id ? 'My Events' : ucfirst(strtolower($user->name)).' Events'}}:</h1>

                    @if($user->events->count()<1)
                        <div class="card text-left">
                            <h3 class="text-info">This User Has No Events To Show</h3>
                        </div>
                    @endif


                    @foreach($user->events as $event)
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

                </div>
            </div>
        </div>
    </div>
    <!--my events area-->





    @if($logged=\Illuminate\Support\Facades\Auth::user()->id === $user->id)
        <!--my tickets area-->
        <div id="tickets" class="upcomming-events-area off-white ptb100">
            <div class="container">
                <div class="row">
                    <div class="total-upcomming-event col-md-12 col-sm-12 col-xs-12">

                        <h1 class="card-title mb40" style="color: #ff004d;">My Tickets:</h1>


                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="day-02-one">
                                <div class="total-timeline">

                                    @foreach($user->tickets as $ticket)

                                        <!--single timeline start-->
                                            <div id="{{$ticket->id}}" class="single-timeline shadow-box">
                                                <div class="timeline-left">
                                                    <p>Name:</p>
                                                    <h4>{{$user->name}}</h4>
                                                    <div class="no-print">
                                                        <a class="btn-info" style="padding: 5px; border-radius: 3px; cursor: pointer;" onclick="printDiv('{{$ticket->id}}')">Download Ticket</a>
                                                    </div>
                                                </div>
                                                <div class="timeline-right">
                                                    <div class="timeline-img">
                                                        <img src="{{$user->image != null ? '/storage'.substr($user->image, 6) : asset('img/blog/blog-01.jpg')}}" alt="">
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


                                    @endforeach

                                </div>
                            </div>

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
                        <script>
                            function printDiv(divName){
                                var printContents = document.getElementById(divName).innerHTML;
                                var originalContents = document.body.innerHTML;

                                document.body.innerHTML = printContents;

                                window.print();

                                document.body.innerHTML = originalContents;

                            }
                        </script>




                    </div>
                </div>
            </div>
        </div>
    @endif


@endsection
