
<style>
	.tableWrapper {
		max-width: 98%;
		max-height: 600px;
		overflow-y: scroll;
	}
	.pagination {
		font-size: 15px;
		margin-top: 20px;
		overflow: hidden;
	}
	table {
		position: relative;
	}
	table thead {
		background-color: #fff;
		position: sticky;
		top: 0;
	}
	/*------------*/
	.copyToCB {
		display: inline-block;
	}
	.copyToCB span {
		cursor: pointer;
		color: #919191;
	}
	/*================*/
	.pagination .page-numbers {
		border: 1px solid #bfbfbf;
		padding: 6px 10px;
		margin-right: 3px;
		display: inline-block;
	}
	.pagination .page-numbers.current {
		color: #fff;
		background-color: #2271b1;
		border-color: #2271b1;
	}
	.pagination a {
		text-decoration: none;
	}
	/*-------------*/
	.dealerNameForm {
		margin: 30px 0;
	}
	.dealerNameForm input {
		width: 300px;
	}
	.dealerNameForm a {
		background-color: #2271b1;
		color: #fff;
		display: inline-block;
		text-decoration: none;
		padding: 8.5px 20px;
		border-radius: 5px;
		line-height: 1em;
		outline: none;
	}
	/*--------------*/
	.delist_title_box {
		display: flex;
		justify-content: space-between;
		align-items: center;
		max-width: 96.5%;
	}
	.delist_title_box a {
		text-decoration: none;
		display: inline-block;
	}
	.delist_title_box a span {
		font-size: 25px;
		width: 25px;
		height: 25px;
	}
	.delist_title_box .rightSection {
		display: flex;
	}
	.delist_title_box .rightSection .exportSection {
		margin-left: 15px;
	}
	.selectedMachines {
		display: flex;
		align-items: center;
		font-size: 16px;
		display: none;
	}
	.selectedMachines > span {
		margin-right: 15px;
		margin-left: 5px;
	}
	@keyframes spin {
		0% {
			transform: rotate(0deg);
		}
		100% {
			transform: rotate(360deg);
		}
	}
	.selectedMachines > span.spin {
		animation: spin 1s linear infinite;
		display: none;
	}
	input.selectAllMachines {
		margin-left: 0 !important;
	}
</style>

