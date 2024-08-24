@extends('admin.layouts.app')

@section('style')

<style>
.list i.fa.fa-star {
    color: #f0ad4e;
}
</style>

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
                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Message</th>
                            <th>Approved</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($data['reviews']))
                        @foreach ($data['reviews'] as $review)
                        <tr>
                            <td>{{ $review->name }}</td>
                            <td>{{ $review->email }}</td>
                            <td>
                                <div class="list">
                                    @for ($i = 1; $i <= 5; $i++) @if ($i <=$review->rating )
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        @else
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @endif
                                        @endfor
                                </div>
                            </td>

                            <td style="width:25%">
                                <p style="width:75%; text-wrap: pretty;"> {{ $review->message }}</p>
                            </td>

                            <td>
                                @if($review->approved == 1)
                                <span class="badge bg-success">Yes </span>
                                @else
                                <span class="badge bg-danger"> No</span>
                                @endif
                            </td>

                            <td>

                                @if($review->approved == 1)
                                <button class="btn btn-danger disapprove"
                                    data-id="{{ $review->id }}">Disapprove</button>
                                @else
                                <button class="btn btn-success approve" data-id="{{ $review->id }}">Approve</button>
                                @endif

                                <button class="btn btn-danger deleteLocation" data-id="{{ $review->id }}">
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




    $('.approve').click(function() {
        var reviewId = $(this).data('id');
        $.ajax({
            url:   reviewId + '/approve',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert(response.message);
                 location.reload();
            },
            error: function(response) {
                alert('Error approving review');
            }
        });
    });

    $('.disapprove').click(function() {
        var reviewId = $(this).data('id');
        $.ajax({
            url:   reviewId + '/disapprove',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                 alert(response.message);
                 location.reload();
            },
            error: function(response) {
                alert('Error disapproving review');
            }
        });
    });
});
</script>

@endsection