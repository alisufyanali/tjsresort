@extends('admin.layouts.app')

@section('style')

<style>
    .error{
        color: red;
    }
</style>
@endsection




@section('content')

<!-- testimonial and top selling start -->
<div class="col-md-12">
    <div class="card table-card">
        <div class="card-header">

            <button class="btn btn-primary waves-effect" id="addNewEmployee">
                <i class="fa fa-plus"></i> Add New</button>

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
            <div class="table-responsive">
                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Working Hours</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($data['employees']))
                        @foreach ($data['employees'] as $key => $employee)
                        <tr>
                            <td>{{ $key  + 1  }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>
                                <a href="{{ route('admin.working-hour.list' , $employee->id ) }}" target="_blank" >View </a>
                            <td>
                                <button class="btn btn-success editEmployee" data-id="{{ $employee->id }}">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <button class="btn btn-danger deleteLocation" data-id="{{ $employee->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- testimonial and top selling end -->


<!-- Modal static-->
<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="employeeModalLabel">Add / Edit Employee</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form id="employeeForm">
                    @csrf
                    <input type="hidden" id="employee_id">
                    <div class="form-group">
                        <label for="name">Employee Name:</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Employee Email:</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>

                    <div class="form-group">
                        <label for="password">Employee Password:</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>

                    <div class="form-group  password_confirmation_div" >
                        <label for="password_confirmation">Confirm Password:</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            id="password_confirmation">
                    </div>

                    <button type="button" class="btn btn-primary" id="saveBtn">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>






@csrf
@endsection



@section('script')

<script>
$(document).ready(function() {

    $(document).on('click', '#addNewEmployee', function() {
        $('#employeeForm').trigger("reset");
        $('.password_confirmation_div').show();
        $(".error").remove()
        $('#employeeModalLabel').text("Add New Employee");
        $('#employeeModal').modal('show');
    });


    $(document).on('click', '#saveBtn', function() {
        $(".error").remove()
        var formData = new FormData($('#employeeForm')[0]);
        var employee_id = $('#employee_id').val();
        var ajaxUrl = employee_id ? 'update/' + employee_id : 'store';
        var ajaxMethod = employee_id ? 'POST' : 'POST';
        if (employee_id) {
            formData.append('_method', 'PUT');
        }

        $.ajax({
            url: ajaxUrl,
            method: ajaxMethod,
            data: formData,
            processData: false, // Important for file upload
            contentType: false, // Important for file upload
            success: function(response) {
                $('#employeeModal').modal('hide');
                alert(response.message)
                location.reload();
            },
            error: function(response) {
                errors = response.responseJSON.errors;
                jQuery.each(errors, function(index, item) {
                    $("#" + index).after('<span class="error" >' + item +
                        ' </span>')
                });
            }
        });
    });


    $(document).on('click', '.editEmployee', function() {
        var location_id = $(this).data('id');
        $.get('edit/' + location_id, function(data) {
            $('#employeeForm').trigger("reset");
            $('#employeeModalLabel').text("Edit Employee");
            $('#employee_id').val(data.id);

            $('#name').val(data.name);
            $('#email').val(data.email);
            $('.password_confirmation_div').hide();

            $(".error").remove()
            $('#employeeModal').modal('show');
        });
    });



    $(document).on('click', '.deleteLocation', function() {
        var location_id = $(this).data('id');
        if (confirm("Are you sure you want to delete this?")) {
            $.ajax({
                url: 'destroy/' + location_id,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                success: function(response) {
                    location.reload();
                },
                error: function(response) {
                    alert('Error: ' + response.responseJSON.message);
                }
            });
        }
    });
});
</script>

@endsection