<?php
/**
 * The template for displaying search results pages.
 */
get_header(); 
?>
<?php echo niva_header_title_breadcrumbs(); ?>
<!-- Page content -->
<div class="high-padding">
    <!-- Blog content -->
    <div class="container">
        <div class="row">
            <div class="projects-posts-list projects-posts-list-shortcode">    
                <div class="projects-listing">
                    <?php $categories = get_terms( 'st-projects-category', array('orderby' => 'count','order' => 'DESC', 'hide_empty' => 0) ); ?>
                    <?php $active = ''; ?>
                    <?php $current_id =  get_queried_object()->term_id; ?>
                    <?php foreach($categories as $category){  ?>  
                        <?php if ($category->term_id == $current_id) { $active = 'active'; } else { $active = ''; }?>
                        <a href="<?php echo esc_url(get_term_link($category)); ?>" class="<?php echo esc_attr($active); ?>"><?php echo esc_html($category->name); ?></a>
                    <?php } ?>
                </div>
                <div class="grid-projects row">
            		<?php if ( have_posts() ) : ?>
            			<?php /* Start the Loop */ ?>
                                <?php while ( have_posts() ) : the_post();  ?>
                                    <?php include('content-projects-archive.php');  ?>
                                <?php endwhile; ?>
            		<?php else : ?>
            			<?php get_template_part( 'content', 'none' ); ?>
            		<?php endif; ?>
                </div>         
            </div>
	   </div>
    </div>
</div>
<?php get_footer(); ?>