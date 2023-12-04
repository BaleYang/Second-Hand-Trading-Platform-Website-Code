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
if(!isset($_GET['NID'])){
    header('location:myneed.php');
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
$anonymous = isset($_POST['anonymous']) ? 1 : 0;
$title = isset($_POST['title']) ? $_POST['title'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';
$ID = isset($_SESSION['ID']) ? $_SESSION['ID'] : '';
$NID = $_GET['NID'];

$price = mysqli_real_escape_string($conn, $price);
$content = mysqli_real_escape_string($conn, $content);
$title = mysqli_real_escape_string($conn, $title);

$sql = "UPDATE needtable SET title = '{$title}', content = '{$content}', price = '{$price}', anonymous = '{$anonymous}', type = '{$type}' WHERE NID = {$NID} AND ID = {$ID}";
$res = execute_bool($conn,$sql);
if($res){
    $_SESSION['choice'] = 11;
    header('location:myneed.php');
    exit;
}
else{
    $_SESSION['choice'] = 7;
    header('location:myneed.php');
    exit;
}