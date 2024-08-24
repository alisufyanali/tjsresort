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

            @if( ! isset($data['settings']))
            <a href="{{ route('admin.email_settings.create') }}" class="btn btn-primary waves-effect"> Add New</a>
            @endif

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
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mail Driver</th>
                        <th>Mail Host</th>
                        <th>Mail Port</th>
                        <th>Mail Username</th>
                        <th>Mail From Address</th>
                        <th>Mail From Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($data['settings']))
                    <tr>
                        <td>{{ $data['settings']->id }}</td>
                        <td>{{ $data['settings']->mail_driver }}</td>
                        <td>{{ $data['settings']->mail_host }}</td>
                        <td>{{ $data['settings']->mail_port }}</td>
                        <td>{{ $data['settings']->mail_username }}</td>
                        <td>{{ $data['settings']->mail_from_address }}</td>
                        <td>{{ $data['settings']->mail_from_name }}</td>
                        <td>
                            <a href="{{ route('admin.email_settings.edit', $data['settings']->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.email_settings.destroy', $data['settings']->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <br>
        </div>
    </div>
</div>
<!-- testimonial and top selling end -->



@endsection



@section('script')



@endsection