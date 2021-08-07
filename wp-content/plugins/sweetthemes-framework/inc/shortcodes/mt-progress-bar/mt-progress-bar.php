<?php 
/**
||-> Shortcode: Progress Bar
*/
function sweetthemes_progress_bar_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'bar_scope'  => '', // success/info/warning/danger
            'bar_style'  => '', // normal/progress-bar-striped
            'bar_label_text'  => '', // optional,
            'bar_label_percentage'  => '', // optional
            'bar_value'  => '',
            'animation'  => ''
        ), $params ) );
        $animation_final = '';
        if(!empty($animation)) {
            $animation_final = 'wow ' . $animation;
        }
        $content = '';
        if(!isset($bar_label_text) && !isset($bar_label_percentage)){
            $content .= '<div class="label_text_percentange '.$animation_final.'">
                             <span class="sr-only">'.
                                '<span class="label_text">'.$bar_label_text.'</span>'.
                                '<span class="label_percentage">'.$bar_label_percentage.'</span>'.
                            '</span>
                         </div>';
        }else{ 
            $content .= '<div class="label_text_percentange '.$animation_final.'">
                             <span class="label_text">'.$bar_label_text.'</span>'.
                            '<span class="label_percentage">'.$bar_label_percentage.'</span>
                        </div>';
        }
        $content .= '<div class="progress '.$animation_final.'">';
        $content .= '<div class="progress-bar progress-bar-'.$bar_scope . ' ' . $bar_style.'" role="progressbar" aria-valuenow="'.$bar_value.'" aria-valuemin="0" 
        aria-valuemax="100" style="width:'.$bar_value.'">';
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
                "heading" => esc_attr__("Progress bar text", 'sweetthemes'),
                "param_name" => "bar_label_text",
                "value" => esc_attr__("Complete", 'sweetthemes'),
                "description" => ""
            ),
            array(
                "group" => "Options",
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Progress bar percentage", 'sweetthemes'),
                "param_name" => "bar_label_percentage",
                "value" => esc_attr__("40%", 'sweetthemes'),
                "description" => ""
            ),
            array(
              "group" => "Animation",
              "type" => "dropdown",
              "heading" => esc_attr__("Animation"),
              "param_name" => "animation",
              "std" => 'fadeInLeft',
              "holder" => "div",
              "class" => "",
              "description" => esc_attr__(""),
              "value" => $animations_list
            )
        )
    ));
}