<?php
if (!empty( $post )): 
    $postID = $post->ID;
    $title = $post->post_title;
    $permalink = get_permalink( $postID );
    $cover_align = get_post_meta($postID, 'cover', true);
    $cover_id = get_post_thumbnail_id($postID); 
    $cover_small = wp_get_attachment_image_src($cover_id, 'medium'); 
    $cover_medium = wp_get_attachment_image_src($cover_id, 'large'); 
    $cover_alt = get_post_meta($cover_id , '_wp_attachment_image_alt', true);
    $color = get_post_meta($postID, '_famo_color', true);
?>

    <article class="cover next next--menu-item <?php if ($cover_align == 'center') {
                echo 'cover--center';
            } elseif ($cover_align == 'top') {
                echo 'cover--top';
            } elseif ($cover_align == 'bottom') {
                echo 'cover--bottom';
            }; ?>">

        <a href="<?php echo $permalink; ?>" class="next__link">  
            
            <?php if(has_post_thumbnail()) : ?>
                <picture class="cover__picture">
                    <!--[if IE 9]><video style="display: none;"><![endif]-->
                    <source srcset="<?php echo $cover_medium[0] ?>" media="(min-width: 650px)">
                    <source srcset="<?php echo $cover_small[0] ?>">
                    <!--[if IE 9]></video><![endif]-->
                    <img srcset="<?php echo $cover_small[0] ?>" alt="<?php echo $cover_alt ?>" class="entry__cover-img">
                </picture>
            <?php else : ?>
                <div class="rubrica-bg" <?php if($color): echo 'style="background-color:'. $color .'"'; endif ?>></div>
            <?php endif; ?>

            <div class="next__bg"></div>
            
            <header class="next__header">
                <h1 class="title next__title">
                <?php echo $title; ?>
                </h1>
            </header>
        </a>    
    </article>    


<?php endif; ?>