<?php
session_start();
if(isset($_SESSION['pushtime'])){
    if(time()-$_SESSION['pushtime']<=60){
        $_SESSION['choice'] = 4;
        header('location:index.php');
        exit;
    }
}
if(!isset($_SESSION['ID'])){
    header('location:login.php');
    exit;
}
if(!isset($_GET['QID'])){
    header('location:myqs.php');
    exit;
}
$servername = 'localhost';
$username = 'bale2002_0309';
$password = 'axiulan14';
 
// 创建连接
$conn = mysqli_connect($servername, $username, $password, 'bale2002_question', 3306);

// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
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
$anonymous = isset($_POST['anonymous']) ? 1 : 0;
$title = isset($_POST['title']) ? $_POST['title'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';
$nickname = isset($_SESSION['nickname']) ? $_SESSION['nickname'] : '未登录';
$ID = isset($_SESSION['ID']) ? $_SESSION['ID'] : '';
$QID = $_GET['QID'];

$content = mysqli_real_escape_string($conn, $content);
$title = mysqli_real_escape_string($conn, $title);


$sql = "UPDATE questiontable SET title = '{$title}', content = '{$content}', anonymous = '{$anonymous}', type = '{$type}' WHERE QID = {$QID} AND ID = {$ID}";
$res = execute_bool($conn,$sql);
if($res){
    $_SESSION['pushtime'] = time();
    $_SESSION['choice'] = 1;
    header('location:myqs.php');
    exit;
}
else{
    $_SESSION['choice'] = 7;
    header('location:myqs.php');
    exit;
}