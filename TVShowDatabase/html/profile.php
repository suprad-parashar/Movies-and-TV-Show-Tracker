<!DOCTYPE html>
<html>
<head>
	<title>TV Show Database</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/navigation.css">
</head>
<body>
	<?php
		$conn = new mysqli("localhost", "root", "", "tv_show");
		if ($conn -> connect_error)
	    	die("Connection failed: " . $conn -> connect_error);
	    $user = $_GET["user"];
	    $sql = "select * from users where username='$user'";
	    $result = $conn -> query($sql);
	    $row = $result -> fetch_assoc();
	    $fname = $row["first_name"];
	    $lname = $row["last_name"];
	    $gender = $row["gender"];
	    $email = $row["email"];
	    $pass = $row["password"];
	    $country = $row["country"];
	    $dob = $row["dob"];
	?>
	<script type="text/javascript" src="../js/navigation.js"></script>
	<div id="mySidenav" class="sidenav">
	  <a href="home.php?user=<?php echo $_GET['user'] ?>">Dashboard</a>
	  <a href="catalog.php?user=<?php echo $_GET['user'] ?>">Catalog</a>
	  <a href="profile.php?user=<?php echo $_GET['user'] ?>" class="active">Profile</a>
	  <a href="login.php">Logout</a>
	</div>

	<div id="main">
		<h1><?php echo "$fname $lname"; ?></h1>
		<p>Gender - <?php
			if ($gender == 0)
				echo "Male";
			elseif ($gender == 1)
				echo "Female";
			else
				echo "Others";
		?></p>
		<p>Email - <?php echo $email ?></p>
		<p>Country - <?php echo $country ?></p>
		<p>Date of Birth - <?php echo $dob ?></p>
		<a href="edit_profile.php?user=<?php echo $_GET['user'] ?>"><button>Edit Profile</button></a>
		<a href="password.php?user=<?php echo $_GET['user'] ?>"><button>Change Password</button></a>
	</div>
</body>
</html>