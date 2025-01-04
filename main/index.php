<?php
  session_start();
  
  include 'partials/dbconnect.php';

  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
  {
    header("location: login.php");
    exit;
  }


  if(isset($_GET['s_id']))
  {
    $id=$_GET['s_id'];
    $sql = "SELECT * FROM s_details WHERE s_id=".$id;
    $result= mysqli_query($conn, $sql);
    $sub = mysqli_fetch_row($result);
  }

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
        <li><a href="#playlist-1">Chill Vibes</a></li>
        <li><a href="#playlist-2">Workout Mix</a></li>
        <li><a href="#playlist-3">Focus Beats</a></li>
        <li><a href="#playlist-4">Party Hits</a></li>
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

