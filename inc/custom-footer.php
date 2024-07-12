<?php

function landing_custom_footer_display(){

    if(is_singular()){

         if(get_post_meta(get_the_ID(),'landing_footer_options',true) == 'global'){

           if(get_theme_mod('choose_footer_settings') == 'custom' && get_theme_mod('landing_choose_footer') != ''){

             global $post;
             $footer_id = get_theme_mod('landing_choose_footer');

                 $landing_custom_footer =  new WP_Query(
                    array(
                     'post_type' =>'footer',
                     'posts_per_page' => -1,
                     'p' => $footer_id,
                    )
                );

                if( $landing_custom_footer->have_posts() ) : 
                  while( $landing_custom_footer->have_posts() ) : $landing_custom_footer->the_post(); 
                ?>
                <section class="landing-custom-footer <?php get_post_meta(get_the_ID(),'landing_footer_position',true);?>">

                    <?php the_content();?>

                </section>
                <?php 
                endwhile;
                endif;
                wp_reset_postdata();

             } else{
                get_template_part('template-parts/footer-top/footer-top');
             }

        } elseif(get_post_meta(get_the_ID(),'landing_footer_options',true) == 'custom' && get_post_meta(get_the_ID(),'select_custom_footer',true) != ''){

            global $post;
            $footer_id = get_theme_mod('select_custom_footer');

                 $landing_custom_footer =  new WP_Query(
                    array(
                     'post_type' =>'footer',
                     'posts_per_page' => -1,
                     'p' => $footer_id,
                    )
                );

                if( $landing_custom_footer->have_posts() ) : 
                  while( $landing_custom_footer->have_posts() ) : $landing_custom_footer->the_post(); 
                ?>
                <section class="landing-custom-footer <?php get_post_meta(get_the_ID(),'landing_footer_position',true);?>">

                    <?php the_content();?>

                </section>
                <?php  endwhile; endif;
                wp_reset_postdata();


         } elseif(get_post_meta(get_the_ID(),'landing_footer_options',true) == 'none'){

            // do nothing

         } else {
            get_template_part('template-parts/footer-top/footer-top');
         }

}
// no single post / page
 else{

    if(get_theme_mod('choose_footer_settings') == 'custom' && get_theme_mod('landing_choose_footer') != ''){

     global $post;
     $footer_id = get_theme_mod('landing_choose_footer');

         $landing_custom_footer =  new WP_Query(
            array(
             'post_type' =>'footer',
             'posts_per_page' => -1,
             'p' => $footer_id,
            )
        );

        if( $landing_custom_footer->have_posts() ) : 
          while( $landing_custom_footer->have_posts() ) : $landing_custom_footer->the_post(); 
        ?>
        <section class="landing-custom-footer <?php get_post_meta(get_the_ID(),'landing_footer_position',true);?>">

            <?php the_content(); ?>

        </section>
        <?php 
        endwhile;
        endif;
        wp_reset_postdata();

            

     } else{

         get_template_part('template-parts/footer-top/footer-top');

     }
        
   }

}