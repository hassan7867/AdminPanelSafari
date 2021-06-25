@extends('layouts.dashboard')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link href="{{url('')}}/select2.min.css" rel="stylesheet"/>
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
        <h3 style="letter-spacing: 3px" class="mt-4 mb-3">ADD TOUR</h3>
        <form method="post" action="{{url("/add-tour")}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <h4 style="text-decoration: underline">Basic Info :</h4>
            <div class="row">
                <div class="col-lg-6">
                    <div class="login-form">
                        <div class="input-box mt-30">
                            <label>Title:</label><br>
                            <input type="text" placeholder="Title*" name="title" required>
                        </div>
                        <div class="input-box mt-30" style="margin-top: 10px">
                            <label>Price:</label><br>
                            <input type="text" placeholder="Price*" name="price" required>
                        </div>
                        <div class="input-box mt-30"style="margin-top: 10px">
                            <label>Tour Country:</label><br>
                            <select id="selectCountry" name="tourCountry" required
                                    style="width: 100%;border: solid 2px rgba(102, 102, 102, 0.12);border-radius: 5px;height: 45px;padding-left: 30px;background-color: white;">
                                <option value="">Choose Country</option>
                            </select>
                        </div>
                        <div class="input-box mt-30"style="margin-top: 10px">
                            <label>Picture</label><br>
                            <input type="file" class="form-control" name="pic[]" id="pic"
                                   placeholder="Upload Picture" style="line-height: 18px">
                        </div>
                        <div class="input-box mt-30"style="margin-top: 10px">
                            <label>Description</label><br>
                            <textarea class="form-control" name="description" id="description" style="height: 200px"
                                      placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h4 style="text-decoration: underline">Route :</h4>
            <div class="row">
                <div class="col-lg-6">
                    <div class="login-form">
                        <div class="input-box mt-30">
                            <label>Total Days:</label><br>
                            <select class="form-control" id="totalDays" name="totalDays" onchange="selectDays(this.value)">
                                <option value="">Please Select Days</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="2">2</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                            </select>
                        </div>

                        <div id="main-route-div" class="input-box mt-30" style="margin-top: 10px"></div>
                    </div>
                </div>
            </div>
            <hr>
            <h4 style="text-decoration: underline">Top features :</h4>
            <div class="row">
                <div class="col-lg-6">
                    <div>
                        <div class="mt-30">
                            <select class="form-control" id="topFeaturesMultiSelectdropdown" name="featuresList[]"
                                    multiple="multiple">
                                <option value="">Please Select Days</option>
                                @foreach(\App\Features::all() as $item)
                                    <option value="{{$item->id}}">{{$item->name}} - {{$item->description}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h4 style="text-decoration: underline">Activities & Transportation :</h4>
            <div class="row">
                <div class="col-lg-6">
                    <div class="login-form">
                        <div class="mt-30">
                            <label>Activities:</label><br>
                            <select class="form-control" id="topActivitiesMultiSelectdropdown" name="activitiesList[]"
                                    multiple="multiple">
                                <option value="">Please Select Activities</option>
                                <option value="Game Drives">Game Drives</option>
                                <option value="Boat Trip">Boat Trip</option>
                                <option value="Nature Hikes/Walks">Nature Hikes/Walks</option>
                                <option value="Specialized Birding">Specialized Birding</option>
                                <option value="Evening/night Game Drives">Evening/night Game Drives</option>
                                <option value="Walking Safaris">Walking Safaris</option>
                            </select>
                        </div>
                        <div class="input-box mt-30" style="margin-top: 10px">
                            <label>Game Drives:</label><br>
                            <input type="text" placeholder="Enter Game Drives" name="gameDrives" required>
                        </div>
                        <div class="input-box mt-30" style="margin-top: 10px">
                            <label>Getting Around:</label><br>
                            <input type="text" placeholder="Enter Getting Around" name="gettingAround" required>
                        </div>
                        <div class="row mt-30" style="margin-top: 10px">
                            <div class="col-md-1"><input class="form-check-input" type="checkbox"
                                                         id="flexCheckDefault" name="backToAirport"></div>
                            <div class="col-md-11"><label class="form-check-label" for="flexCheckDefault">
                                    A transfer from and back to the airport is included
                                </label></div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h4 style="text-decoration: underline">Accommodation & Meals :</h4>
            <h5>Additional accommodation before and at the end of the tour can be arranged for an extra cost</h5>
            <div class="row">
                <div class="col-md-2">
                    <label>Day:</label><br>
                    <div id="days"></div>
                </div>
                <div class="col-md-5">
                    <label>Accommodation:</label><br>
                    <div id="accommodation"></div>

                </div>
                <div class="col-md-5">
                    <label>Meals:</label><br>
                    <div id="meals"></div>
                </div>
            </div>
            <hr>
            <h4 style="text-decoration: underline">Rates Per Person :</h4>
            <table class="table table-bordered">
                <tr>
                    <th style="font-size: 11px">Start Date</th>
                    <th style="font-size: 11px">End Date</th>
                    <th style="font-size: 11px">Solo (1 Room)</th>
                    <th style="font-size: 11px">2 People (1 Room)</th>
                    <th style="font-size: 11px">3 People (1 Room)</th>
                    <th style="font-size: 11px">4 People (2 Rooms)</th>
                    <th style="font-size: 11px">5 People (2 Rooms)</th>
                    <th style="font-size: 11px">6 People (3 Rooms)</th>
                    <th style="font-size: 11px">Option</th>
                </tr>
                <tbody id="tbody-id">
                <tr>
                    <td><input class="form-control" type="date" name="startDate0"></td>
                    <td><input class="form-control" type="date" name="endDate0"></td>
                    <td><input class="form-control" type="text" name="solo0"></td>
                    <td><input class="form-control" type="text" name="twoPeople0"></td>
                    <td><input class="form-control" type="text" name="threePeople0"></td>
                    <td><input class="form-control" type="text" name="fourPeople0"></td>
                    <td><input class="form-control" type="text" name="fivePeople0"></td>
                    <td><input class="form-control" type="text" name="sixPeople0"></td>
                    <td style="text-align: center"><i title="Add Rate Row" style="cursor: pointer" class="fa fa-plus" onclick="appendNewRow()"></i></td>
                </tr>
                </tbody>
            </table>
            <input type="hidden" name="totalRates" id="totalRates">
            <hr>
            <h4 style="text-decoration: underline">Inclusions :</h4>
            <div class="row">
                <div class="col-lg-6">
                    <div class="login-form">
                        <div class="mt-30">
                            <label>Included:</label><br>
                            <select class="form-control" id="includedSelectdropdown" name="inclusionList[]"
                                    multiple="multiple">
                                <option value="">Please Select Inclusions</option>
                                <option value="Park Fees">Park Fees</option>
                                <option value="All Activities">All Activities</option>
                                <option value="All Accommodation">All Accommodation</option>
                                <option value="A Professional Drive/Guide">A Professional Drive/Guide</option>
                                <option value="All Transportation">All Transportation</option>
                                <option value="All Taxes/VAT">All Taxes/VAT</option>
                                <option value="Roundtrip Airport Transfer">Roundtrip Airport Transfer</option>
                                <option value="Meals">Meals</option>
                                <option value="Drinks">Drinks</option>
                                <option value="Drinking Water">Drinking Water</option>
                                <option value="Gorilla Permits">Gorilla Permits</option>
                                <option value="Chimp Permits">Chimp Permits</option>
                                <option value="Camping Equipment">Camping Equipment</option>
                                <option value="Sleeping Bag">Sleeping Bag</option>
                            </select>
                        </div>
                        <div class="mt-30">
                            <label>Excluded:</label><br>
                            <select class="form-control" id="excludedSelectdropdown" name="exclusionList[]"
                                    multiple="multiple">
                                <option value="">Please Select Exclusions</option>
                                <option value="International Flights">International Flights</option>
                                <option value="Additional accommodation before and at the end of the tour">Additional accommodation before and at the end of the tour</option>
                                <option value="Tips">Tips</option>
                                <option value="Personal items">Personal items</option>
                                <option value="Government imposed increase of taxes and/or park fees">Government imposed increase of taxes and/or park fees</option>
                                <option value="Some meals">Some meals</option>
                                <option value="Roundtrip airport transfer">Roundtrip airport transfer</option>
                                <option value="Bath towels">Bath towels</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h4 style="text-decoration: underline">Upload Tour Photos :</h4>
            <div class="row">
                <div class="col-lg-6">
                    <div class="login-form">
                        <div class="input-box mt-30">
                            <label>Multiple Tour Photos</label><br>
                            <input type="file" class="form-control" name="tourPic[]" id="tourPic"
                                   placeholder="Upload Picture" style="line-height: 18px" multiple>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="form-group">
                <button type="submit"
                        style="background: #6b9ce8;letter-spacing: 3px;border: none;color: #fff;cursor: pointer;padding: 1.0rem 3rem;text-transform: uppercase;border-radius: 5px;line-height: 18px;font-size: 15px !important;">
                    Add Tour
                </button>
            </div>
        </form>
    </div>
    <script>
        var select = document.getElementById("selectCountry");

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
            select.insertBefore(option, select.lastChild);
            //console.log(select);

        }
    </script>
    <script>
        let index = 0;
        document.getElementById('totalRates').value = 1;
        function appendNewRow() {
            index++;
            document.getElementById('totalRates').value = index+1;
            let tbody = document.getElementById('tbody-id');
            let tr= document.createElement('tr');
            let td1= document.createElement('td');
            let inputField1= document.createElement('input');
            inputField1.classList.add('form-control');
            inputField1.setAttribute('type', 'date');
            inputField1.setAttribute('name', 'startDate' + index);
            td1.appendChild(inputField1);

            let td2= document.createElement('td');
            let inputField2= document.createElement('input');
            inputField2.classList.add('form-control');
            inputField2.setAttribute('type', 'date');
            inputField2.setAttribute('name', 'endDate' + index);
            td2.appendChild(inputField2);

            let td3= document.createElement('td');
            let inputField3= document.createElement('input');
            inputField3.classList.add('form-control');
            inputField3.setAttribute('type', 'text');
            inputField3.setAttribute('name', 'solo' + index);
            td3.appendChild(inputField3);

            let td4= document.createElement('td');
            let inputField4= document.createElement('input');
            inputField4.classList.add('form-control');
            inputField4.setAttribute('type', 'text');
            inputField4.setAttribute('name', 'twoPeople' + index);
            td4.appendChild(inputField4);

            let td5= document.createElement('td');
            let inputField5= document.createElement('input');
            inputField5.classList.add('form-control');
            inputField5.setAttribute('type', 'text');
            inputField5.setAttribute('name', 'threePeople' + index);
            td5.appendChild(inputField5);

            let td6= document.createElement('td');
            let inputField6= document.createElement('input');
            inputField6.classList.add('form-control');
            inputField6.setAttribute('type', 'text');
            inputField6.setAttribute('name', 'fourPeople' + index);
            td6.appendChild(inputField6);

            let td7= document.createElement('td');
            let inputField7= document.createElement('input');
            inputField7.classList.add('form-control');
            inputField7.setAttribute('type', 'text');
            inputField7.setAttribute('name', 'fivePeople' + index);
            td7.appendChild(inputField7);

            let td8= document.createElement('td');
            let inputField8= document.createElement('input');
            inputField8.classList.add('form-control');
            inputField8.setAttribute('type', 'text');
            inputField8.setAttribute('name', 'sixPeople' + index);
            td8.appendChild(inputField8);

            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td5);
            tr.appendChild(td6);
            tr.appendChild(td7);
            tr.appendChild(td8);
            tbody.appendChild(tr);
        }
    </script>

    <script>
        setTimeout(function () {
            $("#includedSelectdropdown").select2({
                placeholder: "Select Included",
                maximumSelectionSize: 100,
            });
        }, 3000);
    </script>

    <script>
        setTimeout(function () {
            $("#excludedSelectdropdown").select2({
                placeholder: "Select Excluded",
                maximumSelectionSize: 100,
            });
        }, 3000);
    </script>

    <script>
        setTimeout(function () {
            $("#topFeaturesMultiSelectdropdown").select2({
                placeholder: "Select Multiple Top Features",
                maximumSelectionSize: 100,
            });
        }, 3000);
    </script>
    <script>
        setTimeout(function () {
            $("#topActivitiesMultiSelectdropdown").select2({
                placeholder: "Select Multiple Activities",
                maximumSelectionSize: 100,
            });
        }, 3000);
    </script>
    <script>
        function selectDays(days) {
            document.getElementById('main-route-div').innerHTML = '';
            document.getElementById('days').innerHTML = '';
            document.getElementById('accommodation').innerHTML = '';
            document.getElementById('meals').innerHTML = '';
            for (let i = 0; i < parseInt(days); i++) {
                let accommodationDayInput = document.createElement('input');
                accommodationDayInput.style.marginTop = '5px';
                accommodationDayInput.setAttribute('type', 'text');
                accommodationDayInput.setAttribute('placeholder', 'Please Enter Days (Eg: Day 1)');
                accommodationDayInput.setAttribute('name', 'accommodationDay' + i);
                accommodationDayInput.classList.add('form-control');
                document.getElementById('days').appendChild(accommodationDayInput);
                let accommodationInput = document.createElement('input');
                accommodationInput.style.marginTop = '5px';
                accommodationInput.setAttribute('type', 'text');
                accommodationInput.setAttribute('placeholder', 'Please Enter Accommodation');
                accommodationInput.setAttribute('name', 'accommodationName' + i);
                accommodationInput.classList.add('form-control');
                document.getElementById('accommodation').appendChild(accommodationInput);
                let mealsInput = document.createElement('input');
                mealsInput.style.marginTop = '5px';
                mealsInput.setAttribute('type', 'text');
                mealsInput.setAttribute('placeholder', 'Please Enter Meals');
                mealsInput.setAttribute('name', 'accommodationMeal' + i);
                mealsInput.classList.add('form-control');
                document.getElementById('meals').appendChild(mealsInput);


                let rowDiv = document.createElement('div');
                rowDiv.style.marginTop = '5px'
                rowDiv.classList.add('row');
                let colmd6 = document.createElement('div');
                colmd6.classList.add('col-md-6');

                let dayInput = document.createElement('input');
                dayInput.setAttribute('type', 'text');
                dayInput.setAttribute('placeholder', 'Day (Eg: Day 1)');
                dayInput.setAttribute('name', 'routeDay' + i) ;
                colmd6.appendChild(dayInput);

                let colmd66 = document.createElement('div');
                colmd66.classList.add('col-md-6');

                let routeInput = document.createElement('input');
                routeInput.setAttribute('type', 'text');
                routeInput.setAttribute('placeholder', 'Route (Eg: Nairobi)');
                routeInput.setAttribute('name', 'routeName' + i) ;
                colmd66.appendChild(routeInput);

                rowDiv.appendChild(colmd6);
                rowDiv.appendChild(colmd66);
                document.getElementById('main-route-div').appendChild(rowDiv);
            }
        }
    </script>
    <script>
        function setName(fileId, inputId) {
            var files = document.getElementById(fileId).files;
            if (files.length > 0) {
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
    <script src="{{url('')}}/js/select2.min.js"></script>
    <script src="{{url('')}}/js/select2.init.js"></script>
@endsection
