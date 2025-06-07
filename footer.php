<footer>
	<!-- // Footer Shortlinks -->
	<div class="fullWidth_wrapper">
		<div class="site_container">
			<div class="footer_shortLinks">
				<div class="left">
					<ul>
						<li><a href="/advertise">advertise</a></li>
						<li class="liveAutionMenuItem"><a href="/listings-for-used-machinery/">list machines</a></li>
						<li><a href="mailto:desk@machinelista.com" target="_blank">contact</a></li>
						<li><a href="/legals">legals</a></li>
					</ul>
				</div>
				<div class="right">
					<ul>
						<li><a href="https://www.facebook.com/machinelista" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="https://www.instagram.com/machinelista" target="_blank"><i class="fab fa-instagram"></i></a></li>
					</ul>
				</div>
				<span class="footerAutoline"></span>
			</div>
		</div>
	</div>

	<!-- // Newsletter -->
	<!-- <div class="fullWidth_wrapper">
		<div class="site_container">
			<div class="newsLetter_sec">
				<p>Become a subscriber and receive <br> emailed updates on our latest offerings.</p>

				<div class="newsLetter_input">
					<?php // echo do_shortcode('[contact-form-7 id="171" title="Newsletter"]'); ?>
				</div>
			</div>
		</div>
	</div> -->

	<!-- // Copyright -->
	<div class="fullWidth_wrapper footerCopyrightBG">
		<div class="site_container">
			<div class="footerCopyright">
				<div class="left">
					<p><b>Machinelista</b> is a search engine for new and used machine listings. Commercial machine dealers, private machine owners and machine manufacturers can list their inventory on Machinelista. Search is filtered by machine brand, category, model and country, across multiple industries.</p>
				</div>
				<div class="right">
					<span>&copy; 2018 - <?php echo date("Y"); ?> All Rights Reserved</span>
				</div>
			</div>
		</div>
	</div>		
</footer>

	<!-- // Popup form (Listing) -->
	<div id="popupForm">
		<div class="listingFormWrapper">
			<div class="listingForm_inner">
				<?php echo do_shortcode( '[contact-form-7 id="644" title="Listing Form"]' ); ?>
				<span class="close">
					<img style="width: 20px;" src="<?php rooturi(); ?>/img/close2.png" alt="">
				</span>


				<!-- <div class="custom_form_validation">
					<b>Success !</b>
					<p>We will contact you by email to advise you on pricing</p>
				</div> -->
			</div>
		</div>
	</div>

	<!-- // Popup form (Advertise) -->
	<div id="popupForm2">
		<div class="listingFormWrapper">
			<div class="listingForm_inner">
				<?php echo do_shortcode( '[contact-form-7 id="879" title="Advertise"]' ); ?>
				<span class="close">
					<img style="width: 20px;" src="<?php rooturi(); ?>/img/close2.png" alt="">
				</span>
			</div>
		</div>
	</div>

	<!-- // Preloader -->
	<div id="preloader">
		<img src="<?php rooturi(); ?>/img/preloader.gif" alt="">
		<!-- <i class="fas fa-circle-notch"></i> -->
	</div>