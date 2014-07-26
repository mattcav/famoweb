<?php
remove_shortcode('gallery', 'gallery_shortcode');

add_shortcode('gallery', 'famo_gallery_shortcode');

function famo_gallery_shortcode( $attr ) {
    $post = get_post();

    static $instance = 0;
    $instance++;

    if ( ! empty( $attr['ids'] ) ) {
    // 'ids' is explicitly ordered, unless you specify otherwise.
    if ( empty( $attr['orderby'] ) ) {
    $attr['orderby'] = 'post__in';
    }
    $attr['include'] = $attr['ids'];
    }

    /**
    * Filter the default gallery shortcode output.
    *
    * If the filtered output isn't empty, it will be used instead of generating
    * the default gallery template.
    *
    * @since 2.5.0
    *
    * @see gallery_shortcode()
    *
    * @param string $output The gallery output. Default empty.
    * @param array $attr Attributes of the gallery shortcode.
    */
    $output = apply_filters( 'post_gallery', '', $attr );
    if ( $output != '' ) {
    return $output;
    }

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
    $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
    if ( ! $attr['orderby'] ) {
    unset( $attr['orderby'] );
    }
    }

    $html5 = current_theme_supports( 'html5', 'gallery' );
    $atts = shortcode_atts( array(
    'order' => 'ASC',
    'orderby' => 'menu_order ID',
    'id' => $post ? $post->ID : 0,
    'itemtag' => $html5 ? 'figure' : 'dl',
    'icontag' => $html5 ? 'div' : 'dt',
    'captiontag' => $html5 ? 'figcaption' : 'dd',
    'columns' => 3,
    'size' => 'thumbnail',
    'include' => '',
    'exclude' => '',
    'link' => ''
    ), $attr, 'gallery' );

    $id = intval( $atts['id'] );
    if ( 'RAND' == $atts['order'] ) {
    $atts['orderby'] = 'none';
    }

    if ( ! empty( $atts['include'] ) ) {
    $_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );

    $attachments = array();
    foreach ( $_attachments as $key => $val ) {
    $attachments[$val->ID] = $_attachments[$key];
    }
    } elseif ( ! empty( $atts['exclude'] ) ) {
    $attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
    } else {
    $attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
    }

    if ( empty( $attachments ) ) {
    return '';
    }

    if ( is_feed() ) {
    $output = "\n";
    foreach ( $attachments as $att_id => $attachment ) {
    $output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
    }
    return $output;
    }

    $itemtag = tag_escape( $atts['itemtag'] );
    $captiontag = tag_escape( $atts['captiontag'] );
    $icontag = tag_escape( $atts['icontag'] );
    $valid_tags = wp_kses_allowed_html( 'post' );
    if ( ! isset( $valid_tags[ $itemtag ] ) ) {
    $itemtag = 'dl';
    }
    if ( ! isset( $valid_tags[ $captiontag ] ) ) {
    $captiontag = 'dd';
    }
    if ( ! isset( $valid_tags[ $icontag ] ) ) {
    $icontag = 'dt';
    }

    $columns = intval( $atts['columns'] );
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $gallery_style = '';

    /**
    * Filter whether to print default gallery styles.
    *
    * @since 3.1.0
    *
    * @param bool $print Whether to print default gallery styles.
    * Defaults to false if the theme supports HTML5 galleries.
    * Otherwise, defaults to true.
    */
    if ( apply_filters( 'use_default_gallery_style', ! $html5 ) ) {
    $gallery_style = "
    <style type='text/css'>
    #{$selector} {
    margin: auto;
    }
    #{$selector} .gallery-item {
    float: {$float};
    margin-top: 10px;
    text-align: center;
    width: {$itemwidth}%;
    }
    #{$selector} img {
    border: 2px solid #cfcfcf;
    }
    #{$selector} .gallery-caption {
    margin-left: 0;
    }
    /* see gallery_shortcode() in wp-includes/media.php */
    </style>\n\t\t";
    }

    $size_class = sanitize_html_class( $atts['size'] );
    $gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";

    /**
    * Filter the default gallery shortcode CSS styles.
    *
    * @since 2.5.0
    *
    * @param string $gallery_style Default gallery shortcode CSS styles.
    * @param string $gallery_div Opening HTML div container for the gallery shortcode output.
    */
    $output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
    // if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
    // $image_output = wp_get_attachment_link( $id, $atts['size'], false, false );
    // } elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
    // $image_output = wp_get_attachment_image( $id, $atts['size'], false );
    // } else {
    // $image_output = wp_get_attachment_link( $id, $atts['size'], true, false );
    // }
    //$image_output = wp_get_attachment_image( $id, $atts['size'], true, false );
    $cover_small = wp_get_attachment_image_src($id, 'medium'); 
    $cover_medium = wp_get_attachment_image_src($id, 'large'); 
    $cover_large = wp_get_attachment_image_src($id, 'full'); 
    $cover_alt = get_post_meta($id , '_wp_attachment_image_alt', true);

    $image_output = '<picture class="galler__picture">
            <!--[if IE 9]><video style="display: none;"><![endif]-->
            <source srcset="'.$cover_large[0].'" media="(min-width: 1200px)">
            <source srcset="'.$cover_medium[0].'" media="(min-width: 650px)">
            <source srcset="'.$cover_small[0].'">
            <!--[if IE 9]></video><![endif]-->
            <img srcset="'.$cover_large[0].'" alt="'.$cover_alt.'" class="galler__cover-img">
        </picture>';    
    $image_meta = wp_get_attachment_metadata( $id );

    $orientation = '';
    if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
    $orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
    }
    $output .= "<{$itemtag} class='gallery-item'>";
    $output .= "
    <{$icontag} class='gallery-icon {$orientation}'>
    $image_output
    </{$icontag}>";
    if ( $captiontag && trim($attachment->post_excerpt) ) {
    $output .= "
    <div class='gallery-caption__bg'></div>
    <{$captiontag} class='wp-caption-text gallery-caption'>
    " . wptexturize($attachment->post_excerpt) . "
    </{$captiontag}>";
    }
    $output .= "</{$itemtag}>";
    if ( ! $html5 && $columns > 0 && ++$i % $columns == 0 ) {
    //$output .= '<br style="clear: both" />';
    }
    }

    if ( ! $html5 && $columns > 0 && $i % $columns !== 0 ) {
    //$output .= "<br style='clear: both' />";
    }

    $output .= "
    </div>";

    return $output;
}

?>