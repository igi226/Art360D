@extends('User.Main.mainLayout')
@section('title', 'Login | Art360D')
@section('content')
    <div class="container">
        <div class="py-5">
            <form method="POST" action="{{ route('login') }}" class="login-form mx-auto shadow">
                @csrf
                <div class="section-header">
                    <div class="formlogo text-center">
                        <img src="{{ asset('User/assets/img/logo-inner.png') }}">
                    </div>
                    <h2 class="text-center">Sign in to Art Based Marketplace</h2>
                    <h3 class="mb-4">Hello, Welcome to your account.</h3>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label>Email Address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" >
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label>Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            Remember me</label>
                    </div>
                    <div class="col-6 text-end mb-3">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-danger">Forgot password?</a>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <button type="submit" class="btn-primary d-block btn-signin">SIGN IN</button>
                    </div>
                    <p>Not a Member? <a href="{{ route('register') }}" class="text-danger">Register</a></p>
                    <div class="col-12 mb-3">
                        <div class="orpnl text-center">
                            <span>or</span>
                        </div>
                    </div>
                    <div class="text-center loginsocial">
                        <a href="#" class="btn btn-fb"><i class="fab fa-facebook-f"></i> Sign In with Facebook </a>
                        <a href="#" class="btn btn-google"><i class="fab fa-google"></i> Sign In with Google </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
