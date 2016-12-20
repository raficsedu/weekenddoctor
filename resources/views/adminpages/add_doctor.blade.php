@extends('layouts.admin')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Add Doctor</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Doctor</h1>
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
                        <form id="signupForm" action="{{url('/doctor-registration')}}" method="post" role="form">
                            {{csrf_field()}}

                            <input type="hidden" name="registration_type" value="2">
                            <div class="form-group">
                                <label>First Name</label>
                                <input id="first_name" name="first_name" type="text" placeholder="First Name" class="form-control">
                                <label for="first_name" class="error" id="first_name-error"></label>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input id="last_name" name="last_name" type="text" placeholder="Last Name" class="form-control">
                                <label for="last_name" class="error" class="clearfix"></label>
                            </div>
                            <div class="form-group">
                                <label>Doctor Speciality</label>
                                <label for="specialty" class="error"  class="clearfix"></label>
                                <select id="specialty" name="specialty" class="countryCode form-control" type="text">
                                    <option value="0">Choose a Speciality</option>
                                    @foreach($specialties as $specialty)
                                    <option value="{{$specialty->id}}">{{$specialty->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Direct Phone Number</label>
                                <input id="phone" name="phone" type="text" placeholder="Your Direct Phone Number" class="form-control">
                                <label for="phone" class="error" class="clearfix"></label>
                            </div>
                            <div class="form-group">
                                <label>Zip Code</label>
                                <input id="zip" name="zip" type="text" placeholder="Zip Code" class="form-control month">
                                <label for="zip" class="error" class="clearfix"></label>
                            </div>
                            <div class="form-group">
                                <label>Doctor Email</label>
                                <input id="email" name="email" type="text" placeholder="Your Email" class="form-control">
                                <label for="email" id="confirm_email-error" class="error" class="clearfix"></label>
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
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                specialty: {
                    required: true
                },
                phone: {
                    required: true
                },
                zip: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                first_name: "provide first name",
                last_name: {
                    required: "provide last name"
                },
                specialty: {
                    required: "provide Specialty"
                },
                phone: {
                    required: "provide Phone No."
                },
                zip: {
                    required: "provide Zip Code"
                },
                email: {
                    required: "enter a valid email address"
                }
            }
        });
    });
</script>
@endsection