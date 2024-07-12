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
<section class="section-padding section-padding-bottom-0">
	<div class="pdt-80"></div>
		<div class="container">				
			<div class="post-content-wrapper">				
					<?php while(have_posts()): the_post();?>
					   <h1 class="page-title blog-title"><?php the_title();?></h1>
					   <hr>
						<div class="page-content post-content">
                         
						  <?php 
						      the_content();
						   ?>

						</div>	<!-- single-page-image-wrapper -->	

						<?php wp_link_pages();?>
						<!-- single-blog-caption -->
						 <?php endwhile;?>		

				</div>							
			</div><!-- row -->	
		</div><!-- single-blog-area-wrapper-->	
	</section>	
		
	<!--END SINGLE-BLOG-AREA-WRAPPER -->
	
	<!--START-FOOTER-TOP-AREA-->
		
	<?php 

	if(class_exists('Kirki')){

       do_action('landing-custom-footer-display','landing_custom_footer_display');

	 } else {

		get_template_part('template-parts/footer-top/footer-top');
		
	} ?>
	
	<!-- END-FOOTER-TOP-AREA-->
	
	<!--START-FOOTER-->
	
	<?php get_footer();?>