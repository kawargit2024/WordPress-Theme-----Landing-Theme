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
					<?php while(have_posts()): the_post();?>
						<?php if(has_post_thumbnail()):?>
						    <?php the_post_thumbnail();?>
					   <?php endif;?>
					   <div class="pdt-30"></div>			
						<h2 class="blog-title"><?php esc_html_e('Category : ','landing') . single_cat_title();?> </h2>
						<div class="pdt-10"></div>
						<hr>
            		  <div class="blog-post-content">
            		  	<h2 class="blog-title"><?php the_title();?> </h2>
            		  	<div class="pdt-30"></div>
						  <?php the_content( );?>
						</div>
						<!-- single-blog-caption -->
						<div class="pdt-50"></div>
			            <?php if(comments_open() || get_comments_number()){ ?>
 							<div class="comments-box">	
 								<?php comments_template(); ?> 
 							</div>
			            <?php } ?>
			          <?php endwhile; wp_reset_postdata();?>
			          
						<!-- comments-list-wrapper -->							
					</div><!-- blog-left --> 
					<div class="pdt-30"></div>
                    <ul class="list-unstyled list-inline ">                   	
						<li class="post-pagination">
							<?php the_posts_pagination( array (
                        'mid_size'  => 2,
								'prev_text' => __( 'Next', 'landing' ),
								'next_text' => __( 'Prev', 'landing' ),
							) );

							 ?>
						</li>
					</ul>
					<!-- post-pagination-list -->	
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