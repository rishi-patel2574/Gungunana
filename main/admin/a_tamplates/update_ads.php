<?php
include '../../partials/dbconnect.php';

if (isset($_GET['changeid'])) {
    $id = $_GET['changeid'];

    $sql = "SELECT * FROM adds WHERE sln=" . $id;
    $result = mysqli_query($conn, $sql);
    $ad = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Advertisement</title>
    <link rel="stylesheet" href="a_style.css">
</head>
<body class="signup-body a-body">
    <div class="signup-container">
        <h1>Update Advertisement</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="sln" value="<?php echo $id; ?>">

            <!-- Company Name -->
            <div class="input-group">
                <label for="company">Company Name</label>
                <input type="text" id="company" name="company" value="<?php echo $ad['company_name']; ?>" required>
            </div>

            <!-- Contact Person -->
            <div class="input-group">
                <label for="contact_person">Contact Person</label>
                <input type="text" id="contact_person" name="contact_person" value="<?php echo $ad['contact_person']; ?>" required>
            </div>

            <!-- Email -->
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $ad['email']; ?>" required>
            </div>

            <!-- Phone Number -->
            <div class="input-group">
                <label for="pno">Phone Number</label>
                <input type="text" id="pno" name="pno" value="<?php echo $ad['pno']; ?>" required>
            </div>

            <!-- Website -->
            <div class="input-group">
                <label for="website">Website</label>
                <input type="url" id="website" name="website" value="<?php echo $ad['website']; ?>">
            </div>

            <!-- Advertisement Image -->
            <div class="input-group">
                <label for="ad_image">Advertisement Image</label>
                <input type="file" id="ad_image" name="ad_image" onchange="previewImage(event)">
                <br>
                <img id="preview" src="<?php echo '../' . $ad['ad_image']; ?>" width="100" height="100" alt="Ad Image">
            </div>

            <!-- Advertisement Description -->
            <div class="input-group">
                <label for="ad_description">Advertisement Description</label>
                <textarea id="ad_description" name="ad_description" required><?php echo $ad['ad_description']; ?></textarea>
            </div>

            <!-- Status -->
            <div class="input-group">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="Active" <?php if ($ad['status'] == 'Active') echo 'selected'; ?>>Active</option>
                    <option value="Inactive" <?php if ($ad['status'] == 'Inactive') echo 'selected'; ?>>Inactive</option>
                    <option value="Pending" <?php if ($ad['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                </select>
            </div>

            <button type="submit" class="signup-btn">Update</button>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('preview').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company = $_POST["company"];
    $contact_person = $_POST["contact_person"];
    $email = $_POST["email"];
    $pno = $_POST["pno"];
    $website = $_POST["website"];
    $ad_description = $_POST["ad_description"];
    $status = $_POST["status"];

    // Handle image upload
    $filename = $_FILES["ad_image"]["name"];
    if ($filename) {
        $tempname = $_FILES["ad_image"]["tmp_name"];
        $folder = "ads/" . $filename;
        move_uploaded_file($tempname, "../" . $folder);
    } else {
        $folder = $ad['ad_image']; // Retain old image if not changed
    }

    $sql = "UPDATE adds 
            SET company_name='$company', 
                contact_person='$contact_person', 
                email='$email', 
                pno='$pno', 
                website='$website', 
                ad_image='$folder', 
                ad_description='$ad_description', 
                status='$status' 
            WHERE sln=" . $id;

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: ../ads.php");
    } else {
        echo "Advertisement Not Updated";
    }
}
?>
