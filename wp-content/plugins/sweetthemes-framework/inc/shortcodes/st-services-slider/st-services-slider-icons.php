<?php 
require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');
/**
||-> Shortcode: Info boxes
*/
function st_shortcode_services_domains($params,  $content = NULL) {
    extract( shortcode_atts( 
        array(

          'el_class'  => '',
           'animation' => '',

        ), $params ) );

    $services_domains = '';

    $animation_final = '';
    if(!empty($animation)) {
        $animation_final = 'wow ' . $animation;
    }

    $services_domains .= '<div class="'.$animation_final.' services_domains_shortcode_parent '.$el_class.'">';
        $services_domains .= do_shortcode($content);
    $services_domains .= '</div>'; 

    return $services_domains;
}
add_shortcode('st_shortcode_services_domains_short', 'st_shortcode_services_domains');
/**
||-> Shortcode: Child Shortcode v1
*/
function st_shortcode_services_domains_items($params, $content = NULL) {

    extract( shortcode_atts( 
        array(

            'heading1'          => '',
            'heading2'          => '',
            'buton_link'          => '',
            'image'          => '',

          
        
        ), $params ) );



    $html = '';

    $thumb      = wp_get_attachment_image_src($image, "full");
    $thumb_src  = $thumb[0];

    $html .= '<div class="cat-service-parent">';
      $html .= '<a href="'.$buton_link.'">';
        
        $html .= '<div class="cat-service">';
          $html .= '<img src="'.$thumb_src.'" />';
        $html .= '</div>';

        $html .= '<div class="cat-service-element">';
          $html .= '<h3>'.$heading1.'</h3>';
          $html .= '<h4>'.$heading2.'</h4>';
        $html .= '</div>';
    
      $html .= '</a>';
    $html .= '</div>';
    return $html;
}
add_shortcode('st_shortcode_services_domains_short_item', 'st_shortcode_services_domains_items');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    //require_once('../vc-shortcodes.inc.arrays.php');
    //Register "container" content element. It will hold all your inner (child) content elements
    vc_map( array(
        "name" => esc_attr__("ST - Services slider icons", 'sweetthemes'),
        "base" => "st_shortcode_services_domains_short",
        "as_parent" => array('only' => 'st_shortcode_services_domains_short_item'), 
        "content_element" => true,
        "show_settings_on_create" => true,
        "icon" => "venor_shortcode",
        "category" => esc_attr__('ST: SweetThemes', 'sweetthemes'),
        "is_container" => true,
        "params" => array(
            // add params same as with any other content element
          array(
               "group" => "Options",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Custom Class", 'sweetthemes'),
               "param_name" => "el_class",
               "value" => "",
               "description" => ""
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
        ),
        "js_view" => 'VcColumnView'
    ) );
    vc_map( array(
        "name" => esc_attr__("Info Box Item", 'sweetthemes'),
        "base" => "st_shortcode_services_domains_short_item",
        "content_element" => true,
        "as_child" => array('only' => 'st_shortcode_services_domains_short'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
            // add params same as with any other content element

            array(
               "group" => "Options",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Heading1", 'sweetthemes'),
               "param_name" => "heading1",
               "value" => "",
               "description" => ""
            ),
            array(
               "group" => "Options",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Heading2", 'sweetthemes'),
               "param_name" => "heading2",
               "value" => "",
               "description" => ""
            ),
            array(
               "group" => "Options",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Buton link", 'sweetthemes'),
               "param_name" => "buton_link",
               "value" => "",
               "description" => ""
            ),
            array(
              "group" => "Options",
              "type" => "attach_images",
              "heading" => esc_attr__("Image", 'sweetthemes'),
              "param_name" => "image",
              "std" => '',
              "holder" => "div",
              "class" => "",
              "description" => ""
             ),

  
           
        )
    ) );
    //Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_st_shortcode_services_domains_short extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_st_shortcode_services_domains_short_item extends WPBakeryShortCode {
        }
    }
}
?>