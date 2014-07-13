        <?php 
            $id = get_the_id();
            $extraCredits = get_post_meta( $id, '_famo_extraCredits', true );
        ?>
        <article <?php post_class('entry page') ?> id="post-<?php the_ID(); ?>"> 
            <?php get_template_part('component', 'cover'); ?>
        
            <header class="entry__header entry__row">
                <h1 class="title entry__title"><?php the_title(); ?></h1>
                <?php famo_entry_meta(); ?>
                <?php if($extraCredits): ?>
                    <p><?php echo $extraCredits; ?></p>
                <?php endif; ?>    

                <p class="entry__excerpt">
                    <?php the_excerpt_rss(); ?>
                </p>
            </header>

            <section class="entry__content hyphenate">
                <?php the_content(); ?>
            </section>
        </article>
