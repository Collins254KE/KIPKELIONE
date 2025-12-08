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
/* Carousel images */
.carousel-inner img {
    width: 100%;
    height: 600px; /* Fixed height */
    object-fit: cover;
}

/* Navbar */
.txtWhite { color: white !important; font-size: 18px !important; }
.middle { vertical-align: middle; }

/* Top navigation bar */
.top-nav { background-color: #f8f9fa; border-bottom: 1px solid #ddd; }
.top-nav .nav-link { color: #333 !important; font-weight: 500; }
.top-nav .nav-link:hover { text-decoration: underline; }

/* Portal buttons */
.portal-actions .btn { margin-right: 10px; margin-top: 5px; }

/* Carousel caption overlay */
.carousel-caption {
    background: rgba(0,0,0,0.5);
    padding: 15px 20px;
    border-radius: 8px;
    bottom: 30px;
    left: 30px;
    right: auto;
    text-align: left;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .carousel-caption {
        bottom: 15px;
        left: 10px;
        right: 10px;
        padding: 10px 15px;
        font-size: 14px;
    }
    .carousel-inner img { height: 400px; }
}
</style>
</head>

<body>
<div class="hero-content">

<!-- Main Navbar -->
<header class="site-header">
    <div class="nav-bar">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <a class="navbar-brand site-title text-gold" href="#">
                    <img class="middle" src="/images/mainlogo.png" alt="Main logo" width="50" height="50">
                    <span class="middle">Kipkelion East e-Bursary</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @auth
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="txtWhite nav-link dropdown-toggle" href="#"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="/status" class="dropdown-item">Application Status</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    @endauth
                </div>
            </nav>
        </div>
    </div>

    <!-- Top Sidebar Navigation (Toggleable) -->
    <div class="top-nav">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#topNavContent" aria-controls="topNavContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span> Menu
                </button>

                <div class="collapse navbar-collapse" id="topNavContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
                        <li class="nav-item"><a href="/faqs" class="nav-link">FAQ</a></li>
                    </ul>

                    <ul class="navbar-nav ml-auto portal-actions">
                        @guest
                        <li class="nav-item"><a class="nav-link btn btn-outline-dark mb-2" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-success mb-2" href="{{ route('register') }}">Register</a></li>
                        @else
                        <li class="nav-item"><a class="nav-link btn btn-outline-success mb-2" href="{{ route('apply') }}">High School</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-success mb-2" href="{{ route('scholarship.form') }}">Tertiary</a></li>
                        @if(Auth::user()->is_admin)
                        <li class="nav-item"><a class="nav-link btn btn-outline-warning mb-2" href="{{ route('admin.cdf.index') }}">Admin</a></li>
                        @endif
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

<!-- Hero Carousel -->
<div id="heroCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/Slider2.jpg') }}" class="d-block w-100" alt="NG-CDF Bursary">
            <div class="carousel-caption">
                <h3 class="text-white"><b>NG-CDF Bursary Application Portal</b></h3>
                <p class="text-white">(NBAP)</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/Slider1.jpg') }}" class="d-block w-100" alt="Supporting Education">
            <div class="carousel-caption">
                <h3 class="text-white">Supporting Education in Kipkelion East</h3>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/Slider4.jpg') }}" class="d-block w-100" alt="Scholarships & Bursaries">
            <div class="carousel-caption">
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

<!-- Main Content -->
<div class="container mt-4">
    @yield('content')
</div>

{{-- Footer --}}
@include('layouts.footer')

<!-- JS Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
