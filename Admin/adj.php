<?php
    session_start();
    include("../db.php");
    $bName = mysqli_real_escape_string($con,$_POST['bn']);
    $bid = mysqli_real_escape_string($con,$_POST['bid']);
    $bs = mysqli_real_escape_string($con,$_POST['bs']);
    
    $strSQL = "UPDATE `book` SET  `BookName` = '$bName' WHERE BookID ='$bid';";
    $objQuery = mysqli_query($con,$strSQL);
    $strSQL = "UPDATE `bookingstatus` SET `BookStatus` = '$bs' WHERE BookID ='$bid';";
    $objQuery = mysqli_query($con,$strSQL);
    header("location:bookdata.php");

?>