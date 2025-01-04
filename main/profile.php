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
<head>
    <title>Profile - <?php echo $_SESSION['username']; ?></title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file -->
    <?php include('tamplates/header.php');
      
      include ('partials/dbconnect.php');

      $id = $_SESSION['id'];
    
      $sql = "SELECT * FROM u_info WHERE sn = $id";
      $result= mysqli_query($conn, $sql);
      $sub = mysqli_fetch_row($result);
    
    ?>

<div class="container profile-container p-c bg-dark text-white py-4 mt-5 rounded shadow">
    <h1 class="text-center mb-4">Welcome, <?php echo $_SESSION['username']; ?>!</h1>

    <div class="row profile-card align-items-center">
        <div class="col-md-4 text-center profile-photo">
            <img src="admin/<?php echo $sub[3]; ?>" alt="Profile Photo" class="rounded-circle img-thumbnail">
        </div>
        <div class="col-md-8 profile-details">
            <p><strong>Username:</strong> <?php echo $sub[8]; ?></p>
            <p><strong>Email ID:</strong> <?php echo $sub[1]; ?></p>
            <p><strong>Phone Number:</strong> <?php echo $sub[2]; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $sub[4]; ?></p>
            <p><strong>Gender:</strong> <?php echo $sub[5]; ?></p>
            <p><strong>Description:</strong> <?php echo $sub[6]; ?></p>
            <p><strong>Hobby:</strong> <?php echo $sub[7]; ?></p>
        </div>
    </div>

    <div class="text-center mt-4 profile-actions">
        <a href="tamplates/update_user.php?changeid=<?php echo $sub[0]; ?>" class="btn btn-primary mx-2">Edit Profile</a>
        <a href="tamplates/logout.php" class="btn btn-danger mx-2">Logout</a>
    </div>
</div>



</body>
</html>
