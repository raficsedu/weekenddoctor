@extends('layouts.master')

@section('content')
<section class="bodySec joinUsBody clearfix" style="background:none; padding:20px;">
    <div class="container">
        <section class="row">
            <h1>Settings</h1>

            <div class="line1"></div>
            <div class="container">

                <div class="row">
                    <div class="col-md-12 col-lg-12" style="padding:20px;">
                        <!-- tabs left -->
                        <div class="tabbable">
                            <ul class="nav nav-pills nav-stacked col-md-3">
                                <li class="active"><a href="#a" data-toggle="tab">Profile</a></li>
                                <li><a href="#b" data-toggle="tab">Password</a></li>
                                <li><a href="#c" data-toggle="tab">Notifications Settings</a></li>
                                <li><a href="#d" data-toggle="tab">Insurance</a></li>
                                <li><a href="#e" data-toggle="tab">Demographic Info</a></li>
                                <li><a href="#f" data-toggle="tab">Authorizations</a></li>
                            </ul>
                            <div class="tab-content col-md-12">
                                <div class="tab-pane active" id="a">
                                    <form id="profile" action="{{url('/patient-profile')}}" method="post">
                                     {{ csrf_field() }}
                                     <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix" style="padding:0px 20px;">
                                        <div class="singBody">

                                            <div class="singRow1">
                                                <label>Name</label>
                                                <br>
                                                <p style="color:#575757; margin-top:10px;">Ankit Sethiya - Please call us at (855) 962-3621 to
                                                    change your name.</p>
                                                </div>
                                                <div class="line1"></div>
                                                <div class="singRow">
                                                    <label>Email</label>
                                                    <input type="text" class="pwd txtBox" placeholder="ankit.003.sethiya@gmail.com" name="email" id="email">
                                                </div>
                                                <div class="line1"></div>
                                                <div class="singRow clearfix">
                                                    <input name="cell" id="cell" type="text" placeholder="Cell" class="txtBox month">
                                                    <input name="home" id="home" type="text" placeholder="Home" class="txtBox date">
                                                    <input name="work" id="work" type="text" placeholder="Work" class="txtBox year">
                                                </div>
                                                <div class="line1"></div>
                                                <div class="singRow">
                                                    <label>Preferred Number </label>
                                                    <select name="preferred_number" id="preferred_number" placeholder="Country code" class="countryCode txtBox1" type="text">
                                                        <option>Cell</option>
                                                        <option>Home</option>
                                                    </select>
                                                </div>
                                                <div class="line1"></div>
                                                <div class="singRow">
                                                    <label>Sex</label>
                                                    <select name="gender" id="gender" placeholder="Country code" class="countryCode txtBox1" type="text">
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                                <div class="line1"></div>
                                                <div class="singRow clearfix">
                                                    <label>Date of Birth</label>
                                                    <div class="row" style="padding-left:15px;">
                                                        <div class="col-md-3 fDiv" align="left">
                                                            <input name="birth_month"  type="number" min="1" max="12" placeholder="03" class=" txtBox tBox">
                                                            <label id="birth_month" for="birth_month" class="error"></label> 
                                                        </div>
                                                        <div class="col-md-9 fDiv" align="left">
                                                            <input name="birth_date"  type="number" min="1" max="31" placeholder="05" class="txtBox tBox">
                                                            <label id="birth_date" for="birth_date" class="error"></label> 
                                                        </div>
                                                    </div>
                                                    <div class="row" style="padding-left:15px;">
                                                        <div class="col-md-3 fdiv" align="left">
                                                         <input  name="birth_year" type="number" min="1900" max="{{date('Y')}}" placeholder="1989" class="txtBox tBox">
                                                         <label id="birth_year" for="birth_year" class="error"></label> 
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="line1"></div>
                                             <div class="singRow">
                                                <button class="signBtn" type="submit" style="background:#298DC6; font-size:18px; padding:15px !important; margin:0 10px;">Save</button>
                                                <a class="signBtn" href="#"
                                                style="background:#d75353; font-size:18px; padding:15px !important;">Cancel</a> 
                                                <a class="signBtn" href="#"
                                                style="background:none; color:#D75353; float:right; font-size:16px;">Dactivate Account</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="b">
                                <form id="pass_change" action="{{url('/password-change')}}" method="post">
                                 {{ csrf_field() }}
                                 <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix" style="padding:0px 20px;">
                                    <div class="singBody">
                                        <div class="singRow">
                                            <label>Enter your current password </label>
                                            <input name="current_password" type="text" class="pwd txtBox" placeholder="Current Password">
                                            <br>
                                            <br>
                                            <label>Choose a Password </label>
                                            <input name="password" type="text" class="pwd txtBox" placeholder="Choose a Password">
                                            <br>
                                            <br>
                                            <label>Confirm your Password </label>
                                            <input name="confirm_password" type="text" class="pwd txtBox" placeholder="Confirm your Password">
                                        </div>
                                        <div class="line1"></div>
                                        <div class="singRow"><button class="signBtn" type="submit" style="background:#298DC6; font-size:18px; padding:15px !important; margin:0 10px;">Save</button>
                                            <a class="signBtn" href="#"
                                            style="background:#d75353; font-size:18px; padding:15px !important;">Cancel</a> 
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="c">
                            <form id="nottification_settings" action="{{url('/nottification-settings')}}" method="post">
                             {{ csrf_field() }}
                             <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix" style="padding:0px 20px;">
                                <div class="singRow">
                                    <label><strong>Emails</strong></label>
                                    <br>
                                    <input id="wellness_reminders" type="checkbox" class="chk">
                                    <input type="hidden" name="wellness_reminders" class="wellness_reminders" value="false">
                                    Wellness reminders
                                </div>
                                <div class="line1"></div>
                                <div class="singRow">
                                    <label><strong>App Settings</strong></label>
                                    <br>
                                    <input  id="appointment_reminders" type="checkbox" class="chk">
                                    <input type="hidden" name="appointment_reminders" class="appointment_reminders" value="false">
                                    Push notify appointment reminders <br>
                                    <br>
                                    <input  id="is_rescheduled_or_cancelled" type="checkbox" class="chk">
                                    <input type="hidden" name="is_rescheduled_or_cancelled" class="is_rescheduled_or_cancelled" value="false">
                                    Push notify if appointment is rescheduled or cancelled <br>
                                    <br>
                                    <input  id="notify_wellness_reminders" type="checkbox" class="chk">
                                    <input type="hidden" name="notify_wellness_reminders" class="notify_wellness_reminders" value="false">
                                    Push notify wellness reminders <br>
                                    <br>
                                </div>
                                <div class="line1"></div>
                                <div class="singRow"><button class="signBtn" type="submit" style="background:#298DC6; font-size:18px; padding:15px !important; margin:0 10px;">Save</button>
                                    <a class="signBtn" href="#"
                                    style="background:#d75353; font-size:18px; padding:15px !important;">Cancel</a> 
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="d">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix" style="padding:0px 20px;">
                            <div class="singBody">
                                <div class="singRow">
                                    <label>Medical Insurance </label>
                                    <select placeholder="Country code" class="countryCode txtBox1" type="text">
                                        @foreach($insurances as $insu)
                                        <option value="{{$insu->id}}">{{$insu->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="line1"></div>
                                <div class="singRow">
                                    <label>Dental Insurance</label>
                                    <select placeholder="Country code" class="countryCode txtBox1" type="text">
                                        <option>Select</option>
                                    </select>
                                </div>
                                <div class="line1"></div>
                                <div class="singRow">
                                    <label>Vision Insurance</label>
                                    <select placeholder="Country code" class="countryCode txtBox1" type="text">
                                        <option>Select</option>
                                    </select>
                                </div>
                                <div class="line1"></div>
                                <div class="singRow"><a class="signBtn" href="#"
                                    style="background:#298DC6; font-size:18px; padding:15px !important; margin:0 10px;">Save</a>
                                    <a class="signBtn" href="#"
                                    style="background:#d75353; font-size:18px; padding:15px !important;">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="e">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix" style="padding:0px 20px;">
                            <div class="singRow">
                                <label><strong>Race Select one or more</strong></label>
                                <br>
                                <input type="checkbox" class="chk">
                                American Indian or Alaska Native<br>
                                <br>
                                <input type="checkbox" class="chk">
                                Asian<br>
                                <br>
                                <input type="checkbox" class="chk">
                                Black or African American<br>
                                <br>
                                <input type="checkbox" class="chk">
                                Native Hawaiian<br>
                                <br>
                                <input type="checkbox" class="chk">
                                Other Pacific Islander<br>
                                <br>
                                <input type="checkbox" class="chk">
                                White<br>
                                <br>
                                <input type="checkbox" class="chk">
                                Other<br>
                                <br>
                                <input type="checkbox" class="chk">
                                Decline to Answer<br>
                                <br>
                            </div>
                            <div class="line1"></div>
                            <div class="singRow">
                                <label><strong>Ethnicity</strong></label>
                                <br>
                                <input type="radio" class="chk">
                                Hispanic or Latino <br>
                                <br>
                                <input type="radio" class="chk">
                                Not Hispanic or Latino<br>
                                <br>
                                <input type="radio" class="chk">
                                Decline to Answer<br>
                                <br>
                            </div>
                            <div class="line1"></div>
                            <div class="singRow">
                                <label>Preferred Language</label>
                                <select placeholder="Country code" class="countryCode txtBox1" type="text">
                                    <option>English</option>
                                </select>
                            </div>
                            <div class="line1"></div>
                            <div class="singRow">
                                <label>Zip (Optional) </label>
                                <input type="text" class="pwd txtBox" placeholder="">
                            </div>
                            <div class="singRow"><a class="signBtn" href="#"
                                style="background:#298DC6; font-size:18px; padding:15px !important; margin:0 10px;">Save</a>
                                <a class="signBtn" href="#"
                                style="background:#d75353; font-size:18px; padding:15px !important;">Cancel</a></div>
                            </div>
                        </div>
                        <div class="tab-pane" id="f">
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix" style="padding:0px 20px;">
                                <div class="singRow">
                                    <label><strong>HIPAA Authorization Settings</strong></label>

                                    <p>Ankit Sethiya (Me) – Authorized <a href="#" style="color:#C00; float:right;">Revoke</a></p>
                                </div>
                                <div class="singRow"><a class="signBtn" href="#"
                                    style="background:#298DC6; font-size:18px; padding:15px !important; margin:0 10px;">Save</a>
                                </div>
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
<style type="text/css">
    .tBox {
        width: 100% !important;
    }
    .fDiv {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }
</style>
@section('footer_custom_script')
<script>
    jQuery(function($) {
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
                },
            }
        });
    });

    $("#wellness_reminders").on("click",function(){
     if($('#wellness_reminders').prop('checked')) {
       $('.wellness_reminders').val("true");
   } else {
       $('.wellness_reminders').val("false");
   }
})
    $("#appointment_reminders").on("click",function(){
     if($('#appointment_reminders').prop('checked')) {
       $('.appointment_reminders').val("true");
   } else {
       $('.appointment_reminders').val("false");
   }
})
    $("#is_rescheduled_or_cancelled").on("click",function(){
     if($('#is_rescheduled_or_cancelled').prop('checked')) {
       $('.is_rescheduled_or_cancelled').val("true");
   } else {
       $('.is_rescheduled_or_cancelled').val("false");
   }
})
    $("#notify_wellness_reminders").on("click",function(){
     if($('#notify_wellness_reminders').prop('checked')) {
       $('.notify_wellness_reminders').val("true");
   } else {
       $('.notify_wellness_reminders').val("false");
   }
})
</script>
@endsection