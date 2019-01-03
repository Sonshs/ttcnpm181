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

				<div class="row container" style=";">
					<div id="logInFrame" style="background-color: white;">
						<form action="#" id="login-form" style="margin-top: 13px;" method="POST">
							<div class="heading">Danh sách phòng đã đặt của bạn</div>
								<div class="left col-xs-12 col-sm-6 col-md-6">
									<br> Phòng đã duyệt
									<?php
										$user_list = "SELECT * FROM `reserved` WHERE user='$login_session' ORDER BY `user` ASC";
										$result = mysqli_query($db,$user_list);
										// echo '<script> alert("'.$findroom.'") </script>';
										$count = mysqli_num_rows($result);
										if ($count == true){
											echo "<table border='1' style=\"margin-top: 10px; margin-left: 20%;\">
											<tr>
											<th style=\"padding: 5px; background-color: #1da1f2\"><b>Room</b></th>
											<th style=\"padding: 5px; background-color: #1da1f2\"><b>From</b></th>
											<th style=\"padding: 5px; background-color: #1da1f2\"><b>To</b></th>
											<th style=\"padding: 5px; background-color: #1da1f2\">Day
											</tr>";

											$index = 0;
											while($row = mysqli_fetch_array($result))
											{	
												$index = $index+1;
												echo "<tr>";
												echo "<td style=\"padding: 5px;\" id = 'rm" . $index . "'>" . $row['room'] . "</td>";
												echo "<td style=\"padding: 5px;\" id = 'rm" . $index . "'>" . $row['from'] . "</td>";
												echo "<td style=\"padding: 5px;\" id = 'rm" . $index . "'>" . $row['to'] . "</td>";
												echo "<td style=\"padding: 5px;\" id = 'rm" . $index . "'>" . $row['day'] . "</td>";
												echo "</tr>";
											}
											echo "</table>";
											$findroom = '';
											// $_SESSION['founded'] = $findroom;
											unset($_SESSION['founded']);
										}
									?>
								</div>
								<div class="right col-xs-12 col-sm-6 col-md-6">
									<br> Phòng đang chờ duyệt
									<?php
										$user_listr = "SELECT * FROM `request` WHERE user='$login_session'";
										$resultr = mysqli_query($db,$user_listr);
										$countr = mysqli_num_rows($resultr);
										if ($countr == true){
											echo "<table border='1' style=\"margin-top: 10px; margin-left: 15%;\">
											<tr>
											<th style=\"padding: 5px; background-color: #1da1f2\"><b>Room</b></th>
											<th style=\"padding: 5px; background-color: #1da1f2\"><b>From</b></th>
											<th style=\"padding: 5px; background-color: #1da1f2\"><b>To</b></th>
											<th style=\"padding: 5px; background-color: #1da1f2\"><b>Day</b></th>
											<th style=\"padding: 5px; background-color: #1da1f2\">Action
											</tr>";

											while($row = mysqli_fetch_array($resultr))
											{	
												echo "<tr>";
												echo "<td style=\"padding: 5px;\" >".$row['room']."</td>";
												echo "<td style=\"padding: 5px;\" >".$row['from']."</td>";
												echo "<td style=\"padding: 5px;\" >".$row['to']."</td>";
												echo "<td style=\"padding: 5px;\" >".$row['day']."</td>";
												echo "<td style=\"padding: 5px;\" >".$row['action']."</td>";
												echo "</tr>";
											}
											echo "</table>";
											$findroom = '';
											// $_SESSION['founded'] = $findroom;
											unset($_SESSION['founded']);
										}
									?>
								</div>
						</form>
						<form action="#" method="POST">
							<div class="container">
									<div class = "center">
										<div id="phong" style=" padding-left: 20px; margin-top: 10px; width: 30%; display: inline;">
											Phòng
											<input type="text" name="chonphong" style="width: 60px; margin-left: 30px;">
										</div>
										<div id="thu" style="margin-left: 10%; position: relative; display: inline; width: 30%;">
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
										<div id="bang" style="margin-left: 10%; position: relative; display: inline; width: 30%;">
											Bảng:
											<select name="chonbang" id="chonbang" style="margin-left: 55px; width: 100px;">
												<option value="duyet">Đã duyệt</option>
												<option value="choduyet">Chờ duyệt</option>
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
										<div id="dentiet" style="margin-left: 12%; position: relative; display: inline; width: 30%;">
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
											Huỷ đặt phòng
										</button>
										<br>
										<?php
											if($_SERVER["REQUEST_METHOD"] == "POST") {
												$roomch = strtoupper(mysqli_real_escape_string($db,$_POST['chonphong']));
												$weekday = mysqli_real_escape_string($db,$_POST['chonthoigian']);
												$tabl = mysqli_real_escape_string($db,$_POST['chonbang']);
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
													if ($tabl == "duyet"){
														$findroomd = "SELECT * FROM reserved WHERE user='$login_session' and room = '$roomch' AND day = '$weekday' and reserved.from='$time1' and reserved.to = '$time2'";
														// echo '<script> alert("'.$findroomd.'") </script>';
														$result1 = mysqli_query($db,$findroomd);
														$count1 = mysqli_num_rows($result1);
														if (!empty($result1) && $count1 == true){
															$reg0 = "INSERT INTO request ( request.room, request.from, request.to, request.user, request.day, request.action ) VALUES ('$roomch','$time1','$time2','$login_session','$weekday','0')";
															if (mysqli_query($db,$reg0) == true){
																echo '<script>
																alert("Đăng ký Huỷ phòng thành công !")
																</script>';
															}
															else{
																echo '<script>
																alert("Đăng ký Huỷ phòng thất bại !")
																</script>';
															}
														}
														else{
															echo '<script>
																alert("Thông tin không chính xác, vui lòng kiểm tra !")
																</script>';
														}
													}
													else{
														$findrqt = "SELECT request.No FROM request WHERE user='$login_session' and room = '$roomch' AND day = '$weekday' and request.from='$time1' and request.to = '$time2' and action = '1'";
														$result2 = mysqli_query($db,$findrqt);
														// echo '<script> alert("'.$findrqt.'") </script>';
														if (!empty($result2) && mysqli_num_rows($result2) == true){
															$row = mysqli_fetch_array($result2);
															$reg1 = "DELETE FROM `request` WHERE request.No = '".$row['No']."'";
															echo '<script> alert("'.$reg1.'") </script>';
															if (mysqli_query($db,$reg1) == true){
																echo '<script>
																alert("Huỷ chờ đặt thành công !")
																</script>';
															}
															else{
																echo '<script>
																alert("Huỷ chờ đặt thất bại !")
																</script>';
															}
														}
														else{
															echo '<script>
																alert("Thông tin không chính xác, vui lòng kiểm tra !")
															</script>';
														}
													}
												}
											}
										?>
									</div>
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