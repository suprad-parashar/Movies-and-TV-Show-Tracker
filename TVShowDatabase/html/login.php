<!DOCTYPE html>
<html>
<head>
	<title>TV Show Database</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
	<div id="main_div">
		<a href="#"><img src="../res/tv_logo.jpg" alt="TV Show Database Logo"></a>
		<form action="../php/login.php" method="post" id="login_panel">
			<a href="admin_login.php">Login as Admin</a>
			<br>
			<input type="text" name="username" class="text_fields" placeholder="Username" value=
			"<?php
				if(isset($_GET['user']))
					echo $_GET['user']; 
			?>" required>
			<br>
			<input type="password" name="password" class="text_fields" placeholder="Password" required>
			<br>
			<input type="submit" name="login" value="Login">
			<br>
			<br>
			<a href="register.php">New Here? Sign up</a>
		</form>
		<br>
		<br>
		<?php
			if (!isset($_GET["exit"]))
				exit();
			else {
				$exit_status = $_GET["exit"];
				if ($exit_status == "success") {
					echo "<center><span style='color: #FFFFFF; background-color: #00FF00;'>Profile Created Succesfully!</span></center>";
					exit();
				} elseif ($exit_status == "error") {
					echo "<center><span style='color: #FFFFFF; background-color: #FF0000;'>An error occured during registration</span></center>";
					exit();
				} elseif ($exit_status == "invalid") {
					echo "<center><span style='color: #FFFFFF; background-color: #FF0000;'>Username and Passwords do not match!</span></center>";
					exit();
				}
			}
		?>
	</div>
</body>
</html>