<h1>Machines By Dealer</h1>
<hr>
	<?php
		if (isset($_GET['dealerName']) && !empty($_GET['dealerName'])) {
		?>
			<?php
				$posts_per_page = 500;
				$dlpaged = isset($_GET['dlpaged']) ? absint($_GET['dlpaged']) : 1;

				$getDealerName = $_GET['dealerName'];

				?>
				<div class="dealerNameForm">
					<input type="text" id="dealerName" name="dealerName" placeholder="Dealer Name" value="<?php echo $getDealerName; ?>">
					<a href="/wp-admin/admin.php?page=dealer-machines&dealerName=">Search</a>
				</div>
				<?php

				$args = array(
					'post_type' => 'machine',
					'posts_per_page' => $posts_per_page,
					'paged' => $dlpaged,
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key' => 'delisted',
							'type' => 'NUMERIC',
							'value' => 1,
							'compare' => '='
						),
						array(
							'key' => 'dealer_name',
							'value' => $getDealerName,
							'compare' => '='
						),
					),
				);

				$posts = new WP_Query($args);
				$delistedMachines = $posts->found_posts;

				$posts_per_page = 500;
				$paged = isset($_GET['paged']) ? absint($_GET['paged']) : 1;

				// Listed machines
				$args = array(
					'post_type' => 'machine',
					'posts_per_page' => $posts_per_page,
					'paged' => $paged,
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key' => 'delisted',
							'type' => 'NUMERIC',
							'value' => 0,
							'compare' => '='
						),
						array(
							'key' => 'dealer_name',
							'value' => $getDealerName,
							'compare' => '='
						),
					),
				);

				$listedMachines = new WP_Query($args);
				$activeMachines = $listedMachines->found_posts;

				// All machines
				$args = array(
					'post_type' => 'machine',
					'meta_query' => array(
						array(
							'key' => 'dealer_name',
							'value' => $getDealerName,
							'compare' => '='
						),
					),
					'fields' => 'ids', // Only return the post IDs for better performance
					'numberposts' => -1,
				);
				$machines = get_posts($args);
				$allMachines = count($machines);
			?>
			<h3>Dealer Name: <?php echo $getDealerName; ?></h3>
			<hr>
			<h3>All Machines: <?php echo $allMachines;?></h3>
			<hr>
			<!-- <h3>Active Machines: <?php echo $activeMachines;?></h3> -->

			<div class="delist_title_box">
				<h3>Active Machines: <?php echo $activeMachines;?></h3>
				<div class="rightSection">
					<div class="selectedMachines">
						<span class="dashicons dashicons-update spin"></span>
						Selected: <span></span>
						<a href="#"><span class="dashicons dashicons-trash"></span></a>
					</div>
					<div class="exportSection">
						<a href="#"><span class="dashicons dashicons-download"></span></a>
					</div>
				</div>
			</div>

			<div class="tableWrapper activeMachinesTable">
				<table class="wp-list-table widefat striped">
					<thead>
						<tr>
							<th style="width: 20px;"><input type="checkbox" class="selectAllMachines"></th>
							<th style="width: 40%">Machine title</th>
							<th>Copy</th>
							<th>Dealer website</th>
							<th>Machine link</th>
							<th style="width: 30px;"></th>
						</tr>
					</thead>

					<tbody>
						<?php
							if ($listedMachines->have_posts()) {
								while ($listedMachines->have_posts()) {
									$listedMachines->the_post();
									$dealerUrl = get_field('seller_contact_link');
									$machineLink = get_the_permalink();
									$theID = get_the_ID();
									?>
									<tr>
										<td><input type="checkbox" name="selected_machines[]" value="<?php echo $theID; ?>"></td>
										<td><?php the_title(); ?></td>
										<td>
											<div class="copyToCB">
												<span class="dashicons dashicons-admin-page"></span>
											</div>
										</td>
										<td><a href="<?php echo $dealerUrl; ?>" target="_blank">Dealer Website</a></td>
										<td><a href="<?php echo $machineLink; ?>" target="_blank">Machine Url</a></td>
										<td class="deleteTheMachine"><a href="#" data-target="<?php echo $theID; ?>"><span class="dashicons dashicons-trash"></span></a></td>
									</tr>
									<?php
								}
							}
							// wp_reset_postdata();
						?>
					</tbody>
				</table>
			</div>

			<!-- Pagination -->
			<div class="pagination">
				<?php
					$total_pages = $listedMachines->max_num_pages;

					if ($total_pages > 1) {
						$current_page = max(1, $paged);

						echo paginate_links(array(
							'base' => add_query_arg('paged', '%#%'),
							'format' => '',
							'current' => $current_page,
							'total' => $total_pages,
							'prev_text' => __('« Prev'),
							'next_text' => __('Next »'),
						));
					}
					
					wp_reset_postdata();
				?>
			</div>
			<br>
			<br>
			<hr>
			<br>
			<div class="delist_title_box">
				<h3>Delisted Machines: <?php echo $delistedMachines;?></h3>
				<div class="rightSection">
					<div class="selectedMachines">
						<span class="dashicons dashicons-update spin"></span>
						Selected: <span></span>
						<a href="#"><span class="dashicons dashicons-trash"></span></a>
					</div>
					<div class="exportSection">
						<a href="#"><span class="dashicons dashicons-download"></span></a>
					</div>
				</div>
			</div>
			
			<div class="tableWrapper dlMachinesTable">
				<table class="wp-list-table widefat striped">
					<thead>
						<tr>
							<th style="width: 20px;"><input type="checkbox" class="selectAllMachines"></th>
							<th style="width: 40%">Machine title</th>
							<th>Copy</th>
							<th>Dealer website</th>
							<th>Machine link</th>
							<th style="width: 30px;"></th>
						</tr>
					</thead>

					<tbody>
						<?php
							if ($posts->have_posts()) {
								while ($posts->have_posts()) {
									$posts->the_post();
									$dealerUrl = get_field('seller_contact_link');
									$machineLink = get_the_permalink();
									$theID = get_the_ID();
									?>
									<tr>
										<td><input type="checkbox" name="selected_machines[]" value="<?php echo $theID; ?>"></td>
										<td><?php the_title(); ?></td>
										<td>
											<div class="copyToCB">
												<span class="dashicons dashicons-admin-page"></span>
											</div>
										</td>
										<td><a href="<?php echo $dealerUrl; ?>" target="_blank">Dealer Website</a></td>
										<td><a href="<?php echo $machineLink; ?>" target="_blank">Machine Url</a></td>
										<td class="deleteTheMachine"><a href="#" data-target="<?php echo $theID; ?>"><span class="dashicons dashicons-trash"></span></a></td>
									</tr>
									<?php
								}
							}
							// wp_reset_postdata();
						?>
					</tbody>
				</table>
			</div>

			<!-- Pagination -->
			<div class="pagination">
				<?php
					$total_pages = $posts->max_num_pages;

					if ($total_pages > 1) {
						$current_page = max(1, $dlpaged);

						echo paginate_links(array(
							'base' => add_query_arg('dlpaged', '%#%'),
							'format' => '',
							'current' => $current_page,
							'total' => $total_pages,
							'prev_text' => __('« Prev'),
							'next_text' => __('Next »'),
						));
					}
					
					wp_reset_postdata();
				?>
			</div>
		<?php
		} else {
			?>
			<div class="dealerNameForm">
				<input type="text" id="dealerName" name="dealerName" placeholder="Dealer Name">
				<a href="/wp-admin/admin.php?page=dealer-machines&dealerName=">Search</a>
			</div>
			<?php
		}
	?>
