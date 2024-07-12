<?php get_header();
/* Template Name: Blank Builder */

if(class_exists('Kirki')){
   do_action('landing-custom-header-display', 'landing_custom_header_display');
} else { ?>

<!-- START-HEADER -->

 <header class="default-header clearfix">    
    <!-- Navigation -->
 <?php get_template_part('template-parts/loop/nav','normal');?>

 </header>

<!-- END-HEADER -->

<?php } ?>
	
<!--START CONTENT--->	

			<?php if(have_posts()) : 
				   while(have_posts()) : the_post();
                   
				      the_content();
				 
				 endwhile;
				endif;
				wp_reset_postdata();
			?>							
		
  <!--END CONTENT--->	
	
	
	<!--START-FOOTER-TOP-AREA-->
		
	<?php  get_template_part('template-parts/footer-top/footer-top'); ?>
	
	<!-- END-FOOTER-TOP-AREA-->
	
	<!--START-FOOTER-->
	<?php get_footer(); ?>