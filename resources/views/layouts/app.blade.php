<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="TopGym Template">
    <meta name="keywords" content="TopGym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kalkreatif | Fitness Website</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,700,900" rel="stylesheet">

    <!-- Css Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/barfiller.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slicknav.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header Section Begin -->


    <header class="header-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-menu">
                        <div class="logo">
                            <a href="/">
                                <img src="{{ asset('images/Kalkreatif-logo.png') }}" alt="" height="90px"
                                    width="190px">
                            </a>
                        </div>
                        <nav class="mobile-menu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="/about">About</a></li>
                                <li><a href="/class">Classes</a></li>
                                <li><a href="/gym-trainers">Trainers</a></li>
                                <li><a href="#">Spa</a></li>
                                <li><a href="/gallery">Gallery</a></li>
                                <li><a href="/contact">Contact</a></li>
                                @guest
                                    <li class="main-menu-nav-item-btn">
                                        <h4><a class="nav-link" href="/user-register">Login/Register</a></h4>
                                    </li>
                                    {{-- <li><a href="/user-register">Register</a></li>
                                    <li><a href="/user-login">Login</a></li> --}}
                                @else
                                    <li class="main-menu-nav-item-btn"><a class="nav-link" href="/my-profile">
                                            {{ Auth::user()->member_firstname }}</a></li>
                                    <li class="search-btn search-trigger">
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                  document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;{{ __('Logout') }}</a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                    </li>
                                @endguest
                            </ul>
                        </nav>
                        <div id="mobile-menu-wrap"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <!-- Footer Section Begin -->
    <footer class="footer-section set-bg" data-setbg="{{ asset('img/footer-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div style="margin-top: 30px" class=" footer-content">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="/about">About</a></li>
                                <li><a href="/class">Classes</a></li>
                                <li><a href="/gym-trainers">Trainers</a></li>
                                <li><a href="#">Spa</a></li>
                                <li><a href="/gallery">Gallery</a></li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </div>
                        <div class="subscribe-form">
                            <form action="#">
                                <input required type="text" placeholder="your Email">
                                <button type="submit">Sign Up</button>
                            </form>
                        </div>
                        <div class="social-links">
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>

                        <div class="copyright">
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> | <i class="fa fa-heart-o" style="color:red" aria-hidden="true"></i> by <a
                                href="http://www.smarttechsolutions.com.ng" target="_blank">Smart Tech Solutions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('js/jquery.barfiller.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $("#my-bmi-submit").click(function() {
            if (!($("#weight").val() === '' || $("#height").val() === '')) {
                res = ($("#weight").val() / $("#height").val() / $("#height").val()) * 10000;
                if (res > 0 && res < 18.5)
                    $("#bmi-result").val(res.toFixed(1) + "(Underweight)");
                else if (res >= 18.5 && res < 24.9)
                    $("#bmi-result").val(res.toFixed(1) + "(Healthy Weight)");
                else if (res > 25.0 && res < 29.9)
                    $("#bmi-result").val(res.toFixed(1) + "(Overweight)");
                else
                    $("#bmi-result").val(res.toFixed(1) + "(Obesity)");
            }
        })
        // $('#modalForPromo').modal({
        //     keyboard: false,
        //     show: true,
        //     backdrop: 'static'
        // })
    </script>
</body>

</html>
