<?php
include_once 'connectdb.php';
include_once 'mysql.inc.php';
session_start();
if(!isset($_SESSION['email']) || $_SESSION['setpw'] != 1){
    session_destroy(); 
    header('location:forget.php');
}
$email = $_SESSION['email'];
$repsword = isset($_POST['repsword']) ? $_POST['repsword'] : '';
$psword = isset($_POST['psword']) ? $_POST['psword'] : '';
if(empty($repsword) || empty($psword)){
    $_SESSION['choice'] = 3;
    header('location:resetpw.php');
    exit;
}
if($repsword != $psword){ 
    $_SESSION['psword'] = $psword;
    $_SESSION['choice'] = 1;
    header('location:resetpw.php');
    exit;
}
$email = mysqli_real_escape_string($conn, $email);
$psword = mysqli_real_escape_string($conn, $psword);
$psword = md5($psword);
$sql = "UPDATE userinfo SET psword = '{$psword}' WHERE email = '{$email}'";
$res = execute_bool($conn,$sql);
if($res){
    $_SESSION['choice'] = 15;
    header('location:login.php');
}
else{
    $_SESSION['choice'] = 13;
    header('location:forget.php');
}
echo 4;
mysqli_close($conn);
?>