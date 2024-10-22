<?php
$fileLink = ""; // Initialize the file link
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Directory where the uploaded files will be saved
    $targetDir = "uploads/";

    // Create the uploads directory if it doesn't exist
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    // Path to the uploaded file
    $targetFile = $targetDir . basename($_FILES["file"]["name"]);

    // Check if the file is a valid upload
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        // Set the file link to be used later
        $fileLink = "https://asteral.optikl.ink/" . $targetFile; // Full URL to the uploaded file
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
