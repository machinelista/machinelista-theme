<?php get_header(); ?>
<body <?php body_class( $class = 'pageInSearchCategory' ); ?>>

	<!-- Page specific CSS -->
	<style>
		.header_bottom_border {
			margin-bottom: 0;
		}
		.collapse_catsSecWrapper {
			width: 100%;
			margin-top: 20px;
			padding: 10px 20px;
			text-align: right;
			/*border-top: 1px solid var(--siteBlueBorder);*/
		}
		.collapse_catsSecWrapper button {
			background-color: unset;
			border: none;
			/*color: #82A2B3;*/
			color: #5285a0;
			text-decoration: underline;
			cursor: pointer;
			font-size: 14px;
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
							<div class="search_box">
								<input type="text" placeholder="Manufacturer, Model or Category" id="search_box">
							</div>

							<!-- // Right portion -->
							<div class="right">
								<h1>search</h1>
								<h5>used machines</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- // Header bottom border -->
	<div class="fullWidth_wrapper">
		<div class="footer_top_border header_bottom_border">
			<ul>
				<?php
					for ($i = 1; $i <= 13; ++$i) {
						$border_image = get_field('border_image_' . $i);
						if (!empty($border_image)) {
							?>
								<li class="recentChange" style="background-image:url(<?php echo esc_url($border_image); ?>)"></li>
							<?php
						}
					}
				?>
			</ul>
		</div>
	</div>

	<!-- // Categories -->
	<div class="fullWidth_wrapper inSearchCategory">
		<div class="fullWidth_wrapper currentCat">
			<div class="site_container">
				<h3><?php the_title(); ?></h3>
			</div>
		</div>
		<div class="fullWidth_wrapper currentCat fullWidthBorder">
			<div class="site_container">
				<div class="title">
					Search by Category
				</div>
			</div>
		</div>

		<div class="site_container" id="categoryList">
			<div class="categories_wrapper">
				<div class="catsInner">
					<div class="allCatsExpaned categoryPart">
						<div class="single_cat">
							<div class="single_cat_inner sByCats">
								<ul>
									<?php
										$currentIndustry = get_the_title();
										global $post;
			    						$post_slug = $post->post_name;

										$terms = get_the_terms( $post->ID , 'machine_category' );
										// $terms = get_terms( array(
										//     'taxonomy' => 'machine_category',
										//     'hide_empty' => false,
										// ) );

										if ($terms) {
											foreach ( $terms as $term ) {
												echo '<li><a href="/machine_category/'.$term->slug.'/?industryName='.$post_slug.'">';
												echo $term->name, ' ';

												/*$filter_count = new WP_Query( array( 
														'post_type' => 'machine',
														'tax_query' => array(
												        array(
												        	'taxonomy' => 'machine_category',
									  						'field'    => 'name',
									  						'terms'    => $term->name,
												        ),
												    	),
												    	'meta_query' => array(
												    		'relation' => 'AND',
													    	array(
													    		'key' => 'choose_industry',
													    		'value' => $currentIndustry,
													    		'compare' => '='
													    	),
													    	array(
																'key' => 'delisted',
																'type' => 'BOOLEAN',
																'value' => 1,
																'compare' => '!=',
															),
													   ),
											    ) );*/

												// $count = $filter_count->found_posts;

												// Use get_posts to get the count of posts instead of WP_Query
												$posts = get_posts(array(
													'post_type' => 'machine',
													'tax_query' => array(
														array(
															'taxonomy' => 'machine_category',
															'field'    => 'name',
															'terms'    => $term->name,
														),
													),
													'meta_query' => array(
														'relation' => 'AND',
														array(
															'key'     => 'choose_industry',
															'value'   => $currentIndustry,
															'compare' => '='
														),
														array(
															'key'     => 'delisted',
															'value'   => 1,
															'compare' => '!=',
														),
													),
													'fields' => 'ids', // Only retrieve IDs to optimize
													'numberposts' => -1, // Retrieve all matching posts
												));

												$count = count($posts);

												echo '<span class="count">',$count, '</span>';
												echo '</a></li>';
											}
										}
									?>
								</ul>
								<div class="collapse_catsSecWrapper">
									<button class="collapse_catsSec">
										View All
									</button>
								</div>
							</div>  
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="fullWidth_wrapper currentCat fullWidthBorder">
			<div class="site_container">
				<div class="title">
					Search by Manufacturer
				</div>
			</div>
		</div>

		<div class="site_container" id="manufacturerList">
			<div class="categories_wrapper">
				<div class="catsInner">
					<div class="allCatsExpaned manufacturerPart">
						<div class="single_cat">
							<div class="single_cat_inner sByMan">
								<ul>
									<?php
										$tterms = get_the_terms( $post->ID , 'machine_manufacturer' );

										if ($tterms) {
											foreach ( $tterms as $tterm ) {
												echo '<li><a href="/machine_manufacturer/'.$tterm->slug.'/?industryName='.$post_slug.'">';
												echo $tterm->name, ' ';

												/*$filter_count = new WP_Query( array( 
														'post_type' => 'machine',
														'tax_query' => array(
												        array(
												        	'taxonomy' => 'machine_manufacturer',
									  						'field'    => 'name',
									  						'terms'    => $tterm->name,
												        ),
												    	),
												    	'meta_query' => array(
													    	'relation' => 'AND',
													    	array(
													    		'key' => 'choose_industry',
													    		'value' => $currentIndustry,
													    		'compare' => '='
													    	),
													    	array(
																'key' => 'delisted',
																'type' => 'BOOLEAN',
																'value' => 1,
																'compare' => '!=',
															),
													   ),
											    ) );
												$count = $filter_count->found_posts;*/

												// Use get_posts to get the count of posts instead of WP_Query
												$posts = get_posts(array(
													'post_type' => 'machine',
													'tax_query' => array(
														array(
															'taxonomy' => 'machine_manufacturer',
															'field'    => 'name',
															'terms'    => $tterm->name,
														),
													),
													'meta_query' => array(
														'relation' => 'AND',
														array(
															'key'     => 'choose_industry',
															'value'   => $currentIndustry,
															'compare' => '='
														),
														array(
															'key'     => 'delisted',
															'value'   => 1,
															'compare' => '!=',
														),
													),
													'fields' => 'ids', // Only retrieve IDs to optimize
													'numberposts' => -1, // Retrieve all matching posts
												));

												$count = count($posts);

												echo '<span class="count">',$count, '</span>';
												echo '</a></li>';
											}
										}
									?>
								</ul>
								<div class="collapse_catsSecWrapper">
									<button class="collapse_catsSec">
										View All
									</button>
								</div>
							</div>  
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- // Industry info form -->
	<!-- <form class="industryInfoForm" action="" style="display: none;">
			<?php 
			    // global $post;
			    // $post_slug = $post->post_name;
			    // echo $post_slug;
			?>
		<input type="text" name="industryName" value="<?php echo $post_slug; ?>">
	</form> -->

	<!-- // Footer top border -->
	<div class="fullWidth_wrapper">
		<div class="footer_top_border">
			<ul>
				<li style="background-image:url(<?php the_field('border_image_1'); ?>)"></li>
				<li style="background-image:url(<?php the_field('border_image_2'); ?>)"></li>
				<li style="background-image:url(<?php the_field('border_image_3'); ?>)"></li>
				<li style="background-image:url(<?php the_field('border_image_4'); ?>)"></li>
				<li style="background-image:url(<?php the_field('border_image_5'); ?>)"></li>
				<li style="background-image:url(<?php the_field('border_image_6'); ?>)"></li>
				<li style="background-image:url(<?php the_field('border_image_7'); ?>)"></li>
				<li style="background-image:url(<?php the_field('border_image_8'); ?>)"></li>
				<li style="background-image:url(<?php the_field('border_image_9'); ?>)"></li>
				<li style="background-image:url(<?php the_field('border_image_10'); ?>)"></li>
				<li style="background-image:url(<?php the_field('border_image_11'); ?>)"></li>
				<li style="background-image:url(<?php the_field('border_image_12'); ?>)"></li>
				<li style="background-image:url(<?php the_field('border_image_13'); ?>)"></li>
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

			if ($(window).width() <= 950 && $(window).width() >= 481) { 
				$('.single_cat_inner.sByCats ul li:gt(11), .single_cat_inner.sByMan ul li:gt(11)').hide();

				$(".sByCats .collapse_catsSec").click(function() {
					if ($('.sByCats ul li:gt(11)').is( ":visible" )) {
						$('.sByCats ul li:gt(11)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sByCats ul li:gt(11)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
				// -----------------------------------------
				$(".sByMan .collapse_catsSec").click(function() {
					if ($('.sByMan ul li:gt(11)').is( ":visible" )) {
						$('.sByMan ul li:gt(11)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sByMan ul li:gt(11)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
			}

			if ($(window).width() > 320 && $(window).width() <= 480) { 
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

			// ======== Vertical allignment  ========
			function verticalAlign(secName, column = 4, plus = 1) {
				var getActiveCatList = $("#"+secName+" ul li:visible").length;
				getActiveCatList = (getActiveCatList / column) + plus;
				getActiveCatList = Math.round(getActiveCatList);

				$("#"+secName+" ul").css({
					'grid-auto-flow': 'column',
					'grid-template-rows': 'repeat('+getActiveCatList+', auto)'
				});
			}
			
			if ( $(window).width() > 1050 ) {
				verticalAlign('categoryList');
				verticalAlign('manufacturerList');
			} else if ( $(window).width() > 900 ) { //for ipad 12.9"
				verticalAlign('categoryList', 3, 1);
				verticalAlign('manufacturerList', 3, 1);
			} else if ( $(window).width() > 480 ) {
				verticalAlign('categoryList', 3, 0);
				verticalAlign('manufacturerList', 3, 0);
			} else if ( $(window).width() < 480 ) {
				verticalAlign('categoryList', 1, 0);
				verticalAlign('manufacturerList', 1, 0);
			}

			$("button.collapse_catsSec").click(function(event) {
				var getActiveUl = $(this).parents('.site_container').attr('id');

				if ( $(window).width() > 480 && $(window).width() < 900) {
					if ( $(this).text() == 'View Less' ) {
						verticalAlign(getActiveUl, 3);
						console.log(getActiveUl);
					} else {
						verticalAlign(getActiveUl, 3, 0);
						console.log($(this).text());
					}
						
				} else if ( $(window).width() < 480 ) {
					verticalAlign(getActiveUl, 1, 0);
				}
			});
		});

		// jQuery(document).ready(function($) {
		// 	$(".allCatsExpaned .single_cat li a").click(function(event) {
		// 		event.preventDefault();
		// 		// var getLink = $(this).attr('href');
		// 		// $("form.carryIndustryInfo").attr('action', getLink);
		// 		$("form.carryIndustryInfo").submit();
		// 	});
		// });

		// ===== Send industry info form ====
		/*$(".allCatsExpaned .single_cat li a").click(function(event) {
			event.preventDefault();
			var getOwnLink = $(this).attr('href');
			$("form.industryInfoForm").attr('action', getOwnLink);
			$("form.industryInfoForm").submit();
		});*/
	</script>

	<?php wp_footer(); ?>
</body>
</html>