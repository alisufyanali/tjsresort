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
            <h4 class="text-center">Working Hours Of <strong> {{ $data['employee']['name'] }} </strong> </h4>
            @if(isset($data['workingHours']) && count($data['workingHours']) == 0 )
                <a class="btn btn-primary btn-add-task waves-effect waves-light  " href="#" data-bs-toggle="modal"
                    data-bs-target="#addModal">
                    <i class="icofont icofont-plus"></i> Add Working Hour
                </a>
            @endif

            <br>
            <br>
            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <td> No. </td>
                        <td> Day </td>
                        <td> ON / Off </td>
                        <td> Start Time </td>
                        <td> End Time </td>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="workingHourTable">
                    @if(isset($data['workingHours']))
                    @foreach ($data['workingHours'] as $key => $workingHour)
                    <tr data-id="{{ $workingHour->id }}">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $workingHour->working_day }}</td>
                        <td>
                            @if($workingHour->working_on == 1)
                            <span class="badge badge-success"> On </span>
                            @else
                            <span class="badge badge-danger"> Off </span>
                            @endif

                        </td>
                        <td>{{ $workingHour->start_time }}</td>
                        <td>{{ $workingHour->end_time }}</td>
                        <td>
                            <button class="btn btn-warning edit-workingHour mary btn-add-task m-0" href="#"
                                data-id="{{ $workingHour->id }}" data-bs-toggle="modal" data-bs-target="#editModal">
                                <i class="fa fa-edit"></i></button>

                            <button class="btn btn-danger delete-workingHour" data-id="{{ $workingHour->id }}">
                                <i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- testimonial and top selling end -->



<!-- Add Coupon Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="locationModalLabel">Add New Working Hours</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    fdprocessedid="8z3gvd"></button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    @csrf
                    <input type="hidden" name="employee_id" value="{{ $data['employee']['id'] }}">
                    <table class="table">
                        <tr>
                            <td> Day </td>
                            <td> ON / Off </td>
                            <td> Start Time </td>
                            <td> End Time </td>
                        </tr>

                        @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                        <tr>
                            <td>
                                <input type="text" readonly id="working_day" name="working_day[]" value="{{ $day }}">
                            </td>
                            <td>
                                <input type="checkbox" id="working_on" name="working_on[]">
                            </td>
                            <td>
                                <input type="time" class="form-control" id="start_time" name="start_time[]">
                            </td>
                            <td>
                                <input type="time" class="form-control" id="end_time" name="end_time[]">
                            </td>
                        </tr>
                        @endforeach

                    </table>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Coupon Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="locationModalLabel">Edit Working Hours</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    fdprocessedid="8z3gvd"></button>
            </div>

            <div class="modal-body">
                <form id="editForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editId">
                    <input type="hidden" id="edit_employee_id" name="employee_id" value="{{ $data['employee']['id'] }}">
                    <div class="form-group">
                        <label for="edit_working_day">Day</label>
                        <input type="text" class="form-control" id="edit_working_day" name="working_day" readonly>
                    </div>
                    <div class="form-group">
                        <label for="edit_working_on">On / Off</label>
                        <input type="checkbox" class="form-check" id="edit_working_on" name="working_on">
                    </div>
                    <div class="form-group">
                        <label for="edit_start_time">Start Time</label>
                        <input type="time" class="form-control" id="edit_start_time" name="start_time">
                    </div>
                    <div class="form-group">
                        <label for="edit_end_time">End Time</label>
                        <input type="time" class="form-control" id="edit_end_time" name="end_time">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection



@section('script')
<script>
$(document).ready(function() {
    // Add Coupon
    $('#addForm').on('submit', function(e) {
        e.preventDefault();
        $(".error").remove();
        $.ajax({
            url: '{{ route("admin.working-hour.store") }}',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.errors) {
                    // Handle validation errors
                    console.log(response.errors);
                } else {
                    location.reload()
                }
            },
            error: function(response) {
                errors = response.responseJSON.errors;
                jQuery.each(errors, function(index, item) {
                    $("#" + index).after('<span class="error text-danger" >' + item +
                        ' </span>')
                });
            }
        });
    });

    // Edit Coupon
    $(document).on('click', '.edit-workingHour', function() {
        var id = $(this).data('id');
        $.get(`../edit/${id}`, function(data) {
            $('#editId').val(data.id);
            $('#edit_start_time').val(data.start_time);
            $('#edit_end_time').val(data.end_time);
            $('#edit_working_day').val(data.working_day);
            if(data.working_on == 1){
                $('#edit_working_on').prop('checked', true);
            }else{
                $('#edit_working_on').prop('checked', false);
            }
        });
    });

    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        var id = $('#editId').val();
        $(".error").remove();
        $.ajax({
            url: `{{ url('admin/working-hour/update') }}/${id}`,
            method: 'PUT',
            data: $(this).serialize(),
            success: function(response) { 
                    location.reload()
            },
            error: function(response) {
                errors = response.responseJSON.errors;
                jQuery.each(errors, function(index, item) {
                    $("#edit_" + index).after('<span class="error text-danger" >' + item +
                        ' </span>')
                });
            }
        });
    });

    // Delete Coupon
    $(document).on('click', '.delete-workingHour', function() {
        var id = $(this).data('id');
        if (confirm('Are you sure you want to delete this workingHour?')) {
            $.ajax({
                url: `../destroy/${id}`,
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    location.reload()
                }
            });
        }
    });
});
</script>


@endsection