<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
require('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Book Management</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 15px;
            background: #299be4;
            color: #fff;
            padding: 16px 30px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .table-title .btn {
            color: #566787;
            float: right;
            font-size: 13px;
            background: #fff;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-title .btn:hover,
        .table-title .btn:focus {
            color: #566787;
            background: #f2f2f2;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 100px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
        }

        table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.settings {
            color: #2196F3;
        }

        table.table td a.delete {
            color: #F44336;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        .status {
            font-size: 30px;
            margin: 2px 2px 0 0;
            display: inline-block;
            vertical-align: middle;
            line-height: 10px;
        }

        .text-success {
            color: #10c469;
        }

        .text-info {
            color: #62c9e8;
        }

        .text-warning {
            color: #FFC107;
        }

        .text-danger {
            color: #ff5b5b;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a,
        .pagination li.active a.page-link {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
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

        .nav-bar {
            background-color: black;
            padding: 1rem;
        }

        .nav-bar ul a {
            color: blanchedalmond;
            padding-left: 1rem;
            font-weight: bolder;
            font-size: 30px;
            display: inline;
            text-decoration: none;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>

    <div class="nav-bar">

        <ul>
            <a href="librarian.php">HOME</a>
            <u><a href="#">BOOK LIST</a></u>
            <a href='logout.php'>Logout</a>
        </ul>

    </div>


    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>Book <b>Management</b></h2>
                        </div>
                        <div class="col-sm-7">
                            <a href="./edit_book.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New
                                    Book</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Date Created</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM book WHERE 1";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $copies = $row['left'];
                            echo "<tr data-status=\"";
                            if ($copies > 9) {
                                echo "active";
                            } elseif ($copies > 0) {
                                echo "inactive";
                            } else {
                                echo "expired";
                            }
                            echo "\">";
                            echo "<td>" . $row['uid'] . "</td>";
                            echo "<td><a href='book_details.php?uid=" . $row['uid'] . "'>" . $row['name'] . "</a></td>";
                            echo "<td>" . $row['create_time'] . "</td>";
                            echo "<td>" . $row['author'] . "</td>";
                            echo "<td><span class=\"status text-";
                            if ($copies > 9) {
                                echo "success\">&bull;</span>" . $copies . " copies left";
                            } elseif ($copies > 0) {
                                echo "warning\">&bull;</span>" . $copies . " copies left";
                            } else {
                                echo "danger\">&bull;</span>All copies taken";
                            }
                            echo "</span></td>";
                            echo "<td>";
                            echo "<a href='edit_book.php?uid=" . $row['uid'] . "'  class=\"settings\" title=\"Settings\" data-toggle=\"tooltip\"><i class=\"material-icons\">border_color</i></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
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