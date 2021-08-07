<?php 

/**

||-> Shortcode: Progress Bar

*/
function sweetthemes_progress_bar_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'tooltip_option'  => '', //with tooltip/without tooltip
            'bar_scope'       => '', // success/info/warning/danger
            'bar_style'       => '', // normal/progress-bar-striped
            'bar_label'       => '', // optional
            'bar_value'       => ''
        ), $params ) );
    $content = '';
    $content .= '<div class="barWrapper">';
        $content .= '<span class="progressText"><B>HTML5</B></span>';
        $content .= '<div class="progress">';
            $content .= '<div class="progress-bar" role="progressbar" aria-valuenow="'.$bar_value.'" aria-valuemin="0" aria-valuemax="100">';
            $content .= '<span  class="popOver" data-toggle="tooltip" data-placement="top" title="'.$bar_value.'%"> </span>';
                // if(!isset($bar_label)){
                //     $content .= '<span class="sr-only">'.$bar_label.'</span>.';
                // }else{ 
                //     $content .= $bar_label;
                // }
            $content .= '</div>';
        $content .= '</div>';
    $content .= '</div>';
    return $content;
}
add_shortcode('progress_bar', 'sweetthemes_progress_bar_shortcode');



/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( 
        array(
        "name" => esc_attr__("MT - Progress bar", 'sweetthemes'),
        "base" => "progress_bar",
        "category" => esc_attr__('MT: SweetThemes', 'sweetthemes'),
        "icon" => "niva_shortcode",
        "params" => array(
            array(
                "group" => "Options",
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Progress bar tooltip", 'sweetthemes'),
                "param_name" => "tooltip_option",
                "std" => '',
                "description" => "",
                "value" => array(
                    esc_attr__('Tooltip on', 'sweetthemes')     => 'tooltip_on',
                    esc_attr__('Tooltip off', 'sweetthemes')    => 'tooltip_off'
                )
            ),
            array(
                "group" => "Options",
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Progress bar scope", 'sweetthemes'),
                "param_name" => "bar_scope",
                "std" => '',
                "description" => "",
                "value" => array(
                    esc_attr__('Success', 'sweetthemes')     => 'success',
                    esc_attr__('Info', 'sweetthemes')        => 'info',
                    esc_attr__('Warning', 'sweetthemes')     => 'warning',
                    esc_attr__('Danger', 'sweetthemes')      => 'danger'
                )
            ),
            array(
                "group" => "Options",
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Progress bar style", 'sweetthemes'),
                "param_name" => "bar_style",
                "std" => '',
                "description" => "",
                "value" => array(
                    esc_attr__('Simple', 'sweetthemes')     => 'simple',
                    esc_attr__('Striped', 'sweetthemes')    => 'progress-bar-striped'
                )
            ),
            array(
                "group" => "Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Progress bar value (1-100)", 'sweetthemes'),
                "param_name" => "bar_value",
                "value" => "40",
                "description" => ""
            ),
            array(
                "group" => "Options",
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Progress bar label", 'sweetthemes'),
                "param_name" => "bar_label",
                "value" => esc_attr__("40% Complete", 'sweetthemes'),
                "description" => ""
            )
        )
    ));
}