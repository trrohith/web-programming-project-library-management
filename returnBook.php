<?php
$uid = $_GET['uid'];
$bookUID = $_GET['bookUID'];
include("auth_session.php");
require('db.php');
$query = "UPDATE record SET returned=1, actual_return=CURRENT_TIMESTAMP WHERE uid = $uid";
$result = mysqli_query($con, $query);
$query = "UPDATE book SET book.left=book.left+1 WHERE uid=$bookUID";
$result = mysqli_query($con, $query);
header('Location: user.php');
exit;
?>