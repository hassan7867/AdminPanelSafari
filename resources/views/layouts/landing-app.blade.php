<!doctype html>
<html lang="en">


<!-- Mirrored from appscred.com/html/saasly/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Apr 2021 10:48:32 GMT -->
<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!--====== Title ======-->
    <title>{{env('APP_NAME')}}</title>

    <!--====== Favicon Icon ======-->
    {{-- <link rel="shortcut icon" href="{{url('')}}/assets/images/logo.png" type="image/png"> --}}

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{url('')}}/assets/css/bootstrap.min.css">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{url('')}}/assets/css/font-awesome.min.css">

    <!--====== magnific popup css ======-->
    <link rel="stylesheet" href="{{url('')}}/assets/css/magnific-popup.css">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{url('')}}/assets/css/slick.css">

    <!--====== animation css ======-->
    <link rel="stylesheet" href="{{url('')}}/assets/css/animate.min.css">

    <!--====== custom animation css ======-->
    <link rel="stylesheet" href="{{url('')}}/assets/css/custom-animation.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{url('')}}/assets/css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{url('')}}/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('bootstrap.min.css')}}" rel="stylesheet">

    <!--====== jquery js ======-->
    <script src="{{url('')}}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="{{url('')}}/assets/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{url('')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{url('')}}/assets/js/popper.min.js"></script>

    <!--====== magnific popup js ======-->
    <script src="{{url('')}}/assets/js/jquery.magnific-popup.min.js"></script>

    <!--====== wow js ======-->
    <script src="{{url('')}}/assets/js/wow.js"></script>

    <!--====== Slick js ======-->
    <script src="{{url('')}}/assets/js/slick.min.js"></script>

    <!--====== counterup js ======-->
    <script src="{{url('')}}/assets/js/jquery.counterup.min.js"></script>
    <script src="{{url('')}}/assets/js/waypoints.min.js"></script>

    <!--====== Main js ======-->
    <script src="{{url('')}}/assets/js/main.js"></script>
    <script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>

    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('jquery/3.5.1/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('popper/popper.min.js')}}"></script>
    <style>
        .blackcolorlink {
            color: black !important;
        }

        .activenavlink {
            border-bottom: 2px solid;
        }

        hr.new5 {
            border: 2px solid #6b9ce8;
            /*border-radius: 5px;*/
        }

        .facustom {
            padding: 10px;
            font-size: 20px;
            width: 40px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
            border-radius: 50%;
        }

        .facustom:hover {
            opacity: 0.7;
            color: white;
        }

        .fa-facebook {
            background: #3B5998;
            color: white;
        }

        .fa-twitter {
            background: #55ACEE;
            color: white;
        }

        /*Cookie Consent Begin*/
        #cookieConsent {
            background-color: rgba(20,20,20,0.8);
            min-height: 26px;
            font-size: 14px;
            color: #ccc;
            line-height: 26px;
            padding: 20px;
            font-family: "Trebuchet MS",Helvetica,sans-serif;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            display: none;
            z-index: 9999;
        }
        #cookieConsent a {
            color: #4B8EE7;
            text-decoration: none;
        }
        #closeCookieConsent {
            float: right;
            display: inline-block;
            cursor: pointer;
            height: 20px;
            width: 20px;
            margin: -15px 0 0 0;
            font-weight: bold;
        }
        #closeCookieConsent:hover {
            color: #FFF;
        }
        #cookieConsent a.cookieConsentOK {
            background-color: #6b9ce8;
            color: white;
            display: inline-block;
            border-radius: 5px;
            padding: 0 20px;
            cursor: pointer;
            float: right;
            margin: 0 60px 0 10px;
        }
        #cookieConsent a.cookieConsentOK:hover {
            background-color: #6b9ce8;
        }
        /*Cookie Consent End*/

        .dropdown:hover .dropdown-menu{
            display: block;
        }
        .dropdown-menu{
            margin-top: 0;
        }
        .onlyonmobile{
            display: none;
        }

        @media screen and (max-width: 600px) {
            .onlyonmobile{
                display: inline;
            }
        }
    </style>

</head>

<body>
<!--====== PRELOADER PART START ======-->
<div id="cookieConsent">
    <div id="closeCookieConsent">x</div>
    This website is using cookies. <a href="{{url('')}}" target="_blank">More info</a>. <a class="cookieConsentOK">That's Fine</a>
