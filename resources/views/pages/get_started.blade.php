@extends('layouts.master')

@section('content')
<section class="bodySec joinUsBody clearfix">
    <div class="container">
        <section class="row">
            <h1>Get Started with WeekendDocs</h1>
            <div class="line1"></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="padding:0px;">
                <div class="singBody">
                    <form id="signupForm" action="{{url('/doctor-registration')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="registration_type" value="2">
                        <div class="singRow clearfix">
                            <div class="box-in">
                                <label class="clearfix">First Name</label>
                                <input type="text" name="first_name" id="first_name" placeholder="First Name" class="txtBox2 month">
                                <div style="width:100%;float:left;"><label for="first_name" class="error" id="first_name-error"></label></div>
                            </div>
                            <div class="box-in">
                                <label class="clearfix">Last Name</label>
                                <input type="text" name="last_name" id="last_name" placeholder="Last Name" class="txtBox2 month">
                                <div style="width:100%;float:left;"><label for="last_name" class="error" id="last_name-error"></label></div>
                            </div>
                            <div class="box-in">
                                <label class="clearfix">Your Speciality</label>
                                <select name="speciality" id="speciality" class="countryCode txtBox2" type="text" >

                                </select>
                                <div style="width:100%;float:left;"><label for="speciality" class="error" id="speciality-error"></label></div>
                            </div>
                            <div class="box-in1">
                                <label class="clearfix">Your Direct Phone Number</label>
                                <input type="text" name="district_phone_number" id="district_phone_number" placeholder="Your Direct Phone Number" class="txtBox2 month">
                                <div style="width:100%;float:left;"><label for="district_phone_number" class="error" id="district_phone_number-error"></label></div>
                            </div>
                            <div class="box-in1">
                                <label class="clearfix">Zip Code</label>
                                <input type="text" name="zip_code" id="zip_code" placeholder="Zip Code" class="txtBox2 month">
                                <div style="width:100%;float:left;"><label for="zip_code" class="error" id="zip_code-error"></label></div>
                            </div>
                            <br>
                            <br>
                            <div class="box-in1">
                                <label class="clearfix">Your Email</label>
                                <input type="text" name="email" id="email" placeholder="Your Email" class="txtBox2 month">
                                <div style="width:100%;float:left;"><label for="email" class="error" id="email-error"></label></div>
                            </div>
                            <br>
                            <br>
                        </div>
                        <div class="singRow">
                            <button type="submit" class="signBtn">Get Started</button>
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
                    speciality: {
                        required: true
                    },
                    district_phone_number: {
                        required: true
                    },
                    zip_code: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    }
                },
                messages: {

                    first_name: {
                        required: "Please provide your first name"
                    },
                    last_name: {
                        required: "Please provide your last name"
                    },
                    speciality: {
                        required: "Please provide your speciality"
                    },
                    district_phone_number: {
                        required: "Please provide your district phone number"
                    },
                    zip_code: {
                        required: "Please provide your zip_code"
                    },
                    email: "Please enter a valid email address",

                }
            });
        });
    </script>
@endsection