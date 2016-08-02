<!doctype html>
<html lang="en" class="no-js">
<head>
    <title>{{ucwords(str_replace('_', ' ', Route::currentRouteName()))}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{url('public/css/bootstrap.min.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{url('public/css/font-awesome.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{url('public/css/email.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{url('public/css/layout2.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{url('public/css/media.css')}}" media="all"/>
    <link href="{{url('public/css/screen.css')}}" type="text/css" rel="stylesheet">
</head>
<body>
<header>
    <div class="headerMiddle clearfix">
        <div class="container">
            <section class="row">
                <a href="{{url('')}}" class="logoBlock"><img src="{{url('public/images/logo.png')}}" alt=""/></a>
            </section>
        </div>
    </div>
</header>

<div class="col-md-12">
    <h3 class="email_title">Welcome , {{$name}}</h3>
</div>
<div class="col-md-12">
    <p class="email_body">Thank you for signing up in weekenddocs.com . Please verify your email to continue with us .</p>
</div>
<div class="col-md-12">
    <form action="{{url('/confirmation/'.$user_id.'/'.$confirmation_code)}}" method="get">
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{$user_id}}">
        <input type="hidden" name="confirmation_code" value="{{$confirmation_code}}">
        <input type="submit" value="Verify Me">
    </form>
</div>

<footer class="footerSec clearfix">
    <p class="copyRight" style="text-align: center;">Copyright © weekenddocs.com {{date('Y')}}</p>
</footer>
<script type="text/javascript" src="{{url('public/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/js/bootstrap.min.js')}}"></script>
</body>
</html>