<?php
if (!isset($_GET['uid'])) {
    echo "No book selected";
    exit;
}
$uid = $_GET['uid'];
//include auth_session.php file on all user panel pages
include("auth_session.php");
require('db.php');

$query = "SELECT * FROM book WHERE uid=$uid";
$result = mysqli_query($con, $query);
$rows = mysqli_num_rows($result);

if ($rows < 1) {
    echo "Invalid book selection";
    exit;
}
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $row['name'] ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <style>
        body {
            font-family: 'Varela Round', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        .intro {
            background-image: linear-gradient(red, #ed2939);
            margin-bottom: 5rem;
        }

        .title h3,
        h1,
        p {
            margin: 0.5rem;
            align-content: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .title h3 {
            margin-top: 9rem;
            text-emphasis: none;
            text-decoration: none;
        }

        .title h1 {
            font-size: 45px;
            font-weight: bolder;
        }

        .title button {
            margin-top: 1rem;
            padding: 0.5rem;
            font-size: 15px;
            background-color: white;
            border: 2px solid white;
            transition-duration: 0.4s;
            color: black;
            border-radius: 12px;
            margin-left: 33rem;
            margin-bottom: 7rem;
        }

        .title button:hover {
            background-image: linear-gradient(red, #ed2939);
        }

        .image img {
            margin-top: 7rem;
            margin-bottom: 7rem;
            margin-left: -10rem;
            height: 350px;
            width: 300px;
        }

        .desc {
            margin-bottom: 5rem;
        }

        .desc .novel-img img {
            height: 35rem;
            width: 27rem;
            margin-left: 10rem;
        }

        .desc .card {
            padding: 2rem;
            height: 20rem;
            z-index: 1;
            margin-top: 7rem;
            margin-right: -10rem;
            box-shadow: 5px 10px wheat;
        }

        .desc .card a,
        p {
            text-decoration: none;
            margin-top: 1rem;
            color: black;
        }

        .desc .card h1 {
            color: black;
            margin-top: 1rem;
            font-size: 40px;
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
    <div class="row intro">
        <div class="col title col-md-9">
            <h3>AUTHOR : <?php echo $row['author'] ?></h3>
            <h1><?php echo $row['name'] ?></h1>
            <p style="color: white"><?php echo $row['description'] ?></p>
        </div>
        <div class="col image col-md-3">
            <img src="./res/book.jpg" alt="novel">
        </div>
    </div>

    <div class="row container desc">
        <div class="col novel-img col-md-6">
            <img src="<?php echo $row['image_url'] ?>" alt="author">
        </div>
        <div class="col card col-md-6">
            <h1><?php echo $row['author'] ?></h1>
            <p><?php echo $row['description'] ?></p>
            <br><video width="320" height="240" controls>
                <source src="<?php echo $row['video_url'] ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <br><audio controls>
                <source src="<?php echo $row['audio_url'] ?>" type="audio/mpeg">
                Your browser does not support the audio tag.
            </audio>
        </div>
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


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


</body>

</html>