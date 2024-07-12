<?php get_header();

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
	
<!--START-BLOG-AREA-->		 
<section class="blog-area section-padding section-padding-bottom-0">
    <div class="pdt-80"></div>
	   <div class="container blog-area-wrapper">				
		<div class="row blog-content-wrapper">				
			<div class="<?php if(function_exists('dynamic_sidebar')){
				if(is_active_sidebar('default-sidebar')){
				 echo 'col-md-8';} else { echo 'col-md-12';} }?>  text-left">	
					<div class="blog-left">
					<h1 class="page-title blog-title">
					   	<?php printf(esc_html__('Results for "%s"','landing'),
					   	'<span class="search-result">'. esc_html ( get_search_query() ).'</span>' );?>
					  </h1>
					  <hr>

					   <?php if(have_posts()):
      
					   while(have_posts()): the_post();
						     get_template_part('template-parts/loop/loop','post');
						endwhile;?>	

                  <?php else: ?>	
                   <p><?php esc_html_e('Opps! No result Found, Try different', 'landing');?></p>

  						<div class="searchPage">
  							<?php get_search_form(); ?>	
                  </div>

                 <?php endif;
                 wp_reset_postdata();
                 ?>

					</div><!-- blog-left --> 	
				</div>

				<?php 
            if(function_exists('dynamic_sidebar')){
                if(is_active_sidebar('default-sidebar')){
                  get_sidebar();
                }
            }
          ?>
						
	    </div><!-- row -->	
	</div><!-- blog-area-wrapper-->	
</section>	
		
	<!--END BLOG-AREA-WRAPPER -->
	
	<!--START-FOOTER-TOP-AREA-->
		
	<?php 

		get_template_part('template-parts/footer-top/footer-top');

	?>
	
	<!-- END-FOOTER-TOP-AREA-->
	
	<!--START-FOOTER-->
	
	<?php get_footer();?>