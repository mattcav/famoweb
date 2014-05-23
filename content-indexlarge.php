<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage famo
 * @since famo 4.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('index-card'); ?>>
    <a href="<?php the_permalink(); ?>">
        <header class="index-card__header entry__row">
            <h2 class="title index-card__title"><?php the_title(); ?></h2>
        </header>
       <?php get_template_part('component', 'cover')?>
        <!-- <p class="index-card__excerpt">
            <?php the_excerpt_rss(); ?>
        </p> -->
    </a>
</article>