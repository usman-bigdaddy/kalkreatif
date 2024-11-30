@extends('layouts.admin_layout')

@section('admin_content')
    <div class="main-panel">
        <div class="content">
            <h4 class="page-title">Feedback</h4>
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
                                <div class="table-responsive">
                                    @if (count($feedbacks) > 0)
                                        <table id="my-trainers-table" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Name </th>
                                                    <th>Email</th>
                                                    <th>Subject</th>
                                                    <th>Message</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($feedbacks as $item)
                                                    <tr>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->subject }}</td>
                                                        <td>{{ $item->message }}</td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <a class="btn btn-danger"
                                                                        href="/f/{{ $item->id }}/delete">Delete</a>
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <br />No Feedback(s)
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
