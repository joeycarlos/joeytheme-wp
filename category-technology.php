<?php get_header(); ?> 

<p class="game-icon"><i class="fa fa-cogs fa-5x" class></i></p>

<!-- Category Description Output -->
<div class="category-description">
  <?php echo category_description(); ?>
</div>


<?php
$prevYear = 2000;
$prevDay = 2000;

$catslugs = array('technology');
$catids = get_cats_by_slug($catslugs);

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args = array( 'category__in' => $catids,
			'posts_per_page' => get_option(posts_per_page),
			'paged' => $paged
		 );

$query = new WP_Query( $args );

if ( $query->have_posts() ) : ?>
<table>
<?php
while( $query->have_posts() ) : $query->the_post(); ?>
	<tr>
		<?php $dateString = get_the_date('M j'); ?>
		<?php $currentPostYear = get_the_date('Y'); ?>
		<?php $currentPostDay = get_the_date('M j Y'); ?>
		<td class="post-year-cell"><h3 class="post-year"><?php if ($prevYear != $currentPostYear) { echo $currentPostYear; ?><?php }?></h3></td>		
		<td class="post-date-cell">
			<h3 class="post-date"><?php if ($prevDay != $currentPostDay ) { echo strtoupper($dateString); } ?></h3>
		</td>
		<td class="post-title-cell">
			<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</td>
	</tr>
	<?php $prevYear = $currentPostYear; ?>
	<?php $prevDay = $currentPostDay; ?>
<?php endwhile; ?>

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

?>


<?php get_footer(); ?>