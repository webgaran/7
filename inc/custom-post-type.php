<?php
//custom post types
add_action( 'init', 'sltheme_add_download_custom_post_type' );
function sltheme_add_download_custom_post_type(){

    $labels = array(
        'name'               => 'دانلود',
        'singular_name'      =>  'دانلود',
        'menu_name'          =>  'دانلود ها',
        'name_admin_bar'     => 'دانلود',
        'add_new'            => 'دانلود جدید',
        'add_new_item'       => 'آیتم دانلود جدید',
        'new_item'           => 'دانلود جدید',
        'edit_item'          => 'ویرایش دانلود',
        'view_item'          => 'نمایش دانلود',
        'all_items'          => 'تمام دانلود ها',
        'search_items'       => 'جستجوی دانلود ها',
        'parent_item_colon'  => 'دانلود ها مادر :',
        'not_found'          => 'دانلودی یافت نشد',
        'not_found_in_trash' =>'دانلود در زباله دان یافت نشد'
    );

    $args = array(
        'labels'             => $labels,
        'description'        => 'مطالب دانلودی قالب',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'download','with_fornt'=>true),
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-download',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'taxonomies'         =>array('post_tag','category'),
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    //exclude_from_search

    register_post_type( 'download', $args );


}

// custom taxonomies

add_action( 'init', 'sl_create_courses' );
add_action( 'init', 'sl_create_download_size');

function sl_create_courses() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'دوره ها', 'taxonomy general name' ),
        'singular_name'     => _x( 'دوره', 'taxonomy singular name' ),
        'search_items'      => __( 'جستجوی دوره ها' ),
        'all_items'         => __( 'همه دوره ها' ),
        'parent_item'       => __( 'دوره مادر' ),
        'parent_item_colon' => __( 'دوره مادر : ' ),
        'edit_item'         => __( 'ویرایش دوره' ),
        'update_item'       => __( 'به روز رسانی دوره' ),
        'add_new_item'      => __( 'اضافه کردن دوره جدید' ),
        'new_item_name'     => __( 'نام دوره جدید' ),
        'menu_name'         => __( 'دوره ها' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'course' ),
    );
    register_taxonomy( 'course', array( 'post' ), $args );



}

function sl_create_download_size(){

    $labels = array(
        'name'              => _x( 'اندازه ها', 'taxonomy general name' ),
        'singular_name'     => _x( 'اندازه', 'taxonomy singular name' ),
        'search_items'      => __( 'جستجوی اندازه' ),
        'all_items'         => __( 'همه اندازه ها' ),
        'parent_item'       => __( 'اندازه مادر' ),
        'parent_item_colon' => __( 'اندازه مادر :' ),
        'edit_item'         => __( 'ویرایش اندازه' ),
        'update_item'       => __( 'به روز رسانی اندازه' ),
        'add_new_item'      => __( 'اضافه کردن اندازه جدید' ),
        'new_item_name'     => __( 'نام اندازه جدید' ),
        'menu_name'         => __( 'اندازه ها' ),
    );
    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'size'),
    );
    register_taxonomy( 'size', array( 'download' ), $args );

}