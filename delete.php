<?php
session_start();
include_once 'mysql.inc.php';
if(!isset($_SESSION['ID'])){
    $_SESSION['choice'] = 8;
    header('location:login.php');
    exit;
}
$ID = $_SESSION['ID'];
$method = isset($_GET['method'])? $_GET['method'] : '';
if($method==1){
    include_once 'connectdb.php';
    $PID = isset($_GET['PID'])? $_GET['PID'] : '';
    if(!is_numeric($PID)) exit;
    if(empty($PID)) header('location:mypush.php');
    $sql = "DELETE FROM pushtable WHERE PID = {$PID} AND ID = {$ID}";
    $res = execute_bool($conn,$sql);
    if($res){
        $_SESSION['choice'] = 9;
        header("location:mypush.php");
    }
    else{
        $_SESSION['choice'] = 10;
        header("location:mypush.php");
    }
}
else if($method==2){
    $servername = 'localhost';
    $username = 'bale2002_0309';
    $password = 'axiulan14';

    // 创建连接
    $conn = mysqli_connect($servername, $username, $password, 'bale2002_question', 3306);

    // 检测连接
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $QID = isset($_GET['QID'])? $_GET['QID'] : '';
    if(!is_numeric($QID)) header('location:myqs.php');
    if(empty($QID)) header('location:myqs.php');
    $sql1 = "DELETE FROM questiontable WHERE QID = {$QID} AND ID = {$ID}";
    $sql2 = "DROP TABLE comment_{$QID}";
    $res1 = execute_bool($conn,$sql1);
    $res2 = execute_bool($conn,$sql2);
    if($res1 && $res2){
        $_SESSION['choice'] = 9;
        header("location:myqs.php");
    }
    else{
        $_SESSION['choice'] = 10;
        header("location:myqs.php");
    }
}
else if($method==3){
    include_once 'connectdb.php';
    $MID = isset($_GET['MID'])? $_GET['MID'] : '';
    if(!is_numeric($MID)) header('location:myhuanqian.php');
    if(empty($MID)) header('location:myhuanqian.php');
    $sql = "DELETE FROM moneytable WHERE MID = {$MID} AND ID = {$ID}";
    $res = execute_bool($conn,$sql);
    if($res){
        $_SESSION['choice'] = 9;
        header("location:myhuanqian.php");
    }
    else{
        $_SESSION['choice'] = 10;
        header("location:myhuanqian.php");
    }
}
else if($method==4){
    include_once 'connectdb.php';
    $NID = isset($_GET['NID'])? $_GET['NID'] : '';
    if(!is_numeric($NID)) header('location:myneed.php');
    if(empty($NID)) header('location:myneed.php');
    $sql = "DELETE FROM needtable WHERE NID = {$NID} AND ID = {$ID}";
    $res = execute_bool($conn,$sql);
    if($res){
        $_SESSION['choice'] = 9;
        header("location:myneed.php");
    }
    else{
        $_SESSION['choice'] = 10;
        header("location:myneed.php");
    }
}
