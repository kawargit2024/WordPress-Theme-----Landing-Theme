<?php
// custom header by global settings
function landing_custom_header_global(){

 global $post;
 $custom_header_id = get_theme_mod('landing_choose_header');

 $landing_header = new WP_Query(array(
  'post_type'=>'header',
  'posts_per_page'=> -1,
  'p'=> $custom_header_id,
 ));

if ($landing_header->have_posts()) : while($landing_header->have_posts()) : $landing_header->the_post(); ?>

   <nav class="landing-custom-header clearfix <?php echo esc_attr(get_post_meta(get_the_ID(), 'landing_header_position', true)) ?>">
        <?php the_content(); ?>
    </nav>

   <?php endwhile; endif; 
    wp_reset_postdata();   
} 


// custom header by page settings

function landing_custom_header_page(){

global $post;
 $custom_header_id = get_post_meta( get_the_ID('select_custom_header',true));

 $landing_header = new WP_Query(array(
  'post_type'=>'header',
  'posts_per_page'=> -1,
  'p'=> $custom_header_id,
 ));

if ( $landing_header->have_posts() ) : while( $landing_header->have_posts() ) : $landing_header->the_post(); ?>

    <nav class='landing-custom-header  <?php echo esc_attr ( get_post_meta( get_the_ID(),'landing_header_position', true) ) ?>'>
 
        <?php the_content(); ?>

    </nav>

   <?php endwhile; 
    endif; 
    wp_reset_postdata();  

}


// output custom header content
function landing_custom_header_display(){

    if( is_singular() ){ // if single post / page //

        global $post;

        // if page setting choose header option 'custom'//
        if( get_post_meta(get_the_ID(),'landing_header_options',true) == 'custom' && get_post_meta(get_the_ID(),'select_custom_header',true) ){
            
            do_action('landing-custom-header-page','landing_custom_header_page');

        // if page setting choose header option 'global'//
        } elseif( get_post_meta(get_the_ID(),'landing_header_options',true ) == 'global' ){

            // custom header and list are selected in theme options//
            if( get_theme_mod('choose_header_settings') == 'custom' &&  get_theme_mod('landing_choose_header') != '') {
                     do_action('landing-custom-header-global', 'landing_custom_header_global');
                } else {
                    get_template_part('template-parts/loop/nav','normal');
                }
           
        } 

        // if page setting choose no header//
        elseif( get_post_meta(get_the_ID(),'landing_header_options',true ) == 'none' ){

            //  display nothing
        }  

        // if page setting choose header standard //
        else{ ?>

               <!--- HEADER START --->

             <?php  get_template_part('template-parts/loop/nav'); ?>

               <!--- HEADER END --->

        <?php }

        } else{ // if not single post / page

            // custom header and list are selected in theme options
           if( get_theme_mod('choose_header_settings') == 'custom' &&  get_theme_mod('landing_choose_header') != '') {

             do_action('landing-custom-header-global', 'landing_custom_header_global');

           } else{

             get_template_part('template-parts/loop/nav','normal');

           }
        }
    }









