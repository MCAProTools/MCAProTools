<?php

function avada_child_scripts()

{

    if (!is_admin() && !in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'))) {



        $theme_info = wp_get_theme();



        wp_enqueue_style('avada-child-stylesheet', get_template_directory_uri() . '/style.css', array(), $theme_info->get('Version'));

        //Bootstrap - Child

        wp_enqueue_style('avada-child-bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array(), $theme_info->get('Version'));

        //Landing Page Custom CSS - Child

        wp_enqueue_style('avada-child-custom', get_stylesheet_directory_uri() . '/assets/css/custom.css', array(), $theme_info->get('Version'));

        wp_enqueue_style('avada-child-css', get_stylesheet_directory_uri() . '/style.css', array(), $theme_info->get('Version'));



        wp_register_script("mca_save_user_information", get_stylesheet_directory_uri() . '/assets/js/mca_save_user_information.js', array('jquery'));

        wp_localize_script('mca_save_user_information', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));

        wp_enqueue_script('mca_save_user_information');

    }

}

require_once(get_stylesheet_directory() . '/widgets/sensei-navigation.php');


function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );




add_action('wp_enqueue_scripts', 'avada_child_scripts');

/**

 * [affiliate_username_mca] shortcode

 * Outputs an anchor link with the currently tracked affiliate's username

 * https://gist.github.com/sumobi/3f3aef04e9c8d6798db7

 */

function affwp_custom_affiliate_username_mca_shortcode($atts, $content = null)

{

    $affiliate_id = affiliate_wp()->tracking->get_affiliate_id();

    if ($affiliate_id) {

        $affiliate = affwp_get_affiliate($affiliate_id);

        $user_info = get_userdata($affiliate->user_id);

    }

    // get the affiliate username and set a default if no affiliate is being tracked

    $affiliate_user_name = isset($user_info->mca_username) ? $user_info->mca_username : 'aberlin';

    $content = '<a class="yellow-button" href="http://' . $affiliate_user_name . '.mcaprotoools.com/join">I Don\'t Have A<br>MCA Account!</a>';

    return do_shortcode($content);

}



add_shortcode('affiliate_username', 'affwp_custom_affiliate_username_shortcode');

/**

 * [affiliate_referral_url_username] shortcode

 */

function affwp_custom_referral_url_shortcode($atts, $content = null)

{

    if (!affwp_is_affiliate()) {

        return;

    }

    shortcode_atts(array(

        'url' => ''

    ), $atts, 'affiliate_referral_url_username');

    if (!empty($content)) {

        $base = $content;

    } else {

        $base = !empty($atts['url']) ? $atts['url'] : home_url('/');

    }

    $affiliate = affwp_get_affiliate(affwp_get_affiliate_id());

    $user_info = get_userdata($affiliate->user_id);

    $affiliate_user_name = $user_info->user_login;

    return add_query_arg(affiliate_wp()->tracking->get_referral_var(), $affiliate_user_name, $base);

}



add_shortcode('affiliate_referral_url_username', 'affwp_custom_referral_url_shortcode');

/**

 * Force the frontend scripts to load on pages with these shortcodes

 */

function affwp_custom_force_frontend_scripts($ret)

{

    global $post;

    if (

        has_shortcode($post->post_content, 'affiliate_creatives') ||



        has_shortcode($post->post_content, 'affiliate_graphs') ||

        has_shortcode($post->post_content, 'affiliate_referrals') ||

        has_shortcode($post->post_content, 'affiliate_settings') ||

        has_shortcode($post->post_content, 'affiliate_stats') ||

        has_shortcode($post->post_content, 'affiliate_urls') ||

        has_shortcode($post->post_content, 'affiliate_visits')

    ) {

        $ret = true;

    }

    return $ret;

}



add_filter('affwp_force_frontend_scripts', 'affwp_custom_force_frontend_scripts');

/**

 * [affiliate_settings] shortcode

 */

function affwp_custom_affiliate_settings_shortcode($atts, $content = null)

{

    ob_start();

    echo '<div id="affwp-affiliate-dashboard">';

    affiliate_wp()->templates->get_template_part('dashboard-tab', 'settings');

    echo '</div>';

    $content = ob_get_clean();

    return $content;

}



add_shortcode('affiliate_settings', 'affwp_custom_affiliate_settings_shortcode');

