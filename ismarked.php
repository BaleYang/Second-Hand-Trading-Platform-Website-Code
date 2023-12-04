<?php
include_once 'mysql.inc.php';
include_once 'connectdb.php';
var_dump($conn);
function ismarked($ID, $xID, $way){
    if(!isset($_SESSION['ID'])) return 0;
    
    if($way == 1){//pid
        $sql = "SELECT mPID from userinfo WHERE ID = {$ID}";
        $res = execute($conn,$sql);
        $mPID = mysqli_fetch_array($res)['mPID'];
        if (strpos($mPID, $xID) !== false) {
            return 1;
        } else {
            return 0;
        }
    }
}