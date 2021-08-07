<?php 
/**
* Template for Projects
**/
?>
<div class="col-project col-md-4 col-sm-4 col-xs-6"> 

	<?php 

		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'niva_projects_listing' );
		$project_link_title = get_permalink(get_the_ID());
		
		if ($thumbnail_src) {
			$post_img = '<img class="project_post_image" src="'. esc_url($thumbnail_src[0]) . '" alt="<?php the_title_attribute(); ?>" />';
		}else{
			$post_img = '';
		}
		$term_list = wp_get_post_terms(get_the_ID(), 'st-projects-category');

	?>
	                                     
    <div class="box-project">                              
	    <div class="image-container"><?php echo $post_img;  ?></div>   
	    <div class="project_cat_title_overlay">
	      	<div class="project_cat_title_overlay_items">   
		        <h3 class="project_title">
		          <a href="#" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		        </h3>             
		        <h5 class="project_cat">
		           	<?php echo get_the_term_list( get_the_ID(), 'st-projects-category', ' ', ', ' ); ?>
		        </h5>                          
	      	</div>
	    </div>
	</div>

	<a class="link-project" href="<?php the_permalink(); ?>" target="_self"></a>
        
</div>