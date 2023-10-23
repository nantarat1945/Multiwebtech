<?php
	session_start();
	include("db.php");
	$strSQL = "SELECT * FROM `user` WHERE username = '".mysqli_real_escape_string($con,$_POST['username'])."' 
	and Password = '".mysqli_real_escape_string($con,$_POST['password'])."'";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	$checkLevel = "SELECT * FROM `userinfo` WHERE username ='".mysqli_real_escape_string($con,$_POST['username'])."'";
	$row = mysqli_query($con,$checkLevel);
	if($objResult)
	{
		$c = mysqli_fetch_array($row);
		$_SESSION['username'] = $objResult['username'];
		$_SESSION['userType'] = $c['userType'];
		if ($_SESSION['userType'] == 'user'){
			header("Location:main/mainScreen.php");
		}
		else if($_SESSION['userType'] == 'admin'){
			header("Location:Admin/admin.php");
		}else{
			echo "<script>alert('User has been deleted')</script>";
		echo "<script> window.location='index.php';</script>";
		}
	}
	else
	{
		echo "<script>alert('Username or Password incorrect')</script>";
		echo "<script> window.location='index.php';</script>";
	}
    mysqli_close($con);
?>