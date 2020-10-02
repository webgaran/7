<?php
function sl_add_admin_menus()
{

    //add_dashboard_page('My Plugin Dashboard', 'My Plugin', 'read', 'my-unique-identifier', 'my_plugin_function');
    $sl_theme_options_hook = add_menu_page('تنظیمات قالب', 'تنظیمات قالب', 'manage_options', 'sl-options-page', 'sl_options_page', 'dashicons-admin-generic');
    $sl_payment_page_hook = add_menu_page('آسان پرداخت', 'آسان پرداخت', 'manage_options', 'sl-payments-page', 'sl_payments_page', 'dashicons-admin-generic');
    add_action("load-{$sl_theme_options_hook}", 'sl_theme_options_callback');
}

function sl_theme_options_callback()
{

    wp_enqueue_media();

}

//function my_plugin_function(){
//
//    ?>
<?php
//}
function sl_options_page()
{

    $slt_options = get_option('slt_options');

   //var_dump($slt_options);

    $whitelist = array('general', 'posts', 'users','settings','help');
    $default_tab = isset($_GET['tab']) && in_array($_GET['tab'], $whitelist) ? $_GET['tab'] : 'general';
    $categories = get_categories();

    if (isset($_POST['submit'])) {

        switch ($default_tab) {

            case 'general' :

                $sl_theme_logo = sanitize_text_field($_POST['sl_theme_logo']);
                $slt_options['general']['sl_theme_logo'] = $sl_theme_logo;

                //Social Network Profiles Page

                if (!empty($_POST['sl_facebook_page'])) {
                    $slt_options['general']['sl_facebook_page'] = sanitize_text_field($_POST['sl_facebook_page']);
                } else {
                    unset($slt_options['general']['sl_facebook_page']);
                }
                $slt_options['general']['sl_twitter_page'] = sanitize_text_field($_POST['sl_twitter_page']);
                $slt_options['general']['sl_instagram_page'] = sanitize_text_field($_POST['sl_instagram_page']);
                $slt_options['general']['sl_gplus_page'] = sanitize_text_field($_POST['sl_gplus_page']);

                //Contact information
                $slt_options['general']['sl_theme_phone'] = sanitize_text_field($_POST['sl_theme_phone']);
                $slt_options['general']['sl_theme_address'] = sanitize_text_field($_POST['sl_theme_address']);
                $slt_options['general']['sl_theme_email'] = sanitize_text_field($_POST['sl_theme_email']);


                break;
            case 'posts':
                intval($_POST['sl_posts_count']) ? $slt_options['posts']['sl_posts_count'] = intval($_POST['sl_posts_count']) : $slt_options['posts']['sl_posts_count'] = 3;
                isset($_POST['sl_theme_show_team']) ? $slt_options['posts']['sl_theme_show_team'] = 1 : $slt_options['posts']['sl_theme_show_team'] = 0;

                intval($_POST['sl_theme_home_category']) ? $slt_options['posts']['sl_theme_home_category'] = intval($_POST['sl_theme_home_category']) : null;

                break;
            case 'users':

                isset($_POST['sl_theme_only_register_users']) ?
                    $slt_options['users']['sl_theme_only_register_users'] = 1 :
                    $slt_options['users']['sl_theme_only_register_users'] = 0;


                break;
            case 'settings':


                if(isset($_FILES['panel_setting']) && !empty($_FILES['panel_setting']['name'])){

                    $file = $_FILES['panel_setting']['tmp_name'];
                    $settings = file_get_contents($file);
                    $slt_options = json_decode($settings,true);
                   // dd($slt_options);
                    update_option('slt_options', $slt_options);

                }


                break;
            case 'help':
                break;

        }

        update_option('slt_options', $slt_options);


    }

    include get_template_directory() . '/tpl/admin/panel.php';

}

add_action('admin_menu', 'sl_add_admin_menus');

add_action('admin_post_sl_theme_panel_settings_output','sl_theme_panel_settings_output');
function sl_theme_panel_settings_output(){

    $settings_data = get_option('slt_options');
    $settings_data = json_encode($settings_data);
    header('Content-Description: File Transfer');
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="sl-settings.json"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . mb_strlen($settings_data));

    echo $settings_data;

}

function sl_payments_page(){

    global $wpdb;
    if( isset($_GET['action']) && $_GET['action'] == 'delete'){

        $payment_id  = intval($_GET['pid']);

        if( $payment_id ){

            $wpdb->delete($wpdb->prefix.'payments',array('ID' => $payment_id),array('%d'));
        }

    }
    $payments = $wpdb->get_results("SELECT pay.*,user.display_name
                                    FROM {$wpdb->prefix}payments pay
                                    LEFT JOIN {$wpdb->users} user
                                    ON pay.user_id = user.ID");
    //dd($payments);
    include THEME_PATH.'/tpl/admin/payments.php';
}