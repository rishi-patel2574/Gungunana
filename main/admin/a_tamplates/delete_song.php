<?php

    include '../../partials/dbconnect.php';
    if(isset($_GET['changeid']))
    {
        $id=$_GET['changeid'];

        $sql = "DELETE FROM s_details WHERE s_id=".$id;
        $result= mysqli_query($conn, $sql);
        header("location: ../song.php");
    }

?>