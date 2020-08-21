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
					<h1 style="text-align: center;">Search</h1>
					<?php 
						$user_text = mysqli_real_escape_string($connection, $_GET['query']);
						$result_get = mysqli_query($connection, "SELECT * FROM `articles` WHERE `title` LIKE '%$user_text%' ORDER BY `title` DESC");
						if (mysqli_num_rows($result_get) == 0 OR !isset($_GET['query']) OR empty($_GET['query'])) {
							echo '<strong style="text-align: center; margin-left: auto; margin-right: auto;">Я нічого не найшов :(</strong> </article></div>';
							include "includes/sidebar.php";
						} else {
							while ($result = mysqli_fetch_assoc($result_get)) {?>
								<article class="post">
									<header>
										<div class="title">
											<h2><a href="../articles/main/?id=<?php echo $result['id']?>"><?php echo $result['title'] ?></a></h2>
											<p><?php echo $result['description'] ?></p>
										</div>
										<div class="meta">
											<time class="published"><?php echo $result['pubdate'] ?></time>
											<a href="../articles/main/?id=<?php echo $result['id']?>" class="author"><span class="name"><?php echo $result['categorie'] ?></span></a>
										</div>
									</header>
									<a href="../articles/main/?id=<?php echo $result['id']?>" class="image featured"><img src="../../../../images/article/<?php echo $result['image'] ?>" alt="" /></a>
									<p><?php echo $result['description'] ?></p>
									<footer>
										<ul class="actions">
											<li><a href="../articles/main/?id=<?php echo $result['id']?>" class="button big">Continue Reading</a></li>
										</ul>
										<ul class="stats">
											<li><a href="../articles/main/?id=<?php echo $result['id']?>" class="icon fa-eye"><?php echo $result['views']?></a></li>
										</ul>
									</footer>
								</article>
							<?php }
						}
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
				<?php include "includes/footer.php";?>
			</div>
	</body>
</html>

