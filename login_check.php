<?php
include_once 'connectdb.php';
session_start();
$email = isset($_POST['email']) ? $_POST['email'] : '';
$_SESSION['email'] = $email;
$psword = isset($_POST['psword']) ? $_POST['psword'] : '';
if(empty($email) || empty($psword)){
    header('location:login.php');
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


$_SESSION['nickname']=$row['nickname'];


if(isset($row)){
    if(md5($psword) == $row['psword']){
        $_SESSION['ID']=$row['ID'];
        $_SESSION['choice'] = 18;
        header('location:index.php');
    }
    else{
        header('Refresh:0;url=login.php?error=1');
    }
}
else{
    header('Refresh:0;url=login.php?error=1');
}
mysqli_close($conn);
?>