<?php
/**
||-> Shortcode: Static
*/
function sweetthemes_st_static_text_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'texts'          => '',
            'align'     => ''
        ), $params ) );
    
    $html = '';
    $html .= '<div class="static-elem">';
      $html .= '<div class="'.esc_attr($align).'">';
        $html .= esc_html__($texts,'sweetthemes');
      $html .= '</div>';
    $html .= '</div>';
    return $html;
}
add_shortcode('st_static_text', 'sweetthemes_st_static_text_shortcode');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
  require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';
  vc_map( array(
     "name" => esc_attr__("MT - Static Text", 'sweetthemes'),
     "base" => "st_static_text",
     "category" => esc_attr__('MT: SweetThemes', 'sweetthemes'),
     "icon" => "niva_shortcode",
     "params" => array(
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Texts", 'sweetthemes'),
           "param_name" => "texts",
           "value" => "",
           "description" => ""
        ),
        array(
            "group" => "Options",
            "type"         => "dropdown",
            "holder"       => "div",
            "class"        => "",
            "param_name"   => "align",
            "std"          => '',
            "heading"      => esc_attr__("Align", 'sweetthemes'),
            "description"  => "",
            "value"        => array(
                esc_attr__('left', 'sweetthemes') => 'left',
                esc_attr__('right', 'sweetthemes')    => 'right',
            )
        )
     )
  ));
}