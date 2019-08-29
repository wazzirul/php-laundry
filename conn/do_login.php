<?php
if (isset($_POST['btn-submit'])) {
	session_start();
	include 'conn.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$q = mysqli_query($conn,"SELECT * from tbl_akun where username='".$username."' and password='".md5($password)."'");
	$r = mysqli_num_rows($q);
	if ($r > 0) {
		$data = mysqli_fetch_array($q);
		$_SESSION['username'] = $data['username'];
		$_SESSION['status'] = $data['status'];
		$status = $data['status'];
		if ($status == "admin") {
			header("location:../index.php");
		}elseif ($status == "superadmin") {
			header("location:../index.php");
		}elseif ($status == "member") {
			header("location:../index.php");
		}
	}else{
	?>
	<script type="text/javascript">
		alert("username dan password salah");
	</script>
	<?php
	header("location:../login.php");
	}
}else{
	header("location:../login.php");
}
?>