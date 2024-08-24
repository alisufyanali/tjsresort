@extends('admin.layouts.auth')

@section('content')


<!-- Authentication card start -->
<div class="md-float-material form-material">
    <div class="text-center">
        <img src="{{ asset('public/admin/assets/images/logo.png')}}" style="width:6rem" alt="logo.png">
    </div>
    <div class="auth-box card">
        <div class="card-block">
            <div class="row m-b-20">
                <div class="col-md-12">
                    <h3 class="text-center txt-primary">Sign In</h3>
                </div>
            </div>


            <form method="POST" action="{{ route('login') }}">
                @csrf
                <p class="text-muted text-center p-b-5">Sign in with your regular account</p>

                <div class="form-group form-primary">
                    <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror"
                        required="" value="{{ old('email') }}" autocomplete="email" autofocus>
                    <span class="form-bar"></span>
                    <label class="form-label float-label">User Email</label>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group form-primary">
                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror"
                        required="">
                    <span class="form-bar"></span>
                    <label class="form-label float-label">Password</label>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row m-t-25 text-start">
                    <div class="col-12">
                        <div class="checkbox-fade fade-in-primary">
                            <label class="form-label">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                <span class="text-inverse">Remember me</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row m-t-30">
                    <div class="col-md-12">
                        <div class="d-grid">
                            <button type="submit"
                                class="btn btn-primary btn-md waves-effect text-center m-b-20">LOGIN</button>
                        </div>
                    </div>
                </div>

            </form>

            <p class="text-inverse text-start">Don't have an account?<a href="{{ route('register') }}"> <b>Register here </b></a>for free!</p>

            <p><a href="{{ route('home') }}">Go To HomePage </a></p>
        </div>
    </div>
</div>
<!-- end of form -->
@endsection