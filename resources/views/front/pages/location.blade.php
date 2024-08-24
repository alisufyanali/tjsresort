@extends('front.layouts.app')

@section('style')
@endsection


@section('content')


<!--================Banner Area =================-->
<section class="banner_area">
    <div class="container">
        <div class="banner_inner_content">
            <h3>Locations</h3>
            <ul>
                <li class="active"><a href="{{ route('index')}}">Home</a></li>
                <li><a href="#">Locations</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->

<!--================Explor Room Area =================-->
<section class="explor_room_area explore_room_list">
    <div class="container">
        <div class="explor_title row m0">
            <div class="left_ex_title">
                <h2>Explor Our <span>Locations</span></h2>
                <p>choose Location according to budget</p>
            </div>
        </div>



        <div class="row explor_room_item_inner">

            @if(isset($data['locations']) && count($data['locations']) > 0 )
            @foreach($data['locations'] as $location )
            
            
             <div class="col-md-4 col-sm-6">
                        <div class="explor_item"> 
                            <a href="{{ route('location-detail' , $location['slug'] ) }}" class="room_image">
                                <img src="{{ asset('public/assets/img/location/' . $location['featured_image'] ) }}" alt="">
                            </a>
                            <div class="explor_text"> 
                                 <a href="{{ route('location-detail' , $location['slug'] ) }}">
                                    <h4>{{ $location['location_name'] }}</h4>
                                </a>
                                <ul>
                                @php
                                 $location_services = explode("," ,$location['location_services']) ;
                                @endphp
                                @foreach($location_services as $services)
                                    <li><a href="#">{{$services}}</a></li>
                                @endforeach
                                </ul>
                                <div class="explor_footer">
                                    <div class="pull-left">
                                        <h3>${{ $location['daily'] }} <span>/ Night</span></h3>
                                    </div>
                                    <div class="pull-right">
                                         <a class="book_now_btn" href="{{ route('location-detail' , $location['slug'] ) }}">View
                                    details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
            @endif


        </div>
        <nav aria-label="Page navigation" class="room_pagination">
            <!-- <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                    </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                </li>
            </ul> -->
            {{ $data['locations']->links() }}

        </nav>
    </div>
</section>
<!--================End Explor Room Area =================-->

@endsection



@section('js')

@endsection