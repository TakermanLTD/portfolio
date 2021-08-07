<?php
require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');
/**
||-> Shortcode: Testimonials
*/
function sweetthemes_shortcode_testimonials3($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'             =>'',
            'number'                =>'',
            'visible_items'         =>''
        ), $params ) );
    $html = '';
    $html .= '<div class="vc_row">';
        $html .= '<div class="testimonials-'.$visible_items.'">';
        $args_testimonials = array(
                'posts_per_page'   => $number,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'post_type'        => 'testimonial',
                'post_status'      => 'publish' 
                ); 
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
                  <div class="wow '.$animation.'vc_col-md-4 relative">
                    <div class="testimonial01_item">          
                      <div class="testimonial01-img-holder pull-left">
                        <div class="testimonail01-content" style="color:'.$metabox_content_color.';"><p>'.strip_tags(sweetthemes_excerpt_limit($content,60)).'</p></div>
                        <div class="testimonail01-profile-content">';
                          
                          $cls = '';
                          if(!empty($thumbnail_src)) {

                            $html.='<div class="testimonail01-profile-img">';                        
                               $html.='<img alt="testimonial-image" src="'.$thumbnail_src[0].'">';
                            $html.='</div>';
                          } else {
                             $cls .= 'text-center';                           
                          }
                         
                          $html.='<div class="testimonail01-name-position '.$cls.'">
                            <h2 class="name-test" style="color:'.$metabox_content_color.';"><strong>'. $testimonial->post_title .'</strong></h2>
                            <p class="position-test" style="color:'.$metabox_content_color.';">'. $metabox_job_position .'</p>
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
add_shortcode('testimonials03', 'sweetthemes_shortcode_testimonials3');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    vc_map( array(
     "name" => esc_attr__("MT - Testimonials Box 2", 'sweetthemes'),
     "base" => "testimonials03",
     "category" => esc_attr__('MT: SweetThemes', 'sweetthemes'),
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
          "heading" => esc_attr__("Visible Testimonials per row", 'sweetthemes'),
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
          "heading" => esc_attr__("Animation", 'sweetthemes'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $animations_list
        )
      )
  ));
}
?>