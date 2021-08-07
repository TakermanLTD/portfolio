<?php
/**
||-> Shortcode: Icon List Item
*/
function sweetthemes_icon_listgroup_shortcode($params, $content) {
  extract( shortcode_atts( 
      array(
          'list_icon'               => '',
          'list_image'              => '',        
          'list_image_max_width'    => '',
          'list_image_margin'       => '',
          'list_icon_link' => '',
          'list_icon_size'          => '',
          'list_icon_margin'        => '',
          'list_icon_color'         => '',
          'list_icon__hover_color'  => '',
          'list_icon_title'         => '',
          'list_title_link'         => '',
          'list_icon_title_size'    => '',
          'list_icon_title_color'   => '',
          'list_icon_subtitle'      => '',
          'list_icon_subtitle_size' => '',
          'list_icon_subtitle_color' => '',
          'list_button_text'          => '',
          'list_button_link'          => '',
          'list_button_color'          => '',
          'list_button_hovercolor'          => '',
          'list_button_icon'          => '',
          'animation'               => '',
      ), $params ) );
  $thumb      = wp_get_attachment_image_src($list_image, "full");
  $thumb_src  = $thumb[0];
  $html = '';

  $list_title_link_f = '';
  if(!empty($list_title_link)) {
    $list_title_link_f .= 'href="'.$list_title_link.'"';
  }

  $list_icon_link_f = '';
  if(!empty($list_icon_link)) {
    $list_icon_link_f .= 'href="'.$list_icon_link.'"';
  }

  if(!empty($list_button_hovercolor)) {
    $html .= '<style type="text/css">
                  .mt-icon-listgroup-item .mt-icon-listgroup-link:hover {
                      color: '.$list_button_hovercolor.' !important;
                  }
                  .mt-icon-listgroup-item .mt-icon-listgroup-link:hover i {
                      color: '.$list_button_hovercolor.' !important;
                  }
              </style>';
  }
  $html .= '<div class="mt-icon-listgroup-item wow '.$animation.'">';
      $html .= '<div class="mt-icon-listgroup-holder">
                  <div class="mt-icon-listgroup-icon-holder-inner">';
                    if(empty($list_image)) {
                    $html .= '<a '.$list_icon_link_f.'><i style="margin-right:'.esc_attr($list_icon_margin).'px; color:'.esc_attr($list_icon_color).';font-size:'.esc_attr($list_icon_size).'px" class="'.esc_attr($list_icon).'"></i></a>';
                    } else {
                      $html .='<img alt="list-image" style="margin-right:'.esc_attr($list_image_margin).'px; max-width:'.esc_attr($list_image_max_width).'px;" class="mt-image-list" src="'.esc_attr($thumb_src).'">';
                    }
                  $html .= '</div>
                <div class="mt-icon-listgroup-content-holder-inner">
                  <a '.$list_title_link_f.' class="mt-icon-listgroup-title" style="font-size: '.esc_attr($list_icon_title_size).'px; color: '.esc_attr($list_icon_title_color).'">'.esc_attr($list_icon_title).'</a>
                  <p class="mt-icon-listgroup-text" style="font-size: '.esc_attr($list_icon_subtitle_size).'px; color: '.esc_attr($list_icon_subtitle_color).'">'.esc_attr($list_icon_subtitle).'</p>';

                  if(!empty($list_button_text)) {
                    $html .= '<a href="'.esc_attr($list_button_link).'" class="mt-icon-listgroup-link" style="color: '.esc_attr($list_button_color).'">'.esc_attr($list_button_text).'<i class="'.esc_attr($list_button_icon).'"></i></a>';   
                  }

                $html .= '</div>
              </div>';
            $html .= '</div>';
  return $html;
}
add_shortcode('mt_list_group', 'sweetthemes_icon_listgroup_shortcode');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
  require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';
  vc_map( array(
     "name" => esc_attr__("MT - Icon ListGroup Item", 'sweetthemes'),
     "base" => "mt_list_group",
     "category" => esc_attr__('MT: SweetThemes', 'sweetthemes'),
     "icon" => "niva_shortcode",
     "params" => array(
        array(
          "group" => "Icon Setup",
          "type" => "dropdown",
          "heading" => esc_attr__("Icon", 'sweetthemes'),
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
          "heading" => esc_attr__("Icon link", 'sweetthemes'),
          "param_name" => "list_icon_link",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => ""
        ),
        array(
          "group" => "Image Setup",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'sweetthemes' ),
          "param_name" => "list_image",
          "value" => "",
          "description" => esc_attr__( "If you set this, will overwrite the icon setup.", 'sweetthemes' )
        ),
        array(
          "group" => "Image Setup",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Image max width", 'sweetthemes'),
          "param_name" => "list_image_max_width",
          "value" => "50",
          "description" => "Default: 50(px)"
        ),
        array(
          "group" => "Image Setup",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Image Margin right (px)", 'sweetthemes'),
          "param_name" => "list_image_margin",
          "value" => "",
          "description" => ""
        ),
        array(
          "group" => "Icon Setup",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Icon Size (px)", 'sweetthemes'),
          "param_name" => "list_icon_size",
          "value" => "",
          "description" => "Default: 18(px)"
        ),
        array(
          "group" => "Icon Setup",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Icon Margin right (px)", 'sweetthemes'),
          "param_name" => "list_icon_margin",
          "value" => "",
          "description" => ""
        ),
        array(
          "group" => "Icon Setup",
          "type" => "colorpicker",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Icon Color", 'sweetthemes'),
          "param_name" => "list_icon_color",
          "value" => "",
          "description" => ""
        ),
        array(
          "group" => "Icon Setup",
          "type" => "colorpicker",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Icon Hover Color", 'sweetthemes'),
          "param_name" => "list_icon__hover_color",
          "value" => "",
          "description" => ""
        ),
        array(
          "group" => "Label Setup",
          "type" => "textfield",
          "heading" => esc_attr__("Label/Title", 'sweetthemes'),
          "param_name" => "list_icon_title",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "Eg: This is a label"
        ),
        array(
          "group" => "Label Setup",
          "type" => "textfield",
          "heading" => esc_attr__("Title link", 'sweetthemes'),
          "param_name" => "list_title_link",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => ""
        ),
        array(
          "group" => "Label Setup",
          "type" => "textfield",
          "heading" => esc_attr__("Label/SubTitle", 'sweetthemes'),
          "param_name" => "list_icon_subtitle",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "Eg: This is a label"
        ),
        array(
          "group" => "Label Setup",
          "type" => "textfield",
          "heading" => esc_attr__("Title Font Size", 'sweetthemes'),
          "param_name" => "list_icon_title_size",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => ""
        ),
        array(
          "group" => "Label Setup",
          "type" => "colorpicker",
          "heading" => esc_attr__("Title Color", 'sweetthemes'),
          "param_name" => "list_icon_title_color",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => ""
        ),
        array(
          "group" => "Label Setup",
          "type" => "textfield",
          "heading" => esc_attr__("SubTitle Font Size", 'sweetthemes'),
          "param_name" => "list_icon_subtitle_size",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => ""
        ),
        array(
          "group" => "Label Setup",
          "type" => "colorpicker",
          "heading" => esc_attr__("SubTitle Color", 'sweetthemes'),
          "param_name" => "list_icon_subtitle_color",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => ""
        ),

        array(
          "group" => "Buton Setup",
          "type" => "textfield",
          "heading" => esc_attr__("Button text", 'sweetthemes'),
          "param_name" => "list_button_text",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => ""
        ),
        array(
          "group" => "Buton Setup",
          "type" => "textfield",
          "heading" => esc_attr__("Button link", 'sweetthemes'),
          "param_name" => "list_button_link",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => ""
        ),
        array(
          "group" => "Buton Setup",
          "type" => "dropdown",
          "heading" => esc_attr__("Button icon", 'sweetthemes'),
          "param_name" => "list_button_icon",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $fa_list
        ),
        array(
          "group" => "Buton Setup",
          "type" => "colorpicker",
          "heading" => esc_attr__("Button color", 'sweetthemes'),
          "param_name" => "list_button_color",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => ""
        ),
        array(
          "group" => "Buton Setup",
          "type" => "colorpicker",
          "heading" => esc_attr__("Button color", 'sweetthemes'),
          "param_name" => "list_button_hovercolor",
          "std" => '',
          "holder" => "div",
          "class" => "",
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
        ), 
     )
  ));
}