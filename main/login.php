<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="..\css\style.css">
</head>
<body class="signup-body a-body">


    <div class="signup-container">
        <h1>Login</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
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

            <button type="submit" class="signup-btn">Login</button>
            <p class="login-link">Already have an account? <a href="signup.php">signup</a></p>
        </form>
    </div>
</body>
</html>



<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        include 'partials/dbconnect.php';

        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM a_info WHERE username='$username' AND password='$password'";
        $result= mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        $r = mysqli_fetch_row($result);
        
        if($num==1)
        {
            header("location: admin/a_index.php");
        }
        
        $sql = "SELECT * FROM u_info WHERE username='$username' AND password='$password'";
        $result= mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        $r = mysqli_fetch_row($result);
        if($num==1)
        {
            $login=true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['profile'] = $r[3];
            $_SESSION['id'] = $r[0];
            $_SESSION['sub'] = $r[11];
            $_SESSION['p_id'] = 0;
            header("location: index.php");
        }
        else
        {
            echo "<script> alert('Invalid Username Or Password'); </script>";
        }
    }
?>
