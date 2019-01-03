<?php
	include('session.php');

	$role_sql = mysqli_query($db, "select * from account where username = '$login_session'");
	$row = mysqli_fetch_array($role_sql);

	$role = $row['role'];
	
	if ($role == '1'){
		header("location:welcomeadm.php");
	}
	
?>

<html>
<head>
	<title>welcome</title>
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
		padding-left: 8px;
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
				<div class="relative" style="display:block;
				line-height: 25px; padding:0px; margin-top:5px;
				float:right; font-size:13px;">
					<a><b><?php echo $login_session; ?></b></a> 
					<br>
					<a href = "logout.php">Sign Out</a>
				</div>
			</div>
		</div>
	</nav>
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
							<a href="timphong.php" class="list-group-item">Tìm Phòng Trống</a>
							<a href="datphong.php" class="list-group-item">Đặt Phòng</a>
							<a href="huydatphong.php" class="list-group-item">Hủy Đặt Phòng</a>
							<a href="#.php" class="list-group-item">Diễn Đàn</a>
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

</html>