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
		<form action="../php/admin_login.php" method="post" id="login_panel">
			<h1 style="color: orange;">Admin Login</h1>
			<input type="text" name="username" class="text_fields" placeholder="Username" required>
			<br>
			<input type="password" name="password" class="text_fields" placeholder="Password" required>
			<br>
			<input type="submit" name="login" value="Login">
			<a href="login.php"><input type="button" name="user_login" value="Go Back"></a>
		</form>
		<br>
		<br>
		<?php
			if (!isset($_GET["exit"]))
				exit();
			else {
				$exit_status = $_GET["exit"];
				if ($exit_status == "invalid") {
					echo "<center><span style='color: #FFFFFF; background-color: #FF0000;'>Username and Passwords do not match!</span></center>";
					exit();
				}
			}
		?>
	</div>
</body>
</html>