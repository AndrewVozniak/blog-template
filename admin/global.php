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
					<!-- Sidebar -->
					<?php include "../includes/sidebar.php"; ?>

				<?php } elseif(isset($_SESSION['user']) AND $_SESSION['user']['admin'] == 1) { ?>

					<!-- Search -->
					<form action="main/edit.php" method="GET">

						<h3>Пошук</h3>

						<!-- Users -->
						<input type="text" name="users" placeholder="ID користовача">
						<hr>

						<!-- Comments -->
						<input type="text" name="comments" placeholder="ID коментарія">
						<hr>

						<!-- Articles -->
						<input type="text" name="articles" placeholder="ID статті">
						<hr>

						<button type="submit">Шукати</button>
							
					</form>


					<!-- Форми -->

					<!-- Users Table -->
					<h2>Користувачі</h2>
					<form id="users">
						<section>
							<?php 
								$users_get = mysqli_query($connection, "SELECT `id`, `login`, `email`, `create_time`, `admin` FROM `users`") ?>
									<table>
										<thead>
											<tr>
												<th>ID</th>
												<th>Login</th>
												<th>Email</th>
												<th>Create Time</th>
												<th>Admin</th>
											</tr>
										</thead>
										<tbody>
										<?php while ($user = mysqli_fetch_assoc($users_get)) { ?>
											<tr>
												<a href="<?php echo $user['id']; ?>" >
													<td><input type="text" value="<?php echo $user['id']; ?>" required></td>
													<td><input type="text" value="<?php echo $user['login']; ?>" required></td>
													<td><input type="text" value="<?php echo $user['email']; ?>" required></td>
													<td><input type="text" value="<?php echo $user['create_time']; ?>" required></td>
													<td><input type="text" value="<?php echo $user['admin']; ?>" required></td>
													<td><a href="main/edit.php?users=<?php echo $user['id']; ?>" class="button">Редагувати</a></td>
												</a>
											</tr>
										</tbody>
								<?php }
							?>
								</table>
						</section>
					</form>


					<hr>
					<h2>Статті</h2>

					<!-- Articles Table -->
					<form id="articles">
						<section>
							<?php 
								$articles_get = mysqli_query($connection, "SELECT `id`, `title`, `description`, `pubdate` FROM `articles`") ?>
									<table>
										<thead>
											<tr>
												<th>ID</th>
												<th>Title</th>
												<th>Description</th>
												<th>PubDate</th>
											</tr>
										</thead>
										<tbody>
										<?php while ($article = mysqli_fetch_assoc($articles_get)) { ?>
											<tr>
												<td><input type="text" value="<?php echo $article['id']; ?>" required></td>
												<td><input type="text" value="<?php echo $article['title']; ?>" required></td>
												<td><input type="text" value="<?php echo $article['description']; ?>" required></td>
												<td><input type="text" value="<?php echo $article['pubdate']; ?>" required></td>
												<td><a href="main/edit.php?articles=<?php echo $article['id']; ?>" class="button">Редагувати</a></td>
											</tr>
										</tbody>
								<?php }
							?>
								</table>
						</section>
					</form>	

					<hr>
					<h2>Новини</h2>

					<!-- News Table -->
					<form id="news">
						<section>
							<?php 
								$news_get = mysqli_query($connection, "SELECT * FROM `news`") ?>
									<table>
										<thead>
											<tr>
												<th>ID</th>
												<th>Title</th>
												<th>Link</th>
												<th>PubDate</th>
											</tr>
										</thead>
										<tbody>
										<?php while ($news = mysqli_fetch_assoc($news_get)) { ?>
											<tr>
												<td><input type="text" value="<?php echo $news['id']; ?>" required></td>
												<td><input type="text" value="<?php echo $news['title']; ?>" required></td>
												<td><input type="text" value="<?php echo $news['link']; ?>" required></td>
												<td><input type="text" value="<?php echo $news['pubdate']; ?>" required></td>
												<td><a href="main/edit.php?news=<?php echo $news['id']; ?>" class="button">Редагувати</a></td>
											</tr>
										</tbody>
								<?php }
							?>
								</table>
						</section>
					</form>

					<hr>
					<h2>Роботи</h2>

					<!-- Works Table -->
					<form id="news">
						<section>
							<?php 
								$works_get = mysqli_query($connection, "SELECT * FROM `works`") ?>
									<table>
										<thead>
											<tr>
												<th>ID</th>
												<th>Title</th>
												<th>Description</th>
												<th>Status</th>
												<th>Link</th>
												<th>PubDate</th>
											</tr>
										</thead>
										<tbody>
										<?php while ($works = mysqli_fetch_assoc($works_get)) { ?>
											<tr>
												<td><input type="text" value="<?php echo $works['id']; ?>" required></td>
												<td><input type="text" value="<?php echo $works['title']; ?>" required></td>
												<td><input type="text" value="<?php echo $works['description']; ?>" required></td>
												<td><input type="text" value="<?php echo $works['status']; ?>" required></td>
												<td><input type="text" value="<?php echo $works['link']; ?>" required></td>
												<td><input type="text" value="<?php echo $works['pubdate']; ?>" required></td>
												<td><a href="main/edit.php?work=<?php echo $works['id']; ?>" class="button">Редагувати</a></td>
											</tr>
										</tbody>
								<?php }
							?>
								</table>
						</section>
					</form>

					<hr>
					<h2>Коментарії</h2>

					<!-- Comments Table -->
					<form id="comments">
						<section>
							<?php 
								$comments_get = mysqli_query($connection, "SELECT * FROM `comments`") ?>
									<table>
										<thead>
											<tr>
												<th>ID</th>
												<th>Author ID</th>
												<th>Article ID</th>
												<th>Text</th>
												<th>PubDate</th>
											</tr>
										</thead>
										<tbody>
										<?php while ($comment = mysqli_fetch_assoc($comments_get)) { ?>
											<tr>
												<td><input type="text" value="<?php echo $comment['id']; ?>" required></td>
												<td><input type="text" value="<?php echo $comment['author_id']; ?>" required></td>
												<td><input type="text" value="<?php echo $comment['article_id']; ?>" required></td>
												<td><input type="text" value="<?php echo $comment['text']; ?>" required></td>
												<td><input type="text" value="<?php echo $comment['pubdate']; ?>" required></td>
												<td><a href="main/edit.php?comments=<?php echo $comment['id']; ?>" class="button">Редагувати</a></td>
											</tr>
										</tbody>
								<?php }
							?>
								</table>
						</section>
					</form>
					

				<?php } ?>

			</div>	
		</div>
	</body>
</html>