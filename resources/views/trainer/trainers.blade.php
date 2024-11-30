@extends('layouts.admin_layout')

@section('admin_content')
    <div class="main-panel">
        <div class="content">
            <h4 class="page-title">All Trainers</h4>
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-md-12">
                        <div class="card-body">
                            <a href="/trainer/create" class="btn btn-primary">Add Trainer</a>
                            <div class="active-member">
                                <div class="table-responsive">
                                    @if (count($trainers) > 0)
                                        <table id="my-trainers-table" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>First Name </th>
                                                    <th>Last Name </th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Gender</th>
                                                    <th>Address</th>
                                                    <th>Class</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($trainers as $item)
                                                    <tr>
                                                        <td>{{ $item->trainer_firstname }}</td>
                                                        <td>{{ $item->trainer_lastname }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->trainer_phonenumber }}</td>
                                                        <td>{{ $item->trainer_gender }}</td>
                                                        <td>{{ $item->trainer_address }}</td>
                                                        <td>{{ $item->trainer_class }}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <br />No Trainer(s)
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
