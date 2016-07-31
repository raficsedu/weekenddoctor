@extends('layouts.master')

@section('content')
<section class="bodySec joinUsBody clearfix">
    <div class="container">
        <section class="row">
            <h1>Get Started with WeekendDocs</h1>
            <div class="line1"></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="padding:0px;">
                <div class="singBody">
                    <form>


                        <div class="singRow clearfix">
                            <div class="box-in">

                                <label class="clearfix">First Name</label>
                                <input type="text" placeholder="First Name" class="txtBox2 month">
                            </div>

                            <div class="box-in">

                                <label class="clearfix">Last Name</label>
                                <input type="text" placeholder="Last Name" class="txtBox2 month">
                            </div>

                            <div class="box-in">

                                <label class="clearfix">Your Specialty</label>
                                <select class="countryCode txtBox2" type="text">
                                    <option>Select Your Specialty</option>
                                    <option>Select Your Specialty</option>
                                </select>
                            </div>





                            <div class="box-in1">

                                <label class="clearfix">Your Direct Phone Number</label>
                                <input type="text" placeholder="Your Direct Phone Number" class="txtBox2 month">
                            </div>

                            <div class="box-in1">

                                <label class="clearfix">Zip Code</label>
                                <input type="text" placeholder="Zip Code" class="txtBox2 month">
                            </div>
                            <br>
                            <br>


                            <div class="box-in1">

                                <label class="clearfix">Your Email</label>
                                <input type="text" placeholder="Your Email" class="txtBox2 month">
                            </div>
                            <br>
                            <br>
                        </div>



                        <div class="singRow">
                            <a class="signBtn" href="#" style="background:#298DC6;">Get Started</a>
                        </div>

                    </form>
                </div>
            </div>

        </section>
    </div>
</section>
@endsection