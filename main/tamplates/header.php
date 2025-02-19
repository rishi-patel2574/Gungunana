	<link rel="stylesheet" href="..\css\bootstrap.min.css">
  <link rel="stylesheet" href="..\css\style.css">
	<script type="text/javascript" src="..\js\bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="">
	<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="home.php">GunGunana</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Library</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="playlist.php">Playlists</a>
          </li>
        </ul>

        <?php

          if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
          {
            echo '<a href="login.php" class="btn btn-light ms-3">Login</a>';
            echo '<a href="signup.php" class="btn btn-light ms-3">Sign Up</a>';
            $user = "USER";
          }
          else
          {
            echo 
            '<a href="profile.php" class="ms-3">
              <img src="admin/'.$_SESSION['profile'].'" class="img-profile">
            </a>';
            $user = $_SESSION['username'];
          }

        ?>
        
        
      </div>
    </div>
  </nav> 
