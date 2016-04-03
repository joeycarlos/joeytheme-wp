<?php get_header();

global $post;
$slug = get_post( $post )->post_name;
$query = new WP_Query( array('name' => $slug) );

if ( $query->have_posts() ) :

	while ( $query->have_posts() ) : $query->the_post(); ?>

		<div class="post">
			<div class="post-banner">
				<h2 class = "post-page-title"><a href="<?php the_permalink() ?>" 
					title="<?php the_title_attribute()?>" >
					<?php the_title(); ?></a>
				</h2>

				<?php if ( in_category('writing') ) { ?>
					<i class="fa fa-pencil fa-lg"></i>
					<?php } ?>

				<?php if ( in_category('tech') ) { ?>
					<i class="fa fa-gamepad fa-lg"></i>
					<?php } ?>

				<?php if ( in_category('health') ) { ?>
					<i class="fa fa-heartbeat fa-lg"></i>
					<?php } ?>

				<?php if ( in_category('art') ) { ?>
					<i class="fa fa-paint-brush fa-lg"></i>
					<?php } ?>

				<?php if ( in_category('music') ) { ?>
					<i class="fa fa-music fa-lg"></i>
					<?php } ?>

				<p class="post-page-date">
					<?php the_date('Y M j - g:i A'); ?>
				</p>

				<p class="post-page-tags"><?php echo get_the_tag_list('Tags: ', ', ', ''); ?></p>
			</div>

			<div class="post-page-content">
				<?php the_content(); ?> 
			</div>
		</div> 

	<?php 
	endwhile;

else:
	echo ('Sorry. No matching content was found.');

endif;
?>

<?php get_footer(); ?>