<?php

get_header();

?> 

ARTICLES CATEGORY PAGE

<ul>
<?php

$args = array( 'category_name' => 'articles' );
$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	<li>
		<a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
	</li>

<?php endforeach;
wp_reset_postdata();

?>
</ul>

<?php

get_footer();

?>