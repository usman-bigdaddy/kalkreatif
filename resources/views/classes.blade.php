@extends('layouts.app')

@section('content')

    @include('layouts.breadcrumb')
    <!-- Classes Section Begin -->
    <section class="classes spad">
        <div class="container">
            <div class="classes__filter">
                <div class="row">
                    <div class="col-md-12">
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{ Session::get('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-12 mb-2">
                        <a class="btn btn-primary btn-block" style="font-size:30px" target="_blank" href="/class-schedule">Class Schedule</a>
                    </div>
                    @if (count($classes) > 0)
                        @foreach ($classes as $item)
                            <div class="col-lg-4 col-md-6">
                                <div class="classes__item classes__item__page">
                                    <div class="classes__item__pic set-bg" data-setbg={{ asset($item->class_image) }}>

                                    </div>
                                    <div class="classes__item__text">

                                        <h4>{{ $item->class_name }}</h4>
                                        <p>{{ $item->class_description }}
                                        <ul>
                                            <li><span class="fa fa-money"></span> ₦2,000</li>
                                            <li><span class="fa fa-clock-o"></span> 45 MINS</li>
                                        </ul>
                                        <a href="/enroll/{{ $item->id }}" class="class-btn">JOIN NOW</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <br />No Class
                    @endif

                </div>
            </div>
    </section>
    <!-- Classes Section End -->
@endsection
