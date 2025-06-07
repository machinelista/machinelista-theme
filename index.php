<?php get_header(); ?>

<body <?php body_class( $class = 'homePage' ); ?>>

	<!-- Styles for home page -->
	<style>
		header {
		    grid-template-columns: 1fr 1fr;
		    padding: 17px 26px 14px 43px;
		}
		.stickyContent {
			position: sticky;
			top: 0;
			left: 0;
			background-color: #fff;
			z-index: 1000;
		}
		body.admin-bar .stickyContent {
			position: sticky;
			top: 32px;
			left: 0;
			background-color: #fff;
			z-index: 1000;
		}
		body.admin-bar .sticky_header {
			position: sticky;
			top: 0;
			left: 0;
			background-color: #fff;
			z-index: 1000;
		}
		.page_features_bg {
			background-color: unset;
			/*border-top: 1px solid rgba(37, 114, 155, 0.07);*/
		}
		.page_features_wrapper .right h1 {
			margin-top: 5px;
		}
		.page_features_wrapper .right h5 {
			line-height: 17px;
		}
		/*----------------------------*/
		.page_features_wrapper .page_features_inner {
			grid-template-columns: 1.1fr 1.4fr 1fr;
		}
		/*-------------------*/
		.page_features_inner .search_box {
			text-align: center;
		}
		.page_features_inner .search_box input {
			display: block;
			width: 387px;
			height: 47px;
			border: 1px solid var(--siteOrange);
			padding: 12px 20px 10px;
			border-radius: 25px;
			font-size: 15px;
			font-style: normal;
			color: #82A2B3;
			outline: none;

			/*background: url(<?php rooturi(); ?>/img/search.png) no-repeat;
			background-position: 96% 60%;
			background-size: 17px;*/
			letter-spacing: .5px;
		}
		.page_features_inner .search_box input::placeholder {
			/*font-size: 14px;*/
			font-style: normal;
			color: #164D6B;
    		opacity: .45;
		}
		.page_features_inner .search_box input:focus {
			outline: none;
		}

		/*======= Brand logo resize ======*/
		.manufacturer_wrapper ul {
			grid-gap: 40px;
			grid-template-columns: auto auto auto auto auto auto auto auto;
		}
		.manufacturer_wrapper ul:nth-child(1) {
			margin-bottom: 7px;
		}
		.manufacturer_wrapper ul:nth-child(2) {
			grid-gap: 33px;
			margin-bottom: 36px;
		}
		.manufacturer_wrapper ul li:nth-child(1) img {
			width: 84px;
		}
		.manufacturer_wrapper ul li:nth-child(2) img {
			width: 138px;
			height: 20px
		}
		.manufacturer_wrapper ul li:nth-child(3) img {
			width: 136px;
			height: 25px
		}
		.manufacturer_wrapper ul li:nth-child(4) img {
			width: 160px;
			height: 99px
		}
		.manufacturer_wrapper ul li:nth-child(5) img {
			width: 109px;
		}
		.manufacturer_wrapper ul li:nth-child(6) img {
			width: 113px;
			height: 36px;
		}
		.manufacturer_wrapper ul li:nth-child(7) img {
			width: 70px;
		}
		.manufacturer_wrapper ul li:nth-child(8) img {
			width: 115px;
			height: 36px;
			display: block;
			margin: 0 auto;
		}
		/*---------------------*/
		.manufacturer_wrapper ul:nth-child(2) li:nth-child(1) img {
			width: 136px;
			height: 24px;
		}
		.manufacturer_wrapper ul:nth-child(2) li:nth-child(2) img {
			width: 78px;
			height: 44px;
			display: block;
			margin: 0 auto;
		}
		.manufacturer_wrapper ul:nth-child(2) li:nth-child(3) img {
			width: 117px;
			height: 35px;
			display: block;
			margin: 0 auto;
		}
		.manufacturer_wrapper ul:nth-child(2) li:nth-child(4) img {
			width: 105px;
			height: 46px;
			display: block;
			margin: 0 auto;
		}
		.manufacturer_wrapper ul:nth-child(2) li:nth-child(5) img {
			width: 100px;
			height: 36px;
		}
		.manufacturer_wrapper ul:nth-child(2) li:nth-child(6) img {
			width: 167px;
			height: 20px;
		}
		.manufacturer_wrapper ul:nth-child(2) li:nth-child(7) img {
			width: 126px;
			height: 21px;
		}
		.manufacturer_wrapper ul:nth-child(2) li:nth-child(8) img {
			width: 145px;
			height: 35px;
		}
		/*---------------------*/
		.manufacturer_wrapper ul:nth-child(3) li:nth-child(1) img {
			width: 134px;
			height: 37px;
		}
		.manufacturer_wrapper ul:nth-child(3) li:nth-child(2) img {
			width: 157px;
			height: 23px;
		}
		.manufacturer_wrapper ul:nth-child(3) li:nth-child(3) img {
			width: 77px;
			height: 24px;
		}
		.manufacturer_wrapper ul:nth-child(3) li:nth-child(4) img {
			width: 94px;
			height: 41px;
		}
		.manufacturer_wrapper ul:nth-child(3) li:nth-child(5) img {
			width: 90px;
			height: 42px;
		}
		.manufacturer_wrapper ul:nth-child(3) li:nth-child(6) img {
			width: 138px;
			height: 27px;
		}
		.manufacturer_wrapper ul:nth-child(3) li:nth-child(7) img {
			width: 120px;
			height: 51px;
		}
		.manufacturer_wrapper ul:nth-child(3) li:nth-child(8) img {
			width: 124px;
			height: 35px;
		}
	</style>

	<!-- // Sticky Part -->
	<div class="stickyContent">
		<!-- // Header -->
		<div class="fullWidth_wrapper sticky_header">
			<div class="site_container">
				<header>
					<!-- // Logo -->
					<?php get_template_part( 'template-parts/logo' ); ?>

					<!-- // Search box -->
					<?php get_template_part( 'template-parts/search-field' ); ?>

					<!-- // Nav -->
					<?php get_template_part( 'menu-parts/menu-home' ); ?>
				</header>
			</div>
		</div>
	</div>

	<!-- // Page Features -->
	<div class="fullWidth_wrapper page_features_bg">
		<div class="site_container">
			<div class="page_features_wrapper">
				<div class="page_features_inner">
					<!-- // Left portion -->
					<div class="left">
						<ul>
							<li>Industry</li>
							<li>Age</li>
							<li>Category</li>
							<li>Model</li>
							<li>Manufacturer</li>
							<li>Location</li>
						</ul>
					</div>

					<!-- // Search box -->
					<?php get_template_part( 'template-parts/search-field' ); ?>

					<!-- // Right portion -->
					<div class="right">
						<h1>search</h1>
						<h5>used machines</h5>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- // Machine Category -->
	<div class="fullWidth_wrapper machineCategoryBg">
		<div class="site_container">
			<div class="machineCat_wrapper">
				<div class="machineCat_inner">
					<ul>
						<?php
							$post_loop = new WP_Query(array(
								'post_type'      => 'machine_industry',
								// 'orderby'	     => 'post_id',
								'posts_per_page' => '50',
								'order'		     => 'ASC',
								'orderby'        => 'menu_order'
							));
						?>
						<?php
							if ($post_loop->have_posts()) :
								while ($post_loop->have_posts()) : $post_loop->the_post();?>
									<li class="">
										<?php $industry_img = get_field('thumbnail'); ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<span class="thumb" style="background-image: url(<?php echo $industry_img;?>);">
											</span>
											<span class="overlayColor" style="background-color: rgba(<?php the_field('color_pattern'); ?>);"></span>
											<div class="title" style="background-color: <?php the_field('background_color'); ?>">
												<span><?php the_title(); ?> <span class="machinesCount">(20,000 listings)</span></span>
											</div>
										</a>
									</li>
								<?php endwhile;
								else : echo 'No industry found';
							endif;
						?>

						<!-- // Only for iPad -->
						<!-- <li class="onlyForiPad">
							<a href="https://machinelista.com/machine_industry/used-construction-machinery/" title="Construction">
								<span class="thumb" style="background-image: url(https://machinelista.com/wp-content/uploads/2021/11/ws_e04366_001.jpg);">
								</span>
								<span class="overlayColor" style="background-color: rgba(cp_orange);"></span>
								<div class="title" style="background-color: #e1ae2b">
									<span>Construction</span>
								</div>
							</a>
						</li> -->
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- // Manufacturer -->
	<div class="fullWidth_wrapper manufacturer_bg">
		<div class="site_container">
			<div class="manufacturer_wrapper">
				<div class="manufacturer_inner">
					<ul>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/John_Deere.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/pottinger.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/dmgMori.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/mikron.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/new-holland.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/Zeppelin.jpg" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/stahl.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/krauss-maffei.png" alt=""></li>
					</ul>

					<ul>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/winnebago.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/kuhn.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/urschel.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/kaltenbach.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/clark.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/heidelberg.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/bobst.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/minster.jpeg" alt=""></li>
					</ul>

					<ul>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/ingersoll-rand.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/mol-mark-anoy.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/Hiab.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/kia.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/okamoto.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/komatsu.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/beckman-coulter.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/makino.png" alt=""></li>
					</ul>
				</div>
				
				<div class="manufacturer_inner">
					<ul>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/pottinger.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/dmgMori.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/krauss-maffei.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/new-holland.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/stahl.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/kaltenbach.png" alt=""></li>
					</ul>

					<ul>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/winnebago.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/kuhn.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/urschel.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/clark.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/bobst.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/beckman-coulter.png" alt=""></li>
					</ul>

					<ul>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/ingersoll-rand.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/okamoto.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/kia.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/makino.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/Hiab.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/heidelberg.png" alt=""></li>
					</ul>
					<ul>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/mol-mark-anoy.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/komatsu.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/beckman-coulter.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/minster.jpeg" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/Zeppelin.jpg" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/John_Deere.png" alt=""></li>
					</ul>
				</div>

				<div class="manufacturer_inner">
					<ul>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/mol-mark-anoy.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/komatsu.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/ingersoll-rand.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/beckman-coulter.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/clark.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/winnebago.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/heidelberg.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/urschel.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/makino.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/bobst.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/pottinger.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/minster.jpeg" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/new-holland.png" alt=""></li>
						<li><img src="<?php rooturi(); ?>/img/Manufacturer/dmgMori.png" alt=""></li>
					</ul>
				</div>

				<div class="manufacturer_inner">
					<img src="<?php rooturi(); ?>/img/Manufacturer-brands.png" alt="">
				</div>
			</div>
		</div>
	</div>

	<!-- // Listing amount -->
	<?php // get_template_part( 'template-parts/stats' ); ?>

	<!-- // List your machine -->
	<div class="fullWidth_wrapper">
		<div class="site_container">
			<div class="machine_quote_wrapper">
				<div class="machine_quote_inner">
					<div class="left">
						<span class="background_text">listings</span>
						<div class="info">
							<h2>Direct links to seller <br> Optimize search results</h2>
							<p>Boost your search engine presence by <br> listing your website inventory on Machinelista</p>
						</div>
					</div>

					<div class="right">
						<a href="/listing">
							<!-- <i class="fas fa-plus"></i> -->List Your Machinery
							<svg width="11px" height="10px" viewBox="0 0 11 10" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="svg replaced-svg">
							    <!-- Generator: Sketch 40.1 (33804) - http://www.bohemiancoding.com/sketch -->
							    <title>btn-orange-arrow</title>
							    <desc>Created with Sketch.</desc>
							    <defs></defs>
							    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <g fill="#fff">
							            <g transform="translate(1.000000, 1.000000)">
							                <path d="M8.39352641,4.05798322 C8.41108654,3.86630731 8.34747889,3.66890603 8.20358297,3.52220603 L4.94087694,0.195919957 C4.68412676,-0.0658334821 4.2677123,-0.0651668627 4.01047236,0.197085884 C3.751439,0.461167008 3.7527204,0.88401234 4.00932872,1.14562116 L6.85810012,4.0499063 L4.00870997,6.95482224 C3.75195979,7.21657568 3.75261367,7.64110478 4.00985361,7.90335752 C4.26888697,8.16743865 4.68364986,8.16613227 4.94025818,7.90452345 L8.20296422,4.57823738 C8.34285833,4.43561716 8.40633495,4.24467251 8.39352641,4.05798322 Z"></path>
							                <path d="M4.5769915,4.05798322 C4.59455164,3.86630731 4.53094399,3.66890603 4.38704807,3.52220603 L1.12434203,0.195919957 C0.867591859,-0.0658334821 0.451177393,-0.0651668627 0.193937457,0.197085884 C-0.0650959098,0.461167008 -0.0638145053,0.88401234 0.192793816,1.14562116 L3.04156522,4.0499063 L0.192175061,6.95482224 C-0.0645751132,7.21657568 -0.0639212358,7.64110478 0.193318701,7.90335752 C0.452352067,8.16743865 0.867114955,8.16613227 1.12372328,7.90452345 L4.38642931,4.57823738 C4.52632342,4.43561716 4.58980005,4.24467251 4.5769915,4.05798322 Z"></path>
							            </g>
							        </g>
							    </g>
							</svg>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

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