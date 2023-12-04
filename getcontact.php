<?php
session_start();
if(isset($_SESSION['pushtime'])){
    if(time()-$_SESSION['pushtime']<=60){
        $_SESSION['choice'] = 4;
        header('location:contact-us.php');
        exit;
    }
}
include_once 'connectdb.php';
include_once 'mysql.inc.php';

$content = isset($_POST['content']) ? $_POST['content'] : '';
$company = isset($_POST['company']) ? $_POST['company'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '未填写';


$content = mysqli_real_escape_string($conn, $content);
$company = mysqli_real_escape_string($conn, $company);
$email = mysqli_real_escape_string($conn, $email);
$name = mysqli_real_escape_string($conn, $name);

$sql = "INSERT INTO advisetable (name, email, company, content, time) 
        VALUES ('{$name}', '{$email}', '{$company}', '{$content}', NOW())";

$res = execute_bool($conn,$sql);
if($res){
    $_SESSION['pushtime']  = time();
    $_SESSION['choice'] = 17;
    header('location:index.php');
    exit;
}

else{
    $_SESSION['choice'] = 7;
    header('location:index.php');
    exit;
}
