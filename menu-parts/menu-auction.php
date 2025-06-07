<nav>
	<ul class="desktopMenu">
		<li><a href="/category">Categories</a></li>
		<li><a href="/advertise">Advertise</a></li>
		<li class="liveAutionMenuItem"><a href="/listings-for-used-machinery">List Machines</a></li>
	</ul>
	<ul class="tabMenu">
		<li><a href="/category">Categories</a></li>
		<li><a href="/advertise">Advertise</a></li>
		<li class="liveAutionMenuItem"><a href="/listings-for-used-machinery">Listings</a></li>
	</ul>
	<ul class="mobileMenu">
		<li><a href="/advertise">Advertise</a></li>
		<li><a href="/category">Categories</a></li>
		<li class="liveAutionMenuItem"><a href="/listings-for-used-machinery">List Machines</a></li>
		<?php
			if (is_user_logged_in() == true) {?>
				<li><a href="/member-dashboard/">Dashboard</a></li>
			<?php }
		?>
	</ul>
	<button class="toggle_nav">
		<!-- <i class="fas fa-bars"></i> -->
		<img src="<?php rooturi(); ?>/img/burger-menu.png" alt="">
	</button>
</nav>