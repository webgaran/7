<?php if(! is_user_logged_in()): ?>
    <div id="sl-register-wrapper">
        <?php if( $has_error ): ?>
            <div class="register-message error">
                <?php foreach ($message as $item) :?>
                    <p><?php echo $item; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if( $has_success ): ?>
            <div class="register-message success">
               <?php foreach ($message as $item) :?>
                   <p><?php echo $item; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <form action="<?php echo get_permalink(); ?>" name="sl_register_frm" id="sl_register_frm" method="POST">
        <div class="frm-row">
            <input type="text" name="username" id="username" placeholder="نام کاربری" required>
        </div>
        <div class="frm-row">
            <input type="email" name="email" id="email" placeholder="آدرس ایمیل" required>
        </div>
        <div class="frm-row">
            <input type="password" name="password" id="password" placeholder="کلمه عبور" required>
        </div>
        <div class="frm-row">
            <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="نکرار کلمه عبور">
        </div>
        <div class="frm-row">
            <input type="text" name="mobile" id="mobile" required placeholder="شماره همراه">
        </div>
        <div class="frm-row">
            <input name="register_submit" id="frm-register-submit" type="submit" value="ثبت نام در وب سایت">
        </div>
        <?php// wp_nonce_field('ajax-register-from','_nonce'); ?>
    </form>
</div>
<?php endif; ?>