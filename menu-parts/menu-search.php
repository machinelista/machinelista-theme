<nav>
	<ul class="desktopMenu">
		<li><a href="/category">Categories</a></li>
		<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
		<li class="liveAutionMenuItem"><a href="https://machinelista.com/listings-for-used-machinery/">List Machines</a></li>
		<!-- <li class="loginMenuItem"><a href="#">Login</a></li> -->
		<?php
			if (is_user_logged_in() == true) {?>
				<li class="loginMenuItem"><a href="<?php echo wp_logout_url(); ?>">Log Out</a></li>
			<?php }else {?>
				<li class="loginMenuItem"><a href="<?php echo wp_login_url($redirect = 'member-dashboard'); ?>">Log In</a></li>
			<?php }
		?>
	</ul>
	<ul class="tabMenu">
		<li><a href="/category">Categories</a></li>
		<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
		<li class="liveAutionMenuItem"><a href="https://machinelista.com/listings-for-used-machinery/">Listings</a></li>
	</ul>
	<ul class="mobileMenu">
		<!-- <li class="loginMenuItem"><a href="#">Login</a></li> -->
		<?php
			if (is_user_logged_in() == true) {?>
				<li class="loginMenuItem"><a href="<?php echo wp_logout_url(); ?>">Log Out</a></li>
			<?php }else {?>
				<li class="loginMenuItem"><a href="<?php echo wp_login_url($redirect = 'member-dashboard'); ?>">Log In</a></li>
			<?php }
		?>
		<li><a href="/category">Categories</a></li>
		<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
		<li class="liveAutionMenuItem"><a href="https://machinelista.com/listings-for-used-machinery/">List Machines</a></li>
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