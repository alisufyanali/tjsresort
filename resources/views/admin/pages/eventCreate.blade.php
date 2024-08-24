@extends('admin.layouts.app')

@section('style')

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

        <div class="container">
            <a class="btn btn-primary btn-add-task waves-effect waves-light m-t-10"
                href="{{ route('admin.event.list') }}">
                Back</a>

            <br>
            <br>
            <form id="createEventForm" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="open_time">Open Time:</label>
                    <input type="time" class="form-control" id="open_time" name="open_time" required>
                </div>
                <div class="form-group">
                    <label for="close_time">Close Time:</label>
                    <input type="time" class="form-control" id="close_time" name="close_time" required>
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" class="form-control" id="location" name="location" required>
                </div>
                <div class="form-group">
                    <label for="schedule">Schedule:</label>
                    <textarea class="form-control" id="schedule" name="schedule" required></textarea>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="more_about_event">More About Event:</label>
                    <textarea class="form-control" id="more_about_event" name="more_about_event" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control-file" id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <br>
        </div>
    </div>
</div>
<!-- testimonial and top selling end -->

  
@endsection



@section('script')
<script>
    $(document).ready(function() {
        $('#createEventForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: "{{ route('admin.event.store') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert('Event created successfully.');
                    window.location.href = "{{ route('admin.event.list') }}";
                },
                error: function(error) {
                    console.error('Error:', error.responseJSON);
                    alert('Failed to create event.');
                }
            });
        });
    });
</script>


@endsection