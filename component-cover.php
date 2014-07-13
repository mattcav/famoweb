<?php if(has_post_thumbnail()) : 
        $postID = $post->ID;
        $cover_align = get_post_meta($postID, 'cover', true);
        $cover_id = get_post_thumbnail_id($postID); 
        $cover_small = wp_get_attachment_image_src($cover_id, 'medium'); 
        $cover_medium = wp_get_attachment_image_src($cover_id, 'large'); 
        $cover_large = wp_get_attachment_image_src($cover_id, 'full'); 
        $cover_alt = get_post_meta($cover_id , '_wp_attachment_image_alt', true);
    ?>

    <figure class="cover <?php if ($cover_align == 'center') {
                echo 'cover--center';
            } elseif ($cover_align == 'top') {
                echo 'cover--top';
            } elseif ($cover_align == 'bottom') {
                echo 'cover--bottom';
            }; ?>">

        <picture class="cover__picture">
            <!--[if IE 9]><video style="display: none;"><![endif]-->
            <source srcset="<?php echo $cover_large[0] ?>" media="(min-width: 1200px)">
            <source srcset="<?php echo $cover_medium[0] ?>" media="(min-width: 650px)">
            <source srcset="<?php echo $cover_small[0] ?>">
            <!--[if IE 9]></video><![endif]-->
            <img srcset="<?php echo $cover_large[0] ?>" alt="<?php echo $cover_alt ?>" class="entry__cover-img">
        </picture>

    </figure>
<?php endif; ?>