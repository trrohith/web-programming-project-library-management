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
    <title>List of Books taken</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #404E67;
            background: #F5F7FA;
            font-family: 'Open Sans', sans-serif;
        }

        .table-wrapper {
            width: 700px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }

        .table-title h2 {
            margin: 6px 0 0;
            font-size: 22px;
        }

        .table-title .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
        }

        .table-title .add-new i {
            margin-right: 4px;
        }

        table.table {
            table-layout: fixed;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table th:last-child {
            width: 100px;
        }

        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }

        table.table td a.add {
            color: #27C46B;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }

        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }

        table.table .form-control.error {
            border-color: #f50000;
        }

        table.table td .add {
            display: none;
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
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            var actions = $("table td:last-child").html();
            // Append table with add row form on add new button click
            $(".add-new").click(function () {
                window.location.href = "viewlist.php"
            });
        });
    </script>
</head>

<body>

    <div class="nav-bar">

        <ul>
            <u><a href="#">HOME</a></u>
            <a href="viewlist.php">BOOK LIST</a>
        </ul>

    </div>



    <div class="container-lg">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Book <b>Details</b></h2>
                        </div>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Manage
                                Collection of Books</button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Taken By</th>
                            <th>Taken On</th>
                            <th>Return By</th>
                            <th>Returned</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                $query = "SELECT book.name, user.name AS username, record.take_time, record.return_time, record.returned FROM record LEFT JOIN book ON book_uid=record.book_uid LEFT JOIN user ON record.user_uid = user.uid WHERE record.user_uid='" . $_SESSION['uid'] . "'";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['username']."</td>";
                    echo "<td>".$row['take_time']."</td>";
                    echo "<td>".$row['return_time']."</td>";
                    echo "<td>";
                    if($row['returned']==0){
                        echo "FALSE";
                    }
                    else{
                        echo "TRUE";
                    }
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
                    <li><i class="fa fa-phone-square" aria-hidden="true"></i><span
                            style="padding-left: 10px;">9880522172</span></li>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i><span
                            style="padding-left: 10px;">tt1878@srmist.edu.in</span></li>
                </ul>
            </div>
            <div class="col siri">
                <ul>
                    <li>Epsisri Potluri</li>
                    <li><i class="fa fa-phone-square" aria-hidden="true"></i><span
                            style="padding-left: 10px;">9347465324</span></li>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i><span
                            style="padding-left: 10px;">ej2945@srmist.edu.in</span></li>
                </ul>
            </div>
            <div class="col rohith">
                <ul>
                    <li style="margin-left: -0.5rem;">Janaswamy Samyukta</li>
                    <li style="margin-left: -0.5rem;"><i class="fa fa-phone-square" aria-hidden="true"></i><span
                            style="padding-left: 10px;">7358404806</span></li>
                    <li style="margin-left: -0.5rem;"><i class="fa fa-envelope" aria-hidden="true"></i><span
                            style="padding-left: 10px;">jj2787@srmist.edu.in</span></li>
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