<?php
  session_start();
  
  include 'partials/dbconnect.php';

  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
  {
    header("location: login.php");
    exit;
  }

  /*-------Song check-------*/

  if(isset($_GET['s_id']))
  {
    $id=$_GET['s_id'];
  }
  else
  {
    $id=15;
  }
  
  $sql = "SELECT * FROM s_details WHERE s_id=".$id;
  $result = mysqli_query($conn, $sql);
  $sub = mysqli_fetch_row($result);


  /*-------Playlist check-------*/
  
  $sql1 = "SELECT DISTINCT playlist_id FROM playlist ORDER BY playlist_id";
  $result1= mysqli_query($conn, $sql1);

?>

<!DOCTYPE html>
<html lang="en">
<html>
  <head>
	  <title>Welcome <?php echo $_SESSION['username']; ?></title>
	  <?php include('tamplates/header.php')?>

    <!-- Sidebar -->
    <div class="sidebar">
      <h3>Playlists</h3>
      <ul>
        
        <li><a href="#liked-songs">Liked Songs</a></li>
        
        <?php
          while($r1 = mysqli_fetch_row($result1))
          {
            $sql2 = "SELECT * FROM playlist WHERE playlist_id = ".$r1[0];
            $result2= mysqli_query($conn, $sql2);
            $r3 = mysqli_fetch_row($result2);

        ?>
          <li><a href="#playlist-1"> <?php echo $r3[3]; ?> </a> </li>
        <?php
          }
        ?>
        
      </ul>
    </div>
    <div class="sidebar slider-r" align="center">
      <h3><?php echo $sub[1]; ?></h3>
      <div class="img-container" align="center">
        <img class="song-ing" src="admin/<?php echo $sub[5]; ?>">
      </div>
    </div>


    <!-- Main Content -->
    <div class="content">
      <h1>Welcome <b><?php echo $_SESSION['username']; ?></b> to Spotify Clone</h1>
      <p>Select a playlist from the sidebar to view its songs!</p>
    </div>

    <?php include('tamplates/footer.php')?>
  </body>
</html>

