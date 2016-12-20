@extends('layouts.master')

@section('content')
<section class="bodySec joinUsBody clearfix" style="background:#ffffff !important;">
    <div class="container">
        <section class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix " style="padding:0;">
                <div class="wel-box_2">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 ">
                        <?php
                        if(isset($doctor_metas['profile_image'])){
                            $profile_img = url('public/uploads/doctor/'.$doctor_metas['profile_image']);
                        }else{
                            $profile_img = url('public/images/doctor05.png/');
                        }
                        ?>
                        <div> <img src="{{$profile_img}}" class="profile"/> </div>
                        <h2>{{$doctor_info->first_name." ".$doctor_info->last_name}}</h2>
                        <p>@if(isset($doctor_metas['professional_statement'])){{$doctor_metas['professional_statement']}}@endif</p>
                        <ul class="staring">
                            <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="18" height="18"></a></li>
                            <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="18" height="18"></a></li>
                            <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="18" height="18"></a></li>
                            <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="18" height="18"></a></li>
                            <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="18" height="18"></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 clearfix " style="padding:0;">
                        <input name="SUBMIT" type="button" class="btn1" value="READ PATIENT REVIEW">
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix " style="padding:0;">
                    <div class="mapArea">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3679.1680283080163!2d75.88382761430861!3d22.759144731834596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396302a51a935c4b%3A0x7afe545d74831f01!2sVijay+Nagar+Post+Office!5e0!3m2!1sen!2sin!4v1454604238104" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
        </section>
        <div class="col-lg-12 specialization">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 clearfix " style="padding:0;">
                <div class="timeline">

                    <ul>
                        <li><img src="{{url('public/images/icon1.png')}}" style="float:left; margin-right:20px;"> Specialties <p style="line-height:25px; font-size:14px; margin-left:70px; color:#666;">@if(isset($doctor_metas['speciality'])){{get_specialty($doctor_metas['speciality'])}}@endif</p></li>
                        <li><img src="{{url('public/images/icon2.png')}}" style="float:left; margin-right:20px;"> Languages Spoken <p style="line-height:25px; font-size:14px; margin-left:70px; color:#666;">@if(isset($doctor_metas['language_spoken'])){{$doctor_metas['language_spoken']}}@endif</p></li>
                        <li><img src="{{url('public/images/icon3.png')}}" style="float:left; margin-right:20px;"> Education <p style="line-height:25px; font-size:14px; margin-left:70px; color:#666;">@if(isset($doctor_metas['education'])){{$doctor_metas['education']}}@endif</p></li>
                        <li><img src="{{url('public/images/icon4.png')}}" style="float:left; margin-right:20px;"> Board of Certification <p style="line-height:25px; font-size:14px; margin-left:70px; color:#666;">@if(isset($doctor_metas['board_certification'])){{$doctor_metas['board_certification']}}@endif</p></li>

                        <li><img src="{{url('public/images/icon6.png')}}" style="float:left; margin-right:20px;"> Board of Certification <p style="line-height:25px; font-size:14px; margin-left:70px; color:#666;">@if(isset($doctor_metas['award_and_publications'])){{$doctor_metas['award_and_publications']}}@endif</p></li>



                    </ul>

                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 clearfix " style="padding:0;">
                <div class="calender">

                    BOOK APPOINTMENT 2016
                    <div style="padding:10px; background:#fff; color:#333333; text-align:center; font-size:18px;">
                        <div id="thumbnail-slider">
                            <div class="inner">
                                <ul>

                                    <li>
                                        <a class="thumb" href="#">5 NOV<br>
                                            Saturday
                                            <br>
                                            <span style=" background:#D75353; padding:5px 5px; color:#ffffff;">9:00AM</span></a>
                                    </li>
                                    <li>
                                        <a class="thumb" href="#">6 NOV<br>
                                            Sunday
                                            <br>
                                            <span style=" background:#D75353; padding:5px 5px; color:#ffffff;">9:00AM</span></a>
                                    </li>



                                    <li>
                                        <a class="thumb" href="#">5 NOV<br>
                                            Saturday
                                            <br>
                                            <span style=" background:#D75353; padding:5px 5px; color:#ffffff;">9:00AM</span></a>
                                    </li>
                                    <li>
                                        <a class="thumb" href="#">6 NOV<br>
                                            Sunday
                                            <br>
                                            <span style=" background:#D75353; padding:5px 5px; color:#ffffff;">9:00AM</span></a>
                                    </li>


                                    <li>
                                        <a class="thumb" href="#">5 NOV<br>
                                            Saturday
                                            <br>
                                            <span style=" background:#D75353; padding:5px 5px; color:#ffffff;">9:00AM</span></a>
                                    </li>
                                    <li>
                                        <a class="thumb" href="#">6 NOV<br>
                                            Sunday
                                            <br>
                                            <span style=" background:#D75353; padding:5px 5px; color:#ffffff;">9:00AM</span></a>
                                    </li>


                                    <li>
                                        <a class="thumb" href="#">5 NOV<br>
                                            Saturday
                                            <br>
                                            <span style=" background:#D75353; padding:5px 5px; color:#ffffff;">9:00AM</span></a>
                                    </li>
                                    <li>
                                        <a class="thumb" href="#">6 NOV<br>
                                            Sunday
                                            <br>
                                            <span style=" background:#D75353; padding:5px 5px; color:#ffffff;">9:00AM</span></a>
                                    </li>


                                    <li>
                                        <a class="thumb" href="#">5 NOV<br>
                                            Saturday
                                            <br>
                                            <span style=" background:#D75353; padding:5px 5px; color:#ffffff;">9:00AM</span></a>
                                    </li>
                                    <li>
                                        <a class="thumb" href="#">6 NOV<br>
                                            Sunday
                                            <br>
                                            <span style=" background:#D75353; padding:5px 5px; color:#ffffff;">9:00AM</span></a>
                                    </li>


                                    <li>
                                        <a class="thumb" href="#">5 NOV<br>
                                            Saturday
                                            <br>
                                            <span style=" background:#D75353; padding:5px 5px; color:#ffffff;">9:00AM</span></a>
                                    </li>
                                    <li>
                                        <a class="thumb" href="#">6 NOV<br>
                                            Sunday
                                            <br>
                                            <span style=" background:#D75353; padding:5px 5px; color:#ffffff;">9:00AM</span></a>
                                    </li>



                                </ul>
                            </div>
                        </div>




                    </div>


                </div>

            </div>
        </div>
    </div>

</section>
@endsection