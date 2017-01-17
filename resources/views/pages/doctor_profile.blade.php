@extends('layouts.master')

@section('content')
<section class="bodySec joinUsBody clearfix" style="background:#ffffff !important;">
    <div class="container">
        <section class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix " style="padding:0;">
                <div class="wel-box_2">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 ">
                        <?php
                        if(isset($doctor_metas['profile_image']) && $doctor_metas['profile_image']!=''){
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
                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD_H_Q5act_fZ9Y-TdiXp3UkFR113pW08U
                        &q={{$doctor_metas['address']}}" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
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

                    BOOK APPOINTMENT {{date('Y')}}
                    <div style="padding:10px; background:#fff; color:#333333; text-align:center; font-size:18px;">
                        <div id="thumbnail-slider">
                            <div class="inner">
                                <ul>
                                    @for($j = 0;$j < 15;$j++)
                                        <li>
                                            <a class="thumb" href="javascript:void(0)">{{date("j M", strtotime("saturday + ".$j." week"))}}<br>
                                                Saturday
                                                <br>
                                            </a>
                                            <?php
                                                $time_slots = get_doctor_time_slot($doctor_info->id,6,date("Y-m-d", strtotime("saturday + ".$j." week")));
                                                $appointments = get_my_appointments($doctor_info->id,date("Y-m-d", strtotime("saturday + ".$j." week")));
                                                $i = 0;
                                            ?>
                                            @foreach($time_slots as $slot)
                                                <?php
                                                if(in_array($slot, $appointments)){
                                                    continue;
                                                }
                                                $i++;
                                                ?>
                                                <form action="{{url('/book-appointment/'.$doctor_info->id)}}" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="date" value="{{date('Y-m-d', strtotime('saturday + '.$j.' week'))}}">
                                                    <input type="hidden" name="time" value="{{$slot}}">
                                                    <button type="submit" class="schedule_time">{{$slot}}</button>
                                                </form>
                                            @endforeach
                                        </li>
                                    <li>
                                        <a class="thumb" href="javascript:void(0)">{{date("j M", strtotime("sunday + ".$j." week"))}}<br>
                                            Sunday
                                            <br>
                                        </a>
                                        <?php
                                            $time_slots = get_doctor_time_slot($doctor_info->id,7,date("Y-m-d", strtotime("sunday + ".$j." week")));
                                            $appointments = get_my_appointments($doctor_info->id,date("Y-m-d", strtotime("sunday + ".$j." week")));
                                            $i = 0;
                                        ?>
                                        @foreach($time_slots as $slot)
                                        <?php
                                            if(in_array($slot, $appointments)){
                                                continue;
                                            }
                                            $i++;
                                        ?>
                                            <form action="{{url('/book-appointment/'.$doctor_info->id)}}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="date" value="{{date('Y-m-d', strtotime('sunday + '.$j.' week'))}}">
                                                <input type="hidden" name="time" value="{{$slot}}">
                                                <button type="submit" class="schedule_time">{{$slot}}</button>
                                            </form>
                                        @endforeach
                                    </li>
                                    @endfor
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