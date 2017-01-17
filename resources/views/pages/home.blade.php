@extends('layouts.master')

@section('content')
<section class="homeBannerBox clearfix">
    <div class="container">
        <section class="row">
            <div class="findDoctr">
                <form action="{{url('/medical-search')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 clearfix">
                        <div class="findDoctrSec">
                            <h2>Find a doctor you love.Get the <br/>
                                care you need.</h2>
                            <div class="findRow clearfix">
                                <label>Get Started</label>
                                <select name="speciality" class="choose">
                                    <option value="">Choose a Speciality</option>
                                    @foreach($specialities as $single)
                                        <option value="{{$single->id}}">{{$single->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="findRow clearfix">
                                <label>Type City / Zip</label>
                                <input type="text" name="city_zip" class="txtBox" placeholder="Enter Zip Code" required="">
                            </div>
                            <div class="findRow clearfix">
                                <label>Who Accept</label>
                                <select name="insurance" class="choose">
                                    <option value="">Choose an Insurance</option>
                                    @foreach($insurances as $single)
                                        <option value="{{$single->id}}">{{$single->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="findRow clearfix"> <button class="findBtn" type="submit">Find a Doctor</button> </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 srchDoctor clearfix"> <img src="{{url('public/images/doct_srch.png')}}" alt=""/> </div>
                </form>
            </div>
        </section>
    </div>
</section>
<section class="bodySec homeBody clearfix">
<article class="teamSec clearfix">

    <div class="container">

        <section class="row">

            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 clearfix">

                <div class="teamInfo">

                    <h1 class="title">Join a Thriving Weekend Medical Community</h1>

                    <h2 class="subHeading">List Your Practice Today<br/>and Drive Weekend Traffic Your Way</h2>

                    <p>Drive new patients to your practice, build your practice and reputation <br/> Share your
                        experience with people seeking doctors on the weekend<br/> and excel in your weekend medical
                        practice.</p>

                    <a href="{{url('/list-your-practice')}}"><button class="providerBtn2">Join Today!</button></a>

                </div>

            </div>

            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 clearfix">

                <div class=""><img src="{{url('public/images/team.png')}}" alt=""/></div>

            </div>

        </section>

    </div>

</article>
<article class="teamSec mobAppSec clearfix">

    <div class="container">

        <section class="row">

            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 clearfix">

                <div class="teamInfo">

                    <h1 class="title">Mobile App Coming soon</h1>

                    <h2 class="subHeading">Access a large variety of WeekendDocs <br/> in your network</h2>

                    <p>WeekendDocs app offers convenience in your pocket<br/> Find doctors available on the
                        Weekends, and explore doctor ratings<br/> Book an appointment with a doctor in no time</p>


                    <div class="featureBox">

                        <h4>Features:</h4>

                        <ul>

                            <li>Access Weekend Doctors Around Your Area Instantly</li>

                            <li>Easily Schedule Appointments</li>

                            <li>Find Doctors Who Accept Your Insurance</li>

                        </ul>

                        <h4>Get the app</h4>

                        <div class="store">

                            <a href="#"><img src="{{url('public/images/appstore.png')}}" alt=""/></a>

                            <a href="#"><img src="{{url('public/images/googleplay.png')}}" alt=""/></a>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 clearfix">

                <div class=""><img src="{{url('public/images/mob_app.png')}}" alt=""/>
                </div>

            </div>

        </section>

    </div>

</article>
<article class="teamSec mobAppSec clearfix">
    <div class="container">
        <section class="row">
            <div class="findBox">
                <form action="{{url('/medical-search')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h1 class=" text-center">find doctor</h1>
                    <aside class="col-lg-4 col-md-4 col-sm-4 col-xs-12 clearfix">
                        <div class="findDoctorBlock">
                            <h5><img src="{{url('public/images/city.png')}}" alt=""/> city</h5>
                            <div class="findRow clearfix">
                                <!--                            <select class="choose">-->
                                <!--                                <option>Select City</option>-->
                                <!--                                <option>Choose a Specialty</option>-->
                                <!--                                <option>Doctor 2</option>-->
                                <!--                            </select>-->
                                <input type="text" name="city_zip" class="choose" placeholder="Enter Zip Code" required="">
                            </div>
                        </div>
                    </aside>
                    <aside class="col-lg-4 col-md-4 col-sm-4 col-xs-12 clearfix">
                        <div class="findDoctorBlock">
                            <h5><img src="{{url('public/images/specility.png')}}" alt=""/> Speciality</h5>
                            <div class="findRow clearfix">
                                <select name="speciality" class="choose">
                                    <option value="">Choose a Speciality</option>
                                    @foreach($specialities as $single)
                                    <option value="{{$single->id}}">{{$single->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </aside>
                    <aside class="col-lg-4 col-md-4 col-sm-4 col-xs-12 clearfix">
                        <div class="findDoctorBlock">
                            <h5><img src="{{url('public/images/insurance.png')}}" alt=""/> Insurance</h5>
                            <div class="findRow clearfix">
                                <select name="insurance" class="choose">
                                    <option value="">Choose an Insurance</option>
                                    @foreach($insurances as $single)
                                    <option value="{{$single->id}}">{{$single->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </aside>
                    <div class="findRow clearfix">
                        <button style="width: 30%;margin-left: 35%;" class="findBtn" type="submit">Find a Doctor</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</article>
<div class="mapHome">
    <iframe
        width="100%"
        height="300"
        frameborder="0" style="border:0"
        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD_H_Q5act_fZ9Y-TdiXp3UkFR113pW08U
    &q=276%205th%20Ave%20%23704%2C%20New%20York%2C%20NY%2010001+(WeekendDocs)&amp;" allowfullscreen>
    </iframe>
</div>
<section class="bodySec clearfix">
    <div class="container">
        <section class="row">
            <div class="specialistSec clearfix">
                <h1>Medical Professionals Around You</h1>
                <article class="specialistRow clearfix">
                    @foreach($doctors as $d)
                        <?php
                            $metas = get_doctor_meta($d->id);
                            if(isset($metas['profile_image']) && $metas['profile_image']!=''){
                                $pro_img_url = url('public/uploads/doctor/'.$metas['profile_image']);
                            }else{
                                $pro_img_url = url('public/images/doctor05.png');
                            }
                        ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 clearfix">
                            <aside class="specialistArea">
                                <div class="specialistPic"><img style="width: 256px;height: 192px;" src="{{$pro_img_url}}" alt=""/></div>
                                <ul class="rating clearfix">
                                    <li><a href="#"><img src="{{url('public/images/star.png')}}" alt=""/></a></li>
                                    <li><a href="#"><img src="{{url('public/images/star.png')}}" alt=""/></a></li>
                                    <li><a href="#"><img src="{{url('public/images/star.png')}}" alt=""/></a></li>
                                    <li><a href="#"><img src="{{url('public/images/star.png')}}" alt=""/></a></li>
                                    <li><a href="#"><img src="{{url('public/images/star.png')}}" alt=""/></a></li>
                                </ul>
                                <h4>{{$d->first_name." ".$d->last_name}}</h4>
                                <h5>@if(isset($metas['doctor_title'])){{$metas['doctor_title']}}@else{{"General"}}@endif</h5>
                                <p>@if(isset($metas['professional_statement'])){{str_limit($metas['professional_statement'], 100)}}@else{{"..............."}}@endif</p>
<!--                                <ul class="socialIcon">-->
<!--                                    <li><a href="#"><img src="{{url('public/images/fb.png')}}" alt=""/></a></li>-->
<!--                                    <li><a href="#"><img src="{{url('public/images/tw.png')}}" alt=""/></a></li>-->
<!--                                    <li><a href="#"><img src="{{url('public/images/in.png')}}" alt=""/></a></li>-->
<!--                                    <li><a href="#"><img src="{{url('public/images/skyp.png')}}" alt=""/></a></li>-->
<!--                                    <li><a href="#"><img src="{{url('public/images/rss.png')}}" alt=""/></a></li>-->
<!--                                </ul>-->
                                <div class="appointment "><a href="{{url('/doctor/'.$d->id)}}">book appointment</a></div>
                            </aside>
                        </div>
                    @endforeach
                </article>
                <div class="text-center"><a href="{{url('/nearby-doctors')}}" class="ViewAll clearfix">View all</a></div>
            </div>
        </section>
    </div>
</section>
<article class="teamSec clearfix"  style="padding:150px 0; background:#f5f5f5;">
    <div class="container">
        <section class="row">
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 clearfix" >
                <div class="teamInfo">
                    <h1 class="title">LOOKING FOR A JOB?</h1>
                    <h2 class="subHeading">WeekendDocs is seeking Health Care professionals in the New York City area.</h2>
                    <a href="#" class="apply_today">Apply Today</a> </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 clearfix">
                <div class=""><img src="{{url('public/images/job.png')}}" alt=""/></div>
            </div>
        </section>
    </div>
</article>
</section>
@endsection