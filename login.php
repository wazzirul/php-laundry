<?php
if (!isset($_SESSION)) {session_start();}
include 'conn/conn.php';
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
	$q = mysqli_query($conn,"SELECT * from tbl_akun where username = '".$username."'");
	$data = mysqli_fetch_array($q);
	$status = $data['status'];
	if ($status == "superadmin") {
		header("location:index.php");
	}else if($status == "admin"){
		header("location:index.php");
	}
}
?>
<html>
<head>
	<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div id="box">
		<form action="conn/do_login.php" method="post">
			<table>
				<tr><th>FORM LOGIN</th></tr>
				<tr><th><input type="text" required name="username" placeholder="username"></input></th></tr>
				<tr><th><input type="password" required name="password" placeholder="***********"></input></th></tr>
				<tr><th><input type="submit" name="btn-submit" value="login"></input></th></tr>
			</table>
		</form>
	</div>
</body>
</html>