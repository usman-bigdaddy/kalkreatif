@extends('layouts.app')

@section('content')
    @include('layouts.breadcrumb')

    <!-- Classes Schedule Section Begin -->
    <section class="class-timetable-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <span>Find Your Time</span>
                        <h2>Find Your Time</h2>
                    </div>
                </div>
                {{-- <div class="col-lg-6">
                    <div class="table-controls">
                        <ul>
                            <li class="active" data-tsfilter="all">All event</li>
                            <li data-tsfilter="fitness">Fitness tips</li>
                            <li data-tsfilter="motivation">Motivation</li>
                            <li data-tsfilter="workout">Workout</li>
                        </ul>
                    </div>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="class-timetable">
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Monday</th>
                                    <th>Tuesday</th>
                                    <th>Wednesday</th>
                                    <th>Thursday</th>
                                    <th>Friday</th>
                                    <th>Saturday</th>
                                    <th>Sunday</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="class-time">6.00am - 7.00am</td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="workout">
                                        <h5>BOOTCAMP </h5>
                                        <span>Onyekachi Michael</span>
                                    </td>
                                    <td class="hover-bg ts-meta" data-tsmeta="fitness">
                                        <h5>Cardio Blast</h5>
                                        <span>Grace Utsaha</span>
                                    </td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="workout">
                                        <h5>BOXING CLASS </h5>
                                        <span>Mabel Aduotukeme</span>
                                    </td>
                                    <td class="hover-bg ts-meta" data-tsmeta="fitness">
                                        <h5>STEP AEROBICS </h5>
                                        <span>Onyekachi Michael</span>
                                    </td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="workout">
                                        <h5>Spin Class</h5>
                                        <span>Grace Utsaha</span>
                                    </td>
                                    <td class="hover-bg ts-meta" data-tsmeta="motivation">
                                        <h5> Dance Class</h5>
                                        <span>Dance Instructor</span>
                                    </td>
                                    <td class="dark-bg blank-td"></td>
                                </tr>
                                <tr>
                                    <td class="class-time">10.00am - 11.00am</td>
                                    <td class="hover-bg ts-meta" data-tsmeta="fitness">
                                        <h5>BOOTCAMP </h5>
                                        <span>Grace Utsaha</span>
                                    </td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="fitness">
                                        <h5>CARDIO BLAST </h5>
                                        <span>Mabel Aduotukeme</span>
                                    </td>
                                    <td class="hover-bg ts-meta" data-tsmeta="workout">
                                        <h5>Boxing class</h5>
                                        <span>Grace Utsaha</span>
                                    </td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="motivation">
                                        <h5>Step Aerobics</h5>
                                        <span>Grace Utsaha</span>
                                    </td>
                                    <td class="hover-bg ts-meta" data-tsmeta="workout">
                                        <h5>Spin Class</h5>
                                        <span>Grace Utsaha</span>
                                    </td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="motivation">
                                        <h5>Yoga</h5>
                                        <span>Grace Utsaha</span>
                                    </td>
                                    <td class="blank-td"></td>
                                </tr>
                                <tr>
                                    <td class="class-time">7.00pm - 8.00pm</td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="fitness">
                                        <h5>HIIT</h5>
                                        <span>Mabel Aduotukeme</span>
                                    </td>
                                    <td class="hover-bg ts-meta" data-tsmeta="motivation">
                                        <h5>Lab</h5>
                                        <span>Onyekachi Michael</span>
                                    </td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="workout">
                                        <h5>HIIT</h5>
                                        <span>Mabel Aduotukeme</span>
                                    </td>
                                    <td class="hover-bg ts-meta" data-tsmeta="motivation">
                                        <h5>Lab</h5>
                                        <span>Mabel Aduotukeme</span>
                                    </td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="workout">
                                        <h5>Dance Class</h5>
                                        <span>Dance Instructor</span>
                                    </td>
                                    <td class="hover-bg ts-meta" data-tsmeta="motivation">
                                        <h5>Dance Class</h5>
                                        <span>Dance Instructor</span>
                                    </td>
                                    <td class="dark-bg blank-td"></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Class Schedule Section End -->
@endsection
