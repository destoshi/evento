@extends('layouts.layout')

@section('events')





    <div class="container mb100 pt100">
        <style>



            .file-upload {
                width: 49%;
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
        <div class="row">
            <div class="col-md-12">
                <div class="pt50 mb25">
                    <h1>ADD A NEW EVENT: </h1>
                </div>
                <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

                <form action="{{ route('events.store') }}" method="post" enctype="multipart/form-data">

                    <input required type="text" placeholder="Title*" class="input100 info" name="event_title">
                    <input required class="input100 date inp-fr" type="text" placeholder="Select Date* " name="date">
                    <input required type="text" placeholder="Speaker*" class="input100 info" name="speaker">
                    <textarea required rows="6" maxlength="1000" class="input100 info inp-fr" name="brief" placeholder="Brief*"></textarea>
                    <input required type="text" placeholder="City*" class="input100 info" name="city">
                    <input required type="text" placeholder="Country*" class="input100 info" name="country">
                    <textarea required rows="10" maxlength="2500" class="input100 info inp-fr" name="event_content" placeholder="Content*"></textarea>
                    <div class="file-upload">
                        <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                        <div class="image-upload-wrap">
                            <input required name="event_img" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
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
                    <input type="submit" value="Add" class="inp-submit text-center center-block">


                </form>
            </div>
        </div>
    </div>

@endsection
