<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="content" id="content" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); 
		// vars
		// cover img
		$cover_id = get_post_thumbnail_id($post->ID); 
		$cover_small = wp_get_attachment_image_src($cover_id, small); 
		$cover_medium = wp_get_attachment_image_src($cover_id, medium); 
		$cover_large = wp_get_attachment_image_src($cover_id, full); 
		$cover_alt = get_post_meta($cover_id , '_wp_attachment_image_alt', true);
	?>

	<!-- template -->

		<article <?php post_class('entry') ?> id="post-<?php the_ID(); ?>">
			
			<?php if(has_post_thumbnail()) : ?>
				<figure class="entry__figure">
					<img src="<?php echo $cover_large[0] ?>" alt="<?php echo $cover_alt ?>">
				</figure>
			<?php endif; ?>
		
			<header class="entry__header entry__row">
				<h1 class="entry__title"><?php the_title(); ?></h1>
				<?php famo_entry_meta(); ?>

				<p class="entry__excerpt">
					<?php the_excerpt_rss(); ?>
				</p>
			</header>

			<section class="entry__content">
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