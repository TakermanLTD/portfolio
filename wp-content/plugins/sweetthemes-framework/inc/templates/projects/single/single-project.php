<?php
/**
 * The template for displaying all single project.
 *
 */
?>
<?php get_header(); ?>
<?php echo niva_header_title_breadcrumbs(); ?>
	<div id="primary" class="content-area">
		<div id="main" class="site-main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php require_once('content-single-project.php'); ?>

		<?php endwhile; // end of the loop. ?>

		</div><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
