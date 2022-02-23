<?php
    $name = $_POST['name'];
    $company = $_POST['company'];
    $mail = $_POST['mail'];
    $content = $_POST['content'];
    $to = 'william_billl2008@yahoo.co.jp';
    $from = 'info@stock-star.net';
    $title = '【PROViSiON GAMING】Inquiries have arrived from the homepage.';
    $message = 'We have received inquiries from our website, so please respond.'."\r\n"."\r\n".
        '-----------------------------------------------------------------'."\r\n".
        'Name:'.$name."\r\n"."\r\n".
        'Compnay:'.$company."\r\n"."\r\n".
        'Email:'.$mail."\r\n"."\r\n".
        'Content:'.$content."\r\n"."\r\n".
        '-----------------------------------------------------------------';
    $header="From: {$from}\nReply-To: {$from}\nContent-Type: text/plain; 
        MIME-Version: 1.0; Content-Transfer-Encoding: 7bit; charset=ISO-2022-JP";
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $result = mb_send_mail($to, $title, $message, $header);
    echo json_encode($result);
    exit;