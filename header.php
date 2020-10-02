<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_nonce" content="<?php echo wp_create_nonce('ajax-calls'); ?>">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/css/normalize.css"'; ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/css/font-awesome.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/css/animate.min.css'; ?>">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/responsive.css'; ?>">
    <script src="<?php echo get_template_directory_uri().'/js/vendor/modernizr-2.8.3.min.js'; ?>"></script>
    <script src="<?php echo get_template_directory_uri().'/js/vendor/wow.min.js'; ?>"></script>
    <script>
        new WOW().init();
    </script>
    <?php wp_head(); ?>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->