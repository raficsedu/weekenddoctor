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
<article class="breadCrmBox clearfix">
    <div class="container">
        <section class="row">
            <ul class="breadCrmList">
                <li><a href="index.html">Home ></a></li>
                <li><a href="#" class="breadCrmActive">Book Your Appointment</a></li>
            </ul>
        </section>
    </div>
</article>

<section class="bodySec joinUsBody clearfix" style=" background:#ffffff !important;">
    <div class="container">
        <section class="row">
            <h1>Book Your Appointment </h1>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 clearfix" style="padding:0;">
                <div class="singBody">
                    <form>
                        <div class="singRow"><label>Will tou use insurance?</label>

                            <select placeholder="Country code" class="countryCode txtBox" type="text">
                                <option>I’m paying for myself</option>
                                <option>I’m paying for myself</option>
                            </select>

                        </div>

                        <div class="singRow"><label>What's the reason for your visit?</label>

                            <select placeholder="Country code" class="countryCode txtBox" type="text">
                                <option>Illness</option>
                                <option>Illness</option>
                            </select>

                        </div>



                        <div class="singRow"><label>Have you visited this doctor befour?</label>
                            <input name="" type="radio" value="" checked>&nbsp; &nbsp; I,m a new  patient.<br><br>
                            <input name="" type="radio" value="">&nbsp; &nbsp; i’ve seen this doctor befour.<br><br>

                        </div>
                        <div class="line1"></div>

                        <div class="singRow"><label>Appointment Time</label>
                            <h4 style="color:#2176a6; float:left;"> Sunday, March, 19-10.00 AM</h4><br><br>
                        </div>


                        <div class="singRow">
                            <a class="signBtn" href="#" style=" background:#2176a6 !important;">Continue</a>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 clearfix">

                <div class="box-doc1">
                    <h3>Book a Primary Care Physician</h3>

                    <hr class="line">
                    <img src="{{url('public/images/doctor01.png')}}" alt="img" style=" float:left; margin:10px; border:3px solid #dddddd; border-radius:50%; width:100px; height:100px;">

                    <h2>Dr. Muntasir Rahman</h2>
                    <br>

                    <ul class="staring">
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>

                    </ul>
                    <br><br>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting the 1500s, </p>
                </div>


            </div>
        </section>
    </div>
</section>
@endsection