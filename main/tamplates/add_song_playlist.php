<?php

    include '../partials/dbconnect.php';
    if(isset($_GET['p_id']) || isset($_GET['s_id']))
    {
        $s_id=$_GET['s_id'];
        $p_id=$_GET['p_id'];
        $sn=$_SESSION['id'];

        $sql1 = "SELECT * FROM user_playlist WHERE playlist_id = $p_id";
        $result1= mysqli_query($conn, $sql1);
        $r1 = mysqli_fetch_row($result1);

        $sql = "INSERT INTO `user_playlist`(`playlist_id`, `sn`, `s_id`, `playlist_image`, `playlist_name`) VALUES ('$p_id','$sn','$s_id','$r1[4]','$r1[5]')";
        $result= mysqli_query($conn, $sql);
        header("location: ../view_user_playlist.php?changeid=$p_id");

    }

?>