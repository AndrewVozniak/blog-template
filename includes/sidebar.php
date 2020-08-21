<section id="sidebar">

	<!-- Intro -->
	<section id="intro">
		<a href="#" class="logo"><img src="images/logo.jpg" alt="" /></a>
		<header>
			<h2><?php echo $config['title'] ?></h2>
			<p><?php echo $config['description'] ?></a></p>
		</header>
	</section>

	<!-- Mini Posts -->
	<section>
		<div class="mini-posts">
			
			<?php 
				$guitar_get = mysqli_query($connection, "SELECT `id`, `pubdate`, `title`, `image` FROM `articles` WHERE `categorie` = 'Guitar' ORDER BY `pubdate` DESC LIMIT 0,4");
				if (mysqli_num_rows($guitar_get) == 0) { ?>
					<div style="padding-left: auto; padding-right: auto; width: 100%;">
						<strong>Скоро зявится ;)</strong>
					</div>
				<?php } else {
					while ($guitar = mysqli_fetch_assoc($guitar_get)) { ?>
						<!-- Mini Post -->
						<article class="mini-post">
							<header>
								<h3><a href="../../articles/main/?id=<?php echo $guitar['id']; ?>"><?php echo $guitar['title']; ?></a></h3>
								<time class="published" datetime="<?php echo $guitar['pubdate']; ?>"><?php echo $guitar['pubdate']; ?></time>
								<a href="../../articles/main/?id=<?php echo $guitar['id']; ?>" class="author"><img src="../../../images/article/<?php echo $guitar['image']; ?>" alt="" /></a>
							</header>
							<a href="../../articles/main/?id=<?php echo $guitar['id']; ?>" class="image"><img src="../../../images/article/<?php echo $guitar['image']; ?>" alt="" /></a>
						</article>
			
			<?php 
				}
			}
			?>

		</div>
	</section>

	<!-- Posts List -->
	<section>
		<ul class="posts">
			<?php 
				$news_get = mysqli_query($connection, "SELECT * FROM `news` ORDER BY `pubdate` DESC LIMIT 0,6");
				if (mysqli_num_rows($news_get) == 0) { ?>
					<div style="padding-left: auto; padding-right: auto; width: 100%;">
						<strong>Скоро зявится ;)</strong>
					</div>
				<?php } else {
					while ($news = mysqli_fetch_assoc($news_get)) { ?>
						<li>
							<article>
								<header>
									<h3><a href="<?php echo $news['link'] ?>"><?php echo $news['title'] ?></a></h3>
									<time class="published" datetime="<?php echo $news['pubdate'] ?>"><?php echo $news['pubdate'] ?></time>
								</header>
								<a  href="<?php echo $news['link']; ?>" class="image"><img src="../../../images/news/<?php echo $news['image'] ?>" alt="" /></a>
							</article>
						</li>
			
			<?php 
				}
			}
			?>
			
		</ul>
	</section>

	<!-- About -->
	<section class="blurb">
		<h2>About</h2>
		<p><?php echo $config['about']; ?></p>
		<ul class="actions">
			<li><a href="../about.php" class="button">Learn More</a></li>
		</ul>
	</section>

	<!-- Footer -->
	<?php include "footer.php"; ?>
</section>