@extends('layouts.admin_layout')

@section('admin_content')


    <!--main panel ends here-->
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title">Dashboard</h4>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-stats card-warning">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="icon-big text-center">
                                            <i class="la la-users"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 d-flex align-items-center">
                                        <div class="numbers">
                                            <p class="card-category">Trainers</p>
                                            <h4 class="card-title">{{ $trainer_count }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-stats card-success">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="icon-big text-center">
                                            <i class="la la-bar-chart"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 d-flex align-items-center">
                                        <div class="numbers">
                                            <p class="card-category">Sales</p>
                                            <h4 class="card-title">70,000</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-stats card-danger">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="icon-big text-center">
                                            <i class="la la-newspaper-o"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 d-flex align-items-center">
                                        <div class="numbers">
                                            <p class="card-category">Members</p>
                                            <h4 class="card-title">{{ $member_count }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-stats card-primary">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="icon-big text-center">
                                            <i class="la la-book"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 d-flex align-items-center">
                                        <div class="numbers">
                                            <p class="card-category">Classes</p>
                                            <h4 class="card-title">{{ $class_count }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="active-member">
                                    <div class="table-responsive">
                                        <table id="my-trainers-table" class="table table-xs mb-0">
                                            <thead>
                                                <tr>
                                                    <th>First Name </th>
                                                    <th>Last Name </th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Gender</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $item)
                                                    <tr>
                                                        <td>{{ $item->member_firstname }}</td>
                                                        <td>{{ $item->member_lastname }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->member_phonenumber }}</td>
                                                        <td>{{ $item->member_gender }}</td>v
                                                        <td>
                                                            <div>
                                                                <div class="progress" style="height: 6px">
                                                                    <div class="progress-bar
                                                                                                            <?php if ($item->member_status == '0') {
                                                                                                                echo 'bg-warning';
                                                                                                            } else {
                                                                                                                echo 'bg-success';
                                                                                                            } ?>"
                                                                        style="width: 50%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        {{-- <td>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <a class="btn btn-primary"
                                                                    href="items/{{ $item->id }}/edit">Edit</a>
                                                            </div>
                                                            <div class="col-6">

                                                            </div>
                                                        </div>

                                                        <a class="btn btn-danger" href="items/{{$item->id}}/destroy">DELETE</a>

                                                    </td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Users Statistics</h4>
                                <p class="card-category">
                                    Members by Gender</p>
                            </div>
                            <div class="card-body">
                                <div id="monthlyChart" class="chart chart-pie"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Users Statistics</h4>
                                <p class="card-category">
                                    Trainers by Gender</p>
                            </div>
                            <div class="card-body">
                                <div id="trainers_gender_count_div" class="chart chart-pie"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @include('layouts.admin_footer')
        </div>
        <!--main panel ends here-->
    @endsection
