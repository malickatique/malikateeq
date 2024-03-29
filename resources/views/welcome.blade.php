<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ asset('images/'.$settings->favicon) }}">
        <title> {{ $settings->title }} </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Bootstrap 4 -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Styles -->

        <style>
            html, body {
                /* background: url("images/bg-image.jpg")no-repeat center center; */
                background: url("images/{{$settings->bg_image}}")no-repeat center center;
                background-size: cover;
                background-color: #263b31;
                font-family: "Arial", sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0px;
                color: white;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .title {
                text-transform: uppercase;
                font-size: 60px;
                font-family: "Times New Roman", "Times";
            }
            .sub-title{
                letter-spacing: 2.5px;
                text-transform: uppercase;
                font-size: 22px;
                font-family: "arial";
            }
            .description{
                font-family: "arial";
            }

            .ext-links{
                padding: 10px 0px;
                font-size: 13px;
                letter-spacing: 2.5px;
                text-transform: uppercase;
                font-weight: bold;
                border: 2px solid white;
            }
            @media screen and (max-width: 1200px) {

                .title {
                    font-size: 50px;
                }
            }
            @media screen and (max-width: 1200px) {

                .title {
                    font-size: 45px;
                }
            }
            @media screen and (max-width: 1000px) {

                .title {
                    font-size: 40px;
                }
            }
            @media screen and (max-width: 900px) {
                .title {
                    font-size: 30px;
                }
                .sub-title{
                    font-size: 18px;
                }
                .description{
                    font-size: 15px;
                }
            }
            @media screen and (max-width: 700px) {
                .title {
                    font-size: 35px;
                }
                .sub-title{
                    font-size: 18px;
                }
                .description{
                    font-size: 15px;
                }
            }
            @media screen and (max-width: 600px) {
                div.btns {
                    /* color: white; */
                    margin: 0px 100px 0px 0px;
                    padding: 0px 5px 0px 10px;
                }
                .title {
                    font-size: 35px;
                }
                .sub-title{
                    font-size: 18px;
                }
                .description{
                    font-size: 15px;
                }
            }
            @media screen and (max-width: 400px) {
                div.box {
                    /* color: red; */
                }
                .title {
                    font-size: 30px;
                }
                .sub-title{
                    font-size: 12px;
                }
                .description{
                    font-size: 14px;
                }
                div.row
                {
                    display: inline;
                    margin-right: 0px;
                    margin-left: 0px;
                }
                div.container-fluid
                {
                    margin: 0px;
                    margin: 0px;
                }
            }
            @media screen and (max-width: 335px) {
                div.box {
                    /* color: red; */
                }
                .title {
                    font-size: 25px;
                }
                .sub-title{
                    font-size: 10px;
                }
                .description{
                    font-size: 12px;
                }
                div.social-icons img{
                    width: 10px;
                    height: 10px;
                    margin: 13px 8px;
                }
                div.container-fluid
                {
                    margin: 0px;
                    margin: 0px;
                }
            }
            @media screen and (max-width: 280px) {
                .title {
                    font-size: 15px;
                }
                .sub-title{
                    font-size: 8px;
                }
                .description{
                    font-size: 10px;
                }
                div.social-icons img{
                    width: 10px;
                    height: 10px;
                    margin: 13px 3px;
                }
                div.container-fluid
                {
                    margin: 0px;
                    margin: 0px;
                }
            }
            .social-icons img{
                width: 20px; 
                height: 20px;
                margin: 13px 8px;
            }
            .social-icons img:hover{
                filter: brightness(60%);
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height container-fluid">

            <!-- nav bar -->
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Settings</a>
                    @else
                        <!-- <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif -->
                    @endauth
                </div>
            @endif
            <!-- end nav bar -->

            <div class="row container-fluid">

                <div class="col-md-7 col-sm-4 col-xs-0">
                </div>
                
                <div class="col-md-5 col-sm-8 col-xs-12">

                    <div class="row">
                        <div class="col-md-12 title">
                            {{ $settings->name }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 sub-title mb-3">
                            {{ $settings->one_liner }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-8 description mb-3">
                        {{ $settings->description }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-10 col-sm-6 col-xs-6 btns my-2">
                            <a href="{{$settings->btn1_link}}" class="btn btn-outline-light btn-block ext-links" target="_blank">
                                {{$settings->btn1_text}}
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-10 col-sm-6 col-xs-6 btns my-2">
                            <a href="{{$settings->btn2_link}}" class="btn btn-outline-light btn-block ext-links" target="_blank">
                                {{$settings->btn2_text}}
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-10 col-sm-6 col-xs-6 btns my-2">
                            <button type="button" class="btn btn-outline-light btn-block ext-links"
                            data-toggle="modal" data-target="#contactModal">
                                {{$settings->btn3_text}}
                            </button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-lg" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark text-center" id="contactModalLabel">CONTACT</h5>
                                <button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <form method="POST" action="{{ route('contact') }}">
                                @csrf
                                <div class="modal-body text-dark">
                                    <div class="row name">
                                        <div class="form-group col-md-6">
                                            <label for="first_name">{{ __('Name*') }}</label>
                                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name" name="first_name" required>
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="last_name">.</label>
                                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name" name="last_name" required>
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="email">{{ __('Email Address*') }}</label>
                                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="email" name="email" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="subject">{{ __('Subject*') }}</label>
                                        <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" placeholder="subject" name="subject" required>
                                        @error('subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="message">{{ __('Message*') }}</label>
                                        <input id="message" type="text" class="form-control @error('message') is-invalid @enderror" placeholder="your message :)" name="message" required>
                                        @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 social-icons">
                            <a href="{{ $settings->youtube_link }}" target="_blank">
                                <img src="{{asset('/images/youtube.png')}}" alt="">
                            </a>
                            <a href="{{ $settings->insta_link }}" target="_blank">
                                <img src="{{asset('/images/instagram.png')}}" alt="">
                            </a>
                            <a href="{{ $settings->fb_link }}" target="_blank">
                                <img src="{{asset('/images/facebook.png')}}" alt="">
                            </a>
                            <a href="{{ $settings->twitter_link }}" target="_blank">
                                <img src="{{asset('/images/twitter.png')}}" alt="">
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </body>
</html>
