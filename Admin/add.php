<?php
    session_start();
    include("../db.php");
    $bName = mysqli_real_escape_string($con,$_POST['bn']);
    $bid = mysqli_real_escape_string($con,$_POST['bid']);



    $strSQL = "INSERT INTO `book`(`BookID`, `BookName`) VALUES ('$bid','$bName');";
    $objQuery = mysqli_query($con,$strSQL);
    $strSQL = "INSERT INTO `bookingstatus`(`username`, `BookID`, `BookStatus`) VALUES ('','$bid','Available')";
    $objQuery = mysqli_query($con,$strSQL);
    header("location:bookdata.php");

?>