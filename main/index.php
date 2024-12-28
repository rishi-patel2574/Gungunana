<?php
  session_start();

  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
  {
    header("location: login.php");
    exit; 
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
      <h3>Song name</h3>
      <div class="img-container" align="center">
        <img class="song-ing" src="tamplates\p11.jpg">
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

