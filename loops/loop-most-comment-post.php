<?php
$most_comment_posts_args = array(

    'post_type' => array('post'),
    'orderby' => 'comment_count',
    'order'        => 'DESC',
    'posts_per_page' => 9

);

$most_comment_posts = new WP_Query($most_comment_posts_args);

if($most_comment_posts->have_posts()) :?>

    <?php while($most_comment_posts->have_posts()):$most_comment_posts->the_post(); ?>
        <!--start post wrapper-->
        <a href="<?php get_permalink(); ?>" class="post-link">
            <div class="post-wrapper">
                <div class="post">
                    <div class="thumbnail">
                        <?php echo  get_the_post_thumbnail($most_comment_posts->post->ID,'main-thumbnail'); ?>
                    </div>
                    <div class="title"><?php the_title(); ?></div>
                </div>
                <div class="post-meta">
                    <span><i class="fa fa-clock-o"></i><?php echo get_the_date('Y-m-d',$most_comment_posts->post->ID); ?></span>
                    <span><i class="fa fa-eye"></i><?php echo get_post_view(get_the_ID()); ?></span>
                </div>
            </div>
        </a>
        <!--end post wrapper-->
    <?php endwhile; ?>
<?php endif;
wp_reset_postdata();
?>
