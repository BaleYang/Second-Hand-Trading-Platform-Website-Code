<?php
function limstr($str, $lim){
    if(mb_strlen($str) <= $lim) return $str;
    else return mb_substr($str,0,$lim-2,"utf-8").'...';
}
?>