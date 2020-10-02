<?php
function sl_slider_meta_box()
{

    $screens = array('post', 'download');

    foreach ($screens as $screen) {

        add_meta_box('sl_slider_box', 'تصویر اسلایدر مطلب', 'sl_slider_box_content', $screen);

    }

}
function sl_slider_box_content($post)
{
    $slider_image_url = get_post_meta($post->ID, 'slider_image_url', true);
    ?>
    <div class="meta-box-row">
        <input type="text" id="sl_image_slider_url" name="sl_image_slider_url" style="width: 100%;height: 30px;text-align: left;direction: ltr;" class="input"
               value="<?php echo $slider_image_url; ?>">
        <button   data-target-type="textbox"  data-target="sl_image_slider_url" class="select-uploader button" >انتخاب تصویر</button>
    </div>
    <?php
}

function sl_slider_image_save($post_id)
{

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['sl_image_slider_url']) || empty($_POST['sl_image_slider_url'])) {
        delete_post_meta($post_id, 'slider_image_url');
        return;
    }

    $image_url = sanitize_text_field($_POST['sl_image_slider_url']);

    update_post_meta($post_id, 'slider_image_url', $image_url);


}

add_action('add_meta_boxes', 'sl_slider_meta_box');
add_action('save_post', 'sl_slider_image_save');

// metabox for show sidebar on pages
function sl_sidebar_page_mtb()
{

    $screens = array('page');

    foreach ($screens as $screen) {

        add_meta_box('sl_sidebar_box', 'تنظیم نمایش ساید بار', 'sl_slidebar_show_content', $screen, 'side', 'high');

    }
}
function sl_slidebar_show_content($post)
{

    global $post;
    $sidebar_checked = get_post_meta($post->ID,'sl_show_sidebar',true);
    ?>
    <input type="checkbox" name="sl_show_sidebar" id="sl_show_sidebar" <?php checked(1,intval($sidebar_checked)); ?>>
    <label for="sl_show_sidebar">نمایش ساید بار در این برگه</label>

    <?php

}
function sl_sidebar_page_save($post_id){

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (isset($_POST['sl_show_sidebar'])) {

        update_post_meta($post_id,'sl_show_sidebar',1);

    }else{

        //update_post_meta($post_id,'sl_show_sidebar',0);
        delete_post_meta($post_id,'sl_show_sidebar');
    }

}
add_action('add_meta_boxes', 'sl_sidebar_page_mtb');
add_action('save_post', 'sl_sidebar_page_save');

