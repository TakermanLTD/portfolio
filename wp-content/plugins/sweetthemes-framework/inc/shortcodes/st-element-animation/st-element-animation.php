<?php
/**
||-> Shortcode: ELement animation
*/
function sweetthemes_shortcode_element_animation($params, $content) {
    extract( shortcode_atts( 
        array(
            'element_image'                 => '',
            'max_width'                 => '',
            'element_position' => '',
            'element_position_top' => '',
            'element_position_bottom' => '',
            'element_position_right' => '',
            'element_position_left' => '',

            'element_spacing_top' => '',
            'element_spacing_bottom' => '',
            'element_spacing_right' => '',
            'element_spacing_left' => '',

            'element_class'              => '',
            'element_class_parent'              => '',

            'animation' => '',
        ), $params ) );


    $animation_final = '';
    if(!empty($animation)) {
        $animation_final = 'wow ' . $animation;
    }

    $element_image_src  = wp_get_attachment_image_src($element_image, "full");

    $html = '';

    $max_width_style = '';
    if($max_width) {
        $max_width_style = 'width:'.$max_width.';';
    }

    $element_position_style = '';
    if($element_position) {
        $element_position_style = 'position:'.$element_position.';';
    }

    $element_position_top_style = '';
    if($element_position_top) {
        $element_position_top_style = 'top:'.$element_position_top.';';
    }

    $element_position_bottom_style = '';
    if($element_position_bottom) {
        $element_position_bottom_style = 'bottom:'.$element_position_bottom.';';
    }

    $element_position_right_style = '';
    if($element_position_right) {
        $element_position_right_style = 'right:'.$element_position_right.';';
    }

    $element_position_left_style = '';
    if($element_position_left) {
        $element_position_left_style = 'left:'.$element_position_left.';';
    }

    $element_spacing_top_style = '';
    if($element_spacing_top) {
        $element_spacing_top_style = 'margin-top:'.$element_spacing_top.';';
    }

    $element_spacing_bottom_style = '';
    if($element_spacing_bottom) {
        $element_spacing_bottom_style = 'margin-bottom:'.$element_spacing_bottom.';';
    }

    $element_spacing_right_style = '';
    if($element_spacing_right) {
        $element_spacing_right_style = 'margin-right:'.$element_spacing_right.';';
    }

    $element_spacing_left_style = '';
    if($element_spacing_left) {
        $element_spacing_left_style = 'margin-left:'.$element_spacing_left.';';
    }

    $html .= '<div class="element-animation-section  '.$animation_final.' '.$element_class_parent.'">';
      $html .= '<img class="element_image_animation '.$element_class.'" draggable="false" style="'.$max_width_style.$element_position_style.$element_position_top_style.$element_position_bottom_style.$element_position_right_style.$element_position_left_style. $element_spacing_top_style.$element_spacing_bottom_style.$element_spacing_right_style.$element_spacing_left_style.'" src="'.esc_url($element_image_src[0]).'" alt=""></a>';
    $html .= '</div>';

    return $html;
}
add_shortcode('shortcode_element_animation', 'sweetthemes_shortcode_element_animation');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';
    vc_map( array(
     "name" => esc_attr__("ST - Element animation", 'sweetthemes'),
     "base" => "shortcode_element_animation",
     "category" => esc_attr__('MT: SweetThemes', 'sweetthemes'),
     "icon" => "quin_shortcode",
     "params" => array(
        array(
          "group" => "Options",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'sweetthemes' ),
          "param_name" => "element_image",
          "value" => "",
          "description" => esc_attr__( "Choose image for animation", 'sweetthemes' )
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Width image", 'sweetthemes'),
           "param_name" => "max_width",
           "value" => esc_attr__("", 'sweetthemes'),
           "description" => ""
        ),
        array(
           "group" => "Position",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Postion", 'sweetthemes'),
           "param_name" => "element_position",
           "value" => esc_attr__("", 'sweetthemes'),
           "description" => "Relative or absolute"
        ),
        array(
           "group" => "Position",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Postion top", 'sweetthemes'),
           "param_name" => "element_position_top",
           "value" => esc_attr__("", 'sweetthemes'),
           "description" => ""
        ),
        array(
           "group" => "Position",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Postion bottom", 'sweetthemes'),
           "param_name" => "element_position_bottom",
           "value" => esc_attr__("", 'sweetthemes'),
           "description" => ""
        ),
        array(
           "group" => "Position",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Postion right", 'sweetthemes'),
           "param_name" => "element_position_right",
           "value" => esc_attr__("", 'sweetthemes'),
           "description" => ""
        ),
        array(
           "group" => "Position",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Postion left", 'sweetthemes'),
           "param_name" => "element_position_left",
           "value" => esc_attr__("", 'sweetthemes'),
           "description" => ""
        ),
        array(
           "group" => "Spacing",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Spacing top", 'sweetthemes'),
           "param_name" => "element_spacing_top",
           "value" => esc_attr__("", 'sweetthemes'),
           "description" => ""
        ),
        array(
           "group" => "Spacing",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Spacing bottom", 'sweetthemes'),
           "param_name" => "element_spacing_bottom",
           "value" => esc_attr__("", 'sweetthemes'),
           "description" => ""
        ),
        array(
           "group" => "Spacing",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Spacing right", 'sweetthemes'),
           "param_name" => "element_spacing_right",
           "value" => esc_attr__("", 'sweetthemes'),
           "description" => ""
        ),
        array(
           "group" => "Spacing",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Spacing left", 'sweetthemes'),
           "param_name" => "element_spacing_left",
           "value" => esc_attr__("", 'sweetthemes'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Animation class", 'sweetthemes'),
           "param_name" => "element_class",
           "value" => esc_attr__("", 'sweetthemes'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Custom class parent", 'sweetthemes'),
           "param_name" => "element_class_parent",
           "value" => esc_attr__("", 'sweetthemes'),
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
      )));
}
?>