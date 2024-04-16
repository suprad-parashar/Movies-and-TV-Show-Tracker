<?php
    $conn = new mysqli("localhost", "root", "", "tv_show");
    if ($conn -> connect_error)
	    die("Connection failed: " . $conn -> connect_error);
    if (isset($_POST["stop"])) {
        $user = $_POST["user"];
        $sid = $_POST["id"];
        $sql = "update user_watchlist set status=2 where username='$user' and show_id='$sid'";
        $conn -> query($sql);
        header("Location: ../html/home.php?user=$user");
    } elseif (isset($_POST["remove"])) {
        $user = $_POST["user"];
        $sid = $_POST["id"];
        $sql = "delete from user_watchlist where username='$user' and show_id='$sid'";
        $conn -> query($sql);
        header("Location: ../html/home.php?user=$user");
    } elseif (isset($_POST["start"])) {
        $user = $_POST["user"];
        $sid = $_POST["id"];
        $sql = "update user_watchlist set status=1 where username='$user' and show_id='$sid'";
        $conn -> query($sql);
        header("Location: ../html/home.php?user=$user");
    } else {
        $user = $_POST["user"];
        $sid = $_POST["id"];
        $rating = $_POST["rating"];
        $sql = "update user_watchlist set rating='$rating' where username='$user' and show_id='$sid'";
        $conn -> query($sql);
        header("Location: ../html/home.php?user=$user&status=editSuccess");
    }
    $conn -> close();
?>