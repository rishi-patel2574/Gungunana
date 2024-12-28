<?php

    include '../../partials/dbconnect.php';
    if(isset($_GET['changeid']))
    {
        $id=$_GET['changeid'];

        $sql = "SELECT * FROM u_info WHERE sn=".$id;
        $result= mysqli_query($conn, $sql);
        $sub = mysqli_fetch_row($result);
        if($sub[11]=='NO')
        {
            $upd = "UPDATE u_info set subscription = 'YES' WHERE sn=".$id;
            $u_result= mysqli_query($conn, $upd);
            header("location: ../total_users.php");
        }
        else
        {
            $upd = "UPDATE u_info set subscription = 'NO' WHERE sn=".$id;
            $u_result= mysqli_query($conn, $upd);
            header("location: ../total_users.php");
        }
    }

?>