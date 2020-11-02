<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
require('db.php');
$newBook = false;
if (!isset($_GET['uid'])) {
	$newBook = true;
} else {
	$uid = $_GET['uid'];

	$query = "SELECT * FROM book WHERE uid=$uid";
	$result = mysqli_query($con, $query);
	$rows = mysqli_num_rows($result);

	if ($rows < 1) {
		echo "Invalid book selection";
		exit;
	}
	$row = mysqli_fetch_assoc($result);
}
$title = $newBook ? "New Book" : $row['name'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		body {
			font-family: 'Roboto', sans-serif;
		}

		.form-control {
			height: 40px;
			box-shadow: none;
			color: #969fa4;
		}

		.form-control:focus {
			border-color: #5cb85c;
		}

		.form-control,
		.btn {
			border-radius: 3px;
		}

		.signup-form {
			width: 400px;
			margin: 0 auto;
			padding: 30px 0;
		}

		.signup-form h2 {
			color: #636363;
			margin: 0 0 15px;
			position: relative;
			text-align: center;
		}

		.signup-form h2:before,
		.signup-form h2:after {
			content: "";
			height: 2px;
			width: 22%;
			background: #d4d4d4;
			position: absolute;
			top: 50%;
			z-index: 2;
		}

		.signup-form h2:before {
			left: 0;
		}

		.signup-form h2:after {
			right: 0;
		}

		.signup-form .hint-text {
			color: #999;
			margin-bottom: 30px;
			text-align: center;
		}

		.signup-form form {
			color: #999;
			border-radius: 3px;
			margin-bottom: 15px;
			background: #f2f3f7;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			padding: 30px;
		}

		.signup-form .form-group {
			margin-bottom: 20px;
		}

		.signup-form input[type="checkbox"] {
			margin-top: 3px;
		}

		.signup-form .btn {
			font-size: 16px;
			font-weight: bold;
			min-width: 140px;
			outline: none !important;
		}

		.signup-form .row div:first-child {
			padding-right: 10px;
		}

		.signup-form .row div:last-child {
			padding-left: 10px;
		}

		.signup-form a {
			text-decoration: underline;
		}

		.signup-form a:hover {
			text-decoration: none;
		}

		.signup-form form a {
			color: #5cb85c;
			text-decoration: none;
		}

		.signup-form form a:hover {
			text-decoration: underline;
		}

		.nav-bar {
			background-color: black;
			padding: 1rem;
		}

		.nav-bar ul {
			list-style: none;
		}

		.nav-bar ul a {
			color: blanchedalmond;
			padding-left: 1rem;
			font-weight: bolder;
			font-size: 30px;
			text-decoration: none;
			display: inline;
		}

		footer {
			background-color: black;
			padding: 1rem;
		}

		footer h1,
		li,
		hr {
			color: blanchedalmond;
		}

		footer ul {
			list-style: none;
		}

		footer ul li {
			padding-top: 5px;
		}

		footer .heading h1 {
			color: #98817b;
			font-weight: bold;
			padding-left: 0.5rem;
		}

		footer hr {
			border: 1px solid blanchedalmond;
			width: 80%;
			align-content: center;
		}

		footer .copyright {
			color: blanchedalmond;
			text-align: center;
		}

		footer .copyright span {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}
	</style>
</head>

<body>


	<div class="nav-bar">

		<?php
		if ($_SESSION['role'] == 'user') {
			// Redirect to user dashboard page
		?>

			<ul>
				<a href="user.php">HOME</a>
				<a href="reserve.php">RESERVE A BOOK</a>
				<a href='logout.php'>Logout</a>
			</ul>
		<?php
		} else {
			// Redirect to Librarian dashboard page
		?>
			<ul>
				<a href="librarian.php">HOME</a>
				<a href="viewlist.php">BOOK LIST</a>
				<a href='logout.php'>Logout</a>
			</ul>
		<?php
		} ?>
	</div>
	<div class="signup-form">
		<form action="/examples/actions/confirmation.php" method="post">
			<h2>Book Details</h2>
			<div class="form-group">
				<div class="row">
					<div class="col-xs-6"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
					<div class="col-xs-6"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
				</div>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="author" placeholder="Author" required="required">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="description" placeholder="Description" required="required">
			</div>
			<div class="form-group">
				<input type="number" class="form-control" name="total" placeholder="Total Number Of Copies" required="required">
			</div>
			<div class="form-group">
				<input type="number" class="form-control" name="total" placeholder="Number Of Copies Left" required="required">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="image_url" placeholder="Image URL" required="required">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="video_url" placeholder="Video URL" required="required">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="audio_url" placeholder="Audio URL" required="required">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success btn-lg btn-block">Confirm Details</button>
			</div>
		</form>
	</div>
	<footer>

		<div class="row">

			<div class="col heading">
				<h1 style="font-size: 29px;">Library Management System</span></h1>
			</div>
			<div class="col rohith">
				<ul>
					<li>T.R. Rohith - Team Coordinater</li>
					<li><i class="fa fa-phone-square" aria-hidden="true"></i><span style="padding-left: 10px;">9880522172</span></li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><span style="padding-left: 10px;">tt1878@srmist.edu.in</span></li>
				</ul>
			</div>
			<div class="col siri">
				<ul>
					<li>Epsisri Potluri</li>
					<li><i class="fa fa-phone-square" aria-hidden="true"></i><span style="padding-left: 10px;">9347465324</span></li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><span style="padding-left: 10px;">ej2945@srmist.edu.in</span></li>
				</ul>
			</div>
			<div class="col rohith">
				<ul>
					<li style="margin-left: -0.5rem;">Janaswamy Samyukta</li>
					<li style="margin-left: -0.5rem;"><i class="fa fa-phone-square" aria-hidden="true"></i><span style="padding-left: 10px;">7358404806</span></li>
					<li style="margin-left: -0.5rem;"><i class="fa fa-envelope" aria-hidden="true"></i><span style="padding-left: 10px;">jj2787@srmist.edu.in</span></li>
				</ul>
			</div>

		</div>

		<hr>

		<div class="copyright">
			<i class="fa fa-copyright" aria-hidden="true"><span>Copyright.All rights reserved.</span></i>
		</div>

	</footer>


</body>

</html>