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
    <link rel="stylesheet" type="text/css" href="{{url('public/css/layout2.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{url('public/css/media.css')}}" media="all"/>
    <link href="{{url('public/css/polyglot-language-switcher.css')}}" type="text/css" rel="stylesheet">
    <link href="{{url('public/css/screen.css')}}" type="text/css" rel="stylesheet">
    <link href="{{url('public/css/datepicker-themes/smoothness/jquery-ui.css')}}" type="text/css" rel="stylesheet">
</head>
<body>
<header>
    <div class="topStrip clearfix">
        <div class="container">
            <section class="row">
                <ul>
                    <li class="countryFlag">
                        <div id="polyglotLanguageSwitcher">
                            <form action="#">
                                <select id="polyglot-language-options3">
                                    <option id="es3" value="en"> Spanish</option>
                                    <option id="en3" value="fr" selected> English</option>
                                </select>
                            </form>
                        </div>
                    </li>

                    @if(Auth::check())
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Welcome {{Auth::user()->first_name}} &nbsp; <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            @if(Auth::user()->user_level==2)
                            <li><a href="{{url('/doctor/appointments')}}">Appointments</a></li>
                            <li><a href="{{url('/doctor/schedule')}}">My Schedule</a></li>
                            <li><a href="{{url('/doctor/settings')}}">Settings</a></li>
                            @else
                            <li><a href="{{url('/patient/medicalteam')}}">Medical Team</a></li>
                            <li><a href="{{url('/patient/appointments')}}">Past Appointments</a></li>
                            <li><a href="{{url('/patient/settings')}}">Settings</a></li>
                            @endif
                            <li><a href="{{ url('/logout') }}" style="color:#e04848 !important;">Logout</a></li>
                        </ul>
                    </div>
                    @else
                    <li class="lock"><a href="{{url('/user-login')}}"><img src="{{url('public/images/lock.png')}}" alt=""/>Sign in/ Join</a></li>
                    @endif

                    <li><a href="#"><img src="{{url('public/images/fb.png')}}" alt=""/></a></li>
                    <li><a href="#"><img src="{{url('public/images/in.png')}}" alt=""/></a></li>
                    <li><a href="#"><img src="{{url('public/images/gp.png')}}" alt=""/></a></li>
                    <li><a href="#"><img src="{{url('public/images/rss.png')}}" alt=""/></a></li>
                </ul>
            </section>
        </div>
    </div>
    <?php
        $tab1 = $tab2 = $tab3 = '';
        if(Route::currentRouteName()=='doctor_appointments')
            $tab1 = ' tab_active';
        else if (Route::currentRouteName()=='doctor_schedule')
            $tab2 = ' tab_active';
        else if (Route::currentRouteName()=='doctor_settings')
            $tab3 = ' tab_active';
    ?>
    <div class="headerMiddle clearfix">
        <div class="container">
            <div class="row row-centered">
                <div class="col-md-3 tab_first">
                    <li><a href="{{url('doctor/appointments')}}" class="tab_title{{$tab1}}"><i class="fa fa-book padding"></i>Appointments</a></li>
                </div>
                <div class="col-md-3">
                    <li><a href="{{url('doctor/schedule')}}" class="tab_title{{$tab2}}"><i class="fa fa-calendar padding"></i>Schedule</a></li>
                </div>
                <div class="col-md-2 tab_last">
                    <li><a href="{{url('doctor/settings')}}" class="tab_title{{$tab3}}"><i class="fa fa-asterisk padding"></i>Settings</a></li>
                </div>
            </div>
            <hr>
        </div>
    </div>
