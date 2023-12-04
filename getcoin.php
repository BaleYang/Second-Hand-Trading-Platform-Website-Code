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

$place = isset($_POST['place']) ? $_POST['place'] : '';
$type = isset($_POST['type']) ? $_POST['type'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$method = isset($_POST['method']) ? $_POST['method'] : '';
$nickname = isset($_SESSION['nickname']) ? $_SESSION['nickname'] : '未登录用户';
$ID = isset($_SESSION['ID']) ? $_SESSION['ID'] : '';


$place = mysqli_real_escape_string($conn, $place);
$price = mysqli_real_escape_string($conn, $price);
$nickname = mysqli_real_escape_string($conn, $nickname);
$method = mysqli_real_escape_string($conn, $method);
$wechatID = mysqli_real_escape_string($conn, $wechatID);

$sql = "INSERT INTO moneytable (MID, ID, nickname, type, time, place, price, method) 
        VALUES (null, '{$ID}', '{$nickname}', '{$type}', NOW(),'{$place}','{$price}','{$method}')";

$res = execute_bool($conn,$sql);
$wechatID = isset($_POST['wechatID']) ? $_POST['wechatID'] : '';
if(!empty($wechatID)){
    $sql = "UPDATE userinfo SET wechatID = '{$wechatID}' WHERE ID = {$ID}";
    $res1 = execute_bool($conn,$sql);
}
if($res){
    $_SESSION['pushtime']  = time();
    $_SESSION['choice'] = 1;
    header('location:index.php');
    exit;
}
else{
    $_SESSION['choice'] = 7;
    header('location:index.php');
    exit;
}
