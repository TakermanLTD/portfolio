<?php
require_once(__DIR__ . '/../vc-shortcodes.inc.arrays.php');
/**
||-> Shortcode: Title and Subtitle
*/
function sweetthemes_heading_left_shortcode($params, $content)
{
    extract(shortcode_atts(array(
        'title' => '',
        'title2' => '',
        'subtitle' => '',
        'subtitle2' => '',
        'title_color' => '',
        'subtitle_color' => '',
        'element_align' => '',
        'element_position' => '',
        'element_position_top' => '',
        'element_position_bottom' => '',
        'element_position_right' => '',
        'element_position_left' => '',

        'subtitle_position' => '',
        'subtitle_position_top' => '',
        'subtitle_position_bottom' => '',
        'subtitle_position_right' => '',
        'subtitle_position_left' => '',

        'animation' => '',
    ), $params));

    $animation_final = '';
    if(!empty($animation)) {
        $animation_final = 'wow ' . $animation;
    }

    $element_align_style = '';
    if($element_align) {
        $element_align_style = 'float:'.$element_align.';';
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

    //subtitle

    $subtitle_position_style = '';
    if($subtitle_position) {
        $subtitle_position_style = 'position:'.$subtitle_position.';';
    }

    $subtitle_position_top_style = '';
    if($subtitle_position_top) {
        $subtitle_position_top_style = 'top:'.$subtitle_position_top.';';
    }

    $subtitle_position_bottom_style = '';
    if($subtitle_position_bottom) {
        $subtitle_position_bottom_style = 'bottom:'.$subtitle_position_bottom.';';
    }

    $subtitle_position_right_style = '';
    if($subtitle_position_right) {
        $subtitle_position_right_style = 'right:'.$subtitle_position_right.';';
    }

    $subtitle_position_left_style = '';
    if($subtitle_position_left) {
        $subtitle_position_left_style = 'left:'.$subtitle_position_left.';';
    }



    $content = '<div style="'.$element_position_style.$element_position_top_style.$element_position_bottom_style.$element_position_right_style.$element_position_left_style.$element_align_style.'" class="title1-holder">';
        $title2_holder = '';
        if(!empty($title2)) {
            $title2_holder = '<span style="color:'.$title_color.'">'.$title2.'</span>';
        }
        if(!empty($title)) {
            $content .= '<h2 style="color:'.$title_color.'" class="title1-name ' .$animation_final . '" style="">' . $title . $title2_holder . '</h2>';
        }
        $content .= '<div style="color:'.$subtitle_color.';'.$subtitle_position_style.$subtitle_position_top_style.$subtitle_position_bottom_style.$subtitle_position_right_style.$subtitle_position_left_style.'" class="title1-motto ' .$animation_final . '">' . $subtitle . '</br>'. $subtitle2 . '</div>';
    $content .= '</div>';
    $content .= '<div class="clearfix"></div>';
    return $content;
}
add_shortcode('heading_left', 'sweetthemes_heading_left_shortcode');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if (is_plugin_active('js_composer/js_composer.php')) {
    vc_map(array(
        "name" => esc_attr__("ST - Heading Left", 'sweetthemes'),
        "base" => "heading_left",
        "category" => esc_attr__('ST: SweetThemes', 'sweetthemes'),
        "icon" => "quin_shortcode",
        "params" => array(
            array(
                "group" => "Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Section title", 'sweetthemes'),
                "param_name" => "title",
                "value" => "",
                "description" => ""
            ),
            array(
                "group" => "Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Section title 2 (optional)", 'sweetthemes'),
                "param_name" => "title2",
                "value" => "",
                "description" => ""
            ),
            array(
                "group" => "Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Section subtitle", 'sweetthemes'),
                "param_name" => "subtitle",
                "value" => "",
                "description" => ""
            ),
            array(
                "group" => "Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Section subtitle 2", 'sweetthemes'),
                "param_name" => "subtitle2",
                "value" => "",
                "description" => ""
            ),
            array(
               "group" => "Styling",
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Title color", 'sweetthemes'),
               "param_name" => "title_color",
               "value" => esc_attr__("", 'sweetthemes'),
               "description" => ""
            ),
            array(
               "group" => "Styling",
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Subtitle color", 'sweetthemes'),
               "param_name" => "subtitle_color",
               "value" => esc_attr__("", 'sweetthemes'),
               "description" => ""
            ),
            array(
               "group" => "Position Parent",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Align Element", 'sweetthemes'),
               "param_name" => "element_align",
               "value" => esc_attr__("", 'sweetthemes'),
               "description" => "none, left or right"
            ),
            array(
               "group" => "Position Parent",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Position Element", 'sweetthemes'),
               "param_name" => "element_position",
               "value" => esc_attr__("", 'sweetthemes'),
               "description" => "Relative or absolute"
            ),
            array(
               "group" => "Position Parent",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Position Element - top", 'sweetthemes'),
               "param_name" => "element_position_top",
               "value" => esc_attr__("", 'sweetthemes'),
               "description" => ""
            ),
            array(
               "group" => "Position Parent",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Position Element - bottom", 'sweetthemes'),
               "param_name" => "element_position_bottom",
               "value" => esc_attr__("", 'sweetthemes'),
               "description" => ""
            ),
            array(
               "group" => "Position Parent",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Position Element - right", 'sweetthemes'),
               "param_name" => "element_position_right",
               "value" => esc_attr__("", 'sweetthemes'),
               "description" => ""
            ),
            array(
               "group" => "Position Parent",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Position Element - left", 'sweetthemes'),
               "param_name" => "element_position_left",
               "value" => esc_attr__("", 'sweetthemes'),
               "description" => ""
            ),

            array(
               "group" => "Position Subtitle",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Position Subtitle", 'sweetthemes'),
               "param_name" => "subtitle_position",
               "value" => esc_attr__("", 'sweetthemes'),
               "description" => "Relative or absolute"
            ),
            array(
               "group" => "Position Subtitle",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Position Subtitle - top", 'sweetthemes'),
               "param_name" => "subtitle_position_top",
               "value" => esc_attr__("", 'sweetthemes'),
               "description" => ""
            ),
            array(
               "group" => "Position Subtitle",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Position Subtitle - bottom", 'sweetthemes'),
               "param_name" => "subtitle_position_bottom",
               "value" => esc_attr__("", 'sweetthemes'),
               "description" => ""
            ),
            array(
               "group" => "Position Subtitle",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Position Subtitle - right", 'sweetthemes'),
               "param_name" => "subtitle_position_right",
               "value" => esc_attr__("", 'sweetthemes'),
               "description" => ""
            ),
            array(
               "group" => "Position Subtitle",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Position Subtitle - left", 'sweetthemes'),
               "param_name" => "subtitle_position_left",
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
        )
    ));
}
?>