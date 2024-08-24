@extends('front.layouts.app')

@section('style')
@endsection


@section('content')


<!--================Banner Area =================-->
<section class="banner_area">
    <div class="container">
        <div class="banner_inner_content">
            <h3>Long Term Parking</h3>
            <ul>
                <li class="active"><a href="{{ route('index')}}">Home</a></li>
                <li><a href="#">Long Term Parking</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->
<!--================Bolg Area =================-->
<section class="main_blog_area">
    <div class="container">
        <div class="row main_blog_inner">
            <div class="col-sm-6">
                <div class="blog_item">
                    <a href="#" class="blog_img">
                        <img src="{{ asset('public/assets/img/blog/main-blog/blog-1.jpg')}}" alt="">
                    </a>
                    <div class="blog_text">
                        <a href="#">
                            <h4>A wedding night in resort</h4>
                        </a>
                        <ul>
                            <li><a href="#"><span>By :</span> Admin</a></li>
                            <li><a href="#">27 Aug 2017</a></li>
                            <li><a href="#">Comments: 4</a></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim eniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ...</p>
                        <a class="book_now_btn" href="#">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="blog_item">
                    <a href="#" class="blog_img">
                        <img src="{{ asset('public/assets/img/blog/main-blog/blog-2.jpg')}}" alt="">
                    </a>
                    <div class="blog_text">
                        <a href="#">
                            <h4>A wedding night in resort</h4>
                        </a>
                        <ul>
                            <li><a href="#"><span>By :</span> Admin</a></li>
                            <li><a href="#">27 Aug 2017</a></li>
                            <li><a href="#">Comments: 4</a></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim eniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ...</p>
                        <a class="book_now_btn" href="#">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="blog_item">
                    <a href="#" class="blog_img">
                        <img src="{{ asset('public/assets/img/blog/main-blog/blog-3.jpg')}}" alt="">
                    </a>
                    <div class="blog_text">
                        <a href="#">
                            <h4>A wedding night in resort</h4>
                        </a>
                        <ul>
                            <li><a href="#"><span>By :</span> Admin</a></li>
                            <li><a href="#">27 Aug 2017</a></li>
                            <li><a href="#">Comments: 4</a></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim eniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ...</p>
                        <a class="book_now_btn" href="#">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="blog_item">
                    <a href="#" class="blog_img">
                        <img src="{{ asset('public/assets/img/blog/main-blog/blog-4.jpg')}}" alt="">
                    </a>
                    <div class="blog_text">
                        <a href="#">
                            <h4>A wedding night in resort</h4>
                        </a>
                        <ul>
                            <li><a href="#"><span>By :</span> Admin</a></li>
                            <li><a href="#">27 Aug 2017</a></li>
                            <li><a href="#">Comments: 4</a></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim eniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ...</p>
                        <a class="book_now_btn" href="#">Read more</a>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</section>
<!--================End Bolg Area =================-->

@endsection



@section('js')

@endsection