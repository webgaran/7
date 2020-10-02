<?php global $post;
set_post_view($post->ID); ?>
<?php get_header(); ?>
<?php
get_template_part('partials/top-menu');
get_template_part('partials/top-header');
get_template_part('partials/header-menu');
get_template_part('partials/main-slider');
?>
<div id="main-content" class="single">
    <div class="container">
        <?php if (have_posts()): ?>
            <?php while (have_posts()):the_post(); ?>
                <div class="post-entry">
                    <h2 class="post-title"><i class="fa fa-list-alt"></i><?php the_title(); ?></h2>

                    <div class="post-meta">
                        <span class="meta date"><i class="fa fa-clock-o"></i><?php echo get_the_date('Y-m-d'); ?></span>
                        <span class="meta author"><i class="fa fa-user"></i><?php echo get_the_author(); ?></span>
                        <span class="meta comment"><i class="fa fa-comment"></i>
                            <?php
                            comments_popup_link('بدون دیدگاه', '1 دیدگاه', '% دیدگاه', 'comments-link', 'دیدگاه ها غیر فعال');
                            ?>
                        </span>
                        <span class="meta like"><i
                                class="fa fa-heart"></i><?php echo get_post_likes(get_the_ID()); ?></span>

                    </div>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="post-author">
                        <div class="avatar">
                            <?php echo get_avatar(get_the_author_meta('ID')); ?>
                        </div>
                        <div class="author-profile">
                            <?php echo get_the_author_posts_link(); ?>
                        </div>
                        <div class="author-description">
                            <?php echo get_the_author_meta('description'); ?>
                        </div>
                        <span>تکمیل استایل این قسمت برای تمرین دانشجویان</span>
                    </div>
                    <div class="post-categories">
                        <span>دسته بندی ها: </span>
                        <?php the_category(','); ?>
                    </div>
                    <div class="post-tags">
                        <span>برچسب ها : </span>
                        <?php the_tags('', ','); ?>
                    </div>
                    <div class="social-links">
                        <a class="facebook"
                           href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>"><i
                                class="fa fa-facebook"></i></a>
                        <a class="twitter"
                           href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_the_permalink()) ?>"><i
                                class="fa fa-twitter"></i></a>
                        <a class="gplus" href="https://plus.google.com/share?url=<?php echo get_the_permalink(); ?>"><i
                                class="fa fa-google-plus"></i></a>
                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a>
                        <a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php get_sidebar(); ?>
    </div>
</div>
<div class="container">
    <?php comments_template(null,true ); ?>
</div>
<?php get_footer(); ?>

