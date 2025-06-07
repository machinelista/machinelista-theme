<nav>
	<?php
		// ======== Home =======
		if ( is_front_page() ) {
			?>
			<ul class="desktopMenu">
				<li><a href="/category">Categories</a></li>
				<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
				<!-- <li><a href="#">Advertise</a></li> -->
				<li class="liveAutionMenuItem"><a href="/listings-for-used-machinery/">List Machines</a></li>
				<!-- <li class="loginMenuItem"><a href="#">Login</a></li> -->
				<?php
					if (is_user_logged_in() == true) {?>
						<li><a href="/member-dashboard/">Dashboard</a></li>
					<?php }
				?>
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
				<!-- <li><a href="#">Advertise</a></li> -->
				<li class="liveAutionMenuItem"><a href="/listings-for-used-machinery/">List Machines</a></li>
				<!-- <li class="loginMenuItem"><a href="#">Login</a></li> -->
				<?php
					if (is_user_logged_in() == true) {?>
						<li class="loginMenuItem"><a href="<?php echo wp_logout_url(); ?>">Log Out</a></li>
					<?php }else {?>
						<li class="loginMenuItem"><a href="<?php echo wp_login_url($redirect = 'member-dashboard'); ?>">Log In</a></li>
					<?php }
				?>
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
				<li><a href="/advertise">Advertise</a></li>
				<li><a href="/category">Categories</a></li>
				<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
				<li class="liveAutionMenuItem"><a href="/listings-for-used-machinery/">List Machines</a></li>
				<?php
					if (is_user_logged_in() == true) {?>
						<li><a href="/member-dashboard/">Dashboard</a></li>
					<?php }
				?>
			</ul>
			<?php
		}

		// ======== Advertise =======
		if ( is_page_template( 'page-Advertise.php' ) ) {
			?>
			<ul class="desktopMenu">
				<li><a href="/category">Categories</a></li>
				<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
				<li class="liveAutionMenuItem"><a href="/listings-for-used-machinery/">List machines</a></li>
				<!-- <li class="loginMenuItem"><a href="#">Login</a></li> -->
				<?php
					if (is_user_logged_in() == true) {?>
						<li><a href="/member-dashboard/">Dashboard</a></li>
					<?php }
				?>
			</ul>
			<ul class="tabMenu">
				<li><a href="/category">Categories</a></li>
				<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
				<li class="liveAutionMenuItem"><a href="/listings-for-used-machinery/">Listings</a></li>
				<!-- <li class="loginMenuItem"><a href="#">Login</a></li> -->
			</ul>
			<ul class="mobileMenu">
				<li><a href="/category">Categories</a></li>
				<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
				<li class="liveAutionMenuItem"><a href="/listings-for-used-machinery/">List Machines</a></li>
				<!-- <li class="loginMenuItem"><a href="#">Login</a></li> -->
				<?php
					if (is_user_logged_in() == true) {?>
						<li><a href="/member-dashboard/">Dashboard</a></li>
					<?php }
				?>
			</ul>
			<?php
		}

		// ======== Auction =======
		if ( is_page_template( 'page-Auction.php' ) ) {
			?>
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
			<?php
		}

		// ======== Category =======
		if ( is_page_template( 'page-Category.php' ) ) {
			?>
			<ul class="desktopMenu">
				<li><a href="/advertise">Advertise</a></li>
				<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
				<li class="liveAutionMenuItem"><a href="/listings-for-used-machinery">List Machines</a></li>
			</ul>
			<ul class="tabMenu">
				<li><a href="/advertise">Advertise</a></li>
				<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
				<li class="liveAutionMenuItem"><a href="/listings-for-used-machinery">Listings</a></li>
			</ul>
			<ul class="mobileMenu">
				<li><a href="/advertise">Advertise</a></li>
				<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
				<li class="liveAutionMenuItem"><a href="/listings-for-used-machinery">List Machines</a></li>
				<?php
					if (is_user_logged_in() == true) {?>
						<li><a href="/member-dashboard/">Dashboard</a></li>
					<?php }
				?>
			</ul>
			<?php
		}

		// ======== Legals =======
		if ( is_page_template( 'page-Legals.php' ) ) {
			?>
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
			<?php
		}

		// ======== Listing =======
		if ( is_page_template( 'page-Listing.php' ) ) {
			?>
			<ul class="desktopMenu">
				<li><a href="/category">Categories</a></li>
				<li><a href="/advertise">Advertise</a></li>
				<?php
					if (is_user_logged_in() == true) {?>
						<li><a href="/member-dashboard/">Dashboard</a></li>
					<?php }
				?>
			</ul>
			<ul class="tabMenu">
				<li><a href="/category">Categories</a></li>
				<li><a href="/advertise">Advertise</a></li>
			</ul>
			<ul class="mobileMenu">
				<li><a href="/advertise">Advertise</a></li>
				<li><a href="/category">Categories</a></li>
				<?php
					if (is_user_logged_in() == true) {?>
						<li><a href="/member-dashboard/">Dashboard</a></li>
					<?php }
				?>
			</ul>
			<?php
		}

		// ======== Member Dashboard =======
		if ( is_page_template( 'page-memberDashboard.php' ) ) {
			?>
			<ul class="desktopMenu">
				<li><a href="/category">Categories</a></li>
				<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
				<li class="liveAutionMenuItem"><a href="https://machinelista.com/listings-for-used-machinery">List Machines</a></li>
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
			<?php
		}

		// ======== Single Machine =======
		if ( is_singular('machine') ) {
			?>
			<ul class="desktopMenu">
				<li><a href="/category">Categories</a></li>
				<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
				<li class="openLsFormPopup liveAutionMenuItem"><a href="#">List Machines</a></li>
			</ul>
			<ul class="tabMenu">
				<li><a href="/category">Categories</a></li>
				<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
				<li class="openLsFormPopup liveAutionMenuItem"><a href="#">Listings</a></li>
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
			<?php
		}

		// ======== Single Machine Industry =======
		if ( is_singular('machine_industry') ) {
			?>
			<ul class="desktopMenu">
				<li><a href="/category">Categories</a></li>
				<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
				<li class="liveAutionMenuItem"><a href="https://machinelista.com/listings-for-used-machinery/">List Machines</a></li>
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
				<li><a href="/category">Categories</a></li>
				<!-- <li class="liveAutionMenuItem"><a href="/trade-services/">Trade Services</a></li> -->
				<li class="liveAutionMenuItem"><a href="https://machinelista.com/listings-for-used-machinery/">List Machines</a></li>
				<?php
					if (is_user_logged_in() == true) {?>
						<li><a href="/member-dashboard/">Dashboard</a></li>
					<?php }
				?>
			</ul>
			<?php
		}

		// ======== Search =======
		if ( is_page_template( 'search.php' ) || is_tax() ) {
			?>
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
			<?php
		}
	?>

	<button class="toggle_nav">
		<!-- <i class="fas fa-bars"></i> -->
		<img src="<?php rooturi(); ?>/img/burger-menu.png" alt="">
	</button>
</nav>