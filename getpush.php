<?php
session_start();
/*
if(isset($_SESSION['pushtime'])){
    if(time()-$_SESSION['pushtime']<=60){
        $_SESSION['choice'] = 4;
        header('location:index.php');
        exit;
    }
}
*/
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
$free = isset($_POST['free']) ? $_POST['free'] : '0';
if($free == 1) $price = 0;
else $price = isset($_POST['price']) ? $_POST['price'] : '价格私聊';
$title = isset($_POST['title']) ? $_POST['title'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';
$anonymous = isset($_POST['anonymous']) ? 1 : 0;
$method = isset($_POST['method']) ? $_POST['method'] : '';
$nickname = isset($_SESSION['nickname']) ? $_SESSION['nickname'] : '未登录用户';
$ID = isset($_SESSION['ID']) ? $_SESSION['ID'] : '';
$sql = "SELECT pushtimes from userinfo WHERE ID = {$ID}";
$res = execute($conn,$sql);
$pushtimes = mysqli_fetch_array($res)['pushtimes'] + 1;
$wechatID = isset($_POST['wechatID']) ? $_POST['wechatID'] : '';

$place = mysqli_real_escape_string($conn, $place);
$price = mysqli_real_escape_string($conn, $price);
$nickname = mysqli_real_escape_string($conn, $nickname);
$method = mysqli_real_escape_string($conn, $method);
$wechatID = mysqli_real_escape_string($conn, $wechatID);
$content = mysqli_real_escape_string($conn, $content);
$title = mysqli_real_escape_string($conn, $title);

if(!empty($wechatID)){
    $sql = "INSERT INTO pushtable (PID, ID, nickname, type, time, title, price, content, method, times, anonymous, pushtimes, free)
    VALUES (null, '{$ID}', '{$nickname}', '{$type}', NOW(),'{$title}','{$price}','{$content}','{$method}','0','{$anonymous}','{$pushtimes}','{$free}')";
    $res = execute_bool($conn,$sql);
    $sql = "UPDATE userinfo SET wechatID = '{$wechatID}' WHERE ID = {$ID}";
    $res1 = execute_bool($conn,$sql);
}
else{
    $sql = "INSERT INTO pushtable (PID, ID, nickname, type, time, title, price, content, method, times, anonymous, pushtimes, free) 
    VALUES (null, '{$ID}', '{$nickname}', '{$type}', NOW(),'{$title}','{$price}','{$content}','{$method}','0','{$anonymous}','{$pushtimes}', '{$free}')";
    $res = execute_bool($conn,$sql);
}
if($res){
    $_SESSION['pushtime'] = time();
    $sql = "UPDATE userinfo SET pushtimes = pushtimes + 1 WHERE ID = {$ID}";
    execute_bool($conn,$sql);
    @mkdir("./uploads/{$ID}/{$pushtimes}");
    $_SESSION['choice'] = 1;
    header('location:index.php');
    exit;
}
else{
    $_SESSION['choice'] = 7;
    header('location:index.php');
    exit;
}