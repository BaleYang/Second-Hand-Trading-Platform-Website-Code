<?php
include_once 'connectdb.php';
include_once 'mysql.inc.php';
session_start();
if(!isset($_SESSION['ID'])) header('login.php');
$ID = $_SESSION['ID'];
$newpsword = isset($_POST['newpsword']) ? $_POST['newpsword'] : '';
$psword = isset($_POST['psword']) ? $_POST['psword'] : '';
if(empty($newpsword) || empty($psword)){
    $_SESSION['choice'] = 14;//改一下
    header('newpassword.php');
    exit;
}

$sql = "SELECT psword FROM userinfo WHERE ID = {$ID}";
$res = execute( $conn, $sql );
$row = mysqli_fetch_array($res);
if(isset($row)){
    if(md5($psword) == $row['psword']){
        echo 'ok';
        $newpsword = md5($newpsword);
        $sql = "UPDATE userinfo SET psword = '{$newpsword}' WHERE ID = {$ID}";
        $res = execute_bool($conn,$sql);
        $_SESSION['choice'] = 15;
        if($res) header('location:account.php');
        else echo '错误';
    }
    else{
        header('location:newpassword.php?error=1');
    }
}
else{
    header('Refresh:0;url=login.php?error=1');
}
mysqli_close($conn);
?>