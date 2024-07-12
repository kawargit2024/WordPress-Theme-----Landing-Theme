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
	  <div class="container post-area-wrapper">				
		<div class="row post-content-wrapper">	
			<div class="col-md-12 text-center">			
			   <div class="content">
				   <h1 class="notfoundpage-title blog-title"><?php esc_html_e('404','landing');?></h1>
		         <hr class="hrborder">
				   <div class="pdt-50"></div>	
					<div class="post-content">
					  <h2 class="error-massage"><?php esc_html_e('OOP! Page Not Found !!','landing'); ?></h2>
					</div>	
					<div class="pdt-20"></div>		
               <a class="backToHomeBtn" href="<?php echo ( esc_url(home_url('/')));?>">
               	<?php esc_html_e('Back To Home','landing');?>	               			
               </a>					
				</div>	
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