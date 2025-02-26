<?php
    session_start();
    include 'partials/dbconnect.php';

    if($_SESSION['sub'] == "NO") 
    {
        header("location: tamplates/purchase_sub.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Playlist</title>
    <link rel="stylesheet" href="..\css\style.css">
</head>
<body class="signup-body a-body">
    <div class="signup-container">
        <h1>CREATE PLAYLIST</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            <!-- Playlist Id -->
            <div class="input-group">
                <label for="playlist_id">Playlist ID</label>
                <input type="text" id="playlist_id" name="playlist_id" required>
            </div>

            <!-- Playlist Photo -->
            <div class="input-group">
                <label for="photo">Playlist Photo</label>
                <input type="file" id="photo" name="photo">
            </div>

            <!-- Playlist Name -->
            <div class="input-group">
                <label for="name">Playlist Name</label>
                <input type="text" id="name" name="name" required>
            </div>

            <button type="submit" class="signup-btn">Create</button>
        </form>
    </div>
</body>
</html>



<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {

        $filename = $_FILES["photo"]["name"];
        if($filename)
        {
            $tempname = $_FILES["photo"]["tmp_name"];
            $folder = "playlist/".$filename;
            move_uploaded_file($tempname, "admin/".$folder);
        }
        else
        {
            $folder = $sub[5];
        }

        $playlist_id= $_POST["playlist_id"];
        $sn=$_SESSION['id'];
        $name= $_POST["name"];

        $sql = "INSERT INTO `user_playlist` (`playlist_id`, `sn`, `s_id`, `playlist_image`, `playlist_name`) VALUES ($playlist_id, $sn, 1, '$folder', '$name')";

        $result = mysqli_query($conn, $sql);
        
        if ($result==1)
        {
            header("location: playlist.php");
        }
        else
        {
            echo "Playlist Not Created";
        }
    }
?>