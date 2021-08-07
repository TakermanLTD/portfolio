<?php
/**
||-> Shortcode: Typed
*/
function sweetthemes_mt_typed_text_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'texts'          => '',
            'font_size'          => '',
            'line_height'          => '',
            'letter_spacing'       => '',
            'aftertext'      => '',
            'beforetext'     => '',
            'typed_text_color' => '',
            'before_after_color' => '',
            'typespeed'          => '',
            'backdelay'          => '',
        ), $params ) );
    $typed_unique_id = 'mt_typed_text_'.uniqid();

    $typed_unique_id123 = 'mt_typed_text123_'.uniqid();
    $skill = '';
    $skill .= '<script>
                jQuery(function(){
                    jQuery(".'.esc_attr($typed_unique_id).'").typed({
                      strings: ['.$texts.'],
                      typeSpeed: '.$typespeed.',
                      backDelay: '.$backdelay.',
                      loop: true
                    });
                });
              </script>';

    $skill .= '<style>';
      $skill .= '.parent-typed-text.'.$typed_unique_id123.' .mt_typed_text { '; 
        $skill .= 'color:'.$typed_text_color.' !important;'; 
      $skill .= '}';   
    $skill .= '</style>';         

    $skill .= '<div class="parent-typed-text '.$typed_unique_id123.'" style="font-size:'.$font_size.'; line-height:'.$line_height.'; letter-spacing:'.$letter_spacing.'">';
      $skill .= '<span class="mt_typed-beforetext" style="color:'.$before_after_color.'">'.$beforetext.' </span>';
      $skill .= '<span class="mt_typed_text '.esc_attr($typed_unique_id).'"></span>';
      $skill .= '<span class="mt_typed-aftertext" style="color:'.$before_after_color.'"> '.$aftertext.'</span>';
    $skill .= '</div>';
    return $skill;
}
add_shortcode('mt_typed_text', 'sweetthemes_mt_typed_text_shortcode');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
  require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';
  vc_map( array(
     "name" => esc_attr__("ST - Typed Text", 'sweetthemes'),
     "base" => "mt_typed_text",
     "category" => esc_attr__('ST: SweetThemes', 'sweetthemes'),
     "icon" => "quin_shortcode",
     "params" => array(
        array(
           "group" => "Options",
           "type" => "textarea",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Texts", 'sweetthemes'),
           "param_name" => "texts",
           "value" => "",
           "description" => "Eg: 'String Text 1', 'String Text 2', 'String Text 3'"
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Font Size", 'sweetthemes'),
           "param_name" => "font_size",
           "value" => "",
           "description" => "Eg: '90px'",
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Line Height", 'sweetthemes'),
           "param_name" => "line_height",
           "value" => "",
           "description" => "Eg: '90px'",
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Letter Spacing", 'sweetthemes'),
           "param_name" => "letter_spacing",
           "value" => "",
           "description" => "Eg: '-5px'",
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Before text", 'sweetthemes'),
           "param_name" => "beforetext",
           "value" => "",
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("After text", 'sweetthemes'),
           "param_name" => "aftertext",
           "value" => "",
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Type Speed", 'sweetthemes'),
           "param_name" => "typespeed",
           "value" => "0",
           "description" => "Default: 0"
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Time Before Backspacing", 'sweetthemes'),
           "param_name" => "backdelay",
           "value" => "500",
           "description" => "Default: 500 (Which is 0.5s)"
        ),
        array(
           "group" => "Styling",
           "type" => "colorpicker",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Typed text color", 'sweetthemes'),
           "param_name" => "typed_text_color",
           "value" => "",
           "description" => ""
        ),
        array(
           "group" => "Styling",
           "type" => "colorpicker",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Before, after text color", 'sweetthemes'),
           "param_name" => "before_after_color",
           "value" => "",
           "description" => ""
        ),
     )
  ));
}