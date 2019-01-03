<?php
	include("config.php");
	session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST") {
	// username and password sent from form 

		$myusername = mysqli_real_escape_string($db,$_POST['username']);
		$mypassword = mysqli_real_escape_string($db,$_POST['password']); 

		// $username = $_POST['username'];
		// $password = $_POST['password'];

		$sql = "SELECT * FROM account WHERE username = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($db,$sql);

		$count = mysqli_num_rows($result);

		// If result matched $myusername and $mypassword, table row must be 1 row

		if($count == true) {
			$_SESSION['login_user'] = $myusername;
			header("location: welcome.php");
		}else {
			echo '<script>
			alert("Tên đăng nhập hoặc mật khẩu không đúng!")
			</script>';
		}
	}
?> 


<html lang="en">
<head>
	<title>Đăng Nhập</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="Shortcut Icon" href="images/icon.png" type="image/x-icon"/>

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<!--   google font -->
	<link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Pinyon+Script' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<style type="text/css">
		label:after {
			content: ": ";
		}

		label {
			font-weight: bold;
			/*padding-left: 8px;*/
			/*margin-left: 4px;*/
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img class="logo" src="images/logo.png" alt="logo"></a>
			</div>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<div class="relative">
					<a class="headerButton bgRedButton" href="dangnhap.php">
						Đăng Nhập
					</a>
				</div>
			</div>
		</div>
	</nav>

	<!-- end header -->
	<div class="container-fluid content">    
		<div class="row">
			<div class="col-sm-2" style="display: inline; position: relative;">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">MENU</h3>
					</div>
					<div class="panel-body">
						<div class="list-group">
							<a href="welcome.php" class="list-group-item">Trang Chủ</a>
							<a href="#" class="list-group-item">Diễn Đàn</a>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Đào Tạo</h3>
					</div>
					<div class="panel-body">
						<div class="list-group">
							<a href="#" class="list-group-item">Tuyển Sinh</a>
							<a href="#" class="list-group-item">Lịch Học Vụ</a>            
						</div>
					</div>
				</div>
			</div>

			<div class="row container" style="">
				<div id="logInFrame" style="background-color: white;">
					<form action="dangnhap.php" id="login-form" method="POST">
						<div class="heading">
							Đăng nhập
						</div>
						<div class="row">
							<div class="left col-xs-12 col-sm-6 col-md-6">
								<label for="account">Tài khoản</label><br/>
								<input type="text" name="username" id="email" value="" placeholder="Username" required=/><br/>
								<label for="pass">Mật khẩu</label><br/>
								<input type="password" name="password" id="pass" placeholder="Password" required=/>
								<div style="padding-top: 10px;">
									<input style="width: 70px; background-color: #9abe36; color: white;" type="submit" name="login" value="Login" id="submit" />
									<button style="margin-left: 10px; width: 70px; background-color: #9abe36; color: white;"  name="signup" value="" id="signUp">
										Sign Up
									</button>
									<br><br>
									<a class="underline c39" href="#" style="margin-top: 10px;">
										Quên mật khẩu?</a>
								</div>
							</div>
							<div class="right col-xs-12 col-sm-6 col-md-6">
								<div style="text-align: center">
									<label class="connect">Connect with</label>
								</div style="align-content: center;">
								<button onclick="location.href='http://www.facebook.com';" 
								style="margin-left: 15%; font-weight: bold; width: 75%; height: 40px; background-color: #3b5998; color: white;">
									Facebook
								</button>
								<button onclick="location.href='http://www.twitter.com';" 
								style="margin-left: 15%; font-weight: bold; width: 75%; height: 40px; background-color: #1da1f2; color: white; margin-top: 7px;">
									Twitter
								</button>
								<button onclick="location.href='http://www.google.com';" 
								style="margin-left: 15%; font-weight: bold; width: 75%; height: 40px; background-color: #db3236; color: white; margin-top: 7px;">
									Google+
								</button>
							</div>
						</div>
					</form>  
				</div>
			</div>
		</div>
		</div>
	</div>

	<footer class="container-fluid" style="display: inline;">
		<div class="row" style="position: absolute; bottom: 0; 
			width: 100%; height: 80px;
			background-color: white; border: 1px solid red;">
			<div class="footer-img">
				<a class="navbar-brand" href="#"><img class="logo" src="images/bk-logo.png" alt="logo"></a>
			</div>
			<div class="contact" style="position: absolute; bottom: 0; 
				align-content: center; width: 100%;">
				<ul>
					<li><a href="">Contact us</a>  |  </li>
					<li><a href="">Service</a>  |  </li>
					<li><a href="">Help</a></li>
				</ul>
			</div>
		</div>
	</footer>
</body>
</html>