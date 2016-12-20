<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ucwords(str_replace('_', ' ', Route::currentRouteName()))}}</title>

    <link href="{{url('public/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('public/admin/css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{url('public/admin/css/styles.css')}}" rel="stylesheet">
    <link href="{{url('public/admin/css/bootstrap-table.css')}}" rel="stylesheet">
    <!--Icons-->
    <script src="{{url('public/admin/js/lumino.glyphs.js')}}"></script>

    <!--[if lt IE 9]>
    <script src="{{url('public/admin/js/html5shiv.js')}}"></script>
    <script src="{{url('public/admin/js/respond.min.js')}}"></script>
    <![endif]-->

</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/admin')}}"><span>Weekend</span>Docs</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{Auth::user()->first_name." ".Auth::user()->last_name}} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('/admin-settings')}}"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
                        <li><a href="{{url('/logout')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div><!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li class="parent ">
            <a href="#">
                <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Doctor
            </a>
            <ul class="children collapse @if(Route::currentRouteName() == 'add_doctor' || Route::currentRouteName() == 'all_doctor'){{'in'}}@endif" id="sub-item-1">
                <li>
                    <a class="" href="{{url('/add-doctor')}}">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add Doctor
                    </a>
                </li>
                <li>
                    <a class="" href="{{url('/all-doctor')}}">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> All Doctor
                    </a>
                </li>
            </ul>
        </li>
        <li class="parent ">
            <a href="#">
                <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Patient
            </a>
            <ul class="children collapse @if(Route::currentRouteName() == 'add_patient' || Route::currentRouteName() == 'all_patient'){{'in'}}@endif" id="sub-item-2">
                <li>
                    <a class="" href="{{url('/add-patient')}}">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add Patient
                    </a>
                </li>
                <li>
                    <a class="" href="{{url('/all-patient')}}">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> All Patient
                    </a>
                </li>
            </ul>
        </li>
        <li role="presentation" class="divider"></li>
        <li><a href="{{url('/system-settings')}}"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Settings</a></li>
    </ul>

</div><!--/.sidebar-->

@yield('content')

<script src="{{url('public/admin/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{url('public/admin/js/bootstrap.min.js')}}"></script>
<script src="{{url('public/admin/js/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript" src="{{url('public/js/jquery.validate.js')}}"></script>
<script src="{{url('public/admin/js/bootstrap-table.js')}}"></script>
<script>
    $('#calendar').datepicker({
    });

    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>
@yield('custom_footer_script')
</body>

</html>