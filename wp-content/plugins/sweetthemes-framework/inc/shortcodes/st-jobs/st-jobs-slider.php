<?php
require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');
/**
||-> Shortcode: Jobs slider
*/
function sweetthemes_shortcode_jobs($params, $content) {
    extract( shortcode_atts( 
        array(
            'number'                =>'',
            'title_color'         =>'',
            'button_color'         =>'',
            'animation' => '',
        ), $params ) );
      $html = '';
        $html .= '<div class="navigation-jobs-slider">
                    <span class="prev-item"></span>
                    <span class="next-item"></span>
                  </div>
        <div class="jobs-container-1">';
        $args_jobs = array(
                'posts_per_page'   => $number,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'post_type'        => 'jobs',
                'post_status'      => 'publish' 
                ); 
        $animation_final = '';
        if(!empty($animation)) {
            $animation_final = 'wow ' . $animation;
        }
        $jobs = get_posts($args_jobs);
            foreach ($jobs as $job) {
                #metaboxes
                $aply_btn_text = get_post_meta( $job->ID, 'aply_btn_text', true );
                $aply_btn_link = get_post_meta( $job->ID, 'aply_btn_link', true );
                $job_title = get_post_meta( $job->ID, 'job_title', true );

                $job_id = $job->ID;
                $content_post   = get_post($job_id);
                $content        = $content_post->post_content;
                $content        = apply_filters('the_content', $content);
                $content        = str_replace(']]>', ']]&gt;', $content);
                
                $html.='
                  <div class="relative">
                    <div class="jobs01_item">         
                      <div class="jobs01-img-holder pull-left">';
                 
                      
                        $html.='<div class="jobs01-profile-content '.$animation_final.'">';                       
                          $html.='<div class="jobs01-name-position text-center">
                            <h3 style="color:'.$title_color.';" class="name-test '.$animation_final.'">' .$job_title. '</h3>
                          </div>
                        </div>';

                        $html.='<div class="jobs01-content '.$animation_final.'">'.$content.'</div>';

                        $html.='<a style="background-color:'.$button_color.';" class="btn_job '.$animation_final.'" href="'.$aply_btn_link.'" target="_blank"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> '.$aply_btn_text.' </a>

                      </div>
                    </div>
                  </div>';
            }
            $html .= '
            ';
      $html .= '</div>
      ';
    return $html;
}
add_shortcode('jobs01', 'sweetthemes_shortcode_jobs');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    vc_map( array(
     "name" => esc_attr__("ST - Jobs Slider", 'sweetthemes'),
     "base" => "jobs01",
     "category" => esc_attr__('ST: SweetThemes', 'sweetthemes'),
     "icon" => "quin_shortcode",
     "params" => array(
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Number of jobs", 'sweetthemes' ),
          "param_name" => "number",
          "value" => "",
          "description" => esc_attr__( "Enter number of jobs to show.", 'sweetthemes' )
        ),

        array(
          "group" => "Options",
          "type" => "colorpicker",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Title color", 'sweetthemes' ),
          "param_name" => "title_color",
          "value" => "",
          "description" => esc_attr__( "Enter Title color", 'sweetthemes' )
        ),

        array(
          "group" => "Options",
          "type" => "colorpicker",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Button color", 'sweetthemes' ),
          "param_name" => "button_color",
          "value" => "",
          "description" => esc_attr__( "Enter Button color", 'sweetthemes' )
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