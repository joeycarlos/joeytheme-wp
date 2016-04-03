<?php get_header(); ?> 

<div class="category-icon">
	<?php if (is_category('writing')) { ?>
		<p class="tech-icon"><i class="fa fa-pencil fa-5x" class></i></p>

	<?php } elseif (is_category('tech')) { ?>
		<p class="article-icon"><i class="fa fa-gamepad fa-5x" class></i></p>

	<?php } elseif (is_category('health')) { ?>
		<p class="music-icon"><i class="fa fa-heartbeat fa-5x" class></i></p>

	<?php } elseif (is_category('art')) { ?>
		<p class="music-icon"><i class="fa fa-paint-brush fa-5x" class></i></p>

	<?php } elseif (is_category('music')) { ?>
		<p class="music-icon"><i class="fa fa-music fa-5x" class></i></p>

	<?php } ?>
</div>

<!-- Category Description Output -->
<div class="category-description">
	<?php echo category_description(); ?>
</div>

<?php

if (is_category('writing')) {
	$catslugs = array('writing');
} elseif (is_category('tech')) {
	$catslugs = array('tech');
} elseif (is_category('health')) {
	$catslugs = array('health');
} elseif (is_category('art')) {
	$catslugs = array('art');
} elseif (is_category('music')) {
	$catslugs = array('music');
} elseif (is_category('personal')) {
	$catslugs = array('personal');
} else {
	echo "Not a valid category. Returning all posts";
	$catslugs = array('writing','tech','health','art','music');
}

$catids = get_cats_by_slug($catslugs);
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array( 'category__in' => $catids,
			'posts_per_page' => get_option(posts_per_page),
			'paged' => $paged
		 );

$query = new WP_Query( $args );

if ( $query->have_posts() ) : ?>

	<table class="category-post-listing">

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

else : ?>

	<p class="empty-category-msg"> 
		Posts coming soon!
	</p>

<?php
endif;
?>

<?php get_footer(); ?>