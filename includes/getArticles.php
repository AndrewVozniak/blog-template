<?php 
while ($article = mysqli_fetch_assoc($article_get)) {?>
	<article class="post">
		<header>
			<div class="title">
				<h2><a href="../articles/main/?id=<?php echo $article['id']?>"><?php echo $article['title'] ?></a></h2>
				<p><?php echo $article['description'] ?></p>
			</div>
			<div class="meta">
				<time class="published"><?php echo $article['pubdate'] ?></time>
				<a href="../articles/main/?id=<?php echo $article['id']?>" class="author"><span class="name"><?php echo $article['categorie'] ?></span></a>
			</div>
		</header>
		<a href="../articles/main/?id=<?php echo $article['id']?>" class="image featured"><img src="../../../../images/article/<?php echo $article['image'] ?>" alt="" /></a>
		<p><?php echo $article['description'] ?></p>
		<footer>
			<ul class="actions">
				<li><a href="../articles/main/?id=<?php echo $article['id']?>" class="button big">Continue Reading</a></li>
			</ul>
			<ul class="stats">
				<li><a href="../articles/main/?id=<?php echo $article['id']?>" class="icon fa-eye"><?php echo $article['views']?></a></li>
			</ul>
		</footer>
	</article>
<?php }
?>