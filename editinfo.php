<?php
session_start();
include_once 'connectdb.php';
include_once 'mysql.inc.php';

if(!isset($_SESSION['ID'])){
    header('location:account.php');
    exit;
}
$nickname = isset($_POST['nickname']) ? $_POST['nickname'] : '我也不知道我叫什么';
$wechatID = isset($_POST['wechatID']) ? $_POST['wechatID'] : '';
$ID = isset($_SESSION['ID']) ? $_SESSION['ID'] : '';
$nickname = mysqli_real_escape_string($conn, $nickname);
$wechatID = mysqli_real_escape_string($conn, $wechatID);
$sql = "UPDATE userinfo SET nickname = '{$nickname}', wechatID = '{$wechatID}' WHERE ID = {$ID}";
$res = execute_bool($conn,$sql);
if($res){
    header('location:account.php');
    exit;
}
else{
    header('location:index.php');
    exit;
}
