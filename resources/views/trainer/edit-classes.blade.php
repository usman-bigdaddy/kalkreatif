@extends('layouts.admin_layout')

@section('admin_content')
    <div class="main-panel">
        <div class="content">
            <h4 class="page-title">Edit Class</h4>
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
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            @foreach ($classes as $item)
                                <form enctype="multipart/form-data" id="form_id" method="post"
                                    action="/classes/{{ $item->id }}">
                                    @csrf
                                    @method('PUT')
                                    <a href="/classes" style="margin: 2px" class="btn btn-primary">View Classe(s)</a>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="class_name">Class Name</label>
                                            <input value="{{ $item->class_name }}" required type="text"
                                                class="form-control" name="class_name" placeholder="Enter Class Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="class_duration">Class Duration</label>
                                            <input value="{{ $item->class_duration }}" required type="text"
                                                class="form-control" name="class_duration" disabled
                                                placeholder="Enter Duration (Example 2 Months)">
                                        </div>
                                        <div class="form-group">
                                            <label for="class_description">Class Description</label>
                                            <textarea required type="text" class="form-control" name="class_description"
                                                placeholder="Enter Description">{{ $item->class_description }}
                                                                                                                                                                                </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="class_duration">Lead Trainer</label>
                                            <input readonly
                                                value="{{ $item->trainer_firstname . ' ' . $item->trainer_lastname }}"
                                                required type="text" class="form-control" name=""
                                                placeholder="Enter Duration (Example 2 Months)">
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input name="changeTeamLeader" id="changeTeamLeader"
                                                    class="form-check-input" type="checkbox">
                                                <span class="form-check-sign">Change Team Leader?</span>
                                            </label>
                                        </div>
                                        <div class="form-group teamLeaderDropDown">
                                            <label for="trainer_id">Select Lead Trainer</label>
                                            <select required class="form-control" name="trainer_id">
                                                @foreach ($trainers as $trainer)
                                                    <option value="{{ $trainer->id }}">
                                                        {{ $trainer->trainer_firstname . ' ' . $trainer->trainer_lastname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <button class="btn btn-success">Submit</button>
                                        <button class="btn btn-danger"
                                            onclick="$('#form_id').trigger('reset'); return false;">Cancel</button>
                                    </div>

                                </form>
                            @endforeach
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
