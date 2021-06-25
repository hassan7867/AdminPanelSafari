@extends('layouts.dashboard')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
        <h3 style="letter-spacing: 3px" class="mt-4 mb-3">UPDATE YOUR PERSONAL DETAILS</h3>
        <form method="post" action="{{url("/save-profile-info")}}" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login-form">
                            <div class="input-box mt-30">
                                <label>Name:</label><br>
                                <input type="text" value="{{$user->name}}" placeholder="Name*" name="name" required>
                            </div>
                            <div class="input-box mt-30" style="margin-top: 10px">
                                <label>Email:</label><br>
                                <input type="email" disabled value="{{$user->email}}" placeholder="Email Address*" name="emailAddress" required>
                            </div>
                            <div class="input-box mt-30" style="margin-top: 10px">
                                <label>Telephone:</label><br>
                                <input type="text" value="{{$user->telephone}}" placeholder="Telephone*" name="telephone" required>
                            </div>
                            <div class="input-box mt-30">
                                <label>Company Name:</label><br>
                                <input type="text" placeholder="Company Name" value="{{$user->company_name}}" name="companyName" id="companyName">
                            </div>
                            <div class="input-box mt-30">
                                <label>Company Size:</label><br>
                                <select name="companysize" id="companysize" style="width: 100%;border: solid 2px rgba(102, 102, 102, 0.12);border-radius: 5px;height: 45px;padding-left: 30px;background-color: white;">
                                    <option value="">Select Company Size</option>
                                    <option value="0-10 employees" {{$user->company_size == "0-10 employees" ? 'selected' : ''}}>0-10 employees</option>
                                    <option value="10-20 employees" {{$user->company_size == "10-20 employees" ? 'selected' : ''}}>10-20 employees</option>
                                    <option value="20-50 employees" {{$user->company_size == "20-50 employees" ? 'selected' : ''}}>20-50 employees</option>
                                    <option value="20-100 employees" {{$user->company_size == "20-100 employees" ? 'selected' : ''}}>50-100 employees</option>
                                    <option value="100-1000 employees" {{$user->company_size == "100-1000 employees" ? 'selected' : ''}}>100-1000 employees</option>
                                    <option value="1000-100000 employees" {{$user->company_size == "1000-100000 employees" ? 'selected' : ''}}>1000-100000 employees</option>
                                </select>
                            </div>
                            <div class="input-box mt-30">
                                <label>Company Founded In:</label><br>
                                <input type="text" placeholder="Company founded in (e-g 1990)*" value="{{$user->foundedin}}" name="foundedin" id="foundedin">
                            </div>
                            <div class="input-box mt-30">
                                <label>Price Range:</label><br>
                                <input type="text" placeholder="price range" value="{{$user->pricerange}}" name="pricerange" id="pricerange">
                            </div>
                            <div class="input-box mt-30">
                                <label>Tour Type:</label><br>
                                <select name="tourtype" id="tourtype"
                                        style="width: 100%;border: solid 2px rgba(102, 102, 102, 0.12);border-radius: 5px;height: 45px;padding-left: 30px;background-color: white;">
                                    <option value="">Select Tour Type</option>
                                    <option value="Customizable private tours and fixed group tours" {{$user->tourtype == "Customizable private tours and fixed group tours" ? 'selected' : ''}}>Customizable private tours and fixed group tours</option>
                                </select>
                            </div>
                            <div class="input-box mt-30" >
                                <label>Change Profile Picture</label><br>
                                <input type="file" class="form-control" name="profilepic[]" id="profilepic" placeholder="Upload Profile Picture" style="line-height: 18px">
                            </div>
                            <div class="input-box mt-30" >
                                <label>Change Company Logo</label><br>
                                <input type="file" class="form-control" name="companyLogo[]" id="companyLogo" placeholder="Upload Company Logo"  style="line-height: 18px">
                            </div>
                            <div class="input-box mt-30" >
                                <label>Company Overview</label><br>
                                <textarea class="form-control" name="overview" id="overview" style="height: 200px" placeholder="Company Overview">{{$user->overview}}</textarea>
                            </div>
                            <div class="input-box mt-30" >
                                <label>Company Description</label><br>
                                <textarea class="form-control" name="description" id="description" style="height: 200px" placeholder="Company Description">{{$user->description}}</textarea>
                            </div>

                                <br>
                                <br>
                            <p style="font-weight: bold">Create New Password <span style="font-size: 12px">(please left it blank if you don't want to change it)</span></p>
{{--                            <p>left the password blank if you don't want to change it.</p>--}}
                            <div class="input-box mt-30" style="margin-top: 10px">
                                <label>Password:</label><br>
                                <input type="password" placeholder="Password*" name="password">
                            </div>
                            <div class="input-box mt-30" style="margin-top: 10px">
                                <label>Confirm Password:</label><br>
                                <input type="password" placeholder="Confirm  Password*" name="conpassword">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="form-group" >
                <button type="submit"
                        style="background: #6b9ce8;letter-spacing: 3px;border: none;color: #fff;cursor: pointer;padding: 1.0rem 3rem;text-transform: uppercase;border-radius: 5px;line-height: 18px;font-size: 15px !important;">
                    UPDATE
                </button>
            </div>
        </form>
    </div>
    <script>
        function setName(fileId, inputId) {
            var files = document.getElementById(fileId).files;
            if (files.length> 0 )
            {
                document.getElementById(inputId).value = files[0].name;
            }
        }
        function calculateCertificateToken(value) {
            document.getElementById('extraCertificateTokens').innerText = value;
            let num;
            let num22;
            num = (parseInt(value));
            num = num * 0.2;
            num22 = num + parseInt(value);
            // alert(parseInt(num))
            document.getElementById('totalPayableNow').innerText = num22.toFixed(2);
            document.getElementById('vat20%').innerText = num.toFixed(2);

            document.getElementById('totalAmount').value = num22.toFixed(2);
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
           if (`{{$user->country}}` === countries[i]){
               option.setAttribute("selected", true);
           }
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
    </script>
@endsection
