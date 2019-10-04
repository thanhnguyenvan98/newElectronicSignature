<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('images_login/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor_login/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('fonts_login/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('fonts_login/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor_login/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('vendor_login/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor_login/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor_login/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('vendor_login/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css_login/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css_login/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{asset('images_login/bg-01.jpg')}}');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Login
				</span>
				<center><?php 
					if (isset($error)) {
						# code...
						echo $error;
					}
				?></center>
				<form class="login100-form validate-form p-b-33 p-t-5" action="postLogin" method="post" >
					@csrf
					<div class="wrap-input100 validate-input" data-validate = "Không được để trống">
						<input class="input100" type="text" name="username" placeholder="Tên đăng nhập">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					

					<div class="wrap-input100 validate-input" data-validate="Không được để trống">
						<input class="input100" type="password" name="pass" placeholder="Mật khẩu">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					@if(isset($data))
						<div class="container-login100-form-btn m-t-32" style="color: red">
							{{$data['error']}}
						</div>
					@endif
					
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" type="submit">
							Đăng nhập
						</button>
						<a href="#" class="login100-form-btn" style="margin-left: 10px">Đăng ký</a>
					</div>

					

					
					
				</form>

			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{asset('vendor_login/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('vendor_login/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('vendor_login/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('vendor_login/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('vendor_login/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('vendor_login/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('vendor_login/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('vendor_login/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('js_login/main.js')}}"></script>

</body>
</html>