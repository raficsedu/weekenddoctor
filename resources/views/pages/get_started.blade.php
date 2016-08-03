@extends('layouts.master')

@section('content')
<section class="bodySec joinUsBody clearfix">
    <div class="container">
        <section class="row">
            <h1>Get Started with WeekendDocs</h1>
            <div class="line1"></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="padding:0px;">
                <h4 style="color: red;text-align:left">@if(Session::has('message')){{Session::pull('message','default')}}@endif</h4>
                <div class="singBody">
                    <form id="signupForm" action="{{url('/doctor-registration')}}" method="post">
                     {{ csrf_field() }}
                     <input type="hidden" name="registration_type" value="2">
                     <div class="singRow clearfix">
                        <div class="box-in">
                            <label>First Name</label>
                            <label for="first_name" class="error" class="clearfix"></label>
                            <input id="first_name" name="first_name" type="text" placeholder="First Name" class="txtBox2 month">
                        </div>
                        <div class="box-in">
                          <label>Last Name</label>
                          <label for="last_name" class="error" class="clearfix"></label>
                          <input id="last_name" name="last_name" type="text" placeholder="Last Name" class="txtBox2 month">
                      </div>
                      <div class="box-in">
                        <label>Your Specialty</label>
                        <label for="specialty" class="error"  class="clearfix"></label>
                        <select id="specialty" name="specialty" class="countryCode txtBox2" type="text">
                          @foreach($specialties as $specialty)
                          <option value="{{$specialty->name}}">{{$specialty->name}}</option>
                          @endforeach
                          
                      </select>
                  </div>
                  <div class="box-in1">
                    <label>Your DirectPhone Number</label>
                    <label for="phone" class="error" class="clearfix"></label>
                    <input id="phone" name="phone" type="text" placeholder="Your Direct Phone Number" class="txtBox2 month">
                </div>
                <div class="box-in1">
                    <label>Zip Code</label>
                    <label for="zip" class="error" class="clearfix"></label>
                    <input id="zip" name="zip" type="text" placeholder="Zip Code" class="txtBox2 month">
                </div>
                <br>
                <br>
                <div class="box-in1">
                    <label>Your Email</label>
                    <label for="email" id="confirm_email-error" class="error" class="clearfix"></label>
                    <input id="email" name="email" type="text" placeholder="Your Email" class="txtBox2 month">
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
<script>
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
                zip: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
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
                zip: {
                    required: "Please provide your Zip Code"
                },
                email: {
                    required: "Please enter a valid email address"
                }
            }
        });
});
</script>
@endsection