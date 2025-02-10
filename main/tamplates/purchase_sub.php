<?php
    session_start();

    include '../partials/dbconnect.php';
    if(isset($_GET['changeid']))
    {
        $_SESSION['chid']=$_GET['changeid'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Subscription Plans</title>
    <link rel="stylesheet" href="..\..\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\..\css\style.css">
    <script type="text/javascript" src="..\..\js\bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1><u>Choose Your Subscription Plan</u></h1>
        <p class="text-muted">Upgrade your experience with our premium plans and enjoy exclusive benefits:</p>
        <ul class="text-muted">
            <li>No ads – Enjoy uninterrupted music.</li>
            <li>Get the latest song updates instantly.</li>
            <li>Exclusive access to premium playlists.</li>
            <li>High-quality audio streaming.</li>
            <li>Offline downloads – Listen without the internet.</li>
        </ul>
        <div class="row justify-content-center">
            <!-- Monthly Plan -->
            <div class="col-md-4">
                <div class="card ind-card-sub">
                    <h3 class="text-light">Monthly Plan</h3>
                    <h2 class="text-warning">&#8377;149</h2>
                    <p class="text-muted">Enjoy premium features for 1 month.</p>
                    <a href="purchase_sub_update.php?changeid=1" class="btn btn-custom">Subscribe Now</a>
                </div>
            </div>
            <!-- 6 Months Plan -->
            <div class="col-md-4">
                <div class="card ind-card-sub">
                    <h3 class="text-light">6 Months Plan</h3>
                    <h2 class="text-warning">&#8377;799</h2>
                    <p class="text-muted">Save more with a 6-month subscription.</p>
                    <a href="purchase_sub_update.php?changeid=6" class="btn btn-custom">Subscribe Now</a>
                </div>
            </div>
            <!-- 1 Year Plan -->
            <div class="col-md-4">
                <div class="card ind-card-sub">
                    <h3 class="text-light">1 Year Plan</h3>
                    <h2 class="text-warning">&#8377;1599</h2>
                    <p class="text-muted">Best value! 1 year of premium benefits.</p>
                    <a href="purchase_sub_update.php?changeid=12" class="btn btn-custom">Subscribe Now</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
