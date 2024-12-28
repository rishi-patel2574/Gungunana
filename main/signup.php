<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="..\css\style.css">
</head>
<body class="signup-body a-body">
    <div class="signup-container">
        <h1>Create Account</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            <!-- Email -->
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <!-- Phone Number -->
            <div class="input-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
            </div>

            <!-- Profile Photo -->
            <div class="input-group">
                <label for="photo">Profile Photo</label>
                <input type="file" id="photo" name="photo" required>
            </div>

            <!-- Date of Birth -->
            <div class="input-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>
            </div>

            <!-- Gender -->
            <div class="input-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="" disabled selected>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <!-- Description -->
            <div class="input-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Tell us about yourself" rows="4"></textarea>
            </div>

            <!-- Hobbies -->
            <div class="input-group">
                <label for="hobbies">Hobbies</label>
                <textarea id="hobbies" name="hobbies" placeholder="List your hobbies (comma-separated)" rows="2"></textarea>
            </div>

            <!-- Username -->
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Choose a username" required>
            </div>

            <!-- Password -->
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Create a password" required>
            </div>

            <!-- Confirm Password -->
            <div class="input-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="cpassword" placeholder="Confirm your password" required>
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
        include 'partials/dbconnect.php';

        $filename = $_FILES["photo"]["name"];
        $tempname = $_FILES["photo"]["tmp_name"];

        $email= $_POST["email"];
        $phone= $_POST["phone"];
        $folder = "images/".$filename;
        $dob= $_POST["dob"];
        $gender= $_POST["gender"];
        $description= $_POST["description"];
        $hobbies= $_POST["hobbies"];
        $username= $_POST["username"];
        $password= $_POST["password"];
        $cpassword= $_POST["cpassword"];

        if ($password==$cpassword)
        {

          $sql = "INSERT INTO `u_info` (`email`, `phone`, `profile_photo`, `dob`, `gender`, `description`, `hobbies`, `username`, `password`, `date`) VALUES ('$email', '$phone', '$folder', '$dob', '$gender', '$description', '$hobbies', '$username', '$password', CURRENT_TIMESTAMP)";

          $result = mysqli_query($conn, $sql);
          $folder1= 'admin/'.$folder; 
          move_uploaded_file($tempname, $folder1);
          if ($result==1)
          {
            header("location: login.php");
          }
          else
          {
            echo "The user alrady exists";
          }
        }
        else
        {
          echo "conform password Incorrect";
        }
    }
?>