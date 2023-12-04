<?php
session_start();
$title = isset($_POST['title']) ? $_POST['title'] : '';
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
$content = isset($_POST['content']) ? $_POST['content'] : '';

if(empty($title) || empty($type) || empty($content)){
    header('location:askqs.php?title='.$title.'&type='.$type.'&content='.$content.'&anonymous='.$anonymous);
    exit;
}
header('location:askqs_next.php?title='.$title.'&type='.$type.'&content='.$content.'&anonymous='.$anonymous);
exit;