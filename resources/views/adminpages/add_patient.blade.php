@extends('layouts.admin')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Add Patient</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Patient</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="row">
                    @if(Session::has('successful'))
                    <div class="col-md-12">
                        <div class="alert bg-success" role="alert">
                            <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> {{Session::pull('successful','default')}}
                        </div>
                    </div>
                    @elseif(Session::has('unsuccessful'))
                    <div class="col-md-12">
                        <div class="alert bg-danger" role="alert">
                            <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> {{Session::pull('unsuccessful','default')}}
                        </div>
                    </div>
                    @endif
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <form id="signupForm" action="{{url('/patient-registration')}}" method="post" role="form">
                            {{csrf_field()}}

                            <input type="hidden" name="registration_type" value="1">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text"  name="email" id="email" class="name form-control">
                                <label for="email" class="error" id="email-error"></label>
                            </div>
                            <div class="form-group">
                                <label>Confirm Email</label>
                                <input type="text"  name="confirm_email" id="confirm_email" class="pwd form-control">
                                <label for="confirm_email" class="error" id="confirm_email-error"></label>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password"  name="password" id="password" class="pwd form-control">
                                <label for="password" class="error" id="password-error"></label>
                            </div>
                            <div class="form-group clearfix">
                                <label style="width: 100%;float: left;" class="clearfix">Full Name</label>
                                <input style="width: 40%;float: left;" type="text" name="first_name" id="first_name" placeholder="First" class="form-control fisrt">
                                <input style="width: 40%;float: left;margin-left: 10%;" type="text" name="last_name" id="last_name" placeholder="Last" class="form-control last">
                                <div style="min-width: 50%;float: left;"><label for="first_name" class="error" id="first_name-error"></label></div>
                                <div style="min-width: 50%;float: left;"><label for="last_name" class="error" id="last_name-error"></label></div>
                            </div>
                            <div class="form-group clearfix">
                                <label style="width: 100%;float: left;" class="clearfix">Date of Birth</label>
                                <select style="width: 28%;float: left;" name="month" id="month" class="form-control">
                                    <option value="">Month</option>
                                    <?php
                                    for($i=1;$i<=12;$i++){
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                    ?>
                                </select>
                                <select style="width: 28%;float: left;margin-left: 8%;" name="day" id="day" class="form-control">
                                    <option value="">Day</option>
                                    <?php
                                    for($i=1;$i<=31;$i++){
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                    ?>
                                </select>
                                <select style="width: 28%;float: left;margin-left: 8%;" name="year" id="year" class="form-control">
                                    <option value="">Year</option>
                                    <?php
                                    for($i=date('Y');$i>=1940;$i--){
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                    ?>
                                </select>
                                <div style="min-width: 36%;float: left;"><label for="month" class="error" id="month-error"></label></div>
                                <div style="min-width: 36%;float: left;"><label for="day" class="error" id="day-error"></label></div>
                                <div style="min-width: 28%;float: left;"><label for="year" class="error" id="year-error"></label></div>
                            </div>
                            <div class="form-group">
                                <label>Sex</label>
                                <select name="sex" id="sex" class="countryCode form-control">
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                                <label for="sex" class="error" id="sex-error"></label>
                            </div>
                            <button type="submit" class="btn btn-primary">SAVE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div><!--/.main-->
@endsection
@section('custom_footer_script')
<style>
    div > .error{
        color: red;
    }
</style>
<script>
    jQuery(function($) {

        // validate signup form on keyup and submit
        $("#signupForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                confirm_email: {
                    required: true,
                    email: true,
                    equalTo: "#email"
                },
                password: {
                    required: true,
                    minlength: 8
                },
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                month: {
                    required: true
                },
                day: {
                    required: true
                },
                year: {
                    required: true
                },
                sex: {
                    required: true
                }
            },
            messages: {
                email: "enter a valid email address",
                confirm_email: {
                    required: "enter a valid email address",
                    equalTo: "enter the same email as above"
                },
                password: {
                    required: "provide a password",
                    minlength: "password must be at least 8 characters long"
                },
                first_name: {
                    required: "first name"
                },
                last_name: {
                    required: "last name"
                },
                month: {
                    required: "select month"
                },
                day: {
                    required: "select day"
                },
                year: {
                    required: "select year"
                },
                sex: {
                    required: "select your sex"
                }
            }
        });
    });
</script>
@endsection