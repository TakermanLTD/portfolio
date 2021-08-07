<?php
/**
||-> Shortcode: Video
*/

function sweetthemes_shortcode_particles($params, $content) {

    extract( shortcode_atts( 
        array(
            ''              => '',
        ), $params ) );

    $html = '';

    $html .= '<div class="st_particles_shortcode st_particles">';
      $html .= '<div id="particles-js"></div>';
    $html .= '</div>';

    return $html;
}

add_shortcode('st_particles', 'sweetthemes_shortcode_particles');


/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if (function_exists('vc_map')) {
    vc_map( array(
     "name" => esc_attr__("ST - Particles", 'sweetthemes'),
     "base" => "st_particles",
     "category" => esc_attr__('st: sweetthemes', 'sweetthemes'),
     "icon" => "smartowl_shortcode",
     "params" => array(
      )));
}

?>