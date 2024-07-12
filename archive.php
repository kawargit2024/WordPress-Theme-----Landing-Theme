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
<section id="post-<?php the_ID();?>" class="blog-area section-padding section-padding-bottom-0">
		<div class="pdt-80"></div>
		<div class="container blog-area-wrapper">				
		<div class="row archive-page-content-wrap blog-content-wrapper">	
			<div class="<?php if(function_exists('dynamic_sidebar')){
				if(is_active_sidebar('default-sidebar')){
				 echo 'col-md-8';} else { echo 'col-md-12';} }?>  text-left">	                  
					<div class="archive-page blog-left">
					<h2 class="archive-title blog-title">
				     <?php echo get_the_archive_title();?> 
					</h2>	
					<hr>		
					<div class="pdt-20"></div>	
            		<div class="blog-post-content list-unstyle">
						  <?php 
								wp_get_archives( 
										array(
									   'type' => 'alpha',
										) 
							       );
								?>
						</div>


						<div class="pdt-50"></div>
						<?php while(have_posts()): the_post();?>	
						
			            <?php if(comments_open() || get_comments_number()){ ?>
 							<div class="comments-box">	
 								<?php comments_template(); ?> 
 							</div>
			            <?php } ?>
			          <?php endwhile; wp_reset_postdata();?>

			          <div class="pdt-30"></div>	
			          
						<!-- comments-list-wrapper -->							
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