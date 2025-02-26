<?php
    include '../partials/dbconnect.php';

    $sql = "SELECT * FROM adds ORDER BY sln";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ads Management</title>
    <?php include('a_tamplates/a_header.php')?>
</head>
<body>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">Ads Management</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Company Name</th>
                                <th>Contact Person</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Website</th>
                                <th>Ad Image</th>
                                <th>Ad Description</th>
                                <th>Status</th>
                                <th>UPDATE</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($r = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $r['sln']; ?></td>
                                    <td><?php echo $r['company_name']; ?></td>
                                    <td><?php echo $r['contact_person']; ?></td>
                                    <td><?php echo $r['email']; ?></td>
                                    <td><?php echo $r['pno']; ?></td>
                                    <td><a href="<?php echo $r['website']; ?>" target="_blank">Visit</a></td>
                                    <td><img src="<?php echo $r['ad_image']; ?>" alt="Ad Image" style="width:100px;"></td>
                                    <td><?php echo $r['ad_description']; ?></td>
                                    <td><?php echo $r['status']; ?></td>
                                    <td><a href="a_tamplates/update_ads.php?changeid=<?php echo $r['sln']; ?>" class="btn btn-success">UPDATE</a></td>
                                    <td>
                                        <a href="a_tamplates/delete_ads.php?changeid=<?php echo $r['sln']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ad?');">DELETE</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h5 class="card-title"> <a href="a_tamplates/add_ads.php" class="btn btn-danger"> CREATE ADS </a></h5>
            </div>
        </div>
    </div>
</div>

</body>
</html>
