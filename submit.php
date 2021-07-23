<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once 'vendor/autoload.php';

session_start();
if($_SERVER['REQUEST_METHOD'] == 'GET') exit();
if($_REQUEST['csrf'] != $_SESSION['token']) {
    echo('CSRF Token 错误，请刷新页面');
    exit();
}

$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = '';
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //TLS 改成 PHPMailer::ENCRYPTION_SMTPS
    $mail->Port       = 587; //tls 改成 465
    $mail->CharSet = "UTF-8";

    //Recipients
    $mail->setFrom('services@duianit.cn', 'DuianIT Services'); //第一个框填发件人邮件，第二个框填发件人姓名
    $mail->addAddress('johnsmith@example.com', 'johnsmith'); //收件人邮件和姓名

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = '【紧急求助】来自'.$_REQUEST['name'];
    $content = str_replace("\n","<br />",$_REQUEST['content']);
    $datetime = new DateTime();
    $mail->Body    = '<html><head><meta content="text/html; charset=utf-8" http-equiv="content-type"></head><body><h2>紧急求助信息</h2><p>发信人：'.$_REQUEST['name'].'</p><p>联系方式：'.$_REQUEST['contact'].'</p><p>内容：<hr /><p>'.$content.'</p><hr /><p>时间：'.$datetime->format('Y-m-d H:i:s').'</p></body></html>';
    $mail->send();
    echo '成功发送邮件';
} catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
}