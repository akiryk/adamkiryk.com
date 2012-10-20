<?php get_header(); ?>

<div id="main" class="home-page"> <!-- main covers all the content below heading and above footer (content, sidebar)-->  
<!-- Container and then Content divs are in header.php -->
	
<!-- ************************************************** -->

	<?php /* The Loop — with comments! */ ?>

	<?php $counter = 0; /* track the first post to style it differently */ ?> 
	
	<?php while ( have_posts() ) : the_post() ?>

<!-- ****** ONLY DISPLAY POSTS THAT HAVE AN IMAGE AND THAT ARE FROM DESIRED CATEGORIES ******* -->
<!-- Set selected categories to disply in functions.php under 'display_category()' -->

	<?php if (has_post_thumbnail()){ ?>
<!-- ****************************************************** -->

<!-- ******************  INDEX: THE POST  ************************ -->
	
	<!-- 	Use a different class depending on post type -->
	<?php 
	if (++$counter > 1):
			$classes = "article ";
	else:
		$classes = "article first ";
	endif;

	$categories = get_the_category();
	
	foreach ($categories as $category) {
		switch($category->cat_name){
			case 'News':
				$classes .= "news ";
				break;
			case 'Politics':
				$classes .= "politics ";
				break;
			default:
				break;
		}
	}
	// $posttype = get_post_type( $post->ID );
	//  
	// $type = "";
	// if ($posttype == "portfolio-item"){
	// 	$classes .= "portfolio-item ";
	// 	$type = "Portfolio";
	// } else if ($posttype =="gallery") {
	// 	$classes .= "gallery ";
	// } else {
	// 	$classes .= "post ";
	// } 
	
	$classes .= "post ";
	?>

<div class="<?php echo $classes ; ?>"> <!-- e.g. 'article post masonry ' -->
	<div class="article-shadow"></div>

<!-- THE IMAGE -->
	<div class="article-inner">
		<?php if (has_post_thumbnail()){ ?>
			<div class="primary-image">
				<a class="image-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
					<?php the_post_thumbnail('agg-page'); ?>
				</a>
			</div>
		<?php } ?>
	</div><!-- article-inner -->

<!-- * THE TEXT DESCRIPTION * -->
		<a class="post-title" href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'your-theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
			<span class="title"><?php the_title(); ?></span>
			<span class="description"><?php the_excerpt(); ?> </span>
		</a>


<!-- **************  CLOSE THE POST  ************************* -->	
</div><!-- post class -->

<!-- ******* CLOSE IF STATEMENT ******* -->
	<?php } // end if post has a thumbnail image ?>
 	<?php // end the loop through posts ?>
<?php endwhile; ?>

<!-- ************************************************** -->

 </div><!-- #main -->

<!-- NEXT/PREVIOUS NAVIGATION -->

	<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
		<div id="nav-below" class="navigation">
			
	    	<div class="nav-previous">
				<?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'your-theme' )) ?>
			</div> <!-- .nav-previous -->
			
	        <div class="nav-next">
				<?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'your-theme' )) ?>
			</div>  <!-- .nav-next -->
	   </div><!-- #nav-below -->
	<?php } ?>

<!-- ************************************************** -->

<?php get_footer(); ?>