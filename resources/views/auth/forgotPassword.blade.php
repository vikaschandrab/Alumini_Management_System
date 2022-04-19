<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Alumini Management System | Forgot Password Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style>
#submitOTP {
  display:none;
}
#EnterNewPass {
  display:none;
}
</style>
  </head>
  <body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <h3>Alumini Management System</h3>
                <form class="login100-form validate-form" method="GET" name="EnterEmail" id="EnterEmail" action="/forgot-password" enctype ="multipart/form-data">
					{{ csrf_field() }}
                    <span class="login100-form-title p-b-26">
                        Reset Password
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
                        <input class="input100 @error('code') is-invalid @enderror" type="code" id="code"
                            name="code" readonly autocomplete="off">
                        <span class="focus-input100" data-placeholder="code"></span>
                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type=submit name="submit" id="submit" value="submit">
								Request OTP
							</button>
                        </div>
                    </div>
                </form>
                <div id="Enter_Otp">
                    @include('auth.EnterOTP')
               </div>

               <div id="Enter_new_Password">
                   @include('auth.EnterNewPassword')
               </div>
            </div>
        </div>
    </div>


<script src="../vendors/jquery/jquery-3.2.1.min.js"></script>
<script src="../js/main.js"></script>

<script>
    $("#EnterEmail").on("submit",function(e){
    var Email = document.getElementById("email").value;
        document.getElementById('emailId').innerHTML = Email;
    e.preventDefault();
    });
</script>

<script>
    @if (session('status'))
        swal({
            title: ' {{ session('status') }}',
            icon: "error",
            button: "Done",
        });
    @endif
</script>

<script>
    $("#EnterEmail").on("submit",function(e){
        var dataString=$(this).serialize();
        // alert(dataString);
        $.ajax({
            type:"GET",
            url:"/requestOTP",
            data:dataString,
            success:function(data)
            {
                var AObj = JSON.parse(JSON.stringify(data));

            switch (AObj.IsSuccess) {
                case "1":
                swal({
                                    title: 'Email Does not exits',
                                    icon: "error",
                                    button: "Done",
                                });
                    break;
                case "2":
                                var x1 = document.getElementById("submitOTP");
                        if (x1.style.display === "block") {
                            document.getElementById("EnterEmail").style.display = "block";
                            x1.style.display = "none";
                            } else {
                            document.getElementById("EnterEmail").style.display = "none";
                            x1.style.display = "block";
                            }
                    break;
                    default:
                    swal({
                                    title: 'Something Went Wrong Please Try Again Later',
                                    icon: "error",
                                    button: "Done",
                                });
                    break;
                }
            }
        });
        e.preventDefault();
    });
</script>

<script>
 $("#submitOTP").on("submit",function(e){
        var dataString=$(this).serialize();
        $.ajax({
        // alert("Requested OTP");
            type:"GET",
            url:"/verifyOTP",
            data:dataString,
            success:function(data)
            {
                // console.log(data);
                var AObj = JSON.parse(JSON.stringify(data));
                // console.log(AObj);
                // alert(AObj);
                // var switchValue =JSON.stringify(AObj.IsSuccess);

            switch (AObj.IsSuccess) {
                case "3":
                swal({
                                    title: 'Phone Number Does not Exits',
                                    icon: "error",
                                    button: "Done",
                                });
                    break;
                case "5":
                swal({
                                    title: 'Invalid OTP',
                                    icon: "error",
                                    button: "Done",
                                });
                    break;
                case "4":
                                var x1 = document.getElementById("EnterNewPass");
                        if (x1.style.display === "block") {
                            document.getElementById("submitOTP").style.display = "block";
                            x1.style.display = "none";
                            } else {
                            document.getElementById("submitOTP").style.display = "none";
                            x1.style.display = "block";
                            }
                    break;
                    default:
                    swal({
                                    title: 'Something Went Wrong Please Try Again Later',
                                    icon: "error",
                                    button: "Done",
                                });
                    break;
                }
            }
        });
        e.preventDefault();
    });
</script>

<script>
    $("#EnterNewPass").on("submit",function(e){
           var dataString=$(this).serialize();
           $.ajax({
           // alert("Requested OTP");
               type:"GET",
               url:"/NewPass",
               data:dataString,
               success:function(data)
               {
                var AObj = JSON.parse(JSON.stringify(data));
                console.log(AObj);
                switch (AObj.IsSuccess) {
                case "6":
                window.location = '/login';
                function preventBack() {
            window.history.forward();
        }

        setTimeout("preventBack()", 0);

        window.onunload = function () { null };
                   swal({
                                       title: 'Password Changed Successfully',
                                       icon: "success",
                                       button: "Done",
                                   });
                break;
                case "7":
                swal({
                                    title: 'Password Did not Match',
                                    icon: "error",
                                    button: "Done",
                                });
                    break;

               }
               }
           });
           e.preventDefault();
       });
   </script>



  </body>
</html>
