<div class="comments-list-wrapper">

    <?php wp_list_comments('avatar_size=88&callback=landing_comment'); ?>

 <div class="pdt-20"></div>
</div>

<?php paginate_comments_links(); ?> 

<!-- comments-list-wrapper -->

<div class="blog-comments-box">
	<?php comment_form(
		array(
		// Change the title of the reply section
	    'title_reply' => __( 'Write Your Comment', 'landing' ),
        'label_submit' => __( 'Post Comment','landing' ),
		'submit_field' => '<p class="cFormSubmitBtn form-submit">%1$s %2$s</p>',
		)

	);?> 
</div>
<!-- blog-comments-box -->	