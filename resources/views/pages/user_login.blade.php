@extends('layouts.master')

@section('content')
<section class="bodySec signBody joinUsBody clearfix">
    <div class="container">
        <section class="row">
            <h1>Sing In</h1>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 clearfix">
                <h4 style="color: red;text-align:left">@if(Session::has('message')){{Session::pull('message','default')}}@endif</h4>
                <div class="singBody clearfix" style="border-right:1px solid #c3c3c3;">
                    <form id="logInForm" role="form" method="POST" action="{{ url('/authenticate') }}">
                        {{ csrf_field() }}
                        <div class="singRow{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>Email<small>*</small></label>
                            <input type="text" placeholder="Email"  name="email" class="ipnHaf txtBox" value="{{ old('email') }}">
                            @if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
                        </div>
                        <div class="singRow{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label>Password<small>*</small></label>
                            <input type="password" placeholder="Password"  name="password" class="ipnHaf txtBox">
                            @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="singRow">
                            <input type="checkbox" name="remember" class="chk">
                            <span class="fPwd">Remember Me</span>
                        </div>
                        <div class="singRow">
                            <button type="submit" name="submit" class="signBtn">Sing In</button>
                        </div>

                    </form>
                </div>
            </div>
            <?php
            ?>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 clearfix">
                <div class="JoinNow">
                    <h1>I’m a new patient</h1>
                    <p>Sign up for a WeekendDocs <br/> account to book an appointment <br/> right now!</p>
                    <a href="{{url('/join-us')}}">Join Now</a>
                </div>
            </div>
        </section>
    </div>
</section>
@endsection
@section('footer_custom_script')
<script>
    jQuery(function($) {

        // validate signup form on keyup and submit
        $("#logInForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Please enter your Email"
                },
                password: {
                    required: "Please provide your password"
                }
            }
        });
    });
</script>
@endsection