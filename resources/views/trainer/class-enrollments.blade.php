@extends('layouts.admin_layout')

@section('admin_content')
    <div class="main-panel">
        <div class="content">
            <h4 class="page-title">List of Enrollments for <br /></h4>
            <ul>
                <li> Class: {{ $classes->class_name }} </li>
                <li> Description: {{ $classes->class_description }}</li>
                <li> Duration: {{ $classes->class_duration }}</li>
            </ul>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="card col-md-12">
                        <div class="card-body">
                            <div class="active-member">
                                <div class="table-responsive">
                                    @if (count($enrollments) > 0)
                                        <table id="my-trainers-table" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>First Name </th>
                                                    <th>Last Name </th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>Gender</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($enrollments as $item)
                                                    <tr>
                                                        <td>{{ $item->member_firstname }}</td>
                                                        <td>{{ $item->member_lastname }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->member_phonenumber }}</td>
                                                        <td>{{ $item->member_gender }}</td>
                                                        @if (Auth::guard('trainer')->user()->is_admin == '1')
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <form action="/classes/{{ $item->id }}"
                                                                            method="POST">
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <button class="btn btn-danger">Delete </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            @else
                                                <br />No Enrollments
                                    @endif
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.admin_footer')
            </div>
        </div>
    </div>


@endsection
