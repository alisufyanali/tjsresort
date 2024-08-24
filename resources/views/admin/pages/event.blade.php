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
                href="{{ route('admin.event.create') }}">
                <i class="icofont icofont-plus"></i> Add Event</a>
            <br>
            <br>

            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>title</th>
                        <th>Start - End Date</th>
                        <th>Open - Close Time</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="couponTable">
                    @if(isset($data['events']))
                    @foreach ($data['events'] as $coupon)

                    <tr data-id="{{ $coupon->id }}">
                        <td>{{ $coupon->id }}</td>
                        <td>{{ $coupon->title }}</td>
                        <td>{{ $coupon->start_date }} - {{ $coupon->end_date }}</td>
                        <td>{{ $coupon->open_time }} - {{ $coupon->close_time }}</td>
                        <td>
                            <img class="w-50" src="{{ asset('public/assets/img/event/'. $coupon->image  )}}" alt="">
                        </td>
                        <td>
                            <a class="btn btn-warning btn-add-task m-0"
                                href="{{ route('admin.event.edit',$coupon->id ) }}">
                                <i class="fa fa-edit"></i></a>
                            <button class="btn btn-danger delete-coupon" data-id="{{ $coupon->id }}">
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


@endsection



@section('script')
<script>
$(document).ready(function() {

    // Delete Coupon
    $(document).on('click', '.delete-coupon', function() {
        var id = $(this).data('id');
        var url = `{{ route('admin.event.destroy', ':id') }}`.replace(':id', id);

        if (confirm('Are you sure you want to delete this?')) {
            $.ajax({
                url: url,
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $(`tr[data-id="${id}"]`).remove();
                    alert(response.success)
                }
            });
        }
    });
});
</script>


@endsection