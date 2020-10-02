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
                <h2> تمام مطالب برچسب : <?php single_tag_title(); ?></h2>
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