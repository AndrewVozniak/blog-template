<?php include "../includes/config.php"; ?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php include "../includes/head.php" ?>
	</head>
	<body>

		<!-- Wrapper -->
		<div id="wrapper">

			<!-- Header and SideBar -->
			<?php 
				include '../includes/header.php';
			?>


			<!-- Main -->
			<div id="main">
				<!-- Post -->
				<article class="post">
				<h1 style="text-align: center;">WORKS</h1>
					<?php 
						$works_get = mysqli_query($connection, "SELECT * FROM `works` WHERE `status` = 0 ORDER BY `pubdate` DESC");
						while ($work = mysqli_fetch_assoc($works_get)) {?>
							<div style="border-width: 1px; border-color: #000;">
								<hr>
								<a href="<?php echo $work['link']; ?>" class="image featured" style="max-width: 15%;">
									<img class="image featured" src="../images/works/<?php echo $work['image']; ?>" alt="">
									<a href="<?php echo $work['link']; ?>"><h3 class="title"><?php echo $work['description']; ?></h3></a>
								</a>
								<span style="float: right; margin-top: -15%;">
									<a href="<?php echo $work['link']; ?>"><h3 class="title"><?php echo $work['title']; ?></h3></a>
									<a href="<?php echo $work['link']; ?>"><p class="pubdate"><?php echo $work['pubdate']; ?></p></a>
								</span>
								<hr>
							</div>
						<?php 
						}
					?>
				</article>
			</div>

			<?php include "../includes/sidebar.php";?>	
		</div>

</html>