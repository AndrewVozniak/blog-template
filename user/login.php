<?php 
include "../includes/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "../includes/head.php"; ?>
</head>
<body>
	<?php include "../includes/header.php"; ?>


	<?php 
	if (isset($_POST['login']) and isset($_POST['password'])) {
		$enter_login = $_POST['login'];
		$enter_password =md5(md5(md5($_POST['password'])));

		$enter_login = mysqli_real_escape_string($connection, $enter_login);
		$enter_password = mysqli_real_escape_string($connection, $enter_password);

		$query = "SELECT * FROM `users` WHERE `login` = '$enter_login' and `password` = '$enter_password'";

		$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
		$count = mysqli_num_rows($result);

		$user = mysqli_fetch_assoc($result);

		if ($count == 1) {
			$_SESSION['user'] = $user;?>
			<script>
				window.location.replace("/");
			</script>

		<?php } else {
			$fmsg = $config['login_error_msg'];
		}
	}
	?>

	<div id="wrapper">
		<form id="main" method="POST" style="margin-top: 5%; margin-bottom: 5%;">
			<h2>Login</h2>
			<?php if (isset($fmsg)) { ?>
				<div class="alert alert-danger" role="alert"><?php echo $fmsg; ?></div>
			<?php } ?>


			<input type="text" name="login" class="form-control" placeholder="Username" required><br>
			<input type="password" name="password" class="form-control" placeholder="Password" required><br>
			<button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
		</form>
	</div>

	<div id="wrapper">
		<style>
			#footer {
				min-width: 100%;
			}
		</style>
		<?php include "../includes/footer.php";?>
	</div>
</body>
</html>