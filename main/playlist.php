<?php
    session_start();
    include 'partials/dbconnect.php';


    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
    {
        header("location: login.php");
        exit;
    }

    $sql1 = "SELECT DISTINCT playlist_id FROM playlist ORDER BY playlist_id";
    $result1= mysqli_query($conn, $sql1);
    $num1 = mysqli_num_rows($result1);
    
    /*--------------------check if subscription present----------*/
    if($_SESSION['sub'] == "YES") 
    {
        $sn=$_SESSION['id'];
        $sql3 = "SELECT DISTINCT playlist_id FROM user_playlist WHERE sn=$sn ORDER BY playlist_id";
        $result3= mysqli_query($conn, $sql3);
        $num3=mysqli_num_rows($result3);
    }
?>
<!DOCTYPE html>
<html lang="en">
<html>
    <head>
	    <title>Playlist page</title>
        <?php include('tamplates/header.php')?>
        <div class="container-fluid pad-top mb-4">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mb-4" align="center"><b>Available Playlists</b></h1>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> PLAYLIST IMAGE </th>
                                    <th> PLAYLIST ID </th>
                                    <th> PLAYLIST NAME </th>
                                    <th> VIEW SONGS </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($r = mysqli_fetch_row($result1))
                                    {
                                        $sql2 = "SELECT * FROM playlist WHERE playlist_id = ".$r[0];
                                        $result2= mysqli_query($conn, $sql2);
                                        $r2 = mysqli_fetch_row($result2);
                                        echo '
                                            <tr class="tr-c">
                                                <td><img src="admin/'.$r2[2].'" alt=""></td>
                                                <td>'.$r2[1].'</td>
                                                <td>'.$r2[3].'</td>
                                                <td><a href="view_playlist.php?changeid='.$r[0].'" class="btn btn-success"> VIEW </a></td>
                                            </tr>
                                            ';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr style="border: 1px solid white;">
        <!-- ----------------------------------Subscrobed user playlist------------------------------  -->
        <?php
        if($_SESSION['sub'] == "YES") 
        {
            if($num3 > 0)
            {
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mb-4" align="center"><b>Your Playlists</b></h1>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> PLAYLIST IMAGE </th>
                                    <th> PLAYLIST ID </th>
                                    <th> PLAYLIST NAME </th>
                                    <th> VIEW SONGS </th>
                                </tr>
                            </thead>
                            <tbody>
                                <<?php
                                    while($r3 = mysqli_fetch_row($result3))
                                    {
                                        $sql4 = "SELECT * FROM user_playlist WHERE playlist_id = ".$r3[0];
                                        $result4= mysqli_query($conn, $sql4);
                                        $r4 = mysqli_fetch_row($result4);
                                        echo '
                                            <tr class="tr-c">
                                                <td><img src="admin/'.$r4[4].'" alt=""></td>
                                                <td>'.$r4[1].'</td>
                                                <td>'.$r4[5].'</td>
                                                <td><a href="view_user_playlist.php?changeid='.$r3[0].'" class="btn btn-success"> EDIT </a></td>
                                            </tr>
                                            ';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
        }
        ?>
        <div class="create-playlist">
            <a href="create_playlist" class="btn btn-success btn-create">Create Your Own Playlists</a>
        </div>
    </body>
</html>
