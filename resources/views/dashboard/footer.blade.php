@extends('layouts.dashboard')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    {{--    <div>--}}
    <div class="container" style="max-width: 1500px;margin-top: 30px;margin-bottom: 50px">
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
        <h3 style="letter-spacing: 3px;margin-top: 20px" class="mt-4 mb-3">Footer</h3>
        {{--            <div>--}}
        {{--                <button data-toggle="modal" data-target="#myModal" class="btn btn-success">ADD NEW OFFICE</button>--}}
        {{--            </div>--}}

        <div style="max-width: 350px">
            <form action="{{url('update-footer')}}" method="post" enctype="multipart/form-data">
                @csrf
                <p style="font-weight: bold">Footer Text</p>
                <textarea name="text" required class="form-control">{{$data['text']}}</textarea><br>
                <p style="font-weight: bold">Facebook Link</p>
                <input type="text" class="form-control" name="fb_link" value="{{$data['fb_link']}}" /><br>
                <p style="font-weight: bold">Twitter Link</p>
                <input type="text" class="form-control" name="twitter_link" value="{{$data['twitter_link']}}" /><br>
                <p style="font-weight: bold">Instagram Link</p>
                <input type="text" class="form-control" name="instagram_link"  value="{{$data['instagram_link']}}" /><br>
                <button class="btn btn-primary">Update</button>
            </form>

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
            if (confirm('Are you sure to delete this certificate (reference no# : ' + id + ')')) {
                document.getElementById('deletebtn' + id).click();
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

        var countries = new Array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic", "Congo, Republic of the", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Greenland", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Mongolia", "Morocco", "Monaco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Samoa", "San Marino", " Sao Tome", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");

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
            select.insertBefore(option, select.lastChild);
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
        function approveReview(reviewId) {
            $.ajax({
                url: `{{env('APP_URL')}}/approve-review`,
                type: 'POST',
                dataType: "JSON",
                data: {"id":reviewId,"_token": "{{ csrf_token() }}"},
                success: function (result) {
                    swal.fire({
                        "title": "",
                        "text": "Admin Approved!",
                        "type": "success",
                        "showConfirmButton": true,
                        "onClose": function (e) {
                            window.location.reload()
                        }
                    })

                },
            });
        }

        function rejectReview(reviewId) {
            $.ajax({
                url: `{{env('APP_URL')}}/reject-review`,
                type: 'POST',
                dataType: "JSON",
                data: {"id":reviewId,"_token": "{{ csrf_token() }}"},
                success: function (result) {
                    swal.fire({
                        "title": "",
                        "text": "Review Rejected!",
                        "type": "success",
                        "showConfirmButton": true,
                        "onClose": function (e) {
                            window.location.reload()
                        }
                    })

                },
            });
        }
    </script>
@endsection

