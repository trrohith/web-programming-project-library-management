<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	<title>Sign Up</title>
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
			width: 30%;
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
	</style>
</head>

<body>
	<?php
	require('db.php');
	// When form submitted, insert values into the database.
	if (isset($_REQUEST['email'])) {
		// removes backslashes
		$name = stripslashes($_REQUEST['first_name'] . " " . $_REQUEST['last_name']);
		//escapes special characters in a string
		$name = mysqli_real_escape_string($con, $name);
		$email    = stripslashes($_REQUEST['email']);
		$email    = mysqli_real_escape_string($con, $email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con, $password);
		$query    = "INSERT into `user` (name, password, username)
					 VALUES ('$name', '" . md5($password) . "', '$email')";
		$check_email = mysqli_query($con, "SELECT username FROM user where username = '$email'");
		if (mysqli_num_rows($check_email) > 0) {
			echo "<div class='signup-form'><h3>Email already registered.</h3></div>";
		} else {
			if ($password == $_REQUEST['confirm_password']) {
				$result   = mysqli_query($con, $query);
				if ($result) {
					echo "<div class='signup-form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
				} else {
					echo "<div class='signup-form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
				}
			} else {
				echo "<div class='signup-form'><h3>Password and confirm password do not match, please try again.</h3></div>";
			}
		}
	}
	?>
	<div class="signup-form">
		<form action="" method="post">
			<h2>Sign Up</h2>
			<p class="hint-text">Create your account. It's free and only takes a minute!</p>
			<div class="form-group">
				<div class="row">
					<div class="col-xs-6"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
					<div class="col-xs-6"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
				</div>
			</div>
			<div class="form-group">
				<input type="email" class="form-control" name="email" placeholder="Email" required="required">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="password" placeholder="Password" required="required">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success btn-lg btn-block">Sign Up</button>
			</div>
		</form>
		<div class="text-center">Already have an account? <a href="login.php">Sign in</a></div>
		<div class="text-center"><a href="reset_password.php" class="float-right">Forgot Password?</a></div>
	</div>
</body>

</html>