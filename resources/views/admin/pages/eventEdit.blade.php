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

            @php
            $event = $data['event'];
            @endphp

            <br>
            <form id="editEventForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="open_time">Open Time:</label>
                    <input type="time" class="form-control" id="open_time" name="open_time"
                        value="{{ $event->open_time }}" required>
                </div>
                <div class="form-group">
                    <label for="close_time">Close Time:</label>
                    <input type="time" class="form-control" id="close_time" name="close_time"
                        value="{{ $event->close_time }}" required>
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" class="form-control" id="start_date" name="start_date"
                        value="{{ $event->start_date }}" required>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $event->end_date }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ $event->location }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="schedule">Schedule:</label>
                    <textarea class="form-control" id="schedule" name="schedule"
                        required>{{ $event->schedule }}</textarea>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description"
                        required>{{ $event->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="more_about_event">More About Event:</label>
                    <textarea class="form-control" id="more_about_event" name="more_about_event"
                        required>{{ $event->more_about_event }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @if ($event->image)
                    <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" width="100">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <br>

        </div>
    </div>
</div>
<!-- testimonial and top selling end -->



<!-- Add Coupon Modal -->
<div class="modal fade" id="addCouponModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="locationModalLabel">Add New Coupon</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    fdprocessedid="8z3gvd"></button>
            </div>
            <div class="modal-body">
                <form id="addCouponForm">
                    @csrf
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" id="code" name="code" required>
                    </div>
                    <div class="form-group">
                        <label for="expiry_date">Expiry Date</label>
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
                    </div>
                    <div class="form-group">
                        <label for="discount">Discount</label>
                        <input type="number" class="form-control" id="discount" name="discount" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Coupon</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Coupon Modal -->
<div class="modal fade" id="editCouponModal" tabindex="-1" role="dialog" aria-labelledby="editCouponModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="locationModalLabel">Edit Coupon</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    fdprocessedid="8z3gvd"></button>
            </div>

            <div class="modal-body">
                <form id="editCouponForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editCouponId">
                    <div class="form-group">
                        <label for="editCode">Code</label>
                        <input type="text" class="form-control" id="editCode" name="code" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_expiry_date">Expiry Date</label>
                        <input type="date" class="form-control" id="edit_expiry_date" name="expiry_date" required>
                    </div>
                    <div class="form-group">
                        <label for="editDiscount">Discount</label>
                        <input type="number" class="form-control" id="editDiscount" name="discount" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Coupon</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection



@section('script')
<script>
$(document).ready(function() {
    $('#editEventForm').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append('_method', 'PUT');

        $.ajax({
            type: 'POST',
            url: "{{ route('admin.event.update', $event->id) }}",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                alert('Event updated successfully.');
                window.location.href = "{{ route('admin.event.list') }}";
            },
            error: function(error) {
                console.error('Error:', error.responseJSON);
                alert('Failed to update event.');
            }
        });
    });
});
</script>


@endsection