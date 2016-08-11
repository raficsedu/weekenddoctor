@extends('layouts.doctor')

@section('content')
<section class="bodySec joinUsBody clearfix" style="background:none; padding:20px;">
    <div class="container">
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
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                            <form name="frmSlot" action="" method="post">
                            <section class="content">
                            <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Working Hours</h3>
                            </div>
                            <div class="line1"></div>
                            <div class="box-body">
                            <div class="day">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="dayName">Monday</div> <label for="ischecked1">
                                            <input name="ischecked1" value="" type="hidden"><input name="ischecked1" id="ischecked1" value="1" tabindex="1" class="form" type="checkbox"> Working</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div>from
                                        <select name="stime1" id="stime1" class="select change_slots" rel="1" tabindex="2">
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:30">05:30</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:30">06:30</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:30">07:30</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:30">08:30</option>
                                            <option value="09:00" selected="selected">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                        </select>
                                        </div>
                                        <div class="time_margin">
                                        to
                                        <select name="etime1" id="etime1" class="select change_slots" rel="1" tabindex="3">
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:30">05:30</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:30">06:30</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:30">07:30</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:30">08:30</option>
                                            <option value="09:00">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00" selected="selected">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                        </select></div>								</div>
                                    <div class="col-md-3">
                                        timeslot duration
                                        <select name="time1" id="time1" class="select change_slots" rel="1" tabindex="4">
                                            <option value="10">10 Minutes</option>
                                            <option value="15">15 Minutes</option>
                                            <option value="30" selected="selected">30 Minutes</option>
                                            <option value="45">45 Minutes</option>
                                            <option value="60">60 Minutes</option>
                                        </select>									<a href="javascript:;" rel="1" rev="hide" class="del_slots">add breakes</a>
                                    </div>
                                    <div class="col-sm-2">
									<span id="del1" style="display:none">
										<div id="checkboxDiv1" class="slot-div"><input name="displayCheck1[]" checked="checked" value="09:00" type="checkbox">9:00 am<br><input name="displayCheck1[]" checked="checked" value="09:30" type="checkbox">9:30 am<br><input name="displayCheck1[]" checked="checked" value="10:00" type="checkbox">10:00 am<br><input name="displayCheck1[]" checked="checked" value="10:30" type="checkbox">10:30 am<br><input name="displayCheck1[]" checked="checked" value="11:00" type="checkbox">11:00 am<br><input name="displayCheck1[]" checked="checked" value="11:30" type="checkbox">11:30 am<br><input name="displayCheck1[]" checked="checked" value="12:00" type="checkbox">12:00 pm<br><input name="displayCheck1[]" checked="checked" value="12:30" type="checkbox">12:30 pm<br><input name="displayCheck1[]" checked="checked" value="13:00" type="checkbox">1:00 pm<br><input name="displayCheck1[]" checked="checked" value="13:30" type="checkbox">1:30 pm<br><input name="displayCheck1[]" checked="checked" value="14:00" type="checkbox">2:00 pm<br><input name="displayCheck1[]" checked="checked" value="14:30" type="checkbox">2:30 pm<br><input name="displayCheck1[]" checked="checked" value="15:00" type="checkbox">3:00 pm<br><input name="displayCheck1[]" checked="checked" value="15:30" type="checkbox">3:30 pm<br><input name="displayCheck1[]" checked="checked" value="16:00" type="checkbox">4:00 pm<br><input name="displayCheck1[]" checked="checked" value="16:30" type="checkbox">4:30 pm<br><input name="displayCheck1[]" checked="checked" value="17:00" type="checkbox">5:00 pm<br></div>
									</span>
                                        <span class="message"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="day">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="dayName">Tuesday</div> <label for="ischecked2">
                                            <input name="ischecked2" value="" type="hidden"><input name="ischecked2" id="ischecked2" value="1" tabindex="5" class="form" type="checkbox"> Working</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                        from
                                        <select name="stime2" id="stime2" class="select change_slots" rel="2" tabindex="6">
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:30">05:30</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:30">06:30</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:30">07:30</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:30">08:30</option>
                                            <option value="09:00" selected="selected">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                        </select></div>
                                        <div class="time_margin">
                                            to
                                        <select name="etime2" id="etime2" class="select change_slots" rel="2" tabindex="7">
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:30">05:30</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:30">06:30</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:30">07:30</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:30">08:30</option>
                                            <option value="09:00">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00" selected="selected">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                        </select></div>								</div>
                                    <div class="col-md-3">
                                        timeslot duration
                                        <select name="time2" id="time2" class="select change_slots" rel="2" tabindex="8">
                                            <option value="10">10 Minutes</option>
                                            <option value="15">15 Minutes</option>
                                            <option value="30" selected="selected">30 Minutes</option>
                                            <option value="45">45 Minutes</option>
                                            <option value="60">60 Minutes</option>
                                        </select>									<a href="javascript:;" rel="2" rev="hide" class="del_slots">add breakes</a>
                                    </div>
                                    <div class="col-sm-2">
									<span id="del2" style="display:none">
										<div id="checkboxDiv2" class="slot-div"><input name="displayCheck2[]" checked="checked" value="09:00" type="checkbox">9:00 am<br><input name="displayCheck2[]" checked="checked" value="09:30" type="checkbox">9:30 am<br><input name="displayCheck2[]" checked="checked" value="10:00" type="checkbox">10:00 am<br><input name="displayCheck2[]" checked="checked" value="10:30" type="checkbox">10:30 am<br><input name="displayCheck2[]" checked="checked" value="11:00" type="checkbox">11:00 am<br><input name="displayCheck2[]" checked="checked" value="11:30" type="checkbox">11:30 am<br><input name="displayCheck2[]" checked="checked" value="12:00" type="checkbox">12:00 pm<br><input name="displayCheck2[]" checked="checked" value="12:30" type="checkbox">12:30 pm<br><input name="displayCheck2[]" checked="checked" value="13:00" type="checkbox">1:00 pm<br><input name="displayCheck2[]" checked="checked" value="13:30" type="checkbox">1:30 pm<br><input name="displayCheck2[]" checked="checked" value="14:00" type="checkbox">2:00 pm<br><input name="displayCheck2[]" checked="checked" value="14:30" type="checkbox">2:30 pm<br><input name="displayCheck2[]" checked="checked" value="15:00" type="checkbox">3:00 pm<br><input name="displayCheck2[]" checked="checked" value="15:30" type="checkbox">3:30 pm<br><input name="displayCheck2[]" checked="checked" value="16:00" type="checkbox">4:00 pm<br><input name="displayCheck2[]" checked="checked" value="16:30" type="checkbox">4:30 pm<br><input name="displayCheck2[]" checked="checked" value="17:00" type="checkbox">5:00 pm<br></div>
									</span>
                                        <span class="message"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="day">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="dayName">Wednesday</div> <label for="ischecked3">
                                            <input name="ischecked3" value="" type="hidden"><input name="ischecked3" id="ischecked3" value="1" tabindex="9" class="form" type="checkbox"> Working</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                        from
                                        <select name="stime3" id="stime3" class="select change_slots" rel="3" tabindex="10">
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:30">05:30</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:30">06:30</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:30">07:30</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:30">08:30</option>
                                            <option value="09:00" selected="selected">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                        </select></div>
                                        <div class="time_margin">
                                            to
                                        <select name="etime3" id="etime3" class="select change_slots" rel="3" tabindex="11">
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:30">05:30</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:30">06:30</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:30">07:30</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:30">08:30</option>
                                            <option value="09:00">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00" selected="selected">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                        </select></div>								</div>
                                    <div class="col-md-3">
                                        timeslot duration
                                        <select name="time3" id="time3" class="select change_slots" rel="3" tabindex="12">
                                            <option value="10">10 Minutes</option>
                                            <option value="15">15 Minutes</option>
                                            <option value="30" selected="selected">30 Minutes</option>
                                            <option value="45">45 Minutes</option>
                                            <option value="60">60 Minutes</option>
                                        </select>									<a href="javascript:;" rel="3" rev="hide" class="del_slots">add breakes</a>
                                    </div>
                                    <div class="col-sm-2">
									<span id="del3" style="display:none">
										<div id="checkboxDiv3" class="slot-div"><input name="displayCheck3[]" checked="checked" value="09:00" type="checkbox">9:00 am<br><input name="displayCheck3[]" checked="checked" value="09:30" type="checkbox">9:30 am<br><input name="displayCheck3[]" checked="checked" value="10:00" type="checkbox">10:00 am<br><input name="displayCheck3[]" checked="checked" value="10:30" type="checkbox">10:30 am<br><input name="displayCheck3[]" checked="checked" value="11:00" type="checkbox">11:00 am<br><input name="displayCheck3[]" checked="checked" value="11:30" type="checkbox">11:30 am<br><input name="displayCheck3[]" checked="checked" value="12:00" type="checkbox">12:00 pm<br><input name="displayCheck3[]" checked="checked" value="12:30" type="checkbox">12:30 pm<br><input name="displayCheck3[]" checked="checked" value="13:00" type="checkbox">1:00 pm<br><input name="displayCheck3[]" checked="checked" value="13:30" type="checkbox">1:30 pm<br><input name="displayCheck3[]" checked="checked" value="14:00" type="checkbox">2:00 pm<br><input name="displayCheck3[]" checked="checked" value="14:30" type="checkbox">2:30 pm<br><input name="displayCheck3[]" checked="checked" value="15:00" type="checkbox">3:00 pm<br><input name="displayCheck3[]" checked="checked" value="15:30" type="checkbox">3:30 pm<br><input name="displayCheck3[]" checked="checked" value="16:00" type="checkbox">4:00 pm<br><input name="displayCheck3[]" checked="checked" value="16:30" type="checkbox">4:30 pm<br><input name="displayCheck3[]" checked="checked" value="17:00" type="checkbox">5:00 pm<br></div>
									</span>
                                        <span class="message"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="day">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="dayName">Thursday</div> <label for="ischecked4">
                                            <input name="ischecked4" value="" type="hidden"><input name="ischecked4" id="ischecked4" value="1" tabindex="13" class="form" type="checkbox"> Working</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                        from
                                        <select name="stime4" id="stime4" class="select change_slots" rel="4" tabindex="14">
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:30">05:30</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:30">06:30</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:30">07:30</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:30">08:30</option>
                                            <option value="09:00" selected="selected">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                        </select></div>
                                        <div class="time_margin">
                                            to
                                        <select name="etime4" id="etime4" class="select change_slots" rel="4" tabindex="15">
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:30">05:30</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:30">06:30</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:30">07:30</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:30">08:30</option>
                                            <option value="09:00">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00" selected="selected">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                        </select></div>								</div>
                                    <div class="col-md-3">
                                        timeslot duration
                                        <select name="time4" id="time4" class="select change_slots" rel="4" tabindex="16">
                                            <option value="10">10 Minutes</option>
                                            <option value="15">15 Minutes</option>
                                            <option value="30" selected="selected">30 Minutes</option>
                                            <option value="45">45 Minutes</option>
                                            <option value="60">60 Minutes</option>
                                        </select>									<a href="javascript:;" rel="4" rev="hide" class="del_slots">add breakes</a>
                                    </div>
                                    <div class="col-sm-2">
									<span id="del4" style="display:none">
										<div id="checkboxDiv4" class="slot-div"><input name="displayCheck4[]" checked="checked" value="09:00" type="checkbox">9:00 am<br><input name="displayCheck4[]" checked="checked" value="09:30" type="checkbox">9:30 am<br><input name="displayCheck4[]" checked="checked" value="10:00" type="checkbox">10:00 am<br><input name="displayCheck4[]" checked="checked" value="10:30" type="checkbox">10:30 am<br><input name="displayCheck4[]" checked="checked" value="11:00" type="checkbox">11:00 am<br><input name="displayCheck4[]" checked="checked" value="11:30" type="checkbox">11:30 am<br><input name="displayCheck4[]" checked="checked" value="12:00" type="checkbox">12:00 pm<br><input name="displayCheck4[]" checked="checked" value="12:30" type="checkbox">12:30 pm<br><input name="displayCheck4[]" checked="checked" value="13:00" type="checkbox">1:00 pm<br><input name="displayCheck4[]" checked="checked" value="13:30" type="checkbox">1:30 pm<br><input name="displayCheck4[]" checked="checked" value="14:00" type="checkbox">2:00 pm<br><input name="displayCheck4[]" checked="checked" value="14:30" type="checkbox">2:30 pm<br><input name="displayCheck4[]" checked="checked" value="15:00" type="checkbox">3:00 pm<br><input name="displayCheck4[]" checked="checked" value="15:30" type="checkbox">3:30 pm<br><input name="displayCheck4[]" checked="checked" value="16:00" type="checkbox">4:00 pm<br><input name="displayCheck4[]" checked="checked" value="16:30" type="checkbox">4:30 pm<br><input name="displayCheck4[]" checked="checked" value="17:00" type="checkbox">5:00 pm<br></div>
									</span>
                                        <span class="message"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="day">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="dayName">Friday</div> <label for="ischecked5">
                                            <input name="ischecked5" value="" type="hidden"><input name="ischecked5" id="ischecked5" value="1" tabindex="17" class="form" type="checkbox"> Working</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                        from
                                        <select name="stime5" id="stime5" class="select change_slots" rel="5" tabindex="18">
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:30">05:30</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:30">06:30</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:30">07:30</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:30">08:30</option>
                                            <option value="09:00" selected="selected">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                        </select></div>
                                        <div class="time_margin">
                                            to
                                        <select name="etime5" id="etime5" class="select change_slots" rel="5" tabindex="19">
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:30">05:30</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:30">06:30</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:30">07:30</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:30">08:30</option>
                                            <option value="09:00">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00" selected="selected">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                        </select></div>								</div>
                                    <div class="col-md-3">
                                        timeslot duration
                                        <select name="time5" id="time5" class="select change_slots" rel="5" tabindex="20">
                                            <option value="10">10 Minutes</option>
                                            <option value="15">15 Minutes</option>
                                            <option value="30" selected="selected">30 Minutes</option>
                                            <option value="45">45 Minutes</option>
                                            <option value="60">60 Minutes</option>
                                        </select>									<a href="javascript:;" rel="5" rev="hide" class="del_slots">add breakes</a>
                                    </div>
                                    <div class="col-sm-2">
									<span id="del5" style="display:none">
										<div id="checkboxDiv5" class="slot-div"><input name="displayCheck5[]" checked="checked" value="09:00" type="checkbox">9:00 am<br><input name="displayCheck5[]" checked="checked" value="09:30" type="checkbox">9:30 am<br><input name="displayCheck5[]" checked="checked" value="10:00" type="checkbox">10:00 am<br><input name="displayCheck5[]" checked="checked" value="10:30" type="checkbox">10:30 am<br><input name="displayCheck5[]" checked="checked" value="11:00" type="checkbox">11:00 am<br><input name="displayCheck5[]" checked="checked" value="11:30" type="checkbox">11:30 am<br><input name="displayCheck5[]" checked="checked" value="12:00" type="checkbox">12:00 pm<br><input name="displayCheck5[]" checked="checked" value="12:30" type="checkbox">12:30 pm<br><input name="displayCheck5[]" checked="checked" value="13:00" type="checkbox">1:00 pm<br><input name="displayCheck5[]" checked="checked" value="13:30" type="checkbox">1:30 pm<br><input name="displayCheck5[]" checked="checked" value="14:00" type="checkbox">2:00 pm<br><input name="displayCheck5[]" checked="checked" value="14:30" type="checkbox">2:30 pm<br><input name="displayCheck5[]" checked="checked" value="15:00" type="checkbox">3:00 pm<br><input name="displayCheck5[]" checked="checked" value="15:30" type="checkbox">3:30 pm<br><input name="displayCheck5[]" checked="checked" value="16:00" type="checkbox">4:00 pm<br><input name="displayCheck5[]" checked="checked" value="16:30" type="checkbox">4:30 pm<br><input name="displayCheck5[]" checked="checked" value="17:00" type="checkbox">5:00 pm<br></div>
									</span>
                                        <span class="message"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="day">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="dayName">Saturday</div> <label for="ischecked6">
                                            <input name="ischecked6" value="" type="hidden"><input name="ischecked6" id="ischecked6" value="1" tabindex="21" class="form" type="checkbox"> Working</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                        from
                                        <select name="stime6" id="stime6" class="select change_slots" rel="6" tabindex="22">
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:30">05:30</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:30">06:30</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:30">07:30</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:30">08:30</option>
                                            <option value="09:00" selected="selected">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                        </select></div>
                                        <div class="time_margin">
                                            to
                                        <select name="etime6" id="etime6" class="select change_slots" rel="6" tabindex="23">
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:30">05:30</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:30">06:30</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:30">07:30</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:30">08:30</option>
                                            <option value="09:00">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00" selected="selected">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                        </select></div>								</div>
                                    <div class="col-md-3">
                                        timeslot duration
                                        <select name="time6" id="time6" class="select change_slots" rel="6" tabindex="24">
                                            <option value="10">10 Minutes</option>
                                            <option value="15">15 Minutes</option>
                                            <option value="30" selected="selected">30 Minutes</option>
                                            <option value="45">45 Minutes</option>
                                            <option value="60">60 Minutes</option>
                                        </select>									<a href="javascript:;" rel="6" rev="hide" class="del_slots">add breakes</a>
                                    </div>
                                    <div class="col-sm-2">
									<span id="del6" style="display:none">
										<div id="checkboxDiv6" class="slot-div"><input name="displayCheck6[]" checked="checked" value="09:00" type="checkbox">9:00 am<br><input name="displayCheck6[]" checked="checked" value="09:30" type="checkbox">9:30 am<br><input name="displayCheck6[]" checked="checked" value="10:00" type="checkbox">10:00 am<br><input name="displayCheck6[]" checked="checked" value="10:30" type="checkbox">10:30 am<br><input name="displayCheck6[]" checked="checked" value="11:00" type="checkbox">11:00 am<br><input name="displayCheck6[]" checked="checked" value="11:30" type="checkbox">11:30 am<br><input name="displayCheck6[]" checked="checked" value="12:00" type="checkbox">12:00 pm<br><input name="displayCheck6[]" checked="checked" value="12:30" type="checkbox">12:30 pm<br><input name="displayCheck6[]" checked="checked" value="13:00" type="checkbox">1:00 pm<br><input name="displayCheck6[]" checked="checked" value="13:30" type="checkbox">1:30 pm<br><input name="displayCheck6[]" checked="checked" value="14:00" type="checkbox">2:00 pm<br><input name="displayCheck6[]" checked="checked" value="14:30" type="checkbox">2:30 pm<br><input name="displayCheck6[]" checked="checked" value="15:00" type="checkbox">3:00 pm<br><input name="displayCheck6[]" checked="checked" value="15:30" type="checkbox">3:30 pm<br><input name="displayCheck6[]" checked="checked" value="16:00" type="checkbox">4:00 pm<br><input name="displayCheck6[]" checked="checked" value="16:30" type="checkbox">4:30 pm<br><input name="displayCheck6[]" checked="checked" value="17:00" type="checkbox">5:00 pm<br></div>
									</span>
                                        <span class="message"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="day">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="dayName">Sunday</div> <label for="ischecked7">
                                            <input name="ischecked7" value="" type="hidden"><input name="ischecked7" id="ischecked7" value="1" tabindex="25" class="form" type="checkbox"> Working</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                        from
                                        <select name="stime7" id="stime7" class="select change_slots" rel="7" tabindex="26">
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:30">05:30</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:30">06:30</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:30">07:30</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:30">08:30</option>
                                            <option value="09:00" selected="selected">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                        </select></div>
                                        <div class="time_margin">
                                            to
                                        <select name="etime7" id="etime7" class="select change_slots" rel="7" tabindex="27">
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:30">05:30</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:30">06:30</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:30">07:30</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:30">08:30</option>
                                            <option value="09:00">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00" selected="selected">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                        </select></div>								</div>
                                    <div class="col-md-3">
                                        timeslot duration
                                        <select name="time7" id="time7" class="select change_slots" rel="7" tabindex="28">
                                            <option value="10">10 Minutes</option>
                                            <option value="15">15 Minutes</option>
                                            <option value="30" selected="selected">30 Minutes</option>
                                            <option value="45">45 Minutes</option>
                                            <option value="60">60 Minutes</option>
                                        </select>									<a href="javascript:;" rel="7" rev="hide" class="del_slots">add breakes</a>
                                    </div>
                                    <div class="col-sm-2">
									<span id="del7" style="display:none">
										<div id="checkboxDiv7" class="slot-div"><input name="displayCheck7[]" checked="checked" value="09:00" type="checkbox">9:00 am<br><input name="displayCheck7[]" checked="checked" value="09:30" type="checkbox">9:30 am<br><input name="displayCheck7[]" checked="checked" value="10:00" type="checkbox">10:00 am<br><input name="displayCheck7[]" checked="checked" value="10:30" type="checkbox">10:30 am<br><input name="displayCheck7[]" checked="checked" value="11:00" type="checkbox">11:00 am<br><input name="displayCheck7[]" checked="checked" value="11:30" type="checkbox">11:30 am<br><input name="displayCheck7[]" checked="checked" value="12:00" type="checkbox">12:00 pm<br><input name="displayCheck7[]" checked="checked" value="12:30" type="checkbox">12:30 pm<br><input name="displayCheck7[]" checked="checked" value="13:00" type="checkbox">1:00 pm<br><input name="displayCheck7[]" checked="checked" value="13:30" type="checkbox">1:30 pm<br><input name="displayCheck7[]" checked="checked" value="14:00" type="checkbox">2:00 pm<br><input name="displayCheck7[]" checked="checked" value="14:30" type="checkbox">2:30 pm<br><input name="displayCheck7[]" checked="checked" value="15:00" type="checkbox">3:00 pm<br><input name="displayCheck7[]" checked="checked" value="15:30" type="checkbox">3:30 pm<br><input name="displayCheck7[]" checked="checked" value="16:00" type="checkbox">4:00 pm<br><input name="displayCheck7[]" checked="checked" value="16:30" type="checkbox">4:30 pm<br><input name="displayCheck7[]" checked="checked" value="17:00" type="checkbox">5:00 pm<br></div>
									</span>
                                        <span class="message"></span>
                                    </div>
                                </div>
                            </div>
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
                required: true,
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
                required: "Please provide preferred number",
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

    //Schedule maintain
    if( !$("#ischecked7").is(":checked") ) {
        $("#ischecked7").parents('.whiterow').find('.leftblue-grad').addClass("whitegrey-grad").removeClass("leftblue-grad");
    }
    if( !$("#ischecked6").is(":checked") ) {
        $("#ischecked6").parents('.whiterow').find('.leftblue-grad').addClass("whitegrey-grad").removeClass("leftblue-grad");
    }
    if( !$("#ischecked5").is(":checked") ) {
        $("#ischecked5").parents('.whiterow').find('.leftblue-grad').addClass("whitegrey-grad").removeClass("leftblue-grad");
    }
    if( !$("#ischecked4").is(":checked") ) {
        $("#ischecked4").parents('.whiterow').find('.leftblue-grad').addClass("whitegrey-grad").removeClass("leftblue-grad");
    }
    if( !$("#ischecked3").is(":checked") ) {
        $("#ischecked3").parents('.whiterow').find('.leftblue-grad').addClass("whitegrey-grad").removeClass("leftblue-grad");
    }
    if( !$("#ischecked2").is(":checked") ) {
        $("#ischecked2").parents('.whiterow').find('.leftblue-grad').addClass("whitegrey-grad").removeClass("leftblue-grad");
    }
    if( !$("#ischecked1").is(":checked") ) {
        $("#ischecked1").parents('.whiterow').find('.leftblue-grad').addClass("whitegrey-grad").removeClass("leftblue-grad");
    }
});

