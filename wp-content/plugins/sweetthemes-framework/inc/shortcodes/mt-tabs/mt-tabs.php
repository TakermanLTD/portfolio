<?php 
require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');
/**
||-> Shortcode: tabs
*/
function mt_shortcode_tabs($params,  $content = NULL) {
    extract( shortcode_atts( 
        array(
            'animation'           => '',
            'el_class'              => ''
        ), $params ) );
    $html = '';
        
    $html .= '<div class="tabs-shortcode naccs '.$el_class.' wow '.$animation.'">';
        $html .= '<div class="grid-div">';
            $html .= do_shortcode($content);
        $html .= '</div>';
    $html .= '</div>';
    return $html;
}
add_shortcode('mt_tabs_short', 'mt_shortcode_tabs');
/**
||-> Shortcode: Child Shortcode v1
*/
function mt_shortcode_tabs_items($params, $content = NULL) {
    static $counter = 0;
    extract( shortcode_atts( 
        array(
            'tabs_item_title'                  => '',
            'tabs_item_title_tab1'             => '',
            'tabs_item_content1'               => '',
            'tabs_item_button_text1'            => '',
            'tabs_item_button_link1'            => '',
            'tabs_item_title_tab2'             => '',
            'tabs_item_content2'               => '',
            'tabs_item_button_text2'            => '',
            'tabs_item_button_link2'            => '',
            'tabs_item_title_tab3'             => '',
            'tabs_item_content3'               => '',
            'tabs_item_button_text3'            => '',
            'tabs_item_button_link3'            => '',
            'tabs_item_title_tab4'             => '',
            'tabs_item_content4'               => '',
            'tabs_item_button_text4'            => '',
            'tabs_item_button_link4'            => '',
        ), $params ) );
    $active = '';
    if($counter == 0) {
        $active = 'active';
    }
    $html = '';
    $html .= '<div class="gc gc--1-of-3 '.$active.'">';
        $html .= '<div class="menu">';
    
            $html .= '<div class="'.$active.'" data-tab="tab-'.$counter.'">';
                $html .= '<span>'.$tabs_item_title.'</span>';
            $html .= '</div>';
    
        $html .= '</div>';
    $html .='</div>';
    $html .= '<div class="gc gc--2-of-3 '.$active.'">';
        $html .= '<ul class="nacc">';
            $html .= '<li class="row '.$active.'" id="tab-'.$counter.'">';
                if(!empty($tabs_item_title_tab1 && $tabs_item_content1)) {
                    $html .= '<div class="col-md-6">';
                        $html .= '<div class="column">';
                            $html .= '<h3 class="tab-title">'.$tabs_item_title_tab1.'</h3>';
                            $html .= '<p class="tab-content">'.$tabs_item_content1.'</p>';
                            $html .= '<a href="'.$tabs_item_button_link1.'" class="tab-button">'.$tabs_item_button_text1.'<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>';
                        $html .= '</div>';
                    $html .= '</div>';
                }
                if(!empty($tabs_item_title_tab2 && $tabs_item_content2)) {
                    $html .= '<div class="col-md-6">';
                        $html .= '<div class="column">';
                            $html .= '<h3 class="tab-title">'.$tabs_item_title_tab2.'</h3>';
                            $html .= '<p class="tab-content">'.$tabs_item_content2.'</p>';
                            $html .= '<a href="'.$tabs_item_button_link2.'" class="tab-button">'.$tabs_item_button_text2.'<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>';
                        $html .= '</div>';
                    $html .= '</div>';
                }
                if(!empty($tabs_item_title_tab3 && $tabs_item_content3)) {
                    $html .= '<div class="col-md-6">';
                        $html .= '<div class="column">';
                            $html .= '<h3 class="tab-title">'.$tabs_item_title_tab3.'</h3>';
                            $html .= '<p class="tab-content">'.$tabs_item_content3.'</p>';
                            $html .= '<a href="'.$tabs_item_button_link3.'" class="tab-button">'.$tabs_item_button_text3.'<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>';
                        $html .= '</div>';
                    $html .= '</div>';
                }
                if(!empty($tabs_item_title_tab4 && $tabs_item_content4)) {
                    $html .= '<div class="col-md-6">';
                        $html .= '<div class="column">';
                            $html .= '<h3 class="tab-title">'.$tabs_item_title_tab4.'</h3>';
                            $html .= '<p class="tab-content">'.$tabs_item_content4.'</p>';
                            $html .= '<a href="'.$tabs_item_button_link4.'" class="tab-button">'.$tabs_item_button_text4.'<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>';
                        $html .= '</div>';
                    $html .= '</div>';
                }
            $html .= '</li>';
        $html .= '</ul>';
    $html .= '</div>';
    
    ++$counter;
    return $html;
}
add_shortcode('mt_tabs_short_item', 'mt_shortcode_tabs_items');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    //require_once('../vc-shortcodes.inc.arrays.php');
    //Register "container" content element. It will hold all your inner (child) content elements
    vc_map( array(
        "name" => esc_attr__("MT - Tabs", 'sweetthemes'),
        "base" => "mt_tabs_short",
        "as_parent" => array('only' => 'mt_tabs_short_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
        "show_settings_on_create" => true,
        "icon" => "niva_shortcode",
        "category" => esc_attr__('MT: SweetThemes', 'sweetthemes'),
        "is_container" => true,
        "params" => array(
            // add params same as with any other content element
            array(
                "type" => "textfield",
                "heading" => __("Extra class name", "sweetthemes"),
                "param_name" => "el_class",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "sweetthemes")
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
        ),
        "js_view" => 'VcColumnView'
    ) );
    vc_map( array(
        "name" => esc_attr__("Tabs Item", 'sweetthemes'),
        "base" => "mt_tabs_short_item",
        "content_element" => true,
        "as_child" => array('only' => 'mt_tabs_short'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
            // add params same as with any other content element
            array(
                "group"        => "General Options",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_title",
                "heading"      => esc_attr__("Single item tabs Title", 'sweetthemes'),
                "description"  => esc_attr__("Enter title for current tabs item.", 'sweetthemes'),
            ),
            /* COLUMN 1 */
            array(
                "group"        => "General Options",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_title_tab1",
                "heading"      => esc_attr__("Title of column1", 'sweetthemes'),
                "description"  => esc_attr__("Enter title of column1", 'sweetthemes'),
            ),
            array(
                "group"        => "General Options",
                "type"         => "textarea",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_content1",
                "heading"      => esc_attr__("Description of column1", 'sweetthemes'),
                "description"  => esc_attr__("Enter the description of column1", 'sweetthemes'),
            ),
            array(
                "group"        => "General Options",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_button_text1",
                "heading"      => esc_attr__("Button text of column1", 'sweetthemes'),
                "description"  => esc_attr__("Enter button text of column1", 'sweetthemes'),
            ),
            array(
                "group"        => "General Options",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_button_link1",
                "heading"      => esc_attr__("Button link of column1", 'sweetthemes'),
                "description"  => esc_attr__("Enter button link of column1", 'sweetthemes'),
            ),
            /* COLUMN 2 */
            array(
                "group"        => "General Options",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_title_tab2",
                "heading"      => esc_attr__("Title of column2", 'sweetthemes'),
                "description"  => esc_attr__("Enter title of column2", 'sweetthemes'),
            ),
            array(
                "group"        => "General Options",
                "type"         => "textarea",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_content2",
                "heading"      => esc_attr__("Description of column2", 'sweetthemes'),
                "description"  => esc_attr__("Enter the description of column2", 'sweetthemes'),
            ),
            array(
                "group"        => "General Options",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_button_text2",
                "heading"      => esc_attr__("Button text of column2", 'sweetthemes'),
                "description"  => esc_attr__("Enter button text of column2", 'sweetthemes'),
            ),
            array(
                "group"        => "General Options",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_button_link2",
                "heading"      => esc_attr__("Button link of column2", 'sweetthemes'),
                "description"  => esc_attr__("Enter button link of column2", 'sweetthemes'),
            ),
            /* COLUMN 3 */
            array(
                "group"        => "General Options",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_title_tab3",
                "heading"      => esc_attr__("Title of column3", 'sweetthemes'),
                "description"  => esc_attr__("Enter title of column3", 'sweetthemes'),
            ),
            array(
                "group"        => "General Options",
                "type"         => "textarea",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_content3",
                "heading"      => esc_attr__("Description of column3", 'sweetthemes'),
                "description"  => esc_attr__("Enter the description of column3", 'sweetthemes'),
            ),
            array(
                "group"        => "General Options",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_button_text3",
                "heading"      => esc_attr__("Button text of column3", 'sweetthemes'),
                "description"  => esc_attr__("Enter button text of column3", 'sweetthemes'),
            ),
            array(
                "group"        => "General Options",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_button_link3",
                "heading"      => esc_attr__("Button link of column3", 'sweetthemes'),
                "description"  => esc_attr__("Enter button link of column3", 'sweetthemes'),
            ),
            /* COLUMN 4 */
            array(
                "group"        => "General Options",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_title_tab4",
                "heading"      => esc_attr__("Title of column4", 'sweetthemes'),
                "description"  => esc_attr__("Enter title of column4", 'sweetthemes'),
            ),
            array(
                "group"        => "General Options",
                "type"         => "textarea",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_content4",
                "heading"      => esc_attr__("Description of column4", 'sweetthemes'),
                "description"  => esc_attr__("Enter the description of column4", 'sweetthemes'),
            ),
            array(
                "group"        => "General Options",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_button_text4",
                "heading"      => esc_attr__("Button text of column4", 'sweetthemes'),
                "description"  => esc_attr__("Enter button text of column4", 'sweetthemes'),
            ),
            array(
                "group"        => "General Options",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_button_link4",
                "heading"      => esc_attr__("Button link of column4", 'sweetthemes'),
                "description"  => esc_attr__("Enter button link of column4", 'sweetthemes'),
            ),
        )
    ) );
    //Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_Mt_tabs_Short extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_Mt_tabs_Short_Item extends WPBakeryShortCode {
        }
    }
}
?>