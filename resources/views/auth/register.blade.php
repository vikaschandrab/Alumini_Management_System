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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <!-- <div style="text-align: center; background-color: #F2F2F2;"><h2>Alumini Management System</h2></div> -->
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <h3>Alumini Management System</h3>
                <form method="POST" action="/create-user">
                    @csrf
                    <span class="login100-form-title p-b-26">
                        Register
                    </span>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="phone" name="phone" id="phone" value="{{ old('phone') }}" autofocus required autocomplete="off">
                        <span class="focus-input100" data-placeholder="Phone number"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input class="input100" type="email" name="email" value="{{ old('email') }}" required autocomplete="off">
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" id="password" required autocomplete="off">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Re-Enter password">
                        <input class="input100" type="password"" id="confirmPassword" name="confirmPassword" required autocomplete="off">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
                <p style="text-align:center;">Already have account? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </div>
    </div>

</body>
<script src="../vendors/jquery/jquery-3.2.1.min.js"></script>
<script src="../js/main.js"></script>

<script>
    @if (session('failure'))
        swal({
        title: ' {{ session('failure') }}',
        icon: "warning",
        button: "Done",
        });
    @endif
</script>
<script>
    @if (session('status'))
        swal({
        title: ' {{ session('status') }}',
        icon: "success",
        button: "Done",
        });
    @endif
</script>

</html>
