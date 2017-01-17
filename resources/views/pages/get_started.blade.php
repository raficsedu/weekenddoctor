@extends('layouts.master')

@section('content')
<section class="bodySec joinUsBody clearfix">
    <div class="container">
        <section class="row">
            <h1>Get Started with WeekendDocs</h1>
            <div class="line1"></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="padding:0px;">
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
                <div class="singBody">
                    <form id="signupForm" action="{{url('/doctor-registration')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="registration_type" value="2">
                        <input type="hidden" name="lat" id="lat" />
                        <input type="hidden" name="lng" id="lng" />
                        <input id="zip" name="zip" type="hidden" />
                        <input id="city" name="city" type="hidden" />
                        <input id="area" name="area" type="hidden" />
                        <input id="region" name="region" type="hidden" />
                        <input id="country" name="country" type="hidden" />
                     <div class="singRow clearfix">
                        <div class="box-in">
                            <label>First Name</label>
                            <input id="first_name" name="first_name" type="text" placeholder="First Name" class="txtBox2 month">
                            </br></br>
                            <label for="first_name" class="error" id="first_name-error"></label>
                        </div>
                        <div class="box-in">
                          <label>Last Name</label>
                          <input id="last_name" name="last_name" type="text" placeholder="Last Name" class="txtBox2 month">
                           </br></br>
                          <label for="last_name" class="error" class="clearfix"></label>
                      </div>
                      <div class="box-in">
                        <label>Your Speciality</label>
                        <label for="specialty" class="error"  class="clearfix"></label>
                        <select id="specialty" name="specialty" class="countryCode txtBox2" type="text">
                            <option value="0">Choose a Speciality</option>
                          @foreach($specialties as $specialty)
                          <option value="{{$specialty->id}}">{{$specialty->name}}</option>
                          @endforeach
                        
                      </select>
                  </div>
                  <div class="box-in1">
                    <label>Your Direct Phone Number</label>
                    <input id="phone" name="phone" type="text" placeholder="Your Direct Phone Number" class="txtBox2 month">
                     </br></br>
                    <label for="phone" class="error" class="clearfix"></label>
                </div>
                <div class="box-in1">
                    <label>Address</label>
                    <input id="address" name="address" type="text" placeholder="Address" class="txtBox2 month">
                     </br></br>
                    <label for="address" class="error" class="clearfix"></label>
                    <div id="map_container"></div>
                </div>
                <br>
                <br>
                <div class="box-in1">
                    <label>Your Email</label>
                    <input id="email" name="email" type="text" placeholder="Your Email" class="txtBox2 month">
                     </br></br>
                    <label for="email" id="confirm_email-error" class="error" class="clearfix"></label>
                </div>
                <br>
                <br>
            </div>
            <div class="singRow">
                <button type="submit" class="signBtn" style="background:#298DC6;">Get Started</button>

            </div>
        </form>
    </div>
</div>
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

    jQuery(function($) {
        // validate signup form on keyup and submit
        $("#signupForm").validate({
            rules: {
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                specialty: {
                    required: true
                },
                phone: {
                    required: true
                },
                address: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                first_name: "Please provide your first name",
                last_name: {
                    required: "Please provide your last name",
                },
                specialty: {
                    required: "Please provide your Specialty",
                },
                phone: {
                    required: "Please provide your Phone No."
                },
                address: {
                    required: "Please provide your address"
                },
                email: {
                    required: "Please enter a valid email address"
                }
            }
        });
});
</script>
@endsection