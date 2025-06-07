<?php
	/*
		Template name: Auction
	*/
?>
<?php get_header(); ?>
<body <?php body_class( $class = 'auctionPage' ); ?>>

	<!-- Page specific CSS -->
	<style>
		.header_bottom_border {
			margin-bottom: 0;
		}
		/*----------------*/
		.allCatsExpaned {
			max-height: unset;
			overflow-y: unset;
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

	<!-- // Header bottom border -->
	<div class="fullWidth_wrapper">
		<div class="footer_top_border header_bottom_border">
			<?php get_template_part( 'template-parts/universalFooterBorder' ); ?>
		</div>
	</div>

	<!-- // Auctions -->
	<div class="fullWidth_wrapper category_bg">
		<div class="site_container">
			<div class="categories_wrapper">
				<div class="catsInner">
					<div class="catToggler">
						<div class="catsList">
							<div class="title">
								<span class="forDonly">Industry</span>
								<span class="forMonly">Choose Industry <!-- <i class="fas fa-angle-down"></i> --></span>
								<span class="line2"></span>
							</div>
							<ul>
								<?php
									$terms = get_terms( array(
										'taxonomy' => 'trade_service_industries',
										'hide_empty' => false)
									);

									if (! empty( $terms ) && is_array( $terms )) {
										foreach ( $terms as $term ) {
											$customLink = str_replace(' ', '-', $term->name);
											// $customLink = str_replace('&', '-', $term->name);
											echo '<li><a href="#'.$customLink.'">';
											echo $term->name;

											$posts = get_posts(array( 
													'post_type' => 'm_auction',
													'tax_query' => array(
											        array(
											        	'taxonomy' => 'trade_service_industries',
								  						'field'    => 'name',
								  						'terms'    => $term->name,
											        ),
											    ),
										    ));
											$count = count($posts);

											/*$filter_count = new WP_Query( array( 
													'post_type' => 'm_auction',
													'tax_query' => array(
											        array(
											        	'taxonomy' => 'trade_service_industries',
								  						'field'    => 'name',
								  						'terms'    => $term->name,
											        ),
											    ),
										    ) );
											$count = $filter_count->found_posts;*/

											echo '<span class="count">',$count, '</span>';
										echo '</a></li>';
										}
									}
								?>
							</ul>
						</div>

						<div class="allCatsExpaned auctionPart">
							<?php
								$terms = get_terms( array(
									'taxonomy' => 'trade_service_industries',
									'hide_empty' => false) 
								);

								if (! empty( $terms ) && is_array( $terms )) {
									foreach ( $terms as $term ) { 
										$filter_count = new WP_Query(array( 
											'post_type' => 'trade-services',
											'posts_per_page'  => -1,
											// 'order'		     => 'DSC',
											'tax_query' => array(
												array(
													'taxonomy' => 'trade_service_industries',
													'field'    => 'name',
													'terms'    => $term->name,
												),
											),
											'fields' => 'ids',
											// 'numberposts' => -1,
										));
										$count = $filter_count->found_posts;
										$customLink = str_replace(' ', '-', $term->name);
										?>

										<div class="single_cat" data="<?php echo $customLink; ?>">
											<div class="title">
												<?php echo $term->name; ?> <span class="available_product"><?php echo $count; ?></span>
												<span class="line"></span>
											</div>
											<div class="single_cat_inner auction_list">
												<ul>
												<?php
													if ($filter_count->have_posts()) {
														while ($filter_count->have_posts()) {
														    $filter_count->the_post(); ?>

														<li>
															<a href="<?php the_field('external_link'); ?>" target="_blank">
																<div class="thumb">
																	<img src="<?php the_field('thumbnail'); ?>" alt="">
																</div>
																<div class="info">
																	<p>
																		<span class="underline"><?php the_field('date'); ?></span> - <?php the_field('description'); ?>
																	</p>
																</div>
															</a>
															<span class="line3"></span>
														</li>

													<?php } }
												?>
												</ul>
											</div>  
										</div>
									<?php }
								}
							?>

							<!-- <div class="single_cat" data="<?php the_field('industry'); ?>">
								<div class="title">
									Agriculture <span class="available_product">5</span>
									<span class="line"></span>
								</div>
								<div class="single_cat_inner auction_list">
									<ul>
										<li>
											<a href="#">
												<div class="thumb">
													<img src="<?php rooturi(); ?>/img/auction-thumb.png" alt="">
												</div>
												<div class="info">
													<p>
														<span class="underline">August 13th, 8.00am August 21st 4.30pm</span> - Leading Battery Mfg. Facility – Spectacular OfferingHearing Aid & Battery Production LinesWaterbury Farrel Transfer & Bruderer High Speed StampingCincinnati Roboshot 110 Ton Molders, Plastics Support Ovens, Processing, Packaging, Toolroom, Material Handling​
													</p>
												</div>
											</a>
											<span class="line3"></span>
										</li>
										<li>
											<a href="#">
												<div class="thumb">
													<img src="<?php rooturi(); ?>/img/auction-thumb.png" alt="">
												</div>
												<div class="info">
													<p>
														<span class="underline">August 13th, 8.00am August 21st 4.30pm</span> - Leading Battery Mfg. Facility – Spectacular OfferingHearing Aid & Battery Production LinesWaterbury Farrel Transfer & Bruderer High Speed StampingCincinnati Roboshot 110 Ton Molders, Plastics Support Ovens, Processing, Packaging, Toolroom, Material Handling​
													</p>
												</div>
											</a>
											<span class="line3"></span>
										</li>
										<li>
											<a href="#">
												<div class="thumb">
													<img src="<?php rooturi(); ?>/img/auction-thumb.png" alt="">
												</div>
												<div class="info">
													<p>
														<span class="underline">August 13th, 8.00am August 21st 4.30pm</span> - Leading Battery Mfg. Facility – Spectacular OfferingHearing Aid & Battery Production LinesWaterbury Farrel Transfer & Bruderer High Speed StampingCincinnati Roboshot 110 Ton Molders, Plastics Support Ovens, Processing, Packaging, Toolroom, Material Handling​
													</p>
												</div>
											</a>
											<span class="line3"></span>
										</li>
									</ul>
								</div>  
							</div> -->
						</div>
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

	<script>
		// $(document).ready(function() {
		// 	$(".catsList a").click(function() {
		// 	    $('html, body').animate({
		// 	        scrollTop: $(".category_bg").offset().top -90
		// 	    }, 500);
		// 	});
		// });
		$(document).ready(function() {
			var whatever = $(".allCatsExpaned .title");
			var whateverWidth = $(".allCatsExpaned .title").width();
			var rt = ($(window).width() - (whatever.offset().left + whatever.outerWidth()));
			var totval = whateverWidth + rt;
			$(".line, .line3").width(totval);
			// console.log(totval);
			if ($(window).width() < 480) {
				$(".line, .line3").width($(window).width());
			}


			var whatever2 = $(".catsList .title");
			var whatever2Width = $(".catsList .title").width();
			var rt2 = ($(window).width() - (whatever2.offset().left + whatever2.outerWidth()));
			var totval2 = whatever2Width + whatever2.offset().left;
			$(".line2").width(totval2);
			// console.log(totval2);
			if ($(window).width() < 480) {
				$(".line2").width($(window).width());
			}

			// ==================
			$(".catsList .title .forMonly").click(function(event) {
				$(this).parent().next('ul').toggle(300);
			});
		});
		
		$(window).resize(function() {
			var whatever = $(".allCatsExpaned .title");
			var whateverWidth = $(".allCatsExpaned .title").width();
			var rt = ($(window).width() - (whatever.offset().left + whatever.outerWidth()));
			var totval = whateverWidth + rt;
			$(".line, line3").width(totval);
			// console.log(rt);
			if ($(window).width() < 480) {
				$(".line, .line3").width($(window).width());
			}

			var whatever2 = $(".catsList .title");
			var whatever2Width = $(".catsList .title").width();
			var rt2 = ($(window).width() - (whatever2.offset().left + whatever2.outerWidth()));
			var totval2 = whatever2Width + whatever2.offset().left;
			$(".line2").width(totval2);
			// console.log(rt2);
			if ($(window).width() < 480) {
				$(".line2").width($(window).width());
			}
		});

		// ======= Category toggle =======
		$(document).ready(function() {
			$(".catsList a").click(function() {
			    $('html, body').animate({
			        scrollTop: $(".category_bg").offset().top -120
			    }, 500);
			});
		});
		$(document).ready(function() {
			$(".single_cat").hide();
			$(".single_cat:first-child").show();

			$(".catsList ul li a").click(function(event) {
				var getTheTerget = $(this).attr('href');
				var trimTerget = getTheTerget.substring(1);

				$(".single_cat").hide();
				$(".single_cat[data="+trimTerget+"]").slideDown(500);

				// console.log(shootTerget);
			});
		});
	</script>

	<?php wp_footer(); ?>
</body>
</html>