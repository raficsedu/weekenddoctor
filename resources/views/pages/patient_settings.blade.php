@extends('layouts.patient')
<?php
if(isset($metas['date_of_birth'])){
    $temp = explode('/',$metas['date_of_birth']);
    $birth_month = $temp[0];
    $birth_date = $temp[1];
    $birth_year = $temp[2];
}else{
    $birth_month = '';
    $birth_date = '';
    $birth_year = '';
}
?>
@section('content')
<section class="bodySec joinUsBody clearfix" style="background:none; padding:20px;">
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
        <section class="row">
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
<!--                                <li><a href="#e" data-toggle="tab">Demographic Info</a></li>-->
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
                                                <p style="color:#575757; margin-top:10px;">{{Auth::user()->first_name.' '.Auth::user()->last_name}} - Please call us at (855) 962-3621 to
                                                    change your name.</p>
                                                </div>
                                                <div class="line1"></div>
                                                <div class="singRow">
                                                    <label>Email</label>
                                                    <input type="text" class="pwd txtBox" name="email" id="email" value="{{Auth::user()->email}}" disabled>
                                                </div>
                                                <div class="line1"></div>
                                                <div class="singRow clearfix">
                                                    <input name="cell_no" id="cell_no" type="text" placeholder="Cell" class="txtBox month" value="@if(isset($metas['cell_no'])){{$metas['cell_no']}}@endif">
                                                    <input name="home_phone_no" id="home_phone_no" type="text" placeholder="Home" class="txtBox day" value="@if(isset($metas['home_phone_no'])){{$metas['home_phone_no']}}@endif">
                                                    <input name="work_phone_no" id="work_phone_no" type="text" placeholder="Work" class="txtBox day" value="@if(isset($metas['work_phone_no'])){{$metas['work_phone_no']}}@endif">
                                                </div>
                                                <div class="line1"></div>
                                                <div class="singRow">
                                                    <label>Preferred Number </label>
                                                    <select name="preferred_number" id="preferred_number" placeholder="Country code" class="countryCode txtBox1" type="text">
                                                        <option value="cell" @if(isset($metas['preferred_number']) && $metas['preferred_number']=='cell'){{"selected"}}@endif>Cell</option>
                                                        <option value="home" @if(isset($metas['preferred_number']) && $metas['preferred_number']=='home'){{"selected"}}@endif>Home</option>
                                                    </select>
                                                </div>
                                                <div class="line1"></div>
                                                <div class="singRow">
                                                    <label>Sex</label>
                                                    <select name="gender" id="gender" placeholder="Your Gender" class="countryCode txtBox1" type="text">
                                                        <option value="male" @if(isset($metas['gender']) && $metas['gender']=='male'){{"selected"}}@endif>Male</option>
                                                        <option value="female" @if(isset($metas['gender']) && $metas['gender']=='female'){{"selected"}}@endif>Female</option>
                                                    </select>
                                                </div>
                                                <div class="line1"></div>
                                                <div class="singRow clearfix">
                                                    <label>Date of Birth</label>
                                                    <div class="row" style="padding-left:15px;">
                                                        <div class="col-md-3 fDiv" align="left">
                                                            <input name="birth_month"  type="number" min="1" max="12" placeholder="03" class=" txtBox tBox" value="{{$birth_month}}">
                                                            <label id="birth_month" for="birth_month" class="error"></label>
                                                        </div>
                                                        <div class="col-md-3 fDiv bday" align="left">
                                                            <input name="birth_date"  type="number" min="1" max="31" placeholder="05" class="txtBox tBox" value="{{$birth_date}}">
                                                            <label id="birth_date" for="birth_date" class="error"></label>
                                                        </div>
                                                        <div class="col-md-3 fdiv bday" align="left">
                                                            <input  name="birth_year" type="number" min="1900" max="{{date('Y')}}" placeholder="1989" class="txtBox tBox" value="{{$birth_year}}">
                                                            <label id="birth_year" for="birth_year" class="error"></label>
                                                        </div>
                                                    </div>
                                             </div>
                                             <div class="line1"></div>
                                             <div class="singRow">
                                                <button class="signBtn" type="submit" style="background:#298DC6; font-size:18px; padding:15px !important; margin:0 10px;">Save</button>
                                                <a class="signBtn" href="#"
                                                style="background:#d75353; font-size:18px; padding:15px !important;">Cancel</a>
                                                <a class="signBtn" href="deactive-account"
                                                style="background:none; color:#D75353; float:right; font-size:16px;">Dactivate Account</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="b">
                                <form id="pass_change" action="{{url('/patient-password-change')}}" method="post">
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
                        <form id="insurance_settings" action="{{url('/insurance-settings')}}" method="post">
                            {{ csrf_field() }}
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix" style="padding:0px 20px;">
                                <div class="singBody">
                                    <div class="singRow">
                                        <label>Medical Insurance </label>
                                        <select name="medical_insurance" placeholder="Country code" class="countryCode txtBox1" type="text">
                                            @foreach($insurances as $insu)
                                                <option value="{{$insu->id}}" @if(isset($metas['medical_insurance']) && $metas['medical_insurance']==$insu->id){{"selected"}}@endif>{{$insu->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="line1"></div>
                                    <div class="singRow">
                                        <label>Dental Insurance</label>
                                        <select name="dental_insurance" placeholder="Country code" class="countryCode txtBox1" type="text">
                                            @foreach($insurances as $insu)
                                                <option value="{{$insu->id}}" @if(isset($metas['dental_insurance']) && $metas['dental_insurance']==$insu->id){{"selected"}}@endif>{{$insu->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="line1"></div>
                                    <div class="singRow">
                                        <label>Vision Insurance</label>
                                        <select name="vision_insurance" placeholder="Country code" class="countryCode txtBox1" type="text">
                                            @foreach($insurances as $insu)
                                                <option value="{{$insu->id}}" @if(isset($metas['vision_insurance']) && $metas['vision_insurance']==$insu->id){{"selected"}}@endif>{{$insu->name}}</option>
                                            @endforeach
                                        </select>
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
                    <div class="tab-pane" id="e">
                        <form id="insurance_settings" action="{{url('/demographic-settings')}}" method="post">
                            {{ csrf_field() }}
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix" style="padding:0px 20px;">
                                <div class="singRow ">
                                    <label><strong>Race Select one or more</strong></label>
                                    <br>

                                        <input name="american_indian_or_alaska_native" id="american_indian_or_alaska_native" type="checkbox" >
                                    <input value="false" type="hidden" name="american_indian_or_alaska_native" class="american_indian_or_alaska_native">
                                    American Indian or Alaska Native<br>
                                    <br>
                                    <input id="asian" type="checkbox" class="chk">
                                    <input value="false" type="hidden" name="asian" class="asian">
                                    Asian<br>
                                    <br>
                                    <input id="black_or_african_american" type="checkbox" class="chk">
                                    <input value="false" type="hidden" name="black_or_african_american" class="black_or_african_american">
                                    Black or African American<br>
                                    <br>
                                    <input id="native_hawaiian" type="checkbox" class="chk">
                                    <input value="false" type="hidden" name="native_hawaiian" class="native_hawaiian">
                                    Native Hawaiian<br>
                                    <br>
                                    <input id="other_pacific_islander" type="checkbox" class="chk">
                                    <input value="false" type="hidden" name="other_pacific_islander" class="other_pacific_islander">
                                    Other Pacific Islander<br>
                                    <br>
                                    <input id="white" type="checkbox" class="chk">
                                    <input value="false" type="hidden" name="white" class="white">
                                    White<br>
                                    <br>
                                    <input id="other" type="checkbox" class="chk">
                                    <input value="false" type="hidden" name="other" class="other">
                                    Other<br>
                                    <br>
                                    <input id="decline_to_answer" type="checkbox" class="chk">
                                    <input value="false" type="hidden" name="decline_to_answer" class="decline_to_answer">
                                    Decline to Answer<br>
                                    <br>
                                </div>
                                <div class="line1"></div>
                                <div class="singRow">
                                    <label><strong>Ethnicity</strong></label>
                                    <br>
                                    <input id="hispanic_or_latino" type="radio" class="chk">
                                    <input value="false" type="hidden" name="hispanic_or_latino" class="hispanic_or_latino">
                                    Hispanic or Latino <br>
                                    <br>
                                    <input id="not_hispanic_or_latino" type="radio" class="chk">
                                    <input value="false" type="hidden" name="not_hispanic_or_latino" class="not_hispanic_or_latino">
                                    Not Hispanic or Latino<br>
                                    <br>
                                    <input id="decline_to_answe" type="radio" class="chk">
                                    <input value="false" type="hidden" name="decline_to_answe" class="decline_to_answe">
                                    Decline to Answer<br>
                                    <br>
                                </div>
                                <div class="line1"></div>
                                <div class="singRow">
                                    <label>Preferred Language</label>
                                    <select name="preferred_language"  placeholder="Country code" class="countryCode txtBox1" type="text">
                                        <option>English</option>
                                    </select>
                                </div>
                                <div class="line1"></div>
                                <div class="singRow">
                                    <label>Zip (Optional) </label>
                                    <input name="zip_optional" type="text" class="pwd txtBox" placeholder="">
                                </div>
                                <div class="singRow"><button class="signBtn" type="submit" style="background:#298DC6; font-size:18px; padding:15px !important; margin:0 10px;">Save</button>
                                    <a class="signBtn" href="#"
                                    style="background:#d75353; font-size:18px; padding:15px !important;">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="f">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix" style="padding:0px 20px;">
                            <div class="singRow">
                                <label><strong>HIPAA Authorization Settings</strong></label>

                                <p>{{Auth::user()->first_name.' '.Auth::user()->last_name}} – Authorized <a href="#" style="color:#C00; float:right;">Revoke</a></p>
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
<style type="text/css" >
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

    ////////////////////////////////////////////////
    $("#american_indian_or_alaska_native").on("click",function(){
     if($('#american_indian_or_alaska_native').prop('checked')) {
       $('.american_indian_or_alaska_native').val("true");
   } else {
       $('.american_indian_or_alaska_native').val("false");
   }
})
    $("#asian").on("click",function(){
     if($('#asian').prop('checked')) {
       $('.asian').val("true");
   } else {
       $('.asian').val("false");
   }
})
    $("#black_or_african_american").on("click",function(){
     if($('#black_or_african_american').prop('checked')) {
       $('.black_or_african_american').val("true");
   } else {
       $('.black_or_african_american').val("false");
   }
})
    $("#native_hawaiian").on("click",function(){
     if($('#native_hawaiian').prop('checked')) {
       $('.native_hawaiian').val("true");
   } else {
       $('.native_hawaiian').val("false");
   }
})
    $("#other_pacific_islander").on("click",function(){
     if($('#other_pacific_islander').prop('checked')) {
       $('.other_pacific_islander').val("true");
   } else {
       $('.other_pacific_islander').val("false");
   }
})
    $("#white").on("click",function(){
     if($('#white').prop('checked')) {
       $('.white').val("true");
   } else {
       $('.white').val("false");
   }
})
    $("#other").on("click",function(){
     if($('#other').prop('checked')) {
       $('.other').val("true");
   } else {
       $('.other').val("false");
   }
})
    $("#decline_to_answer").on("click",function(){
     if($('#decline_to_answer').prop('checked')) {
       $('.decline_to_answer').val("true");
   } else {
       $('.decline_to_answer').val("false");
   }
})
    $("#hispanic_or_latino").on("click",function(){
     if($('#hispanic_or_latino').prop('checked')) {
       $('.hispanic_or_latino').val("true");
   } else {
       $('.hispanic_or_latino').val("false");
   }
})
    $("#not_hispanic_or_latino").on("click",function(){
     if($('#not_hispanic_or_latino').prop('checked')) {
       $('.not_hispanic_or_latino').val("true");
   } else {
       $('.not_hispanic_or_latino').val("false");
   }
})
    $("#decline_to_answe").on("click",function(){
     if($('#decline_to_answe').prop('checked')) {
       $('.decline_to_answe').val("true");
   } else {
       $('.decline_to_answe').val("false");
   }
})
</script>
@endsection