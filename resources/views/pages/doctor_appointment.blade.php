@extends('layouts.doctor')

@section('content')
<section class="bodySec joinUsBody clearfix" style="background:none; padding:20px;">
    <div class="container">
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
                                            Content for the Current Appointment
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="b">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                                            Content for the Previous Appointment
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