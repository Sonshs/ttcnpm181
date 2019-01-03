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
						<div class="heading">Quản lý tài khoản</div>
								<?php
									$user_list = "SELECT * FROM `account` ORDER BY `account`.`No` ASC";
									$result = mysqli_query($db,$user_list);
									// echo '<script> alert("'.$findroom.'") </script>';
									$count = mysqli_num_rows($result);

									if ($count == true){
										echo "<table border='1' style=\"margin-top: 10px; margin-left: 14%;
										margin-right: 17%; overflow-y:scroll; height:200px; display:block;\">
										<tr>
										<th style=\"padding: 5px; background-color: #1da1f2\"><b>Stt</b></th>
										<th style=\"padding: 5px; background-color: #1da1f2\"><b>Tên TK</b></th>
										<th style=\"padding: 5px; background-color: #1da1f2\"><b>Chức năng</b></th>
										<th style=\"padding: 5px; background-color: #1da1f2\"><b>Mật khẩu</b></th>
										<th style=\"padding: 5px; background-color: #1da1f2\"><b>Khoa</b></th>
										<th style=\"padding: 5px; background-color: #1da1f2\"><b>Tên</b></th>
										<th style=\"padding: 5px; background-color: #1da1f2\">Năm sinh
										</tr>";

										while($row = mysqli_fetch_array($result))
										{	
											echo "<tr>";
											echo "<td style=\"padding: 5px;\" >" . $row['No'] . "</td>";
											echo "<td style=\"padding: 5px;\" >" . $row['username'] . "</td>";
											echo "<td style=\"padding: 5px;\" >" . $row['role'] . "</td>";
											echo "<td style=\"padding: 5px;\" >" . $row['password'] . "</td>";
											echo "<td style=\"padding: 5px;\" >" . $row['faculty'] . "</td>";
											echo "<td style=\"padding: 5px;\" >" . $row['name'] . "</td>";
											echo "<td style=\"padding: 5px;\" >" . $row['bird_year'] . "</td>";
											echo "</tr>";
										}
										echo "</table>";
									}
								?>
								<br>

								<div id="order" style=" padding-left: 20px; margin-top: 10px; width: 30%; display: inline;">
									Số thứ tự (No.)
									<input type="text" name="chonstt" style="width: 60px; margin-left: 30px;">
								</div>
								<p style="padding-left: 20px;"> Chọn hành động: </p>
								<p style=" margin-left: 5%;">
									<input type = "radio"
										name = "action"
										id = "suatk"
										value = "1"
										checked = "checked" style="padding-left: 20px;" />
									Sửa TK
									<input style="margin-left: 30px;" type = "radio"
										name = "action"
										id = "xoatk"
										value = "0" />
									Xoá TK
								</p>       
								<p></p>
								<button type="submit" name="timphong" style="margin-left: 20px;" class="btn btn-info taode">
									Xác nhận
								</button>
								<br>
								<?php
									if($_SERVER["REQUEST_METHOD"] == "POST") {
										$stt = mysqli_real_escape_string($db,$_POST['chonstt']);

										$findaccount = "SELECT * FROM account WHERE No = '$stt'";
										$result1 = mysqli_query($db,$findaccount);

										if (!empty($result1) && mysqli_num_rows($result1) == true){
											$row = mysqli_fetch_array($result1);
											$user = $row['username'];
											$role = $row['role'];
											$pwd = $row['password'];
											$flc = $row['faculty'];
											$name = $row['name'];
											$year = $row['bird_year'];
											$adm_query;

											$slt = $_POST['action'];
											// echo '<script> alert("'.$findroom.'") </script>';

											if ($slt == '0'){ // delete
												$adm_query = "DELETE FROM account WHERE user = '$username'";
												if (mysqli_query($db, $adm_query)){
													echo '<script> alert("Xoá tài khoản thành công !") </script>';
												}
												else{
													echo '<script> alert("Xoá tài khoản thất bại !") </script>';
												}
											}
											else{ //edit
												$_SESSION['info'] = $stt;
												$URL="http://localhost/bookingroom/chinhsua.php";
												echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
												echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
											}
										}
										else{
											echo '<script> alert("Không tìm thấy số hiệu, vui lòng kiểm tra lại !") </script>';	
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