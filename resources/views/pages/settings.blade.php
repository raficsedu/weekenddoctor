@extends('layouts.master')

@section('content')
<section class="bodySec joinUsBody clearfix" style="background:none; padding:20px;">
<div class="container">
<section class="row">
<h1>Settings</h1>

<div class="line1"></div>
<!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="padding:0px;">
              <div class="singBody">
                  <form>


                       <div class="singRow clearfix">
                       <div class="box-in">

                           <label class="clearfix">First Name</label>
                          <input type="text" placeholder="First Name" class="txtBox2 month">
                       </div>

                        <div class="box-in">

                           <label class="clearfix">Last Name</label>
                          <input type="text" placeholder="Last Name" class="txtBox2 month">
                       </div>

                        <div class="box-in">

                           <label class="clearfix">Your Specialty</label>
                      <select class="countryCode txtBox2" type="text">
                                    <option>Select Your Specialty</option>
                                  <option>Select Your Specialty</option>
                           </select>
                       </div>





                        <div class="box-in1">

                           <label class="clearfix">Your Direct Phone Number</label>
                          <input type="text" placeholder="Your Direct Phone Number" class="txtBox2 month">
                       </div>

                        <div class="box-in1">

                           <label class="clearfix">Zip Code</label>
                          <input type="text" placeholder="Zip Code" class="txtBox2 month">
                       </div>
                       <br>
                       <br>


                        <div class="box-in1">

                           <label class="clearfix">Your Email</label>
                          <input type="text" placeholder="Your Email" class="txtBox2 month">
                       </div>
                       <br>
                       <br>
                        </div>



                       <div class="singRow">
                           <a class="signBtn" href="#" style="background:#298DC6;">Get Started</a>
                       </div>

                  </form>
              </div>
          </div>-->

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
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix" style="padding:0px 20px;">
            <div class="singBody">
                <form>
                    <div class="singRow1">
                        <label>Name</label>
                        <br>

                        <p style="color:#575757; margin-top:10px;">Ankit Sethiya - Please call us at (855) 962-3621 to
                            change your name.</p>
                    </div>
                    <div class="line1"></div>
                    <div class="singRow">
                        <label>Email</label>
                        <input type="text" class="pwd txtBox" placeholder="ankit.003.sethiya@gmail.com">
                    </div>
                    <div class="line1"></div>
                    <div class="singRow clearfix">
                        <input type="text" placeholder="Cell" class="txtBox month">
                        <input type="text" placeholder="Home" class="txtBox date">
                        <input type="text" placeholder="Work" class="txtBox year">
                    </div>
                    <div class="line1"></div>
                    <div class="singRow">
                        <label>Preferred Number </label>
                        <select placeholder="Country code" class="countryCode txtBox1" type="text">
                            <option>Cell</option>
                            <option>Home</option>
                        </select>
                    </div>
                    <div class="line1"></div>
                    <div class="singRow">
                        <label>Sex</label>
                        <select placeholder="Country code" class="countryCode txtBox1" type="text">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="line1"></div>
                    <div class="singRow clearfix">
                        <label>Date of Birth</label>
                        <input type="text" placeholder="03" class="txtBox month">
                        <input type="text" placeholder="05" class="txtBox date">
                        <input type="text" placeholder="1989" class="txtBox year">
                    </div>
                    <div class="line1"></div>
                    <div class="singRow"><a class="signBtn" href="#"
                                            style="background:#298DC6; font-size:18px; padding:15px !important; margin:0 10px;">Save</a>
                        <a class="signBtn" href="#"
                           style="background:#d75353; font-size:18px; padding:15px !important;">Cancel</a> <a
                            class="signBtn" href="#"
                            style="background:none; color:#D75353; float:right; font-size:16px;">Dactivate Account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="b">
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix" style="padding:0px 20px;">
            <div class="singBody">
                <form>
                    <div class="singRow">
                        <label>Enter your current password </label>
                        <input type="text" class="pwd txtBox" placeholder="Current Password">
                        <br>
                        <br>
                        <label>Choose a Password </label>
                        <input type="text" class="pwd txtBox" placeholder="Current Password">
                        <br>
                        <br>
                        <label>Confirm your Password </label>
                        <input type="text" class="pwd txtBox" placeholder="Current Password">
                    </div>
                    <div class="line1"></div>
                    <div class="singRow"><a class="signBtn" href="#"
                                            style="background:#298DC6; font-size:18px; padding:15px !important; margin:0 10px;">Save</a>
                        <a class="signBtn" href="#"
                           style="background:#d75353; font-size:18px; padding:15px !important;">Cancel</a></div>
                </form>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="c">
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix" style="padding:0px 20px;">
            <div class="singRow">
                <label><strong>Emails</strong></label>
                <br>
                <input type="checkbox" class="chk">
                Wellness reminders
            </div>
            <div class="line1"></div>
            <div class="singRow">
                <label><strong>App Settings</strong></label>
                <br>
                <input type="checkbox" class="chk">
                Push notify appointment reminders <br>
                <br>
                <input type="checkbox" class="chk">
                Push notify if appointment is rescheduled or cancelled <br>
                <br>
                <input type="checkbox" class="chk">
                Push notify wellness reminders <br>
                <br>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="d">
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix" style="padding:0px 20px;">
            <div class="singBody">
                <form>
                    <div class="singRow">
                        <label>Medical Insurance </label>
                        <select placeholder="Country code" class="countryCode txtBox1" type="text">
                            <option>Select</option>
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
                           style="background:#d75353; font-size:18px; padding:15px !important;">Cancel</a></div>
                </form>
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