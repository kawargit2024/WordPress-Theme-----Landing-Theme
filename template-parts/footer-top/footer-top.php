<?php
/*
* Footer top
*/ 
?>

<div class="pdt-80"></div>
<section class="footer-top-area section-padding-50">
	<div class="container">
		<div class="row text-left">			
			<div class="col-md-4 single-widget-box wow fadeIn">
			   <div class="footer-logo">
                <?php if( function_exists('Kirki')  && get_theme_mod('footer_logo_settings')){ ?>
				  <a href="<?php echo ( esc_url(home_url('/')) );?>">
				  	<img src="<?php echo ( esc_url ( get_theme_mod('footer_logo_settings') ) );?>" alt="<?php esc_attr_e('FooterLogo','landing');?>" />
				  </a>
                <?php } ?>
				</div>

				<!--footer-logo -->

				<ul class="list-unstyled list-inline footer-social-media">

               <?php $fsocialIcons =  get_theme_mod("footer_icons_setting");
               	   if( !empty ( $fsocialIcons ) ):
	                  foreach( $fsocialIcons as $icon ):?>

		               <li>
								<a href="<?php echo esc_url ( $icon );?>">
									<i class="fa-brands fa-<?php echo esc_html ( $icon );?>"></i>
								</a>
							</li> 

	                <?php endforeach; ?>
               <?php endif; ?>
               
				</ul>

				<!--footer-social-media -->

			</div>
			<!--  single-widget-box -->	
			<div class="col-md-4 single-widget-box wow fadeIn">
				<h1 class="widget-title"> <?php esc_html_e('Latest Post','landing'); ?> </h1>
				<hr class="f-divider">
				<ul class="list-inline latest-post">

					<?php if(class_exists('Kirki') && get_theme_mod('recent_posts_setting')):
                      
              $recent_post = get_theme_mod('recent_posts_setting',5);
              // print_r($recent_post);
              
              $latest_posts = new WP_Query(array(
                 'post_type'=>'post',
                 'posts_per_page'=>$recent_post,
              ));

              while($latest_posts->have_posts()): $latest_posts->the_post();
					?>
					<li>
						<a href="<?php esc_attr ( the_permalink());?>">
							<i class="fas fa-long-arrow-right"></i>
							<?php echo ( esc_html ( get_the_title()) );?>
					    </a>
				    </li>
            <?php 
               wp_reset_postdata();
               endwhile;endif; 
            ?>
				</ul>
				<!-- ul -->
			</div><!-- single-widget-box -->
			<div class="col-md-4 single-widget-box wow fadeIn">
				<h1 class="widget-title"> <?php esc_html_e('Flickr Gallery','landing'); ?>  </h1>
				<hr class="f-divider">
				<ul class="flickrPhotos" id="photo-gallery"></ul>
			</div><!-- single-widget-box -->				
		</div><!-- /.row -->			
	</div><!-- /.container -->		
</section><!-- footer-top-area -->	
