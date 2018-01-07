<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 2.0
 */

get_header(); ?>

<section class="index-page">

	<div class="main-content">
		<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<!-- what to do for each post.... calling a template/partial. could be content or content-blog for an excerpt -->
				<?php get_template_part('content-blog', get_post_format()); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>

	<?php get_sidebar(); ?>
</section>

<!-- adding newer/older posts links per SKILCRUSH-->
<nav id="navigation" class="container">
		<div class="left"><?php next_posts_link('← <span>Older Posts</span>;') ?></div>
		<div class="pagination">
			<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
			echo 'Page '.$paged.' of '.$wp_query->max_num_pages;
			?>
		</div>
		<div class="right"><?php previous_posts_link('<span>Newer Posts</span> →');
		?> </div>
</nav>


<?php get_footer(); ?>
