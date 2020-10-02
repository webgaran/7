    <fieldset>
        <legend>تنظیمات لوگو : </legend>
        <div class="panel-frm-row">
        <span>
                <img width="150" height="150" src="<?php echo isset($slt_options['general']['sl_theme_logo'])? $slt_options['general']['sl_theme_logo'] :get_template_directory_uri().'/img/default-logo.png'; ?>" alt="" id="sl_theme_logo">

        </span>
        <span>
        <button data-target-type="image"  data-target="sl_theme_logo" class="panel-btn select-uploader">انتخاب تصویر لوگو</button>
        <input type="hidden" id="sl_theme_logo_input" name="sl_theme_logo" value="<?php echo isset($slt_options['general']['sl_theme_logo'])? $slt_options['general']['sl_theme_logo'] :get_template_directory_uri().'/img/default-logo.png'; ?>">
        </span>
        </div>
    </fieldset>
    <filedset>
        <legend>تنظیمات شبکه های اجتماعی : </legend>
        <div class="panel-frm-row">
            <label for="sl_facebook_page">آدرس پروفایل صفحه فیس بوک: </label>
            <input class="ltr" id="sl_facebook_page" type="text" name="sl_facebook_page" value="<?php echo isset($slt_options['general']['sl_facebook_page']) ? $slt_options['general']['sl_facebook_page']:''; ?>">
        </div>
        <div class="panel-frm-row">
            <label for="sl_twitter_page">آدرس پروفایل صفحه تویتتر  :</label>
            <input class="ltr" id="sl_twitter_page" type="text" name="sl_twitter_page" value="<?php echo isset($slt_options['general']['sl_twitter_page']) ? $slt_options['general']['sl_twitter_page']:''; ?>">
        </div>
        <div class="panel-frm-row">
            <label for="sl_instagram_page">آدرس پروفایل اینستاگرام : </label>
            <input class="ltr" id="sl_instagram_page" type="text" name="sl_instagram_page" value="<?php echo isset($slt_options['general']['sl_instagram_page']) ? $slt_options['general']['sl_instagram_page']:''; ?>">
        </div>
        <div class="panel-frm-row">
            <label for="sl_gplus_page">ادرس گوگل پلاس :  </label>
            <input  class="ltr" id="sl_gplus_page" type="text" name="sl_gplus_page" value="<?php echo isset($slt_options['general']['sl_gplus_page']) ? $slt_options['general']['sl_gplus_page']:''; ?>">
        </div>
    </filedset>

    <fieldset>
        <legend>تنظیمات تماس با ما : </legend>
        <div class="panel-frm-row">
            <label for="sl_theme_phone">شماره تماس با ما : </label>
            <input class="ltr" id="sl_theme_phone" name="sl_theme_phone" type="text"
                   value="<?php echo isset($slt_options['general']['sl_theme_phone'])
                   && !empty($slt_options['general']['sl_theme_phone']) ?
                       $slt_options['general']['sl_theme_phone'] : '' ?>"
            ></div>
        <div class="panel-frm-row">
            <label for="sl_theme_address">آدرس تماس با ما : </label>
            <input id="sl_theme_address" name="sl_theme_address" type="text"
                   value="<?php echo isset($slt_options['general']['sl_theme_address'])
                   && !empty($slt_options['general']['sl_theme_address']) ?
                       $slt_options['general']['sl_theme_address'] : '' ?>"
            ></div>
        <div class="panel-frm-row">
            <label for="sl_theme_email">ایمیل تماس با ما : </label>
            <input  class="ltr"  id="sl_theme_email" name="sl_theme_email" type="text"
                   value="<?php echo isset($slt_options['general']['sl_theme_email'])
                   && !empty($slt_options['general']['sl_theme_email']) ?
                       $slt_options['general']['sl_theme_email'] : '' ?>"
            ></div>
    </fieldset>
