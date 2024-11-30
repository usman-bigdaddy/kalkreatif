@extends('layouts.app')

@section('content')


    <!-- The Modal -->
    <div class="modal fade" id="modalForPromo">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <marquee width="100%" behavior="alternate" height="30px">
                        <h4 class="modal-title">&#127881;Grand Opening!!!</h4>
                    </marquee>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <img src="img/promo.jpeg" />
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <div class="copyright">
                        with <i class="fa fa-heart-o" style="color:red" aria-hidden="true"></i> from <a
                            href="http://www.smarttechsolutions.com.ng" target="_blank">Smart Tech Solutions</a>
                    </div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>




    @include('payment-modal')
    <!-- Hero Slider Section Begin -->
    <section class="hero-slider">
        <div class="slide-items owl-carousel">
            <div class="single-slide set-bg active" data-setbg={{ asset('img/bg.jpg') }}>
                <a href="https://www.youtube.com/watch?v=SEVuD_djKrU" class="play-btn pop-up"><i
                        class="fa fa-play"></i></a>
                <h1>Be Fit.Top Gym</h1>
                <a href="#" class="primary-btn">Read More</a>
            </div>
            <div class="single-slide set-bg" data-setbg={{ asset('img/bg-2.jpg') }}>
                <a href="https://www.youtube.com/watch?v=SEVuD_djKrU" class="play-btn pop-up"><i
                        class="fa fa-play"></i></a>
                <h1>Be Fit.Top Equipment</h1>
                <a href="#" class="primary-btn">Read More</a>
            </div>
            <div class="single-slide set-bg" data-setbg={{ asset('img/bg-3.jpg') }}>
                <a href="https://www.youtube.com/watch?v=SEVuD_djKrU" class="play-btn pop-up"><i
                        class="fa fa-play"></i></a>
                <h1>Be Fit.Top Body</h1>
                <a href="#" class="primary-btn">Read More</a>
            </div>
        </div>
    </section>
    <!-- Hero Slider End -->

    <!-- Membership Section Begin -->
    <section class="features-section spad">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <div class="single-features">
                        <center>
                            <h2>Membership Plans</h2>
                    </div>
                    </center>
                    <!--p class="slogan">Membership</p-->
                    <div class="row">
                        <div class="col-md-4 club-card-col">
                            <div class="club-card-item" style="background-image: url(assets/img/bg-price-1.svg);">
                                <div class="price-cover">
                                    <div class="price">₦2,000</div>
                                    <div class="date"><span>per</span>day</div>
                                </div>
                                <ul class="list">
                                    <li>Couple Joining Fee - n/a</li>
                                    <li>10% Discount for Family of more than 4 people </li>
                                    <li>All Day Access</li>
                                    <li>7+ Free Group Classes</li>
                                    <li>No Guest Pass</li>
                                    <li>No Freeze Subscription</li>
                                </ul>
                                <a data-toggle="modal" href="#staticBackdrop" class="btn">Pay</a>
                            </div>
                        </div>
                        <div class="col-md-4 club-card-col">
                            <div class="club-card-item" style="background-image: url(assets/img/bg-price-2.svg);">
                                <div class="price-cover">
                                    <div class="price">₦9,000</div>
                                    <div class="date"><span>per</span>week</div>
                                </div>
                                <ul class="list">
                                    <li>Couple Joining Fee - n/a</li>
                                    <li>10% Discount for Family of more than 4 people </li>
                                    <li>All Day Access</li>
                                    <li>7+ Free Group Classes</li>
                                    <li>No Guest Pass</li>
                                    <li>No Freeze Subscription</li>
                                </ul>
                                <a data-toggle="modal" href="#staticBackdrop" class="btn">Pay</a>
                            </div>
                        </div>
                        <div class="col-md-4 club-card-col">
                            <div class="club-card-item" style="background-image: url(assets/img/bg-price-3.svg);">
                                <div class="price-cover">
                                    <div class="price">₦12,000</div>
                                    <div class="date"><span>two </span>weeks</div>
                                </div>
                                <ul class="list">
                                    <li>Couple Joining Fee - n/a </li>
                                    <li>10% Discount for Family of more than 4 people </li>
                                    <li>All Day Access</li>
                                    <li>7+ Free Group Classes</li>
                                    <li>No Guest Pass</li>
                                    <li>No Freeze Subscription</li>
                                </ul>
                                <a data-toggle="modal" href="#staticBackdrop" class="btn">Pay</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row p-70">
                <div class="col-lg-12 text-center">
                    <a href="/membership-plan" class=" service-btn primary-btn">see more</a>
                </div>
            </div>
    </section>
    <!-- Membership Section End -->




    <!-- Classes Section Begin -->
    <section class="classes-index spad">
        <div class="container">
            <div class="classes__filter">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h2 style="color: white">Classes</h2>
                        </div>
                    </div>

                    @foreach ($classes as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="classes__item classes__item__page">
                                <div class="classes__item__pic set-bg" data-setbg={{ asset($item->class_image) }}>
                                </div>
                                <div class="classes__item__text">
                                    <h4><a href="#">{{ $item->class_name }} </a></h4>
                                    <p>{{ $item->class_description }}.
                                    </p>
                                    <ul>
                                        <li><span class="fa fa-money"></span> ₦2,000</li>
                                        <li><span class="fa fa-clock-o"></span> 45 MINS</li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-lg-12 text-center">
                        <a href="/class" class="service-btn primary-btn">see more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    </div>
    </section>
    <!-- Classes Section End -->



    <!-- Trainers section -->
    <section class="trainers-section">
        <div class="container">
            <div class="section-title text-center">
                <h2>Meet the <span>Trainers</span></h2>
            </div>
            <div class="row justify-content-md-center">
                @foreach ($trainers as $item)
                    <div class="col-lg-3 col-sm-6">
                        <div class="trainer-item">
                            <div class="trainer-pic">
                                <img src="{{ $item->image }}" alt="">
                            </div>
                            <a href="trainer-profile/{{ $item->id }}">
                                <h4> {{ $item->trainer_firstname }}<?php echo ' '; ?>{{ $item->trainer_lastname }}
                                </h4>
                                <p> {{ $item->trainer_class }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-12 text-center">
                <a href="/gym-trainers" class="service-btn primary-btn">see more</a>
            </div>
        </div>
        </div>
    </section>


    {{-- <!-- Upcoming Event Begin -->
    <section class="upcoming-event-section spad-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="upcoming-classes">
                        <div class="up-title">
                            <span>Next</span>
                            <h5>Upcomming Classes</h5>
                        </div>
                        <ul class="classes-time">
                            <li><img src="img/stopwatch.png" alt=""> Gym Fitness <span>11:00 - 12:00</span></li>
                            <li><img src="img/stopwatch.png" alt=""> Pilates <span>12:00 - 13:00</span></li>
                            <li><img src="img/stopwatch.png" alt=""> Spinning <span>13:00 - 14:00</span></li>
                            <li><img src="img/stopwatch.png" alt=""> Yoga <span>14:00 - 15:00</span></li>
                            <li><img src="img/stopwatch.png" alt=""> Gym Fitness <span>15:00 - 16:00</span></li>
                            <li><img src="img/stopwatch.png" alt=""> Pilates <span>16:00 - 17:00</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="membership-card set-bg" data-setbg={{ asset('img/m-card.jpg') }}>
                        <div class="membership-details">
                            <div class="up-title">
                                <span>Next</span>
                                <h5>Membership Cards</h5>
                            </div>
                            <div class="discount">
                                <h1>25% <span>Discount</span></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="member-sign-up set-bg" data-setbg={{ asset('img/signup-bg.jpg') }}>
                        <div class="up-title">
                            <span>New</span>
                            <h5>Personal Trainer</h5>
                        </div>
                        <p>Pellentesque dictum nisl in nibh dictum volutpat nec a quam. Vivamus suscipit nisl quis nulla
                            pretium.Pellentesque dictum nisl in nibh dictum volutpat nec a quam. Vivamus suscipit nisl
                            quis nulla pretium.</p>
                        <div class="member-signup-btn">
                            <a href="registration.html" class="primary-btn">Sign up Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Upcoming Event End --> --}}

    <!-- BMI section -->
    <section class="bmi-section spad">
        <div class="bmi-bg set-bg" data-setbg={{ asset('img/bmi-bg.jpg') }}></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 ml-auto">
                    <div class="section-title mb-0">
                        <h2>Calculate your <span>BMI</span></h2>
                        <p>Body mass index (BMI) is a measure of body fat based on height and weight that applies to
                            adult
                            men and women.</p>
                    </div>
                    <div class="bmi-calculator-warp">
                        <div class="bmi-calculator">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="number" placeholder="Weight (KG)" id="weight">
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" placeholder="Height (CM)" id="height">
                                </div>
                                <div class="col-sm-6">
                                    <button class="site-btn" id="my-bmi-submit">Calculate</button>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="bmi-result" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BMI section end -->

@endsection
