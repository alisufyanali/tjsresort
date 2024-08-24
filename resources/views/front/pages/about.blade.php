@extends('front.layouts.app')

@section('style')
@endsection


@section('content')
@php
    $homeContent = $data['homeContent'];
@endphp

<!--================Banner Area =================-->
<section class="banner_area">
    <div class="container">
        <div class="banner_inner_content">
            <h3>About Us</h3>
            <ul>
                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about-us') }}">About Us</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->

<!--================Resort Story Area =================-->
<section class="introduction_area resort_story_area">
    <div class="container">
        <div class="row introduction_inner">
            <div class="col-md-5">
                <a href="#" class="introduction_img">
                    <img src="{{ asset('public/assets/img/resort-story-img.jpg') }}" alt="">
                </a>
            </div>
            <div class="col-md-7">
                <div class="introduction_left_text">
                    <div class="resort_title">
                        <h2>Our <span>Resort Story</span></h2>
                        <h5>ESCAPE THE HIGHWAY CHAOS AND DOWN SHIFT AT TJ’S TRUCK RESORT</h5>
                    </div>
                    <h4>We are Available for business</h4>
                <p>Comprised of 120 truck parking spaces on approximately 6 acres. TJ’s Truck Resort is the first-ever Semi-truck Resort in America, designed exclusively for truck drivers. It offers a unique, tranquil, and safe environment for truck drivers to unwind and reset during their Department of Transportation mandated breaks. This resort is set up away from the movement of cars, pickup trucks, RVs, and other vehicles. It is dedicated to catering for the hardworking drivers who keep America moving. Being a one-of-a-kind retreat, tailored specifically for truck drivers, with a range of amenities provided to make their stay comfortable, relaxing, and enjoyable.</p>
                    <a class="about_btn_b" href="/contact-us">contact us</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Resort Story Area =================-->

<!--================Choose Resot Area =================-->
<section class="choose_resot_area">
    <div class="container">
        <div class="center_title">
            <h2>why choose our <span>resort</span></h2>
            <!--<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum</p>-->
        </div>
        <div class="row choose_resot_inner">
            <div class="col-md-5">
                <div class="resot_list">
                    <ul>
                       @php
                        $why_us_services = explode("," ,$homeContent->why_us_services ) ;
                        @endphp
                        @foreach($why_us_services as $services)
                        <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>{{ $services}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-7">
                <div class="choose_resot_slider owl-carousel">
                    <div class="item">
                        <img src="{{ asset('public/assets/img/resot/resot-1.jpg') }}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('public/assets/img/resot/resot-1.jpg') }}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('public/assets/img/resot/resot-1.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Choose Resot Area =================-->

<!--================Client Testimonial Area =================-->
<section class="client_area client_three">
    <div class="container">
        <div class="clients_slider owl-carousel">
            @if(isset($data['HomeTestimonial']) && count($data['HomeTestimonial']) > 0 )
            @foreach($data['HomeTestimonial'] as $testimonial)
            <div class="item">
                <div class="media">
                    <div class="media-left">
                        <img src="{{ asset('storage/app/public/' . $testimonial->image) }}"
                            alt="{{ $testimonial->name }}">
                    </div>
                    <div class="media-body">
                        <p><i>“</i> {{ $testimonial->comment }} </p>
                        <a href="#">
                            <h4>- {{ $testimonial->name }}</h4>
                        </a>
                        <h5>{{ $testimonial->postion }}</h5>
                    </div>
                </div>
            </div>

            @endforeach
            @endif

        </div>
    </div>
</section>
<!--================End Client Testimonial Area =================-->

<!--================Video Area =================-->
<section class="video_area">
    <div class="container">
        <div class="video_inner">
            <a class="popup-youtube" href="https://www.youtube.com/watch?v=48uPk1SA37Y"><i
                    class="flaticon-play-button"></i></a>
            <h4>virtual Tour</h4>
            <h5>of Hill Town Resort</h5>
        </div>
    </div>
</section>
<!--================End Video Area =================-->

<!--================Fun Fact Area =================-->
<section class="fun_fact_area about_fun_fact">
    <div class="container">
        <div class="row">
            <div class="fun_fact_box row m0">
                <div class="col-md-3 col-sm-6">
                    <div class="media">
                        <div class="media-left">
                            <h3 class="counter">712</h3>
                        </div>
                        <div class="media-body">
                            <h4>new <br /> friendships</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="media">
                        <div class="media-left">
                            <h3 class="counter">254</h3>
                        </div>
                        <div class="media-body">
                            <h4>International <br /> Guests</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="media">
                        <div class="media-left">
                            <h3 class="counter">430</h3>
                        </div>
                        <div class="media-body">
                            <h4>five stars <br /> rating</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="media">
                        <div class="media-left">
                            <h3 class="counter">782</h3>
                        </div>
                        <div class="media-body">
                            <h4>Served <br /> Breakfast</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Fun Fact Area =================-->

@endsection
 


@section('js') 

@endsection