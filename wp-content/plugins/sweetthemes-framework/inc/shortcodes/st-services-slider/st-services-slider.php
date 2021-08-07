<?php 
/**
||-> Shortcode: Services Slider
*/
function sweetthemes_shortcode_services_slider($params, $content) {
    extract( shortcode_atts( 
        array(
            'number'              =>'',
            'animation' => '',
        ), $params ) );
    
    $html = '';
    $html .= '<div class="services-slider">';
    $html .= '<div class="services-slider-holder">';
    
    $args_services = array(
            'posts_per_page'   => $number,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'post_type'        => 'st_services',
            'post_status'      => 'publish' 
            ); 
    
    $services = get_posts($args_services);
    
    $animation_final = '';
    if(!empty($animation)) {
        $animation_final = 'wow ' . $animation;
    }
    
    foreach ($services as $service) {
        #thumbnail
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $service->ID ),'sweetthemes_services_slider' );
        
        $content_post   = get_post($service->ID);
        $content        = $content_post->post_content;
        $content        = apply_filters('the_content', $content);
        $content        = str_replace(']]>', ']]&gt;', $content);

        $html.='<div class="row '.$animation_final.' ">
                  <div class="col-xs-12 col-md-7 services-col1">
                      <h3 class="service-name">'.get_the_title($service->ID).'</h3>
                      <div class="description">'.$content.'</div>
                      <div class="navigation-services-slider">
                          <span class="prev-item"></span>
                          <span class="next-item"></span>
                      </div>
                  </div>
                  <div style="background-image: url('.esc_url($thumbnail_src[0]).')" class="col-md-7 col-xs-12 services-col2" draggable="false"></div>
                </div>';
    }
    $html .= '</div>';
    $html .= '</div>';
    
    return $html;
}
add_shortcode('services_slider', 'sweetthemes_shortcode_services_slider');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( array(
     "name" => esc_attr__("ST - Services Slider", 'sweetthemes'),
     "base" => "services_slider",
     "category" => esc_attr__('ST: SweetThemes', 'sweetthemes'),
     "icon" => "niva_shortcode",
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