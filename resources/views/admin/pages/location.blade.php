@extends('admin.layouts.app')

@section('style')


<style>
.error {
    color: red;
}
</style>
@endsection




@section('content')

<!-- testimonial and top selling start -->
<div class="col-md-12">
    <div class="card table-card">
        <div class="card-header">

            <a href="{{ route('admin.location.create') }}" class="btn btn-primary waves-effect" id="addNewLocation"><i class="fa fa-plus"></i> Add New</a>

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
                            <th>Charges Per Night</th>
                            <th>Total Spaces</th>
                            <th>Description</th>
                            <th>Featured location</th>
                            <th>Featured Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($data['locations']))
                        @foreach ($data['locations'] as $location)
                        <tr>
                            <td>{{ $location->location_name }}</td>
                            <td>{{ $location->per_night_charges }}</td>
                            <td>{{ $location->children +  $location->adult }}</td>
                            <td style="width:25%">
                                <p style="width:75%;    text-wrap: pretty;"> {{ $location->short_description }}</p>
                            </td>
                            <td>
                                @if($location->featured == 1)
                                <span class="badge bg-success">Yes </span>
                                @else
                                <span class="badge bg-danger"> No</span>
                                @endif
                            </td>

                            <td><img src="{{ asset('public/assets/img/location/'. $location->featured_image) }}"
                                    alt="{{ $location->location_name }}" width="100"></td>

                            <td>
                                <a class="btn btn-primary p-1" target="_blank"
                                    href="{{ route( 'location-detail', $location->slug ) }}">
                                    <i class="fa fa-eye m-0"></i>
                                </a>
                                <a class="btn btn-success p-1" href="{{ route('admin.location.edit' ,$location->id ) }}">
                                    <i class="fa fa-edit m-0"></i>
                                </a>
                                <button class="btn btn-danger deleteLocation p-1" data-id="{{ $location->id }}">
                                    <i class="fa fa-trash m-0"></i>
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


 

@endsection



@section('script')

<!-- Switch component js -->
<script type="text/javascript" src="{{ asset('public/admin/bower_components/switchery/js/switchery.min.js') }}">
</script>

<!-- Tags js -->
<script type="text/javascript"
    src="{{ asset('public/admin/bower_components/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script>

<script type="text/javascript" src="{{ asset('public/admin/assets/pages/advance-elements/swithces.js') }}"></script>




<script>
$(document).ready(function() {
 
    $(document).on('click', '.deleteLocation', function() {
        var location_id = $(this).data('id');
        if (confirm("Are you sure you want to delete this location?")) {
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