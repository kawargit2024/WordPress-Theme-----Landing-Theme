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
        

<?php while (have_posts()) : the_post(); ?>
        	
<!--START SINGLE-WORK-->

  <section class="worksajax clearfix section-padding">    
      <div class="container main-wrapper text-center">
      <div class="row gallery-item-list">
         <div class="col-md-10 offset-md-1 col-xs-12 offset-xs-0">

          <!-- Single Image Portfolio --> 
          <?php if( get_post_meta( get_the_ID(),'portfolio_options', true ) == 'image_port'):?>         
          <img class="img-responsive" src="<?php
            echo $portfolio_single_image = get_post_meta(get_the_ID(),'single_image_port', 'full') ?  get_post_meta(get_the_ID(),'single_image_port', 'full') : get_the_post_thumbnail_url();

         ?>" alt="<?php esc_html_e('Add Image','landing_plugin');?>" />
         <?php endif;?> 

           <!-- Youtube Video --> 
          <?php if( get_post_meta( get_the_ID(),'portfolio_options', true ) == 'yt_vid_port'):?>
          <div id="<?php echo rand('14576','25896');?>" class="embed-video">
            <iframe width="100%" height="500" src="https://www.youtube.com/embed/<?php echo $portfolio_yt_video = get_post_meta(get_the_ID(),'single_yt_port', true ) ? get_post_meta(get_the_ID(),'single_yt_port', true ) : 'LOSxFOcCKLs';?>" frameborder="0"></iframe>
          </div>
           <?php endif;?> 

          <!-- Vimeo Video -->
          <?php if( get_post_meta( get_the_ID(),'portfolio_options', true ) == 'vim_vid_port'):?>
          <div id="<?php echo rand('25872','14783');?>" class="embed-video">
            <iframe title="vimeo-player" width="100%" height="500" src="https://player.vimeo.com/video/<?php echo $single_vim_port = get_post_meta(get_the_ID(),'single_vim_port', true ) ? get_post_meta(get_the_ID(),'single_vim_port', true ) : '';?>" frameborder="0"></iframe>
          </div>
          <?php endif;?> 

          <!-- Audio -->
          <?php if( get_post_meta( get_the_ID(),'portfolio_options', true ) == 'audio_port'):?> 
          <div id="<?php echo rand('25871','14784');?>" class="port-audio">
            <iframe width="100%" height="200" scrolling="no" frameborder="no" allow="autoplay" 
              src="<?php echo $port_audio = get_post_meta( get_the_ID(),'single_audio_port', true ) ? get_post_meta( get_the_ID(),'single_audio_port', true ) : ''; ?>">
            </iframe>
          </div>

        <?php endif;?> 
        </div><!-- /.col-md-10 offset-md-1 col-xs-12 offset-xs-0-->
      
        <!-- Slider Image -->
        <?php if( get_post_meta( get_the_ID(),'portfolio_options', true ) == 'slider_port'):?>
        <div class="col-md-10 offset-md-1 col-xs-12 offset-xs-0">
            <div id="portSlider" class="carousel slide carousel-fade carousel-dark" data-bs-ride="carousel">
                <div id="post-<?php echo rand('2581','3698');?>" class="carousel-inner">
                  <?php
                    $i=0;
                    $portfolioSliders   =  get_post_meta(get_the_ID(),'single_slider_port', true);
                     foreach($portfolioSliders as $portfolioSlider):
                    $i++;
                  ?>
                  <div class="carousel-item <?php if( $i==1 ){ echo "active"; } else { echo ""; }?>">
                    <img src="<?php echo esc_url($portfolioSlider);?>" class="d-block w-100" alt="<?php esc_html_e('slider','lanlding_plugin');?>">
                  </div>
                  <?php endforeach;?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#portSlider" data-bs-slide="prev">
                 <i class="fa-solid fa-chevron-left fa-xl"></i>
                  <span class="visually-hidden"><?php esc_html_e('Previous','lanlding_plugin');?></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#portSlider" data-bs-slide="next">
                  <i class="fa-solid fa-chevron-right fa-xl"></i>
                  <span class="visually-hidden"><?php esc_html_e('Next','lanlding_plugin');?></span>
                </button>
                <div class="carousel-indicators">
                  <?php for ( $x=0; $i>$x; $x++ ){ ?>
                    <button type="button" data-bs-target="#portSlider" data-bs-slide-to="<?php echo $x;?>" 
                      class="<?php if($x==0){ echo 'active';} ?>" aria-current="<?php if($x==0){ echo 'true';}?>" 
                      aria-label="Slide <?php echo $x;?>">
                    </button>
                  <?php  } ?>
                </div>
            </div><!-- sliders -->
        </div><!-- /.col-md-10 offset-md-1 col-xs-12 offset-xs-0-->
        <?php endif;?> 
        
        <!-- Gallery Portfolio -->
        <?php if( get_post_meta( get_the_ID(),'portfolio_options', true ) == 'gallery_port'):?>
          <?php
             $portfolio_gallery_image = get_post_meta( get_the_ID(),'single_gallery_port', true ); 
            foreach($portfolio_gallery_image as $gallery_image):
          ?>
          <div class="col-md-3 col-sm-6 col-xs-12 no-padding">
            <figure class="single-gallery-item">
               <img class="hover-img img-responsive" src="<?php echo esc_url($gallery_image,'full'); ?>" alt="">
               <figcaption class="single-gallery-caption">
                <a class="fancybox image" title="sample-image1" href="<?php echo esc_url($gallery_image,'full'); ?>">
                 <i class="fas fa-search-plus"></i>
                </a>
              </figcaption><!-- single-gallery-caption -->    
            </figure><!-- single-gallery-item -->   
          </div><!-- col-md-3 --> 
          <?php endforeach;?> 

           <?php endif;?> 

           <?php if( get_post_meta( get_the_ID(),'portfolio_options', true ) == 'custom_port'):?>

           <!-- Custom Portfolio -->
           <div class="col-md-10 offset-md-1 col-xs-12 offset-xs-0">
            <img class="img-responsive" src="<?php
            echo $custom_port = get_post_meta(get_the_ID(),'single_custom_port', 'full') ?  get_post_meta(get_the_ID(),'single_custom_port', 'full') : get_the_post_thumbnail_url();

               ?>" alt="<?php esc_html_e('Add Image','landing_plugin');?>" /> 
          </div>

           <?php endif;?>

        <div class="pdt-50"></div>
        <div class="col-md-10 offset-md-1 col-xs-12 offset-xs-0">

          <ul class="list-styled inline-block"> 
            <li>
              <a href="#" class="page-close-link"><i class="fa-solid fa-xmark"></i></a>
            </li>
            <li>
              <a href="<?php echo esc_url ( get_post_meta(get_the_ID(),'go_to_site_link',true));?>" class="go-site-link"> <?php echo get_post_meta(get_the_ID(),'go_to_site_title_text',true )?> </a>
            </li>

          </ul>
          <h1 class="work-name-title"> 
            <?php echo ucwords ( get_post_meta(get_the_ID(),'single_port_title',true ));?>
          </h1>
          <div class="pdt-10"></div>
          <h4 class="work-position-title"><?php echo ucwords( get_the_title() );?></h4>
          <div class="pdt-20"></div>
          <div class="work-content">
            <?php echo wpautop(the_content());?>
             <hr>
            <ul class="social-media list-styled inline-block">      
              <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>        
              <li><a href=""><i class="fa-brands fa-github"></i></a></li>       
              <li><a href=""><i class="fa-brands fa-linkedin"></i></a></li>       
              <li><a href=""><i class="fa-brands fa-pinterest"></i></a></li>                              
              <li><a href=""><i class="fa-brands fa-google-plus"></i></a></li>                              
            </ul><!-- social-media --> 
          </div>                        
        </div><!-- /.col-md-12-->
    
      </div>  <!-- row--> 

    </div>  <!-- main-wrapper-->      
  </section>  
    
   <!--END-SINGLE-WORK-->
    
<?php endwhile; 
  wp_reset_postdata();
?>

<?php 

     if(class_exists('Kirki')){

       do_action('landing-custom-footer-display','landing_custom_footer_display');

      } else {

          get_template_part('template-parts/footer-top/footer-top');
          
     } ?>
     
     <!-- END-FOOTER-TOP-AREA-->
     
     <!--START-FOOTER-->
     
     <?php get_footer();?>