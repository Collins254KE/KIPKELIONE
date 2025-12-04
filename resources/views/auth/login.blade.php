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
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .btn {
            background-color: forestgreen;
            color: #fff;
            font-weight: 700;
        }
        i { cursor: pointer; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <ul class="nav nav-tabs" id="authTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="register-tab" data-bs-toggle="tab" href="#register" role="tab">Register</a>
                    </li>
                </ul>
                <div class="tab-content p-4" id="authTabContent">
                    <!-- LOGIN -->
                    <div class="tab-pane fade show active" id="login" role="tabpanel">
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
                                <label for="pwd">Password</label>
                                <div class="input-group">
                                    <input id="pwd" type="password" name="password"
                                           class="form-control @error('password') is-invalid @enderror" required>
                                    <span class="input-group-text"><i class="fas fa-eye-slash" id="eye"></i></span>
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
                                </div>
                            @endif
                        </form>
                    </div>

                    <!-- REGISTER -->
                    <div class="tab-pane fade" id="register" role="tabpanel">
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
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                           placeholder="Password" required>
                                    @error('password')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input type="password" name="password_confirmation" class="form-control"
                                           placeholder="Confirm Password" required>
                                </div>
                            </div>
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
            </div>
        </div>
    </div>
</div>

<script>
    const pwd = document.getElementById('pwd');
    const eye = document.getElementById('eye');

    if(pwd && eye){
        eye.addEventListener('click', function(){
            eye.classList.toggle('active');
            pwd.type = (pwd.type === 'password') ? 'text' : 'password';
        });
    }
</script>
</body>
</html>
