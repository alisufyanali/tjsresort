@extends('front.layouts.app')

@section('style')
@endsection


@section('content')


<!--================Banner Area =================-->
<section class="banner_area">
    <div class="container">
        <div class="banner_inner_content">
            <h3>404
            </h3>
            <ul>
                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#">404
                    </a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->




        <!--================Error Area =================-->
        <section class="error_area">
            <div class="container">
                <div class="error_inner_text_area">
                    <div class="error_inner_text">
                        <h3>404</h3>
                        <h4>Oops! That page can’t be found</h4>
                        <h5>Sorry, but the page you are looking for does not existing</h5>
                        <a class="book_now_btn" href="{{  route('home') }}">Go to home page</a>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Error Area =================-->
@endsection



@section('js')

@endsection