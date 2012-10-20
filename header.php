<html class="no-js">

<head profile="http://gmpg.org/xfn/11">
    <title><?php
        if ( is_single() ) { single_post_title(); }
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }
        elseif ( is_page() ) { single_post_title(''); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { bloginfo('name'); wp_title('|'); get_page_number(); }
    ?></title>
	
<!-- 	 Make view viewport looks right on mobile devices -->
	 <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	   
	<!-- *** JQuery *** -->
	 	<!-- 	Import local jquery -->
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.7.min.js"></script>
	
		<!-- TYPE KIT embed code -->
	<script type="text/javascript" src="http://use.typekit.com/sdc3bhq.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	
	<!-- 	Import fitvids -->
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/fitvids/jquery.fitvids.js"></script>
	
	<!-- 	Import custom scripts -->
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/scripts.js"></script>

    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
 
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
 
  	<!-- 	Import modernizr after stylesheets-->
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/modernizr-2.5.3.js"></script>

    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
 
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'your-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'your-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

 <?php wp_head(); ?> <!-- This adds space in top of firefox when you are logged in as editor -->

</head>

<?php if ( is_home() || is_front_page() ) { ?>
	<body class="home">
<?php } else { ?>
	<body class="interior">
<?php } ?>
<div id="header" class="clearfix">
	<!-- BRANDING -->
	<div id="branding">
		<?php $blog_title = get_bloginfo('name'); ?>
		<?php $desc = get_bloginfo('description'); ?>
		<?php if ( is_home() || is_front_page() ) { ?>
			<h1 id="site-name" class="front-page"><?php echo $blog_title?><span class="blog-description"><?php echo " " . $desc; ?></span></h1> 
		<?php } else { ?>
			<h1 id="site-name"><a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo('name' ) ?>" 
				rel="home" class="site-title"><?php echo $blog_title; ?><span class="blog-description"><?php echo " " . $desc; ?></span></a></h1>
		<?php } ?>
	</div><!-- #branding -->
</div><!-- #header -->
<div id="wrapper" class="hfeed">
	<div id="page">
 

 