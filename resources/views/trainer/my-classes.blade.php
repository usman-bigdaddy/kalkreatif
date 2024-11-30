@extends('layouts.admin_layout')

@section('admin_content')
    <div class="main-panel">
        <div class="content">
            <h4 class="page-title">My Classes</h4>
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-md-12">
                        <div class="card-body">
                            <a href="/classes" class="btn btn-primary">View all Class</a>
                            <div class="active-member">
                                <div class="table-responsive">
                                    @if (count($classes) > 0)
                                        <table id="my-trainers-table" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Class Name </th>
                                                    <th>Class Description </th>
                                                    <th>Class Duration</th>
                                                    <th>Class Image</th>
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
                                                                    <a class="btn btn-success"
                                                                        href="/class-enrollments/{{ $item->id }}">View</a>
                                                                </div>
                                                            </div>

                                                            {{-- <a class="btn btn-danger" href="items/{{$item->id}}/destroy">DELETE</a> --}}

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
                    </div>
                </div>
                @include('layouts.admin_footer')
            </div>
        </div>
    </div>


@endsection
