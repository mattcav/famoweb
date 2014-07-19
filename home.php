<?php get_header(); ?>

<?php
$args = array(
        'post_type'=>'numeri',
        'posts_per_page'=> 1
    );

// The Query
$issue_query = new WP_Query( $args );

// The Loop
if ( $issue_query->have_posts() ) {
    while ( $issue_query->have_posts() ) {
        $issue_query->the_post(); 
        // vars
        $id = get_the_id();
        $pdf = get_post_meta( $id, '_famo_pdf', true );
        $vimeo = get_post_meta( $id, '_famo_vimeo', true );
    ?>

    <main id="content" role="main" class="issue__container home__container clearfix">
        <article class="entry entry--issue">
                
                <?php if($vimeo): ?>
                    <section class="videoCover flex-video widescreen vimeo">
                        <iframe src="//player.vimeo.com/video/<?php echo $vimeo; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff&amp;loop=0&amp;autoplay=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </section>
                <?php endif; ?>    

                <header class="entry__header entry__row">
                    <h2 class="title entry__title"><?php the_title(); ?></h2>
                    <?php famo_entry_meta(); ?>
                </header>

                <section class="entry__content hyphenate no-dots">
                    <?php the_content(); ?>
                </section>

                <section id="baguette" class="entry__row baguette">
                    <?php if($pdf) : ?>
                        <button id="baguetteButton" type="button" class="baguette__trigger small">FAMO Baguette</button>

                        <section class="baguette__inner">
                            <a class="baguette__link" href="<?php echo $pdf; ?>">Scarica il pdf</a>
                            <img class="baguette__img" src="<?php bloginfo('template_directory'); ?>/img/istruzioni.jpg" alt="Scarica, stampa, leggi!">
                        </section>
                    <?php endif; ?>
                </section>

                <footer class="entry__footer entry__row">
                    <p class="entry__date"><?php the_date('F Y'); ?></p>
                </footer>
        </article>
 
        <section class="issue clearfix">
           <div class="issue__inner bg-white">    
                <?php get_template_part('nav', 'issue'); ?>
           </div>
        </section>


    </main>

<?php    }

} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata(); ?>

<?php get_footer(); ?>