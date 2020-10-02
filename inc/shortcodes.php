<?php

const MSG_STATUS_APPROVE = 1;
const MSG_STATUS_PENDING = 0;

function hello_callback($atts, $content = null)
{

    if (is_user_logged_in()) {

        return $content;

    }

    return '<div class="logged_in_users">این محتوا مخصوص کاربران عضو شده در وب سایت می باشد</div>';


//    $atts = shortcode_atts(array('user_id'=>21,'website'=>'site.com'),$atts);
//
//    var_dump($atts);

}

add_shortcode('hello', 'hello_callback');
// theme shortcodes
function sl_msg_success_callback($atts, $content = null)
{

    if (!is_null($content)) {

        return '<div class="box box-success">' . do_shortcode($content) . '</div>';
    }

}

add_shortcode('msg_success', 'sl_msg_success_callback');
function sl_sub_title_callback($atts, $content = null)
{

    if (!is_null($content)) {

        return '<h3 class="post-sub-title">' . do_shortcode($content) . '</h3>';
    }
}

add_shortcode('sub_title', 'sl_sub_title_callback');
// download box shortcode
function sl_dl_box_callback($atts, $content = null)
{

    global $post;
    $atts = shortcode_atts(array('title' => 'دانلود فایل مطلب : ' . get_the_title($post->ID), 'link' => home_url(), 'user_logged' => 0), $atts);
    $html = '';
    if (intval($atts['user_logged']) == 1) {

        if (is_user_logged_in()) {

            $html .= '<div class="dl_box">';
            $html .= '<span class="download_count">دانلود شده : ' . get_post_download_count($post->ID) . '</span>';
            $html .= '<a class="download_file" data-id="' . $post->ID . '" href="' . $atts['link'] . '">' . $atts['title'] . '</a>';
            $html .= '<i class="fa fa-cloud-download"></i>';;
            $html .= '</div>';


        } else {

            $html .= '<div class="dl_box">';
            $html .= '<a href="' . wp_login_url(get_permalink(get_the_ID())) . '">برای دانلود این فایل باید در سایت لاگین کنید</a>';
            $html .= '</div>';

        }

    } else {

        $html .= '<div class="dl_box">';
        $html .= '<span class="download_count">دانلود شده : ' . get_post_download_count($post->ID) . '</span>';
        $html .= '<a class="download_file" data-id="' . $post->ID . '" href="' . $atts['link'] . '">' . $atts['title'] . '</a>';
        $html .= '<i class="fa fa-cloud-download"></i>';
        $html .= '</div>';

    }

    return $html;

}

add_shortcode('dl_box', 'sl_dl_box_callback');

// login form shortcode
function sl_login_form_callback($atts, $content = null)
{

    ob_start();
    include get_template_directory() . '/tpl/login.php';
    $login_form_html = ob_get_clean();
    return $login_form_html;

}

add_shortcode('sl_login_form', 'sl_login_form_callback');

