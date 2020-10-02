<?php
$most_view_download_args = array(

    'post_type' => array('download'),
    'meta_key'   => 'views',
    'orderby' => 'meta_value_num',
    'order'        => 'DESC',
    'posts_per_page' => 9

);

$most_view_download = new WP_Query($most_view_download_args);

if($most_view_download->have_posts()) :?>

    <?php while($most_view_download->have_posts()):$most_view_download->the_post(); ?>
        <!--start post wrapper-->
        <a href="<?php echo get_the_permalink(); ?>" class="post-link">
            <div class="post-wrapper wow fadeInUp">
                <div class="post">
                    <div class="thumbnail">
                        <?php echo  get_the_post_thumbnail($most_view_download->post->ID,'main-thumbnail'); ?>
                    </div>
                    <div class="title"><?php the_title(); ?></div>
                </div>
                <div class="post-meta">
                    <span><i class="fa fa-clock-o"></i><?php echo get_the_date('Y-m-d',$most_view_download->post->ID); ?></span>
                    <span><i class="fa fa-eye"></i><?php echo get_post_view(get_the_ID());  ?></span>
                </div>
            </div>
        </a>
        <!--end post wrapper-->
    <?php endwhile; ?>
<?php endif;
wp_reset_postdata();
?>
