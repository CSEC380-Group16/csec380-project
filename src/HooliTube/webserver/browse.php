<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Browse HooliTube</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Happy browsing, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>!</h1>
    </div>

    <div class="sidenav">
        <a href="browse.php" class="btn btn-default btn-lg">Browse</a>
        <br>
        <a href="upload.php" class="btn btn-default btn-lg">Upload</a>
        <br>
        <a href="delete.php" class="btn btn-default btn-lg">Delete</a>
        <br>
        <a href="logout.php" class="btn btn-danger">Sign Out</a>
    </div>

    <div class="main">
    <?php
    // Include config file
    require_once "common.php";

    $sql = "SELECT video_id, video_name, user_id FROM videos";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            // echo $row["video_name"]. "" . $row["firstname"]. " " . $row["lastname"]. "<br>";
            echo "<p>" . $row["video_name"] ."</p>" ;
            echo "<video width='800' height='600' controls><source src='videos/" . $row["video_name"] . "' type='video/mp4'>Your browser is bad.</video>";
        }
    } else {
        echo "Sorry, no vidoes have been uploaded!";
    }
    ?>
    </div>

</body>
</html>
