<div class="wrap">
    <h2>تنظیمات قالب سون لرن</h2>

    <div id="panel-wrapper">

        <div id="panel-inner">
            <div id="panel-sidebar">
                <ul>
                    <li><a href="<?php echo add_query_arg('tab','general'); ?>">عمومی</a></li>
                    <li><a href="<?php echo add_query_arg('tab','posts'); ?>">مطالب</a></li>
                    <li><a href="<?php echo add_query_arg('tab','users'); ?>">کاربران</a></li>
                    <li><a href="<?php echo add_query_arg('tab','settings'); ?>">تنظیمات</a></li>
                    <li><a href="<?php echo add_query_arg('tab','help'); ?>">راهنما</a></li>
                </ul>
                <div class="settings">
                    <div class="settings-row">
                        <form  method="get" action="admin-post.php">
                            <input type="hidden" name="action" value="sl_theme_panel_settings_output">
                            <input class="button" type="submit" value="خروجی تنظیمات پنل">
                        </form>
                    </div>
                </div>
            </div>
            <div id="panel-content">
                <form action="" method="post" enctype="multipart/form-data">
                <?php include get_template_directory().'/tpl/admin/'.$default_tab.'.php'; ?>
                    <div>
                        <input name="submit" type="submit" class="panel-btn" value="ذخیره تنظیمات">
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>