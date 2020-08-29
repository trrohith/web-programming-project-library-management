<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
require('db.php');
$query = "SELECT * FROM `user` WHERE username='" . $_SESSION['username'] . "'";
$result = mysqli_query($con, $query);
echo json_encode(mysqli_fetch_row($result));
echo "<br><a href='logout.php'>Logout</a>";
?>