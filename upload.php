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
        // Construct the full URL
        $fileLink = "https://asteral.is-a.dev/upload-files/" . $targetFile; // Full URL to the uploaded file
        // Return the file link as a JSON response
        echo json_encode(['fileLink' => $fileLink]);
    } else {
        echo json_encode(['error' => 'Sorry, there was an error uploading your file.']);
    }
}
?>
