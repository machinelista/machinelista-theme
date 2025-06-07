<?php get_header(); ?>

<body <?php body_class( $class = 'pageSearch' ); ?>>
	<!-- Page specific CSS -->
	<style>
		.header_bottom_border {
			margin-bottom: 0;
		}
		.sticky_header.hasWhiteSpace::before {
		    content: '';
		    width: 100%;
		    height: 10px;
		    position: absolute;
		    background-color: #fff;
		    bottom: -11px;
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

					$args = array(
						'post_type' => 'machine_industry',
						'post_per_page' => 1,
						'tax_query' => array(
					        array(
					        	'taxonomy' => 'machine_manufacturer',
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

						$args = array(
							'post_type' => 'machine_industry',
							'post_per_page' => 1,
							'tax_query' => array(
						        array(
						        	'taxonomy' => 'machine_manufacturer',
			  						'field'    => 'name',
			  						'terms'    => $category->name,
						        ),
						    )
						);
						$query = new WP_Query($args);
					?>

					<!-- // Manage Industry Info -->
					<?php
						if ($_GET['industryName'] && !empty($_GET['industryName'])) {
							function pushInName() {
								echo $_GET['industryName'];
							}
						}
						if ($_GET['industryUrl'] && !empty($_GET['industryUrl'])) {
							function pushInUrl() {
								echo $_GET['industryUrl'];
							}
						}
					?>

					<!-- <li><a href="<?php $query -> the_post(); the_permalink(); ?>"><?php the_title(); ?></a></li> -->

					<li>
						<a href="<?php if(function_exists('pushInUrl')){pushInUrl();} ?>"><?php if(function_exists('pushInUrl')){pushInName();} ?></a>
					</li>

					<?php
						if (
							$_GET['rawFCat'] && !empty($_GET['rawFCat'])
						) {?>
							<li id="currentCategory"><a href="<?php echo $_GET['rawFCatUrl']; ?>"><?php echo $_GET['rawFCat']; ?></a></li>
						<?php }
					?>

					<?php
						if ($_GET['rawFMan'] && !empty($_GET['rawFMan'])) {?>
							<li id="currentManufacturer"><a href="<?php echo $_GET['rawFManUrl']; ?>"><?php echo $_GET['rawFMan']; ?></a></li>
						<?php } else {?>
							<li id="currentManufacturer"><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></li>
						<?php }
					?>

					<?php
						if ($_GET['rawFModel'] && !empty($_GET['rawFModel'])) {?>
							<li id="currentModel"><a href="<?php echo $_GET['rawFModelUrl']; ?>"><?php echo $_GET['rawFModel']; ?></a></li>
						<?php }
					?>

					<?php
						if ($_GET['rawFCountry'] && !empty($_GET['rawFCountry'])) {?>
							<li id="currentCountry"><a href="<?php echo $_GET['rawFCountryUrl']; ?>"><?php echo $_GET['rawFCountry']; ?></a></li>
						<?php }
					?>

					<?php
						if ($_GET['rawFstate'] && !empty($_GET['rawFstate'])) {?>
							<li id="currentState"><a href="<?php echo $_GET['rawFstateUrl']; ?>"><?php echo $_GET['rawFstate']; ?></a></li>
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
						<h2>Search by Category</h2>
						<ul class="progress_category">
							<?php
								$getCats = get_the_terms( '' , 'machine_category' );

								if ($getCats == true) {
									foreach ( $getCats as $getCat ) {
										// echo '<li><a href="/machine_manufacturer/'.$getCat->slug.'">';
										echo '<li><a href="">';
										echo $getCat->name, ' ';

										// Raw Form Fields
										if ($_GET['rawFCat'] && !empty($_GET['rawFCat'])) {
											$rawFCat = $_GET['rawFCat'];
											$createCategoryArray = array(
									        	'taxonomy' => 'machine_category',
						  						'field'    => 'name',
						  						'terms'    => $rawFCat,
									        );
										}

										if ($_GET['rawFMan'] && !empty($_GET['rawFMan'])) {
											$rawFMan = $_GET['rawFMan'];
											$createArray = array(
									        	'taxonomy' => 'machine_manufacturer',
						  						'field'    => 'name',
						  						'terms'    => $rawFMan,
									        );
										}

										if ($_GET['rawFModel'] && !empty($_GET['rawFModel'])) {
											$rawFModel = $_GET['rawFModel'];
											$createModelArray = array(
									        	'taxonomy' => 'machine_model',
						  						'field'    => 'name',
						  						'terms'    => $rawFModel,
									        );
										}

										if ($_GET['rawFCountry'] && !empty($_GET['rawFCountry'])) {
											$rawFCountry = $_GET['rawFCountry'];
											$createCountryArray = array(
									        	'taxonomy' => 'machine_country',
						  						'field'    => 'name',
						  						'terms'    => $rawFCountry,
									        );
										}

										if ($_GET['rawFState'] && !empty($_GET['rawFState'])) {
											$rawFState = $_GET['rawFState'];
											$createStateArray = array(
									        	'taxonomy' => 'machine_country',
						  						'field'    => 'name',
						  						'terms'    => $rawFState,
									        );
										}

										// Loop
										$filter_count = new WP_Query( array( 
												'post_type' => 'machine',
												'tax_query' => array(
										        array(
										        	'taxonomy' => 'machine_category',
							  						'field'    => 'name',
							  						'terms'    => $getCat->name,
										        ),
										        $createArray,
												$createModelArray,
												$createCountryArray,
												$createStateArray
										    ),
									    ) );
										$count = $filter_count->found_posts;

										echo '<span class="count">',$count, '</span>';
										echo '</a></li>';
									}
								}
							?>
						</ul>

						<ul class="progress_manufacturer" style="display: none;">
							<?php
								$getMans = get_the_terms( '' , 'machine_manufacturer' );

								if ($getMans== true) {
									foreach ( $getMans as $getMan ) {
										// echo '<li><a href="/machine_manufacturer/'.$getMan->slug.'">';
										echo '<li><a href="">';
										echo $getMan->name, ' ';

										// Raw Form Fields
										if ($_GET['rawFCat'] && !empty($_GET['rawFCat'])) {
											$rawFCat = $_GET['rawFCat'];
											$createCategoryArray = array(
									        	'taxonomy' => 'machine_category',
						  						'field'    => 'name',
						  						'terms'    => $rawFCat,
									        );
										}

										if ($_GET['rawFMan'] && !empty($_GET['rawFMan'])) {
											$rawFMan = $_GET['rawFMan'];
											$createArray = array(
									        	'taxonomy' => 'machine_manufacturer',
						  						'field'    => 'name',
						  						'terms'    => $rawFMan,
									        );
										}

										if ($_GET['rawFModel'] && !empty($_GET['rawFModel'])) {
											$rawFModel = $_GET['rawFModel'];
											$createModelArray = array(
									        	'taxonomy' => 'machine_model',
						  						'field'    => 'name',
						  						'terms'    => $rawFModel,
									        );
										}

										if ($_GET['rawFCountry'] && !empty($_GET['rawFCountry'])) {
											$rawFCountry = $_GET['rawFCountry'];
											$createCountryArray = array(
									        	'taxonomy' => 'machine_country',
						  						'field'    => 'name',
						  						'terms'    => $rawFCountry,
									        );
										}

										if ($_GET['rawFState'] && !empty($_GET['rawFState'])) {
											$rawFState = $_GET['rawFState'];
											$createStateArray = array(
									        	'taxonomy' => 'machine_country',
						  						'field'    => 'name',
						  						'terms'    => $rawFState,
									        );
										}

										// Loop
										$filter_count = new WP_Query( array( 
												'post_type' => 'machine',
												'tax_query' => array(
										        array(
										        	'taxonomy' => 'machine_manufacturer',
							  						'field'    => 'name',
							  						'terms'    => $getMan->name,
										        ),
										        $createCategoryArray,
												$createModelArray,
												$createCountryArray,
												$createStateArray
										    ),
									    ) );
										$count = $filter_count->found_posts;

										echo '<span class="count">',$count, '</span>';
										echo '</a></li>';
									}
								}
							?>
						</ul>

						<ul class="progress_model" style="display: none;">
							<?php
								$getModels = get_the_terms( '' , 'machine_model' );

								if ($getModels == true) {
									foreach ( $getModels as $getModel ) {
										// echo '<li><a href="/machine_manufacturer/'.$getModel->slug.'">';
										echo '<li><a href="">';
										echo $getModel->name, ' ';

										// Raw Form Fields
										if ($_GET['rawFCat'] && !empty($_GET['rawFCat'])) {
											$rawFCat = $_GET['rawFCat'];
											$createCategoryArray = array(
									        	'taxonomy' => 'machine_category',
						  						'field'    => 'name',
						  						'terms'    => $rawFCat,
									        );
										}

										if ($_GET['rawFMan'] && !empty($_GET['rawFMan'])) {
											$rawFMan = $_GET['rawFMan'];
											$createArray = array(
									        	'taxonomy' => 'machine_manufacturer',
						  						'field'    => 'name',
						  						'terms'    => $rawFMan,
									        );
										}

										if ($_GET['rawFModel'] && !empty($_GET['rawFModel'])) {
											$rawFModel = $_GET['rawFModel'];
											$createModelArray = array(
									        	'taxonomy' => 'machine_model',
						  						'field'    => 'name',
						  						'terms'    => $rawFModel,
									        );
										}

										if ($_GET['rawFCountry'] && !empty($_GET['rawFCountry'])) {
											$rawFCountry = $_GET['rawFCountry'];
											$createCountryArray = array(
									        	'taxonomy' => 'machine_country',
						  						'field'    => 'name',
						  						'terms'    => $rawFCountry,
									        );
										}

										if ($_GET['rawFState'] && !empty($_GET['rawFState'])) {
											$rawFState = $_GET['rawFState'];
											$createStateArray = array(
									        	'taxonomy' => 'machine_country',
						  						'field'    => 'name',
						  						'terms'    => $rawFState,
									        );
										}

										// Loop
										$filter_count = new WP_Query( array( 
												'post_type' => 'machine',
												'tax_query' => array(
										        array(
										        	'taxonomy' => 'machine_model',
							  						'field'    => 'name',
							  						'terms'    => $getModel->name,
										        ),
										        $createCategoryArray,
										        $createArray,
												$createCountryArray,
												$createStateArray
										    ),
									    ) );
										$count = $filter_count->found_posts;

										echo '<span class="count">',$count, '</span>';
										echo '</a></li>';
									}
								}
							?>
						</ul>
						<button class="collapse_catsSec closed">View All</button>
					</div>

					<div class="sBycountry">
						<h2>
							Search by Country
							<span class="line"></span>
							<span class="line lineForTop"></span>
						</h2>

						<ul class="progress_country">
							<?php
								// $getCountries = get_the_terms( '' , 'machine_country' );
								$getCountries = get_terms(array(
									"hide_empty" => false,
						            "taxonomy" => "machine_country",
						            // "childless" => true,
						            'parent' => 0,
								));

								if ($getCountries == true) {
									foreach ( $getCountries as $getCountry ) {
										echo '<li><a href="/machine_country/'.$getCountry->slug.'">';
										echo $getCountry->name, ' ';

										// Raw Form Fields
										if ($_GET['rawFCat'] && !empty($_GET['rawFCat'])) {
											$rawFCat = $_GET['rawFCat'];
											$createCategoryArray = array(
									        	'taxonomy' => 'machine_category',
						  						'field'    => 'name',
						  						'terms'    => $rawFCat,
									        );
										}

										if ($_GET['rawFMan'] && !empty($_GET['rawFMan'])) {
											$rawFMan = $_GET['rawFMan'];
											$createArray = array(
									        	'taxonomy' => 'machine_manufacturer',
						  						'field'    => 'name',
						  						'terms'    => $rawFMan,
									        );
										}

										if ($_GET['rawFModel'] && !empty($_GET['rawFModel'])) {
											$rawFModel = $_GET['rawFModel'];
											$createModelArray = array(
									        	'taxonomy' => 'machine_model',
						  						'field'    => 'name',
						  						'terms'    => $rawFModel,
									        );
										}

										if ($_GET['rawFCountry'] && !empty($_GET['rawFCountry'])) {
											$rawFCountry = $_GET['rawFCountry'];
											$createCountryArray = array(
									        	'taxonomy' => 'machine_country',
						  						'field'    => 'name',
						  						'terms'    => $rawFCountry,
									        );
										}

										if ($_GET['rawFState'] && !empty($_GET['rawFState'])) {
											$rawFState = $_GET['rawFState'];
											$createStateArray = array(
									        	'taxonomy' => 'machine_country',
						  						'field'    => 'name',
						  						'terms'    => $rawFState,
									        );
										}

										// Loop
										$filter_count = new WP_Query( array( 
												'post_type' => 'machine',
												'tax_query' => array(
										        array(
										        	'taxonomy' => 'machine_country',
							  						'field'    => 'name',
							  						'terms'    => $getCountry->name,
										        ),
										        $createCategoryArray,
										        $createArray,
												$createModelArray,
												$createStateArray
										    ),
									    ) );
										$count = $filter_count->found_posts;

										echo '<span class="count">',$count, '</span>';
									echo '</a></li>';
									}
								} else {
									echo 'No country found.';
								}
							?>
						</ul>

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
								));

								if ($getStates == true) {
									foreach ( $getStates as $getState ) {
										echo '<li><a href="/machine_country/'.$getState->slug.'">';
										echo $getState->name, ' ';

										// Raw Form Fields
										if ($_GET['rawFCat'] && !empty($_GET['rawFCat'])) {
											$rawFCat = $_GET['rawFCat'];
											$createCategoryArray = array(
									        	'taxonomy' => 'machine_category',
						  						'field'    => 'name',
						  						'terms'    => $rawFCat,
									        );
										}

										if ($_GET['rawFMan'] && !empty($_GET['rawFMan'])) {
											$rawFMan = $_GET['rawFMan'];
											$createArray = array(
									        	'taxonomy' => 'machine_manufacturer',
						  						'field'    => 'name',
						  						'terms'    => $rawFMan,
									        );
										}

										if ($_GET['rawFModel'] && !empty($_GET['rawFModel'])) {
											$rawFModel = $_GET['rawFModel'];
											$createModelArray = array(
									        	'taxonomy' => 'machine_model',
						  						'field'    => 'name',
						  						'terms'    => $rawFModel,
									        );
										}

										if ($_GET['rawFCountry'] && !empty($_GET['rawFCountry'])) {
											$rawFCountry = $_GET['rawFCountry'];
											$createCountryArray = array(
									        	'taxonomy' => 'machine_country',
						  						'field'    => 'name',
						  						'terms'    => $rawFCountry,
									        );
										}

										if ($_GET['rawFState'] && !empty($_GET['rawFState'])) {
											$rawFState = $_GET['rawFState'];
											$createStateArray = array(
									        	'taxonomy' => 'machine_country',
						  						'field'    => 'name',
						  						'terms'    => $rawFState,
									        );
										}

										// Loop
										$filter_count = new WP_Query( array( 
												'post_type' => 'machine',
												'tax_query' => array(
										        array(
										        	// 'taxonomy' => 'machine_country',
										        	'taxonomy' => 'machine_country',
							  						'field'    => 'name',
							  						'terms'    => $getState->name,
										        ),
										        $createCategoryArray,
										        $createArray,
												$createModelArray,
												$createCountryArray,
										    ),
									    ) );
										$count = $filter_count->found_posts;

										echo '<span class="count">',$count, '</span>';
									echo '</a></li>';
									}
								} else {
									echo 'No country found.';
								}
							?>
						</ul>
						<button class="collapse_catsSec closed">View All</button>
					</div>
				</div>
			</div>
			<form action="<?php echo get_category_link($category->term_id); ?>" style="display: none;" method="GET" class="rawFilter">

				<div class="rawFCat">
					<ul>
						<?php
							$rawFCats = get_the_terms( '' , 'machine_category' );

							if ($rawFCats == true) {
								foreach ( $rawFCats as $rawFCat ) {
									// echo '<li><a href="/machine_manufacturer/'.$rawFCat->slug.'">';
									echo '<li>';
									echo $rawFCat->name, ' ';?>
									<?php
										if ($_GET['rawFCat'] && !empty($_GET['rawFCat'])) {?>
											<input name="rawFCat" type="radio" value="<?php echo $_GET['rawFCat'] ?>" hidden="" checked="checked">
											<input name="rawFCatUrl" type="radio" value="<?php echo $_GET['rawFCatUrl']; ?>" hidden="" checked="checked">
										<?php } else {?>
											<input name="rawFCat" type="radio" value="<?php echo $rawFCat->name; ?>" hidden="">
											<input name="rawFCatUrl" type="radio" value="/machine_category/<?php echo $rawFCat->slug; ?>" hidden="">
										<?php }
									?>
									<?php echo '</li>';
								}
							}
						?>
					</ul>
				</div>

				<div class="rawFMan">
					<ul>
						<?php
							$rawFMans = get_the_terms( '' , 'machine_manufacturer' );

							if ($rawFMans == true) {
								foreach ( $rawFMans as $rawFMan ) {
									// echo '<li><a href="/machine_manufacturer/'.$rawFMan->slug.'">';
									echo '<li>';
									echo $rawFMan->name, ' ';?>
									<?php
										if ($_GET['rawFMan'] && !empty($_GET['rawFMan'])) {?>
											<input name="rawFMan" type="radio" value="<?php echo $_GET['rawFMan'] ?>" hidden="" checked="checked">
											<input name="rawFManUrl" type="radio" value="<?php echo $_GET['rawFManUrl']; ?>" hidden="" checked="checked">
										<?php } else {?>
											<input name="rawFMan" type="radio" value="<?php echo $rawFMan->name; ?>" hidden="">
											<input name="rawFManUrl" type="radio" value="/machine_manufacturer/<?php echo $rawFMan->slug; ?>" hidden="">
										<?php }
									?>
										
									<?php echo '</li>';
								}
							}
						?>
					</ul>
				</div>

				<div class="rawFModel">
					<ul>
						<?php
							$rawFModels = get_the_terms( '' , 'machine_model' );

							if ($rawFModels == true) {
								foreach ( $rawFModels as $rawFModel ) {
									// echo '<li><a href="/machine_manufacturer/'.$rawFModel->slug.'">';
									echo '<li>';
									echo $rawFModel->name, ' ';?>
									<?php
										if ($_GET['rawFModel'] && !empty($_GET['rawFModel'])) {?>
											<input name="rawFModel" type="radio" value="<?php echo $_GET['rawFModel'] ?>" hidden="" checked="checked">
											<input name="rawFModelUrl" type="radio" value="<?php echo $_GET['rawFModelUrl']; ?>" hidden="" checked="checked">
										<?php } else {?>
											<input name="rawFModel" type="radio" value="<?php echo $rawFModel->name; ?>" hidden="">
											<input name="rawFModelUrl" type="radio" value="/machine_model/<?php echo $rawFModel->slug; ?>" hidden="">
										<?php }
									?>
										
									<?php echo '</li>';
								}
							}
						?>
					</ul>
				</div>

				<!-- =============== -->

				<div class="rawFCountry">
					<ul>
						<?php
							// $rawFCountries = get_the_terms( '' , 'machine_country' );
							$rawFCountries = get_terms(array(
								"hide_empty" => false,
					            "taxonomy" => "machine_country",
					            // "childless" => true,
					            'parent' => 0,
							));

							if ($rawFCountries == true) {
								foreach ( $rawFCountries as $rawFCountry ) {
									// echo '<li><a href="/machine_manufacturer/'.$rawFCountry->slug.'">';
									echo '<li>';
									echo $rawFCountry->name, ' ';?>
									<?php
										if ($_GET['rawFCountry'] && !empty($_GET['rawFCountry'])) {?>
											<input name="rawFCountry" type="radio" value="<?php echo $_GET['rawFCountry'] ?>" hidden="" checked="checked">
											<input name="rawFCountryUrl" type="radio" value="<?php echo $_GET['rawFCountryUrl']; ?>" hidden="" checked="checked">
										<?php } else {?>
											<input name="rawFCountry" type="radio" value="<?php echo $rawFCountry->name; ?>" hidden="">
											<input name="rawFCountryUrl" type="radio" value="/machine_country/<?php echo $rawFCountry->slug; ?>" hidden="">
										<?php }
									?>
										
									<?php echo '</li>';
								}
							}
						?>
					</ul>
				</div>

				<div class="rawFState">
					<ul>
						<?php
							// $rawFstates = get_the_terms( '' , 'machine_country' );

							$GetCountryName = $_GET['rawFCountry'];
							$GetCountryID = get_term_by( 'name', $GetCountryName, $taxonomy = 'machine_country' );

							$rawFstates = get_terms(array(
								"hide_empty" => false,
					            "taxonomy" => "machine_country",
					            // "parent" => $getParent,
					            'child_of' => $GetCountryID->term_id,
							));

							if ($rawFstates == true) {
								foreach ( $rawFstates as $rawFstate ) {
									// echo '<li><a href="/machine_manufacturer/'.$rawFstate->slug.'">';
									echo '<li>';
									echo $rawFstate->name, ' ';?>
									<?php
										if ($_GET['rawFstate'] && !empty($_GET['rawFstate'])) {?>
											<input name="rawFstate" type="radio" value="<?php echo $_GET['rawFstate'] ?>" hidden="" checked="checked">
											<input name="rawFstateUrl" type="radio" value="<?php echo $_GET['rawFstateUrl']; ?>" hidden="" checked="checked">
										<?php } else {?>
											<input name="rawFstate" type="radio" value="<?php echo $rawFstate->name; ?>" hidden="">
											<input name="rawFstateUrl" type="radio" value="/machine_country/<?php echo $rawFstate->slug; ?>" hidden="">
										<?php }
									?>
										
									<?php echo '</li>';
								}
							}
						?>
					</ul>
				</div>

				<!-- // Manage Industry Info -->
				<input type="text" name="industryName" value="<?php if(function_exists('pushInUrl')){pushInName();} ?>">
				<input type="text" name="industryUrl" value="<?php if(function_exists('pushInUrl')){pushInUrl();} ?>">
			</form>
		</div>
		
		<!-- // List Filter -->
		<div class="fullWidth_wrapper filterAndInfoWrapper">
			<div class="filterAndInfo">
				<ul>
					<?php
						// Get searched value
						if ($_GET['search_text'] && !empty($_GET['search_text'])) {
							$text = $_GET['search_text'];
						}

						// Get filter value
						if ($_GET['fByPrice'] && !empty($_GET['fByPrice'])) {
							$fByPrice = $_GET['fByPrice'];
						}
						if ($_GET['fYear'] && !empty($_GET['fYear'])) {
							$fYear = $_GET['fYear'];
							$minYear = substr($fYear, 0,4);
							$maxYear = substr($fYear, 7);
						} else {
							$minYear = 0;
							$maxYear = date("Y");
						}
						if ($_GET['fPrice'] && !empty($_GET['fPrice'])) {
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

						if ($_GET['rawFCat'] && !empty($_GET['rawFCat'])) {
							$rawFCat = $_GET['rawFCat'];
							$createCategoryArray = array(
					        	'taxonomy' => 'machine_category',
		  						'field'    => 'name',
		  						'terms'    => $rawFCat,
					        );
						}

						if ($_GET['rawFMan'] && !empty($_GET['rawFMan'])) {
							$rawFMan = $_GET['rawFMan'];
							$createArray = array(
					        	'taxonomy' => 'machine_manufacturer',
		  						'field'    => 'name',
		  						'terms'    => $rawFMan,
					        );
						}

						if ($_GET['rawFModel'] && !empty($_GET['rawFModel'])) {
							$rawFModel = $_GET['rawFModel'];
							$createModelArray = array(
					        	'taxonomy' => 'machine_model',
		  						'field'    => 'name',
		  						'terms'    => $rawFModel,
					        );
						}

						if ($_GET['rawFCountry'] && !empty($_GET['rawFCountry'])) {
							$rawFCountry = $_GET['rawFCountry'];

							if ($_GET['rawFstate'] && !empty($_GET['rawFstate'])) {
								$rawFstate = $_GET['rawFstate'];
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
						}

						$args = array(
							'post_type' => 'machine',
							'post_per_page' => -1,
							'meta_key' => $triggerMetaKey,
							'orderby' => $triggerOBy,
							'order'	=> $setOrder,
							'tax_query' => array(
						        array(
						        	'taxonomy' => 'machine_manufacturer',
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
						    ),
						    // 'meta_key' => 'machine_price',
						    // 'orderby' => 'meta_value_num', 
						    'tag' => $fByPrice,
						);

						$query = new WP_Query($args);

						// $count = $query->found_posts;
						$GLOBALS['count'] = $query->found_posts;
					?>
					<li><?php
							if ($_GET['rawFCat'] && !empty($_GET['rawFCat'])) {
								echo $_GET['rawFCat'];
							} else {
								echo $category->name;
							}
						?>
					</li>
					<li class="results">Results: <?php echo $count; ?> Listings</li>
					<form action="<?php echo get_category_link($category->term_id); ?>" class="machine_filter">
						<li class="fByPriceOffer">
							<div class="checkBox">
								<div class="square">
									<i class="far fa-square"></i>
								</div>
							</div>
							<input type="checkbox" id="fByPrice" name="fByPrice" value="poo">
							<label for="fByPrice">
								<span class="forDonly">Priced Offers Only</span>
								<span class="forMonly">Priced Offers</span>
							</label>
						</li>
						<li class="fByYear">
							<!-- <button class="triggerOptions">Year <img src="<?php rooturi(); ?>/img/year-select.png" alt=""></button> -->
							<!-- <select name="fYear" id="fYear">
								<option value="">Year</option>
								<option value="1995 - 2000">1995 - 2000</option>
								<option value="2000 - 2005">2000 - 2005</option>
								<option value="2005 - 2010">2005 - 2010</option>
								<option value="2010 - 2015">2010 - 2015</option>
							</select> -->

							<button id="fYear">Year <img src="<?php rooturi(); ?>/img/year-select.png" alt=""></button>

							<div class="cusFYear_field">
								<div class="sField">
									<img class="checkedF" src="" alt="">
									<input type="radio" id="Yopt0" name="fYear" value="" checked="">
									<label for="Yopt0">None</label>
								</div>
								<div class="sField">
									<img class="checkedF" src="" alt="">
									<input type="radio" id="Yopt1" name="fYear" value="1995 - 2000">
									<label for="Yopt1">1995 - 2000</label>
								</div>
								<div class="sField">
									<img class="checkedF" src="" alt="">
									<input type="radio" id="Yopt2" name="fYear" value="2000 - 2005">
									<label for="Yopt2">2000 - 2005</label>
								</div>
								<div class="sField">
									<img class="checkedF" src="" alt="">
									<input type="radio" id="Yopt3" name="fYear" value="2005 - 2010">
									<label for="Yopt3">2005 - 2010</label>
								</div>
								<div class="sField">
									<img class="checkedF" src="" alt="">
									<input type="radio" id="Yopt4" name="fYear" value="2010 - 2015">
									<label for="Yopt4">2010 - 2015</label>
								</div>
							</div>
						</li>
						<li class="fByPrice">
							<!-- <button class="triggerOptions">Price <img src="<?php rooturi(); ?>/img/year-select.png" alt=""></button> -->
							<!-- <select name="fPrice" id="fPrice">
								<option value="">Price</option>
								<option value="Low to High">Low to High</option>
								<option value="htl">High to Low</option>
							</select> -->

							<button id="fPrice">Price <img src="<?php rooturi(); ?>/img/year-select.png" alt=""></button>

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
						<button class="floatSubmit" type="submit">Apply Filter</button>

						<!-- Raw Filter values -->
						<div class="rawFilterValues" style="display: none;">
							<!-- Category -->
							<input type="text" name="rawFCat" value="<?php echo $_GET['rawFCat']; ?>">
							<input type="text" name="rawFCatUrl" value="<?php echo $_GET['rawFCatUrl']; ?>">

							<!-- Manufacturer -->
							<input type="text" name="rawFMan" value="<?php echo $_GET['rawFMan']; ?>">
							<input type="text" name="rawFManUrl" value="<?php echo $_GET['rawFManUrl']; ?>">

							<!-- Manufacturer -->
							<input type="text" name="rawFModel" value="<?php echo $_GET['rawFModel']; ?>">
							<input type="text" name="rawFModelUrl" value="<?php echo $_GET['rawFModelUrl']; ?>">

							<!-- Country -->
							<input type="text" name="rawFCountry" value="<?php echo $_GET['rawFCountry']; ?>">
							<input type="text" name="rawFCountryUrl" value="<?php echo $_GET['rawFCountryUrl']; ?>">

							<!-- Country -->
							<input type="text" name="rawFstate" value="<?php echo $_GET['rawFstate']; ?>">
							<input type="text" name="rawFstateUrl" value="<?php echo $_GET['rawFstateUrl']; ?>">
						</div>

						<!-- // Manage Industry Info -->
						<input type="text" name="industryName" value="<?php if(function_exists('pushInUrl')){pushInName();} ?>" style="display: none;">
						<input type="text" name="industryUrl" value="<?php if(function_exists('pushInUrl')){pushInUrl();} ?>" style="display: none;">
					</form>
					<li class="sellerInfo">Seller details</li>
				</ul>
			</div>
		</div>

		<!-- // Searched Machines -->
		<div class="allSearchedProducts">
			<?php
				// Get searched value
				if ($_GET['search_text'] && !empty($_GET['search_text'])) {
					$text = $_GET['search_text'];
				}

				// Get filter value
				if ($_GET['fByPrice'] && !empty($_GET['fByPrice'])) {
					$fByPrice = $_GET['fByPrice'];
				}
				if ($_GET['fYear'] && !empty($_GET['fYear'])) {
					$fYear = $_GET['fYear'];
					$minYear = substr($fYear, 0,4);
					$maxYear = substr($fYear, 7);
				} else {
					$minYear = 0;
					$maxYear = date("Y");
				}
				if ($_GET['fPrice'] && !empty($_GET['fPrice'])) {
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

				if ($_GET['rawFCat'] && !empty($_GET['rawFCat'])) {
					$rawFCat = $_GET['rawFCat'];
					$createArray = array(
			        	'taxonomy' => 'machine_category',
  						'field'    => 'name',
  						'terms'    => $rawFCat,
			        );
				}

				if ($_GET['rawFMan'] && !empty($_GET['rawFMan'])) {
					$rawFMan = $_GET['rawFMan'];
					$createArray = array(
			        	'taxonomy' => 'machine_manufacturer',
  						'field'    => 'name',
  						'terms'    => $rawFMan,
			        );
				}

				if ($_GET['rawFModel'] && !empty($_GET['rawFModel'])) {
					$rawFModel = $_GET['rawFModel'];
					$createModelArray = array(
			        	'taxonomy' => 'machine_model',
  						'field'    => 'name',
  						'terms'    => $rawFModel,
			        );
				}

				if ($_GET['rawFCountry'] && !empty($_GET['rawFCountry'])) {
					$rawFCountry = $_GET['rawFCountry'];

					if ($_GET['rawFstate'] && !empty($_GET['rawFstate'])) {
						$rawFstate = $_GET['rawFstate'];
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
				}

				$args = array(
					'post_type' => 'machine',
					'post_per_page' => -1,
					'meta_key' => $triggerMetaKey,
					'orderby' => $triggerOBy,
					'order'	=> $setOrder,
					'tax_query' => array(
				        array(
				        	'taxonomy' => 'machine_manufacturer',
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
				    ),
				    // 'meta_key' => 'machine_price',
				    // 'orderby' => 'meta_value_num', 
				    'tag' => $fByPrice,
				);

				$query = new WP_Query($args);

				$Count_post_no = 0;

				if ($query -> have_posts()) {
					while ($query -> have_posts()) {
				    	$query -> the_post(); ?>

				    	<!-- // Post Content -->
						<?php get_template_part( "template-parts/machine" ) ?>

						<!-- // Push Newsletter section after 3 machine -->
						<?php
							$Count_post_no ++;

							if ($Count_post_no == 3) {
								get_template_part( "template-parts/newsletter" );
							}
						?>
					<?php }
					wp_reset_query();
				} else {
					echo '<span class="color_orange">';
					echo 'No Machine found.';
					echo '</span>';
				}
			?>

			<div class="fullWidth_wrapper thisIsAnAdWrapper" style="display: none;">
				<div class="site_container">
					<div class="s_product">
						<!-- // Product thumb slider -->
						<div class="thumbSlider itsAdThumb">
							<div class="itsAdThumbInner">
								<h2>Top Seller</h2>
								<p>Used Agriculture <br> Machinery Dealer</p>
							</div>
						</div>

						<!-- // Product Info -->
						<div class="productInfo itsAdContent">
							<img src="<?php rooturi(); ?>/img/product-ad.png" alt="">
						</div>

						<!-- Contact Seller for product -->
						<div class="contactSeller itsAdContact">
							<div class="overlay">
								<a href="#">CONTACT SELLER</a>
							</div>
						</div>
					</div>
				</div>
			</div>
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
					        	'taxonomy' => 'machine_manufacturer',
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

	<!-- // Footer -->
	<?php get_footer(); ?>

	<!-- //  -->
	<!-- <div class="fullWidth_wrapper">
		<div class="site_container">
			
		</div>
	</div> -->

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
				$(this).siblings('.checkBox').find('i').toggleClass('fa-check-square fa-square');

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

				if (getInputState == false && getYearF == "" && getPriceF == "") {
					$(".floatSubmit").hide(0);
				} else {
					$(".floatSubmit").show(0);
				}
			});

			$(".cusFYear_field label").click(function(event) {
				/* Act on the event */
				$(this).parents('.cusFYear_field').find('img.checkedF').attr('src', '');
				$(this).siblings('img.checkedF').attr('src', '<?php rooturi(); ?>/img/check.png');
			});

			$("button#fPrice, button#fYear").click(function(event) {
				event.preventDefault();
				event.stopPropagation();
				$(this).parent().siblings('li').find('.cusFYear_field').hide();
				$(this).siblings('.cusFYear_field').toggle();
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
			$(".searchBreadCrumbs ul li#currentModel a, .searchBreadCrumbs ul li#currentCountry a, .searchBreadCrumbs ul li#currentState a").click(function(event) {
				event.preventDefault();

				var getNext1 = $(this).parent("li").next("li").children('a').text();
				var getNext2 = $(this).parent("li").next("li").next("li").children('a').text();
				var getNext3 = $(this).parent("li").next("li").next("li").next("li").children('a').text();				

				// $("form.rawFilter").find("input[value="+ getNext2 +"]").removeAttr('checked');
				// $("form.rawFilter").find("input[value="+ getNext2 +"]").next("input").removeAttr('checked');

				if ($(this).parent("li").next("li").length == 1) {
					$("form.rawFilter").find("input[value="+ getNext1 +"]").removeAttr('checked');
					$("form.rawFilter").find("input[value="+ getNext1 +"]").next("input").removeAttr('checked');
				}
				if ($(this).parent("li").next("li").next("li").length == 1) {
					$("form.rawFilter").find("input[value="+ getNext2 +"]").removeAttr('checked');
					$("form.rawFilter").find("input[value="+ getNext2 +"]").next("input").removeAttr('checked');
				}
				if ($(this).parent("li").next("li").next("li").next("li").length == 1) {
					$("form.rawFilter").find("input[value="+ getNext3 +"]").removeAttr('checked');
					$("form.rawFilter").find("input[value="+ getNext3 +"]").next("input").removeAttr('checked');
				}				

				var getLink = $(this).attr('href');
				$("form.rawFilter").attr('action', getLink);
				$("form.rawFilter").submit();
			});

			// ====== Newsletter form values =====
			$("input[name=grabCategory]").attr("value", "<?php echo $category->name; ?>");
			var getCatName = $(".searchBreadCrumbs li:first-child a").text();
			$("input[name=grabIndustry]").attr("value", getCatName);

			// ========= Raw Filter Form ==========
			$(".twoCatsFiltersInner li a").click(function(event) {
				event.preventDefault();

				// ---- Get Type -----
				var getType = $(this).parent().parent("ul").attr('class');
				var getIndex = $(this).parent().index();

				getIndex = (parseInt(getIndex) + 1);

				if (getType == "progress_category") {
					$("form.rawFilter").find(".rawFCat ul li:nth-child(" + getIndex + ") input").click();
				}
				if (getType == "progress_manufacturer") {
					$("form.rawFilter").find(".rawFMan ul li:nth-child(" + getIndex + ") input").click();
				}
				if (getType == "progress_model") {
					$("form.rawFilter").find(".rawFModel ul li:nth-child(" + getIndex + ") input").click();
				}
				if (getType == "progress_country") {
					$("form.rawFilter").find(".rawFCountry ul li:nth-child(" + getIndex + ") input").click();
				}
				if (getType == "progress_state") {
					$("form.rawFilter").find(".rawFState ul li:nth-child(" + getIndex + ") input").click();
				}
				// console.log(getIndex);
				$("form.rawFilter").submit();
			});

			// ======== Show two cats =========
			if ($(".searchBreadCrumbs ul li").length == 3 && $(".searchBreadCrumbs ul li#currentManufacturer").length == 1) {
				$(".twoCatsFiltersInner ul.progress_category, .twoCatsFiltersInner ul.progress_manufacturer").hide();
				$(".twoCatsFiltersInner .sByCats > h2").text('Search by Model');
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
				$(".twoCatsFiltersInner .sBycountry").css('width', '100%');
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
			var grabCatName = $(".searchBreadCrumbs ul li#currentManufacturer a").text();
			// console.log(grabCatName);
			$("form.rawFilter .rawFMan").find("input[value="+grabCatName+"]").click();
			$("form.rawFilter .rawFMan").find("input[value="+grabCatName+"]").next().click();
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
			$(".thisIsAnAdWrapper").prev('.fullWidth_wrapper').find('.pInfoPriceInner').addClass('endImage');
			$(".thisIsAnAdWrapper").next('.fullWidth_wrapper').find('.pInfoPriceInner').addClass('startImage');

			// -------------------------
			$(".thisIsAnNLWrapper").prev('.fullWidth_wrapper').find('.pInfoPriceInner').addClass('endImage');
			$(".thisIsAnNLWrapper").next('.fullWidth_wrapper').find('.pInfoPriceInner').addClass('startImage');

			// --------------------------
			$(".allSearchedProducts").find('.pInfoPriceInner').addClass('endImage');

			// =========== Line till edge =========
			var whatever = $(".twoCatsFilters .twoCatsFiltersInner h2");
			// var whateverWidth = $(".twoCatsFilters .twoCatsFiltersInner h2").width();
			var rt = ($(window).width() - (whatever.offset().left + whatever.outerWidth()));
			// var totval = whateverWidth + rt;
			$(".line").width(rt);
			if ($(".sByCats:visible").length == 0) {
				var getLeftOffset = $(".line").offset().left;
				getLeftOffset += 50;
				$(".line").css('left', '-'+ getLeftOffset +'px');
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
		});
	</script>

	<?php wp_footer(); ?>
</body>
</html>