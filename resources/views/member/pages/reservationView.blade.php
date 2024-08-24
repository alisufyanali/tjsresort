@extends('member.layouts.app')

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

            <h1>Reservation Details</h1>
            <table>
            <tr>
                <th>Date In</th>
                <td>{{ $data['reservation']->date_in }}</td>
            </tr>
            <tr>
                <th>Date Out</th>
                <td>{{ $data['reservation']->date_out }}</td>
            </tr>
            <tr>
                <th>Nights</th>
                <td>{{ $data['reservation']->nights }}</td>
            </tr>
            <tr>
                <th>Truck Number</th>
                <td>{{ $data['reservation']->truck_number }}</td>
            </tr>
            <tr>
                <th>Truck Color</th>
                <td>{{ $data['reservation']->truck_color }}</td>
            </tr>
            <tr>
                <th>Number of Spaces</th>
                <td>{{ $data['reservation']->number_of_spaces }}</td>
            </tr>
            <tr>
                <th>Total Price</th>
                <td>{{ $data['reservation']->total_price }}</td>
            </tr>
            <tr>
                <th>Grand Price</th>
                <td>{{ $data['reservation']->grand_price }}</td>
            </tr>
            <tr>
                <th>Location</th>
                <td>{{ $data['reservation']->location->location_name }}</td>
            </tr>
            <tr>
                <th>User</th>
                <td>{{ $data['reservation']->user->name }}</td>
            </tr>
            <tr>
                <th>Coupon</th>
                <td>{{ $data['reservation']->coupon->code ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Payment Method</th>
                <td>{{ $data['reservation']->payment_method }}</td>
            </tr>
            <tr>
                <th>Stripe Response</th>
                <td>{{ $data['reservation']->stripe_response }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $data['reservation']->created_at }}</td>
            </tr>
        </table>
                <br>
        </div>
    </div>
</div>
<!-- testimonial and top selling end -->



@csrf
@endsection



@section('script')

<script>
$(document).ready(function() {
 
});
</script>

@endsection