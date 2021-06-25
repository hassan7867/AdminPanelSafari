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
    <link rel="shortcut icon" href="{{url('')}}/assets/images/logo.png" type="image/png">

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
    <script type="text/javascript"
            src="{{ \Illuminate\Support\Facades\URL::asset('jquery/3.5.1/jquery.min.js')}}"></script>
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
            background-color: rgba(20, 20, 20, 0.8);
            min-height: 26px;
            font-size: 14px;
            color: #ccc;
            line-height: 26px;
            padding: 20px;
            font-family: "Trebuchet MS", Helvetica, sans-serif;
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

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu {
            margin-top: 0;
        }

        .onlyonmobile {
            display: none;
        }

        @media screen and (max-width: 600px) {
            .onlyonmobile {
                display: inline;
            }
        }
    </style>

</head>

<body>
<div class="container">
    <div style="padding: 50px">
        <h1 style="text-align: center">Customer Payment</h1>

        <div class="row">
            <div style="padding: 20px;"><img style="width: 100px;height: 100px;border-radius: 50%"
                                             src="{{url('')}}/view-user-file/{{$operator->id}}"></div>
            <div class="mt-25" style="padding: 20px;text-decoration: underline"><h3>{{$operator->company_name}}</h3>
            </div>
        </div>
        <hr>
        <div>
            <h3>Tour Title: <span style="text-decoration: underline">{{$tour->title}}</span></h3>
        </div>
        <hr>
        <div>
            <h3>Your Bid Amount: <span style="text-decoration: underline">{{$bidAmount}} USD</span></h3>
            <h4 style="font-weight: bold">You have to Pay 10% of your Bid Amount to Confirm Booking.</h4>
            <h4 style="font-weight: bold">10% of your Bid Amount is: <span>{{0.1 * (int)$bidAmount}} USD</span></h4>
        </div>
        <hr>
        @if($errors->any())
        <div class="alert alert-danger">
            <h4 style="color: black;font-size: 14px">{{$errors->first()}}</h4>
        </div>
        @endif
        @if(\Illuminate\Support\Facades\Session::has('msg'))
            <div class="alert alert-success" style="margin-bottom: 0px!important;">
                <h4 style="color: black">{{\Illuminate\Support\Facades\Session::get("msg")}}</h4>
            </div>
        @endif
    <br>
        <form method="post" action="{{url("/customer-post-payment")}}">
            @csrf
            <input type="hidden" name="customerEmail" value="{{$customerEmail}}"/>
            <input type="hidden" name="operatorId" value="{{$operatorId}}"/>
            <input type="hidden" name="tourId" value="{{$tourId}}"/>
            <div class="row">
                <div class="col-lg-6">
                    <div class="login-title" style="padding-top: 40px!important;">
                        <p style="font-weight: bold;font-size: 23px!important;">ENTER YOUR CARD
                            DETAILS</p>
                    </div>
                    <div class="login-form">
                        <div class="input-box mt-30">
                            <input type="text" placeholder="Card Holder Name" name="cardHolderName" required>
                        </div>
                    </div>

                    <div class="login-form">
                        <div class="row">
                            <div class="input-box mt-10 col-lg-6">
                                <div>Expiry Month</div>
                                <select name="expiryMonth" required
                                        style="width: 100%;border: solid 2px rgba(102, 102, 102, 0.12);border-radius: 5px;height: 45px;padding-left: 30px;background-color: white;">
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>

                            <div class="input-box mt-10 col-lg-6">
                                <div>Expiry Year</div>
                                <select name="expiryYear" required
                                        style="width: 100%;border: solid 2px rgba(102, 102, 102, 0.12);border-radius: 5px;height: 45px;padding-left: 30px;background-color: white;">
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                    <option value="2031">2031</option>
                                    <option value="2032">2032</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login-form">
                        <div class="input-box" style="padding-top: 100px">
                            <input type="text" placeholder="Card Number" required name="cardNumber">
                        </div>
                    </div>
                    <div class="login-form">
                        <div class="input-box mt-35">
                            <input type="text" placeholder="CVV" name="cvv" required>
                            <input type="hidden" name="totalAmount" value="{{0.1 * (int)$bidAmount}}" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mt-30">
                    <button type="submit"
                            style="letter-spacing: 3px;border: none;cursor: pointer;padding: 1.0rem 3rem;text-transform: uppercase;width: 100%;border-radius: 5px;line-height: 18px;font-size: 15px !important;">
                        Confirm Booking
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
