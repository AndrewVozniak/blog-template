<?php include "../../includes/config.php"; ?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php include "../../includes/head.php" ?>
	</head>
	<body>

		<!-- Wrapper -->
		<div id="wrapper">

			<!-- Header -->
			<?php 
				include '../../includes/header.php'; 
			?>

			<!-- Main -->
			<div id="main">

				<!-- Post -->
				<article class="post">
					<?php 
						if (isset($_GET['id']) && !empty($_GET['id'])) {
							// Article Get
							$article_get = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id']);

							if (mysqli_num_rows($article_get) == 0) {
								echo "<body> <h3>Уууупс, я нічого не найшов</h3> </body>";
								include "../../includes/sidebar.php";
							} else {
							$article = mysqli_fetch_assoc($article_get);

							// Обробник коментарів
							if (isset($_POST['Post_Comment']) && !empty($_POST['text'])) {
								$article_id = (int) $_GET['id'];
								$author_id = $_SESSION['user']['id'];
								$text = $_POST['text'];

								$article_id = mysqli_real_escape_string($connection, $article_id);
								$author_id = mysqli_real_escape_string($connection, $author_id);
								$text = mysqli_real_escape_string($connection, $text);

								$query = mysqli_query($connection, "INSERT INTO `comments`(`author_id`, `article_id`, `text`) VALUES ($author_id, $article_id, '$text')");
								if ($query) {
									$msg = "Коментарій успішно добавлений!";
									$comments_get = mysqli_query($connection, "SELECT * FROM `comments` WHERE `article_id` = " . (int) $_GET['id']); 
								} else {
									$msg = "Помилочка...";
								}
							}

							// +1 view
							mysqli_query($connection, "UPDATE `articles` SET `views` = `views` + 1  WHERE `id` = " . (int) $_GET['id']); ?>

								<header>
									<div class="title">
										<h2><a href="?id=<?php echo $article['id']?>"><?php echo $article['title'] ?></a></h2>
									</div>
									<div class="meta">

										<span class="author">
											<span class="name">
												<strong>
													<?php echo $article['categorie'] ?>
												</strong>
											</span>
										</span>

										<time><?php echo $article['pubdate'] ?></time>
									</div>
								</header>



								<body>
									<a style="max-width: 70%; text-align: center; margin-left: auto; margin-right: auto;" href="?id=<?php echo $article['id']?>" class="image featured">
										<img src="../../../../images/article/<?php echo $article['image'] ?>" alt=""/>
									</a>

									<p class="text"><strong><?php echo $article['text'] ?></strong></p>
									<hr>
								</body>

								<?php if (isset($_SESSION['user'])) { ?>
									<footer>
										<ul class="actions" id="comments">
											<?php 
												if (isset($msg)) {
													echo "<strong>" . $msg . "</strong>"; ?>
													
													<script>
														window.location.replace('?id=<?php echo $article['id']?>')
													</script>
												<?php }
											?>
											<form action="index.php?id=<?php echo $_GET['id']; ?>" method="POST">
												<button type="submit" name="Post_Comment" style="outline: none; margin-bottom: 10px;">Залишити коментар</button>
												<input type="text" name="text" placeholder="Введіть щось ;)" required>
												<hr>
											</form>
										</ul>
									</footer>
								<?php } else { ?>
									<footer>
										<ul class="actions">
											Для того щоб залишити коментар увійдіть у свій акаунт
										</ul>
									</footer>									
								<?php } ?>


								

								<div class="comments">
									<strong>Коментарі:</strong>
									
									<!-- Get comments -->
									<?php 
										$comments_get = mysqli_query($connection, "SELECT * FROM `comments` WHERE `article_id` = " . (int) $_GET['id']);
										if (mysqli_num_rows($comments_get) == 0) {
											echo "<br>Коментарів немає, можеш стати першим!";
										} else { 
											while ($comment = mysqli_fetch_assoc($comments_get)) {
											$author_get = mysqli_query($connection, "SELECT `login` FROM `users` WHERE `id` = " . (int) $comment['author_id']);
											$author = mysqli_fetch_assoc($author_get)?>
												<hr>
													<article>
														<header>
															<ul class="actions" style="padding-right: 40px; margin-bottom: 15px;">
																<li>Автор: <?php echo $author['login']; ?></li>
																<li style="float: right;">Дата публікації: <?php echo $comment['pubdate']; ?></li>
															</ul>
														</header>
														
														<body>
															<strong><?php echo $comment['text']; ?></strong>							
														</body>
													</article>
												<hr>
										<?php } }
									?>									
								</div>

				</article>


				<?php include "../../includes/footer.php"; } ?>	
					<?php
						} else {
							echo "<body> <h3>Мдаа... помилочка получилась. Хтось сьогодні знову не буде спати і виправляти баги</h3> </body>";
							include "../../includes/sidebar.php";
						}
					?>
				
			</div>
		</div>
	</body>
</html>