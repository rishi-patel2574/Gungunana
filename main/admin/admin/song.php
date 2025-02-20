<?php

    include '../partials/dbconnect.php';

    $sql = "SELECT * FROM s_details ORDER BY s_id";
    $result= mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    

    <?php include('a_tamplates/a_header.php')?>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Total number of Songs are: <?php echo $num;?></h5>
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
                <h2 class="mb-4">Songs Data</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SONG ID</th>
                                <th>IMAGE</th>
                                <th>TITLE</th>
                                <th>ARTIST</th>
                                <th>ALBUM</th>
                                <th>SONG PATH</th>
                                <th>UPDATE</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample row -->
                            <?php
                                while($r = mysqli_fetch_row($result))
                                {
                                    echo '
                                        <tr class="tr-c">
                                            <td>'.$r[0].'</td>
                                            <td><img src="'.$r[5].'" alt=""></td>
                                            <td>'.$r[1].'</td>
                                            <td>'.$r[2].'</td>
                                            <td>'.$r[3].'</td>
                                            <td>'.$r[4].'</td>
                                            <td><a href="a_tamplates/update_song.php?changeid='.$r[0].'" class="btn btn-success"> UPDATE </a></td>
                                            <td>';?>
                                                <a href="a_tamplates/delete_song.php?changeid=<?php echo $r[0]; ?>"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this user?');"> DELETE 
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
</div>

</body>
</html>

