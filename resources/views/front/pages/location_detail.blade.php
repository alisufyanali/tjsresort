@extends('front.layouts.app')

@section('style')
<style>
/* Basic styling for the rating */
.rating {
    direction: rtl;
    display: flex;
    justify-content: flex-end;
}

.rating input {
    display: none;
}

.rating label {
    cursor: pointer;
    font-size: 2em;
    color: #ccc;
}

.rating input:checked~label,
.rating label:hover,
.rating label:hover~label {
    color: #f0ad4e;
}

.room_details_comment .contact_us_form .form-group h5 {
    padding-bottom: 10px;
}

.list i.fa.fa-star {
    color: #f0ad4e;
}

.search_right_sidebar .book_room_area .book_room_box .book_table_item .input-append input[readonly] {
    background-color: #f0f0f0;
    /* Change this to the desired color */
}
</style>
@endsection


@section('content')


<!--================Banner Area =================-->
<section class="banner_area">
    <div class="container">
        <div class="banner_inner_content">
            <h3>Location Detail</h3>
            <ul>
                <li class="active"><a href="{{ route('index')}}">Home</a></li>
                <li><a href="#">Location Detail</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->

<!--================Search Room Area =================-->
<section class="room_details_area">
    <div class="container">
        <div class="row room_details_inner">
            <div class="col-md-8">
                <div class="room_details_content">
                    <div class="room_d_main_text">
                        <div class="room_details_img owl-carousel">
                            <div class="item">
                                <img src="{{ asset('public/assets/img/location/' . $data['location']['featured_image'])}}"
                                    alt="">
                            </div>

                            @if(isset($data['location']['location_images']) &&
                            count($data['location']['location_images'] ) > 0 &&
                            $data['location']['location_images'] != '[]')

                            @foreach($data['location']['location_images'] as $location_image)
                            <div class="item">
                                <img src="{{ asset('public/assets/img/location/' . $location_image)}}" alt="">
                            </div>
                            @endforeach

                            @endif
                        </div>
                        <a href="#">
                            <h4> {{ $data['location']['location_name']   }} </h4>
                        </a>
                        <h5>${{ $data['location']['per_night_charges']   }} <span>/ Night</span></h5>
                       
                       <br>
                        <div> {!! $data['location']['description'] !!} </div>
                    </div>
                    <div class="room_service_list">
                        <h3 class="room_d_title">Location Amenities</h3>
                        @php
                        $location_services = explode("," ,$data['location']['location_services']) ;
                        @endphp
                        <div class="row room_service_list_inner">

                            <div class="col-sm-5 col-md-offset-right-1">
                                <div class="resot_list">
                                    <ul>

                                        @for ($i = 0; $i < ceil(count($location_services) / 2); $i++) <li><a href="#"><i
                                                    class="fa fa-caret-right" aria-hidden="true"></i>
                                                {{ $location_services[$i] }}
                                            </a></li>
                                            @endfor
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-5 col-md-offset-right-1">
                                <div class="resot_list">
                                    <ul>
                                        @for ($i = ceil(count($location_services) / 2); $i < count($location_services);
                                            $i++) <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>
                                                {{ $location_services[$i] }}
                                            </a></li>
                                            @endfor
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <br>
                    <section class="our_resort_gallery_area">
                        <div class="middle_title">
                            <h2>our resort <span>gallery</span></h2>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </p>
                        </div>
                    </section>
                    <div class="resort_gallery_inner imageGallery1">
                        <div class="resort_gallery owl-carousel">
                            <div class="item">
                                <img src="{{ asset('public/assets/img/gallery/resort-g-1.jpg') }}" alt="">
                                <div class="resort_g_hover">
                                    <div class="resort_hover_inner">
                                        <a class="light" href="{{ asset('public/assets/img/gallery/gallery-big/img-1') }}.jpg"><i
                                                class="fa fa-expand" aria-hidden="true"></i></a>
                                        <h5>Our Room</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <img src="{{ asset('public/assets/img/gallery/resort-g-2.jpg') }}" alt="">
                                <div class="resort_g_hover">
                                    <div class="resort_hover_inner">
                                        <a class="light" href="{{ asset('public/assets/img/gallery/gallery-big/img-2') }}.jpg"><i
                                                class="fa fa-expand" aria-hidden="true"></i></a>
                                        <h5>Our Room</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <img src="{{ asset('public/assets/img/gallery/resort-g-3.jpg') }}" alt="">
                                <div class="resort_g_hover">
                                    <div class="resort_hover_inner">
                                        <a class="light" href="{{ asset('public/assets/img/gallery/gallery-big/img-3') }}.jpg"><i
                                                class="fa fa-expand" aria-hidden="true"></i></a>
                                        <h5>Our Room</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <img src="{{ asset('public/assets/img/gallery/resort-g-4.jpg') }}" alt="">
                                <div class="resort_g_hover">
                                    <div class="resort_hover_inner">
                                        <a class="light" href="{{ asset('public/assets/img/gallery/gallery-big/img-4') }}.jpg"><i
                                                class="fa fa-expand" aria-hidden="true"></i></a>
                                        <h5>Our Room</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br> -->

                    <div class="room_details_clients">
                        <h3 class="room_d_title">Customer Reviews</h3>
                        <div class="clients_slider owl-carousel">

                            @if(isset($data['reviews']) && count($data['reviews']) > 0 )
                            @foreach($data['reviews'] as $review)
                            <div class="item">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{ asset('public/assets/img/clients/client-1.png')}}" alt="">
                                    </div>
                                    <div class="media-body">
                                        <p>{{ $review['message'] }} </p>

                                        <div class="list">

                                            @for ($i = 1; $i <= 5; $i++) @if ($i <=$review['rating'] ) <i
                                                class="fa fa-star" aria-hidden="true"></i>
                                                @else
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                @endif
                                                @endfor
                                        </div>
                                        <a href="#">
                                            <h4>- {{ $review['name'] }}</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="room_details_comment">
                        <h4>Add review</h4>
                        <form class="contact_us_form row m0" id="reviewForm" method="POST"
                            action="{{ route('review_store') }}">
                            @csrf
                            <input type="hidden" name="location_id" value="{{ $data['location']['id'] }}">

                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name*">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email*">
                            </div>
                            <div class="form-group col-md-12">
                                <h5>Your Rating</h5>
                                <div class="rating">
                                    <input type="radio" id="star5" name="rating" value="5"><label for="star5"
                                        title="5 stars"><i class="fa fa-star" aria-hidden="true"></i></label>
                                    <input type="radio" id="star4" name="rating" value="4"><label for="star4"
                                        title="4 stars"><i class="fa fa-star" aria-hidden="true"></i></label>
                                    <input type="radio" id="star3" name="rating" value="3"><label for="star3"
                                        title="3 stars"><i class="fa fa-star" aria-hidden="true"></i></label>
                                    <input type="radio" id="star2" name="rating" value="2"><label for="star2"
                                        title="2 stars"><i class="fa fa-star" aria-hidden="true"></i></label>
                                    <input type="radio" id="star1" name="rating" value="1"><label for="star1"
                                        title="1 star"><i class="fa fa-star" aria-hidden="true"></i></label>
                                </div>

                                <br>
                                <textarea class="form-control" name="message" id="message" rows="1"
                                    placeholder="review"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" value="submit" class="btn submit_btn form-control">submit
                                    now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="search_right_sidebar">
                    <div class="book_room_area">
                        <div class="book_room_box">
                            <div class="book_table_item">
                                <h3>Reserve Spot </h3>
                                <div class="error-message" style="color:red">
                                </div>
                            </div>
                            <form id="reservationForm" action="{{ route("reserved-location") }}" method="post">
                                @csrf
                                <input type="hidden" name="location_id" value="{{ $data['location']['id'] }}">

                                <div class="conatiner">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="book_table_item">
                                                <div class="input-append date ">
                                                    <label for="arrival_date">Arrival Date</label>
                                                    <input size="16" type="date" name="arrival_date" id="arrival_date"
                                                        value="" placeholder="Date in">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="book_table_item">
                                                <div class="input-append date ">
                                                    <label for="departure_date">Departure Date</label>
                                                    <input size="16" type="date" id="departure_date"
                                                        name="departure_date" value="" placeholder="Date Out">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="conatiner">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="book_table_item">
                                                <div class="input-append">
                                                    <label for="truck_color">Truck Color</label>
                                                    <input size="16" type="text" placeholder="Truck Color" id="truck_color"
                                                     name="truck_color" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="book_table_item">
                                                <div class="input-append">
                                                <label for="truck_number">Truck number</label>
                                                    <input size="16" type="text" placeholder="Truck number" id="truck_number"
                                                     name="truck_number" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="conatiner">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="book_table_item ">
                                                <div class="input-append">
                                                    <label for="no_of_spaces">No Of Spaces</label>
                                                    <input size="16" type="number"  placeholder="1" id="no_of_spaces" name="no_of_spaces" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="book_table_item">
                                                <div class="">
                                                    <label for="over_sized">Over sized </label>
                                                    <br>
                                                    <input size="16" type="checkbox"  
                                                     id="over_sized" name="over_sized" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="conatiner">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="book_table_item">
                                                <button type="submit" id="checkAvailability" class="book_now_btn">Book
                                                    Now</button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="book_table_item">
                                                <button type="submit" id="sendAvailability"
                                                    class="book_now_btn">Inquiry</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="book_now_button">
                    </div>
                    <div class="your_book_box">
                        <h3>Follow us On</h3>
                        <ul>
                            <li><a href="#">FaceBook</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Search Room Area =================-->

