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
            @php
            $testimonials = $data['testimonials'];
            @endphp
            <h1>Homepage Testimonials</h1>
            <a href="{{ route('admin.homepage_testimonial.create') }}" class="btn btn-primary">Add New Testimonial</a>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Comment</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($testimonials) && count($testimonials) > 0 )
                    @foreach($testimonials as $testimonial)
                    <tr>
                        <td>{{ $testimonial->id }}</td>
                        <td>{{ $testimonial->comment }}</td>
                        <td>{{ $testimonial->name }}</td>
                        <td>{{ $testimonial->postion }}</td>
                        <td>
                            <img src="{{ asset('storage/app/public/' . $testimonial->image) }}" alt="{{ $testimonial->name }}"
                                width="50">
                            </td>
                        <td>
                            <a href="{{ route('admin.homepage_testimonial.edit', $testimonial->id) }}"
                                class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.homepage_testimonial.destroy', $testimonial->id) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>


            <br>
        </div>
    </div>
</div>
<!-- testimonial and top selling end -->



@endsection



@section('script')



@endsection