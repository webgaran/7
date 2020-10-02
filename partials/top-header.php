<!--Start Header-->
<?php global $slt_options;?>
<header id="top-header">
    <div class="container">
        <div id="logo">
            <a href="<?php echo home_url(); ?>">
                <img width="150" height="150" src="<?php echo isset($slt_options['general']['sl_theme_logo']) ?  $slt_options['general']['sl_theme_logo'] :'' ?>" alt="دوره مجازی آموزش طراحی قالب حرفه ای وردپرس">
                <h1><?php echo bloginfo('name'); ?></h1>

            </a>
        </div>
        <div id="contact-bar">
            <a title="<?php echo isset($slt_options['general']['sl_theme_phone'])&& !empty($slt_options['general']['sl_theme_phone']) ?
                $slt_options['general']['sl_theme_phone']: '';

            ?>" href=""><i class="fa fa-phone"></i></a> |
            <a title="ایران-تهران" href=""><i class="fa fa-map-marker"></i></a> |
            <a title="info@7learn.com" href=""><i class="fa fa-envelope-o"></i></a>
        </div>
    </div>
</header>
<!--End Header-->