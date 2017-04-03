@extends('layouts.admin')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">All Patients</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Patients</h1>
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
                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                        <tr>
                            <th data-field="sl" data-sortable="true" >Sl</th>
                            <th data-field="name" data-sortable="true">Name</th>
                            <th data-field="email"  data-sortable="false">Email</th>
                            <th data-field="action" data-sortable="false">Action</th>
                            <th data-field="view" data-sortable="false">View</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;?>
                        @foreach($patients as $d)
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td>{{$d->first_name." ".$d->last_name}}</td>
                            <td>{{$d->email}}</td>
                            <td>@if($d->active)<a style="color: red;" href="{{url('/admin/0/1/'.$d->id)}}">De-activate this user</a>@else<a style="color: green;" href="{{url('/admin/1/1/'.$d->id)}}">Activate this user</a>@endif</td>
                            <td><a href="{{url('/patient/medicalteam?p='.$d->id)}}" target="_blank" class="btn btn-info">View/Edit</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>	<!--/.main-->
@endsection
@section('custom_footer_script')
<script>
</script>
@endsection