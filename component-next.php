<?php
$next_post = get_next_post();
if (!empty( $next_post )): 
    $postID = $next_post->ID;
    $title = $next_post->post_title;
    $permalink = get_permalink( $postID );
    $cover_align = get_post_meta($postID, 'cover', true);
    $cover_id = get_post_thumbnail_id($postID); 
    $cover_small = wp_get_attachment_image_src($cover_id, 'medium'); 
    $cover_medium = wp_get_attachment_image_src($cover_id, 'large'); 
    $cover_large = wp_get_attachment_image_src($cover_id, 'full'); 
    $cover_alt = get_post_meta($cover_id , '_wp_attachment_image_alt', true);
    $color = get_post_meta($postID, '_famo_color', true);

    $connected = get_posts( array(
      'connected_type' => 'post2numeri',
      'connected_items' => $postID,
      'suppress_filters' => false
    ) );

    $issue = $connected[0]->ID;
    $issueNumber = get_post_meta( $issue, '_famo_number', true );
?>

    <article class="cover next <?php if ($cover_align == 'center') {
                echo 'cover--center';
            } elseif ($cover_align == 'top') {
                echo 'cover--top';
            } elseif ($cover_align == 'bottom') {
                echo 'cover--bottom';
            }; ?>">
        <a href="<?php echo $permalink; ?>" class="next__link">  
            <?php if($cover_large) : ?>
                <picture class="cover__picture">
                    <!--[if IE 9]><video style="display: none;"><![endif]-->
                    <source srcset="<?php echo $cover_large[0] ?>" media="(min-width: 1200px)">
                    <source srcset="<?php echo $cover_medium[0] ?>" media="(min-width: 650px)">
                    <source srcset="<?php echo $cover_small[0] ?>">
                    <!--[if IE 9]></video><![endif]-->
                    <img srcset="<?php echo $cover_large[0] ?>" alt="<?php echo $cover_alt ?>" class="entry__cover-img">
                </picture>
            <?php else: ?>
                <div class="rubrica-bg" <?php if($color): echo 'style="background-color:'. $color .'"'; endif ?>></div>
            <?php endif; ?>

            <div class="next__bg"></div>
            
            <header class="next__header">
                <p class="next__message">Continua a leggere su FAMO #<?php echo $issueNumber; ?></p>
                <h1 class="title next__title">
                <?php echo $title; ?>
                </h1>
            </header>
        </a>    
    </article>    



<?php else : 
    $connected = get_posts( array(
      'connected_type' => 'post2numeri',
      'connected_items' => $post->ID,
      'suppress_filters' => false
    ) );

    $issue = $connected[0]->ID;
    $issueNumber = get_post_meta( $issue, '_famo_number', true );

    $postID = $connected[0]->ID;
    $title = get_the_title($postID);
    //$permalink = get_permalink( $postID );
    $permalink = get_bloginfo('url');
    $cover_align = get_post_meta($postID, 'cover', true);
    $cover_id = get_post_thumbnail_id($postID); 
    $cover_small = wp_get_attachment_image_src($cover_id, 'medium'); 
    $cover_medium = wp_get_attachment_image_src($cover_id, 'large'); 
    $cover_large = wp_get_attachment_image_src($cover_id, 'full'); 
    $cover_alt = get_post_meta($cover_id , '_wp_attachment_image_alt', true);
?>

<article class="cover next <?php if ($cover_align == 'center') {
                echo 'cover--center';
            } elseif ($cover_align == 'top') {
                echo 'cover--top';
            } elseif ($cover_align == 'bottom') {
                echo 'cover--bottom';
            }; ?>">
        <a href="<?php echo $permalink; ?>" class="next__link">  
            <?php if($cover_large) : ?>
                <picture class="cover__picture">
                    <!--[if IE 9]><video style="display: none;"><![endif]-->
                    <source srcset="<?php echo $cover_large[0] ?>" media="(min-width: 1200px)">
                    <source srcset="<?php echo $cover_medium[0] ?>" media="(min-width: 650px)">
                    <source srcset="<?php echo $cover_small[0] ?>">
                    <!--[if IE 9]></video><![endif]-->
                    <img srcset="<?php echo $cover_large[0] ?>" alt="<?php echo $cover_alt ?>" class="entry__cover-img">
                </picture>
            <?php else: ?>
                <div class="rubrica-bg" <?php if($color): echo 'style="background-color:'. $color .'"'; endif ?>></div>
            <?php endif; ?>

            <div class="next__bg"></div>
            
            <header class="next__header">
                <p class="next__message">FAMO <?php echo $issueNumber; ?></p>
                <h1 class="title next__title">
                <?php echo $title; ?>
                </h1>
            </header>
        </a>    
    </article>


<?php endif; ?>