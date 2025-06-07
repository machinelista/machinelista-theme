<?php
	
	// Calling resources
	function callingSitesResources() {
		wp_enqueue_style( 'mainStyle', get_stylesheet_uri(), '', microtime() );
		wp_enqueue_style('custom-colors', get_stylesheet_directory_uri() . '/css/custom-colors.css', '', microtime());

		wp_enqueue_style( 'slickStyle', get_template_directory_uri() . '/css/slick.css');
		wp_enqueue_style( 'slickTheme', get_template_directory_uri() . '/css/slick-theme.css');

		wp_enqueue_style( 'flagIcons', 'https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.11.0/css/flag-icons.min.css');

		wp_enqueue_script( 'jquery_main', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js');

		wp_enqueue_script( 'customScript', get_template_directory_uri() . '/js/customScripts.js' );
	}
	add_action('wp_enqueue_scripts' , 'callingSitesResources');

	// Custom script for admin dashboard
	function customAdminScript() {
		wp_enqueue_script( 'customAdminScript', get_template_directory_uri() . '/js/customAdminScript.js', array( 'jquery' ), microtime(), true );
		wp_enqueue_style( 'customAdminStyle', get_template_directory_uri() . '/css/customAdminStyle.css', '', microtime() );
	}
	add_action( 'admin_enqueue_scripts', 'customAdminScript' );

	// ===== Theme root url function shortcut =====
	function rootURI() {
		echo get_template_directory_uri();
	}
	
	// Featured image
	add_theme_support('post-thumbnails');

	// Adding Custom Table Headers for machine post type
	add_filter( 'manage_machine_posts_columns', 'custom_machine_columns_head' );
	add_action( 'manage_machine_posts_custom_column', 'custom_machine_columns_content', 10, 2 );

	function custom_machine_columns_head( $columns ) {
		// print_r($columns);

		/*$newColumns = array();
		$newColumns['title'] = 'Machine Name';
		$newColumns['dealer_website'] = 'Dealer Website';
		$newColumns['machine_id'] = 'Machine ID';
		$newColumns['tags'] = 'Tags';
		$newColumns['date'] = 'Date';

		return $newColumns ;*/

		$columns['dealer_website'] = 'Dealer Website';
		$columns['machine_id'] = 'Machine ID';
		$columns['machine_type'] = 'Status';

		unset( $columns['tags'] );
		$columns['tags'] = 'Tags';

		unset( $columns['date'] );
		$columns['date'] = 'Date';

		return $columns ;
	}

	function custom_machine_columns_content( $column, $post_id ) {
		switch ($column) {
			case 'dealer_website':
				// code...
				?>
				<a href="<?php the_field('seller_contact_link'); ?>" target="_blank">Dealer Website</a>
			<?php break;

			// -----------------------

			case 'machine_id':
				// code...
				echo get_the_ID();
			break;

			// -----------------------

			case 'machine_type':
				// code...
				$getField = get_field('delisted');
				if ($getField == 1) {
					echo 'Delisted';
				} else {
					echo 'Active';
				}
				// echo $getField;
			break;
		}
	}

	// Make the 'machine_type' column sortable
	add_filter('manage_edit-machine_sortable_columns', 'set_custom_sortable_columns');
	function set_custom_sortable_columns($columns) {
		$columns['machine_type'] = 'machine_type';
		return $columns;
	}
	// Make the 'machine_type' column sortable by adding it to pre_get_posts
	add_action('pre_get_posts', 'custom_machine_type_orderby');
	function custom_machine_type_orderby($query) {
		// Check if we are in the admin area, sorting by 'machine_type', and on the correct post type
		if (!is_admin() || !$query->is_main_query()) {
			return;
		}

		// Ensure we're on the correct screen (custom post type listing)
		$screen = get_current_screen();
		if ($screen->post_type !== 'machine') {
			return;
		}

		if (isset($_GET['orderby']) && $_GET['orderby'] === 'machine_type') {
			// Sort by the 'delisted' ACF field
			$query->set('meta_key', 'delisted');
			$query->set('orderby', 'meta_value_num');

			// Set the order to ascending or descending based on the user's selection
			$order = isset($_GET['order']) ? $_GET['order'] : 'asc';
			$query->set('order', $order);
		}
	}

	// Adding Custom Table Headers for user's page
	function add_country_column( $columns ) {
	  // $columns['dealer_industry'] = 'Dealer Industry';
	  // return $columns;

	  $newColumns = array();
		$newColumns['username'] = 'Username';
		// $newColumns['name'] = 'Name';
		$newColumns['email'] = 'Email';
		$newColumns['role'] = 'Role';
		$newColumns['dealer_industry'] = 'Seller Industry';
		// $newColumns['posts'] = 'Machines';
		$newColumns['machines'] = 'Machines';

		// print_r($newColumns);

		return $newColumns ;
	}
	add_filter( 'manage_users_columns', 'add_country_column' );

	function show_country_column_content( $value, $column_name, $user_id ) {
	  if ( 'dealer_industry' == $column_name ) {
	    $dealerIndustry = get_field('dealer_machine_industry', 'user_' . $user_id);
	    if ($dealerIndustry) {
	      $industry_list = array();
	      foreach ($dealerIndustry as $industry) {
	        $industry_list[] = $industry;
	      }
	      $value = implode(', ', $industry_list);
	    }
	    return $value;
	  }
	  // ------------------
	  if ( 'machines' == $column_name ) {
			$user_data = get_userdata($user_id);
			if ($user_data) {
				$username = $user_data->user_login;

				$args = array(
					'post_type' => 'machine',
			
					// Custom Field Parameters
					'meta_key'       => 'dealer_name',
					'meta_value'     => $username,
				);

				$tag_name = $username;
				$tag = get_term_by('name', $tag_name, 'post_tag');
				if ($tag) {
					$tag_slug = $tag->slug;
					// Use $tag_slug as needed
				}

				$query = new WP_Query( $args );
				$count = $query->found_posts;
				$value = "<a href='/wp-admin/edit.php?post_type=machine&tag=".$tag_slug."' target='_blank'>".$count."</a>";
			}
			return $value;
		}
	}
	add_action( 'manage_users_custom_column', 'show_country_column_content', 10, 3 );

	// Get slider last image prototype page
	function getLastImage() {
		$chckImg1 = !empty(get_field('image_1'));
		$chckImg2 = !empty(get_field('image_2'));
		$chckImg3 = !empty(get_field('image_3'));
		$chckImg4 = !empty(get_field('image_4'));
		$chckImg5 = !empty(get_field('image_5'));
		$chckImg6 = !empty(get_field('image_6'));
		$chckImg7 = !empty(get_field('image_7'));
		$chckImg8 = !empty(get_field('image_8'));
		$chckImg9 = !empty(get_field('image_9'));
		$chckImg10 = !empty(get_field('image_10'));

		$lastImage = null;

		if ($chckImg10) {
			$lastImage = the_field('image_10');
		} elseif ($chckImg9) {
			$lastImage = the_field('image_9');
		} elseif ($chckImg8) {
			$lastImage = the_field('image_8');
		} elseif ($chckImg7) {
			$lastImage = the_field('image_7');
		} elseif ($chckImg6) {
			$lastImage = the_field('image_6');
		} elseif ($chckImg5) {
			$lastImage = the_field('image_5');
		} elseif ($chckImg4) {
			$lastImage = the_field('image_4');
		} elseif ($chckImg3) {
			$lastImage = the_field('image_3');
		} elseif ($chckImg2) {
			$lastImage = the_field('image_2');
		} elseif ($chckImg1) {
			$lastImage = the_field('image_1');
		}

		echo $lastImage;
	}

	// Add Dealer role
	add_role( 'dealer', 'Dealer', get_role( 'subscriber' )->capabilities );

	// Add Machine manufacturer role
	add_role( 'machinemanufacturer', 'Machine manufacturer', get_role( 'subscriber' )->capabilities );

	//If User Roll is Dealer, It can not login in to Dashboard 
	function blockWpAccess() {
	    if( is_admin() && !defined('DOING_AJAX') && current_user_can('dealer') || current_user_can('machinemanufacturer') ) {
	        // wp_logout();
	        wp_redirect(home_url());
	        exit;
	    }
	}
	add_action('init','blockWpAccess');

	// Login failed function of User Login
	function login_failed() {
		$login_page  = home_url( '/user-login/' );
		wp_redirect( $login_page . '?login=failed' );
		exit;
	}
	add_action( 'wp_login_failed', 'login_failed' );

	function verify_username_password( $user, $username, $password ) {
		$login_page  = home_url( '/user-login/' );
		if( $username == "" || $password == "" ) {
		    wp_redirect( $login_page . "?login=empty" );
		    exit;
		}
	}
	add_filter( 'authenticate', 'verify_username_password', 1, 3);

	// Logout redirect
	function logout_page() {
		$login_page  = home_url( '/user-login/' );
		wp_redirect( $login_page . "?login=false" );
		exit;
	}
	add_action('wp_logout','logout_page');

	// ======== Use small dash ======
	// add_filter( 'gettext_with_context', 'wpse_75445_use_pretty_dash', 10, 2 );

	// function wpse_75445_use_pretty_dash( $text, $context ) {
	//     if ( $text == '&#8211;' && $context == 'en dash' ) :
	//         $text = '&#45;'
	//     endif;
	//     return $text;
	// }

	/* Custom Pagination */
	function pagination($pages = '', $range = 4){ 
	    $showitems = ($range * 2)+1;        
		global $paged;     
		if(empty($paged)) $paged = 1;      
		if($pages == ''){         
			global $wp_query;         
			$pages = $wp_query->max_num_pages;         
			if(!$pages){$pages = 1;}
		}
		if(1 != $pages){
			echo "<div class=\"pagination\">";
			echo "<a class='pagination_ls'>prev</a>";
			
			if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
				echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
			
			if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
			
			for ($i=1; $i <= $pages; $i++){
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
					echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";             
					}
			} 
			if ($paged < $pages && $showitems < $pages) 
				echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next Page &rsaquo;</a>";           if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last Page &raquo;</a>";

			echo "<a class='pagination_rs'>next</a>";
			echo "</div>\n";
		}
	}

	// Add filter to modify search query
	add_filter('posts_search', 'search_by_title_and_tags', 10, 2);

	function search_by_title_and_tags($search, $query) {
		global $wpdb;

		// Check if this is the "All Posts" page and a search has been performed
		if ($query->is_admin && $query->is_search && $query->query_vars['s']) {
			// Get search term
			$search_term = $query->query_vars['s'];

			// Modify search query to search for tags as well
			$search .= " OR EXISTS (SELECT * FROM $wpdb->terms t
			INNER JOIN $wpdb->term_taxonomy tt ON t.term_id = tt.term_id
			INNER JOIN $wpdb->term_relationships tr ON tr.term_taxonomy_id = tt.term_taxonomy_id
			INNER JOIN $wpdb->posts p ON p.ID = tr.object_id
			WHERE tt.taxonomy = 'post_tag'
			AND t.name LIKE '%$search_term%'
			AND p.ID = $wpdb->posts.ID)";
		}

		return $search;
	}

	// Infinite scroll
	function load_more_posts() {
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$postCount = $_POST['postCount'];
		$currentTaxo = $_POST['currentTaxo'];

		// Get filter value
		if (isset($_POST['fByPrice']) && !empty($_POST['fByPrice'])) {
			$fByPrice = $_POST['fByPrice'];
		}

		if (isset($_POST['fCond']) && $_POST['fCond'] && !empty($_POST['fCond'])) {
			$fCond = $_POST['fCond'];
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

		if (isset($_POST['fYear']) && $_POST['fYear'] && !empty($_POST['fYear'])) {
			$fYear = $_POST['fYear'];
			$minYear = substr($fYear, 0,4);
			$maxYear = substr($fYear, 7);
		} else {
			$minYear = 0;
			$maxYear = date("Y");
		}

		if (isset($_POST['fPrice']) && $_POST['fPrice'] && !empty($_POST['fPrice'])) {
			$triggerMetaKey = 'machine_price';
			$triggerOBy = 'meta_value_num';
			$fPrice = $_POST['fPrice'];
			if ($fPrice == 'Low to High') {
				// $setOrder = 'DSC';
				$setOrder = 'ASC';
			} else {
				// $setOrder = 'ASC';
				$setOrder = 'DSC';
			}
		} else if (isset($_POST['fYear']) && $_POST['fYear'] && !empty($_POST['fYear'])) {
			$triggerMetaKey = 'machine_year';
			$triggerOBy = 'meta_value_num';
			$setOrder = 'ASC';
		} else {
			$triggerOBy = 'title';
			$setOrder = 'rand';
		}

		// Global array variables for List filter and search query
		if ($currentTaxo == 'Category') {
			$createCategoryArray = array(
				'taxonomy' => 'machine_category',
				'field'    => 'name',
				'terms'    => $_POST['currentCat'],
			);
			if (isset($_POST['rawFMan']) && !empty($_POST['rawFMan'])) {
				$rawFMan = $_POST['rawFMan'];
				$createManArray = array(
		        	'taxonomy' => 'machine_manufacturer',
						'field'    => 'name',
						'terms'    => $rawFMan,
		        );
			} else {
				$createManArray = null;
			}
		} elseif ($currentTaxo == 'Manufacturer') {
			$createManArray = array(
				'taxonomy' => 'machine_manufacturer',
				'field'    => 'name',
				'terms'    => $_POST['currentCat'],
			);
			if (isset($_POST['rawFCat']) && $_POST['rawFCat'] && !empty($_POST['rawFCat'])) {
				$rawFCat = $_POST['rawFCat'];
				$createCategoryArray = array(
	        		'taxonomy' => 'machine_category',
					'field'    => 'name',
					'terms'    => $rawFCat,
	        	);
			} else {
				$createCategoryArray = null;
			}
		}

		if (isset($_POST['rawFModel']) && $_POST['rawFModel'] && !empty($_POST['rawFModel'])) {
			$rawFModel = $_POST['rawFModel'];
			$createModelArray = array(
	        	'taxonomy' => 'machine_model',
					'field'    => 'name',
					'terms'    => $rawFModel,
	        );
		} else {
			$createModelArray = null;
		}

		if (isset($_POST['rawFCountry']) && !empty($_POST['rawFCountry'])) {
			$rawFCountry = $_POST['rawFCountry'];

			$createCountryArray = array(
	        	'taxonomy' => 'machine_country',
				'field'    => 'name',
				'terms'    => $rawFCountry,
	      );

			if (isset($_POST['rawFstate']) && !empty($_POST['rawFstate'])) {
				$rawFstate = $_POST['rawFstate'];
				$createStateArray = array(
		        	'taxonomy' => 'machine_country',
					'field'    => 'name',
					'terms'    => $rawFstate,
		        );
			} else {
				$createStateArray = null;
			}
		} else {
			$createCountryArray = null;
		}

		$seed = date('Ymd');

		$args = array(
			'post_type' => 'machine',
			// 'posts_per_page' => 6,
			'paged' => $page,
			'meta_key' => $triggerMetaKey,
			'orderby' => $triggerOBy,
			'order'	=> $setOrder,
			'rand_seed' => $seed,
			'tax_query' => array(
				$createCategoryArray,
				$createManArray,
				$createModelArray,
				$createCountryArray,
				$createStateArray,
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
		    		'value' => $_POST['currentInd'],
		    		'compare' => '='
		    	),
		    	$conditionArray,
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

		$currentAd = $_POST['currentAd'];

		ob_start();

		if ($query -> have_posts()) {

			$Count_post_no = $postCount;

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
				if ( $_GET['fPrice'] == false ) {
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
										'terms'    => $_POST['currentCat'],
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
			/*echo '<span class="color_orange">';
			echo 'no more machines found';
			echo '</span>';*/
		}

		$posts = ob_get_clean();

		wp_send_json_success(array(
		  'posts' => $posts,
		  'currentAd' => $currentAd,
		));

		wp_die();
	}

	add_action('wp_ajax_load_more_posts', 'load_more_posts');
	add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');
	
	// Manufacturer template Infinite scroll
	function load_more_man_posts() {
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$postCount = $_POST['postCount'];

		// Get searched value
		if ($_GET['search_text'] && !empty($_GET['search_text'])) {
			$text = $_GET['search_text'];
		}

		// Get filter value
		if (isset($_POST['fByPrice']) & $_POST['fByPrice'] && !empty($_POST['fByPrice'])) {
			$fByPrice = $_POST['fByPrice'];
		}

		if (isset($_POST['fCond']) && $_POST['fCond'] && !empty($_POST['fCond'])) {
			$fCond = $_POST['fCond'];
			$conditionArray = array(
	    		'key' => 'machine_condition',
	    		'value' => $fCond,
	    		'compare' => '='
	    	);
		} else {
			$conditionArray = null;
		}

		if (isset($_POST['fYear']) && $_POST['fYear'] && !empty($_POST['fYear'])) {
			$fYear = $_POST['fYear'];
			$minYear = substr($fYear, 0,4);
			$maxYear = substr($fYear, 7);
		} else {
			$minYear = 0;
			$maxYear = date("Y");
		}

		if (isset($_POST['fPrice']) && $_POST['fPrice'] && !empty($_POST['fPrice'])) {
			$triggerMetaKey = 'machine_price';
			$triggerOBy = 'meta_value_num';
			$fPrice = $_POST['fPrice'];
			if ($fPrice == 'Low to High') {
				// $setOrder = 'DSC';
				$setOrder = 'ASC';
			} else {
				// $setOrder = 'ASC';
				$setOrder = 'DSC';
			}
		} else if (isset($_POST['fYear']) && $_POST['fYear'] && !empty($_POST['fYear'])) {
			$triggerMetaKey = 'machine_year';
			$triggerOBy = 'meta_value_num';
			$setOrder = 'ASC';
		} else {
			$triggerOBy = 'title';
			$setOrder = 'rand';
		}

		$category = get_queried_object();

		if (isset($_POST['rawFCat']) && $_POST['rawFCat'] && !empty($_POST['rawFCat'])) {
			$rawFCat = $_POST['rawFCat'];
			$createCategoryArray = array(
	        	'taxonomy' => 'machine_category',
					'field'    => 'name',
					'terms'    => $rawFCat,
	        );
		}

		if (isset($_POST['rawFMan']) && $_POST['rawFMan'] && !empty($_POST['rawFMan'])) {
			$rawFMan = $_POST['rawFMan'];
			$createArray = array(
	        	'taxonomy' => 'machine_manufacturer',
					'field'    => 'name',
					'terms'    => $rawFMan,
	        );
		} else {
			$createArray = null;
		}

		if (isset($_POST['rawFModel']) && $_POST['rawFModel'] && !empty($_POST['rawFModel'])) {
			$rawFModel = $_POST['rawFModel'];
			$createModelArray = array(
	        	'taxonomy' => 'machine_model',
					'field'    => 'name',
					'terms'    => $rawFModel,
	        );
		} else {
			$createModelArray = null;
		}

		if (isset($_POST['rawFCountry']) && $_POST['rawFCountry'] && !empty($_POST['rawFCountry'])) {
			$rawFCountry = $_POST['rawFCountry'];

			if (isset($_POST['rawFstate']) && $_POST['rawFstate'] && !empty($_POST['rawFstate'])) {
				// echo $_GET['rawFstate'];
				$rawFstate = $_POST['rawFstate'];
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
			$createCountryArray = null;
		}

		$seed = date('Ymd');

		$args = array(
			'post_type' => 'machine',
			// 'posts_per_page' => 6,
			'paged' => $page,
			'meta_key' => $triggerMetaKey,
			'orderby' => $triggerOBy,
			'order'	=> $setOrder,
			'rand_seed' => $seed,
			'tax_query' => array(
				array(
					'taxonomy' => 'machine_manufacturer',
					'field'    => 'name',
					'terms'    => $_POST['currentCat'],
				),
				$createCategoryArray,
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
		    		'value' => $_POST['currentInd'],
		    		'compare' => '='
		    	),
		    	$conditionArray,
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

		ob_start();

		if ($query -> have_posts()) {

			$Count_post_no = $postCount;

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
				if ( $_GET['fPrice'] == false ) {
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
							        	'taxonomy' => 'machine_manufacturer',
										'field'    => 'name',
										'terms'    => $_POST['currentCat'],
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
															<a href="<?php the_field('ad_link'); ?>">
																<img src="<?php the_field('ad_image'); ?>" alt="">
															</a>
														</div>
														<?php
													}
												?>
												<?php
													if ( get_field('ad_image_t') && !empty(get_field('ad_image_t')) ) {
														?>
														<div class="tabAdImage">
															<a href="<?php the_field('ad_link'); ?>">
																<img src="<?php the_field('ad_image_t'); ?>" alt="">
															</a>
														</div>
														<?php
													}
												?>
												<?php
													if ( get_field('ad_image_m') && !empty(get_field('ad_image_m')) ) {
														?>
														<div class="mobileAdImage">
															<a href="<?php the_field('ad_link'); ?>">
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
							}
						}
					}
				?>
			<?php }
			wp_reset_query();
		} else {
			/*echo '<span class="color_orange">';
			echo 'no more machines found';
			echo '</span>';*/
		}

		$posts = ob_get_clean();

		wp_send_json_success(array(
		  'posts' => $posts,
		));
	}

	add_action('wp_ajax_load_more_man_posts', 'load_more_man_posts');
	add_action('wp_ajax_nopriv_load_more_man_posts', 'load_more_man_posts');

	// Search result Infinite scroll
	function load_more_search_posts() {
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$postCount = $_POST['postCount'];

		// Get searched value
		if (isset($_POST['search_text']) && !empty($_POST['search_text'])) {
			$text = $_POST['search_text'];
		}

		// Get filter value
		if (isset($_POST['fByPrice']) && !empty($_POST['fByPrice'])) {
			$fByPrice = $_POST['fByPrice'];
		}

		if (isset($_POST['fCond']) && !empty($_POST['fCond'])) {
			$fCond = $_POST['fCond'];
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

		if (isset($_POST['fYear']) && !empty($_POST['fYear'])) {
			$fYear = $_POST['fYear'];
			$minYear = substr($fYear, 0,4);
			$maxYear = substr($fYear, 7);

			$fYearArray = array(
				'key' => 'machine_year',
				'type' => 'NUMERIC',
				'value' => array($minYear, $maxYear),
				'compare' => 'BETWEEN'
			);
		} else {
			// $minYear = 0;
			// $maxYear = date("Y");
			$fYearArray = null;
		}

		$excludeNAfromQuery = null;
		$triggerMetaKey = null;
		if (isset($_POST['fPrice']) && !empty($_POST['fPrice'])) {
			$triggerMetaKey = 'machine_price';
			$triggerOBy = 'meta_value_num';
			$fPrice = $_POST['fPrice'];
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
		} else if (isset($_POST['fYear']) && !empty($_POST['fYear'])) {
			$triggerMetaKey = 'machine_year';
			$triggerOBy = 'meta_value_num';
			$setOrder = 'ASC';
		} else {
			$triggerOBy = 'title';
			$setOrder = 'rand';
		}

		// Calculate the offset based on the current page
    	// $offset = ($page - 1) * get_option('posts_per_page');

		$args = array(
			'post_type' => 'machine',
			'paged' => $page,
			'meta_key' => $triggerMetaKey,
			'orderby' => $triggerOBy,
			'order'	=> $setOrder,
			'post_status' => 'publish',
			'meta_query' => array(
				$fYearArray,
		    	$conditionArray,
		    	$excludeNAfromQuery
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

		$query = new WP_Query($args);

		// echo $query->max_num_pages;

		$Count_post_no = 0;

		ob_start();

		if ($query -> have_posts()) {
			while ($query -> have_posts()) {
		    	$query -> the_post(); 

		    	// Post Content
				 get_template_part( "template-parts/machine" );

				 // Push Newsletter section after 3 machine
				$Count_post_no ++;

				$DBSettingNlNo = get_field('newsletter_position', 'option');

				if ($Count_post_no == $DBSettingNlNo) {
					get_template_part( "template-parts/newsletter" );
				}
			}

		 	wp_reset_query();
		} else {
			/*echo '<span class="color_orange">';
			echo 'no more machine found';
			echo '</span>';*/
		}

		$posts = ob_get_clean();

		wp_send_json_success(array(
		  'posts' => $posts,
		));

		wp_die();
	}

	add_action('wp_ajax_load_more_search_posts', 'load_more_search_posts');
	add_action('wp_ajax_nopriv_load_more_search_posts', 'load_more_search_posts');


	// 301 redirect to category if "Delisted" is true
		function redirect_delisted_machine() {
			// Check if it's a single machine post
			if (is_singular('machine')) {
				global $post;

				// Get the value of the 'delisted' custom field
				$delisted = get_field('delisted', $post->ID);

				// Check if 'delisted' is true (1)
				if ($delisted === true || $delisted === '1') {
					// Get the category for the machine (assuming it's assigned to one category)
					$categories = get_the_terms($post->ID, 'machine_category');

					// Check if the machine has a category assigned
					if (!empty($categories) && is_array($categories)) {
						// Get the first category assigned to the machine
						$first_category = array_shift($categories);

						// Redirect to the first category's URL using a 301 redirect
						wp_redirect(get_term_link($first_category), 301);
						exit;
					} else {
						wp_redirect(home_url());
						exit;
					}
				}
			}
		}
		add_action('template_redirect', 'redirect_delisted_machine');

	// Country flag
		/*function ShowFlag($countryName) {
			// $worldjsonDataFile = "/home/customer/www/machinelista.com/public_html/wp-content/themes/Used-Machine-SE/js/worldModified.json";
			$worldjsonDataFile = get_template_directory_uri()."/js/worldModified.json";
		   $alpha2 = null;
		   $matchingObjects = array();

		   $file = file_get_contents($worldjsonDataFile);
			$json = json_decode($file, true);
			foreach ($json as $key => $obj) {
				if ((strtolower($obj['en']) == strtolower($countryName)) or (strtolower($obj['alpha3']) == strtolower($countryName)) or (strtolower($obj['alpha2']) == strtolower($countryName))) {
					$alpha2 = $obj['alpha2'];
					break; // Exit the loop when a match is found
				}
			}

			if ($alpha2 !== null) {
				echo '<span class="fi fi-' . $alpha2 . ' machineCountryFlag"></span>';
			}
		}*/

		// Optimized Country Flag Function
		function ShowFlag($countryName) {
			static $jsonData = null; // Cache the JSON data to avoid reloading

			// Load the JSON file only once
			if ($jsonData === null) {
				$worldjsonDataFile = get_template_directory() . "/js/worldModified.json"; // Use get_template_directory for server path
				if (file_exists($worldjsonDataFile)) {
					$file = file_get_contents($worldjsonDataFile);
					$jsonData = json_decode($file, true);
				} else {
					$jsonData = []; // Fallback to an empty array if file doesn't exist
				}
			}

			// Proceed with the cached JSON data
			$alpha2 = null;
			if (!empty($jsonData)) {
				foreach ($jsonData as $obj) {
					if (
					(strtolower($obj['en']) == strtolower($countryName)) ||
					(strtolower($obj['alpha3']) == strtolower($countryName)) ||
					(strtolower($obj['alpha2']) == strtolower($countryName))
					) {
						$alpha2 = $obj['alpha2'];
						break; // Exit the loop when a match is found
					}
				}
			}

			// Output the flag if found
			if ($alpha2 !== null) {
				echo '<span class="fi fi-' . esc_attr($alpha2) . ' machineCountryFlag"></span>';
			}
		}


	// Add meta to machine when a new machine created
	function add_meta_to_machine_post( $post_id, $post, $update ) {
		// Avoid adding meta during autosave or revision
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// Check if this is a new post (not an update)
		if ( !$update ) {
			// Get meta value
			$key = 'dlCycle';
			$currentDlCycleNo = get_option($key);

			// Add a meta field with a default value
			add_post_meta( $post_id, $key, $currentDlCycleNo, true );
		}
	}
	add_action( 'save_post_machine', 'add_meta_to_machine_post', 10, 3 );

	// Delist System
		// dlCycle count handler
		function processDlCycleSession() {
			$key = 'dlCycle';
			$currentDlCycleCache = get_option($key);

			if ($currentDlCycleCache < 100) {
				// Update the value
				$currentDlCycleCache++;
				update_option($key, $currentDlCycleCache);
			} else {
				update_option($key, 0);
			}
		}

		function delete_acf_images_for_post($post_id) {
			// Loop through the ACF fields image_1 to image_10
			for ($i = 1; $i <= 10; $i++) {
				$field_name = 'image_' . $i;

				// Get the attachment url from the ACF field
				$attachment_url = get_field($field_name, $post_id);

				if ($attachment_url) {
					// Get the attachment ID from the URL
					$attachment_id = attachment_url_to_postid($attachment_url);

					if ($attachment_id) {
						// Delete the attachment permanently
						wp_delete_attachment($attachment_id, true);

						// Optionally clear the ACF field
						// delete_field($field_name, $post_id);
					}
				}
			}
		}

		// Delist checker
		function delistCheker($original_link, $machineID, $currentDlCycle) {
			$ch = curl_init($original_link);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_HEADER, true);
			curl_setopt($ch, CURLOPT_NOBODY, true);
			// curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36');

			$response = curl_exec($ch);

			$redirect_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

			curl_close($ch);

			if ($currentDlCycle < 100) {
				$currentDlCycle++;
			} else {
				$currentDlCycle = 0;
			}

			// echo "Original Link ==" . $original_link . "<br>";
			// echo "Redirect Link ==" . $redirect_url . "<br>";
			// echo 'Machine ID' . " == " . $machineID . "<br>";
			// echo 'Cycle' . " == " . $currentDlCycle . "<br>";

			if ($redirect_url !== $original_link) {
				// URL has changed
				// echo ' URL changed <br>';

				delete_acf_images_for_post($machineID);
				// wp_delete_post($machineID, true);
				wp_trash_post($machineID);

				// update_post_meta($machineID, 'delisted', 1);
				update_post_meta($machineID, 'dlCycle', $currentDlCycle);
			} else {
				// echo 'URL not changed <br>';
				update_post_meta($machineID, 'delisted', 0);
				update_post_meta($machineID, 'dlCycle', $currentDlCycle);
			}
		}

		// Check delisted machine and Update meta
		function check_and_update_machine() {
			// processDlCycleSession();

			$currentDlCycle = get_option('dlCycle');

			$args = array(
				'post_type' => 'machine',
				'post_status' => 'publish',
				// 'posts_per_page' => -1,
				'posts_per_page' => 200,
				'meta_query' => array(
					// array(
					// 	'key' => 'delisted',
					// 	'type' => 'NUMERIC',
					// 	'value' => 0,
					// 	'compare' => '='
					// ),
					array(
						'key' => 'dlCycle',
						'type' => 'NUMERIC',
						'value' => $currentDlCycle,
						'compare' => '='
					),
				),
			);

			$posts = get_posts($args);

			if (!empty($posts)) {
				foreach ($posts as $post) {
					$original_link = get_post_meta($post->ID, 'seller_contact_link', true);
					$delistedValue = get_post_meta($post->ID, 'delisted', true);
					$machineID = $post->ID;

					if ($original_link) {
						delistCheker($original_link, $machineID, $currentDlCycle);
					}
				}
			} else {
				processDlCycleSession();
			}
		}

		// Hook your function to the event
		add_action('check_and_delist_machine', 'check_and_update_machine');

		// Optional: Add a custom interval if you want different timing
		add_filter('cron_schedules', 'custom_cron_interval');
		function custom_cron_interval($schedules) {
			$schedules['every_three_minutes'] = array(
				'interval' => 180, // 3 minutes in seconds
				'display'  => __('Every Three Minutes')
			);
			$schedules['every_five_minutes'] = array(
				'interval' => 300, // 5 minutes in seconds
				'display'  => __('Every Five Minutes')
			);
			return $schedules;
		}
		
		// Schedule an event if it is not already scheduled
		if (!wp_next_scheduled('check_and_delist_machine')) {
			wp_schedule_event(time(), 'every_five_minutes', 'check_and_delist_machine');
		}

	// Delist Statistics
		// Hook into the 'admin_menu' action to add a custom admin page
		add_action('admin_menu', 'delistStatsPage');

		function delistStatsPage() {
			// Add a new top-level menu to the dashboard
			add_menu_page(
				'Listing Statistics',    // Page title
				'Listing Statistics',    // Menu title
				'manage_options',       // Capability
				'deliststats',         // Menu slug
				'delistStatsPage_callback', // Callback function
				'dashicons-exit', // Icon URL (optional, dashicons used here)
				29                       // Position (optional)
			);

			// First child page
			add_submenu_page(
				'deliststats',             // Parent slug
				'Listing Exports',         // Page title
				'Listing Exports',         // Submenu title
				'manage_options',           // Capability
				'dealer-machines',             // Menu slug
				'dealer_machines'      // Callback function
			);
		}

		// Main page callback function
		function delistStatsPage_callback() {
			get_template_part( 'template-parts/admin-delist-stats' );
		}

		// Childe page "Dealer Machines" callback function
		function dealer_machines() {
			get_template_part( 'template-parts/admin-dealer-machines' );
		}

		// Delete machine from "Dealer Machines" page
		add_action('wp_ajax_delete_machines', 'delete_machines');
		add_action('wp_ajax_nopriv_delete_machines', 'delete_machines');

		function delete_machines() {
			if (current_user_can('delete_posts') && isset($_POST['machineIds'])) {
				$machineIds = $_POST['machineIds']; // This will be an array
				if (is_array($machineIds)) {
					$deleted_posts = 0;
					foreach ($machineIds as $machineId) {
						if (wp_trash_post($machineId)) {
							$deleted_posts++;
						}
					}
					echo "$deleted_posts posts deleted successfully.";
				} else {
					if (wp_trash_post($machineIds)) {
						echo "machine deleted successfully.";
					}
				}
			} else {
				echo "No machineIds received";
			}
			wp_die();
		}

	// Export table
		function export_to_csv() {
			if (isset($_GET['export'])) {
				if (isset($_GET['dealerName'])) {
					$filename = $_GET['dealerName'];
					$getDealerName = $_GET['dealerName'];
				} else {
					$filename = "export";
					$getDealerName = null;
				}

				// process variables
				$posts_per_page = 500;
				$dlpaged = isset($_GET['dlpaged']) ? absint($_GET['dlpaged']) : 1;
				$listingType = $_GET['listingType'];
				if ($listingType == 0) {
					$filename = $filename.'-active';
				} else {
					$filename = $filename.'-delisted';
				}
				$filename = $filename.'-'.'page_'.$dlpaged;
				
				// Set headers for the CSV file
				header('Content-Type: text/csv');
				header('Content-Disposition: attachment; filename='.$filename.'');

				// Open output stream
				$output = fopen('php://output', 'w');

				// Get your data (custom query or loop)
				$args = array(
					'post_type' => 'machine',
					'posts_per_page' => $posts_per_page,
					'paged' => $dlpaged,
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key' => 'delisted',
							'type' => 'NUMERIC',
							'value' => $listingType,
							'compare' => '='
						),
						array(
							'key' => 'dealer_name',
							'value' => $getDealerName,
							'compare' => '='
						),
					),
				);

				$query = new WP_Query($args);

				// Add column headers to the CSV
				fputcsv($output, array('Machine Title', 'Dealer website', 'Machine link', 'Published date')); // Change as needed

				// Loop through the results
				if ($query->have_posts()) {
					while ($query->have_posts()) {
						$query->the_post();

						// Get your desired data
						$data = array(
							get_the_title(),
							get_field('seller_contact_link'),
							get_the_permalink(),
							get_the_date()
						);

						// Write data to CSV
						fputcsv($output, $data);
					}
					wp_reset_postdata();
				}

				// Close output stream
				fclose($output);
				exit();
			}
		}
		add_action('init', 'export_to_csv');

	// Export all machines
		function export_all_machines_to_csv() {
			if (isset($_GET['export_all'])) {
				// Process variables
				$listingType = $_GET['listingType'];

				if ($listingType == 0) {
					$filename = 'Active-Machines.csv';
				} elseif ($listingType == 1) {
					$filename = 'Delisted-Machines.csv';
				} else {
					$filename = 'All-Machines.csv';
				}

				// Set headers for the CSV file
				header('Content-Type: text/csv');
				header('Content-Disposition: attachment; filename=' . $filename);

				// Open output stream
				$output = fopen('php://output', 'w');

				// Add column headers to the CSV
				fputcsv($output, array('Dealer Name', 'Machine Title', 'Dealer Website', 'Machine Link', 'Published Date'));

				$paged = 1;
				$posts_per_page = 2000; // Adjust chunk size if necessary
				$args = array(
					'post_type' => 'machine',
					'posts_per_page' => $posts_per_page,
					'paged' => $paged,
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key' => 'delisted',
							'type' => 'NUMERIC',
							'value' => $listingType,
							'compare' => '='
						),
					),
				);

				do {
					// Fetch the current chunk of posts
					$query = new WP_Query($args);

					if ($query->have_posts()) {
					    while ($query->have_posts()) {
					        $query->the_post();

					        // Get your desired data
					        $data = array(
					            get_field('dealer_name'),
					            get_the_title(),
					            get_field('seller_contact_link'),
					            get_the_permalink(),
					            get_the_date()
					        );

					        // Write data to CSV
					        fputcsv($output, $data);
					    }
					}

					$paged++;
					$args['paged'] = $paged;

					// Free up memory
					wp_reset_postdata();
				} while ($query->have_posts());

				// Close output stream
				fclose($output);
				exit();
			}
		}
		add_action('init', 'export_all_machines_to_csv');

	// Delete All drafts
		add_action('wp_ajax_delete_all_drafts', 'delete_all_drafts');

		function delete_all_drafts() {
			// Get the current page and posts per page from the AJAX request
			$page = intval($_POST['page']);
			$posts_per_page = intval($_POST['posts_per_page']);

			// Define the query args with pagination
			$args = array(
				'post_type'      => 'machine',         // Replace with your post type
				'posts_per_page' => $posts_per_page,
				'paged'          => $page,
				'post_status'    => 'draft',
				'fields' => 'ids',
			);

			// Get the posts
			$posts = get_posts($args);

			if (!empty($posts)) {
				foreach ($posts as $post_id) {
					$machineID = $post_id;
					wp_delete_post($machineID, true);
				}

				// Send success response with the next page number
				wp_send_json_success([
					'next_page' => $page + 1,
					'finished'  => false,
				]);
			} else {
				// No more posts to process
				wp_send_json_success([
					'finished' => true,
				]);
			}

			wp_die(); // Terminate properly
		}

		if (isset($_GET['delete_all_drafts'])) {
			?>
			<div class="notice notice-success is-dismissible" style="display: flex;justify-content: space-between;" id="delted_machines_count">
				<p>Click button to delete All drafts</p>
				<div style="display: flex;align-items: center;"><a href="#" id="deleteAllDraftTrigger" class="button button-primary">Delete All Drafts</a></div>
			</div>
			<?php
		}

	// Extend loggin session expiry time
		function custom_login_session($expiration, $user_id, $remember) {
			return YEAR_IN_SECONDS * 1; // Set login session to 1 years
		}
		add_filter('auth_cookie_expiration', 'custom_login_session', 99, 3);


	// Website Colors
		add_action('acf/save_post', function($post_id) {
			// Only trigger on options page
			if ($post_id !== 'options') {
				return;
			}

			// Get your field(s)
			$website_color_1 = get_field('website_color_1', 'option');
			$website_color_2 = get_field('website_color_2', 'option');
			$website_color_3 = get_field('website_color_3', 'option');
			$website_color_4 = get_field('website_color_4', 'option');
			$website_color_5 = get_field('website_color_5', 'option');
			$website_color_6 = get_field('website_color_6', 'option');

			// Build the CSS content
			$css = ":root {\n";
			if ($website_color_1) {
				$css .= "	--siteBlue: {$website_color_1};\n";
			}
			if ($website_color_2) {
				$css .= "	--siteBlue2: {$website_color_2};\n";
			}
			if ($website_color_3) {
				$css .= "	--siteBlueDark: {$website_color_3};\n";
			}
			if ($website_color_4) {
				$css .= "	--siteColor4: {$website_color_4};\n";
			}
			if ($website_color_5) {
				$css .= "	--siteColor5: {$website_color_5};\n";
			}
			if ($website_color_6) {
				$css .= "	--siteCountColor: {$website_color_6};\n";
			}
			$css .= "}";

			// Save it to a CSS file
			$file_path = get_stylesheet_directory() . '/css/custom-colors.css'; // Save in child theme folder
			file_put_contents($file_path, $css);
		});

