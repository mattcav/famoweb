<?php if (is_single()) { 
    $id = $post->ID;
    $fb_image = wp_get_attachment_image_src(get_post_thumbnail_id( $id ), 'medium');
    $excerpt = get_the_excerpt();  
?>  
    <meta property="og:title" content="<?php echo get_the_title($id); ?> | FAMO">
    <?php if ($fb_image) : ?>
        <meta property="og:image" content="<?php echo $fb_image[0]; ?>" />
    <?php endif; ?>
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="Famo">
    <meta property="og:description" content="<?php echo $excerpt; ?>">
    <meta property="og:url" content="<?php echo get_permalink($id); ?>">
    <meta property="article:publisher" content="https://www.facebook.com/famoweb">
<?php } else { ?>  
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />  
    <meta property="og:description" content="<?php bloginfo('description'); ?>" />  
    <meta property="og:type" content="website" />  
    <meta property="og:image" content="http://larosadeiventi.famoweb.it/wp-content/uploads/01-Cover-page03.jpg" /> 
<?php } ?>  
 
<meta name="description" content="Le opere, ma anche gli artisti. Non il personaggio, ma la persona. Un punto di vista differente, obliquo, riflesso, per guardare sopra, sotto e dietro...">
<link rel="canonical" href="http://larosadeiventi.famoweb.it/">


<!-- Favicon and Feed -->
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

    <!--  iPhone Web App Home Screen Icon -->
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/devices/famo-icon-ipad.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/devices/famo-icon-retina.png" />
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/devices/famo-icon.png" />

    <!-- Enable Startup Image for iOS Home Screen Web App -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/mobile-load.png" />

    <!-- Startup Image iPad Landscape (748x1024) -->
    <link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/famo-load-ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)" />
    <!-- Startup Image iPad Portrait (768x1004) -->
    <link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/famo-load-ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)" />
    <!-- Startup Image iPhone (320x460) -->
    <link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/famo-load.png" media="screen and (max-device-width: 320px)" />
