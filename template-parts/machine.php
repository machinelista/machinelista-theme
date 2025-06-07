<div class="fullWidth_wrapper">	
	<div class="site_container">
		<div class="s_product">
			<!-- // Product thumb slider -->
			<div class="thumbSlider">
				<div class="pThumbSlider">
					<?php
						for ($i = 1; $i <= 10; $i++) {
							$image = get_field('image_' . $i);
							if (!empty($image)) { ?>
								<div class="item">
									<a href="<?php the_permalink(); ?>">
										<img src="<?php echo esc_url($image); ?>" alt="">
									</a>
								</div>
							<?php }
						}
					?>
				</div>
			</div>

			<!-- // Product Info -->
			<div class="productInfo">
				<div class="pInfoDsc">
					<div>
						<h2>
							<a href="<?php the_permalink(); ?>">
							<?php
								if (!empty(get_field('machine_year'))) {
									the_field('machine_year'); echo ' -';
								}
							?>
							<?php the_title();?>
							</a>
						</h2>
						<p><?php the_field('machine_short_specs'); ?></p>
						<span class="postIdHidden"><?php the_ID(); ?></span>
						<span class="machineDHidden"><?php the_field('dealer_name'); ?></span>
						<span class="machineUrlHidden"><?php the_permalink(); ?></span>
					</div>
					<div class="location">
						<div style="display: flex;align-items: center;" class="applyCountryFlag">
							<?php
								$flag_name_data = "unknown";
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
							<!-- <img src="<?php the_field('machine_country_flag'); ?>" alt=""> -->
							<?php ShowFlag($flag_name_data); ?>
						</div>
						<div>
						<?php
							$terms = get_the_terms( $post->ID, 'machine_country' );

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
						</div>
						<div class="tabeletPricesec">
							<span><?php the_field('currency_type'); ?></span>
							<?php
								if (!empty(get_field('machine_price')) && get_field('machine_price') !== "N/A") {
									echo '<span>';
									// the_field('machine_price');
									$machine_price = get_field('machine_price');
									$formatted_price = number_format($machine_price);
									echo $formatted_price;
									echo '</span>';
								} elseif (!empty(get_field('machine_price')) && get_field('machine_price') == "N/A") {
									echo '<span style="font-weight: normal;">';
									echo 'N/A';
									echo '</span>';
								} else {
									echo '<span style="font-weight: normal;">';
									echo 'N/A';
									echo '</span>';
								}
							?>
						</div>
					</div>

					<div class="infoForMobile">
						<div class="top">
							<div class="locationM">
								<!-- <img src="<?php the_field('machine_country_flag'); ?>" alt=""> -->
								<div class="applyCountryFlag">
									<?php ShowFlag($flag_name_data); ?>
								</div>
								
								<span>
									<?php
										$terms = get_the_terms( $post->ID, 'machine_country' );

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
							</div>

							<div class="priceM">
								<span><?php the_field('currency_type'); ?></span>
								<?php
									if (!empty(get_field('machine_price')) && get_field('machine_price') !== "N/A") {
										echo '<span>';
										// the_field('machine_price');
										$machine_price = get_field('machine_price');
										$formatted_price = number_format($machine_price);
										echo $formatted_price;
										echo '</span>';
									} elseif (!empty(get_field('machine_price')) && get_field('machine_price') == "N/A") {
										echo '<span style="font-weight: normal;">';
										echo 'N/A';
										echo '</span>';
									} else {
										echo '<span style="font-weight: normal;">';
										echo 'N/A';
										echo '</span>';
									}
								?>
							</div>
						</div>

						<div class="bottom">
							<div class="sellerM">
								<a href="<?php the_field('seller_contact_link'); ?>" target="_blank">Contact Seller</a>
							</div>
						</div>
					</div>
				</div>

				<div class="pInfoPrice">
					<div class="pInfoPriceInner">
						<span>
							<?php
								if ( !empty(get_field('machine_price')) && get_field('machine_price') !== "N/A" ) {
									the_field('currency_type');
									$machine_price = get_field('machine_price');
									// $machine_price = str_replace(',', '', $machine_price);
									// $machine_price = floatval($machine_price);
									// $machine_price = floor($machine_price);
									$formatted_price = number_format($machine_price);
									echo $formatted_price;

									// the_field('machine_price');
								}
								if ( get_field('machine_price') == "N/A" && !empty(get_field('machine_price')) ) {
									the_field('currency_type');
									echo ' ';
									the_field('machine_price');
								}
							?>
						</span>
					</div>
				</div>
			</div>

			<!-- Contact Seller for product -->
			<div class="contactSeller">
				<img src="<?php getLastImage(); ?>" alt="">
				<div class="overlay">
					<?php
						if (get_field('using_email') == true) {
							$customClass = 'openDRFormPopup';
						} else {
							$customClass = null;
						}
					?>
					<a href="<?php the_field('seller_contact_link'); ?>" class="<?php echo $customClass; ?>" target="_blank">CONTACT SELLER</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Apply flag to applyCountryFlag div -->
<!-- <script>
	var jsonCData = <?php //echo $jsonCData; ?>;
	var countryNameToFind = jsonCData.countryName;
	findAlpha2ByCountryName(countryNameToFind);
</script> -->