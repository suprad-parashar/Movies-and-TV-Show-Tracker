<!DOCTYPE html>
<html>
<head>
	<title>TV Show Database</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/edit_show.css">
	<script type="text/javascript" src="../js/popup.js"></script>
</head>
<body>
	<div id="details_show">
		<h3>Edit Details</h3>
		<form action="../php/show.php?id=<?php echo($_GET['id']) ?>" method="post" id="show_form">
			<input type="text" name="title" placeholder="Title" class="input_box" value="<?php echo $_GET['title']; ?>" required>
			<br>
			<textarea rows="4" cols="50" name="desc" placeholder="Description"><?php echo $_GET['desc']; ?></textarea>
			<br>
			<input type="text" name="seasons" placeholder="Number of Seasons" value="<?php echo $_GET['nos']; ?>" class="input_box" required>
			<br>
			<input type="text" name="episodes" placeholder="Number of Episodes" value="<?php echo $_GET['noe']; ?>" class="input_box" required>
			<br>
			Air Date: <input type="date" name="air_date" placeholder="Air Date" value="<?php echo $_GET['air']; ?>" class="input_box" required>
			<br>
			<input type="text" name="genre" placeholder="Genre" class="input_box" value="<?php echo $_GET['genre']; ?>" required>
			<br>
			<input type="text" name="lang" placeholder="Language" class="input_box" value="<?php echo $_GET['lang']; ?>" required>
			<br>
			<input type="text" name="channel" placeholder="Channel" class="input_box" value="<?php echo $_GET['channel']; ?>" required>
			<br>
			<input type="checkbox" name="status" id="status" onclick="statusCheck()" checked="<?php echo($_GET['status'] == 1); ?>"> Show Ended
			<br>
			<input type="date" name="end_date" placeholder="End Date" class="input_box" id="end_date" value="<?php echo $_GET['end']; ?>">
			<input type="submit" class="input_box" value="Save" name="update">
			<a href="admin_catalog.php"><input type="button" name="cancel" value="Cancel" class="input_box"></a>
		</form>
	</div>
	<div>
		<h3>Edit Actors</h3>
		<table>
			<tr>
				<th>Select</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Role</th>
			</tr>
			<?php
				$conn = new mysqli("localhost", "root", "", "tv_show");
				if ($conn -> connect_error)
				    die("Connection failed: " . $conn -> connect_error);
				else {
					$sql = "select * from actors order by first_name";
					$result = $conn -> query($sql);
					if ($result -> num_rows > 0) {
						while ($row = $result -> fetch_assoc()) {
							$sid = $_GET["id"];
							$aid = $row["id"];
							$sql1 = "select role from show_actors where show_id='$sid' and actor_id='$aid'";
							$res = $conn -> query($sql1);
							if ($role_row = $res -> fetch_assoc()) {
								$check = " checked";
								$role = $role_row["role"];
							} else {
								$check = "";
								$role = "";
							}

							echo "<tr><td>"."<input type='checkbox' form='show_form' name='".$row["id"]."_actor'".$check.">"."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>"."<input type='text' form='show_form' name='role_".$row["id"]."' value='$role'>"."</td></tr>";
						}
					}
				}
				$conn -> close();
			?>
		</table>
	</div>
	<div>
		<h3>Edit Creators</h3>
		<table>
			<tr>
				<th>Select</th>
				<th>First Name</th>
				<th>Last Name</th>
			</tr>
			<?php
				$conn = new mysqli("localhost", "root", "", "tv_show");
				if ($conn -> connect_error)
				    die("Connection failed: " . $conn -> connect_error);
				else {
					$sql = "select * from creators order by first_name";
					$result = $conn -> query($sql);
					if ($result -> num_rows > 0) {
						while ($row = $result -> fetch_assoc()) {
							$sid = $_GET["id"];
							$cid = $row["id"];
							$sql1 = "select count(*) as tot from show_creators where show_id='$sid' and creator_id='$cid'";
							$res = $conn -> query($sql1);
							$exists = $res -> fetch_assoc();
							if ($exists["tot"] == 1)
								$check = " checked";
							else
								$check = "";

							echo "<tr><td>"."<input type='checkbox' form='show_form' name='".$row["id"]."_creator'".$check.">"."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td></tr>";
						}
					}
				}
				$conn -> close();
			?>
		</table>
	</div>
</body>
</html>