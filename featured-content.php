<div id="featured-contnet">
    <div class="container">
        <div class="nav-tab">
            <ul>
                <li><a class="active" href="#most-download">بیشترین دانلود ها</a></li>
                <li><a href="#most-view-download">پربازدید ترین دانلود ها</a></li>
                <li><a href="#popular-posts">محبوب ترین مطالب</a></li>
                <li><a href="#most-view-posts">پر بازدیدترین مطالب</a></li>
                <li><a href="#most-comment-posts">داغ ترین مطالب</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div id="most-download" class="posts-container home-posts">
            <?php get_template_part('loops/loop','most-download'); ?>
        </div>
        <div id="most-view-download" class="posts-container home-posts">
            <?php get_template_part('loops/loop','most-view-download'); ?>
        </div>
        <div id="popular-posts" class="posts-container home-posts">
            <?php get_template_part('loops/loop','most-like-post'); ?>
        </div>
        <div id="most-view-posts" class="posts-container home-posts">
            <?php get_template_part('loops/loop','most-view-post'); ?>
        </div>
        <div id="most-comment-posts" class="posts-container home-posts">
            <?php get_template_part('loops/loop','most-comment-post'); ?>
        </div>
    </div>
</div>
<!--End Featured Content-->