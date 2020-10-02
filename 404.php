<?php
get_header();
get_template_part('partials/top-menu');
get_template_part('partials/top-header');
get_template_part('partials/header-menu');
?>
    <!--Start Main Content-->
    <div id="main-content">
        <div class="container">
            <div class="posts-container">
               <div class="not-found">
                   <h2>متاسفانه صفحه درخواستی شما یافت نشد</h2>
               </div>
                <div class="tag-cloud">
                    <?php wp_tag_cloud(); ?>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();