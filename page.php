<?php get_header(); ?>
<body <?php body_class( $class = 'defaultPage' ); ?>>
	
	<!-- // Header -->
	<div class="fullWidth_wrapper sticky_header">
		<div class="site_container">
			<header>
				<!-- // Logo -->
				<?php get_template_part( 'template-parts/logo' ); ?>

				<!-- // Search box -->
				<?php //get_template_part( 'template-parts/search-field' ); ?>

				<!-- // Nav -->
				<?php get_template_part( 'menu-parts/menu-s_machine_industry' ); ?>
			</header>
		</div>
	</div>

	<!-- // Header bottom border -->
	<div class="fullWidth_wrapper">
		<div class="footer_top_border header_bottom_border">
			<ul>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/1.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/2.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/3.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/4.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/5.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/6.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/7.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/8.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/9.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/10.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/11.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/12.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/13.jpg)"></li>
			</ul>
		</div>
	</div>

	<!-- // Categories -->
	<div class="fullWidth_wrapper inSearchCategory">
		<div class="fullWidth_wrapper currentCat">
			<div class="site_container">
				<h1><?php the_title(); ?></h1>

				<div class="default_page_content">
					<?php
						if (have_posts()) {
							while (have_posts()) {
							    the_post();

							    the_content();
							}
						}
					?>
				</div>
			</div>
		</div>
	</div>

	<!-- // Footer top border -->
	<div class="fullWidth_wrapper">
		<div class="footer_top_border">
			<ul>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/1.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/2.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/3.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/4.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/5.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/6.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/7.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/8.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/9.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/10.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/11.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/12.jpg)"></li>
				<li style="background-image:url(<?php rooturi(); ?>/img/Footer-top-border/13.jpg)"></li>
			</ul>
		</div>
	</div>

	<!-- //  -->
	<!-- <div class="fullWidth_wrapper">
		<div class="site_container">
			
		</div>
	</div> -->

	<!-- // Footer -->
	<?php get_footer(); ?>

	<script>
		$(document).ready(function() {

			if ($(window).width() <= 950 && $(window).width() >= 375) { 
				$('.single_cat_inner.sByCats ul li:gt(5), .single_cat_inner.sByMan ul li:gt(5)').hide();

				$(".sByCats .collapse_catsSec").click(function() {
					if ($('.sByCats ul li:gt(5)').is( ":visible" )) {
						$('.sByCats ul li:gt(5)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sByCats ul li:gt(5)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
				// -----------------------------------------
				$(".sByMan .collapse_catsSec").click(function() {
					if ($('.sByMan ul li:gt(5)').is( ":visible" )) {
						$('.sByMan ul li:gt(5)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sByMan ul li:gt(5)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
			}

			if ($(window).width() <= 320) { 
				$('.single_cat_inner.sByCats ul li:gt(3), .single_cat_inner.sByMan ul li:gt(3)').hide();

				$(".sByCats .collapse_catsSec").click(function() {
					if ($('.sByCats ul li:gt(3)').is( ":visible" )) {
						$('.sByCats ul li:gt(3)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sByCats ul li:gt(3)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
				// -----------------------------------------
				$(".sByMan .collapse_catsSec").click(function() {
					if ($('.sByMan ul li:gt(3)').is( ":visible" )) {
						$('.sByMan ul li:gt(3)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sByMan ul li:gt(3)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
			}
		});
	</script>

	<?php wp_footer(); ?>
</body>
</html>