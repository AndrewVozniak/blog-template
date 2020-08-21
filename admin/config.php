<?php include "../includes/config.php"; ?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php include "../includes/head.php" ?>
	</head>
	<body>


		<!-- Wrapper -->
		<div id="wrapper">

			<!-- Header -->
			<?php 
				include '../includes/header.php';
			?>
		
			<!-- Main -->
			<div id="main">

				<?php if (!isset($_SESSION['user']) OR $_SESSION['user']['admin'] == 0) { ?>
					<a class="button big fit" href="/">На головну</a>

					<!-- Перевірка на Адміністратора -->
				<?php } elseif(isset($_SESSION['user']) AND $_SESSION['user']['admin'] == 1) { 
					// Global
					$global_get = mysqli_query($connection, "SELECT * FROM `about`");
					$global =mysqli_fetch_assoc($global_get)
					?>

					<!-- Обробка форми About Me  -->
					<?php if (isset($_POST['contacts']) && !empty($_POST['about'])) { 

					$about = mysqli_real_escape_string($connection, $_POST['about']);
					$query = mysqli_query($connection, "UPDATE `about` SET `text`='$about'");

					if ($query) { ?>
						<!-- Переадресація -->
						<script>
							window.location.replace('../admin/config.php')
						</script>
					<?php } else {
						echo "Помилка!";
						} 
					} ?>

					<?php 
					// Обробка форми contacts
					if(isset($_POST['contacts']) && !empty($_POST['contacts'])) {

					$contacts = mysqli_real_escape_string($connection, $_POST['contacts']);
					$query = mysqli_query($connection, "UPDATE `about` SET `contacts`='$contacts'");

					if ($query) { ?>
						<script>
							window.location.replace('../admin/config.php')
						</script>
					<?php } else {
						echo "Помилка!";
					} } ?>

					<!-- Форми -->
					<form method="POST" >
						<h1 style="text-align: center;">About Me</h1>
						<textarea name="about" cols="20" rows="10"><?php echo $global['text']; ?></textarea>
						<hr>		

						<h1 style="text-align: center;">Contacts</h1>
						<textarea name="contacts" cols="20" rows="10"><?php echo $global['contacts']; ?></textarea>							
						<button class="button big fit" name="save">Зберегти</button>
					</form>


				<?php } ?>

			</div>	

			<!-- Sidebar -->
			<?php include "../includes/sidebar.php"; ?>

		</div>
	</body>
</html>