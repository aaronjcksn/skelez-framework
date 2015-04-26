<?php 
/**
*
*	header.php
**/
 ?>

 <?php	
 	// Get the favicon
	$favicon = IMAGES . '/icons/favicon.png';

	// Get the custom touch icon
	$touch_icon = IMAGES . '/icons/apple-touch-icon-152x152-precomposed.png';
?>

 <!DOCTYPE html>
 <!-- [if IE 8 ]> <html <?php language_attributes(); ?> class="ie8"> <![endif] -->
  <!-- [if !IE ]> <html <?php language_attributes(); ?> <![endif] -->
 <html lang="en">
 <head>
 	<meta charset="<?php bloginfo( 'charset' ); ?>">
 	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
 	<meta name="description" content="<?php bloginfo( 'description' ); ?>">

 	<link rel="stylesheet" href="css/style.css">

 	<!-- Favicon and Apple Icons -->
 	<link rel="shortcut icon" href="<?php echo $favicon; ?>">
 	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo $touch_icon; ?>">


<?php wp_head(); ?>
 </head>
 <body>
 	
 </body>
 </html>