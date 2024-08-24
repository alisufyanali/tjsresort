@extends('employee.layouts.app')

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
            <h4 class="text-center">Your Time Off Requests</h4>
            <a class="btn btn-primary btn-add-task waves-effect waves-light m-t-10" href="#" data-bs-toggle="modal"
                data-bs-target="#addModal"><i class="icofont icofont-plus"></i> New Time Off Requests</a>
            <br>
            <br>
            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>Time off From</th>
                        <th>Time off to</th>
                        <th>Reason</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="timeOffTable">
                    @if(isset($data['timeOffRequests']))
                    @foreach ($data['timeOffRequests'] as $key => $request)

                    <tr data-id="{{ $request->id }}">
                        <td>{{ $request->start_date  }}</td>
                        <td>{{ $request->end_date  }}</td>
                        <td>{{ $request->reason  }}</td>
                        <td>
                            @if($request->status == 'pending')
                            <span class="badge bg-warning">{{ $request->status  }} </span>
                            @elseif($request->status == 'approved')
                            <span class="badge bg-success">{{ $request->status  }} </span>
                            @else
                            <span class="badge bg-danger"> {{ $request->status  }}</span>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
        </div>

        <br>


    </div>
</div>
<!-- testimonial and top selling end -->


<!-- Add Coupon Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="locationModalLabel"> New Time Off Requests </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    fdprocessedid="8z3gvd"></button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    @csrf
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" name="end_date" required>
                    </div>
                    <div class="form-group">
                        <label for="reason">Reason</label>
                        <textarea class="form-control" id="reason" name="reason" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
        if (confirm('Are you sure you want to Take Off?')) {
            $('.error').remove();
            $.ajax({
                url: '{{ route("employee.requestTimeOff") }}',
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
                        $("#" + index).after('<span class="error" >' + item +
                            ' </span>')
                    });
                }

            });
        }
    });

});
</script>


@endsection