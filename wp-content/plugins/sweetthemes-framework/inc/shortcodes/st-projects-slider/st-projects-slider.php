<?php 
/**
||-> Shortcode: Projects Listing
*/
function sweetthemes_shortcode_projects_slider($params, $content) {
    extract( shortcode_atts( 
        array(
              'number'              =>'',
              'button_text'         =>'',
              'animation' => '',
        ), $params ) );
    
    $args_projects = array(
            'posts_per_page'   => $number,
            'order'            => 'DESC',
            'post_type'        => 'st_projects',
            'post_status'      => 'publish' 
    ); 
    $animation_final = '';
    if(!empty($animation)) {
        $animation_final = 'wow ' . $animation;
    }
    $projects = get_posts($args_projects);

    $html = '';
    $count = 0;
    $html .= '<div class="projects-slider-list projects-posts-list-shortcode">';
      
      foreach ($projects as $project) {
       
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $project->ID ), 'niva_projects_listing' );
        $project_link_title = get_permalink($project->ID);
        if ($thumbnail_src) {
          $post_img = '<img class="project_post_image" src="'. esc_url($thumbnail_src[0]) . '" alt="'.$project->post_title.'" />';
        }else{
          $post_img = '';
        }
        //$term_list = wp_get_post_terms($project->ID, 'st-projects-category');
        
        $html.='<div class="col-project col-xs-12 '.$animation_final.'" data-wow-delay="'.$count.'s">    
                  <a href="'.esc_url($project_link_title).'">
                    <div class="box-project">     
                      <div class="image-container">'.$post_img.'</div>   
                      <div class="project_cat_title_overlay">
                        <div class="project_cat_title_overlay_items">   
                          <h3 class="project_title">'.$project->post_title.'</h3>        
                          <h5 class="project_cat">
                            '.get_the_term_list( $project->ID, 'st-projects-category', ' ', ', ' ).'
                          </h5>      
                        </div>
                      </div>
                    </div>
                  </a>
                </div>';
                $count = $count + 0.2;

        }

    $html .= '</div>';
    return $html;
}
add_shortcode('projects_slider', 'sweetthemes_shortcode_projects_slider');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
  require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';
  vc_map( array(
     "name" => esc_attr__("ST - Projects Slider", 'sweetthemes'),
     "base" => "projects_slider",
     "category" => esc_attr__('ST: sweetthemes', 'sweetthemes'),
     "icon" => "quin_shortcode",
     "params" => array(
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Number of posts", 'sweetthemes' ),
          "param_name" => "number",
          "value" => "",
          "description" => esc_attr__( "Enter number of blog post to show. -1 value to show all", 'sweetthemes' )
        ),
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Button text", 'sweetthemes' ),
          "param_name" => "button_text",
          "value" => "",
          "description" => esc_attr__( "Set button text", 'sweetthemes' )
        ),
        array(
          "group" => "Animation",
          "type" => "dropdown",
          "heading" => esc_attr__("Animation", 'sweetthemes') ,
          "param_name" => "animation",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $animations_list
        ),
        
        
      )
  ));
}
?>