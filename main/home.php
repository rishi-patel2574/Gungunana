<?php

    session_start();
    include 'partials/dbconnect.php';

    $sql = "SELECT * FROM s_details ORDER BY s_id";
    $result= mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

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
            <h1>Welcome <?php echo $user;?></h1>
            <div class="carousel-item active">
                <div class="container">
                    <div class="row">

                        <?php 
                            while($r = mysqli_fetch_row($result))
                            {
                        ?>
                        <div class="col-lg-4 d-none d-lg-block pad">
                            <div class="card">
                                <img src="admin/<?php echo $r[5]; ?>" class="card-img">
                                <div class="card-body">
                                    <h5 class=""> <?php echo $r[1]; ?> </h5>
                                    <a href="index.php?s_id=<?php echo $r[0]; ?>" class="btn btn-light">Play Now</a>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
