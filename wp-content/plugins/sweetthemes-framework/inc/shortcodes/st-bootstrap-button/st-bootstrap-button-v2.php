<?php
/**
||-> Shortcode: Bootstrap Buttons
*/
function sweetthemes_btn_v2_shortcode($params, $content)
{
    extract(shortcode_atts(array(
        'btn_text' => '',
        'btn_url' => '',
        'btn_size' => '',
        'gradient_color_1' => '',
        'text_color' => '',
        'list_icon' => '',
        'enable_icon' => '',
        'animation' => '',
    ), $params));
    $animation_final = '';
    if(!empty($animation)) {
        $animation_final = 'wow ' . $animation;
    }
    $content = '';

    $icon = '';
        if($enable_icon != 'false') {
        $icon = '<i class="' . esc_attr($list_icon) . '"></i>';
    }
              
    $content .= '<div class="sweetthemes_button_v2 ' . $animation_final . '">';
    $content .= '<a href="' . $btn_url . '" class="btngoln" style="color:' . $text_color . '">'.$icon.$btn_text.'</a>';
    $content .= '</div>';
    return $content;
}
add_shortcode('mt-bootstrap-button-v2', 'sweetthemes_btn_v2_shortcode');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if (is_plugin_active('js_composer/js_composer.php')) {
    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';
    vc_map(array(
        "name" => esc_attr__("ST - Button V2", 'sweetthemes'),
        "base" => "mt-bootstrap-button-v2",
        "category" => esc_attr__('ST: SweetThemes', 'sweetthemes'),
        "icon" => "quin_shortcode",
        "params" => array(
            array(
                "group" => "Icon Setup",
                "type" => "dropdown",
                "heading" => esc_attr__("Icon", 'sweetthemes') ,
                "param_name" => "list_icon",
                "std" => '',
                "holder" => "div",
                "class" => "",
                "description" => "",
                "value" => $fa_list
            ),
            array(
                "group" => "Icon Setup",
                "type" => "textfield",
                "heading" => esc_attr__("Enable or disable icon", 'sweetthemes') ,
                "param_name" => "enable_icon",
                "description" => "Write false for disable the icon"
            ) ,
            array(
                "group" => "Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Button text", 'sweetthemes'),
                "param_name" => "btn_text",
                "value" => esc_attr__("Hello", 'sweetthemes'),
                "description" => ""
            ),
            array(
                "group" => "Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Button url", 'sweetthemes'),
                "param_name" => "btn_url",
                "value" => "#",
                "description" => ""
            ),
            array(
                "group" => "Styling",
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_attr__("Choose custom background color", 'sweetthemes'),
                "param_name" => "gradient_color_1",
                "value" => '#FFBA41', //Default color
                "description" => esc_attr__("Choose background color", 'sweetthemes')
            ),
            array(
                "group" => "Styling",
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_attr__("Text color", 'sweetthemes'),
                "param_name" => "text_color",
                "value" => '#ffffff', //Default color
                "description" => esc_attr__("Choose text color", 'sweetthemes')
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