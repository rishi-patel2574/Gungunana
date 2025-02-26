<?php
include '../../partials/dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Submit Advertisement</title>
    <link rel="stylesheet" href="a_style.css">
</head>
<body class="signup-body a-body">
    <div class="signup-container">
        <h1>Submit Advertisement</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            
            <!-- Company Name -->
            <div class="input-group">
                <label for="company_name">Company Name</label>
                <input type="text" id="company_name" name="company_name" required>
            </div>
            
            <!-- Contact Person -->
            <div class="input-group">
                <label for="contact_person">Contact Person</label>
                <input type="text" id="contact_person" name="contact_person" required>
            </div>
            
            <!-- Email -->
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <!-- Phone Number -->
            <div class="input-group">
                <label for="pno">Phone Number</label>
                <input type="text" id="pno" name="pno" required>
            </div>
            
            <!-- Website -->
            <div class="input-group">
                <label for="website">Website (Optional)</label>
                <input type="url" id="website" name="website">
            </div>
            
            <!-- Ad Image -->
            <div class="input-group">
                <label for="ad_image">Advertisement Image</label>
                <input type="file" id="ad_image" name="ad_image" required>
            </div>
            
            <!-- Ad Description -->
            <div class="input-group">
                <label for="ad_description">Advertisement Description</label>
                <textarea id="ad_description" name="ad_description" required></textarea>
            </div>
            
            <button type="submit" class="signup-btn">Submit Ad</button>
        </form>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_name = $_POST["company_name"];
    $contact_person = $_POST["contact_person"];
    $email = $_POST["email"];
    $pno = $_POST["pno"];
    $website = $_POST["website"] ?? '';
    $ad_description = $_POST["ad_description"];
    $status = "Pending";

    $filename = $_FILES["ad_image"]["name"];
    $folder = "ads/" . $filename;
    move_uploaded_file($_FILES["ad_image"]["tmp_name"], "../" . $folder);
    
    $sql = "INSERT INTO adds (company_name, contact_person, email, pno, website, ad_image, ad_description, status) VALUES ('$company_name', '$contact_person', '$email', '$pno', '$website', '$folder', '$ad_description', '$status')";
    
    if (mysqli_query($conn, $sql)) {
        header("location: ../ads.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