/**

 * [affiliate_graphs] shortcode

 */

function affwp_custom_affiliate_graphs_shortcode($atts, $content = null)

{

    ob_start();

    echo '<div id="affwp-affiliate-dashboard">';

    affiliate_wp()->templates->get_template_part('dashboard-tab', 'graphs');

    echo '</div>';

    $content = ob_get_clean();

    return $content;

}



add_shortcode('affiliate_graphs', 'affwp_custom_affiliate_graphs_shortcode');

/**

 * [affiliate_referrals] shortcode

 */

function affwp_custom_affiliate_referrals_shortcode($atts, $content = null)

{

    ob_start();

    echo '<div id="affwp-affiliate-dashboard">';

    affiliate_wp()->templates->get_template_part('dashboard-tab', 'referrals');

    echo '</div>';

    $content = ob_get_clean();

    return $content;

}



add_shortcode('affiliate_referrals', 'affwp_custom_affiliate_referrals_shortcode');

/**

 * [affiliate_stats] shortcode

 */

function affwp_custom_affiliate_stats_shortcode($atts, $content = null)

{

    ob_start();

    echo '<div id="affwp-affiliate-dashboard">';

    affiliate_wp()->templates->get_template_part('dashboard-tab', 'stats');

    echo '</div>';

    $content = ob_get_clean();

    return $content;

}



add_shortcode('affiliate_referrals', 'affwp_custom_affiliate_stats_shortcode');

/**

 * [affiliate_urls_display] shortcode

 */

function affwp_custom_affiliate_urls_display_shortcode($atts, $content = null)

{

    ob_start();

    echo '<div id="affwp-affiliate-dashboard">';

    affiliate_wp()->templates->get_template_part('dashboard-tab', 'urls');

    echo '</div>';

    $content = ob_get_clean();

    return $content;

}



/**

 * [affiliate_creatives] shortcode

 */

function affwp_custom_affiliate_creatives_shortcode($atts, $content = null)

{

    ob_start();

    echo '<div id="affwp-affiliate-dashboard">';

    affiliate_wp()->templates->get_template_part('dashboard-tab', 'creatives');

    echo '</div>';

    $content = ob_get_clean();

    return $content;

}



add_shortcode('affiliate_creatives', 'affwp_custom_affiliate_creatives_shortcode');

/**

 * [affiliate_visits] shortcode

 */

function affwp_custom_affiliate_visits_shortcode($atts, $content = null)

{

    ob_start();

    echo '<div id="affwp-affiliate-dashboard">';

    affiliate_wp()->templates->get_template_part('dashboard-tab', 'visits');

    echo '</div>';

    $content = ob_get_clean();

    return $content;

}



add_shortcode('affiliate_visits', 'affwp_custom_affiliate_visits_shortcode');


// SAVE MCA USERNAME SHORTCODE


add_filter('su/data/shortcodes', 'register_my_custom_shortcode');
function register_my_custom_shortcode($shortcodes)
{
    $shortcodes['mca_user'] = array(
        'name' => __('MCA User Information', 'mca'),
        'type' => 'single',
        'group' => 'data',
        'atts' => array(
            'meta_key' => array(
                'default' => '',
                'name' => __('MCA User Field', 'su'),
                'desc' => __('The user meta key to display', 'su')
            ),

            'referrer_data' => array(
                'type' => 'select',
                'values' => array(
                    'yes' => __('Yes', 'su'),
                    'no' => __('No', 'su')
                ),
                'default' => 'no',
                'name' => __('Referrer Data', 'su'),
                'desc' => __('Get the referrer\'s data if available instead of the current user', 'su')
            ),

            'referrer_key' => array(
                'default' => '',
                'name' => __('Referrer Variable', 'su'),
                'desc' => __('The expected variable that will catch the referrer\'s ID or Username', 'su')
            ),


            'editable' => array(
                'type' => 'select',
                'values' => array(
                    'yes' => __('Yes', 'su'),
                    'no' => __('No', 'su')
                ),
                'default' => 'no',
                'name' => __('Editable', 'su'),
                'desc' => __('Set the user field if editable or not', 'su')
            ),

            'class' => array(
                'default' => '',
                'name' => __('Custom Class', 'su'),
                'desc' => __('The custom class for the container', 'su')
            ),
            'display_type' => array(
                'type' => 'select',
                'values' => array(
                    'single_line' => __('Single Line Text', 'su'),
                    'paragraph' => __('Paragraph Text', 'su')
                ),
                'default' => '',
                'name' => __('Display Type', 'su'),
                'desc' => __('Type to display if field is editable', 'su')
            ),

            'placeholder' => array(
                'default' => '',
                'name' => __('Placeholder', 'su'),
                'desc' => __('Placeholder if the field is editable', 'su')
            ),

            'save_message' => array(
                'default' => 'Field has been successfully saved!',
                'name' => __('Save Message', 'su'),
                'desc' => __('Message to display after modifying the field', 'su')
            ),
        ),
        'icon' => 'info-circle',
        'function' => 'get_mca_user_information'
    );
    return $shortcodes;
}

