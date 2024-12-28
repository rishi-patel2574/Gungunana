<?php

    include 'partials/dbconnect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>UPLOAD SONGS</title>
    <link rel="stylesheet" href="a_tamplates/a_style.css">
</head>
<body class="signup-body a-body">
    <div class="signup-container">
        <h1>Add New Song</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            <!-- Title -->
            <div class="input-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" required>
            </div>

            <!-- Artist Name -->
            <div class="input-group">
                <label for="artist">Artist Name</label>
                <input type="text" id="artist" name="artist" required>
            </div>

            <!-- Album Name -->
            <div class="input-group">
                <label for="album">Album Name</label>
                <input type="text" id="album" name="album" required>
            </div>

            <!-- Song -->
            <div class="input-group">
                <label for="song">Song</label>
                <input type="file" id="song" name="song" required>
            </div>

            <!-- Song Photo -->
            <div class="input-group">
                <label for="photo">Song Photo</label>
                <input type="file" id="photo" name="photo" required>
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
        $s_filename = $_FILES["song"]["name"];
        $s_tempname = $_FILES["song"]["tmp_name"];
        $s_error = $_FILES["song"]["error"];

        $filename = $_FILES["photo"]["name"];
        $tempname = $_FILES["photo"]["tmp_name"];
        $p_error = $_FILES["photo"]["error"];

        if ($s_error !== 0) {
            echo "Error uploading song: " . $s_error;
        }

        if ($p_error !== 0) {
            echo "Error uploading photo: " . $p_error;
        }

        $title= $_POST["title"];
        $artist= $_POST["artist"];
        $album= $_POST["album"];
        $s_folder = "images/".$s_filename;
        $folder = "images/".$filename;

        // Check the file paths
        echo "Song Path: $s_folder<br>";
        echo "Photo Path: $folder<br>";

        $sql = "INSERT INTO s_details (title, artist, album, file_path, cover_image) VALUES ('$title', '$artist', '$album', '$s_folder', '$folder')";

        $result = mysqli_query($conn, $sql); 

        if (!$result) {
            echo "Error in SQL query: " . mysqli_error($conn);
        }

        if (move_uploaded_file($s_tempname, $s_folder)) {
            echo "Song uploaded successfully!";
        } else {
            echo "Failed to upload song.";
        }

        if (move_uploaded_file($tempname, $folder)) {
            echo "Photo uploaded successfully!";
        } else {
            echo "Failed to upload photo.";
        }

        if ($result) {
            header("Location: song.php");
        } else {
            echo "Song Not Updated";
        }
    }
?>