<?php
    session_start();
    include("../db.php");
    $username = $_GET['username'];
    $check = "SELECT * FROM `userinfo` WHERE username = '$username'";
    $objQuery = mysqli_query($con,$check);
	$objResult = mysqli_fetch_array($objQuery);
    $_SESSION['userType'] = $objResult['userType'];
    if($_SESSION['userType'] == "user"){
    $strSQL = "UPDATE `userinfo` SET  `userType` = 'disable' WHERE username ='$username';";
    $objQuery = mysqli_query($con,$strSQL);
    header("location:userAdj.php");
    }else{
        $strSQL = "UPDATE `userinfo` SET  `userType` = 'user' WHERE username ='$username';";
    $objQuery = mysqli_query($con,$strSQL);
    header("location:userAdj.php");
    }
