<div id="payment-wrapper">
    <?php if($has_error): ?>
        <div style="background: #d27474;padding: 10px;text-align: center;width: 80%;margin: 20px auto;" >
            <p><?php echo $message; ?></p>
        </div>
    <?php endif; ?>
    <div class="payment-inner">
        <form action="" method="post">
            <div class="frm-row">
                <input type="text" name="full_name" placeholder="نام و نام خانوادگی">
            </div>
            <div class="frm-row">
                <input type="email" name="email" placeholder="ایمیل" >
            </div>
            <div class="frm-row">
                <input type="text" name="amount" placeholder="مبلغ ">
            </div>
            <div class="frm-row">
                <textarea name="description" id="description" cols="30" placeholder="توضیحات پرداخت" rows="5"></textarea>
            </div>
            <div class="frm-row">
                <input name="sl_payment_submit" type="submit" value="پرداخت " >
            </div>
        </form>
    </div>
</div>