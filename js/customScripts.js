$(document).ready(function() {
	// Navigation toggle
	$(".toggle_nav").click(function(event) {
		$(this).siblings('ul.mobileMenu').toggle();

		var getCloseImage = 'img/close.png';
		var getOpenImage = 'img/burger-menu.png';
		var getImageSrc = $(this).children('img').attr('src');

		if (getImageSrc == getOpenImage) {
			$(this).children('img').attr('src' , getCloseImage);
			$(this).children('img').css({
				width: '15px',
				marginRight: '5px'
			});
		}
		if (getImageSrc == getCloseImage) {
			$(this).children('img').attr('src' , getOpenImage);
			$(this).children('img').css({
				width: '25px',
				marginRight: '0'
			});
		}

	});

	if ($(window).width() > 480 && $(window).width() < 1200) {
		var getFootrShtrlinksW = $(".footer_shortLinks").width();
		var getFootrShtrlinksPL = $(".footer_shortLinks").css('padding-left');

		$(".footerAutoline").width(getFootrShtrlinksW).css('left', getFootrShtrlinksPL);
	}

	// ====== Popup Forms script ======
	$(".openLsFormPopup").click(function(event) {
		event.preventDefault();
		$("#popupForm").show();
		$("body").addClass('popupFormOpen');
	});
	$("#popupForm .close").click(function() {
		$("#popupForm").hide();
		$("body").removeClass('popupFormOpen');
	});

	// =======================
	$(".openadFormPopup").click(function(event) {
		event.preventDefault();
		$("#popupForm2").show();
		$("body").addClass('popupFormOpen');
	});
	$("#popupForm2 .close").click(function() {
		$("#popupForm2").hide();
		$("body").removeClass('popupFormOpen');
	});

	// =======================
	$(".openDRFormPopup").click(function(event) {
		event.preventDefault();
		$("#popupForm3").show();
		$("body").addClass('popupFormOpen');

		// var getMachineID = $(this).parents(".s_product").find('.postIdHidden').text();
		var getMachineD = $(this).parents(".s_product").find('.machineDHidden').text();
		var getMachineUrl = $(this).parents(".s_product").find('.machineUrlHidden').text();
		var getDealerEmail = $(this).attr('href');
		// console.log(getMachineID);
		if ( $("body").hasClass('single-machine') == true ) {
			var getMachineD = $(this).siblings('.machineDHidden').text();
			var getMachineUrl = $(this).siblings('.machineUrlHidden').text();
		}

		// $("#popupForm3").find('input#mID').attr('value', getMachineID);
		// $("#popupForm3").find('#mIDo').text(getMachineID);
		// ----------------------------------------------
		$("#popupForm3").find('input#mDealer').attr('value', getMachineD);
		$("#popupForm3").find('#mDealerO').text(getMachineD);
		// ----------------------------------------------
		$("#popupForm3").find('input#mUrl').val(getMachineUrl);
		// ----------------------------------------------
		$("#popupForm3").find('input#dealerEmail').attr('value', getDealerEmail);
	});
	$("#popupForm3 .close").click(function() {
		$("#popupForm3").hide();
		$("body").removeClass('popupFormOpen');
	});

	// ===== Hide preloader =====
	var preloader = $("#preloader");
	preloader.hide();

	// ------ Pagination -----
	if ($("body.page-template-search").length == 1 || $("body.tax-machine_category").length == 1 || $("body.tax-machine_category").length == 1) {

		if ( $(".pagination").length >= 1 ) {
			var getPrevLink = $(".pagination .current").prev("a").attr('href');
			$(".pagination .pagination_ls").attr('href', getPrevLink);

			var getNextLink = $(".pagination .current").next("a").attr('href');
			$(".pagination .pagination_rs").attr('href', getNextLink);

			$(".pagination").prev(".fullWidth_wrapper").css({
				'border-bottom': '1px solid rgba(72, 141, 168, 0.07)',
				'padding-bottom': '5px'
			});
		}
	}

	// ------ Gap after pagination -------
	if ($(".fullWidth_wrapper.searched_page_wrapper .pagination").length == 1) {
		$(".fullWidth_wrapper.searched_page_wrapper").css('padding-bottom', '73px');
	} else {
		$(".fullWidth_wrapper.searched_page_wrapper").css('padding-bottom', '132px');
	}

	// ------- Script For 3rd filter and search template --------
	if ( $("body").hasClass('tax-machine_manufacturer') || $("body").hasClass('tax-machine_category') || $("body").hasClass('page-template-search') ) {
		const getURL = window.location.search;
		const urlParams = new URLSearchParams(getURL);
		const fPrice = urlParams.get('fPrice');

		// if ( fPrice == "Low to High" ) {
		// 	if ( $(".pInfoPriceInner span:contains('N/A')").length > 0 ) {
		// 		$(".pInfoPriceInner span:contains('N/A')").parents(".fullWidth_wrapper").addClass('classNA');
		// 		$(".allSearchedProducts .fullWidth_wrapper.classNA").appendTo('.allSearchedProducts');
		// 	}
		// }

		if ( $(window).width() < 480 && $(".fullWidth_wrapper.searched_page_wrapper .s_product").length > 0 ) {
			var getParentWidth = $(".fullWidth_wrapper.searched_page_wrapper .s_product").width();
			$(".allSearchedProducts .s_product .thumbSlider").width(getParentWidth);
			$(".allSearchedProducts .s_product .thumbSlider .slick-list .slick-track").width(4000);
			$(".allSearchedProducts .s_product .slick-slide").css('width', getParentWidth+' !important');
		}

		// ========= Delete ad if it's last item on the list =========
		if ( $(".allSearchedProducts .fullWidth_wrapper:last-child").hasClass('thisIsAnAdWrapper') ) {
			$(".allSearchedProducts .fullWidth_wrapper:last-child").remove();
		}		
	}

	// Code for single machine template
	if ( $('body').hasClass('single-machine') ) {
		if ($(window).width() <= 390) {
			var width = $('.relatedMachinesWrapper .sMachine').attr('style').match(/width:\s*(\d+)px/)[1];
			console.log(width);
			setTimeout(function() {
				$(".sMachine").each(function(index, el) {
					$(this).attr('style', '');
					$(this).attr('style', 'width: '+width+'px !important;');
					console.log('width applied');
				});
			}, 1000);

			$('.relatedMachinesWrapper .slick-arrow').click(function(event) {
				setTimeout(function() {
					$('.relatedMachinesWrapper .sMachine').attr('style', '');
					$('.relatedMachinesWrapper .sMachine').attr('style', 'width: '+width+'px !important;');
				}, 500);
			});
		}
	}

	// Disable intagram click
	$("footer .footer_shortLinks .right li a").click(function(event) {
		event.preventDefault();
	});

	// Header resize on scroll
	if ( $("body").hasClass('homePage') == false ) {
		if ( $(window).width() > 750 ) {
			window.addEventListener('scroll', function() {
				if (window.scrollY >= 1) {
					$("header").removeClass('defaultHeader').addClass('reduceHeader');
					$("header .search_box form").fadeOut(400);
				} else {
					$("header").removeClass('reduceHeader').addClass('defaultHeader');
					$("header .search_box form").fadeIn(400);
				}
			});
		}
	}
});