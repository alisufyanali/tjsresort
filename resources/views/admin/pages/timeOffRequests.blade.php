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
            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Time off From</th>
                        <th>Time off to</th>
                        <th>reason</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="couponTable">
                    @if(isset($data['timeOffRequests']))
                    @foreach ($data['timeOffRequests'] as $request)

                    <tr data-id="{{ $request->id }}">
                        <td>{{ $request->employee->name  }}</td>
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
                        
                        <td>
                            @if($request->status != 'approved')
                            <a class="btn btn-warning" href="{{ route('admin.time-off.approveTimeOff', $request->id) }}">Approve</a>
                            @endif
                            
                            <a class="btn btn-danger " href="{{ route('admin.time-off.declineTimeOff', $request->id) }}">Decline</a>
                                
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


 

@endsection



@section('script')
<script>
$(document).ready(function() {
    
});
</script>


@endsection