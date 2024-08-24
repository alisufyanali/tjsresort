@extends('front.layouts.app')

@section('style')
@endsection


@section('content')


<!--================Banner Area =================-->
<section class="banner_area">
    <div class="container">
        <div class="banner_inner_content">
            <h3>Coming Soon Detail</h3>
            <ul>
                <li class="active"><a href="{{ route('index')}}">Home</a></li>
                <li><a href="#">Coming Soon Detail</a></li>
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
                        @php
                        $blog = $data['blog'];
                        @endphp
                        <a href="#" class="blog_img">
                            <img src="{{ asset('storage/app/public/' . $blog->featured_image) }}" class="card-img-top"
                                alt="...">
                        </a>
                        <div class="blog_text">
                            <a href="#">
                                <h4>{{ $blog->title}}</h4>
                            </a>
                            <ul>
                                <li><a href="#"><span>By :</span> Admin</a></li>
                                <li><a href="#">{{ $blog->created_at->format('d M Y') }} </a></li>
                                <li><a href="#">Comments: {{ count($blog->comments) }}</a></li>
                            </ul>
                            <div>{{ $blog->content}}</div>
                        </div>
                    </div>
                    <div class="s_comment_list">
                        <h3>Comments {{ count($blog->comments) }}</h3>
                        <div class="s_comment_list_inner">
                            @if(isset($blog->comments ) && count($blog->comments ) > 0 )
                            @foreach($blog->comments  as $comment)
                            <div class="media">
                                
                                <div class="media-body">
                                    <a href="#">
                                        <h4> {{ $comment->author }} </h4>
                                    </a>
                                    <p> {{ $comment->comment }}.</p>
                                    <div class="date_rep">
                                        <a href="#">{{ $comment->created_at->format('d M Y') }}</a>
                                    </div>
                                </div>
                            </div>


                            @endforeach
                            @endif

                        </div>
                    </div>
                    <div class="s_comment_area">
                        <h3>Leave a Comment</h3>
                        <div class="s_comment_inner">
                            <form class="row contact_us_form" id="commentForm" novalidate="novalidate">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="name" name="author"
                                        placeholder="Enter your name">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter your email address">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" name="comment" id="message" rows="1"
                                        placeholder="Write message"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn submit_btn form-control">Submit now</button>
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
                            <li><a href="#">{{ $blog->category->name }} <i class="fa fa-angle-right"
                                        aria-hidden="true"></i></a></li>
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
                            @if(isset($blog->tags) && count($blog->tags) > 0 )
                            @foreach($blog->tags as $tag)
                            <li><a href="#">{{ $tag->name }} </a></li>
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


<!--================Contact Success and Error message Area =================-->
<div id="success" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></span>
                <h2 class="modal-title">Thank you</h2>
                <p class="modal-subtitle">Your Comment Add Successfully...</p>
            </div>
        </div>
    </div>
</div>



@endsection



@section('js')

<script>
$(document).ready(function() {
    $('#commentForm').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: "{{ route('comments.store') }}",
            method: "POST",
            data: $(this).serialize(),
            success: function(response) {
                $('#success').modal('show');
                $('#commentForm')[0].reset();
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                let errorMessage = '';
                for (let field in errors) {
                    errorMessage += errors[field][0] + '\n';
                }
                alert(errorMessage);
                console.log(errorMessage);
            }
        });
    });
});
</script>

@endsection