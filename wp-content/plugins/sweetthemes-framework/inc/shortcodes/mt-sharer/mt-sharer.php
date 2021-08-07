<?php
/**
||-> Shortcode: Video
*/
function mt_sharer_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'tooltip_placement'                 => '',
        ), $params ) );
    $html = '';
    $html .= '<div class="article-social">
                <ul class="social-sharer">
                    <li class="facebook">
                        <a target="_blank" data-toggle="tooltip" title="'.esc_html__('Share on Facebook','niva').'" data-placement="'.esc_attr($tooltip_placement).'" href="http://www.facebook.com/share.php?u='.get_permalink().'&amp;title='.get_the_title().'"><i class="icon-social-facebook"></i></a>
                    </li>
                    <li class="twitter">
                        <a target="_blank" data-toggle="tooltip" title="'.esc_html__('Tweet on Twitter','niva').'" data-placement="'.esc_attr($tooltip_placement).'" href="http://twitter.com/home?status='.get_the_title().'+'.get_permalink().'"><i class="icon-social-twitter"></i></a>
                    </li>
                    <li class="google-plus">
                        <a target="_blank" data-toggle="tooltip" title="'.esc_html__('Share on G+','niva').'" data-placement="'.esc_attr($tooltip_placement).'" href="https://plus.google.com/share?url='.get_permalink().'"><i class="icon-social-gplus"></i></a>
                    </li>
                    <li class="pinterest">
                        <a target="_blank" data-toggle="tooltip" title="'.esc_html__('Pin on Pinterest','niva').'" data-placement="'.esc_attr($tooltip_placement).'" href="http://pinterest.com/pin/create/bookmarklet/?media='.get_permalink().'&url='.get_permalink().'&is_video=false&description='.get_permalink().'"><i class="icon-social-pinterest"></i></a>
                    </li>
                    <li class="linkedin">
                        <a target="_blank" data-toggle="tooltip" title="'.esc_html__('Share on LinkedIn','niva').'" data-placement="'.esc_attr($tooltip_placement).'" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.get_permalink().'&amp;title='.get_the_title().'&amp;source='.get_permalink().'"><i class="icon-social-linkedin"></i></a>
                    </li>
                    <li class="reddit">
                        <a data-toggle="tooltip" title="'.esc_html__('Share on Reddit','niva').'" data-placement="'.esc_attr($tooltip_placement).'" href="http://www.reddit.com/submit?url='.get_permalink().'&amp;title='.get_the_title().'"><i class="icon-social-reddit"></i></a>
                    </li>
                    <li class="tumblr">
                        <a data-toggle="tooltip" title="'.esc_html__('Share on Tumblr','niva').'" data-placement="'.esc_attr($tooltip_placement).'" href="http://www.tumblr.com/share?v=3&amp;u='.get_permalink().'&amp;t='.get_the_title().'"><i class="icon-social-tumblr"></i></a>
                    </li>
                </ul>
            </div>';
    return $html;
}
add_shortcode('mt_sharer', 'mt_sharer_shortcode');
?>