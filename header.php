<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"><!--<![endif]-->

<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

	<title><?php bloginfo('name'); ?><?php wp_title(" - ",true); ?></title>

	<!-- Favicons -->
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.png" type="image/x-icon">
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-touch-icon.png" sizes="114x114">
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-touch-icon.png" sizes="72x72">
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-touch-icon.png">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
	<?php wp_head(); ?>
	
	<script>
		// JAVASCRIPT HOOK VARS
		var template_url 			= '<?php bloginfo("template_url"); ?>/';
		var front_page   			= '<?php echo is_front_page(); ?>';
		var page_name 				= "<?php global $post; echo get_post( $post )->post_name; ?>";
		var iOS 					= ( navigator.userAgent.match(/(iPad|iPhone|iPod)/g) ? true : false );
	</script>

	<!--[if lt IE 9]>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/polyfills/xbc.js"></script>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/polyfills/html5shiv.js"></script>
	<![endif]-->
	
	

</head>

<body <?php body_class();?>>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=792548270775288";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>


<!-- ==================== -->
<!--        HEADER        -->
<!-- ==================== -->
<header class="default">
		<div class="container">

			<div class="logo span2 ">
	
			</div>

			<div class="header-container span10">
				<nav class="menu header_menu omega">
					<?php wp_nav_menu( array( 
						'theme_location'  => 'header_menu', 
						'container_class' => '',
						'container'       => false, 
						'menu_class'      => 'menu-header'
					) ); ?>
				</nav>
			</div>
		

  		<div class="clear"></div>
	</div>
</header><!-- header.default.<header_class> -->