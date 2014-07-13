<?php
$next_post = get_adjacent_post();
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

    $issueID = $connected[0]->ID;
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
                <p class="next__message"><?php echo get_the_title($issueID); ?></p>
                <h1 class="title next__title">
                <?php echo $title; ?>
                </h1>
            </header>
        </a>    
    </article>    


<?php endif; ?>