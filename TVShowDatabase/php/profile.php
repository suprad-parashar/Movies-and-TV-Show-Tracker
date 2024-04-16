<?php
	$conn = new mysqli("localhost", "root", "", "tv_show");
	if ($conn -> connect_error)
		die("Connection failed: " . $conn -> connect_error);
	$user = $_POST["user"];
	if (isset($_POST["save_details"])) {
		$fname = $_POST["first_name"];
		$lname = $_POST["last_name"];
		$gender = $_POST["gender"];
		$email = $_POST["email"];
		$country = $_POST["country"];
		$dob = $_POST["dob"];

		$check_query = "select email from users where username='$user'";
		$result = $conn -> query($check_query);
		$row = $result -> fetch_assoc();
		$act_email = $row["email"];
		if ($act_email != $email) {
			$check_query = "select count(*) as tot from users where email='$email'";
			$result = $conn -> query($check_query);
			$count = $result -> fetch_assoc();
			if ($count["tot"] != 0) {
				header("Location: ../html/edit_profile.php?user=$user&exit=email");
				exit();
			}
		}	

		$sql = "update users set first_name='$fname', last_name='$lname', gender='$gender', email='$email', country='$country', dob='$dob' where username='$user'";
		$conn -> query($sql);
	} elseif (isset($_POST["save_password"])) {
		$old = $_POST["old_pass"];
		$new = $_POST["new_pass"];
		$sql = "select password from users where username='$user'";
	    $result = $conn -> query($sql);
	    $row = $result -> fetch_assoc();
	    $password = $row["password"];
	    if ($old != $password) {
	    	header("Location: ../html/password.php?user=$user&exit=incorrect");
	    	exit();
	    }
	    $sql = "update users set password='$new' where username='$user'";
	    $conn -> query($sql);
	}
	header("Location: ../html/profile.php?user=$user");
	$conn -> close();
?>