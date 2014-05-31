<?php /* Display navigation to next/previous pages when applicable */ ?>
    <?php if ( function_exists('famo_pagination') ) { famo_pagination(); } else if ( is_paged() ) { ?>
        <nav id="post-nav">
            <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'famo' ) ); ?></div>
            <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'famo' ) ); ?></div>
        </nav>
    <?php } ?>