function get_mca_user_information($atts, $content = null)
{
    global $current_user;
    $atts = shortcode_atts(array(
        'meta_key' => '',
        'referrer_data' => 'no',
        'referrer_key' => 'referrer',
        'editable' => 'no',
        'class' => '',
        'display_type' => 'single_line',
        'placeholder' => 'Enter your data here',
        'save_message' => 'Field has been successfully saved!'
    ), $atts);

    if (empty($atts['meta_key']))
        return 'MCA User Field is required!';

    if ($atts['meta_key'] == 'referrer') {
        return $_GET[$atts['referrer_key']];
    }

    $user_id = $current_user->ID;
    if ($atts['referrer_data'] == 'yes') {
        $username = $_GET[$atts['referrer_key']];

        $user = get_user_by('login', $username);
        $user_id = $user->ID;

        if ($atts['meta_key'] == 'displayname') {
            $meta_value = $user->first_name . ' ' . $user->last_name;
        } elseif ($atts['meta_key'] == 'useravatar') {
            $meta_value = get_avatar($user_id, 400);
        } else {
            $meta_value = get_user_meta($user_id, $atts['meta_key'], true);
        }

        if (empty($meta_value))
            $user_id = 1;
    }

    $user_id = !empty($user_id) ? $user_id : 1;

    if ($atts['meta_key'] == 'displayname') {
        $user = get_userdata($user_id);
        $meta_value = $user->first_name . ' ' . $user->last_name;
    } elseif ($atts['meta_key'] == 'useravatar') {
        $meta_value = get_avatar($user_id, 400);
    } elseif ($atts['meta_key'] == 'userlocation') {
        $geolocation = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']));
        // $geolocation = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=97.76.202.238'));

        if (!empty($geolocation['geoplugin_city']))
            $meta_value = $geolocation['geoplugin_city'];

        if (!empty($geolocation['geoplugin_regionName']))
            $meta_value = empty($meta_value) ? $geolocation['geoplugin_regionName'] : $meta_value . ', ' . $geolocation['geoplugin_regionName'];

        if (!empty($geolocation['geoplugin_countryName']) && $geolocation['geoplugin_countryName'] != 'United States')
            $meta_value = empty($meta_value) ? $geolocation['geoplugin_countryName'] : $meta_value . ', ' . $geolocation['geoplugin_countryName'];

    } else {
        $meta_value = get_user_meta($user_id, $atts['meta_key'], true);
    }

    $html = $meta_value;

    if ($atts['editable'] == 'yes') {
        $nonce = wp_create_nonce('mca_user_info_nonce');

        $html = '<div class="' . $atts['class'] . '"><form onsubmit="return false">';
        if ($atts['display_type'] == 'single_line')
            $html .= '<input type="text" required class="mca_user_field" data-meta_key="' . $atts['meta_key'] . '" placeholder="' . $atts['placeholder'] . '" value="' . $meta_value . '">';
        else
            $html .= '<textarea class="mca_user_field" data-meta_key="' . $atts['meta_key'] . '" placeholder="' . $atts['placeholder'] . '">' . $meta_value . '</textarea>';

        $html .= '<button type="submit" class="save-user-info" data-nonce="' . $nonce . '"
        data-message="' . $atts['save_message'] . '">SAVE</button>';
        $html .= '<button type="submit" class="reset-user-info" data-nonce="' . $nonce . '"
        data-message="Field has been successfully reset!">RESET</button>';
        $html .= '<div class="siteclear"></div>';
        $html .= '<div class="mca_user_message"></div>';
        $html .= '</form></div>';
    }

    return $html;
}

