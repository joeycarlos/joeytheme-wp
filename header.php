<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width">
		<title><?php bloginfo('name'); ?></title>
		<link href='https://fonts.googleapis.com/css?family=Kreon:400,300,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Signika' rel='stylesheet' type='text/css'>
		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>

	<div class="container">

		<!-- site-header -->
		<header class="site-header">
			<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>

			<nav class="site-nav">
				<?php
					$args = array(
						'theme_location' => 'primary'
					);
				?>
				<?php wp_nav_menu( $args ); ?>
			</nav>

			<br><br><br><br><br>

		</header><!-- /site-header -->