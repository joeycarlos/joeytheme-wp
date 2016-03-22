<?php get_header(); ?>

<?php

$catslugs = array('technology','writing','art');
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

		<table class="index-post-listing"> 
		<?php
		while( $query->have_posts() ) : $query->the_post(); ?>

			<?php 
			$dateString = get_the_date('M j');
			$currentPostYear = get_the_date('Y');
			$currentPostDay = get_the_date('M j Y'); 
			?>

			<?php
			if ($prevYear != $currentPostYear) { ?>
				<tr>
					<td class="post-year-cell"><p class="post-year">
						<?php echo $currentPostYear; ?>
					</p></td>
				</tr>
			<?php } ?>


			<tr>

				<td class="post-date-cell"><p class="post-date">
					<?php 
					if ($prevDay != $currentPostDay ) { 
						echo strtoupper($dateString); } ?>
				</p></td>

				<td class="post-category-cell">
					<?php 
					if ( in_category('technology') ) { ?>
						<i class="fa fa-cogs fa-lg" class="main-tech-icon"></i>
					<?php } ?>

					<?php 
					if ( in_category('writing') ) { ?>
						<i class="fa fa-pencil fa-lg" class="main-article-icon"></i>
					<?php } ?>

					<?php 
					if ( in_category('art') ) { ?>
						<i class="fa fa-music fa-lg" class="main-music-icon"></i>
					<?php } ?>
				</td>

				<td class="post-title-cell">
					<p class="post-title"><a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a></p>
					<p class="post-tags"><?php echo get_the_tag_list('', ', ', ''); ?></p>
				</td>
			</tr>

			<?php 
			$prevYear = $currentPostYear;
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
		echo '<p>No content found</p>';

	endif;

endif;
?>

<?php get_footer(); ?>