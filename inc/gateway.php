<?php

function parspal_request_payment($price,$full_name,$email,$description){
    global $current_user;
    get_currentuserinfo();
    $MerchantID = '000000';
    $Password = '******';
    $Price = $price / 10;
    $ReturnPath = add_query_arg(array('gateway' => 'parspal'),get_permalink());
    $ResNumber = microtime(true);
    $Description = 'خرید از وب سایت سون لرن';
    $Paymenter = $full_name;
    $Email = $email;
    $Mobile = '0';
    $client = new SoapClient('http://merchant.parspal.com/WebService.asmx?wsdl');
    $res = $client->RequestPayment(array(
        "MerchantID" => $MerchantID ,
        "Password" =>$Password ,
        "Price" =>$Price,
        "ReturnPath" =>$ReturnPath,
        "ResNumber" =>$ResNumber,
        "Description" =>$Description,
        "Paymenter" =>$Paymenter,
        "Email" =>$Email,
        "Mobile" =>$Mobile
    ));

    $PayPath = $res->RequestPaymentResult->PaymentPath;
    $Status = $res->RequestPaymentResult->ResultStatus;

    if($Status == 'Succeed')
    {
        global $wpdb;

        $wpdb->insert($wpdb->prefix.'payments',array(
            'user_id'     => isset($current_user->ID) ?$current_user->ID : null,
            'full_name'   => $full_name,
            'email'       => $email,
            'description' => $description,
            'res_id'      => $ResNumber,
            'amount'      => $price,
            'amount'      => date('Y-m-d H:i:s'),
            'ip'          => ip2long($_SERVER['REMOTE_ADDR']),
         ));

        if( $wpdb->insert_id ){
            //$_SESSION['payment_id'] = $wpdb->insert_id;
            header("Location: ".$PayPath);
            exit();

        }


    }
    else
    {
        echo "متاسفانه خطایی رخ داده است. کد خطا : ".$Status;
    }
}

function parspal_verify_payment(){

    global $wpdb;
    $MerchantID = '000000';

    $Password = '******';

    if(isset($_POST['status']) && $_POST['status'] == 100){

        $Status = $_POST['status'];

        $Refnumber = $_POST['refnumber'];

        $Resnumber = $_POST['resnumber'];

        $payment = $wpdb->get_row("SELECT * {$wpdb->prefix}payments
                                   WHERE res_id={$Resnumber}
                                   LIMIT 1");

        if( $payment ){

            $client = new SoapClient('http://merchant.parspal.com/WebService.asmx?wsdl');
            $Price = $payment->amount/10; //Price By Toman
            $res = $client->VerifyPayment(array(
                "MerchantID" => $MerchantID ,
                "Password" =>$Password ,
                "Price" =>$Price,
                "RefNum" =>$Refnumber
            ));

            $Status = $res->verifyPaymentResult->ResultStatus;
            $PayPrice = $res->verifyPaymentResult->PayementedPrice;
            if($Status == 'success')// Your Peyment Code Only This Event
            {
                $wpdb->update($wpdb->prefix.'payments',array(
                    'ref_id'  => $Refnumber,
                    'status'  => 1
                ),array(
                    'res_id' => $Resnumber
                ));
                echo '<div style="color:green; font-family:tahoma; direction:rtl; text-align:right">
			پرداخت با موفقیت انجام شد ، شماره رسید پرداخت : '.$Refnumber.' ،  مبلغ پرداختی : '.$PayPrice.' !
			<br /></div>';
            }else{
                echo '<div style="color:green; font-family:tahoma; direction:rtl; text-align:right">
			خطا در پردازش عملیات پرداخت ، نتیجه پرداخت : '.$Status.' !
			<br /></div>';
            }


        }else{

            echo '<div style="color:red; font-family:tahoma; direction:rtl; text-align:right">
		بازگشت از عمليات پرداخت، خطا در انجام عملیات پرداخت ( پرداخت ناموق ) !
		<br /></div>';

        }


    }
    else
    {
        echo '<div style="color:red; font-family:tahoma; direction:rtl; text-align:right">
		بازگشت از عمليات پرداخت، خطا در انجام عملیات پرداخت ( پرداخت ناموق ) !
		<br /></div>';
    };

}