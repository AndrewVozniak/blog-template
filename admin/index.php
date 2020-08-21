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
				<?php } elseif(isset($_SESSION['user']) AND $_SESSION['user']['admin'] == 1) { ?>

					<!-- Обробка  -->
					<?php if (isset($_POST['Info'])) { 

					$users_count_get = mysqli_query($connection, "SELECT COUNT(id) AS 'total_count' FROM `users`");
					$users_count = mysqli_fetch_assoc($users_count_get);

					$articles_count_get = mysqli_query($connection, "SELECT COUNT(`id`) AS 'total_count' FROM `articles`");
					$articles_count = mysqli_fetch_assoc($articles_count_get); 

					$news_count_get = mysqli_query($connection, "SELECT COUNT(`id`) AS 'total_count' FROM `news`");
					$news_count = mysqli_fetch_assoc($articles_count_get); 

					$comments_count_get = mysqli_query($connection, "SELECT COUNT(`id`) AS 'total_count' FROM `comments`");
					$comments_count = mysqli_fetch_assoc($comments_count_get);

					?> 

					<div class="table-wrapper">
						<table>
							<thead>
								<tr>
									<th><a href="global.php#users">К-сть акаунтів</a></th>
									<th><a href="global.php#articles">К-сть статей</a></th>
									<th><a href="global.php#news">К-сть Новин</a></th>
									<th><a href="global.php#comments">К-сть Коментаріїв</a></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $users_count['total_count']; ?></td>
									<td><?php echo $articles_count['total_count']; ?></td>
									<td><?php echo $news_count['total_count']; ?></td>
									<td><?php echo $comments_count['total_count']; ?></td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td><a href="global.php" class="button">Детальніша інформація</a></td>
								</tr>
							</tfoot>
						</table>
					</div>

					<?php }?>

					<?php if (isset($_POST['Session_restart'])) {
						echo "Сесія успішно перезапущена!";
						session_destroy();
						session_start();
					}?>

					<!-- Форми -->
					<form action="index.php" method="POST" >
						<button class="button big fit" name="Info">Інформація</button>
						<a href="main/create.php" class="button big fit">Добавити статтю</a>
						<a href="main/" class="button big fit">Створити новину</a>
						<a href="main/work.php" class="button big fit">Добавити роботу</a>
						<a href="global.php" class="button big fit">Редагувати</a>
						<a href="config.php" class="button big fit">Конфігураційний файл</a>							
						<button class="button big fit" name="Session_restart">Перезапустити сессію</button>
					</form>

				<?php } ?>

			</div>	

			<!-- Sidebar -->
			<?php include "../includes/sidebar.php"; ?>

		</div>
	</body>
</html>