@endsection




@section('modal')
<!--================Contact Success and Error message Area =================-->
<div id="success" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></span>
                <h2 class="modal-title">Thank you</h2>
                <p class="modal-subtitle">Your review is successfully sent. Wait For Approvel ...</p>
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
                <p class="modal-subtitle error-message"> Something went wrong </p>
            </div>
        </div>
    </div>
</div>
<!--================End Contact Success and Error message Area =================-->

@endsection

@section('js')


<!-- review js -->
<script src="{{ asset('public/assets/js/jquery.form.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/assets/js/review.js') }}"></script>


<script>
$(document).ready(function() {
    // $(document).on('change', 'select[name=pricing_type]', function() {
    //     var val = parseFloat($(this).find(':selected').data('value'));
    //     oversized_price = parseFloat($('#oversized_price').val());
    //     oversized = $('select[name=oversized]').find(':selected').val();
    //     if (oversized == 'yes') {
    //         $('#total_price').val(val + oversized_price);
    //     } else {
    //         $('#total_price').val(val);
    //     }
    // });

    function updateTotalPrice() {
        var val = parseFloat($('select[name=pricing_type]').find(':selected').data('value')) || 0;
        var oversized_price = parseFloat($('#oversized_price').val()) || 0;
        var oversized = $('select[name=oversized]').find(':selected').val();
        var number_of_spaces = parseInt($('#number_of_spaces').val()) ||
            1; // Default to 1 if not provided or invalid

        var base_price = val * number_of_spaces;

        if (oversized == 'yes') {
            $('#total_price').val(base_price + oversized_price);
        } else {
            $('#total_price').val(base_price);
        }
    }

    $(document).on('change', 'select[name=pricing_type], select[name=oversized], #number_of_spaces',
        function() {
            updateTotalPrice();
        });

    // Call the function once to set the initial total price
    updateTotalPrice();



    $('#checkAvailability').click(function(e) {
        e.preventDefault();
        var formData = $('#reservationForm').serialize();
        $('.error-message').html(null)
        $("input").removeAttr("style");
        $(".bootstrap-select .dropdown-toggle").removeAttr("style");
        $.ajax({
            url: '{{ route("reserved-validation") }}', // Route to Laravel controller
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.status == 'error') {
                    $('.error-message').html(response.message)
                } else {
                    $('#reservationForm').submit(); // Submit the form

                }
            },
            error: function(xhr) {
                errors = xhr.responseJSON.errors;
                jQuery.each(errors, function(index, item) {
                    $("input[name=" + index + "]").css('border', '1px solid red');

                    if (index == 'oversized') {
                        $('.' + index).children("button.dropdown-toggle").css(
                            'border', '1px solid red');
                    }

                    if (index == 'total_price') {
                        $('.pricing_type').children("button.dropdown-toggle").css(
                            'border', '1px solid red');
                    }

                });
            }
        });
    });



});
</script>

@endsection