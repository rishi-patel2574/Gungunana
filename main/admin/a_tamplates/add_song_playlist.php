<?php

    include '../../partials/dbconnect.php';
    if(isset($_GET['p_id']) || isset($_GET['s_id']) || isset($_GET['img']) || isset($_GET['name']))
    {
        $s_id=$_GET['s_id'];
        $p_id=$_GET['p_id'];

        $sql1 = "SELECT * FROM playlist WHERE playlist_id = $p_id";
        $result1= mysqli_query($conn, $sql1);
        $r1 = mysqli_fetch_row($result1);

        $sql = "INSERT INTO `playlist` (`playlist_id`, `playlist_image`, `playlist_name`, `song_id`) VALUES ('$p_id', '$r1[2]', '$r1[3]', '$s_id')";
        $result= mysqli_query($conn, $sql);
        header("location: update_playlist.php?changeid=$p_id");

    }

?>