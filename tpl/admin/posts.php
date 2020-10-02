<filedset>
    <legend>تنظیمات نوشته ها : </legend>
    <div class="panel-frm-row">
        <label for="">تعداد نوشته ها در صفحه اول : </label>
        <input type="number" name="sl_posts_count" min="3" max="20" value="<?php echo intval($slt_options['posts']['sl_posts_count']) ? $slt_options['posts']['sl_posts_count'] : 3; ?>">
    </div>
    <div class="panel-frm-row">
        <label for="sl_theme_show_team"> نمایش تیم در قالب : </label>
        <input type="checkbox" id="sl_theme_show_team" name="sl_theme_show_team"
        <?php checked(1, $slt_options['posts']['sl_theme_show_team']); ?>
        >
    </div>
    <div class="panel-frm-row">
        <label for="">دسته بندی برای مطالب صفحه اول : </label>

        <select name="sl_theme_home_category" id="sl_theme_home_category">
            <?php if( count($categories) > 0 ): ?>
                <?php foreach( $categories as $cat ): ?>
                    <option value="<?php echo $cat->term_id ?>" <?php selected(intval(isset($slt_options['posts']['sl_theme_home_category']) ? $slt_options['posts']['sl_theme_home_category'] :0),$cat->term_id) ?>><?php echo $cat->name ?></option>
                <?php endforeach ?>
            <?php else: ?>
                <option value="0">هیچ دسته بندی یافت نشد</option>
            <?php endif; ?>
        </select>
    </div>
</filedset>