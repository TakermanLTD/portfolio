<?php
/**
||-> Shortcode: Clients
*/
function sweetthemes_shortcode_clients02($params, $content) {
    extract( shortcode_atts( 
        array(
            'visible_items_clients'   =>'',
            'order'                   =>'',
            'number'                  =>'',
            'animation' => '',
            ), $params ) );
      $html = '';
    
	    $args_clients = array(
        'posts_per_page'   => $number,
        'orderby'          => 'post_date',
        'order'            => $order,
        'post_type'        => 'clients',
        'post_status'      => 'publish' 
      );

      $animation_final = '';
      if(!empty($animation)) {
          $animation_final = 'wow ' . $animation;
      }
      
	    $html .= '<div class="row">';
		    $html .= '<div class="st_clients_slider_v2 clients_slick_shortcode-'.$visible_items_clients.' ">';
			      $clients = get_posts($args_clients);
            $count = 0;
			        foreach ($clients as $client) {

		            $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $client->ID ),'full' );
		            $html .= '<div data-wow-delay="'.$count.'s" class=" '.$animation_final.' clients_image_holder">';
                    $html .= '<div class="clients_image_holder_inside">';
    	                if($thumbnail_src) { 
                        $html .= '<img class="client_image" src="'. $thumbnail_src[0] . '" alt="'. $client->post_title .'" />';
    	                }else{ 
                        $html .= '<img src="http://placehold.it/160x100" alt="'. $client->post_title .'" />'; 
                      }
                    $html .= '</div>';
  					    $html .= '</div>';
                $count = $count + 0.2;

			        }
		    $html .= '</div>';
	    $html .= '</div>';
	    
    return $html;
}
add_shortcode('clients02', 'sweetthemes_shortcode_clients02');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';
vc_map( array(
     "name" => esc_attr__("MT - Clients (Slider) V2", 'sweetthemes'),
     "base" => "clients02",
     "category" => esc_attr__('ST: SweetThemes', 'sweetthemes'),
     "icon" => "quin_shortcode",
     "params" => array(
         array(
            "group" => "Options",
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Number of clients", 'sweetthemes' ),
            "param_name" => "number",
            "value" => "",
            "description" => esc_attr__( "Enter number of clients to show.", 'sweetthemes' )
         ),
         array(
          "group" => "Options",
          "type" => "dropdown",
          "heading" => esc_attr__("Visible Clients per slide", 'sweetthemes'),
          "param_name" => "visible_items_clients",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => array(
            '1'   => '1',
            '2'   => '2',
            '3'   => '3',
            '4'   => '4',
            '5'   => '5',
            '6'   => '6'
          )
        ),
        array(
          "group" => "Slider Options",
          "type" => "dropdown",
          "holder" => "div",
          "class" => "",
          "param_name" => "order",
          "std"          => '',
          "heading" => esc_attr__( "Order options", 'sweetthemes' ),
          "description" => esc_attr__( "Order ascending or descending by date", 'sweetthemes' ),
          "value"        => array(
              esc_attr__('Ascending', 'sweetthemes') => 'asc',
              esc_attr__('Descending', 'sweetthemes') => 'desc',
          )            
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
?>