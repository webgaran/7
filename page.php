<?php global $post;set_post_view($post->ID);?>
<?php get_header(); ?>
<?php
get_template_part('partials/top-menu');
get_template_part('partials/top-header');
get_template_part('partials/header-menu');
get_template_part('partials/main-slider');
?>
<div id="main-content" class="page <?php echo !is_show_sidebar($wp_query->post->ID)? 'full-width' :''; ?>">
    <div class="container">
        <?php if(have_posts()): ?>
            <?php while(have_posts()):the_post(); ?>
                <div class="post-entry">
                    <h2 class="post-title"><i class="fa fa-list-alt"></i><?php the_title(); ?></h2>
                    <div class="post-meta">
                        <span class="meta date"><i class="fa fa-clock-o"></i><?php echo get_the_date('Y-m-d'); ?></span>
                        <span class="meta author"><i class="fa fa-user"></i><?php echo get_the_author(); ?></span>
                        <span class="meta comment"><i class="fa fa-comment"></i>
                            <?php
                            comments_popup_link( 'بدون دیدگاه', '1 دیدگاه', '% دیدگاه', 'comments-link', 'دیدگاه ها غیر فعال');
                            ?>
                        </span>
                        <span class="meta like"><i class="fa fa-heart"></i><?php echo get_post_likes(get_the_ID()); ?></span>
                    </div>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="social-links">
                        <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo  get_the_permalink(); ?>"><i class="fa fa-facebook"></i></a>
                        <a class="twitter" href="https://twitter.com/intent/tweet?url=<?php echo  urlencode(get_the_permalink())?>"><i class="fa fa-twitter"></i></a>
                        <a class="gplus" href="https://plus.google.com/share?url=<?php echo  get_the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a>
                        <a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
       <?php if( is_show_sidebar(get_the_ID()) ): ?>
           <div id="sidebar">
               <div class="widget">
                   <div class="wtitle">محبوب ترین مطالب</div>
                   <div class="wcontent">
                       <ul>
                           <li><a href="#">لینک مطلب برای نمایش</a></li>
                           <li><a href="#">لینک مطلب برای نمایش</a></li>
                           <li><a href="#">لینک مطلب برای نمایش</a></li>
                           <li><a href="#">لینک مطلب برای نمایش</a></li>
                           <li><a href="#">لینک مطلب برای نمایش</a></li>
                           <li><a href="#">لینک مطلب برای نمایش</a></li>
                       </ul>
                   </div>
               </div>
               <div class="widget">
                   <div class="wtitle">آخرین نوشته ها</div>
                   <div class="wcontent">
                       <ul>
                           <li><a href="#">لینک مطلب برای نمایش</a></li>
                           <li><a href="#">لینک مطلب برای نمایش</a></li>
                           <li><a href="#">لینک مطلب برای نمایش</a></li>
                           <li><a href="#">لینک مطلب برای نمایش</a></li>
                           <li><a href="#">لینک مطلب برای نمایش</a></li>
                           <li><a href="#">لینک مطلب برای نمایش</a></li>
                       </ul>
                   </div>
               </div>

               <div class="widget">
                   <div class="wtitle">آخرین دانلود ها</div>
                   <div class="wcontent">
                       <ul>
                           <li><a href="#">لینک مطلب برای نمایش</a></li>
                           <li><a href="#">لینک مطلب برای نمایش</a></li>
                           <li><a href="#">لینک مطلب برای نمایش</a></li>
                           <li><a href="#">لینک مطلب برای نمایش</a></li>
                           <li><a href="#">لینک مطلب برای نمایش</a></li>
                           <li><a href="#">لینک مطلب برای نمایش</a></li>
                       </ul>
                   </div>
               </div>
           </div>
        <?php endif; ?>
    </div>
</div>
<div class="container">
    <div id="post-comments">
        <div class="comment-title">3 دیدگاه برای این مطلب ثبت شده است</div>
        <div class="comment-list">
            <ol>
                <li>
                    <div class="comment">
                        <div class="comment-avatar">
                            <img src="img/default_avatar.jpg" width="65" height="65" alt="">
                        </div>
                        <div class="comment-content">
                            <div class="comment-author">
                                کاربر شماره 1
                                <div class="commentmeta">1394/04/18</div>
                            </div>
                            <p>سلام مطلب خوبی بود.</p>
                        </div>
                        <div class="reply">
                            <a href="#">برای پاسخ دادن باید وارد شوید</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="comment">
                        <div class="comment-avatar">
                            <img src="img/default_avatar.jpg" width="65" height="65" alt="">
                        </div>
                        <div class="comment-content">
                            <div class="comment-author">
                                کاربر شماره 2
                                <div class="commentmeta">1394/04/18</div>
                            </div>
                            <p>سلام ممنون خیلی خوب بود.</p>
                        </div>
                        <div class="reply">
                            <a href="#">برای پاسخ دادن باید وارد شوید</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="comment">
                        <div class="comment-avatar">
                            <img src="img/default_avatar.jpg" width="65" height="65" alt="">
                        </div>
                        <div class="comment-content">
                            <div class="comment-author">
                                کاربر شماره 3
                                <div class="commentmeta">1394/04/18</div>
                            </div>
                            <p>سلام جای کار بیشتری داره.</p>
                        </div>
                        <div class="reply">
                            <a href="#">برای پاسخ دادن باید وارد شوید</a>
                        </div>
                    </div>
                </li>
            </ol>
        </div>
    </div>
</div>
<?php get_footer(); ?>

