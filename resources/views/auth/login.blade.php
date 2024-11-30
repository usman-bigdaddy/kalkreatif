@extends('layouts.app')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-area set-bg" data-setbg={{ asset('img/breadcrumb-bg.jpg') }}>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-content">
                        <h2>Member</h2>
                        <div class="links">
                            <a href="/">Home</a>
                            <a href="#" class="rt-breadcrumb">Member</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section">
        <div class="container">
            <section class="section">
                <div class="row">
                    <div class="col-md-12">
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (Session::has('server-error'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ Session::get('server-error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-wrap overlap primary element-animate">
                                <h2 class="h2">Become A Member</h2>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" required class="form-control" name="member_firstname"
                                            placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required class="form-control" name="member_lastname"
                                            placeholder="Last Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" required class="form-control" name="email"
                                            placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" required class="form-control" name="member_phonenumber"
                                            placeholder="Phone Number">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" required class="form-control" name="password"
                                            placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="Enter Password Again" id="password-confirm" type="password"
                                            class="form-control" name="password_confirmation" required
                                            autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <label class="form-radio-label">
                                                <input required class="form-radio-input" type="radio" name="member_gender"
                                                    value="Male">
                                                <span class="form-radio-sign">Male</span>
                                            </label>
                                            <label class="form-radio-label ml-3">
                                                <input required class="form-radio-input" type="radio" name="member_gender"
                                                    value="Female">
                                                <span class="form-radio-sign">Female</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block py-3">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-wrap overlap element-animate">
                                <h2 class="h2">Log in</h2>
                                <form method="POST" action="/user-login">
                                    @csrf
                                    <div class="form-group">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            placeholder="Enter Email Address" value="{{ old('email') }}" required
                                            autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password" placeholder="Enter Password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        @if (Route::has('password.request'))
                                            Forgot your password? <a class="btn btn-link" href="/forgot-password">
                                                {{ __('Click Here') }}
                                            </a>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block py-3">
                                            {{ __('Log in') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
        </div>

    </section>
@endsection
