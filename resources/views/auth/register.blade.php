@extends('User.Main.mainLayout')
@section('title', 'Register | Art360D')
@section('content')
    <div class="container">
        <div class="py-5">
            <form method="POST" action="{{ route('register') }}" class="login-form mx-auto shadow">
                @csrf
                <div class="section-header">
                    <div class="formlogo text-center">
                        <img src="{{ asset('User/assets/img/logo-inner.png') }}">
                    </div>
                    <h2 class="text-center">Sign Up to Art Based Marketplace</h2>
                    <h3 class="mb-4">Hello, Welcome to your account.</h3>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label>First Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                            name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus>
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label>Last Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                            value="{{ old('last_name') }}" autocomplete="last_name" autofocus>
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label>Email Address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label>Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label>Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password_confirmation"
                            autocomplete="new-password">
                    </div>

                    <div class="col-12 mb-3">
                        <label>Register as a <span class="text-danger">*</span></label>
                        {{-- <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password"> --}}
                        <select name="user_type" class="form-control" required>
                            <option value="">select type</option>
                            <option value="artist">Artist</option>
                            <option value="gallerist">Gallerist</option>
                        </select>
                        @error('user_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <button type="submit" class="btn-primary d-block btn-signin">SIGN UP</button>
                    </div>
                    <p>Already a member? <a href="{{ route('login') }}" class="text-danger">Sign In</a></p>
                    <div class="col-12 mb-3">
                        <div class="orpnl text-center">
                            <span>or</span>
                        </div>
                    </div>
                    <div class="text-center loginsocial">
                        <a href="#" class="btn btn-fb"><i class="fab fa-facebook-f"></i> Sign In with Facebook
                        </a>
                        <a href="#" class="btn btn-google"><i class="fab fa-google"></i> Sign In with Google
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
