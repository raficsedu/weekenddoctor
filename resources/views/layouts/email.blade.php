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
    <hr>
</header>
@yield('content')
<footer class="footerSec clearfix">
    <p class="copyRight">Copyright © weekenddocs.com {{date('Y')}}</p>
</footer>
    <script type="text/javascript" src="{{url('public/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/js/bootstrap.min.js')}}"></script>
@yield('footer_custom_script')
</body>
</html>