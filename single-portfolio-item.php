<?php
/**
 * Sample template for displaying single portfolio-item posts.
 * Save this file as as single-portfolio-item.php in your current theme.
 *
 * This sample code was based off of the Starkers Baseline theme: http://starkerstheme.com/
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
  <h1><?php the_title(); ?></h1>
  
	<?php if($post->post_excerpt): ?>
		<div class="excerpt">
			<?php the_excerpt(); ?>
		</div> 
	<?php endif; ?>
			
	<?php if($post->post_content): ?>
		<div class="post-content">
			<?php the_content(); ?>
		</div>
	<?php endif; ?>
	
	<?php if (has_post_thumbnail()): ?>
		<div class="featured_image">
			<?php the_post_thumbnail('medium'); ?>
		</div> 
	<?php endif; ?>

  <?php 
		$array_of_posts = get_custom_field('related_projects:to_array');
		if (!empty($array_of_posts)){
			echo "<div class='related'>";
			echo "<h3>Related Content</h3>";
			foreach ($array_of_posts as $post_id) {
				if (has_post_thumbnail( $post_id ) ):
					$image = get_post_thumbnail_id( $post_id ); 
					echo wp_get_attachment_image($image,'index-post-thumb');
				endif;
			  echo "<br />";
		    print CCTM::filter($post_id, 'to_link');
			}
			echo "</div>";
		}
		?>

<br />
		<strong>Project Images:</strong><br />

<?php 
	$array_of_images = get_custom_field('project_images:to_array');
	foreach ($array_of_images as $img_id) {
	   print CCTM::filter($img_id, 'to_image_tag');
	}
?>

<?php endwhile; // end of the loop. ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>