@extends('layouts.app')

@section('content')

    @include('layouts.breadcrumb')
    @include('payment-modal')
    <!-- Membership Section Begin -->
    <section class="features-section spad">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <div class="single-features">
                        <center>
                            <h2>Membership Plans</h2>
                    </div>
                    </center><br />
                    <!--p class="slogan">Membership</p-->
                    <!-- Classes Call To Action Section -->
                    <section class="member">
                        <div class="container">
                            <div class="plan">
                                <table>
                                    <tr>
                                        <td>
                                            <h3>REGISTRATION/JOINING FEE - ₦5000</h3>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </section>
                    <!-- Classes Call To Action End -->
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
                                    <li>40+ Free Group Classes</li>
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
                                    <li>40+ Free Group Classes</li>
                                    <li>One Guest Pass per Month</li>
                                    <li>Freeze Subscription Request</li>
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
                                    <li>40+ Free Group Classes</li>
                                    <li>Two Guest Pass per Month</li>
                                    <li>Freeze Subscription Request</li>
                                </ul>
                                <a data-toggle="modal" href="#staticBackdrop" class="btn">Pay</a>
                            </div>
                        </div>
                        <div class="col-md-4 club-card-col">
                            <div class="club-card-item" style="background-image: url(assets/img/bg-price-1.svg);">
                                <div class="price-cover">
                                    <div class="price">₦20,000</div>
                                    <div class="date"><span>per</span>month</div>
                                </div>
                                <ul class="list">
                                    <li>Couple Joining Fee - ₦35,000 </li>
                                    <li>10% Discount for Family of more than 4 people </li>
                                    <li>All Day Access</li>
                                    <li>40+ Free Group Classes</li>
                                    <li>No Guest Pass</li>
                                    <li>No Freeze Subscription</li>
                                </ul>
                                <a data-toggle="modal" href="#staticBackdrop" class="btn">Pay</a>
                            </div>
                        </div>

                        <div class="col-md-4 club-card-col">
                            <div class="club-card-item" style="background-image: url(assets/img/bg-price-2.svg);">
                                <div class="price-cover">
                                    <div class="price">₦55,000</div>
                                    <div class="date"><span>per</span>quarter</div>
                                </div>
                                <ul class="list">
                                    <li>Couple Joining Fee - ₦100,000 </li>
                                    <li>10% Discount for Family of more than 4 people </li>
                                    <li>All Day Access</li>
                                    <li>40+ Free Group Classes</li>
                                    <li>One Guest Pass per Month</li>
                                    <li>Freeze Subscription Request <br></li>
                                </ul>
                                <a data-toggle="modal" href="#staticBackdrop" class="btn">Pay</a>
                            </div>
                        </div>
                        <div class="col-md-4 club-card-col">
                            <div class="club-card-item" style="background-image: url(assets/img/bg-price-3.svg);">
                                <div class="price-cover">
                                    <div class="price">₦230,000</div>
                                    <div class="date"><span>per</span>annum</div>
                                </div>
                                <ul class="list">

                                    <li>Couple Joining Fee - ₦400,000 </li>
                                    <li>10% Discount for Family of more than 4 people </li>
                                    <li>All Day Access</li>
                                    <li>40+ Free Group Classes</li>
                                    <li>Two Guest Pass per Month</li>
                                    <li>Freeze Subscription Request <br></li>
                                </ul>
                                <a data-toggle="modal" href="#staticBackdrop" class="btn">Pay</a>
                            </div>
                        </div>
                    </div>
    </section>
    <!-- Membership Section End -->

@endsection
