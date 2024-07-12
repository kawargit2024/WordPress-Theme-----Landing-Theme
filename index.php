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
<div class="container">	
	   <div class="row">
			<div class="col-md-12 text-center">			
				<div  class="section-title wow fadeIn text-center">
					<h1 class="section-heading">
                       <?php echo get_theme_mod('the_page_header_title',esc_html__('Our Blog'));?>
                    </h1>
					<hr class="divider">						
					<p class="section-title-para">
                       <?php echo get_theme_mod('the_page_header_desc',esc_html__('get regulary update latest post, news or articles and topics etc.from our blog'));?>
                    </p>
					<hr class="divider">						
					<h4 class="section-sub-heading"> 
                        <?php echo get_theme_mod('the_page_sub_header_title',esc_html__('Latest news and info'));?>
                    </h4> 
				</div><!-- section-title -->                   
			</div><!-- /.col-md-8 -->	
		</div><!--/.row-->
	</div><!--/.container-->
    <div class="pdt-80"></div>
	   <div class="container blog-area-wrapper">				
		<div class="row blog-content-wrapper">				
			<div class="<?php if(function_exists('dynamic_sidebar')){
				if(is_active_sidebar('default-sidebar')){
				 echo 'col-md-8';} else { echo 'col-md-12';} }?>  text-left">	
					<div class="blog-left">

					    <?php while(have_posts()) : the_post(); ?>

						 <?php 
						     get_template_part('template-parts/loop/loop','post');
						 ?>

						<!-- post-wrapper -->	

						<?php endwhile; 
						 wp_reset_postdata();
						 ?>	

					</div>
					<!-- blog-left --> 
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
                if( function_exists('dynamic_sidebar') ){
	                if( is_active_sidebar( 'default-sidebar' ) ){
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