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

            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary waves-effect"> Add New</a>

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

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <br>
            <h2>Edit Email Setting</h2>
            <form action="{{ route('admin.email_settings.update', $data['emailSetting']->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="mail_driver">Mail Driver</label>
                    <input type="text" class="form-control" id="mail_driver" name="mail_driver"
                        value="{{ $data['emailSetting']->mail_driver }}" required>
                </div>
                <div class="form-group">
                    <label for="mail_host">Mail Host</label>
                    <input type="text" class="form-control" id="mail_host" name="mail_host"
                        value="{{ $data['emailSetting']->mail_host }}" required>
                </div>
                <div class="form-group">
                    <label for="mail_port">Mail Port</label>
                    <input type="number" class="form-control" id="mail_port" name="mail_port"
                        value="{{ $data['emailSetting']->mail_port }}" required>
                </div>
                <div class="form-group">
                    <label for="mail_username">Mail Username</label>
                    <input type="text" class="form-control" id="mail_username" name="mail_username"
                        value="{{ $data['emailSetting']->mail_username }}" required>
                </div>
                <div class="form-group">
                    <label for="mail_password">Mail Password</label>
                    <input type="password" class="form-control" id="mail_password" name="mail_password"
                        value="{{ $data['emailSetting']->mail_password }}" required>
                </div>
                <div class="form-group">
                    <label for="mail_encryption">Mail Encryption</label>
                    <input type="text" class="form-control" id="mail_encryption" name="mail_encryption"
                        value="{{ $data['emailSetting']->mail_encryption }}">
                </div>
                <div class="form-group">
                    <label for="mail_from_address">Mail From Address</label>
                    <input type="email" class="form-control" id="mail_from_address" name="mail_from_address"
                        value="{{ $data['emailSetting']->mail_from_address }}" required>
                </div>
                <div class="form-group">
                    <label for="mail_from_name">Mail From Name</label>
                    <input type="text" class="form-control" id="mail_from_name" name="mail_from_name"
                        value="{{ $data['emailSetting']->mail_from_name }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <br>
        </div>
    </div>
</div>
<!-- testimonial and top selling end -->



@endsection



@section('script')



@endsection