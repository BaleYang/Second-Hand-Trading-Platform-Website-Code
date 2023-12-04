<?php
include_once 'connectdb.php';
session_start();
$email = isset($_POST['email']) ? $_POST['email'] : '';
$code = isset($_POST['code']) ? $_POST['code'] : '';
$_SESSION['email'] = $email;
if(empty($email)){
    header('location:forget.php?error=3');
    exit;
}
$email = mysqli_real_escape_string($conn, $email);
$sql = "SELECT ID, nickname, psword
        FROM userinfo
        WHERE email='{$email}'";

$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
    die('无法读取数据: ' . mysqli_error($conn));
}
$row = mysqli_fetch_array($retval);
if(mysqli_num_rows($row) == 0) header('location:forget.php?error=1');
if($_SESSION['img_number'] != $code){
    $_SESSION['repsword'] = $repsword;
    if(isset($_SESSION['wrongtimes'])) $_SESSION['wrongtimes'] += 1;
    else $_SESSION['wrongtimes'] = 1;
    if($_SESSION['wrongtimes'] == 5) session_destroy(); 
    header('location:forget.php?error=2');
    exit;
}
else{
    $_SESSION['setpw'] = 1;
    header('location:resetpw.php');
}
mysqli_close($conn);
?>