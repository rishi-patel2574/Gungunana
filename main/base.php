<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload MP3 File</title>
</head>
<body>
    <h1>Upload an MP3 File</h1>
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="audioFile">Select an MP3 file:</label>
        <input type="file" name="audioFile" id="audioFile" accept=".mp3" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>

<?php
// Set PHP settings to handle large files
ini_set('upload_max_filesize', '100Mb');
ini_set('post_max_size', '100Mb');
ini_set('max_execution_time', '300');
ini_set('max_input_time', '300');

// Ensure form submission is processed only for POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file has been uploaded
    if (isset($_FILES['audioFile']) && $_FILES['audioFile']['error'] === UPLOAD_ERR_OK) {
        // Retrieve file details
        $fileTmpPath = $_FILES['audioFile']['tmp_name']; // Temporary path
        $fileName = $_FILES['audioFile']['name'];       // Original file name
        $destinationDir = 'images/';                  // Destination directory

        // Ensure the destination directory exists
        if (!file_exists($destinationDir)) {
            mkdir($destinationDir, 0777, true); // Create directory if it doesn't exist
        }

        // Validate file extension
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if ($fileExtension === 'mp3') {
            // Create destination file path
            $destinationPath = $destinationDir . $fileName;

            // Move the uploaded file to the destination directory
            if (move_uploaded_file($fileTmpPath, $destinationPath)) {
                echo "<p style='color: green;'>MP3 file uploaded successfully to: $destinationPath</p>";
            } else {
                echo "<p style='color: red;'>Failed to move the uploaded file.</p>";
            }
        } else {
            echo "<p style='color: red;'>Only MP3 files are allowed.</p>";
        }
    } else {
        echo "<p style='color: red;'>No file uploaded or there was an upload error.</p>";
    }
}
?>
