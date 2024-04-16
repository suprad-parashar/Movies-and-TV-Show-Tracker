<!DOCTYPE html>
<html>
<head>
	<title>TV Show Database</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/navigation.css">
	<link rel="stylesheet" type="text/css" href="../css/admin_catalog.css">
	<link rel="stylesheet" type="text/css" href="../css/popup_box.css">
	<script type="text/javascript" src="../js/popup.js"></script>
</head>
<body>
	<script type="text/javascript" src="../js/popup.js"></script>
	<script type="text/javascript" src="../js/navigation.js"></script>
	<div id="mySidenav" class="sidenav">
	  <a href="admin_home.php">Users</a>
	  <a href="admin_catalog.php" class="active">Catalog</a>
	  <a href="login.php">Logout</a>
	</div>

	<div id="main">
		<button class="button" onclick='openPopup("show_add_box")'>TV Shows</button>
		<div id="show_add_box" class="popup">
			<span class="close" onclick='closePopup("show_add_box")'>&times;</span>
			<div id="details_show" class="w3-modal-content w3-animate-zoom">
				<h3>Add Details</h3>
				<form action="../php/show.php" method="post" id="show_form">
					<input type="text" name="title" placeholder="Title" class="input_box" required>
					<br>
					<textarea rows="4" cols="50" name="desc" placeholder="Description"></textarea>
					<br>
					<input type="text" name="seasons" placeholder="Number of Seasons" class="input_box" required>
					<br>
					<input type="text" name="episodes" placeholder="Number of Episodes" class="input_box" required>
					<br>
					Air Date: <input type="date" name="air_date" placeholder="Air Date" class="input_box" required>
					<br>
					<input type="text" name="genre" placeholder="Genre" class="input_box" required>
					<br>
					<input type="text" name="lang" placeholder="Language" class="input_box" required>
					<br>
					<input type="text" name="channel" placeholder="Channel" class="input_box" required>
					<br>
					<input type="checkbox" name="status" id="status" onclick="statusCheck()"> Show Ended
					<br>
					<input type="date" name="end_date" placeholder="End Date" class="input_box" id="end_date">
					<input type="submit" class="input_box" value="Save">
				</form>
			</div>
			<div class="w3-modal-content w3-animate-zoom">
				<h3>Add Actors</h3>
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
									echo "<tr><td>"."<input type='checkbox' form='show_form' name='".$row["id"]."_actor'>"."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>"."<input type='text' form='show_form' name='role_".$row["id"]."'>"."</td></tr>";
								}
							}
						}
						$conn -> close();
					?>
				</table>
			</div>
			<div class="w3-modal-content w3-animate-zoom">
				<h3>Add Creators</h3>
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
									echo "<tr><td>"."<input type='checkbox' form='show_form' name='".$row["id"]."_creator'>"."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td></tr>";
								}
							}
						}
						$conn -> close();
					?>
				</table>
			</div>
		</div>
		<button class="button" onclick='openPopup("creator_add_box")'>Creators</button>
		<div id="creator_add_box" class="popup">
			<span class="close" onclick='closePopup("creator_add_box")'>&times;</span>
			<h1>Add Creator</h1>
			<form action="../php/creator.php" method="post">
				<input type="text" name="creator_first_name" class="input_box" placeholder="First Name" required>
				<input type="text" name="creator_last_name" class="input_box" placeholder="Last Name" required>
				<input type="submit" class="input_box" value="Save">
			</form>
			<table>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Remove</th>
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
								echo "<tr><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td><form action='../php/creator.php' method='post'><input type='hidden' name='id' value='".$row["id"]."'><input type='submit' name='remove' value='Delete Creator'></form></td></tr>";
							}
						}
					}
					$conn -> close();
				?>
			</table>
		</div>
		<button class="button" onclick='openPopup("actor_add_box")'>Actors</button>
		<div id="actor_add_box" class="popup">
			<span class="close" onclick='closePopup("actor_add_box")'>&times;</span>
			<h1>Add Actor</h1>
			<form action="../php/actor.php" method="post">
				<input type="text" name="actor_first_name" class="input_box" placeholder="First Name" required>
				<input type="text" name="actor_last_name" class="input_box" placeholder="Last Name" required>
				<input type="submit" class="input_box" value="Save">
			</form>
			<table>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Remove</th>
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
								echo "<tr><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td><form action='../php/actor.php' method='post'><input type='hidden' name='id' value='".$row["id"]."'><input type='submit' name='remove' value='Delete Actor'></form></td></tr>";
							}
						}
					}
					$conn -> close();
				?>
			</table>
		</div>
		<table id="shows_list">
			<tr>
				<th>Title</th>
				<th>Seasons</th>
				<th>Episodes</th>
				<th>Genre</th>
				<th>Language</th>
				<th>Air Channel</th>
				<th>Status</th>
				<th>Options</th>
			</tr>
			<?php
				$conn = new mysqli("localhost", "root", "", "tv_show");
				if ($conn -> connect_error)
				    die("Connection failed: " . $conn -> connect_error);
				else {
					$sql = "select * from shows order by title";
					$result = $conn -> query($sql);
					if ($result -> num_rows > 0) {
						while ($row = $result -> fetch_assoc()) {
							$status = "";
							if ($row["status"] == 0) {
								$status = "Running";
								echo "<tr><td>"."<a href='../php/get_show_details.php?id=".$row["id"]."'>".$row["title"]."</a>"."</td><td>".$row["seasons"]."</td><td>".$row["episodes"]."</td><td>".$row["genre"]."</td><td>".$row["lang"]."</td><td>".$row["channel"]."</td><td>".$status."</td><td><form action='../php/show.php' method='post'><input type='hidden' name='id' value='".$row["id"]."'><input type='submit' name='end' value='End Show'><input type='submit' name='remove' value='Remove Show'></form></td></tr>";
							}
							else {
								$status = "Ended";
								echo "<tr><td>"."<a href='../php/get_show_details.php?id=".$row["id"]."'>".$row["title"]."</a>"."</td><td>".$row["seasons"]."</td><td>".$row["episodes"]."</td><td>".$row["genre"]."</td><td>".$row["lang"]."</td><td>".$row["channel"]."</td><td>".$status."</td><td><form action='../php/show.php' method='post'><input type='hidden' name='id' value='".$row["id"]."'><input type='submit' name='remove' value='Remove Show'></form></td></tr>";
							}
						}
					}
				}
				$conn -> close();
			?>
		</table>
	</div>
</body>
</html>