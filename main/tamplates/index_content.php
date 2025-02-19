<?php

    $sql4 = "SELECT * FROM s_details ORDER BY s_id";
    $result4= mysqli_query($conn, $sql4);
    $num4 = mysqli_num_rows($result4);
?>

<?php
    if($_SESSION['sub'] == "NO") 
    {
?>

<div class="add container mt-4">
    <div id="adCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="admin/images/p1.jpg" class="d-block w-100 ad-img" alt="Ad 1">
            </div>
            <div class="carousel-item">
                <img src="admin/images/p2.jpg" class="d-block w-100 ad-img" alt="Ad 2">
            </div>
            <div class="carousel-item">
                <img src="admin/images/p3.jpg" class="d-block w-100 ad-img" alt="Ad 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#adCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#adCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
</div>

<?php
    }

    if(isset($_GET['like_id']) == 1)
    {
        
        $sql9 = "SELECT * FROM liked_song WHERE sn=".$_SESSION['id'];
        $result9 = mysqli_query($conn, $sql9);
        $num9 = mysqli_num_rows($result9);
        if($num9 > 0)
        {

?>

<h1 class="hwd-h1"> Liked Songs </h1>

<div class="text-center carousel-inner py-4">
    <!-- Single item -->
    <div class="carousel-item active">
        <div class="container">
            <div class="row">

                <?php 
                    while($r9 = mysqli_fetch_row($result9))
                    {
                        $sql10 = "SELECT * FROM s_details WHERE s_id = $r9[2] ORDER BY s_id";
                        $result10= mysqli_query($conn, $sql10);
                        $r10 = mysqli_fetch_row($result10)
                ?>
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="ind-card">
                        <img src="admin/<?php echo $r10[5]; ?>" class="ind-card-img">
                        <div class="card-body">
                            <h5 class=""> <?php echo $r10[1]; ?> </h5>
                            <a href="index.php?s_id=<?php echo $r10[0]; ?>&like_id=1" class="btn btn-light">Play Now</a>
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


<?php
        }
        else
        {
?>

<div class="text-center carousel-inner py-4">
    <!-- Single item -->
    <div class="carousel-item active">
        <div class="container">
            <div class="row">
                <h1>You have not yet liked any songs</h1>
            </div>
        </div>
    </div>
</div>
<?php
        }
    }
    elseif($p_id == 0)
    {
?>


<h1 class="hwd-h1"> Explore </h1>

<div class="text-center carousel-inner py-4">
    <!-- Single item -->
    <div class="carousel-item active">
        <div class="container">
            <div class="row">

                <?php 
                    while($r4 = mysqli_fetch_row($result4))
                    {
                ?>
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="ind-card">
                        <img src="admin/<?php echo $r4[5]; ?>" class="ind-card-img">
                        <div class="card-body">
                            <h5 class=""> <?php echo $r4[1]; ?> </h5>
                            <a href="index.php?s_id=<?php echo $r4[0]; ?>" class="btn btn-light">Play Now</a>
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

<?php

    }
    else
    {
        $sql5 = "SELECT * FROM playlist WHERE playlist_id = $p_id ORDER BY playlist_id";
        $result5= mysqli_query($conn, $sql5);
        $play = mysqli_fetch_row($result5);
?>

<h1 class="hwd-h1"> <?php echo $play[3]; ?></h1>

<div class="text-center carousel-inner py-4">
    <!-- Single item -->
    <div class="carousel-item active">
        <div class="container">
            <div class="row">

                <?php 
                    while($r5 = mysqli_fetch_row($result5))
                    {
                        $sql6="SELECT * FROM s_details WHERE s_id=$r5[4]";
                        $result6=mysqli_query($conn, $sql6);
                        $r6 = mysqli_fetch_row($result6);
                ?>
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="ind-card">
                        <img src="admin/<?php echo $r6[5]; ?>" class="ind-card-img">
                        <div class="card-body">
                            <h5 class=""> <?php echo $r6[1]; ?> </h5>
                            <a href="index.php?s_id=<?php echo $r6[0]; ?>" class="btn btn-light">Play Now</a>
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
<?php
    }
?>
