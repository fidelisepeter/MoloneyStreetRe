@extends('auth.auth-layout')

@section('content')
    <div class="nk-block toggled" id="l-login">
        <div class="nk-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <h2 class="text-center">
                    Welcome
                </h2>
                <h5 class="text-center text-secondary">
                    Login to Your Account
                </h5>
                <div class="d-flex align-items-center mg-t-15">
                    <span class="mr-3">
                        <i class="fa fa-user" style="font-size: 18px;"></i>
                    </span>
                    <div class="nk-int-st">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Email Address">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>




                <div class="d-flex align-items-center mg-t-15">
                    <span class="mr-2">
                        <i class="fa fa-key" style="font-size: 18px;"></i>
                    </span>
                    <div class="nk-int-st">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="d-flex align-items-center mg-t-15 justify-content-between">
                    <div class="custom-control custom-checkbox d-flex align-items-center">
                        {{-- <input type="checkbox" class="custom-control-input" id="remember" name="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember">Remember me</label> --}}
                    </div>

                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                            Forgot Password?
                        </a>
                    @endif
                </div>

                <button type="submit" class="btn btn-success notika-btn-success waves-effect"
                    style="font-size: 12px; margin-top: 20px; padding: 5px 22px;">
                    Login </button>

            </form>
        </div>

        {{-- <div class="nk-navigation nk-lg-ic">
            @if (Route::has('register'))
                <a href="{{ route('register') }}">
                    <i class="notika-icon notika-plus-symbol"></i> <span>Register</span>
                </a>
            @endif

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    <i>?</i> <span>Forgot Password</span>
                </a>
            @endif
        </div> --}}
    </div>
@endsection
