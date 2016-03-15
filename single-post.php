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
			<h2><a href="<?php the_permalink() ?>" 
				title="<?php the_title_attribute()?>" >
				<?php the_title(); ?>
			</a></h2>
			<p class="post-content"> <?php the_content() ?> </p>
		</div> <?php 
	endwhile;
else:
	echo ('Sorry. No matching content was found.');
endif;
?>

<?php get_footer(); ?>