<?php

    include '../partials/dbconnect.php';
    if(isset($_GET['changeid']))
    {
        $id=$_GET['changeid'];

        $sql = "SELECT * FROM u_info WHERE sn=".$id;
        $result= mysqli_query($conn, $sql);
        $sub = mysqli_fetch_row($result);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>UPDATE USER</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body class="signup-body a-body">
    <div class="signup-container">
        <h1>Update User</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            <!-- Email -->
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $sub[1];?>" required>
            </div>

            <!-- Phone Number -->
            <div class="input-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" value="<?php echo $sub[2];?>" required>
            </div>

            <!-- Profile Photo -->
            <div class="input-group">
                <label for="photo">Profile Photo</label>
                <input type="file" id="photo" name="photo" value="<?php echo $sub[3];?>">
            </div>

            <!-- Date of Birth -->
            <div class="input-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" value="<?php echo $sub[4];?>" required>
            </div>

            <!-- Gender -->
            <div class="input-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="<?php echo $sub[5];?>" selected>You selected <?php echo $sub[5];?> </option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="trance">Trance</option>
                </select>
            </div>

            <!-- Description -->
            <div class="input-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4"> <?php echo $sub[6];?> </textarea>
            </div>

            <!-- Hobbies -->
            <div class="input-group">
                <label for="hobbies">Hobbies</label>
                <textarea id="hobbies" name="hobbies" rows="2"><?php echo $sub[7];?></textarea>
            </div>

            <!-- Username -->
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo $sub[8];?>" required>
            </div>

            <!-- Password -->
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="<?php echo $sub[9];?>" required>
            </div>

            <!-- Confirm Password -->
            <div class="input-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="cpassword" value="<?php echo $sub[9];?>" required>
            </div>

            <button type="submit" class="signup-btn">Sign Up</button>
            <p class="login-link">Already have an account? <a href="signup.php">Login</a></p>
        </form>
    </div>
</body>
</html>



<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $filename = $_FILES["photo"]["name"];
        if($filename)
        {
            $tempname = $_FILES["photo"]["tmp_name"];
            $folder = "images/".$filename;
            move_uploaded_file($tempname, "../admin/".$folder);
        }
        else
        {
            $folder = $sub[5];
        }

        $email= $_POST["email"];
        $phone= $_POST["phone"];
        $dob= $_POST["dob"];
        $gender= $_POST["gender"];
        $description= $_POST["description"];
        $hobbies= $_POST["hobbies"];
        $username= $_POST["username"];
        $password= $_POST["password"];
        $cpassword= $_POST["cpassword"];

        if ($password==$cpassword)
        {

          $sql = "UPDATE u_info  SET email = '$email', phone = '$phone', profile_photo = '$folder', dob = '$dob', gender = '$gender', description = '$description', hobbies = '$hobbies', username = '$username', password = '$password' WHERE sn = ".$id;

          $result = mysqli_query($conn, $sql);

          if ($result==1)
          {
            header("location: ../profile.php");
          }
          else
          {
            echo "User Not Updated";
          }
        }
        else
        {
          echo "password Incorrect";
        }
    }
?>