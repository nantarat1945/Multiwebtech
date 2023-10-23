<?php
session_start();
include("../db.php");
$key = $_GET["BookID"];
$name = $_SESSION['username'];
if($_GET['BookStatus'] == 'Available')
{
    $strSQL = "UPDATE `bookingstatus` SET `username` = '$name',`BookStatus` = 'Borrowed' WHERE `BookID` = '$key';";
    $objquery =  mysqli_query($con, $strSQL);
    header("location:borrow.php");
}else{
    $strSQL = "UPDATE `bookingstatus` SET `username` = '',`BookStatus` = 'Available' WHERE `BookID` = '$key';";
    $objquery =  mysqli_query($con, $strSQL);
    header("location:giveback.php");
}
