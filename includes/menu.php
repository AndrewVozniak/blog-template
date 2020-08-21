<section id="menu">
	<!-- Search -->
	<section>
		<form class="search" method="get" action="../../../../search.php">
			<input type="text" name="query" placeholder="Search" />
		</form>
	</section>

	<!-- Links -->
	<section>
		<ul class="links">
			<li>
				<a href="../../../articles/popular.php">
					<h3>Popular</h3>
					<p>Popular articles</p>
				</a>
			</li>
			<li>
				<a href="../../../about.php#contacts">
					<h3>Contacts</h3>
					<p>My Contacts</p>
				</a>
			</li>
			<li>
				<a href="../../../works/my.php">
					<h3>Projects</h3>
					<p>My Own Projects</p>
				</a>
			</li>
		</ul>
	</section>

	<!-- Actions -->
	<section>
		<?php 
			if (isset($_SESSION['user'])) {?>
				<ul class="actions vertical">
					<li><a href="#" class="button big fit">Hello <?php echo $_SESSION['user']['login']; ?></a></li>
					<?php if ($_SESSION['user']['admin'] == 1) { ?>
						<li><a href="../../admin" class="button big fit">Admin Panel</a></li>
					<?php }?>
					<li><a href="../../user/logout.php" class="button big fit">Log Out</a></li>
				</ul>
			<?php	
			} elseif (!isset($_SESSION['user'])) {?>
				<ul class="actions vertical">
					<li><a href="../../user/signup.php" class="button big fit">Register</a></li>
					<li><a href="../../user/login.php" class="button big fit">Login</a></li>
				</ul>
			<?php 
			}
		?>
	</section>

</section>