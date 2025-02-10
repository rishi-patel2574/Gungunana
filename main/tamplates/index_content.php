<?php

$sql4 = "SELECT * FROM s_details ORDER BY s_id";
    $result4= mysqli_query($conn, $sql4);
    $num4 = mysqli_num_rows($result4);

?><div class="text-center carousel-inner py-4">
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