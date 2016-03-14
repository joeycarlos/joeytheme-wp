<?php get_header(); ?> 

<p class="home-blurb-name">
Hi! My name is Joey.
</p>
<p class="home-blurb-text">
Aspiring video game engineer, armchair philosopher, and overly emotional musician.
</p>

<table> <?php

if (is_home()) :

	if (have_posts()) :

		while (have_posts()) : the_post();

			if ( !in_category('personal') )  { ?>
				<tr>
				<?php $dateString = get_the_date('M j'); ?>
					<td class="post-date-cell"><h3 class="post-date"><?php echo strtoupper($dateString); ?></h3></td>
					<td class="post-title-cell"><h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></td>
				</tr>
			<?php }
		
		endwhile;

		else :
			echo '<p>No content found</p>';
	endif;

endif;

?> </table> <?php

get_footer();

?>