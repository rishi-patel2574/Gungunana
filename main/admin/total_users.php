<?php

    include '../partials/dbconnect.php';

    $sql = "SELECT * FROM u_info ORDER BY sn";
    $sub = "SELECT * FROM u_info WHERE subscription='NO'";
    $result= mysqli_query($conn, $sql);
    $sub_result= mysqli_query($conn, $sub);
    $num = mysqli_num_rows($result);
    $sub_num = mysqli_num_rows($sub_result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    

    <?php include('a_tamplates/a_header.php')?>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Total number of Users are: <?php echo $num;?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title" style="color:green">Users With Subscription: <?php echo $num-$sub_num;?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title" style="color:red">Users Without Subscription: <?php echo $sub_num;?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">Users Data</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Profile Photo</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>DOB</th>
                                <th>Gender</th>
                                <th>Description</th>
                                <th>Hobbies</th>
                                <th>Username</th>
                                <th>Date of Joining</th>
                                <th>Subscription</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample row -->
                            <?php
                                while($r = mysqli_fetch_row($result))
                                {
                                    if($r[11]=="NO")
                                    {
                                        $c='danger';
                                    }
                                    else
                                    {
                                        $c='success';
                                    }
                                    echo '
                                        <tr class="tr-c">
                                            <td>'.$r[0].'</td>
                                            <td><img src="'.$r[3].'" alt=""></td>
                                            <td>'.$r[1].'</td>
                                            <td>'.$r[2].'</td>
                                            <td>'.$r[4].'</td>
                                            <td>'.$r[5].'</td>
                                            <td>'.$r[6].'</td>
                                            <td>'.$r[7].'</td>
                                            <td>'.$r[8].'</td>
                                            <td>'.$r[10].'</td>
                                            <td><a href="a_tamplates/subscription_update.php?changeid='.$r[0].'" class="btn btn-'.$c.'">'.$r[11].'</a></td>
                                        </tr>
                                    ';
                                }
                            ?>
                            <!-- Add more rows dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
