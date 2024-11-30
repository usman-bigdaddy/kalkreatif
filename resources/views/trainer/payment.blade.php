@extends('layouts.admin_layout')

@section('admin_content')
    <div class="main-panel">
        <div class="content">
            <h4 class="page-title">Payments for {{ $member->member_firstname . ' ' . $member->member_lastname }}</h4>
            <div class="container-fluid">
                <div class="row">
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
                    <div class="card col-md-12">
                        <div class="card-body">
                            <div class="active-member">
                                <form enctype="multipart/form-data" action="/payment" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="file" name="image" accept="image/*" required
                                                class="form-control" /><br />
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="submit" value="Upload" class="btn btn-primary" />
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    @if (count($payment) > 0)
                                        <div class="table-responsive">
                                            <table id="my-trainers-table" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>S/N </th>
                                                        <th>Date Uploaded </th>
                                                        <th>Image</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($payment as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->created_at }}</td>
                                                            <td> <a href="{{ asset($item->image) }}"> <img
                                                                        style="height: 40px"
                                                                        src={{ asset($item->image) }} />
                                                                </a></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <br />No Payment(s) for
                                        {{ $member->member_firstname . ' ' . $member->member_lastname }}
                                    @endif
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
