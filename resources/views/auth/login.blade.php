<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
                           href="register" role="tab" aria-controls="register" aria-selected="false">
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
                                </div>
                            @endif
                        </form>
                    </div>

                    <!-- REGISTER -->
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
                                    </div>
                                </div>
                            </div>

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
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

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
            }
        });
    });
</script>

</body>
</html>
