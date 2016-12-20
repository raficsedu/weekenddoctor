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
                    <label>Zip Code</label>
                    <input id="zip" name="zip" type="text" placeholder="Zip Code" class="txtBox2 month">
                     </br></br>
                    <label for="zip" class="error" class="clearfix"></label>
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