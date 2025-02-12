<?php
  session_start();
  
  include 'partials/dbconnect.php';

  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
  {
    header("location: login.php");
    exit;
  }

  /*------- Playlist select---------*/
  if(isset($_GET['p_id']))
  {
    $_SESSION['p_id'] = $_GET['p_id'];
    $p_id = $_SESSION['p_id'];
  }
  else
  {
    $p_id = $_SESSION['p_id']; 
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
      <h1 align="center">Playlists</h1>
      <hr>
      <ul>
        <li> <a href="index.php?like_id=1" class="p-link"> <img src="admin\images\rishi1.png" class="img-profile">Liked Songs</a></li>
        <hr>
        <?php
          while($r1 = mysqli_fetch_row($result1))
          {
            $sql2 = "SELECT * FROM playlist WHERE playlist_id = ".$r1[0];
            $result2= mysqli_query($conn, $sql2);
            $r3 = mysqli_fetch_row($result2);

        ?>
          <li><a href="index.php?p_id=<?php echo $r3[1];?>" class="p-link"> <img src="admin/<?php echo $r3[2];?>" class="img-profile"> <?php echo $r3[3]; ?> </a> </li>
          <hr>
        <?php
          }
        ?>

      </ul>
    </div>
    <div class="sidebar slider-r" align="center">
      <h1><?php echo $sub[1]; ?></h1>
      <hr>
      <div class="img-container" align="center">
        <img class="song-ing" src="admin/<?php echo $sub[5]; ?>">
      </div>
      <form action="tamplates/like_unlike.php" method="POST">
        <?php
        
          $sql7 = "SELECT * FROM liked_song WHERE sn=".$_SESSION['id']." AND s_id=".$sub[0];
          $result7 = mysqli_query($conn, $sql7);
          $num7 = mysqli_num_rows($result7);
          $r7 = mysqli_fetch_row($result7);

          if($num7 == 1)
          {
        
        ?>

            <div class="like-btn">
              <button type="submit" name="like" class="inner-like-btn" value="<?php echo $sub[0]; ?>"> <img src="admin\images\rishi1.png" class="img-profile"></button>
            </div>
        
        <?php 
          }
          else
          {
        ?>
            <div class="like-btn">
              <button type="submit" name="unliked" class="inner-like-btn" value="<?php echo $sub[0]; ?>"> <img src="admin\images\rishi.png" class="img-profile"> </button>
            </div>
        <?php
          }
        ?>
      </form>
    </div>

    <!-- Main Content -->
    <div class="content">
      <?php include('tamplates/index_content.php')?>
    </div>

    <?php include('tamplates/footer.php')?>
  </body>
</html>
