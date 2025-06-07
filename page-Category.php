<?php
	/*
		Template name: Category
	*/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>

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

		#totop {
			position: fixed;
			right: 30px;
			bottom: 20%;
			font-size: 30px;
			background: unset;
			border: none;
			cursor: pointer;
			display: none;
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

	<!-- // Categories -->
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
								<!-- // Industry post loop -->
								<?php
									$getIndustries = new WP_Query(array(
										'post_type'      => 'machine_industry',
										'orderby'	     => 'post_id',
										'posts_per_page'  => '15',
										'order'		     => 'ASC',
									));
								?>
								<?php
									if ($getIndustries->have_posts()) :
										while ($getIndustries->have_posts()) : $getIndustries->the_post();?>
											<?php 
											    global $post;
											    $post_slug = $post->post_name;
											    // echo $post_slug;
											?>
											<li>
												<a href="#<?php echo $post_slug; ?>"><?php the_title(); ?><span class="count"></span></a>
											</li>
										<?php endwhile;
										else : echo 'No industry found';
									endif;
								?>
							</ul>
						</div>

						<div class="allCatsExpaned">
							<?php
								$getIndustries = new WP_Query(array(
									'post_type'      => 'machine_industry',
									'orderby'	     => 'post_id',
									'posts_per_page'  => '15',
									'order'		     => 'ASC',
								));
							?>
							<?php
								if ($getIndustries->have_posts()) :
									while ($getIndustries->have_posts()) : $getIndustries->the_post();?>
										<?php 
										    global $post;
										    $post_slug = $post->post_name;
										?>
										<div class="single_cat" data="<?php echo $post_slug; ?>">
											<div class="title">
												<?php the_title(); ?> <span class="available_product"></span>
												<span class="line"></span>
											</div>
											<div class="single_cat_inner">
												<ul>
													<?php
														$terms = get_the_terms( $post->ID, 'machine_category' );
														if ($terms) {
															foreach ( $terms as $term ) {
																echo '<li><a href="/machine_category/'.$term->slug.'">';
																echo $term->name, ' ';

																$posts = get_posts(array( 
																	'post_type' => 'machine',
																	'post_status' => 'publish',
																	'tax_query' => array(
															        array(
															        	'taxonomy' => 'machine_category',
												  						'field'    => 'name',
												  						'terms'    => $term->name,
															        )
															     	),
															    	'meta_query' => array(
																		array(
																			'key'     => 'delisted',
																			'value'   => 1,
																			'compare' => '!=',
																		),
																   ),
																	'fields' => 'ids',
																	'numberposts' => -1,
															   ));
																$count = count($posts);

																echo '<span class="count">',$count, '</span>';
																echo '</a></li>';
															}
														}
													?>
												</ul>
											</div>  
										</div>
									<?php endwhile;
									else : echo 'No industry found';
								endif;
							?>
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

	<!-- // To Top -->
	<button id="totop" title="Go to top"><span class="fas fa-arrow-alt-circle-up"></span></button>

	<script>
		$(document).ready(function() {
			var whatever = $(".allCatsExpaned .title");
			var whateverWidth = $(".allCatsExpaned .title").width();
			var rt = ($(window).width() - (whatever.offset().left + whatever.outerWidth()));
			var totval = whateverWidth + rt;
			$(".line").width(totval);
			// console.log(totval);
			if ($(window).width() < 480) {
				$(".line").width($(window).width());
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
			$(".line").width(totval);
			// console.log(rt);

			var whatever2 = $(".catsList .title");
			var whatever2Width = $(".catsList .title").width();
			var rt2 = ($(window).width() - (whatever2.offset().left + whatever2.outerWidth()));
			var totval2 = whatever2Width + whatever2.offset().left;
			$(".line2").width(totval2);
			// console.log(totval2);
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

				if ($(window).width() <= 480) {
					$(".catsList ul").hide();
				}
			});

			// ==============
			$(".catsList li").each(function() {
				var getDataName = $(this).children('a').attr('href');
				var trimDataName = getDataName.substring(1);

				var grabTarget = $(".allCatsExpaned .single_cat[data="+trimDataName+"] .count");

				var createNumber = 0;

				grabTarget.each(function() {
					createNumber = createNumber + parseFloat($(this).text());
				});

				$(this).children('a').children('.count').text(createNumber);

				// console.log(createNumber);
			});
			$(".allCatsExpaned .single_cat").each(function() {

				var createNumber = 0;

				$(this).find('.count').each(function() {
					createNumber = createNumber + parseFloat($(this).text());
				});

				$(this).children('.title').children('.available_product').text(createNumber);
			});

			// $(".single_cat[data=Agriculture] .count").each(function() {
			// 	createNumber = createNumber + parseFloat($(this).text());
			// });
			
			// console.log(createNumber);

			// When the user scrolls down 20px from the top of the document, show the button
			// window.onscroll = function() {scrollFunction()};

			// function scrollFunction() {
			//   if (document.body.scrollTop > 480 || document.documentElement.scrollTop > 480) {
			//     document.getElementById("totop").style.display = "block";
			//   } else {
			//     document.getElementById("totop").style.display = "none";
			//   }
			// }

			// When the user clicks on the button, scroll to the top of the document
			// $("#totop").click(function() {
			// 	document.body.scrollTop = 0;
			//   	document.documentElement.scrollTop = 0;
			// });

			// ======== Vertical align ========
			function verticalAlign(column = 4, plus = 0.5) {
				var getActiveCatList = $(".allCatsExpaned .single_cat:visible ul li").length;
				getActiveCatList = (getActiveCatList / column) + plus;
				getActiveCatList = Math.round(getActiveCatList);

				$(".allCatsExpaned .single_cat:visible ul").css({
					'grid-auto-flow': 'column',
					'grid-template-rows': 'repeat('+getActiveCatList+', auto)'
				});
			}
			
			function runVerticaleA() {
				if ( $(window).width() > 900 ) {
					verticalAlign(3);
				} else if ( $(window).width() < 900 &&  $(window).width() > 480 ) {
					verticalAlign(2);
				} else if ( $(window).width() < 480 && $(window).width() > 390 ) {
					verticalAlign(1);
				} else if ( $(window).width() > 900 ) {
					verticalAlign();
				}
			}
			runVerticaleA();

			$(".catsList ul li a").click(function(event) {
				runVerticaleA();
			});
		});
	</script>

	<?php wp_footer(); ?>
</body>
</html>