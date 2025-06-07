<nav>
	<ul class="desktopMenu">
		<li><a href="/category">Categories</a></li>
		<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
		<li><a href="https://machinelista.com/listings-for-used-machinery">List Machines</a></li>
		<!-- <li class="loginMenuItem"><a href="#">Log Out</a></li> -->
		<?php
			if (is_user_logged_in() == true) {?>
				<li class="loginMenuItem"><a href="<?php echo wp_logout_url($redirect = '/user-login'); ?>">Log Out</a></li>
			<?php }else {?>
				<li class="loginMenuItem"><a href="/user-login">Log In</a></li>
			<?php }
		?>
	</ul>
	<ul class="tabMenu">
		<li><a href="/category">Categories</a></li>
		<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
		<li class="loginMenuItem"><a href="#">Log Out</a></li>
	</ul>
	<ul class="mobileMenu">
		<?php
			if (is_user_logged_in() == true) {?>
				<li class="loginMenuItem"><a href="<?php echo wp_logout_url(); ?>">Log Out</a></li>
			<?php }else {?>
				<li class="loginMenuItem"><a href="#">Log In</a></li>
			<?php }
		?>
		<!-- <li class="loginMenuItem"><a href="#">Log Out</a></li> -->
		<li><a href="/category">Categories</a></li>
		<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
		<li class="liveAutionMenuItem"><a href="https://machinelista.com/listings-for-used-machinery">List Machines</a></li>
	</ul>
	<button class="toggle_nav">
		<!-- <i class="fas fa-bars"></i> -->
		<img src="<?php rooturi(); ?>/img/burger-menu.png" alt="">
	</button>
</nav>