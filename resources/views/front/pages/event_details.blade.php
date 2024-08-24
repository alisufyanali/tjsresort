@extends('front.layouts.app')

@section('style')
@endsection


@section('content')


<!--================Banner Area =================-->
<section class="banner_area">
    <div class="container">
        <div class="banner_inner_content">
            <h3>Event Detail</h3>
            <ul>
                <li class="active"><a href="{{ route('index')}}">Home</a></li>
                <li><a href="#">Event Detail</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->



<section class="event_details_area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="event_detials_inner">
                    @php
                    $event = $data['event'];
                    @endphp
                    <div class="evet_d_img">
                        <img src="{{ asset('public/assets/img/event/'. $event['image'] )}}" alt="">
                    </div>
                    <div class="event_d_inner_all">
                        <div class="event_details_main">
                            <a href="#">
                                <h4>{{ $event['title'] }}</h4>
                            </a>
                            <h5>Description of event</h5>
                            <div>{!! $event['description'] !!} </div>
                        </div>
                        <div class="event_about">
                            <h4>more about event</h4>
                            <div class="">
                                {!! $event['more_about_event'] !!}
                            </div>
                        </div>
                        <div class="map_location">
                            <h4>Location</h4>
                            <div id="mapBox" class="mapBox3 row m0" data-lat="40.701083" data-lon="-74.1522848"
                                data-zoom="12" data-marker="img/map-marker.png"
                                data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."
                                data-mlat="40.701083" data-mlon="-74.1522848">
                            </div>
                        </div>
                    </div>
                    <div class="s_comment_area">
                        <h3>Leave a Comment</h3>
                        <div class="s_comment_inner">
                            <form class="row contact_us_form" id="commentForm">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">

                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter your name" required fdprocessedid="2qh34r">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter your email address" required fdprocessedid="5lhghp">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" name="comment" required id="message" rows="1"
                                        placeholder="Wrtie message"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" value="submit" class="btn submit_btn form-control"
                                        fdprocessedid="8rh99dq">submit now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="event_details_right">
                    <div class="media">
                        <div class="media-left">
                            <img src="{{ asset('public/assets/img/icon/event-icon-1.png') }}" alt="">
                        </div>
                        <div class="media-body">
                            <h4>time</h4>
                            <p>{{ (new DateTime($event['start_date']))->format('d F Y') }} -
                                {{ (new DateTime($event['end_date']))->format('d F Y') }}</p>
                            <!-- Formats date as 19 August 2017 -->

                            <p>{{ (new DateTime($event['open_time']))->format('H:i a') }} -
                                {{ (new DateTime($event['close_time']))->format('H:i a') }} </p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <img src="{{ asset('public/assets/img/icon/event-icon-2.png') }}" alt="">
                        </div>
                        <div class="media-body">
                            <h4>location</h4>
                            <p>{{ $event['location'] }}</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <img src="{{ asset('public/assets/img/icon/event-icon-1.png') }}" alt="">
                        </div>
                        <div class="media-body">
                            <h4>Hourly Schedule</h4>
                            <ul>
                                <li><a href="#">9:00 am Breakfast</a></li>
                                <li><a href="#">11:00 am Global Meeting</a></li>
                                <li><a href="#">1:00 pm Introductory net</a></li>
                                <li><a href="#">working session</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--================Contact Success and Error message Area =================-->
<div id="success-modal" class="modal modal-message fade" role="dialog">
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
@endsection



@section('js')

<script>
$(document).ready(function() {
    $('#commentForm').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '{{ route("event.comment.store") }}',
            data: formData,
            success: function(response) {
                $('#commentForm')[0].reset();

                $('#success-modal').modal('show');
            },
            error: function(error) {
                console.error('Error:', error.responseJSON);
                alert('Failed to submit comment.');
            }
        });
    });
});
</script>

@endsection 