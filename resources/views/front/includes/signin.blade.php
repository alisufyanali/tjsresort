<!-- Modal -->
<div class="modal fade " id="siginModal" tabindex="-1" aria-labelledby="siginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <div class="auth-btn-div w-100 text-center">
                    <button class="btn btn-primary mx-2 p-3 border w-35" type="button">
                        Login</button>
                    <button class="btn btn-light mx-2 p-3 border w-35" data-bs-toggle="modal"
                        data-bs-target="#sigupsModal" type="button">
                        Signup</button>

                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row  register-row">
                    <div class="col-6">
                        <div class="register-btn">
                            <img src="{{ asset('public/front/images/signin-bg.png') }}" alt="" srcset="">
                        </div>
                    </div>
                    <div class="col-6 p-3">
                        <h2 class="fs-3 text-center register-title">Login</h2>
                        <div class="text-center mt-3">
                            <button class="btn btn-danger w-50 p-3">
                                <i class="fa-brands fa-google"></i>
                                Login with google
                            </button>
                        </div>
                        <div class="or-div my-3">
                            <div class="or-text fs-4">Or</div>
                        </div>

                        <form method="POST" id="loginForm" action="{{ route('login') }}">
                            @csrf

                            <div id="loginError"class="text-red" style="display: none;"></div>
                            <div class="form-group my-3">
                                <input id="email" type="email" class="form-control p-3  " name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Enter Email Address...">
                            </div>

                            <div class="form-group my-3">
                                <input id="password" type="password" class="form-control p-3 " name="password" required
                                    autocomplete="current-password" placeholder="Password">
                            </div>

                            <div class="form-group my-4 row">
                                <div class="custom-control custom-checkbox small col-6">
                                    <input class="form-check-input p-2" type="checkbox" name="remember" id="customCheck"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label fs-5" for="customCheck">Remember
                                        Me</label>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="http://" class="t-d-none">Forget Password ?</a>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-dark w-100 my-3 p-3 btn-user btn-block">
                                {{ __('Login') }}
                            </button>
                        </form>

                        <div class="my-3 text-center">
                            Don't have an account? <a href="javascript:void(0)" class="text-red t-d-none"
                                data-bs-toggle="modal" data-bs-target="#sigupsModal">sign up</a>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
