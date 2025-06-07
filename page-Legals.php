<?php
	/*
		Template name: Legals
	*/
?>
<?php get_header(); ?>

<body <?php body_class( $class = 'pageLegals' ); ?>>

	<!-- Page specific CSS -->
	<style>
		.listing_amount_bg {
			margin-top: 70px;
		}
		.page_features_wrapper {
			padding: 25px 26px 25px 66px;
		}
		.page_features_wrapper .left ul {
			grid-template-columns: 1fr;
		}
		/*-----------------*/
		.machine_quote_wrapper .machine_quote_inner {
			grid-template-columns: 60% 40%;
		}
		.machine_quote_wrapper .left .info {
			padding: 100px 60px;
		}
		/*---------------------*/
		.page_content_inner {
			grid-template-columns: 1fr 1fr;
			padding-top: 70px;
			padding-bottom: 120px;
			align-items: baseline;
		}
		.page_content_inner h2 {
			font-size: 43px;
			text-align: center;
		}
		.page_content_inner .right h2 {
			margin-bottom: 80px;
		}
		.page_content_inner .right {
			padding: 0;
		}
		.page_content_inner .img_holder img {
			width: 292px;
			height: 337px;
			bottom: unset;
		}
		.page_content_inner .img_holder:before {
			content: '';
			width: 278px;
			height: 328px;
			background-color: rgba(193, 184, 0, 0.81);
			position: absolute;
			z-index: 5;
			left: 20%;
			top: -50px;
		}
		.page_content_inner .img_holder:after {
			content: '';
			width: 345px;
			height: 397px;
			background-color: rgba(60, 135, 37, 0.18);
			position: absolute;
			z-index: 5;
			left: 13%;
			top: -25px;
		}
		/*----------------*/
		.ad_size_bg {
			background-color: #f3f3f3;
			margin-bottom: 70px;
			padding: 40px 0px;
		}
		/*---------------*/
		.page_features_wrapper .right h5 {
			font-weight: bold;
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

	<!-- // Page Features -->
	<div class="fullWidth_wrapper page_features_bg">
		<div class="site_container">
			<div class="page_features_wrapper">
				<div class="page_features_inner">
					<!-- // Left portion -->
					<div class="left">
						<ul>
							<li>Machine Dealers</li>
							<li>Machine Auctioneers</li>
							<li>Manufacturers & Industry</li>
						</ul>
					</div>

					<!-- // Right portion -->
					<div class="right">
						<h1>Legals</h1>
						<!-- <h5>Banners</h5> -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- // Legals -->
	<div class="fullWidth_wrapper">
		<div class="site_container">
			<div class="legalsWrapper">
				<div class="legalsInner">
					<h4>General Terms and Conditions for Cooperation Contract</h4>
					<div class="cusOlList">
						<div class="sItem">
							<span class="title">Preface</span>
						    <p>The purpose of the company Machine Lista is the operation of software for promotion services on the internet (hereafter referred to as “platform”). The platform operated by Machine Lista offers the opportunity to reach people (hereafter referred to as “user”), who wish to purchase goods or services on the internet. On the web address and on partner websites, including mobile applications, by use of the platform, the user can obtain information about the products being offered on the internet by websites and online shops (hereafter referred to as “website”) of contract partner and other providers (together hereafter referred to as “provider”). The User can independently inform himself easily and extensively about the offered products and directly get in contact or place an order on the website of the provider.</p>
						</div>
						<div class="sItem">
							<span class="title">1. Subject of the Contract</span>
						    <p>Through the platform Machine Lista delivers users with an interest in the listed products to the website of the provider. Machine Lista is not obligated to provide either the services or functionality of its platform, nor the listing of articles of the provider on its platform, including on mobile applications.</p>
						</div>
						<div class="sItem">
							<span class="title">2. Conclusion of the Contract</span>
						    <p>The conclusion of the contract is conducted by the conclusion of the cooperation contract between Machine Lista and the provider. Herein the services, the price and the contract duration is specified. The remuneration is due independent of the delivered users making use of the products and services offered by the provider or not.</p>
						</div>
						<div class="sItem">
							<span class="title">3. Billing and Payment</span>
						    <p>For performance based products, Machine Lista provides a report, detailing the number of users visits delivered to the provider and invoices according to the fee set out in the cooperation contract plus VAT or Sales Tax (where applicable). For fix price products the invoicing will be done naming the services agreed in the cooperation contract. Machine Lista has the right to send the invoice in PDF format as a download link by email to the email address given by the provider for this purpose. The invoice is to be paid within seven working days. Machine Lista also has the right to carry out weekly invoicing. Payments of the provider must be paid by wire transfer into one of the Equipio's bank accounts named on the invoice or through Paypal.</p>
						</div>
						<div class="sItem">
							<span class="title">4. Obligation of Provision of Information by the Provider</span>
						    <p>For the up-to-date display of articles to the users by Machine Lista, the provider will provide Machine Lista on a regular basis with the information described below. The format of the information here for shall be according to the specifications agreed in the cooperation contract (CSV-Files, FEED, Software-API, Scraping of the provider’s website, etc.). At least following information shall be provided by the provider: Title, Description, Manufacturer, and Model.</p>
						</div>
						<div class="sItem">
							<span class="title">5. De-Listing</span>
						    <p>Machine Lista can also by request of the provider remove the article listings of the provider (hereafter referred to as “de-listing”). This does not release the provider from the remuneration agreed in the cooperation contract. The provider can request the de-listing exclusively in writing with notice of the next working day, where Saturday is not considered as a working day. It should be noted that clearing or deleting of information by the provider himself will not lead to de-listing. Machine Lista itself at any time has the right to de-list the information of the provider.</p>
						</div>
						<div class="sItem">
							<span class="title">6. Rights of Usage</span>
						    <p>The provider is to provide Machine Lista with logos, brands, product pictures, videos and other written or graphic representation, which serves as identification of the provider or its articles, in particular for the graphic identification of the websites of the provider linked from Machine Lista, and hereby grants Machine Lista, particularly with respect to all existing intellectual property rights, the temporally and spatially unrestricted right of usage.  The provider releases Machine Lista from any liability to third parties, originating through the use of the texts, product information, product images, logos, brands and other written or graphic representations provided by the provider.  The provider is not permitted to copy the product description or data represented on the platform, or to duplicate, distribute or make this information publicly available on its websites and websites of any other connected company.</p>
						</div>
						<div class="sItem">
							<span class="title">7. Duration of the Contract</span>
						    <p>The duration of the contract is specified in the cooperation contract. If not terminated within the notice period specified in the cooperation contract, the duration of the cooperation contract automatically extends for 12 months. For automatically extended contracts the notice period is at two months towards the end of the month. The right of termination without notice remains unchanged, if there is good cause. Good cause may be if a user complains to Machine Lista about the order processing through the provider and the provider does not satisfy the user within 48 hours and the user provides evidence of this to Machine Lista. The termination must be provided in writing to be valid. As soon as listing of articles ceases, there will be no further performance-based costs arising.</p>
						</div>
						<div class="sItem">
							<span class="title">8. Liability</span>
						    <p>Both parties run their websites independently of each other and are solely technically responsible, legally responsible and responsible for the content of their respective websites. Machine Lista does not guarantee the behavior of the Users. In particular, Machine Lista carries no liability for any damage caused to the provider by the User. Likewise, Machine Lista does not guarantee sales or success through the Users brought to the website of the provider by Machine Lista. The provider releases Machine Lista from all demands of third parties, which in particular arise as a result of the graphical, content or technical design of the website and the products, services, information or other content displayed or accordingly not displayed. The provider shall at all times exempt Machine Lista from liability for a breach of contractual obligation, assurance or guarantee that the provider has provided a third party with as a part of the execution of this Contract.</p>

						    <p>The liability of Machine Lista in connection with this agreement is excluded - regardless of the legal grounds. This does not apply if the damage is caused with intent or out of gross negligence on the part of Machine Lista, their legal representatives or vicarious agents or if a contractual obligation is breached by one of these. The liability is furthermore not excluded from damage resulting from injury to life, body or health. Where Machine Lista is excluded from liability, the personal liability of employees, representatives or agents of Machine Lista is also excluded.</p>

						    <p>As a service provider Machine Lista is responsible for its own content on these pages, however Machine Lista as a service provider is not obliged to monitor transmitted or stored foreign information or to investigate circumstances, which refer to an illegal activity. Obligations to remove or block the use of information under the general laws remain unaffected. However, a relevant liability is only possible from the date of knowledge of a concrete infringement. Upon notification of such violations, we will remove the content immediately.</p>
						</div>
						<div class="sItem">
							<span class="title">9. Final Provisions</span>
						    <p>Should one of the conditions of this agreement become invalid or unenforceable, the validity of the rest of the agreement remains unaffected. In the case of invalid or unenforceable contractual clauses, the parties will agree a provision which comes as close to the original cost as possible. Australian law exclusively applies. Alterations or limitations to this agreement must be made in writing to be valid. This also applies to the above Written Form clause. <br>
							Place of fulfillment and exclusive place of jurisdiction for claims in connection with the performance of this contract is the location of Machine Lista (Australia).</p>
						</div>
					</div>

					<?php
						the_content();
					?>
				</div>
			</div>
		</div>
	</div>

	<!-- // Footer top border -->
	<div class="fullWidth_wrapper">
		<div class="footer_top_border">
			<?php get_template_part( 'template-parts/universalFooterBorder' ); ?>
		</div>
	</div>

	<!-- //  -->
	<!-- <div class="fullWidth_wrapper">
		<div class="site_container">
			
		</div>
	</div> -->

	<!-- // Footer -->
	<?php get_footer(); ?>

	<?php wp_footer(); ?>
</body>
</html>