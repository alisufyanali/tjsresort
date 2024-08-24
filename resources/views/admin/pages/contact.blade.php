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
        <div class="card-block p-b-0">
            <div class="table-responsive">
                <table  id="dom-jqry" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($data['contacts']))
                        @foreach ($data['contacts'] as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->number }}</td>
                            <td style="width:25%">
                                <p style="width:75%;    text-wrap: pretty;"> {{ $contact->message }}</p>
                            </td>
                            
                            <td>
                                <button class="btn btn-danger deleteLocation" data-id="{{ $contact->id }}">
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
});
</script>

@endsection