<nav>
	<ul class="desktopMenu">
		<li><a href="/category">Categories</a></li>
		<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
		<li class="openLsFormPopup liveAutionMenuItem"><a href="#">List Machines</a></li>
	</ul>
	<ul class="tabMenu">
		<li><a href="/category">Categories</a></li>
		<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
		<li class="openLsFormPopup"><a href="#">Listings</a></li>
	</ul>
	<ul class="mobileMenu">
		<li><a href="/category">Categories</a></li>
		<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
		<li class="openLsFormPopup liveAutionMenuItem"><a href="#">List Machines</a></li>
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