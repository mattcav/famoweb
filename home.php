<?php get_header(); ?>

<!-- Row for main content area -->
    <main id="content" role="main">
    
    <?php if ( have_posts() ) : ?>
    
        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', 'indexlarge' ); ?>
        <?php endwhile; ?>
        
        <?php else : ?>
            <?php get_template_part( 'content', 'none' ); ?>
        
    <?php endif; // end have_posts() check ?>
    
    <?php /* Display navigation to next/previous pages when applicable */ ?>
    <?php if ( function_exists('famo_pagination') ) { famo_pagination(); } else if ( is_paged() ) { ?>
        <nav id="post-nav">
            <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'famo' ) ); ?></div>
            <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'famo' ) ); ?></div>
        </nav>
    <?php } ?>

    </main>
        
<?php get_footer(); ?>