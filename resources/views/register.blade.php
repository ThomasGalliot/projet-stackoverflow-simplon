@extends('layouts.fullwidth')

@section('title', 'Inscription')

@section('content')
    <div class="login">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="page-content">
                    <h2>Register</h2>
                    <div class="form-style form-style-3">
                        <form>

                            <div class="form-inputs clearfix">
                                <p class="login-text">
                                    <input type="text" name="name" value="" placeholder="Username" required autofocus>
                                    <i class="icon-user"></i>
                                </p>
                                <p class="login-text">
                                    <input type="email" name="email" value="" placeholder="Email" required autofocus>
                                    <i class="icon-envelope"></i>
                                </p>
                                <p class="login-password">
                                    <input type="password" name="password" placeholder="Password" required>
                                    <i class="icon-lock"></i>
                                </p>
                                <p class="login-password">
                                    <input id="password-confirm" type="password" name="password_confirmation" placeholder="Repeat password" required>
                                    <i class="icon-lock"></i>
                                </p>
                            </div>
                            <p class="form-submit login-submit">
                                <input type="submit" value="Register" class="button color small login-submit submit">
                            </p>
                        </form>
                    </div>
                </div><!-- End page-content -->
            </div><!-- End col-md-6 -->
        </div><!-- End row -->
    </div><!-- End login -->

@endsection
