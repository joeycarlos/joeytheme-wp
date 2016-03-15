<?php get_header(); ?> 

<?php

global $post;
$slug = get_post( $post )->post_name;
$query = new WP_Query( array('name' => $slug) );

?>

<?php
if ( $query->have_posts() ) :
	while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="post">
			<div class="post-banner">
			<h2 class = "post-page-title"><a href="<?php the_permalink() ?>" 
				title="<?php the_title_attribute()?>" >
				<?php the_title(); ?>
			</a></h2>
			<?php if ( in_category('gaming') ) { ?>
				<i class="fa fa-gamepad fa-lg" class="post-page-icon"></i>
				<?php } ?>
			<?php if ( in_category('articles') ) { ?>
				<i class="fa fa-pencil fa-lg" class="post-page-icon"></i>
				<?php } ?>
			<?php if ( in_category('music') ) { ?>
				<i class="fa fa-music fa-lg" class="post-page-icon"></i>
				<?php } ?>
			<p class="post-page-date">
				<?php the_date('Y M j'); ?>
			</p>

			</div>

			<?php the_content(); ?> 
		</div> <?php 
	endwhile;
else:
	echo ('Sorry. No matching content was found.');
endif;
?>

<?php get_footer(); ?>