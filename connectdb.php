<?php
$servername = 'localhost';
$username = '';
$password = '';
 
// 创建连接
$conn = mysqli_connect($servername, $username, $password, 'bale2002_userdatabase', 3306);

// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}