<?php get_header(); ?> 

<table> <?php

$prevYear = 2000;
if (is_home()) :

	$cat_id = get_cat_ID('personal');
	query_posts('cat=-' . $cat_id);

	// if (have_posts()) :

		while (have_posts()) : the_post();

			if ( !in_category('personal') )  { ?>

				<tr>
				<?php $dateString = get_the_date('M j'); ?>
				<?php $currentPostYear = get_the_date('Y'); ?>
					<td class="post-year-cell"><h3 class="post-year"><?php if ($prevYear != $currentPostYear) { echo $currentPostYear; }?>
						</h3></td>
					<td class="post-date-cell"><h3 class="post-date"><?php echo strtoupper($dateString); ?></h3></td>
					<td class="post-title-cell"><h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></td>
				</tr>
				<?php $prevYear = $currentPostYear; ?>
			<?php }
		
		endwhile;

		else :
			echo '<p>No content found</p>';
	// endif;

endif;

?> </table> <?php

get_footer();

?>