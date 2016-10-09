@extends('layouts.master')

@section('content')
<section class="searchBannerBox clearfix">
    <div class="container">
        <section class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 clearfix">
                <div class="srhDoctBox">
                    <h2>Book Your Appointment </h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 srchDoctorPic clearfix">
                <img src="{{url('public/images/img05.png')}}" alt=""/>
            </div>
        </section>
    </div>
</section>

<section class="bodySec joinUsBody clearfix" style=" background:#ffffff !important;">
    <div class="container">
        <section class="row">
            <h1>Book Your Appointment </h1>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 clearfix" style="padding:0;">
                <div class="singBody">
                    <form action="{{url('/confirm-booking')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="date" value="{{$date}}">
                        <input type="hidden" name="time" value="{{$time}}">
                        <input type="hidden" name="doctor_id" value="{{$doctor->id}}">
                        <div class="singRow"><label>Will you use insurance?</label>

                            <select name="insurance" placeholder="Country code" class="countryCode txtBox" type="text">
                                <option value="0">I’m paying for myself</option>
                                @foreach($insurances as $insurance)
                                <div class="col-md-4">
                                    <option value="{{$insurance->id}}">{{$insurance->name}}</option>
                                </div>
                                @endforeach
                            </select>

                        </div>

                        <div class="singRow"><label>What's the reason for your visit?</label>

                            <select placeholder="Country code" name="reason" class="countryCode txtBox" type="text">
                                <option value="Bad breath/Halitosis">Bad breath/Halitosis</option>
                                <option value="Braces / Invisalign Removal">Braces / Invisalign Removal</option>
                                <option value="Braces Consultation">Braces Consultation</option>
                                <option value="Bridge">Bridge</option>
                                <option value="Broken Tooth">Broken Tooth</option>
                                <option value="Crown">Crown</option>
                                <option value="Dental Cleaning">Dental Cleaning</option>
                                <option value="Dental Cleaning / Preventive Visit">Dental Cleaning / Preventive Visit</option>
                                <option value="Dental Consultation">Dental Consultation</option>
                                <option value="Dental Emergency">Dental Emergency</option>
                                <option value="Dental Follow Up">Dental Follow Up</option>
                                <option value="Dentures">Dentures</option>
                                <option value="Filling">Filling</option>
                                <option value="Gum Surgery">Gum Surgery</option>
                                <option value="Implant(s)">Implant(s)</option>
                                <option value="Invisible Braces Consultation">Invisible Braces Consultation</option>
                                <option value="Laser Dental Treatment">Laser Dental Treatment</option>
                                <option value="Lumineers">Lumineers</option>
                                <option value="Mouthguard">Mouthguard</option>
                                <option value="New Patient Exam (Adult)">New Patient Exam (Adult)</option>
                                <option value="New Patient Exam (Child)">New Patient Exam (Child)</option>
                                <option value="Retainer Checkup">Retainer Checkup</option>
                                <option value="Retainer Installation">Retainer Installation</option>
                                <option value="Root Canal">Root Canal</option>
                                <option value="Sealant">Sealant</option>
                                <option value="Sleep Apnea / Snoring Device">Sleep Apnea / Snoring Device</option>
                                <option value="Teeth Whitening">Teeth Whitening</option>
                                <option value="TMJ (Temporo-Mandibular Joint) Pain">TMJ (Temporo-Mandibular Joint) Pain</option>
                                <option value="Tooth Extraction">Tooth Extraction</option>
                                <option value="Veneer(s)">Veneer(s)</option>
                                <option value="Wisdom Tooth Problem">Wisdom Tooth Problem</option>
                            </select>

                        </div>



                        <div class="singRow"><label>Have you visited this doctor befour?</label>
                            <input name="patient_type" type="radio" value="1" checked>&nbsp; &nbsp; I,m a new  patient.<br><br>
                            <input name="patient_type" type="radio" value="0">&nbsp; &nbsp; I've seen this doctor before.<br><br>

                        </div>
                        <div class="line1"></div>

                        <div class="singRow"><label>Appointment Time</label>
                            <h4 style="color:#2176a6; float:left;">{{date('l jS \of F Y, ',strtotime($date)).' '.$time}}</h4><br><br>
                        </div>


                        <div class="singRow">
                            <button type="submit" class="signBtn" style=" background:#2176a6 !important;">Continue</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 clearfix">

                <div class="box-doc1">
                    <h3>Book a {{$metas['doctor_title']}}</h3>
                    <?php
                    if(isset($metas['profile_image'])){
                        $img_url = url('public/uploads/doctor/'.$metas['profile_image']);
                    }else{
                        $img_url = url('public/images/doctor05.png');
                    }
                    ?>
                    <hr class="line">
                    <img src="{{$img_url}}" alt="img" style=" float:left; margin:10px; border:3px solid #dddddd; border-radius:50%; width:100px; height:100px;">

                    <h2>{{$doctor->first_name.' '.$doctor->last_name}}</h2>
                    <br>

                    <ul class="staring">
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>

                    </ul>
                    <br><br>
                    <p>{{str_limit($metas['professional_statement'], 70)}}</p>
                </div>


            </div>
        </section>
    </div>
</section>
@endsection