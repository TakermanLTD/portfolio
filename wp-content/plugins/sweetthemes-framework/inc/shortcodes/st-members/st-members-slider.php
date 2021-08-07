<?php
require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');
/**
||-> Shortcode: Members Slider
*/
function mt_shortcode_members01($params, $content) {
    extract( shortcode_atts( 
        array(
            'number' => '',
            'order' => 'desc',
            'animation' => '',
        ), $params ) );
    $html = '';
    // CLASSES
    $animation_final = '';
    if(!empty($animation)) {
        $animation_final = 'wow ' . $animation;
    }
    $class_slider = 'mt_slider_members_'.uniqid();
        $html .= '<div class="row mt_members1 '.$class_slider.'">';
        $args_members = array(
                'posts_per_page'   => $number,
                'orderby'          => 'post_date',
                'order'            => $order,
                'post_type'        => 'member',
                'post_status'      => 'publish' 
                ); 
        $members = get_posts($args_members);
        	$count = 0;
            foreach ($members as $member) {
                #metaboxes
                $metabox_member_position = get_post_meta( $member->ID, 'niva_member_position', true );
                $metabox_member_email = get_post_meta( $member->ID, 'niva_member_email', true );
                $metabox_member_phone = get_post_meta( $member->ID, 'niva_member_phone', true );
                $metabox_facebook_profile = get_post_meta( $member->ID, 'niva_facebook_profile', true );
                $metabox_twitter_profile  = get_post_meta( $member->ID, 'niva_twitter_profile', true );
                $metabox_linkedin_profile = get_post_meta( $member->ID, 'niva_linkedin_profile', true );
                $metabox_vimeo_url = get_post_meta( $member->ID, 'niva_vimeo_url', true );
                $member_title = get_the_title( $member->ID );
                $testimonial_id = $member->ID;
                $content_post   = get_post($member);
                $content        = $content_post->post_content;
                $content        = apply_filters('the_content', $content);
                $content        = str_replace(']]>', ']]&gt;', $content);
                #thumbnail
                $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $member->ID ),'sweetthemes_members' );
                if($metabox_facebook_profile) {
                    $profil_fb = '<span class="social-holder-span"><a target="_blank" href="'. $metabox_facebook_profile .'" class="member01_profile-facebook"> <i class="fa fa-facebook" aria-hidden="true"></i></a></span>  ';
                }
                if($metabox_twitter_profile) {
                    $profil_tw = '<span class="social-holder-span"><a target="_blank" href="https://twitter.com/'. $metabox_twitter_profile .'" class="member01_profile-twitter"> <i class="fa fa-twitter" aria-hidden="true"></i></a></span>  ';
                }
                if($metabox_linkedin_profile) {
                    $profil_in = '<span class="social-holder-span"><a target="_blank" href="'. $metabox_linkedin_profile .'" class="member01_profile-linkedin"> <i class="fa fa-linkedin" aria-hidden="true"></i> </a></span>  ';
                }
                if($metabox_vimeo_url) {
                    $profil_vi = '<span class="social-holder-span"><a target="_blank" href="'. $metabox_vimeo_url .'" class="member01_vimeo_url"> <i class="fa fa-vimeo" aria-hidden="true"></i> </a></span> ';
                }
                
                $html.='
                    <div class="col-md-3 col-xs-6 relative">                        
                        <div data-wow-delay="'.$count.'s" class="'.$animation_final. '">
                        	<div class="members_img_social">
                                <div class="members_img_holder">
                                    <div class="memeber01-img-holder">';
                                        if($thumbnail_src) { 
                                            $html .= '<div class="featured_image_member">
                                                            <img src="'. $thumbnail_src[0] . '" alt="'. $member->post_title .'" />
                                                            <div class="flex-zone">
                                                               <div class="flex-zone-inside member01_social social-icons">

                                                                    <div class="member01-content">
                                                                        <div class="member01-content-inside">
                                                                            <h5 class="member01_name"><a href="'.get_the_permalink($member->ID).'">'.$member_title.'</a></h5>
                                                                            <h6 class="member01_position">'.$metabox_member_position.'</h6>                                          
                                                                        </div>
                                                                    </div>'

                                                                    . $profil_fb . $profil_tw . $profil_in  . 

                                                               '</div>
                                                            </div>
                                                      </div>';
                                        }else{ 
                                            $html .= '<img src="http://placehold.it/150x160" alt="'. $member->post_title .'" />'; 
                                        }
                                	$html.='</div>';
                                $html.='</div>                              
                            </div>
                                                      
                        </div>
                    </div>';
                $count = $count + 0.2;
            }
    $html .= '</div>';
    return $html;
}
add_shortcode('st_members_slider', 'mt_shortcode_members01');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    
    vc_map( array(
        "name" => esc_attr__("ST - Members Slider", 'sweetthemes'),
        "base" => "st_members_slider",
        "category" => esc_attr__('ST: SweetThemes', 'sweetthemes'),
        "icon" => "niva_shortcode",
        "params" => array(
            array(
                "group" => "Slider Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Number of members", 'sweetthemes' ),
                "param_name" => "number",
                "value" => "",
                "description" => esc_attr__( "Enter number of members to show.", 'sweetthemes' )
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