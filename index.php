<?php get_header(); ?> 

<table> <?php

$prevYear = 2000;
$prevDay = 2000;

$catslugs = array('technology','essays','art');
$catids = get_cats_by_slug($catslugs);
$args = array( 'category__in' => $catids );

$query = new WP_Query( $args );

if (is_home()) :

	if ( $query->have_posts() ) :
	while( $query->have_posts() ) : $query->the_post(); ?>
		<tr>
		<?php $dateString = get_the_date('M j'); ?>
		<?php $currentPostYear = get_the_date('Y'); ?>
		<?php $currentPostDay = get_the_date('M j Y'); ?>
			<td class="post-year-cell"><h3 class="post-year"><?php if ($prevYear != $currentPostYear) { echo $currentPostYear; }?>
				</h3></td>
			<td class="post-date-cell"><h3 class="post-date"><?php if ($prevDay != $currentPostDay ) { echo strtoupper($dateString); } ?></h3></td>
			<td class="post-category-cell">
				<?php if ( in_category('technology') ) { ?>
					<i class="fa fa-cogs fa-lg" class="main-game-icon"></i>
					<?php } ?>
				<?php if ( in_category('essays') ) { ?>
					<i class="fa fa-pencil fa-lg" class="main-article-icon"></i>
					<?php } ?>
				<?php if ( in_category('art') ) { ?>
					<i class="fa fa-music fa-lg" class="main-music-icon"></i>
					<?php } ?>
			</td>
			<td class="post-title-cell"><h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></td>
		</tr>
		<?php $prevYear = $currentPostYear; ?>
		<?php $prevDay = $currentPostDay; ?>

	<?php	
	endwhile;
	wp_reset_postdata();

	else :
		echo '<p>No content found</p>';

	endif;
endif;

?> </table> <?php

get_footer();

?>