<?php
// contants define
define('THEME_PATH',get_template_directory());
define('THEME_URI', get_template_directory_uri());

$slt_options = get_option('slt_options');

function sl_start_session(){

    if( ! session_id() ){

        session_start();

    }

}
if(!function_exists('dd')){

    function dd($data){

        echo '<pre>';
        var_dump($data);
        die();
        echo '</pre>';

    }

}

add_theme_support('title-tag');

//Theme Filters
add_filter('show_admin_bar', '__return_false');
add_filter('the_content','sl_loggedin_user_content');
//theme actions
function sltheme_setup()
{
    load_theme_textdomain('sltheme', get_template_directory() . '/langs');
    // Reguster Main Menus
    //register_nav_menu('top-bar-menu','a menu for top bar ');
    $menus = array(
        'top-bar-menu' => 'a menu for top bar ',
        'header-menu' => 'A Menu For Header',
        'footer-menu' => 'A Menu For Footer'
    );
    register_nav_menus($menus);

    //add theme support
    add_theme_support('post-thumbnails');

    //add image sizes
    add_image_size('main-thumbnail', 260, 150);

}
function sl_add_admin_assets(){

    wp_enqueue_style('sl-admin-css',get_template_directory_uri().'/css/admin.css');
    wp_enqueue_script('sl-admin-js',get_template_directory_uri().'/js/admin.js',array('jquery'));


}
add_action('admin_enqueue_scripts','sl_add_admin_assets');
function add_responsive_slider_assets()
{

    if( !is_admin() ){
        wp_deregister_script('jquery');
        wp_register_script('jquery','http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js',false);
        wp_enqueue_script('jquery');
    }
    //wp_register_style('responsiveslider.style',get_template_directory_uri().'/css/responsive.css');
    // wp_enqueue_style('responsiveslider.style');

    wp_register_script('responsiveSlider.script', get_template_directory_uri() . '/js/responsiveslides.min.js', array('jquery'), null, true);
    wp_enqueue_script('responsiveSlider.script');

    wp_register_script('main-js',get_template_directory_uri().'/js/main.js',array('jquery'),false,true);
    wp_enqueue_script('main-js');

    $current_user =  wp_get_current_user();
    wp_localize_script('main-js','data',array(

        'ajax_url' =>  admin_url('admin-ajax.php'),

        'current_user_id' => $current_user->ID,

        'total_post_count'  => 10
    ));

}
function sl_loggedin_user_content($content){
    global $slt_options;
    if( isset($slt_options['users']['sl_theme_only_register_users']) && intval($slt_options['users']['sl_theme_only_register_users'])){

        if( is_user_logged_in() ){

            return $content;

        }

        return '<p>این محتوا مخصوص کاربران عضو سایت می باشد</p>';

    }

    return $content;


}
add_action('after_setup_theme', 'sltheme_setup');
add_action('wp_enqueue_scripts', 'add_responsive_slider_assets');
add_action('after_switch_theme','sl_switch_theme');
add_action('init','sl_start_session');
function sl_switch_theme(){

    flush_rewrite_rules();

}

// user functions
function is_show_sidebar($post_id){
    return intval(get_post_meta($post_id,'sl_show_sidebar',true)) == 1 ? true : false;
}
//$current_user = wp_get_current_user();
//    update_user_meta($current_user->ID,'mobile_number','09123456789');
//    $mobile_number = get_user_meta($current_user->ID,'mobile_number',true);
//    echo $mobile_number;


function get_post_view($post_id){

    if(intval($post_id)){

        $post_view = get_post_meta($post_id,'views',true);
        return intval($post_view);

    }

    return 0;

}
function set_post_view($post_id){

    if( intval( $post_id ) ){

        $views = get_post_view($post_id);
        $views++;
        update_post_meta($post_id,'views',$views);
    }

}

function get_post_likes($post_id){

    if(intval($post_id)){

        $post_likes = get_post_meta($post_id,'likes',true);
        return intval($post_likes);

    }

    return 0;

}
function set_post_likes($post_id){

    if( intval( $post_id ) ){

        $likes = get_post_likes($post_id);
        $likes++;
        update_post_meta($post_id,'likes',$likes);

        return $likes;
    }
    return 0;

}

function get_post_download_count($post_id){

    if(intval($post_id)){

        $post_download_count = get_post_meta($post_id,'download_count',true);
        return intval($post_download_count);

    }

    return 0;

}
function set_post_download_count($post_id){

    if( intval( $post_id ) ){

        $downloads = get_post_download_count($post_id);
        $downloads++;
        update_post_meta($post_id,'download_count',$downloads);

        return $downloads;
    }
    return 0;

}

function comments_callback( $comment, $args, $depth ) {

    $GLOBALS['comment'] = $comment;

    switch ( $comment->comment_type ) :

        case 'pingback' :

        case 'trackback' :

            // Display trackbacks differently than normal comments.

            ?>

            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

            <p>pingback <?php comment_author_link(); ?> <?php edit_comment_link( 'Edit', '<span class="edit-link">', '</span>' ); ?></p>

            <?php

            break;

        default :

            // Proceed with normal comments.

            global $post;

            ?>

            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <div class="comment">
                    <div class="comment-avatar">
                        <?php echo  get_avatar($comment,65); ?>
                    </div>
                    <div class="comment-content" id="comment-<?php comment_ID(); ?>">
                        <?php edit_comment_link('<span></span>', '<p class="edit-link">', '</p>' ); ?>
                        <?php if ( '0' == $comment->comment_approved ) : ?>

                            <p class="bg-danger comment-awaiting-moderation">Text For awaiting moderation comments</p>
                        <?php endif; ?>
                        <div class="comment-author">
                            <?php printf( '<cite class="fn %2$s">%1$s</cite>',get_comment_author_link(),( $comment->user_id === $post->post_author ) ? 'author' : ''); ?>
                            <div class="commentmeta"><?php echo get_comment_date(); ?></div>
                        </div>
                        <?php comment_text(); ?>
                    </div><!-- #comment-## -->
                    <div class="reply">
                        <?php comment_reply_link( array_merge( $args, array( 'reply_text' =>'<span class="reply">پاسخ دادن</span>','depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </div>
                </div>
            <?php

            break;

    endswitch; // end comment_type check

}

// include filess
function some_function(){

    if( !is_admin() ){

    }

}
add_action('init','some_function');

function sl_theme_add_editor_styles() {
    add_editor_style();
}
add_action( 'admin_init', 'sl_theme_add_editor_styles' );

include get_template_directory() . '/inc/custom-post-type.php';
include get_template_directory() . '/inc/meta-boxes.php';
include get_template_directory() . '/inc/ajax.php';
include get_template_directory() . '/inc/shortcodes.php';
include get_template_directory() . '/inc/team.php';
include get_template_directory() . '/inc/sidebars.php';
include get_template_directory() . '/widgets/foo.php';
include get_template_directory() . '/widgets/custom_form.php';
include get_template_directory() . '/inc/dashboard-widgets.php';
include get_template_directory() . '/admin/admin.php';
include get_template_directory() . '/inc/gateway.php';
include get_template_directory() . '/editor_plugins/plugins.php';