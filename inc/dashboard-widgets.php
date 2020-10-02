<?php
function sl_dashboard_widget_function(){

    global $current_user;
    get_currentuserinfo();
    ?>
    <p><span>خوش آمدید : </span>
        <span><?php echo $current_user->display_name; ?></span></p>
    <?php

}
function sl_add_dashboard_widgets() {

    wp_add_dashboard_widget(
        'sl-users-info',         // Widget slug.
        'اطلاعات کاربران وب سایت',         // Title.
        'sl_dashboard_widget_function' // Display function.
    );
}
add_action( 'wp_dashboard_setup', 'sl_add_dashboard_widgets' );

