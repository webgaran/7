<?php
global $slt_options;
$all_posts_args = array(

    'post_type' => array('post','download'),
    'posts_per_page' => $slt_options['posts']['sl_posts_count']

);

$all_posts = new WP_Query($all_posts_args);

if($all_posts->have_posts()) :?>
    <?php while($all_posts->have_posts()):$all_posts->the_post(); ?>
        <!--start post wrapper-->
            <div class="post wow fadeInUp">
                <a class="post-link" href="<?php the_permalink(); ?>">
                <div class="post-inner">
                    <div class="post-thumb">
                        <?php echo  get_the_post_thumbnail($all_posts->post->ID,'main-thumbnail'); ?>
                    </div>
                    <span class="post-title"><?php echo get_the_title($all_posts->post->ID); ?></span>
                </div>
                    </a>
                <div class="post-meta">
                    <span><i class="fa fa-clock-o"></i><?php echo get_the_date('Y-m-d',$all_posts->post->ID); ?></span>
                    <span><i class="fa fa-user"></i><?php echo get_the_author(); ?></span>
                    <span><i class="fa fa-eye"></i><?php echo get_post_view(get_the_ID());  ?></span>
                    <span><a <?php echo isset($_COOKIE['post-'.get_the_ID()]) && intval($_COOKIE['post-'.get_the_ID()]) ? 'data-liked="1"' : 'data-liked="0"'; ?> data-pid="<?php echo get_the_ID(); ?>" class="like-post" href="#"><i class="fa fa-thumbs-o-up"><?php echo get_post_likes(get_the_ID()); ?></i></a></span>
                </div>
            </div>
        <!--end post wrapper-->
    <?php endwhile; ?>
<?php endif; ?>
