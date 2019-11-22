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
    <title>Delete Video</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Be careful when deleting your videos, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>!</h1>
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

    $sql = "SELECT videos.video_name, users.username FROM videos JOIN users ON videos.user_id = users.user_id WHERE users.username = '".$_SESSION["username"]."'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<h2>". $row["video_name"] ."</h2>";
        }
    } else {
        echo "<h2> You haven't uploaded any videos! </h2>";
    }
    ?>

    <form action="delete.php" method="POST" enctype="multipart/form-data">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="text-danger">Type the FULL name of the video EXACTLY as it appears above for your video to be deleted!</label>
            <input type="text" class="form-control">
        </div>

        <button type="submit" class="btn btn-danger">Delete</button>
    </div>
    </form>

    </div>

</body>
</html>