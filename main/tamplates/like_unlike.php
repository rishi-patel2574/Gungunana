<?php

include '../partials/dbconnect.php';

  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['like'])) 
  {
      $song_id = $_POST['like'];
      $user_id = $_SESSION['id'];
      echo $song_id."\n".$user_id;

      $sql8 = "DELETE FROM `liked_song` WHERE s_id = $song_id AND sn = $user_id";
      $result8 = mysqli_query($conn, $sql8);
      header("location: ../index.php");
      exit;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['unliked']))
  {
      $song_id = $_POST['unliked']; 
      $user_id = $_SESSION['id'];

      $sql8 = "INSERT INTO `liked_song` (`sn`, `s_id`) VALUES ('$user_id', '$song_id')";
      $result8 = mysqli_query($conn, $sql8);
      header("location: ../index.php");
      exit;
  }

?>