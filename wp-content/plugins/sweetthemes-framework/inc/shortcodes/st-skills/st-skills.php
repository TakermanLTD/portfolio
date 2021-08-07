<?php
/**
||-> Shortcode: Skills
*/
function sweetthemes_skills_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'icon_or_image'            => '', 
            'icon'                     => '', 
            'title'                    => '',
            'skillvalue'               => '',
            'text_color_value'         => '',
            'number_color_value'       => '',
            'image_skill'              => ''
        ), $params ) );
    $image_skill      = wp_get_attachment_image_src($image_skill, "linify_skill_counter_65x65");
    $image_skillsrc  = $image_skill[0];
    $skill = '';
    $skill .= '<div class="stats-block statistics">';
        $skill .= '<div class="stats-head">';
            $skill .= '<p class="stat-number skill">';
              if($icon_or_image == 'choosed_icon'){
                $skill .= '<i class="'.esc_attr($icon).'"></i>';
              } elseif($icon_or_image == 'choosed_image') {
                $skill .= '<img src="'.esc_attr($image_skillsrc).'" data-src="'.esc_attr($image_skillsrc).'" alt="">';
              }
            $skill .= '</p>';
        $skill .= '</div>';
        $skill .= '<div class="stats-content percentage" data-perc="'.esc_attr($skillvalue).'">';
          $skill .= '<span class="skill-count" style="color: '.esc_attr($text_color_value).'">'.esc_attr($skillvalue).'</span>';
          $skill .= '<p style="color: '.esc_attr($number_color_value).'">'.esc_attr($title).'</p>';
        $skill .= '</div>';
    $skill .= '</div>';
    return $skill;
}
add_shortcode('st_skill', 'sweetthemes_skills_shortcode');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';
  #SHORTCODE: Skill counter shortcode
  vc_map( array(
     "name" => esc_attr__("ST - Skill counter", 'sweetthemes'),
     "base" => "st_skill",
     "category" => esc_attr__('MT: SweetThemes', 'sweetthemes'),
     "icon" => "niva_shortcode",
     "params" => array(
        array(
           "group" => "Options",
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Skill media"),
           "param_name" => "icon_or_image",
           "std" => '',
           "description" => esc_attr__("Choose what you want to use: empty/image/icon"),
           "value" => array(
            'Nothing'     => 'choosed_nothing',
            'Use an image'     => 'choosed_image',
            'Use an icon'      => 'choosed_icon'
            )
        ),
        array(
          "group" => "Options",
          "dependency" => array(
           'element' => 'icon_or_image',
           'value' => array( 'choosed_icon' ),
           ),
          "type" => "dropdown",
          "heading" => esc_attr__("Icon class", 'sweetthemes'),
          "param_name" => "icon",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $fa_list
        ),
        array(
          "group" => "Options",
          "dependency" => array(
           'element' => 'icon_or_image',
           'value' => array( 'choosed_image' ),
           ),
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'sweetthemes' ),
          "param_name" => "image_skill",
          "value" => "",
          "description" => esc_attr__( "Choose image for skill", 'sweetthemes' )
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Title", 'sweetthemes'),
           "param_name" => "title",
           "value" => "",
           "description" => ""
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Text color", 'sweetthemes' ),
          "param_name" => "text_color_value",
          "value" => "", //Default color
          "description" => esc_attr__( "Choose text color", 'sweetthemes' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Skill value color", 'sweetthemes' ),
          "param_name" => "number_color_value",
          "value" => "", //Default color
          "description" => esc_attr__( "Choose skill value color", 'sweetthemes' )
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Skill value", 'sweetthemes'),
           "param_name" => "skillvalue",
           "value" => "",
           "description" => ""
        )
     )
  ));
}