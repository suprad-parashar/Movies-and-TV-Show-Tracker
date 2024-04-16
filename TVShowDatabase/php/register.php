<?php
	$conn = new mysqli("localhost", "root", "", "tv_show");
	if ($conn -> connect_error) {
	    die("Connection failed: " . $conn -> connect_error);
	} else {
		$flag = true;
		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$gender = $_POST["gender"];
		$email = $_POST["email"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$country = $_POST["country"];
		$date = $_POST["date_of_birth"];

		if (!is_valid("email", $email)) {
			header("Location: ../html/register.php?exit=email");
			exit();
		}

		if (!is_valid("username", $username)) {
			header("Location: ../html/register.php?exit=user");
			exit();
		}

		if ($flag) {
			$sql = "insert into users values ('$first_name', '$last_name', '$gender', '$email', '$username', '$password', '$country', '$date', 0)";
			if ($conn -> query($sql) === true) {
				header("Location: ../html/login.php?exit=success");
			} else {
					die(mysqli_error($conn));
				header("Location: ../html/login.php?exit=error");
			}
		}
	}
	function is_valid($type, $value) {
		$check_query = "select count(*) as tot from users where $type='$value'";
		$result = $GLOBALS["conn"] -> query($check_query);
		$count = $result -> fetch_assoc();
		if ($count["tot"] == 0)
			return true;
		else
			return false;
	}
	$conn -> close();
?>