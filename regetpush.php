<?php
session_start();
include_once 'connectdb.php';
include_once 'mysql.inc.php';

if(!isset($_SESSION['ID']) || !isset($_GET['PID'])){
    header('location:index.php');
    exit;
}
if(isset($_SESSION['test'])) unset($_SESSION['test']);
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
$ID = $_SESSION['ID'];
$PID = $_GET['PID'];
$title = isset($_POST['title']) ? $_POST['title'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';
$anonymous = isset($_POST['anonymous']) ? 1 : 0;
$method = isset($_POST['method']) ? $_POST['method'] : '';

$price = mysqli_real_escape_string($conn, $price);
$method = mysqli_real_escape_string($conn, $method);
$content = mysqli_real_escape_string($conn, $content);
$title = mysqli_real_escape_string($conn, $title);

$sql = "UPDATE pushtable SET title = '{$title}', content = '{$content}', price = '{$price}', method = '{$method}', anonymous = '{$anonymous}', type = '{$type}', free = '{$free}' WHERE PID = {$PID} AND ID = {$ID}";
$res = execute_bool($conn,$sql);
if($res){
    $_SESSION['choice'] = 11;
    header('location:mypush.php');
    exit;
}
else{
    $_SESSION['choice'] = 12;
    header('location:mypush.php');
    exit;
}