<?php if(! is_user_logged_in()): ?>
    <div id="sl-login-wrapper">

    <div class="login-message error" style="display: none;"></div>
    <form action="<?php echo get_permalink(); ?>" name="sl_login_frm" id="sl_login_frm" method="POST">
        <div class="frm-row">
            <input type="text" name="username" id="username" placeholder="نام کاربری">
        </div>
        <div class="frm-row">
            <input type="password" name="password" id="password" placeholder="کلمه عبور">
        </div>
        <div class="frm-row">
            <input type="checkbox" name="rememberme" id="rememberme">
            <label for="rememberme">مرا به خاطر بسپار</label>
        </div>
        <div class="frm-row">
            <input id="frm-login-submit" type="submit" value="ورود">
        </div>
        <?php// wp_nonce_field('ajax-login-from','_nonce'); ?>
    </form>
</div>
<?php endif; ?>