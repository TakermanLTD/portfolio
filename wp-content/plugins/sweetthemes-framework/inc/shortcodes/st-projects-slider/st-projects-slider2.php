<?php 
/**
||-> Shortcode: Projects Listing
*/
function sweetthemes_shortcode_projects_slider2($params, $content) {
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

    $html .= '<div class="projects-slider-list2-wrapper">';

      $categories = get_terms( 'st-projects-category', array('orderby' => 'count','order' => 'DESC', 'hide_empty' => 0) );
/*      $html .= '<div class="projects-slider-list2-filters">';
          $html .= '<ul class="projects-filters '.$animation_final.'">';

            $html .= '<li class="filter-all"><a class="selected" data-type="all">All</a></li>';
            foreach($categories as $category){   
                $query = new WP_Query([
                          'posts_per_page' => -1,
                          'post_type' => 'st_projects',
                          'tax_query' => [
                              [
                                  'taxonomy' => 'st-projects-category',
                                  'terms' => $category->term_id,
                                  'field' => 'id'
                              ]
                          ]
                      ]);

                $html .= '<li data-filter="'.esc_attr($category->slug).'">
                      <a>'.esc_attr($category->name).'</a>';
                $html .= '</li>';
            }
          $html .= '</ul>';
      $html .= '</div>';*/

      $html .= '<div class="projects-slider-list2 projects-posts-list-shortcode2">';


          
        
        foreach ($projects as $project) {
         
          $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $project->ID ), 'full' );
          $project_link_title = get_permalink($project->ID);
          if ($thumbnail_src) {
            $post_img = '<img class="project_post_image" src="'. esc_url($thumbnail_src[0]) . '" alt="'.$project->post_title.'" />';
          }else{
            $post_img = '';
          }


          $term_list = wp_get_post_terms($project->ID, 'st-projects-category');
          $cat_slugs = implode(' ',wp_list_pluck($term_list,'slug'));
          //$term_list = wp_get_post_terms($project->ID, 'st-projects-category');
          

    
          $html.='<div class="'.$cat_slugs.' col-project col-xs-12 '.$animation_final.'" data-wow-delay="'.$count.'s">    
                    <a href="'.esc_url($project_link_title).'">
                      <div class="box-project">     
                        <div class="image-container" style="background-image:url('. esc_url($thumbnail_src[0]) . ');"></div>   
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

       $html .= '';

    $html .= '</div>';
    return $html;
}
add_shortcode('projects_slider2', 'sweetthemes_shortcode_projects_slider2');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
  require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';
  vc_map( array(
     "name" => esc_attr__("ST - Projects Slider2", 'sweetthemes'),
     "base" => "projects_slider2",
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