<?php get_header(); ?> 

<h2 class="tag-page-title"> Tagged with: <?php echo single_tag_title(); ?></h2>

<?php

$tag = get_queried_object();
$tag = $tag->slug;
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array( 'tag' => $tag,
			'posts_per_page' => get_option(posts_per_page),
			'paged' => $paged
		 );

$query = new WP_Query( $args );

if ( $query->have_posts() ) : ?>

	<table class="tag-post-listing">

	<?php

	$prevYear = 2000;
	$prevDay = 2000;

	while( $query->have_posts() ) : $query->the_post(); ?>

		<?php $dateString = get_the_date('M j'); ?>
		<?php $currentPostYear = get_the_date('Y'); ?>
		<?php $currentPostDay = get_the_date('M j Y'); ?>

		<?php
		if ($prevYear != $currentPostYear) { ?>
			<tr>
				<td class="post-year-cell"><p class="post-year">
					<?php echo $currentPostYear; ?>
				</p></td>
			</tr>
		<?php } ?>

		<tr>
			<td class="post-date-cell">
				<p class="post-date"><?php if ($prevDay != $currentPostDay ) { echo strtoupper($dateString); } ?></p>
			</td>

			<td class="post-category-cell">
					<?php 
					if ( in_category('writing') ) { ?>
						<i class="fa fa-pencil fa-lg"></i>
					<?php } ?>

					<?php 
					if ( in_category('tech') ) { ?>
						<i class="fa fa-gamepad fa-lg"></i>
					<?php } ?>

					<?php 
					if ( in_category('health') ) { ?>
						<i class="fa fa-heartbeat fa-lg"></i>
					<?php } ?>

					<?php 
					if ( in_category('art') ) { ?>
						<i class="fa fa-paint-brush fa-lg"></i>
					<?php } ?>	

					<?php 
					if ( in_category('music') ) { ?>
						<i class="fa fa-music fa-lg"></i>
					<?php } ?>
			</td>

			<td class="post-title-cell">
				<p class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
				<p class="post-tags"><?php echo get_the_tag_list('', ', ', ''); ?></p>
			</td>
		</tr>

		<?php $prevYear = $currentPostYear;
		$prevDay = $currentPostDay;

	endwhile; 
	?>
	</table>

	<?php
	
	$temp_query = $wp_query;
	$wp_query = NULL;
	$wp_query = $query;

	if ($query->max_num_pages > 1) : 
	?>
		<div class="prev-next-posts">
			<p class="prev-posts-link">
		      <?php echo get_previous_posts_link( '<<' ); ?>
		    </p>

		    <p class="current-page-number">
		    	<?php echo $paged ?>
		    </p>

		    <p class="next-posts-link">
		      <?php echo get_next_posts_link( '>>', $query->max_num_pages ); ?>
		    </p>
	    </div>

	<?php 
	endif;

	$wp_query = NULL;
	$wp_query = $temp_query;

	wp_reset_postdata();

else :
	echo '<p>Posts for this tag coming soon!</p>';

endif;
?>

<?php get_footer(); ?>