<?php
session_start();
include_once 'connectdb.php';

$email = isset($_POST['email']) ? $_POST['email'] : '';
$nickname = isset($_POST['nickname']) ? $_POST['nickname'] : '';
$psword = isset($_POST['psword']) ? $_POST['psword'] : '';
$repsword = isset($_POST['repsword']) ? $_POST['repsword'] : '';
$code = isset($_POST['code']) ? $_POST['code'] : '';
$_SESSION['email'] = $email;
$_SESSION['nickname'] = $nickname;
$_SESSION['psword'] = $psword;
if(empty($nickname)){
    $_SESSION['repsword'] = $repsword;
    header('location:register.php?error=1');
    exit;
}
if(empty($email)){
    $_SESSION['repsword'] = $repsword;
    header('location:register.php?error=2');
    exit;
}
if(empty($psword)){
    $_SESSION['repsword'] = $repsword;
    header('location:register.php?error=3');
    exit;
}

if(empty($repsword)){
    header('location:register.php?error=4');
    exit;
}
if(empty($code)){
    $_SESSION['repsword'] = $repsword;
    header('location:register.php?error=5');
    exit;
}

if($psword != $repsword){
    header('location:register.php?error=6');
    exit;
}

if($_SESSION['img_number'] != $code){
    $_SESSION['repsword'] = $repsword;
    if(isset($_SESSION['wrongtimes'])) $_SESSION['wrongtimes'] += 1;
    else $_SESSION['wrongtimes'] = 1;
    if($_SESSION['wrongtimes'] == 5) session_destroy(); 
    header('location:register.php?error=7');
    exit;
}
$email = mysqli_real_escape_string($conn, $email);
$nickname = mysqli_real_escape_string($conn, $nickname);
$psword = mysqli_real_escape_string($conn, $psword);
$sql = "INSERT INTO userinfo (ID, email, nickname, psword, time) VALUES (null, '{$email}', '{$nickname}', md5('{$psword}'), NOW())";
if (mysqli_query($conn, $sql)) {
    $sql1 = "SELECT ID, nickname, email
        FROM userinfo
        ORDER BY ID DESC limit 0,10";
    $retval = mysqli_query( $conn, $sql1);
    if(isset($_SESSION['wrongtimes'])) 
    if(! $retval )
    {
        die('无法读取数据: ' . mysqli_error($conn));
    }
    $test = 1;
    while($test){
        $row = mysqli_fetch_array($retval);
        if($email == $row['email']){
            $ID = $row['ID'];
            $_SESSION['ID']=$ID;
            $_SESSION['nickname']=$nickname;
            mkdir("uploads/"."{$ID}");
            $test = 0;
        }
    }
    if(isset($_SESSION['wrongtimes'])) unset($_SESSION['wrongtimes']);
    $_SESSION['choice'] = 2;
    if(isset($_SESSION['repsword'])) unset($_SESSION['repsword']);
    if(isset($_SESSION['psword'])) unset($_SESSION['psword']);
    header('location:index.php');
    exit;
} 
else {
    session_destroy();
    $_SESSION['choice'] = 5;
    header('location:register.php');
    exit;
}
mysqli_close($conn);
?>