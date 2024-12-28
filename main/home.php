<?php
  session_start();

  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
  {
    header("location: login.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<html>
    <head>
	    <title>Home page</title>
        
        <?php include('tamplates/header.php')?>
        
        
        <!-- Carousel wrapper -->
        <div class="home-galary text-center carousel-inner py-4">
            <!-- Single item -->
            <div class="carousel-item active">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <img src="tamplates/p11.jpg" class="card-img">
                                <div class="card-body">
                                    <h5 class="">Song Name</h5>
                                    <a href="#!"  class="btn btn-light">Play Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 d-none d-lg-block">
                            <div class="card">
                                <img src="tamplates/p15.jpg" class="card-img">
                                <div class="card-body">
                                    <h5 class="">Song Name</h5>
                                    <a href="#!" class="btn btn-light">Play Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 d-none d-lg-block">
                            <div class="card">
                                <img src="tamplates/p14.jpg" class="card-img">
                                <div class="card-body">
                                    <h5 class="">Song name</h5>
                                    <a href="#!" class="btn btn-light">Plau Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </body>
</html>

