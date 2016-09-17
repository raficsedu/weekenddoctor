@extends('layouts.doctor')

@section('content')
<section class="bodySec joinUsBody clearfix" style="background:none; padding:20px;">
    <div class="container">
        <div class="row">
            @if(Session::has('successful'))
            <div class="col-md-12">
                <div class="alert alert-success">
                    <p>
                        <strong>{{Session::pull('successful','default')}}</strong>
                    </p>
                </div>
            </div>
            @elseif(Session::has('unsuccessful'))
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <p>
                        <strong>{{Session::pull('unsuccessful','default')}}</strong>
                    </p>
                </div>
            </div>
            @endif
        </div>
        <section class="row">
            <div class="container">

                <div class="row">
                    <div class="col-md-12 col-lg-12" style="padding:20px;">
                        <!-- tabs left -->
                        <div class="tabbable">
                            <div class="col-md-3">
                                <ul class="nav nav-pills nav-stacked col-md-12">
                                    <li class="active"><a href="#a" data-toggle="tab">Office Hours</a></li>
                                    <li><a href="#b" data-toggle="tab">Time Off</a></li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                            <div class="tab-content col-md-12">
                            <div class="tab-pane active" id="a">
<!--                                Office Hours-->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                            <form name="frmSlot" action="{{url('/save-doctor-schedule')}}" method="post">
                            {{ csrf_field() }}
                            <section class="content">
                            <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Working Hours</h3>
                            </div>
                            <div class="line1"></div>
                            <div class="box-body">
                            <?php
                                $days = ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
                                $intervals = [10,15,30,45,60];
                            ?>
                            @for ($i = 6; $i <= 7; $i++)
                                <div class="day">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="dayName">{{$days[$i-1]}}</div>
                                            <label for="ischecked{{$i}}">
                                                <input name="ischecked{{$i}}" id="ischecked{{$i}}" value="{{$i}}" tabindex="1" class="form" type="checkbox" @if(array_key_exists($i,$schedules)){{"checked"}}@else{{""}}@endif> Working
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <div>from
                                                <select name="stime{{$i}}" id="stime{{$i}}" class="select change_slots" rel="{{$i}}" tabindex="2">
                                                    @foreach(get_time_slots('00:00','23:30','30',1) as $single)
                                                        <option value="{{$single}}" @if(array_key_exists($i,$schedules) && $schedules[$i]->start_time==$single){{"selected"}}@elseif(!array_key_exists($i,$schedules) && $single=='9:00'){{"selected"}}@endif>{{$single}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="time_margin">
                                                to
                                                <select name="etime{{$i}}" id="etime{{$i}}" class="select change_slots" rel="{{$i}}" tabindex="3">
                                                    @foreach(get_time_slots('00:00','23:30','30',1) as $single)
                                                        <option value="{{$single}}" @if(array_key_exists($i,$schedules) && $schedules[$i]->end_time==$single){{"selected"}}@elseif(!array_key_exists($i,$schedules) && $single=='17:00'){{"selected"}}@endif>{{$single}}</option>
                                                    @endforeach
                                                </select></div>								</div>
                                        <div class="col-md-3">
                                            timeslot duration
                                            <select name="time{{$i}}" id="time{{$i}}" class="select change_slots" rel="{{$i}}" tabindex="4">
                                                @foreach($intervals as $single)
                                                <option value="{{$single}}" @if(array_key_exists($i,$schedules) && $schedules[$i]->interval_time==$single){{"selected"}}@elseif(!array_key_exists($i,$schedules) && $single=='30'){{"selected"}}@endif>{{$single}} Minutes</option>
                                                @endforeach
                                            </select>
                                            <a href="javascript:void(0)" rel="{{$i}}" rev="hide" class="del_slots">add breakes</a>
                                        </div>
                                        <div class="col-sm-2">
                                            <span id="del{{$i}}" style="display:none">
                                                <div id="checkboxDiv{{$i}}" class="slot-div">
                                                    @if(array_key_exists($i,$schedules))
                                                        @foreach(unserialize($schedules[$i]->time_slots) as $single)
                                                            <input name="displayCheck{{$i}}[]" checked="checked" value="{{$single}}" type="checkbox">{{$single}}<br>
                                                        @endforeach
                                                    @else
                                                        @foreach(get_time_slots('09:00','17:00','30',2) as $single)
                                                            <input name="displayCheck{{$i}}[]" checked="checked" value="{{$single}}" type="checkbox">{{$single}}<br>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </span>
                                            <span class="message"></span>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            </div>
                            <div class="line1"></div>
                            <div class="box-footer">
                                <input class="btn btn-primary" value="Save" id="submit" name="submit" type="submit">
                            </div>
                            </div>
                            </div>
                            </div>
                            </section>
                            </form>
                            </div>
                            </div>
                            <div class="tab-pane" id="b">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
<!--                                    Time Off-->
                                    <section class="content">
                                        <div class="row">

                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="box box-primary">
                                                    <div class="box-header">
                                                        <h3 class="box-title">Off Days</h3>
                                                    </div>
                                                    <div class="line1"></div>
                                                    <div class="box-body">
                                                        {{--*/ $i=7 /*--}}
                                                        <div id="off_day_container">
                                                            @foreach($off_days as $row)
                                                                {{--*/ $i++ /*--}}
                                                                <form id="off_day_form{{$i}}" name="off_day_form{{$i}}" method="get" enctype="multipart/form-data">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="form_item_no" value="{{$i}}">
                                                                    <input id="us_date{{$i}}" class="rawusdate" type="hidden" name="us_date" value="{{getUSdateformat($row->date)}}">
                                                                    <div id="day{{$i}}" class="day">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <div class="dayName">{{(new DateTime($row->date))->format('l jS \of F Y')}}</div>
                                                                                <div class="col-md-12" style="margin-top: 10%;">
                                                                                    <input name="ischecked{{$i}}" id="whole{{$i}}" value="whole" tabindex="{{$i}}" class="form off_day_time" type="radio" @if($row->full_day==1){{"checked"}}@endif>
                                                                                    <label for="whole{{$i}}">Whole Day</label>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <input name="ischecked{{$i}}" id="partial{{$i}}" value="partial" tabindex="{{$i}}" class="form off_day_time" type="radio" @if($row->full_day==0){{"checked"}}@endif>
                                                                                    <label for="partial{{$i}}">Select Time</label>
                                                                                </div>
                                                                                <div class="col-md-12" style="margin-top: 10%;">
                                                                                    <div class="col-md-4 pull-left">
                                                                                        <button id="delete{{$i}}" type="button" class="btn btn-danger delete_off_day" sl="{{$i}}">Delete</button>
                                                                                    </div>
                                                                                    <div class="col-md-4 pull-right">
                                                                                        <button id="insert{{$i}}" type="button" class="btn btn-success save_off_day" sl="{{$i}}">Save</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div id="off_time_div{{$i}}" class="@if($row->full_day==1){{'off_time_div'}}@endif">
                                                                                <div class="col-md-3">
                                                                                    <div>from
                                                                                        <select name="stime{{$i}}" id="stime{{$i}}" class="select change_slots" rel="{{$i}}" tabindex="2">
                                                                                            @foreach(get_time_slots('00:00','23:30','30',1) as $single)
                                                                                                <option value="{{$single}}" @if($row->start_time==$single){{"selected"}}@endif>{{$single}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="time_margin">
                                                                                        to
                                                                                        <select name="etime{{$i}}" id="etime{{$i}}" class="select change_slots" rel="{{$i}}" tabindex="3">
                                                                                            @foreach(get_time_slots('00:00','23:30','30',1) as $single)
                                                                                                <option value="{{$single}}" @if($row->end_time==$single){{"selected"}}@endif>{{$single}}</option>
                                                                                            @endforeach
                                                                                        </select></div>								</div>
                                                                                <div class="col-md-3">
                                                                                    timeslot duration
                                                                                    <select name="time{{$i}}" id="time{{$i}}" class="select change_slots" rel="{{$i}}" tabindex="4">
                                                                                        @foreach($intervals as $single)
                                                                                            <option value="{{$single}}" @if($row->interval_time == $single){{"selected"}}@endif>{{$single}} Minutes</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <a href="javascript:void(0)" rel="{{$i}}" rev="hide" class="del_slots">add breakes</a>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <span id="del{{$i}}" style="display:none">
                                                                                        <div id="checkboxDiv{{$i}}" class="slot-div">
                                                                                            @foreach(unserialize($row->time_slots) as $single)
                                                                                                <input name="displayCheck{{$i}}[]" checked="checked" value="{{$single}}" type="checkbox">{{$single}}<br>
                                                                                            @endforeach
                                                                                        </div>
                                                                                    </span>
                                                                                    <span class="message"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            @endforeach
                                                        </div>
                                                        <div class="col-md-12" style="margin-top: 5%;">
                                                            <input id="datepicker" type="button" class="btn btn-primary" value="Add Off Day">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
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
$(function ($) {
    $( "#datepicker" ).datepicker({
        dateFormat: "mm-dd-yy",
        onSelect: function (date) {
            var date = $(this).val();
            $('#datepicker').val('Add Off Day');
            var flag = false;
            var type = 1;
            $('.save_off_day').each(function(){
                if($(this).hasClass('unsaved')){
                    flag = true;
                    type = 1;
                }
            });
            $('.rawusdate').each(function(){
                if($(this).val()==date){
                    flag = true;
                    type = 2;
                }
            });
            if(flag){
                if(type==1){
                    $.notify("Please first save your last added item", "error");
                }else if(type==2){
                    $.notify("Duplicate Date Found", "error");
                }
            }else{
                //Calling Ajax
                $.ajax({
                    url: "{{url('/insert-doctor-off-day')}}",
                    type: 'GET',
                    data: { date:date },
                    success: function(response)
                    {
                        $('#off_day_container').append(response);
                        $('#datepicker').addClass('unsaved');
                    }
                });
            }
        }
    });
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
                required: true
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
                required: "Please provide preferred number"
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
            }
        }
    });

    //Initialize the Time Slot
//    $('.change_slots').each(function(){
//        var num = $(this).attr('rel');
//        var stime = $('#stime'+num).val();
//        var etime = $('#etime'+num).val();
//        var intval = $('#time'+num).val();
//        //Generating Time slot
//        $.ajax({
//            url: "{{url('/get-time-slot')}}",
//            data: { stime:stime,etime:etime,intval:intval,num:num },
//            type: 'GET',
//            success: function(response)
//            {
//                $('#checkboxDiv'+num).html(response);
//                i++;
//            }
//        });
//    });
});

    $(document).on("click", ".del_slots", function () {
        var num = $(this).attr('rel');
        if($(this).attr('rev')=='hide'){
            $('#del'+num).fadeIn(500);
            $(this).attr('rev','show');
            $(this).html('save timeslots');
        }else{
            var id = $('#id'+num).val();
            // var slots = $('#display_slots'+num).val();
            var stime = $('#stime'+num).val();
            var etime = $('#etime'+num).val();
            var intval = $('#time'+num).val();


            var slots = '';
            $("input[name='displayCheck"+num+"[]']").each(function() {
                if(this.checked==true)slots = slots+$(this).val()+',';
            });
            /*$.post('/user/timeslot/save-display-slots',
             {id: id, slots:slots,intval:intval,stime:stime,etime:etime },

             function(data){

             //alert(data);return false;
             }, false);
             */
            $('#del'+num).fadeOut(500);
            $(this).attr('rev','hide');
            $(this).html('add breakes');
            $(this).closest(".time-slot").find(".message").html("Click save changes below to save your breaks");
        }
    });


    // change time interval
    $(document).on("change", ".change_slots", function () {
        var num = $(this).attr('rel');
        var stime = $('#stime'+num).val();
        var etime = $('#etime'+num).val();
        var intval = $('#time'+num).val();
        //Generating Time slot
        $.ajax({
            url: "{{url('/get-time-slot')}}",
            data: { stime:stime,etime:etime,intval:intval,num:num },
            type: 'GET',
            success: function(response)
            {
                $('#checkboxDiv'+num).html(response);
            }
        });
    });



    $(document).on("click", ".off_day_time", function () {
        var s = $(this).val();
        var index = $(this).attr('tabindex');
        if(s=="whole"){
            $('#off_time_div'+index).hide();
        }else if(s=="partial"){
            $('#off_time_div'+index).show();
        }
    });


    $(document).on("click", ".save_off_day", function () {
        var sl = $(this).attr('sl');
        $(this).removeClass('unsaved');
        var data = $('#off_day_form'+sl).serialize();

        $.ajax({
            url: "{{url('/save-off-days')}}",
            method: "GET",
            data: data,
            success: function(response)
            {
                $.notify("Your Off Day Successfully Added", "success");
            }
        });
    });

    $(document).on("click", ".delete_off_day", function () {
        var sl = $(this).attr('sl');
        $('#day'+sl).remove();
        var data = $('#off_day_form'+sl).serialize();

        $.ajax({
            url: "{{url('/delete-off-days')}}",
            method: "GET",
            data: data,
            success: function(response)
            {
                $.notify("Your Off Day Successfully Deleted", "success");
                $('#datepicker').removeClass('unsaved');
            }
        });
    });
</script>
@endsection