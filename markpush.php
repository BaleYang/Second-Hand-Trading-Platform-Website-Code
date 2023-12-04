<?php
session_start();
include_once 'connectdb.php';
include_once 'mysql.inc.php';
if(!isset($_SESSION['ID'])) exit;
if(!isset($_GET['mark'])) exit;
$ID = $_SESSION['ID'];
$mark = $_GET['mark'];
if(isset($_GET['PID']) && $mark == 1){
    $PID = $_GET['PID'];
    if(!is_numeric($PID)) header('location:index.php');
    $sql = "SELECT mPID from userinfo WHERE ID = {$ID}";
    $mPID = mysqli_fetch_array(execute($conn,$sql))['mPID'];
    $mPID .= "{$PID}".'|';
    $sql = "UPDATE userinfo SET mPID = '{$mPID}' WHERE ID = {$ID}";
    $res = execute_bool($conn,$sql);
    exit;
}
if(isset($_GET['PID']) && $mark == 0){
    $PID = $_GET['PID'];
    if(!is_numeric($PID)) header('location:index.php');
    $sql = "SELECT mPID from userinfo WHERE ID = {$ID}";
    $mPID = mysqli_fetch_array(execute($conn,$sql))['mPID'];
    $mPID = str_replace("|{$PID}|",'|', $mPID);
    $sql = "UPDATE userinfo SET mPID = '{$mPID}' WHERE ID = {$ID}";
    $res = execute_bool($conn,$sql);
    exit;
}
if(isset($_GET['QID']) && $mark == 1){
    $QID = $_GET['QID'];
    if(!is_numeric($QID)) header('location:index.php');
    $sql = "SELECT mQID from userinfo WHERE ID = {$ID}";
    $mQID = mysqli_fetch_array(execute($conn,$sql))['mQID'];
    $mQID .= "{$QID}".'|';
    $sql = "UPDATE userinfo SET mQID = '{$mQID}' WHERE ID = {$ID}";
    $res = execute_bool($conn,$sql);
    exit;
}
if(isset($_GET['QID']) && $mark == 0){
    $QID = $_GET['QID'];
    if(!is_numeric($QID)) header('location:index.php');
    $sql = "SELECT mQID from userinfo WHERE ID = {$ID}";
    $mQID = mysqli_fetch_array(execute($conn,$sql))['mQID'];
    $mQID = str_replace("|{$QID}|",'|', $mQID);
    $sql = "UPDATE userinfo SET mQID = '{$mQID}' WHERE ID = {$ID}";
    $res = execute_bool($conn,$sql);
    exit;
}