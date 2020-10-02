<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <!--start post wrapper-->
        <a class="post-link" href="<?php the_permalink(); ?>">
            <div class="post wow fadeInUp">
                <div class="post-inner">
                    <div class="post-thumb">
                        <?php the_post_thumbnail('main-thumbnail'); ?>
                    </div>
                    <span class="post-title"><?php the_title(); ?></span>
                </div>
                <div class="post-meta">
                    <span><i class="fa fa-clock-o"></i>94/06/25</span>
                    <span><i class="fa fa-user"></i>کیوان علی محمدی</span>
                    <span><i class="fa fa-thumbs-o-up"></i>506</span>
                </div>
            </div>
        </a>
        <!--end post wrapper-->
    <?php endwhile; ?>
<?php endif; ?>