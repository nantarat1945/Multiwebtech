<?php
    session_start();
    include("../db.php");
    $key = $_GET["BookID"];
    $strSQL = "DELETE from `book` where BookID ='$key'";
    $objQuery = mysqli_query($con,$strSQL);
    $strSQL = "DELETE from `bookingstatus` where BookID ='$key'";
    $objQuery = mysqli_query($con,$strSQL);
    header("location:bookdata.php");

?>