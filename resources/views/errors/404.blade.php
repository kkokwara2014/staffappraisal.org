<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>System Error!</title>
        <link rel="stylesheet" href="{{ asset('frontend/assets/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/fonts/ionicons.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.0/css/ionicons.min.css"
            integrity="sha512-0/rEDduZGrqo4riUlwqyuHDQzp2D1ZCgH/gFIfjMIL5az8so6ZiXyhf1Rg8i6xsjv+z/Ubc4tt1thLigEcu6Ug=="
            crossorigin="anonymous" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/fonts/line-awesome.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Antic">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Asap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/Footer-Dark.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/Login-Form-Clean.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/Navigation-with-Button.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/styles.css') }}">
    </head>

    <body>
        <div id="naviga-tion">
            <nav class="navbar navbar-light navbar-expand-md fixed-top navigation-clean-button"
                style="font-family: Raleway, sans-serif;font-size: 14px;">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('index') }}"
                        style="font-family: Raleway, sans-serif;font-weight: bold;font-size: 28px;">Staff<span
                            style="color: rgb(86,198,198);">appraisal</span></a>
                    <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span
                            class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"
                            style="color: rgb(86,198,198);"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item" role="presentation"><a class="nav-link"
                                    href="{{ route('index') }}"><span class="icon ion-home"></span> Home</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#">About us</a></li>
                        </ul><span class="navbar-text actions"> <a class="btn btn-light action-button" role="button"
                                href="{{ route('login') }}">Sign in</a></span>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container-fluid" style="background-color: #cde8e8;margin-top: 85px;">
            <div class="row">
                <div class="col-8 col-md-5 col-lg-4 offset-2 offset-md-1 offset-lg-2 slider-image"><img
                        src="{{ asset('frontend/assets/img/image5.png') }}" width="100%"
                        style="filter: grayscale(49%);"></div>
                <div class="col-10 col-sm-8 col-md-5 col-lg-4 col-xl-4 offset-1 offset-sm-2 offset-md-0 align-self-center slider-text"
                    style="font-family: Raleway, sans-serif;padding-bottom: 15px;padding-top: 15px;">

                    <h2 class="sr-only">Error!</h2>
                    <h2><span class="fa fa-exclamation-triangle"></span> Error!</h2>

                    <h3>OOPS! Server not responding at the moment.</h3>

                    <br>

                    <div>
                        <span class="navbar-text actions"> <a class="btn btn-light action-button" role="button"
                                href="{{ route('login') }}">Sign in</a></span>
                    </div>


                </div>
            </div>
        </div>
        <div class="footer-dark">
            <footer>
                <div class="container-fluid">
                    <div class="row" style="font-family: Raleway, sans-serif;">
                        <div class="col-md-3 offset-md-1 item">
                            <h3>Links</h3>
                            <ul>
                                <li><a href="{{route('index')}}">Home</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="{{ route('login') }}">Sign in</a></li>
                            </ul>
                        </div>
                        <div class="col-md-7 item text">
                            <h3>About Staff<span style="color: rgb(86,198,198);">appraisal</span></h3>
                            <p style="text-align:justify">
                                Appraisal is the foundation on which Staff promotion is built. Appraisal reveals the
                                efforts and contributions which each Staff in an organization has been making over a
                                specified period of time. This platform ensures that Staff send in the required
                                criteria upon which they can be assessed accordingly by the Constituted Authorities
                                within the Organization.
                            </p>
                        </div>
                        <div class="col-md-10 offset-md-1 item social">
                            <a href="#">
                                <i class="icon ion-social-facebook"></i>
                            </a>
                            <a href="#">
                                <i class="icon ion-social-twitter"></i>
                            </a>

                        </div>
                    </div>
                    <p class="copyright">staffappraisal.org © 2021</p>
                </div>
            </footer>
        </div>
        <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/bootstrap/js/bootstrap.min.js') }}"></script>


        <script>
            $(function(){
        window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
          });
      }, 5000);
      })
        </script>
    </body>

</html>