@extends('front.layouts.app')

@section('style')
@endsection


@section('content')


<!--================Banner Area =================-->
<section class="banner_area">
    <div class="container">
        <div class="banner_inner_content">
            <h3>Events</h3>
            <ul>
                <li class="active"><a href="{{ route('index')}}">Home</a></li>
                <li><a href="#">Events</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->


<section class="event_two_area">
    <div class="container">
        <div class="row event_two_inner">

            @if(isset($data['events']) && count($data['events']) > 0 )
            @foreach($data['events'] as $event )
            <div class="col-md-6 col-sm-6">
                <div class="event_two_item">
                    <a href="{{ route('event_detail' ,$event->id ) }}" class="event_two_img">
                        <img src="{{ asset('public/assets/img/event/' . $event->image)}}" alt="">
                    </a>
                    <div class="event_two_text">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <h5>{{ (new DateTime($event['start_date']))->format('d') }}</h5>
                                    <h6>{{ (new DateTime($event['start_date']))->format('M') }}</h6>
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    <h4>{{ $event->title }}</h4>
                                </a>
                            </div>
                        </div>
                        <p>{{ strlen($event->description) > 50 ? substr($event->description, 0, 100) . '...' : $event->description }}
                        </p>
                        <a class="book_now_btn" href="{{ route('event_detail' ,$event->id ) }}">read more</a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
<!--================End Event Two Column Area =================-->


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

});
</script>

@endsection