</div>

<div class="preloader" id="preloader">
    <div class="three ">
        <div class="loader" id="loader">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<header class="header-area">
    <div class="header-nav" style="top: 0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">

                </div>
                <div class="col-lg-6 ml-5">
                    <div class="navigation">
                        <nav class="navbar navbar-expand-lg navbar-light " style="margin-top: 30px;margin-bottom: 30px">
                            <a class="navbar-brand" href="{{url('')}}" style="color: black;font-size: 30px">{{env('APP_NAME')}}</a>

                            <a class="navbar-brand-2" href="{{url('')}}" style="color: black;font-size: 30px">{{env('APP_NAME')}}</a>
                            <!-- logo -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation" style="color: black">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button> <!-- navbar toggler -->

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                {{--<ul class="navbar-nav ml-auto">--}}
{{--                                    <li class="nav-item active">--}}
{{--                                        <a class="nav-link {{!\Request::is('/') ? 'blackcolorlink ' : ''}}{{\Request::is('/') ? 'activenavlink' : ''}}"--}}
{{--                                           href="{{url('')}}">HOME</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link {{!\Request::is('/') ? 'blackcolorlink ' : ''}}{{\Request::is('features') ? 'activenavlink' : ''}}"--}}
{{--                                           href="{{url('features')}}">FEATURES </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link {{!\Request::is('/') ? 'blackcolorlink ' : ''}}{{\Request::is('search-work') ? 'activenavlink' : ''}}"--}}
{{--                                           href="{{url('search-work')}}">SEARCH WORK </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link {{!\Request::is('/') ? 'blackcolorlink ' : ''}} {{\Request::is('faqs') ? 'activenavlink' : ''}}{{\Request::is('reviews') ? 'activenavlink' : ''}}{{\Request::is('guides') ? 'activenavlink' : ''}}{{\Request::is('tips') ? 'activenavlink' : ''}}" href="#">YOUR BEST HUB </a>--}}
{{--                                        <ul class="sub-menu">--}}
{{--                                            <li><a href="{{url('faqs')}}">FAQS</a></li>--}}
{{--                                            <li><a href="{{url('reviews')}}">Review</a></li>--}}
{{--                                            <li><a href="{{url('guides')}}">GUIDES</a></li>--}}
{{--                                            <li><a href="{{url('tips')}}">Quick Tips</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link {{!\Request::is('/') ? 'blackcolorlink ' : ''}}{{\Request::is('reviews') ? 'activenavlink' : ''}}"--}}
{{--                                           href="{{url('reviews')}}">REVIEWS </a>--}}

{{--                                    </li>--}}
                                    {{--@if(!\Illuminate\Support\Facades\Session::has('userId'))--}}
                                    {{--<li class="nav-item onlyonmobile">--}}
                                        {{--<a class="nav-link"--}}
                                           {{--href="{{url('/register')}}">REGISTER</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="nav-item onlyonmobile">--}}
                                        {{--<a class="nav-link"--}}
                                           {{--href="{{url('/login')}}">SIGN IN</a>--}}
                                    {{--</li>--}}
                                    {{--@else--}}
                                    {{--<li class="nav-item onlyonmobile">--}}
                                        {{--<a class="nav-link"--}}
                                           {{--href="{{url('/dashboard')}}">Dashboard</a>--}}
                                    {{--</li>--}}
                                    {{--@endif--}}
                                {{--</ul>--}}
                            </div> <!-- navbar collapse -->
                            {{--@if(!\Illuminate\Support\Facades\Session::has('userId'))--}}
                                {{--<div class="navbar-btn d-none d-sm-block">--}}
                                    {{--<a class="main-btn" style="background: #6fc3e6!important;color: white"--}}
                                       {{--href="{{url('/register')}}">REGISTER</a>--}}
                                {{--</div>--}}
                                {{--<div class="navbar-btn d-none d-sm-block">--}}
                                    {{--<a class="main-btn" style="background: white!important;color: #6fc3e6"--}}
                                       {{--href="{{url('/login')}}">SIGN IN</a>--}}
                                {{--</div>--}}
                            {{--@else--}}
                                {{--<div class="navbar-btn d-none d-sm-block">--}}
                                    {{--<a class="main-btn" style="background: #6fc3e6!important;color: white"--}}
                                       {{--href="{{url('/dashboard')}}">Dashboard</a>--}}
                                {{--</div>--}}
                                {{--                                <div class="navbar-btn d-none d-sm-block">--}}
                                {{--                                    <a class="main-btn" href="{{url('/logout-user')}}">LOGOUT</a>--}}
                                {{--                                </div>--}}
                            {{--@endif--}}
                        </nav>
                    </div> <!-- navigation -->
                </div>
            </div> <!-- row -->
        </div>
    </div>
</header>

<!--====== HEADER PART ENDS ======-->
@yield('content')
<!--====== FOOTER PART START ======-->

<footer class="footer-area" style="background-color: rgba(211,211,211,0.57);padding-top: 0px;margin-top: 100px;">
    <div class="container">
        <div class="footer-items" style="margin-top: 0px;border-top: 0px">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-about-1 mt-30" style="padding: 40px;padding-bottom: 0px">
                        <a href="{{url('')}}" style="color: black;font-size: 20px">{{env('APP_NAME')}}</a>
                        {{-- <p style="padding-top: 0px">Address: {{env('APP_ADDRESS')}}</p> --}}
{{--                        <p style="padding-top: 0px">--}}
{{--                            Company Registered in England & Wales No. 13335834--}}
{{--                        </p>--}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
{{--                    <div style="margin: 0 auto;max-width: 200px;margin-top: 180px">--}}
{{--                        <a href="{{url('about')}}">About</a><br>--}}
{{--                        <a href="{{url('user-agreement')}}">User Agreement</a><br>--}}
{{--                        <a href="{{url('privacy-policy')}}">Privacy Policy</a>--}}
{{--                    </div>--}}
                </div>
                <div class="col-lg-4 col-md-4">
                    <div style="margin-top: 60px">
                        {{-- <p style="padding: 2px">
                            Email: <a href="mailto:{{env('APP_EMAIL')}}">{{env('APP_EMAIL')}}</a>
                        </p>
                        <p style="padding: 2px">
                            Tel: <a href="tel:{{env('APP_PHONE')}}">{{env('APP_PHONE')}}</a>
                        </p> --}}
                        <a target="_blank" href="#" class="fa fa-facebook facustom"></a>
                        <a target="_blank" href="#" class="fa fa-twitter facustom"></a>
                    </div>
                </div>
            </div>

            <div style="margin-top: 30px">
                <p style="text-align: center;padding: 20px;padding-top: 0px">Copyright 2021 @Breeze Safaris Operators. All Rights
                    Reserved</p>
            </div>

        </div>
    </div>
</footer>

<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: #00000033">
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title">YouTube Video</h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--            </div>--}}
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe id="cartoonVideo" class="embed-responsive-item" width="560" height="315" src="//www.youtube.com/embed/YE7VzlLtp-4" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="trustedsite-trustmark" data-type="202" data-width="120"  data-height="50"></div>


<!--====== FOOTER PART ENDS ======-->

<!--====== BACK TO TOP START ======-->

<a class="back-to-top" style="display: none;opacity: 0">
    <i class="fal fa-angle-up"></i>
</a>

<!--====== BACK TO TOP ENDS ======-->

<script>
    $(document).ready(function(){
        /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */
        var url = $("#cartoonVideo").attr('src');

        /* Assign empty url value to the iframe src attribute when
        modal hide, which stop the video playing */
        $("#myModal").on('hide.bs.modal', function(){
            $("#cartoonVideo").attr('src', '');
        });

        /* Assign the initially stored url back to the iframe src
        attribute when modal is displayed again */
        $("#myModal").on('show.bs.modal', function(){
            $("#cartoonVideo").attr('src', url);
        });

        setTimeout(function () {
            if(!localStorage.hasOwnProperty('cookiesConsent')){
                $("#cookieConsent").fadeIn(200);
            }
        }, 4000);
        $("#closeCookieConsent, .cookieConsentOK").click(function() {
            localStorage.setItem('cookiesConsent', 1);
            $("#cookieConsent").fadeOut(200);
        });

        $(".dropdown").hover(function(){
            var dropdownMenu = $(this).children(".dropdown-menu");
            if(dropdownMenu.is(":visible")){
                dropdownMenu.parent().toggleClass("open");
            }
        });

    });
</script>
</body>


</html>

