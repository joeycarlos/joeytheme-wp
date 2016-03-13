<?php

get_header();

?> 

<table>
<?php

$args = array( 'category_name' => 'media' );
$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	<tr>
		<?php $dateString = get_the_date('M j'); ?>
		<td class="post-date-cell">
			<h3 class="post-date"><?php echo strtoupper($dateString); ?></h3>
		</td>
		<td class="post-title-cell">
			<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</td>
	</tr>
<?php endforeach;
wp_reset_postdata();

?>
</table>

<?php

get_footer();

?>