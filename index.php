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
		
			<!-- Main -->
			<div id="main">

				<!-- Post -->
				<article class="post">
					<?php 
						$article_get = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `pubdate` DESC LIMIT 0,3");
						include "includes/getArticles.php";
					?>
				</article>

				</div>	

				<!-- Sidebar -->
				<?php include "includes/sidebar.php"; ?>

			</div>
	</body>
</html>