<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if(isset($_POST['submit'])){
    $name = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];

    move_uploaded_file($temp, "videos/".$name);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Upload and contribute to our amazing selection, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>!</h1>
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

    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" />
        <input type="submit" name="submit" value="Upload" />
    </form>

    </div>

</body>
</html>