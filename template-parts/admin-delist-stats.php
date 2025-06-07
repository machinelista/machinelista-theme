
<style>
	.exportMachines > a {
		margin-top: 20px;
		display: inline-block;
	}
</style>

	<h1>Delist Statistics</h1>
	<hr>
	<?php
	$args = array(
		'post_type' => 'machine',
		'posts_per_page' => -1,
		'meta_query' => array(
			'relation' => 'AND',
			array(
				'key' => 'delisted',
				'type' => 'NUMERIC',
				'value' => 1,
				'compare' => '='
			)
		),
		'fields' => 'ids',
	);

	$posts = get_posts($args);

	$delistedMachines = count($posts);


	// Listed machines
	$args = array(
		'post_type' => 'machine',
		'posts_per_page' => -1,
		'meta_query' => array(
			'relation' => 'AND',
			array(
				'key' => 'delisted',
				'type' => 'NUMERIC',
				'value' => 0,
				'compare' => '='
			),
		),
		'fields' => 'ids',
	);

	$listedMachines = get_posts($args);
	$activeMachines = count($listedMachines);

	$args = array(
		'post_type' => 'machine',
		'fields' => 'ids', // Only return the post IDs for better performance
		'numberposts' => -1,
	);
	$machines = get_posts($args);
	$allMachines = count($machines);

	$currentDlCycle = get_option('dlCycle');
	?>
	<h3>Total published Machines: <?php echo $allMachines;?></h3>
	<h3>Active Machines: <?php echo $activeMachines;?></h3>
	<h3>Delisted Machines: <?php echo $delistedMachines;?></h3>
	<h3>Current Delist Cycle: <?php echo $currentDlCycle; ?></h3>
	<br>
	<br>
	<br>
	<h2>Export Listings</h2>
	<hr>
	<div class="exportMachines">
		<div class="sField">
			<label for="listingType">Listing Type</label>
			<select name="listingType" id="listingType">
				<option value="">Select Type</option>
				<option value="Active">Active</option>
				<option value="Delisted">Delisted</option>
			</select>
		</div>
		<a href="/admin.php?page=deliststats&export_all=1">Export Machines</a>
	</div>
	
	<div style="margin-top: 100px">
		<hr>
		<a href="/wp-admin/index.php?delete_all_drafts=1">Delete All Drafts</a>
	</div>

<script>
	jQuery(document).ready(function($) {
		$(".exportMachines > a").click(function(event) {
			event.preventDefault();
			var machineType = $("#listingType").val();
			var listingType;
			if ( machineType !== '' && machineType == 'Active' ) {
				listingType = 0;
			} else if( machineType !== '' && machineType == 'Delisted' ) {
				listingType = 1;
			} else {
				alert("Choose listing type");
			}

			if ( machineType !== '' ) {
				let url = new URL($(this).attr('href'), window.location.origin);
				url.searchParams.set('export_all', '1');
				url.searchParams.set('listingType', listingType);

				// Update the link with the new URL and redirect
				window.location.href = url.href;
			}
		});
	});
</script>
	