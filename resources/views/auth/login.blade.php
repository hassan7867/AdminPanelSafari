@extends('layouts.landing-app')
<!--====== LOGIN PART START ======-->
@section('content')
    <section class="login-area singup-area" style="margin-bottom: 100px">
        {{--        <div class="login-bg">--}}
        {{--            <div class="login-shape">--}}
        {{--                <img src="{{url('')}}/assets/images/shapes/login-shape.png" alt="">--}}
        {{--            </div>--}}
        {{--        </div>--}}


        <div>
            {{csrf_field()}}
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-6">
                        <div class="login-title">
                            <h2 style="text-align: center;color: black">ADMIN LOGIN</h2>
                            <div style="margin: 0 auto;max-width: 100px">
                                <div style="border-bottom: 3px solid black;width: 100px" >

                                </div>
                            </div>
                            @if($errors->any())
                                <div class="alert alert-danger" style="margin-top: 10px">
                                    <h4 style="color: black;font-size: 14px">{{$errors->first()}}</h4>
                                </div>
                            @endif
                            @if(\Illuminate\Support\Facades\Session::has('msg'))
                                <div class="alert alert-success" style="margin-bottom: 0px!important;margin-top: 10px">
                                    <h4 style="color: black">{{\Illuminate\Support\Facades\Session::get("msg")}}</h4>
                                </div>
                            @endif
                            <p style="margin-top: 30px;color: black;font-weight: bold;font-size: 16px!important;">Please enter your registered email address and your password below.</p>
                        </div>
                        <div class="login-form">
                            <div class="input-box mt-30">
                                <input type="text" id="email" name="login" placeholder="Email">
                            </div>
                            <div class="input-box mt-30">
                                <input type="password" id="password" name="login" placeholder="Password">

                            </div>
                            <div class="text-danger mt-2" style="display: none; color: red!important;"
                                 id="loginError">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" >
                <div class="row">
                    <div class="col-lg-5">

                    </div>
                    <div class="col-lg-3 mt-30">
                        <button type="submit"
                                onclick="adminLogin()"
                                style="background: #6b9ce8;letter-spacing: 3px;border: none;color: #fff;cursor: pointer;padding: 1.0rem 3rem;text-transform: uppercase;width: 100%;border-radius: 5px;line-height: 18px;font-size: 15px !important;">
                            Login
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
<!--====== LOGIN PART ENDS ======-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function adminLogin() {
        document.getElementById('loginError').style.display = 'none';
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        $.ajax({
            url: `{{env('APP_URL')}}/admin-signin`,
            type: 'POST',
            dataType: "JSON",
            data: {email: email, password: password, "_token": "{{ csrf_token() }}"},
            success: function (result) {
                document.getElementById('password').value = '';
                if (result.status === true) {
                    swal.fire({
                        "title": "",
                        "text": "Admin SignIn Successfully!",
                        "type": "success",
                        "showConfirmButton": true,
                        "onClose": function (e) {
                            window.location.href = `{{env('APP_URL')}}/dashboard`
                        }
                    })
                } else {
                    console.log(result['message']);
                    document.getElementById('loginError').innerHTML = result['message'];
                    document.getElementById('loginError').style.display = 'block';
                    setTimeout(function () {
                        document.getElementById('loginError').style.display = 'none';
                    }, 5000);
                }
            },
        });
    }
</script>
