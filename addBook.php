<?php
$uid = $_POST['uid'];
include("auth_session.php");
require('db.php');
$name = $_POST['name'];
$author = $_POST['author'];
$description = $_POST['description'];
$total = $_POST['total'];
$left = $_POST['left'];
$image_url = $_POST['image_url'];
$video_url = $_POST['video_url'];
$audio_url = $_POST['audio_url'];
if ($uid == 2) {
    $query = "INSERT INTO book(name, author, description, total, `left`, image_url, video_url, audio_url) VALUES('$name', '$author', '$description', '$total', '$left', '$image_url', '$video_url', '$audio_url');";
} else {
    $query = "UPDATE book SET name='$name', author='$author', description='$description', total='$total', book.left='$left', image_url='$image_url', video_url='$video_url', audio_url='$audio_url' WHERE uid='$uid'";
}
$result = mysqli_query($con, $query);
header('Location: librarian.php');
exit;
