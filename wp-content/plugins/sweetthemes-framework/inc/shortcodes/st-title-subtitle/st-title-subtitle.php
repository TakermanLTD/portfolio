<?php
require_once(__DIR__ . '/../vc-shortcodes.inc.arrays.php');
/**
||-> Shortcode: Title and Subtitle
*/
function sweetthemes_heading_title_subtitle_shortcode($params, $content)
{
    extract(shortcode_atts(array(
        'title' => '',
        'subtitle' => '',
        'description' => '',
        'title_color' => '',
        'subtitle_color' => '',
        'description_color' => '',
        'border_color' => '',
        'align_title' => '',
        'animation' => '',
    ), $params));
    $animation_final = '';
    if(!empty($animation)) {
        $animation_final = 'wow ' . $animation;
    }
    $content = '<div class="title-subtile-holder '. $align_title . '">';
    $content .= '<h6 class="section-title ' .$animation_final . ' ' . $title_color . '">' . $title . '</h6>';
    $content .= '<h1 class="section-subtitle ' .$animation_final . ' ' . $subtitle_color . '">' . $subtitle . '</h1>';
    $content .= '<p class="section-description ' .$animation_final . ' ' . $description_color . '">' . $description . '</p>';
    $content .= '</div>';
    return $content;
}
add_shortcode('heading_title_subtitle', 'sweetthemes_heading_title_subtitle_shortcode');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if (is_plugin_active('js_composer/js_composer.php')) {
    vc_map(array(
        "name" => esc_attr__("ST - Heading with Title and Subtitle", 'sweetthemes'),
        "base" => "heading_title_subtitle",
        "category" => esc_attr__('ST: SweetThemes', 'sweetthemes'),
        "icon" => "niva_shortcode",
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
                "heading" => esc_attr__("Section description", 'sweetthemes'),
                "param_name" => "description",
                "value" => "",
                "description" => ""
            ),
            array(
                "group" => "Styling",
                "type" => "dropdown",
                "holder" => "div",
                "std" => '',
                "class" => "",
                "heading" => esc_attr__("Title Color", 'sweetthemes'),
                "param_name" => "title_color",
                "description" => "",
                "value" => array(
                    esc_attr__('Light color title for dark section', 'sweetthemes') => 'light_title',
                    esc_attr__('Dark color title for light section', 'sweetthemes') => 'dark_title'
                )
            ),
            array(
                "group" => "Styling",
                "type" => "dropdown",
                "holder" => "div",
                "std" => '',
                "class" => "",
                "heading" => esc_attr__("Subtitle Color", 'sweetthemes'),
                "param_name" => "subtitle_color",
                "description" => "",
                "value" => array(
                    esc_attr__('Light color subtitle for dark section', 'sweetthemes') => 'light_subtitle',
                    esc_attr__('Dark color subtitle for light section', 'sweetthemes') => 'dark_subtitle'
                )
            ),
            array(
                "group" => "Styling",
                "type" => "dropdown",
                "holder" => "div",
                "std" => '',
                "class" => "",
                "heading" => esc_attr__("Description Color", 'sweetthemes'),
                "param_name" => "description_color",
                "description" => "",
                "value" => array(
                    esc_attr__('Light color subtitle for dark section', 'sweetthemes') => 'light_description',
                    esc_attr__('Dark color subtitle for light section', 'sweetthemes') => 'dark_description'
                )
            ),
            array(
                "group" => "Options",
                "type" => "dropdown",
                "holder" => "div",
                "std" => '',
                "class" => "",
                "heading" => esc_attr__("Subtitle Color", 'sweetthemes'),
                "param_name" => "align_title",
                "description" => "",
                "value" => array(
                    esc_attr__('Align elements center', 'sweetthemes') => 'text-center',
                    esc_attr__('Align elements right', 'sweetthemes') => 'text-right',
                    esc_attr__('Align elements left', 'sweetthemes') => 'text-left'
                )
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