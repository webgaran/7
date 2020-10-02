
    <div id="sl-contact-wrapper">
        <?php if( $has_error ): ?>
            <div class="contact-message error">
                <?php foreach ($message as $item) :?>
                    <p><?php echo $item; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if( $has_success ): ?>
            <div class="contact-message success">
                <?php foreach ($message as $item) :?>
                    <p><?php echo $item; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form action="<?php echo get_permalink(); ?>" name="sl_contact_frm" id="sl_contact_frm" method="POST">
            <div class="frm-row">
                <input type="text" name="full_name" id="full_name" placeholder="نام و نام خانوادگی " required>
            </div>
            <div class="frm-row">
                <input type="email" name="email" id="email" placeholder="آدرس ایمیل" required>
            </div>
            <div class="frm-row">
                <input type="text" name="subject" id="subject" placeholder="موضوع" required>
            </div>
            <div class="frm-row">
                <textarea name="content" id="content" cols="30" rows="10" required placeholder="متن درخواست خود را اینجا بنویسید"></textarea>
            </div>
            <div class="frm-row" style="text-align: center;">
                <?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">'; ?>
            </div>
            <div class="frm-row">
                <input type="text" name="security" id="security" placeholder="کد امنیتی" required>
            </div>
            <div class="frm-row">
                <input name="contact_submit" id="frm-contact-submit" type="submit" value="ارسال">
            </div>
            <?php// wp_nonce_field('ajax-contact-from','_nonce'); ?>
        </form>
    </div>