<?php

// related posts

function related_posts( $post_id, $post_count, $args = [] ){

        $args = wp_parse_args($args, array(
             'orderby'=>'rand',
             'return'=>'query',
        ));

        $related_post_args = array(
        	 'post_type' => get_post_type($post_id),
             'posts_per_page' => $post_count,
             'orderby' => $args['orderby'],
             'post__not_in' => array($post_id),
             'tax_query' => [],
        );

        $post = get_post($post_id);
        $taxonomies = get_object_taxonomies($post,'names');

        foreach($taxonomies as $taxonomy){
        	$post_terms = get_the_terms( $post_id, $taxonomy );
        if(empty($post_terms) ) continue;
         $post_terms_list = wp_list_pluck($post_terms,'slug');
         $related_post_args['tax_query'] = array(
            'taxonomy'=> $taxonomy,
            'field'=>'slug',
            'terms'=>$post_terms_list,
         );
        }

        if( count ( $related_post_args['tax_query'] ) > 1 ){
            $related_post_args['tax_query']['relation'] = 'OR'; 
        } 
      
       if( $args['return'] == 'query'){
           return new WP_Query($related_post_args);
       } else{
       	return $related_post_args;
       }

}




