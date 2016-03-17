<?php get_header(); ?> 

<p class="game-icon"><i class="fa fa-gamepad fa-5x" class></i></p>

<p class="blurb-text">
I've loved playing and tinkering with games ever since I was a little kid. I was OBSESSED with creating my own worlds, spending hundreds of hours just fiddling around on the editors for different games. My journals were filled with stories of historical wars and hand-drawn pictures of hideous creatures that I had battled and then subsequently defeated. Come and join me on my journey as I fulfill my childhood dreams of making the most magical and the most original worlds that my mind can possibly come up with. Who knows... maybe you'll learn a few things as you watch me bumble and stumble around trying to make stuff work. And rest assured, even though I'll be making games, I'll be playing a lot of games too! :P
</p>

<table>
<?php
$prevYear = 2000;
$args = array( 'category_name' => 'technology' );
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