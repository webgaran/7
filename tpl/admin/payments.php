<div class="wrap">
    <h2>پرداخت های درگاه آسان پرداخت</h2>
    <table class="widefat fixed" cellspacing="0">
        <thead>
        <tr>
            <th>کاربر</th>
            <th>نام پرداخت کننده</th>
            <th>ایمیل</th>
            <th>توضیحات</th>
            <th>شماره رزرو</th>
            <th>شماره پیگیری</th>
            <th>مبلغ</th>
            <th>تاریخ</th>
            <th>آی پی پرداخت کننده</th>
            <th>وضعیت</th>
            <th>
                عملیات
            </th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>کاربر</th>
            <th>نام پرداخت کننده</th>
            <th>ایمیل</th>
            <th>توضیحات</th>
            <th>شماره رزرو</th>
            <th>شماره پیگیری</th>
            <th>مبلغ</th>
            <th>تاریخ</th>
            <th>آی پی پرداخت کننده</th>
            <th>وضعیت</th>
            <th>
                عملیات
            </th>
        </tr>
        </tfoot>
        <tbody>
            <?php if( count($payments)  > 0 ) : ?>
                <?php foreach($payments as $payment): ?>
                    <tr>
                        <td><?php echo $payment->display_name ?></td>
                        <td><?php echo $payment->full_name; ?></td>
                        <td><?php echo $payment->email; ?></td>
                        <td><?php echo $payment->description; ?></td>
                        <td><?php echo $payment->res_id; ?></td>
                        <td><?php echo $payment->ref_id; ?></td>
                        <td><?php echo number_format($payment->amount).' ریال'; ?></td>
                        <td><?php echo $payment->created_at; ?></td>
                        <td><?php echo $payment->ip;
                            //long2ip($payment->ip)
                            ?></td>
                        <td><?php

                            echo intval($payment->status) ? 'پرداخت موفق':'پرداخت نا موفق';

                            ?></td>
                        <td>
                            <a href="<?php echo  add_query_arg(array('action' => 'delete','pid' => $payment->ID)); ?>"><span class="dashicons dashicons-trash"></span></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="10">
                        <span>هیچ رکوردی یافت نشد</span>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>