<?php
	/*
		Template name: MemberDashboard
	*/
?>
<?php get_header(); ?>
<body <?php body_class( $class = 'memberPage' ); ?>>

	<!-- Page specific CSS -->
	<style>
		.header_bottom_border {
			margin-bottom: 0;
		}
		.page_features_bg {
			background-color: unset;
		}
		.page_features_wrapper .right h5 {
			color: var(--siteBlueDark);
		}
		.page_features_wrapper .left ul {
			grid-template-columns: 1fr;
			/*grid-row-gap: 5px;*/
		}
		.page_features_wrapper .left ul li:first-child {
			font-size: 20px;
			margin-bottom: 5px;
		}
		.page_features_wrapper .left ul li:last-child {
			font-size: 17px;
			font-weight: normal;
		}
		.listedMachinesWrapper .site_container {
			padding: 0 65px;
		}
		/*---------------*/
		/*.fullWidth_wrapper.allListedMachines:nth-child(2) {
		    display: none;
		}*/
		.fullWidth_wrapper.allListedMachines {
		    display: none;
		}
		.fullWidth_wrapper .hasgap {
		    margin-bottom: 24px;
		}
		.paymentHistorySec {
			display: none;
		}
		.mllList {
			display: none;
		}
		/*================*/
		#wpcf7-f2173-o1 {
			display: none !important;
		}
		/*------------------*/
		#wpcf7-f2175-o2 {
			margin-bottom: 30px;
			padding-left: 65px;
		}
		#wpcf7-f2175-o2 label {
			color: var(--siteBlueDark);
		}
		#wpcf7-f2175-o2 input[type=url] {
			padding: 9px 10px;
			margin: 20px 0;
			border: 1px solid var(--siteOrange);
			outline: unset;
			border-radius: 25px;
			width: 400px;
			height: 49px;
		}
		#wpcf7-f2175-o2 input[type=submit] {
			padding: 8px 29px;
			background: var(--siteOrange);
			border: none;
			color: #fff;
			border-radius: 25px;
			cursor: pointer;
			font-size: 18px;
		}
		#wpcf7-f2175-o2 input#dealer-emailADU {
			display: none !important;
		}
		.addNewmachine {
			margin-bottom: 170px;
		}
		.addNewmachine .wpcf7-not-valid-tip {
			display: none;
		}
		.wpcf7-response-output {
			color: var(--siteBlue);
		}
		.wpcf7-spinner {
			left: 50%;
		}
		/*---------------*/
		.swal2-title {
			font-size: 24px;
		}
		button.swal2-confirm.swal2-styled {
			background-color: var(--siteOrange);
			border-radius: 20px;
		}
		button.swal2-styled.swal2-cancel {
			border-radius: 20px;
		}
		.swal2-styled.swal2-confirm:focus,
		.swal2-styled.swal2-cancel:focus {
			box-shadow: unset;
		}
		/*---------------*/
		@media screen and (max-width: 480px) {
			#wpcf7-f2175-o2 {
				padding-left: 43px;
			}
			#wpcf7-f2175-o2 input[type="url"] {
				width: 90%;
			}
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

	<!-- // Page Features -->
	<div class="fullWidth_wrapper page_features_bg">
		<div class="site_container">
			<div class="page_features_wrapper">
				<div class="page_features_inner">
					<!-- // Left portion -->
					<div class="left">
						<ul>
							<?php 
								$current_user = wp_get_current_user();

								function checkUserstatus() {
									if (is_user_logged_in() == true) {
										echo 'logged in';
									} else {
										echo "You're not logged in";
									}
								}
							?>
							<li>Member: <span style="font-weight: normal;"><?php echo $current_user->user_login; ?></span></li>
							<li>status: <?php checkUserstatus(); ?></li>
							<li style="display: none;" id="currentUsername"><?php echo $current_user->user_login; ?></li>
							<li style="display: none;" id="current_user_email"><?php echo $current_user->user_email; ?></li>
						</ul>
					</div>

					<!-- // Right portion -->
					<div class="right">
						<h1>Members</h1>
						<h5>Payment & Listings</h5>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- // Listed Machines -->
	<div class="fullWidth_wrapper listedMachinesWrapper">
		<div class="fullWidth_wrapper lmsTitle">
			<div class="site_container">
				<div class="lmsTitleBtn lmsTitleBtn1">
					<h2>Payment History</h2>
					<i class="fas fa-plus"></i>
				</div>
			</div>
		</div>

		<div class="fullWidth_wrapper allListedMachines">
			<div class="fullWidth_wrapper almTitlesWrapper">
				<div class="site_container">
					<div class="almTitles">
						<div class="item">Payment</div>
						<div class="item">30 Day Period:</div>
						<div class="item">Amount Paid:</div>
						<div class="item">Payment Method:</div>
					</div>
					<div class="almTitles almTitlesM">
						<div class="item loginStats">
							<?php
								$current_user = wp_get_current_user();
							?>
							<span>Member: <?php echo $current_user->user_email; ?></span>
							<span>Status: <?php echo checkUserstatus(); ?></span>
						</div>
						<!-- <div class="item">Listing: <span class="lm_number">47</span> live listings</div> -->
						<div class="item mph">Payment History <i class="fas fa-plus"></i></div>
					</div>
				</div>
			</div>
			
			<div class="singleLMWrapperD">
				<?php
					$current_user = wp_get_current_user();
					$current_user_email = $current_user->user_email;

					$args = array(
						'post_type' => 'dealer_payment',
						'order'               => 'DESC',
						'posts_per_page'         => 100,

						// Custom Field Parameters
						'meta_key'       => 'dealer_email',
						'meta_value'     => $current_user_email,
					);
					
					$query = new WP_Query( $args );

					$postCounter = 1;

					if ($query->have_posts()) {
						while ($query->have_posts()) {
						    $query->the_post();?>
						    <div class="fullWidth_wrapper singleLMWrapper">
								<div class="site_container">
								    <div class="singleLM singleLPM">
										<div class="item"><?php echo $postCounter; ?></div>
										<!-- <div class="item"><?php the_date('M d Y');?></div> -->
										<div class="item"><?php the_time( 'M d Y' );?></div>
										<div class="item">$ <?php the_field('payment_amount'); ?></div>
										<div class="item"><?php the_field('payment_method'); ?></div>
									</div>
								</div>
							</div>

							<?php $postCounter++; ?>
						<?php }
					}
				?>
				<!-- <div class="fullWidth_wrapper singleLMWrapper">
					<div class="site_container">
						<div class="singleLM singleLPM">
							<div class="item">02</div>
							<div class="item">June 2, 2021</div>
							<div class="item">$ 80.00</div>
							<div class="item">Visa</div>
						</div>
					</div>
				</div>
				<div class="fullWidth_wrapper singleLMWrapper">
					<div class="site_container">
						<div class="singleLM singleLPM">
							<div class="item">03</div>
							<div class="item">June 2, 2021</div>
							<div class="item">$ 60.00</div>
							<div class="item">Visa</div>
						</div>
					</div>
				</div> -->
			</div>

			<div class="singleLMWrapperM paymentHistorySec">
				<?php
					$current_user = wp_get_current_user();
					$current_user_email = $current_user->user_email;

					$args = array(
						'post_type' => 'dealer_payment',
						'order'               => 'DESC',
						'posts_per_page'         => 100,

						// Custom Field Parameters
						'meta_key'       => 'dealer_email',
						'meta_value'     => $current_user_email,
					);
					
					$query = new WP_Query( $args );

					$postCounter = 1;

					if ($query->have_posts()) {
						while ($query->have_posts()) {
						    $query->the_post();?>
							<div class="singleLMWrapper">
								<div class="item">
									Payment: <span class="singleLMCount"><?php echo $postCounter; ?></span>
								</div>
								<div class="item">
									30 Day Period: <span class="singleLMdate"><?php the_time( 'M d Y' );?></span>
								</div>
								<div class="item">
									Amount Paid: <span class="singleLMName">$<?php the_field('payment_amount'); ?></span>
								</div>
							</div>

							<?php $postCounter++; ?>
						<?php }
					}
				?>
				<!-- <div class="singleLMWrapper">
					<div class="item">
						Payment: <span class="singleLMCount">01</span>
					</div>
					<div class="item">
						30 Day Period: <span class="singleLMdate">June 2, 2021</span>
					</div>
					<div class="item">
						Amount Paid: <span class="singleLMName">$60</span>
					</div>
				</div>
				<div class="singleLMWrapper">
					<div class="item">
						Payment: <span class="singleLMCount">02</span>
					</div>
					<div class="item">
						30 Day Period: <span class="singleLMdate">June 2, 2021</span>
					</div>
					<div class="item">
						Amount Paid: <span class="singleLMName">$40</span>
					</div>
				</div>
				<div class="singleLMWrapper">
					<div class="item">
						Payment: <span class="singleLMCount">03</span>
					</div>
					<div class="item">
						30 Day Period: <span class="singleLMdate">June 2, 2021</span>
					</div>
					<div class="item">
						Amount Paid: <span class="singleLMName">$70</span>
					</div>
				</div> -->
			</div>
		</div>

		<!-- =============================== -->

		<div class="fullWidth_wrapper lmsTitle hasgap">
			<div class="site_container">
				<div class="lmsTitleBtn  lmsTitleBtn2">
					<h2>Live Listings</h2>
					<i class="fas fa-plus"></i>
				</div>
			</div>
		</div>

		<div class="fullWidth_wrapper allListedMachines">
			<div class="fullWidth_wrapper almTitlesWrapper">
				<div class="site_container">
					<div class="almTitles">
						<div class="item">Listings</div>
						<div class="item">Date Uploaded</div>
						<div class="item">Machine Name & URL</div>
						<div class="item">Listing: <span class="lm_number">
							<?php
								$current_user = wp_get_current_user();
								$current_user_name = $current_user->user_login;
								$args = array(
									'post_type' => 'machine',
							
									// Custom Field Parameters
									// 'meta_key'       => 'dealer_name',
									// 'meta_value'     => $current_user_name,
									'meta_query' => array(
										'relation' => 'AND',
										array(
											'key' => 'dealer_name',
											'value' => $current_user_name,
										),
										array(
											'key' => 'delisted',
											'type' => 'NUMERIC',
											'value' => 0,
											'compare' => '='
										),
									),
									'fields' => 'ids',
							 		'numberposts' => -1,
								);
								
								// $query = new WP_Query( $args );
								// $count = $query->found_posts;
								$query = get_posts($args);
								$count = count($query);
								echo $count;
							?></span>
						</div>
					</div>
					<div class="almTitles almTitlesM">
						<!-- <div class="item loginStats">
							<span>Member: desk@usedtissueequipment.com</span>
							<span>Status:logged in</span>
						</div> -->
						<!-- <div class="item">Listing: <span class="lm_number">47</span> live listings</div> -->
						<div class="item mll">Live Listings <i class="fas fa-plus"></i></div>
					</div>
				</div>
			</div>
			
			<div class="singleLMWrapperD">
				<?php
					$current_user = wp_get_current_user();
					$current_user_name = $current_user->user_login;

					$args = array(
						'post_type' => 'machine',
						'order'               => 'DESC',
						'posts_per_page'         => -1,
				
						// Custom Field Parameters
						// 'meta_key'       => 'dealer_name',
						// 'meta_value'     => $current_user_name,
						'meta_query' => array(
							'relation' => 'AND',
							array(
								'key' => 'dealer_name',
								'value' => $current_user_name,
							),
							array(
								'key' => 'delisted',
								'type' => 'NUMERIC',
								'value' => 0,
								'compare' => '='
							),
						),
					);
					
					$query = new WP_Query( $args );

					$postCounter = 1;

					if ($query->have_posts()) {
						while ($query->have_posts()) {
						    $query->the_post();?>
						    <div class="fullWidth_wrapper singleLMWrapper">
								<div class="site_container">
									<div class="singleLM">
										<div class="item"><?php echo $postCounter; ?></div>
										<div class="item"><?php the_time('M d Y');?></div>
										<div class="item">
											<h3><?php the_title(); ?></h3>
											<a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a>
										</div>
										<div class="item deleteMachineLink">
											<?php
												if ( current_user_can('delete_posts') ) {
													?>
														<a href="" class="deleteMachine"
														data-machinename="<?php echo  the_title();?>" 
														data-machineid="<?php echo the_ID();?>" 
														data-machinelink="<?php echo the_permalink();?>" 
														data-dealerusername="<?php echo $current_user->user_login;?>" 
														data-dealeremail="<?php echo $current_user->user_email;?>"
														>Delete</a>
													<?php
												}
											?>
										</div>
									</div>
								</div>
							</div>
							<?php $postCounter++; ?>
						<?php }
					}
				?>
			</div>

			<div class="singleLMWrapperM mllList">
				<?php
					$current_user = wp_get_current_user();
					$current_user_name = $current_user->user_login;

					$args = array(
						'post_type' => 'machine',
						'order'               => 'DESC',
						'posts_per_page'         => 10,
				
						// Custom Field Parameters
						'meta_key'       => 'dealer_name',
						'meta_value'     => $current_user_name,
					);
					
					$query = new WP_Query( $args );

					$postCounter = 1;

					if ($query->have_posts()) {
						while ($query->have_posts()) {
						    $query->the_post();?>
							<div class="singleLMWrapper">
								<div class="item">
									Listing: <span class="singleLMCount"><?php echo $postCounter; ?></span>
								</div>
								<div class="item">
									Date Uploaded: <span class="singleLMdate"><?php the_time('M d Y');?></span>
								</div>
								<div class="item">
									URL & Machine Name: <span class="singleLMName"><?php the_title(); ?></span>
								</div>
								<div class="item">
									<a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a>
								</div>
								<div class="item deleteMachineLink">
									<?php
										if ( current_user_can('delete_posts') ) {
											?>
												<a href="" class="deleteMachine"
												data-machinename="<?php echo  the_title();?>" 
												data-machineid="<?php echo the_ID();?>" 
												data-machinelink="<?php echo the_permalink();?>" 
												data-dealerusername="<?php echo $current_user->user_login;?>" 
												data-dealeremail="<?php echo $current_user->user_email;?>"
												>Delete</a>
											<?php
										}
									?>
								</div>
							</div>
							<?php $postCounter++; ?>
						<?php }
					}
				?>
			</div>
		</div>
	</div>

	<!-- // Machine Delete Request -->
	<?php echo do_shortcode( '[contact-form-7 id="2173" title="Machine Delete Request"]' ); ?>

	<!-- // Add new machine -->
	<div class="fullWidth_wrapper">
		<div class="site_container">
			<div class="addNewmachine">
				<?php echo do_shortcode( '[contact-form-7 id="2175" title="Add new machine url"]' ); ?>
			</div>
		</div>
	</div>

	<!-- // Footer top border -->
	<div class="fullWidth_wrapper">
		<div class="footer_top_border">
			<?php get_template_part( 'template-parts/universalFooterBorder' ); ?>
		</div>
	</div>

	<?php
		// Delete Machine PHP code
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
			$deleteRequestID = $_POST['getID'];
			wp_trash_post($deleteRequestID);
		}
	?> 

	<!-- //  -->
	<!-- <div class="fullWidth_wrapper">
		<div class="site_container">
			
		</div>
	</div> -->

	<!-- // Footer -->
	<?php get_footer(); ?>

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		$(document).ready(function() {
			$(".catsList a").click(function() {
			    $('html, body').animate({
			        scrollTop: $(".category_bg").offset().top -90
			    }, 500);
			});

			// ==================
			$(".lmsTitleBtn1").click(function(event) {
				$(this).parents(".lmsTitle").next(".allListedMachines").slideToggle();

				$(this).children('i').toggleClass('fa-plus fa-minus');

				// $(this).parents(".lmsTitle").toggleClass('hasgap');
			});
			$(".lmsTitleBtn2").click(function(event) {
				$(this).parents(".lmsTitle").next(".allListedMachines").slideToggle();

				$(this).children('i').toggleClass('fa-plus fa-minus');

				$(this).parents(".lmsTitle").toggleClass('hasgap');
			});

			// ===================
			$(".mph").click(function(event) {
				/* Act on the event */
				$(".paymentHistorySec").toggle();
				$(this).children('i').toggleClass('fa-plus fa-minus');
			});
			$(".mll").click(function(event) {
				/* Act on the event */
				$(".singleLMWrapperM.mllList").toggle();
				$(this).children('i').toggleClass('fa-plus fa-minus');
			});

			/*$(".deleteMachineLink a").click(function(event) {
				event.preventDefault();
				var getMachineName = $(this).data('machinename');
				var getMachineID = $(this).data('machineid');
				var getMachineLink = $(this).data('machinelink');
				var getDealerUsername = $(this).data('dealerusername');
				var getDealerEmail = $(this).data('dealeremail');

				$("input#machine-name").val(getMachineName);
				$("input#machine-id").val(getMachineID);
				$("input#machine-url").val(getMachineLink);
				$("input#dealer-username").val(getDealerUsername);
				$("input#dealer-email").val(getDealerEmail);

				$("#wpcf7-f2173-o1 form input[type=submit]").click();
			});*/

			// Callback after cf7 form submission
			/*document.addEventListener( 'wpcf7submit', function( event ) {
		    	var formId = event.detail.contactFormId;
			    if (formId == 2173) {
			      // call your PHP script here
			      // require_once('path/to/script.php');
			    }
			}, false );*/

			// Callback after add machine URL cf7 form submission
			// document.addEventListener( 'wpcf7submit', function( event ) {
		 //    	var formId = event.detail.contactFormId;
			//     if (formId == 2175) {
			//       $("#wpcf7-f2175-o2 > form").after('<span class="addMachineSuccess">Submitted successfully</span>');
			//     }
			// }, false );

			// Delete machine script
			$(document).on('click', '.deleteMachine', function(event) {
				event.preventDefault();

				Swal.fire({
					title: 'Are you sure you want to delete the machine?',
					showDenyButton: false,
					showCancelButton: true,
					confirmButtonText: 'Delete',
					}).then((result) => {
					/* Read more about isConfirmed, isDenied below */
					if (result.isConfirmed) {
						var getID = $(this).data('machineid');
						/*----------------------------------------*/
						var getMachineName = $(this).data('machinename');
						var getMachineID = $(this).data('machineid');
						var getMachineLink = $(this).data('machinelink');
						var getDealerUsername = $(this).data('dealerusername');
						var getDealerEmail = $(this).data('dealeremail');
						/*------------------------------------------*/
						$("#preloader").show();
						/*------------------------------------------*/
						$.ajax({
							url: '/member-dashboard/',
							type: 'POST',
							data: {
								getID: getID
							}
						})
						.done(function(response) {
							// console.log("Post Deleted");
							$("#preloader").hide();
							Swal.fire({
								title: 'Machine Deleted',
								html: '<b>Note: </b>Machine with the ID: <b>'+getID+'</b> has been deleted. If you accidently pressed on delete, contact with <a href="mailto:desk@machinelista.com">admin</a> by mentioning the following ID.',
								allowOutsideClick: false,
							});

							$(".swal2-backdrop-show button.swal2-confirm").click(function(event) {
								location.reload();
							});

							// location.reload();
							$("input#machine-name").val(getMachineName);
							$("input#machine-id").val(getMachineID);
							$("input#machine-url").val(getMachineLink);
							$("input#dealer-username").val(getDealerUsername);
							$("input#dealer-email").val(getDealerEmail);

							$("#wpcf7-f2173-o1 form input[type=submit]").click();
						})
						.fail(function(error) {
							console.log(error);
						});
					}
				});
			});

			var getDealerUsername = $("li#currentUsername").text();
			var getDealerEmail = $("li#current_user_email").text();
			$("input#dealer-usernameADU").val(getDealerUsername);
			$("input#dealer-emailADU").val(getDealerEmail);
		});
	</script>

	<?php wp_footer(); ?>
</body>
</html>