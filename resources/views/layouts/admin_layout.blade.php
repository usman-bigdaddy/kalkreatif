<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Kalkreatif | Admin</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link href="{{ asset('assets/css/ready.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
</head>

<body>
    @auth('trainer')
    @else
        <?php
        header('Location: /login/trainer');
        exit();
        ?>
    @endauth

    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header">
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
            </div>
            <nav class="navbar navbar-header navbar-expand-lg">
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <img src="{{ asset(Auth::guard('trainer')->user()->image) ?? '' }}" alt="user-img"
                                    width="36" class="img-circle"><span>Hi
                                    {{ Auth::guard('trainer')->user()->trainer_firstname }}</span></span>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li>
                                    <div class="user-box">
                                        <div class="u-img"><img
                                                src="{{ asset(Auth::guard('trainer')->user()->image) }}" alt="user">
                                        </div>
                                        <div class="u-text">
                                            <h4>{{ Auth::guard('trainer')->user()->trainer_firstname . ' ' . Auth::guard('trainer')->user()->trainer_lastname }}
                                            </h4>
                                            <p class="text-muted">{{ Auth::guard('trainer')->user()->email }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/trainer/change-password"><i class="ti-settings"></i>
                                    Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/trainer-logout"><i class="fa fa-power-off"></i>
                                    Logout</a>
                            </ul>
                </div>
            </nav>
        </div>
        <div class="sidebar">
            <div class="scrollbar-inner sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item active">
                        <a href="/dashboard/trainer/">
                            <i class="la la-dashboard"></i>
                            <p>Dashboard</p>
                            <!-- <span class="badge badge-count">5</span> -->
                        </a>
                    </li>
                    @if (Auth::guard('trainer')->user()->is_admin == '1')
                        <li class="nav-item">
                            <a href="/trainer">
                                <i class="la la-table"></i>
                                <p>Trainers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/trainer/feedback">
                                <i class="la la-table"></i>
                                <p>Feedback</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="/member">
                            <i class="la la-keyboard-o"></i>
                            <p>Members</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/trainer/my-classes">
                            <i class="la la-keyboard-o"></i>
                            <p>My Classes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/classes">
                            <i class="la la-th"></i>
                            <p>Classes</p>

                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @yield('admin_content')

    </div>
    </div>
</body>

<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-mapael/maps/world_countries.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/ready.min.js') }}"></script>
<script src="{{ asset('assets/js/demo.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#my-trainers-table').DataTable();
        $(".teamLeaderDropDown").hide();
        $("#changeTeamLeader").click(function() {
            if ($(this).is(":checked")) {
                $(".teamLeaderDropDown").show(300);
            } else {
                $(".teamLeaderDropDown").hide(200);
            }
        });

    });
</script>

</html>