function sl_register_form_callback($atts, $content = null)
{

    $has_error = false;
    $has_success = false;
    $message = array();

    if (isset($_POST['register_submit'])) {

        $userName = sanitize_text_field($_POST['username']);
        $email = sanitize_text_field($_POST['email']);
        $password = sanitize_text_field($_POST['password']);
        $password_confirmation = sanitize_text_field($_POST['password_confirmation']);
        $mobile = sanitize_text_field($_POST['mobile']);

        if (empty($userName) || empty($email) || empty($password) || empty($password_confirmation) || empty($mobile)) {

            $has_error = true;
            $message[] = "لطفا تمامی فیلد ها رو تکمیل نمایید";

        }

        if (username_exists($userName)) {

            $has_error = true;
            $message[] = "نام کاربری انتخاب شده در دسترس نمی باشد";

        }

        if (email_exists($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $has_error = true;
            $message[] = "ایمیل وارد شده در دسترس نمی باشد";

        }

        if ($password != $password_confirmation) {

            $has_error = true;
            $message[] = "کلمات عبور با هم دیگر تطبیق ندارند";

        }

        if (!$has_error) {


            $newUserData = array(

                'user_login' => $userName,
                'user_email' => $email,
                'user_pass' => $password

            );

            $newUserID = wp_insert_user($newUserData);

            if (is_wp_error($newUserID)) {

                $has_error = true;
                $message[] = "در ثبت نام شما خطایی رخ داده است لطفا بعدا امتحان کنید";

            } else {

                update_user_meta($newUserID, 'mobile', $mobile);
                $has_success = true;
                $message[] = "ثبت نام شما با موفقیت انجام شد.";

            }


        }


    }
    ob_start();
    include get_template_directory() . '/tpl/register.php';
    $register_form_html = ob_get_clean();
    return $register_form_html;

}

add_shortcode('sl_register_form', 'sl_register_form_callback');

//conatct-us from

function sl_contact_form_callback($atts, $content = null)
{
    $has_error = false;
    $has_success = false;
    $message = array();
    include(get_template_directory() . '/inc/captcha/simple-php-captcha.php');
    if (isset($_POST['contact_submit'])) {

        $full_name = sanitize_text_field($_POST['full_name']);
        $email = sanitize_text_field($_POST['email']);
        $subject = sanitize_text_field($_POST['subject']);
        $content = sanitize_text_field($_POST['content']);
        $security = sanitize_text_field($_POST['security']);
        if (empty($full_name) || empty($email) || empty($subject) || empty($content)) {

            $has_error = true;
            $message[] = "لطفا تمامی فیلد ها را پر نمایید";

        } elseif (strtolower($_SESSION['captcha']['code']) <> strtolower($security)) {

            $has_error = true;
            $message[] = "کد امنیتی را به صورت صحیح وارد کنید";


        } else {

            global $wpdb, $table_prefix;
            $wpdb->insert(
                $table_prefix . 'contacts',
                array(

                    'name' => $full_name,
                    'email' => $email,
                    'subject' => $subject,
                    'content' => $content,
                    'date' => date('Y-m-d H:i:s'),
                    'status' => MSG_STATUS_PENDING
                ),
                array(
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%d'
                )
            );
            $new_record_id = $wpdb->insert_id;
            ob_start();
            include get_template_directory() . '/tpl/contact-email.php';
            $email_template = ob_get_clean();
            $email_template = str_replace(array('#name#', '#subject#', '#email#', '#content#'), array($full_name, $subject, $email, $content), $email_template);
            send_html_email('admin@sitename.com', 'دریاقت درخواست جدید در وب سایت', $email_template);

        }
    }
    ob_start();
    $_SESSION['captcha'] = simple_php_captcha();
    include get_template_directory() . '/tpl/contact.php';
    $register_form_html = ob_get_clean();
    return $register_form_html;

}

add_shortcode('contact_us', 'sl_contact_form_callback');

function send_html_email($to, $subject, $content)
{

    $headers = "From: " . strip_tags('info@sitename.com') . "\r\n";
    $headers .= "Reply-To: " . strip_tags('info@sitename.com') . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    return wp_mail($to, $subject, $content, $headers);
}

//easy payment

function sl_payment_callback(){
    $has_error = false;
    $message = "";
    if( isset($_POST['sl_payment_submit']) ){

        $full_name = sanitize_text_field($_POST['full_name']);
        $email = sanitize_text_field($_POST['email']);
        $description = sanitize_text_field($_POST['description']);
        $price = intval($_POST['amount']);

        if( empty($full_name) || empty($email) || intval($price) == 0 ){

            $has_error = true;
            $message = "لطفا اطلاعات فرم را به صورت صحیح تکمیل نمایید";

        }else{

            parspal_request_payment($price,$full_name,$email,$description);

        }

    }
    if( isset($_GET['gateway']) && $_GET['gateway'] == 'parspal' ){

        parspal_verify_payment();

    }
    include THEME_PATH.'/tpl/payment.php';
}
add_shortcode('sl_payment','sl_payment_callback');
