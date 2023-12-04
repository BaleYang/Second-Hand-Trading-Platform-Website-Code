<?php
session_start();
if(isset($_SESSION['ID'])) $ID = $_SESSION['ID'];
else exit;
if(isset($_SESSION['count'])) $count = $_SESSION['count'];
else exit;
if(isset($_POST['file'])){
    $file = './uploads/'. "{$ID}/{$count}/". $_POST['file'];//
    if(file_exists($file)){
        unlink($file);
    }
}
?>
