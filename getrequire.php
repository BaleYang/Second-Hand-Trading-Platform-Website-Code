<?php
session_start();
if(isset($_SESSION['pushtime'])){
    if(time()-$_SESSION['pushtime']<=60){
        $_SESSION['choice'] = 4;
        header('location:index.php');
        exit;
    }
}
include_once 'connectdb.php';
include_once 'mysql.inc.php';

if(!isset($_SESSION['ID'])){
    $_SESSION['choice'] = 6;
    header('location:index.php');
    exit;
}

if(isset($_POST['type'])){
    $type = '';
    for($i=0; $i<count($_POST['type']);$i++){
        $type = $type.$_POST['type'][$i];
    }
}
else{
    $type = '';
}
$title = isset($_POST['title']) ? $_POST['title'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';
$nickname = isset($_SESSION['nickname']) ? $_SESSION['nickname'] : '未登录';
$anonymous = isset($_SESSION['anonymous']) ? 1 : 0;
$ID = isset($_SESSION['ID']) ? $_SESSION['ID'] : '';

$price = mysqli_real_escape_string($conn, $price);
$nickname = mysqli_real_escape_string($conn, $nickname);
$wechatID = mysqli_real_escape_string($conn, $wechatID);
$content = mysqli_real_escape_string($conn, $content);
$title = mysqli_real_escape_string($conn, $title);

$sql = "INSERT INTO needtable (NID, ID, nickname, type, time, title, price, content, anonymous) 
        VALUES (null, '{$ID}', '{$nickname}', '{$type}', NOW(),'{$title}','{$price}','{$content}', '{$anonymous}')";

$res = execute_bool($conn,$sql);
$wechatID = isset($_POST['wechatID']) ? $_POST['wechatID'] : '';
if(!empty($wechatID)){
    $sql = "UPDATE userinfo SET wechatID = '{$wechatID}' WHERE ID = {$ID}";
    $res1 = execute_bool($conn,$sql);
}
if($res){
    $_SESSION['pushtime'] = time();
    $_SESSION['choice'] = 1;
    header('location:index.php');
    exit;
}
else{
    $_SESSION['choice'] = 7;
    header('location:index.php');
    exit;
}