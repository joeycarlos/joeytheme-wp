<?php get_header(); ?> 

<p class="music-icon"><i class="fa fa-music fa-5x" class></i>

<p class="blurb-text">
Ah, music... my old friend! It's always been there for me in my darkest hours - but also my brightest ones! Feel free to listen to everything I come up with. I swear that everything I'm showcasing here is my best effort at trying to share something deep, meaningful, and enjoyable with you, my dearest listener. I hope and pray that my music lifts you up, validates and consoles your deepest and darkest feelings, and transports you to another place during those moments when you might need it most. These songs are for you, friends :)
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