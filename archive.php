<?php
get_header();
get_template_part('partials/top-menu');
get_template_part('partials/top-header');
get_template_part('partials/header-menu');
get_template_part('partials/main-slider');
?>
    <!--Start Main Content-->
    <div id="main-content">
        <div class="container">
            <div class="archive">
                <?php get_the_archive_title(); ?>
            </div>
            <div class="posts-container">
                <?php get_template_part('loops/loop'); ?>
            </div>
            <div class="pagination">
                <?php get_template_part('partials/pagination'); ?>
            </div>
        </div>
    </div>
<?php
get_footer();