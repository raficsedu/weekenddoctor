@extends('layouts.master')

@section('content')
<section class="bodySec clearfix ">
    <article class="west">
        <div class="container">
            <h1>West Park Medical Group </h1>
            <div class="line1"></div>
            <section class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <br>
                        <a href="#">Book Online</a>
                        <h5>Practice Statement</h5>
                        <p>West Park Medical Group (WPMG) is a group practice specializing in primary care for adults (internal medicine) and primary care for children (pediatrics). All</p>
                        <a href="#" style=" background: none !important; color:#2A8CC4; text-align:left !important; padding:0 !important;">Read More</a>
                        <h5>Location</h5>
                        <p>200 West 57th Street
                            New York, NY 10019 </p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h5>Specialties</h5>
                        <p> Primary Care Doctor<br>
                            Podiatrist<br>
                            Pediatrician<br>
                            Endocrinologist<br>
                            Dermatologist<br>
                            Internist<br>
                        </p>
                        <h5>In-Network Insurances</h5>
                        <p> Beech Street<br>
                            Blue Cross Blue Shield<br>
                            Empire Blue Cross Blue Shield </p>
                        <a href="#" style=" background: none !important; color:#2A8CC4; text-align:left !important; padding:0 !important;">View all</a> </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 clearfix">
                    <div class="mapHome">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3679.1680283080163!2d75.88382761430861!3d22.759144731834596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396302a51a935c4b%3A0x7afe545d74831f01!2sVijay+Nagar+Post+Office!5e0!3m2!1sen!2sin!4v1454604238104" width="100%" height="340" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </section>
        </div>
    </article>
</section>



<section class="bodySec joinUsBody clearfix">
<div class="container">






<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="padding:0 0 10px 0; border-bottom:1px solid #dddddd;">


    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 clearfix">
        <h2>Book an Appointment</h2>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 clearfix">
        <select name="Doctor Specialty" class="txtBox22" placeholder="Doctor Specialty">
            <option>Doctor Specialty</option>

        </select>
        <select name="Reason for your visit" class="txtBox22" placeholder="Reason for your visit">
            <option>Reason for your visit</option>

        </select>
    </div>
    <br><br><br><br>
    <div class="cob">
        <div class="rig-btn">SUN</div>
    </div>
    <div class="cob2">
        <div class="rig-btn">SAT</div>
    </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="padding:0 0 10px 0; border-bottom:1px solid #dddddd;">
    <div class="cob1">
        <div class="box-doc2"> <img src="{{url('public/images/doctor01.png')}}" alt="img" style=" float:left; margin:10px; border:3px solid #dddddd; border-radius:50%; width:100px; height:100px;">
            <h2>Dr. User Name</h2>
            <br>
            <ul class="staring">
                <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="18" height="18"></a></li>
                <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="18" height="18"></a></li>
                <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="18" height="18"></a></li>
                <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="18" height="18"></a></li>
                <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="18" height="18"></a></li>
            </ul>
            <br>
            <br>
            <a href="#">Read reviews</a><br>
            <br>
            <p> <strong style="font-weight:700;">Specialties</strong><br>
                Primary Care Doctor
                Internist </p>
            <br>
            <p> <strong style="font-weight:700;">Location</strong><br>
                200 West 57th Street
                New York, NY 10019 </p>
        </div>
    </div>
    <div class="cob">
        <div class="rig-btn"> 11:00 </div>
        <div class="rig-btn"> 11:00 </div>
        <div class="rig-btn"> 11:00 </div>
        <div class="rig-btn"> 11:00 </div>
    </div>
    <div class="cob2">
        <div class="rig-btn"> 11:00 </div>
        <div class="rig-btn"> 11:00 </div>
        <div class="rig-btn"> 11:00 </div>
        <div class="rig-btn"> 11:00 </div>
    </div>
</div>
<hr class="line">
</div>
</section>
@endsection