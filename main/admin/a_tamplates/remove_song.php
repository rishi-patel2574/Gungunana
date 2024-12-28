<?php

    include '../../partials/dbconnect.php';

    if(isset($_GET['changeid']) || isset($_GET['p_id']))
    {
        $id=$_GET['changeid'];
        $p_id=$_GET['p_id'];

        $sql = "DELETE FROM playlist WHERE p_sn=".$id;
        $result= mysqli_query($conn, $sql);
        header("location: update_playlist.php?changeid=$p_id");
    }

?>