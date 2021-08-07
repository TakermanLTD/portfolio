<?php
require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');
function twitter_time($a) {
    //get current timestampt
    $b = strtotime("now"); 
    //get timestamp when tweet created
    $c = strtotime($a);
    //get difference
    $d = $b - $c;
    //calculate different time values
    $minute = 60;
    $hour = $minute * 60;
    $day = $hour * 24;
    $week = $day * 7;
        
    if(is_numeric($d) && $d > 0) {
        //if less then 3 seconds
        if($d < 3) return "right now";
        //if less then minute
        if($d < $minute) return floor($d) . " seconds ago";
        //if less then 2 minutes
        if($d < $minute * 2) return "about 1 minute ago";
        //if less then hour
        if($d < $hour) return floor($d / $minute) . " minutes ago";
        //if less then 2 hours
        if($d < $hour * 2) return "about 1 hour ago";
        //if less then day
        if($d < $day) return floor($d / $hour) . " hours ago";
        //if more then day, but less then 2 days
        if($d > $day && $d < $day * 2) return "yesterday";
        //if less then year
        if($d < $day * 365) return floor($d / $day) . " days ago";
        //else return more than a year
        return "over a year ago";
    }
}
/**
||-> Shortcode: Recent Tweets
*/
if (is_plugin_active('redux-framework/redux-framework.php')){
    function sweetthemes_setup_shortcode_tweetslider( $params, $content ) {
        extract( shortcode_atts( array(
            'no'            => 3,
            'tweet_font_size'     => '',
            'tweet_line_height'     => '',
            'tweet_color'     => '',
            'tweet_text_alignment'     => '',
            ), $params ) );
        global $niva;
        require_once( 'twitter/twitteroauth/twitteroauth.php' );
        # Get Theme Options Twitter Details
        $tw_username            = $niva['mt_social_tw'];
        $consumer_key           = $niva['mt_tw_consumer_key'];
        $consumer_secret        = $niva['mt_tw_consumer_secret'];
        $access_token           = $niva['mt_tw_access_token'];
        $access_token_secret    = $niva['mt_tw_access_token_secret'];
        $no = $no+1;
        # Create the connection
        $twitter = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
        # Migrate over to SSL/TLS
        $twitter->ssl_verifypeer = true;
        # Load the Tweets
        $tweets = $twitter->get('statuses/user_timeline', array('screen_name' => $tw_username, 'exclude_replies' => 'true', 'include_rts' => 'false', 'count' => $no));
        if(!empty($tweets)) {
            $html = '';
            $html .= '<div class="mt_tweets_slider-group row">';
                $html .= '<div class="mt_tweets_slider owl-carousel owl-theme">';
                // $html .= '<div class="mt_tweets_slider_fixed">';
                    foreach($tweets as $tweet) {
                        # Access as an object
                        $tweetText = $tweet->text;
                        $created_at = $tweet->created_at;
                        # Make links active
                        $tweetText = preg_replace("/(http:\/\/|(www.))(([^s<]{4,68})[^s<]*)/", '', $tweetText);
                        # Linkify user mentions
                        $tweetText = preg_replace("/@(w+)/", '', $tweetText);
                        # Linkify tags
                        $tweetText = preg_replace("/#(w+)/", '', $tweetText);
                        $html .= '<div class="single-tweet item">';
                            $html .= '<div class="col-md-12">';
                                $html .= '<div class="tweet-content '.$tweet_text_alignment.'" style="color:'.$tweet_color.'; font-size:'.$tweet_font_size.'; line-height:'.$tweet_line_height.';"><i class="fa fa-twitter" aria-hidden="true"></i> '.$tweetText.'<span class="created-at">'.twitter_time($created_at).'</span></div>';
                            $html .= '<a class="pull-left" target="_blank" href="https://twitter.com/'.$tw_username.'">Follow @'.$tw_username.'</a>';
                            $html .= '</div>';
                        $html .= '</div>';
                    }
                $html .= '</div>';
            $html .= '</div>';
            
            return $html;
        }
    }
    add_shortcode('st_tweetslider', 'sweetthemes_setup_shortcode_tweetslider');
}
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    
    vc_map( 
        array(
            "name" => esc_attr__("ST - Tweets", 'sweetthemes'),
            "base" => "st_tweetslider",
            "category" => esc_attr__('MT: sweetthemes', 'sweetthemes'),
            "icon" => "smartowl_shortcode",
            "params" => array(
                array(
                    "group" => "Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__("Number of tweets to show", 'sweetthemes'),
                    "param_name" => "no",
                    "value" => "",
                    "description" => "Default value: 5"
                ),
                array(
                    "group" => "Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__("Font size(eg: 20px)", 'sweetthemes'),
                    "param_name" => "tweet_font_size",
                    "value" => "",
                    "description" => "Default value: 20px"
                ),
                array(
                    "group" => "Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__("Line Height(eg: 28px)", 'sweetthemes'),
                    "param_name" => "tweet_line_height",
                    "value" => "",
                    "description" => "Default value: 28px"
                ),
                array(
                    "group" => "Styling",
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__("Color", 'sweetthemes'),
                    "param_name" => "tweet_color",
                    "value" => "",
                ),
                array(
                    "group" => "Styling",
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__("Text Alignment", 'sweetthemes'),
                    "param_name" => "tweet_text_alignment",
                    "value" => "",
                    "value" => array(
                        'Left'     => 'text-left',
                        'Center'     => 'text-center',
                        'Right'      => 'text-right'
                    )
                ),
            )
        )
    );
}
?>