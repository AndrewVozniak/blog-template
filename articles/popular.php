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

				<!-- Post -->
				<article class="post">
				<h1 style="text-align: center;">Popular articles</h1>
					<?php 
						$article_get = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `views` DESC");
						include "../includes/getArticles.php";
					?>
				</article>
			</div>	
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