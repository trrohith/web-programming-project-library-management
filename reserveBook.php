<?php
$uid = $_GET['uid'];
include("auth_session.php");
require('db.php');
$query = "INSERT INTO record(book_uid, user_uid, return_time) VALUES($uid, " . $_SESSION['uid'] . ", NOW() + INTERVAL 1 DAY);";
$result = mysqli_query($con, $query);
$query = "UPDATE book SET book.left=book.left-1 WHERE uid=$uid";
$result = mysqli_query($con, $query);
header('Location: user.php');
exit;
?>