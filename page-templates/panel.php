<?php
/* Template Name: User Panel */
get_header();
get_template_part('partials/top-menu');
get_template_part('partials/top-header');
get_template_part('partials/header-menu');
//get_template_part('partials/main-slider');

$active_tab = 'profile';
$whilelist = array('profile','new-post','my-posts','logout');
if(isset($_POST['save_profile'])){

    $first_name = sanitize_text_field($_POST['first_name']);
    $last_name = sanitize_text_field($_POST['last_name']);
    $mobile = sanitize_text_field($_POST['mobile_number']);
    $user_id = get_current_user_id();

    $update_user = wp_update_user(array(
        'ID' => $user_id,
        'first_name' => $first_name,
        'last_name' => $last_name,
    ));



    if( !is_wp_error($update_user)){

        update_user_meta($user_id,'mobile',$mobile);
        $is_success = true;
        $message = 'پروفایل با موفقیت به روز رسانی گردید';

    }

}
if(isset($_GET['tab']) && !empty($_GET['tab']) && in_array($_GET['tab'],$whilelist)){

    $active_tab = esc_sql(strip_tags($_GET['tab']));

}
$tpl_path = get_template_directory().'/tpl/'.$active_tab.'.php';
?>
<div id="user-panel">

    <div class="container">
        <div id="user-panel-inner">
            <nav class="user-panel-nav">
                <ul>
                    <li><a class="<?php echo ($active_tab == 'profile') ? 'active' : '' ?>" href="?tab=profile">پروفایل</a></li>
                    <li><a class="<?php echo ($active_tab == 'new-post') ? 'active' : '' ?>" href="?tab=new-post">مطلب جدید</a></li>
                    <li><a class="<?php echo ($active_tab == 'my-posts') ? 'active' : '' ?>" href="?tab=my-posts">مطالب من</a></li>
                    <li><a class="<?php echo ($active_tab == 'logout') ? 'active' : '' ?>" href="?tab=logout">خروج</a></li>
                </ul>
            </nav>
            <div id="user-panel-content">
                <?php
                if( is_file($tpl_path) && file_exists($tpl_path)){
                    include $tpl_path;
                }
                ?>
            </div>
        </div>
    </div>

</div>
<?php
get_footer();