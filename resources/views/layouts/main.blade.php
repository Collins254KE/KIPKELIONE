<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kipkelion East Constituency</title>
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.jpeg"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- FontAwesome & Icons -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/elegant-fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">

    <style>
        /* Make carousel images fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
        .txtWhite {
            color: white !important;
            font-size: 18px !important;
            padding-right: 30px !important;
        }
        .middle {
            vertical-align: middle;
        }
        /* Sticky sidebar */
        .sticky-sidebar {
            position: sticky;
            top: 20px;
        }
        /* Sidebar nav links */
        .sidebar-nav a {
            text-decoration: none;
            color: #333;
        }
        .sidebar-nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="hero-content">

    <!-- Navbar -->
    <header class="site-header">
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <a class="navbar-brand site-title text-gold" href="#" rel="home" style="color: gold">
                        <img class="middle" src="/images/mainlogo.png" alt="Main logo" width="50" height="50">
                        <span class="middle">Kipkelion East e-Bursary</span>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        @guest
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="txtWhite nav-link btn btn-outline-dark px-4 mr-2" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="txtWhite nav-link btn btn-outline-success px-4" href="{{ route('register') }}">Register</a>
                                </li>
                            </ul>
                        @else
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="txtWhite nav-link dropdown-toggle" href="#"
                                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a href="/status" class="dropdown-item">Application Status</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        @endguest
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Carousel -->
    <div id="heroCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#heroCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#heroCarousel" data-slide-to="1"></li>
            <li data-target="#heroCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/Slider2.jpg') }}" class="d-block w-100" alt="NG-CDF Bursary">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                    <h3 class="text-white"><b>NG-CDF Bursary Application Portal</b> <br>(NBAP)</h3>
                    @guest
                        <div class="mt-3">
                            <a class="btn btn-outline-dark mr-2" href="{{ route('login') }}">Login</a>
                            <a class="btn btn-outline-success" href="{{ route('register') }}">Register</a>
                        </div>
                    @else
                        <div class="mt-3">
                            <a class="btn btn-outline-success mr-2" href="{{ route('apply') }}">High School</a>
                            <a class="btn btn-outline-success mr-2" href="{{ route('scholarship.form') }}">Tertiary</a>
                            @if(Auth::user()->is_admin)
                                <a class="btn btn-outline-warning" href="{{ route('admin.cdf.index') }}">Admin</a>
                            @endif
                        </div>
                    @endguest
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/Slider1.jpg') }}" class="d-block w-100" alt="Supporting Education">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                    <h3 class="text-white">Supporting Education in Kipkelion East</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/Slider4.jpg') }}" class="d-block w-100" alt="Scholarships & Bursaries">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                    <h3 class="text-white">Apply Today for Scholarships & Bursaries</h3>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<!-- Main Content + Sticky Sidebar -->
<div class="container mt-4">
    <div class="row">
        <!-- Sticky Sidebar -->
        <div class="col-lg-4 col-md-12 mb-4">
            <div class="card sticky-sidebar p-3">
                <!-- Sidebar Navigation -->
                <h5 class="mb-3"><b>Navigation</b></h5>
                <ul class="list-group sidebar-nav mb-3">
                    <li class="list-group-item"><a href="/">Home <span class="sr-only">(current)</span></a></li>
                    <li class="list-group-item"><a href="/about">About</a></li>
                    <li class="list-group-item"><a href="/contact">Contact</a></li>
                    <li class="list-group-item"><a href="/faqs">FAQ</a></li>
                </ul>

                <!-- Portal Actions -->
                <h5 class="mb-3"><b>Portal Actions</b></h5>
                @guest
                    <a class="btn btn-outline-dark btn-block mb-2" href="{{ route('login') }}">Login</a>
                    <a class="btn btn-outline-success btn-block" href="{{ route('register') }}">Register</a>
                @else
                    <a class="btn btn-outline-success btn-block mb-2" href="{{ route('apply') }}">High School</a>
                    <a class="btn btn-outline-success btn-block mb-2" href="{{ route('scholarship.form') }}">Tertiary</a>
                    @if(Auth::user()->is_admin)
                        <a class="btn btn-outline-warning btn-block" href="{{ route('admin.cdf.index') }}">Admin</a>
                    @endif
                @endguest
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-8 col-md-12">
            @yield('content')
        </div>
    </div>
</div>

{{-- Footer --}}
@include('layouts.footer')

<!-- JS Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>
