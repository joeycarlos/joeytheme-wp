<?php get_header(); ?> 

<p class="game-icon"><i class="fa fa-cogs fa-5x" class></i></p>

<!-- Category Description Output -->
<div class="category-description">
  <?php echo category_description(); ?>
</div>

<table>
<?php
$prevYear = 2000;
$prevDay = 2000;

$catslugs = array('technology');
$catids = get_cats_by_slug($catslugs);
$args = array( 'category__in' => $catids );

$query = new WP_Query( $args );

if ( $query->have_posts() ) :

while( $query->have_posts() ) : $query->the_post(); ?>
	<tr>
		<?php $dateString = get_the_date('M j'); ?>
		<?php $currentPostYear = get_the_date('Y'); ?>
		<?php $currentPostDay = get_the_date('M j Y'); ?>
		<td class="post-year-cell"><h3 class="post-year"><?php if ($prevYear != $currentPostYear) { echo $currentPostYear; ?><?php }?></h3></td>		
		<td class="post-date-cell">
			<h3 class="post-date"><?php if ($prevDay != $currentPostDay ) { echo strtoupper($dateString); } ?></h3>
		</td>
		<td class="post-title-cell">
			<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</td>
	</tr>
	<?php $prevYear = $currentPostYear; ?>
	<?php $prevDay = $currentPostDay; ?>
<?php endwhile;
wp_reset_postdata();

else :
	echo '<p>No content found</p>';

endif;

?>
</table>

<?php get_footer(); ?>