
   <?php 

    get_template_part('template-parts/post-formats/post');

   ?>

   <div class="pdt-20"></div>			
	<h2 class="blog-title">
		<a href="<?php the_permalink();?>">
			<?php echo wp_trim_words( get_the_title(), 5 ); ?>	
		</a> 
	</h2>
	<hr>				
	<ul class="list-unstyled list-inline single-blog-caption">
        <?php if(has_category()):?>
		<li>
			<span><i class="fa-solid fa-briefcase"></i></span>
			<?php the_category( ',' ); ?>
		</li>
        <?php endif;?>

        <?php if(get_the_tag_list()):?>
		<li>
			<span><i class="fa-solid fa-code"></i></span>
			<?php the_tags('','');?>
		</li>
         <?php endif;?>

		<li>
			<span><i class="fa-solid fa-calendar"></i> </span>
			<?php echo get_the_date();?>
		</li>						
	</ul>
	<hr>
	<div class="blog-post-content">
	    <?php the_excerpt( );?>
	</div>
	<div class="pdt-50"></div>			