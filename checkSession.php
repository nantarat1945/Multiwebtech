<?php
// เริ่มเซสชันหากยังไม่ถูกเริ่มต้น
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION['username'])){
    header("location:../index.php");
}
?>
