<?php
    session_start();
    include 'partials/dbconnect.php';
    if(isset($_GET['changeid']))
    {
        $id=$_GET['changeid'];

        $sql = "SELECT * FROM user_playlist WHERE playlist_id= $id ORDER BY s_id";
        $sql2 = "SELECT * FROM s_details ORDER BY s_id";
        $result = mysqli_query($conn, $sql);
        $results = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);
        $result_name = mysqli_fetch_row($results);
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<title>Playlist page</title>
        <?php include('tamplates/header.php')?>



    <div class="container-fluid pad-top">
        <h5 class="card-title"> </h5>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-4"><b><img src="admin/<?php echo $result_name[4]; ?>" alt="<?php echo $result_name[2]; ?>" class="img-profile" style="width: 100px; height: 100px"> <?php echo $result_name[1]."</strong> - ".$result_name[5]; ?> </b></h1>
                <div class="table-responsive">
                    <hr style="border: 1px solid white;">
                    <h1 style="text-align:center;">Current Songs</h1>
                    <hr style="border: 1px solid white;">
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
                                    $sql1 = "SELECT * FROM s_details WHERE s_id = $r[3] ORDER BY s_id";
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
                                                <a href="tamplates/remove_song.php?changeid=<?php echo $r[0]; ?>&p_id=<?php echo $id; ?>"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to remove this song?');"> Remove 
                                                </a>
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <hr style="border: 1px solid white;">
                    <h1 style="text-align:center; color:rgb(0, 255, 55); text-shadow: 0 0 10px rgba(51, 255, 85, 0.7);">Add Songs</h1>
                    <hr style="border: 1px solid white;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SONG ID</th>
                                <th>IMAGE</th>
                                <th>TITLE</th>
                                <th>ARTIST</th>
                                <th>ALBUM</th>
                                <th>ADD</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample row -->
                            <?php
                                while($r2 = mysqli_fetch_row($result2))
                                {
                                    $sql3 = "SELECT * FROM user_playlist WHERE playlist_id = $id AND s_id = $r2[0]";
                                    $result3= mysqli_query($conn, $sql3);
                                    $r3 = mysqli_fetch_row($result3);
                                    if ($r3 == null)
                                    {
                                        echo '
                                            <tr class="tr-c">
                                                <td>'.$r2[0].'</td>
                                                <td><img src="admin/'.$r2[5].'" alt=""></td>
                                                <td>'.$r2[1].'</td>
                                                <td>'.$r2[2].'</td>
                                                <td>'.$r2[3].'</td>
                                                <td>'; ?>
                                                <a href="tamplates/add_song_playlist.php?s_id=<?php echo $r2[0]; ?>&p_id=<?php echo $id; ?>"
                                                    class="btn btn-success" style="background-color:rgb(19, 134, 44);"> ADD 
                                                </a>
                                            </td>
                                        </tr>
                                <?php }
                                }
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

