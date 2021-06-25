@extends('layouts.landing-app')
<!--====== BANNER PART START ======-->
@section('content')

    <link href="{{url('')}}/assets/css/works.css" rel="stylesheet">
    <style>
        .respmargintopbtn{
            margin-top: -360px!important;
        }
        .resppaddding1{
            padding: 50px;
        }
        .logomargin1{
            margin-top: 90px
        }
        .logomargin2{
            margin-left: 10px
        }
        .logosizeresp1{
            height: 80px;width: 100px;
        }
        .logosizeresp2{
            height: 80px;width: 80px;
        }
        .resppaddingiconsmain{
            padding: 30px;
        }
        .servicemargin{
            height: 380px;
        }
        @media screen and (max-width: 600px) {
            .respmargintopbtn{
                margin-top: -150px!important;
            }
            .resptopbtn1{
                margin-left: -20px;
            }
            .resppaddding1{
                padding: 0px;
            }
            .logomargin1{
                margin-top: 150px
            }
            .logosizeresp1{
                width: 80px;
                height: 60px;
            }
            .respfontsizelogotext{
                font-size: 14px;
            }
            .logosizeresp2{
                height: 65px;width: 70px;
            }
            .logomargin2{
                margin-left: 0px
            }
            .resppaddingiconsmain{
                padding: 17px;
            }
            .servicemargin{
                height: 470px;
            }
            .btnbottommarginleft{
                margin-left: -64px;
            }
            .btnbottommarginlef2t{
                margin-left: -50px;
            }
        }
    </style>
    <section  style="padding-top: 200px;background-image: url('/assets/images/backgroundimage.png')">
{{--        <div class="banner__bg"></div>--}}
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 style="text-align: center;color: #6b9ce8">COPYRIGHT PROTECTION SERVICE</h2>
                    <div style="margin: 0 auto;max-width: 200px">
                        <div style="border-bottom: 5px solid #6b9ce8;width: 200px" >

                        </div>
                    </div>
{{--                    <div style="margin: 0 auto;max-width: 230px">--}}
{{--                        <hr class="new5">--}}

{{--                    </div>--}}
                    <h5 style="color: #6b9ce8;text-align: center;margin-top: 20px">Save Your Work Such As Books, Training Manuals, Music, Songs, Lyrics, Artwork, Portfolio</h5>
                    <div style="margin: 0 auto;max-width: 1000px">
                        <p style="text-align: center">
                            CopyrightCover is a swift and secure copyright protection service based in the UK. Equipped with a dedicated group of legal
                            experts and IT technicians, we ensure that our clients are fully protected from all modern threats and risk factors across the board.
                        </p>
                    </div>

                    <div>
{{--                        <a  href="#myModal" data-toggle="modal"  id="play-video" class="video-play-button" title="Play Video">--}}
{{--                            <span></span>--}}
{{--                        </a>--}}
                        <img src="{{url('')}}/assets/images/banner.png" style="margin-top: -20px">
                        <div class="respmargintopbtn"
                            style="margin: 0 auto;max-width: 100px;margin-top: 10px;text-align: center;;padding-left: 10px">
                            <a href="#myModal" data-toggle="modal" id="play-video" class="video-play-button"
                               title="Play Video">
                                <span></span>
                            </a>
                        </div>
                    </div>
                    <div style="margin: 0 auto;max-width: 200px;margin-top: 300px;margin-bottom: 100px">
                        <a class="main-btn resptopbtn1" href="{{url('register')}}">COPYRIGHT YOUR WORK</a>
                    </div>

