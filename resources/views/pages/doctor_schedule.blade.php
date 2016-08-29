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
                                    <form name="offSlot" action="{{url('/save-doctor-offday')}}" method="post">
                                        {{ csrf_field() }}
                                        <section class="content">
                                            <div class="row">

                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="box box-primary">
                                                        <div class="box-header">
                                                            <h3 class="box-title">Off Days</h3>
                                                        </div>
                                                        <div class="line1"></div>
                                                        <div class="box-body">
                                                            @for ($i = 10; $i <= 11; $i++)
                                                            <div class="day">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="dayName">{{date('l jS \of F Y')}}</div>
                                                                        <label for="ischecked{{$i}}">
                                                                            <input name="ischecked{{$i}}" id="ischecked{{$i}}" value="{{$i}}" tabindex="1" class="form" type="radio" @if(array_key_exists($i,$schedules)){{"checked"}}@else{{""}}@endif> Whole Day <br>
                                                                            <input name="ischecked{{$i}}" id="ischecked{{$i}}" value="{{$i}}" tabindex="1" class="form" type="radio" @if(array_key_exists($i,$schedules)){{"checked"}}@else{{""}}@endif> Select Time
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
                                                                        <span id="del{{$i}}">
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
                                                            <input id="datepicker" type="button" class="btn btn-primary" value="Add Off Day">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </form>
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
            $('#datepicker').val('Add Off Day');

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

$('.del_slots').click(function(){
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
$('.change_slots').change(function(){
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

//function get_time_slot(stime,etime,intval){
//    $.ajax({
//        url: "{{url('/get-time-slot')}}",
//        data: { stime:stime,etime:etime,intval:intval },
//        type: 'GET',
//        success: function(response)
//        {
//            return response;
//        }
//    });
//}

//function loadTimeslots(num) {
//    var stime = $('#stime'+num).val();
//    var etime = $('#etime'+num).val();
//    var intval = $('#time'+num).val();
//    var url = 'http://demo.appointment-script.com/user/timeslot/get-doctor-slots';
//
//    var days = ["MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN"];
//    var selectedDay = days[num-1];
//    $.post(url,
//        {stime:stime,etime:etime,intval:intval,num:num, day:selectedDay},
//
//        function(data){
//
//            //alert(data);return false;
//            var decoded = $.json.decode(data);
////        $('#display_slots'+decoded['num']).val(decoded['slots']);//1
//            $('#checkboxDiv'+decoded['num']).html(decoded['slots']);//1
//
//
//        }, false);
//}
////foreach day, prepare the timeslots
//for(var i=1;i<=7;i++){
//    loadTimeslots(i);
//}


function setDeleteTimeslots(num, type){
    var stime = $('#stime'+num).val();
    var etime = $('#etime'+num).val();
    var intval = $('#time'+num).val();
    if(type==1){
        var url = 'http://demo.appointment-script.com/user/timeslot/get-deleted-slots';
    }else if(type==2){
        var url = 'http://demo.appointment-script.com/user/timeslot/make-slots';
    }

}
</script>
@endsection