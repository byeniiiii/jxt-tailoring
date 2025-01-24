<?php
include '../database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $fullName = $_POST['fullName'];
    $contactNumber = $_POST['contactNumber'];
    $deliveryAddress = $_POST['deliveryAddress'];
    $jerseyType = $_POST['jerseyType'];
    $materialPreference = $_POST['materialPreference'];
    $quantity = $_POST['quantity'];
    $designOption = $_POST['designOption'];
    $colorPreference = $_POST['colorPreference'];
    $customColor = isset($_POST['customColor']) ? $_POST['customColor'] : null;
    $additionalNotes = $_POST['additionalNotes'];

    // Handle file upload for design
    $designUpload = "";
    if ($designOption == "Upload Design" && isset($_FILES['designUpload']) && $_FILES['designUpload']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $designUpload = $uploadDir . basename($_FILES['designUpload']['name']);
        move_uploaded_file($_FILES['designUpload']['tmp_name'], $designUpload);
    }

    // Handle file upload for customization details
    $customizationFile = "";
    if (isset($_FILES['customization']) && $_FILES['customization']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $customizationFile = $uploadDir . basename($_FILES['customization']['name']);
        move_uploaded_file($_FILES['customization']['tmp_name'], $customizationFile);
    }

    // Insert data into the database
    $sql = "INSERT INTO orders (full_name, contact_number, delivery_address, jersey_type, material_preference, quantity, design_option, design_upload, color_preference, custom_color, customization_file, additional_notes)
            VALUES ('$fullName', '$contactNumber', '$deliveryAddress', '$jerseyType', '$materialPreference', $quantity, '$designOption', '$designUpload', '$colorPreference', '$customColor', '$customizationFile', '$additionalNotes')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect to confirmation page
        header("Location: confirmation.php");
        exit;
    } else {
        // Show error message if query fails
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
