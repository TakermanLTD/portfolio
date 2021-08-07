<?php 
require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');
/**
||-> Shortcode: Pricing tables
*/
function mt_shortcode_pricing_table_v4($params,  $content = NULL) {
    extract( shortcode_atts( 
        array(
          'animation_c'           => '',
          'switch_status'     => '',
            'el_class'            => ''
        ), $params ) );

    $animation_final = '';
    if(!empty($animation_c)) {
        $animation_final = 'wow ' . $animation_c;
    }

    $pricing_table = '';
      $pricing_table .= '<div class="sweetthemes-pricing-vers4">';
      $pricing_table .= '<div class="cd-pricing-container cd-has-margins">';
        
        if($switch_status == 'on') {
          $pricing_table .= '<div class="cd-pricing-switcher  '.$animation_final. '">';
            $pricing_table .= '<p class="fieldset">';
              $pricing_table .= '<input type="radio" name="duration-2" value="monthly" id="monthly-2" checked>';
              $pricing_table .= '<label class="monthly-label active" for="monthly-2">'.esc_html('Monthly','sweetthemes').'</label>';
              $pricing_table .= '<input type="radio" name="duration-2" value="yearly" id="yearly-2">';
              $pricing_table .= '<label class="yearly-label" for="yearly-2">'.esc_html('Yearly','sweetthemes').'</label>';
              $pricing_table .= '<span class="cd-switch"></span>';
            $pricing_table .= '</p>';
          $pricing_table .= '</div>';
        }
        $pricing_table .= '<div class="cd-pricing-list-parent">';
          $pricing_table .= '<ul class="row cd-pricing-list cd-bounce-invert">';
            $pricing_table .= do_shortcode($content);
          $pricing_table .= '</ul>'; //cd-bounce-invert
        $pricing_table .= '</div>';

      $pricing_table .= '</div>'; //cd-pricing-container
    $pricing_table .= '</div>'; //sweetthemes-pricing-vers4

    return $pricing_table;
}
add_shortcode('mt_pricing_table_short_v4', 'mt_shortcode_pricing_table_v4');
/**
||-> Shortcode: Child Shortcode v1
*/
function mt_shortcode_pricing_table_v4_items($params, $content = NULL) {

    extract( shortcode_atts( 
        array(
          'animation'           => '',
          'number_columns'    => '',
          'package_title' => '',
          'package_price_per_month' => '',
          'package_price_per_year'  => '',
          'package_price_currency' => '',
          'button_url'  => '',
          'button_text' => '',
          'box_background_color'  => '',
          'content_pricing_table' => '',
          'button_background_color' => '',
          'button_color' => '',
          'content_color' => ''
        ), $params ) );

    if(!empty($box_background_color)) {
        $box_background_color_var = 'skin_color_' . $box_background_color;
    } else {
        $box_background_color_var = 'skin_color_none';
    }

    $animation_final = '';
    if(!empty($animation)) {
        $animation_final = 'wow ' . $animation;
    }

    $count = 0;

    $pricing_table = '';
    $pricing_table .= '<li data-wow-delay="'.$count.'s" class="'.esc_attr($box_background_color_var).' '.esc_attr($number_columns).' '.$animation_final.'">';
      $pricing_table .= '<ul class="cd-pricing-wrapper">';
        
        $pricing_table .= '<li style="background:'.esc_attr($box_background_color).'" data-type="monthly" class="pricing-front">';
          $pricing_table .= '<header class="cd-pricing-header">';
            $pricing_table .= '<h2 style="color:'.esc_attr($content_color).'" class="package_title">'.esc_attr($package_title).'</h2>';
                $pricing_table .= '<div class="package_price_per_month-parent">';
                  $pricing_table .= '<span style="color:'.esc_attr($content_color).'" class="cd-value-month"><sup>'.esc_attr($package_price_currency).'</sup>'.esc_attr($package_price_per_month).'</span>';
                  $pricing_table .= '<span style="color:'.esc_attr($content_color).'" class="cd-duration">'.esc_html__('per month','sweetthemes').'</span>';
                $pricing_table .= '</div>';
                $pricing_table .= '<div class="package_price_per_year-parent">';
                  $pricing_table .= '<span style="color:'.esc_attr($content_color).'" class="cd-value-year"><sup>'.esc_attr($package_price_currency).'</sup>'.esc_attr($package_price_per_year).'</span>';
                  $pricing_table .= '<span style="color:'.esc_attr($content_color).'" class="cd-duration">'.esc_html__('per year','sweetthemes').'</span>';
                $pricing_table .= '</div>';
          $pricing_table .= '</header>';

          $pricing_table .= '<div style="color:'.esc_attr($content_color).'" class="cd-pricing-body">';

                //$arr = array('ul' => array(), 'li' => array());
                $pricing_table .= $content_pricing_table;				      

        				$pricing_table .= '<a style="background:'.esc_attr($button_background_color).'; color: '.esc_attr($button_color).'" class="pricing-select-button" href="'.esc_attr($button_url).'"><i class="fa fa-shopping-cart" aria-hidden="true"></i> '.$button_text.'</a>';

          $pricing_table .= '</div>';

        $pricing_table .= '</li>';

      $pricing_table .= '</ul>'; //cd-pricing-wrapper
    $pricing_table .= '</li>';

    $count = $count + 0.2;

      return $pricing_table;
}
add_shortcode('mt_pricing_table_short_v4_item', 'mt_shortcode_pricing_table_v4_items');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    //require_once('../vc-shortcodes.inc.arrays.php');
    //Register "container" content element. It will hold all your inner (child) content elements
    vc_map( array(
        "name" => esc_attr__("MT - Pricing tables v4", 'sweetthemes'),
        "base" => "mt_pricing_table_short_v4",
        "as_parent" => array('only' => 'mt_pricing_table_short_v4_item'), 
        "content_element" => true,
        "show_settings_on_create" => true,
        "icon" => "niva_shortcode",
        "category" => esc_attr__('MT: SweetThemes', 'sweetthemes'),
        "is_container" => true,
        "params" => array(
            // add params same as with any other content element
            array(
               "group" => "Options",
               "type" => "dropdown",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Switch status"),
               "param_name" => "switch_status",
               "std" => '',
               "description" => esc_attr__(""),
               "value" => array(
                    'Enable'           => 'on',
                    'Disable'          => 'off'
               )
            ),    
            array(
              "group" => "Animation",
              "type" => "dropdown",
              "heading" => esc_attr__("Animation", 'sweetthemes'),
              "param_name" => "animation_c",
              "std" => '',
              "holder" => "div",
              "class" => "",
              "description" => "",
              "value" => $animations_list
            ),
        ),
        "js_view" => 'VcColumnView'
    ) );
    vc_map( array(
        "name" => esc_attr__("Pricing tables Item", 'sweetthemes'),
        "base" => "mt_pricing_table_short_v4_item",
        "content_element" => true,
        "as_child" => array('only' => 'mt_pricing_table_short_v4'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
            // add params same as with any other content element
          array(
               "group" => "Options",
               "type" => "dropdown",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Number of columns"),
               "param_name" => "number_columns",
               "std" => '',
               "description" => esc_attr__(""),
               "value" => array(
                    '2'          => 'col-md-6',
                    '3'          => 'col-md-4'
               )
            ),  
            array(
               "group" => "Box Setup",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Package title", 'sweetthemes'),
               "param_name" => "package_title",
               "value" => "",
               "description" => ""
            ),
            array(
               "group" => "Box Setup",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Package price per month", 'sweetthemes'),
               "param_name" => "package_price_per_month",
               "value" => "",
               "description" => ""
            ),
            array(
               "group" => "Box Setup",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Package price per year", 'sweetthemes'),
               "param_name" => "package_price_per_year",
               "value" => "",
               "description" => ""
            ),
            array(
               "group" => "Box Setup",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Package price currency", 'sweetthemes'),
               "param_name" => "package_price_currency",
               "value" => "",
               "description" => ""
            ),
            array(
               "group" => "Box Setup",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Package button url", 'sweetthemes'),
               "param_name" => "button_url",
               "value" => "",
               "description" => ""
            ),
            array(
               "group" => "Box Setup",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Package button text", 'sweetthemes'),
               "param_name" => "button_text",
               "value" => esc_attr__("", 'sweetthemes'),
               "description" => ""
            ),
             array(
              "group" => "Options",
              "type" => "textarea_html",
              "holder" => "div",
              "class" => "",
              "heading" => esc_attr__("Content pricing table", 'sweetthemes'),
              "param_name" => "content_pricing_table",
              "value" => esc_attr__("", 'sweetthemes'),
              "description" => "Create lists for pricing table with li tag"
            ),
            array(
               "group" => "Styling",
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Box background color", 'sweetthemes'),
               "param_name" => "box_background_color",
               "value" => esc_attr__("", 'sweetthemes'),
               "description" => ""
            ),
           
            array(
               "group" => "Styling",
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Background color button", 'sweetthemes'),
               "param_name" => "button_background_color",
               "value" => esc_attr__("", 'sweetthemes'),
               "description" => ""
            ),
            array(
               "group" => "Styling",
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Color button", 'sweetthemes'),
               "param_name" => "button_color",
               "value" => esc_attr__("", 'sweetthemes'),
               "description" => ""
            ),
            array(
               "group" => "Styling",
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Content color", 'sweetthemes'),
               "param_name" => "content_color",
               "value" => esc_attr__("", 'sweetthemes'),
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
    ) );
    //Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_mt_pricing_table_short_v4 extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_mt_pricing_table_short_v4_item extends WPBakeryShortCode {
        }
    }
}
?>