<?php
include('../classes/register.php');
?>
<?php
$register = new register();
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])){
    $resgitersubmit = $register->register($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="admin/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="admin/vendor/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="admin/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="admin/vendor/css/util.css">
    <link rel="stylesheet" type="text/css" href="admin/vendor/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="admin/vendor/img/6.png" alt="IMG">
            </div>

            <form action="" method="POST" class="login100-form validate-form">
					<span class="login100-form-title">
						Register

					</span>
<!--                -->
                <?php
                if (isset($resgitersubmit)){
                    echo $resgitersubmit;
                }
                ?>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="pass" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="confirmpass" placeholder="Confirm your password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>
                <div class="wrap-input100 validate-input" >
                    <input class="input100" type="text" name="name" placeholder="Your name">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <input type="submit" name="register" class="login100-form-btn"/>


                </div>

<!--                <div class="text-center p-t-12">-->
<!--						<span class="txt1">-->
<!--							Forgot-->
<!--						</span>-->
<!--                    <a class="txt2" href="#">-->
<!--                        Username / Password?-->
<!--                    </a>-->
<!--                </div>-->
<!---->
                <div class="text-center p-t-136">
                    <a class="txt2" href="admin/login.php">
                        Already have an account?
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>




<!--===============================================================================================-->
<script src="admin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="admin/vendor/bootstrap/js/popper.js"></script>
<script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="admin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="admin/vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="admin/vendor/js/main.js"></script>

</body>
</html>