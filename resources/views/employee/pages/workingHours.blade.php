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
            <br>
            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Day</th>
                        <th>On / Off</th>
                        <th>Start Time</th>
                        <th>End Time</th> 

                    </tr>
                </thead>
                <tbody id="timeOffTable">
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
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection



@section('script')
<script>
$(document).ready(function() {

});
</script>


@endsection