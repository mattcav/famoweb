<?php
    if ( 'numeri' == get_post_type() ) :
        $issue = $post->ID;
    else :
        $article_ID = $post->ID;
        $connected = get_posts( array(
          'connected_type' => 'post2numeri',
          'connected_items' => $article_ID,
          'suppress_filters' => false
        ) );

        $issue = $connected[0]->ID;
    endif;

    $palette = get_post_meta( $issue, '_famo_palette_group', true );
    $issueNumber = get_post_meta( $issue, '_famo_number', true );
    //$issueLink = get_permalink( $issue );
    $issueLink = get_bloginfo( 'url' );
?>

<header class="issueHeader">
  <h2 class="issueHeader__title">
    <a href="<?php echo $issueLink; ?>" class="issueHeader__link">
      <img class="issueHeader__img" src="<?php bloginfo('template_directory'); ?>/img/famo.svg" alt="FAMO">
      <span class="issueHeader__number">
        #<?php echo $issueNumber; ?>
      </span>
    </a>
  </h2>
</header>

<?php
  if($palette) :
      echo '<p class="palette clearfix">';
      foreach ( (array) $palette as $key => $entry ) {
          $paletteColor = '';

          echo '<span class="palette__item" style="background-color:'. $entry['paletteColor'] .';">';           
          echo '</span>';        
      }
      echo '</p>';    
  endif;
?>

<?php

    $menu_query = new WP_Query( array(
      'connected_type' => 'post2numeri',
      'connected_items' => $issue,
      'nopaging' => true,
      'orderby' => 'menu_order',
      'order' => 'ASC'
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
