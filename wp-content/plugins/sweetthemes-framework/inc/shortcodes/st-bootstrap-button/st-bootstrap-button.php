<?php
/**
||-> Shortcode: Bootstrap Buttons
*/
function sweetthemes_btn_shortcode($params, $content)
{
    extract(shortcode_atts(array(
        'btn_text' => '',
        'btn_url' => '',
        'btn_size' => '',
        'align' => '',
        'gradient_color_1' => '',
        'text_color' => '',
        'text_color_hover' => '',
        'background_color_hover' => '',
        'list_icon' => '',
        'enable_icon' => '',
        'border_color' => '',
        'border_color_hover' => '',
        'animation' => '',
    ), $params));
    $animation_final = '';
    if(!empty($animation)) {
        $animation_final = 'wow ' . $animation;
    }
    $content     = '';
    $id_selector = 'btn_custom_' . uniqid();
    $content .= '<style type="text/css">
                .sweetthemes_button .' . $id_selector . ' {
                    background: ' . esc_attr($gradient_color_1) . ' !important;
                }
                .sweetthemes_button .' . $id_selector . ':hover {                   
                    color: ' . esc_attr($text_color_hover) . ' !important;                     
                }
                .sweetthemes_button .' . $id_selector . ':before {
                    background: ' . esc_attr($background_color_hover) . ' !important;
                }
                .sweetthemes_button .' . $id_selector . ' {
                    border-color: ' . esc_attr($border_color) . ' !important;
                }
                .sweetthemes_button .' . $id_selector . ':hover {                   
                    border-color: ' . esc_attr($border_color_hover) . ' !important;                     
                }

              </style>';

              $icon = '';
              if($enable_icon != 'false') {
                $icon = '<i class="' . esc_attr($list_icon) . '"></i>';
              }
              
    $content .= '<div class="' . $align . ' sweetthemes_button ' . $animation_final . '">';
    $content .= '<a  href="' . $btn_url . '" class="button-winona ' . $btn_size . ' ' . $id_selector . '" style="color:' . $text_color . '">
        '.$icon.'
    ' . $btn_text . '</a>';
    $content .= '</div>';
    return $content;
}
add_shortcode('mt-bootstrap-button', 'sweetthemes_btn_shortcode');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if (is_plugin_active('js_composer/js_composer.php')) {
    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';
    vc_map(array(
        "name" => esc_attr__("ST - Button", 'sweetthemes'),
        "base" => "mt-bootstrap-button",
        "category" => esc_attr__('ST: SweetThemes', 'sweetthemes'),
        "icon" => "niva_shortcode",
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
                "group" => "Options",
                "type" => "dropdown",
                "heading" => esc_attr__("Button size", 'sweetthemes'),
                "param_name" => "btn_size",
                "value" => array(
                    esc_attr__('Small', 'sweetthemes') => 'btn btn-sm',
                    esc_attr__('Medium', 'sweetthemes') => 'btn btn-medium',
                    esc_attr__('Large', 'sweetthemes') => 'btn btn-lg',
                    esc_attr__('Extra-Large', 'sweetthemes') => 'extra-large'
                ),
                "std" => 'normal',
                "holder" => "div",
                "class" => "",
                "description" => ""
            ),
            array(
                "group" => "Options",
                "type" => "dropdown",
                "heading" => esc_attr__("Alignment", 'sweetthemes'),
                "param_name" => "align",
                "value" => array(
                    esc_attr__('Left', 'sweetthemes') => 'text-left',
                    esc_attr__('Center', 'sweetthemes') => 'text-center',
                    esc_attr__('Right', 'sweetthemes') => 'text-right'
                ),
                "std" => 'normal',
                "holder" => "div",
                "class" => "",
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
                "group" => "Styling",
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_attr__("Text color on hover", 'sweetthemes'),
                "param_name" => "text_color_hover",
                "value" => '#ffffff', //Default color
                "description" => esc_attr__("Choose text color", 'sweetthemes')
            ),
            array(
                "group" => "Styling",
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_attr__("Background color on hover", 'sweetthemes'),
                "param_name" => "background_color_hover",
                "value" => '#ffffff', //Default color
                "description" => esc_attr__("Choose background color", 'sweetthemes')
            ),
            array(
                "group" => "Styling",
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_attr__("Border color", 'sweetthemes'),
                "param_name" => "border_color",
                "description" => esc_attr__("Choose border color", 'sweetthemes')
            ),
            array(
                "group" => "Styling",
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_attr__("Border color on hover", 'sweetthemes'),
                "param_name" => "border_color_hover",
                "description" => esc_attr__("Choose border color on hover", 'sweetthemes')
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