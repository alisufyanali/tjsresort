@extends('front.layouts.app')

@section('style')
<link href="{{ asset('public/assets/css/home.css') }}" rel="stylesheet">
<style>
.error {
    color: red;
}

</style>
@endsection


@section('content')

<!--================Slider Area =================-->
<section style="background-position-x: initial;background-position-y: initial;" class="main_slider_area main_s_banner">
    <div class="book_table_area">
        <div class="container">
            @php
            $homeContent = $data['homeContent'];
            @endphp
            <h4 class="book_single_one">{{ $homeContent->sub_heading }}  </h4>
            <h3 class="book_single_text">{{ $homeContent->main_heading }}  </h3>
            <style>
                @media  only screen and (max-width: 800px)  {
                   .main_slider_area .book_table_area .book_table_inner {
                        display: flex ;
                        flex-wrap: wrap;
                    }
                    .book_table_inner .book_table_item {
                      width: calc(100% / 2) ;
                      margin: 1rem 0 ;
                    }
                    .main_slider_area .book_table_area .book_single_one {
                        font-size: 16px;
                    }
                    .main_slider_area .book_table_area .book_single_text{
                        font-size: 30px;
                        padding-bottom: 40px;
                    }
                }
               @media  only screen and (max-width: 1000px)  {
                   .main_slider_area .book_table_area .book_table_inner {
                        display: flex ;
                        flex-wrap: wrap;
                    }
                    .book_table_inner .book_table_item {
                      width: calc(100% / 3) ;
                      margin: 1rem 0 ;
                    }
                }

            </style>
            <form action="{{ route('resort_search') }}" method="GET">
                @csrf

                <div class="book_table_inner row m0" style="display: flex !important; flex-wrap: wrap  !important;">
                    <div class="book_table_item">
                        <div class="input-append date">
                            <input size="16" type="date" class="form_date" value="" name="arrival_date"
                                placeholder="Arrival Date">
                        </div>
                        @error('arrival_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="book_table_item">
                        <div class="input-append date">
                            <input size="16" type="date" value="" name="departure_date" placeholder="Departure Date">
                        </div>
                        @error('departure_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="book_table_item">
                        <input size="16" type="text" class="text-input" value="" name="truck_no" placeholder="Truck No">
                        @error('truck_no')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="book_table_item">
                        <input size="16" type="text" class="text-input" value="" name="truck_color"
                            placeholder="Truck Color">
                        @error('truck_color')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="book_table_item" style="display: flex;justify-content: center;align-items: center;">
                        <input type="checkbox" class="check-input" name="oversized">
                        <h2 style="color: white;font-family: monospace;font-size: 16px;">Oversized</h2>
                    </div>
                    <div class="book_table_item">
                        <button class="book_now_btn p-1" type="submit" style="padding: 0 15px;" >Reserve A Spot </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</section>
<!--================End Slider Area =================-->

<!--================Introduction Area =================-->
<section class="introduction_area intro_area2">
    <div class="container">
        <div class="row introduction_inner">
            <div class="col-md-6">
                <div class="introduction_img">
                    <img src="{{ asset('storage/app/public/' . $homeContent->intro_img_back) }}" alt="">
                    <img src="{{ asset('storage/app/public/' . $homeContent->intro_img_front) }}" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="introduction_left_text">
                    <div class="intro_title">
                        <h2>Introduction <span>of Truck Resort</span></h2>
                        <!--<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </p>-->
                    </div>
                    <div class="">
                        {!! $homeContent->intro_decs !!}
                    </div>
                    <div class="row intro_box_item_area">
                        <div class="col-xs-4">
                            <div class="intro_box_item">
                                <i class="{{ $homeContent->intro_icon_1 }}"></i>
                                <h4>{{ $homeContent->intro_name_1 }} </h4>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="intro_box_item">
                                <i class="{{ $homeContent->intro_icon_2 }}"></i>
                                <h4>{{ $homeContent->intro_name_2 }} </h4>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="intro_box_item">
                                <i class="{{ $homeContent->intro_icon_3 }}"></i>
                                <h4>{{ $homeContent->intro_name_3 }} </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Introduction Area =================-->

<!--================Choose Resot Area =================-->
<section class="choose_resot_area">
    <div class="container">
        <div class="center_title">
            <h2>why choose our <span>Truck Resot</span></h2>
            <p>{{ $homeContent->why_us }}</p>
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
                        <img src="{{ asset('storage/app/public/' . $homeContent->why_us_img_1) }}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('storage/app/public/' . $homeContent->why_us_img_1) }}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('storage/app/public/' . $homeContent->why_us_img_1) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Choose Resot Area =================-->

<!--================Explor Room Area =================-->
<section class="explor_room_area explor_slider_area">
    <div class="container">
        <div class="explor_title row m0">
            <div class="pull-left">
                <div class="left_wh_title">
                    <h2>Explore Our <span>Location</span></h2>
                    <!-- <p>choose Location according to budget</p> -->
                </div>
            </div>
            <div class="pull-right">
                <!-- <a class="about_btn_wh" href="#">view all Locations</a> -->
            </div>
        </div>
        <div class="explor_room_item_inner ">
            <!--classes:: explor_slider owl-carousel-->

            @if(isset($data['locations']) && count($data['locations']) > 0 )
            @foreach($data['locations'] as $location )
            <div class="item">
                <div class="explor_item">
                    <a href="{{ route('location-detail' , $location['slug'] ) }}" class="room_image">
                        <img style="width:100%"
                            src="{{ asset('public/assets/img/location/' . $location['featured_image'] ) }}" alt="">
                    </a>
                    <div class="explor_text">
                        <a href="{{ route('location-detail' , $location['slug'] ) }}">
                            <h4>{{ $location['location_name']}}</h4>
                        </a>
                        <div class="explor_footer">
                            <div class="pull-left">
                                <h3>{{ $location['daily']}} <span>/ Night</span></h3>
                            </div>
                            <div class="pull-right">
                                <a class="book_now_btn" href="{{ route('location-detail' , $location['slug'] ) }}">View
                                    details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            @endif
        </div>
    </div>
</section>
<!--================End Explor Room Area =================-->


<!--================Latest News Area =================-->
<section class="latest_news_area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row latest_news_left">
                    <div class="left_ex_title">
                        <h2>Latest <span>News</span></h2>
                    </div>

                    @if(isset($data['blogs']) && count($data['blogs']) > 0 )
                    @foreach($data['blogs'] as $blog )

                    <div class="col-sm-6">
                        <div class="l_news_item">
                            <a href="{{ route('coming_soon_detail' , $blog->id) }}" class="news_img">
                                <img src="{{ asset('storage/app/public/' . $blog->featured_image) }}"
                                    alt="{{ $blog->title}}">
                            </a>
                            <div class="news_text">
                                <a class="l_date"
                                    href="{{ route('coming_soon_detail' , $blog->id) }}">{{ $blog->created_at->format('d M Y') }}</a>
                                <a href="{{ route('coming_soon_detail' , $blog->id) }}">
                                    <h4>{{ $blog->title}}</h4>
                                </a>
                                <a class="news_more" href="{{ route('coming_soon_detail' , $blog->id) }}">Read more</a>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="right_event">
                    <div class="left_ex_title">
                        <h2>Upcoming <span>Events</span></h2>
                    </div>
                    <div class="right_event_area">

                        @if(isset($data['events']) && count($data['events']) > 0 )
                        @foreach($data['events'] as $event )
                        <div class="media">
                            <div class="media-left">
                                <h3>
                                    {{ (new DateTime($event['start_date']))->format('d') }}
                                    <span>{{ (new DateTime($event['start_date']))->format('M') }}</span>
                                </h3>
                            </div>
                            <div class="media-body">
                                <h4><a href="{{ route('event_detail' ,$event->id ) }}"> {{ $event->title }} </a> </h4>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <a class="all_s_btn" href="{{ route('events') }}">view all events</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Latest News Area =================-->


<!--================Video Area =================-->
<section class="video_area"
    style="background: url({{ asset('storage/app/public/'. $homeContent->virtual_img)}}); background-size: cover;">
    <div class="container">
        <div class="video_inner">
            <a class="popup-youtube" href="{{ $homeContent->virtual_link }}"><i class="flaticon-play-button"></i></a>
            <h4>virtual Tour</h4>
            <h5>of Hill Town Resort</h5>
        </div>
    </div>
</section>
<!--================End Video Area =================-->

@endsection



@section('modal')
<!--================Contact Success and Error message Area =================-->
<div id="reservation-success" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></span>
                <h2 class="modal-title">Thank you</h2>
                <p class="modal-subtitle">Thank you for your reservation request. A member of the Truck Parking team
                    will contact you within the next business day to confirm details and answer any questions you
                    have....</p>
            </div>
        </div>
    </div>
</div>



<!--================Contact Success and Error message Area =================-->
<div id="success" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></span>
                <h2 class="modal-title">Thank you</h2>
                <p class="modal-subtitle">Your message is successfully sent...</p>
            </div>
        </div>
    </div>
</div>
<!-- Modals error -->
<div id="error" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></span>
                <h2 class="modal-title">Sorry !</h2>
                <p class="modal-subtitle"> Something went wrong </p>
            </div>
        </div>
    </div>
</div>
<!--================End Contact Success and Error message Area =================-->
@endsection


@section('js')

<script src="{{ asset('public/assets/js/jquery.form.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/assets/js/contact.js') }}"></script>

<script>
$(document).ready(function() {});
</script>

@endsection