@extends('layouts.master')

@section('content')
<section class="bodySec joinUsBody clearfix" style="background:none; padding:20px;">
    <div class="container">
        <section class="row">
            <h1>Booking Information</h1>
            <div class="line1"></div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12" style="padding:20px;">
                        <p style="padding:3px; line-height:20px; font-size:15px; color:#575757;"> <!-- tabs left -->
                            <strong style="color:#298DC6; font-size:24px; font-weight:normal;">Hello , {{$patient_name}} </strong>
                            <br><br>
                            @if($status)
                                Here is your Booking Details<br>
                                Doctor Name : {{$doctor_name}}<br>
                                Address : {{$metas['doctor_office_address']}}<br>
                                Date : {{$date}}<br>
                                Time : {{$time}}<br>
                            @else
                                <div class="alert alert-warning" role="alert">
                                    <strong>Sorry !</strong> This time already booked by another patient .
                                </div>
                            @endif

                        </p>
                        <!-- /tabs -->
                    </div>
                </div>
                <!-- /row -->
            </div>
            <hr>
        </section>
    </div>
</section>
@endsection