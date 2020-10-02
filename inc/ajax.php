<?php

add_action('wp_ajax_sample_ajax_call','wp_ajax_sample_ajax_call');
add_action('wp_ajax_load_more_content','sl_load_more_content');
add_action('wp_ajax_nopriv_load_more_content','sl_load_more_content');
add_action('wp_ajax_nopriv_like_post','sl_like_post');
add_action('wp_ajax_like_post','sl_like_post');
add_action('wp_ajax_sl_download_file_counter','sl_download_file_counter');
add_action('wp_ajax_nopriv_sl_download_file_counter','sl_download_file_counter');

//sl users login
add_action('wp_ajax_nopriv_sl_user_login','sl_user_login');

function wp_ajax_sample_ajax_call(){

    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    echo $name;

    wp_die();

}
function sl_load_more_content(){

    $page  = intval($_POST['page']);

    if($page){

        $posts_per_page  = 1;
        $offset = ($page - 1) * $posts_per_page;
        $load_more_args = array(

            'post_type' => array('post','download'),
            'offset'  => $offset,
            'posts_per_page' => $posts_per_page

        );
        $load_more_query = new WP_Query($load_more_args);
        $output_html = '';
        if($load_more_query->have_posts()):
            while($load_more_query->have_posts()):$load_more_query->the_post();

                $output_html .= '<a class="post-link" href="' .get_the_permalink().'">';
                $output_html .='<div class="post">';
                $output_html.='<div class="post-inner">';
                $output_html.='<div class="post-thumb">';
                $output_html .= get_the_post_thumbnail($load_more_query->post->ID,'main-thumbnail');
                $output_html.=' </div>';
                $output_html.=' <span class="post-title">'. get_the_title($load_more_query->post->ID).'</span>';
                $output_html.=' </div>';
                $output_html.=' <div class="post-meta">';
                $output_html.='<span><i class="fa fa-clock-o"></i>'.get_the_date('Y-m-d',$load_more_query->post->ID).'</span>';
                $output_html.=' <span><i class="fa fa-user"></i>'. get_the_author().'</span>';
                $output_html.=' <span><i class="fa fa-eye"></i>'.get_post_view(get_the_ID()).'</span>';
                $output_html.='<span><i class="fa fa-thumbs-o-up"></i>506</span>';
                $output_html.='</div></div></a>';

            endwhile;

        endif;
        $count = count($load_more_query);
        wp_reset_postdata();
        $result = array();
        $result['count'] = $count;
        $result['content'] = $output_html;
        wp_die(json_encode($result));
    }

    wp_die(json_encode(array('count'=>0,'error'=>1)));


}
function sl_like_post(){

    $post_id = intval($_POST['post_id']);

    $currentUser  = wp_get_current_user();

    if( $post_id ){

        $is_cookie_set  = isset($_COOKIE['post-'.$post_id]) && intval($_COOKIE['post-'.$post_id]) ? true : false;

        if( $is_cookie_set ){

            $result =array('success' => false,'count' => 0);
            wp_die(json_encode($result));

        }

        $likes  = set_post_likes($post_id);

        if( $likes ){

            $result =array('success' => true,'count' => $likes);
            setcookie('post-'.$post_id,1,time()+(30 * 86400),'/');
            global $wpdb,$table_prefix;

            $wpdb->insert($table_prefix.'post_likes',array('post_ID' => $post_id,'user_ID' => $currentUser->ID),array('%d','%d'));

        }else{

            $result =array('success' => false,'count' => 0);
        }

        wp_die(json_encode($result));

    }
}
function sl_download_file_counter(){
    intval($_POST['pid']) || wp_die('no access');
    $post_id  = $_POST['pid'];
    $count =set_post_download_count($post_id);
    wp_die("$count");

}
function sl_user_login(){
    check_ajax_referer('ajax-calls','_nonce',true);

    $user_name = sanitize_text_field($_POST['username']);
    $password = sanitize_text_field($_POST['password']);
    $rememberme = isset($_POST['rememberme']);
    if( empty($user_name)  || empty($password) ){

        $result = array(
            'error' => true,
            'message' => 'لطفا فرم را به صورت صحیح تکمیل کنید'
        );
        wp_send_json($result);
    }
    $user = wp_authenticate_username_password(null,$user_name,$password);
    if( is_wp_error($user) ){
        $result = array(
            'error' => true,
            'message' => 'نام کاربری یا کلمه عبور اشتباه است'
        );
        wp_send_json($result);
    }
    $creds = array(
        'user_login'    => $user_name,
        'user_password' => $password,
        'rememember'    => $rememberme
    );
    $login_user  = wp_signon($creds,false);

    if( is_wp_error($login_user)){

        $result = array(
            'error' => true,
            'message' => 'نام کاربری یا کلمه عبور اشتباه است'
        );
        wp_send_json($result);

    }

    $result = array(
        'success' => true,
        'message' => 'شما با موفقیت در سایت لاگین کردید'
    );
    wp_send_json($result);

}