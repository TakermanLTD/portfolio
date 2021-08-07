<?php

/**

||-> Shortcode: Bootstrap Jumbotron

*/
function sweetthemes_jumbotron_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'heading'       => '', 
            'sub_heading'   => '', 
            'button_text'   => '',
            'button_url'    => '',
            'animation'    => ''
        ), $params ) ); 
    $content = '';
    $content .= '<div class="jumbotron animateIn" data-animate="'.$animation.'">';
        $content .= '<h1>'.$heading.'</h1>';
        $content .= '<p>'.$sub_heading.'</p>';
        $content .= '<p><a role="button" href="'.$button_url.'" class="btn btn-primary btn-lg">'.$button_text.'</a></p>';
    $content .= '</div>';
    return $content;
}
add_shortcode('jumbotron', 'sweetthemes_jumbotron_shortcode');






/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( 
        array(
        "name" => esc_attr__("MT - Jumbotron", 'sweetthemes'),
        "base" => "jumbotron",
        "category" => esc_attr__('MT: SweetThemes', 'sweetthemes'),
        "icon" => "niva_shortcode",
        "params" => array(
            array(
                "group" => "Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Heading", 'sweetthemes'),
                "param_name" => "heading",
                "value" => esc_attr__("Hello, world!", 'sweetthemes'),
                "description" => ""
            ),
            array(
                "group" => "Options",
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Sub heading", 'sweetthemes'),
                "param_name" => "sub_heading",
                "value" => esc_attr__("This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.", 'sweetthemes'),
                "description" => ""
            ),
            array(
                "group" => "Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Button text", 'sweetthemes'),
                "param_name" => "button_text",
                "value" => esc_attr__("Learn more", 'sweetthemes'),
                "description" => ""
            ),
            array(
                "group" => "Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Button url", 'sweetthemes'),
                "param_name" => "button_url",
                "value" => "#",
                "description" => ""
            ),
            array(
                "group" => "Animation",
                "type" => "dropdown",
                "heading" => esc_attr__("Animation", 'sweetthemes'),
                "param_name" => "animation",
                "std" => '',
                "holder" => "div",
                "class" => "",
                "description" => "",
                "value" => $animations_list
            )
        )
    ));
}