@extends('layouts.app')

@section('content')

    @include('layouts.breadcrumb')
    <!-- Team Section Begin -->
    <section class="team-section team-page spad">
        <div class="container">
            <div class="row">
                <section class="contact-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
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
                            <div class="col-lg-6">
                                <div class="contact-info">
                                    <div class="contact-details">
                                        <h2>Get in Touch</h2>
                                        <p>We'd love to hear from you. Wheather you have questions about classes, membership
                                            plans, or anything else.
                                            Our team is ready to answer all your questions.
                                        </p>
                                        <ul class="address">
                                            <li><b>Address:</b> 2XL Mall, 2nd floor, Suite C1 besides Zenith Bank
                                                Gwarinpa -
                                                Abuja,
                                                Nigeria
                                            </li>
                                            <li><b>Phone: </b>0814 381 3551, 0809 229 2974</li>
                                            <li><b>Email:</b>Kalkreatif@gmail.com</li>
                                            <li><b>Opening Hours:</b>Mon-Sat: 6:00am-10:00pm<br/>Sun-Closed</li>
                                        </ul>
                                    </div>
                                    <div class="contact-form">
                                        <form action="/contact" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input name="name" required type="text" placeholder="Name">
                                                </div>
                                                <div class="col-lg-6">
                                                    <input name="email" required type="email" placeholder="Email">
                                                </div>
                                                <div class="col-lg-12">
                                                    <input name="subject" required type="text" placeholder="Subject">
                                                    <textarea name="message" required placeholder="Message"></textarea>
                                                    <button type="submit" class="site-btn">Send Message</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="map"><iframe
                            src="https://maps.google.com/maps?q=2XL%20Mall&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            style="border:0" allowfullscreen></iframe></div>
                </section>
            </div>
        </div>
    </section>
    <!-- Team Section End -->

@endsection
