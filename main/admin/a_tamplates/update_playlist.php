<?php

    include '../../partials/dbconnect.php';
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
<head>
    <title>Playlists</title>    

    <?php include('a_header.php')?>
    
    <link rel="stylesheet" href="..\..\..\css\bootstrap.min.css">
	<script type="text/javascript" src="..\..\..\js\bootstrap.min.js"></script>
    <link rel="stylesheet" href="a_style.css">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
    </div>
</nav>

<div class="sidebar">
    <h3>Admin Panel</h3>
    <a href="../a_index.php">Manage Users</a>
    <a href="../manage_songs.php">Manage Songs</a>
    <a href="../manage_playlists.php">Manage Playlist</a>
    <a href="../login.php">Logout</a>
</div>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"> <img src="../<?php echo $result_name[2]; ?>" alt="<?php echo $result_name[2]; ?>" class="img"> <?php echo $result_name[1]."</strong> - ".$result_name[3]; ?> </h5>
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
                                            <td><img src="../'.$r1[5].'" alt=""></td>
                                            <td>'.$r1[1].'</td>
                                            <td>'.$r1[2].'</td>
                                            <td>'.$r1[3].'</td>
                                            <td>'.$r1[4].'</td>
                                            <td>'; ?>
                                                <a href="remove_song.php?changeid=<?php echo $r[0]; ?>&p_id=<?php echo $id; ?>"
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
</div>




<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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
                                <th>ADD</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample row -->
                            <?php
                                while($r2 = mysqli_fetch_row($result2))
                                {
                                    $sql3 = "SELECT * FROM playlist WHERE playlist_id = $id AND song_id = $r2[0]";
                                    $result3= mysqli_query($conn, $sql3);
                                    $r3 = mysqli_fetch_row($result3);
                                    if ($r3 == null)
                                    {
                                        echo '
                                            <tr class="tr-c">
                                                <td>'.$r2[0].'</td>
                                                <td><img src="../'.$r2[5].'" alt=""></td>
                                                <td>'.$r2[1].'</td>
                                                <td>'.$r2[2].'</td>
                                                <td>'.$r2[3].'</td>
                                                <td>'.$r2[4].'</td>
                                                <td>'; ?>
                                                <a href="add_song_playlist.php?s_id=<?php echo $r2[0]; ?>&p_id=<?php echo $id; ?>"
                                                    class="btn btn-success"
                                                    onclick="return confirm('Are you sure you want to remove this song?');"> ADD 
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
</div>

</body>
</html>

