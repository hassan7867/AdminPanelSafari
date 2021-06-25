@extends('layouts.dashboard')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link href="{{url('')}}/select2.min.css" rel="stylesheet" />
    <script src="{{url('')}}/select2.min.js"></script>
    {{--    <div>--}}
    <div class="container" style="max-width: 900px;margin-top: 30px;margin-bottom: 50px">
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
        <h3 style="letter-spacing: 3px;margin-top: 20px" class="mt-4 mb-3">COMPANY TOUR DESTINATIONS</h3>
        <div>
            <button data-toggle="modal" data-target="#myModal" class="btn btn-success">ADD NEW DESTINATION</button>
        </div>
        <div class="px-5 table-responsive" style="margin-top: 10px">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Destination</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @if(count($destinations) != 0)
                    @foreach($destinations as $key => $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->country}}</td>
                            <td>
                                <a class="btn btn-danger" href="{{url('/delete-destination/'.$item->id)}}" id="deletebtn{{$item->id}}">
                                    DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td></td>
                        <td class="text-center">No Destination Found Yet!</td>
                        <td></td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" id="resetheading">Add New DESTINATION</h3>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    {{--                    <h5>Reset Password</h5>--}}
                    <form action="{{url('add-new-destination')}}" method="post">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">

                                    <div>
                                        <div class="mt-30">
                                            <select  id="leaderMultiSelctdropdown" name="destinationslist[]" multiple="multiple"
                                                     style="width: 100%;border: solid 2px rgba(102, 102, 102, 0.12);border-radius: 5px;height: 70px;padding-left: 50px;background-color: white;">
                                                <option value="">Select Multiple Tour Destinations</option>
                                            </select>
                                        </div>
                                        <br>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div style="margin-left: 30px">
                            <button class="btn btn-secondary">SUBMIT</button>
                        </div>
                    </form>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <script>
        function setName(fileId, inputId) {
            var files = document.getElementById(fileId).files;
            if (files.length > 0) {
                document.getElementById(inputId).value = files[0].name;
            }
        }

        function deleteCertificate(id) {
            if(confirm('Are you sure to delete this certificate (reference no# : ' + id + ')')){
                document.getElementById('deletebtn'+ id).click();
            }
        }

        function resetModal(id, name) {
            document.getElementById('resetheading').innerText = name + " (ref : " + id + ")";
            document.getElementById('certificateId').value = id;
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
// Prepare the preview for profile picture
            $("#photo").change(function () {
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photopreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>

        var select = document.getElementById("selectCountry");
        var select2 = document.getElementById("leaderMultiSelctdropdown");

        var countries = new Array("Botswana", "Congo (DRC)", "Ethiopia", "Kenya", "Madagascar", "Malawi", "Mozambique", "Namibia", "Rwanda", "South Africa", "Swaziland", "Tanzania", "Uganda", "Zambia", "Zimbabwe");

        //console.log(countries);
        //console.log(select);

        for (var i = 0; i < countries.length; i++) {

            var option = document.createElement("option");
            //for every turn of the loop create an option tag
            //console.log(option);
            var txt = document.createTextNode(countries[i]);
            //for every turn of the loop create the inner text
            //console.log(txt);
            option.appendChild(txt);
            //for every turn of the loop put the words from txt inside the <option> tags
            //console.log(option);
            option.setAttribute("value", countries[i]); //for every turn of the loop set the value attribute to corresponding country name
            //console.log(option);
            select2.insertBefore(option, select2.lastChild);
            //console.log(select);

        }

        document.addEventListener('DOMContentLoaded', function () {
            //console.log('DOM fully loaded and parsed');
            document.querySelector('select[name="selectCountry"]').onchange = alertCountry;
        }, false);

        function alertCountry(event) {
            //console.log('DOM loaded');
            //use "this" to refer to selected element
            // if (!event.target.value)
            //     alert('Please select a country');
            // else alert('You chose ' + event.target.value + '. Yay, grab a beer!');
        }
        setTimeout(function () {
            $("#leaderMultiSelctdropdown").select2( {
                placeholder: "Select Multiple Tour Destinations",
                maximumSelectionSize: 100,
            });
        },3000);


    </script>
    <script src="{{url('')}}/js/select2.min.js"></script>
    <script src="{{url('')}}/js/select2.init.js"></script>
@endsection