{{--                    <div class="banner-content">--}}
{{--                        <h1 class="title">COPYRIGHT--}}
{{--                            <span>PROTECTION</span> SERVICE</h1>--}}
{{--                        <p>Save you work such as Books, Training Manuals, Music, Songs, Lyrics And Artwork,Logos, Designs, Graphic Designs</p>--}}
{{--                        <ul>--}}
{{--                            <li><a class="main-btn" href="{{url('register')}}">REGISTER YOUR WORK</a></li>--}}
{{--                            <li><a class="play video-popup" href="https://www.youtube.com/watch?v=_Hp_dI0DzY4">--}}
{{--                                    <div class="play-btn"><img src="{{url('')}}/assets/images/play.svg" alt=""></div>--}}
{{--                                    Watch video--}}
{{--                                </a></li>--}}
{{--                        </ul>--}}
{{--                    </div> <!-- banner content -->--}}
{{--                </div>--}}
            </div> <!-- row -->
        </div>
{{--        <div class="banner-shaps-item">--}}
{{--            <div class="banner-shape">--}}
{{--                <img src="{{url('')}}/assets/images/banner-shape.svg" alt="">--}}
{{--            </div>--}}
{{--            <div class="banner-thumb animated wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="300ms">--}}
{{--                <img src="{{url('')}}/assets/images/banner-thumb-1.png" alt="thumb">--}}
{{--            </div>--}}
{{--            <div class="banner-thumb-2 animated wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="350ms">--}}
{{--                <img src="{{url('')}}/assets/images/banner-thumb-2.png" alt="thumb">--}}
{{--            </div>--}}
{{--        </div>--}}
    </section>

    <!--====== BANNER PART ENDS ======-->

    <!--====== SERVICES PART START ======-->

{{--    <img src="{{url('')}}/assets/images/side.png" style="width: 250px;height: 200px">--}}
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4" style="padding: 30px">
                <img src="{{url('')}}/assets/images/banner2.png">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-7">
                <h3>
                    SERVICES
                </h3>
                <div style="border-bottom: 3px solid #6b9ce8;width: 80px" >

                </div>
                <br>
                <p style="font-size: 14px;color: black">
                    We offer fast, reliable protection of all types of content, including but not limited to: logos, text, media,
                    website material, designs, and artwork. The sooner you register a copyright, the better. Public
                    domains and social media services such as Facebook, Instagram, Pinterest, Youtube, Spotify, and
                    Etsy are incredibly dangerous for unregistered work. Digital media such as photos, videos, designs,
                    and logos are particularly vulnerable in these spaces and can be compromised incredibly easily -- not
                    only to theft and free distribution, but to sale for profit by hostile actors and pirates.
                </p>
                <p style="font-size: 14px;color: black">
                    As long as your work is unprotected, anyone who comes across it is free to copyright it themselves,
                    at which point you would need to engage in litigation or a costly legal battle for a chance to the rights
                    to your own work. In addition to risking ownership disputes, rampant content circulation can easily
                    destroy profit margins. Copyright registration is an immediate concern for absolutely anyone who
                    produces content or products of any kind.
                </p>
                <p style="font-size: 14px;color: black">
                    CopyrightCover safeguards your content and products by the book under the Copyright, Designs and
                    Patents Act 1988. All our copyright registrations include unique, individual reference numbers to
                    identify them, and our clients have access to our instant certification service -- this marks the time
                    and date of the registration, so the owner and origin will never be reasonably disputable.
                </p>
            </div>
        </div>
    </div>

    <div class="container">
        <div style="margin: 0 auto;max-width: 1000px">
            <div class="row" style="height: 400px">
                <div class="col-4 resppaddding1" style="background: #9ec9ff;" >
                    <div style="margin: 0 auto;max-width: 100px;">
                        <div>
                            <img class="logomargin1 logosizeresp1" src="{{url('')}}/icons/logo.png" style=";margin-left: 10px;">
                        </div>
                    </div>
                    <h5 class="respfontsizelogotext" style="color: white;text-align: center;margin-top: 20px">LOGOS</h5>

                </div>
                <div style="background: blue" class="col-8">
                    <div class="row">
                        <div style="background: #6597e6;padding: 40px" class="col-12">
                            <div style="margin: 0 auto;width: 100px;">
                                <div>
                                    <img src="{{url('')}}/icons/education.png" style="height: 80px;width: 80px">
                                </div>
                            </div>
                            <h5 class="respfontsizelogotext" style="color: white;text-align: center;margin-top: 20px">EDUCATION & TRAINING</h5>

                        </div>
                        <div style="background: #76a5f0;padding: 30px" class="col-6">
                            <div style="margin: 0 auto;width: 100px;">
                                <div>
                                    <img class="logosizeresp2 logomargin2" src="{{url('')}}/icons/artwork.png">
                                </div>
                            </div>
                            <h5 class="respfontsizelogotext" style="color: white;text-align: center;margin-top: 20px">ARTWORK</h5>

                        </div>
                        <div style="background: #9dbff2;padding: 30px" class="col-6">
                            <div style="margin: 0 auto;width: 100px;">
                                <div>
                                    <img  class="logosizeresp2" src="{{url('')}}/icons/music.png">
                                </div>
                            </div>
                            <h5 class="respfontsizelogotext" style="color: white;text-align: center;margin-top: 20px">MUSIC</h5>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div style="background: #6597e6;" class="col-4 resppaddingiconsmain">
                    <div style="margin: 0 auto;width: 100px;">
                        <div>
                            <img src="{{url('')}}/icons/drama.png"class="logosizeresp2">
                        </div>
                    </div>
                    <h5 class="respfontsizelogotext" style="color: white;text-align: center;margin-top: 20px">DRAMATIC WORKS</h5>
                </div>
                <div style="background: #9ec9ff;" class="col-4 resppaddingiconsmain">
                    <div style="margin: 0 auto;width: 100px;">
                        <div>
                            <img src="{{url('')}}/icons/book.png" class="logosizeresp2">
                        </div>
                    </div>
                    <h5 class="respfontsizelogotext" style="color: white;text-align: center;margin-top: 20px">LITERATURE</h5>
                </div>
                <div style="background: #6597e6;" class="col-4 resppaddingiconsmain">
                    <div style="margin: 0 auto;width: 100px;">
                        <div>
                            <img src="{{url('')}}/icons/software.png" class="logosizeresp2">
                        </div>
                    </div>
                    <h5 class="respfontsizelogotext" style="color: white;text-align: center;margin-top: 20px">SOFTWARE</h5>
                </div>
            </div>
        </div>

    </div>

    <div style="background: #f3f3f3;padding: 40px">
        <h3 style="text-align: center;margin-top: 30px">WHY US</h3>
        <div style="margin: 0 auto;max-width: 50px">
            <div style="border-bottom: 3px solid #6b9ce8;width: 50px" >

            </div>
        </div>
        <div class="container" style="margin-top: 60px;margin-bottom: 80px">
            <div class="row">
                <div class="col-md-6">
                   <p>
                       CopyrightCover is composed of highly qualified experts from across the
                       legal and DRM industries. With hundreds of happy customers and over
                       25 years of combined team experience defending digital, conceptual,
                       and intellectual property.
                   </p>
                </div>
                <div class="col-md-6">
                    <p>
                        We have the expertise and experience to quickly resolve all types of
                        infringement issues, but we also have the comprehension and
                        capability necessary to prevent them from arising in the first place.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="max-width: 1100px;margin-top: -80px">
        <div class="row">
            <div class="col-md-3" style=";margin-top:10px;padding: 20px;background: white;box-shadow: 10px 10px 10px lightgrey;border-radius: 5px">
                <div style="margin: 0 auto;max-width: 120px">
                    <img src="{{url('')}}/icons/tick.png" style="height: 120px;width: 120px">
                </div>
                <h5 style="text-align: center;margin-top: 20px">
                    Don’t Wait To Protect Yourself
                </h5>
                <p>
                    Let CopyrightCover be your shield.
                </p>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3" style=";margin-top:10px;padding: 20px;background: white;box-shadow: 10px 10px 10px lightgrey;border-radius: 5px">
                <div style="margin: 0 auto;max-width: 120px">
                    <img src="{{url('')}}/icons/order.png" style="height: 120px;width: 120px">
                </div>
                <h5 style="text-align: center;margin-top: 20px">
                    Legal Disputes Are Inconvenient,
                    Difficult, And Costly.
                </h5>
                <p>
                    Copyrighting your work is fast,
                    easy, and affordable.
                </p>
            </div>
            <div class="col-md-1"></div>

            <div class="col-md-3" style=";margin-top:10px;padding: 20px;background: white;box-shadow: 10px 10px 10px lightgrey;border-radius: 5px">
                <div style="margin: 0 auto;max-width: 120px">
                    <img src="{{url('')}}/icons/email.png" style="height: 120px;width: 120px">
                </div>
                <h5 style="text-align: center;margin-top: 20px">
                    Call Or Email Us Today For
                    Information Or A No-obligation
                    Consultation To Learn
                    What We Can Do For You.
                </h5>
            </div>
            <div class="col-md-1"></div>

        </div>
    </div>

    <div class="container" style="margin-top: 150px">
        <h3 style="text-align: center;margin-top: 30px">ADVANTAGES WE OFFER</h3>
        <div style="margin: 0 auto;max-width: 100px">
            <div style="border-bottom: 3px solid #6b9ce8;width: 100px" >

            </div>
        </div>
    </div>





    <section class="sevices-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="section-title text-center">
{{--                        <span>WHAT CAN BE PROTECTED BY COPYRIGHT?</span>--}}
{{--                        <h3 class="title"><span>Get Best</span> Advertiser <span>In Your Side Pocket</span></h3>--}}
                    </div> <!-- SECTION TITLE -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center" style="margin-top: 80px">
                <div class="col-lg-4 col-md-6 col-sm-9" style="margin-top: 10px">
                    <div class="sevices-item servicemargin" style=";border: 3px solid #9dbff2">
                        <div style="margin-top: -45px">
                            <div style="margin: 0 auto;max-width: 100px;background: #9dbff2;padding: 20px;border-radius: 10px;">
                                <img src="{{url('')}}/icons/lock.png" style="width: 80px;height: 50px">
                            </div>
                        </div>
                        <div style="margin-top: 50px">
                            <h6 style="color: #9dbff2;text-align: center;padding: 10px">Confidential Data Storage Vault</h6>
                            <p style="text-align: center;padding: 10px">All your work can be stored in our
                                Secure Vault and downloaded at any
                                time.</p>
                        </div>


                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-9"  style="margin-top: 10px">
                    <div class="sevices-item servicemargin" style=";border: 3px solid #9dbff2">
                        <div style="margin-top: -45px">
                            <div style="margin: 0 auto;max-width: 100px;background: #9dbff2;padding: 20px;border-radius: 10px;">
                                <img src="{{url('')}}/icons/laptop.png" style="width: 80px;height: 50px">
                            </div>
                        </div>
                        <div style="margin-top: 50px">
                            <h6 style="color: #9dbff2;text-align: center;padding: 10px">Protecting Yourself From
                                Content Thieves</h6>
                            <p style="text-align: center;padding: 10px">
                                Our vault is not only secure, it’s
                                confidential, marked, and timestamped,
                                insulating it against hostile actors.
                            </p>
                        </div>


                    </div>
                </div>


                <div class="col-lg-4 col-md-6 col-sm-9"  style="margin-top: 10px">
                    <div class="sevices-item servicemargin" style=";border: 3px solid #9dbff2">
                        <div style="margin-top: -45px">
                            <div style="margin: 0 auto;max-width: 100px;background: #9dbff2;padding: 20px;border-radius: 10px;">
                                <img src="{{url('')}}/icons/case.png" style="width: 80px;height: 50px">
                            </div>
                        </div>
                        <div style="margin-top: 50px">
                            <h6 style="color: #9dbff2;text-align: center;padding: 10px">
                                Professional Takedown Services
                            </h6>
                            <p style="text-align: center;padding: 10px">
                                We provide the fastest takedown service
                                available in the UK to rapidly eliminate any
                                and all content infringements, halting
                                unauthorized distribution and spread as
                                rapidly as possible.
                            </p>
                        </div>


                    </div>
                </div>


            </div>
            <div class="row justify-content-center" style="margin-top: 70px">
                <div class="col-lg-4 col-md-6 col-sm-9"   style="margin-top: 10px">
                    <div class="sevices-item servicemargin" style=";border: 3px solid #9dbff2">
                        <div style="margin-top: -45px">
                            <div style="margin: 0 auto;max-width: 100px;background: #9dbff2;padding: 20px;border-radius: 10px;">
                                <img src="{{url('')}}/icons/star.png" style="width: 80px;height: 50px">
                            </div>
                        </div>
                        <div style="margin-top: 50px">
                            <h6 style="color: #9dbff2;text-align: center;padding: 10px">
                                Instant Digital Certificates
                            </h6>
                            <p style="text-align: center;padding: 10px">
                                Free, internationally accepted digital
                                copyright certificates
                            </p>
                        </div>


                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-9"  style="margin-top: 10px">
                    <div class="sevices-item servicemargin" style=";border: 3px solid #9dbff2">
                        <div style="margin-top: -45px">
                            <div style="margin: 0 auto;max-width: 100px;background: #9dbff2;padding: 20px;border-radius: 10px;">
                                <img src="{{url('')}}/icons/c.png" style="width: 80px;height: 50px">
                            </div>
                        </div>
                        <div style="margin-top: 50px">
                            <h6 style="color: #9dbff2;text-align: center;padding: 10px">
                                Free Use Of Our Copyright Logo
                                Available For Use
                            </h6>
                            <p style="text-align: center;padding: 10px">
                                Warn off potential infringements with
                                our copyright protection logo.
                            </p>
                        </div>


                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-9"  style="margin-top: 10px">
                    <div class="sevices-item servicemargin" style="border: 3px solid #9dbff2">
                        <div style="margin-top: -45px">
                            <div style="margin: 0 auto;max-width: 100px;background: #9dbff2;padding: 20px;border-radius: 10px;">
                                <img src="{{url('')}}/icons/shield.png" style="width: 80px;height: 50px">
                            </div>
                        </div>
                        <div style="margin-top: 50px">
                            <h6 style="color: #9dbff2;text-align: center;padding: 10px">
                                Copyright Protection Active
                                In Under 5 Minutes.
                            </h6>
                            <p style="text-align: center;padding: 10px">
                                Our nearly instant copyright certificates
                                mean your content will never be at risk of
                                dispute.
                            </p>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <div style="padding: 80px">
        <div style="margin: 0 auto;max-width: 1000px">
            <h3 style="text-align: center;margin-top: 30px;">OUR SIMPLE PROCESS</h3>
            <div style="margin: 0 auto;max-width: 100px">
                <div style="border-bottom: 3px solid #6b9ce8;width: 100px" >

                </div>
            </div>
            <div class="row" style="margin-top: 100px">
                <div class="col-lg-3 col-md-12">
                    <div class="work-process">
                        <div class="box-loader"> <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="step-num-box">
                            <div class="step-icon"><span><i class="fa fa-user"></i></span>
                            </div>
                            <div class="step-num">01</div>
                        </div>
                        <div class="step-desc">
                            <h5>Fill in your details</h5>
{{--                            <p class="mb-0">Enter your keyword, any optional sub keywords, your article length, and any other requirements into the Article Forge system.</p>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 md-mt-5">
                    <div class="work-process">
                        <div class="box-loader"> <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="step-num-box">
                            <div class="step-icon"><span><i class="fa fa-upload"></i></span>
                            </div>
                            <div class="step-num">02</div>
                        </div>
                        <div class="step-desc">
                            <h5 >Upload your work</h5>
{{--                            <p class="mb-0">During those 60 seconds, Article Forge will intelligently write you a high quality, completely unique article.</p>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 md-mt-5">
                    <div class="work-process">
                        <div class="step-num-box">
                            <div class="step-icon"><span><i class="fa fa-credit-card"></i></span>
                            </div>
                            <div class="step-num">03</div>
                        </div>
                        <div class="step-desc">
                            <h5>Pay subscription fee</h5>
{{--                            <p class="mb-0">You have your article and are ready to use it wherever and however you want!</p>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 md-mt-5">
                    <div class="work-process">
                        <div class="step-num-box">
                            <div class="step-icon"><span><i class="fa fa-star"></i></span>
                            </div>
                            <div class="step-num">04</div>
                        </div>
                        <div class="step-desc">
                            <h5 >Copyright Starts</h5>
{{--                            <p class="mb-0">You have your article and are ready to use it wherever and however you want!</p>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin: 0 auto;max-width: 200px;margin-top: 100px;margin-bottom: 100px">
                <a class="main-btn btnbottommarginleft" style="background: #9dbff2;color: white" href="{{url('register')}}">COPYRIGHT YOUR WORK NOW</a>
            </div>
        </div>

    </div>
    <div style="background: #9dbff2;padding: 80px">
        <div style="margin: 0 auto;max-width: 800px">
            <h5 style="text-align: center;color: white">
                With £19.99 per year Copyright your work today and receive 5 free certificate tokens,
                with 30 day money back guarantee included.
            </h5>
            <div style="margin: 0 auto;max-width: 200px;margin-top: 50px;margin-bottom: 100px">
                <a class="main-btn btnbottommarginlef2t" style="background: white;color: #9dbff2" href="{{url('register')}}">COPYRIGHT YOUR WORK</a>
            </div>
        </div>

    </div>

{{--    <div id="video-overlay" class="video-overlay">--}}
{{--        <a class="video-overlay-close">&times;</a>--}}
{{--    </div>--}}


{{--    <script>--}}
{{--        $('#play-video').on('click', function(e){--}}
{{--            e.preventDefault();--}}
{{--            $('#video-overlay').addClass('open');--}}
{{--            $("#video-overlay").append('<iframe width="560" height="315" src="https://www.youtube.com/embed/ngElkyQ6Rhs" frameborder="0" allowfullscreen></iframe>');--}}
{{--        });--}}

{{--        $('.video-overlay, .video-overlay-close').on('click', function(e){--}}
{{--            e.preventDefault();--}}
{{--            close_video();--}}
{{--        });--}}

{{--        $(document).keyup(function(e){--}}
{{--            if(e.keyCode === 27) { close_video(); }--}}
{{--        });--}}

{{--        function close_video() {--}}
{{--            $('.video-overlay.open').removeClass('open').find('iframe').remove();--}}
{{--        };--}}
{{--    </script>--}}
@endsection
