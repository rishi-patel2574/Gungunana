<?php
    session_start();
    include 'partials/dbconnect.php';

    if(isset($_GET['changeid']))
    {
        $id=$_GET['changeid'];

        $sql = "SELECT * FROM playlist WHERE playlist_id= $id ORDER BY song_id";
        $sql2 = "SELECT * FROM s_details ORDER BY s_id";
        $result = mysqli_query($conn, $sql);
        $results = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);
        $result_name = mysqli_fetch_row($results);
    }
?>
<!DOCTYPE html>
<html lang="en">
<html>
    <head>
	    <title>View Playlist</title>
        <?php include('tamplates/header.php')?>
        <div class="container-fluid pad-top">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mb-4 capital" align="center"><?php echo $result_name[3]; ?></h1>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SONG ID</th>
                                    <th>IMAGE</th>
                                    <th>TITLE</th>
                                    <th>ARTIST</th>
                                    <th>ALBUM</th>
                                    <th>REMOVE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sample row -->
                                <?php
                                    while($r = mysqli_fetch_row($result))
                                    {
                                        $sql1 = "SELECT * FROM s_details WHERE s_id = $r[4] ORDER BY s_id";
                                        $result1= mysqli_query($conn, $sql1);
                                        $r1 = mysqli_fetch_row($result1);
                                        echo '
                                            <tr class="tr-c">
                                                <td>'.$r1[0].'</td>
                                                <td><img src="admin/'.$r1[5].'" alt=""></td>
                                                <td>'.$r1[1].'</td>
                                                <td>'.$r1[2].'</td>
                                                <td>'.$r1[3].'</td>
                                                <td>'; ?>
                                                    <a href="index.php?s_id=<?php echo $r1[0]; ?>" class="btn btn-danger"> PLAY </a>
                                                </td>
                                            </tr>
                                    <?php }
                                ?>
                                <!-- Add more rows dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
