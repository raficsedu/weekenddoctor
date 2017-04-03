@extends('layouts.doctor')

@section('content')
<section class="bodySec joinUsBody clearfix" style="background:none; padding:20px;">
<div class="container">
<section class="row">
<div class="container">
<div class="row">
    @if(Session::has('successful'))
    <div class="col-md-12">
        <div class="alert alert-success">
            <p>
                <strong>{{Session::pull('successful','default')}}</strong>
            </p>
        </div>
    </div>
    @elseif(Session::has('unsuccessful'))
    <div class="col-md-12">
        <div class="alert alert-danger">
            <p>
                <strong>{{Session::pull('unsuccessful','default')}}</strong>
            </p>
        </div>
    </div>
    @endif
</div>
<div class="row">
<div class="col-md-12 col-lg-12" style="padding:20px;">
<!-- tabs left -->
<div class="tabbable">
    <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked col-md-12">
            <li class="active"><a href="#a" data-toggle="tab">Personal Info</a></li>
            <li><a href="#b" data-toggle="tab">Payment Info</a></li>
            <li><a href="#c" data-toggle="tab">Office Info</a></li>
            <li><a href="#d" data-toggle="tab">Account</a></li>
        </ul>
    </div>
    <div class="col-md-9">
        <div class="tab-content col-md-12">
            <div class="tab-pane active" id="a">
                <?php
                if(isset($metas['profile_image']) && $metas['profile_image']!=''){
                    $pro_img_url = url('public/uploads/doctor/'.$metas['profile_image']);
                    $pro_img = $metas['profile_image'];
                }else{
                    $pro_img_url = url('public/images/doctor05.png');
                    $pro_img = '';
                }
                if(isset($metas['insurance'])){
                    $insurancess = explode(',',$metas['insurance']);
                }else{
                    $insurancess = array();
                }
                ?>
                <form id="profile" action="{{url('save-doctor-settings')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="d" value="{{$doctor_id}}">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix" style="padding:0px 20px;">
                        <div class="singBody">

                            <div class="singRow1">
                                <p style="color:#575757; margin-top:10px;">{{Auth::user()->first_name.' '.Auth::user()->last_name}} - Please call us at (855) 962-3621
                                    to change your name.</p>
                            </div>
                            <div class="line1"></div>
                            <div class="singRow">
                                <label>Profile Image</label>
                                <input name="profile_image" id="profile_image" class="form" type="file">
                                <input name="current_profile_image" type="hidden" value="{{$pro_img}}">
                                <img class="pro_thumb" src="{{$pro_img_url}}">
                            </div>
                            <div class="line1"></div>
                            <div class="singRow">
                                <label>Title (eg Phd, Dr)</label>
                                <input type="text" class="pwd txtBox" placeholder="Title (eg Phd, Dr)" name="doctor_title" id="doctor_title" value="@if(isset($metas['doctor_title'])){{$metas['doctor_title']}}@endif">
                            </div>
                            <div class="singRow">
                                <label>Speciality</label>
                                <select name="speciality" id="speciality" placeholder="Speciality" class="countryCode txtBox1">
                                   @foreach($specialties as $specialty)
                                     <option value="{{$specialty->id}}" @if($metas['speciality']==$specialty->id){{"selected"}}@endif>{{$specialty->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="line1"></div>
                            <div class="singRow">
                                <label>Education</label>
                                <textarea name="education" id="education" class="txtArea">@if(isset($metas['education'])){{$metas['education']}}@endif</textarea>
                            </div>
                            <div class="singRow">
                                <label>Hospital Affiliations</label>
                                <input type="text" class="pwd txtBox" placeholder="Hospital Affiliations" name="hospital_affiliation" id="hospital_affiliation" value="@if(isset($metas['hospital_affiliation'])){{$metas['hospital_affiliation']}}@endif">
                            </div>
                            <div class="singRow">
                                <label>Languages Spoken</label>
                                <input type="text" class="pwd txtBox" placeholder="Languages Spoken" name="language_spoken" id="language_spoken" value="@if(isset($metas['language_spoken'])){{$metas['language_spoken']}}@endif">
                            </div>
                            <div class="singRow">
                                <label>Board Certifications</label>
                                <textarea name="board_certification" id="board_certification" class="txtArea">@if(isset($metas['board_certification'])){{$metas['board_certification']}}@endif</textarea>
                            </div>
                            <div class="singRow">
                                <label>Awards and Publications</label>
                                <input type="text" class="pwd txtBox" placeholder="Awards and Publications" name="award_and_publications" id="award_and_publications" value="@if(isset($metas['award_and_publications'])){{$metas['award_and_publications']}}@endif">
                            </div>
                            <div class="singRow">
                                <label>Professional Memberships</label>
                                <input type="text" class="pwd txtBox" placeholder="Professional Memberships" name="professional_membership" id="professional_membership" value="@if(isset($metas['professional_membership'])){{$metas['professional_membership']}}@endif">
                            </div>
                            <div class="line1"></div>
                            <div class="singRow">
                                <label>Professional Statement</label>
                                <textarea name="professional_statement" id="professional_statement" class="txtArea">@if(isset($metas['professional_statement'])){{$metas['professional_statement']}}@endif</textarea>
                            </div>
                            <div class="line1"></div>
                            <div class="singRow">
                                <label>Accepted Insurances</label>
                                <div class="row">
                                    @foreach($insurances as $insurance)
                                        <div class="col-md-4">
                                            <input name="insurance[]" value="{{$insurance->id}}" class="chk" type="checkbox" @if(in_array($insurance->id, $insurancess)){{"checked"}}@endif> {{$insurance->name}}
                                        </div>
                                     @endforeach
                                </div>
                            </div>
                            <div class="line1"></div>
                            <div class="singRow">
                                <button class="signBtn" type="submit"
                                        style="background:#298DC6; font-size:18px; padding:15px !important; margin:0 10px;">
                                    Save
                                </button>
                                <a class="signBtn" href="#"
                                   style="background:#d75353; font-size:18px; padding:15px !important;">Cancel</a>
                                <a class="signBtn" href="deactive-account"
                                   style="background:none; color:#D75353; float:right; font-size:16px;">Dactivate
                                    Account</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="b">
                <form id="pass_change" action="{{url('/password-change')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="d" value="{{$doctor_id}}">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix" style="padding:0px 20px;">
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="c">
                <form id="" action="{{url('/doctor/office/info')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="d" value="{{$doctor_id}}">
                    <input type="hidden" name="registration_type" value="2">
                    <input type="hidden" name="lat" id="lat" value="@if(isset($metas['lat'])){{$metas['lat']}}@endif"/>
                    <input type="hidden" name="lng" id="lng" value="@if(isset($metas['lng'])){{$metas['lng']}}@endif"/>
                    <input id="zip" name="zip" type="hidden" value="@if(isset($metas['zip'])){{$metas['zip']}}@endif"/>
                    <input id="city" name="city" type="hidden" value="@if(isset($metas['city'])){{$metas['city']}}@endif"/>
                    <input id="area" name="area" type="hidden" value="@if(isset($metas['area'])){{$metas['area']}}@endif"/>
                    <input id="region" name="region" type="hidden" value="@if(isset($metas['region'])){{$metas['region']}}@endif"/>
                    <input id="country" name="country" type="hidden" value="@if(isset($metas['country'])){{$metas['country']}}@endif"/>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix" style="padding:0px 20px;">
                        <div class="singRow">
                            <label>Office Address</label>
                            <input name="address" id="address" class="pwd txtBox" placeholder="Office Address" type="text" value="@if(isset($metas['address'])){{$metas['address']}}@endif">
                        </div>

                        <div class="singRow">
                            <label>Direct Telephone</label>
                            <input name="phone" id="phone" class="pwd txtBox" placeholder="Mobile telephone" type="text" value="@if(isset($metas['phone'])){{$metas['phone']}}@endif">
                        </div>

                        <div class="line1"></div>
                        <div class="singRow">
                            <button class="signBtn" type="submit"
                                    style="background:#298DC6; font-size:18px; padding:15px !important; margin:0 10px;">Save
                            </button>
                            <a class="signBtn" href="#"
                               style="background:#d75353; font-size:18px; padding:15px !important;">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="d">
                <form id="pass_change" action="{{url('/doctor-password-change')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="d" value="{{$doctor_id}}">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix" style="padding:0px 20px;">
                        <div class="singBody">
                            <div class="singRow">
                                <label>Enter your current password </label>
                                <input name="current_password" type="text" class="pwd txtBox"
                                       placeholder="Current Password">
                                <br>
                                <br>
                                <label>Choose a Password </label>
                                <input name="password" type="text" class="pwd txtBox" placeholder="Choose a Password">
                                <br>
                                <br>
                                <label>Confirm your Password </label>
                                <input name="confirm_password" type="text" class="pwd txtBox"
                                       placeholder="Confirm your Password">
                            </div>
                            <div class="line1"></div>
                            <div class="singRow">
                                <button class="signBtn" type="submit"
                                        style="background:#298DC6; font-size:18px; padding:15px !important; margin:0 10px;">
                                    Save
                                </button>
                                <a class="signBtn" href="#"
                                   style="background:#d75353; font-size:18px; padding:15px !important;">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /tabs -->
</div>
</div>
<!-- /row -->
</div>
<hr>
</section>
</div>
</section>
@endsection

@section('footer_custom_script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_H_Q5act_fZ9Y-TdiXp3UkFR113pW08U&libraries=places"></script>
<script>
    var placeSearch, autocomplete;
    google.maps.event.addDomListener(window, 'load', function () {
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {HTMLInputElement} */(document.getElementById('address')),
            {
                types: ['geocode']
                // componentRestrictions: {country: 'ng'}
            });
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            sid_nsna_loadAddress_pl3();
        });
    });

    function sid_nsna_loadAddress_pl3() {
        // console.log(autocomplete.getPlace());
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        pipulateAddress(place.address_components);

        // $('.lat').text(autocomplete.getPlace().geometry.location.lat())
        // $('.lng').text(autocomplete.getPlace().geometry.location.lng())

        $('#lat').val(autocomplete.getPlace().geometry.location.lat());
        $('#lng').val(autocomplete.getPlace().geometry.location.lng());

        var mapOptions = {
            center: autocomplete.getPlace().geometry.location,
            zoom: 14
        };

        $('#map_container').show();
        map = new google.maps.Map(document.getElementById('map_container'), mapOptions);
        marker = new google.maps.Marker({
            map: map,
            position: autocomplete.getPlace().geometry.location
        });

        google.maps.event.addListener(map, 'click', function(event) {
            var latitude = event.latLng.lat();
            var longitude = event.latLng.lng();
            var latlongString  = latitude + ',' + longitude;
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({'latLng': event.latLng}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    console.log(results);
                    $('.formatted_address').text(results[0].formatted_address);
                    pipulateAddress(results[0].address_components);
                }
            });

            marker.setPosition( event.latLng ); map.panTo( event.latLng );
            $('#lat').val(latitude);
            $('#lng').val(longitude);
        });
    }

    // [ START Textbox filling] -->]
    function pipulateAddress (address_components) {

        $('.fill-address').empty();

        for (var i = 0; i < address_components.length; i++) {
            var addressComponent = address_components[i];
            if (addressComponent.types[0] == 'postal_code')
                $('#zip').val(addressComponent['short_name']);

            if (addressComponent.types[0] == 'street_number')
                $('#area').val(  addressComponent['short_name'] );

            if( addressComponent.types[0] == 'locality' )
                $('#city').val(addressComponent['short_name']);

            if( addressComponent.types[0] == 'administrative_area_level_1' )
                $('#region').val(addressComponent['long_name']);

            if( addressComponent.types[0] == 'country' )
                $('#country').val(addressComponent['long_name']);

        }
    }

    jQuery(function ($) {
        // validate signup form on keyup and submit
        $("#profile").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                preferred_number: {
                    required: true
                },
                gender: {
                    required: true,
                },
                birth_month: {
                    required: true
                },
                birth_date: {
                    required: true
                },
                birth_year: {
                    required: true
                }
            },
            messages: {
                email: "Please enter a valid email address",

                preferred_number: {
                    required: "Please provide preferred number",
                },
                gender: {
                    required: "Please provide your gender"
                },
                birth_month2: {
                    required: "Please provide your birth month",
                    minlength: "Your birth month must be at least 2 characters long"
                },
                birth_date: {
                    required: "Please provide your birth day",
                    minlength: "Your birth day must be at least 2 characters long"
                },
                birth_year: {
                    required: "Please provide your birth year",
                    minlength: "Your birth year must be at least 4 characters long"
                }
            }
        });
    });
</script>
@endsection