<?php get_header(); ?>
<?php
	// Default Values
	$queryMan = false;
	$queryModel = false;
	$queryCountry = false;
	$queryState = false;

	if (isset($_GET['rawFCat']) && $_GET['rawFCat'] && !empty($_GET['rawFCat'])) {
		$rawFCat = $_GET['rawFCat'];
		// $rawFCatUrl = $_GET['rawFCatUrl'];
	} else {
		$rawFCat = null;
		$rawFCatUrl = null;
	}

	if (isset($_GET['rawFMan']) && $_GET['rawFMan'] && !empty($_GET['rawFMan'])) {
		$queryMan = true;
		$rawFMan = $_GET['rawFMan'];
		// $rawFManUrl = $_GET['rawFManUrl'];
	} else {
		$rawFMan = null;
		$rawFManUrl = null;
	}

	if (isset($_GET['rawFModel']) && $_GET['rawFModel'] && !empty($_GET['rawFModel'])) {
		$queryModel = true;
		$rawFModel = $_GET['rawFModel'];
		// $rawFModelUrl = $_GET['rawFModelUrl'];
	} else {
		$rawFModel = null;
		$rawFModelUrl = null;
	}

	if (isset($_GET['rawFCountry']) && $_GET['rawFCountry'] && !empty($_GET['rawFCountry'])) {
		$queryCountry = true;
		$rawFCountry = $_GET['rawFCountry'];
		// $rawFCountryUrl = $_GET['rawFCountryUrl'];
	} else {
		$rawFCountry = null;
		$rawFCountryUrl = null;
	}

	if (isset($_GET['rawFState']) && $_GET['rawFState'] && !empty($_GET['rawFState'])) {
		$queryState = true;
		$rawFstate = $_GET['rawFState'];
		// $rawFstateUrl = $_GET['rawFstateUrl'];
	} else {
		$rawFstate = null;
		$rawFstateUrl = null;
	}
