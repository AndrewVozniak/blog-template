<?php include "includes/config.php"; ?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php include "includes/head.php" ?>
	</head>
	<body>

		<!-- Wrapper -->
		<div id="wrapper">

			<!-- Header and SideBar -->
			<?php 
				include 'includes/header.php';
			?>


			<!-- Main -->
			<div id="main">
				<!-- Post -->
				<article class="post">
				<h1 style="text-align: center;">News</h1>
					<?php 
						$news_get = mysqli_query($connection, "SELECT * FROM `news` ORDER BY `pubdate` DESC");
						while ($news = mysqli_fetch_assoc($news_get)) {?>
							<div style="border-width: 1px; border-color: #000;">
								<hr>
								<a href="<?php echo $news['link']; ?>" class="image featured" style="max-width: 15%;">
									<img class="image featured" src="images/news/<?php echo $news['image']; ?>" alt="">
								</a>
								<span style="float: right; margin-top: -20%;">
									<a href="<?php echo $news['link']; ?>"><h3 class="title"><?php echo $news['title']; ?></h3></a>
									<a href="<?php echo $news['link']; ?>"><p class="pubdate"><?php echo $news['pubdate']; ?></p></a>
								</span>
								<hr>
							</div>
						<?php 
						}
					?>
				</article>
			</div>

			<?php include "includes/sidebar.php";?>	
		</div>

</html>