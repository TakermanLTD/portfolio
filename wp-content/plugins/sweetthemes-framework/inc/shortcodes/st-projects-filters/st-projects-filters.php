<?php 
/**
||-> Shortcode: BlogPos01
*/
function sweetthemes_shortcode_portfolio_filters($params, $content) {
    extract( shortcode_atts( 
        array(
            'number'              =>'',
            'filter_on_off'              =>'',
            'animation' => '',
        ), $params ) );

    $args_blogposts = array(
            'posts_per_page'   => $number,
            'order'            => 'DESC',
            'post_type'        => 'st_projects',
            'post_status'      => 'publish' 
    ); 
    $animation_final = '';
    if(!empty($animation)) {
        $animation_final = 'wow ' . $animation;
    }
    $blogposts = get_posts($args_blogposts);

    $categories = get_terms( 'st-projects-category', array('orderby' => 'count','order' => 'DESC', 'hide_empty' => 0) );
    $html = '';

    $html .= '<div class="iconfilter-shortcode portfolio-posts-list portfolio-posts-list2">';
      $html .= '<div class="row">';
        $html .= '<div class="cd-main-content">';

          if($filter_on_off != 'off') {
            $html .= '<div class="cd-tab-filter-wrapper">';
              $html .= '<div class="cd-tab-filter">';
                $html .= '<ul class="cd-filters '.$animation_final.'">';
                  $html .= '<li class="placeholder"><a data-type="all">All</a></li>';
                  //$html .= '<li class="filter"><a class="selected" data-type="all">All <span>'.count($blogposts).'</span></a></li>';
                  $html .= '<li class="filter"><a class="selected" data-type="all">All</a></li>';
                  foreach($categories as $category){   
                      $query = new WP_Query([
                                'posts_per_page' => -1,
                                'post_type' => 'st_projects',
                                'tax_query' => [
                                    [
                                        'taxonomy' => 'st-projects-category',
                                        'terms' => $category->term_id,
                                        'field' => 'id'
                                    ]
                                ]
                            ]);

                      /*$html .= '<li class="filter" data-filter=".'.esc_attr($category->slug).'">
                            <a data-type="'.esc_attr($category->slug).'">'.esc_attr($category->name).' <span>'.$query->found_posts.'</span></a>';
                      $html .= '</li>';*/
                      $html .= '<li class="filter" data-filter=".'.esc_attr($category->slug).'">
                            <a data-type="'.esc_attr($category->slug).'">'.esc_attr($category->name).'</a>';
                      $html .= '</li>';
                  }
                $html .= '</ul>';
              $html .= '</div>';
            $html .= '</div>';
          }

          $html .= '<section class="cd-gallery">';
            $html .= '<ul>';
    $count = 0;
    foreach ($blogposts as $blogpost) {
      #thumbnail
      $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $blogpost->ID ), 'niva_projects_listing' );
      $custom_link  = get_post_meta( $blogpost->ID, 'mt_portfolio_custom_link', true );

      $portfolio_link_button = get_permalink($blogpost->ID);
      $portfolio_link_title = get_permalink($blogpost->ID);

      if ($thumbnail_src) {
        $post_img = '<img class="portfolio_post_image" src="'. esc_url($thumbnail_src[0]) . '" alt="'.$blogpost->post_title.'" />';
      }else{
        $post_col = 'col-md-12 no-featured-image';
      }

      $term_list = wp_get_post_terms($blogpost->ID, 'st-projects-category');
      $cat_slugs = implode(' ',wp_list_pluck($term_list,'slug'));
                                                       
      $html.='<li class="mix '.$cat_slugs.' '.$blogpost->post_title.'">
                <div data-wow-delay="'.$count.'s" class=" '.$animation_final.' col-md-12 post">
                  <article class="list-view">
                    <div class="portfolio_custom">

                      <!-- POST THUMBNAIL -->
                      <div class="post-thumbnail">
                          <div class="box-project">  
                            <div class="relative">'.$post_img.'</div>
                            <div class="project_cat_title_overlay">
                              <div class="project_cat_title_overlay_items">   
                                <h3 class="project_title">
                                  <a href="#" title="'. $blogpost->post_title .'">'.$blogpost->post_title.'</a>
                                </h3>             
                                <h5 class="project_cat">
                                  '.get_the_term_list( $blogpost->ID, 'st-projects-category', ' ', ', ' ).'
                                </h5>                          
                              </div>
                            </div>
                            <a class="link-project" href="'.esc_url($portfolio_link_title).'" target="_self"></a>
                          </div>
                      </div>                

                    </div>
                    </article>
                </div>
              </li>';
              $count = $count + 0.2;
    }
            $html .= '</ul>';
            $html .= '<div class="cd-fail-message">No results found</div>';
          $html .= '</section>';
        $html .= '</div>';
      $html .= '</div>';
    $html .= '</div>';
    return $html;
}
add_shortcode('portfolio_filters', 'sweetthemes_shortcode_portfolio_filters');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
  require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';
  vc_map( array(
     "name" => esc_attr__("ST - Portfolio Filters", 'sweetthemes'),
     "base" => "portfolio_filters",
     "category" => esc_attr__('ST: sweetthemes', 'sweetthemes'),
     "icon" => "smartowl_shortcode",
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
            "heading" => esc_attr__("Filter Status", 'sweetthemes'),
            "param_name" => "filter_on_off",
            "std" => 'on',
            "description" => "",
            "value" => array(
                esc_attr__('On', 'sweetthemes')     => 'on',
                esc_attr__('Off', 'sweetthemes')    => 'off'
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
      ),
       
  ));
}
?>