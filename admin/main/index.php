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
					
					<!-- Обробка -->
					<?php
						if (isset($_POST['title']) && isset($_FILES['picture'])) {
							// Шлях
							$path = '../../images/news/';
						
							// Якщо сталася помилка
							if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name'])) {
								echo "Помилка у загрузці файла";

							}

							//Все добре загружаємо 
							else {
								$fileName = $_FILES['picture']['name'];
								$query = mysqli_query($connection, "INSERT INTO `news` (`title`, `image`, `link`) VALUES ('$_POST[title]', '$fileName', '$_POST[link]')");
								if ($query) {
									echo "Добавлено"; ?>
								<script>
									window.location.replace("../global.php"); 
								</script>
								<?php } else {
									echo "Помилка";
								}
				
							}
						}
					?>
						
					<!-- Форми -->
					<h2>Створення новини</h2>

					<form method="POST" enctype="multipart/form-data">
						<section>
							<table>
								<thead>
									<tr>
										<th>Назва</th>
										<th>Посилання</th>
										<th>Картинка</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><textarea name="title" required></textarea></td>
										<td><textarea name="link" required></textarea></td>
										<td><input name="picture" type="file"></td>
										<td><button type="submit">Зберегти</button></td>
									</tr>
								</tbody>
							</table>
						</section>
					</form>
					

				<?php } ?>

			</div>	
		</div>
	</body>
</html>