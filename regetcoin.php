<?php
session_start();
if(!isset($_SESSION['ID'])){
    header('location:login.php');
    exit;
}
if(!isset($_GET['MID'])){
    header('location:myhuanqian.php');
    exit;
}
include_once 'connectdb.php';
include_once 'mysql.inc.php';
if(isset($_POST['type'])){
    $type = '';
    for($i=0; $i<count($_POST['type']);$i++){
        $type = $type.$_POST['type'][$i];
    }
}
else{
    $type = '';
}
$place = isset($_POST['place']) ? $_POST['place'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$method = isset($_POST['method']) ? $_POST['method'] : '';
$ID = isset($_SESSION['ID']) ? $_SESSION['ID'] : '';
$MID = $_GET['MID'];

$place = mysqli_real_escape_string($conn, $place);
$price = mysqli_real_escape_string($conn, $price);
$method = mysqli_real_escape_string($conn, $method);

$sql = "UPDATE moneytable SET place = '{$place}', method = '{$method}', price = '{$price}', type = '{$type}' WHERE MID = {$MID} AND ID = {$ID}";
$res = execute_bool($conn,$sql);
if($res){
    $_SESSION['choice'] = 11;
    header('location:myhuanqian.php');
    exit;
}
else{
    $_SESSION['choice'] = 7;
    header('location:myhuanqian.php');
    exit;
}