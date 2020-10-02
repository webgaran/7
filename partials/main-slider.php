<?php
$main_slider_query_args = array(

    'meta_key' => 'slider_image_url',
    'meta_value' => "",
    'meta_compare' => '!=',
    'post_type' => array('post', 'download'),
    'posts_per_page' => 4

);


$main_slider_query = new WP_Query($main_slider_query_args);

if ($main_slider_query->have_posts()):
    ?>
    <!--Start Slider-->
    <div id="slider-wrapper">
        <ul class="rslides">
            <?php
            while ($main_slider_query->have_posts()):$main_slider_query->the_post();
                ?>
                <a href="<?php echo get_the_permalink(); ?>">
                    <li>
                        <img src="<?php echo get_post_meta(get_the_ID(), 'slider_image_url', true); ?>" alt="">
                        <p class="caption"><?php echo get_the_title(get_the_ID()); ?></p>
                    </li>
                </a>

                <?php
            endwhile;
            ?>
        </ul>
    </div>
    <!--End Slider-->
    <?php
endif;
