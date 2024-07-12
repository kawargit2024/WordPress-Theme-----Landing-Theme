<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
  <!-- Meta Tag -->
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Security-Policy" content="block-all-mixed-content">
	<meta name="description" content="<?php bloginfo('description');?>">
	<meta name="author" content="<?php the_author_meta('display_name',1);?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body id="home" data-spy="scroll" data-target="#menubar"<?php body_class(); ?>>
<?php wp_body_open(); ?>

  <!-- START-HEADER -->

  <!--START-PRELOADER-->

  <?php 
     if(class_exists('Kirki')): if(get_theme_mod('landing_preloader')):
     	$landing_preloader =  get_theme_mod('landing_preloader');

  if(	$landing_preloader == 'home'){
		if(is_front_page()){ ?>

			<div id="preloader">
				<div id="status">
					<img src="assets/img/site-loader.gif" alt="" />
				</div>
			</div>

		<?php }
  } ?>

<?php 
endif;
endif;
?>

	<!--preloader-->
	
	<!-- END-PRELOADER -->
	
	<!-- END-HEADER -->
