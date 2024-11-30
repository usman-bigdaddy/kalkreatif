@extends('layouts.app')

@section('content')

    @include('layouts.breadcrumb')
    <!-- About Us Begin -->
    <section class="about-us-area spad-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Features</span>
                        <h2>Who We Are</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <div class="about-text">
                        <p class="t-text">Welcome to Kal Kreatif Gym & Fitness Centre, we exist to help you get
                            healthier by giving you the right support at the right time and in ways you want them. We are
                            committed to seeing you healthy inside out and at all times.

                            We can help you reach your goal whatever your starting point is. Our range of fitness equipment
                            and classes are bound to keep you addicted to staying fit.

                            Our customers are our priority and we aim to provide a safe and welcoming environment for
                            everyone. </p>
                        <a href="/user-register" class="primary-btn">Join Our Gym</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img class="about-img" src={{ asset('images/about-us.jpg') }} alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- About Us End -->
    <!-- Skills Section Begin -->
    <section class="skill-section set-bg" data-setbg={{ asset('images/about-bg2.jpg') }}>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span style="color:white">Features</span>
                        <h2 style="color: honeydew">Why Choose us?</h2>
                    </div>
                </div>
            </div>
            <div class="row">>
                <div class="col-sm-12 offset-lg-1">
                    <div class="skill-bar">
                        <div id="bar1" class="single-bar barfiller">
                            <span class="fill" data-percentage="75"></span>
                            <h5 style="color: #7B7B7B">Body building</h5>
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                        </div>
                        <div id="bar2" class="single-bar barfiller">
                            <span class="fill" data-percentage="95"></span>
                            <h5 style="color: #7B7B7B">Training</h5>
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                        </div>
                        <div id="bar3" class="single-bar barfiller">
                            <span class="fill" data-percentage="85"></span>
                            <h5 style="color: #7B7B7B">Fitness</h5>
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-counter">
                        <div class="counter-icon">
                            <img src="img/shirt-icon.png" alt="">
                        </div>
                        <span class="counter">{{ $member_count }}</span>
                        <p>Members</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-counter">
                        <div class="counter-icon">
                            <img src="img/certify.png" alt="">
                        </div>
                        <span class="counter">{{ $trainer_count }}</span>
                        <p>Trainers</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-counter">
                        <div class="counter-icon">
                            <img src="img/award-icon.png" alt="">
                        </div>
                        <span class="counter">25</span>
                        <p>Awards</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-counter">
                        <div class="counter-icon">
                            <img src="img/footer-icon.png" alt="">
                        </div>
                        <span class="counter">{{ $classes_count }}</span>
                        <p>Classes</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Skills Section End -->
    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>What Clients Say</span>
                        <h2>Testimonials</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="testimonial-content">
                        <div class="testimonial-pic set-bg"
                            data-setbg="https://www.shareicon.net/data/512x512/2017/01/06/868320_people_512x512.png"></div>
                        <div class="testimonial-text">
                            <h4>Khadijah Abubakar, <span>Member</span></h4>
                            <p>I love the fact that I can use the gym 24/7. No restrictions, therefore NO EXCUSES!!. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="testimonial-content">
                        <div class="testimonial-pic set-bg"
                            data-setbg="https://www.shareicon.net/data/512x512/2017/01/06/868320_people_512x512.png"></div>
                        <div class="testimonial-text">
                            <h4>Usman Abubakar, <span>Member</span></h4>
                            <p>With the convenience of being able to go to the Gym 24/7, I now enjoy working out 6 days a
                                week. The more results I see the more I am driven and motivated. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->
    <!-- Call To Action Section Begin -->
    <section class="about-callto-section set-bg" data-setbg="img/about-bg.mp4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-callto-text">
                        <div class="cl-left">
                            <h2>Join our gym now!</h2>
                            <p>Arcu a tellus pellentesque ultrices. Ut euismod luctus elit id eleifend. Donec semper
                                massa a imperdiet mattis. </p>
                        </div>
                        @guest
                            <div class="cl-right">
                                <a href="/user-register" class="primary-btn">Join</a>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action Section End -->

@endsection
