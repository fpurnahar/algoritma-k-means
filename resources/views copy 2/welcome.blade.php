<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <header class="header">
        <nav class="nav">
            <a href="#" class="nav_logo">CodingLab</a>

            <ul class="nav_items">
                <li class="nav_item">
                    <a href="{{ route('home') }}" class="nav_link">Home</a>
                    <a href="#" class="nav_link">Product</a>
                    <a href="#" class="nav_link">Services</a>
                    <a href="#" class="nav_link">Contact</a>
                </li>
            </ul>

            <button class="button" id="form-open">Login</button>
        </nav>
    </header>

    <!-- Signup From -->
    <section class="home">
        <div class="form_container">
            <i class="uil uil-times form_close"></i>
            <!-- Login From -->
            <div class="form login_form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <h2>Login</h2>

                    <div class="input_box">
                        {{-- <input type="email" placeholder="Enter your email" required /> --}}
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                            placeholder="Enter your email" required autocomplete="email" autofocus>
                        <i class="uil uil-envelope-alt email"></i>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="input_box">
                        {{-- <input type="password" placeholder="Enter your password" required /> --}}
                        <input id="password" type="password" placeholder="Enter your password" required
                            autocomplete="current-password">

                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="option_field">
                        <span class="checkbox">
                            <input type="checkbox" id="check" />
                            <label for="check">Remember me</label>
                        </span>
                        <a href="#" class="forgot_pw">Forgot password?</a>
                    </div>

                    <button class="button" type="submit">Login Now</button>
                    <div class="login_signup">Don't have an account? <a href="{{ route('register') }}"
                            id="signup">Signup</a></div>
                </form>
            </div>

            <!-- Signup From -->
            <div class="form signup_form">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h2>Signup</h2>

                    <div class="input_box">
                        {{-- <input type="name" placeholder="Enter your name" required /> --}}

                        <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name"
                            placeholder="Enter your name" value="{{ old('name') }}" required autocomplete="name"
                            autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <i class="uil uil-envelope-alt email"></i>
                    </div>
                    <div class="input_box">
                        {{-- <input type="email" placeholder="Enter your email" required /> --}}

                        <input id="email" type="email" class="@error('email') is-invalid @enderror"
                            placeholder="Enter your email" name="email" value="{{ old('email') }}" required
                            autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <i class="uil uil-envelope-alt email"></i>
                    </div>
                    <div class="input_box">
                        {{-- <input type="password" placeholder="Create password" required /> --}}

                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            placeholder="Create password" autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                    </div>
                    <div class="input_box">
                        <input type="password" placeholder="Confirm password" required />
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                    </div>

                    <button type="submit" class="button">Signup Now</button>

                    <div class="login_signup">Already have an account? <a href="#" id="login">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
