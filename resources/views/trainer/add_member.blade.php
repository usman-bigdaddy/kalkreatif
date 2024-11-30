@extends('layouts.admin_layout')

@section('admin_content')
    <div class="main-panel">
        <div class="content">
            <h4 class="page-title">Add Member</h4>
            <div class="container-fluid">
                <div class="row">
                    {{-- <div class="col-md-2"></div> --}}
                    <div class="col-md-8">
                        <div class="card">
                            <div class="col-xs-12">
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
                            </div>
                            <form id="form_id" method="post" action="/member">
                                @csrf
                                <a href="/member" style="margin: 2px" class="btn btn-primary">View Member(s)</a>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input required type="email" class="form-control" name="email"
                                            placeholder="Enter Email">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                            anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">First Name</label>
                                        <input required type="text" class="form-control" name="member_firstname"
                                            placeholder="Enter First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Last Name</label>
                                        <input required type="text" class="form-control" name="member_lastname"
                                            placeholder="Enter Last Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Phone Number</label>
                                        <input required type="number" class="form-control" name="member_phonenumber"
                                            placeholder="Enter Number">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Address</label>
                                        <input required type="text" class="form-control" name="member_address"
                                            placeholder="Enter Address">
                                    </div>

                                    <div class="form-check">
                                        <label>Gender</label><br />
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
                                    {{-- <div class="form-group">
                                        <label for="exampleFormControlSelect1">Number of Months registered</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div> --}}
                                </div>
                                <div class="card-action">
                                    <button class="btn btn-success">Submit</button>
                                    <button class="btn btn-danger"
                                        onclick="$('#form_id').trigger('reset'); return false;">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                {{-- end here --}}
            </div>
        </div>
        @include('layouts.admin_footer')
    </div>
    </div><!-- Main Panel Ends Here -->


@endsection
