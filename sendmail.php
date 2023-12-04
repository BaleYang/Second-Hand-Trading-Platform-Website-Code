<?php
session_start();
$string = "0123456789";
$str = "";
for($i=0;$i<6;$i++){
    $pos = rand(0,9);
    $str .= $string{$pos};
}
if(isset($_SESSION['codetime'])){
    $resttime = 60 - (time() - $_SESSION['codetime']);
    if($resttime > 10) exit;
}
$_SESSION['img_number'] = $str;
$_SESSION['codetime'] = time();
$to = isset($_GET['email']) ? $_GET['email'] : '';       // 邮件接收者
$subject = "注册验证码";                // 邮件标题
$message = "验证码： ".$str;  // 邮件正文
$from = "confirm@ershou-jp.com";   // 邮件发送者
$headers = "From:" . $from;         // 头部信息设置
mail($to,$subject,$message,$headers);
?>