<?php
	session_start();
	include("db.php");
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];

	$strSQL = "INSERT INTO `user`(`username`, `email`, `password`) VALUES ('$username','$email','$password')";
	$objQuery = mysqli_query($con,$strSQL);
	if($objQuery)
	{
		$strSQL = "INSERT INTO `userinfo`(`username`,`email`,`userType`) VALUES ('$username','$email','user')";
		mysqli_query($con,$strSQL);
        echo "<script> alert('Register successful');</script>";
		echo "<script> window.location='index.php';</script>";
	}
	else
	{
		echo "<script> alert('Register failed')</script>";
        echo "<script> window.location='register.php';</script>";
	}
    mysqli_close($con);
?>