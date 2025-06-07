
<?php get_header(); ?>
<body <?php body_class( $class = 'singleProduc' ); ?>>

	<!-- Page specific CSS -->
	<style>
		.header_bottom_border {
			margin-bottom: 0;
		}
		.single_product_wrapper .slider_nav .slick-arrow {
			display: none !important;
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

	<!-- // Single Product -->
	<div class="fullWidth_wrapper">
		<div class="fullWidth_wrapper singleProductTitle">
			<div class="site_container">
				<h2>Machine Photos</h2>
			</div>
		</div>
		<div class="site_container">
			<div class="single_product_wrapper">
				<div class="single_product_inner">
					<div class="product_breadcrumb">
						<?php
							// Get category
							$getCat = get_the_term_list( 
								$post->ID,
								'machine_category',
							);
							$getCat = strip_tags($getCat);

							// Get manufacturer
							$getMan = get_the_term_list( 
								$post->ID,
								'machine_manufacturer',
								'',
								' | '
							);
							$getMan = strip_tags($getMan);

							// Get model
							$getModel = get_the_term_list( 
								$post->ID,
								'machine_model',
							);
							$getModel = strip_tags($getModel);

							// Get Country
							$getCountry = get_the_term_list( 
								$post->ID,
								'machine_country',
								'',
								' - '
							);
							$getCountry = strip_tags($getCountry);
						?>
						<p>
							<?php the_field('choose_industry'); ?> - 
							<?php
								if ( !empty($getCat) ) {
									echo $getCat . ' -';
								} 
							?>
							<?php
								if ( !empty($getMan) ) {
									echo $getMan . ' -';
								}
							?>
							<?php
								if ( !empty($getModel) ) {
									echo $getModel . ' -';
								}
							?> 
							<?php
								if ( !empty($getCountry) ) {
									echo $getCountry . ' -';
								}
							?>
							<?php //the_field('machine_countryy'); ?> 
							<!-- NSW -  -->
							Listing ID: <?php the_ID(); ?>
						</p>
					</div>
					<div class="product_info">
						<div class="left">
							<div class="product_slider">
								<div class="slider_images">
									<?php
										if (!empty(get_field('image_1'))) {?>
											<div class="s_item">
												<img src="<?php the_field('image_1'); ?>" alt="">
											</div>
										<?php }
										if (!empty(get_field('image_2'))) {?>
											<div class="s_item">
												<img src="<?php the_field('image_2'); ?>" alt="">
											</div>
										<?php }
										if (!empty(get_field('image_3'))) {?>
											<div class="s_item">
												<img src="<?php the_field('image_3'); ?>" alt="">
											</div>
										<?php }
										if (!empty(get_field('image_4'))) {?>
											<div class="s_item">
												<img src="<?php the_field('image_4'); ?>" alt="">
											</div>
										<?php }
										if (!empty(get_field('image_5'))) {?>
											<div class="s_item">
												<img src="<?php the_field('image_5'); ?>" alt="">
											</div>
										<?php }
										if (!empty(get_field('image_6'))) {?>
											<div class="s_item">
												<img src="<?php the_field('image_6'); ?>" alt="">
											</div>
										<?php }
										if (!empty(get_field('image_7'))) {?>
											<div class="s_item">
												<img src="<?php the_field('image_7'); ?>" alt="">
											</div>
										<?php }
										if (!empty(get_field('image_8'))) {?>
											<div class="s_item">
												<img src="<?php the_field('image_8'); ?>" alt="">
											</div>
										<?php }
										if (!empty(get_field('image_9'))) {?>
											<div class="s_item">
												<img src="<?php the_field('image_9'); ?>" alt="">
											</div>
										<?php }
										if (!empty(get_field('image_10'))) {?>
											<div class="s_item">
												<img src="<?php the_field('image_10'); ?>" alt="">
											</div>
										<?php }
									?>
								</div>
								<div class="slider_nav">
									<?php
										if (!empty(get_field('image_1'))) {?>
											<div class="s_nav">
												<img src="<?php the_field('image_1'); ?>" alt="">
											</div>
										<?php }
										if (!empty(get_field('image_2'))) {?>
											<div class="s_nav">
												<img src="<?php the_field('image_2'); ?>" alt="">
											</div>
										<?php }
										if (!empty(get_field('image_3'))) {?>
											<div class="s_nav">
												<img src="<?php the_field('image_3'); ?>" alt="">
											</div>
										<?php }
										if (!empty(get_field('image_4'))) {?>
											<div class="s_nav">
												<img src="<?php the_field('image_4'); ?>" alt="">
											</div>
										<?php }
										if (!empty(get_field('image_5'))) {?>
											<div class="s_nav">
												<img src="<?php the_field('image_5'); ?>" alt="">
											</div>
										<?php }
										if (!empty(get_field('image_6'))) {?>
											<div class="s_nav">
												<img src="<?php the_field('image_6'); ?>" alt="">
											</div>
										<?php }
										if (!empty(get_field('image_7'))) {?>
											<div class="s_nav">
												<img src="<?php the_field('image_7'); ?>" alt="">
											</div>
										<?php }
										if (!empty(get_field('image_8'))) {?>
											<div class="s_nav">
												<img src="<?php the_field('image_8'); ?>" alt="">
											</div>
										<?php }
										if (!empty(get_field('image_9'))) {?>
											<div class="s_nav">
												<img src="<?php the_field('image_9'); ?>" alt="">
											</div>
										<?php }
										if (!empty(get_field('image_10'))) {?>
											<div class="s_nav">
												<img src="<?php the_field('image_10'); ?>" alt="">
											</div>
										<?php }
									?>
								</div>
							</div>
						</div>

						<div class="right">
							<div class="top">
								<h2 class="product_title">
									<?php
										if (!empty(get_field('machine_year'))) {
											the_field('machine_year'); echo ' -';
										}
									?>
									<?php the_title(); ?>
								</h2>
								<div class="product_dsc">
									<?php the_field('machine_specs'); ?>
								</div>
								<ul class="country_price">
									<li class="product_country">
										<?php
											$flag_name_data = "unknown";
											$terms = get_the_terms( $post->ID, 'machine_country' );
											if ($terms == true) {
												foreach ( $terms as $term ) {
													if ($term->parent == 0) {						            	
														$flag_name_data = $term->name;
									            }
												}
											}
										?>
										<div class="applyCountryFlag">
											<!-- <img src="<?php the_field('machine_country_flag'); ?>" alt=""> -->
											<!-- Apply flag to applyCountryFlag div -->
											<?php /*echo $flag_name_data;*/ ShowFlag($flag_name_data); ?>
										</div>
										<span>
											<?php //the_field('machine_country'); ?>
											<?php
												// $terms = get_the_terms( $post->ID, 'machine_country' );

												if ($terms == true) {
													foreach ( $terms as $term ) {
											            if ($term->parent !== 0) {
											            	echo $term->name . ', ';
											            }
											        }
													foreach ( $terms as $term ) {
											            if ($term->parent == 0) {
											            	echo $term->name;
											            }
											        }
												}
											?>
										</span>
									</li>
									<li class="product_price">
										<?php
											echo '<span style="display: inline-block;text-align: center;font-size: 17px;font-weight: bold;">';
											// the_field('currency_type');
										?>
										<?php
											if ( !empty(get_field('machine_price')) && get_field('machine_price') !== "N/A" ) {
												the_field('currency_type');
												$machine_price = get_field('machine_price');
												$formatted_price = number_format($machine_price);
												echo $formatted_price;
											}
											if ( get_field('machine_price') == "N/A" && !empty(get_field('machine_price')) ) {
												the_field('currency_type');
												echo ' ';
												the_field('machine_price');
											}
											echo '</span>';
										?>	
									</li>
								</ul>
							</div>

							<div class="bottom">
								<div class="contact_seller">
									<!-- <img src="<?php rooturi(); ?>/img/Product-contact-bg.jpg" alt=""> -->
									<div class="overlay">
										<?php
											if (get_field('using_email') == true) {
												$customClass = 'openDRFormPopup';
											} else {
												$customClass = null;
											}
										?>
										<a href="<?php the_field('seller_contact_link'); ?>" class="<?php echo $customClass; ?>" target="_blank">contact seller</a>
										<div class="machineDHidden"><?php the_field('dealer_name'); ?></div>
										<div class="machineUrlHidden"><?php the_permalink(); ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- // Related Product -->
	<div class="fullWidth_wrapper related_products searched_page_wrapper">
		<div class="fullWidth_wrapper related_products_heading">
			<div class="site_container">
				<h2>Similar Machines</h2>
			</div>
		</div>


		<?php
			$getCat = get_the_term_list( 
				$post->ID,
				'machine_category',
				$before = '<li>',
				$sep = ', ',
				$after = '</li>'
			);
			$getMan = get_the_term_list( 
				$post->ID,
				'machine_manufacturer',
				$before = '<li>',
				$sep = ', ',
				$after = '</li>'
			);
			$filter_count = new WP_Query( array( 
				'post_type' => 'machine',
				'tax_query' => array(
					// 'relation' => 'OR',
			        array(
			        	'taxonomy' => 'machine_category',
							'field'    => 'name',
							'terms'    => $getCat,
			        ),
			    //     array(
			    //     	'taxonomy' => 'machine_manufacturer',
							// 'field'    => 'name',
							// 'terms'    =>  $getMan,
			    //     ),
		    	),
		    	'posts_per_page' => 9,
		    ) );
		?>

		<div class="relatedMachinesWrapper">
			<div class="site_container">
				<div class="relatedMachinesInner">
					<?php
						if ($filter_count->have_posts()) {
					    	while ($filter_count->have_posts()) {
					    	    $filter_count->the_post();?>
					    	    <div class="sMachine">
					    	    	<?php 
										$img_1 = get_field('image_1');
										$img_2 = get_field('image_2');
										$img_3 = get_field('image_3');
										$img_4 = get_field('image_4');
										$img_5 = get_field('image_5');

									?>
					    	    	<a href="<?php the_permalink(); ?>">
										<div class="smThumb">
											<img src="<?php echo $img_1;?>" alt="">
										</div>
										<div class="smPrice">
											<?php
												if (!empty(get_field('machine_price')) && get_field('machine_price') !== "N/A") {
													echo '<span>';
														
													if ( !empty(get_field('machine_price')) && get_field('machine_price') !== "N/A" ) {
															the_field('currency_type');
															$machine_price = get_field('machine_price');
															$formatted_price = number_format($machine_price);
															echo $formatted_price;
														}
													echo '</span>';
												} elseif ( get_field('machine_price') == "N/A" && !empty(get_field('machine_price')) ) {
													echo '<span>';
													the_field('currency_type');
													the_field('machine_price');
													echo '</span>';
												}
											?>
										</div>
										<div class="smTitle">
											<h4><?php the_title(); ?></h4>
											<?php
												$terms = get_the_terms( $post->ID, 'machine_country' );
												if ($terms == true) {
													foreach ( $terms as $term ) {
														if ($term->parent == 0) {
															$flag_name_data = $term->name;
										            	/*$countryVariable['countryName'] = $term->name;
															$jsonCData = json_encode( $countryVariable );*/
										            }
													}
												}
											?>
											<div class="smFlag">
												<!-- <img src="<?php the_field('machine_country_flag'); ?>" alt=""> -->
												<?php ShowFlag($flag_name_data); ?>
											</div>
										</div>
									</a>
								</div>
					    	<?php }
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
				<?php
					$grabCurIndustry = get_field('choose_industry');

					// ------- Get ID from industry title ------
					function get_page_id_by_title($title) {
						$page = get_page_by_title($title,'' , $post_type = 'machine_industry');
						return $page->ID;
					}
					$title = $grabCurIndustry;
					// echo get_page_id_by_title($title);

					// -------- Get slug from industry ID ---------
					$post_id = get_page_id_by_title($title); //specify post id here
					$post = get_post($post_id); 
					$slug = $post->post_name;
					// echo $slug;
					// ------ Post loop -----
					$args = array(
						'post_type' => 'machine_industry',
						'post_per_page' => 1,
						'name' => $slug
					);
					$iQuery = new WP_Query($args);

					if ($iQuery->have_posts()) {
						$iQuery->the_post();?>
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
					<?php }
					wp_reset_query();
				?>
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

	<!-- // Popup form (Dealer Query) -->
	<div id="popupForm3">
		<div class="listingFormWrapper">
			<div class="listingForm_inner">
				<?php echo do_shortcode( '[contact-form-7 id="1815" title="Dealer Query"]' ); ?>

				<span class="close">
					<img style="width: 20px;" src="<?php rooturi(); ?>/img/close2.png" alt="">
				</span>
			</div>
		</div>
	</div>


	<script src="<?php echo rooturi(); ?>/js/slick.min.js"></script>
	<script>
		// Single Product Slider
		$(document).ready(function() {
			$('.slider_images').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: true,
				fade: true,
				asNavFor: '.slider_nav',
				dots: true,
				// prevArrow: '<span class="slick_prev"><i class="fas fa-chevron-left"></i></span>',
				// nextArrow: '<span class="slick_next"><i class="fas fa-chevron-right"></i></span>',
				prevArrow: '<span class="slick_prev"><i class="custom_left_arrow"></i></span>',
				nextArrow: '<span class="slick_next"><i class="custom_right_arrow"></i></span>'
			});

			$('.slider_nav').slick({
				slidesToShow: 4,
				slidesToScroll: 1,
				asNavFor: '.slider_images',
				dots: false,
				centerMode: false,
				focusOnSelect: true
			});
		});

		// Related Product Slider
		// $(document).ready(function() {
		// 	$('.pThumbSlider').slick({
		// 		arrows: true,
		// 		prevArrow: '<span class="slick_prev"><i class="custom_left_arrow"></i></span>',
		// 		nextArrow: '<span class="slick_next"><i class="custom_right_arrow"></i></span>'
		// 	});
		// });

		$(document).ready(function() {
			if ($(window).width() > 1024) {  
				$('.relatedMachinesInner').slick({
					slidesToShow: 5,
					slidesToScroll: 3,
					customPaging: '50px',
					arrows: true,
					prevArrow: '<span class="slick_prev"><i class="custom_left_arrow"></i></span>',
					nextArrow: '<span class="slick_next"><i class="custom_right_arrow"></i></span>'
				});
			}

			if ($(window).width() == 1024) {  
				$('.relatedMachinesInner').slick({
					slidesToShow: 4,
					slidesToScroll: 3,
					customPaging: '0px',
					arrows: true,
					prevArrow: '<span class="slick_prev"><i class="custom_left_arrow"></i></span>',
					nextArrow: '<span class="slick_next"><i class="custom_right_arrow"></i></span>',
					infinite: false,
				});
				$(".product_slider .slick-track").css('min-width', '1975px');
			}
			if ($(window).width() == 768) {  
				$('.relatedMachinesInner').slick({
					slidesToShow: 3,
					slidesToScroll: 1,
					customPaging: '50px',
					arrows: true,
					prevArrow: '<span class="slick_prev"><i class="custom_left_arrow"></i></span>',
					nextArrow: '<span class="slick_next"><i class="custom_right_arrow"></i></span>',
					infinite: false,
				});
			}
			if ($(window).width() <= 414) {  
				$('.relatedMachinesInner').slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					customPaging: '50px',
					arrows: true,
					prevArrow: '<span class="slick_prev"><i class="custom_left_arrow"></i></span>',
					nextArrow: '<span class="slick_next"><i class="custom_right_arrow"></i></span>',
					infinite: false,
				});
			}

			// ===================

			if ($(window).width() > 768 && $(window).width() <= 950) {  
				$('.relatedMachinesInner').slick({
					slidesToShow: 3,
					slidesToScroll: 1,
					customPaging: '50px',
					arrows: true,
					prevArrow: '<span class="slick_prev"><i class="custom_left_arrow"></i></span>',
					nextArrow: '<span class="slick_next"><i class="custom_right_arrow"></i></span>',
					infinite: false,
				});
			}
		});
	</script>

	<?php wp_footer(); ?>
</body>
</html>