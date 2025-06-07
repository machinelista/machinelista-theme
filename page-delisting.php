<?php
	/*
		Template name: Delisting System
	*/
?>
<?php get_header(); ?>

<body <?php body_class( $class = 'pageLegals' ); ?>>

	<!-- // Header -->
	<div class="fullWidth_wrapper sticky_header">
		<div class="site_container">
			<header>
				<!-- // Logo -->
				<?php get_template_part( 'template-parts/logo' ); ?>

				<!-- // Search box -->
				<?php //get_template_part( 'template-parts/search-field' ); ?>

				<!-- // Nav -->
				<?php get_template_part( 'menu-parts/menu-legals' ); ?>
			</header>
		</div>
	</div>

	<!-- // -->
	<?php
		/*// Connect to Redis
		$key = 'dlCycle';
		$value = 1;

		// Save data to Redis (0 means no expiration)
		// wp_cache_set($key, $value, 'delistSystem');

		// Retrieve data from Redis
		$data = wp_cache_get($key, 'delistSystem');

		if ($data !== false) {
			echo "dlCycle == ". $data;
		} else {
			echo "Data not found in cache.";
		}*/
	?>

	<!-- // Footer top border -->
	<div class="fullWidth_wrapper">
		<div class="footer_top_border">
			<?php get_template_part( 'template-parts/universalFooterBorder' ); ?>
		</div>
	</div>

	<!-- //  -->
	<!-- <div class="fullWidth_wrapper">
		<div class="site_container">
			
		</div>
	</div> -->

	<!-- // Footer -->
	<?php get_footer(); ?>

	<?php wp_footer(); ?>
</body>
</html>