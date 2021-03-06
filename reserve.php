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
    <title>Reserve a book</title>
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
        }

        .modal-confirm {
            color: #636363;
            width: 325px;
            font-size: 14px;
        }

        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
        }

        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }

        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -15px;
        }

        .modal-confirm .form-control,
        .modal-confirm .btn {
            min-height: 40px;
            border-radius: 3px;
        }

        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -5px;
        }

        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
        }

        .modal-confirm .icon-box {
            color: #fff;
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: -70px;
            width: 95px;
            height: 95px;
            border-radius: 50%;
            z-index: 9;
            background: #82ce34;
            padding: 15px;
            text-align: center;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        }

        .modal-confirm .icon-box i {
            font-size: 58px;
            position: relative;
            top: 3px;
        }

        .modal-confirm.modal-dialog {
            margin-top: 80px;
        }

        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #82ce34;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            border: none;
        }

        .modal-confirm .btn:hover,
        .modal-confirm .btn:focus {
            background: #6fb32b;
            outline: none;
        }

        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }

        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Roboto', sans-serif;
        }

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            width: 850px;
            background: #fff;
            margin: 0 auto;
            padding: 20px 30px 5px;
            box-shadow: 0 0 1px 0 rgba(0, 0, 0, .25);
        }

        .table-title .btn-group {
            float: right;
        }

        .table-title .btn {
            min-width: 50px;
            border-radius: 2px;
            border: none;
            padding: 6px 12px;
            font-size: 95%;
            outline: none !important;
            height: 30px;
        }

        .table-title {
            min-width: 100%;
            border-bottom: 1px solid #e9e9e9;
            padding-bottom: 15px;
            margin-bottom: 5px;
            background: rgb(0, 50, 74);
            margin: -20px -31px 10px;
            padding: 15px 30px;
            color: #fff;
        }

        .table-title h2 {
            margin: 2px 0 0;
            font-size: 24px;
        }

        table.table {
            min-width: 100%;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 40px;
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

        table.table td a {
            color: #2196f3;
        }

        table.table td .btn.manage {
            padding: 2px 10px;
            background: #37BC9B;
            color: #fff;
            border-radius: 2px;
        }

        table.table td .btn.manage:hover {
            background: #2e9c81;
        }

        .btn-class button{
            padding: 0.5rem;
            background-color: #636363;
            color: white;
            border: 2px solid #636363;
            margin-left: 0.5rem;
            margin-bottom: 1rem;
        }

        .btn-class .add{
            margin-left: 63rem;
        }

        footer{
        background-color: black;
        padding: 1rem;
    }
    footer h1, li, hr{
        color: blanchedalmond;
    }
    footer ul{
        list-style: none;
    }
    footer ul li{
        padding-top: 5px;
    }
    footer .heading h1{
        color: #98817b;
        font-weight: bold;
        padding-left: 0.5rem;
    }
    footer hr{
        border: 1px solid blanchedalmond;
        width: 80%;
        align-content: center;
    }
    footer .copyright{
        color: blanchedalmond;
        text-align: center;
    }
    footer .copyright span{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .nav-bar{
        background-color: black;
        padding: 1rem;
    }
    .nav-bar ul a{
        color:blanchedalmond;
        padding-left: 1rem;
        font-weight: bolder;
        font-size: 30px;
        display: inline;
        text-decoration: none;
    }
    </style>
    <script>
        $(document).ready(function () {
            $(".btn-group .btn").click(function () {
                var inputValue = $(this).find("input").val();
                if (inputValue != 'all') {
                    var target = $('table tr[data-status="' + inputValue + '"]');
                    $("table tbody tr").not(target).hide();
                    target.fadeIn();
                } else {
                    $("table tbody tr").fadeIn();
                }
            });
            // Changing the class of status label to support Bootstrap 4
            var bs = $.fn.tooltip.Constructor.VERSION;
            var str = bs.split(".");
            if (str[0] == 4) {
                $(".label").each(function () {
                    var classStr = $(this).attr("class");
                    var newClassStr = classStr.replace(/label/g, "badge");
                    $(this).removeAttr("class").addClass(newClassStr);
                });
            }
        });
    </script>
</head>

<body>

    <div class="nav-bar">

        <ul>
            <a href="user.php">HOME</a>
            <u><a href="#">RESERVE A BOOK</a></u>
            <a href='logout.php'>Logout</a>
        </ul>

    </div>



    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>List of <b>Books</b></h2>
                        </div>
                        <div class="col-sm-12">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-info active">
                                    <input type="radio" name="status" value="all" checked="checked"> All
                                </label>
                                <label class="btn btn-success">
                                    <input type="radio" name="status" value="active"> More than 10
                                </label>
                                <label class="btn btn-warning">
                                    <input type="radio" name="status" value="inactive"> Less than 10
                                </label>
                                <label class="btn btn-danger">
                                    <input type="radio" name="status" value="expired"> None
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Book Name</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Reserve</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                $query = "SELECT * FROM book WHERE 1";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $copies = $row['left'];
                    echo "<tr data-status=\"";
                    if($copies>9){
                        echo "active";
                    }
                    elseif($copies>0){
                        echo "inactive";
                    }
                    else{
                        echo "expired";
                    }
                    echo "\">";
                    echo "<td>".$row['uid']."</td>";
                    echo "<td><a href='book_details.php?uid=".$row['uid']."'>".$row['name']."</a></td>";
                    echo "<td>".$row['author']."</td>";
                    echo "<td><span class=\"label label-";
                    if($copies>9){
                        echo "success\">".$copies." copies left";
                    }
                    elseif($copies>0){
                        echo "warning\">".$copies." copies left";
                    }
                    else{
                        echo "danger\">All copies taken";
                    }
                    echo "</span></td>";
                    echo "<td>";
                    echo "<a href='reserveBook.php?uid=".$row['uid']."' class=\"btn btn-sm manage".($copies==0?"disabled":"")."\"".($copies==0?"disabled":"").">Reserve</a>";
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
            <i class="fa fa-copyright" aria-hidden="true"><span>Copyright. All rights reserved.</span></i>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>