<br>
<br>
<!-- <a href="/admin.php?page=deliststats&export=1">Export Machines</a> -->

<script>
	jQuery(document).ready(function($) {
		// Copy machine title to clipboard
		$(".copyToCB").click(function(event) {
			var textToCopy = $(this).parent().prev('td').text();
			// console.log(textToCopy);
			// Copy text to clipboard
			// Create a temporary textarea element to hold the text
			var tempTextarea = $('<textarea>');

			// Append the textarea to the body (it needs to be in the DOM to copy)
			$('body').append(tempTextarea);

			// Set the textarea value to the text we want to copy
			tempTextarea.val(textToCopy).select();

			// Copy the text
			try {
				document.execCommand('copy');
				$(this).children('span').css('color', 'green');
			} catch (error) {
				console.error('Error copying text: ', error);
			}

			// Remove the temporary textarea
			tempTextarea.remove();

			setTimeout(function() {
				$(".copyToCB").children('span').removeAttr('style');
			}, 1000);
		});

		$(document).on('input', '#dealerName', function(event) {
			var getUrl = "/wp-admin/admin.php?page=dealer-machines&dealerName=";
			var getVal = $(this).val();
			$(".dealerNameForm a").attr('href', getUrl+getVal);
		});

		let selectedMachines;

		$(document).on('input', '.activeMachinesTable input[name="selected_machines[]"], .dlMachinesTable input[name="selected_machines[]"]', function() {
			// Determine which table and select relevant machines
			const isActiveTable = $(this).closest('.activeMachinesTable').length > 0;
			const selectedMachines = $(isActiveTable ? '.activeMachinesTable' : '.dlMachinesTable').find('input[name="selected_machines[]"]:checked').map(function() {
				return $(this).val();
			}).get();

			// Update the selected machines count
			const $delistTitleBox = $(this).closest(".tableWrapper").prev(".delist_title_box");
			$delistTitleBox.find(".selectedMachines > span:not(.spin)").text(selectedMachines.length);

			// Toggle visibility based on selected machines count
			$delistTitleBox.find(".selectedMachines").css('display', selectedMachines.length > 0 ? 'flex' : 'none');
		});

		$(".selectedMachines a").click(function(event) {
			event.preventDefault();

			// selectedMachines = $('input[name="selected_machines[]"]:checked').map(function() {
			// 	return $(this).val();
			// }).get();
			selectedMachines = $(this).parents(".delist_title_box").next(".tableWrapper").find('input[name="selected_machines[]"]:checked').map(function() {
				return $(this).val();
			}).get();

			var gettable = $(this).closest('.delist_title_box');
			var getTheSpin = $(this).closest('.delist_title_box').find('span.spin');

			// Trigger confirmation dialog
			if (selectedMachines.length > 0) {  // Check if there's at least one selected checkbox
				if (confirm("Are you sure you want to delete the selected machines?")) {
					// User clicked "OK"
					getTheSpin.fadeIn();
					var ajaxurl = "/wp-admin/admin-ajax.php";
					$.ajax({
						url: ajaxurl,  // Change this to the path of your PHP file
						type: 'POST',
						data: {
							action: 'delete_machines',
							machineIds: selectedMachines
						},
						success: function(response) {
							// console.log(response);
							getTheSpin.fadeOut();

							// Log each selected value
							$.each(selectedMachines, function(index, el) {
								$("input[value="+el+"]").parents("tr").remove();
							});

							gettable.find('span:not(.spin)').text();
							gettable.find('.selectedMachines').hide();
						},
						error: function(xhr, status, error) {
							console.error("AJAX error:", error);
						}
					});
				}

				/*$.each(selectedMachines, function(index, el) {
					console.log(el);
				});*/
			} else {
				alert("Please select at least one machine.");
			}
		});

		$(".deleteTheMachine a").click(function(event) {
			event.preventDefault();

			var machineId = $(this).data('target');

			var getTheSpin = $(this).closest('.tableWrapper').prev('.delist_title_box').find('span.spin');

			if (confirm("Are you sure you want to delete the machine?")) {
				// User clicked "OK"
				getTheSpin.fadeIn();
				var ajaxurl = "/wp-admin/admin-ajax.php";
				$.ajax({
					url: ajaxurl,  // Change this to the path of your PHP file
					type: 'POST',
					data: {
						action: 'delete_machines',
						machineIds: machineId
					},
					success: function(response) {
						// console.log(response);
						getTheSpin.fadeOut();
						$("input[value="+machineId+"]").parents("tr").remove();
					},
					error: function(xhr, status, error) {
						console.error("AJAX error:", error);
					}
				});
			}
		});

		// ===== Export machines ====
		$(".exportSection a").click(function(event) {
			event.preventDefault(); // Prevents the default link behavior

			const isActiveTable = $(this).closest('.delist_title_box').next('.activeMachinesTable').length > 0;
			const listingType = isActiveTable ? 0 : 1;

			var activePaged = "<?php echo isset($_GET['paged']) ? absint($_GET['paged']) : 1 ?>";
			var delistedPaged = "<?php echo isset($_GET['dlpaged']) ? absint($_GET['dlpaged']) : 1 ?>";

			let url = new URL($(this).attr('href'), window.location.origin);
			var dealerName = "<?php echo $getDealerName ?>";
			var page = isActiveTable ? activePaged : delistedPaged;
			url.searchParams.set('export', '1');
			url.searchParams.set('dealerName', dealerName);
			url.searchParams.set('dlpaged', page);
			url.searchParams.set('listingType', listingType);

			// Update the link with the new URL and redirect
			window.location.href = url.href;
		});

		// Select all machines
		$("#selectAllMachines").change(function(event) {
			
		});
		$(document).on('change', '.selectAllMachines', function(event) {
			if ($(this).prop('checked')) {
				// console.log("Checked");
				$(this).closest('thead').siblings('tbody').find('input[type=checkbox]').prop('checked', true);
				$(this).closest('.tableWrapper').prev('.delist_title_box').find(".selectedMachines > span:not(.spin)").text('All');
				$(this).closest('.tableWrapper').prev('.delist_title_box').find(".selectedMachines").show();

			} else {
				// console.log("Not Checked");
				$(this).closest('thead').siblings('tbody').find('input[type=checkbox]').prop('checked', false);
				$(this).closest('.tableWrapper').prev('.delist_title_box').find(".selectedMachines > span:not(.spin)").text('');
				$(this).closest('.tableWrapper').prev('.delist_title_box').find(".selectedMachines").hide();
			}
		});
	});
</script>