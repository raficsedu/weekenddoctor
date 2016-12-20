@extends('layouts.admin')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">System Settings</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">System Settings</h1>
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
                        <form action="{{url('/system-settings')}}" method="post" role="form">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>System Name</label>
                                <input name="name" class="form-control" value="@if(isset($system_info['name'])){{$system_info['name']}}@endif">
                            </div>

                            <div class="form-group">
                                <label>System Email</label>
                                <input name="email" class="form-control" value="@if(isset($system_info['email'])){{$system_info['email']}}@endif">
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
<script>
</script>
@endsection