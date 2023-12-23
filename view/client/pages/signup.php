<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="public\signup\images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public\signup\vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public\signup\fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public\signup\fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public\signup\vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="public\signup\vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public\signup\vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public\signup\vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="public\signup\vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public\signup\css/util.css">
	<link rel="stylesheet" type="text/css" href="public\signup\css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('public/signup/images/bg-01.jpg');">
		<div class="logo-box col-lg-12"  style="float: right;">
                    <a href="../Shopping/index.php" class="logo text-center logo-light" >                      
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-light">S</span> -->
                            <img src="public\admin/images/logo.png" alt="" height="45px">
                        </span>
                    </a>
                </div>
			<div class="wrap-login100 p-l-90 p-r-90 p-t-25 p-b-33" style="padding-right: 30px;padding-left: 30px;">
				<form class="login100-form validate-form flex-sb flex-w" action="index.php" method="post">
					<span class="login100-form-title p-b-23" style="font-weight: bolder;">
						Đăng Kí
					</span>

					<a href="#" class="btn-face m-b-20" >
						<i class="fa fa-facebook-official" ></i>
						Facebook
					</a>

					<a href="#" class="btn-google m-b-20">
						<img src="public/signup/images/icons/icon-google.png" alt="GOOGLE">
						Google
					</a>
					<div class="p-t-1 p-b-9">
						<span class="txt1">
							Họ Và Tên
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "fullname is required">
						<input class="input100" type="text" name="fullname" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-1 p-b-9">
						<span class="txt1">
							Tài Khoản
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Mật Khẩu
						</span>

						
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" >
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Email
						</span>
				
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Email is required">
						<input class="input100" type="email" name="email">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn m-t-1" style="margin-top: 30px;">
						<button class="login100-form-btn" name="signup">
							Đăng kí
						</button>
					</div>

					<div class="w-full text-center p-t-25" style="text-decoration: none;" >
						<span class="txt2">
							Bạn đã có tài khoản? 
						</span>

						<a href="index.php" class="txt2 " style="text-decoration: none; color: orange;">
							Đăng Nhập
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="public\signup\vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="public\signup\vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="public\signup\vendor/bootstrap/js/popper.js"></script>
	<script src="public\signup\vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="public\signup\vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="public\signup\vendor/daterangepicker/moment.min.js"></script>
	<script src="public\signup\vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="public\signup\vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="public\signup\js/main.js"></script>

</body>
</html>