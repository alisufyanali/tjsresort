@extends('front.layouts.app')

@section('style')
<style>
    .aminities_list .aminities_item {
        width: calc(100% / 4);
        
    }
    .aminities_item img {
        width: 200px;
        
    }
    .aminities_list .aminities_item:nth-child(6) {
        width: calc(100% / 4);
        display: block;
        text-align: center;
        padding: 50px 15px 50px 15px;
    }
    .aminities_list .aminities_item:nth-child(6) h4 {
        font-size: 18px;
        font-family: "Montserrat", sans-serif;
        font-weight: bold;
        text-transform: uppercase;
        color: #fff;
        letter-spacing: .36px;
        padding: 25px 0px 17px 0px;
    }
    .aminities_list .aminities_item:nth-child(9) {
        background: #dfdfdf;
    }
    .aminities_list .aminities_item:nth-child(11) {
        background: #46789e;
    }
    .aminities_list .aminities_item:nth-child(14) {
        background: #dfdfdf;
    }
</style>
@endsection


@section('content')


<!--================Banner Area =================-->
<section class="banner_area">
    <div class="container">
        <div class="banner_inner_content">
            <h3>Amenities</h3>
            <ul>
                <li class="active"><a href="{{ route('index')}}">Home</a></li>
                <li><a href="#">Amenities</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->


<!--================Aminities Content Area =================-->
<section class="aminities_area">
    <div class="container">
        <div class="main_big_title">
            <h2>Location <span>aminities</span></h2>
            <!--<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni-->
            <!--    dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia-->
            <!--    dolor sit amet, consectetur, adipisci velit, sed quia non numquam</p>-->
        </div>
    </div>
    <div class="aminities_list">
        <!--<div class="aminities_item">-->
        <!--    <img src="assets/img/icon/aminities-1.png" alt="">-->
        <!--    <a href="#">-->
        <!--        <h4>Electric Fence</h4>-->
        <!--    </a>-->
        <!--    <p>For added security, our resort is equipped with an electric fence. This extra layer of protection helps deter unauthorized access, ensuring that your vehicle and belongings are safe throughout your stay.</p>-->
        <!--</div>-->
        <div class="aminities_item">
            <img src="assets/img/icon/pool.svg" alt="Pool">
            <a href="#">
                <h4>Pool</h4>
            </a>
        </div>
        
        <div class="aminities_item">
            <img src="assets/img/icon/gym.svg" alt="Gym">
            <a href="#">
                <h4>Gym</h4>
            </a>
        </div>
        
        <div class="aminities_item">
            <img src="assets/img/icon/drivers-lounge.svg" alt="Driver's Lounge">
            <a href="#">
                <h4>Driver's Lounge</h4>
            </a>
        </div>
        
        <div class="aminities_item">
            <img src="assets/img/icon/wifi.svg" alt="Wi-Fi">
            <a href="#">
                <h4>Wi-Fi</h4>
            </a>
        </div>
        
        <div class="aminities_item">
            <img src="assets/img/icon/vending-machine.png" alt="Vending Machines">
            <a href="#">
                <h4>Vending Machines</h4>
                <a href="https://www.freepik.com/icon/vending-machine_8844008#fromView=keyword&page=1&position=2">Icon by Freepik</a>
            </a>
        </div>
        
        <div class="aminities_item">
            <img src="assets/img/icon/drivers-van.svg" alt="Driver's Van">
            <a href="#">
                <h4>Driver's Van</h4>
            </a>
        </div>
        
        <div class="aminities_item">
            <img src="assets/img/icon/fishing-lake.svg" alt="Fishing Lake">
            <a href="#">
                <h4>Fishing Lake</h4>
            </a>
        </div>
        
        <div class="aminities_item">
            <img src="assets/img/icon/fire-places.svg" alt="Fire Places">
            <a href="#">
                <h4>Fire Places</h4>
            </a>
        </div>
        
        <div class="aminities_item">
            <img src="assets/img/icon/bbq.png" alt="Kitchenette">
            <a href="#">
                <h4 style="color:black;">Kitchenette</h4>
                <a href="https://www.flaticon.com/free-icons/bbq" title="bbq icons">icon by Smashicons - Flaticon</a>
            </a>
        </div>
        
        <div class="aminities_item">
            <img src="assets/img/icon/hot-showers.svg" alt="Hot Showers">
            <a href="#">
                <h4>Hot Showers</h4>
            </a>
        </div>
        
        <div class="aminities_item">
            <img src="assets/img/icon/security.svg" alt="24/7 Security">
            <a href="#">
                <h4>24/7 Security</h4>
            </a>
        </div>
        
        <div class="aminities_item">
            <img src="assets/img/icon/dog-park.svg" alt="Dog Park">
            <a href="#">
                <h4>Dog Park</h4>
            </a>
        </div>
        
        <div class="aminities_item">
            <img src="assets/img/icon/dog-washing-station.svg" alt="Dog Washing Station">
            <a href="#">
                <h4>Dog Washing Station</h4>
            </a>
        </div>

    </div>
</section>
<!--================End Aminities Content Area =================-->

<!--================Our Resort Gallery Area =================-->
<div class="resort_gallery_inner resort_g_full">
    <div class="resort_full_gallery owl-carousel imageGallery1">
        <div class="item">
            <img src="{{ asset('public/assets/img/gallery/resort-g-5.jpg') }}" alt="">
            <div class="resort_g_hover">
                <div class="resort_hover_inner">
                    <a class="light" href="{{ asset('public/assets/img/gallery/gallery-big/img-1.jpg') }}"><i
                            class="fa fa-expand" aria-hidden="true"></i></a>
                    <h5>Our Location</h5>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('public/assets/img/gallery/resort-g-6.jpg') }}" alt="">
            <div class="resort_g_hover">
                <div class="resort_hover_inner">
                    <a class="light" href="{{ asset('public/assets/img/gallery/gallery-big/img-2.jpg') }}"><i
                            class="fa fa-expand" aria-hidden="true"></i></a>
                    <h5>Our Location</h5>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('public/assets/img/gallery/resort-g-7.jpg') }}" alt="">
            <div class="resort_g_hover">
                <div class="resort_hover_inner">
                    <a class="light" href="{{ asset('public/assets/img/gallery/gallery-big/img-3.jpg') }}"><i
                            class="fa fa-expand" aria-hidden="true"></i></a>
                    <h5>Our Location</h5>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('public/assets/img/gallery/resort-g-8.jpg') }}" alt="">
            <div class="resort_g_hover">
                <div class="resort_hover_inner">
                    <a class="light" href="{{ asset('public/assets/img/gallery/gallery-big/img-4.jpg') }}"><i
                            class="fa fa-expand" aria-hidden="true"></i></a>
                    <h5>Our Location</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Our Resort Gallery Area =================-->

@endsection



@section('js')

@endsection