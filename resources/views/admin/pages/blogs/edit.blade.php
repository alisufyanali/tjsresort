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

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <br>

            <form action="{{ route('admin.blogs.update', $data['blog']['id'] ) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="blog_id" value="{{ $data['blog']->id }}">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $data['blog']->title }}">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content">{{ $data['blog']->content }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach ($data['categories'] as $data['category'])
                        <option value="{{ $data['category']->id }}"
                            {{ $data['blog']->category_id == $data['category']->id ? 'selected' : '' }}>
                            {{ $data['category']->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tags" class="form-label">Tags</label>
                    <select multiple class="form-control" id="tags" name="tags[]">
                        @foreach ($data['tags'] as $data['tag'])
                        <option value="{{ $data['tag']->id }}"
                            {{ in_array($data['tag']->id, $data['blog']->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $data['tag']->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="featured_image" class="form-label">Featured Image</label>
                    <input type="file" class="form-control" id="featured_image" name="featured_image">
                    @if($data['blog']->featured_image)
                    <img src="{{ asset('storage/app/public/' . $data['blog']->featured_image) }}"
                        class="img-thumbnail mt-2" width="150">
                    @endif

                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <br>
        </div>
    </div>
</div>
<!-- testimonial and top selling end -->



@endsection



@section('script')



@endsection