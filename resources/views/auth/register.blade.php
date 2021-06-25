@extends('layouts.landing-app')
<!--====== LOGIN PART START ======-->
@section('content')
    <link href="{{url('')}}/select2.min.css" rel="stylesheet" />
    <script src="{{url('')}}/select2.min.js"></script>
    <section class="login-area singup-area" style="margin-bottom: 100px">


        <form method="post" action="{{url("/register-user")}}" onsubmit="return validateForm()" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="container">
                <div class="row login-title">
                    <div class="col-lg-6">
                        <div>
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
                                <h2 style="text-align: center;color: black">OPERATOR REGISTRATION</h2>
                                <div style="margin: 0 auto;max-width: 100px">
                                    <div style="border-bottom: 3px solid black;width: 100px" >

                                    </div>
                                </div>

                            <p style="color: black;font-weight: bold;font-size: 23px!important;margin-top: 60px">ENTER YOUR
                                DETAILS</p>
                        </div>
                        <div class="login-form">
                            <div class="input-box mt-30">
                                <input type="text" placeholder="Your Name*" name="name" id="name">
                            </div>
{{--                            <div class="input-box mt-30">--}}
{{--                                <input type="text" placeholder="Last Name*" name="lastName" id="lastname">--}}
{{--                            </div>--}}
                            <div class="input-box mt-30">
                                <input type="email" placeholder="Email Address*" name="emailAddress" id="emailAddress">
                            </div>
                            <div class="input-box mt-30">
                                <input type="text" placeholder="Company Name" name="companyName" id="companyName">
                            </div>
                        </div>
                    </div>
{{--                    <div class="col-lg-6">--}}
{{--                        <div class="login-form">--}}
{{--                            --}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-title" style="padding-top: 40px!important;">
                            <p style="color: black;font-weight: bold;font-size: 23px!important;">YOUR OFFICE LOCATION <span style="font-size: 12px">(you can add more offices in your dashboard after login)</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">

                        <div class="login-form">
                            <div class="input-box mt-30">
                                <input type="text" placeholder="Address Line One*" name="addressLineOne" id="addressLineOne">
                            </div>
                            <div class="input-box mt-30">
                                <input type="text" placeholder="City*" name="city" id="city" >
                            </div>
                            <div class="input-box mt-30">
                                <input type="text" placeholder="Postal Code*" id="zipcode" name="postalCode">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="login-form">
                            <div class="input-box mt-30">
                                <input type="text" placeholder="Address Line Two" name="addressLineTwo" >
                            </div>
                            <div class="input-box mt-30">
                                <input type="text" placeholder="Country/Province*" name="country" id="state">
                            </div>
                            <div class="input-box mt-30">
                                <select id="selectCountry" name="selectCountry"
                                        style="width: 100%;border: solid 2px rgba(102, 102, 102, 0.12);border-radius: 5px;height: 45px;padding-left: 30px;background-color: white;">
                                    <option value="">Choose Country</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login-title" style="padding-top: 40px!important;">
                            <p style="color: black;font-weight: bold;font-size: 23px!important;">GENERAL INFO</p>
                        </div>
                        <div class="login-form">
                            <div class="input-box mt-30">
                                <input type="text" placeholder="Telephone*" name="telephone" id="telephone">
                            </div>
                            <div class="input-box mt-30">
                                <select name="companysize" id="companysize" style="width: 100%;border: solid 2px rgba(102, 102, 102, 0.12);border-radius: 5px;height: 45px;padding-left: 30px;background-color: white;">
                                    <option value="">Select Company Size</option>
                                    <option value="0-10 employees">0-10 employees</option>
                                    <option value="10-20 employees">10-20 employees</option>
                                    <option value="20-50 employees">20-50 employees</option>
                                    <option value="20-100 employees">50-100 employees</option>
                                    <option value="100-1000 employees">100-1000 employees</option>
                                    <option value="1000-100000 employees">1000-100000 employees</option>
                                </select>

                            </div>
                            <div class="input-box mt-30">
                                <input type="text" placeholder="Company founded in (e-g 1990)*" name="foundedin" id="foundedin">
                            </div>
                            <div class="input-box mt-30" >
                                <input type="text" placeholder="Price range per person per day (USD, excl. int'l flights)*" name="pricerange" id="pricerange">
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="login-form">
                            <div class="input-box" style="margin-top: 98px!important;">
                                <select name="tourtype" id="tourtype"
                                        style="width: 100%;border: solid 2px rgba(102, 102, 102, 0.12);border-radius: 5px;height: 45px;padding-left: 30px;background-color: white;">
                                    <option value="">Select Tour Type</option>
                                    <option value="Customizable private tours and fixed group tours">Customizable private tours and fixed group tours</option>
                                </select>
                            </div>
                            <div class="input-box" style="margin-top: 10px">
                                <div class="input-box mt-30">
                                    <select  id="leaderMultiSelctdropdown" name="destinationslist[]" multiple="multiple"
                                            style="width: 100%;border: solid 2px rgba(102, 102, 102, 0.12);border-radius: 5px;height: 70px;padding-left: 50px;background-color: white;">
                                        <option value="">Select Multiple Tour Destinations</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login-title" style="padding-top: 40px!important;">
                            <p style="color: black;font-weight: bold;font-size: 23px!important;">COMPANY PROFILE</p>
                        </div>
                        <div class="login-form">
                            <div class="input-box mt-30" >
                                <label>Upload Profile Picture</label>
                                <input type="file" class="form-control" name="profilepic[]" id="profilepic" placeholder="Upload Profile Picture" style="line-height: 18px">
                            </div>
                            <div class="input-box mt-30" >
                                <textarea class="form-control" name="overview" id="overview" style="height: 200px" placeholder="Company Overview"></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="login-form" style="margin-top: 98px">
                            <div class="input-box mt-30" >
                                <label>Upload Company Logo</label>
                                <input type="file" class="form-control" name="companyLogo[]" id="companyLogo" placeholder="Upload Company Logo"  style="line-height: 18px">
                            </div>
                            <div class="input-box mt-30" >
                                <textarea class="form-control" name="description" id="description" style="height: 200px" placeholder="Company Description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-60 mb-60">
                <hr>
            </div>

            <div class="container">

                <div style="color: white;padding: 10px;display: none;margin-top: 20px;background-color: maroon" id="errorMessageDiv">

                </div>
                <div class="row">
                    <div class="col-lg-3 mt-30">

                        <button id="submitbtnmain" type="submit"
                                style="background: #6b9ce8;letter-spacing: 3px;border: none;color: #fff;cursor: pointer;padding: 1.0rem 3rem;text-transform: uppercase;width: 100%;border-radius: 5px;line-height: 18px;font-size: 15px !important;">
                            SUBMIT
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <script>
        function validateForm()
        {
            let name = document.getElementById('name').value;
            let emailAddress = document.getElementById('emailAddress').value;
            let companyName = document.getElementById('companyName').value;
            let city = document.getElementById('city').value;
            let zipcode = document.getElementById('zipcode').value;
            let state = document.getElementById('state').value;
            let selectCountry = document.getElementById('selectCountry').value;
            let telephone = document.getElementById('telephone').value;
            let companysize = document.getElementById('companysize').value;
            let foundedin = document.getElementById('foundedin').value;
            let pricerange = document.getElementById('pricerange').value;
            let tourtype = document.getElementById('tourtype').value;
            let profilepic = document.getElementById('profilepic').files;
            let companyLogo = document.getElementById('companyLogo').files;
            let overview = document.getElementById('overview').value;
            let description = document.getElementById('description').value;
            let addressLineOne = document.getElementById('addressLineOne').value;
            document.getElementById('errorMessageDiv').style.display = 'none';
            if (name === undefined || name === ''){
                document.getElementById('errorMessageDiv').innerHTML = 'Name is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (emailAddress === undefined || emailAddress === ''){
                document.getElementById('errorMessageDiv').innerHTML = 'Email Address is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (companyName === undefined || companyName === ''){
                document.getElementById('errorMessageDiv').innerHTML = 'Company Name is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (addressLineOne === undefined || addressLineOne === ''){
                document.getElementById('errorMessageDiv').innerHTML = 'Address is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (city === undefined || city === ''){
                document.getElementById('errorMessageDiv').innerHTML = 'City is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (zipcode === undefined || zipcode === ''){
                document.getElementById('errorMessageDiv').innerHTML = 'Zipcode is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (state === undefined || state === ''){
                document.getElementById('errorMessageDiv').innerHTML = 'State is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (selectCountry === undefined || selectCountry === ''){
                document.getElementById('errorMessageDiv').innerHTML = 'Country is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (telephone === undefined || telephone === ''){
                document.getElementById('errorMessageDiv').innerHTML = 'Telephone is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (companysize === undefined || companysize === ''){
                document.getElementById('errorMessageDiv').innerHTML = 'Company size is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (foundedin === undefined || foundedin === ''){
                document.getElementById('errorMessageDiv').innerHTML = 'Company founded in year is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (pricerange === undefined || pricerange === ''){
                document.getElementById('errorMessageDiv').innerHTML = 'Price range is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (tourtype === undefined || tourtype === ''){
                document.getElementById('errorMessageDiv').innerHTML = 'Tour type is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (profilepic.length === 0){
                document.getElementById('errorMessageDiv').innerHTML = 'Profile pic is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (companyLogo.length === 0){
                document.getElementById('errorMessageDiv').innerHTML = 'Company logo is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (overview === undefined || overview === ''){
                document.getElementById('errorMessageDiv').innerHTML = 'Company overview is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            if (description === undefined || description === ''){
                document.getElementById('errorMessageDiv').innerHTML = 'Company description is required';
                document.getElementById('errorMessageDiv').style.display = 'block';
                return false;
            }
            return true;
        }
        $(document).ready(function () {

        });

    </script>
    <script>

        var select = document.getElementById("selectCountry");
        var select2 = document.getElementById("leaderMultiSelctdropdown");

        var countries = new Array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic", "Congo, Republic of the", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Greenland", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Mongolia", "Morocco", "Monaco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Samoa", "San Marino", " Sao Tome", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");
        var countries2 = new Array("Botswana", "Congo (DRC)", "Ethiopia", "Kenya", "Madagascar", "Malawi", "Mozambique", "Namibia", "Rwanda", "South Africa", "Swaziland", "Tanzania", "Uganda", "Zambia", "Zimbabwe");

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

        for (var i = 0; i < countries2.length; i++) {

            var option = document.createElement("option");
            //for every turn of the loop create an option tag
            //console.log(option);
            var txt = document.createTextNode(countries2[i]);
            //for every turn of the loop create the inner text
            //console.log(txt);
            option.appendChild(txt);
            //for every turn of the loop put the words from txt inside the <option> tags
            //console.log(option);
            option.setAttribute("value", countries2[i]); //for every turn of the loop set the value attribute to corresponding country name
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
<!--====== LOGIN PART ENDS ======-->
