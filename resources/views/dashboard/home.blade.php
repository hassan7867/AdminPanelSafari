@extends('layouts.dashboard')

@section('content')
    <section class="sevices-area" style="margin-top: 30px">
        <div class="container">
            <div class="row justify-content-center">

            </div> <!-- row -->
            <div class="row justify-content-center" style="margin: 0 auto;max-width: 800px">

                <div class="col-lg-6 col-md-6 col-sm-9">
                        <div class="sevices-item" style="height: 330px;padding: 30px;border: 2px solid #6b9ce8">
                            <h4 class="title" style="padding-top: 0px">Welcome Admin</h4>
                        </div>

                </div>
{{--                <div class="col-lg-6 col-md-6 col-sm-9">--}}
{{--                        <div class="sevices-item" style="height: 300px;padding: 30px;border: 2px solid #6b9ce8">--}}
{{--                            <h4 class="title" style="padding-top: 0px">Company : {{$user->company_name}}</h4>--}}
{{--                            <p>--}}
{{--                                YOU HAVE {{$user->tokenDetails->token ?? 0}} CERTIFICATE TOKEN(S) REMAINING--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                </div>--}}


            </div>
        </div>
    </section>
@endsection
