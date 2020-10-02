<fieldset>
    <legend>تنظیمات کاربران : </legend>
    <div class="panel-frm-row">
        <label for="sl_theme_only_register_users">نمایش مطالب برای کاربران عضو : </label>
        <input type="checkbox" id="sl_theme_only_register_users" name="sl_theme_only_register_users"
        <?php
        checked(1,
            isset($slt_options['users']['sl_theme_only_register_users']) ?
                $slt_options['users']['sl_theme_only_register_users'] :
                0
        );
        ?>
        >
    </div>
</fieldset>