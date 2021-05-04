<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Staffappraisal - @yield('title')</title>
        
        <link rel="stylesheet" href="{{ asset('frontend/assets/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/fonts/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/fonts/line-awesome.min.css')}}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Antic">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Asap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/Footer-Dark.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/Login-Form-Clean.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/Navigation-with-Button.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/styles.css')}}">
    </head>

    <body>
        <div id="naviga-tion">
            <nav class="navbar navbar-light navbar-expand-md fixed-top navigation-clean-button"
                style="font-family: Raleway, sans-serif;font-size: 14px;">
                <div class="container"><a class="navbar-brand" href="{{ route('index') }}"
                        style="font-family: Raleway, sans-serif;font-weight: bold;font-size: 28px;">Staff<span
                            style="color: rgb(86,198,198);">Appraisal</span></a><button data-toggle="collapse"
                        class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle
                            navigation</span><span class="navbar-toggler-icon"
                            style="color: rgb(86,198,198);"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="{{route('index')}}" style="color: rgb(86,198,198);"><span class="icon ion-home"></span> Home</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#">About us</a></li>
                        </ul><span class="navbar-text actions"> <a class="btn btn-light action-button" role="button"
                                href="{{ route('login') }}">Sign in</a></span>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container-fluid" style="background-color: #cde8e8;margin-top: 85px;">
            <div class="carousel slide" data-ride="carousel" id="carousel-1">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-4 offset-1 slider-image"><img
                                    src="{{ asset('frontend/assets/img/image5.png') }}" width="100%"
                                    style="filter: grayscale(49%);"></div>
                            <div class="col-md-6 offset-0 align-self-center slider-text"
                                style="font-family: Raleway, sans-serif;padding-bottom: 15px;">
                                <h1 class="display-4 text-center text-md-left"
                                    style="color: rgb(46,105,105);font-size: 35px;">Appraisal Made Easy!</h1>
                                <p class="text-center text-md-left">
                                    Staff Appraisal is the fulcrum on which Staff promotions revolve. 
                                    This platform makes it easier for Staff of an Organization to 
                                    be appraised by ensuring that they submit the required criteria 
                                    for assessment remotely.

                                </p>
                                <p class="text-center text-md-left">
                                <a href="{{ route('login') }}" class="btn btn-outline-primary"
                                        role="button">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4 offset-1 slider-image"><img
                                    src="{{ asset('frontend/assets/img/image1.png') }}" width="100%"
                                    style="filter: grayscale(49%);"></div>
                            <div class="col-md-6 offset-0 align-self-center slider-text"
                                style="font-family: Raleway, sans-serif;padding-bottom: 15px;">
                                <h1 class="display-4 text-center text-md-left"
                                    style="color: rgb(46,105,105);font-size: 35px;">Contactless Appraisal System</h1>
                                <p class="text-center text-md-left">
                                    Do you know that you can submit your appraisal form remotely and be assessed without 
                                    physically getting in touch with your Assessor?
                                </p>
                                <p class="text-center text-md-left">
                                <a href="{{ route('login') }}" class="btn btn-outline-primary"
                                        role="button">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4 offset-1 slider-image"><img
                                    src="{{ asset('frontend/assets/img/image6.png') }}" width="100%"
                                    style="filter: grayscale(49%);"></div>
                            <div class="col-md-6 offset-0 align-self-center slider-text"
                                style="font-family: Raleway, sans-serif;padding-bottom: 15px;">
                                <h1 class="display-4 text-center text-md-left"
                                    style="color: rgb(46,105,105);font-size: 35px;">Why Delayed Promotion?</h1>
                                <p class="text-center text-md-left">
                                    Most Staff are worried over delayed promotion due to the manual processes 
                                    involved in handling Staff appraisals. Worry no more! Feel free to submit your 
                                    appraisal on this platform via the login page.    
                                </p>
                                <p class="text-center text-md-left">
                                <a href="{{ route('login') }}" class="btn btn-outline-primary"
                                        role="button">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4 offset-1 slider-image"><img
                                    src="{{ asset('frontend/assets/img/image4.png') }}" width="100%"
                                    style="filter: grayscale(49%);"></div>
                            <div class="col-md-6 offset-0 align-self-center slider-text"
                                style="font-family: Raleway, sans-serif;padding-bottom: 15px;">
                                <h1 class="display-4 text-center text-md-left"
                                    style="color: rgb(46,105,105);font-size: 35px;">Smiles on Staff Faces!</h1>
                                <p class="text-center text-md-left">
                                Hurray! Staff appraisals and promotions are done as at when due. Staff now 
                                enjoy promotions without delay. Congratulations to all Staff!
                                </p>
                                <p class="text-center text-md-left">
                                <a href="{{ route('login') }}" class="btn btn-outline-primary" role="button">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><i
                            class="la la-caret-left" style="color: rgb(46,105,105);"></i><span
                            class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1"
                        role="button" data-slide="next"><i class="la la-caret-right"
                            style="color: rgb(46,105,105);"></i><span class="sr-only">Next</span></a></div>
            </div>
        </div>