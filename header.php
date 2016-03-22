<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php bloginfo('name'); ?></title>
	<link href='https://fonts.googleapis.com/css?family=Kreon:400,300,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Signika' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="container">
		<!-- site-header -->
		<header class="site-header">

			<div class="site-banner">

				<a href="<?php bloginfo('url'); ?>/about" class="picture-about-link">
					<img class="header-picture" 
						src="<?php bloginfo('url'); ?>/wp-content/themes/joeytheme-wp/images/profile_picture.png" 
						onmouseover="this.src='<?php bloginfo('url'); ?>/wp-content/themes/joeytheme-wp/images/profile_picture_hover.png'" 
						onmouseout="this.src='<?php bloginfo('url'); ?>/wp-content/themes/joeytheme-wp/images/profile_picture.png'">
				</a>

				<div class="site-title">
					<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
					<p class="full-name">Jose-Carlos (Joey) Peralta Laguio</p>
				</div>

			</div>

			<p class="header-blurb"><?php bloginfo('description'); ?></p>

			<nav class="site-nav">
				<?php
					$args = array(
						'theme_location' => 'primary'
					);
				?>
				<?php echo wp_nav_menu( $args ); ?>
			</nav>

		</header><!-- /site-header -->