<?php
require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');
/**
||-> Shortcode: Testimonials
*/
function sweetthemes_shortcode_testimonials($params, $content) {
    extract( shortcode_atts( 
        array(
            'number'                =>'',
            'visible_items'         =>'',
            'animation' => '',
        ), $params ) );
    $html = '';
    $html .= '<div class="vc_row">';
        $html .= '<div class="testimonials-container-'.$visible_items.' owl-carousel owl-theme">';
        $args_testimonials = array(
                'posts_per_page'   => $number,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'post_type'        => 'testimonial',
                'post_status'      => 'publish' 
                ); 
        $animation_final = '';
        if(!empty($animation)) {
            $animation_final = 'wow ' . $animation;
        }
        $testimonials = get_posts($args_testimonials);
            foreach ($testimonials as $testimonial) {
                #metaboxes
                $metabox_content_color = get_post_meta( $testimonial->ID, 'testimonial_color', true );
                $metabox_job_position = get_post_meta( $testimonial->ID, 'job-position', true );
                $metabox_company = get_post_meta( $testimonial->ID, 'company', true );
                $testimonial_id = $testimonial->ID;
                $content_post   = get_post($testimonial_id);
                $content        = $content_post->post_content;
                $content        = apply_filters('the_content', $content);
                $content        = str_replace(']]>', ']]&gt;', $content);
                #thumbnail
                $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $testimonial->ID ),'connection_testimonials_150x150' );
                
                $html.='
                	<div class="item vc_col-md-12 relative">
	                	<div class="testimonial01_item">        	
		                	<div class="testimonial01-img-holder pull-left">';
                        $html.='<span class="testimonail01-mark">”</span>';
                        $html.='<div class="testimonail01-content '.$animation_final.'" style="color:'.$metabox_content_color.';"><p>'.strip_tags(sweetthemes_excerpt_limit($content,60)).'</p></div>
                        <div class="testimonail01-profile-content '.$animation_final.'">';                       
	                        $html.='<div class="testimonail01-name-position text-center">
		                        <p class="name-test" style="color:'.$metabox_content_color.';">'. $testimonial->post_title . '</p>
                            <p class="position-test" style="color:'.$metabox_content_color.';">' . $metabox_job_position . ' - ' . $metabox_company . '</p>
		                    </div>
		                </div>
                      </div>
		                </div>
	                </div>';
            }
    $html .= '</div>
    	</div>';
    return $html;
}
add_shortcode('testimonials01', 'sweetthemes_shortcode_testimonials');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    vc_map( array(
     "name" => esc_attr__("ST - Testimonials Box", 'sweetthemes'),
     "base" => "testimonials01",
     "category" => esc_attr__('ST: SweetThemes', 'sweetthemes'),
     "icon" => "niva_shortcode",
     "params" => array(
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Number of testimonials", 'sweetthemes' ),
          "param_name" => "number",
          "value" => "",
          "description" => esc_attr__( "Enter number of testimonials to show.", 'sweetthemes' )
        ),
        array(
          "group" => "Options",
          "type" => "dropdown",
          "heading" => esc_attr__("Visible Testimonials per slide", 'sweetthemes'),
          "param_name" => "visible_items",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => array(
            '1'   => '1',
            '2'   => '2',
            '3'   => '3'
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