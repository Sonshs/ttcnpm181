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
							<a href="welcomeadm.php" class="list-group-item">Trang Chủ</a>
							<a href="pheduyetphong.php" class="list-group-item">Phê duyệt phòng</a>
							<a href="quanlytaikhoan.php" class="list-group-item">Quản lý tài khoản</a>
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
						<div class="heading">Phê duyệt phòng</div>
							<br>
									<?php
										$user_list = "SELECT * FROM `request`";
										$result = mysqli_query($db,$user_list);
										// echo '<script> alert("'.$findroom.'") </script>';
										$count = mysqli_num_rows($result);
										if ($count == true){
											echo "<table border='1' style=\"margin-top: 10px; margin-left: 30%;\">
											<tr>
											<th style=\"padding: 5px; background-color: #1da1f2\"><b>No.</b></th>
											<th style=\"padding: 5px; background-color: #1da1f2\"><b>User</b></th>
											<th style=\"padding: 5px; background-color: #1da1f2\"><b>Action</b></th>
											<th style=\"padding: 5px; background-color: #1da1f2\"><b>Room</b></th>
											<th style=\"padding: 5px; background-color: #1da1f2\"><b>From</b></th>
											<th style=\"padding: 5px; background-color: #1da1f2\"><b>To</b></th>
											<th style=\"padding: 5px; background-color: #1da1f2\">Day
											</tr>";

											while($row = mysqli_fetch_array($result))
											{	
												echo "<tr>";
												echo "<td style=\"padding: 5px;\" >" . $row['No'] . "</td>";
												echo "<td style=\"padding: 5px;\" >" . $row['user'] . "</td>";
												echo "<td style=\"padding: 5px;\" >" . $row['action'] . "</td>";
												echo "<td style=\"padding: 5px;\" >" . $row['room'] . "</td>";
												echo "<td style=\"padding: 5px;\" >" . $row['from'] . "</td>";
												echo "<td style=\"padding: 5px;\" >" . $row['to'] . "</td>";
												echo "<td style=\"padding: 5px;\" >" . $row['day'] . "</td>";
												echo "</tr>";
											}
											echo "</table>";
											$findroom = '';
											// $_SESSION['founded'] = $findroom;
											unset($_SESSION['founded']);
										}
									?>
									<br>
								<div id="number" style=" padding-left: 20px; margin-top: 10px; width: 30%; display: inline;">
									Số thứ tự
									<input type="text" name="numberOrder" style="width: 60px; margin-left: 30px;">
								</div>
								<button type="submit" name="pheduyet" style="margin-left: 60px;" class="btn btn-info taode">
									Phê duyệt
								</button>
								<br>
								<?php
									if($_SERVER["REQUEST_METHOD"] == "POST") {
										$stt = mysqli_real_escape_string($db,$_POST['numberOrder']);

										$findrequest = "SELECT * FROM request WHERE No = '$stt'";
										$result1 = mysqli_query($db,$findrequest);

										if (!empty($result1) && mysqli_num_rows($result1) == true){
											$row = mysqli_fetch_array($result1);
											$user = $row['user'];
											$roomch = $row['room'];
											$time1 = $row['from'];
											$time2 = $row['to'];
											$weekday = $row['day'];
											$act = $row['action'];
											$timestring;
											$rsv_query;

											if ($act == '0'){
												$timestring = "t{$time1} = 0";
												for ($i=$time1+1; $i <= $time2 ; $i++) { 
													$timestring = $timestring.", t{$i} = 0";
												}
												$rsv_query = "DELETE FROM reserved WHERE user = '$user' and room = '$roomch' and day = '$weekday' and reserved.from = '$time1'";
											}
											else{
												$timestring = "t{$time1} = 1";
												for ($i=$time1+1; $i <= $time2 ; $i++) { 
													$timestring = $timestring.", t{$i} = 1";
												}
												$rsv_query = "INSERT INTO reserved (user, room, reserved.from, reserved.to, day) VALUES ('$user','$roomch','$time1','$time2','$weekday')";
											}

											// update to roominfo
											$updt_query = "UPDATE roomInfo SET ".$timestring." WHERE (room = '$roomch' and day = '$weekday')";

											// echo '<script> alert("'.$updt_query.'") </script>';

											// update reserved (at if condition)


											// delete request
											$rmv_query = "DELETE FROM `request` WHERE No = '$stt'";

											// do querry
											$qr1 = mysqli_query($db, $updt_query);
											$qr2 = mysqli_query($db, $rsv_query);
											$qr3 = mysqli_query($db, $rmv_query);

											if ($qr1 && $qr2 && $qr3){
												echo '<script> alert("Phê duyệt thành công !") </script>';
											}
											else{
												echo '<script> alert("Phê duyệt thất bại !") </script>';
											}
										}
										else{
											echo '<script> alert("Lỗi, vui lòng kiểm tra lại thông tin !") </script>';
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