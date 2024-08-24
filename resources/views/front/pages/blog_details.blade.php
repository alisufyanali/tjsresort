@extends('front.layouts.app')

@section('style')
@endsection


@section('content')


<!--================Banner Area =================-->
<section class="banner_area">
    <div class="container">
        <div class="banner_inner_content">
            <h3>Blogs Details</h3>
            <ul>
                <li class="active"><a href="{{ route('index')}}">Home</a></li>
                <li><a href="#">Blogs Details</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->


<!--================Blog Details Area =================-->
<section class="blog_details_area">
    <div class="container">
        <div class="row">
            <div class="col-md-9 pull-right">
                <div class="blog_details_inner">
                    <div class="blog_item">
                        <a href="blog-details.html" class="blog_img">
                            <img src="{{ asset('public/assets/img/blog/blog-listing/blog')}}-listing-1.jpg" alt="">
                        </a>
                        <div class="blog_text">
                            <a href="blog-details.html">
                                <h4>A wedding night in resort</h4>
                            </a>
                            <ul>
                                <li><a href="#"><span>By :</span> Admin</a></li>
                                <li><a href="#">27 Aug 2017</a></li>
                                <li><a href="#">Comments: 4</a></li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur velit esse
                                cillum dolore eu ...</p>
                        </div>
                    </div>
                    <div class="two_column_sample">
                        <h3>Two Column Text Sample</h3>
                        <div class="two_column_item">
                            <p>Ut enim ad minima veniam, quis nostrum exerci-tatio nem ullam corporis suscipit
                                laboriosam, nisi ut aliqu id ex ea commodi consequatur? Quis autem vel eum iure
                                reprehenderit qui.</p>
                        </div>
                        <div class="two_column_item">
                            <p>Ut enim ad minima veniam, quis nostrum exerci-tatio nem ullam corporis suscipit
                                laboriosam, nisi ut aliqu id ex ea commodi consequatur? Quis autem vel eum iure
                                reprehenderit qui.</p>
                        </div>
                    </div>
                    <div class="s_blog_quote">
                        <p><i class="fa fa-quote-left" aria-hidden="true"></i> Ut enim ad minima veniam, quis nostrum
                            exercitatio nem ullam corporis suscipit labori osam, nisi ut aliqu id ex ea commodi
                            consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil
                            molestiae consequatur.</p>
                        <a href="#">- Michale John</a>
                    </div>
                    <div class="s_main_text">
                        <p><strong>Here is main text</strong> quis nostrud exercitation ullamco laboris nisi here is
                            itealic text ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla rure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat <a href="#">here
                                is link</a> cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                            est laborum.</p>
                    </div>
                    <div class="s_comment_list">
                        <h3>Comments 4</h3>
                        <div class="s_comment_list_inner">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ asset('public/assets/img/comment/comment-1.jpg')}}" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#">
                                        <h4>Merry John</h4>
                                    </a>
                                    <p>Duis aute irure dolor in reprehenderit in vol uptate velit esse cillum dolore eu
                                        fugiat nulla pari atur. Excepteur sint occaecat cupidatat non proid pent.</p>
                                    <div class="date_rep">
                                        <a href="#">Dec 09 2017</a>
                                        <a href="#">Reply</a>
                                    </div>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ asset('public/assets/img/comment/comment-2.jpg')}}" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#">
                                        <h4>Merry John</h4>
                                    </a>
                                    <p>Duis aute irure dolor in reprehenderit in vol uptate velit esse cillum dolore eu
                                        fugiat nulla pari atur. Excepteur sint occaecat cupidatat non proid pent.</p>
                                    <div class="date_rep">
                                        <a href="#">Dec 09 2017</a>
                                        <a href="#">Reply</a>
                                    </div>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ asset('public/assets/img/comment/comment-3.jpg')}}" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#">
                                        <h4>Merry John</h4>
                                    </a>
                                    <p>Duis aute irure dolor in reprehenderit in vol uptate velit esse cillum dolore eu
                                        fugiat nulla pari atur. Excepteur sint occaecat cupidatat non proid pent.</p>
                                    <div class="date_rep">
                                        <a href="#">Dec 09 2017</a>
                                        <a href="#">Reply</a>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{ asset('public/assets/img/comment/comment-4.jpg')}}" alt="">
                                        </div>
                                        <div class="media-body">
                                            <a href="#">
                                                <h4>Merry John</h4>
                                            </a>
                                            <p>Duis aute irure dolor in reprehenderit in vol uptate velit esse cillum eu
                                                fugiat nulla pari atur. Excepteur sint occaecat cupidatat non.</p>
                                            <div class="date_rep">
                                                <a href="#">Dec 09 2017</a>
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="s_comment_area">
                        <h3>Leave a Comment</h3>
                        <div class="s_comment_inner">
                            <form class="row contact_us_form" method="post" id="contactForm" novalidate="novalidate">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter your name">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter your email address">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" name="message" id="message" rows="1"
                                        placeholder="Wrtie message"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" value="submit" class="btn submit_btn form-control">submit
                                        now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 pull-right">
                <div class="sidebar_area">
                    <aside class="r_widget search_widget">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Search Keywords">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="icon icon-Search"></i></button>
                            </span>
                        </div><!-- /input-group -->
                    </aside>
                    <aside class="r_widget categories_widget">
                        <div class="r_widget_title">
                            <h3>Categories</h3>
                        </div>
                        <ul>
                            <li><a href="#">Restaurant <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                            <li><a href="#">Travel tips <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                            <li><a href="#">Resort <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                            <li><a href="#">General care Tips <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="#">Activities <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                            <li><a href="#">Photo gallery <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </aside>
                    <aside class="r_widget recent_widget">
                        <div class="r_widget_title">
                            <h3>Recent News</h3>
                        </div>
                        <div class="recent_inner">
                            <div class="recent_item">
                                <a href="#">
                                    <h4>5 tips for book a resort for your family holiday.</h4>
                                </a>
                                <h5>08 March 2017</h5>
                            </div>
                            <div class="recent_item">
                                <a href="#">
                                    <h4>5 tips for book a resort for your family holiday.</h4>
                                </a>
                                <h5>08 March 2017</h5>
                            </div>
                            <div class="recent_item">
                                <a href="#">
                                    <h4>5 tips for book a resort for your family holiday.</h4>
                                </a>
                                <h5>08 March 2017</h5>
                            </div>
                            <div class="recent_item">
                                <a href="#">
                                    <h4>5 tips for book a resort for your family holiday.</h4>
                                </a>
                                <h5>08 March 2017</h5>
                            </div>
                        </div>
                    </aside>
                    <aside class="r_widget tag_widget">
                        <div class="r_widget_title">
                            <h3>Tages</h3>
                        </div>
                        <ul>
                            <li><a href="#">Holidays</a></li>
                            <li><a href="#">Food & Drink</a></li>
                            <li><a href="#">Hotels</a></li>
                            <li><a href="#">Activities</a></li>
                            <li><a href="#">Travel Tips</a></li>
                            <li><a href="#">Rooms</a></li>
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Bolg Details Area =================-->

@endsection



@section('js')

@endsection