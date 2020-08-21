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
							$path = '../../images/article/';
						
							// Якщо сталася помилка
							if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name'])) {
								echo "Помилка у загрузці файла";

							}

							//Все добре загружаємо 
							else {
								$fileName = $_FILES['picture']['name'];
								$query = mysqli_query($connection, "INSERT INTO `articles` (`title`, `description`, `image`, `categorie`, `text`) VALUES ('$_POST[title]', '$_POST[description]', '$fileName', '$_POST[categorie]', '$_POST[text]')");
								if ($query) {
									echo "Добавлена"; ?>
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
					<h2>Створення нової статті</h2>

					<form method="POST" enctype="multipart/form-data">
						<section>
							<table>
								<thead>
									<tr>
										<th>Назва</th>
										<th>Опис</th>
										<th>Картинка</th>
										<th>Категорія</th>
										<th>Текст</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><textarea name="title" required></textarea></td>
										<td><textarea name="description" required></textarea></td>
										<td><input name="picture" type="file"></td>
										<td>
											<select name ="categorie" style="min-width: auto; outline: none;">
									            <option value = "Programming">Programming</option>
									            <option value = "Guitar">Guitar</option>
									            <option value = "General">General</option>
			         						</select>
			         					</td>
										<td><textarea name="text" required></textarea></td>
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