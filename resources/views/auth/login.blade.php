@extends('auth.auth-layout')

@section('content')
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="{{ asset('assets/img/auth/image-2.png') }}" alt="login form" class="img-fluid"
                                style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    @if (setting()->get('site_logo'))
                                        <div class="text-center">
                                            <img src="{{ asset(setting()->get('site_logo', 'assets/img/logo.png')) }}"
                                                alt="" style=" max-width: 100%; max-height: 80px">
                                        </div>
                                    @else
                                        <h1 class="text-center">
                                            {{ setting()->get('site_name', 'MoloneyStreetRe') }}
                                        </h1>
                                    @endif



                                    <h4 class="text-center text-secondary">
                                        Login to Your Account
                                    </h4>
                                    <div class="form-group mg-t-15">
                                        <div class="fw-bold" for=""> Email Address</div>
                                        <div class="d-flex align-items-center">

                                            <div class="nk-int-st">
                                                <input id="email" type="email" style=""
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                                    placeholder="Your Email Address">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mg-t-15">
                                        <div class="fw-bold" for=""> Password</div>
                                        <div class="d-flex align-items-center">

                                            <div class="nk-int-st">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password"
                                                    placeholder="Enter your Password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mg-t-15 justify-content-between">
                                        <div class="custom-control custom-checkbox d-flex align-items-center">
                                            {{-- <input type="checkbox" class="custom-control-input" id="remember" name="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="remember">Remember me</label> --}}
                                        </div>

                                        @if (Route::has('password.request'))
                                            <a class="forgot-link fw-bold" href="{{ route('password.request') }}">
                                                Forgot Password?
                                            </a>
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-success notika-btn-success btn-block waves-effect"
                                        style="font-size: 14px; margin-top: 20px; padding: 7px 22px; font-weight:800;border-radius: 8px;">
                                        Sign In with Email </button>
                                    {{-- <div style="text-align: center; margin-top: 20px;  ">Or</div> --}}

                                    <button type="submit" class="btn btn-success notika-btn-success btn-block waves-effect"
                                        style="font-size: 14px; margin-top: 20px; padding: 7px 22px; font-weight:500;display:flex; justify-content:center; align-items:center; gap:8px;background-color: var(--body-bg);border: 1px solid var(--border-color);border-radius: 8px;color: var(--text-color);">
                                        <img src="{{ asset('assets/img/auth/google-icon.png') }}" alt=""
                                            style="width: 20px; height: 20px;">
                                        <span>
                                            Continue with Google</span> </button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
