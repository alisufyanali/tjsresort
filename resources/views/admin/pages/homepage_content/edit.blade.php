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
            <h2>Edit Homepage Content</h2>
            @php
            $homepageContent = $data['content'];
            @endphp
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

            <form action="{{ route('admin.homepage_content.update', $homepageContent->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="main_heading">Main Heading</label>
                    <input type="text" name="main_heading" class="form-control"
                        value="{{ old('main_heading', $homepageContent->main_heading) }}">
                </div>

                <div class="form-group">
                    <label for="sub_heading">Sub Heading</label>
                    <input type="text" name="sub_heading" class="form-control"
                        value="{{ old('sub_heading', $homepageContent->sub_heading) }}">
                </div>

                <div class="form-group">
                    <label for="banner">Banner</label>
                    <input type="file" name="banner" class="form-control">
                    @if($homepageContent->banner)
                    <img src="{{ asset('storage/app/public/' . $homepageContent->banner) }}" alt="Banner" width="200">
                    @endif
                </div>

                <div class="form-group">
                    <label for="intro_decs">Intro Description</label>
                    <textarea name="intro_decs"
                        class="form-control">{{ old('intro_decs', $homepageContent->intro_decs) }}</textarea>
                </div>

                <!-- Repeat the above block for other images and fields -->
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="intro_icon_1">Intro Icon 1</label>
                            <input type="text" name="intro_icon_1" class="form-control"
                                value="{{ old('intro_icon_1', $homepageContent->intro_icon_1) }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="intro_name_1">Intro Name 1</label>
                            <input type="text" name="intro_name_1" class="form-control"
                                value="{{ old('intro_name_1', $homepageContent->intro_name_1) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="intro_icon_2">Intro Icon 2</label>
                            <input type="text" name="intro_icon_2" class="form-control"
                                value="{{ old('intro_icon_2', $homepageContent->intro_icon_2) }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="intro_name_2">Intro Name 2</label>
                            <input type="text" name="intro_name_2" class="form-control"
                                value="{{ old('intro_name_2', $homepageContent->intro_name_2) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="intro_icon_3">Intro Icon 3</label>
                            <input type="text" name="intro_icon_3" class="form-control"
                                value="{{ old('intro_icon_3', $homepageContent->intro_icon_3) }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="intro_name_3">Intro Name 3</label>
                            <input type="text" name="intro_name_3" class="form-control"
                                value="{{ old('intro_name_3', $homepageContent->intro_name_3) }}">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="intro_img_back">Intro Image Back</label>
                    <input type="file" name="intro_img_back" class="form-control">
                    @if($homepageContent->intro_img_back)
                    <img src="{{ asset('storage/app/public/' . $homepageContent->intro_img_back) }}"
                        alt="Intro Image Back" width="200">
                    @endif
                </div>

                <div class="form-group">
                    <label for="intro_img_front">Intro Image Front</label>
                    <input type="file" name="intro_img_front" class="form-control">
                    @if($homepageContent->intro_img_front)
                    <img src="{{ asset('storage/app/public/' . $homepageContent->intro_img_front) }}"
                        alt="Intro Image Front" width="200">
                    @endif
                </div>

                <div class="form-group">
                    <label for="why_us">Why Us</label>
                    <textarea name="why_us"
                        class="form-control">{{ old('why_us', $homepageContent->why_us) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="why_us_services">Why Us Services</label>
                    <textarea name="why_us_services"
                        class="form-control">{{ old('why_us_services', $homepageContent->why_us_services) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="why_us_img_1">Why Us Image 1</label>
                    <input type="file" name="why_us_img_1" class="form-control">
                    @if($homepageContent->why_us_img_1)
                    <img src="{{ asset('storage/app/public/' . $homepageContent->why_us_img_1) }}" alt="Why Us Image 1"
                        width="200">
                    @endif
                </div>

                <div class="form-group">
                    <label for="why_us_img_2">Why Us Image 2</label>
                    <input type="file" name="why_us_img_2" class="form-control">
                    @if($homepageContent->why_us_img_2)
                    <img src="{{ asset('storage/app/public/' . $homepageContent->why_us_img_2) }}" alt="Why Us Image 2"
                        width="200">
                    @endif
                </div>

                <div class="form-group">
                    <label for="why_us_img_3">Why Us Image 3</label>
                    <input type="file" name="why_us_img_3" class="form-control">
                    @if($homepageContent->why_us_img_3)
                    <img src="{{ asset('storage/app/public/' . $homepageContent->why_us_img_3) }}" alt="Why Us Image 3"
                        width="200">
                    @endif
                </div>

                <div class="form-group">
                    <label for="virtual_link">Virtual Link</label>
                    <input type="text" name="virtual_link" class="form-control"
                        value="{{ old('virtual_link', $homepageContent->virtual_link) }}">
                </div>

                <div class="form-group">
                    <label for="virtual_img">Virtual Image</label>
                    <input type="file" name="virtual_img" class="form-control">
                    @if($homepageContent->virtual_img)
                    <img src="{{ asset('storage/app/public/' . $homepageContent->virtual_img) }}" alt="Virtual Image"
                        width="200">
                    @endif
                </div>

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