<?php

include '../../partials/dbconnect.php';

if (isset($_GET['changeid'])) {
    $id = $_GET['changeid'];

    // Delete the ad record from the database
    $sql = "DELETE FROM adds WHERE sln = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: ../manage_ads.php"); // Redirect to the ads management page
        exit();
    } else {
        echo "Error deleting ad.";
    }
}

?>
