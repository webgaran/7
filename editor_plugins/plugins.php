<?php
add_action( 'init', 'sl_theme_buttons' );
function sl_theme_buttons()
{
    add_filter( "mce_external_plugins", "sl_add_buttons" );
    add_filter( 'mce_buttons', 'sl_register_buttons' );

    //add shortcode selector to wordpress editor
    add_filter( 'mce_external_plugins', 'registerTmcePlugin' );
    add_filter( 'mce_buttons', 'registerButton' );
}

function sl_add_buttons( $plugin_array )
{
    $plugin_array[ 'sl_theme' ] = get_template_directory_uri() . '/editor_plugins/sl-plugin.js';

    return $plugin_array;
}

function sl_register_buttons( $buttons )
{
    array_push( $buttons, 'simple_btn', 'showrecent' );

    return $buttons;
}

//shortcode selector callback functions

function registerButton( $buttons )
{

    array_push( $buttons, "separator", 'shortcodeSelector' );

    return $buttons;

}

function registerTmcePlugin( $plugin_array )
{

    $plugin_array[ 'shortcodeSelector' ] = get_template_directory_uri()."/editor_plugins/shortcodeSelector.js";

    return $plugin_array;

}
