<!--Start Main Content-->
<div id="main-content">
    <div class="container">
        <div class="nav-tab">
            <ul>
                <li><a class="active" href="#all-posts">همه مطالب</a></li>
                <li><a href="#latest-posts">آخرین مطالب</a></li>
                <li><a href="#latest-download">آخرین دانلود ها</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div id="all-posts" class="posts-container home-posts">
            <?php get_template_part('loops/loop','all'); ?>
            <div class="load-more-wrapper">
                <a data-page="2" href="#" class="load-more">مطالب بیشتر</a>
            </div>
        </div>
        <div id="latest-posts" class="posts-container home-posts">
            <?php get_template_part('loops/loop','post'); ?>
        </div>
        <div id="latest-download" class="posts-container home-posts">
            <?php get_template_part('loops/loop','download'); ?>
        </div>
    </div>
</div>
<!--End Main Content-->