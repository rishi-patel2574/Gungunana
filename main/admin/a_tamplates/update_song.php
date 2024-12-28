<?php

include '../../partials/dbconnect.php';
if(isset($_GET['changeid']))
{
    $id=$_GET['changeid'];

    $sql = "SELECT * FROM s_details WHERE s_id=".$id;
    $result= mysqli_query($conn, $sql);
    $sub = mysqli_fetch_row($result);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>UPDATE SONG</title>
    <link rel="stylesheet" href="a_style.css">
</head>
<body class="signup-body a-body">
    <div class="signup-container">
        <h1>Update Song</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            <!-- Title -->
            <div class="input-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="<?php echo $sub[1];?>" required>
            </div>

            <!-- Artist Name -->
            <div class="input-group">
                <label for="artist">Artist Name</label>
                <input type="text" id="artist" name="artist" value="<?php echo $sub[2];?>" required>
            </div>

            <!-- Album Name -->
            <div class="input-group">
                <label for="album">Album Name</label>
                <input type="text" id="album" name="album" value="<?php echo $sub[3];?>" required>
            </div>

            <!-- Song -->
            <div class="input-group">
                <label for="song">Song</label>
                <input type="file" id="song" name="song">
            </div>

            <!-- Song Photo -->
            <div class="input-group">
                <label for="photo">Song Photo</label>
                <input type="file" id="photo" name="photo">
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
        if($s_filename)
        {
            $s_tempname = $_FILES["song"]["tmp_name"];
            $s_folder = "songs/".$s_filename;
            move_uploaded_file($s_tempname, "../".$s_folder);
        }
        else
        {
            $s_folder = $sub[4];
        }

        $filename = $_FILES["photo"]["name"];
        if($filename)
        {
            $tempname = $_FILES["photo"]["tmp_name"];
            $folder = "songs/".$filename;
            move_uploaded_file($tempname, "../".$folder);
        }
        else
        {
            $folder = $sub[5];
        }

        $title= $_POST["title"];
        $artist= $_POST["artist"];
        $album= $_POST["album"];

        $sql = "UPDATE s_details SET title = '$title', artist = '$artist', album = '$album', file_path = '$s_folder', cover_image = '$folder' WHERE s_id =".$id;

        $result = mysqli_query($conn, $sql);
        
        if ($result==1)
        {
            header("location: ../song.php");
        }
            else
        {
            echo "Song Not Updated";
        }
    }
?>