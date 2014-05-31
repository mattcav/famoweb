<?php get_header(); ?>

<!-- Row for main content area -->
    <main id="content" role="main" class="issue__container">

          


        <article class="issue">
           <div class="issue__inner bg-white">
                
                
                <section class="video__container">
                    <canvas id="video-canvas" height="100" width="100"></canvas>
                    <video id="video-cover" height="100" width="100" class="issue__video" controls loop autoplay="autoplay" muted poster="http://disegnatoperte.com/famo/wp-content/themes/famo/img/poster.jpg">
                      <source src="<?php bloginfo('template_directory'); ?>/img/video.webm" type='video/webm;codecs="vp8, vorbis"'>
                      <source src="<?php bloginfo('template_directory'); ?>/img/video.mp4" type='video/mp4;codecs="avc1.42E01E, mp4a.40.2"'>
                      <img src="http://disegnatoperte.com/famo/wp-content/themes/famo/img/poster.jpg" alt="FAMO 02">
                    </video>
                </section> 

                <header class="issue-header">
                    <h1 class="issue-header__title">
                        #02
                        <img class="issue-header__img" src="<?php bloginfo('template_directory'); ?>/img/famo.svg" alt="FAMO">
                    </h1>
                </header>


                <?php if ( have_posts() ) : ?>
                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', 'index' ); ?>
                    <?php endwhile; ?>
                    
                    <?php else : ?>
                        <?php get_template_part( 'content', 'none' ); ?>
                
                <?php endif; // end have_posts() check ?>
           </div>
        </article>


    



    <?php //get_template_part('nav'); ?>

    </main>
        
<?php get_footer(); ?>