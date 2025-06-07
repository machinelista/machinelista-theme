<?php
	/*
		Template name: Search
	*/
?>

<?php get_header(); ?>

<body <?php body_class( $class = 'pageSearch' ); ?>>
	<!-- Page specific CSS -->
	<style>
		 header {
		 	grid-template-columns: 2fr 2fr 3fr;
		 }
		.header_bottom_border {
			margin-bottom: 0;
		}
		body header .search_box {
			display: block;
		}
	</style>
	
	<!-- // Header -->
	<div class="fullWidth_wrapper sticky_header">
		<div class="site_container">
			<header>
				<!-- // Logo -->
				<?php get_template_part( 'template-parts/logo' ); ?>

				<!-- // Search box -->
				<?php get_template_part( 'template-parts/search-field' ); ?>

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
			<?php get_template_part( 'template-parts/universalFooterBorder' ); ?>
		</div>
	</div>

	<!-- // Searched Product -->
	<div class="fullWidth_wrapper searched_page_wrapper">
			
		<h4 style="text-align: center;margin: 30px;color: #82A2B3;">You are searching for: <?php echo $_GET['search_text']; ?> </h4>

		<!-- // List Filter -->
		<div class="fullWidth_wrapper filterAndInfoWrapper">
			<div class="filterAndInfo">
				<ul>
					<?php
						// Get searched value
						if (isset($_GET['search_text']) && !empty($_GET['search_text'])) {
							$text = $_GET['search_text'];
						}

						// Get filter value
						if (isset($_GET['fByPrice']) && !empty($_GET['fByPrice'])) {
							$fByPrice = $_GET['fByPrice'];
						} else {
							$fByPrice = null;
						}

						if (isset($_GET['fCond']) && !empty($_GET['fCond'])) {
							$fCond = $_GET['fCond'];
							$conditionArray = array(
					    		'key' => 'machine_condition',
					    		'value' => $fCond,
					    		'compare' => '='
					    	);
						} else {
							$conditionArray = array(
					    		'key' => 'machine_condition',
					    		'value' => 'Used',
					    		'compare' => '='
					    	);
						}

						if (isset($_GET['fYear']) && !empty($_GET['fYear'])) {
							$fYear = $_GET['fYear'];
							$minYear = substr($fYear, 0,4);
							$maxYear = substr($fYear, 7);
						} else {
							$minYear = 0;
							$maxYear = date("Y");
						}

						if (isset($_GET['fPrice']) && !empty($_GET['fPrice'])) {
							$triggerMetaKey = 'machine_price';
							$triggerOBy = 'meta_value';
							$fPrice = $_GET['fPrice'];
							if ($fPrice == 'Low to High') {
								$setOrder = 'ASC';
							} else {
								$setOrder = 'DSC';
							}
						}

						$category = get_queried_object();
						// echo $category->name;

						$args = array(
							'post_type' => 'machine',
							'post_status' => 'publish',
							'meta_query' => array(
								array(
									'key' => 'machine_price',
									'type' => 'NUMERIC',
									'value' => array(),
									'compare' => 'BETWEEN'
								),
								array(
									'key' => 'machine_year',
									'type' => 'NUMERIC',
									'value' => array($minYear, $maxYear),
									'compare' => 'BETWEEN'
								),
								$conditionArray,
							),
							'tag' => $fByPrice,
							's' => $text,
							'fields' => 'ids',
							'numberposts' => -1,
						);

						// Add an additional query to exclude posts where 'delisted' is true.
						// $args['meta_query'][] = array(
						// 	'key' => 'delisted',
						// 	'type' => 'NUMERIC',
						// 	'value' => 1,
						// 	'compare' => '!=',
						// );

						// $query = new WP_Query($args);
						$posts = get_posts($args);

						// $count = $query->found_posts;
						// $GLOBALS['count'] = $query->found_posts;
						$GLOBALS['count'] = count($posts);
					?>
					<li>Applicators Fertilizers</li>
					<li class="results">Results: <?php echo $count; ?> Listings</li>
					<form action="<?php echo get_category_link($category->term_id); ?>" class="machine_filter">
						<li class="fByPriceOffer">
							<!-- <div class="checkBox">
								<div class="square">
									<i class="far fa-square"></i>
								</div>
							</div> -->
							<input type="checkbox" id="fByPrice" name="fByPrice" value="poo">
							<label for="fByPrice">
								<div class="singleToggle">
									<div class="toggleHolder">
										<span class="toggleSwitch"></span>
									</div>
								</div>
								<span class="forDonly">Priced Only</span>
								<span class="forMonly">Priced Offers</span>
							</label>
						</li>
						<li class="fBycondition">
							<input type="checkbox" id="fCond" name="fCond" value="New">
							<label for="fByCond">
								<span class="forDonly">Used</span>
								<div class="singleToggle">
									<div class="toggleHolder">
										<span class="toggleSwitch"></span>
									</div>
								</div>
								<span class="forDonly">New</span>
							</label>
						</li>
						<li class="fByYear">
							<button id="fYear">Year <img src="https://machinelista.com/wp-content/themes/Used-Machine-SE/img/year-select.png" alt=""></button>

							<div class="cusFYear_field">
								<div class="sField">
									<img class="checkedF" src="" alt="">
									<input type="radio" id="Yopt0" name="fYear" value="" checked="">
									<label for="Yopt0">Clear</label>
								</div>
								<div class="sField">
									<img class="checkedF" src="" alt="">
									<input type="radio" id="Yopt1" name="fYear" value="1980 - 1990">
									<label for="Yopt1">1980 - 1990</label>
								</div>
								<div class="sField">
									<img class="checkedF" src="" alt="">
									<input type="radio" id="Yopt2" name="fYear" value="1900 - 2000">
									<label for="Yopt2">1990 - 2000</label>
								</div>
								<div class="sField">
									<img class="checkedF" src="" alt="">
									<input type="radio" id="Yopt3" name="fYear" value="2000 - 2010">
									<label for="Yopt3">2000 - 2010</label>
								</div>
								<div class="sField">
									<img class="checkedF" src="" alt="">
									<input type="radio" id="Yopt4" name="fYear" value="2010 - 2023">
									<label for="Yopt4">2010 - 2023</label>
								</div>
							</div>
						</li>
						<li class="fByPrice">
							<button id="fPrice">Price <img src="https://machinelista.com/wp-content/themes/Used-Machine-SE/img/year-select.png" alt=""></button>

							<div class="cusFYear_field">
								<div class="sField">
									<img class="checkedF" src="" alt="">
									<input type="radio" id="Popt0" name="fPrice" value="" checked="">
									<label for="Popt0">None</label>
								</div>
								<div class="sField">
									<img class="checkedF" src="" alt="">
									<input type="radio" id="Popt1" name="fPrice" value="Low to High">
									<label for="Popt1">Low to High</label>
								</div>
								<div class="sField">
									<img class="checkedF" src="" alt="">
									<input type="radio" id="Popt2" name="fPrice" value="High to Low">
									<label for="Popt2">High to Low</label>
								</div>
							</div>
						</li>
						<button class="floatSubmit" type="submit">Apply</button>

						<!-- Raw Filter values -->
						<div class="rawFilterValues" style="display: none;">
							<!-- Search -->
							<input type="text" name="search_text" value="<?php echo $_GET['search_text']; ?>">
						</div>
					</form>
					<li class="sellerInfo">Seller details</li>
				</ul>
			</div>
		</div>

		<!-- // Searched Machines -->
		<div class="allSearchedProducts">
			<?php
				// Applied filter json array
				$phpVariable = array();

				// Get searched value
				if (isset($_GET['search_text']) && !empty($_GET['search_text'])) {
					$text = $_GET['search_text'];
					$phpVariable['search_text'] = $text;
				}

				// Get filter value
				if (isset($_GET['fByPrice']) && !empty($_GET['fByPrice'])) {
					$fByPrice = $_GET['fByPrice'];
					$phpVariable['fByPrice'] = $fByPrice;
				} else {
					$fByPrice = null;
				}

				if (isset($_GET['fCond']) && !empty($_GET['fCond'])) {
					$fCond = $_GET['fCond'];
					$conditionArray = array(
			    		'key' => 'machine_condition',
			    		'value' => $fCond,
			    		'compare' => '='
			    	);
			    	$phpVariable['fCond'] = $fCond;
				} else {
					$conditionArray = array(
			    		'key' => 'machine_condition',
			    		'value' => 'Used',
			    		'compare' => '='
			    	);
				}

				/*if ($_GET['fCond'] && !empty($_GET['fCond'])) {
					$fCond = $_GET['fCond'];
					$conditionArray = array(
			    		'key' => 'machine_condition',
			    		'value' => $fCond,
			    		'compare' => '='
			    	);
			    	$phpVariable['fCond'] = $fCond;
				}*/

				if (isset($_GET['fYear']) && !empty($_GET['fYear'])) {
					$fYear = $_GET['fYear'];
					$minYear = substr($fYear, 0,4);
					$maxYear = substr($fYear, 7);

					$phpVariable['fYear'] = $fYear;
				} else {
					$minYear = 0;
					$maxYear = date("Y");
				}

				$excludeNAfromQuery = null;
				$triggerMetaKey = null;
				if (isset($_GET['fPrice']) && !empty($_GET['fPrice'])) {
					$triggerMetaKey = 'machine_price';
					$triggerOBy = 'meta_value_num';
					$fPrice = $_GET['fPrice'];
					if ($fPrice == 'Low to High') {
						$setOrder = 'ASC';
					} else {
						$setOrder = 'DSC';
					}
					
					$excludeNAfromQuery = array(
			    		'key' => 'machine_price',
			    		'value' => 'N/A',
			    		'compare' => '!='
			    	);

					$phpVariable['fPrice'] = $fPrice;
				} else if (isset($_GET['fYear']) && !empty($_GET['fYear'])) {
					$triggerMetaKey = 'machine_year';
					$triggerOBy = 'meta_value_num';
					$setOrder = 'ASC';
				} else {
					$triggerOBy = 'title';
					$setOrder = 'rand';
				}

				$args = array(
					'post_type' => 'machine',
					'meta_key' => $triggerMetaKey,
					'orderby' => $triggerOBy,
					'order'	=> $setOrder,
					'post_status' => 'publish',
				    'meta_query' => array(
				    	array(
				    		'key' => 'machine_year',
				    		'type' => 'NUMERIC',
				    		'value' => array($minYear, $maxYear),
				    		'compare' => 'BETWEEN'
				    	),
				    	$conditionArray,
				    	$excludeNAfromQuery,
				    ),
				    'tag' => $fByPrice,
				    's' => $text,
					'tax_query'      => array(
						'relation' => 'OR',
						array(
							'taxonomy' => 'machine_category',
							'operator' => 'EXISTS',
						),
						array(
							'taxonomy' => 'machine_manufacturer',
							'operator' => 'EXISTS',
						),
					),
				);

				// Add an additional query to exclude posts where 'delisted' is true.
				// $args['meta_query'][] = array(
				// 	'key' => 'delisted',
				// 	'type' => 'NUMERIC',
				// 	'value' => 1,
				// 	'compare' => '!=',
				// );

				$query = new WP_Query($args);

				// echo $query->max_num_pages;

				$Count_post_no = 0;

				// Machines by Title
				if ($query -> have_posts()) {
					while ($query -> have_posts()) {
				    	$query -> the_post(); ?>

				    	<!-- // Post Content -->
						
						<?php get_template_part( "template-parts/machine" ); ?>

						<!-- // Push Newsletter section after 3 machine -->
						<?php
							$Count_post_no ++;

							$DBSettingNlNo = get_field('newsletter_position', 'option');

							if ($Count_post_no == $DBSettingNlNo) {
								get_template_part( "template-parts/newsletter" );
							}
						?>
					<?php }?>

					<?php wp_reset_query();
				} else {
					// echo '<span class="color_orange" style="margin-bottom: 35px;">';
					// echo 'no machine found';
					// echo '</span>';
				}
				$phpVariable['wpPostsPerPage'] = get_option('posts_per_page');
				$jsonData = json_encode( $phpVariable );
			?>

			<!-- <div class="fullWidth_wrapper thisIsAnAdWrapper" style="display: none;">
				<div class="site_container">
					<div class="s_product">
						<div class="thumbSlider itsAdThumb">
							<div class="itsAdThumbInner">
								<h2>Top Seller</h2>
								<p>Used Agriculture <br> Machinery Dealer</p>
							</div>
						</div>

						<div class="productInfo itsAdContent">
							<img src="<?php //rooturi(); ?>/img/product-ad.png" alt="">
						</div>

						<div class="contactSeller itsAdContact">
							<div class="overlay">
								<a href="#">CONTACT SELLER</a>
							</div>
						</div>
					</div>
				</div>
			</div> -->
		</div>

		<div class="loadMoreMachines">
			<button id="loadMore" data-currentpageurl="<?php echo admin_url( 'admin-ajax.php' ); ?>">loading .......</button>
		</div>

		<!-- // Found Archives -->
		<?php
			// Machines by category
			$termsS = get_terms( 'machine_category', array(
			    'name__like' => $text,
			    'hide_empty' => true, // Optional 
			) ); ?>

				<div class="fullWidth_wrapper foundArchiveSec foundCategory">
					<div class="site_container">
						<?php
							if ( count($termsS) > 0 ) { ?>
								<h3 class="searchFoundTitle">Categories found: <?php echo $_GET['search_text']; ?></h3>
							<?php } else { ?>
								<h3 class="searchFoundTitle noMachineFound">No category found: <?php echo $_GET['search_text']; ?></h3>
							<?php }
						?>

						<?php
						if ( count($termsS) > 0 ){
						    echo '<ul class="searchFoundCats">';
						    foreach ( $termsS as $termS ) {
						        echo '<li><a href="'.get_term_link( $termS ).'" title="'.$termS->name.'">';

						        	echo esc_html( $termS->name );

						        	$filter_count = new WP_Query( array( 
											'post_type' => 'machine',
											'tax_query' => array(
									        array(
									        	'taxonomy' => 'machine_category',
						  						'field'    => 'name',
						  						'terms'    => $termS->name,
									        ),
									    ),
								    ) );
									$count = $filter_count->found_posts;

									echo '<span class="count">'.$count. '</span>';

						        echo '</a></li>';
						    }
						    echo '</ul>';
						} ?>
					</div>
				</div>
			<?php

			// Machines by manufacturer
			$termsMan = get_terms( 'machine_manufacturer', array(
			    'name__like' => $text,
			    'hide_empty' => true // Optional 
			) ); ?>

				<div class="fullWidth_wrapper foundArchiveSec foundManufacturer">
					<div class="site_container">
						<?php
							if ( count($termsMan) > 0 ) { ?>
								<h3 class="searchFoundTitle">Manufacturers found: <?php echo $_GET['search_text']; ?></h3>
							<?php } else { ?>
								<h3 class="searchFoundTitle noMachineFound">No manufacturer found: <?php echo $_GET['search_text']; ?></h3>
							<?php }
						?>

						<?php
						if ( count($termsMan) > 0 ){
						    echo '<ul class="searchFoundCats searchFoundMans">';
						    foreach ( $termsMan as $termMan ) {
						        echo '<li><a href="'.get_term_link( $termMan ).'" title="'.$termMan->name.'">';

						        	echo esc_html( $termMan->name );

						        	$filter_count = new WP_Query( array( 
											'post_type' => 'machine',
											'tax_query' => array(
									        array(
									        	'taxonomy' => 'machine_manufacturer',
						  						'field'    => 'name',
						  						'terms'    => $termMan->name,
									        ),
									    ),
								    ) );
									$count = $filter_count->found_posts;

									echo '<span class="count">'.$count. '</span>';

						        echo '</a></li>';
						    }
						    echo '</ul>';
						} ?>
					</div>
				</div>
			<?php
		?>
	</div>

	<!-- // Footer top border -->
	<div class="fullWidth_wrapper">
		<div class="footer_top_border">
			<?php get_template_part( 'template-parts/universalFooterBorder' ); ?>
		</div>
	</div>

	<!-- // Applied filter stats (OFD) -->
	<ul class="appliedFilterStats" style="display: none;">
		<li class="pooV"><?php
			if ( isset($_GET['fByPrice']) && !empty($_GET['fByPrice']) ) {
				echo 'Applied';
			}
		?></li>
		<li class="condV"><?php
			if ( isset($_GET['fCond']) && !empty($_GET['fCond']) ) {
				echo $_GET['fCond'];
			}
		?></li>
		<li class="yearV"><?php
			if ( isset($_GET['fYear']) && !empty($_GET['fYear']) ) {
				echo $_GET['fYear'];
			}
		?></li>
		<li class="priceV"><?php
			if ( isset($_GET['fPrice']) && !empty($_GET['fPrice']) ) {
				echo $_GET['fPrice'];
			}
		?></li>
	</ul>

	<!-- // Footer -->
	<?php get_footer(); ?>

	<!-- //  -->
	<!-- <div class="fullWidth_wrapper">
		<div class="site_container">
			
		</div>
	</div> -->

	<!-- // Popup form (Listing) -->
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

	<script src="<?php rooturi(); ?>/js/slick.min.js"></script>

	<script>
		// Single Product Slider
		$(document).ready(function() {
			$('.slider_images').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: true,
				fade: true,
				asNavFor: '.slider_nav',
				prevArrow: '<span class="slick_prev"><i class="fas fa-chevron-left"></i></span>',
				nextArrow: '<span class="slick_next"><i class="fas fa-chevron-right"></i></span>'
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

		// Main Product Slider
		$(document).ready(function() {
			$('.pThumbSlider').slick({
				dots: true,
				arrows: true,
				prevArrow: '<span class="slick_prev"><i class="custom_left_arrow"></i></span>',
				nextArrow: '<span class="slick_next"><i class="custom_right_arrow"></i></span>'
			});
			$(".pThumbSlider .slick-dots li").off('click');
		});

		// Page script
		$(document).ready(function() {
			if ($(window).width() > 1024) {
				$('.sByCats ul:visible li:gt(14), .sBycountry ul:visible li:gt(14)').hide();

				$(".sByCats .collapse_catsSec").click(function(event) {
					if ($('.sByCats ul:visible li:gt(14)').is( ":visible" )) {
						$('.sByCats ul:visible li:gt(14)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sByCats ul:visible li:gt(14)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
				// -----------------------------------------
				$(".sBycountry .collapse_catsSec").click(function(event) {
					if ($('.sBycountry ul li:gt(14)').is( ":visible" )) {
						$('.sBycountry ul li:gt(14)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sBycountry ul li:gt(14)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
			}

			// =========== Filter Form =========
			$(".fByPriceOffer .checkBox").click(function(event) {
				$(this).find('i').toggleClass('fa-check-square fa-square');

				$(this).siblings('input').click();

				$(this).siblings('input').toggleClass('selected');
				var getInputState = $(this).siblings('input').hasClass('selected');

				var getYearF = $("input[name=fYear]:checked").val();
				var getPriceF = $("input[name=fPrice]:checked").val();

				if (getInputState == false && getYearF == "" && getPriceF == "") {
					$(".floatSubmit").hide(0);
				} else {
					$(".floatSubmit").show(0);
				}
			});

			$(".fByPriceOffer label").click(function(event) {
				$(this).children('.singleToggle').find('div, span').toggleClass('on');

				$(this).siblings('input').click();
				$(this).siblings('input').toggleClass('selected');
				var getInputState = $(this).siblings('input').hasClass('selected');

				var getYearF = $("input[name=fYear]:checked").val();
				var getPriceF = $("input[name=fPrice]:checked").val();

				var selectPoo = $(".appliedFilterStats li.pooV").text();
				$(".floatSubmit").click();
			});

			$(".fBycondition label").click(function(event) {
				$(this).children('.singleToggle').find('div, span').toggleClass('on');

				$(this).siblings('input').click();
				$(this).siblings('input').toggleClass('selected');
				var getInputState = $(this).siblings('input').hasClass('selected');

				var getYearF = $("input[name=fYear]:checked").val();
				var getPriceF = $("input[name=fPrice]:checked").val();

				var selectPoo = $(".appliedFilterStats li.condV").text();
				$(".floatSubmit").click();
			});

			$(".cusFYear_field label").click(function(event) {
				/* Act on the event */

				var getInputState = $("input[name=fByPrice]").hasClass('selected');
				if ($(this).siblings('input[name=fYear]').length == 1) {
					var getYearF = $(this).siblings('input').val();
				} else {
					var getYearF = $("input[name=fYear]:checked").val();
				}

				if ($(this).siblings('input[name=fPrice]').length == 1) {
					var getPriceF = $(this).siblings('input').val();
				} else {
					var getPriceF = $("input[name=fPrice]:checked").val();
				}

				/*if (getInputState == false && getYearF == "" && getPriceF == "") {
					$(".floatSubmit").hide(0);
				} else {
					$(".floatSubmit").show(0);
				}*/
				$(".floatSubmit").show(0);
			});

			$(".cusFYear_field label").click(function(event) {
				/* Act on the event */
				$(this).parents('.cusFYear_field').find('img.checkedF').attr('src', '');
				$(this).siblings('img.checkedF').attr('src', '<?php rooturi(); ?>/img/check.png');
			});

			$("button#fPrice, button#fYear, button#fCond").click(function(event) {
				event.preventDefault();
				event.stopPropagation();
				$(this).parent().siblings('li').find('.cusFYear_field').hide();
				$(this).siblings('.cusFYear_field').toggle();

				// --------------------
				if ( $(window).width() <= 1024 ) {
	                var whatever = $(this).siblings('div');
	                var rt = ($(window).width() - (whatever.offset().left + whatever.outerWidth()));

	                if (rt < 20) {
	                    $(this).siblings('div').css({
	                        right: '-5px'
	                    });
	                }
	                // console.log(rt);
	            }
			});

			$(".cusFYear_field").click(function(event) {
				event.stopPropagation();
			});

			// If an event gets to the body
			$("body").click(function() {
				$(".cusFYear_field").fadeOut();
			});

			// Check applied filter
				var selectPoo = $(".appliedFilterStats li.pooV").text();
				if ( selectPoo !== "" ) {
					$("form.machine_filter li.fByPriceOffer .singleToggle").find('div, span').toggleClass('on');
					$("form.machine_filter li.fByPriceOffer input").prop('checked', 'checked');
					$("form.machine_filter li.fByPriceOffer input").toggleClass('selected');
				}

				// ----------------------
				var selectCond = $(".appliedFilterStats li.condV").text();
				if ( selectCond !== "" ) {
					$("form.machine_filter li.fBycondition .singleToggle").find('div, span').toggleClass('on');
					$("form.machine_filter li.fBycondition input").prop('checked', 'checked');
					$("form.machine_filter li.fBycondition input").toggleClass('selected');
				}

				// ----------------------
				var selectYear = $(".appliedFilterStats li.yearV").text();
				if ( selectYear !== "" ) {
					$("label:contains("+selectYear+")").siblings('input').prop('checked', 'checked');
					$("label:contains("+selectYear+")").siblings('img').attr('src', 'https://machinelista.com/wp-content/themes/Used-Machine-SE/img/check.png');
					// console.log(selectYear);
				}

				// ----------------------
				var selectPrice = $(".appliedFilterStats li.priceV").text();
				if ( selectPrice !== "" ) {
					$("label:contains("+selectPrice+")").siblings('input').prop('checked', 'checked');
					$("label:contains("+selectPrice+")").siblings('img').attr('src', 'https://machinelista.com/wp-content/themes/Used-Machine-SE/img/check.png');
					// console.log(selectPrice);
				}

			// ====== Newsletter form values =====
			$("input[name=grabCategory]").attr("value", "<?php echo $category->name; ?>");
			var getCatName = $(".searchBreadCrumbs li:first-child a").text();
			$("input[name=grabIndustry]").attr("value", getCatName);
		});
 
		$(document).ready(function() {
			if ($(window).width() < 1024 && $(window).width() > 950) { 
				$('.sByCats ul li:gt(5), .sBycountry ul li:gt(5)').hide();

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
				$(".sBycountry .collapse_catsSec").click(function() {
					if ($('.sBycountry ul li:gt(5)').is( ":visible" )) {
						$('.sBycountry ul li:gt(5)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sBycountry ul li:gt(5)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
			}
			if ($(window).width() == 1024) { 
				$('.sByCats ul li:gt(5), .sBycountry ul li:gt(3)').hide();

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
				$(".sBycountry .collapse_catsSec").click(function() {
					if ($('.sBycountry ul li:gt(3)').is( ":visible" )) {
						$('.sBycountry ul li:gt(3)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sBycountry ul li:gt(3)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
			}

			if ($(window).width() <= 768 && $(window).width() >= 375) { 
				$('.sByCats ul li:gt(5), .sBycountry ul li:gt(5)').hide();

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
				$(".sBycountry .collapse_catsSec").click(function() {
					if ($('.sBycountry ul li:gt(5)').is( ":visible" )) {
						$('.sBycountry ul li:gt(5)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sBycountry ul li:gt(5)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
			}

			if ($(window).width() == 320) { 
				$('.sByCats ul li:gt(3), .sBycountry ul li:gt(3)').hide();

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
				$(".sBycountry .collapse_catsSec").click(function() {
					if ($('.sBycountry ul li:gt(3)').is( ":visible" )) {
						$('.sBycountry ul li:gt(3)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sBycountry ul li:gt(3)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
			}
		});
	</script>

	<script>
		$(document).ready(function() {

			// ======== Vertical align ========
			function verticalAlign(secName, column = 4, plus = 1) {
				var getActiveCatList = $("."+secName+" ul li").length;
				getActiveCatList = (getActiveCatList / column) + plus;
				getActiveCatList = Math.round(getActiveCatList);

				$("."+secName+" ul").css({
					'grid-auto-flow': 'column',
					'grid-template-rows': 'repeat('+getActiveCatList+', auto)'
				});
			}

			if ( $(window).width() < 900 &&  $(window).width() > 480 ) {
				verticalAlign('foundCategory', 3);
				verticalAlign('foundManufacturer', 3);
				verticalAlign('foundModel', 3);
			} else if ( $(window).width() < 480 && $(window).width() > 390 ) {
				verticalAlign('foundCategory', 1);
				verticalAlign('foundManufacturer', 1);
				verticalAlign('foundModel', 1);
			} else if ( $(window).width() > 900 ) {
				verticalAlign('foundCategory');
				verticalAlign('foundManufacturer');
				verticalAlign('foundModel');
			}


			$(".thisIsAnAdWrapper").prev('.fullWidth_wrapper').find('.pInfoPriceInner').addClass('endImage');
			$(".thisIsAnAdWrapper").next('.fullWidth_wrapper').find('.pInfoPriceInner').addClass('startImage');

			// -------------------------
			$(".thisIsAnNLWrapper").prev('.fullWidth_wrapper').find('.pInfoPriceInner').addClass('endImage');
			$(".thisIsAnNLWrapper").next('.fullWidth_wrapper').find('.pInfoPriceInner').addClass('startImage');

			// --------------------------
			$(".allSearchedProducts").find('.pInfoPriceInner').addClass('endImage');


			// ==================
			window.onscroll = function() {scrollFunction()};

			function scrollFunction() {
				if (document.body.scrollTop > 120 || document.documentElement.scrollTop > 120) {
					
					$(".sticky_header").addClass('hasWhiteSpace');
				} else {
					$(".sticky_header").removeClass('hasWhiteSpace');
				}
			}

			// Infinite scroll
			function loadMorePosts() {
			   var page = 2; // Start from the second page, as the first page was already loaded
			   var isLoading = false;
			   var ajaxurl = "/wp-admin/admin-ajax.php";
			   let loadMorePostsEnabled = true;

			   var jsData = <?php echo $jsonData; ?>;
			   var fByPrice = jsData.fByPrice;
			   var fCond = jsData.fCond;
			   var fPrice = jsData.fPrice;
			   var fYear = jsData.fYear;
			   var wpPostsPerPage = jsData.wpPostsPerPage;
			   var search_text = jsData.search_text;
			   var postCount = wpPostsPerPage;

			   console.log(jsData);

			   function loadPosts() {
			   	if ( loadMorePostsEnabled != false) {
				      if (isLoading) return;

				      // var postCount = $(".allSearchedProducts .fullWidth_wrapper:not(.thisIsAnNLWrapper, .thisIsAnAdWrapper)").length;

				      isLoading = true;
				      if ( isLoading == true ) {
				      	$(".loadMoreMachines button").animate({opacity: 1,}, 100);
				      	$(".loadMoreMachines button .fas").css('display', 'inline-block');
				      }

				      jQuery.ajax({
				         url: ajaxurl, // WordPress AJAX URL
				         type: "POST",
				         data: {
				            action: "load_more_search_posts",
				            page: page,
				            postCount: postCount,
							   fByPrice: fByPrice,
							   fCond: fCond,
							   fPrice: fPrice,
							   fYear: fYear,
							   search_text: search_text,
				         },
				         success: function (response) {
				         	console.log(response);
				            isLoading = false;
				            if ( isLoading == false ) {
				            	$(".loadMoreMachines button").css('opacity', '0');
						      	$(".loadMoreMachines button .fas").hide();
						      }

				            if (response.success) {
				               var posts = response.data.posts;
				               if (posts.length > 0) {
				                  // Append the new posts to the container
				                  jQuery(".allSearchedProducts").append(posts);
				                  /*if (posts == '<span class="color_orange">no more machine found</span>') {
				                  	loadMorePostsEnabled = false;
				                  	$(".loadMoreMachines").hide();
				                  }*/
				                  page++;
				                  postCount = parseInt(postCount) + parseInt(wpPostsPerPage);

				                  // Make product slider work
				                  $('.pThumbSlider').each(function(index, el) {
											if ( $(this).attr('class').split(' ').length === 1 ) {
												$(this).slick({
													dots: true,
													arrows: true,
													prevArrow: '<span class="slick_prev"><i class="custom_left_arrow"></i></span>',
													nextArrow: '<span class="slick_next"><i class="custom_right_arrow"></i></span>'
												});
												$(".pThumbSlider .slick-dots li").off('click');
											}
										});
						         } else {
						         	loadMorePostsEnabled = false;
				                  $(".loadMoreMachines").hide();
						         }
						      }
				         },
				         error: function () {
				            isLoading = false;
				            console.log("Error loading posts");
				         },
				      });
				   }
			   }

			   // Load more posts when user scrolls to the bottom of the page
				window.addEventListener("scroll", function () {
				   // Get the "trigger" div element
				   const triggerDiv = document.getElementById('loadMore');

				   // Get the distance between the top of the "trigger" div and the top of the viewport
				   const triggerDivOffset = triggerDiv.offsetTop;

				   // Get the current vertical scroll position of the viewport
					const scrollY = window.scrollY;

					// Calculate the distance of the "trigger" div from the top of the viewport
					const triggerDivOffsetFromViewportTop = triggerDivOffset - scrollY;

					// Calculate the threshold distance (60% of the viewport height)
					const threshold = window.innerHeight * 0.8;

					// Check if the "trigger" div is approximately 60% close to the top of the viewport
					if (triggerDivOffsetFromViewportTop < threshold) {
						// Call your desired JavaScript function here
						loadPosts();
					}
				});

			   // Load more posts when a "Load More" button is clicked
			   /*jQuery("button#loadMore").click(function () {
			      loadPosts();
			   });*/
			}
			loadMorePosts();
		});
	</script>

	<?php wp_footer(); ?>
</body>
</html>