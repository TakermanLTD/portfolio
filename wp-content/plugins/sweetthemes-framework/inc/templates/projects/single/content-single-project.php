<?php
/**
 * @package ModelTheme
 */

$prev_post = get_previous_post();
$next_post = get_next_post();

$media_id = get_post_thumbnail_id( get_the_ID() );
if(!isset($media_id)){
    $media_id = '';
}

$st_client_name = get_post_meta( get_the_ID(), 'st_client_name', true ); 
$st_projects_category = get_the_term_list( get_the_ID(), 'st-projects-category', '', ', ' ); 
$st_project_tags = get_post_meta( get_the_ID(), 'st_project_tags', true ); 

?>


<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

    <!-- DETAILS -->
    <div class="clearfix"></div>
    <div class="portfolio-bottom-description">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="post-name"><?php echo get_the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>
                <div class="col-md-4">
                    <h4 class="post-name"><?php echo esc_html__('Info ','niva'); ?></h4>
                    <div class="row">
                    	<div class="portfolio-meta clearfix">
                            <div class="col-md-12">
                                <label><?php echo esc_html__('Category:','niva'); ?></label>
                                <?php if(!empty($st_projects_category)) { ?>
                                    <?php echo wp_kses_post($st_projects_category); ?>
                                <?php } ?> 
                            </div>
                        </div>
                        <div class="portfolio-meta clearfix">
                            <div class="col-md-12">
                                <label><?php echo esc_html__('Date:','niva'); ?></label>
                                <?php echo get_the_date(get_option( 'date_format' )); ?>
                            </div>
                        </div>
                        <div class="portfolio-meta clearfix">
                            <div class="col-md-12">
                                <label><?php echo esc_html__('Tags:','niva'); ?></label>
                                <?php if(!empty($st_project_tags)) { ?>
                                    <?php echo esc_html($st_project_tags); ?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="portfolio-meta clearfix">
                            <div class="col-md-12">
                                <label><?php echo esc_html__('Client:','niva'); ?></label>
                                <?php if(!empty($st_client_name)) { ?>
                                    <?php echo esc_html($st_client_name); ?>
                                <?php } ?>
                            </div>
                        </div>  
                        <div class="portfolio-social clearfix">
                        	<div class="col-md-12">
                        		<label class="post-name-social"><?php echo esc_html__('Follow  ','niva'); ?></label>
						        <ul class="social-links">
						          <?php if ( niva('mt_social_fb') && niva('mt_social_fb') != '' ) { ?>
						            <li><a href="<?php echo esc_url( niva('mt_social_fb') ) ?>"><i class="fa fa-facebook"></i></a></li>
						          <?php } ?>
						          <?php if ( niva('mt_social_tw') && niva('mt_social_tw') != '' ) { ?>
						            <li><a href="https://twitter.com/<?php echo esc_attr( niva('mt_social_tw') ) ?>"><i class="fa fa-twitter"></i></a></li>
						          <?php } ?>
						          <?php if ( niva('mt_social_gplus') && niva('mt_social_gplus') != '' ) { ?>
						            <li><a href="<?php echo esc_url( niva('mt_social_gplus') ) ?>"><i class="fa fa-google-plus"></i></a></li>
						          <?php } ?>
						          <?php if ( niva('mt_social_youtube') && niva('mt_social_youtube') != '' ) { ?>
						            <li><a href="<?php echo esc_url( niva('mt_social_youtube') ) ?>"><i class="fa fa-youtube"></i></a></li>
						          <?php } ?>
						          <?php if ( niva('mt_social_pinterest') && niva('mt_social_pinterest') != '' ) { ?>
						            <li><a href="<?php echo esc_url( niva('mt_social_pinterest') ) ?>"><i class="fa fa-pinterest"></i></a></li>
						          <?php } ?>
						          <?php if ( niva('mt_social_linkedin') && niva('mt_social_linkedin') != '' ) { ?>
						            <li><a href="<?php echo esc_url( niva('mt_social_linkedin') ) ?>"><i class="fa fa-linkedin"></i></a></li>
						          <?php } ?>
						          <?php if ( niva('mt_social_skype') && niva('mt_social_skype') != '' ) { ?>
						            <li><a href="<?php echo esc_url( niva('mt_social_skype') ) ?>"><i class="fa fa-skype"></i></a></li>
						          <?php } ?>
						          <?php if ( niva('mt_social_instagram') && niva('mt_social_instagram') != '' ) { ?>
						            <li><a href="<?php echo esc_url( niva('mt_social_instagram') ) ?>"><i class="fa fa-instagram"></i></a></li>
						          <?php } ?>
						          <?php if ( niva('mt_social_dribbble') && niva('mt_social_dribbble') != '' ) { ?>
						            <li><a href="<?php echo esc_url( niva('mt_social_dribbble') ) ?>"><i class="fa fa-dribbble"></i></a></li>
						          <?php } ?>
						          <?php if ( niva('mt_social_deviantart') && niva('mt_social_deviantart') != '' ) { ?>
						            <li><a href="<?php echo esc_url( niva('mt_social_deviantart') ) ?>"><i class="fa fa-deviantart"></i></a></li>
						          <?php } ?>
						          <?php if ( niva('mt_social_digg') && niva('mt_social_digg') != '' ) { ?>
						            <li><a href="<?php echo esc_url( niva('mt_social_digg') ) ?>"><i class="fa fa-digg"></i></a></li>
						          <?php } ?>
						          <?php if ( niva('mt_social_flickr') && niva('mt_social_flickr') != '' ) { ?>
						            <li><a href="<?php echo esc_url( niva('mt_social_flickr') ) ?>"><i class="fa fa-flickr"></i></a></li>
						          <?php } ?>
						          <?php if ( niva('mt_social_stumbleupon') && niva('mt_social_stumbleupon') != '' ) { ?>
						            <li><a href="<?php echo esc_url( niva('mt_social_stumbleupon') ) ?>"><i class="fa fa-stumbleupon"></i></a></li>
						          <?php } ?>
						          <?php if ( niva('mt_social_tumblr') && niva('mt_social_tumblr') != '' ) { ?>
						            <li><a href="<?php echo esc_url( niva('mt_social_tumblr') ) ?>"><i class="fa fa-tumblr"></i></a></li>
						          <?php } ?>
						          <?php if ( niva('mt_social_vimeo') && niva('mt_social_vimeo') != '' ) { ?>
						            <li><a href="<?php echo esc_url( niva('mt_social_vimeo') ) ?>"><i class="fa fa-vimeo-square"></i></a></li>
						          <?php } ?>
						          <?php if ( niva('mt_social_behance') && niva('mt_social_behance') != '' ) { ?>
						            <li><a href="<?php echo esc_url( niva('mt_social_behance') ) ?>"><i class="fa fa-behance"></i></a></li>
						          <?php } ?>
						        </ul>
					    	</div>
					    </div>
                    </div>
                </div>            
            </div>
        </div>
    </div>


    <!-- GALLERY -->
    <div class="clearfix"></div>
    <div class="container">
        <div class="st-portfolio-images">

            <div class="gallery-listing row">
       
               <?php

                // EXTRA IMAGES
                global  $dynamic_featured_image;
                $featured_images = $dynamic_featured_image->get_featured_images( get_the_ID() );

                //Loop through the image to display your image
                if( !is_null($featured_images) ){
                    $medias = array();
                    foreach($featured_images as $images){
                        $attachment_id = $images['attachment_id'];
                        $medias[] = $attachment_id;
                    }
                    foreach($medias as $media){
                        $multiple_featured_images = wp_get_attachment_image_src( $media, 'niva_project_1050x1050' )[0];
                        $multiple_featured_urls = wp_get_attachment_url( $media, 'full' );

                        echo '<div class="col-md-6">';
                            echo '<a href="'.esc_url($multiple_featured_urls).'">';
                                echo '<img src="'.esc_url($multiple_featured_images).'" alt="'.get_permalink(get_the_ID()).'" />';
                            echo '</a>';
                        echo '</div>';

                    }
                } 
                ?>
            
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row section-related-projects">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-portfolio-images">
                    <div class="related-posts sticky-posts">
                        <h1 class="post-name"><?php echo esc_html__('Related Projects','porfoliowp'); ?></h1>
                        <div class="row">
                            <?php  
                            $args=array(  
                                'post__not_in'          => array(get_the_ID()),  
                                'post_type'             => 'st_projects',
                                'posts_per_page'        => 3, // Number of related posts to display.  
                                'ignore_sticky_posts'   => 1  
                            );  

                            $related_query = new wp_query( $args );  

                            while( $related_query->have_posts() ) {  
                                $related_query->the_post(); ?>  
                                <div class="col-md-4 post">
                                    <div class="related_project">
                                        <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'niva_projects_listing' ); ?>
                                        <?php if($thumbnail_src){ ?>
                                            <a href="<?php the_permalink(); ?>" class="relative">
                                                <?php if($thumbnail_src) { ?>
                                                    <img src="<?php echo esc_attr($thumbnail_src[0]); ?>" class="img-responsive related-img" alt="<?php the_title(); ?>" />
                                                <?php } ?>
                                            </a>
                                        <?php } ?>
                                        <div class="related_project_details">
                                            <h4 class="portfolio-name">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h4>
                                            <div class="portfolio-posted-in">
                                                <?php echo get_the_term_list( get_the_ID(), 'st-projects-category', '', ', ' ); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                    <?php 
                    wp_reset_postdata();  
                    ?>  
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
    	<div class="row">
		    <div class="prev-next-post">
			    <?php if($prev_post){ ?>
			        <div class="col-md-6 btn-action-icon prev-post text-right">
			            <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
			                <i class="icon-arrow-left-circle icons"></i>
			            </a>
			        </div>
			    <?php } ?>

			    <?php if($next_post){ ?>
			        <div class="col-md-6 btn-action-icon next-post text-left">
			            <a href="<?php echo get_permalink( $next_post->ID ); ?>">
			                <i class="icon-arrow-right-circle icons"></i>
			            </a>
			        </div>
			    <?php } ?>
			</div>
    	</div>
    </div>

</article>