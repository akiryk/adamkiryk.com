<?php get_header(); ?>
<?php //Single page template for posts; ?>
<!-- Container and then Content divs are in header.php -->
 <div id="content-container" class="single"> 
 	<!-- main covers all the content below heading and above footer (content, sidebar)-->  

<!-- **************  SINGLE: THE POST  ************************* -->

	<div id="post-<?php the_ID(); ?>" class="single-article" >
		<div class="article-inner">	
			<?php the_post(); ?>

	        <h2><?php the_title(); ?></h2>

	        <div class="post-meta">
	       		<?php
       			$post_id = get_the_ID();  
	       		$created_date = get_post_meta($post_id, creation_date, true); 
	       		if ($created_date != null){
	       			echo "<span class='prepended-text'>Created </span>" . $created_date;
	       		} else {
	       			echo "<span class='prepended-text'>Posted </span>";
	       			the_time( get_option( 'date_format' ) );
	       		}
	       		?>
          </div>	

			<?php if (has_post_thumbnail()){
				// display 'featured image' here is desired
				// the_post_thumbnail('fullsize');
		 	} ?>

			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>
			</div><!-- .entry-content -->

	    </div><!-- .article-inner -->                                                                                                           
	</div><!-- #post-<?php the_ID(); ?> -->           

<!-- **************  NAV BELOW  ************************* -->
		<div id="nav-below" class="navigation">
			
			<div class="nav-previous">
				<?php previous_post_link( '%link', '<span class="meta-nav">&laquo; Previous: </span> %title' ) ?>
			</div>
			
			<div class="nav-next">
				<?php next_post_link( '%link', '<span class="meta-nav">Next: </span> %title <span class="meta-nav">&raquo;</span>' ) ?>
			</div>
			
		</div><!-- #nav-below -->

	</div><!-- #content -->
     
</div><!-- #container -->
<script>
  $(document).ready(function(){
    // Target your .container, .wrapper, .post, etc.
    $("iframe").fitVids();
  });
</script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>