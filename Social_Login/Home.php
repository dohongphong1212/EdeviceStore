<?php
session_start();
if (!isset($_SESSION['logincust'])) {
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
	<title>Login with Facebook and Google | Home</title>
</head>
<style>
	html {
		height: 100%;
	}

	body {
		margin: 0;
		padding: 0;
		font-family: sans-serif;
		background: linear-gradient(#141e30, #243b55);
	}

	.login-box {
		position: absolute;
		top: 50%;
		left: 50%;
		width: 400px;
		padding: 40px;
		transform: translate(-50%, -50%);
		background: rgba(0, 0, 0, .5);
		box-sizing: border-box;
		box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
		border-radius: 10px;
	}

	.login-box h2 {
		margin: 0 0 30px;
		padding: 0;
		color: #fff;
		text-align: center;
	}

	.login-box .user-box {
		position: relative;
	}

	.login-box .user-box input {
		width: 100%;
		padding: 10px 0;
		font-size: 16px;
		color: #fff;
		margin-bottom: 30px;
		border: none;
		border-bottom: 1px solid #fff;
		outline: none;
		background: transparent;
	}

	.login-box .user-box label {
		position: absolute;
		top: 0;
		left: 0;
		padding: 10px 0;
		font-size: 16px;
		color: #fff;
		pointer-events: none;
		transition: .5s;
	}

	.login-box .user-box input:focus~label,
	.login-box .user-box input:valid~label {
		top: -20px;
		left: 0;
		color: #03e9f4;
		font-size: 12px;
	}

	.login-box form a {
		position: relative;
		display: inline-block;
		padding: 10px 20px;
		color: #03e9f4;
		font-size: 16px;
		text-decoration: none;
		text-transform: uppercase;
		overflow: hidden;
		transition: .5s;
		margin-top: 40px;
		letter-spacing: 4px
	}

	.login-box a:hover {
		background: #03e9f4;
		color: #fff;
		border-radius: 5px;
		box-shadow: 0 0 5px #03e9f4,
			0 0 25px #03e9f4,
			0 0 50px #03e9f4,
			0 0 100px #03e9f4;
	}

	.login-box a span {
		position: absolute;
		display: block;
	}

	.login-box a span:nth-child(1) {
		top: 0;
		left: -100%;
		width: 100%;
		height: 2px;
		background: linear-gradient(90deg, transparent, #03e9f4);
		animation: btn-anim1 1s linear infinite;
	}

	@keyframes btn-anim1 {
		0% {
			left: -100%;
		}

		50%,
		100% {
			left: 100%;
		}
	}

	.login-box a span:nth-child(2) {
		top: -100%;
		right: 0;
		width: 2px;
		height: 100%;
		background: linear-gradient(180deg, transparent, #03e9f4);
		animation: btn-anim2 1s linear infinite;
		animation-delay: .25s
	}

	@keyframes btn-anim2 {
		0% {
			top: -100%;
		}

		50%,
		100% {
			top: 100%;
		}
	}

	.login-box a span:nth-child(3) {
		bottom: 0;
		right: -100%;
		width: 100%;
		height: 2px;
		background: linear-gradient(270deg, transparent, #03e9f4);
		animation: btn-anim3 1s linear infinite;
		animation-delay: .5s
	}

	@keyframes btn-anim3 {
		0% {
			right: -100%;
		}

		50%,
		100% {
			right: 100%;
		}
	}

	.login-box a span:nth-child(4) {
		bottom: -100%;
		left: 0;
		width: 2px;
		height: 100%;
		background: linear-gradient(360deg, transparent, #03e9f4);
		animation: btn-anim4 1s linear infinite;
		animation-delay: .75s
	}

	@keyframes btn-anim4 {
		0% {
			bottom: -100%;
		}

		50%,
		100% {
			bottom: 100%;
		}
	}
</style>

<body>
	<div class="login-box">
		<h2>Login with <?php echo  $_SESSION["oauth_provider"] ?></h2>
		<form action="http://duan.test:8999/index.php?act=dangnhapgoogle" method="post">
			<div class="user-box">
				<input type="text" name="" required="" value=" <?php echo  $_SESSION['first_name'] ?>">
				<label>First name</label>
			</div>
			<div class="user-box">
				<input type="text" name="" required="" value=" <?php echo  $_SESSION['last_name'] ?>">
				<label>Last name</label>
			</div>
			<div class="user-box">
				<input type="text" name="" required="" value=" <?php echo  $_SESSION['email'] ?>">
				<label>Email</label>
			</div>

			<?php
			echo '<input type="hidden" name="user" value=' . $_SESSION['first_name'] . '>
			<input type="hidden" name="email" value=' . $_SESSION['email'] . '>
			<a href="">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<input style="font-size: 16px;
		text-decoration: none;
		text-transform: uppercase;
		overflow: hidden;background: #0F1925;color:#0BC8F4;border:0px" type="submit" value="Submit" name="dn">
		</a>
		
	';

			?>

		</form>
		<form method="post">
			<a href="" style="float:right;    position: absolute;
    right: 38px;
    bottom: 45px;">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<input class="btn btn-danger" style="font-size: 16px;
		text-decoration: none;
		text-transform: uppercase;
		overflow: hidden;background: #0F1925;color:#0BC8F4;border:0px;" type="submit" value="Logout" name="logoutsr">
			</a>
		</form>

	</div>
	<?php
	//load data
	// echo '
	// 		<table>
	// 			<tr>
	// 				<td><h2>Information Provider : </h2></td>
	// 				<td><h1 style="color:green;">' . $_SESSION['oauth_provider'] . '</h1></td>
	// 			</tr>
	// 			<tr>
	// 				<td><h2>Account ID : </h2></td>
	// 				<td><h1 style="color:green;">' . $_SESSION['oauth_uid'] . '</h1></td>
	// 			</tr>
	// 			<tr>
	// 				<td><h2>First Name : </h2></td>
	// 				<td><h1 style="color:green;">' . $_SESSION['first_name'] . '</h1></td>
	// 			</tr>
	// 			<tr>
	// 				<td><h2>Last Name : </h2></td>
	// 				<td><h1 style="color:green;">' . $_SESSION['last_name'] . '</h1></td>
	// 			</tr>
	// 			<tr>
	// 				<td><h2>Email : </h2></td>
	// 				<td><h1 style="color:green;">' . $_SESSION['email'] . '</h1></td>
	// 			</tr>
	// 		</table>';
	?>
	<?php
	include "../model/pdo.php";
	include "../model/taikhoan.php";
	// echo '<pre>';
	// print_r($_SESSION['email']);
	// echo '</pre>';
	$email = $_SESSION['email'];
	$name = $_SESSION['first_name'];
	$kt = Kiemtra_TkFB_DaTonTaiChua($email, $name);
	// echo "kq:".$kt;
	if ($kt == null) {
		insert_TKFB($email, $name);
	}
	?>
	<!-- <form action="http://duan.test:8999/index.php?act=dangnhapgoogle" method="post">
		<?php
		// echo '<input type="hidden" name="user" value=' . $_SESSION['first_name'] . '>
		// 	<input type="hidden" name="email" value=' . $_SESSION['email'] . '>
		// 	<input type="submit" value="login" name="dn">';
		?>

	</form> -->
	<!-- <form method="post">
		<input class="btn btn-danger" style="margin-top:5px;width:70px;height:35px;" type="submit" value="Logout" name="logoutsr" width="48" height="48">
	</form> -->
	<?php
	if (isset($_POST['dn'])) {

		header("Location: http://duan.test:8999/index.php?act=dangnhapgoogle");
	}

	if (isset($_POST['logoutsr'])) {
		session_unset();
		echo "<script type='text/javascript'>location.href = 'http://duan.test:8999/index.php?';</script>";
	}
	?>

</body>

</html>