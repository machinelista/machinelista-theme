jQuery(document).ready(function($) {
	$("input#acf-field_62f3c55ecc02b").parent().append('<button class="createTag" id="addDealerTag">Save to tag</button>');
	$("input#acf-field_619d1b1ddc4f1").parent().append('<button class="createTag" id="addPriceTag">Save to tag</button>');
	$("input#acf-field_619d1b1ddc4f1").parent().append('<button class="createTag" id="addUTag">U tag</button>');
	$("input#acf-field_619d1b1ddc4f1").parent().append('<button class="createTag" id="addSTag">S tag</button>');
	$("select#acf-field_61b20b5a21eb1").parent().append('<button class="createTag" id="addIndustryTag">Save to tag</button>');
	$(".acf-field-6494538ac6e73").append('<button class="createTag" id="addCondTag">Add to tag</button>');

	$("body.post-type-machine.post-new-php #title").parent().append('<button class="createTag" id="addSeoTag">Save to Yoast</button>');
	$("body.post-type-machine.post-new-php #title").parent().append('<button class="createTag" id="copyText">Copy</button>');

	$("button.createTag").click(function(event) {
		event.preventDefault();
	});

	if ( $("#addSeoTag").length == 1 ) {
		$("button#addSeoTag").click(function(event) {
			var getThisVal = $(this).siblings('input').val();

			if ( $("input#focus-keyword-input-metabox").val() == "" ) {
				$("input#focus-keyword-input-metabox").val(getThisVal);
			}
			if ( $("input#yoast-google-preview-slug-metabox").val() == "" ) {
				$("input#yoast-google-preview-slug-metabox").val(getThisVal);
			}
		});
	}
	$("button#copyText").click(function(event) {
		function copyToClipboard(element) {
			var $temp = $("<input>");
			$("body").append($temp);
			$temp.val($(element).val()).select();
			document.execCommand("copy");
			$temp.remove();
		}
		copyToClipboard('input#title');
	});

	// Dealer name tag
	$("button#addDealerTag").click(function(event) {
		var getThisVal = $(this).siblings('input').val();
		$("input#new-tag-post_tag").val(getThisVal);
		$("input#new-tag-post_tag").siblings('.tagadd').click();
	});

	// Unsubscribe tag "u"
	$("button#addUTag").click(function(event) {
		$("input#new-tag-post_tag").val("u");
		$("input#new-tag-post_tag").siblings('.tagadd').click();
	});
	// Auto select "u" tag
	/*if ( $("body.post-type-machine.post-new-php").length > 0 ) {
		$("button#addUTag").click();
	}*/

	// Subscribe tag "s"
	$("button#addSTag").click(function(event) {
		$("input#new-tag-post_tag").val("s");
		$("input#new-tag-post_tag").siblings('.tagadd').click();
	});

	// Price tag
	$("button#addPriceTag").click(function(event) {
		var getThisVal = $(this).siblings('input').val();
		if ( getThisVal == "N/A" && getThisVal !== "" ) {
			$("input#new-tag-post_tag").val("na");
			$("input#new-tag-post_tag").siblings('.tagadd').click();
		}
		if ( getThisVal !== "N/A" && getThisVal !== "" ) {
			$("input#new-tag-post_tag").val("poo");
			$("input#new-tag-post_tag").siblings('.tagadd').click();
		}
	});

	// Industry tag
	$("button#addIndustryTag").click(function(event) {
		var getThisVal = $(this).siblings('select').val();
		$("input#new-tag-post_tag").val(getThisVal);
		$("input#new-tag-post_tag").siblings('.tagadd').click();
	});

	// Country tag
	$("#machine_countrychecklist label.selectit").click(function(event) {
		var getThisVal = $(this).text();
		$("input#new-tag-post_tag").val(getThisVal);
		$("input#new-tag-post_tag").siblings('.tagadd').click();
	});
	$("#machine_countrychecklist-pop label.selectit").click(function(event) {
		var getThisVal = $(this).text();
		$("input#new-tag-post_tag").val(getThisVal);
		$("input#new-tag-post_tag").siblings('.tagadd').click();
	});
	// ------ Add attribute ------
	$("#machine_countrychecklist label").each(function(index, el) {
		var getCattr = $(this).text();
		getCattr = getCattr.trim();
		$(this).attr('title', getCattr);
	});

	// Category tag
	$("#machine_categorychecklist label.selectit").click(function(event) {
		var getThisVal = $(this).text();
		$("input#new-tag-post_tag").val(getThisVal);
		$("input#new-tag-post_tag").siblings('.tagadd').click();
	});
	$("#machine_categorychecklist-pop label.selectit").click(function(event) {
		var getThisVal = $(this).text();
		$("input#new-tag-post_tag").val(getThisVal);
		$("input#new-tag-post_tag").siblings('.tagadd').click();
	});
	// ------ Add attribute ------
	$("#machine_categorychecklist label, #machine_manufacturerchecklist label, #machine_modelchecklist label").each(function(index, el) {
		var getCattr = $(this).text();
		getCattr = getCattr.trim();
		$(this).attr('title', getCattr);
	});

	// Machine Conditon tag
	$(document).on('click', '.acf-field-6494538ac6e73 button#addCondTag', function(event) {
		var getThisVal = $(".acf-field-6494538ac6e73 input:checked").val();
		$("input#new-tag-post_tag").val(getThisVal);
		$("input#new-tag-post_tag").siblings('.tagadd').click();
	});

	// Machine Delisted tag
	$(document).on('change', '#acf-field_651c36b065d05', function(event) {
		$("input#new-tag-post_tag").val('delisted');
		$("input#new-tag-post_tag").siblings('.tagadd').click();
	});

	// Sort table function
	function sortTable(n) {
		var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
		table = document.getElementById("the-list");
		switching = true;

		//Set the sorting direction to ascending:
		dir = "asc"; 

		/*Make a loop that will continue until
		no switching has been done:*/
		while (switching) {
			//start by saying: no switching is done:
			switching = false;
			rows = table.rows;
			/*Loop through all table rows (except the
			first, which contains table headers):*/
			for (i = 0; i < (rows.length - 1); i++) {
				//start by saying there should be no switching:
				shouldSwitch = false;
				/*Get the two elements you want to compare,
				one from current row and one from the next:*/
				x = rows[i].getElementsByTagName("TD")[n];
				y = rows[i + 1].getElementsByTagName("TD")[n];
				/*check if the two rows should switch place,
				based on the direction, asc or desc:*/
				if (dir == "asc") {
					if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
					//if so, mark as a switch and break the loop:
					shouldSwitch= true;
					break;
					}
				} else if (dir == "desc") {
					if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
						//if so, mark as a switch and break the loop:
						shouldSwitch = true;
						break;
					}
				}
			}
			if (shouldSwitch) {
				/*If a switch has been marked, make the switch
				and mark that a switch has been done:*/
				rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
				switching = true;
				//Each time a switch is done, increase this count by 1:
				switchcount ++;      
			} else {
				/*If no switching has been done AND the direction is "asc",
				set the direction to "desc" and run the while loop again.*/
				if (switchcount == 0 && dir == "asc") {
					dir = "desc";
					switching = true;
				}
			}
		}
	}

	if ( $("body").hasClass('users-php') ) {
		$('th#dealer_industry').click(function(event) {
			sortTable(3);
		});
		$('th#role').click(function(event) {
			sortTable(2);
		});
	}

	// if ( $("body").hasClass('post-type-machine') ) {
	// 	$('th#machine_type a').click(function(event) {
	// 		event.preventDefault();
	// 		sortTable(3);
	// 	});
	// }

	// ====== Delete all drafts =======
		let page = 1; // Start from the first page
		let postsPerPage = 500; // Number of posts per page

		function deleteAllDrafts() {
				jQuery.ajax({
				url: ajaxurl, // WordPress AJAX URL
				type: 'POST',
				data: {
					action: 'delete_all_drafts', // PHP action hook
					page: page,
					posts_per_page: postsPerPage,
				},
				success: function (response) {
					if (response.success) {
						if (response.data.finished) {
							// console.log('All posts have been updated!');
							$("#delted_machines_count p").text("All drafts have been deleted!");
						} else {
							// console.log('Current batch updated! continuing...');
							$("#delted_machines_count p").text("Deleting all Drafts...");

							// Update the page number and process the next batch
							page = response.data.next_page;
							deleteAllDrafts();
						}
					} else {
						console.log('An error occurred during processing.');
					}
				},
				error: function () {
					console.log('AJAX request failed.');
				},
			});
		}

		// Trigger the first batch update
		$("#deleteAllDraftTrigger").click(function(event) {
			event.preventDefault();
			deleteAllDrafts();
		});

		// Offloading media = temp code
		const params = new URLSearchParams(window.location.search);
	
		if (params.get("mediabatchuploaded") === "1") {
			// Create span element
			const $message = $('<span>')
				.text('Batch Uploaded')
				.css({
					display: 'inline-block',
					padding: '5px 10px',
					background: '#dff0d8',
					color: '#3c763d',
					border: '1px solid #d6e9c6',
					borderRadius: '4px',
					margin: '10px 0'
				})
				.prependTo('.wp-heading-inline'); // Change to a specific container if needed

			// Remove after 5 seconds
			setTimeout(function() {
				$message.fadeOut(400, function() {
					$(this).remove();
				});
			}, 10000);
		}
});