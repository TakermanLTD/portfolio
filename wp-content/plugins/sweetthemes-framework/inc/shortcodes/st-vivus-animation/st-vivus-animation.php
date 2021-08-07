<?php
/**
||-> Shortcode: Static
*/
function sweetthemes_st_vivus_animation_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'icon_name'          => '',
            'icon_url'          => '',
            'animation' => '',
        ), $params ) );
    
    $html = '';
    $html .= '<div id="'.esc_html($icon_name).'" class="vivus-icon">';
        if($animation == 'off') {
            $html .= '<img alt="svg-vivus" src="'.esc_url($icon_url).'">';
        } else {
          $html .= '<script>';
            $html .= 'new Vivus("'.esc_html($icon_name).'", {duration: 100, file: "'.esc_url($icon_url).'"});';
          $html .= '</script>';
        }
        
    $html .= '</div>';
    return $html;
}
add_shortcode('st_vivus_animation', 'sweetthemes_st_vivus_animation_shortcode');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
  require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';
  vc_map( array(
     "name" => esc_attr__("ST - Vivus Animation", 'sweetthemes'),
     "base" => "st_vivus_animation",
     "category" => esc_attr__('ST: SweetThemes', 'sweetthemes'),
     "icon" => "niva_shortcode",
     "params" => array(
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Icon name", 'sweetthemes'),
           "param_name" => "icon_name",
           "value" => "",
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Icon url", 'sweetthemes'),
           "param_name" => "icon_url",
           "value" => "",
           "description" => ""
        ),
        array(
            "group" => "Options",
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__("Animation Status", 'sweetthemes'),
            "param_name" => "animation",
            "std" => 'on',
            "description" => "",
            "value" => array(
                esc_attr__('On', 'sweetthemes')     => 'on',
                esc_attr__('Off', 'sweetthemes')    => 'off'
            )
        ),
     )
  ));
}