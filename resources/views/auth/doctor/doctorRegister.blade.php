@extends('layouts.frontend')
@section('front')
    <div class="content" style="min-height: 95px;">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- Login Tab Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{asset('assets/frontend/')}}/img/login-banner.png" class="img-fluid" alt="Doccure Login">
                            </div>
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3>Register <span>Doctor</span></h3>
                                </div>
                                <form action="{{route('doctor.register.submit')}}" method="post">
                                    @csrf
                                    <div class="form-group form-focus">
                                        <input type="text" name="name" class="form-control floating">
                                        <label class="focus-label">Name</label>
                                    </div>
                                    <div class="form-group form-focus">
                                        <input type="email" name="email" class="form-control floating">
                                        <label class="focus-label">Email</label>
                                    </div>
                                    <div class="form-group form-focus">
                                        <input type="number" name="phone_number" class="form-control floating">
                                        <label class="focus-label">Phone</label>
                                    </div>
                                    <div class="form-group form-focus">
                                        <input type="password" name="password" class="form-control floating">
                                        <label class="focus-label">Password</label>
                                    </div>
                                    <div class="form-group form-focus">
                                        <input type="password" name="c_password" class="form-control floating">
                                        <label class="focus-label">Confirm Password</label>
                                    </div>
                                    <div class="text-right">
                                        <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
                                    </div>
                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
                                    <div class="login-or">
                                        <span class="or-line"></span>
                                        <span class="span-or">or</span>
                                    </div>
                                    <div class="row form-row social-login">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Register</button>
                                        </div>
                                        <div class="col-6">
                                            <a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
                                        </div>
                                    </div>
                                    <div class="text-center dont-have">Already have an account? <a href="{{route('doctor.login')}}">Login</a></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Login Tab Content -->

                </div>
            </div>

        </div>

    </div>
@stop
