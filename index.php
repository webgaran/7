<?php
global $slt_options;
get_header();
get_template_part('partials/top-menu');
get_template_part('partials/top-header');
get_template_part('partials/header-menu');
get_template_part('partials/main-slider');
get_template_part('main-content');
get_template_part('featured-content');
if( isset($slt_options['posts']['sl_theme_show_team']) && intval($slt_options['posts']['sl_theme_show_team']) ):
get_template_part('team');
endif;
get_template_part('statistics');
get_footer();