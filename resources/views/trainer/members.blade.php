@extends('layouts.admin_layout')

@section('admin_content')
    <div class="main-panel">
        <div class="content">
            <h4 class="page-title">All Members</h4>
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-md-12">
                        <div class="card-body">
                            {{-- <a href="/member/create" class="btn btn-primary" >Add Member</a> --}}
                            <div class="active-member">
                                <div class="table-responsive">
                                    @if (count($members) > 0)
                                        <table id="my-trainers-table" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>First Name </th>
                                                    <th>Last Name </th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Gender</th>
                                                    <th>Status</th>
                                                    <th>Receipt</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($members as $item)
                                                    <tr>
                                                        <td>{{ $item->member_firstname }}</td>
                                                        <td>{{ $item->member_lastname }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->member_phonenumber }}</td>
                                                        <td>{{ $item->member_gender }}</td>
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
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    @if (Auth::guard('trainer')->user()->is_admin == '1')
                                                                        <a class="btn btn-primary"
                                                                            href="payment/{{ $item->id }}">Process</a>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            {{-- <a class="btn btn-danger" href="items/{{$item->id}}/destroy">DELETE</a> --}}

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <br />No Member(s)
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
