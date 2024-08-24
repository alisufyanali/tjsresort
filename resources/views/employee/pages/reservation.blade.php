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
        <div class="card-block p-b-0">
            <div class="table-responsive">
                <table  id="dom-jqry" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>Member</th>
                            <th>Date In</th>
                            <th>Date Out</th>
                            <th>Truck #</th>
                            <th>Truck Color</th>
                            <th>No Of Spaces</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($data['reservations']))
                        @foreach ($data['reservations'] as $contact)
                        <tr>
                            <td> <a target="_blank" href="{{ route('location-detail' , $contact->location->slug ) }}" >  {{ $contact->location->location_name }} </a></td>
                            <td>{{ $contact->user->name }}</td>
                            <td>{{ $contact->date_in }}</td>
                            <td>{{ $contact->date_out }}</td>
                            <td>{{ $contact->truck_number }}</td>
                            <td>{{ $contact->truck_color }}</td>
                            <td>{{ $contact->number_of_spaces }}</td>
                            <td>{{ $contact->total_price }}</td>

                            <td>
                                <a href="{{ route('employee.reservation.show' , $contact->id) }}" class="btn btn-primary" target="_blank" >
                                    <i class="fa fa-eye"></i>
                                </a>
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

 

@csrf
@endsection



@section('script')

<script>
$(document).ready(function() {

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