<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kipkelion East Sub-County</title>
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.png"/>

    <!-- Bootstrap & jQuery -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/elegant-fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">

    <style>
        .carousel-inner img { width: 100%; height: 100%; }
        .txtWhite { color: white !important; font-size: 18px !important; padding-right: 30px !important; }
        .middle { vertical-align: middle; }
    </style>
</head>

<body>
<div class="hero-content" style="margin-bottom: 10%;">

    <!-- Navbar -->
    <header class="site-header">
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <a class="navbar-brand site-title" href="#" style="color: gold">
                        <img class="middle" src="/images/mainlogo.png" alt="Logo" width="50" height="50">
                        <span class="middle">Kipkelion East e-Bursary</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            @guest
                                <li class="nav-item active"><a class="txtWhite nav-link" href="/">Home</a></li>
                                <li class="nav-item"><a class="txtWhite nav-link" href="/about">About</a></li>
                                <li class="nav-item"><a class="txtWhite nav-link" href="/contact">Contact</a></li>
                                <li class="nav-item"><a class="txtWhite nav-link" href="/faqs">FAQ</a></li>
                                <li class="nav-item">
                                    <a class="txtWhite nav-link btn btn-outline-dark text-light px-4" href="{{ route('login') }}">Login</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="txtWhite nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @if(!Auth::user()->is_admin)
                                            <a href="/status" class="dropdown-item">Application Status</a>
                                            <a href="{{ route('profile.edit') }}" class="dropdown-item">Profile</a>
                                            <a href="{{ route('password.change') }}" class="dropdown-item">Change Password</a>
                                            <a href="{{ route('scholarship.list') }}" class="dropdown-item">My Applications</a>
                                            <a href="{{ route('notifications') }}" class="dropdown-item">Notifications</a>
                                            <a href="{{ route('print.index') }}" class="dropdown-item">Print Application</a>
                                            <a href="{{ route('help') }}" class="dropdown-item">Help / Support</a>
                                        @endif

                                        @if(Auth::user()->is_admin)
                                            <a href="{{ route('admin.profile') }}" class="dropdown-item">Admin Profile</a>
                                            <a href="{{ route('admin.password.change') }}" class="dropdown-item">Change Password</a>
                                            <a href="{{ route('admin.users.index') }}" class="dropdown-item">Manage Users</a>
                                            <a href="{{ route('admin.settings') }}" class="dropdown-item">System Settings</a>
                                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item">Admin Dashboard</a>
                                        @endif

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    @yield('carousel')
</div>

<div id="app">
    <main class="py-5">
        @yield('content')
    </main>
</div>

@auth
<script>
    window.user = @json(auth()->user())
</script>
@endauth

@include('layouts.footer')
</body>
</html>
