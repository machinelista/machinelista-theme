<?php
	/*
		Template name: Advertise
	*/
?>
<?php get_header(); ?>

<body <?php body_class( $class = 'advertise' ); ?>>

	<!-- Page specific CSS -->
	<style>
		.listing_amount_bg {
			margin-top: 106px;
		}
		.page_features_wrapper {
			padding: 25px 26px 25px 66px;
		}
		.page_features_wrapper .left ul {
			grid-template-columns: 1fr;
		}
		.page_features_wrapper .right {
			position: relative;
			bottom: -3px;
		}
		/*-----------------*/
		.machine_quote_wrapper .machine_quote_inner {
			grid-template-columns: 60% 40%;
		}
		.machine_quote_wrapper .left .info {
			padding: 70px 60px;
		}
		/*---------------------*/
		.page_content_inner {
			grid-template-columns: 1fr 1fr;
			padding-top: 70px;
			padding-bottom: 95px;
			align-items: flex-start;
		}
		.page_content_inner:not(.page_content_inner2) {
			padding-bottom: 49px;
		}
		.page_content_inner h2 {
			font-size: 48px;
			text-align: left;
		}
		.page_content_inner.page_content_inner2 h2 {
			text-align: right;
		}
		.page_content_inner h2.thin_h2 {
			font-size: 48px;
			margin-bottom: 0;
			font-weight: normal;
			line-height: 1em;
		}
		.page_content_inner .right h2 {
			/*margin-bottom: 80px;*/
			margin-bottom: 50px;
			/*text-align: center;*/
		}
		.page_content_inner .right {
			padding: 0;
		}
		.page_content_inner .img_holder img {
			width: 292px;
			height: 337px;
			bottom: unset;
			left: 50px;
		}
		.page_content_inner .img_holder:before {
			content: '';
			width: 278px;
			height: 328px;
			background-color: rgba(193, 184, 0, 0.81);
			position: absolute;
			z-index: 5;
			left: 30%;
			top: -50px;
		}
		.page_content_inner .img_holder:after {
			content: '';
			width: 345px;
			height: 397px;
			background-color: rgba(60, 135, 37, 0.18);
			position: absolute;
			z-index: 5;
			left: 23%;
			top: -25px;
		}
		/*----------------*/
		.ad_size_bg {
			/*background-color: #f3f3f3;*/
			background-color: rgba(243, 243, 243, 0.40);
			margin-bottom: 70px;
			padding: 40px 0px;
		}
		/*---------------*/
		.page_features_wrapper .right h5 {
			font-weight: bold;
			line-height: 1em;
		}
		/*----------------*/
		header {
		    grid-template-columns: 3fr 7fr;
		}
		/*--------------------*/
		.page_content_inner .proImg img {
			width: 100%;
			max-width: 450px;
			display: block;
			margin: 0 auto;
			margin-top: 165px;
		}
		.page_content_inner h2.thin_h2 {
			font-size: 48px;
			margin-bottom: 0;
			font-weight: normal;
			line-height: 1em;
		}
	</style>

	<!-- // Header -->
	<div class="fullWidth_wrapper sticky_header">
		<div class="site_container">
			<header>
				<!-- // Logo -->
				<?php get_template_part( 'template-parts/logo' ); ?>

				<!-- // Search box -->
				<?php //get_template_part( 'template-parts/search-field' ); ?>

				<!-- // Nav -->
				<?php get_template_part( 'menu-parts/main-menu' ); ?>
			</header>
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
							<li>Machine Dealers</li>
							<li>Machine Auctioneers</li>
							<li>Manufacturers & Industry</li>
						</ul>
					</div>

					<!-- // Right portion -->
					<div class="right">
						<h1>Advertise</h1>
						<h5>Banners</h5>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- // Listing amount -->
	<?php get_template_part( 'template-parts/stats' ); ?>

	<!-- // Ad Sizes -->
	<div class="fullWidth_wrapper ad_size_bg">
		<div class="site_container">
			<div class="ad_size_container">
				<div class="ad_size_inner">
					<div class="left">
						<img src="https://machinelista.com/wp-content/uploads/2023/01/Devices.png" alt="">
					</div>
					<div class="right">
						<span>Ipad - Width 825 (px)  x Height 150 (px)</span>
						<span>Mobile -  Width 414 (px) x Height 130 (px)</span>
						<span>Desktop  - Width 1250 (px) x Height 170 (px)</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- // Ad -->
	<div class="fullWidth_wrapper">
		<div class="site_container">
			<div class="ad_container">
				<div class="ad_inner">
					<div class="ad_holders">
						<!-- <a href="#">
							<img src="<?php rooturi(); ?>/img/ad-1.png" alt="">
						</a> -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- // Page content -->
	<div class="fullWidth_wrapper page_content_bg">
		<div class="site_container">
			<div class="page_content_wrapper">
				<div class="page_content_inner">
					<div class="left">
						<h2 class="thin_h2"><?php the_field("Sec1title_1"); ?></h2>
						<h2 class="thin_h2"><?php the_field("Sec1title_2"); ?></h2>
						<h2><?php the_field("Sec1title_3"); ?></h2>

						<?php the_field("list_features_advertise"); ?>
					</div>
					<div class="right">
						<div class="proImg">
							<img src="<?php the_field("sec_image"); ?>" alt="">
						</div>
					</div>
				</div>

				<!-- // Section 2 -->
				<div class="page_content_inner page_content_inner2">
					<div class="left">
						<div class="proImg">
							<img src="<?php the_field("sec_image_2"); ?>" alt="">
						</div>
					</div>
					<div class="right">
						<h2 class="thin_h2"><?php the_field("Sec2title_1"); ?></h2>
						<h2 class="thin_h2"><?php the_field("Sec2title_2"); ?></h2>
						<h2><?php the_field("Sec2title_3"); ?></h2>

						<?php the_field("list_features_advertise2"); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- // List your machine -->
	<div class="fullWidth_wrapper">
		<div class="site_container">
			<div class="machine_quote_wrapper">
				<div class="machine_quote_inner">
					<div class="left">
						<span class="background_text">advertise</span>
						<div class="info">
							<h2> Direct Click Through to Website Ads Tagged to Critical Keywords</h2>
							<p>Boost your search engine presence and brand awareness by <br> purchasing our in category monthly advertising  campaigns</p>
						</div>
					</div>

					<div class="right">
						<a href="#popupForm2" class="openadFormPopup">
							<!-- <i class="fas fa-plus"></i> -->place your advertisement now
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