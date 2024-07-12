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
		<div class="row blog-content-wrapper">				
			<div class="<?php if(function_exists('dynamic_sidebar')){
				if(is_active_sidebar('default-sidebar')){
				 echo 'col-md-8';} else { echo 'col-md-12';} }?>  text-left">	                  
					<div class="blog-left">
					<?php while( have_posts( ) ) : the_post( );?>

					<?php 
					   get_template_part('template-parts/post-formats/post'); 
					?>

					<div class="pdt-20"></div>			
				   <h2 class="blog-title"><?php the_title();?> </h2>
					<div class="pdt-10"></div>
					<hr>
           <div class="blog-post-content">

					<?php the_content( ); ?>	
					</div>
					<?php
				   endwhile;
               wp_reset_postdata();
					?>
               <div class="pdt-50"></div>

					<!-- related post -->
               <div class="row">
               <div class="col-md-12"> 
               <hr>
               <h2 class="blog-title"><?php esc_html_e('Related Posts','landing'); ?> </h2>   
               <hr>
               </div>
                 <div class="pdt-30"></div>	
               </div>	
               <div class="row">	
                  	<?php   
                  	  $related_posts = related_posts( get_the_ID(), 3 ); 
                  	?>
	                  <?php while( $related_posts->have_posts()) : $related_posts->the_post(); ?>

	                  	<div class="col-md-4">
									<div class="related-post">
										<a href="<?php the_permalink();?>">
					                 	<?php
						                 the_post_thumbnail( 'cat-thumb', array('class'=>'related-post-thumb') );               
						                 echo '<h3 class="title">' . wp_trim_words(get_the_title(), 5) . '</h3>';
						                 echo '<hr>';
						                 echo wp_trim_words(get_the_excerpt(), 20);
						                 echo '<hr>';						                 
							              $cat =  get_the_category();
							                  if(isset( $cat ) && isset ( $cat[0] ) ){
														echo '<span class="cat">'. $cat[0]->cat_name .'</span>';
							               }
									      ?>
							         </a>  
									</div>
								</div>

						   <?php  

						   endwhile;
				         wp_reset_postdata();

				         ?>

						</div>
							
						<!-- single-post -->

						<?php while( have_posts() ) : the_post();?>

						<!-- single-blog-caption -->

						<div class="pdt-50"></div>
			            <?php if(comments_open() || get_comments_number()){ ?>
 							<div class="comments-box">	
 								<?php comments_template(); ?> 
 							</div>

 							<!-- comments-template -->

			            <?php } ?>
						<div class="pdt-80"></div>
			         <?php endwhile; wp_reset_postdata();?>

			         <div class="post-pagination-wrap">

	                  <ul class="post-paniation-list">	                  	
	                    
	                 <li class="prev-post-list">
	                 	<?php 

	                 	$prev_post = get_previous_post();
	                 	if( $prev_post ){
 							$prev_post_thumb = get_the_post_thumbnail($prev_post->ID,array(150,150));
							$prev_post_label  = esc_html__('Prev Post','landing');
                        previous_post_link('%link', 
                        "<div class='img-pagi'>	                        
	                      	<div class='prev-thumb'>$prev_post_thumb</div>
	                      	<div class='prev-title'>%title</div>
	                      	<div class='prev-label'><i class='fa-solid fa-angle-left'></i> $prev_post_label</div>
                      	</div>"
                      );
	                 	} 

	                 	?>
	                 </li>

	                 <li class="next-post-list">
	                 	<?php 

	                 	$next_post = get_next_post();
	                 	if( $next_post ){
 							$next_post_thumb = get_the_post_thumbnail($next_post->ID,array(150,150));
							$next_post_label  = esc_html__('Next Post','landing');
                         next_post_link('%link', 
                        "<div class='img-pagi'>                        
	                      	<div class='next-thumb'>$next_post_thumb</div>
	                      	<div class='next-title'>%title</div>
	                      	<div class='next-label'>$next_post_label <i class='fa-solid fa-angle-right'></i></div>
                      	</div>"
                      );

	                 	}

	                 	?>
	                 </li>
	                  </ul>
			         </div>
			          
						<!-- post-pagination -->

					</div>

					<!-- blog-left --> 

				</div>

				<?php 
	            if( function_exists('dynamic_sidebar') ){  
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