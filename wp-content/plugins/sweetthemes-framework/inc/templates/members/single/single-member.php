<?php
/**
 * The template for displaying all single member.
 *
 */
?>
<?php get_header(); ?>

	<?php 

		$breadcrumbs_on_off = get_post_meta( get_the_ID(), 'breadcrumbs_on_off',  true );

	    if ( function_exists('sweetthemes_framework')) {
	        if (isset($breadcrumbs_on_off) && $breadcrumbs_on_off == 'yes') {
	           echo niva_header_title_breadcrumbs();
	        }elseif(isset($breadcrumbs_on_off) && $breadcrumbs_on_off == ''){
	            echo niva_header_title_breadcrumbs();
	        }
	    }else{
	        echo niva_header_title_breadcrumbs();
	    }
	    
    ?>

	<div id="primary" class="content-area">
		<div id="main" class="site-main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php  require_once('content-single-member.php'); ?>

		<?php endwhile; // end of the loop. ?>

		</div><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
