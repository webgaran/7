<!--start statistics section-->
<div id="statistics">
    <div class="stat"><span class="stat-title">تعداد مطالب</span><span class="stat-value"><?php echo wp_count_posts()->publish ?></span></div>
    <div class="stat"><span class="stat-title">تعداد دانلود ها</span><span class="stat-value"><?php echo wp_count_posts('download')->publish ?></span></div>
    <div class="stat"><span class="stat-title">تعداد کاربران</span><span class="stat-value"><?php
            $count_users = count_users();
            echo $count_users['total_users'];
            ?></span></div>
    <div class="stat"><span class="stat-title">تعداد نظرات</span><span class="stat-value"><?php
            $comments_count = wp_count_comments();
            echo $comments_count->approved;
            ?></span></div>

</div>
<!--end statistics section-->