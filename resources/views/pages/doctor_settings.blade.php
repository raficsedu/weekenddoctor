@extends('layouts.doctor')

@section('content')
<section class="bodySec joinUsBody clearfix" style="background:none; padding:20px;">
<div class="container">
<section class="row">
<div class="container">

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
                <form id="profile" action="{{url('/patient-profile')}}" method="post">
                    {{ csrf_field() }}
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix" style="padding:0px 20px;">
                        <div class="singBody">

                            <div class="singRow1">
                                <p style="color:#575757; margin-top:10px;">{{Auth::user()->first_name.' '.Auth::user()->last_name}} - Please call us at (855) 962-3621
                                    to change your name.</p>
                            </div>
                            <div class="line1"></div>
                            <div class="singRow">
                                <label>Profile Image</label>
                                <input name="MAX_FILE_SIZE" value="31457280" id="MAX_FILE_SIZE" type="hidden">
                                <input name="" id="" class="form" type="file">
                            </div>
                            <div class="line1"></div>
                            <div class="singRow">
                                <label>Title (eg Phd, Dr)</label>
                                <input type="text" class="pwd txtBox" placeholder="Title (eg Phd, Dr)" name="" id="">
                            </div>
                            <div class="singRow">
                                <label>Speciality</label>
                                <select name="" id="" placeholder="Speciality" class="countryCode txtBox1">
                                    <option>Speciality 1</option>
                                    <option>Speciality 2</option>
                                </select>
                            </div>
                            <div class="line1"></div>
                            <div class="singRow">
                                <label>Education</label>
                                <textarea name="" id="" class="txtArea"></textarea>
                            </div>
                            <div class="singRow">
                                <label>Hospital Affiliations</label>
                                <input type="text" class="pwd txtBox" placeholder="Hospital Affiliations" name="" id="">
                            </div>
                            <div class="singRow">
                                <label>Languages Spoken</label>
                                <input type="text" class="pwd txtBox" placeholder="Languages Spoken" name="" id="">
                            </div>
                            <div class="singRow">
                                <label>Board Certifications</label>
                                <textarea name="" id="" class="txtArea"></textarea>
                            </div>
                            <div class="singRow">
                                <label>Awards and Publications</label>
                                <input type="text" class="pwd txtBox" placeholder="Awards and Publications" name="" id="">
                            </div>
                            <div class="singRow">
                                <label>Professional Memberships</label>
                                <input type="text" class="pwd txtBox" placeholder="Professional Memberships" name="" id="">
                            </div>
                            <div class="line1"></div>
                            <div class="singRow">
                                <label>Accepted Insurances</label>
                                <div class="row">
                                    <div class="col-md-3"><input name="" id="" class="chk" type="checkbox"> Insurance 1</div>
                                    <div class="col-md-3"><input name="" id="" class="chk" type="checkbox"> Insurance 1</div>
                                    <div class="col-md-3"><input name="" id="" class="chk" type="checkbox"> Insurance 1</div>
                                    <div class="col-md-3"><input name="" id="" class="chk" type="checkbox"> Insurance 1</div>
                                    <div class="col-md-3"><input name="" id="" class="chk" type="checkbox"> Insurance 1</div>
                                    <div class="col-md-3"><input name="" id="" class="chk" type="checkbox"> Insurance 1</div>
                                    <div class="col-md-3"><input name="" id="" class="chk" type="checkbox"> Insurance 1</div>
                                    <div class="col-md-3"><input name="" id="" class="chk" type="checkbox"> Insurance 1</div>
                                    <div class="col-md-3"><input name="" id="" class="chk" type="checkbox"> Insurance 1</div>
                                    <div class="col-md-3"><input name="" id="" class="chk" type="checkbox"> Insurance 1</div>
                                    <div class="col-md-3"><input name="" id="" class="chk" type="checkbox"> Insurance 1</div>
                                    <div class="col-md-3"><input name="" id="" class="chk" type="checkbox"> Insurance 1</div>
                                    <div class="col-md-3"><input name="" id="" class="chk" type="checkbox"> Insurance 1</div>
                                    <div class="col-md-3"><input name="" id="" class="chk" type="checkbox"> Insurance 1</div>
                                    <div class="col-md-3"><input name="" id="" class="chk" type="checkbox"> Insurance 1</div>
                                    <div class="col-md-3"><input name="" id="" class="chk" type="checkbox"> Insurance 1</div>
                                    <div class="col-md-3"><input name="" id="" class="chk" type="checkbox"> Insurance 1</div>
                                    <div class="col-md-3"><input name="" id="" class="chk" type="checkbox"> Insurance 1</div>
                                </div>
                            </div>
                            <div class="singRow">
                                <label>Professional Statement</label>
                                <textarea name="" id="" class="txtArea"></textarea>
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
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix" style="padding:0px 20px;">
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="c">
                <form id="nottification_settings" action="{{url('/nottification-settings')}}" method="post">
                    {{ csrf_field() }}
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix" style="padding:0px 20px;">
                        <div class="singRow">
                            <label>Office Address</label>
                            <input name="" id="" class="pwd txtBox" placeholder="Office Address" type="text">
                        </div>

                        <div class="singRow">
                            <label>Office Area</label>
                            <input name="" id="" class="pwd txtBox" placeholder="Office Area" type="text">
                        </div>

                        <div class="singRow">
                            <label>Office City</label>
                            <input name="" id="" class="pwd txtBox" placeholder="Office City" type="text">
                        </div>

                        <div class="singRow">
                            <label>Office State</label>
                            <input name="" id="" class="pwd txtBox" placeholder="Office State" type="text">
                        </div>

                        <div class="singRow">
                            <label>Office ZIP code</label>
                            <input name="" id="" class="pwd txtBox" placeholder="Office ZIP code" type="text">
                        </div>

                        <div class="singRow">
                            <label>Public telephone</label>
                            <input name="" id="" class="pwd txtBox" placeholder="Public telephone" type="text">
                        </div>

                        <div class="singRow">
                            <label>Mobile telephone</label>
                            <input name="" id="" class="pwd txtBox" placeholder="Mobile telephone" type="text">
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
                <form id="pass_change" action="{{url('/password-change')}}" method="post">
                    {{ csrf_field() }}
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
<script>
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