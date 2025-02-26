<?php

include '../../partials/dbconnect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>CREATE PLAYLIST</title>
    <link rel="stylesheet" href="a_style.css">
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

            <button type="submit" class="signup-btn">Sign Up</button>
            <p class="login-link">Already have an account? <a href="signup.php">Login</a></p>
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
            $folder = "songs/".$filename;
            move_uploaded_file($tempname, "../".$folder);
        }

        $playlist_id= $_POST["playlist_id"];
        $name= $_POST["name"];

        $sql = "INSERT INTO `playlist` (`playlist_id`, `playlist_image`, `playlist_name`, `song_id`) VALUES ('$playlist_id', '$folder', '$name', '1')";

        $result = mysqli_query($conn, $sql);
        
        if ($result==1)
        {
            header("location: ../playlists.php");
        }
            else
        {
            echo "Song Not Updated";
        }
    }
?>