$("#ischecked7").change(function(){
    if($("#ischecked7").is(":checked")) {
        $("#ischecked7").parents('.whiterow').find('.whitegrey-grad').addClass("leftblue-grad").removeClass("whitegrey-grad");
    } else {
        $("#ischecked7").parents('.whiterow').find('.leftblue-grad').addClass("whitegrey-grad").removeClass("leftblue-grad");
    }
});
$("#ischecked6").change(function(){
    if($("#ischecked6").is(":checked")) {
        $("#ischecked6").parents('.whiterow').find('.whitegrey-grad').addClass("leftblue-grad").removeClass("whitegrey-grad");
    } else {
        $("#ischecked6").parents('.whiterow').find('.leftblue-grad').addClass("whitegrey-grad").removeClass("leftblue-grad");
    }
});
$("#ischecked5").change(function(){
    if($("#ischecked5").is(":checked")) {
        $("#ischecked5").parents('.whiterow').find('.whitegrey-grad').addClass("leftblue-grad").removeClass("whitegrey-grad");
    } else {
        $("#ischecked5").parents('.whiterow').find('.leftblue-grad').addClass("whitegrey-grad").removeClass("leftblue-grad");
    }
});
$("#ischecked4").change(function(){
    if($("#ischecked4").is(":checked")) {
        $("#ischecked4").parents('.whiterow').find('.whitegrey-grad').addClass("leftblue-grad").removeClass("whitegrey-grad");
    } else {
        $("#ischecked4").parents('.whiterow').find('.leftblue-grad').addClass("whitegrey-grad").removeClass("leftblue-grad");
    }
});
$("#ischecked3").change(function(){
    if($("#ischecked3").is(":checked")) {
        $("#ischecked3").parents('.whiterow').find('.whitegrey-grad').addClass("leftblue-grad").removeClass("whitegrey-grad");
    } else {
        $("#ischecked3").parents('.whiterow').find('.leftblue-grad').addClass("whitegrey-grad").removeClass("leftblue-grad");
    }
});
$("#ischecked2").change(function(){
    if($("#ischecked2").is(":checked")) {
        $("#ischecked2").parents('.whiterow').find('.whitegrey-grad').addClass("leftblue-grad").removeClass("whitegrey-grad");
    } else {
        $("#ischecked2").parents('.whiterow').find('.leftblue-grad').addClass("whitegrey-grad").removeClass("leftblue-grad");
    }
});
$("#ischecked1").change(function(){
    if($("#ischecked1").is(":checked")) {
        $("#ischecked1").parents('.whiterow').find('.whitegrey-grad').addClass("leftblue-grad").removeClass("whitegrey-grad");
    } else {
        $("#ischecked1").parents('.whiterow').find('.leftblue-grad').addClass("whitegrey-grad").removeClass("leftblue-grad");
    }
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
    setDeleteTimeslots(num, 2);
    //$('#del'+num).fadeIn(500);
    var ctls = $("a[rel='"+num+"']");
    ctls.attr('rev','show');
    //ctls.html('save timeslots');
});

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