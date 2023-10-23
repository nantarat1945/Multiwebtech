<?php session_start();
if($_SESSION){
header("main/mainScreen.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<!--Made with love by Mutiullah Samim -->
		<!--Bootsrap 4 CDN-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<!--Fontawesome CDN-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<!--Custom styles-->
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" href="css/style2.css">
	</head>
	<body>
        <form method="post" action="checkup.php">
		<div class="container">
			<div class="d-flex justify-content-center h-100">
				<div class="card">
					<div class="card-header">
						<span class="glyphicon glyphicon-lock"> </span>
						<h3>Login</h3>
					</div>
					<div class="card-body">
						<form ame="formlogin" action="chklogin.php" method="POST" id="login" class="form-horizontal">
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								</div>
								<input type="text" name="username" id="username" class="form-control" required placeholder="username">
								
							</div>
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="password" name="password" id="password" class="form-control" required placeholder="password">
							</div>
							<div class="form-group">
								
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="register.php"><input type="button" value="สมัครสมาชิก" class="btn float-left login_btn2"></a>
								<input type="submit" value="เข้าสู่ระบบ" class="btn float-Right login_btn">
							</div>
							
						</form>
					</div>
					
				</div>
			</div>
		</div>
        </form>
	</body>
</html>
