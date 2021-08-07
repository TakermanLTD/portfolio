<?php 
/**
||-> Shortcode: BlogPos01
*/
function sweetthemes_shortcode_blogpost01($params, $content) {
    extract( shortcode_atts( 
        array(
            'number'              =>'',
            'columns'             =>'',
            'animation' => '',
        ), $params ) );
    $html = '';
    $html .= '<div class="blog-posts simple-posts blog-posts-shortcode">';
    $html .= '<div class="row">';
    $args_blogposts = array(
            'posts_per_page'   => $number,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'post_type'        => 'post',
            'post_status'      => 'publish' 
            ); 
    $blogposts = get_posts($args_blogposts);
    $animation_final = '';
    if(!empty($animation)) {
        $animation_final = 'wow ' . $animation;
    }
    $count_animation = 0;
    foreach ($blogposts as $blogpost) {
        #thumbnail
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $blogpost->ID ),'niva_post_pic700x500' );
        
        $content_post   = get_post($blogpost->ID);
        $content        = $content_post->post_content;
        $content        = apply_filters('the_content', $content);
        $content        = str_replace(']]>', ']]&gt;', $content);
        if ($thumbnail_src) {
            $post_img = '<img class="blog_post_image" src="'. esc_url($thumbnail_src[0]) . '" alt="'.$blogpost->post_title.'" />';
            $post_col = 'col-md-12';
        }else{
            $post_col = 'col-md-12 no-featured-image';
            $post_img = '';
        }
        $author_id = get_post_field ('post_author', $blogpost->ID);
        $display_name = get_the_author_meta( 'display_name' , $author_id ); 
      
          $html.='<div class="vc_col-xs-12 vc_col-sm-12 '.esc_attr($columns).'">
                      <article data-wow-delay="'.$count_animation.'s" class=" '.$animation_final.' single-post list-view">
                        <div class="blog_custom">
                          <!-- POST THUMBNAIL -->
                          <div class="col-md-12 post-thumbnail">
                              <a class="relative" href="'.get_permalink($blogpost->ID).'">
                                <div class="featured_image_blog">'
                                  .$post_img.
                                  '<div class="flex-icon">
                                    <div class="flex-icon-inside">
                                      <i class="fa fa-link" aria-hidden="true"></i>
                                    </div>
                                  </div>
                                </div>
                              </a>
                              <div class="post-categories">
                                '.wp_kses_post(get_the_term_list( $blogpost->ID, 'category', ' ', ', ' )).' 
                              </div>
                              
                          </div>
                          <!-- POST DETAILS -->
                          <div class="post-details '.$post_col.'">
                            <div class="post-category-comment-date row">                             
                              <span class="post-date"><i class="fa fa-clock-o"></i> '.get_the_time('F j, Y', $blogpost->ID).'</span>
                              <span class="post-author">
                                  <i class="fa fa-user" aria-hidden="true"></i>
                                  <a href="'.esc_url(get_author_posts_url( get_the_author_meta( $blogpost->ID ), get_the_author_meta( 'user_nicename' ) )).'">'.$display_name.'</a>
                              </span>';
                            $html .= '</div>
                            <h3 class="post-name row">
                              <a href="'.get_permalink($blogpost->ID).'" title="'. $blogpost->post_title .'">'. $blogpost->post_title .'</a>
                            </h3>
                            <div class="post-excerpt row">
                                <p>'.strip_tags(sweetthemes_excerpt_limit($content, 13)).'...</p>
                            </div>
                          </div>                       
                        </div>
                      </article>
                    </div>';
      $count_animation = $count_animation + 0.2;
    }
    $html .= '</div>';
    $html .= '</div>';
    return $html;
}
add_shortcode('blogpost01', 'sweetthemes_shortcode_blogpost01');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';
  $post_category_tax = get_terms('category');
  $post_category = array();
  foreach ( $post_category_tax as $term ) {
    $post_category[$term->name] = $term->slug;
  }
    vc_map( array(
     "name" => esc_attr__("ST - Blog Posts", 'sweetthemes'),
     "base" => "blogpost01",
     "category" => esc_attr__('ST: SweetThemes', 'sweetthemes'),
     "icon" => "niva_shortcode",
     "params" => array(
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Number of posts", 'sweetthemes' ),
          "param_name" => "number",
          "value" => "",
          "description" => esc_attr__( "Enter number of blog post to show.", 'sweetthemes' )
        ),
        array(
           "group" => "Options",
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Columns"),
           "param_name" => "columns",
           "std" => '',
           "description" => esc_attr__(""),
           "value" => array(
            esc_attr__('2 columns')     => 'vc_col-md-6',
            esc_attr__('3 columns')     => 'vc_col-md-4'
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