@extends('layouts.patient')

@section('content')
<section class="bodySec joinUsBody1 clearfix" style="background:none; padding:20px;">
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
                    <div class="col-md-12 col-lg-12">
                        <section class="bodySec joinUsBody1 clearfix" style="background:#ffffff !important;">
                            <div class="container">
                                <section class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix " style="padding:0;">
                                        <div class="wel-box">
                                            <div class="col-lg-6 col-md-6 col-sm-6 ">
                                                <h2>Welcome, {{$current_user->first_name.' '.$current_user->last_name}}!</h2>
                                                <p>Click below to find a doctor and <br>
                                                    make an appointment instantly. It’s completely free!</p>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 ">
                                                <a href="{{url('')}}" style="background:#D6492E; font-weight:bold; padding:14px 40px; margin:10px 0; border:none; color:#ffffff; float:right;">FIND DOCTORS</a>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                            <div class="container">
                                <section class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="padding:0;">

                                        <div class="col-lg-5 col-md-5 col-sm-12 wel-box_1 ">
                                            <h4 style="font-weight:bold; border-bottom:1px solid #dddddd; padding:0px 0 20px 0;">Your Well Guide<a href="#"><img src="{{url('public/images/ic_222.png')}}" alt="quection" style="float:right;"></a></h4>
                                            <div class="circle1">5 of 5
                                            </div>
                                            <ul>

                                                <li><i class="fa fa-check" aria-hidden="true"></i>
                                                    Visoon Exam</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>  &nbsp;
                                                    Skin Screening</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i> &nbsp;
                                                    Annual Physical</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i> &nbsp;
                                                    Dental Cleaning</li>
                                                <li><span><i class="fa fa-check" aria-hidden="true">

                                                </i> &nbsp;SIgn Up Weekend Doc</span></li>

                                            </ul>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 "></div>

                                        <div class="col-lg-5 col-md-5 col-sm-12 wel-box_1" style="height: 273px;overflow-y: scroll;">
                                            <img src="{{url('public/images/ic_11.png')}}" alt="waitch" style="float:left;">
                                            @if(sizeof($appointments) > 0)
                                                <span style=" line-height:50px;">{{sizeof($appointments)}} Upcoming Appointments</span>
                                                @foreach($appointments as $ap)
                                                    <?php
                                                    $doctor = get_doctor_info($ap->doctor_id);
                                                    if(isset($doctor['metas']['profile_image']) && $doctor['metas']['profile_image']!=''){
                                                        $img_url = url('public/uploads/doctor/'.$doctor['metas']['profile_image']);
                                                    }else{
                                                        $img_url = url('public/images/doctor05.png');
                                                    }
                                                    ?>
                                                    <div class="upcoming_appointments">
                                                        <div class="ua_img">
                                                            <img src="{{$img_url}}">
                                                        </div>
                                                        <div class="ua_details">
                                                            <h3 class="ua_doctor_title">{{$doctor['doctor']->first_name." ".$doctor['doctor']->last_name}}</h3>
                                                            <span class="ua_info" style="font-weight: bold;">@if($doctor['metas']['speciality']){{get_specialty($doctor['metas']['speciality'])}}@endif</span>
                                                            <span class="ua_info">Date : {{us_date_format($ap->appointment_date)}}</span>
                                                            <span class="ua_info">Time : {{$ap->appointment_time}}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <span style=" line-height:50px;">No Upcoming Appointments</span>
                                            @endif
                                        </div>
                                    </div>
                                </section>
                                <section class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="padding:0;">
                                        <div class="col-lg-5 col-md-5 col-sm-12 wel-box_1 ">
                                            <h4 style="font-weight:bold; border-bottom:1px solid #dddddd; padding:0px 0 20px 0;"><strong>Book a Primary Care Physician</strong></h4><br>
                                            <img src="{{url('public/images/img-plus.png')}}" alt="Image" style="float:left; margin-right:15px;">
                                            <p><strong> Need a doctor? Book an appointment now and add a physician to your team.</strong></p><br><br><br>
                                            <a href="{{url('/patient/medical-search/26')}}" style="padding:8px 30px; color: #ffffff; background:#2A8CC4;"><strong>SEARCH</strong></a>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 "></div>

                                        <div class="col-lg-5 col-md-5 col-sm-12 wel-box_1 ">
                                            <h4><strong>Book a Dentist</strong></h4><br>
                                            <img src="{{url('public/images/img-plus.png')}}" alt="Image" style="float:left; margin-right:15px;">
                                            <p><strong>Find a nearby dentist and schedule a cleaning in seconds!</strong></p><br><br><br>
                                            <a href="{{url('/patient/medical-search/4')}}" style="padding:8px 30px; color: #ffffff; background:#2A8CC4;"><strong>SEARCH</strong></a>
                                        </div>
                                    </div>
                                </section>
                                <section class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="padding:0;">
                                        <div class="col-lg-5 col-md-5 col-sm-12 wel-box_1 ">
                                            <h4><strong>Book a Dermatologist</strong></h4><br>
                                            <img src="{{url('public/images/img-plus.png')}}" alt="Image" style="float:left; margin-right:15px;">
                                            <p><strong>Want to see a skin care specialist? Click here to make an appointment.</strong></p><br><br><br>
                                            <a href="{{url('/patient/medical-search/5')}}" style="padding:8px 30px; color: #ffffff; background:#2A8CC4;"><strong>SEARCH</strong></a>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 "></div>

                                        <div class="col-lg-5 col-md-5 col-sm-12 wel-box_1 ">
                                            <form action="{{url('/patient/medical-search')}}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="p" value="{{$patient_id}}">
                                                <h4><strong>Book an Appointment</strong></h4><br>
                                                <p>
                                                    <select name="cat_id" placeholder="Select a Specialty" class="countryCode txtBox_new" type="text" style="width:100%;">
                                                        <option value="0">Select Speciality</option>
                                                        @foreach($specialties as $specialty)
                                                            <option value="{{$specialty->id}}">{{$specialty->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </p>
                                                <br><br><br>
                                                <input type="submit" value="SEARCH" style="padding:8px 30px; color: #ffffff; background:#2A8CC4;">
                                            </form>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
@endsection
@section('footer_custom_script')

@endsection