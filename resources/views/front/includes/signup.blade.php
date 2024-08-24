<!-- Modal -->
<div class="modal fade " id="sigupsModal" tabindex="-1" aria-labelledby="sigupsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <div class="auth-btn-div w-100 text-center">
                    <button class="btn btn-light mx-2 p-3 border w-35" type="button" data-bs-toggle="modal"
                        data-bs-target="#siginModal">
                        Login</button>
                    <button class="btn btn-primary mx-2 p-3 border w-35" type="button">
                        Signup</button>
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row register-row">
                    <div class="col-6">
                        <div class="register-btn">
                            <img src="{{ asset('public/front/images/signup-bg.png') }}" alt="" srcset="">
                        </div>
                    </div>
                    <div class="col-6 p-3">
                        <h2 class="fs-3 text-center register-title">Signup</h2>
                        <div class="text-center mt-3">
                            <button class="btn btn-danger w-50 p-3">
                                <i class="fa-brands fa-google"></i>
                                Login with google
                            </button>
                        </div>
                        <div class="or-div my-3">
                            <div class="or-text fs-4">Or</div>
                        </div>
                        <form class="user" id="signupForm" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group my-3  ">
                                <input id="name" type="text" placeholder="Enter Name" class="form-control p-3"
                                    name="name" value="" required autocomplete="name" autofocus>

                            </div>
                            <div class="form-group my-3">
                                <input type="email" class="form-control p-3" id="email" name="email"
                                    value="" placeholder="Email Address" required>
                            </div>
                            <div class="form-group my-3 row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id="password" type="password" class="form-control p-3" name="password"
                                        placeholder="Password" required autocomplete="new-password">
                                </div>
                                <div class="col-sm-6">
                                    <input id="password-confirm" type="password" class="form-control p-3"
                                        name="password_confirmation" placeholder="Password Confirmation" required
                                        autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group my-4  ">
                                <div class="custom-control custom-checkbox small ">
                                    <input class="form-check-input p-2" type="checkbox" name="privacy"
                                        id="customCheck">
                                    <label class="custom-control-label fs-6" for="customCheck"> I have read and accept
                                        the Terms and Privacy Policy?
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark w-100 my-3 p-3 btn-user btn-block">
                                {{ __('Register') }}
                            </button>
                        </form>
                        <div class="my-3 text-center">
                            Already Have An Account ? <a href="javascript:void(0)" class="text-red t-d-none"
                                data-bs-toggle="modal" data-bs-target="#signinModal">Sign In</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
