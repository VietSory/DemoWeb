<!DOCTYPE html>
<html lang="en">
<head>
	<title>Name Email</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="public\login\images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public\login\vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public\login\fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public\login\fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public\login\vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="public\login\vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public\login\vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public\login\vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="public\login\vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public\login\css/util.css">
	<link rel="stylesheet" type="text/css" href="public\login\css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<!-- LOGO -->
				
	<div class="limiter">
		<div class="container-login100" style="background-image: url('public/login/images/bg-01.jpg');">

			<div class="logo-box col-lg-12"  style="float: right;">
					<a href="../Shopping/index.php" class="logo text-center logo-light" >                      
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-light">S</span> -->
                            <img src="public\admin/images/logo.png" alt="" height="45px">
                        </span>
                    </a>
                </div>
			<div class="wrap-login100 p-l-40 p-r-40 p-t-65 p-b-54" >
				<form class="login100-form validate-form" action="index.php" method="post">
				<?php
					if (isset($_GET['status']) && $_GET['status']=='success' )
					{
						echo '<span style="color: green;" >
								Bạn Đã đổi mật khẩu thành công,hãy quay lại trang đăng nhập !
							</span>';
					}
				?>
					<span class="login100-form-title p-b-49" >
						Account
					</span>

					<?php
						if (isset($_GET['status']) && $_GET['status']=='fail' )
							{
								echo '<span style="color: red;" >
										*Bạn Đã nhập sai email hoặc tên email
									</span>';
							}
					?>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Email đã đăng kí</span>
						<input class="input100" type="text" name="mail" placeholder="Nhập email đã đăng kí">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					
					<div class="text-right p-t-8 p-b-31">
						<a href="index">
							Đăng nhập
						</a>
					</div>
					
					<div class="container-login100-form-btn" style="margin-bottom: 20px;">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="check">
								Gửi email
							</button>
						</div>
					</div>

					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>

					<div class="flex-col-c p-t-20">
						</span>

						<a href="index?act=signup" class="txt2">
							Đăng kí
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="public\login\vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="public\login\vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="public\login\vendor/bootstrap/js/popper.js"></script>
	<script src="public\login\vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="public\login\vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="public\login\vendor/daterangepicker/moment.min.js"></script>
	<script src="public\login\vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="public\login\vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="public\login\js/main.js"></script>

</body>
</html>
<?php
?>
