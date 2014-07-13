<?php
    if ( 'numeri' == get_post_type() ) :
        $issue = $post->ID;
    else :
        $article_id = $post->ID;
        $parent_query = new WP_Query( array(
          'connected_type' => 'post2numeri',
          'connected_items' => $article_id,
          'nopaging' => true,
        ) );
        if ( $parent_query->have_posts() ) {
            while ( $parent_query->have_posts() ) {
               $issue =  get_the_id();    
            }    
        }
        wp_reset_postdata();    
    endif;

    $menu_query = new WP_Query( array(
      'connected_type' => 'post2numeri',
      'connected_items' => $issue,
      'nopaging' => true,
    ) );

  

    // The Loop
    if ( $menu_query->have_posts() ) {
        echo '<nav class="menu-issue">';
        while ( $menu_query->have_posts() ) {
            $menu_query->the_post();
            get_template_part('component', 'menu-item');
        }
        echo '</nav>';
    } else {
        // no posts found
    }
    /* Restore original Post Data */
    wp_reset_postdata();
?>
