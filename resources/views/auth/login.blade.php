<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<<<<<<< HEAD
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kipkelion East Constituency</title>
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.jpeg"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .btn {
            background-color: forestgreen;
            color: #fff;
            font-weight: 700;
        }
        i { cursor: pointer; }
        .input-group-text { background-color: #fff; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <!-- Tabs -->
                <ul class="nav nav-tabs" id="authTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content p-4" id="authTabContent">
                    <!-- LOGIN -->
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input id="email" type="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" required autofocus>
                                @error('email')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="login_password">Password</label>
                                <div class="input-group">
                                    <input id="login_password" type="password" name="password"
                                           class="form-control @error('password') is-invalid @enderror" required>
                                    <span class="input-group-text"><i class="fas fa-eye-slash toggle-password" data-target="login_password"></i></span>
                                    @error('password')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>
                            <button type="submit" class="btn w-100">Login</button>
                            @if (Route::has('password.request'))
                                <div class="mt-2 text-center">
                                    <a href="{{ route('password.request') }}">Forgot Password?</a>
=======
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kipkelion East E-Bursary | Login & Register</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.jpeg"/>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            background: #f4f6f9;
        }

        .auth-card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 8px 20px rgba(0,0,0,.08);
        }

        .auth-header {
            background: forestgreen;
            color: #fff;
            padding: 1rem;
            text-align: center;
            font-weight: 700;
        }

        .btn-primary-custom {
            background: forestgreen;
            border: none;
            font-weight: 700;
        }

        .btn-primary-custom:hover {
            background: #1f7a1f;
        }

        .nav-tabs .nav-link.active {
            font-weight: 700;
        }

        .input-group-text {
            background: #fff;
            cursor: pointer;
        }

        .invalid-feedback {
            display: block;
        }
    </style>
</head>

<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="card auth-card">

                <div class="auth-header">
                    Kipkelion East E-Bursary Portal
                </div>

                <!-- Tabs -->
                <ul class="nav nav-tabs nav-justified" id="authTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="login-tab" data-toggle="tab"
                           href="#login" role="tab" aria-controls="login" aria-selected="true">
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="register-tab" data-toggle="tab"
                           href="#register" role="tab" aria-controls="register" aria-selected="false">
                            Register
                        </a>
                    </li>
                </ul>

                <div class="tab-content p-4">

                    <!-- LOGIN -->
                    <div class="tab-pane fade show active" id="login" role="tabpanel">
                        <form method="POST" action="{{ route('login') }}" autocomplete="off">
                            @csrf

                            <div class="form-group">
                                <label for="login">Email or Phone</label>
                                <input id="login" type="text"
                                       class="form-control @error('login') is-invalid @enderror"
                                       name="login" value="{{ old('login') }}" required autofocus>
                                @error('login')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="login_password">Password</label>
                                <div class="input-group">
                                    <input id="login_password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text toggle-password" data-target="login_password">
                                            <i class="fa fa-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('password')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary-custom btn-block">
                                Login
                            </button>

                            @if (Route::has('password.request'))
                                <div class="text-center mt-3">
                                    <a href="{{ route('password.request') }}">Forgot password?</a>
>>>>>>> 16ca537 (update files)
                                </div>
                            @endif
                        </form>
                    </div>

                    <!-- REGISTER -->
<<<<<<< HEAD
                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col">
                                    <input type="text" name="fname" class="form-control @error('fname') is-invalid @enderror"
                                           value="{{ old('fname') }}" placeholder="First Name" required>
                                    @error('fname')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input type="text" name="lname" class="form-control @error('lname') is-invalid @enderror"
                                           value="{{ old('lname') }}" placeholder="Last Name" required>
                                    @error('lname')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}" placeholder="Email" required>
                                    @error('email')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input type="number" name="id_number" class="form-control @error('id_number') is-invalid @enderror"
                                           value="{{ old('id_number') }}" placeholder="ID Number" required>
                                    @error('id_number')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ old('phone') }}" placeholder="Phone" required>
                                    @error('phone')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input type="text" name="place" class="form-control @error('place') is-invalid @enderror"
                                           value="{{ old('place') }}" placeholder="Place of Residence" required>
                                    @error('place')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="input-group">
                                        <input id="register_password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                                        <span class="input-group-text"><i class="fas fa-eye-slash toggle-password" data-target="register_password"></i></span>
                                        @error('password')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group">
                                        <input id="register_password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                                        <span class="input-group-text"><i class="fas fa-eye-slash toggle-password" data-target="register_password_confirmation"></i></span>
=======
                    <div class="tab-pane fade" id="register" role="tabpanel">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col">
                                    <label>First Name</label>
                                    <input type="text" name="fname"
                                           class="form-control @error('fname') is-invalid @enderror"
                                           value="{{ old('fname') }}" required>
                                </div>
                                <div class="form-group col">
                                    <label>Last Name</label>
                                    <input type="text" name="lname"
                                           class="form-control @error('lname') is-invalid @enderror"
                                           value="{{ old('lname') }}" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label>Email</label>
                                    <input type="email" name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group col">
                                    <label>ID Number</label>
                                    <input type="text" name="id_number"
                                           class="form-control @error('id_number') is-invalid @enderror"
                                           inputmode="numeric" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label>Phone</label>
                                    <input type="tel" name="phone"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           required>
                                </div>
                                <div class="form-group col">
                                    <label>Place of Residence</label>
                                    <input type="text" name="place"
                                           class="form-control @error('place') is-invalid @enderror"
                                           required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label>Password</label>
                                    <div class="input-group">
                                        <input id="register_password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text toggle-password" data-target="register_password">
                                                <i class="fa fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col">
                                    <label>Confirm Password</label>
                                    <div class="input-group">
                                        <input id="register_password_confirmation" type="password"
                                               class="form-control"
                                               name="password_confirmation" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text toggle-password" data-target="register_password_confirmation">
                                                <i class="fa fa-eye-slash"></i>
                                            </span>
                                        </div>
>>>>>>> 16ca537 (update files)
                                    </div>
                                </div>
                            </div>

<<<<<<< HEAD
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="terms" class="form-check-input @error('terms') is-invalid @enderror" value="1" required>
                                <label class="form-check-label" for="terms">
                                    Agree to <a href="{{ route('privacy') }}">terms & conditions</a>
                                </label>
                                @error('terms')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <button type="submit" class="btn w-100">Register</button>
                        </form>
                    </div>
                </div>

=======
                            <div class="form-group form-check">
                                <input type="checkbox" name="terms" class="form-check-input" required>
                                <label class="form-check-label">
                                    I agree to the <a href="{{ route('privacy') }}">Terms & Privacy Policy</a>
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary-custom btn-block">
                                Create Account
                            </button>
                        </form>
                    </div>

                </div>
>>>>>>> 16ca537 (update files)
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<<<<<<< HEAD
<script>
    // Toggle password visibility for multiple fields
    document.querySelectorAll('.toggle-password').forEach(function(icon) {
        icon.addEventListener('click', function() {
            const targetId = this.dataset.target;
            const input = document.getElementById(targetId);
            if(input){
                input.type = input.type === 'password' ? 'text' : 'password';
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
=======

<script>
    document.querySelectorAll('.toggle-password').forEach(el => {
        el.addEventListener('click', () => {
            const input = document.getElementById(el.dataset.target);
            const icon = el.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
>>>>>>> 16ca537 (update files)
            }
        });
    });
</script>
<<<<<<< HEAD
=======

>>>>>>> 16ca537 (update files)
</body>
</html>
