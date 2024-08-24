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
            <h2>Add Homepage Content</h2>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br>
            @endif

            <form action="{{ route('admin.homepage_content.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="main_heading">Main Heading</label>
                    <input type="text" name="main_heading" class="form-control"
                        value="{{ old('main_heading', $homepageContent->main_heading ?? '') }}">
                </div>
                <div class="form-group">
                    <label for="sub_heading">Sub Heading</label>
                    <input type="text" name="sub_heading" class="form-control"
                        value="{{ old('sub_heading', $homepageContent->sub_heading ?? '') }}">
                </div>
                <div class="form-group">
                    <label for="banner">Banner</label>
                    <input type="file" name="banner" class="form-control">
                </div>
                <!-- Repeat the above block for other images -->
                <div class="form-group">
                    <label for="intro_decs">Intro Description</label>
                    <textarea name="intro_decs"
                        class="form-control">{{ old('intro_decs', $homepageContent->intro_decs ?? '') }}</textarea>
                </div>
                <!-- Other fields go here -->
                <button type="submit" class="btn btn-primary">Save</button>
            </form>

            <br>
        </div>
    </div>
</div>
<!-- testimonial and top selling end -->



@endsection



@section('script')



@endsection