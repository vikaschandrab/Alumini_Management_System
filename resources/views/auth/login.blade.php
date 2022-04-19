<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Alumini Management System | Login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <h3>Alumini Management System</h3>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title p-b-26">
                        Login
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input class="input100 @error('email') is-invalid @enderror" type="text" name="email" id="email"
                            name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>
                        <span class="focus-input100" data-placeholder="Email"></span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100 @error('password') is-invalid @enderror" type="password" id="password"
                            name="password" required autocomplete="off">
                        <span class="focus-input100" data-placeholder="Password"></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <p style="text-align:center;"><a href="/forgot-password">Forgot Password</a></p>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
                <p style="text-align:center;">Dont have account? <a href="/user-register">Register</a></p>
            </div>
        </div>
    </div>

    <!-- pop up modal -->
    {{-- <div id="open-modal-forgotpswd" class="modal-window">
        <div>
            <a href="#modal-close-edit" title="Close" class="modal-close"> &times;</a>
            <form class="login100-form validate-form" method="POST" enctype="multipart/form-data" action="/verify-email">
                @csrf
                <span class="login100-form-title p-b-26">
                    Request OTP
                </span>
                <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                    <input class="input100" type="text" name="email" autofocus>
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" class="login100-form-btn">
                            Request OTP
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div> --}}
</body>
<script src="../vendors/jquery/jquery-3.2.1.min.js"></script>
<script src="../js/main.js"></script>
</html>
