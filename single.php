<?php get_header(); ?>

    <button class="st-toggle si-icon si-icon-hamburger-cross" data-icon-name="hamburgerCross">
    </button>

<!-- Row for main content area -->
	<main class="entry__container" id="content" role="main">
    	
    	<?php /* Start loop */ ?>
    	<?php while (have_posts()) : the_post(); ?>

    		<?php get_template_part('content', 'article'); ?>	
            
    	<?php endwhile; // End the loop ?>

    	<?php get_template_part('component', 'next'); ?>
	</main>
		
<?php get_footer(); ?>