<?php
session_start();
if(isset($_SESSION['pushtime'])){
    if(time()-$_SESSION['pushtime']<=60){
        $_SESSION['choice'] = 4;
        header('location:index.php');
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

$nickname = mysqli_real_escape_string($conn, $nickname);
$content = mysqli_real_escape_string($conn, $content);
$title = mysqli_real_escape_string($conn, $title);

$sql = "INSERT INTO questiontable (QID, ID, nickname, type, time, title, content, times, anonymous) 
        VALUES (null, '{$ID}', '{$nickname}', '{$type}', NOW(),'{$title}','{$content}','0','{$anonymous}')";

$res = execute_bool($conn,$sql);
$sql1 = 'SELECT QID from questiontable ORDER BY QID DESC limit 0,1;';
$res1 = execute($conn,$sql1);
$qid = mysqli_fetch_array($res1)['QID'];
$sql2 = "CREATE TABLE comment_{$qid}
(
   CID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   ID INT NOT NULL,
   nickname varchar(20) NOT NULL,
   repliedCID INT NOT NULL,
   repliedID INT,
   repliedname varchar(40),
   reply_time DATETIME NOT NULL,
   comment_level tinyint NOT NULL,
   content varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
   fatherCID INT
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
$res2 = execute($conn,$sql2);
if($res2){
    $_SESSION['pushtime'] = time();
    $_SESSION['choice'] = 1;
    header('location:index.php');
    exit;
}
else{
    $_SESSION['choice'] = 7;
    header('location:index.php');
    exit;
}