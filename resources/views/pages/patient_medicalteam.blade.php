@extends('layouts.patient')

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
                        <p>Medical Team Page</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
@endsection
<style type="text/css" href="styles.css">
    .tBox {
        width: 100% !important;
    }
    .fDiv {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }

    /*.clip-check {
      margin-bottom: 10px;
      margin-top: 10px;
      padding-left: 0;
  }
  .clip-check label {
      cursor: pointer;
      display: inline-block;
      font-size: 13px;
      margin-right: 15px;
      padding-left: 30px !important;
      position: relative;
      line-height: 23px;
      transition: border 0.2s linear 0s, color 0.2s linear 0s;
      white-space: nowrap;
  }
  .clip-check label:before {
      background-color: #ffffff;
      border: 1px solid #c8c7cc;
      content: "";
      display: inline-block;
      height: 20px;
      left: 0;
      margin-right: 10px;
      position: absolute;
      width: 20px;
      border-radius: 0;
      top: 1px;
      transition: border 0.2s linear 0s, color 0.2s linear 0s;
  }
  .clip-check label:after {
      display: inline-block;
      font-size: 11px;
      height: 19px;
      left: 4px;
      position: absolute;
      top: -1px;
      transition: border 0.2s linear 0s, color 0.2s linear 0s;
      width: 19px;
  }
  .clip-check input[type="checkbox"] {
      display: none;
  }
  .clip-check input[type="checkbox"]:checked + label:before {
      border-width: 10px;
  }
  .clip-check input[type="checkbox"]:checked + label:after {
      color: #fff;
      content: "\f00c";
      font-family: "FontAwesome";
  }
  .clip-check input[type="checkbox"][disabled] + label {
      opacity: 0.65;
  }
  .clip-check input[type="checkbox"][disabled] + label:before {
      background-color: #F8F8F8;
  }
  .clip-check.check-md label {
      margin-right: 15px;
      padding-left: 35px !important;
      line-height: 28px;
  }
  .clip-check.check-md label:before {
      height: 25px;
      width: 25px;
  }
  .clip-check.check-md label:after {
      font-size: 14px;
      height: 24px;
      left: 5px;
      width: 24px;
  }
  .clip-check.check-md input[type="checkbox"]:checked + label:before {
      border-width: 12px;
  }
  .clip-check.check-lg label {
      margin-right: 15px;
      padding-left: 40px !important;
      line-height: 33px;
  }
  .clip-check.check-lg label:before {
      height: 30px;
      width: 30px;
  }
  .clip-check.check-lg label:after {
      font-size: 17px;
      height: 29px;
      left: 6px;
      width: 29px;
  }
  .clip-check.check-lg input[type="checkbox"]:checked + label:before {
      border-width: 15px;
  }

  .clip-check.check-success input[type="checkbox"]:checked + label:before {
      border-color: #5cb85c;
  }

  .clip-check.check-primary input[type="checkbox"]:checked + label:before {
      border-color: #007AFF;
  }

  .clip-check.check-warning input[type="checkbox"]:checked + label:before {
      border-color: #eea236;
  }

  .clip-check.check-danger input[type="checkbox"]:checked + label:before {
      border-color: #d43f3a;
  }

  .clip-check.check-info input[type="checkbox"]:checked + label:before {
      border-color: #46b8da;
  }

  .clip-check.check-purple input[type="checkbox"]:checked + label:before {
      border-color: #804C75;
  }*/
</style>
@section('footer_custom_script')
<script>
    jQuery(function($) {
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
                },
            }
        });
    });

    $("#wellness_reminders").on("click",function(){
     if($('#wellness_reminders').prop('checked')) {
       $('.wellness_reminders').val("true");
   } else {
       $('.wellness_reminders').val("false");
   }
})
    $("#appointment_reminders").on("click",function(){
     if($('#appointment_reminders').prop('checked')) {
       $('.appointment_reminders').val("true");
   } else {
       $('.appointment_reminders').val("false");
   }
})
    $("#is_rescheduled_or_cancelled").on("click",function(){
     if($('#is_rescheduled_or_cancelled').prop('checked')) {
       $('.is_rescheduled_or_cancelled').val("true");
   } else {
       $('.is_rescheduled_or_cancelled').val("false");
   }
})
    $("#notify_wellness_reminders").on("click",function(){
     if($('#notify_wellness_reminders').prop('checked')) {
       $('.notify_wellness_reminders').val("true");
   } else {
       $('.notify_wellness_reminders').val("false");
   }
})

    ////////////////////////////////////////////////
    $("#american_indian_or_alaska_native").on("click",function(){
     if($('#american_indian_or_alaska_native').prop('checked')) {
       $('.american_indian_or_alaska_native').val("true");
   } else {
       $('.american_indian_or_alaska_native').val("false");
   }
})
    $("#asian").on("click",function(){
     if($('#asian').prop('checked')) {
       $('.asian').val("true");
   } else {
       $('.asian').val("false");
   }
})
    $("#black_or_african_american").on("click",function(){
     if($('#black_or_african_american').prop('checked')) {
       $('.black_or_african_american').val("true");
   } else {
       $('.black_or_african_american').val("false");
   }
})
    $("#native_hawaiian").on("click",function(){
     if($('#native_hawaiian').prop('checked')) {
       $('.native_hawaiian').val("true");
   } else {
       $('.native_hawaiian').val("false");
   }
})
    $("#other_pacific_islander").on("click",function(){
     if($('#other_pacific_islander').prop('checked')) {
       $('.other_pacific_islander').val("true");
   } else {
       $('.other_pacific_islander').val("false");
   }
})
    $("#white").on("click",function(){
     if($('#white').prop('checked')) {
       $('.white').val("true");
   } else {
       $('.white').val("false");
   }
})
    $("#other").on("click",function(){
     if($('#other').prop('checked')) {
       $('.other').val("true");
   } else {
       $('.other').val("false");
   }
})
    $("#decline_to_answer").on("click",function(){
     if($('#decline_to_answer').prop('checked')) {
       $('.decline_to_answer').val("true");
   } else {
       $('.decline_to_answer').val("false");
   }
})
    $("#hispanic_or_latino").on("click",function(){
     if($('#hispanic_or_latino').prop('checked')) {
       $('.hispanic_or_latino').val("true");
   } else {
       $('.hispanic_or_latino').val("false");
   }
})
    $("#not_hispanic_or_latino").on("click",function(){
     if($('#not_hispanic_or_latino').prop('checked')) {
       $('.not_hispanic_or_latino').val("true");
   } else {
       $('.not_hispanic_or_latino').val("false");
   }
})
    $("#decline_to_answe").on("click",function(){
     if($('#decline_to_answe').prop('checked')) {
       $('.decline_to_answe').val("true");
   } else {
       $('.decline_to_answe').val("false");
   }
})
</script>
@endsection