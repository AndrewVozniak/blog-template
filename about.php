<?php include "includes/config.php"; ?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php include "includes/head.php" ?>
	</head>
	<body>


		<!-- Wrapper -->
		<div id="wrapper">

			<!-- Header -->
			<?php 
				include 'includes/header.php';
			?>
			<?php
				$about_get = mysqli_query($connection, "SELECT * FROM `about`");
				$about = mysqli_fetch_assoc($about_get);
			?>
			<!-- Main -->
			<div id="main">

				<!-- Post -->
				<article class="post">
					<div id="about">
						<h1 style="text-align: center;">Про мене</h1>
						<hr>
						<p style="font-size: 19px;"><?php echo $about['text']; ?></p>
					</div>

					<hr>
					<div id="contacts">
						<h1 style="text-align: center;">Контакти</h1>
						<p style="font-size: 19px;"><?php echo $about['contacts']; ?></p>
					</div>
				</article>

			</div>	
		</div>


		<div id="wrapper">
			<style>
				#footer {
					min-width: 100%;
				}
			</style>
			<?php include "includes/footer.php";?>
		</div>
	</body>
</html>