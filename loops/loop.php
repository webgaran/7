<?php if (have_posts()): ?>
    <?php while (have_posts()):the_post(); ?>
        <!--start post wrapper-->
        <div class="post">
            <a class="post-link" href="<?php the_permalink(); ?>">
                <div class="post-inner">
                    <div class="post-thumb">
                        <?php the_post_thumbnail('main-thumbnail'); ?>
                    </div>
                    <span class="post-title"><?php the_title(); ?></span>
                </div>
            </a>

            <div class="post-meta">
                <span><i class="fa fa-clock-o"></i><?php echo get_the_date('Y-m-d', get_the_ID()); ?></span>
                <span><i class="fa fa-user"></i><?php echo get_the_author(); ?></span>
                <span><i class="fa fa-eye"></i><?php echo get_post_view(get_the_ID()); ?></span>
                <span><a <?php echo isset($_COOKIE['post-' . get_the_ID()]) && intval($_COOKIE['post-' . get_the_ID()]) ? 'data-liked="1"' : 'data-liked="0"'; ?>
                        data-pid="<?php echo get_the_ID(); ?>" class="like-post" href="#"><i
                            class="fa fa-thumbs-o-up"><?php echo get_post_likes(get_the_ID()); ?></i></a></span>
            </div>
        </div>
        <!--end post wrapper-->
    <?php endwhile; ?>
<?php else: ?>
    <div class="not-found">
        <h2>با عرض پوزش هیچ مطالبی یافت نشد</h2>
    </div>
<?php endif; ?>
