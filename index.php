<?php get_header(); ?>

<?php

$catslugs = array('technology','essays','art');
$catids = get_cats_by_slug($catslugs);
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array( 'category__in' => $catids,
			'posts_per_page' => get_option(posts_per_page),
			'paged' => $paged
		 );
$query = new WP_Query( $args );

if (is_home()) :
	if ( $query->have_posts() ) : 

	$prevYear = 2000;
	$prevDay = 2000;
	?>

	<table> 
	<?php
	while( $query->have_posts() ) : $query->the_post(); ?>

		<?php 
		$dateString = get_the_date('M j');
		$currentPostYear = get_the_date('Y');
		$currentPostDay = get_the_date('M j Y'); 
		?>

		<tr>
			<td class="post-year-cell"><h3 class="post-year">
				<?php 
				if ($prevYear != $currentPostYear) { 
					echo $currentPostYear; }?>
			</h3></td>

			<td class="post-date-cell"><h3 class="post-date">
				<?php 
				if ($prevDay != $currentPostDay ) { 
					echo strtoupper($dateString); } ?>
			</h3></td>

			<td class="post-category-cell">
				<?php 
				if ( in_category('technology') ) { ?>
					<i class="fa fa-cogs fa-lg" class="main-game-icon"></i>
				<?php } ?>

				<?php 
				if ( in_category('essays') ) { ?>
					<i class="fa fa-pencil fa-lg" class="main-article-icon"></i>
				<?php } ?>

				<?php 
				if ( in_category('art') ) { ?>
					<i class="fa fa-music fa-lg" class="main-music-icon"></i>
				<?php } ?>
			</td>

			<td class="post-title-cell"><h2 class="post-title"><a href="<?php the_permalink(); ?>">
				<?php 
				the_title(); ?>
				</a></h2></td>
		</tr>

		<?php 
		$prevYear = $currentPostYear;
		$prevDay = $currentPostDay; 

	endwhile;
	?>
	</table> 

	<?php
	
	// PAGINATION
	// NOTE: The number of posts per page is set according to what is listed in Settings/Reading 
	$temp_query = $wp_query;
	$wp_query = NULL;
	$wp_query = $query;

	if ($query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
		<div class="prev-next-posts">
			<p class="prev-posts-link">
		      <?php echo get_previous_posts_link( '<<' ); 
		      // display newer posts link ?>
		    </p>
		    <p class="current-page-number"> <?php echo $paged ?>
		    </p>
		    <p class="next-posts-link">
		      <?php echo get_next_posts_link( '>>', $query->max_num_pages ); 
		      // display older posts link ?>
		    </p>
	    </div>
	<?php } 
	$wp_query = NULL;
	$wp_query = $temp_query;
	// END PAGINATION

	wp_reset_postdata();

	else :
		echo '<p>No content found</p>';

	endif;

endif;
?>

<?php get_footer(); ?>