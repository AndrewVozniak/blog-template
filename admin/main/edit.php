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

				<?php if (!isset($_SESSION['user']) OR $_SESSION['user']['admin'] == 0) { ?>
					<a class="button big fit" href="/">На головну</a>
					<!-- Sidebar -->
					<?php include "../../includes/sidebar.php"; ?>

				<?php } elseif(isset($_SESSION['user']) AND $_SESSION['user']['admin'] == 1) { ?>


					<!-- Користувачі -->
					<?php if (!empty($_POST['id']) && isset($_POST['save_user'])) {
						$save = mysqli_query($connection, "UPDATE `users` SET `id` = '$_POST[id]', `login` = '$_POST[login]', `email` = '$_POST[email]', `create_time` = '$_POST[create_time]', `admin` = '$_POST[admin]' WHERE `id` = " . (int) $_POST['id']);

						if($save) { 
							echo "Збережено!";
							session_destroy();
							session_start(); ?>
							<script>
								window.location.replace('/')
							</script>
						<?php } else {
							echo "Помилка";
						}
						
						// Видалення
					} elseif(!empty($_POST['id']) && isset($_POST['delete_user'])) {
						$delete = mysqli_query($connection, "DELETE FROM `users` WHERE `id` = " . (int) $_POST['id']);
						if($delete) { 
							echo "Видалено!";
							session_destroy();
							session_start(); ?>
							<script>
								window.location.replace('/')
							</script>
						<?php } else {
							echo "Помилка";
						}
					}; ?>




					<!-- Статті -->
					<?php if (!empty($_POST['id']) && isset($_POST['save_article'])) {
						$save = mysqli_query($connection, "UPDATE `articles` SET `id` = '$_POST[id]', `title` = '$_POST[title]', `description` = '$_POST[description]', `image` = '$_POST[image]', `categorie` = '$_POST[categorie]', `author` = '$_POST[author]', `text` = '$_POST[text]', `pubdate` = '$_POST[pubdate]' WHERE `id` = " . (int) $_POST['id']);

						if($save) { 
							echo "Збережено!"; ?>
							<script>
								window.location.replace('../global.php')
							</script>
						<?php } else {
							echo "Помилка";
						}
						
						// Видалення
					} elseif(!empty($_POST['id']) && isset($_POST['delete_article'])) {
						$delete = mysqli_query($connection, "DELETE FROM `articles` WHERE `id` = " . (int) $_POST['id']);
						if($delete) { 
							echo "Видалено!"; ?>
							<script>
								window.location.replace('../global.php')
							</script>
						<?php } else {
							echo "Помилка";
						}
					}; ?>

					<!-- Роботи -->
					<?php if (!empty($_POST['id']) && isset($_POST['save_work'])) {
						$save = mysqli_query($connection, "UPDATE `works` SET `id` = '$_POST[id]', `title` = '$_POST[title]', `link` = '$_POST[link]', `description` = '$_POST[description]', `image` = '$_POST[image]', `status` = '$_POST[status]', `pubdate` = '$_POST[pubdate]' WHERE `id` = " . (int) $_POST['id']); 

						if($save) { 
							echo "Збережено!"; ?>
							<script>
								window.location.replace('../global.php')
							</script>
						<?php } else {
							echo "Помилка";
						}
						
						// Видалення
					} elseif(!empty($_POST['id']) && isset($_POST['delete_work'])) {
						$delete = mysqli_query($connection, "DELETE FROM `works` WHERE `id` = " . (int) $_POST['id']);
						if($delete) { 
							echo "Видалено!"; ?>
							<script>
								window.location.replace('../global.php')
							</script>
						<?php } else {
							echo "Помилка";
						}
					}; ?>

					<!-- Новини -->
					<?php if (!empty($_POST['id']) && isset($_POST['save_news'])) {
						$save = mysqli_query($connection, "UPDATE `news` SET `id` = '$_POST[id]', `title` = '$_POST[title]', `link` = '$_POST[link]', `image` = '$_POST[image]', `pubdate` = '$_POST[pubdate]' WHERE `id` = " . (int) $_POST['id']);

						if($save) { 
							echo "Збережено!"; ?>
							<script>
								window.location.replace('../global.php')
							</script>
						<?php } else {
							echo "Помилка";
						}

						// Видалення
					} elseif(!empty($_POST['id']) && isset($_POST['delete_news'])) {
						$delete = mysqli_query($connection, "DELETE FROM `news` WHERE `id` = " . (int) $_POST['id']);
						if($delete) { 
							echo "Видалено!"; ?>
							<script>
								window.location.replace('../global.php')
							</script>
						<?php } else {
							echo "Помилка";
						}
					}; ?>





					<!-- Коментарії -->
					<?php if (!empty($_POST['id']) && isset($_POST['save_comment'])) {
						$save = mysqli_query($connection, "UPDATE `comments` SET `id` = '$_POST[id]', `author_id` = '$_POST[author_id]', `article_id` = '$_POST[article_id]', `text` = '$_POST[text]', `pubdate` = '$_POST[pubdate]' WHERE `comments`.`id` = " . (int) $_POST['id']);

						if($save) { 
							echo "Збережено!"; ?>
							<script>
								window.location.replace('/')
							</script>
						<?php } else {
							echo "Помилка";
						}
						
						// Видалення
					} elseif(!empty($_POST['id']) && isset($_POST['delete_comment'])) {
						$delete = mysqli_query($connection, "DELETE FROM `comments` WHERE `id` = " . (int) $_POST['id']);
						if($delete) { 
							echo "Видалено!"; ?>
							<script>
								window.location.replace('../global.php')
							</script>
						<?php } else {
							echo "Помилка";
						}
					}; ?>


					<!-- Форми -->

					<!-- Users Table -->
					<?php if (!empty($_GET['users'])): ?>
						<h2>Користувачі</h2>
						<form  name="users" method="POST">
							<section>
								<?php 
									$users_get = mysqli_query($connection, "SELECT `id`, `login`, `email`, `create_time`, `admin` FROM `users` WHERE `id` = " . (int) $_GET['users']) ?>
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
											<?php $user = mysqli_fetch_assoc($users_get);  ?>
												<tr>
													<td><input name="id" type="text" value="<?php echo $user['id']; ?>" required></td>
													<td><textarea name="login"><?php echo $user['login']; ?></textarea></td>
													<td><textarea name="email"><?php echo $user['email']; ?></textarea></td>
													<td><textarea name="create_time"><?php echo $user['create_time']; ?></textarea></td>
													<td><textarea name="admin"><?php echo $user['admin']; ?></textarea></td>
													<td><button type="submit" name="save_user">Зберегти</button></td>
													<td><button type="submit" name="delete_user">Видалити</button></td>
												</tr>
											</tbody>
									</table>
							</section>
						</form>
					<?php endif ?>
					

					
					<?php if (!empty($_GET['articles'])): ?>
						<hr>
						<h2>Статті</h2>

						<!-- Articles Table -->
						<form id="articles" method="POST">
							<section>
								<?php 
									$articles_get = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['articles']) ?>
										<table>
											<thead>
												<tr>
													<th>ID</th>
													<th>Title</th>
													<th>Description</th>
													<th>Image</th>
													<th>Categorie</th>
													<th>Author</th>
													<th>Text</th>
													<th>PubDate</th>
												</tr>
											</thead>
											<tbody>
											<?php $article = mysqli_fetch_assoc($articles_get);  ?>
												<tr>
													<td><input name="id" type="text" value="<?php echo $article['id']; ?>" required></td>
													<td><textarea name="title"><?php echo $article['title']; ?></textarea></td>
													<td><textarea name="description"><?php echo $article['description']; ?></textarea></td>
													<td><textarea name="image"><?php echo $article['image']; ?></textarea></td>
													<td>
														<?php echo "Категорія: " . $article['categorie']; ?>
														<select name ="categorie" style="min-width: auto; outline: none;">
												            <option value = "Programming">Programming</option>
												            <option value = "Guitar">Guitar</option>
												            <option value = "General">General</option>
						         						</select>
						         					</td>
													<td><textarea name="author"><?php echo $article['author']; ?></textarea></td>
													<td><textarea name="text"><?php echo $article['text']; ?></textarea></td>
													<td><textarea name="pubdate"><?php echo $article['pubdate']; ?></textarea></td>
													<td><button type="submit" name="save_article">Зберегти</button></td>
													<td><button type="submit" name="delete_article">Видалити</button></td>
												</tr>
											</tbody>
									</table>
							</section>
						</form>
					<?php endif ?>

					<?php if (!empty($_GET['news'])): ?>
						<hr>
						<h2>Статті</h2>

						<!-- News Table -->
						<form id="news" method="POST">
							<section>
								<?php 
									$news_get = mysqli_query($connection, "SELECT * FROM `news` WHERE `id` = " . (int) $_GET['news']) ?>
										<table>
											<thead>
												<tr>
													<th>ID</th>
													<th>Title</th>
													<th>Link</th>
													<th>Image</th>
													<th>PubDate</th>
												</tr>
											</thead>
											<tbody>
											<?php $news = mysqli_fetch_assoc($news_get);  ?>
												<tr>
													<td><input name="id" type="text" value="<?php echo $news['id']; ?>" required></td>
													<td><textarea name="title"><?php echo $news['title']; ?></textarea></td>
													<td><textarea name="link"><?php echo $news['link']; ?></textarea></td>
													<td><textarea name="image"><?php echo $news['image']; ?></textarea></td>
													<td><textarea name="pubdate"><?php echo $news['pubdate']; ?></textarea></td>
													<td><button type="submit" name="save_news">Зберегти</button></td>
													<td><button type="submit" name="delete_news">Видалити</button></td>
												</tr>
											</tbody>
									</table>
							</section>
						</form>
					<?php endif ?>

					<?php if (!empty($_GET['work'])): ?>
						<hr>
						<h2>Роботи</h2>

						<!-- Works Table -->
						<form id="works" method="POST">
							<section>
								<?php 
									$works_get = mysqli_query($connection, "SELECT * FROM `works` WHERE `id` = " . (int) $_GET['work']) ?>
										<table>
											<thead>
												<tr>
													<th>ID</th>
													<th>Title</th>
													<th>Description</th>
													<th>Image</th>
													<th>Link</th>
													<th>Status</th>
													<th>PubDate</th>
												</tr>
											</thead>
											<tbody>
											<?php $works = mysqli_fetch_assoc($works_get);  ?>
												<tr>
													<td><input name="id" type="text" value="<?php echo $works['id']; ?>" required></td>
													<td><textarea name="title"><?php echo $works['title']; ?></textarea></td>
													<td><textarea name="description"><?php echo $works['description']; ?></textarea></td>
													<td><textarea name="image"><?php echo $works['image']; ?></textarea></td>
													<td><textarea name="link"><?php echo $works['link']; ?></textarea></td>
													<td><textarea name="status"><?php echo $works['status']; ?></textarea></td>
													<td><textarea name="pubdate"><?php echo $works['pubdate']; ?></textarea></td>
													<td><button type="submit" name="save_work">Зберегти</button></td>
													<td><button type="submit" name="delete_work">Видалити</button></td>
												</tr>
											</tbody>
									</table>
							</section>
						</form>
					<?php endif ?>
										

					<?php if (!empty($_GET['comments'])): ?>
						<hr>
						<h2>Коментарії</h2>

						<!-- Comments Table -->
						<form id="comments" method="POST">
							<section>
								<?php 
									$comments_get = mysqli_query($connection, "SELECT * FROM `comments` WHERE `id` = " . (int) $_GET['comments']) ?>
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
											<?php $comment = mysqli_fetch_assoc($comments_get);  ?>
												<tr>
													<td><input name="id" type="text" value="<?php echo $comment['id']; ?>" required></td>
													<td><textarea name="author_id"><?php echo $comment['author_id']; ?></textarea></td>
													<td><textarea name="article_id"><?php echo $comment['article_id']; ?></textarea></td>
													<td><textarea name="text"><?php echo $comment['text']; ?></textarea></td>
													<td><textarea name="pubdate"><?php echo $comment['pubdate']; ?></textarea></td>
													<td><button type="submit" name="save_comment">Зберегти</button></td>
													<td><button type="submit" name="delete_comment">Видалити</button></td>
												</tr>
											</tbody>
									</table>
							</section>
						</form>
					<?php endif ?>
				<?php } ?>
			</div>	
		</div>
	</body>
</html>