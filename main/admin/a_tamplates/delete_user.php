<?php

    include '../../partials/dbconnect.php';
    if(isset($_GET['changeid']))
    {
        $id=$_GET['changeid'];

        $sql = "DELETE FROM u_info WHERE sn=".$id;
        $result= mysqli_query($conn, $sql);
        header("location: ../manage_users.php");
    }

?>