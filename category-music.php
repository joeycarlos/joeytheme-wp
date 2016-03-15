<?php get_header(); ?> 

<p class="blurb-text">
Vestibulum ullamcorper mauris at ligula. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Phasellus dolor. Etiam sit amet orci eget eros faucibus tincidunt. Praesent nec nisl a purus blandit viverra. Vestibulum ullamcorper mauris at ligula. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Phasellus dolor. 
</p>

<table>
<?php
$prevYear = 2000;
$args = array( 'category_name' => 'music' );
$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	<tr>
		<?php $dateString = get_the_date('M j'); ?>
		<?php $currentPostYear = get_the_date('Y'); ?>
		<td class="post-year-cell"><h3 class="post-year"><?php if ($prevYear != $currentPostYear) { echo $currentPostYear; }?></h3></td>
		<td class="post-date-cell">
			<h3 class="post-date"><?php echo strtoupper($dateString); ?></h3>
		</td>
		<td class="post-title-cell">
			<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</td>
	</tr>
	<?php $prevYear = $currentPostYear; ?>
<?php endforeach;
wp_reset_postdata();

?>
</table>

<?php

get_footer();

?>