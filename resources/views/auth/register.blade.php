<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kipkelion East Constituency</title>
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.jpeg"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="{{ asset('css/elegant-fonts.css') }}">

    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
<<<<<<< HEAD

=======
>>>>>>> 16ca537 (update files)
        .btn {
            background-color: forestgreen;
            color: #fff;
            font-weight: 700;
        }

        i {
            cursor: pointer;
        }
<<<<<<< HEAD
=======

        /* Add auth header like login page */
        .auth-card {
            border-radius: 8px;
            box-shadow: 0 8px 20px rgba(0,0,0,.08);
        }

        .auth-header {
            background: forestgreen;
            color: #fff;
            padding: 1rem;
            font-weight: 700;
            text-align: center;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            margin-bottom: 1rem;
        }
>>>>>>> 16ca537 (update files)
    </style>
</head>
<body>
<div class="hero-content" style="margin-bottom: 10%;">

<<<<<<< HEAD
    <div class="container pt-5">
        <div class="row justify-content-center pt-5">
            <div class="col-md-8 pt-5">
                <div class="card">
=======
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card auth-card">

                    <!-- Header -->
                    <div class="auth-header">
                        Kipkelion East E-Bursary Portal
                    </div>

                    <!-- Tabs -->
>>>>>>> 16ca537 (update files)
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="/register">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                    </ul>
<<<<<<< HEAD
=======

>>>>>>> 16ca537 (update files)
                    <div class="card-body text-center">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row justify-content-center">
                                <div class="col-md-5 input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                                    </div>
                                    <input id="fname" type="text"
                                           class="form-control @error('fname') is-invalid @enderror"
                                           name="fname" value="{{ old('fname') }}" required autocomplete="name"
                                           autofocus placeholder="First name">
                                    @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                                <div class="col-md-5 input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                                    </div>
                                    <input id="lname" type="text"
                                           class="form-control @error('lname') is-invalid @enderror"
                                           name="lname" value="{{ old('lname') }}" required autocomplete="name"
                                           autofocus placeholder="Last name">
                                    @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                            </div>
<<<<<<< HEAD
=======

                            <!-- Rest of your existing form code stays completely intact -->
>>>>>>> 16ca537 (update files)
                            <div class="form-group row justify-content-center">
                                <div class="col-md-5 input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                    </div>
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" placeholder="Enter Email"
                                           required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                                <div class="col-md-5 input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-id-card-alt"></i></div>
                                    </div>
                                    <input id="id_number" type="number"
                                           class="form-control @error('id_number') is-invalid @enderror" name="id_number"
                                           value="{{ old('id_number') }}" placeholder="ID Number/Birth certificate"
                                           required>

                                    @error('id_number')
                                    <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                            </div>
<<<<<<< HEAD
=======

                            <!-- All remaining form fields unchanged -->
>>>>>>> 16ca537 (update files)
                            <div class="form-group row justify-content-center">
                                <div class="col-md-5 input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                    </div>
                                    <input id="phone" type="tel"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           name="phone" value="{{ old('phone') }}" placeholder="0700000000"
                                           required autocomplete="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                                <div class="col-md-5 input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                    <input id="place" type="text"
                                           class="form-control @error('place') is-invalid @enderror"
                                           name="place" value="{{ old('place') }}"
                                           placeholder="Place of residence" required>

                                    @error('place')
                                    <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-md-5 input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-unlock"></i></div>
                                    </div>
                                    <input id="password" type="password" placeholder="Password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                                <div class="col-md-5 input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-unlock"></i></div>
                                    </div>
                                    <input id="password-confirm" placeholder="Confirm Password" type="password"
                                           class="form-control" name="password_confirmation" required
                                           autocomplete="new-password">
                                </div>
                            </div>
<<<<<<< HEAD
=======

>>>>>>> 16ca537 (update files)
                            <div class="form-group row justify-content-center">
                                <div class="col-md-10">
                                    <div class="form-check">
                                        <input class="form-check-input @error('terms') is-invalid @enderror"
                                               type="checkbox" name="terms" id="terms" value="1">

                                        <label class="form-check-label logo2" for="terms">
                                            <a class="pl-2 state btn-link" href="{{ route('privacy') }}">
                                                {{ __('Agree with the terms and conditions') }}
                                            </a>
                                        </label>
                                        @error('terms')
                                        <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                           <div class="form-group row mb-0 justify-content-center">
<<<<<<< HEAD
    <button id="registerBtn" type="submit" class="btn btn px-5">
        Register
    </button>
</div>
=======
                                <button id="registerBtn" type="submit" class="btn btn px-5">
                                    Register
                                </button>
                           </div>
>>>>>>> 16ca537 (update files)

                        </form>
                    </div>
                </div>
<<<<<<< HEAD
=======

>>>>>>> 16ca537 (update files)
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
=======

>>>>>>> 16ca537 (update files)
<script>

    var pwd = document.getElementById('pwd');
    var eye = document.getElementById('eye');


    eye.addEventListener('click', togglepass);

    function togglepass() {

        eye.classList.toggle('active');

        (pwd.type == 'password') ? pwd.type = 'text' : pwd.type = 'password';
    }
</script>
<script>
    const registerBtn = document.getElementById('registerBtn');
    const form = document.querySelector("form");

    form.addEventListener("submit", function() {
        // Disable button and change text
        registerBtn.disabled = true;
        registerBtn.innerHTML = "Registering...";

        // Do NOT prevent default submission
        // Laravel will handle the form submission
    });
</script>

<<<<<<< HEAD


=======
>>>>>>> 16ca537 (update files)
</body>
</html>
