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
	if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email'])) {
		$enter_login = $_POST['login'];
		$enter_password = md5(md5(md5($_POST['password'])));
		$enter_email = $_POST['email'];

		$enter_login = mysqli_real_escape_string($connection, $enter_login);
		$enter_password = mysqli_real_escape_string($connection, $enter_password);
		$enter_email = mysqli_real_escape_string($connection, $enter_email);
		
		$query = "INSERT INTO `users` (`login`, `password`, `email`) VALUES ('$enter_login', '$enter_password', '$enter_email')";

		$result = mysqli_query($connection, $query);
		$user = mysqli_fetch_assoc($result);

		if ($result == true) {
			$smsg = $config['signup_suc_msg'];
		} else {
			$fsmg = $config['signup_error_msg'];
		}
	}
	?>

	<div id="wrapper">
		<form id="main" action="signup.php" method="POST" style="margin-top: 5%;">
			<h2>Registration</h2>
			<?php if (isset($smsg)) { ?>
				<div class="alert alert-success" role="alert"><?php echo $smsg; ?></div>
				<script>
					window.location.replace("login.php");
				</script>
			<?php } ?>

			<?php if (isset($fsmg)) { ?>
				<div class="alert alert-danger" role="alert"><?php echo $fsmg; ?></div>
			<?php } ?>


			<input type="text" name="login" class="form-control" placeholder="Username" required><br>
			<input type="email" name="email" class="form-control" placeholder="Email" required><br>
			<input type="password" name="password" class="form-control" placeholder="Password" required><br>
			<button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
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