?>
<body <?php body_class( $class = 'pageSearch' ); ?>>
	<!-- Page specific CSS -->
	<style>
		.header_bottom_border {
			margin-bottom: 0;
		}
		/*footer::after {
			display: none;
		}*/
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
				<?php get_template_part( 'menu-parts/menu-search' ); ?>
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
					$category = get_queried_object();
					$target_slug = $_GET['industryName'];
					$args = array(
						'post_type' => 'machine_industry',
						'post_per_page' => 1,
						'name' => $target_slug,
						'tax_query' => array(
					        array(
					        	'taxonomy' => 'machine_category',
								'field'    => 'name',
								'terms'    => $category->name,
					        ),
					    ),
					);
					$query = new WP_Query($args);

					if ($query->have_posts()) {
						$query->the_post();?>
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

	<!-- // Searched Product -->
	<div class="fullWidth_wrapper searched_page_wrapper">

		<!-- // Breadcrumbs -->
		<div class="fullWidth_wrapper related_products_heading searchBreadCrumbs">
			<div class="site_container">
				<ul>
					<?php
						$category = get_queried_object();

						if ($_GET['industryName'] && !empty($_GET['industryName'])) {
							$getIndustryName = $_GET['industryName'];
						}

						$args = array(
							'name' => $getIndustryName,
							'post_type' => 'machine_industry',
							'post_per_page' => 1,
							'tax_query' => array(
						        array(
						        	'taxonomy' => 'machine_category',
			  						'field'    => 'name',
			  						'terms'    => $category->name,
						        ),
						    ),
						);
						$query = new WP_Query($args);
					?>

					<li id="currentIndustry"><a href="<?php $query -> the_post(); the_permalink(); ?>" title="Industry"><?php $currentIndustry = get_the_title(); the_title(); ?></a></li>

					<?php
						if (
							isset($_GET['rawFCat']) && $_GET['rawFCat'] && !empty($_GET['rawFCat'])
						) {?>
							<li id="currentCategory"><a href="<?php echo $_GET['rawFCatUrl'] . '?industryName='.$getIndustryName.''; ?>" title="Category"><?php echo $rawFCat; ?></a></li>
						<?php } else {?>
							<li id="currentCategory"><a href="<?php echo get_category_link($category->term_id) . '?industryName='.$getIndustryName.''; ?>" title="Category"><?php echo $category->name; ?></a></li>
						<?php }
					?>

					<?php
						if ($queryMan == true) {?>
							<li id="currentManufacturer"><a href="" title="Manufacturer"><?php echo $rawFMan; ?></a></li>
						<?php }
					?>

					<?php
						if ($queryModel == true) {?>
							<li id="currentModel"><a href="" title="Model"><?php echo $rawFModel; ?></a></li>
						<?php }
					?>

					<?php
						if ($queryCountry == true) {?>
							<li id="currentCountry"><a href="" title="Country"><?php echo $rawFCountry; ?></a></li>
						<?php }
					?>

					<?php
						if ($queryState == true) {?>
							<li id="currentState"><a href="" title="State"><?php echo $rawFstate; ?></a></li>
						<?php }
					?>
				</ul>
			</div>
		</div>

		<!-- // Cats/Man Filter -->
		<div class="site_container">
			<div class="twoCatsFilters">
				<div class="twoCatsFiltersInner">
					<div class="sByCats">
						<h2>Search by Manufacturer <span class="line"></span></h2>

						<?php
							if (!isset($_GET['rawFMan']) OR empty($_GET['rawFMan'])) {
								?>
								<ul class="progress_manufacturer">
									<?php
										$getMans = get_the_terms( '' , 'machine_manufacturer' );

										if ($getMans == true) {
											foreach ( $getMans as $getMan ) {
												// Raw Form Fields
												if (isset($_GET['rawFCat']) && $_GET['rawFCat'] && !empty($_GET['rawFCat'])) {
													$createCategoryArray = array(
											        	'taxonomy' => 'machine_category',
								  						'field'    => 'name',
								  						'terms'    => $rawFCat,
											        );
												}

												if ($queryMan == true) {
													$createArray = array(
											        	'taxonomy' => 'machine_manufacturer',
								  						'field'    => 'name',
								  						'terms'    => $rawFMan,
											        );
												}

												if ($queryModel == true) {
													$createModelArray = array(
											        	'taxonomy' => 'machine_model',
								  						'field'    => 'name',
								  						'terms'    => $rawFModel,
											        );
												} else {
													$createModelArray = null;
												}

												if ($queryCountry == true) {
													$createCountryArray = array(
											        	'taxonomy' => 'machine_country',
								  						'field'    => 'name',
								  						'terms'    => $rawFCountry,
											        );
												} else {
													$createCountryArray = null;
												}

												if ($queryState == true) {
													$createStateArray = array(
											        	'taxonomy' => 'machine_country',
								  						'field'    => 'name',
								  						'terms'    => $rawFstate,
											        );
												} else {
													$createStateArray = null;
												}

												// Loop
												$posts = get_posts(array(
													'post_type' => 'machine',
													'tax_query' => array(
														'relation' => 'AND',
														array(
															'taxonomy' => 'machine_category',
															'field'    => 'name',
															'terms'    => $category->name,
														),
														array(
															'taxonomy' => 'machine_manufacturer',
															'field'    => 'name',
															'terms'    => $getMan->name,
														),
														$createModelArray,
														$createCountryArray,
														$createStateArray
													),
													'meta_query' => array(
														array(
															'key'     => 'choose_industry',
															'value'   => $currentIndustry,
															'compare' => '=',
														),
														array(
															'key'     => 'delisted',
															'value'   => 0,
															'compare' => '=',
														),
													),
													'fields' => 'ids', // Only return the post IDs for better performance
													'numberposts' => -1, // Retrieve all matching posts
													'no_found_rows' => true, // Disable found_rows for performance
													'cache_results' => true,
												));

												// Get the count of matching posts
												$count = count($posts);
												wp_reset_postdata();

												// Only display the taxonomy if count is greater than 0
												if ($count > 0) {
													echo '<li><a href="" data-term_id="'.$getMan->term_id.'">';
													echo $getMan->name . ' ';
													echo '<span class="count">' . $count . '</span>';
													echo '</a></li>';
												}
											}
										}
									?>
								</ul>
								<?php
							}
						?>

						<?php
							if ($queryMan == true) {
								if (!isset($_GET['rawFModel']) OR empty($_GET['rawFModel'])) {
								?>
								<ul class="progress_model" style="display: none;">
									<?php
										$getModels = get_the_terms( '' , 'machine_model' );

										if ($getModels == true) {
											foreach ( $getModels as $getModel ) {
												// echo '<li><a href="">';
												// echo $getModel->name, ' ';

												// Raw Form Fields
												if (isset($_GET['rawFCat']) && $_GET['rawFCat'] && !empty($_GET['rawFCat'])) {
													$createCategoryArray = array(
											        	'taxonomy' => 'machine_category',
								  						'field'    => 'name',
								  						'terms'    => $rawFCat,
											        );
												}

												if ($queryMan == true) {
													$createArray = array(
											        	'taxonomy' => 'machine_manufacturer',
								  						'field'    => 'name',
								  						'terms'    => $rawFMan,
											        );
												}

												if ($queryModel == true) {
													$createModelArray = array(
											        	'taxonomy' => 'machine_model',
								  						'field'    => 'name',
								  						'terms'    => $rawFModel,
											        );
												} else {
													$createModelArray = null;
												}

												if ($queryCountry == true) {
													$createCountryArray = array(
											        	'taxonomy' => 'machine_country',
								  						'field'    => 'name',
								  						'terms'    => $rawFCountry,
											        );
												} else {
													$createCountryArray = null;
												}

												if ($queryState == true) {
													$createStateArray = array(
											        	'taxonomy' => 'machine_country',
								  						'field'    => 'name',
								  						'terms'    => $rawFstate,
											        );
												} else {
													$createStateArray = null;
												}

												// Loop
												$posts = get_posts(array(
													'post_type' => 'machine',
													'tax_query' => array(
														'relation' => 'AND',
														array(
															'taxonomy' => 'machine_model',
															'field'    => 'name',
															'terms'    => $getModel->name,
														),
														array(
															'taxonomy' => 'machine_category',
															'field'    => 'name',
															'terms'    => $category->name,
														),
												      $createArray,
														$createCountryArray,
														$createStateArray
													),
													'meta_query' => array(
														array(
															'key'     => 'choose_industry',
															'value'   => $currentIndustry,
															'compare' => '=',
														),
														array(
															'key'     => 'delisted',
															'value'   => 0,
															'compare' => '=',
														),
													),
													'fields' => 'ids', // Only return the post IDs for better performance
													'numberposts' => -1, // Retrieve all matching posts
												));

												// Get the count of matching posts
												$count = count($posts);

												// echo '<span class="count">'.$count. '</span>';
												// echo '</a></li>';

												// Only display the taxonomy if count is greater than 0
												if ($count > 0) {
													echo '<li><a href="" data-term_id="'.$getModel->term_id.'">';
													echo $getModel->name . ' ';
													echo '<span class="count">' . $count . '</span>';
													echo '</a></li>';
												}
											}
										}
									?>
								</ul>
								<?php
								}
							}
						?>

						<button class="collapse_catsSec closed">View All</button>
						<span class="after"></span>
					</div>

					<div class="sBycountry">
						<h2>
							Search by Country
							<span class="line"></span>
							<span class="line lineForTop"></span>
						</h2>

						<?php
							if (!isset($_GET['rawFCountry']) OR empty($_GET['rawFCountry'])) {
								?>
								<ul class="progress_country">
									<?php
										// $getCountries = get_the_terms( '' , 'machine_country' );
										$getCountries = get_terms(array(
											"hide_empty" => false,
							            "taxonomy" => "machine_country",
							            // "childless" => true,
							            'parent' => 0,
							            'object_ids' => get_the_ID(),
										));

										if ($getCountries == true) {
											foreach ( $getCountries as $getCountry ) {
												// Raw Form Fields
												if (isset($_GET['rawFCat']) && $_GET['rawFCat'] && !empty($_GET['rawFCat'])) {
													$createCategoryArray = array(
											        	'taxonomy' => 'machine_category',
								  						'field'    => 'name',
								  						'terms'    => $rawFCat,
											        );
												}

												if ($queryMan == true) {
													$createArray = array(
											        	'taxonomy' => 'machine_manufacturer',
								  						'field'    => 'name',
								  						'terms'    => $rawFMan,
											        );
												} else {
													$createArray = null;
												}

												if ($queryModel == true) {
													$createModelArray = array(
											        	'taxonomy' => 'machine_model',
								  						'field'    => 'name',
								  						'terms'    => $rawFModel,
											        );
												} else {
													$createModelArray = null;
												}

												if ($queryCountry == true) {
													$createCountryArray = array(
											        	'taxonomy' => 'machine_country',
								  						'field'    => 'name',
								  						'terms'    => $rawFCountry,
											        );
												} else {
													$createCountryArray = null;
												}

												if ($queryState == true) {
													$createStateArray = array(
											        	'taxonomy' => 'machine_country',
								  						'field'    => 'name',
								  						'terms'    => $rawFstate,
											        );
												} else {
													$createStateArray = null;
												}

												// Count posts in country
												$posts = get_posts(array(
													'post_type' => 'machine',
													'tax_query' => array(
														'relation' => 'AND',
														array(
															'taxonomy' => 'machine_country',
															'field'    => 'name',
															'terms'    => $getCountry->name,
														),
														array(
															'taxonomy' => 'machine_category',
															'field'    => 'name',
															'terms'    => $category->name,
														),
												      $createArray,
														$createModelArray,
													),
													'meta_query' => array(
														array(
															'key'     => 'choose_industry',
															'value'   => $currentIndustry,
															'compare' => '=',
														),
														array(
															'key'     => 'delisted',
															'value'   => 0,
															'compare' => '=',
														),
													),
													'fields' => 'ids', // Only return the post IDs for better performance
													'numberposts' => -1, // Retrieve all matching posts
												));

												// Get the count of matching posts
												$count = count($posts);

												// Only display the taxonomy if count is greater than 0
												if ($count > 0) {
													echo '<li><a href="" data-term_id="'.$getCountry->term_id.'">';
													echo $getCountry->name . ' ';
													echo '<span class="count">' . $count . '</span>';
													echo '</a></li>';
												}
											}
										} else {
											// echo 'No country found.';
										}
									?>
								</ul>
								<?php
							}
						?>

						<?php
							if ($queryCountry == true) {
								if (!isset($_GET['rawFState']) OR empty($_GET['rawFState'])) {
									?>
									<ul class="progress_state" style="display: none;">
										<?php
											// $getStates = get_the_terms( '' , 'machine_country' );

											$GetCountryName = $_GET['rawFCountry'];
											$GetCountryID = get_term_by( 'name', $GetCountryName, $taxonomy = 'machine_country' );

											$getStates = get_terms(array(
												"hide_empty" => false,
								            "taxonomy" => "machine_country",
								            // "parent" => $getParent,
								            'child_of' => $GetCountryID->term_id,
								            'object_ids' => get_the_ID(),
											));

											if ($getStates == true) {
												foreach ( $getStates as $getState ) {
													// echo '<li><a href="/machine_country/'.$getState->slug.'">';
													// echo $getState->name, ' ';

													// Raw Form Fields
													if (isset($_GET['rawFCat']) && $_GET['rawFCat'] && !empty($_GET['rawFCat'])) {
														$createCategoryArray = array(
												        	'taxonomy' => 'machine_category',
									  						'field'    => 'name',
									  						'terms'    => $rawFCat,
												        );
													} else {
														$createCategoryArray = null;
													}

													if ($queryMan == true) {
														$createArray = array(
												        	'taxonomy' => 'machine_manufacturer',
									  						'field'    => 'name',
									  						'terms'    => $rawFMan,
												        );
													} else {
														$createArray = null;
													}

													if ($queryModel == true) {
														$createModelArray = array(
												        	'taxonomy' => 'machine_model',
									  						'field'    => 'name',
									  						'terms'    => $rawFModel,
												        );
													}

													if ($queryCountry == true) {
														$createCountryArray = array(
												        	'taxonomy' => 'machine_country',
									  						'field'    => 'name',
									  						'terms'    => $rawFCountry,
												        );
													}

													if ($queryState == true) {
														$createStateArray = array(
												        	'taxonomy' => 'machine_country',
									  						'field'    => 'name',
									  						'terms'    => $rawFstate,
												        );
													}

													// Loop
													$posts = get_posts(array(
														'post_type' => 'machine',
														'tax_query' => array(
															'relation' => 'AND',
															array(
																'taxonomy' => 'machine_country',
																'field'    => 'name',
																'terms'    => $getState->name,
															),
															array(
																'taxonomy' => 'machine_category',
																'field'    => 'name',
																'terms'    => $category->name,
															),
													      $createArray,
															$createModelArray,
															$createCountryArray,
														),
														'meta_query' => array(
															array(
																'key'     => 'choose_industry',
																'value'   => $currentIndustry,
																'compare' => '=',
															),
															array(
																'key'     => 'delisted',
																'value'   => 0,
																'compare' => '=',
															),
														),
														'fields' => 'ids', // Only return the post IDs for better performance
														'numberposts' => -1, // Retrieve all matching posts
													));

													// Get the count of matching posts
													$count = count($posts);

													// echo '<span class="count">'.$count. '</span>';
													// echo '</a></li>';

													// Only display the taxonomy if count is greater than 0
													if ($count > 0) {
														echo '<li><a href="" data-term_id="'.$getState->term_id.'">';
														echo $getState->name . ' ';
														echo '<span class="count">' . $count . '</span>';
														echo '</a></li>';
													}
												}
											} else {
												// echo 'No State found.';
											}
										?>
									</ul>
									<?php
								}
							}
						?>
						
						<button class="collapse_catsSec closed">View All</button>
						<span class="after"></span>
					</div>
				</div>
			</div>

			<form action="<?php echo get_category_link($category->term_id); ?>" style="display: none;" method="GET" class="rawFilter">

				<div class="rawFCat">
					<?php
						if (!empty($rawFCat)) {
							?>
							<input type="text" name="rawFCat" value="<?php echo $rawFCat; ?>">
							<?php
						} else {
							?>
							<input type="text" name="rawFCat">
							<?php
						}
					?>
				</div>

				<div class="rawFMan">
					<?php
						if (!empty($rawFMan)) {
							?>
							<input type="text" name="rawFMan" value="<?php echo $rawFMan; ?>">
							<?php
						} else {
							?>
							<input type="text" name="rawFMan">
							<?php
						}
					?>
				</div>

				<div class="rawFModel">
					<?php
						if (!empty($rawFModel)) {
							?>
							<input type="text" name="rawFModel" value="<?php echo $rawFModel; ?>">
							<?php
						} else {
							?>
							<input type="text" name="rawFModel">
							<?php
						}
					?>
				</div>

				<!-- =============== -->

				<div class="rawFCountry">
					<?php
						if (!empty($rawFCountry)) {
							?>
							<input type="text" name="rawFCountry" value="<?php echo $rawFCountry; ?>">
							<?php
						} else {
							?>
							<input type="text" name="rawFCountry">
							<?php
						}
					?>
				</div>

				<div class="rawFState">
					<?php
						if (!empty($rawFstate)) {
							?>
							<input type="text" name="rawFState" value="<?php echo $rawFstate; ?>">
							<?php
						} else {
							?>
							<input type="text" name="rawFState">
							<?php
						}
					?>
				</div>

				<!-- =============== -->
				<input type="text" name="industryName" value="<?php echo $getIndustryName; ?>">
			</form>

			<form class="industryInfoForm" action="<?php echo get_category_link($category->term_id); ?>" style="display: none;">
				<input type="text" name="industryName" value="<?php echo $getIndustryName; ?>">
			</form>
		</div>
		
		<!-- // List Filter -->
		<div class="fullWidth_wrapper filterAndInfoWrapper">
			<div class="filterAndInfo">
				<ul>
					<?php
						// Get searched value
						if (isset($_GET['search_text']) && $_GET['search_text'] && !empty($_GET['search_text'])) {
							$text = $_GET['search_text'];
						}

						// Get filter value
						if (isset($_GET['fByPrice']) && $_GET['fByPrice'] && !empty($_GET['fByPrice'])) {
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

						if (isset($_GET['fYear']) && $_GET['fYear'] && !empty($_GET['fYear'])) {
							$fYear = $_GET['fYear'];
							$minYear = substr($fYear, 0,4);
							$maxYear = substr($fYear, 7);
						} else {
							$minYear = 0;
							$maxYear = date("Y");
						}

						if (isset($_GET['fPrice']) && $_GET['fPrice'] && !empty($_GET['fPrice'])) {
							$triggerMetaKey = 'machine_price';
							$triggerOBy = 'meta_value';
							$fPrice = $_GET['fPrice'];
							if ($fPrice == 'Low to High') {
								$setOrder = 'ASC';
							} else {
								$setOrder = 'DSC';
							}
						} else {
							$triggerMetaKey = null;
							$triggerOBy = null;
							$setOrder = null;
						}

						$category = get_queried_object();
						// echo $category->name;

						if (isset($_GET['rawFCat']) && $_GET['rawFCat'] && !empty($_GET['rawFCat'])) {
							$createCategoryArray = array(
					        	'taxonomy' => 'machine_category',
		  						'field'    => 'name',
		  						'terms'    => $rawFCat,
					        );
						}

						if ($queryMan == true) {
							$createArray = array(
					        	'taxonomy' => 'machine_manufacturer',
		  						'field'    => 'name',
		  						'terms'    => $rawFMan,
					        );
						}

						if ($queryModel == true) {
							$createModelArray = array(
					        	'taxonomy' => 'machine_model',
		  						'field'    => 'name',
		  						'terms'    => $rawFModel,
					        );
						}

						if ($queryCountry == true) {

							if (isset($_GET['rawFState']) && $_GET['rawFState'] && !empty($_GET['rawFState'])) {
								$rawFstate = $_GET['rawFState'];
								$createCountryArray = array(
						        	'taxonomy' => 'machine_country',
			  						'field'    => 'name',
			  						'terms'    => $rawFstate,
						        );
							} else {
								$createCountryArray = array(
						        	'taxonomy' => 'machine_country',
			  						'field'    => 'name',
			  						'terms'    => $rawFCountry,
						        );
							}
						} else {
							$createStateArray = null;
						}

						$args = array(
							'post_type' => 'machine',
							'posts_per_page' => -1,
							'meta_key' => $triggerMetaKey,
							'orderby' => $triggerOBy,
							'order'	=> $setOrder,
							'tax_query' => array(
						        array(
						        	'taxonomy' => 'machine_category',
			  						'field'    => 'name',
			  						'terms'    => $category->name,
						        ),
						        $createArray,
						        $createModelArray,
						        $createCountryArray,
						        $createStateArray,
						    ),
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
						    	array(
						    		'key' => 'choose_industry',
						    		'value' => $currentIndustry,
						    		'compare' => '='
						    	),
				    			$conditionArray,
						    ),
						    // 'meta_key' => 'machine_price',
						    // 'orderby' => 'meta_value_num', 
						    'tag' => $fByPrice,
						);

						// Add an additional query to exclude posts where 'delisted' is true.
						$args['meta_query'][] = array(
							'key' => 'delisted',
							'type' => 'BOOLEAN',
							'value' => 1,
							'compare' => '!=',
						);

						$posts = get_posts($args);

						// Get the count of matching posts
						$count = count($posts);

						// $query = new WP_Query($args);

						// // $count = $query->found_posts;
						// $GLOBALS['count'] = $query->found_posts;
						// $GLOBALS['count'] = count($posts);
					?>
					<li class="hideOnTab"><?php echo $category->name; ?></li>
					<li class="results"><span>Results: </span><?php echo $count; ?> Listings</li>
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

							<!-- <button id="fCond">Condition <img src="<?php rooturi(); ?>/img/year-select.png" alt=""></button>

							<div class="cusFYear_field">
								<div class="sField">
									<img class="checkedF" src="" alt="">
									<input type="radio" id="Cond0" name="fCond" value="" checked="">
									<label for="Cond0">Clear</label>
								</div>
								<div class="sField">
									<img class="checkedF" src="" alt="">
									<input type="radio" id="Cond1" name="fCond" value="New">
									<label for="Cond1">New</label>
								</div>
								<div class="sField">
									<img class="checkedF" src="" alt="">
									<input type="radio" id="Cond2" name="fCond" value="Used">
									<label for="Cond2">Used</label>
								</div>
								<div class="sField">
									<img class="checkedF" src="" alt="">
									<input type="radio" id="Cond3" name="fCond" value="Auction">
									<label for="Cond3">Auction</label>
								</div>
							</div> -->
						</li>
						<li class="fByYear">

							<button id="fYear">Year <img src="https://machinelista.com/wp-content/uploads/2023/07/lighter-sort.png" alt=""></button>

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

							<button id="fPrice">Price <img src="https://machinelista.com/wp-content/uploads/2023/07/lighter-sort.png"  alt=""></button>

							<div class="cusFYear_field">
								<div class="sField">
									<img class="checkedF" src="" alt="">
									<input type="radio" id="Popt0" name="fPrice" value="" checked="">
									<label for="Popt0">Clear</label>
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
							<!-- Category -->
							<input type="text" name="rawFCat" value="<?php echo $rawFCat; ?>">
							<!-- <input type="text" name="rawFCatUrl" value="<?php //echo $rawFCatUrl; ?>"> -->

							<!-- Manufacturer -->
							<input type="text" name="rawFMan" value="<?php echo $rawFMan; ?>">
							<!-- <input type="text" name="rawFManUrl" value="<?php //echo $rawFManUrl; ?>"> -->

							<!-- Model -->
							<input type="text" name="rawFModel" value="<?php echo $rawFModel; ?>">
							<!-- <input type="text" name="rawFModelUrl" value="<?php //echo $rawFManUrl; ?>"> -->

							<!-- Country -->
							<input type="text" name="rawFCountry" value="<?php echo $rawFCountry; ?>">
							<!-- <input type="text" name="rawFCountryUrl" value="<?php //echo $rawFCountryUrl; ?>"> -->

							<!-- State -->
							<input type="text" name="rawFstate" value="<?php echo $rawFstate; ?>">
							<!-- <input type="text" name="rawFstateUrl" value="<?php //echo $rawFstateUrl; ?>"> -->
						</div>

						<!-- =============== -->
						<input type="text" name="industryName" value="<?php echo $getIndustryName; ?>" style="display: none;">
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
				if (isset($_GET['search_text']) && $_GET['search_text'] && !empty($_GET['search_text'])) {
					$text = $_GET['search_text'];
				}

				// Get filter value
				if (isset($_GET['fByPrice']) && !empty($_GET['fByPrice'])) {
					$fByPrice = $_GET['fByPrice'];
					$phpVariable['fByPrice'] = $fByPrice;
				}

				if (isset($_GET['fCond']) && $_GET['fCond'] && !empty($_GET['fCond'])) {
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
			    	$phpVariable['fCond'] = "Used";
				}

				if (isset($_GET['fYear']) && $_GET['fYear'] && !empty($_GET['fYear'])) {
					$fYear = $_GET['fYear'];
					$minYear = substr($fYear, 0,4);
					$maxYear = substr($fYear, 7);
					$phpVariable['fYear'] = $fYear;
				} else {
					$minYear = 0;
					$maxYear = date("Y");
				}

				$excludeNAfromQuery = null;
				if (isset($_GET['fPrice']) && !empty($_GET['fPrice'])) {
					$triggerMetaKey = 'machine_price';
					$triggerOBy = 'meta_value_num';
					$fPrice = $_GET['fPrice'];
					if ($fPrice == 'Low to High') {
						// $setOrder = 'DSC';
						$setOrder = 'ASC';
					} else {
						// $setOrder = 'ASC';
						$setOrder = 'DSC';
					}
					$excludeNAfromQuery = array(
			    		'key' => 'machine_price',
			    		'value' => 'N/A',
			    		'compare' => '!='
			    	);
					$phpVariable['fPrice'] = $fPrice;
				} else if (isset($_GET['fYear']) && $_GET['fYear'] && !empty($_GET['fYear'])) {
					$triggerMetaKey = 'machine_year';
					$triggerOBy = 'meta_value_num';
					$setOrder = 'ASC';
				} else {
					// $triggerOBy = 'title';
					$triggerMetaKey = 'dealer_name';
					$triggerOBy = 'meta_value';
					$setOrder = 'rand';
				}

				$category = get_queried_object();

				if (isset($_GET['rawFCat']) && $_GET['rawFCat'] && !empty($_GET['rawFCat'])) {
					$createCategoryArray = array(
			        	'taxonomy' => 'machine_category',
  						'field'    => 'name',
  						'terms'    => $rawFCat,
			        );

					$phpVariable['rawFCat'] = $rawFCat;
				}

				if ($queryMan == true) {
					$createArray = array(
			        	'taxonomy' => 'machine_manufacturer',
  						'field'    => 'name',
  						'terms'    => $rawFMan,
			        );

					$phpVariable['rawFMan'] = $rawFMan;
				}

				if ($queryModel == true) {
					$createModelArray = array(
			        	'taxonomy' => 'machine_model',
  						'field'    => 'name',
  						'terms'    => $rawFModel,
			        );

					$phpVariable['rawFModel'] = $rawFModel;
				}

				if ($queryCountry == true) {

					if (isset($_GET['rawFState']) && $_GET['rawFState'] && !empty($_GET['rawFState'])) {
						$rawFstate = $_GET['rawFState'];
						$createCountryArray = array(
				        	'taxonomy' => 'machine_country',
	  						'field'    => 'name',
	  						'terms'    => $rawFstate,
				        );
						$phpVariable['rawFstate'] = $rawFstate;
					} else {
						$createCountryArray = array(
				        	'taxonomy' => 'machine_country',
	  						'field'    => 'name',
	  						'terms'    => $rawFCountry,
				        );
					}
					$phpVariable['rawFCountry'] = $rawFCountry;
				}

				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$seed = date('Ymd');
				$args = array(
					'post_type' => 'machine',
					// 'posts_per_page' => -1,
					'paged' => $paged,
					'meta_key' => $triggerMetaKey,
					'orderby' => $triggerOBy,
					'order'	=> $setOrder,
					'rand_seed' => $seed,
					'tax_query' => array(
						array(
							'taxonomy' => 'machine_category',
							'field'    => 'name',
							'terms'    => $category->name,
						),
						$createArray,
						$createModelArray,
						$createCountryArray,
					),
					'meta_query' => array(
						array(
							'key' => 'machine_year',
							'type' => 'NUMERIC',
							'value' => array($minYear, $maxYear),
							'compare' => 'BETWEEN'
						),
				    	array(
				    		'key' => 'choose_industry',
				    		'value' => $currentIndustry,
				    		'compare' => '='
				    	),
				    	$conditionArray,
				    	$excludeNAfromQuery,
					),
					'tag' => $fByPrice,
				);

				// Add an additional query to exclude posts where 'delisted' is true.
				$args['meta_query'][] = array(
					'key' => 'delisted',
					'type' => 'BOOLEAN',
					'value' => 1,
					'compare' => '!=',
				);

				$query = new WP_Query($args);

				// echo $query->max_num_pages;

				$currentAd = 0;

				if ($query -> have_posts()) {

					$Count_post_no = 0;

					while ($query -> have_posts()) {
				    	$query -> the_post();
				    	if ( isset($_GET['fPrice']) && $_GET['fPrice'] == "Low to High" ) {
				    		if ( get_field('machine_price') !== "N/A" ) {
				    			$Count_post_no++;
				    		}
						}
						if ( isset($_GET['fPrice']) && $_GET['fPrice'] == "High to Low" ) {
							$Count_post_no++;
						}
						if ( isset($_GET['fPrice']) == false ) {
							$Count_post_no++;
						}
				    	?>

				    	<!-- // Post Content -->
						<?php get_template_part( "template-parts/machine" ); ?>

						<!-- // Push Newsletter section after certain machine -->
						<?php
							$DBSettingNlNo = get_field('newsletter_position', 'option');

							if ($Count_post_no == $DBSettingNlNo) {
								get_template_part( "template-parts/newsletter" );
							}

							if ( get_field('advertisement_loop_position', 'option') !== '' ) {
								$DBSettingAdNo = get_field('advertisement_loop_position', 'option');

								if ($Count_post_no % $DBSettingAdNo == 0 && $Count_post_no !== 0) {
									$currentAd++;

									$getCurInArgs = array(
										'post_type' => 'machine_industry',
										'post_per_page' => 1,
										'tax_query' => array(
									        array(
									        	'taxonomy' => 'machine_category',
												'field'    => 'name',
												'terms'    => $category->name,
									        ),
									    ),
									);
									$getCurIn = new WP_Query($getCurInArgs);

									if ($getCurIn->have_posts()) {
										$getCurIn->the_post();
										$curIndustry = get_the_title();

										wp_reset_query();
									}
									
									$adArgs = array(
										'post_type' => 'advertisee',
										'post_per_page' => 1,
									    'meta_query' => array(
									    	'relation' => 'AND',
									    	array(
									    		'key' => 'adIndustry',
									    		'value' => $curIndustry,
									    	),
									    	array(
									    		'key' => 'ad_number',
					    						'type' => 'NUMERIC',
									    		'value' => $currentAd,
									    	),
									    ),
									);
									$adLoop = new WP_Query($adArgs);

									if ($adLoop->have_posts()) {
										$adLoop->the_post(); ?>

										<div class="fullWidth_wrapper thisIsAnAdWrapper">
											<div class="site_container">
												<div class="s_product">
													<!-- // Product Info -->
													<!-- put this brder style attribute to "itsAdContent" div whenever needs -->
													<!-- style="border:1px solid <?php //the_field('ad_border_color'); ?>;" -->
													<div class="productInfo itsAdContent">
														<?php
															if ( get_field('ad_image') && !empty(get_field('ad_image')) ) {
																?>
																<div class="desktopAdImage">
																	<a href="<?php the_field('ad_link'); ?>" target="_blank">
																		<img src="<?php the_field('ad_image'); ?>" alt="">
																	</a>
																	<a href="<?php the_field('ad_link_2'); ?>" target="_blank">
																		<?php
																			if ( get_field('ad_image_2') && !empty(get_field('ad_image_2')) ) {
																				?>
																				<img src="<?php the_field('ad_image_2'); ?>" alt="">
																				<?php
																			}
																		?>
																	</a>
																	<a href="<?php the_field('ad_link_3'); ?>" target="_blank">
																		<?php
																			if ( get_field('ad_image_3') && !empty(get_field('ad_image_3')) ) {
																				?>
																				<img src="<?php the_field('ad_image_3'); ?>" alt="">
																				<?php
																			}
																		?>
																	</a>
																</div>
																<?php
															}
														?>
														<?php
															if ( get_field('ad_image_t') && !empty(get_field('ad_image_t')) ) {
																?>
																<div class="tabAdImage">
																	<a href="<?php the_field('ad_link'); ?>" target="_blank">
																		<img src="<?php the_field('ad_image_t'); ?>" alt="">
																	</a>
																	<a href="<?php the_field('ad_link_2'); ?>" target="_blank">
																		<?php
																			if ( get_field('ad_image_t_2') && !empty(get_field('ad_image_t_2')) ) {
																				?>
																				<img src="<?php the_field('ad_image_t_2'); ?>" alt="">
																				<?php
																			}
																		?>
																	</a>
																</div>
																<?php
															}
														?>
														<?php
															if ( get_field('ad_image_m') && !empty(get_field('ad_image_m')) ) {
																?>
																<div class="mobileAdImage">
																	<a href="<?php the_field('ad_link'); ?>" target="_blank">
																		<img src="<?php the_field('ad_image_m'); ?>" alt="">
																	</a>
																</div>
																<?php
															}
														?>
													</div>
												</div>
											</div>
										</div>
										
										<?php wp_reset_query();
									} else {
										$currentAd = 0;
									}
								}
							}
						?>
					<?php }
					wp_reset_query();
				} else {
					echo '<span class="color_orange">';
					echo 'no machines found';
					echo '</span>';
				}

				$phpVariable['currentCat'] = $category->name;
				$phpVariable['currentInd'] = $currentIndustry;
				$phpVariable['currentAd'] = $currentAd;
				$phpVariable['wpPostsPerPage'] = get_option('posts_per_page');
				$jsonData = json_encode( $phpVariable );
			?>
		</div>
		<!-- // Pagination -->
		<?php
			/*if (function_exists("pagination")) {
				pagination($additional_loop->max_num_pages);
			}*/
		?>

		<div class="loadMoreMachines">
			<button id="loadMore" data-currentpageurl="<?php echo admin_url( 'admin-ajax.php' ); ?>">loading .......</button>
		</div>
	</div>

	<!-- // Footer top border -->
	<div class="fullWidth_wrapper">
		<div class="footer_top_border">
			<ul>
				<?php
					$category = get_queried_object();

					$args = array(
						'post_type' => 'machine_industry',
						'post_per_page' => 1,
						'tax_query' => array(
					        array(
					        	'taxonomy' => 'machine_category',
									'field'    => 'name',
									'terms'    => $category->name,
					        ),
					    ),
					);
					$query = new WP_Query($args);

					if ($query->have_posts()) {
						$query->the_post();?>
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

	<!-- // Applied filter stats (OFD) -->
	<ul class="appliedFilterStats" style="display: none;">
		<li class="pooV"><?php
			if ( isset($_GET['fByPrice']) && $_GET['fByPrice'] && !empty($_GET['fByPrice']) ) {
				echo 'Applied';
			}
		?></li>
		<li class="condV"><?php
			if ( isset($_GET['fCond']) && $_GET['fCond'] && !empty($_GET['fCond']) ) {
				echo $_GET['fCond'];
			}
		?></li>
		<li class="yearV"><?php
			if ( isset($_GET['fYear']) && $_GET['fYear'] && !empty($_GET['fYear']) ) {
				echo $_GET['fYear'];
			}
		?></li>
		<li class="priceV"><?php
			if ( isset($_GET['fPrice']) && $_GET['fPrice'] && !empty($_GET['fPrice']) ) {
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

			// =========== Filter Form =========
			// $(".fByPriceOffer .checkBox").click(function(event) {
			// 	$(this).find('i').toggleClass('fa-check-square fa-square');

			// 	$(this).siblings('input').click();

			// 	$(this).siblings('input').toggleClass('selected');
			// 	var getInputState = $(this).siblings('input').hasClass('selected');

			// 	var getYearF = $("input[name=fYear]:checked").val();
			// 	var getPriceF = $("input[name=fPrice]:checked").val();

			// 	if (getInputState == false) {
			// 		$(".floatSubmit").hide(0);
			// 	} else {
			// 		$(".floatSubmit").show(0);
			// 	}
			// });

			$(".fByPriceOffer label").click(function(event) {
				// $(this).siblings('.checkBox').find('i').toggleClass('fa-check-square fa-square');
				$(this).children('.singleToggle').find('div, span').toggleClass('on');

				$(this).siblings('input').click();
				$(this).siblings('input').toggleClass('selected');
				var getInputState = $(this).siblings('input').hasClass('selected');

				var getYearF = $("input[name=fYear]:checked").val();
				var getPriceF = $("input[name=fPrice]:checked").val();

				var selectPoo = $(".appliedFilterStats li.pooV").text();
				$(".floatSubmit").click();
				// if ( selectPoo !== "" ) {
				// 	if (getInputState == false) {
				// 		$(".floatSubmit").show(0);
				// 	} else {
				// 		$(".floatSubmit").hide(0);
				// 	}
				// } else {
				// 	if (getInputState == false) {
				// 		$(".floatSubmit").hide(0);
				// 	} else {
				// 		$(".floatSubmit").show(0);
				// 	}
				// }
			});

			$(".fBycondition label").click(function(event) {
				// $(this).siblings('.checkBox').find('i').toggleClass('fa-check-square fa-square');
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

				// if (getInputState == false && getYearF == "" && getPriceF == "") {
				// 	$(".floatSubmit").hide(0);
				// } else {
				// 	$(".floatSubmit").show(0);
				// }
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
                console.log(rt);
            }
			});

			$(".cusFYear_field").click(function(event) {
				event.stopPropagation();
			});

			// If an event gets to the body
			$("body").click(function() {
				$(".cusFYear_field").fadeOut();
			});

			// ===== Breadcrumb bold ====
			$(".searchBreadCrumbs ul li:last-child").addClass('active');

			// ===== Breadcrumb Clicks ====
			$(".searchBreadCrumbs ul li#currentManufacturer a, .searchBreadCrumbs ul li#currentModel a, .searchBreadCrumbs ul li#currentCountry a, .searchBreadCrumbs ul li#currentState a").click(function(event) {
				event.preventDefault();

				var getNext1 = $(this).parent("li").next("li").children('a').text();
				var getNext2 = $(this).parent("li").next("li").next("li").children('a').text();
				var getNext3 = $(this).parent("li").next("li").next("li").next("li").children('a').text();

				if ($(this).parent("li").next("li").length == 1) {
					$("form.rawFilter").find("input[value='"+ getNext1 +"']").val('');
					console.log("This is model");
				}
				if ($(this).parent("li").next("li").next("li").length == 1) {
					$("form.rawFilter").find("input[value='"+ getNext2 +"']").val('');
				}
				if ($(this).parent("li").next("li").next("li").next("li").length == 1) {
					$("form.rawFilter").find("input[value='"+ getNext3 +"']").val('');
				}

				// Submit the form
				$("form.rawFilter").submit();
			});

			// ====== Newsletter form values =====
			$("input[name=grabCategory]").attr("value", "<?php echo $category->name; ?>");
			var getCatName = $(".searchBreadCrumbs li:first-child a").text();
			$("input[name=grabIndustry]").attr("value", getCatName);

			// ========= Raw Filter Form ==========
			$(".twoCatsFiltersInner li a").click(function(event) {
				event.preventDefault();
				// Form process
					var getParent = $(this).parents('ul').attr('class');
					var getVal = $(this).contents().not($(this).children()).text().trim('string');
					// var getVal = $(this).data('term_id');
					console.log(getVal);
					console.log("Parent is: "+getParent);

					switch (getParent) {
						case 'progress_category':
							$("form.rawFilter .rawFCat input").val(getVal);
							break;

						case 'progress_manufacturer':
							$("form.rawFilter .rawFMan input").val(getVal);
							break;

						case 'progress_model':
							$("form.rawFilter .rawFModel input").val(getVal);
							break;

						case 'progress_country':
							$("form.rawFilter .rawFCountry input").val(getVal);
							break;

						case 'progress_state':
							$("form.rawFilter .rawFState input").val(getVal);
							break;

						default:
							// statements_def
							break;
					}

				// console.log(getIndex);
				$("form.rawFilter").submit();
			});

			// ======== Show two cats =========
			if ($(".searchBreadCrumbs ul li").length == 3 && $(".searchBreadCrumbs ul li#currentManufacturer").length == 1) {
				$(".twoCatsFiltersInner ul.progress_category, .twoCatsFiltersInner ul.progress_manufacturer").hide();
				$(".twoCatsFiltersInner .sByCats > h2").text('Search by Model');
				$(".twoCatsFiltersInner .sByCats > h2").append('<span class="line" style="width: 704px;">');
				$(".twoCatsFiltersInner ul.progress_model").show();
				$('.sByCats ul.progress_model li:gt(14)').hide();
			}

			// ------------------------------
			if (
				$(".searchBreadCrumbs ul li").length == 4 &&
				$(".searchBreadCrumbs ul li#currentCategory").length == 1 &&
				$(".searchBreadCrumbs ul li#currentManufacturer").length == 1 &&
				$(".searchBreadCrumbs ul li#currentModel").length == 0
			) {
				$(".twoCatsFiltersInner ul.progress_category, .twoCatsFiltersInner ul.progress_manufacturer").hide();
				$(".twoCatsFiltersInner .sByCats > h2").text('Search by Model');
				$(".twoCatsFiltersInner .sByCats > h2").append('<span class="line" style="width: 704px;">');
				$(".twoCatsFiltersInner ul.progress_model").show();
				$('.sByCats ul.progress_model li:gt(14)').hide();
			}

			// ------------------------------
			if (
				$(".searchBreadCrumbs ul li").length >= 4 &&
				$(".searchBreadCrumbs ul li#currentCategory").length == 1 &&
				$(".searchBreadCrumbs ul li#currentManufacturer").length == 1 &&
				$(".searchBreadCrumbs ul li#currentModel").length == 1
			) {
				$(".twoCatsFiltersInner .sByCats").hide();
				// $(".twoCatsFiltersInner .sBycountry").css('width', '100%');
			}

			// -------------- Hide manufacturer ----------------
			if (
				$(".searchBreadCrumbs ul li").length >= 4 &&
				$(".searchBreadCrumbs ul li#currentCategory").length == 1 &&
				$(".searchBreadCrumbs ul li#currentManufacturer").length == 1 &&
				$(".searchBreadCrumbs ul li#currentState").length == 1
			) {
				$(".twoCatsFiltersInner ul.progress_category, .twoCatsFiltersInner ul.progress_manufacturer").hide();
				$(".twoCatsFiltersInner .sByCats > h2").text('Search by Model');
				$(".twoCatsFiltersInner .sByCats > h2").append('<span class="line" style="width: 704px;">');
				$(".twoCatsFiltersInner ul.progress_model").show();
				$('.sByCats ul.progress_model li:gt(14)').hide();
			}

			// -------------- Hide Country ----------------
			if (
				$(".searchBreadCrumbs ul li").length >= 3 &&
				$(".searchBreadCrumbs ul li#currentCountry").length == 1
			) {
				$(".twoCatsFiltersInner ul.progress_country").hide();
				$(".twoCatsFiltersInner .sBycountry > h2").text('Search by State');
				$(".twoCatsFiltersInner .sBycountry > h2").append('<span class="line" style="width: 704px;"></span><span class="line lineForTop" style="width: 704px;"></span>');
				$(".twoCatsFiltersInner ul.progress_state").show();
				$('.sBycountry ul.progress_state li:gt(14)').hide();

				if ( $(window).width() <= 834 ) {
					$(".sBycountry").hide();
					$(".twoCatsFilters").css('margin-bottom', '0');
				}
			}

			// -------------- Hide State ----------------
			if (
				$(".searchBreadCrumbs ul li").length >= 4 &&
				$(".searchBreadCrumbs ul li#currentState").length == 1
			) {
				$(".twoCatsFilters .sBycountry h2").css('visibility', 'hidden');
				$(".twoCatsFilters .sBycountry h2 .line").css('visibility', 'visible');
				$(".twoCatsFilters .sBycountry ul.progress_state, .twoCatsFilters .sBycountry .collapse_catsSec ").hide();
			}
			if (
				$(".searchBreadCrumbs ul li").length == 6 &&
				$(".searchBreadCrumbs ul li#currentState").length == 1
			) {
				$(".twoCatsFilters").hide();
				$(".searchBreadCrumbs").css("margin-bottom", "50px");
			}

			// ======== Auto cats select =======
			var grabCatName = $(".searchBreadCrumbs ul li#currentCategory a").text();
			// console.log(grabCatName);
			$("form.rawFilter .rawFCat").find("input[value='"+grabCatName+"']").click();
			$("form.rawFilter .rawFCat").find("input[value='"+grabCatName+"']").next().click();
		});
 	
 		// Top filters collapse
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
					if ($('.sBycountry ul:visible li:gt(14)').is( ":visible" )) {
						$('.sBycountry ul:visible li:gt(14)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sBycountry ul:visible li:gt(14)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
			}
			
			if ($(window).width() < 1024 && $(window).width() > 800) { 
				$('.sByCats ul:visible li:gt(5), .sBycountry ul:visible li:gt(5)').hide();

				$(".sByCats .collapse_catsSec").click(function() {
					if ($('.sByCats ul:visible li:gt(5)').is( ":visible" )) {
						$('.sByCats ul:visible li:gt(5)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sByCats ul:visible li:gt(5)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
				// -----------------------------------------
				$(".sBycountry .collapse_catsSec").click(function() {
					if ($('.sBycountry ul:visible li:gt(5)').is( ":visible" )) {
						$('.sBycountry ul:visible li:gt(5)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sBycountry ul:visible li:gt(5)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
			}

			if ($(window).width() == 1024) { 
				$('.sByCats ul:visible li:gt(5), .sBycountry ul:visible li:gt(3)').hide();

				$(".sByCats .collapse_catsSec").click(function() {
					if ($('.sByCats ul:visible li:gt(5)').is( ":visible" )) {
						$('.sByCats ul:visible li:gt(5)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sByCats ul:visible li:gt(5)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
				// -----------------------------------------
				$(".sBycountry .collapse_catsSec").click(function() {
					if ($('.sBycountry ul:visible li:gt(3)').is( ":visible" )) {
						$('.sBycountry ul:visible li:gt(3)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sBycountry ul:visible li:gt(3)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
			}

			if ($(window).width() <= 768 && $(window).width() >= 375) { 
				$('.sByCats ul:visible li:gt(5), .sBycountry ul:visible li:gt(5)').hide();

				$(".sByCats .collapse_catsSec").click(function() {
					if ($('.sByCats ul:visible li:gt(5)').is( ":visible" )) {
						$('.sByCats ul:visible li:gt(5)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sByCats ul:visible li:gt(5)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
				// -----------------------------------------
				$(".sBycountry .collapse_catsSec").click(function() {
					if ($('.sBycountry ul:visible li:gt(5)').is( ":visible" )) {
						$('.sBycountry ul:visible li:gt(5)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sBycountry ul:visible li:gt(5)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
			}

			if ($(window).width() == 320) { 
				$('.sByCats ul:visible li:gt(3), .sBycountry ul:visible li:gt(3)').hide();

				$(".sByCats .collapse_catsSec").click(function() {
					if ($('.sByCats ul:visible li:gt(3)').is( ":visible" )) {
						$('.sByCats ul:visible li:gt(3)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sByCats ul:visible li:gt(3)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
				// -----------------------------------------
				$(".sBycountry .collapse_catsSec").click(function() {
					if ($('.sBycountry ul:visible li:gt(3)').is( ":visible" )) {
						$('.sBycountry ul:visible li:gt(3)').hide();
						// $(this).toggleClass('closed opened');
						$(this).html('View All');
					} else {
						$('.sBycountry ul:visible li:gt(3)').show();
						// $(this).toggleClass('closed opened');

						$(this).html('View Less');
					}
				});
			}
		});

		// Check applied filter
		jQuery(document).ready(function($) {
			var selectPoo = $(".appliedFilterStats li.pooV").text();
			if ( selectPoo !== "" ) {
				// $("form.machine_filter li.fByPriceOffer .checkBox i").toggleClass('fa-square fa-check-square');
				$("form.machine_filter li.fByPriceOffer .singleToggle").find('div, span').toggleClass('on');
				$("form.machine_filter li.fByPriceOffer input").prop('checked', 'checked');
				$("form.machine_filter li.fByPriceOffer input").toggleClass('selected');
			}

			// ----------------------
			var selectCond = $(".appliedFilterStats li.condV").text();
			if ( selectCond !== "" ) {
				// $("label:contains("+selectCond+")").siblings('input').prop('checked', 'checked');
				// $("label:contains("+selectCond+")").siblings('img').attr('src', 'https://machinelista.com/wp-content/themes/Used-Machine-SE/img/check.png');
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
		});

		// Three columns for country 1024px
		jQuery(document).ready(function($) {
			if ( $(".progress_country").width() > 768 ) {
				$(".progress_country").css('grid-template-columns', '1fr 1fr 1fr');
			}
		});
	</script>

	<script>
		$(document).ready(function() {
			$(".thisIsAnAdWrapper").prev('.fullWidth_wrapper').find('.pInfoPriceInner').addClass('endImage');
			
			if ($(".thisIsAnAdWrapper").next(".fullWidth_wrapper").next(".fullWidth_wrapper").length >= 1) {
				$(".thisIsAnAdWrapper").next('.fullWidth_wrapper').find('.pInfoPriceInner').addClass('startImage');
			}

			// -------------------------
			$(".thisIsAnNLWrapper").prev('.fullWidth_wrapper').find('.pInfoPriceInner').addClass('endImage');
			$(".thisIsAnNLWrapper").next('.fullWidth_wrapper').find('.pInfoPriceInner').addClass('startImage');
			
			if ($(".thisIsAnNLWrapper").next(".fullWidth_wrapper").next(".fullWidth_wrapper").length >= 2) {
				$(".thisIsAnNLWrapper").next('.fullWidth_wrapper').find('.pInfoPriceInner').addClass('startImage');
			}

			// --------------------------
			// $(".allSearchedProducts").find('.pInfoPriceInner').addClass('endImage');

			// --------------------------
			if ( $(".allSearchedProducts .fullWidth_wrapper").length == 1 ) {
				$(".allSearchedProducts .fullWidth_wrapper:first-child").find('.pInfoPriceInner').addClass('zeroPoint');
				$(".allSearchedProducts .fullWidth_wrapper:first-child").find('.pInfoPriceInner').removeClass('endImage');
			} else {
				$(".allSearchedProducts .fullWidth_wrapper:first-child").find('.pInfoPriceInner').addClass('startImage');
				$(".allSearchedProducts .fullWidth_wrapper:last-child").find('.pInfoPriceInner').addClass('endImage');;
			}

			// =========== Line till edge =========
			var whatever = $(".twoCatsFilters .twoCatsFiltersInner h2");
			// var whateverWidth = $(".twoCatsFilters .twoCatsFiltersInner h2").width();
			var rt = ($(window).width() - (whatever.offset().left + whatever.outerWidth()));
			// var totval = whateverWidth + rt;
			$(".line").width(rt);
			if ($(".sByCats:visible").length == 0) {
				var getLeftOffset = $(".twoCatsFiltersInner").offset().left;
				// getLeftOffset += 50;
				$(".line").css('left', '-'+ getLeftOffset +'px');
			}
			if ( $(window).width() <= 850 ) {
				var whatever = $(".twoCatsFilters .twoCatsFiltersInner h2");
				var rt = $(window).width();
				var leftOffset = whatever.offset().left;
				$(".line").width(rt).css('left', '-'+leftOffset+'px');
			}
			// console.log(getLeftOffset);


			// ==================
			window.onscroll = function() {scrollFunction()};

			function scrollFunction() {
				if (document.body.scrollTop > 120 || document.documentElement.scrollTop > 120) {
					
					$(".sticky_header").addClass('hasWhiteSpace');
				} else {
					$(".sticky_header").removeClass('hasWhiteSpace');
				}
			}

			// Hide view all if no needed
			function hideViewAllButton(count = 16) {
				$(".twoCatsFiltersInner > div").each(function(index, el) {
					let taxoItems = $(this).find('ul li').length;
					if (taxoItems < count) {
						$(this).find('.collapse_catsSec').remove();
					}
				});
			}

			// ======== Vertical allignment  ========
			function verticalAlign(secName, column = 3, plus = 0.5) {
				var getActiveCatList = $(".twoCatsFilters .twoCatsFiltersInner ul."+secName+" li:visible").length;
				getActiveCatList = (getActiveCatList / column) + plus;
				getActiveCatList = Math.round(getActiveCatList);

				$(".twoCatsFilters .twoCatsFiltersInner ul."+secName+"").css({
					'grid-auto-flow': 'column',
					'grid-template-rows': 'repeat('+getActiveCatList+', auto)'
				});
			}
			
			if ( $(window).width() > 1024 ) {
				verticalAlign('progress_manufacturer');
				verticalAlign('progress_model');
				verticalAlign('progress_country');
				verticalAlign('progress_state');
				// ----------------
				hideViewAllButton(16);
			} else if ( $(window).width() > 480 ) {
				verticalAlign('progress_manufacturer', 3, 0);
				verticalAlign('progress_model', 3, 0);
				verticalAlign('progress_country', 2, 0);
				verticalAlign('progress_state', 2, 0);
				// ----------------
				hideViewAllButton(7);
			} else if ( $(window).width() < 480 ) {
				verticalAlign('progress_manufacturer', 1, 0);
				verticalAlign('progress_model', 1, 0);
				verticalAlign('progress_country', 1, 0);
				verticalAlign('progress_state', 1, 0);
				// ----------------
				hideViewAllButton(7);
			}

			$("button.collapse_catsSec").click(function(event) {
				var getActiveUl = $(this).parent().children('ul:visible').attr('class');

				if ( $(window).width() > 1024 ) {
					verticalAlign(getActiveUl);
				} else if ( $(window).width() > 480 ) {
					if ( $(this).parent().attr('class') == 'sByCats' ) {
						if ( $(this).text() == 'View Less' ) {
							verticalAlign(getActiveUl, 3);
							console.log($(this).text());
						} else {
							verticalAlign(getActiveUl, 3, 0);
							console.log($(this).text());
						}
					} else {
						verticalAlign(getActiveUl, 2, 0);
					}
				} else if ( $(window).width() < 480 ) {
					verticalAlign(getActiveUl, 1, 0);
				}
			});

			/* "Search by Manufacturer" and "Search by Country" bottom (view all avobe) line codes */
			if ( $(window).width() > 480 ) {
				var whatever2 = $(".twoCatsFilters");
				var rightOffset = ($(window).width() - (whatever2.offset().left + whatever2.outerWidth()));
				$(".sBycountry .after").width( $(".sBycountry").width() + rightOffset );
				// console.log(rightOffset);
			}
			if ( $(window).width() <= 834 && $(window).width() > 567 ) {
				var whatever2 = $(".twoCatsFilters");
				var rightOffset = ($(window).width() - (whatever2.offset().left + whatever2.width()));
				$(".sBycountry .after").width( $(window).width() );
				$(".sBycountry .after").css('left', '-'+whatever2.offset().left+'px');
				$(".sByCats .after").css({
					right: 'unset',
					left: '-'+whatever2.offset().left+'px',
				});
				// console.log(rightOffset);
			}

			// Infinite scroll
			function loadMorePosts() {
			   var page = 2; // Start from the second page, as the first page was already loaded
			   var isLoading = false;
			   var ajaxurl = "/wp-admin/admin-ajax.php";
			   let loadMorePostsEnabled = true;

			   var jsData = <?php echo $jsonData; ?>;
			   var currentCat = jsData.currentCat;
			   var currentInd = jsData.currentInd;
			   var fByPrice = jsData.fByPrice;
			   var fCond = jsData.fCond;
			   var fPrice = jsData.fPrice;
			   var fYear = jsData.fYear;
			   var rawFCountry = jsData.rawFCountry;
			   var rawFMan = jsData.rawFMan;
			   var rawFModel = jsData.rawFModel;
			   var rawFstate = jsData.rawFstate;
			   var wpPostsPerPage = jsData.wpPostsPerPage;
			   var currentAd = jsData.currentAd;
			   var postCount = wpPostsPerPage;

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
				            action: "load_more_posts",
				            page: page,
				            postCount: postCount,
							   currentCat: currentCat,
							   currentInd: currentInd,
							   fByPrice: fByPrice,
							   fCond: fCond,
							   fPrice: fPrice,
							   fYear: fYear,
							   rawFCountry: rawFCountry,
							   rawFMan: rawFMan,
							   rawFModel: rawFModel,
							   rawFstate: rawFstate,
							   currentAd: currentAd,
				         },
				         success: function (response) {
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
				                  // if (posts == '<span class="color_orange">no more machines found</span>') {
				                  // 	loadMorePostsEnabled = false;
				                  // 	$(".loadMoreMachines").hide();
				                  // }
				                  console.log(posts.length);
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

						         // Get ad number
						         var currentAdno = response.data.currentAd;
						         console.log("Ad no is: " + currentAdno);
						         currentAd = currentAdno;
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
			   /*jQuery(window).scroll(function () {
			      if (jQuery(window).scrollTop() + jQuery(window).height() >= jQuery(document).height()) {
			         loadPosts();
			      }
			   });*/
			   
			   // ======== Trigger load posts function on scroll =======
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

			// Hide state if empty
			if ($("ul.progress_state").length > 0) {
				let getStates = $("ul.progress_state li").length;
				if (getStates < 1) {
					$(".sBycountry").remove();
					$(".sByCats").addClass('noStateLayout');
					// =====================
					var windowWidth = $(window).width();
					var whatever = $(".twoCatsFilters .twoCatsFiltersInner h2");
					var leftOffset = whatever.offset().left;
					// var totval = whateverWidth + rt;
					$(".line").width(windowWidth);
					$(".line").css('left', '-'+ leftOffset +'px');
				}
			}

			// ===== Toggle switch =====
			// if ($(".singleToggle").length > 0) {
			// 	$(".singleToggle").click(function(event) {
			// 		$(this).find('div, span').toggleClass('on');
			// 	});
			// }
		});
	</script>

	<?php wp_footer(); ?>
</body>
</html>