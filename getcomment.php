<?php
session_start();
$qid = isset($_POST['qid']) ? $_POST['qid'] : '';
if(empty($qid)) header('location:showqs.php');
if(isset($_SESSION['pushtime'])){
    if(time()-$_SESSION['pushtime']<=60){
        $_SESSION['choice'] = 4;
        header("location:answerqs.php?qid={$qid}");
        exit;
    }
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
$content = isset($_POST['content']) ? $_POST['content'] : '';
//$qid = isset($_POST['qid']) ? $_POST['qid'] : '';
$level = isset($_POST['level']) ? $_POST['level'] : '';
$fatherCID = isset($_POST['fatherCID']) ? $_POST['fatherCID'] : '0';
$repliedname = isset($_POST['repliedname']) ? $_POST['repliedname'] : '匿名用户';
$repliedCID = isset($_POST['repliedCID']) ? $_POST['repliedCID'] : '0';
$repliedID = isset($_POST['repliedID']) ? $_POST['repliedID'] : '0';
$nickname = isset($_SESSION['nickname']) ? $_SESSION['nickname'] : '未登录用户';
$ID = isset($_SESSION['ID']) ? $_SESSION['ID'] : '';

$nickname = mysqli_real_escape_string($conn, $nickname);
$method = mysqli_real_escape_string($conn, $method);
$content = mysqli_real_escape_string($conn, $content);
$repliedname = mysqli_real_escape_string($conn, $repliedname);

$sql = "INSERT INTO comment_{$qid} (CID, ID, nickname, repliedCID, repliedID, repliedname, reply_time, comment_level, content,fatherCID) 
        VALUES (null, '{$ID}', '{$nickname}', '{$repliedCID}', '{$repliedID}','{$repliedname}',NOW(),'{$level}','{$content}','{$fatherCID}')";

$res = execute_bool($conn,$sql);
if($res){
    $_SESSION['pushtime'] = time();
    header("location:answerqs.php?qid={$qid}");
    exit;
}
else{
    $_SESSION['choice'] = 7;
    header('location:index.php');
    exit;
}
