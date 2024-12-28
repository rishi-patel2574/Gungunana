<?php

    include '../partials/dbconnect.php';

    $sql = "SELECT * FROM playlist ORDER BY p_sn";
    $sql1 = "SELECT DISTINCT playlist_id FROM playlist ORDER BY playlist_id";
    $result= mysqli_query($conn, $sql);
    $result1= mysqli_query($conn, $sql1);
    $num1 = mysqli_num_rows($result1);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Playlists</title>
    

    <?php include('a_tamplates/a_header.php')?>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Total number of Playlists are: <?php echo $num1;?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">Playlists are</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> PLAYLIST ID </th>
                                <th> PLAYLIST IMAGE </th>
                                <th> PLAYLIST NAME </th>
                                <th> VIEW SONGS </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample row -->
                            <?php
                                while($r = mysqli_fetch_row($result1))
                                {
                                    $sql2 = "SELECT * FROM playlist WHERE playlist_id = ".$r[0];
                                    $result2= mysqli_query($conn, $sql2);
                                    $r2 = mysqli_fetch_row($result2);
                                    echo '
                                        <tr class="tr-c">
                                            <td>'.$r2[1].'</td>
                                            <td><img src="'.$r2[2].'" alt=""></td>
                                            <td>'.$r2[3].'</td>
                                            <td><a href="a_tamplates/update_playlist.php?changeid='.$r[0].'" class="btn btn-success"> VIEW </a></td>
                                        </tr>
                                        ';
                                }
                            ?>
                            <!-- Add more rows dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                        <h5 class="card-title"> <a href="a_tamplates/create_playlist.php" class="btn btn-danger"> CREATE NEW PLAYLIST  </a></h5>
            </div>
        </div>
    </div>
</div>

</body>
</html>