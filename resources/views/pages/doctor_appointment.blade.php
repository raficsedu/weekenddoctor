@extends('layouts.doctor')

@section('content')
<section class="bodySec joinUsBody clearfix" style="background:none; padding:20px;">
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
                    <div class="col-md-12 col-lg-12" style="padding:20px;">
                        <!-- tabs left -->
                        <div class="tabbable">
                            <div class="col-md-3">
                                <ul class="nav nav-pills nav-stacked col-md-12">
                                    <li class="active"><a href="#a" data-toggle="tab">Current Appointment</a></li>
                                    <li><a href="#b" data-toggle="tab">Previous Appointment</a></li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content col-md-12">
                                    <div class="tab-pane active" id="a">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                                            <h3>Appointment for this week</h3>
                                            <hr>
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Patient</th>
                                                    <th>Email</th>
                                                    <th>Date</th>
                                                    <th>Details</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark Bob</td>
                                                    <td>mark@gmail.com</td>
                                                    <td>22 October 2:15 pm</td>
                                                    <td>Details</td>
                                                    <td>Check</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="b">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                                            <h3>Previous Appointments</h3>
                                            <hr>
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Patient</th>
                                                    <th>Email</th>
                                                    <th>Date</th>
                                                    <th>Details</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark Bob</td>
                                                    <td>mark@gmail.com</td>
                                                    <td>22 October 2:15 pm</td>
                                                    <td>Details</td>
                                                    <td>Check</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

@section('footer_custom_script')
<script>
    jQuery(function ($) {
        // validate signup form on keyup and submit
        $("#profile").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                preferred_number: {
                    required: true
                },
                gender: {
                    required: true,
                },
                birth_month: {
                    required: true
                },
                birth_date: {
                    required: true
                },
                birth_year: {
                    required: true
                }
            },
            messages: {
                email: "Please enter a valid email address",

                preferred_number: {
                    required: "Please provide preferred number",
                },
                gender: {
                    required: "Please provide your gender"
                },
                birth_month2: {
                    required: "Please provide your birth month",
                    minlength: "Your birth month must be at least 2 characters long"
                },
                birth_date: {
                    required: "Please provide your birth day",
                    minlength: "Your birth day must be at least 2 characters long"
                },
                birth_year: {
                    required: "Please provide your birth year",
                    minlength: "Your birth year must be at least 4 characters long"
                },
            }
        });
    });
</script>
@endsection