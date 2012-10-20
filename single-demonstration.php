<?php
/**
 * Sample template for displaying single demonstration posts.
 * Save this file as as single-demonstration.php in your current theme.
 *
 * This sample code was based off of the Starkers Baseline theme: http://starkerstheme.com/
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	

	<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>

		<h2>Custom Fields</h2>	
		
		<strong>Project Images:</strong> <?php 
$my_array = get_custom_field('project_images');
foreach ($my_array as $item) {
	print $item;
}
?><br />




<?php endwhile; // end of the loop. ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>