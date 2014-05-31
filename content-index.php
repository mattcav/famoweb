<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage famo
 * @since famo 4.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('index-module'); ?>>
    <a href="<?php the_permalink(); ?>">

        <header class="index-module__header entry__row">
            <h3 class="index-module__id">&#9632;</h3>
            <h2 class="title index-module__title"><?php the_title(); ?></h2>
        </header>
    </a>
</article>