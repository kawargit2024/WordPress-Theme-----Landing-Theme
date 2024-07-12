<?php
// defalut
if(get_post_meta(get_the_ID(),'pf_settings', true) == ''){

   the_post_thumbnail();
   
  // if standard post
} elseif( get_post_meta(get_the_ID(),'pf_settings', true) == 'pf_standard'){

       echo '<img src="'. get_post_meta(get_the_ID(),'pf_standard_box', true).'">';

 // if gallery post
} elseif( get_post_meta(get_the_ID(),'pf_settings', true) == 'pf_gallery'  ){
  
  echo "<ul class='gallery-list-grp'>";

   $pf_gallery = get_post_meta(get_the_ID(),'pf_gallery_box', true);
   foreach( (array)$pf_gallery as $gallery=>$gallery_url ){
    if(!empty( $gallery )){
    echo "<li class='gallist-item'>";
      echo '<a class="facnybox" href="'.esc_url ( wp_get_attachment_image_url( $gallery,"thumbnail")).'">
              <img src="'. esc_url ( wp_get_attachment_image_url( $gallery,"thumbnail")) .'">
          </a>';
    echo "</li>";
    }
     }
  echo "</ul>";

  // if video post
} elseif( get_post_meta(get_the_ID(),'pf_settings', true) == 'pf_vmytvideo' ){
  echo '<a class="fancybox-media" href="'.get_post_meta(get_the_ID(),'pf_vmytvideo_box', true).'"><iframe src="'. get_post_meta(get_the_ID(),'pf_vmytvideo_box', true) .'" width="100%" height="500"></iframe></a>';


  // if slider post
} elseif( get_post_meta(get_the_ID(),'pf_settings', true) == 'pf_slider'){ ?>
  <div id="blog-carousel" class="carousel slide" data-bs-ride="carousel-<?php echo rand('123','456');?>">
    <div class="blog-carousel carousel-inner text-center">

      <?php
        $pf_slider = get_post_meta(get_the_ID(),'pf_slider_box', true);

        if(!empty($pf_slider)): 
        $i = 0;
        foreach($pf_slider as $slider=>$slider_url):
        $slider_img = wp_get_attachment_image_url($slider,"full");
        $i++;
      ?>
        <div class="carousel-item <?php if( $i==1 ){ echo "active"; } else{ echo ""; }?>">
          <img class="img-responsive" src="<?php echo esc_url( $slider_img) ?>">
          <a class="fancybox"  href="<?php echo esc_url( $slider_img) ?>"> 
            <i class="fa-solid fa-images"></i>
          </a>
        </div>
      <?php 
        endforeach; endif; 
      ?>   
    </div>
    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#blog-carousel" data-bs-slide="prev">
     <span class="prev-icon nav-icon"><i class='fa-solid fa-angle-left'></i></span>
     <!-- <span class="visually-hidden"></span> -->
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#blog-carousel" data-bs-slide="next">
     <span class="next-icon nav-icon"><i class='fa-solid fa-angle-right'></i></span>
     <!-- <span class="visually-hidden"> </span> -->
    </button>
  </div>

<?php } 

// if audio post
elseif( get_post_meta(get_the_ID(),'pf_settings', true ) == 'pf_audio' ){  ?>

<iframe width="100%" height="200" scrolling="no" frameborder="no" allow="autoplay" 
src="<?php echo esc_url( get_post_meta(get_the_ID(),'pf_audio_box', true) ); ?>"></iframe>

<?php } 

// if quote post
elseif( get_post_meta(get_the_ID(),'pf_settings', true ) == 'pf_quote' ){

 $pf_quotes = get_post_meta(get_the_ID(),'pf_quote_box', true);
   echo '<div class="blockquote-warp">';
     foreach((array)$pf_quotes as $pf_quote){
      if(!empty($pf_quote)){
         echo '<span class="quote-iocn"><i class="fa-solid fa-'.$pf_quote['title'].'"></i></span>';
         echo $pf_quote['desc'];
      }
   echo '</div>';
    
   }

}


