@extends('layouts.app')

@section('content')
    @include('layouts.breadcrumb')

    <!-- Contact Section Begin -->
    <section class="contact-section">
        <div class="container">
            <section class="section">
                <div class="row">
                    <div class="col-md-12">
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
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ Session::get('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div align="middle" class="col-md-6">
                            <div class="form-wrap overlap element-animate">
                                <h2 class="h2">Change Password</h2>
                                <form method="POST" action="/change-password">
                                    @csrf
                                    <div class="form-group">
                                        <input id="current-password" type="password"
                                            class="form-control @error('current-password') is-invalid @enderror"
                                            name="current-password" placeholder="Enter Current Password"
                                            value="{{ old('current-password') }}" required autofocus>
                                        @error('current-password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="new-password" placeholder="Enter New Password" type="password"
                                            class="form-control @error('new-password') is-invalid @enderror"
                                            name="new-password" required autocomplete="new-password">

                                        @error('new-password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="new-password-confirm" placeholder="Confirm New Password" type="password"
                                            class="form-control @error('new-password_confirmation') is-invalid @enderror"
                                            name="new-password_confirmation" required
                                            autocomplete="new-password_confirmation">

                                        @error('new-password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block py-3">
                                            {{ __('Change Password') }}
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