</header>
@yield('content')
<footer class="footerSec clearfix">
    <section class="topFooter clearfix">
        <div class="container">
            <section class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mobftr clearfix">
                    <h2 class="helpTxt">Need help booking online?</h2>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mobftr clearfix">
                    <p class="call"><img src="{{url('public/images/call.png')}}" alt=""/>+123 456 8536</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mobftr clearfix">
                    <p class="msg"><img src="{{url('public/images/msg.png')}}" alt=""/>services@medical.com</p>
                </div>
            </section>
        </div>
    </section>
    <article class="redFooter clearfix">
        <div class="container">
            <section class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 clearfix">
                    <p class="genderDoc">Are You a <br/>
                        Top Doctor?</p>
                    <a href="#" class="joinTodyIpad">Join Today</a></div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 clearfix">
                    <p class="medicalkit">Medical for <br/>
                        Business</p>
                    <a href="#">Learn More</a></div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 clearfix">
                    <p class="vital">Medical for <br/>
                        Health <br/>
                        Systems</p>
                    <a href="#">Learn More</a></div>
            </section>
        </div>
    </article>
    <section class="bottomFooter clearfix">
        <div class="container">
            <section class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 clearfix">
                    <div class="weekEnd clearfix">
                        <h2>WeekendDocs</h2>
                        <ul class="">
                            <li><a href="#"><img src="{{url('public/images/white_fb.png')}}" alt=""/></a></li>
                            <li><a href="#"><img src="{{url('public/images/white_tw.png')}}" alt=""/></a></li>
                            <li><a href="#"><img src="{{url('public/images/blue_rss.png')}}" alt=""/></a></li>
                        </ul>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum gravida quam quis nunc rutrum
                        placerat. Proin eu mi vitae neque veh interdum id nec turpis nam auctor faucibus
                        sollicitudin.</p>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 clearfix">
                    <aside class="col-lg-3 col-md-3 col-sm-3 col-xs-6 footerMiddleBox  clearfix">
                        <h6>Aradqk</h6>
                        <ul class="">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Press</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Answers</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Doctor Blog</a></li>
                        </ul>
                    </aside>
                    <aside class="col-lg-3 col-md-3 col-sm-3 col-xs-6 footerMiddleBox  clearfix">
                        <h6>Search by</h6>
                        <ul class="">
                            <li><a href="#">Doctor Name</a></li>
                            <li><a href="#">Practice Name</a></li>
                            <li><a href="#">Procedure</a></li>
                            <li><a href="#">Language</a></li>
                            <li><a href="#">Location</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Hospital</a></li>
                            <li><a href="#">Insurance</a></li>
                        </ul>
                    </aside>
                    <aside class="col-lg-3 col-md-3 col-sm-3 col-xs-6 footerMiddleBox  clearfix">
                        <h6>CITIES</h6>
                        <ul class="">
                            <li><a href="#">Cincinnati</a></li>
                            <li><a href="#">Detroit</a></li>
                            <li><a href="#">Omaha</a></li>
                            <li><a href="#">Orlando</a></li>
                            <li><a href="#">Pittsburgh</a></li>
                            <li><a href="#">San Diego</a></li>
                            <li><a href="#">Tampa</a></li>
                            <li><a href="#">Virginia Beach</a></li>
                        </ul>
                    </aside>
                    <aside class="col-lg-3 col-md-3 col-sm-3 col-xs-6 footerMiddleBox  clearfix">
                        <h6>Specialties</h6>
                        <ul class="">
                            <li><a href="#">hiropractors</a></li>
                            <li><a href="#">Dentists</a></li>
                            <li><a href="#">Dermatologists</a></li>
                            <li><a href="#">Eye Doctors</a></li>
                            <li><a href="#">Gynecologists</a></li>
                            <li><a href="#">Primary Care Doctors</a></li>
                            <li><a href="#">Psychiatrist</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 footerMiddleBox  clearfix">
                    <h6>newsletter</h6>

                    <p>Lorem ipsum dolor sit amet dolor consectetur adipiscing elit.</p>

                    <div class="searchBlock clearfix">
                        <form>
                            <input type="text" placeholder="Address" class="srch">
                            <button class="srchBtn">ok</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <p class="copyRight">Copyright © weekenddocs.com {{date('Y')}}</p>
</footer>
    <script type="text/javascript" src="{{url('public/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/js/bootstrap.min.js')}}"></script>
    <script src="{{url('public/js/jquery.polyglot.language.switcher.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{url('public/js/script.js')}}"></script>
    <script type="text/javascript" src="{{url('public/js/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{url('public/js/jquery-ui.js')}}"></script>
@yield('footer_custom_script')
</body>
</html>