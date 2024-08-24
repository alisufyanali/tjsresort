@extends('admin.layouts.app')

@section('style')


<style>
.error {
    color: red;
}
</style>
@endsection




@section('content')

<!-- testimonial and top selling start -->
<div class="col-md-12">
    <div class="card table-card">
        <div class="card-header">

            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary waves-effect"> Add New</a>

            @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                <p>{{ $message }}</p>
            </div>
            @endif

            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                    <li><i class="feather icon-maximize full-card"></i></li>
                    <li><i class="feather icon-minus minimize-card"></i></li>
                    <li><i class="feather icon-refresh-cw reload-card"></i></li>
                    <li><i class="feather icon-trash close-card"></i></li>
                    <li><i class="feather icon-chevron-left open-card-option"></i></li>
                </ul>
            </div>
        </div>
        <div class="card-block p-b-0">
            @if(isset($data['blogs']))
                @foreach ($data['blogs'] as $blog)
                <div class="col-md-4">
                    <div class="card mb-4">
                        @if($blog->featured_image)
                        <img src="{{ asset('storage/app/public/' . $blog->featured_image) }}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text">{{ Str::limit($blog->content, 100) }}</p>
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-primary">edit</a>
                            <a href="{{ route('coming_soon_detail', $blog->id) }}" target="_blank" class="btn btn-success">view</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif

            <br>
        </div>
    </div>
</div>
<!-- testimonial and top selling end -->



@endsection



@section('script')



@endsection