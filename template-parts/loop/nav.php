 
<nav id="menubar" class="navbar navbar-expand-md not-custom-menu <?php if(is_singular() && class_exists('Kirki') && get_post_meta(get_the_ID(),'landing_header_default', true) != 'head_standard'){ echo 'white-header';} 
   else { echo 'custom-absolute-menu'; }?>">
  <div class="container">
    <a class="navbar-brand" href="<?php esc_url(home_url('/'));?>">
      
		<?php landing_site_logo()?>
      
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
	    <?php
        wp_nav_menu(array(
           'theme_location'=>'menu',
           'container_class'=>'collapse navbar-collapse',
           'container_id'=>'navbarCollapse',
           'menu_class'=>'nav main-menu justify-content-end',
         ));
	    ?>
  </div>
</nav>