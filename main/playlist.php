<?php

    session_start();
    include 'partials/dbconnect.php';

    $sql = "SELECT * FROM playlist ORDER BY p_sn";
    $sql1 = "SELECT DISTINCT playlist_id FROM playlist ORDER BY playlist_id";
    $result= mysqli_query($conn, $sql);
    $result1= mysqli_query($conn, $sql1);
    $num1 = mysqli_num_rows($result1);

?>
<!DOCTYPE html>
<html lang="en">
<html>
    <head>
	    <title>Home page</title>
        <?php include('tamplates/header.php')?>
        <div class="sidebar-playlist">
            <h1 align="center">Playlists</h1>
        </div>
    </body>
</html>
