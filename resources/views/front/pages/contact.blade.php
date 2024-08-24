@extends('front.layouts.app')

@section('style')
@endsection


@section('content')


<!--================Banner Area =================-->
<section class="banner_area">
    <div class="container">
        <div class="banner_inner_content">
            <h3>Contact Us</h3>
            <ul>
                <li class="active"><a href="{{ route('home')}}">Home</a></li>
                <li><a href="{{ route('contact-us')}}">Contact us</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->

<!--================Get Contact Area =================-->
<section class="get_contact_area">
    <div class="container">
        <div class="row get_contact_inner">
            <div class="col-md-6">
                <div class="left_ex_title">
                    <h2>get in <span>touch</span></h2>
                </div>

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <form class="contact_us_form row m0" id="contactForm" method="POST"
                    action="{{ route('contact-store') }}" novalidate>
                    @csrf
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control" id="number" name="number" placeholder="Phone no."
                            required>
                    </div>
                    <div class="form-group col-md-12">
                        <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"
                            required></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" value="submit" class="btn submit_btn form-control">submit now</button>
                    </div>
                </form>

            </div>
            <div class="col-md-6">
                <div class="right_contact_info">
                    <div class="contact_info_title">
                        <h3>Contact info</h3>
                        <p>Have any Queries? Let us know. We will clear it for you at the best.</p>
                    </div>
                    <div class="contact_info_list">
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="media-body">
                                <h4>Office</h4>
                                <p>{{ $settings ? $settings->address : '' }}</p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div class="media-body">
                                <h4>Email</h4>
                                <a href="#">{{ $settings ? $settings->email : '' }}</a>
                                 
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="media-body">
                                <h4>Phone</h4>
                                <a href="#">{{ $settings ? $settings->contact_no : '' }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Get Contact Area =================-->

<!--================Map Area =================-->
<section class="contact_map_area">
    <div class="container">
        <div id="mapBox2" class="mapBox2 row m0" data-lat="40.701083" data-lon="-74.1522848" data-zoom="12"
            data-marker="{{ asset('public/assets/img/map-marker.png') }}"
            data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia." data-mlat="40.701083"
            data-mlon="-74.1522848">
        </div>
    </div>
</section>
<!--================End Map Area =================-->

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
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="{{ asset('public/assets/js/gmaps.min.js') }}"></script>

<!-- contact js -->
<script src="{{ asset('public/assets/js/jquery.form.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/assets/js/contact.js') }}"></script>

@endsection