@extends('layouts.patient')

@section('content')
<section class="bodySec joinUsBody clearfix" style="background:none; padding:0px;">
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
                        <div class="tabbable">
                            <div class="col-md-12">
                                <ul class="nav nav-pills nav-stacked col-md-12 beautiful_li">
                                    <li class="active"><a href="#a" data-toggle="tab">Current Appointment</a></li>
                                    <li><a href="#b" data-toggle="tab">Previous Appointment</a></li>
                                </ul>
                            </div>
                            <div class="col-md-12">
                                <div class="tab-content col-md-12">
                                    <div class="tab-pane active" id="a">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                                            <h3 class="beautify_title1">Appointments for this week</h3>
                                            <hr>
                                            <table id="patient_appointments_current" class="display" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Patient</th>
                                                        <th>Email</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 0;?>
                                                    @foreach($current_appointments as $ca)
                                                        <tr>
                                                            <?php $i++;?>
                                                            <th scope="row">{{$i}}</th>
                                                            <td>{{$ca->first_name.' '.$ca->last_name}}</td>
                                                            <td>{{$ca->email}}</td>
                                                            <td>{{date('l jS \of F Y',strtotime($ca->appointment_date))}}</td>
                                                            <td>{{$ca->appointment_time}}</td>
                                                            <td>
                                                                @if($ca->patient_cancelled)
                                                                    Cancelled By You
                                                                @elseif($ca->doctor_cancelled)
                                                                    Cancelled By Doctor
                                                                @else
                                                                    Active
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($ca->patient_cancelled)
                                                                    <button appointment_id="{{$ca->id}}" type="button" class="btn btn-info cancel_appointment" data-toggle="modal" data-target="#myModal" disabled>Cancelled</button>
                                                                @elseif($ca->doctor_cancelled)
                                                                    <button appointment_id="{{$ca->id}}" type="button" class="btn btn-info cancel_appointment" data-toggle="modal" data-target="#myModal" disabled>Cancelled</button>
                                                                @else
                                                                    <button appointment_id="{{$ca->id}}" type="button" class="btn btn-danger cancel_appointment" data-toggle="modal" data-target="#myModal">Cancel</button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="b">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                                            <h3 class="beautify_title1">Previous Appointments</h3>
                                            <hr>
                                            <table id="patient_appointments_previous" class="display" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Patient</th>
                                                    <th>Email</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i = 0;?>
                                                @foreach($previous_appointments as $pa)
                                                    <tr>
                                                        <?php $i++;?>
                                                        <th scope="row">{{$i}}</th>
                                                        <td>{{$pa->first_name.' '.$pa->last_name}}</td>
                                                        <td>{{$pa->email}}</td>
                                                        <td>{{date('l jS \of F Y',strtotime($pa->appointment_date))}}</td>
                                                        <td>{{$pa->appointment_time}}</td>
                                                        <td>
                                                            @if($pa->patient_cancelled)
                                                                Cancelled By You
                                                            @elseif($pa->doctor_cancelled)
                                                                Cancelled By Doctor
                                                            @else
                                                                Visited
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
@endsection

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Are you sure you want to cancel this appointment ?</h4>
            </div>
            <div class="modal-footer">
                <form action="{{url('/cancel-appointment')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="appointment_id" id="appointment_id" value="">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Cancel Appointment</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style type="text/css" href="styles.css">
    .tBox {
        width: 100% !important;
    }
    .fDiv {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }
</style>
@section('footer_custom_script')
<script src="{{url('public/datatable/jquery.dataTables.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#patient_appointments_current').DataTable({
            responsive: true
        });
        $('#patient_appointments_previous').DataTable({
            responsive: true
        });
    } );

    $(document).on('click','.cancel_appointment',function(e){
        var a_id = $(this).attr('appointment_id');
        $('#appointment_id').val(a_id);
    });
</script>
@endsection