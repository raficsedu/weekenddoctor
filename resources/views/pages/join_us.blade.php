@extends('layouts.master')

@section('content')
<section class="bodySec joinUsBody clearfix">
    <div class="container">
        <section class="row">
            <h1>Join Now</h1>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 clearfix">
                <h4 style="color: red;text-align:left">@if(Session::has('message')){{Session::pull('message','default')}}@endif</h4>
                <div class="singBody">
                    <form id="signupForm" action="{{url('/patient-registration')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="registration_type" value="1">
                        <div class="singRow">
                            <label>Email Address</label>
                            <input type="text"  name="email" id="email" class="name txtBox11">
                            <label for="email" class="error" id="email-error"></label>
                        </div>
                        <div class="singRow">
                            <label>Confirm Your Email</label>
                            <input type="text"  name="confirm_email" id="confirm_email" class="pwd txtBox11">
                            <label for="confirm_email" class="error" id="confirm_email-error"></label>
                        </div>
                        <div class="singRow">
                            <label>Create a Password</label>
                            <input type="password"  name="password" id="password" class="pwd txtBox11">
                            <label for="password" class="error" id="password-error"></label>
                        </div>
                        <div class="singRow clearfix">
                            <label class="clearfix">Name</label>
                            <input type="text" name="first_name" id="first_name" placeholder="First" class="txtBox fisrt">
                            <input type="text" name="last_name" id="last_name" placeholder="Last" class="txtBox last">
                            <div style="min-width: 41%;float: left;"><label for="first_name" class="error" id="first_name-error"></label></div>
                            <div style="min-width: 41%;float: left;"><label for="last_name" class="error" id="last_name-error"></label></div>
                        </div>
                        <div class="singRow clearfix">
                            <label class="clearfix">Date of Birth</label>
                            <select name="month" id="month" class="txtBox month">
                                <option value="">Month</option>
                                <?php
                                    for($i=1;$i<=12;$i++){
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                ?>
                            </select>
                            <select name="day" id="day" class="txtBox day">
                                <option value="">Day</option>
                                <?php
                                    for($i=1;$i<=31;$i++){
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                ?>
                            </select>
                            <select name="year" id="year" class="txtBox year">
                                <option value="">Year</option>
                                <?php
                                    for($i=date('Y');$i>=1940;$i--){
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                ?>
                            </select>
                            <div style="min-width: 28%;float: left;"><label for="month" class="error" id="month-error"></label></div>
                            <div style="min-width: 28%;float: left;"><label for="day" class="error" id="day-error"></label></div>
                            <div style="min-width: 28%;float: left;"><label for="year" class="error" id="year-error"></label></div>
                        </div>
                        <div class="singRow">
                            <label>Sex</label>
                            <select name="sex" id="sex" class="countryCode txtBox11">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                            <label for="sex" class="error" id="sex-error"></label>
                        </div>
                        <div class="singRow">
                            <input type="checkbox" name="terms_wd" id="terms_wd" class="chk">
                            I have read and accept weekends docs terms of use.
                            <label for="terms_wd" class="error" id="terms_wd-error"></label>
                        </div>
                        <div class="singRow">
                            <input type="checkbox" name="terms_hp" id="terms_hp" class="chk">
                            I have read and accept weekends docs HIPAA Authorization.
                            <label for="terms_hp" class="error" id="terms_hp-error"></label>
                        </div>
                        <div class="singRow">
                            <button type="submit" class="signBtn">Continue</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 clearfix">
                <div class="rightSide"><img src="{{url('public/images/joinDoct.png')}}" alt=""/></div>
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
                email: {
                    required: true,
                    email: true
                },
                confirm_email: {
                    required: true,
                    email: true,
                    equalTo: "#email"
                },
                password: {
                    required: true,
                    minlength: 8
                },
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                month: {
                    required: true
                },
                day: {
                    required: true
                },
                year: {
                    required: true
                },
                sex: {
                    required: true
                },
                terms_hp: "required",
                terms_wd: "required"
            },
            messages: {
                email: "Please enter a valid email address",
                confirm_email: {
                    required: "Please enter a valid email address",
                    equalTo: "Please enter the same email as above"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long"
                },
                first_name: {
                    required: "Please provide your first name"
                },
                last_name: {
                    required: "Please provide your last name"
                },
                month: {
                    required: "Please select month"
                },
                day: {
                    required: "Please select day"
                },
                year: {
                    required: "Please select year"
                },
                sex: {
                    required: "Please select your sex"
                },
                terms_wd: "Please accept our policy",
                terms_hp: "Please accept HIPPA policy"
            }
        });
    });
</script>
@endsection