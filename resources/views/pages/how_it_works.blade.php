@extends('layouts.master')

@section('content')
<section class="workBanner clearfix">
    <div class="container">
        <section class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 clearfix">
                <div class="srhDoctBox">
                    <h2>Driving Traffic to Your </h2>
                    <h2>Medical Practice</h2>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 srchDoctorPic clearfix">
                <img src="{{url('public/images/work_banner.png')}}" alt=""/>
            </div>
        </section>
    </div>
</section>
<article class="breadCrmBox clearfix">
    <div class="container">
        <section class="row">
            <ul class="breadCrmList">
                <li><a href="index.html">Home > </a></li>
                <li><a href="#" class="breadCrmActive">Driving Traffic to Your Medical Practice</a></li>
            </ul>
        </section>
    </div>
</article>
<section class="bodySec itWork clearfix">
    <article class="">
        <div class="container">
            <section class="row">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 clearfix">
                    <h1 style="font-size:26px;">Bridging The Gap</h1>
                    <p>WeekendDocs bridges the gap between busy NYC professionals and medical practitioners who seek to offer their services during weekend hours.With WeekendDocs, medical offices and professionals that are open for business over weekends can:</p>
                    <ul class="workLlist">
                        <li>List their medical services with a view to receive patients over weekends</li>
                        <li>Enjoy more business with a targeted market of professionals who only have time     	    over the weekend</li>
                        <li>Administer a proper, unrushed medical service to clients who’d otherwise have lim   	    ited time during the working week</li>
                        <li> Instantly boost their exposure among a very specific target market.</li>
                    </ul>

                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 clearfix">
                    <div class="workImg"><img src="{{url('public/images/img01.png')}}" alt=""/></div>
                </div>
            </section>
        </div>
    </article>
    <article class="">
        <div class="container">
            <section class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 clearfix">
                    <div class="workImg"><img src="{{url('public/images/img02.png')}}" alt=""/></div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 text-right clearfix">
                    <h1 style="font-size:26px;">Listing Your Practice  is Simple And Easy</h1>
                    <p>After a straight-forward registration process and medical professionals can get listed by service-category, location or medical field specialty.For the busy professional who only has weekends open for a doctor’s visit, WeekendDocs helps you to:</p>
                    <ul class="workLlist text-left">
                        <li>List their medical services with a view to receive patients over weekends</li>
                        <li>Enjoy more business with a targeted market of professionals who only have time     	    over the weekend</li>
                        <li>Administer a proper, unrushed medical service to clients who’d otherwise have lim   	    ited time during the working week</li>
                        <li> Instantly boost their exposure among a very specific target market.</li>
                    </ul>

                </div>
            </section>
        </div>
    </article>
    <article class="">
        <div class="container">
            <section class="row">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 clearfix">
                    <h1 style="font-size:26px;">All New York City Medical Professionals are <br/>
                        Invited to Add Their Listings</h1>
                    <p>Whether your practice offers Acupuncture, Dentistry, Optometry, GP Services, etc. — if you are open on weekends, there is a long list of eager New York professionals waiting to find you./p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 clearfix">
                    <div class="workImg"><img src="{{url('public/images/img03.png')}}" alt=""/></div>
                </div>
            </section>
        </div>
    </article>
    <article class="">
        <div class="container">
            <section class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 clearfix">
                    <div class="workImg"><img src="{{url('public/images/img04.png')}}" alt=""/></div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 text-right clearfix">
                    <h1 style="font-size:26px;">Advanced Searches</h1>
                    <p>NYC Professionals can Run Advanced Searches with Search Results Tailored to your Exact Specifications. Whether you’re based Brooklyn, Manhattan, Queens, or The Bronx- never again will you have to compromise your health as a result of limited options by way of weekend-open medical services. With the WeekendDocs platform, all the information you need is always right at the edge of your fingertips and you can run an advanced search to find exactly what you’re looking for in no time</p>
                </div>
            </section>
            <div class="text-center clearfix today">
                <h6>List your medical practice on WeekendDocs Today! </h6>
                <a href="#">Click Here</a>
            </div>
        </div>
    </article>
</section>
@endsection