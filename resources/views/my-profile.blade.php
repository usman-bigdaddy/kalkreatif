@extends('layouts.app')

@section('content')


    <!-- Modal -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-wrap overlap primary element-animate">
                            <h2 class="h2">Edit Profile</h2>
                            <form>
                                @csrf
                                <div class="form-group">
                                    <input value=" {{ Auth::user()->member_firstname }}" type="text" required
                                        class="form-control" id="member_firstname" name="member_firstname"
                                        placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <input value=" {{ Auth::user()->member_lastname }}" type="text" required
                                        class="form-control" id="member_lastname" name="member_lastname"
                                        placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" id="member_" value=" {{ Auth::user()->email }}" disabled
                                        class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input id="member_phonenumber" value=" {{ Auth::user()->member_phonenumber }}"
                                        type="tel" required class="form-control" name="member_phonenumber"
                                        placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <button id="editProfileButton" type="submit" class="btn btn-primary btn-block py-3">
                                        {{ __('Edit ') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal End -->
    @include('layouts.breadcrumb')
    <!-- Contact Section Begin -->
    <section class="contact-section">

        <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div
                            style="
                                                                                                                                                                                    text-transform: uppercase;
                                                                                                                                                                                    letter-spacing: .2em; color: #fff; 
                                                                                                                                                                                   
                                                                                                                                                                                    width: 230px;
                                                                                                                                                                                    background: #2E8B57;
                                                                                                                                                                                    height: 130px;
                                                                                                                                                                                    border:2px solid #2E8B57; 
                                                                                                                                                                                    border-radius: 5px 40px 40px 5px; padding: 9px; margin-bottom: 100px;
                                                                                                                                                                                    text-align: center;">
                            <h2 style="color: white; font-size: 50px; padding-top: 30px;">
                                {{ Str::of(Auth::user()->member_firstname)->limit(1, '') . '' . Str::of(Auth::user()->member_lastname)->limit(1, '') }}
                            </h2>

                        </div>
                    </div>
                    <div class="col-md-6">
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
                                <div id="error_alert" class="alert alert-warning alert-dismissible fade show" role="alert">
                                    {{ Session::get('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                        <div class="profile-head">
                            <h2>
                                {{ Auth::user()->member_firstname . ' ' . Auth::user()->member_lastname }}
                            </h2>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#my-classes" role="tab"
                                        aria-controls="home" aria-selected="true">My Classes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#change-password"
                                        role="tab" aria-controls="profile" aria-selected="false">Change Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#upload_panel"
                                        role="tab" aria-controls="profile" aria-selected="false">Upload Receipt</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#history_panel"
                                        role="tab" aria-controls="profile" aria-selected="false">History </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="profile-edit-btn" data-toggle="modal" data-target="#staticBackdrop">
                            Edit Profile
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Name</label>
                            </div>
                            <div class="col-md-9">
                                <p> {{ Auth::user()->member_firstname . ' ' . Auth::user()->member_lastname }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Email</label>
                            </div>
                            <div class="col-md-9">
                                <p>{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-9">
                                <p>{{ Auth::user()->member_phonenumber }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="my-classes" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="table-responsive">
                                        @if (count($classes) > 0)
                                            <table id="my-trainers-table" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Name </th>
                                                        <th>Description </th>
                                                        <th>Duration</th>
                                                        <th>Image</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($classes as $item)
                                                        <tr>
                                                            <td>{{ $item->class_name }}</td>
                                                            <td>{{ $item->class_description }}</td>
                                                            <td>{{ $item->class_duration }}</td>
                                                            <td><img style="height: 40px"
                                                                    src={{ asset($item->class_image) }} /></td>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <a class="" href="
                                                                            /my-profile/{{ $item->id }}/delete">
                                                                            <i style="color:red" class="fa fa-trash"
                                                                                aria-hidden="true"></i></a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <br />No Class
                                        @endif
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="profile-tab">
                                <form id="changePasswordForm">

                                    <div class="form-group">
                                        <input type="password"
                                            class="form-control @error('current-password') is-invalid @enderror"
                                            id="current-password" name="current-password"
                                            placeholder="Enter Current Password" value="{{ old('current-password') }}"
                                            required autofocus>
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
                                        <input id="changePasswordButton" type="submit"
                                            class="btn btn-primary btn-block py-3" value="Change Password" />
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="upload_panel" role="tabpanel" aria-labelledby="profile-tab">
                                <form enctype="multipart/form-data" action="/payment" method="POST">
                                    @csrf
                                    <div class="upload-container">
                                        <input type="file" name="image" accept="image/*" required id="file_upload" />
                                    </div>
                                    <br>
                                    <input type="submit" value="Upload" class="upload-btn" />
                                </form>
                            </div>
                            <div class="tab-pane fade" id="history_panel" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="table-responsive">
                                        @if (count($payments) > 0)
                                            <table id="my-trainers-table" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>S/N </th>
                                                        <th>Date Uploaded </th>
                                                        <th>Image</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($payments as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->created_at }}</td>
                                                            <td> <a href="{{ asset($item->image) }}"> <img
                                                                        style="height: 40px"
                                                                        src={{ asset($item->image) }} />
                                                                </a></td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <br />No Payment(s)
                                        @endif
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection
