@extends('layouts.master')

@section('content')
<section class="bodySec joinUsBody clearfix">
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix"
             style="padding:0 0 10px 0; border-bottom:1px solid #dddddd;">


            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 clearfix">
                <h2>Book an Appointment</h2>
            </div>
            <br><br><br><br>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 clearfix customization1">
                <div class="cob">
                    <div class="rig-btn"><?php echo date("l", strtotime("sunday"));echo "<br>";echo date("j M", strtotime("sunday"));?></div>
                </div>
                <div class="cob2 customization2">
                    <div class="rig-btn"><?php echo date("l", strtotime("saturday"));echo "<br>";echo date("j M", strtotime("saturday"));?></div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <?php $cnt = 0;?>
            @foreach($doctors as $doctor)
            <?php
            $metas = get_doctor_meta($doctor->id);
            if(isset($metas['profile_image'])){
                $img_url = url('public/uploads/doctor/'.$metas['profile_image']);
            }else{
                $img_url = url('public/images/doctor05.png');
            }
            if(isset($metas['insurance'])){
                $insurancess = explode(',',$metas['insurance']);
            }else{
                $insurancess = array();
            }
            ?>
            @if($speciality!='' && $insurance!='')
                @if($metas['speciality']==$speciality && in_array($insurance,$insurancess))
                    <?php $cnt++;?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="padding:0 0 10px 0; border-bottom:1px solid #dddddd;">
                        <div class="cob1">
                            <div class="box-doc2">
                                <a href="{{url('/doctor/'.$doctor->id)}}"><img src="{{$img_url}}" alt="img"
                                     style=" float:left; margin:10px; border:3px solid #dddddd; border-radius:50%; width:100px; height:100px;"></a>

                                <a href="{{url('/doctor/'.$doctor->id)}}"><h2>Dr. {{$doctor->first_name." ".$doctor->last_name}}</h2></a>
                                <br>
                                <ul class="staring">
                                    <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt=""
                                                                                                          src="{{url('public/images/yellow_star.png')}}"
                                                                                                          width="18"
                                                                                                          height="18"></a></li>
                                    <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt=""
                                                                                                          src="{{url('public/images/yellow_star.png')}}"
                                                                                                          width="18"
                                                                                                          height="18"></a></li>
                                    <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt=""
                                                                                                          src="{{url('public/images/yellow_star.png')}}"
                                                                                                          width="18"
                                                                                                          height="18"></a></li>
                                    <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt=""
                                                                                                          src="{{url('public/images/yellow_star.png')}}"
                                                                                                          width="18"
                                                                                                          height="18"></a></li>
                                    <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt=""
                                                                                                          src="{{url('public/images/yellow_star.png')}}"
                                                                                                          width="18"
                                                                                                          height="18"></a></li>
                                </ul>
                                <br>
                                <br>
                                <a href="#">Read reviews</a><br>
                                <br>
                                <p>@if(isset($metas['doctor_title'])){{$metas['doctor_title']}}@endif</p>
                                <br>
                                <p>@if(isset($metas['doctor_office_address'])){{$metas['doctor_office_address']}}@endif</p>
                            </div>
                        </div>
                        <div class="cob">
                            <?php
                            $time_slots = get_doctor_time_slot($doctor->id,7,date("Y-m-d", strtotime("sunday")));
                            $appointments = get_my_appointments($doctor->id,date("Y-m-d", strtotime("sunday")));
                            $i = 0;
                            ?>
                            @foreach($time_slots as $slot)
                                <?php
                                if(in_array($slot, $appointments)){
                                    continue;
                                }
                                $i++;
                                ?>
                                <form action="{{url('/book-appointment/'.$doctor->id)}}" method="post" class="@if($i>=5){{'hide_me '.$doctor->id}}@endif">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="date" value="{{date("Y-m-d", strtotime("sunday"))}}">
                                    <input type="hidden" name="time" value="{{$slot}}">
                                    <button type="submit" class="rig-btn">{{$slot}}</button>
                                </form>
                                @if($i==5)
                                    <form class="remove-{{$doctor->id}}">
                                        <button doctor-id="{{$doctor->id}}" class="rig-btn see_more {{$doctor->id}}">more</button>
                                    </form>
                                @endif
                            @endforeach
                        </div>
                        <div class="cob2">
                            <?php
                            $time_slots = get_doctor_time_slot($doctor->id,7,date("Y-m-d", strtotime("saturday")));
                            $appointments = get_my_appointments($doctor->id,date("Y-m-d", strtotime("saturday")));
                            $i = 0;
                            ?>
                            @foreach($time_slots as $slot)
                                <?php
                                if(in_array($slot, $appointments)){
                                    continue;
                                }
                                $i++;
                                ?>
                                <form action="{{url('/book-appointment/'.$doctor->id)}}" method="post" class="@if($i>=5){{'hide_me '.$doctor->id}}@endif">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="date" value="{{date("Y-m-d", strtotime("saturday"))}}">
                                    <input type="hidden" name="time" value="{{$slot}}">
                                    <button type="submit" class="rig-btn">{{$slot}}</button>
                                </form>
                                @if($i==5)
                                    <form class="remove-{{$doctor->id}}">
                                        <button doctor-id="{{$doctor->id}}" class="rig-btn see_more {{$doctor->id}}">more</button>
                                    </form>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @elseif($speciality!='')
                @if($metas['speciality']==$speciality)
                    <?php $cnt++;?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="padding:0 0 10px 0; border-bottom:1px solid #dddddd;">
                        <div class="cob1">
                            <div class="box-doc2">
                                <a href="{{url('/doctor/'.$doctor->id)}}"><img src="{{$img_url}}" alt="img"
                                     style=" float:left; margin:10px; border:3px solid #dddddd; border-radius:50%; width:100px; height:100px;"></a>

                                <a href="{{url('/doctor/'.$doctor->id)}}"><h2>Dr. {{$doctor->first_name." ".$doctor->last_name}}</h2></a>
                                <br>
                                <ul class="staring">
                                    <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt=""
                                                                                                          src="{{url('public/images/yellow_star.png')}}"
                                                                                                          width="18"
                                                                                                          height="18"></a></li>
                                    <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt=""
                                                                                                          src="{{url('public/images/yellow_star.png')}}"
                                                                                                          width="18"
                                                                                                          height="18"></a></li>
                                    <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt=""
                                                                                                          src="{{url('public/images/yellow_star.png')}}"
                                                                                                          width="18"
                                                                                                          height="18"></a></li>
                                    <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt=""
                                                                                                          src="{{url('public/images/yellow_star.png')}}"
                                                                                                          width="18"
                                                                                                          height="18"></a></li>
                                    <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt=""
                                                                                                          src="{{url('public/images/yellow_star.png')}}"
                                                                                                          width="18"
                                                                                                          height="18"></a></li>
                                </ul>
                                <br>
                                <br>
                                <a href="#">Read reviews</a><br>
                                <br>
                                <p>@if(isset($metas['doctor_title'])){{$metas['doctor_title']}}@endif</p>
                                <br>
                                <p>@if(isset($metas['doctor_office_address'])){{$metas['doctor_office_address']}}@endif</p>
                            </div>
                        </div>
                        <div class="cob">
                            <?php
                            $time_slots = get_doctor_time_slot($doctor->id,7,date("Y-m-d", strtotime("sunday")));
                            $appointments = get_my_appointments($doctor->id,date("Y-m-d", strtotime("sunday")));
                            $i = 0;
                            ?>
                            @foreach($time_slots as $slot)
                                <?php
                                if(in_array($slot, $appointments)){
                                    continue;
                                }
                                $i++;
                                ?>
                                <form action="{{url('/book-appointment/'.$doctor->id)}}" method="post" class="@if($i>=5){{'hide_me '.$doctor->id}}@endif">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="date" value="{{date("Y-m-d", strtotime("sunday"))}}">
                                    <input type="hidden" name="time" value="{{$slot}}">
                                    <button type="submit" class="rig-btn">{{$slot}}</button>
                                </form>
                                @if($i==5)
                                    <form class="remove-{{$doctor->id}}">
                                        <button doctor-id="{{$doctor->id}}" class="rig-btn see_more {{$doctor->id}}">more</button>
                                    </form>
                                @endif
                            @endforeach
                        </div>
                        <div class="cob2">
                            <?php
                            $time_slots = get_doctor_time_slot($doctor->id,7,date("Y-m-d", strtotime("saturday")));
                            $appointments = get_my_appointments($doctor->id,date("Y-m-d", strtotime("saturday")));
                            $i = 0;
                            ?>
                            @foreach($time_slots as $slot)
                                <?php
                                if(in_array($slot, $appointments)){
                                    continue;
                                }
                                $i++;
                                ?>
                                <form action="{{url('/book-appointment/'.$doctor->id)}}" method="post" class="@if($i>=5){{'hide_me '.$doctor->id}}@endif">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="date" value="{{date("Y-m-d", strtotime("saturday"))}}">
                                    <input type="hidden" name="time" value="{{$slot}}">
                                    <button type="submit" class="rig-btn">{{$slot}}</button>
                                </form>
                                @if($i==5)
                                    <form class="remove-{{$doctor->id}}">
                                        <button doctor-id="{{$doctor->id}}" class="rig-btn see_more {{$doctor->id}}">more</button>
                                    </form>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @elseif($insurance!='')
                @if(in_array($insurance,$insurancess))
                    <?php $cnt++;?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="padding:0 0 10px 0; border-bottom:1px solid #dddddd;">
                        <div class="cob1">
                            <div class="box-doc2">
                                <a href="{{url('/doctor/'.$doctor->id)}}"><img src="{{$img_url}}" alt="img"
                                     style=" float:left; margin:10px; border:3px solid #dddddd; border-radius:50%; width:100px; height:100px;"></a>

                                <a href="{{url('/doctor/'.$doctor->id)}}"><h2>Dr. {{$doctor->first_name." ".$doctor->last_name}}</h2></a>
                                <br>
                                <ul class="staring">
                                    <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt=""
                                                                                                          src="{{url('public/images/yellow_star.png')}}"
                                                                                                          width="18"
                                                                                                          height="18"></a></li>
                                    <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt=""
                                                                                                          src="{{url('public/images/yellow_star.png')}}"
                                                                                                          width="18"
                                                                                                          height="18"></a></li>
                                    <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt=""
                                                                                                          src="{{url('public/images/yellow_star.png')}}"
                                                                                                          width="18"
                                                                                                          height="18"></a></li>
                                    <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt=""
                                                                                                          src="{{url('public/images/yellow_star.png')}}"
                                                                                                          width="18"
                                                                                                          height="18"></a></li>
                                    <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt=""
                                                                                                          src="{{url('public/images/yellow_star.png')}}"
                                                                                                          width="18"
                                                                                                          height="18"></a></li>
                                </ul>
                                <br>
                                <br>
                                <a href="#">Read reviews</a><br>
                                <br>
                                <p>@if(isset($metas['doctor_title'])){{$metas['doctor_title']}}@endif</p>
                                <br>
                                <p>@if(isset($metas['doctor_office_address'])){{$metas['doctor_office_address']}}@endif</p>
                            </div>
                        </div>
                        <div class="cob">
                            <?php
                            $time_slots = get_doctor_time_slot($doctor->id,7,date("Y-m-d", strtotime("sunday")));
                            $appointments = get_my_appointments($doctor->id,date("Y-m-d", strtotime("sunday")));
                            $i = 0;
                            ?>
                            @foreach($time_slots as $slot)
                                <?php
                                if(in_array($slot, $appointments)){
                                    continue;
                                }
                                $i++;
                                ?>
                                <form action="{{url('/book-appointment/'.$doctor->id)}}" method="post" class="@if($i>=5){{'hide_me '.$doctor->id}}@endif">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="date" value="{{date("Y-m-d", strtotime("sunday"))}}">
                                    <input type="hidden" name="time" value="{{$slot}}">
                                    <button type="submit" class="rig-btn">{{$slot}}</button>
                                </form>
                                @if($i==5)
                                    <form class="remove-{{$doctor->id}}">
                                        <button doctor-id="{{$doctor->id}}" class="rig-btn see_more {{$doctor->id}}">more</button>
                                    </form>
                                @endif
                            @endforeach
                        </div>
                        <div class="cob2">
                            <?php
                            $time_slots = get_doctor_time_slot($doctor->id,7,date("Y-m-d", strtotime("saturday")));
                            $appointments = get_my_appointments($doctor->id,date("Y-m-d", strtotime("saturday")));
                            $i = 0;
                            ?>
                            @foreach($time_slots as $slot)
                                <?php
                                if(in_array($slot, $appointments)){
                                    continue;
                                }
                                $i++;
                                ?>
                                <form action="{{url('/book-appointment/'.$doctor->id)}}" method="post" class="@if($i>=5){{'hide_me '.$doctor->id}}@endif">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="date" value="{{date("Y-m-d", strtotime("saturday"))}}">
                                    <input type="hidden" name="time" value="{{$slot}}">
                                    <button type="submit" class="rig-btn">{{$slot}}</button>
                                </form>
                                @if($i==5)
                                    <form class="remove-{{$doctor->id}}">
                                        <button doctor-id="{{$doctor->id}}" class="rig-btn see_more {{$doctor->id}}">more</button>
                                    </form>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @else
                <?php $cnt++;?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="padding:0 0 10px 0; border-bottom:1px solid #dddddd;">
                    <div class="cob1">
                        <div class="box-doc2">
                            <a href="{{url('/doctor/'.$doctor->id)}}"><img src="{{$img_url}}" alt="img"
                                 style=" float:left; margin:10px; border:3px solid #dddddd; border-radius:50%; width:100px; height:100px;"></a>

                            <a href="{{url('/doctor/'.$doctor->id)}}"><h2>Dr. {{$doctor->first_name." ".$doctor->last_name}}</h2></a>
                            <br>
                            <ul class="staring">
                                <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt=""
                                                                                                      src="{{url('public/images/yellow_star.png')}}"
                                                                                                      width="18"
                                                                                                      height="18"></a></li>
                                <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt=""
                                                                                                      src="{{url('public/images/yellow_star.png')}}"
                                                                                                      width="18"
                                                                                                      height="18"></a></li>
                                <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt=""
                                                                                                      src="{{url('public/images/yellow_star.png')}}"
                                                                                                      width="18"
                                                                                                      height="18"></a></li>
                                <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt=""
                                                                                                      src="{{url('public/images/yellow_star.png')}}"
                                                                                                      width="18"
                                                                                                      height="18"></a></li>
                                <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt=""
                                                                                                      src="{{url('public/images/yellow_star.png')}}"
                                                                                                      width="18"
                                                                                                      height="18"></a></li>
                            </ul>
                            <br>
                            <br>
                            <a href="#">Read reviews</a><br>
                            <br>
                            <p>@if(isset($metas['doctor_title'])){{$metas['doctor_title']}}@endif</p>
                            <br>
                            <p>@if(isset($metas['doctor_office_address'])){{$metas['doctor_office_address']}}@endif</p>
                        </div>
                    </div>
                    <div class="cob">
                        <?php
                        $time_slots = get_doctor_time_slot($doctor->id,7,date("Y-m-d", strtotime("sunday")));
                        $appointments = get_my_appointments($doctor->id,date("Y-m-d", strtotime("sunday")));
                        $i = 0;
                        ?>
                        @foreach($time_slots as $slot)
                            <?php
                            if(in_array($slot, $appointments)){
                                continue;
                            }
                            $i++;
                            ?>
                            <form action="{{url('/book-appointment/'.$doctor->id)}}" method="post" class="@if($i>=5){{'hide_me '.$doctor->id}}@endif">
                                {{ csrf_field() }}
                                <input type="hidden" name="date" value="{{date("Y-m-d", strtotime("sunday"))}}">
                                <input type="hidden" name="time" value="{{$slot}}">
                                <button type="submit" class="rig-btn">{{$slot}}</button>
                            </form>
                            @if($i==5)
                                <form class="remove-{{$doctor->id}}">
                                    <button doctor-id="{{$doctor->id}}" class="rig-btn see_more {{$doctor->id}}">more</button>
                                </form>
                            @endif
                        @endforeach
                    </div>
                    <div class="cob2">
                        <?php
                        $time_slots = get_doctor_time_slot($doctor->id,7,date("Y-m-d", strtotime("saturday")));
                        $appointments = get_my_appointments($doctor->id,date("Y-m-d", strtotime("saturday")));
                        $i = 0;
                        ?>
                        @foreach($time_slots as $slot)
                            <?php
                            if(in_array($slot, $appointments)){
                                continue;
                            }
                            $i++;
                            ?>
                            <form action="{{url('/book-appointment/'.$doctor->id)}}" method="post" class="@if($i>=5){{'hide_me '.$doctor->id}}@endif">
                                {{ csrf_field() }}
                                <input type="hidden" name="date" value="{{date("Y-m-d", strtotime("saturday"))}}">
                                <input type="hidden" name="time" value="{{$slot}}">
                                <button type="submit" class="rig-btn">{{$slot}}</button>
                            </form>
                            @if($i==5)
                                <form class="remove-{{$doctor->id}}">
                                    <button doctor-id="{{$doctor->id}}" class="rig-btn see_more {{$doctor->id}}">more</button>
                                </form>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
            @endforeach

            @if($cnt==0)
            <div class="alert alert-warning" role="alert">
                <strong>Sorry !</strong> There is no doctor found your match .
            </div>
            @endif
        </div>
        <div class="col-md-4">
            <div style="width: 100%;margin: 1% 0px 0px 4%;"><iframe width="100%" height="1000" src="http://www.maps.ie/create-google-map/map.php?width=100%&amp;height=1000&amp;hl=en&amp;q=NY%2010001+(WeekendDocs)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
        </div>
        <hr class="line">
    </div>
</section>
@endsection