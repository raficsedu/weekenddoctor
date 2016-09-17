<?php
$days = ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
$intervals = [10,15,30,45,60];
?>
<form id="off_day_form{{$i}}" name="off_day_form{{$i}}" method="get" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="form_item_no" value="{{$i}}">
    <input id="us_date{{$i}}" type="hidden" name="us_date" value="{{$us_date}}">
    <div id="day{{$i}}" class="day">
        <div class="row">
            <div class="col-md-4">
                <div class="dayName">{{$date}}</div>
                <div class="col-md-12" style="margin-top: 10%;">
                    <input name="ischecked{{$i}}" id="whole{{$i}}" value="whole" tabindex="{{$i}}" class="form off_day_time" type="radio" checked>
                    <label for="whole{{$i}}">Whole Day</label>
                </div>
                <div class="col-md-12">
                    <input name="ischecked{{$i}}" id="partial{{$i}}" value="partial" tabindex="{{$i}}" class="form off_day_time" type="radio">
                    <label for="partial{{$i}}">Select Time</label>
                </div>
                <div class="col-md-12" style="margin-top: 10%;">
                    <div class="col-md-4 pull-left">
                        <button id="delete{{$i}}" type="button" class="btn btn-danger delete_off_day" sl="{{$i}}">Delete</button>
                    </div>
                    <div class="col-md-4 pull-right">
                        <button id="insert{{$i}}" type="button" class="btn btn-success save_off_day unsaved" sl="{{$i}}">Save</button>
                    </div>
                </div>
            </div>
            <div id="off_time_div{{$i}}" class="off_time_div">
                <div class="col-md-3">
                    <div>from
                        <select name="stime{{$i}}" id="stime{{$i}}" class="select change_slots" rel="{{$i}}" tabindex="2">
                            @foreach(get_time_slots('00:00','23:30','30',1) as $single)
                            <option value="{{$single}}" @if($single=='9:00'){{"selected"}}@endif>{{$single}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="time_margin">
                        to
                        <select name="etime{{$i}}" id="etime{{$i}}" class="select change_slots" rel="{{$i}}" tabindex="3">
                            @foreach(get_time_slots('00:00','23:30','30',1) as $single)
                            <option value="{{$single}}" @if($single=='17:00'){{"selected"}}@endif>{{$single}}</option>
                            @endforeach
                        </select></div>								</div>
                <div class="col-md-3">
                    timeslot duration
                    <select name="time{{$i}}" id="time{{$i}}" class="select change_slots" rel="{{$i}}" tabindex="4">
                        @foreach($intervals as $single)
                        <option value="{{$single}}" @if($single=='30'){{"selected"}}@endif>{{$single}} Minutes</option>
                        @endforeach
                    </select>
                    <a href="javascript:void(0)" rel="{{$i}}" rev="hide" class="del_slots">add breakes</a>
                </div>
                <div class="col-sm-2">
                    <span id="del{{$i}}">
                        <div id="checkboxDiv{{$i}}" class="slot-div">
                            @foreach(get_time_slots('09:00','17:00','30',2) as $single)
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