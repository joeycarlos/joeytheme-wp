<?php get_header(); ?> 

<?php 
$page = get_page_by_title('about');
$content = apply_filters('the_content', $page->post_content); 
echo $content;  
?>

<?php get_footer(); ?>