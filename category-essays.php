<?php get_header(); ?> 

<p class="article-icon"><i class="fa fa-pencil fa-5x" class></i>

<p class="blurb-text">
Writing has always been such a natural outlet for a guy like myself. I was never a big talker when I was a kid (which hasn't really changed, to be honest), but writing allowed me to consistently communicate and share who I was with others without all the messy and scary social interactions. I write about a pretty large range of things, but you can generally expect to read exactly what you think a curious, lost, anxious, creative, dorky, too-deep-for-his-own-good and sufficiently flawed 20-something-fresh-university-grad would write...
</p>

<table>
<?php
$prevYear = 2000;
$args = array( 'category_name' => 'essays' );
$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	<tr>
		<?php $dateString = get_the_date('M j'); ?>
		<?php $currentPostYear = get_the_date('Y'); ?>
		<td class="post-year-cell"><h3 class="post-year"><?php if ($prevYear != $currentPostYear) { echo $currentPostYear; ?><?php }?></h3></td>		
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