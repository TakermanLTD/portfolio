<?php


/**

||-> Shortcode: Subscribe Form

*/
function sweetthemes_subscribe_form($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'                      => '',
            'placeholder'                    => '',
            'button_text'                    => '',
            'background_button_subscribe'    => '',
            'color_button_subscribe'         => ''
        ), $params ) );


    if (isset($_POST['mailchimp_email'])) {

        #Global variable - REDUX FRAMEWORK
        global $niva_redux;
        
        $apiKey         = $niva_redux['mt_mailchimp_apikey'];
        $listId         = $niva_redux['mt_mailchimp_listid'];
        $double_optin   = false;
        $send_welcome   = false;
        $email_type     = 'html';
        $email          = $_POST['mailchimp_email'];
        //replace us2 with your actual datacenter
        $submit_url = "http://" . $niva_redux['mt_mailchimp_data_center'] . ".api.mailchimp.com/1.3/?method=listSubscribe";
        $data = array(
            'email_address' => $email,
            'apikey'        => $apiKey,
            'id'            => $listId,
            'double_optin'  => $double_optin,
            'send_welcome'  => $send_welcome,
            'email_type'    => $email_type
        );
        $payload = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $submit_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($payload));
        $result = curl_exec($ch);
        curl_close ($ch);
        $data = json_decode($result);
        if ($data->error){
            echo  $data->error;
        } else {
            echo esc_attr__('Got it, you\'ve been added to our email list.', 'sweetthemes');
        }
    }


    $html = '';
    $html .= '<div class="mc_embed_signup animateIn" data-animate="'.$animation.'">';
        $html .= '<div class="email">';
            $html .= '<form class="subscribe" method="POST">';
                $html .= '<input type="text" placeholder="'.$placeholder.'" name="mailchimp_email" class="emaddress" data-validate="validate(required, email)"/>';
                $html .= '<button class="btn-warning rippler rippler-default" name="submit_mailchimp" type="submit" style="background-color:'.$background_button_subscribe.'; color:'.$color_button_subscribe.';">'.$button_text.'</button>';
                $html .= '<span class="result section-description"></span>';
            $html .= '</form>';
        $html .= '</div>';
    $html .= '</div>';
    return $html;
}
add_shortcode('mt_subscribe_form', 'sweetthemes_subscribe_form');








/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

  vc_map( array(
     "name" => esc_attr__("MT - Mailchimp subscribe Form", 'sweetthemes'),
     "base" => "mt_subscribe_form",
     "category" => esc_attr__('MT: SweetThemes', 'sweetthemes'),
     "icon" => "niva_shortcode",
     "params" => array(
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Text field placeholder", 'sweetthemes'),
           "param_name" => "placeholder",
           "value" => esc_attr__("Enter email address", 'sweetthemes'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Submit button text", 'sweetthemes'),
           "param_name" => "button_text",
           "value" => esc_attr__("Submit", 'sweetthemes'),
           "description" => ""
        ),
        array(
            "group" => "Styling",
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__( "Button background color", 'sweetthemes' ),
            "param_name" => "background_button_subscribe",
            "value" => '#9861fc', //Default color
            "description" => esc_attr__( "Choose button background color", 'sweetthemes' )
        ),
        array(
            "group" => "Styling",
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__( "Button text color", 'sweetthemes' ),
            "param_name" => "color_button_subscribe",
            "value" => '#252525', //Default color
            "description" => esc_attr__( "Choose button text color", 'sweetthemes' )
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