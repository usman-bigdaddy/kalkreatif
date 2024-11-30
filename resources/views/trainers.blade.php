@extends('layouts.app')

@section('content')

    @include('layouts.breadcrumb')
    <!-- Team Section Begin -->
    <section class="team-section team-page spad">
        <div class="container">
            <div class="row">
                @foreach ($trainers as $item)
                    <div class="col-lg-4 col-sm-6">
                        <div class="ts-item set-bg" data-setbg={{ $item->image }}>
                            <div class="ts_text">
                                <a style="color: inherit;" href="trainer-profile/{{ $item->id }}">
                                    <h4>{{ $item->trainer_firstname }}<?php echo ' '; ?>{{ $item->trainer_lastname }}
                                    </h4>
                                    <span>{{ $item->trainer_class }}</span>
                                </a>
                                <div class="tt_social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa  fa-envelope-o"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Team Section End -->

@endsection
