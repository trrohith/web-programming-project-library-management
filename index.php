<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
require('db.php');
$query = "SELECT * FROM `user` WHERE username='" . $_SESSION['username'] . "'";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($result)) {
    echo $row["role"];
    $_SESSION['role'] = $row["role"];
    $_SESSION['uid'] = $row["uid"];
    $_SESSION['name'] = $row["name"];
    if ($row["role"] == 'user') {
        // Redirect to user dashboard page
?>
        <script type="text/javascript">
            window.location = "user.php";
        </script>
    <?php
    } else {
        // Redirect to Librarian dashboard page
    ?>
        <script type="text/javascript">
            window.location = "viewlist.php";
        </script>
<?php
    }
}
echo "<br><a href='logout.php'>Logout</a>";
?>