function save_mca_user_information()
{
    
    global $current_user;

    $meta_key = $_POST['meta_key'];
    $meta_value = $_POST['meta_value'];
    update_user_meta($current_user->ID, $meta_key, $meta_value);
    $response['html'] = $meta_key;
    $response['save_message'] = $_POST['save_message'];
    echo json_encode($response);
    die();
}

add_action('wp_ajax_save_mca_user_information', 'save_mca_user_information');

function wcs_redirect_product_based($order_id)
{
    $order = wc_get_order($order_id);

    foreach ($order->get_items() as $item) {
        $_product = wc_get_product($item['product_id']);
        // Add whatever product id you want below here
        if ($item['product_id'] == 171) {
            // change below to the URL that you want to send your customer to
            wp_redirect(get_site_url());
        }
    }
}




// Affiliate + Marketing Links Tracking


function filter_affiliate_username($content)
{
    if (!affwp_is_affiliate()) {
        return $content;
    }

    $affiliate = affwp_get_affiliate(affwp_get_affiliate_id());
    $user_info = get_userdata($affiliate->user_id);
    $affiliate_user_name = $user_info->user_login;

    $referrer = $_GET['ref'];
    $content = str_replace("{referrer}", $referrer, $content);
    $content = str_replace("{affiliate_username}", $affiliate_user_name, $content);
    return $content;
}

add_filter('the_content', 'filter_affiliate_username');
function filter_referrer_menu($items)
{
    $username = $_GET['ref'];
    $user = get_user_by('login', $username);
    foreach ($items as $item) {
        if ($item->title == "{referrer}") {
            if ($user) {
                $item->title = '
                    <div class="referrer-menu">
                        <div class="pull-left">
                            <div class="referrer-caption">You We\'re Referred By:</div>
                            <div class="referrer-name">' . $user->first_name . ' ' . $user->last_name . '</div>
                        </div>
                        <div class="pull-right">' . get_avatar($user->ID, 90) . '</div>
                    </div>
                ';
            } else {
                $item->title = '';
            }
        }
    }

    return $items;
}



// HIDE WP Bar From Non admin
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}



// Add 'odd' and 'even' post classes
function oddeven_post_class ( $classes ) {
   global $current_class;
   $classes[] = $current_class;
   $current_class = ($current_class == 'odd') ? 'even' : 'odd';
   return $classes;
}
add_filter ( 'post_class' , 'oddeven_post_class' );
global $current_class;
$current_class = 'odd';


function _wpse206466_can_view()
{
    // or any other admin level capability
    return current_user_can('manage_options');
}


/*add_action('load-index.php', 'wpse206466_load_index');
function wpse206466_load_index()
{
    if (!_wpse206466_can_view()) {
        $qs = empty($_GET) ? '' : '?'.http_build_query($_GET);
        wp_safe_redirect(admin_url('profile.php').$qs);
        exit;
    }
}*/

add_action('load-index.php', 'wpse206466_load_index');
function wpse206466_load_index()
{
    if (!_wpse206466_can_view()) {
        $qs = empty($_GET) ? '' : '?'.http_build_query($_GET);
        wp_safe_redirect(admin_url('profile.php').$qs);
        exit;
    }
}



$required_capability = 'edit_others_posts';
$redirect_to = '';
function no_admin_init() {      
    // We need the config vars inside the function
    global $required_capability, $redirect_to;      
    // Is this the admin interface?
    if (
        // Look for the presence of /wp-admin/ in the url
        stripos($_SERVER['REQUEST_URI'],'/wp-admin/') !== false
        &&
        // Allow calls to async-upload.php
        stripos($_SERVER['REQUEST_URI'],'async-upload.php') == false
        &&
        // Allow calls to admin-ajax.php
        stripos($_SERVER['REQUEST_URI'],'admin-ajax.php') == false
    ) {         
        // Does the current user fail the required capability level?
        if (!current_user_can($required_capability)) {              
            if ($redirect_to == '') { $redirect_to = 'https://mcaprotools.com/dashboard/'; }              
            // Send a temporary redirect
            wp_redirect($redirect_to,302);              
        }           
    }       
}
// Add the action with maximum priority
add_action('init','no_admin_init',0);
