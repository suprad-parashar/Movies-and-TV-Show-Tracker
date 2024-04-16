<!DOCTYPE html>
<html>
<head>
	<title>Show Details</title>
	<link rel="stylesheet" type="text/css" href="../css/details.css">
</head>
<body>
	<?php
		$conn = new mysqli("localhost", "root", "", "tv_show");
		if ($conn -> connect_error)
			die("Connection failed: " . $conn -> connect_error);
		$sql = "select * from shows where id='".$_GET['id']."'";
		$result = $conn -> query($sql);
		$row = $result -> fetch_assoc();
		$sql = "select a.first_name, a.last_name, sa.role from actors a, show_actors sa, shows s where s.id='".$_GET['id']."' and sa.show_id = s.id and sa.actor_id=a.id";
		$result2 = $conn -> query($sql);
		$sql = "select c.first_name, c.last_name from creators c, show_creators sc, shows s where s.id='".$_GET['id']."' and sc.show_id = s.id and sc.creator_id=c.id";
		$result3 = $conn -> query($sql);
	?>
	<div id="details">
		<h1><?php echo $row["title"]; ?></h1>
		<p><?php echo $row["synopsis"]; ?></p>
		<table>
			<tr>
				<th>Type</th>
				<th>Value</th>
			</tr>
			<tr>
				<td>Number of Seasons</td>
				<td><?php echo $row['seasons']?></td>
			</tr>
			<tr>
				<td>Number of Episodes</td>
				<td><?php echo $row['episodes']; ?></td>
			</tr>
			<tr>
				<td>Aired On</td>
				<td><?php echo $row['air_date']; ?></td>
			</tr>
			<tr>
				<td>Genre</td>
				<td><?php echo $row['genre']; ?></td>
			</tr>
			<tr>
				<td>Language</td>
				<td><?php echo $row['lang']; ?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><?php 
					if ($row["status"] == 1)
						echo "Ended on ".$row['end_date'];
					else
						echo "Still Running";
				?></td>
			</tr>
			<tr>
				<td>Watch on</td>
				<td><?php echo $row['channel']; ?></td>
			</tr>
		</table>
		<h3>Created By - </h3>
		<ul>
			<?php
				while ($row3 = $result3 -> fetch_assoc())
					echo "<li>".$row3["first_name"]." ".$row3["last_name"]."</li>";
			?>
		</ul>
		<a href="home.php?user=<?php echo $_GET['user'] ?>"><button style="margin: 10px;">Go Back</button></a>
	</div>
	<div id="cast">
	<h3>Cast - </h3>
		<table>
			<tr>
				<th>Name</th>
				<th>Role</th>
			</tr>
			<?php 
				while ($row2 = $result2 -> fetch_assoc())
					echo "<tr><td>".$row2["first_name"]." ".$row2["last_name"]."</td><td>".$row2["role"]."</td></tr>";
			?>
		</table>
	</div>
</body>
</html>