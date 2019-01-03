<?php
	include('session.php');
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
						<form action="#" id="login-form" method="POST">
							<div class="heading">Danh Sách Phòng Trống</div>
								<br>
									<div id="coso" style=" padding-left: 20px; margin-top: 10px; width: 30%; display: inline;">
										Cơ sở
										<select name="choncoso" id="choncoso" style="margin-left: 30px; width: 40px;">
											<option value="1">1</option>
											<option value="2">2</option>
										</select> 
									</div>
									<div id="thu" style="margin-left: 50%; position: relative; display: inline; width: 30%; margin-left: 30%;">
										Thứ
										<select name="chonthoigian" id="chonthoigian" style="margin-left: 55px; width: 40px;">
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
										</select>
									</div>
									<br>
									<br>
									<div id="tutiet" style="padding-left: 20px; margin-top: 30px; width: 30%; display: inline;">
										Từ tiết
										<select name="chontiet1" id="chontiet1" style="margin-left: 30px; width: 40px;">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
										</select>
									</div>
									<div id="dentiet" style="margin-left: 50%; position: relative; display: inline; width: 30%; margin-left: 30%;">
										Đến tiết
										<select name="chontiet2" id="chontiet2" style="margin-left: 30px; width: 40px;">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
										</select>
									</div><p></p>
									<button type="submit" name="timphong" style="margin-left: 20px;" class="btn btn-info taode">
										Tìm phòng
									</button>
									<br>
									<?php
										if($_SERVER["REQUEST_METHOD"] == "POST") {
											$location = mysqli_real_escape_string($db,$_POST['choncoso']);
											$weekday = mysqli_real_escape_string($db,$_POST['chonthoigian']);
											$strtime1 = mysqli_real_escape_string($db,$_POST['chontiet1']);
											$strtime2 = mysqli_real_escape_string($db,$_POST['chontiet2']);
											$time1 = (int)$strtime1;
											$time2 = (int)$strtime2;

											if ($time1 > $time2) {
												echo '<script>
												alert("Tiết BẮT ĐẦU không được nhỏ hơn tiết KẾT THÚC!!")
												</script>';
											}
											else{
												$timestring = " AND t{$time1} = 0";
												for ($i=$time1+1; $i <= $time2 ; $i++) { 
													$timestring = $timestring." AND t{$i} = 0";
												}

												$findroom = "SELECT roomInfo.room FROM (roomInfo INNER JOIN rooms ON roomInfo.room = rooms.room) WHERE location = '$location' AND day = '$weekday' ".$timestring." ORDER BY `roomInfo`.`room` ASC";
												$_SESSION['founded'] = $findroom;

												$URL="http://localhost/bookingroom/timphong2.php";
												echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
												echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

											}
										}
									?>
							</div> 
						</form>  
					</div>
				</div>
			</div>
			</div>
		</div>

		<footer class="footer" style="display: inline;">
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