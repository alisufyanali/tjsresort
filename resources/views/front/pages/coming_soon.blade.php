@extends('front.layouts.app')

@section('style')
@endsection


@section('content')


<!--================Banner Area =================-->
<section class="banner_area">
    <div class="container">
        <div class="banner_inner_content">
            <h3>Coming Soon</h3>
            <ul>
                <li class="active"><a href="{{ route('index')}}">Home</a></li>
                <li><a href="#">Coming Soon</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->



<section class="blog_details_area">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="blog_listing_inner blog_pad_right">
                    @if(isset($data['blogs']) && count($data['blogs']) > 0 )
                    @foreach($data['blogs'] as $blog)
                    <div class="blog_item">
                        <a href="{{ route('coming_soon_detail' , $blog->id) }}" class="blog_img">
                             <img src="{{ asset('storage/app/public/' . $blog->featured_image) }}" class="card-img-top" alt="...">
                        </a>
                        <div class="blog_text">
                            <a href="{{ route('coming_soon_detail' , $blog->id) }}">
                                <h4>{{ $blog->title}}</h4>
                            </a>
                            <ul>
                                <li><a href="#"><span>By :</span> Admin</a></li>
                                <li><a href="#"> {{ $blog->created_at->format('d M Y') }}      </a></li>                          </a></li>
                                <li><a href="#">Comments: {{ count($blog->comments) }}</a></li>
                            </ul>
                            <p> {{ Str::limit($blog->content, 100) }}</p>
                            <a class="book_now_btn" href="{{ route('coming_soon_detail' , $blog->id) }}">Read more</a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <h3>No Blogs Found</h3>
                    @endif
                </div>
                <br>
                <br>
                <div class="">
                    @if(isset($data['blogs']) && count($data['blogs']) > 0 )
                       {{ $data['blogs']->links() }}
                    @endif
                </div>
            </div>
            <div class="col-md-3">
                <div class="sidebar_area">
                    <aside class="r_widget search_widget">
                        <form action="{{ route('coming-soon') }}" method="get">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" required placeholder="Enter Search Keywords">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="icon icon-Search"></i></button>
                            </span>
                        </div><!-- /input-group -->
                        </form>
                    </aside>
                    <aside class="r_widget categories_widget">
                        <div class="r_widget_title">
                            <h3>Categories</h3>
                        </div>
                        <ul>
                            @if(isset($data['categories']) && count($data['categories']) > 0 )
                            @foreach($data['categories'] as $category)
                            <li><a href="{{ route('coming-soon-cat' , $category->id ) }}">{{ $category->name }} <i class="fa fa-angle-right"
                                        aria-hidden="true"></i></a></li>

                            @endforeach
                            @endif

                        </ul>
                    </aside>
                    <!-- <aside class="r_widget recent_widget">
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
                    </aside> -->
                    <aside class="r_widget tag_widget">
                        <div class="r_widget_title">
                            <h3>Tages</h3>
                        </div>
                        <ul>
                            @if(isset($data['tags']) && count($data['tags']) > 0 )
                            @foreach($data['tags'] as $tag)
                            <li><a href="{{ route('coming-soon-tag' , $tag->id ) }}">{{ $tag->name }} </a></li>
                            @endforeach
                            @endif
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