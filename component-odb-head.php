<?php 
$article_ID = $post->ID;
$termsObjects = wp_get_object_terms($article_ID, 'occhio_di_bue');

if( $termsObjects ) : 
    $connected = get_posts( array(
      'connected_type' => 'post2numeri',
      'connected_items' => $article_ID,
      'suppress_filters' => false
    ) );

    $issue = $connected[0]->ID;

    $palette = get_post_meta( $issue, '_famo_palette_group', true );
    if($palette) :
        $count=0;
        foreach ( (array) $palette as $key => $entry ) {
          $paletteColor = '';
          $colorname = 'color'.$count;
          $$colorname = $entry['paletteColor']; 
          $count++;     
        }
    endif;


    $currentODB = $termsObjects[0]->slug;

    if( $currentODB == "occhio-di-bue-1"){
        echo '<p class="odb" style="background-color:'.$color1.'">Occhio di Bue #1</p>';
    }

    if( $currentODB == "occhio-di-bue-2"){
        echo '<p class="odb" style="background-color:'.$color2.'">Occhio di Bue #2</p>';
    }
    if( $currentODB == "occhio-di-bue-3"){
        echo '<p class="odb" style="background-color:'.$color3.'">Occhio di Bue #3</p>';
    }

endif; ?>
