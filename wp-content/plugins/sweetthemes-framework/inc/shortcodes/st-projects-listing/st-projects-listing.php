<?php 
/**
||-> Shortcode: Projects Listing
*/
function sweetthemes_shortcode_project_listing($params, $content) {
    extract( shortcode_atts( 
        array(
            'number'              =>'',
            'view_all_text'       =>'',
            'view_all_link'       =>'',
        ), $params ) );
    $args_projects = array(
            'posts_per_page'   => $number,
            'order'            => 'DESC',
            'post_type'        => 'st_projects',
            'post_status'      => 'publish' 
    ); 
    $projects = get_posts($args_projects);
    $sticky_class = '';
    if ( is_sticky(get_the_ID()) ) {
        $sticky_class = 'is-sticky';
    }  
    $categories = get_terms( 'st-projects-category', array('orderby' => 'count','order' => 'DESC', 'hide_empty' => 0) );
    $html = '';
    $html .= '<div class="projects-posts-list projects-posts-list-shortcode">';
      $html .= '<div class="projects-listing">';

        $html .= '<a class="active" href="'.esc_url($view_all_link).'">'.esc_html($view_all_text).'</a>';
        foreach($categories as $category){    
          $html .= '<a href="'.esc_url(get_term_link($category)).'">'.esc_attr($category->name).'</a>';
        }
      $html .= '</div>';
      $html .= '<div class="grid-projects row">';
        foreach ($projects as $project) {
          $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $project->ID ), 'niva_projects_listing' );
          $project_link_title = get_permalink($project->ID);
          if ($thumbnail_src) {
            $post_img = '<img class="project_post_image" src="'. esc_url($thumbnail_src[0]) . '" alt="'.$project->post_title.'" />';
          }else{
            $post_img = '';
          }
          $term_list = wp_get_post_terms($project->ID, 'st-projects-category');
          $html.='<div class="col-project col-md-4 col-sm-6 col-xs-12">                   
                      <div class="box-project">                              
                        <div class="image-container">'.$post_img.'</div>   
                        <div class="project_cat_title_overlay">
                          <div class="project_cat_title_overlay_items">   
                            <h3 class="project_title">
                              <a href="#" title="'. $project->post_title .'">'.$project->post_title.'</a>
                            </h3>             
                            <h5 class="project_cat">
                              '.get_the_term_list( $project->ID, 'st-projects-category', ' ', ', ' ).'
                            </h5>                          
                          </div>
                        </div>
                      </div>
                    <a class="link-project" href="'.esc_url($project_link_title).'" target="_self"></a>
                  </div>';
        }
      $html .= '</div>';
    $html .= '</div>';
    return $html;
}
add_shortcode('project_listing', 'sweetthemes_shortcode_project_listing');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
  require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';
  vc_map( array(
     "name" => esc_attr__("ST - Projects Listing", 'sweetthemes'),
     "base" => "project_listing",
     "category" => esc_attr__('ST: sweetthemes', 'sweetthemes'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Number of posts", 'sweetthemes' ),
          "param_name" => "number",
          "value" => "",
          "description" => esc_attr__( "Enter number of blog post to show.", 'sweetthemes' )
        ),
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "View all text", 'sweetthemes' ),
          "param_name" => "view_all_text",
          "value" => "",
          "description" => esc_attr__( "Enter the string", 'sweetthemes' )
        ),
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "View all link", 'sweetthemes' ),
          "param_name" => "view_all_link",
          "value" => "",
          "description" => esc_attr__( "Enter the link", 'sweetthemes' )
        ),
      )
  ));
}
?>