<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="content" id="content" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); 
		// vars
		// cover img
	?>

	<!-- template -->
		<article <?php post_class('entry') ?> id="post-<?php the_ID(); ?>">	
			<?php get_template_part('component', 'cover'); ?>
		
			<header class="entry__header entry__row">
				<h1 class="title entry__title"><?php the_title(); ?></h1>
				<?php famo_entry_meta(); ?>

				<p class="entry__excerpt">
					<?php the_excerpt_rss(); ?>
				</p>
			</header>

			<section class="entry__content hyphenate">
				<?php the_content(); ?>

			</section>

			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'famo'), 'after' => '</p></nav>' )); ?>
				<p class="entry-tags"><?php the_tags(); ?></p>
				<?php edit_post_link('Edit this Post'); ?>
			</footer>
		</article>
		<?php //comments_template(); ?>
	<?php endwhile; // End the loop ?>

	</div>
	<?php //get_sidebar(); ?>
		
<?php get_footer(); ?>