<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title($sep = ' | ', $display='true', $seplocation ='right'); //bloginfo('title'); ?></title>

	<!-- Font Awesome 5 -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

	<!-- // Prefix JS -->
	<!-- <script src="js/prefixfree.min.js"></script> -->

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZNY7GQCYXX"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-ZNY7GQCYXX');
	</script>

	<?php wp_head(); ?>
</head>