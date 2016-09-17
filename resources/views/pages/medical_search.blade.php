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
                <img src="images/medicalteam.png" alt=""/>
            </div>
        </section>
    </div>
</section>
<article class="breadCrmBox clearfix">
    <div class="container">
        <section class="row">
            <ul class="breadCrmList">
                <li><a href="index.html">Home ></a></li>
                <li><a href="#" class="breadCrmActive">Medical Team</a></li>
            </ul>
        </section>
    </div>
</article>

<section class="bodySec joinUsBody clearfix" style="background:#ffffff !important;">
<div class="container">
<section class="row">

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="padding:0;">
    <?php $i = 0;?>
    @foreach($doctors as $doctor)
        <?php
            $metas = get_doctor_meta($doctor->id);
            if(isset($metas['profile_image'])){
                $img_url = url('public/uploads/doctor/'.$metas['profile_image']);
            }else{
                $img_url = url('public/images/doctor05.png');
            }
            $insurancess = explode(',',$metas['insurance']);
        ?>
        @if($speciality!='' && $insurance!='')
            @if($metas['speciality']==$speciality && in_array($insurance,$insurancess))
                <?php $i++;?>
                <div class="box-doc col-lg-4 col-md-4 col-sm-4">
                    <h3>Book a {{$metas['doctor_title']}}</h3>

                    <hr class="line">
                    <img src="{{$img_url}}" alt="img" style=" float:left; margin:10px; border:3px solid #dddddd; border-radius:50%; width:100px; height:100px;">

                    <h2>Dr. {{$doctor->first_name." ".$doctor->last_name}}</h2>
                    <br>

                    <ul class="staring">
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>

                    </ul>
                    <br><br>
                    <p>{{str_limit($metas['professional_statement'], 20)}}</p>
                </div>
            @endif
        @elseif($speciality!='')
            @if($metas['speciality']==$speciality)
                <?php $i++;?>
                <div class="box-doc col-lg-4 col-md-4 col-sm-4">
                    <h3>Book a {{$metas['doctor_title']}}</h3>

                    <hr class="line">
                    <img src="{{$img_url}}" alt="img" style=" float:left; margin:10px; border:3px solid #dddddd; border-radius:50%; width:100px; height:100px;">

                    <h2>Dr. {{$doctor->first_name." ".$doctor->last_name}}</h2>
                    <br>

                    <ul class="staring">
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>

                    </ul>
                    <br><br>
                    <p>{{str_limit($metas['professional_statement'], 20)}}</p>
                </div>
            @endif
        @elseif($insurance!='')
            @if(in_array($insurance,$insurancess))
                <?php $i++;?>
                <div class="box-doc col-lg-4 col-md-4 col-sm-4">
                    <h3>Book a {{$metas['doctor_title']}}</h3>

                    <hr class="line">
                    <img src="{{$img_url}}" alt="img" style=" float:left; margin:10px; border:3px solid #dddddd; border-radius:50%; width:100px; height:100px;">

                    <h2>Dr. {{$doctor->first_name." ".$doctor->last_name}}</h2>
                    <br>

                    <ul class="staring">
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                        <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>

                    </ul>
                    <br><br>
                    <p>{{str_limit($metas['professional_statement'], 20)}}</p>
                </div>
            @endif
        @else
            <?php $i++;?>
            <div class="box-doc col-lg-4 col-md-4 col-sm-4">
                <h3>Book a {{$metas['doctor_title']}}</h3>

                <hr class="line">
                <img src="{{$img_url}}" alt="img" style=" float:left; margin:10px; border:3px solid #dddddd; border-radius:50%; width:100px; height:100px;">

                <h2>Dr. {{$doctor->first_name." ".$doctor->last_name}}</h2>
                <br>

                <ul class="staring">
                    <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                    <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                    <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                    <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>
                    <li style="float:left; display:block; margin:0 2px;"><a href="#"><img alt="" src="{{url('public/images/yellow_star.png')}}" width="24" height="24"></a></li>

                </ul>
                <br><br>
                <p>{{str_limit($metas['professional_statement'], 20)}}</p>
            </div>
        @endif
    @endforeach

    @if($i==0)
        <div class="alert alert-warning" role="alert">
            <strong>Sorry !</strong> There is no doctor found your match .
        </div>
    @endif
</div>



</div>

</section>
</div>
</section>
@endsection