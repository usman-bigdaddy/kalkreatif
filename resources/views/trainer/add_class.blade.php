@extends('layouts.admin_layout')

@section('admin_content')
    <div class="main-panel">
        <div class="content">
            <h4 class="page-title">Add Class</h4>
            <div class="container-fluid">
                <div class="row">
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
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <form enctype="multipart/form-data" id="form_id" method="post" action="/classes">
                                @csrf
                                <a href="/classes" style="margin: 2px" class="btn btn-primary">View Classe(s)</a>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="class_name">Class Name</label>
                                        <select class="form-control" required name="class_name">
                                            <option>High Intensity Interval Training (HIIT)</option>
                                            <option>Cardio Blast/
                                                Aerobics</option>
                                            <option>Boot Camp</option>
                                            <option>Yoga</option>
                                            <option>Abs Interval</option>
                                            <option>Spin Class</option>
                                            <option>Boxing Class</option>
                                            <option>Dance Class</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="class_duration">Class Duration</label>
                                        <input required type="text" disabled class="form-control" name="class_duration"
                                            placeholder="45 Minutes">
                                    </div>
                                    <div class="form-group">
                                        <label for="class_duration">Class Amount</label>
                                        <input required type="text" disabled class="form-control" name="class_amount"
                                            placeholder="N2,000">
                                    </div>
                                    <div class="form-group">
                                        <label for="class_description">Class Description</label>
                                        <textarea required type="text" class="form-control" name="class_description"
                                            placeholder="Enter Description">
                                                                                                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="trainer_id">Lead Trainer</label>
                                        <select required class="form-control" name="trainer_id">
                                            @foreach ($trainers as $trainer)
                                                <option value="{{ $trainer->id }}">
                                                    {{ $trainer->trainer_firstname . ' ' . $trainer->trainer_lastname }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Class Image</label>
                                        <input required type="file" class="form-control" name="image">
                                        <small id="emailHelp" class="form-text text-muted">Once uploaded, class image can
                                            not be changed.</small>
                                    </div>
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
