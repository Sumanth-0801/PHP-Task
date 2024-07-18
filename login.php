<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="login.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <h1>tailwebs.</h1>
        </div>

        <div class="login-box-body">
            <form method="post" action="./code.php" id="loginform" novalidate="novalidate">
                <div class="form-group has-feedback">
                    <div class="flex-all-device items-center justify-center">
                        <div class="phone-code">
                            <i class="fas fa-user" style="color: #000000;"> </i>
                        </div>
                        <div class="email-form">
                            <label for="">Username</label>
                            <input type="text" name="user_name" class="form-control required valid" placeholder=" username" value="" style="text-indent: 24px;">
                        </div>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <div class="flex-all-device items-center justify-center">
                        <div class="password-code">
                            <i class="fa-solid fa-unlock-keyhole" style="color: #000000;"></i>
                            <span>
                                <i class="fas fa-eye-slash showPassword" style="float: right;"> </i>
                            </span>
                        </div>
                        <div class="password-form">
                            <label for="">Password</label>
                            <input type="password" name="password" id="password" class="form-control required valid" placeholder=" Password" value="" required="" aria-invalid="false" style="text-indent: 24px;">

                        </div>

                    </div>
                    <div>
                        <p class="forgot-password">Forgot Password?</p>
                    </div>
                    <div class="">
                        <div class="col-xs-4 sign-button">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                        </div>
                    </div>
            </form>
        </div>
        <?php
        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {

        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey </strong> <?php echo $_SESSION['status']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            unset($_SESSION['status']);
        }
        ?>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('.showPassword').on('click', function() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                $(this).removeClass('fas fa-eye-slash');
                $(this).addClass('fas fa-eye');
                x.type = "text";
            } else {
                $(this).removeClass('fas fa-eye');
                $(this).addClass('fas fa-eye-slash');
                x.type = "password";
            }
        });
    });
</script>

</html>