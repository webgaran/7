<?php
$most_view_posts_args = array(

    'post_type' => array('post'),
    'meta_key'   => 'views',
    'orderby' => 'meta_value_num',
    'order'        => 'DESC',
    'posts_per_page' => 9

);

$most_view_posts = new WP_Query($most_view_posts_args);

if($most_view_posts->have_posts()) :?>

    <?php while($most_view_posts->have_posts()):$most_view_posts->the_post(); ?>
        <!--start post wrapper-->
        <a href="<?php get_permalink(); ?>" class="post-link">
            <div class="post-wrapper">
                <div class="post">
                    <div class="thumbnail">
                        <?php echo  get_the_post_thumbnail($most_view_posts->post->ID,'main-thumbnail'); ?>
                    </div>
                    <div class="title"><?php the_title(); ?></div>
                </div>
                <div class="post-meta">
                    <span><i class="fa fa-clock-o"></i><?php echo get_the_date('Y-m-d',$most_view_posts->post->ID); ?></span>
                    <span><i class="fa fa-eye"></i><?php echo get_post_view(get_the_ID()); ?></span>
                </div>
            </div>
        </a>
        <!--end post wrapper-->
    <?php endwhile; ?>
<?php endif;
wp_reset_postdata();
?>
