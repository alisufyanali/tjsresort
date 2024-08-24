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
                    <h3 class="text-center txt-primary">Sign Up Now</h3>
                </div>
            </div>


            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group form-primary">
                    <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" required=""
                        value="{{ old('name') }}" autocomplete="name" autofocus>
                    <span class="form-bar"></span>
                    <label class="form-label float-label">User Name</label>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

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
                    <input type="text" name="phone" class="form-control  @error('phone') is-invalid @enderror"
                        required="" value="{{ old('phone') }}" autocomplete="phone" autofocus>
                    <span class="form-bar"></span>
                    <label class="form-label float-label">User phone</label>
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>




                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-primary">
                            <input type="password" name="password"
                                class="form-control  @error('password') is-invalid @enderror" required="">
                            <span class="form-bar"></span>
                            <label class="form-label float-label">Password</label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-primary">
                            <input type="password" name="password_confirmation" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="form-label float-label">Confirm Password</label>
                        </div>
                    </div>
                </div>

                <div class="row m-t-30">
                    <div class="col-md-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-md waves-effect text-center 
                            m-b-20">Signup
                                Now</button>
                        </div>
                    </div>
                </div>

            </form>

            <p class="text-inverse text-start">Already have an account?<a href="{{ route('login') }}"> <b>Login here
                    </b></a></p>

        </div>
    </div>
</div>
<!-- end of form -->
@endsection